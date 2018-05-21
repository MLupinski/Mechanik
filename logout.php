<?php
  session_start();
  header("Location: index.php");
  $_SESSION['login'] = false;
  $_SESSION['error'] = false;
 ?>
