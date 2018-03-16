<?php

class Controller_Settings extends Controller_Admin
{
	//public $template = "_layout/inspinia";
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Settings &raquo; Index';
		$this->template->content = View::forge('settings/index', $data);
	}

	public function action_general()
	{
		$data["subnav"] = array('general'=> 'active' );
		$this->template->title = 'Settings &raquo; General';
		$this->template->content = View::forge('settings/general', $data);
	}

	public function action_company()
	{
		$data["subnav"] = array('company'=> 'active' );
		$this->template->title = 'Settings &raquo; Company';
		$this->template->content = View::forge('settings/company', $data);
	}

	public function action_roles()
	{
		$data["subnav"] = array('roles'=> 'active' );
		$this->template->title = 'Settings &raquo; Roles';
		$this->template->content = View::forge('settings/roles', $data);
	}

	public function action_notifications()
	{
		$data["subnav"] = array('notifications'=> 'active' );
		$this->template->title = 'Settings &raquo; Notifications';
		$this->template->content = View::forge('settings/notifications', $data);
	}

	public function action_emailing()
	{
		$data["subnav"] = array('emailing'=> 'active' );
		$this->template->title = 'Settings &raquo; Emailing';
		$this->template->content = View::forge('settings/emailing', $data);
	}

	public function action_modules()
	{
		$data["subnav"] = array('modules'=> 'active' );
		$this->template->title = 'Settings &raquo; Modules';
		$this->template->content = View::forge('settings/modules', $data);
	}

	public function action_users()
	{
		$data["subnav"] = array('users'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; Users';
		$this->template->content = View::forge('settings/users', $data);
	}

	public function action_item()
	{
		$data["subnav"] = array('item'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');
		$data['items'] = Model_Item::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; Itemms';
		$this->template->content = View::forge('settings/items', $data);
	}

	public function action_site()
	{
		$data["subnav"] = array('site'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');
		$data['sites'] = Model_Site::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; sites';
		$this->template->content = View::forge('settings/sites', $data);
	}

	public function action_vendor()
	{
		$data["subnav"] = array('vendor'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');
		$data['vendors'] = Model_Vendor::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; vendors';
		$this->template->content = View::forge('settings/vendors', $data);
	}

	public function action_category()
	{
		$data["subnav"] = array('category'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');
		$data['categories'] = Model_Category::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; categories';
		$this->template->content = View::forge('settings/categories', $data);
	}

	public function action_machinery()
	{
		$data["subnav"] = array('machinery'=> 'active' );

		$data['jobtitles'] = Model_Jobtitle::find('all');
		$data['users'] = Model_User::find('all');
		$data['employees'] = Model_Employee::find('all');
		$data['machineries'] = Model_Machinery::find('all');

		//$this->template->title = "Jobtitles";
		//$this->template->content = View::forge('jobtitle/index', $data);

		$this->template->title = 'Settings &raquo; machineries';
		$this->template->content = View::forge('settings/machineries', $data);
	}

}
