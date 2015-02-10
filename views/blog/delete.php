Are you sure you want to delete the blog post "<?php echo $this->model->title; ?>"?

<form action="/blog/delete" method="POST">
<?php echo $this->input_for('id', '', array('type' => 'hidden', 'value' => $this->model->id)); ?>
<input type="submit" value="Delete" /><a href="javascript:history.go(-1)">Cancel</a>
</form>