<?php

namespace Fuel\Migrations;

class Create_chats
{
	public function up()
	{
		\DBUtil::create_table('chats', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'message' => array('type' => 'mediumtext'),
			'from_user_id' => array('constraint' => 11, 'type' => 'int'),
			'to_user_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'status' => array('constraint' => '"unread","read"', 'type' => 'enum', "default" => 'unread'),
			'chat_message_id' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'private' => array('constraint' => 1, 'type' => 'tinyint' , 'null' => true, "default" => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('chats');
	}
}