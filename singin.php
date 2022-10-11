<?php
require "config/constants.php";

$username_email = $_SESSION["singin-data"]["username_email"] ??null;
$password = $_SESSION["singin-data"]["password"] ?? null;


unset($_SESSION["singin-data"]);
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
			<h2>Sing In</h2>
		<?php if(isset($_SESSION['singup-success'])):?>
			<div class="alert__message success">
				<p>
					<?= $_SESSION['singup-success'];
					unset($_SESSION['singup-success']);
				?>
				</p>
			</div>
		<?php elseif(isset($_SESSION['singin'])):?>
			<div class="alert__message error">
				<p>
					<?= $_SESSION['singin'];
					unset($_SESSION['singin']);
				?>
				</p>
			</div>
		<?php endif ?>
		<form action="<?= ROOT_URL ?>singin-logic.php" method="POST">
			<input type="text" name="username_email" value="<?= $username_email?>" placeholder="Username or Email">
			<input type="password" name="password" value="<?= $password ?>" placeholder="password">
			<button type="submit" name="submit" class="btn">Sing Ip</button>
			<small>Don't have an account yet? <a href="singup.php">sing In</a></small>
		</form>
		</div>
	</section>
</body>
</html>