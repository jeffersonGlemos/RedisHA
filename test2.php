<?php
$host = 'localhost';
$port = 6379;
$pwd = 'str0ng_passw0rd';
$key = 'Chave de teste';

$redis = new Redis();
if ($redis->connect($host, $port) === false) {
    die($redis->getLastError());
}

if ($redis->auth($pwd) === false) {
    die($redis->getLastError());
}

if ($redis->set($key, 'Adiciona. ' . mt_rand(100, 10000), 1000) === false) {
    die($redis->getLastError());
}

$value = $redis->get($key);
echo $key . ' = ' . $value;
//
//$sentinel = new RedisSentinel('127.0.0.1', 26379, 2.5); // 2.5 sec timeout.
//foreach ($sentinel->masters() as $t) {
//    echo print_r($t) . PHP_EOL;
//}
//$sentinel->reset('mymaster');
