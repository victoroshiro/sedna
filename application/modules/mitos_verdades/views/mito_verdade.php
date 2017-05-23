<section class="main-template">
	<div class="main-template__bg-image">
		<h3>Mitos e Verdades</h3>
		<img src="<?php echo site_url('assets/images/banners/banner_in.png'); ?>" alt="Mitos e Verdades"/>
	</div>
</section>
<section class="content-page noticias detalhe">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="item-noticia">
					<img src="<?php echo site_url('userfiles/mitos_verdades/'.$mito_verdade->imagem); ?>">
					<h4><?php echo $mito_verdade->titulo; ?></h4>
					<?php echo $mito_verdade->descricao; ?>
				</div>
			</div>
			<div class="col-md-4 outras-noticias">
				<?php
					if($all_myths){
				?>
						<h4>Outros Mitos e Verdades</h4>
				<?php
						foreach ($all_myths as $item) {
				?>
							<div class="item-noticia">
								<a href="<?php echo site_url('mitos-verdades/detalhe/'.$item->slug); ?>">
									<img src="<?php echo site_url('userfiles/mitos_verdades/'.$item->imagem); ?>">
									<div class="text">
										<p><?php echo $item->titulo; ?></p>
										<div class="data"><?php echo $item->data_mv_f; ?></div>
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