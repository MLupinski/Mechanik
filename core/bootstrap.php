<?php

$app = [];

$app['config'] = require 'C:\xampp\htdocs\strona\config.php';


require_once 'C:\xampp\htdocs\strona\core\Router.php';
require_once 'C:\xampp\htdocs\strona\core\Request.php';
require_once 'C:\xampp\htdocs\strona\core\database\Connection.php';
require_once 'C:\xampp\htdocs\strona\core\database\Querybuilder.php';

$app['database'] =  new QueryBuilder(
	Connection::make($app['config']['database'])
);