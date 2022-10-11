<?php
include 'partials/header.php';

//get back form data if there was an error
$firstname = $_SESSION["add-user"]["firstname"] ?? null;
$lastname = $_SESSION["add-user"]["lastname"] ?? null;
$username = $_SESSION["add-user"]["username"] ?? null;
$email = $_SESSION["add-user"]["email"] ?? null;
$createpassword = $_SESSION["add-user"]["createpassword"] ?? null;
$confirmpassword = $_SESSION["add-user"]["confirmpassword"] ?? null;

//delete session data
unset($_SESSION["add-user-data"]);
?>


	<section class="form__section">
		<div class="conteiner form__section-conteiner">
			<h2>Add User</h2>
		<?php if(isset($_SESSION["add-user"])):?>
			<div class="alert__message error">
				<p><?= $_SESSION["add-user"];
				unset($_SESSION["add-user"]);
				 ?></p>
			</div>
		<?php endif ?>
		<form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
			<input type="text" name="firstname" value="<?= $firstname ?>" placeholder="First Name">
			<input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Last Name">
			<input type="text" name="email" value="<?= $email ?>" placeholder="Email">
			<input type="text" name="username" value="<?= $username ?>" placeholder="User name">	
			<input type="Password" name="createpassword" value="<?= $createpassword ?>" placeholder="Create Password">
			<input type="Password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Confirm Password">
			<select name="userrole">
				<option value="0">Author</option>
				<option value="1">Admin</option>
			</select>
			<div class="form__control">
				<label for="avatar">User Avatar</label>
				<input type="file" name="avatar" id="avatar">
			</div>
			<button type="submit" name="submit" class="btn">Sing up</button>
		</form>
		</div>
	</section>

	<section class="category__buttons">
		<div class="conteiner category__buttons-conteiner">
			<a href="" class="category__button">Wild Life</a>
			<a href="" class="category__button">Economy</a>
			<a href="" class="category__button">Tecnology</a>
			<a href="" class="category__button">Art</a>
		</div>
	</section>

	<!-------------END OF CATEGORY SECTION----------------->


<?php
include '../partials/footer.php';
?>