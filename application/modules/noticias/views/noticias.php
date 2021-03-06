<!-- Main -->
<main class="main blog" role="main">
        <!-- Intro -->
        <header class="intro">
                <div class="wrap">
                        <h1>Notícias</h1>
                </div>
        </header>
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
								<h3><a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>"><?php echo $item->titulo; ?></a></h3>
								<div class="meta">
									<span><?php echo $item->data_noticia_f; ?></span>   
								</div>
								<p><?php echo ellipsize($item->resumo, 170); ?></p>
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

				<div class="fb-page" data-href="https://www.facebook.com/pg/SednaYachts.br/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/SednaYachts.br/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/SednaYachts.br/">Facebook</a></blockquote></div>
			</div>
		</aside>
		<!-- //OneFourth -->
	</div>
</main>
