<?php
namespace Model;
use \DB;

class Welcome extends \Model {

    public static function get_results() {
        $query = DB::select()->from('asahichelin2');
        $viewdata = $query->execute();
        return $viewdata;
    }

    public static function insert_data($data) {
        list($insert_id, $rows_affected) = DB::insert('asahichelin2')->set(array(
            'place'        => $data['place'],
            'station'      => $data['station'],
            'name'         => $data['restaurant_name'],
            'kind'         => $data['kind'], 
            'private_room' => $data['private_room'],
            'phone'        => $data['phone'],
            'cost'         => $data['cost'],
            'department'   => $data['department'],
            'recommender'  => $data['recommender'],
            'link'         => $data['link'],
            'other'        => $data['other'],
        ))->execute();
    }
}
