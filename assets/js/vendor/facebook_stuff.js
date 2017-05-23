function composer_include (){
/*********************************************/
    document.documentElement.className += ' js_active ';
    document.documentElement.className += 'ontouchstart' in document.documentElement ? ' vc_mobile ' : ' vc_desktop ';
    (function(){
        var prefix = ['-webkit-','-o-','-moz-','-ms-',""];
        for (var i in prefix) { if(prefix[i]+'transform' in document.documentElement.style) document.documentElement.className += " vc_transform "; }
    })();
    /*
       On document ready jQuery will fire set of functions.
       If you want to override function behavior then copy it to your theme js file
       with the same name.
    */

    jQuery(window).load(function() {
        jQuery('.wpb_flexslider').each(function() {
            var this_element = jQuery(this);
            var sliderSpeed = 800,
                sliderTimeout = parseInt(this_element.attr('data-interval'))*1000,
                sliderFx = this_element.attr('data-flex_fx'),
                slideshow = true;
            if ( sliderTimeout === 0 ) slideshow = false;

            this_element.flexslider({
                animation: sliderFx,
                slideshow: slideshow,
                slideshowSpeed: sliderTimeout,
                sliderSpeed: sliderSpeed,
                smoothHeight: true
            });
        });

    });
    jQuery(document).ready(function($) {
        vc_twitterBehaviour();
        vc_toggleBehaviour();
        vc_tabsBehaviour();
        vc_accordionBehaviour();
        vc_carouselBehaviour();
        vc_teaserGrid();
        vc_progress_bar();
        vc_waypoints();
    }); // END jQuery(document).ready

    /* Twitter
    ---------------------------------------------------------- */
    if ( typeof window['vc_twitterBehaviour'] !== 'function' ) {
        function vc_twitterBehaviour() {
            jQuery('.wpb_twitter_widget .tweets').each(function(index) {
                var this_element = jQuery(this),
                    tw_name = this_element.attr('data-tw_name');
                    tw_count = this_element.attr('data-tw_count');

                this_element.tweet({
                    username: tw_name,
                    join_text: "auto",
                    avatar_size: 0,
                    count: tw_count,
                    template: "{avatar}{join}{text}{time}",
                    auto_join_text_default: "",
                    auto_join_text_ed: "",
                    auto_join_text_ing: "",
                    auto_join_text_reply: "",
                    auto_join_text_url: "",
                    loading_text: '<span class="loading_tweets">loading tweets...</span>'
                });
            });
        }
    }

    /* Progress bar
    ---------------------------------------------------------- */
    if ( typeof window['vc_progress_bar'] !== 'function' ) {
      function vc_progress_bar() { 
        if (typeof jQuery.fn.waypoint !== 'undefined') {

            jQuery('.vc_progress_bar').waypoint(function() {
                jQuery(this).find('.vc_single_bar').each(function(index) {
                var $this = jQuery(this),
                    bar = $this.find('.vc_bar'),
                    val = bar.data('percentage-value');

                  setTimeout(function(){ bar.css({"width" : val+'%'}); }, index*200);
                });
            }, { offset: '85%' });
        }
      }
    }

    /* Waypoints magic
    ---------------------------------------------------------- */
    if ( typeof window['vc_waypoints'] !== 'function' ) {
      function vc_waypoints() {
        if (typeof jQuery.fn.waypoint !== 'undefined') {
            jQuery('.wpb_animate_when_almost_visible').waypoint(function() {
                jQuery(this).addClass('wpb_start_animation');
            }, { offset: '85%' });
        }
      }
    }

    /* Toggle
    ---------------------------------------------------------- */
    if ( typeof window['vc_toggleBehaviour'] !== 'function' ) {
        function vc_toggleBehaviour() {
            jQuery(".wpb_toggle").click(function(e) {
                if ( jQuery(this).hasClass('wpb_toggle_title_active') ) {
                    jQuery(this).removeClass('wpb_toggle_title_active').next().slideUp(500);
                } else {
                    jQuery(this).addClass('wpb_toggle_title_active').next().slideDown(500);
                }
            });
            jQuery('.wpb_toggle_content').each(function(index) {
                if ( jQuery(this).next().is('h4.wpb_toggle') == false ) {
                    jQuery('<div class="last_toggle_el_margin"></div>').insertAfter(this);
                }
            });
        }
    }

    /* Tabs + Tours
    ---------------------------------------------------------- */
    if ( typeof window['vc_tabsBehaviour'] !== 'function' ) {
        function vc_tabsBehaviour() {
                jQuery(function($){$(document.body).off('click.preview', 'a')});
                jQuery('.wpb_tabs, .wpb_tour').each(function(index) {
                    var $tabs,
                        interval = jQuery(this).attr("data-interval"),
                        tabs_array = [];
                    //
                    $tabs = jQuery(this).find('.wpb_tour_tabs_wrapper').tabs({
                        show: function(event, ui) {wpb_prepare_tab_content(event, ui);},
                        activate: function(event, ui) {wpb_prepare_tab_content(event, ui);}
                        }).tabs('rotate', interval*1000);

                    jQuery(this).find('.wpb_tab').each(function(){ tabs_array.push(this.id); });

                    jQuery(this).find('.wpb_tab a[href^="#"]').click(function(e) {
                        e.preventDefault();
                        if ( jQuery.inArray( jQuery(this).attr('href'), tabs_array) ) {
                            $tabs.tabs("select", jQuery(this).attr('href'));
                            return false;
                        }
                    });

                    jQuery(this).find('.wpb_prev_slide a, .wpb_next_slide a').click(function(e) {
                        e.preventDefault();
                        var ver = jQuery.ui.version.split('.');
                        if(parseInt(ver[0])===1 &&  parseInt(ver[1]) < 9) {
                            var index = $tabs.tabs('option', 'selected');
                            if ( jQuery(this).parent().hasClass('wpb_next_slide') ) { index++; }
                            else { index--; }
                            if ( index < 0 ) { index = $tabs.tabs("length") - 1; }
                            else if ( index >= $tabs.tabs("length") ) { index = 0; }
                            $tabs.tabs("select", index);
                        } else {
                            var index = $tabs.tabs( "option", "active"),
                                length = $tabs.find('.wpb_tab').length;

                            if ( jQuery(this).parent().hasClass('wpb_next_slide') ) {
                                index = (index+1) >=length ? 0 : index+1;
                            } else {
                                index = index-1 < 0 ? length -1 : index-1;
                            }

                            $tabs.tabs( "option", "active", index );
                        }

                    });

                });
        }
    }

    /* Tabs + Tours
    ---------------------------------------------------------- */
    if ( typeof window['vc_accordionBehaviour'] !== 'function' ) {
        function vc_accordionBehaviour() {
            jQuery('.wpb_accordion').each(function(index) {
                var $tabs,
                    interval = jQuery(this).attr("data-interval"),
                    active_tab = !isNaN(jQuery(this).data('active-tab')) && parseInt(jQuery(this).data('active-tab')) >  0 ? parseInt(jQuery(this).data('active-tab'))-1 : false,
                    collapsible =  active_tab === false || jQuery(this).data('collapsible') === 'yes';
                //
                $tabs = jQuery(this).find('.wpb_accordion_wrapper').accordion({
                    header: "> div > h3",
                    autoHeight: false,
                    heightStyle: "content",
                    active: active_tab,
                    collapsible: collapsible,
                    navigation: true,
                    change: function(event, ui){
                        if(jQuery.fn.isotope!=undefined) {
                            ui.newContent.find('.isotope').isotope("reLayout");
                        }
                        vc_carouselBehaviour();
                    }
                });
                //.tabs().tabs('rotate', interval*1000, true);
            });
        }
    }

    /* Teaser grid: isotope
    ---------------------------------------------------------- */
    if ( typeof window['vc_teaserGrid'] !== 'function' ) {
        function vc_teaserGrid() {
            var layout_modes = {
                fitrows: 'fitRows',
                masonry: 'masonry'
            }
            jQuery('.wpb_grid .teaser_grid_container:not(.wpb_carousel), .wpb_filtered_grid .teaser_grid_container:not(.wpb_carousel)').each(function(){
                var $container = jQuery(this);
                var $thumbs = $container.find('.wpb_thumbnails');
                var layout_mode = $thumbs.attr('data-layout-mode');
                $thumbs.isotope({
                    // options
                    itemSelector : '.isotope-item',
                    layoutMode : (layout_modes[layout_mode]==undefined ? 'fitRows' : layout_modes[layout_mode])
                });
                $container.find('.categories_filter a').data('isotope', $thumbs).click(function(e){
                    e.preventDefault();
                    var $thumbs = jQuery(this).data('isotope');
                    jQuery(this).parent().parent().find('.active').removeClass('active');
                    jQuery(this).parent().addClass('active');
                    $thumbs.isotope({filter: jQuery(this).attr('data-filter')});
                });
                jQuery(window).bind('load resize', function() {
                    $thumbs.isotope("reLayout");
                });
            });

            var isotope = jQuery('.wpb_grid ul.thumbnails');
            if ( isotope.length > 0 ) {
                isotope.isotope({
                    // options
                    itemSelector : '.isotope-item',
                    layoutMode : 'fitRows'
                });
                jQuery(window).load(function() {
                    isotope.isotope("reLayout");
                });
            }
        }
    }

    function loadScript(url, $obj, callback){

        var script = document.createElement("script")
        script.type = "text/javascript";

        if (script.readyState){  //IE
            script.onreadystatechange = function(){
                if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                    script.onreadystatechange = null;
                    callback();
                }
            };
        } else {  
        }

        script.src = url;
        $obj.get(0).appendChild(script);
    }

    /**
     * Prepare html to correctly display inside tab container
     *
     * @param event - ui tab event 'show'
     * @param ui - jquery ui tabs object
     */

    function wpb_prepare_tab_content(event, ui) {
        var panel = ui.panel || ui.newPanel;
        vc_carouselBehaviour();
        var $ui_panel = jQuery(panel).find('.isotope'),
            $google_maps = jQuery(panel).find('.wpb_gmaps_widget');
        if ($ui_panel.length > 0) {
            $ui_panel.isotope("reLayout");
        }

        if($google_maps.length && !$google_maps.is('.map_ready')) {
            var $frame = $google_maps.find('iframe');
            $frame.attr('src', $frame.attr('src'));
            $google_maps.addClass('map_ready');
        }
    }
  function vc_carouselBehaviour() {
    jQuery(".wpb_carousel").each(function() {
            var $this = jQuery(this);
            if($this.data('carousel_enabled') !== true && $this.is(':visible')) {
                $this.data('carousel_enabled', true);
                var carousel_width = jQuery(this).width(),
                    visible_count = getColumnsCount(jQuery(this)),
                    carousel_speed = 500;
                if ( jQuery(this).hasClass('columns_count_1') ) {
                    carousel_speed = 900;
                }
                /* Get margin-left value from the css grid and apply it to the carousele li items (margin-right), before carousele initialization */
                var carousele_li = jQuery(this).find('.wpb_thumbnails-fluid li');
                carousele_li.css({"margin-right": carousele_li.css("margin-left"), "margin-left" : 0 });

                jQuery(this).find('.wpb_wrapper:eq(0)').jCarouselLite({
                    btnNext: jQuery(this).find('.next'),
                    btnPrev: jQuery(this).find('.prev'),
                    visible: visible_count,
                    speed: carousel_speed
                })
                    .width('100%');//carousel_width

                var fluid_ul = jQuery(this).find('ul.wpb_thumbnails-fluid');
                fluid_ul.width(fluid_ul.width()+300);

                jQuery(window).resize(function() {
                    var before_resize = screen_size;
                    screen_size = getSizeName();
                    if ( before_resize != screen_size ) {
                        window.setTimeout('location.reload()', 20);
                    }
                });
            }

    });
        /*
        if(jQuery.fn.bxSlider !== undefined ) {
            jQuery('.bxslider').each(function(){
               var $slider = jQuery(this);
               $slider.bxSlider($slider.data('settings'));
            });
        }
        */
        if(window.Swiper !== undefined) {

            jQuery('.swiper-container').each(function(){
                var $this = jQuery(this),
                    my_swiper,
                    max_slide_size = 0,
                    options = jQuery(this).data('settings');

                    if(options.mode === 'vertical') {
                        $this.find('.swiper-slide').each(function(){
                            var height = jQuery(this).outerHeight(true);
                            if(height > max_slide_size) max_slide_size = height;
                        });
                        $this.height(max_slide_size);
                        $this.css('overflow', 'hidden');
                    }
                    jQuery(window).resize(function(){
                        $this.find('.swiper-slide').each(function(){
                            var height = jQuery(this).outerHeight(true);
                            if(height > max_slide_size) max_slide_size = height;
                        });
                        $this.height(max_slide_size);
                    });
                    my_swiper = jQuery(this).swiper(jQuery.extend(options, {
                    onFirstInit: function(swiper) {
                        if(swiper.slides.length < 2) {
                            $this.find('.vc-arrow-left,.vc-arrow-right').hide();
                        } else if(swiper.activeIndex === 0  && swiper.params.loop !== true) {
                            $this.find('.vc-arrow-left').hide();
                        } else {
                            $this.find('.vc-arrow-left').show();
                        }
                    },
                    onSlideChangeStart: function(swiper) {
                        if(swiper.slides.length > 1 && swiper.params.loop !== true) {
                            if(swiper.activeIndex === 0) {
                                $this.find('.vc-arrow-left').hide();
                            } else {
                                $this.find('.vc-arrow-left').show();
                            }
                            if(swiper.slides.length-1 === swiper.activeIndex) {
                                $this.find('.vc-arrow-right').hide();
                            } else {
                                $this.find('.vc-arrow-right').show();
                            }
                        }
                    }
                }));
                $this.find('.vc-arrow-left').click(function(e){
                    e.preventDefault();
                    my_swiper.swipePrev();
                });
                $this.find('.vc-arrow-right').click(function(e){
                    e.preventDefault();
                    my_swiper.swipeNext();
                });
                my_swiper.reInit();
            });

        }

    }

