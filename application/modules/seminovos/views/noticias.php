<!-- Main -->
<main class="main blog" role="main">
	<div class="content static">
		<!-- ThreeFourth -->
		<div class="three-fourth">
			<div class="row">
				<!-- Item -->
				<?php foreach ($noticias as $key => $item): ?>
					
					<article class="one-half hentry">
						<figure><a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>"><img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" /></a></figure>
						<div>
							<div class="text">
								<h3><a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">Taiwan Boat Show 2014 a Resounding Successful event not to miss</a></h3>
								<div class="meta">
									<span>May 23rd, 2016</span>   
								</div>
								<p><?php echo $item->titulo; ?></p>
								<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>" class="more" title="Read more">Saiba Mais</a>
							</div>
						</div>
					</article>
				<?php endforeach ?>
				<!-- //Item -->
							
				<div class="pager2 full-width">
					<?php echo $links ?>
				</div>
			</div>
		</div>
		<!-- //ThreeFourth -->

		<!-- OneFourth -->
		<aside class="one-fourth sidebar sidebar-right">	
			<div class="widget">
				<h3>Curta nossa Fanpage</h3>
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>

				<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
			</div>
		</aside>
		<!-- //OneFourth -->
	</div>
</main>