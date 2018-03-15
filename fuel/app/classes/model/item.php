<?php
use Orm\Model;

class Model_Item extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'title',
		'category_id',
		'enabled',
	);

	protected static $_belongs_to = array(
		"category" => array(
		        'key_from' => 'category_id',
		        'model_to' => 'Model_Category',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		"company", "loading"

		  
	);

	// protected static $_has_many = array( 
	// 	"loadings" => array(
	// 	        'key_from' => 'id',
	// 	        'model_to' => 'Model_Loading',
	// 	        'key_to' => 'item_id',
	// 	        'cascade_save' => true,
	// 	        'cascade_delete' => false,
	// 	    ),
	// 	);

	protected static $_many_many = array(
	    'loadings' => array(
	        'table_through' => 'items_loadings', 	// both models plural without prefix in alphabetical order
	        'conditions' => array(
	           'order_by' => array(
	                'posts_users.loading_id' => 'DESC'	// define custom through table ordering
	            ),
	        ),
	    )
	);


	protected static $_conditions = array(
        'order_by' => array('category_id' => 'asc'),
         'where' => array(
        //    array('publish_date', '>', 1370721177),
            array('enabled', '=', 1),
         ),
    );


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('category_id', 'Category Id', 'required|valid_string[numeric]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Item::find('all', array('array(select)' => array( 'title')));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->title" ;
				}
			}
		
		return $dlist;
	}

}
