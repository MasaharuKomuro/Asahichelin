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
            <div id="registered_info">
                以下の内容で登録しました。<br>
                <?php
                if ($_POST == 'true') {
                    $private_room = "あり";
                }
                else {
                    $private_room = "なし";
                }
                print "
                <table>
                    <tr><td>場所</td><td>{$_POST['place']}</td></tr>
                    <tr><td>最寄り駅</td><td>{$_POST['station']}</td></tr>
                    <tr><td>店名</td><td>{$_POST['restaurant_name']}</td></tr>
                    <tr><td>業態</td><td>{$_POST['kind']}</td></tr>
                    <tr><td>個室</td><td>{$private_room}</td></tr>
                    <tr><td>連絡先</td><td>{$_POST['phone']}</td></tr>
                    <tr><td>一人あたり予算</td><td>{$_POST['cost']}</td></tr>
                    <tr><td>部門</td><td>{$_POST['department']}</td></tr>
                    <tr><td>推薦者</td><td>{$_POST['recommender']}</td></tr>
                    <tr><td>店舗情報URL</td><td>{$_POST['link']}</td></tr>
                    <tr><td>備考</td><td>{$_POST['other']}</td></tr>
                </table>
                ";
                ?>
                <input type="button" onclick="location.href='/'" value="トップへ">
            </div>
        </div>
        <div id="footer">
            Ueki All rights reserved.
        </div>
    </div>
</body>
</html>
