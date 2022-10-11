<?php
require 'config/database.php';

//fetch current user from database

if(isset($_SESSION["user-id"])){
	$id = filter_var($_SESSION["user-id"], FILTER_SANITIZE_NUMBER_INT);
	$query = "SELECT avatar FROM users WHERE id='$id'";
	$result = mysqli_query($connection, $query);
	$avatar = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News Web site</title>
	<!-- STYLESHEET-->
	<link rel="stylesheet" type="text/css" href="<?= ROOT_URL?>css/style.css">
	<!--INCONCOUT CDN-->
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/">
	<!--FONTS-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
	<nav>
		<div class="conteiner nav__conteiner">
			<a href="<?= ROOT_URL?>" class="nav__logo">BNEWS</a>
			<ul class="nav__items">
				<li><a href="<?= ROOT_URL?>news.php">news</a></li>
				<li><a href="<?= ROOT_URL?>about.php">about</a></li>
				<li><a href="<?= ROOT_URL?>services.php">services</a></li>
				<li><a href="<?= ROOT_URL?>contact.php">contact</a></li>
				<li><a href="<?= ROOT_URL?>singin.php">singin</a></li>
				<?php if(isset($_SESSION["user-id"])): ?>
					<li class="nav__profile">
					<div class="avatar">
						<img src="<?= ROOT_URL . 'images/'. $avatar['avatar'];?>">
					</div>
					<ul>
						<li><a href="<?= ROOT_URL?>admin/index.php">Dashboard</a>Dashboard</li>
						<li><a href="<?= ROOT_URL?>logout.php">Logout</a>Logout</li>
					</ul>
				</li>
				<?php else : ?>
					<li><a href="<?= ROOT_URL?>singin.php">singin</a></li>
				<?php endif ?>
			</ul>	
			<button id="open__nav-btn"><img src="./images/menu.png"></button>	
			<button id="close__nav-btn"><img src="./images/close.png"></button>	
		</div>
	</nav>

	<!-----------END OF NAV ---------------->