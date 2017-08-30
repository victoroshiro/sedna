	<!-- Main -->
	<main class="main" role="main">
		<div id="lightSliderMainBanner" class="hero">
			<article>
				<img src="assets/images/empresa/main-empresa.jpg" alt="Cimitarra Yachts">
			</article>
		</div>
		
		<!-- Tab navigation -->
		<section class="white">
			<div class="wrap center">
				<h2>Bem-Vindo à Cimitarra Yachts</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorperut commodo consequat. </p>
			</div>
		</section>
		<!-- //Tab navigation -->

		<section class="photo" style="min-height: 480px">
		</section>

		<!-- Blog posts -->
		<section class="content boxed grid2">
			<ul id="lightSliderPosts">
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix">
							<img src="assets/images/empresa/estaleiro.jpg" alt="Estaleiro Cimitarra Yachts" />
						</figure>
						<div class="one-half heightfix">
							<div class="text">
								<h3>Estaleiro</h3>
								<p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors.</p>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
			</ul>
		</section>
		<!-- //Blog posts -->

		<section class="fullscreen-video">
			<script async src="https://www.youtube.com/iframe_api"></script>
			<div id="fullscreen-video-empresa"></div>
			<script>
				function onYouTubeIframeAPIReady() {
				
				var playerfullscreenVideoEmpresa

			  	playerfullscreenVideoEmpresa = new YT.Player('fullscreen-video-empresa', {
			    videoId: 'jLfmrNw8ygo', // YouTube Video ID
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
			        playerfullscreenVideoEmpresa.mute()
			      }
			    }
			  });
				 }
			</script>
			<!-- <iframe height="653" src="https://www.youtube.com/embed/" frameborder="0" allowfullscreen></iframe> -->
		</section>


		<section class="cta grey">
			<div class="wrap center">
				<h2>Cimitarra pelo Mundo</h2>
				<p>O Estaleiro Cimitarra exporta suas lanchas desde 2000, com seriedade e compromisso com as normas de exportação , seguindo rigorosamente todos os requisitos necessários das normas internacionais de navegação. A empresa já exportou para: Angola, Canadá, Noruega e Suécia.</p>
			</div>
		</section>

		<div class="wrap">
			<div class="one-third">
				<div class="news--block">
					<h3>Missão</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam sapiente voluptatem, expedita vel obcaecati fugiat.</p>
				</div>
			</div>
			<div class="one-third">
				<div class="news--block">
					<h3>Visão</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo consequatur harum natus assumenda, odit iure.</p>
				</div>
			</div>
			<div class="one-third">
				<div class="news--block">
					<h3>Valores</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, soluta. Earum consequuntur itaque dolore sed?</p>
				</div>
			</div>
		</div>

		<section class="photo" style="min-height: 570px">
		</section>
	</main>
	<!-- //Main -->