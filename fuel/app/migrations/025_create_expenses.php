<?php

namespace Fuel\Migrations;

class Create_expenses
{
	public function up()
	{
		\DBUtil::create_table('expenses', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'account_id' => array('constraint' => 11, 'type' => 'int'),
			'vendor_id' => array('constraint' => 11, 'type' => 'int' , 'null' => true),
			'paid_at' => array('type' => 'date'),
			'amount' => array('constraint' => '15,4', 'type' => 'decimal'),
			'currency_code' => array('constraint' => 3, 'type' => 'varchar'),
			'currency_rate' => array('constraint' => '15,8', 'type' => 'decimal'),
			'reference' => array('type' => 'text' , 'null' => true),
			'description' => array('type' => 'text' , 'null' => true),
			'payment_method' => array('constraint' => '"cash","cheque","cb","bankwire","ecash","other"', 'type' => 'enum', 'default' => 'cheque'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('expenses');
	}
}