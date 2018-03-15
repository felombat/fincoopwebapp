<?php
use Orm\Model;

class Model_Event extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'description',
		'created_by',
		'company_id',
		'location',
		'labels',
		'share_with',
		'color',
		'start_date',
		'end_date',
		'start_time',
		'end_time',
		'recurring',
		'repeat_every',
		'no_of_cycles',
		'last_start_date',
		'repeat_type',
		'recurring_dates',
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

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('created_by', 'Created By', 'required|valid_string[numeric]');
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('location', 'Location', 'required');
		$val->add_field('labels', 'Labels', 'required');
		$val->add_field('share_with', 'Share With', 'required');
		$val->add_field('color', 'Color', 'required|max_length[15]');
		$val->add_field('start_date', 'Start Date', 'required');
		$val->add_field('end_date', 'End Date', 'required');
		$val->add_field('start_time', 'Start Time', 'required');
		$val->add_field('end_time', 'End Time', 'required');
		$val->add_field('recurring', 'Recurring', 'required');
		$val->add_field('repeat_every', 'Repeat Every', 'required|valid_string[numeric]');
		$val->add_field('no_of_cycles', 'No Of Cycles', 'required|valid_string[numeric]');
		$val->add_field('last_start_date', 'Last Start Date', 'required');
		$val->add_field('repeat_type', 'Repeat Type', 'required');
		$val->add_field('recurring_dates', 'Recurring Dates', 'required');

		return $val;
	}

}
