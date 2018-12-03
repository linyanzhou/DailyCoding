<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$sKey = "list";
$redis->del($sKey); // 默认先删除

$redis->rPush($sKey,'last');
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "rPush 赋值后 key list 的值为：").var_dump($sGetKey)."\t\n";

$redis->lPush($sKey,'first');
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "lPush 赋值后 key list 的值为：").var_dump($sGetKey)."\t\n";

$redis->rPush($sKey,'new last');
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "rPush 赋值后 key list 的值为：").var_dump($sGetKey)."\t\n";
$redis->lPop($sKey);
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "lpop 一次后 key list 的值为：").var_dump($sGetKey)."\t\n";

$redis->lPop($sKey);
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "lpop 二次后 key list 的值为：").var_dump($sGetKey)."\t\n";

$redis->rPush($sKey,'a','b','c');
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "rpush a b c 后 key list 的值为：").var_dump($sGetKey)."\t\n";

$redis->lTrim($sKey,2,-1);
$sGetKey = $redis->lRange($sKey,0,-1);
print_r( "ltrim  2 -1  后 key list 的值为：").var_dump($sGetKey)."\t\n";