/********************************************/
}
/* COMPOSER */

function milestone_counter (){
    if (!is_mobile()){
        $(".milestone").each(function (){
            if ($(this).attr("data-counted")!="yes"){
                var el = this;
                if (is_visible(el)){
                    $(el).attr("data-counted","yes");
                    var str_count = $(el).find(".title").text();
                    var count = parseInt(str_count);
                    var digits = 0;
                    var digits = str_count.length;
                    var i = 0;
                    var str_i = "";
                    for (var k=0;k<digits;k+=1){
                        str_i = str_i+"0";
                    }
                    var flag = false;
                    var timer = setInterval(function (){
                        for (var j=0;j<digits-1;j+=1){
                            if (parseInt(str_i.charAt(digits-1-j)) != parseInt(str_count.charAt(digits-1-j))){
                                var number = Math.pow(10,j);
                                i+=number;
                                flag = true;
                            }
                            if (parseInt(str_i.charAt(0))<parseInt(str_count.charAt(0))){
                                var number = Math.pow(10,digits-2);
                                i+=number;
                                flag = true;
                            }
                        }
                        if (flag == true){
                            str_i = String(i);
                            $(el).find(".title").text(str_i);
                        }
                        flag = false;
                        if (i>=count){
                            clearInterval(timer);
                        }
                    },85);
                }
            }
        });
    }
}
function progress_bar_loader (){
    if (!is_mobile()){
            $(".vc_bar").each(function(){
                var el = this;
                if (is_visible(el)){
                    if ($(el).attr("processed")!="true"){
                        $(el).css("width","0%");
                        $(el).attr("processed","true");
                        var val = parseInt($(el).attr("data-value"));
                        var fill = 0;
                        var timer = setInterval(function (){
                            if (fill<val){
                                fill += 1;
                                $(el).css("width",String(fill)+"%");
                                var ind = $(el).find("em");
                                $(ind).text(fill+"%");
                                ind.css("left",String(fill)+"%");
                            }
                        },10);          
                    }
                }
            });
        }
    else{
            $(".vc_bar").each(function(){
                var el=this;
                var fill = $(el).attr("data-value");
                $(el).css('width',fill+'%');
            });     
    }

}

