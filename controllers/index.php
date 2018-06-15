<?php
session_start();

if(isset($_SESSION['login'])) {

	header('Location: controllers\clientadmin.php');
}
else {

	require 'views\index.view.php';
}

		
