<?php

$p = getopt('', Array('znode:'));
//$value2 = QConf::getHost("/db/redis/rt_26001");
//$value2 = QConf::getHost($p['znode']);
$value2 = \QConf::getAllHost($p['znode']);
var_dump($value2);