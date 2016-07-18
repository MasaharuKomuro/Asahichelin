<div id="restaurant_list">
    <?php foreach ($results as $result): ?>
        <div class="restaurant-container">
        <div class="restaurant-name"><?php echo $result->name ?></div>
            <div class="restaurant-info">
                <table>
                    <tr>
                        <th class="place">場所</th>
                        <th class="station">最寄り駅</th>
                        <th class="kind">業態</th>
                        <th class="private_room">個室</th>
                        <th class="phone">連絡先</th>
                        <th class="cost">一人あたり予算</th>
                        <th class="link">店舗情報URL</th>
                        <th class="other">備考</th>
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
                        <td class="link"><a href="<?php echo $result->link ?>"><?php echo $result->link ?></a></td>
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
                            <td class="user-info"><small>更新日時: <?php echo date('Y-m-d H:i:s', $result->created_at) ?></small></td>
                        <?php else: ?>
                            <td class="user-info"><small>更新日時: <?php echo date('Y-m-d H:i:s', $result->updated_at) ?></small></td>
                        <?php endif; ?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="restaurant-buttons">
        <a class="button-edit" href="/restaurant/edit/<?php echo $result->id ?>">編集</a>
            <a class="button-detail" href="/restaurant/detail/<?php echo $result->id ?>">コメント</a>
        </div>
        <hr>
    <?php endforeach; ?>
</div>
<input type="button" onclick="location.href='/'" value="トップへ">
