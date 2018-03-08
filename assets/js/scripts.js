(function($){

	"use strict";
	
	var rtime = new Date('1', '1', '2000', '12', '0', '0');
	var timeout = false;
	var delta = 200;
	$(window).resize(function () {
		rtime = new Date();
		if (timeout === false) {
			timeout = true;
			setTimeout(resizeEnd, delta);
		}
	});	
		
	function resizeEnd() {
		if (new Date() - rtime < delta) {
			setTimeout(resizeEnd, delta);
		} else {
			timeout = false;
			sailor.rebind_menu_events();
		}               
	}
	
	function trigger_click(){
		
	};
	
	var sailor = {
	
		rebind_menu_events: function() {
			$('.advanced-search').hide();
			$('.search-trigger').off('click');
			$('.search-trigger').on('click', function () {
			   $('.advanced-search').slideToggle(500);
			});
		},	
		init: function () {
			
			//SEARCH FILTER
			$('.filter-show').hide(500);
			
			$('.filter-hide').on('click', function () {
			   $('aside.fixed').slideUp(500);
			   $('.filter-show').show(500);
			   $('.offset').css('margin-top','0');
			});
			
			$('.filter-show').on('click', function () {
			   $('aside.fixed').slideDown(500);
			   $('.filter-show').hide(500);
			   $('.offset').css('margin-top','197px');
			});
			
			
			//ADVANCED SEARCH
			$('.advanced-search').hide();
			$('.search-trigger').off('click');
			$('.search-trigger').on('click', function () {
			   $('.advanced-search').slideToggle(500);
			});
			
			$('.search-hide').on('click', function () {
			  $('.advanced-search').hide(500);
			});
			
			$('#startDate').datepicker();
			
			$('#birthDate').datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '1920:2000',
				minDate: new Date(1920, 1 - 1, 25),
				maxDate: '+80Y'
			});		
			
			// CUSTOM FORM ELEMENTS
			$('input[type=radio], input[type=checkbox],input[type=number],select').uniform();			
			
			// ACCORDION
			$('.accordion dd').hide();
			$('.accordion dt').on('click', function () {
				$(this).next('.accordion dd').slideToggle(500);
				$(this).toggleClass('expanded');
			});
			
			$('.accordion .next-step').on('click', function (e) {
				$(this).closest('.accordion dd').next('.accordion dt').next('.accordion dd').slideToggle(500);
				$(this).closest('.accordion dd').next('.accordion dt').toggleClass('expanded');
				e.preventDefault();
			});
			
			$('.bookingSteps .thank-you-note').hide();
			$('.accordion .submit-step').on('click', function (e) {
				$(this).closest('.accordion').slideToggle(500);
				$('.bookingSteps .thank-you-note').slideToggle(500);

				$('html, body').animate({
					scrollTop: parseInt($("#tab-navigation").position().top, 10)
				}, 1000);

				e.preventDefault();
			});			
			
			// BOOKING STEPS
			$('.booking').hide();
			$('.availability .button').on('click', function () {
				$('.availability').hide();
				$('.selectDates').show(500);
			});
			
			$('.selectDates .button').on('click', function () {
				$('.selectDates').hide();
				$('.bookingSteps').show(500);
			});
			
			
			// CONTACT FORM
			$('.contactform').submit(function(){
				var action = $(this).attr('action');
                                // create the success url based on the actual url
                                var successUrl = 'success-' + document.location.pathname.split('/').pop()

				$("#message_result").show(500,function() {
				$('#message_result').hide();
				$('#submit')
                                        .after('<img src="assets/images/contact-ajax-loader.gif" class="loader" />')
					.attr('disabled','disabled');
				
				$.post(action, { 
					name: $('#name').val(),
					surname: $('#surname').val(),
					embarcacao: $('#embarcacao').val(),
					email: $('#email').val(),
					phone: $('#phone').val(),
					message: $('#message').val(),
					opt_in: $('#opt_in').val()
				},
				function(data){
					var returned = JSON && JSON.parse(data) || $.parseJSON(data);
					document.getElementById('message_result').innerHTML = returned.message;
					document.getElementById('message_result').style.display = "block";
                                        if (returned.status) {
                                            gtag('config', 'UA-115391906-1', {'page_path': successUrl});
                                        }
					$('#message_result').slideDown('slow');
					$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
					$('#submit').removeAttr('disabled'); 
				});
				
				});
				return false; 
			});

			// WORK HERE FORM
			$('.workhere').submit(function(){
				var action = $(this).attr('action');
				$("#message_result").show(500,function() {
                                    $('#message_result').hide();
                                    $('#submit')
                                        .after('<img src="assets/images/contact-ajax-loader.gif" class="loader" />')
                                        .attr('disabled','disabled');

                                    var form = $('.workhere').get(0);
					
				    $.ajax({
				        url: window.location.pathname + '/send',
				        type: 'POST',
				        data: new FormData(form),
				        async: false,
				        success: function (response) {
                                            var returned = JSON && JSON.parse(response) || $.parseJSON(response);
                                            document.getElementById('message_result').innerHTML = returned.message;
                                            document.getElementById('message_result').style.display = "block";
                                            if (returned.status) {
                                                gtag('config', 'UA-115391906-1', {'page_path': 'success-work-with-us'});
                                            }
                                            $('#message_result').slideDown('slow');
                                            $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                                            $('#submit').removeAttr('disabled'); 
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });
				});
				return false; 
			});
			
			// TABS
			$('.content .tab-content').hide().first().show();
			$('.content .tabs li:first').addClass('current');

			$('.content .tabs a').on('click', function (e) {
				e.preventDefault();
				$(this).closest('li').addClass('current').siblings().removeClass('current');
				$($(this).attr('href')).show().siblings('.tab-content').hide();
			});

			var hash = $.trim( window.location.hash );
			if (hash) $('.content .tabs a[href$="'+hash+'"]').trigger('click');
			
			
			// SMOOTH ANCHOR SCROLLING
			var $root = $('html, body');
			$('.mini-nav a').on('click', function(e) {
				var href = $.attr(this, 'href');
				if (typeof ($(href)) != 'undefined' && $(href).length > 0) {
					var anchor = '';
					
					if(href.indexOf("#") != -1) {
						anchor = href.substring(href.lastIndexOf("#"));
					}
					
					var scrollToPosition = $(anchor).offset().top - 132;
						
					if (anchor.length > 0) {
						$root.animate({
							scrollTop: scrollToPosition
						}, 500, function () {
							window.location.hash = anchor;
							// This hash change will jump the page to the top of the div with the same id
							// so we need to force the page to back to the end of the animation
							$('html').animate({ 'scrollTop': scrollToPosition }, 0);
						});
						e.preventDefault();
					}
				}
			});

			//MAIN MENU 
			$().jetmenu();		
		
		},
		load: function () {
			// UNIFY HEIGHT
			var maxHeight = 0;
				
			$('.heightfix').each(function(){
				if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
			});
			$('.heightfix').height(maxHeight);	

			// PRELOADER
			$('.preloader').fadeOut();
		}
	}
	
	$(document).ready(function () {
	
		sailor.init();
		
		var $root = $('html, body');
		if (window.location.hash && window.location.hash == '#tab-navigation') {
			var scrollToPosition = $('#tab-navigation').offset().top - 80;

			$root.animate({
				scrollTop: scrollToPosition
			}, 500, function () {
				window.location.hash = 'tab-navigation';
				// This hash change will jump the page to the top of the div with the same id
				// so we need to force the page to back to the end of the animation
				$('html').animate({ 'scrollTop': scrollToPosition }, 0);
			});
		}
	});
	
	$(window).on('load', function() {
		sailor.load();
	});	

})(jQuery);
