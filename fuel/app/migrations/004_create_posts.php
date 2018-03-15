<?php

namespace Fuel\Migrations;

class Create_posts
{
	public function up()
	{
		\DBUtil::create_table('posts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'description' => array('type' => 'mediumtext'),
			'post_id' => array('constraint' => 11, 'type' => 'int'),
			'share_with' => array('type' => 'text', 'null' => true),
			'files' => array('type' => 'longtext', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('posts');
	}
}