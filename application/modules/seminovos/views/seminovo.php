<!-- Main -->
	<main class="main" role="main">
        <!-- Intro -->
        <header class="intro">
            <div class="wrap">
                <h1>Seminovos</h1>
            </div>
        </header>
		<!-- Content -->
		<div class="content static">
			<!-- Wrapper -->
			<div class="wrap">
				<div class="row">
					<!-- ThreeFourth -->
					<div class="three-fourth hentry">
						<!-- Post Image -->
						<div class="entry-featured seminovo">
							<?php
							    if($imagens){
							?>
							    <div class="slider-area">
							        <div class="top-content">
						                    <div class="slider-big">
							            <?php
						                        foreach ($imagens as $item) {
							            ?>
						                            <div class="photo-carousel">
						                                <img src="<?php echo site_url('userfiles/seminovos/'.$item->imagem); ?>">
						                            </div>
							            <?php
						                        }
							            ?>
						                    </div>
							        </div>
							        <div class="slider-nav">
							            <?php
							                foreach ($imagens as $item) {
							                    $file_parts = explode('.', $item->imagem);
							                    $thumb_name = $file_parts[0].'_thumb.'.$file_parts[1];
							            ?>
							                    <div class="thumb"><img src="<?php echo site_url('userfiles/seminovos/'.$thumb_name); ?>"></div>
							            <?php
							                }
							            ?>
							        </div>
							    </div>
							<?php
							    }else{
							?>
									<img src="<?php echo site_url('userfiles/seminovos/'.$seminovo->imagem); ?>" alt="<?php echo $seminovo->titulo; ?>" />
							<?php
								}
							?>

						</div>
						<!-- //Post Image -->
						
						<!-- Post Content -->
						<div class="entry-content">
							<div class="box-white">
								<h2><?php echo $seminovo->titulo; ?></h2>
								<div class="wysiwyg-content">
									<div class="resumo-barco-aberto"><?php echo $seminovo->resumo; ?></div>
									<?php echo $seminovo->descricao; ?>
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
								<h3>VER MAIS BARCOS</h3>

								<?php foreach ($all_news as $key => $item): ?>
									<ul class="latest-posts">
										<li>
											<a href="<?php echo site_url('seminovos/detalhe/'.$item->slug); ?>">
												<img src="<?php echo site_url('userfiles/seminovos/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" width="90" />
												<h4><?php echo $item->titulo; ?></h4>
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

							<div class="fb-page" data-href="https://www.facebook.com/pg/SednaYachts.br/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/SednaYachts.br/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/SednaYachts.br/">Facebook</a></blockquote></div>
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