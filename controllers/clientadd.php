<?php
session_start();

if(isset($_SESSION['login'])) {

	require_once '..\core\bootstrap.php';
	require '..\views\clientadd.view.php';	
} else {

	header('Location: \strona\index.php');
}

		
