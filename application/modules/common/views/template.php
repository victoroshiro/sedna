<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php if (!empty($title) && $title != ''): ?>
			<title><?php echo $title ?></title>
		<?php else: ?>
			<title>FemCare</title>
		<?php endif ?>
		
		<meta name="viewport" content="width=device-width">

		<?php if (!empty($description) && $description != ''): ?>
			<meta name="description" content="<?= $description ?>">
		<?php else: ?>
			<meta name="description" content="FemCare - Clínica especializada na saúde da mulher. Tels.: (11) 3885-3937/(11) 3885-4194">
		<?php endif ?>

		<meta name="keywords" content="saúde, mulher, ginecologia, endometriose, menstruação, miomas, sexualidade, libido, orgasmo, lubrificação, anorgasmia, obstetrícia, gestação, pré-natal, maternidade, parto, atendimento, feminina.">

		<base href="<?php echo site_url(); ?>">

		<link rel="icon" type="image/png" href="assets/images/favicon.png">
		
		<!--build:css(app/) assets/css/main.min.css-->
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
		<!--endbuild-->
		<!--build:js(app/) assets/js/vendor/modernizr-2.6.2.min.js-->
		<script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
		<!--endbuild-->
	</head>

	<body>
		<!--[if lt IE 8]>
			<p class="chromeframe">Seu navegador é <strong>antigo</strong>. Por favor <a href="http://browsehappy.com/">atualize seu navegador</a> ou <a href="http://www.google.com/chromeframe/?redirect=true">ative o Google Chrome Frame</a> para visualizar o conteúdo corretamente.</p>
		<![endif]-->

		<header id="top">
			<div class="menu grey">
				<div class="container">
					<div class="row">
						<div class="col-md-10 address">
							<p>Rua Mário Amaral, 319 | Paraíso | São Paulo-SP | Tel/fax: (11) 3885-3937 / (11) 3885-4194</p>
						</div>
						<div class="col-md-2">
							<div class="social-media-menu">
								<a href="https://www.facebook.com/clinicafemcare/?fref=ts" target="_blank"><i class="fa fa-facebook-official"></i></a>
								<a href="https://www.youtube.com/user/drafairbanks" target="_blank"><i class="fa fa-youtube-play"></i></a>
								<a href="https://www.instagram.com/clinica_femcare/"><i class="fa fa-instagram"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="menu">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav>
								<div class="menu-logo">
									<a href="<?php echo site_url('home'); ?>"><img src="assets/images/menu/logo.png"/></a>
								</div>
									
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
									<span class="text">Menu</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								
								<div class="collapse navbar-collapse" id="main-nav">
									<button type="button" class="navbar-toggle navbar-intern collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
										<span class="text"><span class="fa fa-close"></span></span>
									</button>

									<ul>
										<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
										<li><a href="<?php echo site_url('quem-somos'); ?>">A Clínica</a></li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown" data-toggle="dropdown">Ginecologia<span><i class="fa fa-chevron-down"></i></span></a>
											<ul class="dropdown-menu" aria-labelledby="ginecologia">
												<?php
													if($menu_gineco){
														foreach ($menu_gineco as $item) {
												?>
															<li><a href="<?php echo site_url('ginecologia/'.$item->slug); ?>"><?php echo $item->titulo; ?></a></li>
												<?php
														}
													}
												?>		
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown" data-toggle="dropdown">Sexualidade<span><i class="fa fa-chevron-down"></i></span></a>
											<ul class="dropdown-menu" aria-labelledby="sexualidade">
												<?php
													if($menu_sex){
														foreach ($menu_sex as $item) {
												?>
															<li><a href="<?php echo site_url('sexualidade/'.$item->slug); ?>"><?php echo $item->titulo; ?></a></li>
												<?php
														}
													}
												?>		
											</ul>
										</li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown" data-toggle="dropdown">Obstetrícia<span><i class="fa fa-chevron-down"></i></span></a>
											<ul class="dropdown-menu" aria-labelledby="obstetricia">
												<?php
													if($menu_obs){
														foreach ($menu_obs as $item) {
												?>
															<li><a href="<?php echo site_url('obstetricia/'.$item->slug); ?>"><?php echo $item->titulo; ?></a></li>
												<?php
														}
													}
												?>		
											</ul>
										</li>
										<li><a href="<?php echo site_url('mitos-verdades'); ?>">Mitos e Verdades</a></li>
										<li class="dropdown">
											<a href="#" data-toggle="dropdown" data-toggle="dropdown">Sala de Imprensa<span><i class="fa fa-chevron-down"></i></span></a>
											<ul class="dropdown-menu" aria-labelledby="imprensa">
												<?php
													if($menu_imp){
														foreach ($menu_imp as $item) {
												?>
															<li><a href="<?php echo site_url('imprensa/'.$item->slug); ?>"><?php echo $item->titulo; ?></a></li>
												<?php
														}
													}
												?>		
											</ul>
										</li>
										<li><a href="<?php echo site_url('contato'); ?>">Contato</a></li>
									</ul>
								</div>									

							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>

		<?= $partial ?>

		<div class="clearfix"></div>

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4 sobre">
						<img src="assets/images/menu/logo.png"/>
						<div class="text">
							<p>Clínica especializada na saúde da mulher.</p>
							<p>Proporcionamos um atendimento eficiente através de profissionais experientes, oferecendo toda estrutura que a paciente merece.</p>
						</div>
						<a href="<?php echo site_url('quem-somos'); ?>" class="main-button button white">Saiba Mais</a>
					</div>
					<div class="col-md-3">
						<h4>Onde Estamos</h4>
						<p>Rua Mário Amaral, 319  Paraíso - São Paulo-SP</p>
						<p>Telefone: (11) 3885-3937 / (11) 3885-4194</p>
						<p>Email: contato@flaviafairbanks.com.br</p>
					</div>
					<div class="col-md-3">
						<h4>Links</h4>
						<ul>
							<li><a href="<?php echo site_url('home') ?>">Home</a></li>
							<li><a href="<?php echo site_url('quem-somos') ?>">A Clínica</a></li>
							<li><a href="<?php echo site_url('ginecologia'); ?>">Ginecologia</a></li>
							<li><a href="<?php echo site_url('sexualidade') ?>">Sexualidade</a></li>
							<li><a href="<?php echo site_url('obstetricia') ?>">Obstetrícia</a></li>
							<li><a href="<?php echo site_url('contato'); ?>">Contato</a></li>
						</ul>
					</div>
					<div class="col-md-2">
						<h4>Siga - Nos</h4>
						<ul class="social-media-footer">
							<li><a href="https://www.facebook.com/clinicafemcare/?fref=ts" target="_blank"><i class="fa fa-facebook-official"></i></a></li>
							<li><a href="https://www.youtube.com/user/drafairbanks" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
							<li><a href="https://www.instagram.com/clinica_femcare/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<a href="#top" class="to-top" id="to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

		<!--build:js(app/) assets/js/scripts.min.js-->
		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/vendor/facebook_stuff.js"></script>
		<script src="assets/js/vendor/jquery.dotdotdot.min.js"></script>
		<script src="assets/js/vendor/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="assets/js/vendor/TimelineMax.min.js"></script>
		<script src="assets/js/vendor/TweenMax.min.js"></script>
		<script src="assets/js/vendor/jquery.superscrollorama.js"></script>
		<!--endbuild-->
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>	
	</body>
</html>
