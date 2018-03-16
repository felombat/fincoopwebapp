<?php

class Controller_Finances_Contributions extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Finances contributions &raquo; Index';
		$this->template->content = View::forge('finances\contributions/index', $data);
	}

}
