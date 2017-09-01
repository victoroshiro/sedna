<section class="main-template">
	<div class="main-template__bg-image">
		<h3><?php echo $landing_page->titulo; ?></h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="<?php echo $landing_page->titulo; ?>"/>
	</div>
</section>
<section class="content-page noticias detalhe landing-page">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="item-noticia">
					<h4><?php echo $landing_page->titulo; ?></h4>
					<div class="noticia-descricao"><?php echo $landing_page->descricao; ?></div>
				</div>
				<div class="links-cloud">
					<?php
						foreach ($landing_pages as $key => $lp_links){ 
					?>
							<a class="main-button button green" href="<?= $lp_links->slug ?>"><?= $lp_links->titulo ?></a>
					<?php 
						} 
					?>
				</div>
			</div>
			<div class="col-md-4 outras-noticias">
				<h4>Outros Links</h4>
				<?php 
				    foreach ($landing_page_links as $key => $landing_page_link){
				?>
						<div class="item-noticia">
							<a href="<?= $landing_page_link->link ?>" <?= $landing_page_link->target_blank == 1 ? 'target="_blank"' : '' ?>>
								<div class="text">
									<p><?= $landing_page_link->titulo ?></p>
								</div>
							</a>
						</div>
				<?php  
				    }
				    foreach ($landing_pages as $key => $item_landing_page){
				        if($item_landing_page->menu_lateral == 1){
				?>
							<div class="item-noticia">
								<a href="<?= $item_landing_page->slug ?>">
									<div class="text">
										<p><?= $item_landing_page->titulo ?></p>
									</div>
								</a>
							</div>
				<?php
				        }
				    }
				?>
			</div>
		</div>
	</div>
</section>