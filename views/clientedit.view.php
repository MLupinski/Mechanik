<?php require 'partials\viewhead.php' ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<span class="lowlet">Edycja klienta</span>
			<form method="POST" action="" class="inter">
				<label>ID: </label>
				<input type="text" placeholder="Identyfikator klienta" name="id">
				<label>Imię: </label>
				<input type="text" placeholder="Imię" name="firstname">
				<label>Nazwisko: </label>
				<input type="text" placeholder="Nazwisko" name="lastname">
				<label>Samochód: </label>
				<input type="text" placeholder="Samochód(marka i rok)" name="car">
				<label>Kontakt: </label>
				<input type="text" placeholder="Kontakt" name="contact">
				<label>Rachunek: </label>
				<input type="text" placeholder="Rachunek (BRUTTO w zł)" name="bill">
				<button type="submit" name="clientedit" value="clientedit" class="button2">Edytuj klienta</button>
			</form>
			<a href="\strona\index.php" class="strz">&larr; Spis Klientów</a>
		</div>
	</div>
</div>

<?php require 'partials\footer.php'; ?>