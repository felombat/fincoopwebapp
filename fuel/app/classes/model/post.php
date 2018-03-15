<?php
use Orm\Model;

class Model_Post extends Model
{
	protected static $_properties = array(
		'id',
		'created_by',
		'description',
		'post_id',
		'share_with',
		'files',
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
		$val->add_field('description', 'Description', 'required');
		$val->add_field('post_id', 'Post Id', 'required|valid_string[numeric]');
		//$val->add_field('share_with', 'Share With', 'required');
		//$val->add_field('files', 'Files', 'required');

		return $val;
	}

}
