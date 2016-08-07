<?php Asset::add_path('assets/favicon/', 'img') ?>
<div class="contents" style="background-color: white">
<h1 style="font-size: 1.2rem; margin: 0; padding: 10px 10px; text-align: left; height: 30px;"><?=$countLabel?> <?=$count?>件</h1>
<hr style="margin: 5px 10px">

<?php foreach ($results as $result): ?>
    
    <div class="panel panel-default" style="margin: 20px 10px">
        <div class="panel-heading panel-heading-list"><?php echo $result->name ?></div>
        <div class="panel-body panel-headding-color">
            <div class="row list_content_main">
                <div class="left-info col-md-3">
                    <div class="kind"><?php echo $result->kind ?></div>
                    <div class="cost">
                    <?php echo Asset::img('en.png', array("class" => "list_favicon")); ?>
                    <?php echo $result->cost ?></div>
                    <div class="public_room <?php if($result->private_room) echo "private_room" ?>">個室</div>
                </div>
                <div class="right-info col-md-9">
                    <p><?php echo Asset::img('map.png', array("class" => "list_favicon")); ?>
                    <a class="place"><?php echo $result->place ?> ( </a>
                    <?php echo Asset::img('train.png', array("class" => "list_favicon")); ?>
                    <a class="station"><?php echo $result->station ?></a<a> )</a>
                    </p>
                    <p>
                    <a class="telephone"><?php echo $result->phone ?> ( </a>
                    <a href="<?php echo $result->link ?>" class="url"><?php echo $result->link ?></a> )
                    </p>
                    <div class=overflow_hidden>
                    <p><a class="consideration">備考 : <?php echo $result->other ?></a>
                    </p></div>
                    <div class="recommender">
                        <a>投稿者　：　</a>
                        <a><?php echo $result->department ?></a>
                        <a><?php echo $result->recommender ?></a>
                        <?php if ($result->updated_at === null): ?>
                            <a><?php echo date('Y年m月d日', $result->created_at) ?></a>
                        <?php else: ?>
                            <a><?php echo date('Y年m月d日', $result->updated_at) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php if (Auth::check()): ?>
                    <a class="button-delete delete-confirmation" href="/restaurant/delete/<?php echo $result->id ?>" onclick="return confirm('削除してよろしいですか？');">削除</a>
                    <a class="partition">  |  </a>
                <?php endif; ?>
                <a class="button-edit" href="/restaurant/edit/<?php echo $result->id ?>">編集</a>
                <a class="partition">  |  </a>
                <a class="button-detail" href="/restaurant/detail/<?php echo $result->id ?>">コメント( <?php echo count($result->comments)?>件 )</a>
            </div>
        </div>
    </div>


<?php endforeach; ?>
</div>

<?php echo $pagenation?><br>
<input class="submit_list btn paper paper-curl-right" type="button" onclick="location.href='/restaurant/search'" value="検索画面へ">
