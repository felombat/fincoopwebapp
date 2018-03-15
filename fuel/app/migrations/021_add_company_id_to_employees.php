<?php

namespace Fuel\Migrations;

class Add_company_id_to_employees
{
	public function up()
	{
		\DBUtil::add_fields('employees', array(
			'company_id' => array('constraint' => 11, 'type' => 'int'),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('employees', array(
			'company_id'

		));
	}
}