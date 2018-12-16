<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);
$key1='setkey1';
$key2='setkey2';
$redis->sAdd($key1,'a','b','c','d');
print_r( "sadd 赋值后 key setkey1 的值为：").var_dump($redis->sMembers($key1))."\t\n";
$redis->sAdd($key2,'c','d','e','f');
print_r( "sadd 赋值后 key setkey2 的值为：").var_dump($redis->sMembers($key2))."\t\n";

print_r( "sdiff setkey1 setkey2 后值为：").var_dump($redis->sDiff($key1,$key2))."\t\n";
$redis->sdiffstore('dest-key',$key1,$key2);
print_r( "sdiffstore setkey1 setkey2 后 dest-key 值为：").var_dump($redis->sMembers('dest-key'))."\t\n";

print_r( "sinter setkey1 setkey2 后值为：").var_dump($redis->sInter($key1,$key2))."\t\n";

print_r( "sunion setkey1 setkey2 后值为：").var_dump($redis->sUnion($key1,$key2))."\t\n";