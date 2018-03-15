<?php
use Orm\Model;

class Model_Message extends Model
{
	protected static $_properties = array(
		'id',
		'subject',
		'message',
		'form_user_id',
		'to_user_id',
		'status',
		'message_id',
		'files',
		'deleted_by_users',
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
		'Orm\Observer_Message' => array(
       	    'events' => array('after_insert','after_delete'),
       	     'mysql_timestamp' => false,
       	 ),
	);

	protected static $_conditions = array(
        'order_by' => array('created_at' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	protected static $_belongs_to = array(
		"sender" => array(
		        'key_from' => 'form_user_id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		 "recipient" => array(
		        'key_from' => 'to_user_id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('subject', 'Subject', 'required|max_length[255]');
		$val->add_field('message', 'Message', 'required');
		$val->add_field('form_user_id', 'Form User Id', 'required|valid_string[numeric]');
		$val->add_field('to_user_id', 'To User Id', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required');
		//$val->add_field('message_id', 'Message Id', 'required|valid_string[numeric]');
		//$val->add_field('files', 'Files', 'required');
		//$val->add_field('deleted_by_users', 'Deleted By Users', 'required');

		return $val;
	}



}
