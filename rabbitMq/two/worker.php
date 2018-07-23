<?php
/**
 * 接收消息  不需要消息确认
 */
require_once '../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection('localhost', 5672, 'test', 'test');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, true);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg){
    echo " [x] Received ", $msg->body, "\n";
    sleep(substr_count($msg->body, '.'));
    echo " [x] Done", "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}