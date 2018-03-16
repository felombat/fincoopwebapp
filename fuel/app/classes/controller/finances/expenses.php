<?php

class Controller_Finances_Expenses extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Finances expenses &raquo; Index';
		$this->template->content = View::forge('finances\expenses/index', $data);
	}

	public function action_invoices()
	{
		$data["subnav"] = array('invoices'=> 'active' );
		$this->template->title = 'Finances expenses &raquo; Invoices';
		$this->template->content = View::forge('finances\expenses/invoices', $data);
	}

	public function action_vendors()
	{
		$data["subnav"] = array('vendors'=> 'active' );
		$this->template->title = 'Finances expenses &raquo; Vendors';
		$this->template->content = View::forge('finances\expenses/vendors', $data);
	}

}
