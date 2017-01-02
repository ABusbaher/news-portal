<?php

$GLOBALS['config'] = array(
	'DB' => array(
        'host' => 'fdb15.freehostingeu.com',
        'user' => '2264166_vesti',
        'password' => 'sasa3482',
        'db_name' => '2264166_vesti',
        'db_charset' => 'UTF-8'
	)
);

spl_autoload_register(function($className){
	require_once "../classes/{$className}.class.php";
});