<!-- Flashdata messages -->

<?php if(isset($_SESSION['post_edit'])): ?>
	<?php echo '<p class="alert alert-success">'.$_SESSION['post_edit'].'</p>'; ?>

<?php elseif (isset($_SESSION['post_created'])): ?>
	<?php echo '<p class="alert alert-success">'.$_SESSION['post_created'].'</p>'; ?>

<?php elseif (isset($_SESSION['post_delete'])): ?>
	<?php echo '<p class="alert alert-danger">'.$_SESSION['post_delete'].'</p>'; ?>

<?php endif; ?>

<!-- Begin content -->

<h2><?= $title ?></h2>

<p><a class="btn btn-success" href="<?php echo site_url('/posts/create');?>">Create a new message</a></p>

<?php foreach($posts as $post) : ?>
	<hr>
	<h3><?php echo $post['title']; ?></h3>

	Created at: <?php echo $post['created_at']; ?>
	<br>
	<?php echo $post['body']; ?>
	<br><br>

	<p><a class="btn btn-primary" href="<?php echo site_url('/posts/read/'.$post['id']);?>">More</a></p>

<?php endforeach; ?>
