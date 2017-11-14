<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <base href="<?php echo site_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Sailor - Yacht Charter Booking HTML Template" />
    
    <?php if (!empty($description)): ?>
        <meta name="description" content="<?= $description ?>">
    <?php else: ?>
        <meta name="description" content="Cimitarra Yachts" /> 
    <?php endif ?>
    
    <?php if (!empty($title)): ?>
        <title><?php echo $title ?></title>
    <?php else: ?>
        <title>Cimitarra Yachts - Home</title>
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
                <a href="https://www.facebook.com/cimitarrayachts" target="_blank" class="circle"><i class="fa fa-facebook"></i></a>
                <a href="https://www.youtube.com/channel/UCLojQsbDSNKVfNELwI0nP3w" target="_blank" class="circle"><i class="fa fa-youtube-play"></i></a>
                <a href="https://www.instagram.com/cimitarrayachts/" target="_blank" class="circle"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="language">
                <ul>
                    <li><img src="assets/images/favicon.png"> Acesse nossas redes sociais:</li>
                  <!--<li><a href="en">English</a></li>-->
                  <!--<li><a href="es">Spanish</a></li>-->
                  <!--<li><a href="<?php// echo base_url() ?>">Português</a></li>-->
                </ul>
              </div>
            </div>
          </div>
      </div>
      <div class="wrap">
          <!-- Logo -->
          <a href="<?php echo base_url();?>" title="Cimitarra Yachts" class="logo"><img src="assets/images/logo.png" alt="Cimitarra Yacht"></a>
          <!-- //Logo -->
          
          <!-- Primary menu -->
          <nav class="main-nav" role="navigation">
              <ul class="jetmenu" id="jetmenu">
                  <li><a href="<?php echo base_url();?>" title="Home">Home</a></li>
                  <li><a href="empresa" title="Empresa">empresa</a></li>
                  <li><a href="noticias" title="Noticias">notícias</a></li>
                  <li><a href="imprensas" title="Imprensa">Imprensa</a></li>
                  <li><a href="assistencia-tecnica" title="Assistência técnica">assistência técnica</a></li>
                  <li class="fix-sub">
                    <li><a>Embarcações</a>
                        <ul class="dropdown">
                            <?php
                              if($menu_embarcacoes_cim){
                            ?>
                                <li>
                                    <a>
                                        Cimitarra
                                    </a>
                                    <ul class="dropdown">
                                      <li>
                                          <a>360</a>
                                          <ul class="dropdown">
                                            <?php  
                                              foreach ($menu_embarcacoes_cim as $item) {
                                                if($item->subcategoria == '360'){
                                            ?>
                                                  <li>
                                                      <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                  </li>
                                            <?php
                                                }
                                              }
                                            ?>
                                          </ul>
                                      </li>
                                      <li>
                                          <a>400</a>
                                          <ul class="dropdown">
                                            <?php  
                                              foreach ($menu_embarcacoes_cim as $item) {
                                                if($item->subcategoria == '400'){
                                            ?>
                                                  <li>
                                                      <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                  </li>
                                            <?php
                                                }
                                              }
                                            ?>
                                          </ul>
                                      </li>
                                      <li>
                                          <a>460</a>
                                          <ul class="dropdown">
                                            <?php  
                                              foreach ($menu_embarcacoes_cim as $item) {
                                                if($item->subcategoria == '460'){
                                            ?>
                                                  <li>
                                                      <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                  </li>
                                            <?php
                                                }
                                              }
                                            ?>
                                          </ul>
                                      </li>
                                    </ul>
                                </li>
                            <?php
                              }
                              if($menu_embarcacoes_ciy){
                            ?>
                                <li>
                                    <a>
                                        Cimitarra Yachts
                                    </a>
                                    <ul class="dropdown">
                                        <li>
                                            <a>540</a>
                                            <ul class="dropdown">
                                              <?php  
                                                foreach ($menu_embarcacoes_ciy as $item) {
                                                  if($item->subcategoria == '540'){
                                              ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                              <?php
                                                  }
                                                }
                                              ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a>600</a>
                                            <ul class="dropdown">
                                              <?php  
                                                foreach ($menu_embarcacoes_ciy as $item) {
                                                  if($item->subcategoria == '600'){
                                              ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                              <?php
                                                  }
                                                }
                                              ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a>640</a>
                                            <ul class="dropdown">
                                              <?php  
                                                foreach ($menu_embarcacoes_ciy as $item) {
                                                  if($item->subcategoria == '640'){
                                              ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                              <?php
                                                  }
                                                }
                                              ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a>780</a>
                                            <ul class="dropdown">
                                              <?php  
                                                foreach ($menu_embarcacoes_ciy as $item) {
                                                  if($item->subcategoria == '780'){
                                              ?>
                                                    <li>
                                                        <a href="<?php echo site_url('embarcacoes/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a>
                                                    </li>
                                              <?php
                                                  }
                                                }
                                              ?>
                                            </ul>
                                        </li>
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

    <!-- Bottom Sidebar 
    <aside class="sidebar bottom navy" role="complementary">
      <div class="wrap">
        <div class="row">
          <h2>Entre em contato conosco</h2>
          <div class="one-fourth">
            <h5>Loja</h5>
            <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span> +55 (11) 2628.3065</p>
            <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:contato@cimitarra.com.br">contato@cimitarra.com.br</a></p>
            <p>
              <span class="circle small"><i class="fa fa-map-marker fa-fw"></i></span>
              Av. dos Bandeirantes, 4063
              <br>
              Planalto Paulista - São Paulo/SP
            </p>
          </div>

          <div class="one-fourth">
            <h5>Showroom</h5>
            <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span> +55 (11) 2628.3065 <br> +55 (11) 99617.6035</p>
            <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:contato@cimitarra.com.br">contato@cimitarra.com.br</a></p>
            <p>
              <span class="circle small"><i class="fa fa-map-marker fa-fw"></i></span>
              Av. dos Bandeirantes, 4063
              <br>
              Planalto Paulista - São Paulo/SP
            </p>
          </div>
          
          
          <div class="one-fourth">
            <h5>Assistência Técnica</h5>
            <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span> +55 (11) 2628.3065</p>
            <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:contato@cimitarra.com.br">contato@cimitarra.com.br</a></p>
            <p>
              <span class="circle small"><i class="fa fa-map-marker fa-fw"></i></span>
              Av. dos Bandeirantes, 4063
              <br>
              Planalto Paulista - São Paulo/SP
            </p>
          </div>

          <div class="one-fourth">
            <h5>Marina Astúrias</h5>
            <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span> +55 (11) 2628.3065</p>
            <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:contato@cimitarra.com.br">contato@cimitarra.com.br</a></p>
            <p>
              <span class="circle small"><i class="fa fa-map-marker fa-fw"></i></span>
              Av. dos Bandeirantes, 4063
              <br>
              Planalto Paulista - São Paulo/SP
            </p>
          </div>
        </div>
      </div>
    </aside>
    -->
    
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
              <img src="assets/images/logo-white.png" class="margin-bottom-md" alt="Cimitarra Yachts">
              <p>
                Trabalhamos com as melhores embarcações. Garantindo luxo, sofisticação conforto e segurança.
              </p>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fifth text-center">
              <h6>Cimitarra</h6>
              <ul>
                <li><a href="embarcacoes/detalhe/cimitarra/360/360-hard-top">360</a></li>
                <li><a href="embarcacoes/detalhe/cimitarra/400/400-hard-top">400</a></li>
                <li><a href="embarcacoes/detalhe/cimitarra/460/460-fly">460</a></li>                
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fifth text-center footer-collumn-pull-left-adjust">
              <h6>Cimitarra Yachts</h6>
              <ul>
                <li><a href="embarcacoes/detalhe/cimitarra-yachts/540/540-fly">540</a></li>
                <li><a href="embarcacoes/detalhe/cimitarra-yachts/600/600-fly">600</a></li>
                <li><a href="embarcacoes/detalhe/cimitarra-yachts/640/640-fly-bridge">640</a></li>
                <li><a href="embarcacoes/detalhe/cimitarra-yachts/780/780-fly">780</a></li>
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Siga-nos</h6>
              <p>Siga nossas redes sociais e fique por dentro de tudo que acontece na Cimitarra.</p>
              <a href="https://www.facebook.com/cimitarrayachts" target="blank" title="Facebook" class="circle"><i class="fa fa-facebook fa-fw"></i></a>
              <a href="https://www.youtube.com/channel/UCLojQsbDSNKVfNELwI0nP3w" target="blank" title="Youtube" class="circle"><i class="fa fa-youtube-play fa-fw"></i></a>
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
            <p>By <a href="http://vioti.com.br" target="_blank" title="vioti.com.br">Vioti</a></p>
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
    <script async src="https://www.youtube.com/iframe_api"></script>

    <?php if(isset($active) && $active == 'home'): ?>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
        <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
          

        <script>
        $(document).ready(function() {
          $("#lightSliderMainBanner").slick({
            adaptiveHeight: true,
            prevArrow: $(".slick-nav .prev"),
            nextArrow: $(".slick-nav .next")
            // loop: true,
            // pager: false
          });
        });
        </script>
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
  </body>
</html>
