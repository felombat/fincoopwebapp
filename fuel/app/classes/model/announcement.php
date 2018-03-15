<?php
use Orm\Model;

class Model_Announcement extends Model
{
	protected static $_properties = array(
		'id',
		'created_by',
		'read_by',
		'share_with',
		'title',
		'description',
		'file',
		'start_date',
		'end_date',
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
	);

	protected static $_conditions = array(
        'order_by' => array('created_at' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('created_by', 'Created By', 'required|valid_string[numeric]');
		//$val->add_field('read_by', 'Read By', 'required');
		//$val->add_field('share_with', 'Share With', 'required');
		$val->add_field('title', 'Title', 'required');
		$val->add_field('description', 'Description', 'required');
		//$val->add_field('file', 'File', 'required');
		$val->add_field('start_date', 'Start Date', 'required');
		$val->add_field('end_date', 'End Date', 'required');

		return $val;
	}

}
