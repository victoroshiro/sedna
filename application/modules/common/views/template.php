<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <base href="<?php echo site_url(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Sailor - Yacht Charter Booking HTML Template" />
    
    <?php if (!empty($description) && $description != ''): ?>
        <meta name="description" content="<?= $description ?>">
    <?php else: ?>
        <meta name="description" content="Sailor - Yacht Charter Booking HTML Template" /> 
    <?php endif ?>
    
    <meta name="author" content="themeenergy.com">
    
    <?php if (!empty($title)): ?>
        <title><?php echo $title ?></title>
    <?php else: ?>
        <title>Sailor - Home</title>
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

  <body <?php echo $active == 'home' ? 'class="home"' : ''; ?>>
        
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
    
    <!-- Footer -->
    <footer class="footer" role="contentinfo">
        <!-- Wrapper -->
        <div class="wrap">
          <div class="row">
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>About us</h6>
              <p>Sailor theme ltd.<br />1211 Pensilvania Ave, Sacramento, CA</p>
              <p> 1-555-555-555<br /><a href="mailto:sailor@sailortheme.com">sailor@sailortheme.com</a></p>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Why book with us?</h6>
              <ul class="check">
                <li><a href="#">Secure booking</a></li>
                <li><a href="#">Best price guarantee</a></li>
                <li><a href="#">Passionate service</a></li>
                <li><a href="#">Exclusive knowledge</a></li>
                <li><a href="#">Benefits for partners</a></li>
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Need help?</h6>
              <ul>
                <li><a href="#">Faq</a></li>
                <li><a href="#">How do I make a reservation?</a></li>
                <li><a href="#">Payment options</a></li>
                <li><a href="#">Privacy policy</a></li>
                <li><a href="#">Terms and conditions</a></li>
              </ul>
            </div>
            <!-- //OneFourth -->
            
            <!-- OneFourth -->
            <div class="one-fourth">
              <h6>Follow us</h6>
              <p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonummy  dolore magna aliquam erat volutpat. </p>
              <a href="#" title="Facebook" class="circle"><i class="fa fa-facebook fa-fw"></i></a>
              <a href="#" title="Google Plus" class="circle"><i class="fa fa-google-plus fa-fw"></i></a>
              <a href="#" title="Twitter" class="circle"><i class="fa fa-twitter fa-fw"></i></a>
              <a href="#" title="Youtube" class="circle"><i class="fa fa-youtube-play fa-fw"></i></a>
              <a href="#" title="Linkedin" class="circle"><i class="fa fa-linkedin fa-fw"></i></a>
              <a href="#" title="Pinterest" class="circle"><i class="fa fa-pinterest-p fa-fw"></i></a>
            </div>
            <!-- //OneFourth -->
          </div>
        </div>
        <!-- //Wrapper -->
        
        <div class="copy">
          <!-- Wrapper -->
          <div class="wrap">
            <p>Copyright 2016 Sailor, all rights reserved.</p>
            <p>By <a href="http://www.themeenergy.com" title="www.themeenergy.com">themeenergy</a></p>
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
          $("#lightSliderMainBanner").lightSlider({
            item: 1,
            loop: true,
            pager: false
          });
        });
        
        new WOW().init();
      });
    </script>
  </body>
</html>