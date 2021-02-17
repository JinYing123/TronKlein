<?php
function getTeamInfo($address){
    $allplayers=get_nets();
    return $allplayers[$address];
}

function globalinfo(){
    global $tron,$abi,$contract,$owner_address;
    $build=$tron->getTransactionBuilder();
    $response=$build->triggerSmartContract(json_decode($abi,true),$contract,"globalinfo",array(),0,$owner_address);
    return $response;
}
function release_top5($starttime,$endtime,$method){
    global $eventServerHost,$contract,$tron,$abi,$owner_address;
    $fingerprint="";
    $toper=array();
    while(true){
        $url="https://".$eventServerHost."/v1/contracts/".$tron->getBase58CheckAddress($contract)."/events?event_name=Deposit&limit=200&fingerprint=$fingerprint&min_block_timestamp=$starttime&max_block_timestamp=$endtime";
        $content=json_decode(file_get_contents($url),true);
        foreach ($content['data'] as $record){
            $toper[$record['result']['recommender_addr']]+=$record['result']['_value'];
        }
        if($content['meta']['fingerprint']){
            $fingerprint=$content['meta']['fingerprint'];
        }
        else{
            break;
        }
    }
    arsort($toper);
    $params=array();
    for ($i=0;$i<5;$i++){
        if ($toper[$i]){
            $params[]=$toper[$i];
        }
        else{
            $params[]='0x0000000000000000000000000000000000000000';
        }
    }
    $build=$tron->getTransactionBuilder();
    $transaction=$build->triggerSmartContract(json_decode($abi,true),$contract,$method,$params,200000000,$owner_address);
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
}
function save_top5(){
    global $eventServerHost,$contract,$tron;
    $fingerprint="";
    $toper=array();
    $starttime = strtotime(date("Y-m-d"));//today 00:00:00
    while(true){
        $url="https://".$eventServerHost."/v1/contracts/".$tron->getBase58CheckAddress($contract)."/events?event_name=Deposit&limit=200&fingerprint=$fingerprint&min_block_timestamp=$starttime";
        $content=json_decode(file_get_contents($url),true);
        foreach ($content['data'] as $record){
            $toper[$record['result']['recommender_addr']]+=$record['result']['_value'];
        }
        if($content['meta']['fingerprint']){
            $fingerprint=$content['meta']['fingerprint'];
        }
        else{
            break;
        }
    }
    arsort($toper);
    $cache_topers=array();
    $i=0;
    foreach ($toper as $addr=>$val){
        $i++;
        $cache_topers[$addr]=$val;
        if($i==5){
            break;
        }
    }
    $fingerprint="";
    $toper=array();
    $starttime = strtotime(date('Y-m-d',(time()-((date('w',time())==0?7:date('w',time()))-1)*24*3600)));//this monday
    while(true){
        $url="https://".$eventServerHost."/v1/contracts/".$tron->getBase58CheckAddress($contract)."/events?event_name=Deposit&limit=200&fingerprint=$fingerprint&min_block_timestamp=$starttime";
        $content=json_decode(file_get_contents($url),true);
        foreach ($content['data'] as $record){
            $toper[$record['result']['recommender_addr']]+=$record['result']['_value'];
        }
        if($content['meta']['fingerprint']){
            $fingerprint=$content['meta']['fingerprint'];
        }
        else{
            break;
        }
    }
    arsort($toper);
    $cache_topers_week=array();
    $i=0;
    foreach ($toper as $addr=>$val){
        $i++;
        $cache_topers_week[$addr]=$val;
        if($i==5){
            break;
        }
    }
    $memcache_obj = memcache_connect("localhost", 11211);
    memcache_set($memcache_obj, 'topers', $cache_topers, MEMCACHE_COMPRESSED, 3600*6);
    memcache_set($memcache_obj, 'topers_week', $cache_topers_week, MEMCACHE_COMPRESSED, 3600*6);
}
function get_nets(){
    $memcache_obj = memcache_connect("localhost", 11211);
    $allplayers=memcache_get($memcache_obj,'allplayers');
    if(!$allplayers){
        $allplayers=save_nets();
    }
    return $allplayers;
}
function save_nets(){
    global $tron,$abi,$contract,$owner_address;
    $allplayers=array();
    $build=$tron->getTransactionBuilder();
    $response=globalinfo();
    $total_address=$response['_total_address']->toHex();
    $total_address=hexdec($total_address);
    for($i=$total_address;$i>0;$i--){
        $index=$i-1;
        $addr=$build->triggerSmartContract(json_decode($abi,true),$contract,"addressIndices",array($index),0,$owner_address);
        $player=$build->triggerSmartContract(json_decode($abi,true),$contract,"players",$addr,0,$owner_address);
        $allplayers[$addr[0]]['amount']+=hexdec($player['amount']->toHex());
        $allplayers[$addr[0]]['num']+=hexdec($player['recommend_num']->toHex());
        $allplayers[$player['recommender_addr']]['amount']+=$allplayers[$addr[0]]['amount'];
        $allplayers[$player['recommender_addr']]['num']+=$allplayers[$addr[0]]['num'];
    }
    $memcache_obj = memcache_connect("localhost", 11211);
    memcache_set($memcache_obj, 'allplayers', $allplayers, MEMCACHE_COMPRESSED, 3600*6);
    return $allplayers;
}

function release_day(){
    global $tron,$abi,$contract,$owner_address;
    $build=$tron->getTransactionBuilder();
    $response=globalinfo();
    $total_address=$response['_total_address']->toHex();
    $total_address=hexdec($total_address);
    for($i=0;$i<$total_address;$i++){
        $addr=$build->triggerSmartContract(json_decode($abi,true),$contract,"addressIndices",array($i),0,$owner_address);
        $transaction=$build->triggerSmartContract(json_decode($abi,true),$contract,"release_diary",$addr,100000000,$owner_address);
        $signedTransaction = $tron->signTransaction($transaction);
        $response = $tron->sendRawTransaction($signedTransaction);
        var_dump($response);
    }
}