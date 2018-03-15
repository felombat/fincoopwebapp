<?php
use Orm\Model;

class Model_Category extends Model
{
	protected static $_properties = array(
		'id',
		'company_id',
		'title',
		'type',
		'color',
		'enabled',
	);

	protected static $_has_many = array(
		"items" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Item',
		        'key_to' => 'category_id',
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
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('type', 'Type', 'required|max_length[255]');
		//, 'null' => true$val->add_field('color', 'Color', 'required|max_length[10]');
		$val->add_field('enabled', 'Enabled', 'required');

		return $val;
	}

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Vendor::find('all', array(
			array('select' => array( 'type','title')),
			array('where' => array(
					array('company_id' => 1)
				)
			)));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->type - $row->title" ;
				}
			}
		
		return $dlist;
	}

}
