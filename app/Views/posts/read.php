<h2><?= $title ?></h2>

Created at: <?php echo $post['created_at']; ?>

<div class="post-body">
	<?php echo $post['body']; ?>
</div>

<hr>

<a class="btn btn-danger" href="<?php echo site_url('posts/delete/'.$post['id']);?>">Delete</a>
<a class="btn btn-primary" href="<?php echo site_url('posts/edit/'.$post['id']);?>">Edit</a>
