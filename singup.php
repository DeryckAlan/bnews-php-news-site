<?php
require "config/constants.php";

//get back form data if there was error 
$firstname = $_SESSION['singup-data']['firstname'] ?? null;
$lastname = $_SESSION['singup-data']['lastname'] ?? null;
$email = $_SESSION['singup-data']['email'] ?? null;
$username = $_SESSION['singup-data']['username'] ?? null;
$createpassword = $_SESSION['singup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['singup-data']['confirmpassword'] ?? null;

//delete singup data session

unset($_SESSION['singup-data']);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News Web site</title>
	<!-- STYLESHEET-->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<!--INCONCOUT CDN-->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/">
	<!--FONTS-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
	<section class="form__section">
		<div class="conteiner form__section-conteiner">
			<h2>Sing Up</h2>
			<?php if(isset($_SESSION['singup'])): ?>
				<div class="alert__message error">
					<p>
						<?= $_SESSION['singup'];
						unset($_SESSION['singup']);
						?>
					</p>
				</div>
			<?php endif ?>
		<form action="<?= ROOT_URL ?>singup-logic.php" enctype="multipart/form-data" method="POST">
			<input type="text" name="firstname" value="<?=$firstname?>" placeholder="First Name">
			<input type="text" name="lastname" value="<?=$lastname?>" placeholder="Last Name">
			<input type="text" name="email" value="<?=$email?>" placeholder="Email">
			<input type="text" name="username" value="<?=$username?>"placeholder="User name">	
			<input type="password" name="createpassword" value="<?=$createpassword?>"placeholder="Create Password">
			<input type="password" name="confirmpassword" value="" placeholder="Confirm Password">
			<div class="form__control">
				<label for="avatar">User Avatar</label>
				<input type="file" name="avatar" id="avatar">
			</div>
			<button type="submit" name="submit" class="btn">Sing up</button>
			<small>Already have an account? <a href="singin.html">sing In</a></small>
		</form>
		</div>
	</section>
</body>
</html>