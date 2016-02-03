<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login/Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
	<div class = "container-fluid">
		<h1> Welcome! </h1>
		<?= $this->session->flashdata('errors') ?>
		
		<?= $this->session->flashdata('success') ?>

		<div class = "row"> 
			<div class = "col-md-6">
				<form action = "users/registration" method = "post">
					<h3> Register </h3>
					<p>
						Name:
						<input type = "text" name = "name">
					</p>
					<p>
						Username:
						<input type = "text" name = "user_name">
					</p>
					<p>
						Email:
						<input type = "email" name = "email">
					</p>
					<p>
						Password:
						<input type = "password" name = "password">
						***Password should be at least 8 characters long
					</p>
					<p>
						Confirm Password:
						<input type = "password" name = "password_confirmation">
					</p>
					<p>
						Birthday:
						<input type = "date" name = "birthday">
					</p>
					<input type = "submit" value = "Register">
				</form>
			</div>
			<div class = "col-md-6">
				<form action = "users/login" method = "post">
					<h3> Login </h3>
					<p>
						Email:
						<input type = "email" name = "login_email">
					</p>
					<p>
						Password:
						<input type = "password" name = "login_password">
					</p>
					<input type = "submit" value = "Login">
				</form>
			</div>
		</div>
	</div>
</body>
</html>