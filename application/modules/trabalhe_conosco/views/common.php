<section class="main-template">
		<div class="main-template__bg-image">
			<img src="<?php echo site_url('userfiles/links/'.$trabalhe_conosco->imagem); ?>" alt="<?php echo $trabalhe_conosco->titulo; ?>"/>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="main-template__text-bg">
						<div class="main-template__text">
							<h2><?php echo $trabalhe_conosco->titulo; ?></h2>
							<div class="main-template__description">
								<?php echo $trabalhe_conosco->descricao; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
