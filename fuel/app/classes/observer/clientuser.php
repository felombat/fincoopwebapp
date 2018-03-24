<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

class Observer_Clientuser extends Observer {
    //# Hook into the before_insert event,
    //# Set message's IP and hash their password

    public function after_save(Model $client) {
        
        \Log::info('Succesfully created new object of class '.get_class($client));
        //# Hash the password
        //# WARNING!!!
        //#  
  
    }

    public function before_insert(Model $client){

        $user = \Model_User::forge();
        $auth = \Auth::instance();

        \logger(\Fuel::L_INFO, 'Attempt to create new User linked to Client of class '.get_class($user ));

        $client = \Model_Client::forge(array(
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

                    $client->user_id = $last_id ;
    }


    public function after_insert(Model $client) {
        
        \Log::info('Succesfully created new object of class '.get_class($client));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($client));

        
                    //$client_update_status = $client->save(); 
                    //  if( $client_update_status ){
                    //    \logger(\Fuel::L_INFO, 'Succesfully Updated Client ID:  '.$client->id );
                    //}
          
        
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        //list ($auth_driver, $activitylog->client_id) = \Auth::get_user_id(); // $client->client_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($client));; 
        $activity->log_type_title = "Client  #". $client->id ." : " . $client->first_name." ".$client->last_name; 
        $activity->log_type_id = $client->id; 
        $activity->changes = serialize($client->to_array()); 
        $activity->log_for = "Client"; 
        $activity->log_for_id = $client->id; 
        $activity->log_for2 = "User"; 
        $activity->log_for_id2 = $client->user_id; 
        

        //$activity->object_type = preg_replace("/Model_/", '',get_class($message));//"Request"; 
        //$activity->object_id = $message->id; 
        //$activity->data = json_encode($message->to_array()); 
        //$activity->verb = "add" ;   //\Request::active()->action; // add or create 
 
        $activity->save();

        
    }

     
    
    public function after_delete(Model $client){
        $_request =  \Request::active();
        $params_id = $_request->method_params[0];
        
        $_msg = $client->to_array();

        \Log::info('Succesfully deleted an object of class '.get_class($client) . " : ". json_encode($client));
        $activity = \Model_Activitylog::forge();

        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        $activity->log_type = preg_replace("/Model_/", '',get_class($client));
        $activity->log_type_title = "Client ID #".  $params_id; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$client->id; 
        $activity->changes = serialize($client->to_array()); 
        $activity->log_for = "Client"; 
        $activity->log_for_id = $client->id; 
        $activity->log_for2 = "User"; 
        $activity->log_for_id2 = $client->user_id;

        //$activity->object_id = $message->id; 
        //$activity->data = json_encode($message->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 

        /// User delete
        $user = Model_User::find($client->user_id);
        $user->delete();
    }

}
