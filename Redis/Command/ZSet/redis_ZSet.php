<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$redis->zAdd('zSetKey',3,'a',2,'b',1,'c');
print_r("初始化key zSetKey 的值：".var_dump($redis->zRange("zSetKey",0,-1,true))."<br/>");
print_r("此时 zSetKey  c 的排名：".($redis->zRank("zSetKey",'c'))."<br/>");

print_r("此时 zSetKey  成员个数：".($redis->zCard("zSetKey"))."<br/>");
//$redis->zIncrBy("zSetKey",3,'c');  有问题 比较难解决
$redis->zAdd('zSetKey',4,'c');
print_r("此时 zSetKey  + 3 c 的分数：".var_dump($redis->zRange("zSetKey",0,-1,true))."<br/>");
print_r("此时 zSetKey  c 的排名：".($redis->zRank("zSetKey",'c'))."<br/>");

print_r("zcount 0 3 此时 zSetKey 总数：".($redis->zCount("zSetKey",0,3))."<br/>");

$redis->zRem('zSetKey','b');
print_r("移除 b 成员 此时 zSetKey  成员：".var_dump($redis->zRange("zSetKey",0,-1))."<br/>");



