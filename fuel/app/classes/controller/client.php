<?php

class Controller_Client extends Controller_Admin
{
	public $template = "_layout/cleanadmin";

	public function action_index()
	{
		$data['subnav'] = ["index" => 'active'];
		$data['clients'] = Model_Client::find('all', array(
				//'where' => array(
				//	 array('created_by' => $this->current_user->id ),
				//)
			));
		$this->template->title = "Clients";
		$this->template->content = View::forge('client/index', $data);

	}

	public function action_view($id = null)
	{
		$data['subnav'] = ["view" => 'active'];
		is_null($id) and Response::redirect('client');

		if ( ! $data['client'] = Model_Client::find($id))
		{
			Session::set_flash('error', 'Could not find client #'.$id);
			Response::redirect('client');
		}

		$this->template->title = "Client";
		$this->template->content = View::forge('client/view', $data);

	}

	public function action_create()
	{

		$data['subnav'] = ["create" => 'active'];
		if (Input::method() == 'POST' )
		{
			$val = Model_Client::validate('create');

				$auth = \Auth::instance();
		        if ($val->run()){


		            
		            //$user = \Model_User::forge();
		           

		            // $user_data = array(
		            //     'username' => 'f.elombat',
		            //     'password' => 'Dare2Impress',
		            //     'email' => 'f.elombat@gmail.com',
		            //     'group' => 100,
		            //     'profile_fields' => array(
		            //     	'fullname' => 'Franck Elombat',
		            //     	'jobtitle' => 'CTO'
		            //     	),
		            // 	);

		             /*$user_data = array(
		             	'username' => Input::post('first_name').".".Input::post('last_name'),
		                'password' => 'Astrio@2018',
		                'email' => Input::post('email'),
		                'group' => 50,
		                'profile_fields' => array(
		                	'fullname' => Input::post('first_name')." ".Input::post('last_name'),
		                	'jobtitle' => 'Client'
		                	),
		            	);


		            $user = \Model_User::forge($user_data);
		            //$user->save();

		            $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']); */

		            /*$client = \Model_Client::forge(array(
                        'first_name' => \Input::post('first_name'),
                        'last_name' => \Input::post('last_name'),
                        'user_id' => 0,
                        'role_id' => 6,
                        'jobtile_id' => 6,
                        'company_id' => 1,
                        'address1' => \Input::post('address1'),
                        'address2' => " ",//Input::post('address2'),
                        'notes' => \Input::post('notes'),
                        'tel' => \Input::post('tel'),
                        'email' => \Input::post('email'),
                        'avatar_file' => " "    //Input::post('avatar_file'),
                    ));

        			$user_data = array(
                        'username' => $client->first_name .".".$client->last_name,
                        'password' => 'Astrio@2018',
                        'email' => $client->email,
                        'group' => 50,
                        'profile_fields' => array(
                            'fullname' =>$client->first_name." ".$client->last_name,
                            'jobtitle' => 'Client'
                            ),
                        );


                    //$user = \Model_User::forge($user_data);
                    $last_id =  $auth->create_user($user_data['username'],$user_data['password'],$user_data['email'],$user_data['group'],$user_data['profile_fields']);
                    //$last_userid = $user->save();
                    if( $last_id){
                        \logger(\Fuel::L_INFO, 'Succesfully created new User linked to Client of class '.get_class($client ));
                    }

                    $client->user_id = $last_id ;*/
                    $last_user =  \Model_User::find('last', ['order_by' => ['id' => 'desc']]);

		             $client = \Model_Client::forge(array(
						'first_name' => Input::post('first_name'),
						'last_name' => Input::post('last_name'),
						'user_id' =>  $last_user->id,
						'role_id' => 6,
						'jobtile_id' => 6,
						'company_id' => 1,
						'address1' => Input::post('address1'),
						'address2' => " ",//Input::post('address2'),
						'notes' => Input::post('notes'),
						'tel' => Input::post('tel'),
						'email' => Input::post('email'),
						'avatar_file' => " "    //Input::post('avatar_file'),
					));

					 $client->save(); 

		            // Prints this message on terminal
		           // echo '\n\r'  . $user->username . ' : '  . $last_id;
		            echo '\n\r' .  "New Client: ".$client->first_name . "#: " . $client->last_name  ; 

		        }else{
		            
		            // In case of error, prints the message on terminal,
		            // You can implement any error handling you need
		            echo "\nError saving new client.";
		            //echo "\n" . $e->getMessage(). "\n";
		        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if ($val->run())
			{
				$client = Model_Client::forge(array(
					'created_by' => Input::post('created_by'),
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'labels' => Input::post('labels'),
					'status' => Input::post('status'),
					'start_date' => Input::post('start_date'),
				));

				if ($client and $client->save())
				{
					Session::set_flash('success', 'Added client #'.$client->id.'.');

					Response::redirect('client');
				}

				else
				{
					Session::set_flash('error', 'Could not save client.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}


		if (Input::is_ajax()) {
		       // Validating input 
		       $val = Validation::forge();
		 
		       // // Upload Config
		       // $config = array(
		       //     'auto_process' => 'false',
		       //     'path' => DOCROOT . 'uploads',
		       //     'randomize' => true,
		       //     'ext_whitelist' => array('doc', 'docx', 'rtf', 'pdf'),
		       // );
		 
		       // if (Upload::is_valid()) {
		       //     // save them according to the config
		       //     Upload::save();
		 
		       //     //if you want to save to tha database lets grab the file name
		       //     $mediafile = Upload::get_files();
		       //     //var_dump( $myfile[0]['saved_as']);
		       //     $data["mediafile"] = json_encode($mediafile);
		       // } else {
		       //     $mediafile = Fuel\Core\Upload::get_errors();
		       //     $data["mediafile"] = json_encode($mediafile);
		       //     Session::set_flash('error', 'Could not save monkey Portrait file.');
		       //     Response::redirect('candidate');
		       // }
		 
		       if ($val->run()) {
		           $dataObj = array(
		               'title' => Input('title'),
		               'status' => Input('status') || 'client',
		               'start_date' => Input('start_date'),
		               'created_by' => $this->current_user->id ,
		               
		           );
		           $client = Model_Client::forge($dataObj);
		 
		           if ($client && $client->save()) {
		               Session::set_flash('success', 'Added Client #' . $client->id . '.');
		 
		               //Response::redirect('candidate');
		               $response = array("success" => "true", "data" => $post);
		                $this->response($response, 200);
		           } else {
		               Session::set_flash('error', 'Could not save new Client.');
		                $response = array("error" => "true", "msg" => 'Oopps !! An error occured while storing your data.Please check your connection.');
		                $this->response($response, 404);
		           }
		       } else {
		           Session::set_flash('error', $val->error());
		       }
        }

		$this->template->title = "Clients";
		$this->template->content = View::forge('client/create');

	}

	public function action_add()
	{

		$data['subnav'] = ["add" => 'active'];
		if (Input::method() == 'POST' && !Input::is_ajax())
		{
			$val = Model_Client::validate('create');

			if ($val->run())
			{
				$client = Model_Client::forge(array(
					'created_by' => Input::post('created_by'),
					'title' => Input::post('title'),
					'description' => Input::post('description'),
					'labels' => Input::post('labels'),
					'status' => Input::post('status'),
					'start_date' => Input::post('start_date'),
				));

				if ($client and $client->save())
				{
					Session::set_flash('success', 'Added client #'.$client->id.'.');

					Response::redirect('client');
				}

				else
				{
					Session::set_flash('error', 'Could not save client.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}


		if (\Input::is_ajax()) {
		       // Validating input 
		       $val = Validation::forge();
		 
		       // // Upload Config
		       // $config = array(
		       //     'auto_process' => 'false',
		       //     'path' => DOCROOT . 'uploads',
		       //     'randomize' => true,
		       //     'ext_whitelist' => array('doc', 'docx', 'rtf', 'pdf'),
		       // );
		 
		       // if (Upload::is_valid()) {
		       //     // save them according to the config
		       //     Upload::save();
		 
		       //     //if you want to save to tha database lets grab the file name
		       //     $mediafile = Upload::get_files();
		       //     //var_dump( $myfile[0]['saved_as']);
		       //     $data["mediafile"] = json_encode($mediafile);
		       // } else {
		       //     $mediafile = Fuel\Core\Upload::get_errors();
		       //     $data["mediafile"] = json_encode($mediafile);
		       //     Session::set_flash('error', 'Could not save monkey Portrait file.');
		       //     Response::redirect('candidate');
		       // }
		 
		       if ($val->run()) {
		           $dataObj = array(
		               'title' => Input::post('title'),
		               'status' =>  'client', // Input('status') 
		               'start_date' => Carbon\Carbon::now()->format('Y-M-d'), //Input::post('start_date'),
		               'created_by' => $this->current_user->id ,
		               
		           );
		           $client = Model_Client::forge($dataObj);
		 
		           if ($client && $client->save()) {
		               Session::set_flash('success', 'Added Client #' . $client->id . '.');
		               
		               $response = array("success" => TRUE, "data" => $client->to_array(), "message" => 'Added Client #' . $client->id . '.' );
		                //$this->response($response, 200);
		               return json_encode($response);
		           } else {
		               Session::set_flash('error', 'Could not save new Client.');
		                $response = array("error" => TRUE, "message" => 'Oopps !! An error occured while storing your data.Please check your connection.');
		                //$this->response($response, 404);
		                return json_encode($response);
		           }
		       } else {
		           Session::set_flash('error', $val->error());
		       }
        }

		$this->template->title = "Clients";
		$this->template->content = View::forge('client/create');

	}

	public function action_edit($id = null)
	{

		$data['subnav'] = ["edit" => 'active'];
		is_null($id) and Response::redirect('client');

		if ( ! $client = Model_Client::find($id))
		{
			Session::set_flash('error', 'Could not find client #'.$id);
			Response::redirect('client');
		}

		$val = Model_Client::validate('edit');

		if ($val->run())
		{
			$client->created_by = Input::post('created_by');
			$client->title = Input::post('title');
			$client->description = Input::post('description');
			$client->labels = Input::post('labels');
			$client->status = Input::post('status');
			$client->start_date = Input::post('start_date');

			if ($client->save())
			{
				Session::set_flash('success', 'Updated client #' . $id);

				Response::redirect('client');
			}

			else
			{
				Session::set_flash('error', 'Could not update client #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$client->created_by = $val->validated('created_by');
				$client->title = $val->validated('title');
				$client->description = $val->validated('description');
				$client->labels = $val->validated('labels');
				$client->status = $val->validated('status');
				$client->start_date = $val->validated('start_date');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('client', $client, false);
		}

		$this->template->title = "Clients";
		$this->template->content = View::forge('client/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('client');

		if ($client = Model_Client::find($id))
		{
			$client->delete();

			Session::set_flash('success', 'Deleted client #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete client #'.$id);
		}

		Response::redirect('client');

	}

}
