<?php

namespace Fuel\Migrations;

class Create_employees
{
	public function up()
	{
		\DBUtil::create_table('employees', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'first_name' => array('constraint' => 255, 'type' => 'varchar'),
			'last_name' => array('constraint' => 255, 'type' => 'varchar'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'role_id' => array('constraint' => 11, 'type' => 'int'),
			'jobtile_id' => array('constraint' => 11, 'type' => 'int'),
			'tel' => array('constraint' => 255, 'type' => 'varchar'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'address1' => array('constraint' => 255, 'type' => 'varchar'),
			'address2' => array('constraint' => 255, 'type' => 'varchar'),
			'avatar_file' => array('constraint' => 255, 'type' => 'varchar'),
			'notes' => array('type' => 'text'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('employees');
	}
}