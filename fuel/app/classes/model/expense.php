<?php
use Orm\Model;

class Model_Expense extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'company_id',
		'account_id',
		'vendor_id',
		'paid_at',
		'amount',
		'currency_code',
		'currency_rate',
		'reference',
		'description',
		'payment_method',
		'created_at',
		'updated_at',
		'deleted_at',

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
		$val->add_field('account_id', 'Account Id', 'required|valid_string[numeric]');
		$val->add_field('paid_at', 'Paid At', 'required');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
		//$val->add_field('currency_rate', 'Currency Rate', 'required');
		$val->add_field('reference', 'Reference', 'required');
		$val->add_field('payment_method', 'Payment Method', 'required');

		return $val;
	}

}
