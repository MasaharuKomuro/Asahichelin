<?php

class Controller_Restaurant extends Controller_Template
{

    private $per_page = 20;

    public function before()
    {
        parent::before();
        $this->template->is_admin = Auth::check();
    }

	public function action_index()
	{
		$this->template->title = 'ASAHICHELIN';
		$this->template->content = View::forge('restaurant/index');
	}

    public function action_login()
    {
        $data = array();
        $data['error_msg'] = '';
        $login_form = Fieldset::forge('login_form');
        $login_form->add('username', 'username', array('type' => 'text', 'size' => 40));
        $login_form->field('username')->add_rule('required');
        $login_form->add('password', 'password', array('type' => 'password', 'size' => 40));
        $login_form->field('password')->add_rule('required');
        $login_form->add('submit', '', array('type' => 'submit', 'value' => 'login'));
        if ($login_form->validation()->run()) {
            $fields = $login_form->validated();
            if (Auth::login($fields['username'], $fields['password'])) {
                Response::redirect('restaurant/list');
            }
            else {
                $data['error_msg'] = 'username または password が間違っています';
            }
        }
        $login_form->repopulate();
        $data['login_form'] = $login_form->build();
        $this->template->title = 'ASAHICHELIN Login';
        $this->template->content = View::forge('restaurant/login', $data, false);
    }

    public function action_logout()
    {
        if (Auth::check()) {
            $auth = Auth::instance();
            $auth->logout();
        }
        Response::redirect('restaurant');
    }

    public function action_contact()
    {
		$this->template->title = 'ASAHICHELIN Contact';
		$this->template->content = View::forge('restaurant/contact');
    }

    public function action_about()
    {
		$this->template->title = 'ASAHICHELIN About';
		$this->template->content = View::forge('restaurant/about');
    }

