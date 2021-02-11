<?php
$memcache_obj = memcache_connect("localhost", 11211);
$allplayers=memcache_get($memcache_obj,'allplayers');
echo json_encode($allplayers[$_GET['address']]);
