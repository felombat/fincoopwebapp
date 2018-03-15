<?php

namespace Fuel\Migrations;

class Create_transactions
{
	public function up()
	{
		\DBUtil::create_table('transactions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'from_account_id' => array('constraint' => 11, 'type' => 'int'),
			'to_account_id' => array('constraint' => 11, 'type' => 'int'),
			'amount' => array('constraint' => 11, 'type' => 'int'),
			'currency_id' => array('constraint' => 11, 'type' => 'int'),
			'currency_rate' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 1, 'type' => 'tinyint', "null" => true, "default" => 1),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('transactions');
	}
}