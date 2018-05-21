<?php
session_start();
require_once 'database.php';

if (isset($_POST['login']) && isset($_POST['password']))
{
  $query = $db -> prepare('SELECT LOGIN, PASSWORD FROM account WHERE LOGIN = :login AND PASSWORD = :password');
  $query -> bindValue(':login',$_POST['login'], PDO::PARAM_STR);
  $query -> bindValue(':password',$_POST['password'], PDO::PARAM_STR);
  $query -> execute();

  $count = $query -> rowCount();
  //do pobierania danych z tabeli $data = $query -> fetch(PDO::FETCH_OBJ);

  if($count > 0)
  {
    $_SESSION['login'] = true;
    header('Location: clientadmin.php');

  }
  else
  {
    header('location: index.php');
    $_SESSION['error'] = true;
  }

} else {
  error();
  header('Location: index.php');
  exit();
}
 ?>
