<section class="main-template">
	<div class="main-template__bg-image">
		<h3>Ginecologia</h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="Ginecologia"/>
	</div>
</section>
<section class="content-page noticias endometriose">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-push-4">
				<div class="item-noticia">
					<h4><?php echo $ginecologia->titulo; ?></h4>
					<div class="descricao">
						<img src="<?php echo site_url('userfiles/ginecologia/'.$ginecologia->imagem); ?>">
						<?php echo $ginecologia->descricao; ?>
					</div>							
				</div>
			</div>
			
			<div class="col-md-3 col-md-pull-8 outras-noticias endometriose">
				<div class="lista">
					<?php
						if($all_ginecologia){
					?>
					<?php
							foreach ($all_ginecologia as $item) {
					?>
								<div class="item-noticia">
									<a href="<?php echo site_url('ginecologia/'.$item->slug); ?>">
										<p><?php echo $item->titulo; ?></p>
									</a>
								</div>
					<?php
							}
						}
					?>
				</div>
				<section class="widget-alt recent-posts">
					<!-- <div class="widget-icon"></div> -->
					<div id="fb-root"></div>				
					<div class="fb-like-box" data-href="https://www.facebook.com/clinicafemcare/?fref=ts" data-height="300" data-width="300" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="true" data-show-border="true"></div>
				</section>
			</div>
			
		</div>
	</div>
</section>