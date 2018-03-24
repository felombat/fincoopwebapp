<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

class Observer_User extends Observer {
    //# Hook into the before_insert event,
    //# Set message's IP and hash their password

    public function after_save(Model $message) {
        
        \Log::info('Succesfully created new object of class '.get_class($message));
        //# Hash the password
        //# WARNING!!!
        //#  

 
    }
    public function after_insert(Model $client) {
        
        \Log::info('Succesfully created new object of class '.get_class($client));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($client));

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


                    $user = \Model_User::forge($user_data);
                    //$last_userid = $user->save();
                    if( $last_userid){
                        \logger(\Fuel::L_INFO, 'Succesfully created new User linked to Client of class '.get_class($user ));
                    }

                    $client->user_id = $last_userid ;
                    $client_update_status = $client->save(); 
                      if( $client_update_status ){
                        \logger(\Fuel::L_INFO, 'Succesfully Updated Client ID:  '.$client->id );
                    }
          
        
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        //list ($auth_driver, $activitylog->client_id) = \Auth::get_user_id(); // $client->client_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($client));; 
        $activity->log_type_title = "Client ID #". $client->id; 
        $activity->log_type_id = $client->id; 
        $activity->changes = serialize($client->to_array()); 
        $activity->log_for = "Employee"; 
        $activity->log_for_id = $client->id; 
        $activity->log_for2 = "Employee"; 
        $activity->log_for_id2 = $client->user_id; 
        

        //$activity->object_type = preg_replace("/Model_/", '',get_class($message));//"Request"; 
        //$activity->object_id = $message->id; 
        //$activity->data = json_encode($message->to_array()); 
        //$activity->verb = "add" ;   //\Request::active()->action; // add or create 
 
        $activity->save();

        
    }

     
    
    public function after_delete(Model $message){
        $_request =  \Request::active();
        $params_id = $_request->method_params[0];
        
        $_msg = $message->to_array();

        \Log::info('Succesfully deleted an object of class '.get_class($message) . " : ". json_encode($_msg));
        $activity = \Model_Activitylog::forge();

        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        $activity->log_type = preg_replace("/Model_/", '',get_class($message));
        $activity->log_type_title = "User Msg #".  $params_id; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$message->id; 
        $activity->changes = serialize($message->to_array()); 
        $activity->log_for = "Employee"; 
        $activity->log_for_id = $message->from_user_id; 
        $activity->log_for2 = "Employee"; 
        $activity->log_for_id2 = $message->to_user_id;

        //$activity->object_id = $message->id; 
        //$activity->data = json_encode($message->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 
    }

}
