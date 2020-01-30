(function($) {
	"use strict";
	//login full height
	var wind_h = $(window).outerHeight();
	var foot_h = $(".footer_section").outerHeight();
	if ($(window).width () > 991){
		$(".login_form_wrap").css('height',wind_h);
	}
	//tabs Menu
	$('.tab_menu .tab_link').on('click', function(){
		$(".tab_content").removeClass("active");
		var tab_data = $(this).attr("data-tab");
		$('.tab_menu .tab_link').removeClass("active");
		$(this).addClass("active");
		$("#"+tab_data).addClass("active");
	});
	//dropdown menu js
	$('.menu_toggle').on('click', function(e){
		$(".dropdown_navs").toggleClass("menu_open");
		$(".dropdown_navs").slideToggle(300);
		e.stopPropogation();
	});
	//offset menu
	$('.menu_toggle').on('click', function(){
	    var menu = $(this).next(".dropdown_navs");
	    var menupos = $(menu).offset();
	    if (menupos.left + menu.width() > $(window).width()) {
	        $(".dropdown_navs").css({'left':'auto', 'right':'0'});
	    }
	    else{
	    	$(".dropdown_navs").css({'left':'0', 'right':'auto'});
	    }
	});
	//Responsive Mobile Menu
	if ($(window).width () < 991){
		$(".navigation > ul > li> ul").parents("li").addClass("dropdown_toggle");
		$(".navigation > ul > li> ul > li > ul").parents("li").addClass("dropdown_toggle");
		$(".dropdown_toggle").append("<span class='caret_down'><i class='fas fa-chevron-down'></i></span>");
		$(".navigation ul li").children(".caret_down").on("click",function(){
			$(this).toggleClass("caret_up");
			$(this).prev("ul").slideToggle();
		});
	}
	else {
		
	}
	//age Datepicker
	if($(".age_calendar").length > 0){
		$( ".age_calendar" ).datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			yearRange: "-80:-18",
		});
	}
	//Datepicker
	if($(".datepicker").length > 0){
		$( ".datepicker" ).datepicker({
		  dateFormat: "dd-mm-yy"
		});
	}
	//bootsrape selectpicker
    if ($(".selectpicker").length > 0) {
      $('.selectpicker').selectpicker();
    }
    //dropdown menu
	$(".dropdown_btn").on('click',function(){
		$(this).next(".dropdown_menu").slideToggle(300);
		$(".dropdown_btn").not(this).next().slideUp("slow");
	});
	//profile syncronize slider
	//home slider
	if ($(".gallery_slider").length > 0) {
		$(".gallery_slider").owlCarousel({
			mode:"fade",
			items:1,
			loop:true,
			margin:10,
			autoplay:false,
			autoplayTimeout:3000,
			autoplaySpeed:1500,
			smartSpeed:1000,
			dots:false,
			nav:true,
		});
	}
	//image upload function
	$('.img_upload_btn').change(function() {
	  //var i = $(this).clone();
	  var file_path = $(this).children('.upload_file')[0].files[0].name;
	  $(this).next(".upload_file_path").html('<span>'+file_path+'</span>');
	});
	
	//sidebar open
	if ($(window).width () <= 991){
		$(".filter_toggle.filter_m").on('click',function(){
			$(".filter_forms").slideToggle(300);
		});
	}
	
})(jQuery);
//copy to clip board on click
function copybutton() {
  /* Get the text field */
  var copyText = document.getElementById("ref_code");
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  /* Copy the text inside the text field */
  document.execCommand("copy");
}
//profile image change
function profilechange() {
 document.getElementById('profile_img').src = window.URL.createObjectURL(this.files[0])
}