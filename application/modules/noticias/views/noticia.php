<section class="main-template">
	<div class="main-template__bg-image">
		<h3>Notícias</h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="Notícias"/>
	</div>
</section>
<section class="content-page noticias detalhe">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="item-noticia">
					<img src="<?php echo site_url('userfiles/noticias/'.$noticia->imagem); ?>">
					<h4><?php echo $noticia->titulo; ?></h4>
					<?php echo $noticia->descricao; ?>
				</div>
			</div>
			<div class="col-md-4 outras-noticias">
				<?php
					if($all_news){
				?>
						<h4>Outras Notícias</h4>
				<?php
						foreach ($all_news as $item) {
				?>
							<div class="item-noticia">
								<a href="<?php echo site_url('noticias/detalhe/'.$item->slug); ?>">
									<img src="<?php echo site_url('userfiles/noticias/'.$item->imagem); ?>">
									<div class="text">
										<p><?php echo $item->titulo; ?></p>
										<div class="data"><?php echo $item->data_noticia_f; ?></div>
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