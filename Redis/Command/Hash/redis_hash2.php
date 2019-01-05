<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$sKey = "mrc";
$redis->del($sKey); // 默认先删除

$redis->hMset('hashKey2',['short'=> 'hello','long'=>1000]);
print_r("获取 hashKey 中 short long 值：<br/>". var_dump($redis->hMGet("hashKey2",['short','long'])));
print_r("获取 hashKey 中 short long 值：<br/>". var_dump($redis->hGetAll("hashKey2")));

print_r("获取 hashKey 中 是否存在 num ：<br/>"). var_dump($redis->hExists("hashKey2",'num'));

$redis->hIncrBy("hashKey2",'num',1);


print_r("hashKey 中 num +1  ：<br/>"). var_dump($redis->hGet("hashKey2",'num'));

