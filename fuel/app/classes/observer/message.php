<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

class Observer_Message extends Observer {
    //# Hook into the before_insert event,
    //# Set message's IP and hash their password

    public function after_save(Model $message) {
        
        \Log::info('Succesfully created new object of class '.get_class($message));
        //# Hash the password
        //# WARNING!!!
        //#  

 
    }
    public function after_insert(Model $message) {
        
        \Log::info('Succesfully created new object of class '.get_class($message));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($message));
          
        
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        //list ($auth_driver, $activitylog->message_id) = \Auth::get_user_id(); // $message->message_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($message));; 
        $activity->log_type_title = $message->subject; 
        $activity->log_type_id = $message->id; 
        $activity->changes = serialize($message->to_array()); 
        $activity->log_for = "Employee"; 
        $activity->log_for_id = $message->form_user_id; 
        $activity->log_for2 = "Employee"; 
        $activity->log_for_id2 = $message->to_user_id; 
        

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
        $activity->log_type_title = $message->subject; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$message->id; 
        $activity->changes = serialize($message->to_array()); 
        $activity->log_for = "Employee"; 
        $activity->log_for_id = $message->form_user_id; 
        $activity->log_for2 = "Employee"; 
        $activity->log_for_id2 = $message->to_user_id;

        //$activity->object_id = $message->id; 
        //$activity->data = json_encode($message->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 
    }

}
