<?php Asset::add_path('assets/favicon/', 'img') ?>
<div class="contents" style="background-color: Wheat">
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
                        <a><?php echo $result->place ?> ( </a>
                        <?php echo Asset::img('train.png', array("class" => "list_favicon")); ?>
                        <?php echo $result->station ?><a> )</a>
                        </p>
                        <p><?php echo Asset::img('tel.png', array("class" => "list_favicon")); ?>
                        <a><?php echo $result->phone ?> ( </a>
                        <a href="<?php echo $result->link ?>" class="url"><?php echo $result->link ?></a> )
                        </p>
                        <p><a class="consideration">備考 : <?php echo $result->other ?></a>
                        </p>
                    
                    
                </div>
            </div>
        </div>
    </div>


<?php endforeach; ?>
</div>

<!--
<?= "<br><br><br><br><br><br><br><br><br>" ?>
    <?php //foreach ($results as $result): ?>
        <th class="place"><?php echo $restaurant_labels['place']?></th>
        <th class="station"><?php echo $restaurant_labels['station']?></th>
        <th class="kind"><?php echo $restaurant_labels['kind']?></th>
        <th class="private_room"><?php echo $restaurant_labels['private_room']?></th>
        <th class="phone"><?php echo $restaurant_labels['phone']?></th>
                                        <th class="cost"><?php echo $restaurant_labels['cost']?></th>
                                        <th class="link"><?php echo $restaurant_labels['link']?></th>
                                        <th class="other"><?php echo $restaurant_labels['other']?></th>
                                    </tr>
                                    <tr>

                                        <?php if ($result->private_room): ?>
                                            <td class="private_room">あり</td>
                                        <?php else: ?>
                                            <td class="private_room">なし</td>
                                        <?php endif; ?>
                                        <td class="phone"><?php echo $result->phone ?></td>
                                        <td class="cost"><?php echo $result->cost ?>円</td>
                                        <td class="link"><a href="<?php echo $result->link ?>" target="_blank"><?php echo $result->link ?></a></td>
                                        <td class="other"><?php echo $result->other ?></td>
                                    </tr>
                                </div>
                            </div>
                        </table>
                    </div>
            <div class="user-info-container">
                <table class="user-info">
                    <tr>
                        <td class="department user-info"><small><?php echo $result->department ?></small></td>
                        <td class="recommender user-info"><small><?php echo $result->recommender ?></small></td>
                        <?php if ($result->updated_at === null): ?>
                            <td class="user-info"><small><?php echo date('Y年m月d日', $result->created_at) ?></small></td>
                        <?php else: ?>
                            <td class="user-info"><small><?php echo date('Y年m月d日', $result->updated_at) ?></small></td>
                        <?php endif; ?>
                    </tr>
                    </div>
                    </div>
                </table>
            </div>
            </div>
        </div>
        <div class="restaurant-buttons">
            <span style="color: #999999">コメント <?php echo count($result->comments)?>件&nbsp;&nbsp;&nbsp;</span>
            <?php if (Auth::check()): ?>
                <a class="button-delete delete-confirmation" href="/restaurant/delete/<?php echo $result->id ?>" onclick="return confirm('削除してよろしいですか？');">削除</a>
            <?php endif; ?>
            <a class="button-edit" href="/restaurant/edit/<?php echo $result->id ?>">編集</a>
            <a class="button-detail" href="/restaurant/detail/<?php echo $result->id ?>">コメント</a>
        </div>
        <hr>
    <?php //endforeach; ?>
    <?php echo $pagenation?>
-->
<input type="button" onclick="location.href='/restaurant/search'" value="検索画面へ">
