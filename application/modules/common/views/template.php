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
        <meta name="description" content="Sailor - Yacht Charter Booking HTML Template" /> 
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

    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Raleway:400,500,600,700&amp;subset=latin,greek,cyrillic,vietnamese' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

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
                <a href="facebook" class="circle"><i class="fa fa-facebook"></i></a>
                <a href="instagram" class="circle"><i class="fa fa-youtube-play"></i></a>
                <a href="instagram" class="circle"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="language">
                <ul>
                  <li><a href="en">English</a></li>
                  <li><a href="es">Spanish</a></li>
                  <li><a href="<?php echo base_url() ?>">Português</a></li>
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
                  <li><a href="empresa" title="Empresa">empresa</a></li>
                  <li><a href="noticias" title="Noticias">noticias</a></li>
                  <li><a href="assitencia-tecnica" title="Assitencia técnica">assitencia técnica</a></li>
                  <li>
                    <a href="embarcacoes" title="Embarcacoes">embarcações</a>
                    <ul class="dropdown">
                        <li><a href="blog.html" title="Blog">Blog</a></li>
                        <li><a href="blog2.html" title="Blog 2">Blog 2</a></li>
                        <li><a href="blog3.html" title="Blog 3">Blog 3</a></li>
                        <li><a href="blog-single.html" title="Single post">Single post</a></li>
                    </ul>
                  </li>
                  <li><a href="fidelidade-cimitarra" title="Fidelidade Cimitarra">Fidelidade Cimitarra</a></li>
                  <li><a href="seminovos" title="Seminovos">seminovos</a></li>
                  <li><a href="contato" title="Contato">contato</a></li>
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

    <!-- Bottom Sidebar -->
    <aside class="sidebar bottom navy" role="complementary">
      <!-- Wrapper -->
      <div class="wrap">
        <div class="row">
          <h2>Entre em contato conosco</h2>
          <!-- OneFourth -->
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
          <!-- //OneFourth -->

          <div class="one-fourth">
            <h5>Showroom</h5>
            <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span> +55 (11) 2628.3065 - +55 (11) 99617.6035</p>
            <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:contato@cimitarra.com.br">contato@cimitarra.com.br</a></p>
            <p>
              <span class="circle small"><i class="fa fa-map-marker fa-fw"></i></span>
              Av. dos Bandeirantes, 4063
              <br>
              Planalto Paulista - São Paulo/SP
            </p>
          </div>
          <!-- //OneFourth -->
          
          
          <!-- OneFourth -->
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
          <!-- //OneFourth -->

          <!-- OneFourth -->
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
          <!-- //OneFourth -->        
        </div>
      </div>
      <!-- //Wrapper -->
    </aside>
    <!-- //Bottom Sidebar -->
    
    <!-- Photo -->
    <section class="photo">
      <div class="wrap center">
        <h2>Find out more about our sailing destinations, marinas and suggested itineraries</h2>
        <p>Wild, exotic and remote; cosmopolitan and cutting-edge; untouched and tranquil, <br />discover our incredible sailing destinations. <br />See the world. Differently.</p>
        <a href="#" title="Find out more" class="button white medium">Find out more</a>
      </div>
    </section>
    <!-- //Photo -->
    
    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <!-- Wrapper -->
        <div class="wrap">
          <div class="row">
            <!-- OneFourth -->
            <div class="one-fourth">
              <img src="assets/images/logo-white.png" class="margin-bottom-md" alt="Cimitarra Yachts">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium vero nihil corporis!
              </p>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Cimitarra</h6>
              <ul>
                <li><a href="#">360</a></li>
                <li><a href="#">400</a></li>
                <li><a href="#">440</a></li>
                <li><a href="#">460</a></li>                
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Cimitarra Yachts</h6>
              <ul>
                <li><a href="#">600</a></li>
                <li><a href="#">640</a></li>
                <li><a href="#">780</a></li>
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Siga-nos</h6>
              <p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonummy  dolore magna aliquam erat volutpat. </p>
              <a href="#" title="Facebook" class="circle"><i class="fa fa-facebook fa-fw"></i></a>
              <a href="#" title="Instagram" class="circle"><i class="fa fa-instagram fa-fw"></i></a>
              <a href="#" title="Youtube" class="circle"><i class="fa fa-youtube-play fa-fw"></i></a>
              <a href="#" title="Linkedin" class="circle"><i class="fa fa-linkedin fa-fw"></i></a>
            </div>
            <!-- //OneFourth -->
          </div>
        </div>
        <!-- //Wrapper -->
        
        <div class="copy">
          <!-- Wrapper -->
          <div class="wrap">
            <p>Cimitarra Yachts <?php echo gmdate("Y"); ?>. Todos os Direitos Rervados.</p>
            <p>By <a href="http://vioti.com.br" title="vioti.com.br">Vioti</a></p>
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

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
      
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

        
        $(document).ready(function() {
          $("#lightSliderMainBanner").slick({
            adaptiveHeight: true
            // loop: true,
            // pager: false
          });
        });
        
        new WOW().init();
      });
    </script>
  </body>
</html>