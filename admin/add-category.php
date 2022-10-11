<?php
include 'partials/header.php';

//get back form data if invalid
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>


	<section class="form__section">
		<div class="conteiner form__section-conteiner">
			<h2>Add Category</h2>
			<?php if(isset($_SESSION['add-category'])):?>
				<div class="alert__message error">
				<p>
					<?= $_SESSION['add-category'];
					unset($_SESSION['add-category']);?>
				</p>
			</div>
		<?php endif ?>
		<form action="<?= ROOT_URL ?>admin/add-category-logic.php" enctype="multipart/form-data" method="POST">
			<input type="text" name="title" value="<?= $title ?>" placeholder="Title">
			<textarea rows="4" name="description" value="<?= $description?>" placeholder="Description"></textarea>
			<button type="submit" name="submit" class="btn">Add Category</button>
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
include "../partials/footer.php";
?>