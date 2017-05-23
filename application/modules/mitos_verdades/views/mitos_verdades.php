<section class="main-template">
	<div class="main-template__bg-image">
		<h3>Mitos e Verdades</h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="Mitos e Verdades"/>
	</div>
</section>
<section class="content-page noticias">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
					if($mitos_verdades){
						foreach ($mitos_verdades as $item) {
				?>
							<div class="col-md-4 item-noticia">
								<a href="<?php echo site_url('mitos-verdades/detalhe/'.$item->slug); ?>">
									<img src="<?php echo site_url('userfiles/mitos_verdades/'.$item->imagem); ?>">
									<h4><?php echo $item->titulo; ?></h4>
									<p class="resumo"><?php echo $item->resumo; ?></p>									
								</a>
							</div>
				<?php
						}
					}
				?>
			</div>
			<div class="col-md-12 pagination-wrapper">
				<?php echo $links ?>
			</div>
		</div>
	</div>
</section>