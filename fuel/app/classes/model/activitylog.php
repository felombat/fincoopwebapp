<?php

class Model_Activitylog extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'created_by',
		'action',
		'log_type',
		'log_type_title',
		'log_type_id',
		'changes',
		'log_for',
		'log_for_id',
		'log_for2',
		'log_for_id2',
		'deleted_at',
		'created_at',
		'updated_at',
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

	protected static $_belongs_to = array(
		"owner" => array(
		        'key_from' => 'created_by',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),   


		);



	protected static $_conditions = array(
        'order_by' => array('created_at' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

	protected static $_table_name = 'activitylogs';

}
