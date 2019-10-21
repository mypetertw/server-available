<?php
## Server Alive 2019/03/10 v0.0.2
## Server List:
$chatgetherWebServer = '139.162.108.8';
$cakoWebServer       = '172.105.242.235';
$cakoDatabaseServer  = '172.105.204.85';

## Config:
$port = 80;
$timeout = 30;

## Ping Cako Database Server
if (!$socket = @fsockopen($cakoDatabaseServer, $port, $errno, $errstr, $timeout)) {
  $serverName = 'Cako Database Server';
}

## Ping Cako Web Server
if (!$socket = @fsockopen($cakoWebServer, $port, $errno, $errstr, $timeout)) {
  $serverName = 'Cako Web Server';
}

## Ping Chatgether Web Server
if (!$socket = @fsockopen($chatgetherWebServer, $port, $errno, $errstr, $timeout)) {
  $serverName = 'Chatgether Web Server';
}

## START: if server offline
if (!$socket) {
  $json = '{
    "text": "WARNING: '.$serverName.' is offline!",
    "channel": "#deploy-notifacation",
    "username": "Server Alive"
  }';

  $ch = curl_init('https://hooks.slack.com/services/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');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
  $result = curl_exec($ch);
}

fclose($socket);
?>
