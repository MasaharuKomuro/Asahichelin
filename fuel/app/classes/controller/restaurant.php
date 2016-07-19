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
        $data = array();
        $data['results'] = Model_Restaurant::find('all');
        $data['restaurant_labels'] = Model_Restaurant::get_labels();
		$this->template->title = 'ASAHICHELIN List';
		$this->template->content = View::forge('restaurant/list', $data);
	}

	public function action_detail($id = 0)
	{
        $data = array();
        $restaurant = Model_Restaurant::find($id);
        $data['restaurant_labels'] = Model_Restaurant::get_labels();
        if (!isset($restaurant)) {
            Response::redirect('restaurant/list');
        }
        $data['restaurant'] = $restaurant;
        $fieldset = Fieldset::forge()->add_model('Model_Comment');
        $fieldset->field('restaurant_id')->set_value($restaurant->id);
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => 'コメント投稿'), array(), 'body');
        if ($fieldset->validation()->run()) {
            $fields = $fieldset->validated();
            $comment = Model_Comment::forge();
            $comment->restaurant_id = $fields['restaurant_id'];
            $comment->department = $fields['department'];
            $comment->name = $fields['name'];
            $comment->body = $fields['body'];
            if ($comment->save()) {
                Response::redirect("restaurant/detail/$restaurant->id");
            }
        }
        else {
            $fieldset->populate($fieldset->validated());
        }
        $data['fieldset'] = $fieldset->build();
        $data['comments'] = $restaurant->comments;
		$this->template->title = 'ASAHICHELIN Detail';
		$this->template->content = View::forge('restaurant/detail', $data, false);
	}

    public function action_edit($id = 0)
    {
        $data = array();
        $restaurant = Model_Restaurant::find($id);
        $data['restaurant_labels'] = Model_Restaurant::get_labels();
        if (!isset($restaurant)) {
            Response::redirect('restaurant/list');
        }
        $fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '更新'), array(), 'other');
        $fieldset->field('cost')->set_error_message('valid_string', '数値のみで入力してください。');
        $fieldset->field('cost')->set_description('円');
        if ($fieldset->validation()->run()) {
            $fields = $fieldset->validated();
            $restaurant->place = $fields['place'];
            $restaurant->station = $fields['station'];
            $restaurant->name = $fields['name'];
            $restaurant->kind = $fields['kind'];
            $restaurant->private_room = (bool)$fields['private_room'];
            $restaurant->phone = $fields['phone'];
            $restaurant->cost = $fields['cost'];
            $restaurant->department = $fields['department'];
            $restaurant->recommender = $fields['recommender'];
            $restaurant->link = $fields['link'];
            $restaurant->other = $fields['other'];
            if ($restaurant->save()) {
                Response::redirect('restaurant/list');
            }
        }
        $fieldset->populate($restaurant);
        $fieldset->populate($fieldset->validated());
        #$true_or_false = $fieldset->validation()->run();
		$this->template->title = 'ASAHICHELIN Edit';
		#$this->template->title = $true_or_false;
        $this->template->set('content', $fieldset->build(), false);
    }

    public function action_edit_comment($r_id = 0, $c_id = 0) {
        $data = array();
        $restaurant = Model_Restaurant::find($r_id);
        if (!isset($restaurant)) {
            Response::redirect('restaurant/list');
        }
        $data['restaurant'] = $restaurant;
        $data['restaurant_labels'] = Model_Restaurant::get_labels();
        $comment = Model_Comment::find($c_id);
        if (!isset($comment)) {
            Response::redirect('restaurant/list');
        }
        $fieldset = Fieldset::forge()->add_model('Model_Comment');
        $fieldset->field('restaurant_id')->set_value($restaurant->id);
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => 'コメント更新'), array(), 'body');
        $fieldset->populate($comment);
        if ($fieldset->validation()->run()) {
            $fields = $fieldset->validated();
            $comment->restaurant_id = $fields['restaurant_id'];
            $comment->department = $fields['department'];
            $comment->name = $fields['name'];
            $comment->body = $fields['body'];
            if ($comment->save()) {
                Response::redirect("restaurant/detail/$restaurant->id");
            }
        }
        $fieldset->populate($fieldset->validated());
        $data['fieldset'] = $fieldset->build();
		$this->template->title = 'ASAHICHELIN Edit Comment';
		$this->template->content = View::forge('restaurant/edit_comment', $data, false);
    }

    public function action_form()
    {
        $fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '登録'), array(), 'other');
        $fieldset->field('cost')->set_error_message('valid_string', '数値のみで入力してください。');
        $fieldset->field('cost')->set_description('円');
        if ($fieldset->validation()->run()) {
            $fields = $fieldset->validated();
            $restaurant = Model_Restaurant::forge();
            $restaurant->place = $fields['place'];
            $restaurant->station = $fields['station'];
            $restaurant->name = $fields['name'];
            $restaurant->kind = $fields['kind'];
            $restaurant->private_room = (bool)$fields['private_room'];
            $restaurant->phone = $fields['phone'];
            $restaurant->cost = $fields['cost'];
            $restaurant->department = $fields['department'];
            $restaurant->recommender = $fields['recommender'];
            $restaurant->link = $fields['link'];
            $restaurant->other = $fields['other'];
            if ($restaurant->save()) {
                Response::redirect('restaurant/list');
            }
        }
        else {
            $fieldset->populate($fieldset->validated());
        }
        #$true_or_false = $fieldset->validation()->run();
		$this->template->title = 'ASAHICHELIN Form';
		#$this->template->title = $true_or_false;
        $this->template->set('content', $fieldset->build(), false);
    }

	public function action_search()
	{
        $fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '検索'), array(), 'other');
        $fieldset->field('cost')->set_error_message('valid_string', '数値のみで入力してください。');
        $fieldset->field('cost')->set_description('円');
        if ($fieldset->validation()->run()) {
            Response::redirect('restaurant/list');
        }
        else {
            $fieldset->populate($fieldset->validated());
        }
        #$true_or_false = $fieldset->validation()->run();
		$this->template->title = 'ASAHICHELIN Search';
		#$this->template->title = $true_or_false;
        $this->template->set('content', $fieldset->build(), false);
	}

}
