<?php
/**
 * 发送消息  持久化消息队列
 */

require_once '../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

//建立一个连接通道，声明一个可以发送消息的队列hello
$connection = new AMQPStreamConnection('localhost', 5672, 'test', 'test');
$channel = $connection->channel();
$channel->queue_declare('task_queue', false, true, false, true);

$data = implode(' ', array_slice($argv, 1));
if(empty($data)) $data = "Hello World!";
$msg = new AMQPMessage($data,['delivery_mode' => 2]);

$channel->basic_publish($msg, '', 'task_queue');

echo " [x] Sent ", $data, "\n";
//关闭连接
$channel->close();
$connection->close();