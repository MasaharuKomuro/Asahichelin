<?php

class Controller_GenerateTestData extends Controller_Template
{

	public function action_index()
	{
        for ($i=1; $i<=200; $i++) {
            $propeties = Model_Restaurant::get_properties();
            $kinds = array_keys($propeties['kind']['form']['options']);
            $restaurant = Model_Restaurant::forge();
            $restaurant->place = '場所'.$i;
            $restaurant->station = '駅'.$i;
            $restaurant->name = 'レストラン名'.$i;
            $restaurant->kind = $kinds[$i % 19];
            $restaurant->private_room = (bool) ($i % 2);
            $restaurant->phone = sprintf("03-1234-%'.04d", $i);
            $restaurant->cost = sprintf("%d00", $i);
            $restaurant->department = '部門'.$i;
            $restaurant->recommender = '朝日太郎'.$i;
            $restaurant->link = sprintf("http://www.asahi%d.com", $i);
            $restaurant->other = '備考'.$i;
            $restaurant->save();
        }
		$this->template->title = 'ASAHICHELIN GenerateTestData';
		$this->template->content = View::forge('generateTestData/index');
    }

	public function action_delete($id = 0)
	{
        $restaurant = Model_Restaurant::find($id);
        if ($id === 'all') {
            foreach ($restaurant as $entry) {
                $entry->delete();
            }
        } elseif (isset($restaurant)) {
            $restaurant->delete();
        }
		$this->template->title = 'ASAHICHELIN GenerateTestData Delete';
		$this->template->content = View::forge('generateTestData/delete');
    }
}

