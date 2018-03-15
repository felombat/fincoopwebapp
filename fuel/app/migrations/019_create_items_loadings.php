<?php

namespace Fuel\Migrations;

class Create_items_loadings
{
	public function up()
	{
		\DBUtil::create_table('items_loadings', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'item_id' => array('constraint' => 11, 'type' => 'int'),
			'loading_id' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('items_loadings');
	}
}