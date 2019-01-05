<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$redis->hMset("hashKey",['k1'=>'v1','k2'=>'v2','k3'=>'v3']);
print_r("初始化key hashKey 的值个数：".$redis->hLen("hashKey")."<br/>");
print_r("获取 hashKey 中 k2 k3 值：<br/>". var_dump($redis->hMGet("hashKey",['k2','k3'])));
$redis->hDel("hashKey",'k1','k3');
print_r("删除key hashKey 的 k1 k3值 剩余个数：".$redis->hLen("hashKey"));


