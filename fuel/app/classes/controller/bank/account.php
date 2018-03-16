<?php

class Controller_Bank_Account extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Bank account &raquo; Index';
		$this->template->content = View::forge('bank\account/index', $data);
	}

}
