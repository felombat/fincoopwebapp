<?php

namespace Fuel\Migrations;

class Create_vendors
{
	public function up()
	{
		\DBUtil::create_table('vendors', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'phone' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'email' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'website' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('vendors');
	}
}