<?php

class Model_Transaction extends \Orm\Model
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


	protected static $_table_name = 'operations';

}
