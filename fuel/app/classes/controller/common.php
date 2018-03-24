<?php
use Carbon\Carbon;

class Controller_Common extends Controller_Template
{
	public $template = "_layout/cleanadmin_login";

	public $nav;

	public $push_service;	

	public $current_employee;

	public $current_user;
	
	public $data_payload = null;

	public $directories = array(); 

	//public $subnav = array(); 
	private $app_params = array(); 


	private $filelist  = array();
	 
	public function before()
	{
		parent::before();

		if(!Auth::check()){
		 //$this->template = "_layout/inspinia_login";

		}

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = Model\Auth_User::find($id[1]);
				//$auth = \Auth::instance();
				//$auth->force_login(2);
				//Debug::dump($id[1]); die();
				$this->current_employee = Model_Employee::find('first', 
					/////array( 
						//"related" => array('employee', 
					//////		array(
					//////			"where" =>array(array("user_id", $id[1]))		
					/////		)
						//)
					/////), 
					array( "where" =>array(array("user_id", $id[1]))	));
			}
			break;
		}

		// Pusher config
		$options = array(
		    'cluster' => 'eu',
		    'encrypted' => true
		  );
		$pusher = new \Pusher\Pusher(
		    '3607fe1af3ddf0c619ad',
		    'f6de443b98937cce6a49',
		    '456184',
		    $options
		  );

		$this->push_service = $pusher;

		//$this->current_user = null;

		// Middleware processing
		$dt = new Carbon('5 hours ago');
		if( Auth::check() ){
			$this->data_payload['chats'] = Model_Chat::find('all', array('where' => array( 
													array('created_at','>=' , $dt->timestamp),
													)));
			$this->data_payload['messages'] = Model_Message::find('all', 
					[
						'where' =>  [
							['to_user_id' => $this->current_user->id]
						],
						'limit'=> 5
					]
				);
			$this->data_payload['todos'] = Model_Todo::find('all',
				[
						'where' =>  [
							['created_by' => $this->current_user->id]
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
                    'related' => ['client'],
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

		}

		// Load Config App params
 		$this->app_params = Config::load('app');


		// Session processing
		$session = Session::instance();

		$this->current_session = $session;

		// Navigation processing 
 
		$endpoints = $this->findFiles('../fuel/app/classes/controller', ['php'], ['admin']);

		$path = APPPATH . 'classes/controller/';
		$ignorelist = array('welcome.php', 'pushdemo.php', 'v1.php','apiv1.php','base.php','common.php', 'category.php', 'jobtitle.php',
		 'inspinia.php','silodemo.php', 'admin.php', 'silo.php', 'site.php', 'loading.php', 'machinery.php', 'dashboard.php', 'settings.php', 'bank\transferts.php','expenses.php');
		 $endpoint_set =$this->convert_filelist(\File::read_dir($path), $path, $ignorelist );

		//$endpoint_set = $this->cleanup_filelist($_files, APPPATH.'classes/controller/');
		//Debug::dump($endpoint_set);

		$temp_nav_uri = array(
			array(
			'title' => ucfirst("dasboard"),
				'url'	=> 'dashboard',
				'attrs' => '',
				'icon' => 'fa-th-large',
				'order' => 0,

				'submenu' => []
				)
			);
		$iconset = array(
			//'fa-th-large', 
			//'fa-lock',
			#'fa-building',
			#'fa-address-book',
			//'fa-money',
			#'fa-exchange',    
			#'fa-table',    
			#'fa-bar-chart',    
			'fa-bell-o',
			'fa-bullhorn',
			'fa-comments',
			'fa-industry',
			'fa-plus',
			'fa-envelope',
			 'fa-feed',
			//'fa-bar-chart-o', 
			//'fa-flag-checkered'
			//'fa-gears', 
			'fa-check', 
			'fa-users', 
			'fa-envelop', 
			'fa-star', 
			'fa-file-o', 
			'fa-gear', 'fa-gear', 'fa-gear', 
			'fa-gear', 'fa-gear', 'fa-gear', 
			'fa-gear', 'fa-gear', 'fa-gear', 			
			);

		
 		//$endpoint_set = $tp;
		$tp = array();
 		$tpignlist = array('bank\account.php','bank\transactions.php','bank\transferts.php', 'finances\expenses.php', 'finances\contributions.php', 'admin\employee.php');
 		foreach ($endpoint_set as $key => $value) {
 			if(!in_array($value,$tpignlist)){
 				$tp[] = $value;
 			}
 			 
 		}
		//foreach ($endpoint_set['php'] as $key => $nav_uri) {
		foreach ($tp as $key => $nav_uri) {	 
			$_curent_uri = str_replace('.php', '', $nav_uri);
			$has_sublinks =  preg_split("/\\{1,}/",$_curent_uri ); // explode('\\', $_curent_uri); // preg_split('/[?&@#]/',$s)
			if(count($has_sublinks) ==1)
				list($link ) = $has_sublinks;
			else
				list($link, $subnavi,$subnavi2) = $has_sublinks;

			if(!isset( $subnavi)){
				$temp_nav_uri[] = array(
				'title' => ucfirst($link), //ucfirst($_curent_uri),
				'url'	=> $link,
				'attrs' => '',
				'icon' => $iconset[$key],
				'order' => $key + 1,
				'submenu' => []
					);
			}else{
				$temp_nav_uri[$link][] = array(
				'title' => ucfirst($subnavi), //ucfirst($_curent_uri),
				'url'	=> $subnav,
				'attrs' => '',
				'icon' => $iconset[$key],
				'order' => $key + 1,
				'submenu' => []
					);
			}
			
		};

		$temp_nav_uri[] = array(
			'title' => ucfirst("settings"),
				'url'	=> 'settings',
				'attrs' => '',
				'icon' => 'fa-gears',
				'order' => 100,
				'submenu' => []
				);

 		$temp_nav_uri = Arr::sort($temp_nav_uri, 'order');

		
		// navigation
		$nav = array(
			array(
			'title' => "dasboard",
				'url'	=> 'dashboard',
				'attrs' => '',
				'icon' => 'fa-th-large',
				'submenu' => []
				),
					/*	array(
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
				*/	array(
					'title' => "settings",
						'url'	=> 'settings',
						'attrs' => '',
						'icon' => 'fa-gear',
						'submenu' => []
					),
		); 


		$this->nav = $temp_nav_uri; //$nav;

		$this->current_session->set("returning_visitor", Session::get("returning_visitor"));


		$view = new View;

		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
		View::set_global('current_employee', $this->current_employee);
		View::set_global('nav', $this->nav);
		View::set_global('push_service', $this->push_service);
		View::set_global('data_payload', $this->data_payload);
		View::set_global('app_params', $this->app_params);
		//View::set_global('subnav', $this->subnav);

		//$view->set_safe('data_payload', $this->data_payload, null);
		/*$view->set_safe(array(
			    // 'users' => $users,
			    'data_payload' => $this->data_payload,
			), null);*/

	}

	

	public function glob_recursive($directory, $projectsListIgnore = array(),$recursive_flag = TRUE , &$directories = array() ) {
	        foreach(glob($directory, GLOB_ONLYDIR | GLOB_NOSORT) as $folder) {
	        	if ( !in_array($folder,$projectsListIgnore)) 
				{
		            $this->directories[] = $folder;
		            if($recursive_flag) $this->glob_recursive("{$folder}/*", $this->directories);
		        }
		    }
	}

	public function findFiles($directory, $extensions = array(), $projectsListIgnore = array()) {
	   $this->directories = array();
	    $this->glob_recursive($directory, ['admin'], TRUE);
	    $files = array ();
		foreach($this->directories as $directory) {
			//Debug::dump($directory); die();
		   		if ( !in_array($directory,$projectsListIgnore)) 
				{
			        foreach($extensions as $extension) {
			            foreach(glob("{$directory}/*.{$extension}") as $file) {
			            	if (!preg_match('/test/', $file) 
			            		AND !preg_match('/welcome/', $file)
			            		AND !preg_match('/admin/', $file)
			            		AND !preg_match('/demo/', $file)
			            		AND !preg_match('/base/', $file)
			            		AND !preg_match('/demo/', $file)
			            		AND !preg_match('/common/', $file)
			            		AND !preg_match('/jobtitle/', $file)
			            		AND !preg_match('/inspinia/', $file)
			            		AND !preg_match('/api/', $file)
			            		AND !preg_match('/dashboard/', $file)
			            		AND !preg_match('/settings/', $file)
			            		AND !preg_match('/company/', $file)
			            		AND !preg_match('/item/', $file)
			            		AND !preg_match('/machinery/', $file)
			            		AND !preg_match('/vendor/', $file)
			            		AND !preg_match('/category/', $file)
			            		AND !preg_match('/site/', $file)

			            		) {
			            	//Debug::dump($file); die();

			                	$files[$extension][] = str_replace($directory."/", '', $file);
			            	}
			            }
			        }
		    	}
		}
	    return $files;
	}

	/**
	* Convert Filelist Array to Single Dimension Array
	*
	* @param  array   filelist array of \File::read_dir()
	* @param  string  directory
	* @return array
	*/
	protected function convert_filelist($arr, $dir = '', $projectsListIgnore = array('welcome.php','demo.php'))
	{
		$temp =array();
		foreach ($arr as $key => $val) {
			if (is_array($val)) {
				$this->convert_filelist($val, $dir . $key);
			} else {
				//$this->filelist[] = $dir . $val;
				if ( !in_arrayi($val,$projectsListIgnore)) 
				{
					$temp[]  =  $this->cleanup_filelist($dir . $val);
					$this->filelist[] =  $this->cleanup_filelist($dir . $val);

				}
			}

			//$this->filelist[] = str_replace( $dir."/", '', $val);
		}

		return  $this->filelist ;
	}




	protected function cleanup_filelist($link, $dir = APPPATH.'classes/controller/')
	{
		 
		return  str_replace( $dir, '', $link);;
	}

	public function get_filelist (){
		return $this->filelist;
	}







}
