<?php

require 'evironment.php';

$config = array();

if (EVIRONMENT == 'development') {
	define('BASE_URL', 'http://localhost/classificados_mvc/');
	$config['dbname'] = 'classificados';
	$config['dbhost'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define('BASE_URL', 'http://meusite.com.br/');
	$cofnig['dbname'] = '';
	$config['dbhost'] = '';
	$config['dbuser'] = '';
	$cofnig['dbpass'] = '';
}

global $db;

try {

	$db = new PDO("mysql:dbname={$config['dbname']};host={$config['dbhost']}", $config['dbuser'], $config['dbpass']);

} catch (PDOexception $e) {
	echo "ERRO ::: {$e->getMessage()}";
}


?>