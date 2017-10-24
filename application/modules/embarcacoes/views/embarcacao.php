	<!-- Main -->
	<main class="main" role="main">
		<div class="lightSliderMainBanner">
			<article>
				<img src="<?php echo site_url('userfiles/embarcacoes/'.$embarcacao->imagem3) ?>" alt="Cimitarra Yachts">
			</article>
		</div>
		<header class="intro">
			<div class="wrap">
                <nav class="mini-nav">
                    <?php  
                        if(!is_null($embarcacao->link) && $embarcacao->link != ''){
                    ?>
                        <a href="#content-video">Video</a>   
                    <?php  
                        }
                    ?>
                    <a href="#content-gallery">Galeria de fotos</a>    
                    <a href="#tab-navigation">Especificações</a>
                    <a href="#content-vista">Vista Superior</a>
                    <a href="#content-mensagem">Mensagem</a>
                </nav>

				<?php echo $embarcacao->resumo; ?>
				<?php  
					if(!is_null($embarcacao->link) && $embarcacao->link != ''){
				?>
                    <div id="content-video">
                        <iframe width="560" height="530" src="https://www.youtube.com/embed/<?php echo $embarcacao->link; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                    </div>
				<?php  
					}
				?>
			</div>
		</header>

		<!-- Gallery -->

		<!-- Content -->
		<div class="content">
			<!-- Tab navigation -->
            <div id="content-gallery"></div>
			<nav class="tabs alternative tabs__no-margin-bottom six" role="navigation" id="tab-navigation-2">
				<ul class="wrap">
					<?php  
						if($imagens_exterior){
					?>
							<li>
								<a href="#tab-exterior" title="Exterior">
									Exterior
								</a>
							</li>
					<?php  
						}
						if($imagens_interior){

					?>
							<li>
								<a href="#tab-interior" title="Interior">
								 Interior
								</a>
							</li>
					<?php  
						}
					?>
				</ul>
			</nav>
			<!-- //Tab navigation -->


			<article class="tab-content" id="tab-exterior">
				<div class="gallery" id="gallery-2">
					<?php  
						if($imagens_exterior){
							foreach ($imagens_exterior as $imagem) {
								$file_parts = explode('.', $imagem->imagem);
                                $thumb_name = $file_parts[0].'_thumb.'.$file_parts[1];
					?>
								<!-- Item -->
								<figure class="one-fourth" data-src="<?php echo site_url('userfiles/embarcacoes/'.$imagem->imagem); ?>">
									<!-- <img src="http://www.placehold.it/600x400" alt="" /> -->
									<img src="<?php echo site_url('userfiles/embarcacoes/'.$thumb_name); ?>" alt="" />
									<figcaption>
										<span class="icojam_zoom_in"></span>
										<!-- <div>
											<h5>DECK</h5>
											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
										</div> -->
									</figcaption>	
								</figure>
								<!-- //Item -->
					<?php  
							}
						}
					?>
				</div>				
			</article>
 			<article class="tab-content" id="tab-interior">
 				<div class="gallery" id="gallery">
 					<?php  
 						if($imagens_interior){
 							foreach ($imagens_interior as $imagem) {
 								$file_parts = explode('.', $imagem->imagem);
                                 $thumb_name = $file_parts[0].'_thumb.'.$file_parts[1];
 					?>
 								<!-- Item -->
 								<figure class="one-fourth" data-src="<?php echo site_url('userfiles/embarcacoes/'.$imagem->imagem); ?>">
 									<!-- <img src="http://www.placehold.it/600x400" alt="" /> -->
 									<img src="<?php echo site_url('userfiles/embarcacoes/'.$thumb_name); ?>" alt="" />
 									<figcaption>
 										<span class="icojam_zoom_in"></span>
 										<!-- <div>
 											<h5>DECK</h5>
 											<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
 										</div> -->
 									</figcaption>	
 								</figure>
 								<!-- //Item -->
 					<?php  
 							}
 						}
 					?>
 				</div>				
 			</article>

		</div>


                <?php if (!empty($imagens_panorama)): ?>
                        
                <div class="intro">
                    <div class="wrap">
                        <div class="content">
                            <h1>Tour 360</h1>
                            <?php foreach ($imagens_panorama as $key => $imagem_panorama): ?>
                                <div id="panorama-<?php echo $key ?>"></div>
                            <?php endforeach ?>

                            <script>
                            <?php foreach ($imagens_panorama as $key => $imagem_panorama): ?>
                                pannellum.viewer('panorama-<?php echo $key ?>', {
                                "type": "equirectangular",
                                    "panorama": "userfiles/embarcacoes/<?php echo $imagem_panorama->imagem ?>",
                                    autoLoad: true,
                                    mouseZoom: false
                            });
                            <?php endforeach ?>
                            </script>
                        </div>
                    </div>
                </div>
                
                <?php endif ?>
		<!-- Content -->
		<div class="content">
			<!-- Tab navigation -->
			<nav class="tabs alternative six" role="navigation" id="tab-navigation">
				<ul class="wrap">
					<?php  
						if($embarcacao_descricao){
					?>
							<li>
								<a href="#tab1" title="Description">
									<span class="icojam_info_3"></span> Descrição
								</a>
							</li>
					<?php  
						}
						if($embarcacao_especificacoes){
					?>
							<li>
								<a href="#tab2" title="Specifications">
									<span class="icojam_document"></span> SOBRE a <?php echo $embarcacao->titulo; ?>
								</a>
							</li>
					<?php  
						}
						if($embarcacao_serie){
					?>
							<li>
								<a href="#tab3" title="Equipment">
									<span class="icojam_anchor"></span> ITENS DE SERIE
								</a>
							</li>
					<?php  
						}
					?>
				</ul>
			</nav>
			<!-- //Tab navigation -->
			
			<!-- Wrapper -->
			<div class="wrap">
				<?php  
					if($embarcacao_descricao){
				?>
						<!-- Tab Content-->
						<article class="tab-content" id="tab1">
							<div class="row">
								<!-- OneHalf -->
								<div class="one-half">
									<h2><?php echo $embarcacao_descricao->titulo; ?></h2>
									<?php echo $embarcacao_descricao->descricao; ?>
								</div>
								<!-- //OneHalf -->
								
								<!-- OneHalf -->
								<div class="one-half">
									<img src="<?php echo site_url('userfiles/embarcacoes/'.$embarcacao_descricao->imagem); ?>" alt="<?php echo $embarcacao_descricao->titulo; ?>" />
								</div>
								<!-- //OneHalf -->
							</div>
						</article>
						<!-- //Tab Content-->
				<?php  
					}
					if($embarcacao_especificacoes){
				?>
						<!-- Tab Content-->
						<article class="tab-content" id="tab2">
							<div class="row">
								<!-- OneHalf -->
								<div class="one-half one-half-center">
									<h2><?php echo $embarcacao->titulo; ?></h2>
									<?php echo $embarcacao_especificacoes->descricao; ?>
								</div>
								<!-- //OneHalf -->						
							</div>
						</article>
						<!-- //Tab Content-->
				<?php  
					}
					if($embarcacao_serie){
				?>
				
						<!-- Tab Content-->
						<article class="tab-content" id="tab3">
							<div class="row">
								<!-- FullWidth -->
								<?php  
									if($embarcacao_serie){
										if(!is_null($embarcacao_serie->descricao_um) && $embarcacao_serie->descricao_um != ''){
								?>
											<div class="one-half">
												<?php echo $embarcacao_serie->descricao_um; ?>
					                        </div>
		                        <?php  
		                        		}
										if(!is_null($embarcacao_serie->descricao_dois) && $embarcacao_serie->descricao_dois != ''){
		                        ?>
					                        <div class="one-half">
												<?php echo $embarcacao_serie->descricao_dois; ?>
											</div>
								<?php
										}
									}
								?>
								<!-- //FullWidth -->
							</div>
						</article>
						<!-- //Tab Content-->
				<?php  
					}
				?>
			</div>
			<!-- //Wrapper -->
		</div>
		<!-- //Content-->
		
		<?php  
			if($embarcacao_descricao && $embarcacao_descricao->imagem2 != '' && !is_null($embarcacao_descricao->imagem2)){
		?>
		        <!-- Photo -->
		        <section class="photo" style="background-image: url('<?php echo site_url('userfiles/embarcacoes/'.$embarcacao_descricao->imagem2); ?>'); height: 415px;">
		        </section>
		        <!-- //Photo -->
		<?php  
			}
		?>

		<div class="wrap" id="content-mensagem">
			<div class="full-width">
				<div class="clearfix">
					<div class="text">
						<h4>Fale com a Cimitarra Yachts:</h4>
						<!-- <p>
							Please complete the information below and we will respond to your inquiry as soon as possible. Your information will not be used for any other purposes. All fields are required.
						</p> -->
						
						<form method="post" action="contact_form_message.php" name="contactform" id="contactform">
							<fieldset>
								<div id="message"></div>
								
								<div class="one-half">
									<div class="padding-h-md">
										<label for="name">Nome</label>
										<input type="text" id="name"/>
									</div>
								</div>

								<div class="one-half">
									<div class="padding-h-md">
										<label for="surname">Sobrenome</label>
										<input type="text" id="surname"/>
									</div>
								</div>

								<div class="one-half">
									<div class="padding-h-md">
										<label for="phone">Telefone</label>
										<input type="text" id="phone"/>
									</div>
								</div>

								<div class="one-half">
									<div class="padding-h-md">
										<label for="email">Email</label>
										<input type="email" id="email"/>
									</div>
								</div>
								
								<div class="full-width">
									<div class="padding-h-md">
										<label for="comments">Mensagem</label>
										<textarea id="comments"></textarea>
									</div>
								</div>
								
								<div class="full-width">
									<div class="padding-h-md">
										<input type="submit" value="Enviar Mensagem" class="button gold large" id="submit" />
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
