<?php

namespace Fuel\Migrations;

class Create_meetings
{
	public function up()
	{
		\DBUtil::create_table('meetings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('type' => 'text'),
			'description' => array('type' => 'mediumtext'),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'location' => array('type' => 'mediumtext', 'null' => true),
			'labels' => array('type' => 'text', 'null' => true),
			'share_with' => array('type' => 'longtext','null' => true),
			'attendance_list' => array('type' => 'longtext'),
			'summary' => array('type' => 'mediumtext'),
			'color' => array('constraint' => 15, 'type' => 'varchar'),
			'start_date' => array('type' => 'date'),
			'end_date' => array('type' => 'date','null' => true),
			'start_time' => array('type' => 'time','null' => true),
			'end_time' => array('type' => 'time'),
			'recurring' => array('constraint' => 1, 'type' => 'tinyint'),
			'repeat_every' => array('constraint' => 11, 'type' => 'int'),
			'no_of_cycles' => array('constraint' => 11, 'type' => 'int'),
			'last_start_date' => array('type' => 'date', 'null' => true),
			'repeat_type' => array('constraint' => '"days","weeks","months","years"', 'type' => 'enum', 'null' => true),
			'recurring_dates' => array('type' => 'longtext'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('meetings');
	}
}