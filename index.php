<?php
session_start();
require_once 'function.php';

?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Logowanie</title>
	<link href="https://fonts.googleapis.com/css?family=Russo+One|Teko&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 	<link rel="stylesheet" href="css/main.css" type="text/css" />
</head>
	<body>

		<div class="con">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
							if($_SESSION['error'])
							{
									error();
									$_SESSION['error'] = false;
							}
							elseif ($_SESSION['login'])
							{
								header("Location: clientadmin.php");
							}
						?>
						<form action="login.php" method="post">
							<label>Username: </label><input type="text" name="login" required/>
							<label>Password: </label><input type="password" name="password" required/>
							<input type="submit" value="Login" />
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>
