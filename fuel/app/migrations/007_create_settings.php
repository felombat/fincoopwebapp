<?php

namespace Fuel\Migrations;

class Create_settings
{
	public function up()
	{
		\DBUtil::create_table('settings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'setting_name' => array('constraint' => 100, 'type' => 'varchar'),
			'setting_value' => array('type' => 'mediumtext'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('settings');
	}
}