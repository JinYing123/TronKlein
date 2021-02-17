<?php
include_once 'vendor/autoload.php';
include_once 'abi.php';
include_once 'config.php';
include_once 'function.php';
$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider($fullNodeHost);
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider($solidityNodeHost);
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider($eventServerHost);
try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}
$tron->setAddress($owner_address);
$tron->setPrivateKey($private_key);

$action=$argv[1];

if($action=='cache'){
	save_nets();
}
else if($action=='cache_top'){
    save_top5();
}
else if($action=='top'){
    if (date("w")==1){
        $starttime = strtotime(date("Y-m-d",strtotime("-1 week")));//last week
        $endtime = $starttime+24 * 60 * 60 * 7-1;
        release_top5($starttime,$endtime,'release_topaward');
    }
    $starttime = strtotime(date("Y-m-d",strtotime("-1 day")));//yestoday
    $endtime = $starttime+24 * 60 * 60-1;//yestoday 23:59:59
    release_top5($starttime,$endtime,'release_topaward_week');
}