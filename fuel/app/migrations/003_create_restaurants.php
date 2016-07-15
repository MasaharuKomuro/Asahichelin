<?php

namespace Fuel\Migrations;

class Create_restaurants
{
	public function up()
	{
		\DBUtil::create_table('restaurants', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'place' => array('constraint' => 50, 'type' => 'varchar', 'varchar' => '100', 'bool' => true, 'int' => true, 'text' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('restaurants');
	}
}