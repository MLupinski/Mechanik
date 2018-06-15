<?php
class QueryBuilder
{
	protected $pdo;
	protected $statement;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}


public function selectAll($table, $id)
  {
    $statement = $this->pdo->prepare("Select * FROM {$table} WHERE ID = :id");
    $statement->bindValue(':id',$id, PDO::PARAM_STR);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

	public function login($table, $login, $password)
	{

  		$statement = $this->pdo->prepare("Select LOGIN, PASSWORD FROM {$table} WHERE LOGIN = :login AND PASSWORD = :password");
  		$statement->bindValue(':login', $login, PDO::PARAM_STR);
  		$statement->bindValue(':password', $password, PDO::PARAM_STR);
  		$statement->execute();
      
      return $statement->fetch(PDO::FETCH_OBJ);

	}

	public function showClient($table)
	{

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

	        $clientquery = $this->pdo->prepare("Select * From {$table}");
	        $clientquery->execute();

	          foreach($clientquery as $row)
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
	            echo        '<a href="clientedit.php?id='.$row['ID'].'">Edytuj </a></br>';
	            echo        '<a href="clientdelete.php?id='.$row['ID'].'">Usuń</a></br>';
	            echo        '<a href="invoice.php?id='.$row['ID'].'">Faktura</a></br>';
              echo        '<a href="clientendrepair.php?id='.$row['ID'].'">Zakończona</a></br>
	                      </td>
	                  </tr>
	                  </tbody>';
	          }
	      echo '</table>';
	}

  function editClient()
  {
    if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['car']) || empty($_POST['contact']) || empty($_POST['bill']))
    {
      echo '<div class="error">Wystąpił błąd w edycji klienta! Upewnij się, że wypełniłeś wszystkie pola formularza.</div>';  
    }
    else
    {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $car = $_POST['car'];
      $contact = $_POST['contact'];
      $bill = $_POST['bill'];
      $id = $_POST['id'];

      $editquery = $this->pdo->query("UPDATE clients SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', CAR = '$car', CONTACT = '$contact', BILL ='$bill' WHERE ID='$id'");     

      echo '<div class="noerror">Dane klienta zostały zmienione.</div>';
    }
  
  }

	public function showCarInfo($id, $cardatabase, $clientdatabase)
	{
		

  echo '
  <div class="row">
    <div class="col-md-4 col-12 data">
      <p>SAMOCHÓD:</p>';

      $carquery = $this->pdo->prepare("SELECT * FROM {$cardatabase} ca INNER JOIN {$clientdatabase} cl ON ca.CLIENT_ID = cl.ID WHERE CLIENT_ID=:id");
      $carquery -> bindValue(':id',$id, PDO::PARAM_INT);
      $carquery -> execute();

      foreach($carquery as $row)
      {
        echo $row['FIRSTNAME'];
        echo ' '.$row['LASTNAME'];
        echo '</br>';
        echo $row['CAR'];
        $rep = $row['REP'];

      }
      
    echo '</div>
    <div class="col-md-6 col-12 diagnose">
      <div class="diag">
        <p>DIAGNOZA:</p>';

      $carinfoquery = $this->pdo->prepare('SELECT * FROM cars WHERE CLIENT_ID=:id');
      $carinfoquery->bindValue(':id',$id, PDO::PARAM_INT);
      $carinfoquery->execute();

      foreach($carinfoquery as $row)
      {
        echo $row['DIAG'];
        $done = $row['DONE'];
        $id = $row['ID'];
        $client_id = $row['CLIENT_ID'];
      }
      
    if ($done == 0)
    {
      echo '
      <form method="POST" action="cardiagnose.php?id='.$client_id.'">
        <button type="submit" name="diagnose" value="diagnose" class="button2">Uzupełnij diagnozę</button>
      </form>';
    }
    else
    {
      echo '
        <br/><button type="button" disabled>Naprawa Zakończona</button>';
    }
      echo '</div>
    </div>
    <div class="diag-img col-md-12 col-12">';
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
        <br/><br/><center><button type="button" disabled>Naprawa Zakończona</button></center>';
    }
    switch($rep)
    {
      case 0: echo '<img src="../img/0.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 1: echo '<img src="../img/1.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 2: echo '<img src="../img/2.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 3: echo '<img src="../img/3.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 4: echo '<img src="../img/4.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 5: echo '<img src="../img/5.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 6: echo '<img src="../img/6.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 7: echo '<img src="../img/7.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 8: echo '<img src="../img/8.gif" class ="img-fluid" alt="Objawy" />';
        break;
      case 9: echo '';
        break;
    }
    echo '</div>
    <a href="/strona/index.php"><-- Powrót</a>
    </div>';
	}

	public function repair($id)
	{

			$repairquery = $this->pdo->prepare("UPDATE cars SET DONE = 1, REP = 0 WHERE ID = :id");
	    $repairquery->bindValue(':id', $id, PDO::PARAM_INT);
	    $repairquery->execute();
      header('refresh: 1;');
  }
  public function addClient($firstname, $lastname, $street, $postalcode, $town, $car, $contact, $bill)
  {
    if(empty($firstname) || empty($lastname)  || empty($street) || empty($postalcode) || empty($town) || empty($car) || empty($contact) || empty($bill))
    {
      echo '<div class="error">Wystąpił błąd w dodawaniu klienta! Upewnij się, że wypełniłeś wszystkie pola formularza.</div>'; 
    }
    else
    {
      $addclientquery = $this->pdo->query("INSERT INTO clients SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', ADDRESS = '$street', POSTALCODE = '$postalcode', TOWN = '$town', CAR = '$car', CONTACT = '$contact', BILL = '$bill', COMPLETED = 0"); 
      addcar();
    }
    
  }

  function addCar()
  {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $addcarquery = $this->pdo->query("SELECT ID, CAR FROM clients WHERE FIRSTNAME = '$firstname' AND LASTNAME = '$lastname'");
    foreach($stmt as $row)
    {
      $id = $row['ID'];
      $car = $row['Samochod'];
    }
    $addcarquery = $this->pdo->query("INSERT INTO cars SET CAR = '$car', REP = 0, DONE = 0, CLIENT_ID = '$id'");  

  }

  function showDiagnose()
  {

  $ID = $_GET['id'];
  echo '
      <span class="lowlet">Uzupełnienie diagnozy</span>
      <form method="POST" action="cardiagnose.php?id='.$ID.'" class="inter">
        <label>WYWIAD: </label>
        <textarea placeholder="Wywiad" name="adddiagnose"></textarea>
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
      </form><br/>
      <a href="clientadmin.php"><-- Spis Klientów</a>';

  }

  function addDiagnose()
  { 

    $diag = $_POST['adddiagnose'];
    $id = $_GET['id'];;
    $rep = $_POST['diagnr'];

    $diagnosequery = $this->pdo->prepare("SELECT DIAG FROM cars WHERE ID=:id");
    $diagnosequery->bindValue(':id', $id, PDO::PARAM_INT);
    $diagnosequery->execute();

    foreach($diagnosequery as $row)
    {
      $diag1 = $row['DIAG'];
    }

    $updatequery = $this->pdo->prepare("UPDATE cars SET DIAG = '$diag1 $diag', REP = '$rep' WHERE ID = :id");
    $updatequery->bindValue(':id', $id, PDO::PARAM_INT);
    $updatequery->execute();

    header('Location: car.php?id='.$id);

  }

  function error()
  {
   echo '<div class="error">Podałeś nieprawidłowe dane logowania.</br> Sprawdź je i spróbuj ponownie.</div>';
  }
  function deleteClient($table, $id)
  {
    if($id > 0)
    {

      $deletequery = $this->pdo->query("DELETE FROM {$table} WHERE ID ='$id'");     
      
      $deletecarquery = $this->pdo->query("DELETE FROM cars WHERE CLIENT_ID = '$id'");

      echo '<div class="noerror">Klient został usunięty z bazy.</div>';
    }
    else
    {
      echo '<div class="error">Wystąpił błąd podczas usuwania klienta!</div>';  
    }
}
}