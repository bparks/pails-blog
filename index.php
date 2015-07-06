<?php
//Include relevant models
require_once(__DIR__.'/models/Blog.php');

if (defined('ADMIN_MENU_SLUG'))
{
	Menu::add_static_item(ADMIN_MENU_SLUG, 'Blogs', '/blog');
}