<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);
/**
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
*/

$key1 = "newlist";
$key2 = "newlist2";
$redis->del($key1); // 默认先删除
$redis->del($key2); // 默认先删除
$redis->rPush($key1,'item1','item2');
$redis->rPush($key2,'item3');
print_r( "rPush 赋值后 key newlist 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";
print_r( "rPush 赋值后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";
$redis->brpoplpush($key2,$key1,1);
print_r( "brpoplpush newlist2   newlist   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";
$redis->brpoplpush($key2,$key1,1);
print_r( "brpoplpush newlist2   newlist   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";
print_r( "brpoplpush newlist2   newlist   1 后 key newlist1 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";

$redis->brpoplpush($key1,$key2,1);
print_r( "brpoplpush newlist   newlist2   1 后 key newlist1 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";

print_r( "brpoplpush newlist   newlist2   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";

$redis->blpop([$key1,$key2],1);
print_r( "blpop [newlist   newlist2]   1 后 key newlist1 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";

print_r( "blpop [newlist   newlist2]   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";

$redis->blpop([$key1,$key2],1);
print_r( "blpop [newlist   newlist2]   1 后 key newlist1 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";

print_r( "blpop [newlist   newlist2]   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";

$redis->blpop([$key1,$key2],1);
print_r( "blpop [newlist   newlist2]   1 后 key newlist1 的值为：").var_dump($redis->lRange($key1,0,-1))."\t\n";

print_r( "blpop [newlist   newlist2]   1 后 key newlist2 的值为：").var_dump($redis->lRange($key2,0,-1))."\t\n";


