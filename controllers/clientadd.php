<?php
session_start();

if(isset($_SESSION['login'])) {

	require_once '..\core\bootstrap.php';

	if(!isset($_POST['clientadd']))
	{
		require '..\views\clientadd.view.php';

	} else {
			$name = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$street = $_POST['street'];
			$code = $_POST['postalcode'];
			$town = $_POST['town'];
			$car = $_POST['car'];
			$contact = $_POST['contact'];
			$bill = $_POST['bill'];
			
			$app['database']->addClient($name, $lastname, $street, $code, $town, $car, $contact, $bill); 
			require '..\views\clientadd.view.php';
	}
} else {

	header('Location: \strona\index.php');
}