	public function action_list()
	{
    $data = array();
    $count = Model_Restaurant::count();
    $config = array(
                  'pagenation_url' => 'restaurant/list',
                  'uri_segment' => 3,
                  'num_links' => 4,
                  'per_page' => $this->per_page,
                  'total_items' => $count,
                  'show_first' => true,
                  'show_last' => true,
              );
    $pagenation = Pagination::forge('article_pagination', $config);
    $data['results'] = Model_Restaurant::query()
                           ->order_by('cost', 'asc')
                           ->limit($this->per_page)
                           ->offset($pagenation->offset)
                           ->get();
    $data['restaurant_labels'] = Model_Restaurant::get_labels();
		$this->template->title = 'ASAHICHELIN List';
		$this->template->content = View::forge('restaurant/list', $data);
		$this->template->content->set_safe('countLabel', '店舗数');
		$this->template->content->set_safe('count', $count);
		$this->template->content->set_safe('pagenation', $pagenation);
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
            $fieldset->repopulate();
        }
        $data['fieldset'] = $fieldset->build();
        $data['comments'] = $restaurant->comments;
		$this->template->title = 'ASAHICHELIN Detail';
		$this->template->content = View::forge('restaurant/detail', $data, false);
	}

    public function action_edit($id = 0)
    {
        $data = array();
        $fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $fieldset->add_after('submit', '', array('type' => 'submit', 'value' => '更新'), array(), 'other');
        $fieldset->field('cost')->set_error_message('valid_string', '数値のみで入力してください。');
        $fieldset->field('cost')->set_description('円');
        $restaurant = Model_Restaurant::find($id);
        if (!isset($restaurant)) {
            Response::redirect('restaurant/list');
        }
        $restaurant_id = $fieldset->input('id');
        if (!isset($restaurant_id)) {
          $fieldset->populate($restaurant);
        }
        $data['restaurant_labels'] = Model_Restaurant::get_labels();
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
        $fieldset->repopulate();
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

    public function action_delete($id = 0)
    {
        $restaurant = Model_Restaurant::find($id);
        if (!isset($restaurant) || !Auth::check()) {
            Response::redirect('restaurant/list');
        }
        $restaurant->delete();
        Response::redirect('restaurant/list');
    }

    public function action_delete_comment($r_id = 0, $c_id = 0)
    {
        $restaurant = Model_Restaurant::find($r_id);
        $comment = Model_Comment::find($c_id);
        if (!isset($restaurant) || !isset($comment) || !Auth::check()) {
            Response::redirect('restaurant/list');
        }
        $comment->delete();
        Response::redirect('restaurant/detail/'.$r_id);
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
        //$fieldset = Fieldset::forge()->add_model('Model_Restaurant');
        $restaurant_labels = Model_Restaurant::get_labels();
        $restaurant_properties = Model_Restaurant::get_properties();
        $fieldset = Fieldset::forge();
        $fieldset->add('place', $restaurant_properties['place']['label'], $restaurant_properties['place']['form']);
        $fieldset->add('station', $restaurant_properties['station']['label'], $restaurant_properties['station']['form']);
        $restaurant_properties['kind']['form']['options'] = array_merge(array('' => '指定なし'), $restaurant_properties['kind']['form']['options']);
        $fieldset->add('kind', $restaurant_properties['kind']['label'], $restaurant_properties['kind']['form']);
        $restaurant_properties['private_room']['form']['options'] = array_merge(array('' => '指定なし'), $restaurant_properties['private_room']['form']['options']);
        $fieldset->add('private_room', $restaurant_properties['private_room']['label'], $restaurant_properties['private_room']['form']);
        $restaurant_properties['cost']['form']['type'] = 'select';
        $costSearchIntervals = array(
                                    array(0, 1000000), //指定無し
                                    array(0, 3000),
                                    array(3000, 5000),
                                    array(5000, 7000),
                                    array(7000, 9000),
                                    array(9000, 12000),
                                    array(12000, 1000000),
                                );
        $restaurant_properties['cost']['form']['options'] = array(
                                                                '指定なし',                                                        // 0円〜1000000円
                                                                '〜'.$costSearchIntervals[1][1].'円',                              // 〜3000円
                                                                $costSearchIntervals[2][0].'円〜'.$costSearchIntervals[2][1].'円', // 3000円〜5000円
                                                                $costSearchIntervals[3][0].'円〜'.$costSearchIntervals[3][1].'円', // 5000円〜7000円
                                                                $costSearchIntervals[4][0].'円〜'.$costSearchIntervals[4][1].'円', // 7000円〜9000円
                                                                $costSearchIntervals[5][0].'円〜'.$costSearchIntervals[5][1].'円', // 9000円〜12000円
                                                                $costSearchIntervals[6][0].'円〜',                                 // 12000円〜
                                                            );
        $fieldset->add('cost', $restaurant_properties['cost']['label'], $restaurant_properties['cost']['form']);
        $fieldset->add('other', $restaurant_properties['other']['label'], $restaurant_properties['other']['form']);
        $fieldset->add('orderby', '表示順', array('type' => 'select', 
                                                  'options' => array(
                                                                   'asc' => '価格の低い順',
                                                                   'desc' => '価格の高い順',
                                                               ),
                                         )
                      );
        $fieldset->add('submit', '', array('type' => 'submit', 'value' => '検索'), array(), 'other');
        //if ($fieldset->validation()->run()) {
        $fieldset->validation()->run();
        if (count($fieldset->validated()) > 0) {
            $searchConditions = $fieldset->validated();
            $columns = Model_Restaurant::get_columns();
            $whereArray = array();
            $orderBy = array();
            foreach ($columns as $column) {
                #if (array_key_exists($column, $searchConditions)) {
                if (array_key_exists($column, $searchConditions) && $searchConditions[$column] != '') {
                    //if ($column == 'private_room') {
                    //    $whereArray[$column] = (bool)$searchConditions[$column];
                    //} else {
                    //    $whereArray[$column] = $searchConditions[$column];
                    //}
                    if ($column == 'private_room') {
                        $whereArray[] = array($column, (bool)$searchConditions[$column]);
                    } elseif ($column == 'cost'){
                        $whereArray[] = array($column, '>=', $costSearchIntervals[$searchConditions[$column]][0]);
                        $whereArray[] = array($column, '<=', $costSearchIntervals[$searchConditions[$column]][1]);
                    } else {
                        $whereArray[] = array($column, 'like', "%{$searchConditions[$column]}%");
                    }
                }
            }
            $data = array();
            $data['results'] = Model_Restaurant::find('all', array(
                                                                 'where' => $whereArray,
                                                                 'order_by' => array(
                                                                                   'cost' => $searchConditions['orderby'],
                                                                               ),
                                                             )
            );
            $data['restaurant_labels'] = $restaurant_labels;
            $count = count($data['results']);
		    $this->template->title = 'ASAHICHELIN Search';
		    $this->template->content = View::forge('restaurant/list', $data);
		    $this->template->content->set_safe('countLabel', '検索結果');
		    $this->template->content->set_safe('count', $count);
		    $this->template->content->set_safe('pagenation', '');
        }
        else {
            $fieldset->repopulate();
		    $this->template->title = 'ASAHICHELIN Search';
            $this->template->set('content', $fieldset->build(), false);
        }
	}

}
