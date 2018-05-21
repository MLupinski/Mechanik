<?php

function error()
{
  echo '<div class="error">Podałeś nieprawidłowe dane logowania.</br> Sprawdź je i spróbuj ponownie.</div>';
}

function show_client()
{
  require_once 'connection\database.php';

  echo	'<table class="table table-hover table-sm">
        <thead class="thead-dark">
          <tr>
            <th scope="col">LP.</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Samochód</th>
            <th scope="col">Kontakt</th>
            <th scope="col">Rachunek (BRUTTO)</th>
            <th scope="col">Opcje</th>
        </tr>
        </thead>';

        $query = $db -> prepare('SELECT * FROM clients');
        $query -> execute();

          foreach($query as $row)
          {
            echo '<tbody>
                  <tr>
                    <th scope="row">'.$row['ID'].'.</th>';
            echo      '<td>'.$row['FIRSTNAME'].'</td>';
            echo      '<td>'.$row['LASTNAME'].'</td>';
            echo      '<td>'.$row['CAR'].'</td>';
            echo      '<td>'.$row['CONTACT'].'</td>';
            echo      '<td>'.$row['BILL'].' zł</td>';
            echo      '<td><a href="car.php?id='.$row['ID'].'">Szczegóły </a></br>';
            echo        '<a href="car.php?id='.$row['ID'].'">Edytuj </a></br>';
            echo        '<a href="car.php?id='.$row['ID'].'">Usuń</a></br>';
            echo        '<a href="car.php?id='.$row['ID'].'">Faktura</a></br>
                      </td>
                  </tr>
                  </tbody>';
          }
          $query -> closeCursor();
      		$query = null;

      echo '</table>';
}

function repair()
{
  require_once 'connection\database.php';

	if(isset($_POST['repair']))
	{
	 	$id = $_GET['id'];

		$newquery = $db -> prepare("UPDATE cars SET DONE = 1, REP = 0 WHERE ID = :id");
    $newquery -> bindValue(':id', $id, PDO::PARAM_INT);
    $newquery -> execute();
		$newquery -> closeCursor();
		$newquery = null;
	}
	else
	{
		$id = $_GET['id'];

		$query = $db -> prepare("UPDATE cars SET DONE = 0 WHERE ID = :id");
    $query -> bindValue(':id', $id, PDO::PARAM_INT);
    $query -> execute();
		$query -> closeCursor();
		$query = null;
	}

}

function show_car_info()
{
  $id = $_GET['id'];
  require_once 'connection\database.php';

  echo '
  <div class="row">
    <div class="col-md-4 col-12 data">
      <p>SAMOCHÓD:</p>';

      $query = $db -> prepare('SELECT * FROM cars ca INNER JOIN clients cl ON ca.CLIENT_ID = cl.ID WHERE CLIENT_ID=:id');
      $query -> bindValue(':id',$id, PDO::PARAM_INT);
      $query -> execute();

      foreach($query as $row)
      {
        echo $row['FIRSTNAME'];
        echo ' '.$row['LASTNAME'];
        echo '</br>';
        echo $row['CAR'];
        $rep = $row['REP'];

      }
      $query -> closeCursor();
    echo '</div>
    <div class="col-md-6 col-12 diagnose">
      <div class="diag">
        <p>DIAGNOZA:</p>';

      $newquery = $db -> prepare('SELECT * FROM cars WHERE CLIENT_ID=:id');
      $newquery -> bindValue(':id',$id, PDO::PARAM_INT);
      $newquery -> execute();

      foreach($newquery as $row)
      {
        echo $row['DIAG'];
        $done = $row['DONE'];
        $id = $row['ID'];
        $client_id = $row['CLIENT_ID'];
      }
      $newquery -> closeCursor();
    if ($done == 0)
    {
      echo '
      <form method="POST" action="cardiagnose.php?id='.$client_id.'">
        <button type="submit" name="diagnose" value="diagnose" class="button">Uzupełnij diagnozę</button>
      </form>';
    }
    else
    {
      echo '
        <button type="button" disabled>Naprawa Zakończona</button>';
    }
      echo '</div>
    </div>';
    echo '<div class="diag-img col-md-12 col-12">';
    if ($done == 0)
    {
      echo '
      <form method="POST" action="car.php?id='.$client_id.'">
        <button type="submit" name="repair" class="button2">Naprawa Zakończona</button>
      </form>';
    }
    else
    {
      echo '
      <form method="POST" action="car.php?id='.$client_id.'">

        <button type="submit" name="resrepair" class="button2">Wznów naprawę</button>
      </form>';
    }
    switch($rep)
    {
      case 0: echo '<img src="img/0.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 1: echo '<img src="img/1.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 2: echo '<img src="img/2.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 3: echo '<img src="img/3.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 4: echo '<img src="img/4.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 5: echo '<img src="img/5.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 6: echo '<img src="img/6.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 7: echo '<img src="img/7.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 8: echo '<img src="img/8.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 9: echo '';
        break;
    }
    if(isset($_POST['repair']) || isset($_POST['resrepair']))
    {
      repair();
      header('refresh: 1;');
    }
    echo '</div>
    <a href="index.php" class="button" style="text-decoration: none; color: white;"><-- Powrót</a>
    </div>';
}

function add_diagnose()
{
  require_once 'connection\database.php';

  $diag = $_POST['add'];
	$id = $_GET['id'];;
	$rep = $_POST['diagnr'];

	$query = $db -> prepare("SELECT DIAG FROM cars WHERE ID=:id");
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query -> execute();
	foreach($query as $row)
	{
		$diag1 = $row['DIAG'];
	}
	$query = $db -> prepare("UPDATE cars SET DIAG = '$diag1 $diag', REP = '$rep' WHERE ID = :id");
  $query -> bindValue(':id', $id, PDO::PARAM_INT);
  $query -> execute();

	$query->closeCursor();
	$query=null;
  header('Location: car.php?id='.$id);
}

function show_diagnose()
{
  $ID = $_GET['id'];
  echo '
      <span class="lowlet">Uzupełnienie diagnozy</span>
      <form method="POST" action="cardiagnose.php?id='.$ID.'" class="inter">
        <label>WYWIAD: </label>
        <textarea placeholder="Wywiad" name="add"></textarea>
        <label>NUMER DIAGNOZY:</label>
        <input type="text" placeholder="numer diagnozy" name="diagnr">
        <ul>
          <li>1 - Układ Kierowniczy</li>
          <li>2 - Problemy z elektryką</li>
          <li>3 - Problemy z układem wydechowym</li>
          <li>4 - Problemy z zawieszeniem</li>
          <li>5 - Inne problemy</li>
          <li>6 - Problemy z silnikiem</li>
          <li>7 - Skrzynia biegów</li>
          <li>8 - Układ hamulcowy</li>
        </ul>
        <button type="submit" name="adddiag" value="adddiag" class="button2">Uzupełnij</button>
      </form>
      <a href="clientadmin.php" class="button" style="text-decoration: none; color: white;"><-- Spis Klientów</a>';
}

?>
