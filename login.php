<?php
session_start();

require 'core\bootstrap.php';

$login = $_POST['login'];
$pass = $_POST['password'];
$database = 'account';

 if (isset($_POST['login']) && isset($_POST['password'])) {

	$data = $app['database']->login($database, $login, $pass);

	if($data) {

    	$_SESSION['login'] = true;
    	unset($_SESSION['error']);
        header('Location: controllers\clientadmin.php');

      }
      else {
      	$app['database']->error();
      	$_SESSION['error'] = true;
        header('Location: index.php');
        exit();

	}
}

