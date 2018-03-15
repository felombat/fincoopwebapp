<?php

namespace Fuel\Migrations;

class Create_messages
{
	public function up()
	{
		\DBUtil::create_table('messages', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'subject' => array('constraint' => 255, 'type' => 'varchar'),
			'message' => array('type' => 'longtext'),
			'form_user_id' => array('constraint' => 11, 'type' => 'int'),
			'to_user_id' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => '"unread","read"', 'type' => 'enum'),
			'message_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'files' => array('type' => 'longtext'),
			'deleted_by_users' => array('type' => 'text', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('messages');
	}
}