function is_visible (el){
    var w_h = $(window).height();
    var dif = $(el).offset().top - document.body.scrollTop;
    if ((dif > 0) && (dif<w_h)){
        return true;
    }
    else{
        return false;
    }

}
function chart_circle_init (){
    var animate;
    if (is_mobile()){
        animate = false
    }
    else{
        animate=2000;
    }
    $('.chart-circle').each(function (){
        if (is_visible(this)){
            $(this).append("<span class='value' style='color:"+$(this).attr("data-color")+"'>"+$(this).attr("data-percent")+"%"+"</span>")
            if ($(this).hasClass("type-2")){
                $(this).easyPieChart({
                    animate: animate,
                    lineWidth: 20,
                    size: 250,
                    scaleColor:'#fff',
                    trackColor:'#e2e2e2',
                    barColor:$(this).attr("data-color"),
                    lineCap:'butt'
                });
            }
            else if ($(this).hasClass("type-3")){
                $(this).easyPieChart({
                    animate: animate,
                    lineWidth: 10,
                    size: 250,
                    scaleColor:'#fff',
                    trackColor:'#e2e2e2',
                    barColor:$(this).attr("data-color"),
                    lineCap:'butt'
                });
            }
            else{
                $(this).easyPieChart({
                    animate: animate,
                    lineWidth: 40,
                    size: 250,
                    scaleColor:'#fff',
                    trackColor:'#e2e2e2',
                    barColor:$(this).attr("data-color"),
                    lineCap:'butt'
                });
            }
        }
    });

    //update instance after 5 sec
}
function is_mobile (){
        if (($(window).width()<767) || (navigator.userAgent.match(/(iPhone|iPod|iPad)/))){
            return true;
        }
        else{
            return false;
        }
}
/*work*/
