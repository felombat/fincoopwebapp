<?php

class Model_Setting extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'setting_name',
		'setting_value',
	);


	protected static $_table_name = 'settings';

}
