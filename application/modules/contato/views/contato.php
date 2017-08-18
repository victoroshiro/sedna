<section class="main-template">
	<div class="main-template__bg-image">
		<h3>Contato</h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="Contato"/>
	</div>
</section>
<section class="content-page contato">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="assets/images/home/florzinha.png" class="little-flower"/>
				<h3 class="titulo-principal">Fale com a Cimitarra</h3>
				
				<div class="col-md-10 col-md-offset-1 form-contato">
					<form action="<?php echo site_url('contato/send'); ?>" method="POST">
						<div class="form-group col-md-6">
							<input type="text" name="name" placeholder="Nome*" class="form-control"/>
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="phone" placeholder="Telefone" class="form-control"/>
						</div>
						<div class="form-group col-md-6">
							<input type="email" name="email" placeholder="E-mail*" class="form-control"/>
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="subject" placeholder="Assunto" class="form-control"/>
						</div>
						<div class="form-group col-md-12">
							<textarea name="message" placeholder="Mensagem*" class="form-control" row="50"></textarea>
						</div>
						<div class="col-md-6 solreq">
							<div class="squaredOne">
								<input type="radio" id="opt_in" name="opt_in" />
								<label for="opt_in"></label>
							</div>
							<div class="label-checkbox">Desejo receber os informativos da FemCare</div>
						</div>
						<div class="form-group col-md-12 send-button">
							<input type="submit" class="main-button button green" id="form-contato-submit" value="Enviar"/>
						</div>
					</form>					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="content-page contato mapa">
	<div class="container">
		<div class="row">
			<div class="col-md-10 endereco">
				<div class="col-md-3">
					<div class="title">Endereço</div>
					<div class="text">
						<i class="fa fa-map-marker"></i>
						<p>Rua Mário Amaral, 319</p>
						<p>Paraíso | São Paulo-SP</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title">Telefone</div>
					<div class="text">
						<i class="fa fa-phone"></i>
						<p>(11) 3885-3937</p>
						<p>(11) 3885-4194</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="title">Email</div>
					<div class="text">
						<i class="fa fa-envelope"></i>
						<p>contato@cimitarra.com.br</p>
					</div>
				</div>
			</div>			
		</div>
	</div>
	<div class="col-md-12 map-wrapper">
		<div class="map" id="map"></div>
	</div>
</section>
<section class="content-page contato newsletter">
	<div class="container">
		<div class="row">
			<div class="col-md-6 disclaimer">
				<h3>Newsletter</h3>
				<p>Cadastre seu email e receba nossos informativos</p>
			</div>
			<div class="col-md-6 form-newsletter">
				<form action="<?php echo site_url('contato/newsletter'); ?>" method="POST">
					<input type="text" name="email" id="email" placeholder="E-mail" />
					<input type="submit" name="submit" id="form-contato-newsletter" class="main-button button" value="Enviar"/>
				</form>
				<div class="msg"></div>
			</div>
		</div>
	</div>
</section>
	
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