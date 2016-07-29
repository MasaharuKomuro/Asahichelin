<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <?php echo Asset::css('reset.css')?>
    <?php echo Asset::css('style.css')?>
    <?php echo Asset::js('jquery-3.1.0.min.js')?>
    <?php echo Asset::js('script.js')?>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="nav">
                <?php if (Auth::check()): ?>
                    <div id="admin-logo"><a class="admin_logo" href="/restaurant">ASAHICHELIN 管理者画面</a></div>
                <?php else: ?>
                    <div id="logo"><a class="logo" href="/restaurant">ASAHICHELIN</a></div>
                <?php endif; ?>
                <div id="nav-menu">
                    <ul>
                        <li><a id="register" href="/restaurant/form">登録</a></li>
                        <li><a id="list" href="/restaurant/list">一覧</a></li>
                        <li><a id="search" href="/restaurant/search">検索</a></li>
                    </ul>
                </div>
                <?php if (Auth::check()): ?>
                    <div id="logout"><a class="logout logout-confirmation" href="/restaurant/logout"  onclick="return confirm('ログアウトしてよろしいですか？');">Logout</a></div>
                <?php endif; ?>
                <div id="contact"><a class="contact" href="/restaurant/contact">お問い合わせ</a></div>
            </div>
        </div>
        <div id="contents">
            <?php echo $content; ?>
        </div>
        <div id="footer">
            Ueki All rights reserved.
        </div>
</body>
</html>
