<?php
$config['db']['dsn']='mysql:host=127.7.144.2;dbname=dbuser;charset=utf8';
$config['db']['user'] = 'dbuser';
$config['db']['password'] = 'JzVFp7zuYhKbGVAx';

session_start();

$db = new PDO(
        $config['db']['dsn'],
        $config['db']['user'] ,
        $config['db']['password'],
        array(
           PDO::ATTR_EMULATE_PREPARES => false,
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
           )
        );