<?php
class BlogController extends \Pails\Controller
{
	use PailsAuthentication;
	use FormBuilder;

	public $before_actions = array(
		'require_login' => array('only' => array('new', 'create', 'update', 'delete'))
	);

	function index ()
	{
		$this->model = Blog::all(array('order' => 'created_at desc'));
	}

	function create ()
	{
		$node = Node::create(array(
			'title' => $_POST['title'],
			'slug' => $_POST['slug'],
			'type' => 'blog'
		));

		$node_body = NodeBody::create(array(
			'content' => $_POST['body'],
			'node_id' => $node->id
		));

		$blog = Blog::create(array(
			'summary' => $_POST['summary'],
			'node_id' => $node->id,
			'user_id' => $this->current_user()->user_id
		));

		$this->model = $blog->get_url();
		return 302;
	}

	function update ()
	{
		$node = Node::find($_POST['id']);
		$node->title = $_POST['title'];
		$node->slug = $_POST['slug'];
		$node->save();

		if ($node->node_body)
		{
			$node->node_body->content = $_POST['body'];
			$node->node_body->save();
		}
		else
		{
			NodeBody::create(array(
				'content' => $_POST['body'],
				'node_id' => $node->id
			));
		}

		if ($node->blog)
		{
			$node->blog->summary = $_POST['summary'];
			$node->blog->save();
		}
		else
		{
			Blog::create(array(
				'summary' => $_POST['summary'],
				'node_id' => $node->id,
				'user_id' => $this->current_user()->user_id
			));
		}

		$this->model = $node->get_url();
		return 302;
	}

	function delete ()
	{
		$node = Node::find($_POST['id']);
		$node->node_body->delete();
		$ndoe->blog->delete();
		$node->delete();

		$this->model = '/blog';
		return 302;
	}

	//Handle everything else
	function __call($name, $arguments) {
		if ($name == 'new') {
			$this->require_login();
			$this->view = 'blog/new';
			return;
		}

		if (intval($name) > 0)
			$this->model = Node::find_by_id($name);
		else
			$this->model = Node::find_by_slug($name);

		if (!($this->model))
		{
			$this->view = false;
			return 404;
		}

		if (count($arguments) > 0)
		{
			$opts = $arguments[0];
			if ($opts[0] == 'edit')
			{
				$this->require_login();
				$this->view = 'blog/edit';
			}
			elseif ($opts[0] == 'delete')
			{
				$this->require_login();
				$this->view = 'blog/delete';
			}
			else
				$this->view = 'node/show';
		}
		else
		{
			$this->view = 'node/show';
		}
	}
}