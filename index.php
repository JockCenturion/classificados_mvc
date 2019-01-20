<?php

   /** 
  	* Inicio da aplicação php
	* 
	*
	* @author Jock R. <jock9613@gmail.com>
	* @version 0.1 
	* @copyright  GPL © 2006, jock ltda. 
	* @access public  
	* @package root 
	* @subpackage root
	*/ 

session_start();
require 'config.php';

spl_autoload_register( function($class) {

	if (file_exists("controllers/{$class}.php")) {
		require "controllers/{$class}.php";
	} else if (file_exists("models/{$class}.php")) {
		require "models/{$class}.php";
	} else if (file_exists("core/{$class}.php")) {
		require "core/{$class}.php";
	}

});


$core = new Core();
$core->run();


?>