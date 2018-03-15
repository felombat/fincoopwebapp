<?php

class Model_Operation extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'item_id',
		'silo_id',
		'loading_id',
		'type',
	);

	protected static $_many_many = array(
	    'items' => array(
	        'table_through' => 'items_loadings', 	// both models plural without prefix in alphabetical order
	        'conditions' => array(
	           'order_by' => array(
	                'posts_users.loading_id' => 'DESC'	// define custom through table ordering
	            ),
	        ),
	    )
	);


	protected static $_table_name = 'operations';

}
