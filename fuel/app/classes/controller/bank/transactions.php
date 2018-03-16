<?php

class Controller_Bank_Transactions extends Controller_Admin
{
	public $template = "_layout/inspinia";
	
	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Bank transactions &raquo; Index';
		$this->template->content = View::forge('bank\transactions/index', $data);
	}

}
