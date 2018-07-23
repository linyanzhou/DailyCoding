<?php
/**
 * 接收消息  并且发送消息确认
 */
require_once '../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection('localhost', 5672, 'test', 'test');
$channel = $connection->channel();

$channel->queue_declare('task_queue', false, true, false, true);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";

$callback = function($msg){
    echo " [x] Received ", $msg->body, "\n";
    sleep(substr_count($msg->body, '.'));
    echo " [x] Done", "\n";
    $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
};
$channel->basic_qos(null, 1, null);
$channel->basic_consume('task_queue', '', false, false, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}
$channel->close();
$connection->close();