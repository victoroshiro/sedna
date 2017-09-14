<!-- Main -->
	<main class="main" role="main">

        <div class="banner-container">
            <?php if (!empty($banners)): ?>
            <div id="lightSliderMainBanner" class="hero">
                <?php foreach ($banners as $key => $item): ?>
                <?php if ($item->video_banner == 1): ?>
                <article>
                    <div class="video-wrapper">
                        <div id="fullscreen-video-<?php echo $item->video_id ?>"></div>
                        <div class="text-wrapper">
                            <h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
                            <?php if (!empty($item->link)): ?> 
                            <a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
                                <?php echo $item->resumo; ?>
                            </a>
                            <?php endif ?>
                        </div>
                    </div>
                </article>
                <?php else: ?>
                <article>
                    <img src="<?php echo site_url('userfiles/banners/'.$item->imagem); ?>" alt="">
                    <div class="text-wrapper">
                        <h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
                        <?php if (!empty($item->link)): ?> 
                        <a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
                            <?php echo $item->resumo; ?>
                        </a>
                        <?php endif ?>
                    </div>
                </article>
                <?php endif ?>
                <?php endforeach ?>    
            </div>
            <?php endif ?>
                <div class="slick-nav">
                    <div class="slick-arrow prev"><i class="fa fa-angle-left"></i></div>
                    <div class="slick-arrow next"><i class="fa fa-angle-right"></i></div>
                </div>
        </div>
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
                                          playlist: '<?php echo $banner->video_id ?>',
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
                    

                    <section class="cta grey">
                            <div class="wrap center">
                                    <div class="text-center">
                                            <h2>Linha Cimitarra</h2>
                                    </div>
                            </div>
                            <div class="wrap">
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra/360/360-hard-top" class="zoom-image"><img src="assets/images/embarcacoes/home/360.jpg"></a>
                                    </div>
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra/400/400-fly" class="zoom-image"><img src="assets/images/embarcacoes/home/400.jpg"></a>
                                    </div>
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra/460/460-fly" class="zoom-image"><img src="assets/images/embarcacoes/home/460.jpg"></a>
                                    </div>
                            </div>
                            <div class="wrap center">
                                    <div class="text-center">
                                            <h2>Linha Cimitarra Yachts</h2>
                                    </div>
                            </div>
                            <div class="wrap">
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra-yachts/540/540-fly" class="zoom-image"><img src="assets/images/embarcacoes/home/540.jpg"></a>
                                    </div>
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra-yachts/600/600-fly" class="zoom-image"><img src="assets/images/embarcacoes/home/600.jpg"></a>
                                    </div>
                                    <div class="one-third">
                                            <a href="embarcacoes/detalhe/cimitarra-yachts/640/640-fly-bridge" class="zoom-image"><img src="assets/images/embarcacoes/home/640.jpg"></a>
                                    </div>
                                    <div class="one-third one-third-center">
                                            <a href="embarcacoes/detalhe/cimitarra-yachts/780/780" class="zoom-image"><img src="assets/images/embarcacoes/home/780.jpg"></a>
                                    </div>
                            </div>
                    </section>
                    
                    <!-- Photo -->
                <section class="photo" style="background-image: linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2)), url('assets/images/parallax/home.jpg');">
                            <div class="wrap center">
                                    <h2>Os melhores barcos você encontra aqui!</h2>
                                    <p>Embarcações de alta qualidade e desempenho. Referência nacional e internacional em barcos.</p>
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
                    <img src="<?php echo site_url('userfiles/seminovos/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" />
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
				<a href="seminovos" class="button grey medium">Ver mais seminovos</a>
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
                        <a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>"><img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>"></a>
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
