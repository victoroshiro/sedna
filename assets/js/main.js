$(document).ready(function(){

    //Contato
    $('#form-contato-submit').click(function(event){
        event.preventDefault();

        var button = $(this);

        $.ajax({
            url: button.closest('form').attr('action'),
            type: 'POST',
            data: button.closest('form').serialize(),
            dataType: 'JSON',
            beforeSend: function(){
                button.val('Enviando...');
            },
            success: function(response){
                // button.text(response.message).css({"display":"block"});
                if(response.status){
                    $('input, textarea').val('');
                    button.val(response.message).attr('disabled', 'disabled');
                }else{
                    button.val(response.message).attr('disabled', 'disabled');
                    setTimeout(function(){
                        button.val('Enviar').removeAttr('disabled');
                    }, 3000);
                }
            },
            error: function(response){
                button.val('Ocorreu um erro no envio. Tente novamente mais tarde.').attr('disabled', 'disabled');
                setTimeout(function(){
                    button.val('Enviar').removeAttr('disabled');
                }, 3000);
            }
        });
    });

    //Newsletter
    $('#form-contato-newsletter').click(function(event){
        event.preventDefault();

        var button = $(this);


        $.ajax({
            url: button.closest('form').attr('action'),
            type: 'POST',
            data: button.closest('form').serialize(),
            dataType: 'JSON',
            beforeSend: function(){
                button.val('Enviando...');
            },
            success: function(response){
                $('#form-contato-newsletter input, textarea').val('');
                button.val('Enviar').removeClass('loading-newsletter');
                $('.msg').text(response.message).css({"display" : "block"});
            },
            error: function(response){
                $('.msg').text('Ocorreu um erro no envio. Tente novamente mais tarde.').css({"display" : "block"});
                button.val('Enviar').removeAttr('disabled').removeClass('loading-newsletter');
            }
        });
    });

    //Noticias
    $('.noticias .item-noticia .resumo').each(function(){
        $(this).dotdotdot({
            ellipsis    : '... ',
            wrap        : 'word',
            height      : 60,
        });
    });

    $('.noticias.detalhe .outras-noticias .item-noticia p').each(function(){
        $(this).dotdotdot({
            ellipsis    : '... ',
            wrap        : 'word',
            height      : 40,
        });
    });

    $('#noticias .noticia h4').each(function(){
        $(this).dotdotdot({
            ellipsis    : '... ',
            wrap        : 'word',
            height      : 60,
        });
    });

    $('#noticias .noticia p').each(function(){
        $(this).dotdotdot({
            ellipsis    : '... ',
            wrap        : 'word',
            height      : 40,
        });
    });

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        
        $("video").attr("preload","none");
        $(".detailed-services dt.opened").next().slideToggle('fast');
        $(".widget-contacts dt.opened").next().slideToggle('fast');
    /*      $("#slider .ls-slide").attr('data-ls','transition2d:5;slidedelay:5000;');   
        $("#slider .ls-l").attr('data-ls','offsetyin:top;delayin:0;durationin:1000;');*/
        $(".widget-departments dt.opened").next().slideToggle('fast');
        composer_include();
        milestone_counter();
        progress_bar_loader ();
        //contact_form_init();
        chart_circle_init();
        $(document).scroll(milestone_counter);
        $(document).scroll(progress_bar_loader);
        $(document).scroll(chart_circle_init);
        /* retina-animating-blocks */
        if (!is_mobile())
        {
            window.scrollTo(0,1);
            var control = $.superscrollorama({
                triggerAtCenter:true,
                playoutAnimations:true,
                reverse:false
            });
            var ofs = $(window).height()/2;

            /* 1st animating block */
            control.addTween(target='#animating-block-1', 
                    TweenMax.from($('#animating-block-1 img[src*="iphone"]'), 0.5 , {css:{left:'0',opacity:'0'}}),duration=0,offset=-ofs);
            control.addTween(target='#animating-block-1', 
                    TweenMax.from($('#animating-block-1 img[src*="ipad"]'), 0.5 , {css:{right:'0',opacity:'0'}}),duration=0,offset=-ofs);
            control.addTween(target='#animating-block-1', 
                    TweenMax.from($('#animating-block-1 img[src*="monitor"]'), 0.5 , {css:{opacity:'0'}}),duration=0,offset=-ofs);
            /* 1st animating block */


            /* 2nd animating block */
            control.addTween(target="#animating-block-3",
                TweenMax.from($("#animating-block-3 img[src*='mac']"),1,{css:{'margin-top':'50%',opacity:0}}),offset=-ofs);
            /* 2nd animating block */

            /* 3rd animating block */
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-6"]'), 0.2 , {css:{'left':'50%',opacity:'0'}}),offset=-ofs);
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-5"]'), 0.2 , {css:{'left':'50%',opacity:'0',display:'none'},delay:0.15}),offset=-ofs);
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-4"]'), 0.2 , {css:{'left':'50%',opacity:'0',display:'none'},delay:0.35}),offset=-ofs);
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-3"]'), 0.2 , {css:{'left':'50%',opacity:'0',display:'none'},delay:0.55}),offset=-ofs);
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-2"]'), 0.2 , {css:{'left':'50%',opacity:'0',display:'none'},delay:0.75}),offset=-ofs);
            control.addTween(target="#animating-block-4",
                TweenMax.from($('#animating-block-4 img[src*="color-1"]'), 0.2 , {css:{'left':'50%',opacity:'0',display:'none'},delay:0.95}),offset=-ofs);
            /* 3rd animating block */

            /* 4th animating block */
            control.addTween(target="#animating-block-7",
                TweenMax.from($("#animating-block-7 img[src*='one-page']"),1,{css:{width:'0'}}),offset=-ofs);
            /* 4th animating block */

            /* 5th animating block */

            /* 5th animating block */
            control.addTween(target="#animating-block-8",
                TweenMax.from($("#animating-block-8 img[src*='LayerSlider']"),1,{css:{'transform':'rotateY(180deg)'}}),offset=-ofs);
            /* 5th animating block */


        }
        /* retina-animating-blocks */
});

//Slider
var $status = $('.paginfo');
var $slickElement = $('.home-slider .slick-slider');

$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + ' | ' + slick.slideCount);
});

//home slider
$('.home-slider .slick-slider').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: $('.home-slider .slick-nav .prev'),
    nextArrow: $('.home-slider .slick-nav .next'),
    // dots:true,
});

//simple-slider
$('.simple-slider').slick({
    autoplay: true,
    autoplaySpeed: 5000,
    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-arrow-left"></i></button>' ,
    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-arrow-right"></i></button>'
    // prevArrow: false,
    // nextArrow: false,
    // dots:true,
});

//smooth scrooling
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

//fixed header on scroll and show to-top button
$(function() {
    var isBigScreen = Modernizr.mq('(min-width: 992px)');

    if (isBigScreen) {
        var wrap = $('#top');
        var toTop = $('#to-top');

        $(document).on('scroll', function(e) {

          if ($(this).scrollTop() > 300) {
            wrap.addClass('fixed-menu');
            toTop.addClass('show');

          } else {
            wrap.removeClass('fixed-menu');
            toTop.removeClass('show');
          }
          
        });
    }

});

//caroussel slider
$('.slick-caroussel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    adaptiveHeight: true,
    // autoplay: true,
    prevArrow: $('.caroussel .slick-nav .prev'),
    nextArrow: $('.caroussel .slick-nav .next')
});

// facebook

