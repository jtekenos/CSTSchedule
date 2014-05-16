<?php

session_start(); 

require_once('realtime-notifications/examples/php/lib/squeeks-Pusher-PHP/lib/Pusher.php');

$app_key = '39df1a92e712efa11685';
$app_secret = 'e52643f3259b0af9929a';
$app_id = '75107';

$pusher = new Pusher($app_key, $app_secret, $app_id);
$data = array('message' => 'This is an HTML5 Realtime Push Notification!');
$pusher->trigger('my_notifications', 'notification', $data);

?>