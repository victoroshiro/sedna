


<!-- Main -->
	<main class="main" role="main">
		<!-- Content -->
		<div class="content static">
			<!-- Wrapper -->
			<div class="wrap">
				<div class="row">
					<!-- ThreeFourth -->
					<div class="three-fourth hentry">
						<!-- Post Image -->
						<div class="entry-featured">
							<img src="<?php echo site_url('userfiles/noticias/'.$noticia->imagem); ?>" alt="<?php echo $noticia->titulo; ?>" />
						</div>
						<!-- //Post Image -->
						
						<!-- Post Content -->
						<div class="entry-content">
							<div class="box-white">
								<h2><?php echo $noticia->titulo; ?></h2>
								<div class="wysiwyg-content">
									<?php echo $noticia->descricao; ?>
								</div>
							</div>
						</div>
						<!-- //Post Content -->
					</div>
					<!-- //ThreeFourth -->
				
					<!-- OneFourth -->
					<aside class="one-fourth sidebar sidebar-right">						
						<div class="widget">
							<?php if (!empty($all_news)): ?>
								<h3>Latest posts</h3>

								<?php foreach ($all_news as $key => $item): ?>
									<ul class="latest-posts">
										<li>
											<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">
												<img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" width="90" />
												<h4><?php echo $item->titulo; ?></h4>
												<span class="date"><?php echo $item->data_noticia_f; ?></span>
											</a>
										</li>
									</ul>		
								<?php endforeach ?>
							<?php endif ?>
						</div>
						
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

							<div class="fb-page" data-href="https://www.facebook.com/cimitarrayachts/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cimitarrayachts/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cimitarrayachts/">Facebook</a></blockquote></div>
						</div>
					</aside>
					<!-- //OneFourth -->
				</div>
			</div>
			<!-- //Wrapper -->
		</div>
		<!-- //Content-->
	</main>
	<!-- //Main -->