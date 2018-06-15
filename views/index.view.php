<?php  require 'partials\head.php'; ?>

<div class="con">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="login.php" method="post">
					<label>Username: </label><input type="text" name="login" required/>
					<label>Password: </label><input type="password" name="password" required/>
					<?php 
					if(isset($_SESSION['error'])) {
						$app['database']->error();
						$_SESSION['error'] = false;
					}
					?>
					<input type="submit" value="Login" />
				</form>
			</div>
		</div>
	</div>
</div>

<?php  require 'partials\footer.php'; ?>