<?php

class Model_Transaction extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
 			'from_account_id' ,
			'to_account_id'  ,
			'amount'  ,
			'currency_code'  ,
			'currency_rate'  ,
			'payment_method'  ,
			'reference',
		'type',
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
        'Orm\Observer_Transaction' => array(
            'events' => array('after_insert','after_delete'),
            'mysql_timestamp' => false,
        ),
	);

    protected static $_belongs_to = array(
        "from_account" => array(
            'key_from' => 'from_account_id',
            'model_to' => 'Model_Account',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "to_account" => array(
            'key_from' => 'to_account_id',
            'model_to' => 'Model_Account',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        "contribution" => array(
            'key_from' => 'created_at',
            'model_to' => 'Model_Contribution',
            'key_to' => 'created_at',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),
        /*"category" => array(
            'key_from' => 'category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        ),*/
    );


	// protected static $_many_many = array(
	//     'items' => array(
	//         'table_through' => 'items_loadings', 	// both models plural without prefix in alphabetical order
	//         'conditions' => array(
	//            'order_by' => array(
	//                 'posts_users.loading_id' => 'DESC'	// define custom through table ordering
	//             ),
	//         ),
	//     )
	// );

    protected static $_soft_delete = array(
        'mysql_timestamp' => false,
    );


	protected static $_table_name = 'transactions';

}
