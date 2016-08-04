
$(function(){

/*
    *************************  for 全ページ  *************************
    */
	//画面サイズ
	var $sm = 768;


/*
    *************************  for TOPページ  *************************
*/
	$(document).ready(function(){
		var $window_size = $(window).width();
  		if($window_size < $sm){
    		//スマホ
    		$(".padding-none").css("padding", "0");
    		$("#index_button_box").css("top", "0px");
    		$("#index_button_box div").css({"backgroundColor": "DarkRed"});
    		$(".paper").css({"box-shadow": "0 0 0 Maroon", "border": "1px solid Maroon"});
            $("#front_image").css("border-radius", "0px");
    	}else{
    		$(".padding-none").css("padding", "0 15px"); 
            $("#front_image").css("border-radius", "10px");
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
            $("#front_image").css("border-radius", "0px");
    	}else{
    		//PC
    		$(".padding-none").css("padding", "0 15px");
    		$("#index_button_box").css("top", "-150px");
			$("#index_button_box div").css({"backgroundColor": "transparent"});
    		$(".paper").css({"box-shadow": "0 0 7px IndianRed", "border": "0px solid IndianRed"});
            $("#front_image").css("border-radius", "10px");
    	}
	});

	
    $('#admin-logo').mouseenter(function(){
    	$('.logo').effect('bounce','',1000 );
    });
    $('#logo').mouseenter(function(){
    	$('.logo').effect('bounce','',1000 );
    });
    $('.register').mouseenter(function(){
    	$('#register_button').effect('bounce','',1000 );
    });
    $('.list').mouseenter(function(){
    	$('#list_button').effect('bounce','',1000 );
    });
    $('.search').mouseenter(function(){
    	$('#search_button').effect('bounce','',1000 );
    });
    $('#logout').mouseenter(function(){
    	$('.logout').effect('bounce','',1000 );
    });
    
    /*
    *************************  for 登録ページ  *************************
    */
    $(document).ready(function(){
        $("#form_submit").addClass("btn paper paper-curl-right");
        $("#form_submit_sm").addClass("btn paper paper-curl-right");
    	var $window_size = $(window).width();
  		if($window_size < $sm){
            $("#form_submit").hide();
            $("#form_submit_sm").show();
            $("[id^=form_]").css("width", "90%");
            $("[id^=form_]").css("padding-left", "0");
            $("#form_cost").css("width", "70%");
            $(".form_padding").css("display", "none");
            $("#form_submit").parent().parent().children().css("padding", "0px");
  		}else{
            $("#form_submit").show();
            $("#form_submit_sm").hide();
            $("[id^=form_]").css("width", "60%");
            $("[id^=form_]").css("padding-left", "10%");
            $(".form_padding").css("display", "inline");
            $("#form_submit").parent().parent().children().css("padding", "8px");
  		}
        $("#form_submit_sm").css("border", "2px solid Maroon");
        $("#form_submit_sm").css("width", "100%");
        $("#form_submit_sm").css("margin", "0");
    });
    
    $(window).on('resize', function(){
    	var $window_size = $(window).width();
  		if($window_size < $sm){
            $("[id^=form_]").css("width", "90%");
            $("[id^=form_]").css("padding-left", "0");
            $("#form_cost").css("width", "70%");
            $(".form_padding").css("display", "none");
    		$("#form_submit").hide();
            $("#form_submit_sm").show();
            $("#form_submit").parent().parent().children().css("padding", "0px");
            $("#form_submit_sm").css("border", "2px solid Maroon");
    	}else{
            $("[id^=form_]").css("width", "60%");
            $("[id^=form_]").css("padding-left", "10%");
            $(".form_padding").css("display", "inline");
    		$("#form_submit").show();
            $("#form_submit_sm").hide();
            $("#form_submit").parent().parent().children().css("padding", "8px");
    	}
        $("#form_submit_sm").css("width", "100%");
        $("#form_submit_sm").css("margin", "0");
    });

    /*
    *************************  for 検索ページ  *************************
    */
    $(document).ready(function(){
        var $window_size = $(window).width();
        if($window_size < $sm){
            $(".main_scontents").css("min-height", "350px");
        }else{
            $(".main_contents").css("min-height", "500px");
        }
    });
    $(window).on('resize', function(){
        var $window_size = $(window).width();
        if($window_size < $sm){
            $(".main_contents").css("min-height", "350px");
        }else{
            $(".main_contents").css("min-height", "500px");
        }
    });

	



})
