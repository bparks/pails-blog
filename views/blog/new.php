<script src="/vendor/pails/content/ckeditor/ckeditor.js"></script>

<form action="/blog/create" method="POST">
<?php echo $this->input_for('title', 'Title'); ?>
<?php echo $this->input_for('slug', 'Slug'); ?>
<?php echo $this->input_for('summary', 'Summary', array('type' => 'textarea', 'class' => 'ckeditor')); ?>
<?php echo $this->input_for('body', 'Content', array('type' => 'textarea', 'class' => 'ckeditor')); ?>
<input type="submit" value="Save" />
</form>

<script>
CKEDITOR.replace('.ckeditor');
</script>