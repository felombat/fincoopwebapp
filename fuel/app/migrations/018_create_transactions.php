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
			'amount' => array('constraint' => '15,4', 'type' => 'decimal'),
			'currency_code' => array('constraint' => 3, 'type' => 'varchar'),
			'currency_rate' => array('constraint' => '15,8', 'type' => 'decimal'),
			'payment_method' => array('constraint' => '"cash","cheque","cb","bankwire","ecash","other"', 'type' => 'enum', 'default' => 'cheque'),
			'reference' => array('type' => 'text' , 'null' => true),
			'type' => array('constraint' => 1, 'type' => 'tinyint', "null" => true, "default" => 1),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('transactions');
	}
}