<?php echo validation_errors(); ?>
<?php echo $this->session->flashdata('login_msg'); ?>
<!DOCTYPE html>
<html lang="">

	<head>
	
	<link rel="stylesheet" href="<?php echo base_url('../resources/css/bootstrap.min.css'); ?>"/>

	</head>

		<body>
			<div class="container">
			<h3>Login</h3>
			<hr>
			<form action="<?php echo base_url('login/do_login')?>" method="POST">
				<div class="form-group">
					<label for="cari">USUARIO</label>
					<input type="text" name="usuario" id="usuario" class="form-control">

				</div>

				<div class="form-group">
					<label for="cari">CONTRASEÑA</label>
					<input type="password" name="contrasena" id="contrasena" class="form-control">

				</div>

				<input class="btn btn-primary" type="submit" value="Login" name="login">
				<input class="btn btn-primary" type="reset" value="Reset">

			</form>
				</div>



		</body>
</html>