<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="form-group">
	<label>Title: </label>
	<input type="text" class="form-control" name="title" placeholder="Title">
</div>
<div class="form-group">
	<label>Text: </label>
	<textarea id="editor1" class="form-control" name="body" placeholder="Write here..."></textarea>
</div>
<br>

<button type="submit" class="btn btn-success">Submit</button>

</form>

