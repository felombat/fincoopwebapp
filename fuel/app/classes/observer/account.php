<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

class Observer_Account extends Observer {
    # Hook into the before_insert event,
    # Set account's IP and hash their password

    public function after_save(Model $account) {
        
        //\Log::info('Succesfully created new object of class '.get_class($request));
        # Hash the password
        # WARNING!!!
        #  

 
    }
    public function after_insert(Model $account) {
        
        \Log::info('Succesfully created new object of class '.get_class($account));
//        logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($account));
          

        $activity = \Model_Activity::forge();
        list ($auth_driver, $activity->account_id) = \Auth::get_user_id(); // $account->account_id; // $this->current_user->id; 
        $activity->object_type = preg_replace("/Model_/", '',get_class($account));//"Request"; 
        $activity->object_id = $account->id; 
        $activity->data = json_encode($account->to_array()); 
        $activity->verb = "add" ;   //\Request::active()->action; // add or create 
//        $activity->verb = 'add' ; 
        $activity->save();
    }

     
    
    public function after_update(Model $account){
        $activity = \Model_Activity::forge();
        list ($auth_driver, $activity->account_id) = \Auth::get_user_id();
        $activity->object_type = preg_replace("/Model_/", '',get_class($account));
        $activity->object_id = $account->id; 
        $activity->data = json_encode($account->to_array()); 
        $activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->save(); 
    }

}
