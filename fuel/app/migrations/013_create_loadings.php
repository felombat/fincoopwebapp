<?php

namespace Fuel\Migrations;

class Create_loadings
{
	public function up()
	{
		\DBUtil::create_table('loadings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'company_id' => array('constraint' => 11, 'type' => 'int'),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'start_date' => array('type' => 'datetime'),
			'item_id' => array('constraint' => 11, 'type' => 'int'),
			'machenery_id' => array('constraint' => 11, 'type' => 'int'),
			'silo_id' => array('constraint' => 11, 'type' => 'int'),
			'weight' => array('constraint' => '10,3', 'type' => 'decimal'),
			'unit' => array('constraint' => '"kt","t","kg","m3"', 'type' => 'enum'),
			'vendor_id' => array('constraint' => 11, 'type' => 'int'),
			'site_id' => array('constraint' => 11, 'type' => 'int'),
			'canceled' => array('constraint' => 1, 'type' => 'tinyint'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('loadings');
	}
}