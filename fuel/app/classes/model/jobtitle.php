<?php
use Orm\Model;

class Model_Jobtitle extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'created_at',
		'updated_at',
	);

	protected static $_has_many = array(
		 
		"employees" =>  array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Employee',
		        'key_to' => 'jobtile_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),     


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
		$val->add_field('title', 'Title', 'required|max_length[255]');

		return $val;
	}

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Jobtitle::find('all', array('array(select)' => array( 'title')));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->title" ;
				}
			}
		
		return $dlist;
	}

}
