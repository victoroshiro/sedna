	<script async src="https://www.youtube.com/iframe_api"></script>
<!-- Main -->
	<main class="main" role="main">

		<?php if (!empty($banners)): ?>
			<div id="lightSliderMainBanner" class="hero">
				<?php foreach ($banners as $key => $item): ?>
					<?php if ($item->video_banner == 1): ?>
						<article>
							<div class="video-wrapper">
								<div id="fullscreen-video-<?php echo $item->video_id ?>"></div>
								<div class="text-wrapper">
									<h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
									<a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
										<?php echo $item->resumo; ?>
									</a>
								</div>
							</div>
						</article>
					<?php else: ?>
						<article>
							<img src="<?php echo site_url('userfiles/banners/'.$item->imagem); ?>" alt="">
							<div class="text-wrapper">
								<h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
								<a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
									<?php echo $item->resumo; ?>
								</a>
							</div>
						</article>
					<?php endif ?>
				<?php endforeach ?>	
			</div>
		<?php endif ?>

		<script>
			function onYouTubeIframeAPIReady() {

			<?php foreach ($banners as $key => $banner): ?>
				<?php if ($banner->video_banner == 1): ?>
					var player<?php echo $banner->video_id ?>;
				<?php endif ?>
			<?php endforeach ?>
		  
			  
			<?php foreach ($banners as $key => $banner): ?>
				<?php if ($banner->video_banner == 1): ?>
				  	player<?php echo $banner->video_id ?> = new YT.Player('fullscreen-video-<?php echo $banner->video_id ?>', {
				    videoId: '<?php echo $banner->video_id ?>', // YouTube Video ID
				    width: '100%',          // Player width (in px)
				    height: 650,            // Player height (in px)
				    playerVars: {
				      autoplay: 1,       // Auto-play the video on load
				      controls: 0,       // Show pause/play buttons in player
				      showinfo: 0,       // Hide the video title
				      modestbranding: 1, // Hide the Youtube Logo
				      loop: 1,           // Run the video in a loop
				      fs: 0,             // Hide the full screen button
				      cc_load_policy: 0, // Hide closed captions
				      iv_load_policy: 3, // Hide the Video Annotations
				      autohide: 0,       // Hide video controls when playing
				      rel: 0			 // Hide suggested videos at end
				    },
				    events: {
				      onReady: function() {
				        player<?php echo $banner->video_id ?>.mute()
				      }
				    }
				  });
			  <?php endif ?>
			  <?php endforeach ?>
			 }
		</script>
		
		<!-- Tab navigation -->
			<nav class="tabs four" role="navigation">
				<ul class="wrap">
					<li>
						<a href="contact.html" title="Tell us what you need. We will do the rest.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico1.png" alt="">
							</div>
							Embarcações novas e seminovas.
						</a>
					</li>
					<li>
						<a href="charters.html" title="Check our Early Season Mediterranean Deals.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico2.png" alt="">
							</div>
							Um dos maiores estaleiros do país.
						</a>
					</li>
					<li>
						<a href="services.html" title="New to Sailing? We‘ve got you covered.">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico3.png" alt="">
							</div>
							Barcos para quem gosta de sofisticação, conforto e segurança.
						</a>
					</li>
					<li>
						<a href="#lightSliderPosts" class="anchor" title="Win a Sailing Holiday in Mediterranean!">
							<div class="tabs--image-wrap">
								<img src="assets/images/ico4.png" alt="">
							</div>
                            Assistência técnica com garantia e qualidade.
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
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-third">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
				<div class="one-third one-third-center">
					<a href="#"><img src="http://www.placehold.it/410x280"></a>
				</div>
			</div>
		</section>
		
		<!-- Photo -->
		<section class="photo">
			<div class="wrap center">
				<h2>Assistência Técnica</h2>
                <p>Exclusivo serviço de assistência para embarcações. Equipe formada por profissionais
                experientes, treinados e qualificados.</p>
				<a href="empresa" title="Find out more" class="button white medium">Sobre a Cimitarra Yachts</a>
			</div>
		</section>
		<!-- //Photo -->
		
		<!-- Yachts -->
		<div class="wrap center margin-top-lg">
			<div class="full-width text-center">
				<h2>Seminovos Cimitarra</h2>
			</div>
		</div>
		<div class="results">
			<?php foreach ($seminovos as $key => $item): ?>
				<!-- Item -->
				<figure class="one-fourth item">
					<img src="assets/uploads/img.jpg" alt="" />
					<figcaption>
						<dl>
							<dt><?php echo $item->titulo; ?></dt>
						</dl>
						<a href="<?php echo site_url('seminovos/detalhe/'.$item->slug); ?>" title="Saiba Mais" class="button small gold">Saiba Mais</a>
					</figcaption>
				</figure>
				<!-- //Item -->
			<?php endforeach ?>
		</div>
		<!-- //Yachts -->

		<div class="wrap center">
			<div class="full-width text-center margin-top-md">
				<a href="" class="button grey medium">Ver mais seminovos</a>
			</div>
		</div>

		<section class="news">
			<div class="wrap center">
				<div class="full-width text-center">
					<h2>Notícias</h2>
				</div>
			</div>
			<div class="wrap">
				<?php foreach ($all_news as $key => $item): ?>
					<div class="one-third">
						<div class="news--block">
							<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>"><img src="http://www.placehold.it/410x280"></a>
							<h3><?php echo $item->titulo; ?></h3>
							<p><?php echo $item->resumo; ?></p>
							<div class="text-center">
								<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>" class="button grey small">Saiba mais</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</section>
	</main>
	<!-- //Main -->
