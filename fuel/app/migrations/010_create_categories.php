<?php

namespace Fuel\Migrations;

class Create_categories
{
	public function up()
	{
		\DBUtil::create_table('categories', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'type' => array('constraint' => 255, 'type' => 'varchar'),
			'color' => array('constraint' => 10, 'type' => 'varchar', 'null' => true),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('categories');
	}
}