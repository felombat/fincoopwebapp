<?php

namespace Fuel\Migrations;

class Create_activitylogs
{
	public function up()
	{
		\DBUtil::create_table('activitylogs', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'action' => array('constraint' => '"created","updated","deleted"', 'type' => 'enum'),
			'log_type' => array('constraint' => 50, 'type' => 'varchar'),
			'log_type_title' => array('type' => 'mediumtext'),
			'log_type_id' => array('constraint' => 11, 'type' => 'int'),
			'changes' => array('type' => 'mediumtext'),
			'log_for' => array('constraint' => 50, 'type' => 'varchar'),
			'log_for_id' => array('constraint' => 11, 'type' => 'int'),
			'log_for2' => array('constraint' => 50, 'type' => 'varchar'),
			'log_for_id2' => array('constraint' => 11, 'type' => 'int'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('activitylogs');
	}
}