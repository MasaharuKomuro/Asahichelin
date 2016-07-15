<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <?php echo Asset::css('reset.css')?>
    <?php echo Asset::css('style.css')?>
    <title>ASAHICHELIN</title>
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
            <div id="top-image">
                <div class="buttons">
                    <a id="button-register" href="welcome/register_form">登録</a>
                    <a id="button-search" href="welcome/search">一覧</a>
                </div>
            </div>
        </div>
        <div id="footer">
            Ueki All rights reserved.
        </div>
    </div>
</body>
</html>

