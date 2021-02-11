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
else if($action=='top'){
	release_topaward();
}

