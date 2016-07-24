<?php

class Model_Comment extends \Orm\Model_Soft
{

    protected static $_properties = array(
        'id' => array(
            'form' => array('type' => 'hidden'),
        ),
        'restaurant_id' => array(
            'form' => array('type' => 'hidden'),
        ),
        'name' => array(
            'data_type' => 'varchar',
            'label' => '氏名',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
        'department' => array(
            'data_type' => 'varchar',
            'label' => '所属部門',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
        'body' => array(
            'data_type' => 'text',
            'label' => 'コメント欄',
            'validation' => array('required'),
            'form' => array('type' => 'textarea'),
        ),
		'deleted_at', array(
            'form' => array('type' => 'hidden'),
        ),
        'created_at' => array(
            'form' => array('type' => 'hidden'),
        ),
        'updated_at' => array(
            'form' => array('type' => 'hidden'),
        ),
    );
    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );
	protected static $_soft_delete = array(
		'mysql_timestamp' => false,
	);
    protected static $_table_name = 'comments';
}
