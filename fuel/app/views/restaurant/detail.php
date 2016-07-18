<div class="restaurant-name"><?php echo $restaurant->name ?></div>
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
                <td class="place"><?php echo $restaurant->place ?></td>
                <td class="station"><?php echo $restaurant->station ?></td>
                <td class="kind"><?php echo $restaurant->kind ?></td>
                <?php if ($restaurant->private_room): ?>
                    <td class="private_room">あり</td>
                <?php else: ?>
                    <td class="private_room">なし</td>
                <?php endif; ?>
                <td class="phone"><?php echo $restaurant->phone ?></td>
                <td class="cost"><?php echo $restaurant->cost ?>円</td>
                <td class="link"><a href="<?php echo $restaurant->link ?>"><?php echo $restaurant->link ?></a></td>
                <td class="other"><?php echo $restaurant->other ?></td>
            </tr>
        </table>
    </div>
    <div class="user-info-container">
        <table class="user-info">
            <tr>
                <td class="department user-info"><small><?php echo $restaurant->department ?></small></td>
                <td class="recommender user-info"><small><?php echo $restaurant->recommender ?></small></td>
                <?php if ($restaurant->updated_at === null): ?>
                    <td class="user-info"><small>更新日時: <?php echo date('Y-m-d H:i:s', $restaurant->created_at) ?></small></td>
                <?php else: ?>
                    <td class="user-info"><small>更新日時: <?php echo date('Y-m-d H:i:s', $restaurant->updated_at) ?></small></td>
                <?php endif; ?>
            </tr>
        </table>
    </div>
<hr>
<?php foreach($comments as $comment): ?>
    <?php echo $comment->body ?><br><br>
    <?php echo $comment->department ?>
    <?php echo $comment->name ?>
    <hr>
<?php endforeach; ?>
<div class="comment">
    <?php echo $fieldset;?>
</div>
