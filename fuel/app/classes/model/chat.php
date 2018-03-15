<?php
use Orm\Model;

class Model_Chat extends Model
{
	protected static $_properties = array(
		'id',
		'message',
		'from_user_id',
		'to_user_id',
		'status',
		'chat_message_id',
		'private',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_Chat' => array(
       	    'events' => array('after_insert','after_delete'),
       	     'mysql_timestamp' => false,
       	 ),
	);

	protected static $_belongs_to = array(
		"sender" => array(
		        'key_from' => 'from_user_id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		  
	);

	protected static $_conditions = array(
        'order_by' => array('created_at' => 'asc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('message', 'Message', 'required');
		$val->add_field('from_user_id', 'From User Id', 'required|valid_string[numeric]');
		//$val->add_field('to_user_id', 'To User Id', 'required|valid_string[numeric]');
		//$val->add_field('status', 'Status', 'required');
		//$val->add_field('chat_message_id', 'Chat Message Id', 'required|valid_string[numeric]');
		//$val->add_field('private', 'Private', 'required');

		return $val;
	}

}
