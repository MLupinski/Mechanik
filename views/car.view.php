<?php require 'partials\viewhead.php'; ?>

<div class="container con2">
	<div class="row">
		<div class="col-md-12">
		<?php 
			$id = $_GET['id'];
			$app['database']->showCarInfo($id, 'cars', 'clients');
			if(isset($_POST['repair'])) {
				$app['database']->repair($id); 	
			}
			
		?>
		</div>
	</div>	
</div>

<?php  require 'partials\footer.php'; ?>