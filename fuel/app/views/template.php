<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <?php echo Asset::css('reset.css')?>
    <?php echo Asset::css('style.css')?>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="container">
        <div id="header">
            <div id="nav">
                <?php if ($is_admin): ?>
                    <div id="admin-logo"><a class="admin_logo" href="/restaurant">ASAHICHELIN 管理者画面</a></div>
                    <div id="admin-logo"><a class="admin_logo" href="/restaurant/logout">Logout</a></div>
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
