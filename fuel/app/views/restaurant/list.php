<div id="restaurant_list">
    <h1 style="font-size: 1.2rem;margin: 20px; text-align: left"><?=$countLabel?> <?=$count?>件</h1>
    <hr>
    <?php foreach ($results as $result): ?>
        <div class="restaurant-container">
        <div class="restaurant-name"><?php echo $result->name ?></div>
            <div class="restaurant-info">
                <table>
                    <tr>
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
                        <td class="place"><?php echo $result->place ?></td>
                        <td class="station"><?php echo $result->station ?></td>
                        <td class="kind"><?php echo $result->kind ?></td>
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
                </table>
            </div>
        </div>
        <div class="restaurant-buttons">
            <?php if (Auth::check()): ?>
                <a class="button-delete delete-confirmation" href="/restaurant/delete/<?php echo $result->id ?>" onclick="return confirm('削除してよろしいですか？');">削除</a>
            <?php endif; ?>
            <a class="button-edit" href="/restaurant/edit/<?php echo $result->id ?>">編集</a>
            <a class="button-detail" href="/restaurant/detail/<?php echo $result->id ?>">コメント</a>
        </div>
        <hr>
    <?php endforeach; ?>
    <?php echo $pagenation?>
</div>
<input type="button" onclick="location.href='/restaurant/search'" value="検索画面へ">
