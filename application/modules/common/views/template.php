<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <base href="<?php echo site_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Cimitarra Yachts" />
    
    <?php if (!empty($description)): ?>
        <meta name="description" content="<?= $description ?>">
    <?php else: ?>
        <meta name="description" content="Cimitarra Yachts" /> 
    <?php endif ?>
    
    <?php if (!empty($title)): ?>
        <title><?php echo $title ?></title>
    <?php else: ?>
        <title>Sedna Group</title>
    <?php endif ?>
    
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/fonts.css" />
    <link rel="stylesheet" href="assets/css/lightSlider.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <?php if(isset($active) && $active == 'embarcacao'): ?>
        <link rel="stylesheet" href="assets/css/lightGallery.min.css" />
        <link rel="stylesheet" href="assets/css/pannellum.css"/>
        <script type="text/javascript" src="assets/js/pannellum.js"></script>
    <?php endif ?>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Raleway:400,500,600,700&amp;subset=latin,greek,cyrillic,vietnamese' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">        

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- box-navy: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        
    <!-- Preloader -->
    <div class="preloader">
        <div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- //Preloader -->
    
    <!-- Header -->
    <header class="header" role="banner">
      <div class="wrap top-header">
        <div class="row top-header">
            <div class="full-width">
              <div class="social">
                <a href="https://www.facebook.com/SednaYachts.br/" target="_blank" class="circle"><i class="fa fa-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCwY5SMZCkW4eZeaacX3Pjbw" target="_blank" class="circle"><i class="fa fa-youtube-play"></i></a>
                <a href="https://www.instagram.com/cimitarrayachts/" target="_blank" class="circle"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="language">
                <ul>
                  <!-- <li><a href="en" class="flag en"><img src="<?php echo site_url('assets/images/flag/btn_en.png'); ?>" alt="English"></a></li> -->
                  <!-- <li><a href="es" class="flag es"><img src="<?php echo site_url('assets/images/flag/btn_es.png'); ?>" alt="Español"></a></li> -->
                  <li><img src="assets/images/favicon.png"> Acesse nossas redes sociais:</li>
                </ul>
              </div>
            </div>
          </div>
      </div>
      <div class="wrap">
          <!-- Logo -->
          <a href="<?php echo base_url();?>" title="Cimitarra Yachts" class="logo" style="padding: 0px !important"><img src="assets/images/logo.png" alt="Cimitarra Yacht"></a>
          <!-- //Logo -->
          
          <!-- Primary menu -->
          <nav class="main-nav" role="navigation">
              <ul class="jetmenu" id="jetmenu">
                  <li><a href="<?php echo base_url();?>" title="Home">Home</a></li>
                  <li><a href="empresa" title="Empresa">empresa</a></li>
                  <li><a href="noticias" title="Noticias">notícias</a></li>
