<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Orm;
//use Orm;

class Observer_Loading extends Observer {
    //# Hook into the before_insert event,
    //# Set loading's IP and hash their password

    public function after_save(Model $loading) {
        
        \Log::info('Succesfully created new object of class '.get_class($loading));
        //# Hash the password
        //# WARNING!!!
        //#  

 
    }
    public function after_insert(Model $loading) {
        
        \Log::info('Succesfully created new object of class '.get_class($loading));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getloading());
        \logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($loading));
          
        
        $activity = \Model_Activitylog::forge();
        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        //list ($auth_driver, $activitylog->loading_id) = \Auth::get_user_id(); // $loading->loading_id; // $this->current_user->id; 
        $activity->action = "created"; 
        $activity->log_type = preg_replace("/Model_/", '',get_class($loading));; 
        $activity->log_type_title = "Loading  #". $loading->id; 
        $activity->log_type_id = $loading->id; 
        $activity->changes = serialize($loading->to_array()); 
        $activity->log_for = "Machinery"; 
        $activity->log_for_id = $loading->machenery_id; 
        $activity->log_for2 = "Silo"; 
        $activity->log_for_id2 = $loading->silo_id; 
        

        //$activity->object_type = preg_replace("/Model_/", '',get_class($loading));//"Request"; 
        //$activity->object_id = $loading->id; 
        //$activity->data = json_encode($loading->to_array()); 
        //$activity->verb = "add" ;   //\Request::active()->action; // add or create 
 
        $activity->save();

        $operation = \Model_Operation::forge();
        $operation->item_id = $loading->item_id;
        $operation->loading_id = $loading->id;
        $operation->silo_id = $loading->silo_id;
        $operation->type = 1;

        $operation->save() && \Log::info('Succesfully created new object of class '.get_class($operation));;

        
    }

     
    
    public function after_delete(Model $loading){
        $_request =  \Request::active();
        $params_id = $_request->method_params[0];
        
        $_msg = $loading->to_array();

        \Log::info('Succesfully deleted an object of class '.get_class($loading) . " : ". json_encode($_msg));
        $activity = \Model_Activitylog::forge();

        list ($auth_driver, $activity->created_by) = \Auth::get_user_id();
        $activity->log_type = preg_replace("/Model_/", '',get_class($loading));
        $activity->log_type_title = " #".  $params_id; 
        $activity->log_type_id = $params_id; //\Request::active()->param('id');//$loading->id; 
        $activity->changes = serialize($loading->to_array()); 
        $activity->log_for = "Machinery"; 
        $activity->log_for_id = $loading->machenery_id; 
        $activity->log_for2 = "Silo"; 
        $activity->log_for_id2 = $loading->silo_id;

        //$activity->object_id = $loading->id; 
        //$activity->data = json_encode($loading->to_array()); 
        //$activity->verb = Fuel\Core\Request::active()->action; // Update 
        $activity->action = "deleted"; // Deleted
        $activity->save(); 
    }

    public function before_insert(Model $loading) {

        \Session::delete('exceeded');
         \Session::delete('exceedent');
        
        \Log::info('Attempt to Load an item witk a '.get_class($loading));
        //logger(\Fuel::L_INFO, '*** SMTP Error while sending email (' . __FILE__ . '#' . __LINE__ . '): ' . $e->getloading());
        //\logger(\Fuel::L_INFO, 'Succesfully created new object of class '.get_class($loading));


        $silo = \Model_Silo::find($loading->silo_id, array(
                    'related' => array(
                        'loadings'=> array(
                            'where' => array(
                                array('silo_id' => $loading->silo_id),
                                array('canceled' => 0 ),
                                //array('deleted_at' => null )
                                ) 
                            )
                        )
                
            ));
        $loads = $silo->loadings ;
         $volume = 0;
        foreach ($loads as $key => $load) {
            $volume +=  $load->weight;
        }
        if($silo->capacity < $volume + $loading->weight ){
            $exceedent = -1 *($silo->capacity - ($volume + $loading->weight));
            \Log::info('<p> Capacity exeeded on Silo #'. $loading->silo_id . ":=" .  $exedent  . '</p>');

            $messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!',  'Huh?');
            $data['title'] = $messages[array_rand($messages)] . " Capacity exeeded !! <br> Loading #". $loading->id ;
            //$data['loading'] = $loading;
             \Session::set_flash('error', '<p>'. $data['title'] . '</p>');
             \Session::set('exceeded', TRUE);
              \Session::set('exceedent', $exceedent);

             unset($loading);
            // die('Aha!');
            //throw new \HttpServerErrorException;
            return \Response::forge(\View::forge('loading/create', $data), 401);
            //throw new \HttpNoAccessException;
        }else{
             \Session::set_flash('success', '<p> Capacity left on Silo #'. $loading->silo_id . ":=" .  $silo->capacity - ($volume + $loading->weight) . '</p>');
        }

        $operations = \Model_Operation::find('all', array(
            'where' => array(
                array('silo_id' => $loading->silo_id)
                ) 
            ));
        // $operation->item_id = $loading->item_id;
        // $operation->loading_id = $loading->id;
        // $operation->silo_id = $loading->silo_id;
        // $operation->type = 1;

        // $operation->save() && \Log::info('Succesfully created new object of class '.get_class($operation));;

        
    }

}
