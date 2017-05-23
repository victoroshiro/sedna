<?php  
	if($banners){
?>
	<section class="home-slider text-center">
		<div class="slick-slider">
			<?php  
				foreach ($banners as $item) {
			?>	
				<a href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
					<div>
						<img src="<?php echo site_url('userfiles/banners/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>"/>
					</div>
				</a>
			<?php  
				}
			?>
		</div>
		<div class="slick-nav">
			<div class="slick-arrow prev"><i class="fa fa-angle-left"></i></div>
			<div class="slick-arrow next"><i class="fa fa-angle-right"></i></div>
		</div>
	</section>
<?php  
	}
?>
<section id="conheca">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 bg-white">
				<div class="col-md-10 col-md-offset-1 text-center">
					<img src="assets/images/home/florzinha.png"/>
					<h2>Conheça a FemCare</h2>
					<p>Clínica especializada na saúde da mulher. Proporcionamos um atendimento eficiente através de profissionais experientes, oferecendo toda estrutura que a paciente merece.</p>
					<p>Os cuidados com a saúde da mulher devem ser constantes e específicos. É muito importante realizar acompanhamento médico, principalmente ginecológico, anualmente. Realizar exames preventivos é a melhor forma de detectar precocemente possíveis doenças relacionadas à saúde da mulher e evitar futuros problemas.</p>
					<p class="button-saiba-mais"><a href="<?php echo site_url('quem-somos'); ?>" class="main-button button green">Saiba Mais</a></p>
				</div>
				<img src="assets/images/home/flor-quadro-dir.png" class="flor-quadro dir"/>
				<img src="assets/images/home/flor-quadro-esq.png" class="flor-quadro esq"/>
			</div>
		</div>
	</div>
</section>
<section id="imprensa">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="assets/images/home/florzinha.png">
				<h2>Sala de Imprensa</h2>
				<div class="col-md-12">
					<ul class="itens-imprensa">
						<li>
							<a href="<?php echo site_url('imprensa/televisao'); ?>">
								<div class="teste">
									<div class="icone-imprensa">
										<i class="fa fa-television"></i>
									</div>
									<p>Televisão</p>
								</div>							
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('imprensa/radio'); ?>">
								<div class="icone-imprensa">
									<i class="fa fa-volume-up"></i>
								</div>
								<p>Rádio</p>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('imprensa/jornais-e-revistas'); ?>">
								<div class="icone-imprensa">
									<i class="fa fa-newspaper-o"></i>
								</div>
								<p>Jornais e Revistas</p>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('imprensa/internet'); ?>">
								<div class="icone-imprensa">
									<i class="fa fa-globe"></i>
								</div>
								<p>Internet</p>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('imprensa/release'); ?>">
								<div class="icone-imprensa">
									<i class="fa fa-file-text-o"></i>
								</div>
								<p>Release</p>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('imprensa/videos'); ?>">
								<div class="icone-imprensa">
									<i class="fa fa-play-circle-o"></i>
								</div>
								<p>Vídeos</p>
							</a>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section id="doutora-destaque">
	<div class="col-md-6 conteudo doutora">
		<div class="photo">
			<img src="assets/images/home/flavia-imprensa.png">
		</div>
		<div class="text">
			<h3>Dra. Flávia Fairbanks</h3>
			<p>Dra. Flávia Fairbanks-Formada pela Faculdade de Medicina da USP em 1998;-Residência Médica em Ginecologia e Obstetrícia no Hospital das Clínicas da FMUSP de 1999</p>
			<a href="<?php echo site_url('dra-fairbanks'); ?>" class="main-button button">Saiba Mais</a>
		</div>
	</div>
	<div class="col-md-6 conteudo destaque">
		<div class="text">
			<h3>Mitos e Verdades</h3>
			<p>Confira os principais mitos e verdades sobre a saúde feminina.</p>
			<a href="<?php echo site_url('mitos-verdades') ?>" class="main-button button">Saiba Mais</a>
		</div>
	</div>
</section>


<section id="noticias">
	<div class="container">
		<div class="row">
			<div class="col-md-12 titulo">
				<img src="assets/images/home/florzinha.png"/>
				<h2>Notícias</h2>
			</div>
			<div class="col-md-12">
				<?php
					if($all_news){
						foreach ($all_news as $key => $item) {
							if($key == 0){
				?>
								<div class="col-md-4 noticia em-pe">
									<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">
										<div class="bloco">
											<img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>">
											<div class="texto">
												<h4><?php echo $item->titulo; ?></h4>
												<p><?php echo $item->resumo; ?></p>
												<span><?php echo $item->data_noticia_f ?></span>
											</div>
										</div>										
									</a>
								</div>
				<?php
							}else if ($key == 1){
				?>
								<div class="col-md-8 noticia">
									<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">
										<div class="bloco">
											<img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>">
											<div class="texto">
												<h4><?php echo $item->titulo; ?></h4>
												<p><?php echo $item->resumo; ?></p>
												<span><?php echo $item->data_noticia_f ?></span>
											</div>
										</div>
									</a>
								</div>
				<?php
							}else if ($key  == 2){
				?>
								<div class="col-md-8 noticia invertida">
									<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">
										<div class="bloco">
											<img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>">
											<div class="texto">
												<h4><?php echo $item->titulo; ?></h4>
												<p><?php echo $item->resumo; ?></p>
												<span><?php echo $item->data_noticia_f ?></span>
											</div>
										</div>
									</a>
								</div>
				<?php
							}
						}
					}
				?>
			</div>
		</div>
		<div class="row button-more">
			<a href="<?php echo site_url('noticias'); ?>" class="main-button button green">Mais Notícias</a>
		</div>
	</div>
</section>
<section id="fale-mapa">
	<div class="col-md-6 conteudo fale">
		<div class="text">
			<h3>Newsletter</h3>
			<form action="<?php echo site_url('contato/newsletter'); ?>" method="POST">
				<input type="text" name="email" id="email" placeholder="E-mail" />
				<input type="submit" name="submit" id="form-contato-newsletter" class="main-button button" value="Enviar"/>
			</form>
			<div class="msg"></div>
		</div>
	</div>
	<div class="col-md-6 conteudo mapa map" id="map"></div>
</section>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAFEqzwGpSdxi5mDvpqh5lda6K8Xedq4DI&sensor=false"></script>
<script type="text/javascript">
	(function($) {
	    "use strict";
	    var locations = [
	        ['<div class="infobox"><h4 class="title">FemCare</h4><p><span>Rua Mário Amaral, 319 | Paraíso - São Paulo-SP</span><br>(11) 3885-3937 / (11) 3885-4194</p></div></div></div>', -23.5731996, -46.6507991, 2]
	    ];

	    var map = new google.maps.Map(document.getElementById('map'), {
	        zoom: 15,
	        scrollwheel: false,
	        navigationControl: true,
	        mapTypeControl: false,
	        scaleControl: false,
	        draggable: true,
	        center: new google.maps.LatLng(-23.5731996, -46.6507991),
	        mapTypeId: google.maps.MapTypeId.ROADMAP
	    });

	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;

	    for (i = 0; i < locations.length; i++) {  

	        marker = new google.maps.Marker({ 
	            position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
	            map: map ,
	            icon: 'assets/images/icons/marker-green.png'
	        });


	        google.maps.event.addListener(marker, 'click', (function(marker, i) {
	            return function() {
	                infowindow.setContent(locations[i][0]);
	                infowindow.open(map, marker);
	            }
	        })(marker, i));
	    }
	})(jQuery);
</script>