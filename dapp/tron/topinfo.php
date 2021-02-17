<?php
$memcache_obj = memcache_connect("localhost", 11211);
if($_GET['action']=='day'){
    $topers=memcache_get($memcache_obj,'topers');

}
else if($_GET['action']=='week'){
    $topers=memcache_get($memcache_obj,'topers_week');
}
$result=array(
    array('',0),
    array('',0),
    array('',0),
    array('',0),
    array('',0)
);
$i=0;
foreach ($topers as $addr=>$val){
    $result[$i]=array($addr,$val/1000000);
}
$data['data']=$result;
echo json_encode($data);
