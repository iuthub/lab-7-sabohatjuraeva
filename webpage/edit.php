<?php  
	include('header.php');

	// block editing
	if(!$_SESSION['isAuth']) redirect('index.php');

	$id = isset($_GET['id'])?$_GET['id']:'';
	$title = "";
	$body = "";

	if($id) {
		$row=$postsRepo->getPost($id);
		$title = $row['title'];
		$body = $row['body'];
	}


	$titlePattern = "/^.+$/i";
	$bodyPattern = "/^.+$/i";

	$isValid = TRUE;

	if($isPost) {
		$title = $_REQUEST['title'];
		$body = $_REQUEST['body'];
	}
?>
		
<!-- main part -->
<div class="main">
	<div class="article">
		<div class="article-header">
			<h2>Post Details</h2>
		</div>
		<div class="article-body">
			<table>
				<tr>
					<td>Title</td>
					<td>
						<input type="text" style="width:400px;" name="title" form="postForm" value="<?= $title ?>"/>
						<?php if ($isPost && !preg_match($titlePattern, $title)): $isValid=false; ?>
							<span class="error">Required field.</span>	
						<?php endif ?>
						
					</td>
				</tr>
				<tr>
					<td>Body</td>
					<td>
						<textarea name='body' form='postForm' style="width:400px;" rows="10" cols="50"><?= $body ?></textarea>
					</td>
				</tr>
				
			</table>
			<?php  
				if($isPost && $isValid) {

					if ($id) {
						$postsRepo->updatePost($id, $title, $body);	
					} else {
						$postsRepo->addPost($title, $body, $_SESSION['user']['username']);	
					}
					redirect('index.php');
				}
			?>
		</div>
		<div class="article-footer">
			<div class="article-meta">
				
			</div>
			<div class="article-actions">
				<form id="postForm" action="edit.php?id=<?= $id ?>" method="post">
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>