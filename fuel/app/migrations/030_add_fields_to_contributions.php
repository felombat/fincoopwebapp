<?php

namespace Fuel\Migrations;

class Add_fields_to_contributions
{
	public function up()
	{
		\DBUtil::add_fields('contributions', array(
			'type' => array('constraint' => '"credit","debit"', 'type' => 'enum'),
			'status' => array('constraint' => '"paid","cancelled","scheduled","partial"', 'type' => 'enum', 'default' => 'paid'),
			'created_by' => array('constraint' => 11, 'type' => 'int'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'category_id' => array('constraint' => 11, 'type' => 'int', 'default' => '1'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('contributions', array(
			'type'
,			'status'
,			'created_by'
,			'deleted_at'
,			'category_id'

		));
	}
}