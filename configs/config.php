<?php
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->getDatabaseManager()->extend('mongodb', function($config)
{
    return new Jenssegers\Mongodb\Connection($config);
});


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

$mongoconfig = [
    'driver'      => 'mongodb',
    'host'        => 'mongodb',
    'port'        =>  27017,
    'database'    => 'importer',
    'username'    => 'dbuser',
    'password'    => 'dbpass',
    'options'     => [
       'database' => 'admin', 
    ],
    'prefix'      => '',
];
$capsule->addConnection($mongoconfig,'mongodb');

$mysqlconfig = [
    'driver'    => 'mysql',
    'host'      => 'mariadb',
    'database'  => 'dbtest',
    'username'  => 'root',
    'password'  => 'toor',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
];
$capsule->addConnection($mysqlconfig,'mysql');

$pgsqlconfig = [
    'driver'   => 'pgsql',
    'host'     => 'postgetconfig',
    'port'     => '5432',
    'database' => 'dbname',
    'username' => 'postgres',
    'password' => 'dbpass',
    'charset'  => 'utf8',
    'prefix'   => '',
    'schema'   => 'public',
];
$capsule->addConnection($pgsqlconfig,'pgsql');

$config = new \Config();
$config->dbconfig = $sqliteconfig;
$config->mongoconfig = $mongoconfig;
$config->mysqlconfig = $mysqlconfig;
$config->pgsqlconfig = $pgsqlconfig;

$server->capsule = $capsule;
$server->config = $config;
