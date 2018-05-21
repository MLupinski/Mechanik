<?php
require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Uzupełnienie diagnozy</title>
	<link href="https://fonts.googleapis.com/css?family=Russo+One|Teko&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 	<link rel="stylesheet" href="css/main.css" type="text/css" />
</head>
	<body>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
            <?php show_diagnose();
            if(isset($_POST['adddiag']))
            {
              add_diagnose();
            }
            ?>
          </div>
        </div>
      </div>
