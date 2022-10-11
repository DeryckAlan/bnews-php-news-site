<?php
include 'partials/header.php';

//fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

//fetch 9 posts from posts table
$query = "SELECT * FROM posts ORDER BY dste_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

	<!--show featured post if there's any problem-->
	<?php if(mysqli_num_rows($featured_result) == 1): ?>
	<section class="featured">
		<div class="conteiner featured__conteiner">
			<div class="post__thumbnail">
				<img src="./images/<?= $featured['thumbnail']?>">
			</div>
			<div class="post_info">
				<?php
				//fetch category from categories table using category_id of post
				$category_id = $featured['category_id'];
				$category_query = "SELECT * FROM categories WHERE id=$category_id";
				$category_result = mysqli_query($connection, $category_query);
				$category = mysqli_fetch_assoc($category_result);
				?>
				<a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
				<h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title']?></a></h2>
				<p class="post__body"><?= substr($featured['body'], 0, 300)?>...</p>
				<div class="post__author">
					<?php
					//fetch author from users table using author_id
					$author_id = $featured['author_id'];
					$author_query = "SELECT * FROM users WHERE id=$author_id";
					$author_result = mysqli_query($connection, $author_query);
					$author = mysqli_fetch_assoc($author_result);
					?>
					<div class="post__author-avatar">
						<img src="./images/<?= $author['avatar']?>">
					</div>
					<div class="post__author-info">
						<h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
						<small><?= date("d, M, Y -H:i", strtotime($featured['dste_time']))?></small>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif ?>
	<!---------------END OF FEATURED-------------------->

	<section class="posts <?= $featured ? '' : 'session_extra-margin' ?>">
		<div class="conteiner posts__conteiner">
			<?php while($post = mysqli_fetch_assoc($posts)): ?>
			<article class="post">
				<div class="post__thumbnail">
					<img src="./images/<?= $post['thumbnail']?>">
				</div>
				<div class="post__info">
					<?php
					//fetch category from categories table using category_id of post
					$category_id = $post['category_id'];
					$category_query = "SELECT * FROM categories WHERE id=$category_id";
					$category_result = mysqli_query($connection, $category_query);
					$category = mysqli_fetch_assoc($category_result);
					?>
					<a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id']?>" class="category_button"><?= $category['title'] ?></a>
					<h3 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title']?></a></h3>
					<p class="post__body"><?= substr($post['body'], 0, 150)?>...</p>
					<div class="post__author">
						<?php
						//fetch author from users table using author_id
						$author_id = $post['author_id'];
						$author_query = "SELECT * FROM users WHERE id=$author_id";
						$author_result = mysqli_query($connection, $author_query);
						$author = mysqli_fetch_assoc($author_result);
						?>
						<div class="post__author-avatar">
							<img src="./images/<?= $author['avatar']?>">
						</div>
						<div class="post__author-info">
							<h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
							<small><?= date("d, M, Y -H:i", strtotime($post['dste_time']))?></small>
						</div>
					</div>
				</div>
			</article>
			<?php endwhile ?>
		</div>
	</section>
	<!-------------------END OF POSTS SECTION----------------------->


	<section class="category__buttons">
		<div class="conteiner category__buttons-conteiner">
			<?php
			$all_categories_query = "SELECT * FROM categories";
			$all_categories = mysqli_query($connection, $all_categories_query);
			?>
			<?php while($category = mysqli_fetch_assoc($all_categories)):?>
				<a href="<?= ROOT_URL ?>category-posts.php?id=<= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
			<?php endwhile ?>
		</div>
	</section>

	<!-------------END OF CATEGORY SECTION----------------->

<?php
include "partials/footer.php";
?>