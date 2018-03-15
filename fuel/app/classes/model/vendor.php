<?php
use Orm\Model;

class Model_Vendor extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'user_id',
		'phone',
		'email',
		'website',
		'title',
		'enabled',
	);

	protected static $_has_many = array( 
		"loadings" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Loading',
		        'key_to' => 'vendor_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		);

	protected static $_belongs_to = array(


		"company" => array(
		        'key_from' => 'company_id',
		        'model_to' => 'Model_Company',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),

		"contact" => array(
		        'key_from' => 'user_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		 
		
		  
	);

	protected static $_conditions = array(
        'order_by' => array('title' => 'asc'),
         'where' => array(
        //    array('publish_date', '>', 1370721177),
            array('enabled', '=', 1),
         ),
    );



	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('company_id', 'Company Id', 'required|valid_string[numeric]');
		//$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');
		//$val->add_field('phone', 'Phone', 'required|max_length[255]');
		//$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		//$val->add_field('website', 'Website', 'required|max_length[255]');
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Vendor::find('all', array(
			array('select' => array( 'title')),
			array('where' => array(
					array('company_id' => 1)
				)
			)));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->title" ;
				}
			}
		
		return $dlist;
	}

}
