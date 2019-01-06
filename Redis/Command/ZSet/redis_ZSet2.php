<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$redis->zAdd('zSetKey1',1,'a',2,'b',3,'c');

$redis->zAdd('zSetKey2',4,'b',1,'c',0,'d');

$redis->zInter('zSetKeyI',['zSetKey1','zSetKey2']);

print_r("初始化key zSetKeyI 的值：".var_dump($redis->zRange("zSetKeyI",0,-1,true))."<br/>");


$redis->zUnion('zSetKeyU',['zSetKey1','zSetKey2']);
print_r("初始化key zSetKeyU 的值：".var_dump($redis->zRange("zSetKeyU",0,-1,true))."<br/>");

$redis->sAdd('Set1','a','d');

$redis->zUnion('zSetKeyU2',['zSetKeyU','Set1']);

print_r("初始化key zSetKeyU2 的值：".var_dump($redis->zRange("zSetKeyU2",0,-1,true))."<br/>");
