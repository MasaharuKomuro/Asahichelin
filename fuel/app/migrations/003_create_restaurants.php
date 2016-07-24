<?php

namespace Fuel\Migrations;

class Create_restaurants
{
	public function up()
	{
		\DBUtil::create_table('restaurants', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'place' => array('constraint' => 50, 'type' => 'varchar'),
			'station' => array('constraint' => 50, 'type' => 'varchar'),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'kind' => array('constraint' => 20, 'type' => 'varchar'),
			'private_room' => array('type' => 'bool'),
			'phone' => array('constraint' => 20, 'type' => 'varchar'),
			'cost' => array('constraint' => 11, 'type' => 'int'),
			'department' => array('constraint' => 50, 'type' => 'varchar'),
			'recommender' => array('constraint' => 50, 'type' => 'varchar'),
			'link' => array('constraint' => 255, 'type' => 'varchar'),
			'other' => array('type' => 'text'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('restaurants');
	}
}