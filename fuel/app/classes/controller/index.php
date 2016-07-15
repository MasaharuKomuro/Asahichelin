<?php

class Controller_Index extends Controller_Template
{

	public function action_post()
	{
		$data["subnav"] = array('post'=> 'active' );
		$this->template->title = 'Index &raquo; Post';
		$this->template->content = View::forge('index/post', $data);
	}

	public function action_list()
	{
		$data["subnav"] = array('list'=> 'active' );
		$this->template->title = 'Index &raquo; List';
		$this->template->content = View::forge('index/list', $data);
	}

	public function action_search()
	{
		$data["subnav"] = array('search'=> 'active' );
		$this->template->title = 'Index &raquo; Search';
		$this->template->content = View::forge('index/search', $data);
	}

	public function action_detail()
	{
		$data["subnav"] = array('detail'=> 'active' );
		$this->template->title = 'Index &raquo; Detail';
		$this->template->content = View::forge('index/detail', $data);
	}

}
