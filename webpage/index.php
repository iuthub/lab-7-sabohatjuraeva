<?php
	include('header.php');
?>

	<?php foreach ($postsRepo->getPosts() as $post): ?>

			<div class="twocols_col">
				<h2><?= $post['title'] ?></h2>
				<p><?= $post['body'] ?></p>
			</div>
						<div class="article-footer">
				<div class="article-meta">
					Edit: <?= $post['postDate'] ?>, Author: <?= $post['username'] ?>
				</div>
				<div class="article-actions">
				<?php if ($_SESSION['isAuth']): ?>
					<a href="edit.php?id=<?=$post['id']?>">Edit</a> | 
					<a href="delete.php?id=<?=$post['id']?>">Delete</a>
				<?php endif ?>

		</div>
			<?php endforeach ?>
	</body>
</html>