<?php 
require 'partials\viewhead.php'; 
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php 
			$app['database']->showDiagnose();

			if(isset($_POST['adddiag'])){
	
				$app['database']->addDiagnose();
			} ?>	
		</div>
	</div>
</div>


<?php require 'partials\footer.php'; ?>
