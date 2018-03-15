<?php

class Controller_Dashboard extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Dashboard &raquo; Index';
		$this->template->content = View::forge('dashboard/index', $data);
	}

	public function action_report()
	{
		$data["subnav"] = array('report'=> 'active' );
		$this->template->title = 'Dashboard &raquo; Report';
		$this->template->content = View::forge('dashboard/report', $data);
	}

}
