<?php
## Server Alive 2019/03/10 v0.0.2
## Server List:
$webServer = '0';

## Config:
$port = 80;
$timeout = 30;

## Ping Chatgether Web Server
if (!$socket = @fsockopen($webServer, $port, $errno, $errstr, $timeout)) {
  $serverName = 'XXX Web Server';
}

## START: if server offline
if (!$socket) {
  $json = '{
    "text": "WARNING: '.$serverName.' is offline!",
    "channel": "#deploy-notifacation",
    "username": "Server Available"
  }';

  $ch = curl_init('');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  $result = curl_exec($ch);
}

fclose($socket);
?>
