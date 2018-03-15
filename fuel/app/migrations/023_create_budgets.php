<?php

namespace Fuel\Migrations;

class Create_budgets
{
	public function up()
	{
		\DBUtil::create_table('budgets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'category_id' => array('constraint' => 11, 'type' => 'int'),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 1),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('budgets');
	}
}