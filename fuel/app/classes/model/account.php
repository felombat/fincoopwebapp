<?php
use Orm\Model;

class Model_Account extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'name',
		'number',
		'currency_code',
		'opening_balance',
		'bank_name',
		'bank_phone',
		'bank_address',
		'enabled',
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
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('number', 'Number', 'required|max_length[255]');
		$val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
		$val->add_field('opening_balance', 'Opening Balance', 'required');
		$val->add_field('bank_name', 'Bank Name', 'required|max_length[255]');
		$val->add_field('bank_phone', 'Bank Phone', 'required|max_length[255]');
		$val->add_field('bank_address', 'Bank Address', 'required|max_length[255]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}

}
