<?php

class Controller_Bank_Transferts extends Controller_Admin
{
	public $template = "_layout/inspinia";
	
	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Bank transferts &raquo; Index';
		$this->template->content = View::forge('bank\transferts/index', $data);
	}

}
