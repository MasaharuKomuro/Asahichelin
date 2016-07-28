<?php

class Model_Restaurant extends \Orm\Model_Soft
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
            'label' => '最寄り駅 (路線名)',
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
            'label' => 'ジャンル',
            'validation' => array('required'),
            'form' => array('type' => 'select', 'options' => array(
                                                                    '和食' => '和食',
                                                                    '洋食・西洋料理' => '洋食・西洋料理',
                                                                    '中華料理' => '中華料理',
                                                                    'アジア・エスニック' => 'アジア・エスニック',
                                                                    'カレー' => 'カレー',
                                                                    '焼肉・ホルモン' => '焼肉・ホルモン',
                                                                    '鍋' => '鍋',
                                                                    '居酒屋・ダイニングバー' => '居酒屋・ダイニングバー',
                                                                    'ファミレス' => 'ファミレス',
                                                                    'ラーメン' => 'ラーメン',
                                                                    'カフェ' => 'カフェ',
                                                                    'バー' => 'バー',
                                                                    'パブ' => 'パブ',
                                                                    'ラウンジ' => 'ラウンジ',
                                                                    'ワインバー' => 'ワインバー',
                                                                    'ビアガーデン' => 'ビアガーデン',
                                                                    'ビアバー' => 'ビアバー',
                                                                    '旅館' => '旅館',
                                                                    'その他' => 'その他',
                                                                   )
                            ),
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
        'recommender' => array(
            'data_type' => 'varchar',
            'label' => '推薦者',
            'validation' => array('required', 'max_length'=>array(50)),
            'form' => array('type' => 'text'),
        ),
        'department' => array(
            'data_type' => 'varchar',
            'label' => '所属部門',
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
		'deleted_at' => array(
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
    static public function get_labels() {
        $labels = array();
        foreach (self::$_properties as $property => $arr) {
            if (isset($arr['label'])) {
                $labels[$property] = $arr['label'];
            }
        }
        return $labels;
    }
    static public function get_columns() {
        $columns = array();
        foreach (self::$_properties as $property => $arr) {
            $columns[] = $property;
        }
        return $columns;
    }
    static public function get_properties() {
        return self::$_properties;
    }

}
