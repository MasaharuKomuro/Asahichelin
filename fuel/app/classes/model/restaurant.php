<?php

class Model_Restaurant extends \Orm\Model
{
	protected static $_properties = array(
		'id' => array(
            'form' => array('type' => 'hidden'),
        ),
        'place' => array(
            'data_type' => 'varchar',
            'label' => '場所',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
        'station' => array(
            'data_type' => 'varchar',
            'label' => '最寄り駅',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
		'name' => array(
            'data_type' => 'varchar',
            'label' => '店名',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
		'kind' => array(
            'data_type' => 'varchar',
            'label' => '業態',
            'validation' => array('required', 'max_length'=>array(20)),
            'form' => array('type' => 'text'),
        ),
		'private_room' => array(
            'data_type' => 'bool',
            'label' => '個室',
            'validation' => array('required'),
            'form' => array('type' => 'select', 'options' => array('true' => 'あり', 'false' => 'なし')),
        ),
		'phone' => array(
            'data_type' => 'varchar',
            'label' => '電話番号',
            'validation' => array('required', 'max_length'=>array(20)),
            'form' => array('type' => 'text'),
        ),
		'cost' => array(
            'data_type' => 'int',
            'label' => '一人当たり予算',
            'validation' => array('required', 'valid_string'=>array(array('numeric'))),
            'form' => array('type' => 'text'),
        ),
		'department' => array(
            'data_type' => 'varchar',
            'label' => '部門',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
		'recommender' => array(
            'data_type' => 'varchar',
            'label' => '推薦者',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
		'link' => array(
            'data_type' => 'varchar',
            'label' => 'サイトURL',
            'validation' => array('required', 'valid_url', 'max_length'=>array(100)),
            'form' => array('type' => 'text'),
        ),
		'other' => array(
            'data_type' => 'text',
            'label' => '備考',
            'validation' => array(),
            'form' => array('type' => 'textarea'),
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

	protected static $_table_name = 'restaurants';
    protected static $_has_many = array(
        'comments' => array(
            'model_to' => 'Model_Comment',
            'key_from' => 'id',
            'key_to' => 'restaurant_id',
            'cascade_save' => false,
            'cascade_delete' => true,
        ),
    );

}
