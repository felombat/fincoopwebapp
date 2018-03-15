<?php

namespace Fuel\Migrations;

class Create_announcements
{
	public function up()
	{
		\DBUtil::create_table('announcements', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'read_by' => array('type' => 'mediumtext', 'null' => true),
			'share_with' => array('type' => 'mediumtext','null' => true),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'mediumtext'),
			'file' => array('type' => 'longtext'),
			'start_date' => array('type' => 'date'),
			'end_date' => array('type' => 'date'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('announcements');
	}
}