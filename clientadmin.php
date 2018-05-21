<?php
session_start();
require_once('function.php');

if ($_SESSION['login'] == false)
{
  header("Location: index.php");
}
 ?>
<!DOCTYPE html>
<html lang="pl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Spis klientów - Firma AUTOCRASH</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Russo+One|Teko&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css" type="text/css" />
	</head>
	<body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="index.php"><span style="color: red; font-size: 28px;">AUTOCRASH</span></a>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item ">
                    <a class="nav-link" href="#">Dodaj Klienta </a></form>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Wystaw Fakturę</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Wystaw Paragon</a>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                </form>
                <form>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 navbar-right">
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Wyloguj</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php show_client();?>
            </div>
          </div>
        </div>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
</html>
