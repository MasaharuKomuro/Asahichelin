<?php

class Controller_Restaurant extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'ASAHICHELIN';
		$this->template->content = View::forge('restaurant/index');
	}

	public function action_list()
	{
		$this->template->title = 'ASAHICHELIN List';
		$this->template->content = View::forge('restaurant/list');
	}

	public function action_detail()
	{
		$this->template->title = 'ASAHICHELIN Detail';
		$this->template->content = View::forge('restaurant/detail');
	}

	public function action_form()
	{
		$this->template->title = 'ASAHICHELIN Form';
		$this->template->content = View::forge('restaurant/form');
	}

	public function action_search()
	{
		$this->template->title = 'ASAHICHELIN Search';
		$this->template->content = View::forge('restaurant/search');
	}

}
