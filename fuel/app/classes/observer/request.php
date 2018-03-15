<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//namespace Orm;
//use Orm;

class Observer_Request extends Orm\Observer {
    # Hook into the before_insert event,
    # Set account's IP and hash their password

    public function before_insert(Model $request) {
        
        \Log::info('Succesfully created new object of class '.get_class($request));
        # Hash the password
        # WARNING!!!
        #  

        $current_cat = \Model_Rcategory::find($request->rcategory_id);
        $timespane = $current_cat->get_timespane($current_cat->timeframe, $current_cat->timeframedim);
        $deadline = $current_cat->get_actual_deadline($request->created_at + 1.5 * 3600, $timespane);

        //$request->set('started_at', $request->created_at + 1.5 * 3600);
        $request->set('deadline_at', $deadline);
        $request->save(); 
        
        $activity = \Model_Activity::forge();
        $activity->account_id = $request->account_id; 
        $activity->object_type = preg_replace("Model_", '',get_class($request));//"Request"; 
        $activity->object_id = $request->id; 
        $activity->data = json_encode($request->to_array()); 
        $activity->verb = Fuel\Core\Request::active()->action; 
        $activity->save(); 

        //$account->last_ip = $_SERVER['REMOTE_ADDR'];
    }

    # Update account's IP when their record is being updated
    # ... assuming they're the only one's that can modify it!

    public function before_update(Model $request) {
        $current_cat = \Model_Rcategory::find($request->rcategory_id);
        $timespane = $current_cat->get_timespane($current_cat->timeframe, $current_cat->timeframedim);
        $deadline = $current_cat->get_actual_deadline($request->started_at , $timespane);

        //$request->set('started_at', $request->created_at + 1.5 * 3600);
        $request->set('deadline_at', $deadline);
    }
    
    public function after_update(Model $request){
        $activity = \Model_Activity::forge();
        $activity->account_id = $request->account_id; 
        $activity->object_type = preg_replace("Model_", '',get_class($request));
        $activity->object_id = $request->id; 
        $activity->data = json_encode($request->to_array()); 
        $activity->verb = Fuel\Core\Request::active()->action; 
        $activity->save(); 
    }

}
