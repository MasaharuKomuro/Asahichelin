<?php echo Asset::css('paper_texture.css')?>
<div class="container">
	<div class="row">
    	<div id="top_pad" class="col-md-12 visible-md visible-lg"></div>
    </div>
    <div class="row">
    	<div class="col-md-1 visible-md visible-lg"></div>
    	<div id="front_image_box" class="col-md-10 col-sm-12 col-xs-12">
    		<?php echo Asset::img('all.jpg', array('id'=>'front_image'))?>
    	</div>
    	<div class="col-md-1 visible-md visible-lg"></div>
    </div>
    <div class="row" id="index_button_box">
    	<div class="col-md-3 col-sm-2 visible-sm visible-md visible-lg"></div>
    	<div class="padding-none col-md-3 col-sm-4 col-xs-6">
    		<a id="register_index" href="/restaurant/form" class="index_button btn paper paper-curl-right">登録</a>
    	</div>
    	<div class="padding-none col-md-3 col-sm-4 col-xs-6">
    		<a id="list_index" href="/restaurant/search" class="index_button btn paper paper-curl-right">検索</a>
    	</div>
    	<div class="col-md-3 col-sm-2 visible-sm visible-md visible-lg"></div>
    </div>
    
<!--
    <p id="p1"></p>
    <p id="p2"></p>      
-->
</div>
 
