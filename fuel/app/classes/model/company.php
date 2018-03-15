<?php
use Orm\Model;

class Model_Company extends Model
{
	protected static $_properties = array(
		'id',
		'domain',
		'name',
		'enabled',
	);

	protected static $_has_many = array(
		"items" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Item',
		        'key_to' => 'company_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),

		"sites" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Site',
		        'key_to' => 'site_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		  
 		"loadings" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Loading',
		        'key_to' => 'company_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
 		"employees" =>  array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'company_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
	);

	 

	protected static $_conditions = array(
        'order_by' => array('name' => 'asc'),
         'where' => array(
        //    array('publish_date', '>', 1370721177),
            array('enabled', '=', 1),
         ),
    );


	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('domain', 'Domain', 'required|max_length[255]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Company::find('all', array('array(select)' => array(   'name')));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->name" ;
				}
			}
		
		return $dlist;
	}

}
