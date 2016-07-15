<div id="restaurant_list">
    <table>
    <?php
    print "<tr>
             <th>場所</th>
             <th>最寄り駅</th>
             <th>店名</th>
             <th>業態</th>
             <th>個室あり</th>
             <th>連絡先</th>
             <th>一人あたり予算</th>
             <th>部門</th>
             <th>推薦者</th>
             <th>店舗情報URL</th>
             <th>備考</th>
           </tr>
           ";
    foreach ($results as $result) {
        print "<tr>";
        foreach ($result as $ele) {
            if ($ele === 'true') {
                print "<td>あり</td>";
            }
            elseif ($ele === 'false') {
                print "<td>なし</td>";
            }
            else {
                print "<td>$ele</td>";
            }
        }
        print "</tr>";
    }
        
    ?>
    </table>
</div>
<input type="button" onclick="location.href='/'" value="トップへ">
