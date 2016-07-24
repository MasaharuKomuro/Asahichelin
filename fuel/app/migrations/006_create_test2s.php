<?php

namespace Fuel\Migrations;

class Create_test2s
{
	public function up()
	{
		\DBUtil::create_table('test2s', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'test' => array('constraint' => 11, 'type' => 'int'),
			'deleted_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('test2s');
	}
}