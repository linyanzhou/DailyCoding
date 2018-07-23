<?php
# exchange 方式
require_once '../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//建立一个连接通道，声明一个可以发送消息的队列hello
$connection = new AMQPStreamConnection('10.0.11.209', 5675, 'huodong_mq', 'dba7c4caee842a33');
$channel = $connection->channel();
$channel->exchange_declare('logs', 'fanout', false, false, false);

$data = implode(' ', array_slice($argv, 1));
if(empty($data)) $data = "info: Hello World!";
$msg = new AMQPMessage($data);

$channel->basic_publish($msg, 'logs');

echo " [x] Sent ", $data, "\n";

$channel->close();
$connection->close();