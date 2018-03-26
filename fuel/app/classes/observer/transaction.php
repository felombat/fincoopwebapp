<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

use Fuel\Core\Debug;

class Observer_Transaction extends Observer {
    # Hook into the before_insert event,
    # Set contribution's IP and hash their password

    public function after_save(Model $transaction) {
        
        //\Log::info('Succesfully created new object of class '.get_class($request));
        # Hash the password
        # WARNING!!!
        #  

 
    }
    public function after_insert(Model $transaction) {
        
        \Log::info('Succesfully created new object of class '.get_class($transaction));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($transaction));

        //Debug::dump($transaction);  die();
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $user_id) = \Auth::get_user_id();
        $user = \Model_User::find($user_id);
        $activity->created_by = $user->employee->id;
        //list ($auth_driver, $activitylog->message_id) = \Auth::get_user_id(); // $transaction->message_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($transaction));; 
        $activity->log_type_title = $transaction->amount ." ". $transaction->currency_code; 
        $activity->log_type_id = $transaction->id; 
        $activity->changes = serialize($transaction->to_array()); 
        $activity->log_for = "From Account";
        $activity->log_for_id = (@$transaction->from_account_id);
        $activity->log_for2 = "To Account";
        $activity->log_for_id2 = (@$transaction->to_account_id);

        //Debug::dump($activity);  die();
        

        //$activity->object_type = preg_replace("/Model_/", '',get_class($transaction));//"Request"; 
        //$activity->object_id = $transaction->id; 
        //$activity->data = json_encode($transaction->to_array()); 
        //$activity->verb = "add" ;   //\Request::active()->action; // add or create 
 
        $activity->save();
        
    }

     
    
    public function after_delete(Model $transaction){
        $_request =  \Request::active();
        $params_id = $_request->method_params[0];
        $_msg = $transaction->to_array();

        \Log::info('Succesfully deleted an object of class '.get_class($transaction) . " : ". json_encode($_msg));
        $activity = \Model_Activitylog::forge();

        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        $activity->log_type = preg_replace("/Model_/", '',get_class($transaction));
        $activity->log_type_title = $transaction->amount ." ". $transaction->currency_code; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$transaction->id; 
        $activity->changes = serialize($transaction->to_array()); 
        $activity->log_for = "Budget"; 
        $activity->log_for_id = $transaction->budget_id; 
        $activity->log_for2 = "Company"; 
        $activity->log_for_id2 = $transaction->company_id;

        //$activity->object_id = $transaction->id; 
        //$activity->data = json_encode($transaction->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 
    }

}