<!--                  <li><a href="imprensas" title="Imprensa">Imprensa</a></li>-->
<!--                  <li><a href="assistencia-tecnica" title="Assistência técnica">assistência técnica</a></li>-->
                  <li class="fix-sub">
                    <li><a>Embarcações</a>
                        <ul class="dropdown">
                            <?php
                              if($menu_embarcacoes_cim){
                            ?>
                                <li>
                                    <a>
                                        Sedna Yachts
                                    </a>

                                          <ul class="dropdown">
                                            <?php  
                                              foreach ($menu_embarcacoes_cim as $item) {

                                            ?>
                                                  <li>
                                                      <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                  </li>
                                            <?php

                                              }
                                            ?>
                                          </ul>

                                </li>
                            <?php
                              }
                              if($menu_embarcacoes_ciy){
                            ?>
                                <li>
                                    <a>
                                        Sedna Sport Fishing Yachts
                                    </a>

                                            <ul class="dropdown">
                                              <?php  
                                                foreach ($menu_embarcacoes_ciy as $item) {

                                              ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                              <?php

                                                }
                                              ?>
                                            </ul>

                                </li>
                            <?php
                              }
                            ?>
                            <?php
                              if($menu_embarcacoes_sport){
                            ?>
                            <li>
                                <a>
                                    Sedna Super Sport Yachts
                                </a>

                                        <ul class="dropdown">
                                            <?php
                                            foreach ($menu_embarcacoes_sport as $item) {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                                    <?php
                                            }
                                            ?>
                                        </ul>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>                  
                    </li>
                    <!-- <li><a href="fidelidade" title="Fidelidade Cimitarra">Fidelidade Cimitarra</a></li> -->
                  <li><a href="seminovos" title="Seminovos">seminovos</a></li>
                  <li>
                      <a href="contato" title="Contato">contato</a>
                      <ul class="dropdown">
                          <li><a href="contato" title="Contato">Fale Conosco</a></li>
                          <li><a href="trabalhe-conosco" title="Trabalhe Conosco">Trabalhe Conosco</a></li>
                      </ul>
                  </li>
              </ul>
              
              <!-- Search -->
              <form class="advanced-search" action="charters.html">
                  <div class="wrap">
                      <div>
                          <select>
                              <option selected>Select location</option>
                              <option>Caribbean</option>
                              <option>Mediterranean</option>
                              <option>Indian Ocean</option>
                              <option>South Pacific</option>
                              <option>South East Asia</option>
                              <option>South America</option>
                              <option>North America</option>
                              <option>Northern Europe</option>
                          </select>
                      </div>
                      <div>
                          <input type="text" id="startDate" />
                      </div>
                      <div>
                          <select>
                              <option selected>Duration</option>
                              <option>1 week</option>
                              <option>2 weeks</option>
                              <option>3 weeks</option>
                              <option>4 weeks</option>
                          </select>
                      </div>
                      <div>
                          <select>
                              <option selected>Cabins</option>
                              <option>3 or less</option>
                              <option>4 - 6</option>
                              <option>6 or more</option>
                          </select>
                      </div>
                      <div>
                          <select>
                              <option selected>Yacht type</option>
                              <option>Motor yacht</option>
                              <option>Sailing yacht</option>
                          </select>
                      </div>
                      <div><input type="submit" id="as-submit" class="button gold full" value="Search yachts" /></div>
                      <a href="javascript:void(0)" class="search-hide" title="Hide this box">Hide this box</a>
                  </div>
              </form>
              <!-- //Search -->
          </nav>
          <!-- //Primary menu -->
      </div>
    </header>
    <!-- //Header -->

        <?= $partial ?>
    
    <!-- Photo -->
    <section class="photo">
        <div class="wrap text-right">
            <p class="font-source-sans">
            Fabricamos embarcações de alta  qualidade desde 1999,
            <br>
            com seriedade e compromisso com nossos clientes.
            </p>
            <h2 class="font-source-sans">
                Cimitarra Yachts.
                <br>
                A compra inteligente.
            </h2>
        </div>
    </section>
    <!-- //Photo -->
    
    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <!-- Wrapper -->
        <div class="wrap">
          <div class="row">
            <!-- OneFourth -->
            <div class="one-third">
              <img src="assets/images/logo.png" class="margin-bottom-md" alt="Cimitarra Yachts">
              <p>
                  Fabricamos embarcações de alto nível aliando qualidade, conforto, alta performance, excelente navegabilidade, robustez e segurança.
              </p>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fifth ">
              <h6>Contato</h6>
                <p>
                    +55 (11) 2307-7007
                </p>
                <p>
                    contato@sednagroup.com.br
                </p>
                <p>
                    Avenida Europa, 421 - Jardim Europa
                    <br>
                    CEP: 01449001 - São Paulo, Brasil
                </p>
            </div>

              <!-- OneFourth -->
              <div class="one-fifth text-center footer-collumn-pull-left-adjust">

              </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Siga-nos</h6>
              <p>Acesse nossas redes sociais e fique por dentro de tudo o que acontece no Sedna Group.</p>
              <a href="https://www.facebook.com/SednaYachts.br/" target="blank" title="Facebook" class="circle"><i class="fa fa-facebook fa-fw"></i></a>
              <a href="https://www.youtube.com/channel/UCwY5SMZCkW4eZeaacX3Pjbw" target="blank" title="Youtube" class="circle"><i class="fa fa-youtube-play fa-fw"></i></a>
              <a href="https://www.instagram.com/cimitarrayachts" target="blank" title="Instagram" class="circle"><i class="fa fa-instagram fa-fw"></i></a>

            </div>
            <!-- //OneFourth -->
          </div>
        </div>
        <!-- //Wrapper -->
        
        <div class="copy">
          <!-- Wrapper -->
          <div class="wrap">
            <p>Cimitarra Yachts <?php echo gmdate("Y"); ?>. Todos os Direitos Reservados</p>
            <p>By <a style="color: #777" href="http://vioti.com.br" target="_blank" title="vioti.com.br">Vioti</a></p>
          </div>
          <!-- //Wrapper -->
        </div>
    </footer>
    <!-- //Footer -->

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jetmenu.js"></script>
    <script src="assets/js/jquery.uniform.min.js"></script>
    <script src="assets/js/jquery.lightSlider.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <?php if(isset($active) && $active == 'embarcacao'): ?>
        <script src="assets/js/lightGallery.min.js"></script>
        <script> 
            $(document).ready(function () {
                    $('.accordion dt:first-of-type').addClass('expanded');
                    $('.accordion dd:first-of-type').show();
                    $(".gallery").lightGallery({
                            download:false
                    });
            });
        </script>
	
    <?php endif ?>

    <?php if(isset($active)): ?>
      <?php if($active == 'home'): ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script async src="https://www.youtube.com/iframe_api"></script>
        <script>
        $(document).ready(function() {
          $("#lightSliderMainBanner").slick({
            adaptiveHeight: true,
            prevArrow: $(".slick-nav .prev"),
            nextArrow: $(".slick-nav .next"),
            // loop: true,
            // pager: false
            responsive: [
            {
                breakpoint: 480,
                settings: "unslick"
            }
            ]
          });
        });
        </script>
      <?php endif ?>
      <?php if($active == 'seminovos'): ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
          <script type="text/javascript">
            $('.slider-big').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: true,
              adaptiveHeight: true,
              prevArrow: '<button class="prev-arrow"><i class="fa fa-arrow-left"></i></button>',
              nextArrow: '<button class="next-arrow"><i class="fa fa-arrow-right"></i></button>',
              lazyLoad: 'ondemand',
              asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
              slidesToShow: 9,
              slidesToScroll: 1,
              asNavFor: '.slider-big',
              arrows: false,
              dots: false,
              centerMode: false,
              focusOnSelect: true
            });
          </script>
      <?php endif ?>
    <?php endif ?>

    <script>
       $(document).ready(function() {
        $("#lightSliderPosts").lightSlider({
          item:1,
          keyPress:true,
          gallery:false,
          pager:false,
          prevHtml: 'PREVIOUS',
          nextHtml: 'NEXT'
        });
        
        $("#lightSliderDeals").lightSlider({
          item:1,
          keyPress:true,
          gallery:false,
          pager:false,
          prevHtml: 'PREVIOUS',
          nextHtml: 'NEXT'
        });

        
        
        new WOW().init();
      });
    </script>
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115391906-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115391906-1');
    </script>
  </body>
</html>
