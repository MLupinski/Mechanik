<?php 

require 'partials\viewhead.php';

if(isset($_POST['clientedit']))
{

	$app['database']->editClient('clients');
	$id = $_POST['id'];
	$clientsdata = $app['database']->selectAll('clients', $id);
	header('refresh:3;url=clientadmin.php');

}

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<span class="lowlet">Edycja klienta</span>
			<?php foreach($clientsdata as $data) : ?>
			<?= '<form method="POST" action="clientedit.php?='.$id.'" class="inter">'; ?>
				<?= '<input type="text" placeholder="Identyfikator klienta" name="id" value="'.$data->ID.'" hidden>'; ?>
				<label>Imię: </label>
				<?= '<input type="text" placeholder="Imię" name="firstname" value="'.$data->FIRSTNAME.'">'; ?>
				<label>Nazwisko: </label>
				<?= '<input type="text" placeholder="Nazwisko" name="lastname" value="'.$data->LASTNAME.'">'; ?>
				<label>Samochód: </label>
				<?= '<input type="text" placeholder="Samochód(marka i rok)" name="car" value="'.$data->CAR.'">'; ?>
				<label>Kontakt: </label>
				<?= '<input type="text" placeholder="Kontakt" name="contact" value="'.$data->CONTACT.'">'; ?>
				<label>Rachunek: </label>
				<?= '<input type="text" placeholder="Rachunek (BRUTTO w zł)" name="bill" value = "'.$data->BILL.'">'; ?>
				<button type="submit" name="clientedit" value="clientedit" class="button2">Edytuj klienta</button>
			</form>
			<?php endforeach; ?>
			<a href="\strona\index.php" class="strz">&larr; Spis Klientów</a>
		</div>
	</div>
</div>

<?php require 'partials\footer.php'; ?>