<?php
use Orm\Model;

class Model_Contribution extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'company_id',
		'budget_id',
        'status',
        'created_by',
        'category_id',
        'type',
		'paid_at',
		'amount',
        'category_id',
		'currency_code',
		'currency_rate',
		'description',
		'payment_method',
		'reference',
		'created_at',
        'deleted_at',
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
		'Orm\Observer_Contribution' => array(
       	    'events' => array('after_insert','after_delete'),
       	     'mysql_timestamp' => false,
       	 ),
	);

    protected static $_belongs_to = array(
        "client" => array(
            'key_from' => 'budget_id',
            'model_to' => 'Model_Client',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "category" => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
    );

    protected static $_has_one = array(
        "transaction" => array(
            'key_from' => 'created_at',
            'model_to' => 'Model_Transaction',
            'key_to' => 'created_at',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),

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
        //$val->add_field('status', 'Status', 'required');
        //$val->add_field('type', 'Type', 'required');
        //$val->add_field('created_by', 'Created_by', 'required|valid_string[numeric]');
        //$val->add_field('category_id', 'Category', 'required|valid_string[numeric]');


		return $val;
	}

}
