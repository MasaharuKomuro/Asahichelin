<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "post" ); ?>'><?php echo Html::anchor('index/post','Post');?></li>
	<li class='<?php echo Arr::get($subnav, "list" ); ?>'><?php echo Html::anchor('index/list','List');?></li>
	<li class='<?php echo Arr::get($subnav, "search" ); ?>'><?php echo Html::anchor('index/search','Search');?></li>
	<li class='<?php echo Arr::get($subnav, "detail" ); ?>'><?php echo Html::anchor('index/detail','Detail');?></li>

</ul>
<p>Search</p>