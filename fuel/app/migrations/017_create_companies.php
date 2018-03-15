<?php

namespace Fuel\Migrations;

class Create_companies
{
	public function up()
	{
		\DBUtil::create_table('companies', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'domain' => array('constraint' => 255, 'type' => 'varchar'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('companies');
	}
}