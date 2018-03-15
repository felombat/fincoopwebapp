<?php

namespace Fuel\Migrations;

class Create_accounts
{
	public function up()
	{
		\DBUtil::create_table('accounts', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'number' => array('constraint' => 255, 'type' => 'varchar'),
			'currency_code' => array('constraint' => 3, 'type' => 'varchar' , 'default' => 'XAF'),
			'opening_balance' => array('constraint' => '15,4', 'type' => 'decimal' , 'default' => 0.0),
			'bank_name' => array('constraint' => 255, 'type' => 'varchar'),
			'bank_phone' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'bank_address' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'enabled' => array('constraint' => 1, 'type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('accounts');
	}
}