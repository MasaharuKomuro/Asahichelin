<?php

class Controller_Post extends Controller_Template
{

	public function action_form()
	{
		$data["subnav"] = array('form'=> 'active' );
		$this->template->title = 'Post &raquo; Form';
		$this->template->content = View::forge('post/form', $data);
	}

}
