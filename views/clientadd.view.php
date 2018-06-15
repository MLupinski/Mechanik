<?php require 'partials\viewhead.php';  ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<span class="lowlet">Dodawanie klienta</span>
				<form action = "clientadd.php" method="POST" class="inter">

					<label>Imię: </label> <input type="text" placeholder="Imię" name="firstname">
					<label>Nazwisko: </label> <input type="text" placeholder="Nazwisko" name="lastname">
					<label>Ulica(nr domu/nr mieszkania): </label> <input type="text" placeholder="Kolibrowa 32/3" name="street">
					<label>Kod Pocztowy: </label> <input type="text" placeholder="30-001" name="postalcode">
					<label>Miasto: </label> <input type="text" placeholder="Kraków" name="town">
					<label>Samochód: </label> <input type="text" placeholder="Samochód(marka i rok)" name="car">
					<label>Kontakt: </label> <input type="text" placeholder="Kontakt" name="contact">
					<label>Rachunek: </label> <input type="text" placeholder="Rachunek (BRUTTO w zł)" name="bill">					
					<button type="submit" value="add" name="add" class="button2">Dodaj</button>
				</form>
				<a href="\strona\index.php">&larr; Spis Klientów</a>
			</div>
		</div>
	</div>

<?php 

if(isset($_POST['add'])) {

	$app['database']->addClient($_POST['firstname'], $_POST['lastname'], $_POST['street'], $_POST['postalcode'], $_POST['town'], $_POST['car'], $_POST['contact'], $_POST['bill']); 

}
require 'partials\footer.php'; 

?>
