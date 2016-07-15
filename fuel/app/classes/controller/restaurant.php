<?php

class Controller_Restaurant extends Controller_Template
{

	public function action_index()
	{
		$this->template->title = 'ASAHICHELIN';
		$this->template->content = View::forge('restaurant/index');
	}

	public function action_list()
	{
		$this->template->title = 'ASAHICHELIN List';
		$this->template->content = View::forge('restaurant/list');
	}

	public function action_detail()
	{
		$this->template->title = 'ASAHICHELIN Detail';
		$this->template->content = View::forge('restaurant/detail');
	}

    public function action_form()
    {
        $fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '投稿'), array(), 'other');
        if ($fieldset->validation()->run()) {
            $fields = $fieldset->validated();
            $restaurant = Model_Restaurant::forge();
            $restaurant->place = $fields['place'];
            $restaurant->station = $fields['station'];
            $restaurant->name = $fields['name'];
            $restaurant->kind = $fields['kind'];
            $restaurant->private_room = $fields['private_room'];
            $restaurant->phone = $fields['phone'];
            $restaurant->cost = $fields['cost'];
            $restaurant->department = $fields['department'];
            $restaurant->recommender = $fields['recommender'];
            $restaurant->link = $fields['link'];
            $restaurant->other = $fields['other'];
            if ($restaurant->save()) {
                Response::redirect('restaurant');
            }
        }
        #$true_or_false = $fieldset->validation()->run();
		$this->template->title = 'ASAHICHELIN Form';
		#$this->template->title = $true_or_false;
        $this->template->set('content', $fieldset->build(), false);
    }

	public function action_search()
	{
		$this->template->title = 'ASAHICHELIN Search';
		$this->template->content = View::forge('restaurant/search');
	}

}
