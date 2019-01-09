<!-- Main -->
<main class="main blog" role="main">
        <!-- Intro -->
        <header class="intro">
            <div class="wrap">
                <h1>Seminovos</h1>
            </div>
        </header>
        <!-- Content -->
	<div class="content static">
		<!-- ThreeFourth -->
		<div class="three-fourth">
			<div class="row">
                            <?php if(!empty($seminovos)): ?>
				<!-- Item -->
				<?php foreach ($seminovos as $key => $item): ?>
					<article class="one-half hentry">
						<figure><a href="<?php echo site_url('seminovos/detalhe/'.$item->slug); ?>"><img src="<?php echo site_url('userfiles/seminovos/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" /></a></figure>
						<div>
							<div class="text">
								<h3><a href="<?php echo site_url('seminovos/detalhe/'.$item->slug); ?>"><?php echo ellipsize($item->titulo, 58); ?></a></h3>
								<p><?php echo ellipsize($item->resumo, 90); ?>
                                    <br><br>
								<a href="<?php echo site_url('seminovos/detalhe/'.$item->slug); ?>" class="more" title="Read more">Saiba Mais</a>
                                </p>
							</div>
						</div>
					</article>
				<?php endforeach ?>
				<!-- //Item -->
							
                                <?php echo $links ?>
                            <?php else: ?>
                            <article class="hentry">
                                <div>
                                    <div class="text">
                                        <h3>Nenhum seminovo cadastrado</h3>
                                    </div>
                                </div>
                            </article>
                            <?php endif ?>
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
