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
function release_topaward(){
    global $tron,$abi,$contract,$owner_address;
    $build=$tron->getTransactionBuilder();
    $transaction=$build->triggerSmartContract(json_decode($abi,true),$contract,"release_topaward",array(),0,$owner_address);
    $signedTransaction = $tron->signTransaction($transaction);
    $response = $tron->sendRawTransaction($signedTransaction);
    var_dump($response);
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