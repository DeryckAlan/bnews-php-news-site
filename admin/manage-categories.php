<?php
include "partials/header.php";

//fetch categories from database
$query = "SELECT * FROM categories ORDER BY title";
$categories = mysqli_query($connection, $query);
?>


	<section class="dashboard">
		<?php if(isset($_SESSION["add-category-success"])): //show if add category was successful?>
			<div class="alert__message success">
				<p>
					<?= $_SESSION['add-category-success'];	
					unset($_SESSION['add-category-success']);
					?>
				</p>
			</div>
		<?php elseif(isset($_SESSION["add-category"])): //show if add category was not successful?>
			<div class="alert__message error">
				<p>
					<?= $_SESSION['add-category-error'];	
					unset($_SESSION['add-category-error']);
					?>
				</p>
			</div>
		<?php elseif(isset($_SESSION["edit-category"])): //show if edited category was not successful?>
			<div class="alert__message error">
				<p>
					<?= $_SESSION['edit-category-error'];	
					unset($_SESSION['edit-category-error']);
					?>
				</p>
			</div>
		<?php elseif(isset($_SESSION["edit-category-success"])): //show if edited category was successful?>
			<div class="alert__message success">
				<p>
					<?= $_SESSION['edit-category-success'];	
					unset($_SESSION['edit-category-success']);
					?>
				</p>
			</div>
		<?php elseif(isset($_SESSION["delete-category-success"])): //show if delete category was successful?>
			<div class="alert__message success">
				<p>
					<?= $_SESSION['delete-category-success'];	
					unset($_SESSION['delete-category-success']);
					?>
				</p>
			</div>
		<?php endif ?>
		<div class="conteiner dashboard__conteiner">
			<button id="show__sidebar-btn" class="sidebar__toggle">></button>
			<button id="hide__sidebar-btn" class="sidebar__toggle"><</button>
			<aside>
				<ul>
					<li>
						<a href="add-post.php"><img src="images/add.png"><h5>Add Post</h5></a>
					</li>
					<li>
						<a href="index.php"><img src="images/publish.png"><h5>Manage Posts</h5></a>
					</li>
					<?php if(isset($_SESSION["user_is_admin"])):?>

					<li>
						<a href="add-user.php"><img src="images/add-user.png"><h5>Add User</h5></a>
					</li>
					<li>
						<a href="manage-users.php"><img src="images/manage-user.png"><h5>Manage Users</h5></a>
					</li>
					<li>
						<a href="add-category.php"><img src="images/add.png"><h5>Add Category</h5></a>
					</li>
					<li>
						<a href="manage-categories.php" class="active"><img src="images/update.png"><h5>Manage Categories</h5></a>
					</li>
				<?php endif ?>
				</ul>
			</aside>
			<main>
				<h2>Manage Categories</h2>
				<?php if(mysqli_num_rows($categories) > 0): ?>
				<table>
					<thead>
						<tr>
							<th>Title</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php while($category = mysqli_fetch_assoc($categories)): ?>
						<tr>
							<td><?= $category['title']?></td>
							<td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id']?>" class="btn sm">Edit</a></td>
							<td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id']?>" class="btn sm danger">Delete</a></td>
						</tr>
						<?php endwhile ?>
					</tbody>
				</table>
				<?php else: ?>
					<div class="alert__message error"><?= "no categories found"?></div>
				<?php endif ?>
			</main>
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