<!-- Main -->
	<main class="main" role="main">

		<?php if (!empty($banners)): ?>
			<div id="lightSliderMainBanner" class="hero">
					<article>				
						<div class="video-wrapper">
							<iframe
								autoplay="true"
								class=""
								
								src="https://www.youtube.com/embed/8zHdLF3-coA?ecver=1&autoplay=1&showinfo=0&controls=0"
								frameborder="0"
								allowfullscreen>
							</iframe>
						</div>
					</article>
				<?php foreach ($banners as $key => $item): ?>
					<article>
						<img src="<?php site_url('userfiles/banners/'.$item->imagem); ?>" alt="">
						<div class="text-wrapper">
							<h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
							<a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
								<?php echo $item->resumo; ?>
							</a>
						</div> -->
					</article>
				<?php endforeach ?>	
			</div>
		<?php endif ?>
		
		<!-- Tab navigation -->
			<nav class="tabs four" role="navigation">
				<ul class="wrap">
					<li>
						<a href="contact.html" title="Tell us what you need. We will do the rest.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico1.png" alt="">
							</div>
							Tell us what you need. <br />We will do the rest.
						</a>
					</li>
					<li>
						<a href="charters.html" title="Check our Early Season Mediterranean Deals.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico2.png" alt="">
							</div>
							Check our Early Season Mediterranean Deals.
						</a>
					</li>
					<li>
						<a href="services.html" title="New to Sailing? We‘ve got you covered.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico3.png" alt="">
							</div>
							New to Sailing?<br />We‘ve got you covered.
						</a>
					</li>
					<li>
						<a href="#lightSliderPosts" class="anchor" title="Win a Sailing Holiday in Mediterranean!">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico4.png" alt="">
							</div>
							Win a Sailing Holiday in Mediterranean!
						</a>
					</li>
				</ul>
			</nav>
		<!-- //Tab navigation -->

		<section class="cta grey">
			<div class="wrap center">
				<div class="full-width text-center">
					<h2>Cimitarra</h2>
				</div>
			</div>
			<div class="wrap">
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
			</div>
			<div class="wrap center">
				<div class="full-width text-center">
					<h2>Cimitarra Yachts</h2>
				</div>
			</div>
			<div class="wrap">
				<div class="one-fourth">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-fourth">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-fourth">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-fourth">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
			</div>
		</section>
		
		<!-- Photo -->
		<section class="photo">
			<div class="wrap center">
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonmy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud.</p>
				<a href="#" title="Find out more" class="button white medium">Sobre a Cimitarra Yachts</a>
			</div>
		</section>
		<!-- //Photo -->
		
		<!-- Yachts -->
		<div class="wrap center">
			<div class="full-width text-center">
				<h2>Seminovos Cimitarra</h2>
			</div>
		</div>
		<div class="results">
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Saiba Mais" class="button small gold">Saiba Mais</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Saiba Mais" class="button small gold">Saiba Mais</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Saiba Mais" class="button small gold">Saiba Mais</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Saiba Mais" class="button small gold">Saiba Mais</a>
				</figcaption>
			</figure>
			<!-- //Item -->
		</div>
		<!-- //Yachts -->

		<div class="wrap center">
			<div class="full-width text-center">
				<a href="" class="button white medium">Ver mais seminovos</a>
			</div>
		</div>

		<section class="news">
			<div class="wrap center">
				<div class="full-width text-center">
					<h2>Notícias</h2>
				</div>
			</div>
			<div class="wrap">
				<div class="one-third">
					<div class="news--block">
						<a href="#"><img src="http://www.placehold.it/410x280"></a>
						<h3>Título Lorem ipsum dolor</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam sapiente voluptatem, expedita vel obcaecati fugiat.</p>
						<div class="text-center">
							<a href="noticias" class="button grey small">Saiba mais</a>
						</div>
					</div>
				</div>
				<div class="one-third">
					<div class="news--block">
						<a href="#"><img src="http://www.placehold.it/410x280"></a>
						<h3>Título Lorem ipsum dolor</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo consequatur harum natus assumenda, odit iure.</p>
						<div class="text-center">
							<a href="noticias" class="button grey small">Saiba mais</a>
						</div>
					</div>
				</div>
				<div class="one-third">
					<div class="news--block">
						<a href="#"><img src="http://www.placehold.it/410x280"></a>
						<h3>Título Lorem ipsum dolor</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, soluta. Earum consequuntur itaque dolore sed?</p>
						<div class="text-center">
							<a href="noticias" class="button grey small">Saiba mais</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
	<!-- //Main -->