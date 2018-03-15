<?php

namespace Fuel\Migrations;

class Create_contributions
{
	public function up()
	{
		\DBUtil::create_table('contributions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'budget_id' => array('constraint' => 11, 'type' => 'int'),
			'paid_at' => array('type' => 'datetime'),
			'amount' => array('constraint' => '15,4', 'type' => 'decimal'),
			'currency_code' => array('constraint' => 3, 'type' => 'varchar'),
			'currency_rate' => array('constraint' => '15,8', 'type' => 'decimal'),
			'description' => array('type' => 'text'),
			'payment_method' => array('constraint' => '"cash","cheque","cb","bankwire","ecash","other"', 'type' => 'enum'),
			'reference' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('contributions');
	}
}