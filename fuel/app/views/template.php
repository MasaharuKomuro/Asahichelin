<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php Asset::add_path('assets/jQueryUI/', 'js') ?>
    <?php Asset::add_path('assets/jQueryUI/', 'css') ?>
    <?php echo Asset::css('reset.css')?>
    <?php echo Asset::css(array('jquery-ui.css', 'jquery-ui.min.css', 'jquery-ui.structure.css', 'jquery-ui.structure.min.css'))?>
    <?php //echo Asset::css('style.css')?>
    <?php echo Asset::css('bootstrap.min.css')?>
    <?php echo Asset::css('styleK.css')?>
    <?php echo Asset::js('jquery-3.1.0.min.js')?>
    <?php echo Asset::js(array('jquery-ui.js', 'jquery-ui.min.js'))?>
    <?php echo Asset::js('raindrops.js')?>
    <?php echo Asset::js('script.js')?>
    <?php echo Asset::js('bootstrap.min.js')?>
    <?php echo Asset::js('scriptK.js')?>
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="header" class="overflow-fix">
        <div class="container">
            <div class="row design">
                <div class="top_menu_back col-md-1 col-lg-1 visible-md visible-lg"></div>
            <?php if (Auth::check()): ?>
                <div id="admin-logo" class="col-md-2 col-lg-2 col-xs-12">
                    <a class="admin_logo logo bounce" href="/restaurant">ASAHICHELIN</a><br>
                    <a class="admin_logo logo bounce">管理者画面</a>
                </div>
            <?php else: ?>
                <div id="logo" class="col-md-2 col-lg-2 col-xs-12">
                    <a class="logo bounce" href="/restaurant">ASAHICHELIN</a>
                </div>
            <?php endif; ?>
                <div class="top_menu top_menu_button register col-md-2 col-lg-2 col-sm-4 col-xs-4"><a id="register" href="/restaurant/form">登録</a></div>
                <div class="top_menu top_menu_button list col-lg-2 col-md-2 col-sm-4 col-xs-4"><a id="list" href="/restaurant/list">一覧</a></div>
                <div class="top_menu top_menu_button search col-lg-2 col-md-2 col-sm-4 col-xs-4"><a id="search" href="/restaurant/search">検索</a></div>
            <?php if (Auth::check()): ?>
                <div class="top_menu_back col-lg-1 col-md-1 visible-md visible-lg"></div>
                <div id="logout" class="col-md-2  visible-md visible-lg">
                    <a class="logout logout-confirmation" href="/restaurant/logout" onclick="return confirm('ログアウトしてよろしいですか？');">Logout</a>
                </div>
            <?php else: ?>    
                <div class="top_menu_back col-lg-3 col-md-3 visible-md visible-lg"></div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div id="contents" class="overflow-fix">
        <div class="container">
            <div class="row main_contents">
                <div class="col-md-1 col-lg-1 side_back visible-md visible-lg"><a></a></div>
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <?php echo $content; ?>
                </div>
                <div class="col-md-1 col-lg-1 side_back visible-md visible-lg"><a></a></div>
            </div>
        </div>
    </div>

    <div id="footer" class="design">
        <div class="container">
            <div class="row">
                <!--
                <hr class="foot_pertision">
                -->
                <div class="col-lg-12 col-md-12">
                    <a>Ueki All rights reserved &amp; Designed by Komuro</a><br>
                    <br>
                    <div>
                        <a id="about_us" href="/restaurant/about">ASAHICHELINとは？</a>
                        <a id="search" href="/restaurant/contact">お問い合わせ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
