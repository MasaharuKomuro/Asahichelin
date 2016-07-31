
$(function(){
	//画面サイズ
	var $sm = 768;


	/*
	* Topページ用のスクリプト
	*/
	$(document).ready(function(){
		var $window_size = $(window).width();
  		if($window_size < $sm){
    		//スマホ
    		$(".padding-none").css("padding", "0");
    		$("#index_button_box").css("top", "0px");
    		$("#index_button_box div").css({"backgroundColor": "DarkRed"});
    		$(".paper").css({"box-shadow": "0 0 0 Maroon", "border": "1px solid Maroon"});
    	}else{
    		$(".padding-none").css("padding", "0 15px"); 
    	}
	});

	//ウィンドウが読み込まれた時　と　リサイズされた時
    $(window).on('resize', function(){
		var $window_size = $(window).width();

    	$("#p1").html($window_size);

    	if($window_size < $sm){
    		//スマホ
    		$(".padding-none").css("padding", "0");
    		$("#index_button_box").css("top", "0");
    		$("#index_button_box div").css({"backgroundColor": "DarkRed"});
    		$(".paper").css({"box-shadow": "0 0 0 Maroon", "border": "1px solid Maroon"});
    	}else{
    		//PC
    		$(".padding-none").css("padding", "0 15px");
    		$("#index_button_box").css("top", "-150px");
			$("#index_button_box div").css({"backgroundColor": "transparent"});
    		$(".paper").css({"box-shadow": "0 0 7px IndianRed", "border": "0px solid IndianRed"});
    	}
	});

	
    $('#admin-logo').mouseenter(function(){
    	$('.logo').effect('bounce','',1000 );
    });
    $('#logo').mouseenter(function(){
    	$('.logo').effect('bounce','',1000 );
    });
    $('.register').mouseenter(function(){
    	$('#register').effect('bounce','',1000 );
    });
    $('.list').mouseenter(function(){
    	$('#list').effect('bounce','',1000 );
    });
    $('.search').mouseenter(function(){
    	$('#search').effect('bounce','',1000 );
    });
    $('#logout').mouseenter(function(){
    	$('.logout').effect('bounce','',1000 );
    });
    
    /*
    *登録ページ用
    */
    $(document).ready(function(){
    	//$("#form_place").css({"backgroundColor": "red"});
    	
    });
    

	



})
