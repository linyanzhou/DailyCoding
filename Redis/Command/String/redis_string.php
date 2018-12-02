<?php
$redis = new \Redis();
$redisHost = "127.0.0.1";
$redisPort = '6379';
$redis->connect($redisHost, $redisPort);

$sKey = "mrc";
$redis->del($sKey); // 默认先删除
$iGetKey=$redis->get($sKey);
print_r("初始化key mrc 的值为：".$iGetKey."<br/>");
$redis->set($sKey,7);
$iGetKey=$redis->get($sKey);
print_r("重新赋值后key mrc 的值为：".$iGetKey."<br/>");
$redis->incr($sKey);
$iGetKey=$redis->get($sKey);
print_r("incr赋值后key mrc 的值为：".$iGetKey."<br/>");
$redis->decr($sKey);
$iGetKey=$redis->get($sKey);
print_r("decr赋值后key mrc 的值为：".$iGetKey."<br/>");
$redis->incrBy($sKey,3);
$iGetKey=$redis->get($sKey);
print_r("incrBy 3 后key mrc 的值为：".$iGetKey."<br/>");
$redis->decrBy($sKey,7);
$iGetKey=$redis->get($sKey);
print_r("decrBy 7 后key mrc 的值为：".$iGetKey."<br/>");
$redis->incrByFloat($sKey,5);   // php5.6 貌似存在问题
$sGetKey=$redis->get($sKey);
print_r("incrByFloat 0.5 后key mrc 的值为：".$sGetKey."<br/>");
$redis->expire($sKey,5); // 5秒后过期
$redis->expireAt($sKey,1543759363); // 指定时间戳过期