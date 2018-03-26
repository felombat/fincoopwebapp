<?php

use Carbon\Carbon;


class Controller_Base extends Controller_Template
{
	public $template = "_layout/cleanadmin";

	public $nav;

	public $push_service;	

	public $current_user;

	public $current_employee;


	public $data_payload;

	private $app_params = array();

	public function before()
	{
		parent::before();


        if(!Session::get('lang')){
            Session::set('lang', 'fr');
        }
        Config::set('language', Session::get('lang'));
        Lang::load('lang');

		if(!Auth::check()){
		 //$this->template = "_layout/inspinia_login";

		}

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
				$this->current_employee = Model_Employee::find('first', 
					/////array( 
						//"related" => array('employee', 
					//////		array(
					//////			"where" =>array(array("user_id", $id[1]))		
					/////		)
						//)
					/////), 
					array(
						
								"where" =>array(array("user_id", $id[1]))		
							));

			}
			break;
		}

		// Pusher config
		// $options = array(
		//     'cluster' => 'eu',
		//     'encrypted' => true
		//   );
		// $pusher = new \Pusher\Pusher(
		//     '3607fe1af3ddf0c619ad',
		//     'f6de443b98937cce6a49',
		//     '456184',
		//     $options
		//   );

		// $this->push_service = $pusher;

		$this->current_user = null;

		// Middleware processing
		$this->data_payload['chats'] = Model_Chat::find('all');
		$this->data_payload['messages'] = Model_Message::find('all');
		$this->data_payload['todos'] = Model_Todo::find('all');

		// Middleware processing
		$dt = new Carbon('5 hours ago');
		if( Auth::check() ){
			$this->data_payload['chats'] = Model_Chat::find('all', array('where' => array( 
													array('created_at','>=' , $dt->timestamp),
													)));
			$this->data_payload['messages'] = Model_Message::find('all', 
					[
						'where' =>  [
							['to_user_id' => $this->current_employee->user_id]
						],
						'limit'=> 5
					]
				);
			$this->data_payload['todos'] = Model_Todo::find('all',
				[
						'where' =>  [
							['created_by' => $this->current_employee->user_id]
						],
						'limit'=> 5
					]);
            $this->data_payload['accounts'] = Model_Account::find('all',
                [
                    'where' =>  [
                        ['company_id' => 1] // $this->employee_user->company_id
                    ],
                    'order_by'=> ["name" => "asc"]
                ]);
            $this->data_payload['contributions'] = Model_Contribution::find('all',
                [
                    'related' => ['client', 'category'],
                    'where' =>  [
                        ['company_id' => 1] // $this->employee_user->company_id
                    ],
                    'order_by'=> ["paid_at" => "desc"]
                ]);
		}else{
			$this->data_payload['chats'] = array();
			$this->data_payload['messages'] = array();
			$this->data_payload['todos'] = array();
            $this->data_payload['accounts'] = array();
            $this->data_payload['contributions'] = array();

		}

        // Load Config App params
        $this->app_params = Config::load('app');
		

		$session = Session::instance();

		$this->current_session = $session;
		
		// navigation
		$nav = array(
			array(
			'title' => "dasboard",
				'url'	=> 'dashboard',
				'attrs' => '',
				'icon' => 'fa-th-large',
				'submenu' => []
				),
	/*		array(
			'title' => "exams",
				'url'	=> 'exams',
				'attrs' => '',
				'icon' => '',
				'submenu' => []
				),
			array(
			'title' => "student",
				'url'	=> 'student',
				'attrs' => '',
				'icon' => 'fa-user',
				'submenu' => []
				),
			array(			
			'title' => "subject",
				'url'	=> 'subject',
				'attrs' => '',
				'icon' => 'fa-file-o',
				'submenu' => []
				),
			array(
			'title' => "teacher",
				'url'	=> 'teacher',
				'attrs' => '',
				'icon' => 'fa-users',
				'submenu' => []
				),
			array(
			'title' => "class",
				'url'	=> 'class',
				'attrs' => '',
				'icon' => 'fa-star',
				'submenu' => []
				),
			array(
			'title' => "school",
				'url'	=> 'educationcenter',
				'attrs' => '',
				'icon' => 'fa-building',
				'submenu' => []
				),
			array(
			'title' => "Grade",
				'url'	=> 'grade',
				'attrs' => '',
				'icon' => 'fa-bar-chart-o',
				'submenu' => []
				),
	 */		array(
	     	'title' => "settings",
				'url'	=> 'settings',
				'attrs' => '',
				'icon' => 'fa-gear',
				'submenu' => []
			),
		); 


		$this->nav = $nav;

		$this->current_session->set("returning_visitor", Session::get("returning_visitor"));


		

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
		View::set_global('current_employee', $this->current_employee);
		View::set_global('nav', $this->nav);
		//View::set_global('push_service', $this->push_service);
		View::set_global('data_payload', $this->data_payload);
		View::set_global('app_params', $this->app_params);
	}


	public function glob_recursive($directory, &$directories = array()) {
	        foreach(glob($directory, GLOB_ONLYDIR | GLOB_NOSORT) as $folder) {
	            $directories[] = $folder;
	            $this->glob_recursive("{$folder}/*", $directories);
	        }
	}

	public function findFiles($directory, $extensions = array()) {
	   
	    $this->glob_recursive($directory, $directories);
	    $files = array ();
	    foreach($directories as $directory) {
	        foreach($extensions as $extension) {
	            foreach(glob("{$directory}/*.{$extension}") as $file) {
	                $files[$extension][] = $file;
	            }
	        }
	    }
	    return $files;
	}

}
