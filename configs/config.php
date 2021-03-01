<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$sqliteconfig = [
    'driver'    => 'sqlite',
    'database'  => __DIR__.'/database.db',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($sqliteconfig);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$connection = $capsule->getConnection('default');
$config = new \Config();
$config->dbconfig = $sqliteconfig;
$server->capsule = $capsule;
$server->config = $config;
