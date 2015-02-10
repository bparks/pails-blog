<h2>Blog</h2>
<div class="actions">
	<?php if ($this->is_logged_in()): ?>
	<a href="/blog/new">new blog</a>
	<?php endif; ?>
</div>
<?php foreach ($this->model as $blog): ?>
<div class="blog blog-<?php echo $blog->id; ?>">
	<?php $this->render_partial('blog/_blog_summary', $blog); ?>
</div>
<?php endforeach; ?>