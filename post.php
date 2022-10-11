<?php
require 'partials/header.php';

//fetch post from database if id is set 
if(isset($_GET['id'])){
	$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);	
	$query = "SELECT * FROM posts WHERE id=$id";
	$result = mysqli_query($connection, $query);
	$post = mysqli_fetch_assoc($result);
}else{
	header('Location: ' . ROOT_URL . 'news.php');
	die();
}
?>

	<section class="singlepost">
		<div class="conteiner singlepost__conteiner">
			<h2><?= $post['title'] ?></h2>
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
				<div class="post__author-info">						<h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5>
					<small><?= date("d, M, Y -H:i", strtotime($post['dste_time']))?></small>
					</div>
				</div>
			<div class="singlepost__thumbnail">
				<img src="images/<?= $post['thumbnail'] ?>">
			</div>

			<p>
				<?= $post['body']?>
			</p>
		</div>
	</section>

	<!--------------END OF SINGLE POST---------------->

	<section class="category__buttons">
		<div class="conteiner category__buttons-conteiner">
			<a href="" class="category__button">Wild Life</a>
			<a href="" class="category__button">Economy</a>
			<a href="" class="category__button">Tecnology</a>
			<a href="" class="category__button">Art</a>
		</div>
	</section>

	<!-------------END OF CATEGORY SECTION----------------->
	<div class="footer">
		<footer class="footer1">
			<a href="https://youtube.com/" target="__blank"><img src="./images/youtube.png"></a>
		</footer>
		<footer class="footer2">
			<a href="https://instagram.com/" target="__blank"><img src="./images/instagram.png"></a>
		</footer>
		<footer class="footer3">
			<a href="https://facebook.com/" target="__blank"><img src="./images/facebook.png"></a>
		</footer>
	</div>

	<div class="conteiner footer__conteiner">
			<article>
				<h4>Categories</h4>
				<ul>
					<li><a href=""></a></li>
					<li><a href="">Wild Life</a></li>
					<li><a href="">Economy</a></li>
					<li><a href="">Tecnology</a></li>
					<li><a href="">Art</a></li>
				</ul>
			</article>

			<article>
				<h4>Support</h4>
				<ul>
					<li><a href="">Support</a></li>
					<li><a href="">Call</a></li>
					<li><a href="">Emails</a></li>
					<li><a href="">Location</a></li>
				</ul>
			</article>

			<article>
				<h4>News</h4>
				<ul>
					<li><a href="">Safety</a></li>
					<li><a href="">Repair</a></li>
					<li><a href="">Recent</a></li>
					<li><a href="">Popular</a></li>
					<li><a href="">Categories</a></li>
				</ul>
			</article>

			<article>
				<h4>Permalinks</h4>
				<ul>
					<li><a href="">Home</a></li>
					<li><a href="">News</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Services</a></li>
					<li><a href="">Contact</a></li>
				</ul>
			</article>
		</div>

	<div class="footer__copyright">
		<small>Copyright &copy; BNEWS INC</small>
	</div>


	<script type="text/javascript" src="./main.js"></script>
</body>
</html>