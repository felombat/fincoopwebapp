<?php

namespace Fuel\Migrations;

class Create_todos
{
	public function up()
	{
		\DBUtil::create_table('todos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'mediumtext', 'null' => true),
			'labels' => array('type' => 'text', 'null' => true),
			'status' => array('constraint' => '"to_do","done","pending"', 'type' => 'enum'),
			'start_date' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('todos');
	}
}