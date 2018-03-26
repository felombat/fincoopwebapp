<?php

class Model_Employee extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'first_name' => array( //column name
            'data_type' => 'string',
            'label' => 'First Name', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)) //validation rules
            ),
		'last_name'=> array( //column name
            'data_type' => 'string',
            'label' => 'Last Name', //label for the input field
            'validation' => array('required', 'max_length'=>array(65), 'min_length'=>array(2)) //validation rules
        ),
		'user_id',
		'role_id',
		'jobtile_id'=> array( //column name
            'data_type' => 'string',
            'label' => 'Job Title', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)) //validation rules
        ),
		'company_id'=> array( //column name
            'data_type' => 'string',
            'label' => 'Company', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)), //validation rules
            'form' => array('type' => 'select', 'options' => array(1=>'Astrio', 2=>'ISMACOM' , 3=>'Astrio Tech')),
        ),
		'tel'=> array( //column name
            'data_type' => 'string',
            'label' => 'Mobile/Tel', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)) //validation rules
        ),
		'email'=> array( //column name
            'data_type' => 'string',
            'label' => 'Email', //label for the input field
            'validation' =>  array('required', 'valid_email') //validation rules
        ),
		'address1'=> array( //column name
            'data_type' => 'string',
            'label' => 'Address Line 1', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)) //validation rules
        ),
		'address2' => array( //column name
            'data_type' => 'string',
            'label' => 'Address Line 2', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)) //validation rules
        ),
		'avatar_file',
		'notes'=> array( //column name
            'data_type' => 'string',
            'label' => 'Notes / About ', //label for the input field
            'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(3)), //validation rules
            'form' => array('type' => 'textarea', 'placeholder' => "About ... "),
        ),
		'deleted_at',
		'created_at',
		'updated_at',
	);
    protected static $_props = array(
        'post_title' => array( //column name
        'data_type' => 'string',
        'label' => 'Post Title', //label for the input field
        'validation' => array('required', 'max_length'=>array(100), 'min_length'=>array(10)) //validation rules
        ),
        'post_content' => array(
        'data_type' => 'string',
        'label' => 'Post Content',
        'validation' => array('required')
        ),
        'author_name' => array(
        'data_type' => 'string',
        'label' => 'Author Name',
        'validation' =>  array('required', 'max_length'=>array(65), 'min_length'=>array(2))
        ),
        'author_email' => array(
        'data_type' => 'string',
        'label' => 'Author Email',
        'validation' =>  array('required', 'valid_email')
        ),
        'author_website' => array(
        'data_type' => 'string',
        'label' => 'Author Website',
        'validation' =>  array('required', 'valid_url', 'max_length'=>array(60))
        ),
        'post_status' => array(
        'data_type' => 'string',
        'label' => 'Post Status',
        'validation' => array('required'),
        'form' => array('type' => 'select', 'options' => array(1=>'Published', 2=>'Draft')),
        )
    );

	protected static $_belongs_to = array(
		"user" => array(
		        'key_from' => 'user_id',
		        'model_to' => 'Model_User',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 

		"jobtitle" =>  array(
		        'key_from' => 'jobtile_id',
		        'model_to' => 'Model_Jobtitle',
		        'key_to' => 'id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		"company"     


		);

	protected static $_has_many = array(
		"messages" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Message',
		        'key_to' => 'form_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 
		"mails" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Message',
		        'key_to' => 'to_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ), 
		"chats" => array(
		        'key_from' => 'id',
		        'model_to' => 'Model_Chat',
		        'key_to' => 'from_user_id',
		        'cascade_save' => true,
		        'cascade_delete' => false,
		    ),
		);



	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('first_name', 'Firstname', 'required|max_length[255]');
		$val->add_field('last_name', 'Lastname', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|numeric');
		$val->add_field('role_id', 'Role id', 'required|numeric');
		$val->add_field('address1', 'Address 1', 'required|max_length[255]');
		$val->add_field('jobtile_id', 'Job title', 'required|numeric');
		


		return $val;
	}


	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_conditions = array(
        'order_by' => array('id' => 'desc'),
        //'where' => array(
        //    array('publish_date', '>', 1370721177),
        //    array('published', '=', 1),
        //),
    );

	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);

    protected static $_to_array_exclude = array(
        'password', 'login_hash' 	// exclude these columns from being exported
    );

	protected static $_table_name = 'employees';

	public static function get_dropdownlist($exclude = array() ){
		$dlist = []; 
		$empty= ['-' => "Please select ..."];
		$dlist['-']= "Please select ..."; 
		$entry = Model_Employee::find('all', array('array(select)' => array( 'first_name', 'last_name')));
		foreach ($entry as $key => $row) {
				if(isset($exclude) && !in_array($row->id, $exclude)){

					$dlist[$row->id] =  "$row->first_name $row->last_name" ;
				}
			}
		
		return $dlist;
	}

	public static function get_avatar($user_id = 0, $size = 64 ,$class = 'img-circle'){
		$employee = Model_Employee::find($user_id);
		list ($auth_driver, $current_user_id) = \Auth::get_user_id();
		$_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size]);;
		if(isset($employee)  AND empty($employee->avatar_file)) 
		{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $employee->first_name .' '. $employee->last_name]);
		}elseif(isset($employee) AND !empty($employee->avatar_file)) 
		{
			return $_avatar = Asset::img("$employee->avatar_file", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $employee->first_name .' '. $employee->last_name]);
		}else{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>$class, 'height'=>$size, 'width'=>$size,'alt'=>'...', 'title'=>" #~.`# "]);
		}

		//return $_avatar;

	}

	public static function get_profile($user_id = 0, $size = 64, $class = 'img-circle' ){
		$employee = Model_Employee::find($user_id);
		list ($auth_driver, $current_user_id) = \Auth::get_user_id();
		$_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size]);;
		if(isset($employee)  AND empty($employee->avatar_file)) 
		{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $employee->first_name .' '. $employee->last_name]);
		}elseif(isset($employee) AND !empty($employee->avatar_file)) 
		{
			return $_avatar = Asset::img("$employee->avatar_file", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size, 'alt'=>'...', 'title'=> $employee->first_name .' '. $employee->last_name]);
		}else{
			return $_avatar = Asset::img("avatar.jpg", ['alt'=>"image" ,'class'=>"img-circle", 'height'=>$size, 'width'=>$size,'alt'=>'...', 'title'=>" #~.`# "]);
		}

		//return $_avatar;

	}
	
}