<?php
require 'partials\head.php'; 
require 'partials\nav.php'; 
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
    	<br/>
      <?php $app['database']->showClient('clients'); ?>
    </div>
  </div>
</div>
<?php require 'partials\footer.php'; ?> 