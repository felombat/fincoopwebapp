<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		// 'programs' => array(
		//        'key_from' => 'id',
		//        'model_to' => 'Model_Program',
		//        'key_to' => 'mentor',
		//        'cascade_save' => true,
		//        'cascade_delete' => false,
		//    ), 
		 
		// 'books' => array(
		//         'key_from' => 'id',
		//         'model_to' => 'Model_Book',
		//         'key_to' => 'owner_id',
		//         'cascade_save' => true,
		//         'cascade_delete' => false,
		//     ), 
		// 'testamonials' => array(
		//         'key_from' => 'id',
		//         'model_to' => 'Model_Testamonial',
		//         'key_to' => 'owner_id',
		//         'cascade_save' => true,
		//         'cascade_delete' => false,
		//     ), 
		);

	protected static $_has_one = array(
		"employee" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),  


		);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_to_array_exclude = array(
        'password', 'login_hash' 	// exclude these columns from being exported
    );

	protected static $_table_name = 'users';

}