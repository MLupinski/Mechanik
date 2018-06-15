<?php
session_start();

if(isset($_SESSION['login'])) {

	require_once '..\core\bootstrap.php';
	$id = $_GET['id'];
	$clientsdata = $app['database']->selectAll('clients',$id);

	require '..\views\invoice.view.php';	
} else {

	header('Location: \strona\index.php');
}

		
