<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <?php echo Asset::css('reset.css')?>
    <?php echo Asset::css("style.css")?>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="nav">
                <div id="logo"><a class="logo" href="/">ASAHICHELIN</a></div>
                <div id="nav-menu">
                    <ul>
                        <li><a id="register" href="/welcome/register_form">登録</a></li>
                        <li><a id="list" href="/welcome/search">一覧</a></li>
                        <li><a id="search" href="/welcome/search">検索</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="contents">
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
        </div>
        <div id="footer">
            Ueki All rights reserved.
        </div>
    </div>
</body>
</html>

