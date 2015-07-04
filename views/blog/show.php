<h2><?php echo $this->model->title; ?></h2>
<div class="actions">
	<?php if ($this->is_logged_in()): ?>
	<a href="/blog/<?php echo $this->model->id; ?>/edit">edit</a> |
	<a href="/blog/<?php echo $this->model->id; ?>/delete">delete</a>
	<?php endif; ?>
</div>
<div class="blog">
	<div class="body">
		<?php echo $this->model->node_body->content; ?>
	</div>
</div>