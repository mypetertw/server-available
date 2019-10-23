<?php
# Server List:
$webServer = '0';

# Config:
$port = 80;
$timeout = 30;

# Ping Chatgether Web Server
if (!$socket = @fsockopen($webServer, $port, $errno, $errstr, $timeout)) {
  $serverName = 'XXX Web Server';
}

# START: Report slack channel if server offline
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
