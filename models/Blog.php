<?php
Node::$has_one[] = array('blog');

class Blog extends ActiveRecord\Model
{
	static $delegate = array(
		array('id', 'title', 'type', 'slug', 'node_body', 'to' => 'node')
	);

	static $belongs_to = array(
		array('node'),
		array('user')
	);

	function get_url() {
		if (strlen($this->slug) == 0)
			return '/blog/' . $this->id;
		return '/blog/' . $this->slug;
	}
}