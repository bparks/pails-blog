	<h3><a href="<?php echo $model->get_url(); ?>"><?php echo $model->title; ?></a></h3>
	<div class="actions">
		<?php if ($this->is_logged_in()): ?>
		<a href="/blog/<?php echo $model->id; ?>/edit">edit</a> |
		<a href="/blog/<?php echo $model->id; ?>/delete">delete</a>
		<?php endif; ?>
	</div>
	<div class="authorship">
		<?php echo $model->user->username; ?> | <?php echo $model->created_at->setTimezone(new DateTimeZone('America/Denver'))->format('j M, Y h:i:s A'); ?>
	</div>
	<div class="body">
		<?php if ($model->summary): ?>
		<?php echo $model->summary; ?>
		<?php endif; ?>
	</div>
	<div class="read-more">
		<a href="<?php echo $model->get_url(); ?>">Read more</a>
	</div>