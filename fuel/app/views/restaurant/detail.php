
<?php Asset::add_path('assets/favicon/', 'img') ?>
<div class="contents" style="background-color: white">
    
    <div class="panel panel-default" style="margin: 20px 10px">
        <div class="panel-heading panel-heading-list"><?php echo $restaurant->name ?></div>
        <div class="panel-body panel-headding-color">
            <div class="row list_content_main">
                <div class="left-info col-md-3">
                    <div class="kind"><?php echo $restaurant->kind ?></div>
                    <div class="cost">
                    <?php echo Asset::img('en.png', array("class" => "list_favicon")); ?>
                    <?php echo $restaurant->cost ?></div>
                    <div class="public_room <?php if($restaurant->private_room) echo "private_room" ?>">個室</div>
                </div>
                <div class="right-info col-md-9">
                    <p><?php echo Asset::img('map.png', array("class" => "list_favicon")); ?>
                    <a class="place"><?php echo $restaurant->place ?> ( </a>
                    <?php echo Asset::img('train.png', array("class" => "list_favicon")); ?>
                    <a class="station"><?php echo $restaurant->station ?></a<a> )</a>
                    </p>
                    <p>
                    <a class="telephone"><?php echo $restaurant->phone ?> ( </a>
                    <a href="<?php echo $restaurant->link ?>" class="url"><?php echo $restaurant->link ?></a> )
                    </p>
                    <div class=overflow_hidden>
                    <p><a class="consideration">備考 : <?php echo $restaurant->other ?></a>
                    </p></div>
                    <div class="recommender">
                        <a>投稿者　：　</a>
                        <a><?php echo $restaurant->department ?></a>
                        <a><?php echo $restaurant->recommender ?></a>
                        <?php if ($restaurant->updated_at === null): ?>
                            <a><?php echo date('Y年m月d日', $restaurant->created_at) ?></a>
                        <?php else: ?>
                            <a><?php echo date('Y年m月d日', $restaurant->updated_at) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <?php if (Auth::check()): ?>
                    <a class="button-delete delete-confirmation" href="/restaurant/delete/<?php echo $result->id ?>" onclick="return confirm('削除してよろしいですか？');">削除</a>
                    <a class="partition">  |  </a>
                <?php endif; ?>
                <a class="button-edit" href="/restaurant/edit/<?php echo $restaurant->id ?>">編集</a>
                <a class="partition">  |  </a>
                <a class="button-detail" href="/restaurant/detail/<?php echo $restaurant->id ?>">コメント( <?php echo count($restaurant->comments)?>件 )</a>
            </div>
        </div>
    </div>

</div>

<!-- コメントを表示 -->
<?php foreach($comments as $comment): ?>
<div class="panel panel-default" style="margin: 20px 10px">
    <div class="pannel-comments panel-body panel-headding-color">
        <?php echo $comment->body ?>
        <div class="signature">
            <?php echo $comment->department ?>
            <?php echo $comment->name ?>
        </div>
    </div>    
    <div class="panel-footer">
    <?php if (Auth::check()): ?>
        <a class="button-delete delete-confirmation" href="/restaurant/delete_comment/<?php echo $restaurant->id.'/'.$comment->id ?>" onclick="return confirm('削除してよろしいですか？');"><small>削除</small></a>
    <?php endif; ?>
    <a class="button-edit" href="/restaurant/edit_comment/<?php echo $restaurant->id.'/'.$comment->id ?>"><small>編集</small></a>
    </div>
</div>
<?php endforeach; ?>
<!-- フォームを表示 -->
<div class="comment">
    <?php echo $fieldset;?>
</div>
