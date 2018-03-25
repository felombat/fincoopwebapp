<?php

class Model_Client extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'first_name',
		'last_name',
		'user_id',
		'role_id',
		'jobtile_id',
		'company_id',
		'tel',
		'email',
		'address1',
		'address2',
		'avatar_file',
		'notes',
		'deleted_at',
		'created_at',
		'updated_at',
	);

	protected static $_belongs_to = array(
		"user" => array(
		        'key_from' => 'user_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 

		"jobtitle" =>  array(
		        'key_from' => 'jobtile_id',
		        'model_to' => 'Model_Jobtitle',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		"company"     


		);

	protected static $_has_many = array(
		"messages" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Message',
		        'key_to' => 'form_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 
		"mails" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Message',
		        'key_to' => 'to_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 
		"chats" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Chat',
		        'key_to' => 'from_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
        "contributions" => array(
            'key_from' => 'id',
            'model_to' => 'Model_Client',
            'key_to' => 'budget_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),

		);



	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('first_name', 'Firstname', 'required|max_length[255]');
		$val->add_field('last_name', 'Lastname', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		//$val->add_field('user_id', 'User Id', 'required|numeric');
		//$val->add_field('role_id', 'Role id', 'required|numeric');
		$val->add_field('address1', 'Address 1', 'required|max_length[255]');
		//$val->add_field('jobtile_id', 'Job title', 'required|numeric');
		


		return $val;
	}


	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_Clientuser' => array(
			'events' => array('after_insert','after_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_conditions = array(
        'order_by' => array('id' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

	protected static $_table_name = 'clients';

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Client::find('all', array('array(select)' => array( 'first_name', 'last_name')));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->first_name $row->last_name" ;
				}
			}
		
		return $dlist;
	}

	public static function get_avatar($user_id = 0, $size = 64 ,$class = 'img-circle'){
		$client = Model_Employee::find($user_id);
		list ($auth_driver, $current_user_id) = \Auth::get_user_id();
		$_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size]);;
		if(isset($client)  AND empty($client->avatar_file)) 
		{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $client->first_name .' '. $client->last_name]);
		}elseif(isset($client) AND !empty($client->avatar_file)) 
		{
			return $_avatar = Asset::img("$client->avatar_file", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $client->first_name .' '. $client->last_name]);
		}else{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size,'alt'=>'...', 'title'=>" #~.`# "]);
		}

		//return $_avatar;

	}

	public static function get_profile($user_id = 0, $size = 64, $class = 'img-circle' ){
		$client = Model_Client::find($user_id);
		list ($auth_driver, $current_user_id) = \Auth::get_user_id();
		$_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size]);;
		if(isset($client)  AND empty($client->avatar_file)) 
		{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $client->first_name .' '. $client->last_name]);
		}elseif(isset($client) AND !empty($client->avatar_file)) 
		{
			return $_avatar = Asset::img("$client->avatar_file", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $client->first_name .' '. $client->last_name]);
		}else{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size,'alt'=>'...', 'title'=>" #~.`# "]);
		}

		//return $_avatar;

	}
	
}