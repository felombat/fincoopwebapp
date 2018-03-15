<?php

namespace Fuel\Migrations;

class Create_meetings_todos
{
	public function up()
	{
		\DBUtil::create_table('meetings_todos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'meeting_id' => array('constraint' => 11, 'type' => 'int'),
			'todo_id' => array('constraint' => 11, 'type' => 'int'),
			'action_owner_id' => array('constraint' => 11, 'type' => 'int'),
			'contributors' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('meetings_todos');
	}
}