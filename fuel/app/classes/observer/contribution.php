<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

use Fuel\Core\Debug;

class Observer_Contribution extends Observer {
    # Hook into the before_insert event,
    # Set contribution's IP and hash their password

    public function after_save(Model $contribution) {
        
        //\Log::info('Succesfully created new object of class '.get_class($request));
        # Hash the password
        # WARNING!!!
        #  

 
    }
    public function after_insert(Model $contribution) {
        
        \Log::info('Succesfully created new object of class '.get_class($contribution));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getMessage());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($contribution));

        //Debug::dump($contribution);  die();
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $user_id) = \Auth::get_user_id();
        $user = \Model_User::find($user_id);
        $activity->created_by = $user->employee->id;
        //list ($auth_driver, $activitylog->message_id) = \Auth::get_user_id(); // $contribution->message_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($contribution));; 
        $activity->log_type_title = $contribution->amount ." ". $contribution->currency_code; 
        $activity->log_type_id = $contribution->id; 
        $activity->changes = serialize($contribution->to_array()); 
        $activity->log_for = "Client";
        $activity->log_for_id = @$contribution->client->id;
        $activity->log_for2 = "Account";
        $activity->log_for_id2 = $contribution->company_id;

        //Debug::dump($activity);  die();
        

        //$activity->object_type = preg_replace("/Model_/", '',get_class($contribution));//"Request"; 
        //$activity->object_id = $contribution->id; 
        //$activity->data = json_encode($contribution->to_array()); 
        //$activity->verb = "add" ;   //\Request::active()->action; // add or create 
 
        $activity->save();

        // Save a Transaction and log the process
        $transaction = \Model_Transaction::forge();

        $ref = array(
            "client" => @$contribution->client->first_name ." ". $contribution->client->last_name,
            "reference" => $contribution->reference,
            "description" => $contribution->description,
            "status" => $contribution->status,
            "category" => $contribution->category->title
        );
        $transaction->from_account_id = ($contribution->type == 'debit') ? 1 : 0 ;
        $transaction->to_account_id = ($contribution->type == 'credit') ? 1 : 0 ;
        $transaction->amount = $contribution->amount;
        $transaction->currency_code = 'XAF';
        $transaction->currency_rate = 1;
        $transaction->payment_method = $contribution->payment_method;
        $transaction->reference = serialize($ref);
        $transaction->type = ($contribution->type == 'credit') ? 1 : 0 ;


        if($transaction->save()){
            //echo "\nRunning task [Seedcontribtable:Fixfields]";
            //echo "\n Contribution ". $transaction->id ." updated successfully !\n\n";
            \Log::info('Succesfully created new object of class '.get_class($transaction));
        }else{
            //echo "\nRunning task [Seedcontribtable:Run]";
            //echo "\n Contribution ". $transaction->id ." update failed !\n\n";
            \Log::error('Failed to created new object of class '.get_class($transaction));
        }


        
    }

     
    
    public function after_delete(Model $contribution){
        $_request =  \Request::active();
        $params_id = $_request->method_params[0];
        $_msg = $contribution->to_array();

        \Log::info('Succesfully deleted an object of class '.get_class($contribution) . " : ". json_encode($_msg));
        $activity = \Model_Activitylog::forge();

        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        $activity->log_type = preg_replace("/Model_/", '',get_class($contribution));
        $activity->log_type_title = $contribution->amount ." ". $contribution->currency_code; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$contribution->id; 
        $activity->changes = serialize($contribution->to_array()); 
        $activity->log_for = "Budget"; 
        $activity->log_for_id = $contribution->budget_id; 
        $activity->log_for2 = "Company"; 
        $activity->log_for_id2 = $contribution->company_id;

        //$activity->object_id = $contribution->id; 
        //$activity->data = json_encode($contribution->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 
    }

}