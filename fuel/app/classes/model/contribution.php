<?php
use Orm\Model;

class Model_Contribution extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'budget_id',
		'paid_at',
		'amount',
		'currency_code',
		'currency_rate',
		'description',
		'payment_method',
		'reference',
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
//		'Orm\Observer_Contribution' => array(
//       	    'events' => array('after_insert','after_delete'),
//       	     'mysql_timestamp' => false,
//       	 ),
	);

	protected static $_conditions = array(
        'order_by' => array('paid_at' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('budget_id', 'Budget Id', 'required|valid_string[numeric]');
		$val->add_field('paid_at', 'Paid At', 'required');
		$val->add_field('amount', 'Amount', 'required');
		$val->add_field('currency_code', 'Currency Code', 'required|max_length[3]');
		$val->add_field('currency_rate', 'Currency Rate', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('payment_method', 'Payment Method', 'required');
		$val->add_field('reference', 'Reference', 'required|max_length[255]');

		return $val;
	}

}
