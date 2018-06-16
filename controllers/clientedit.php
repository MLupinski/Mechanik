<?php
session_start();

if(isset($_SESSION['login'])) {

	require_once '..\core\bootstrap.php';

	if(!isset($_POST['clientedit']))
	{
		$id = $_GET['id'];
		$clientsdata = $app['database']->selectAll('clients', $id);

		require '..\views\clientedit.view.php';
	} else {

			require '..\views\clientedit.view.php';
	}
	
} else {

	header('Location: \strona\index.php');
}

		
