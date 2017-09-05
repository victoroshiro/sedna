	<!-- Main -->
	<main class="main" role="main">
		<div id="lightSliderMainBanner">
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
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $embarcacao->link; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
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
						if($imagens_interior){
					?>
							<li>
								<a href="#tab-interior" title="Interior">
									Interior
								</a>
							</li>
					<?php  
						}
						if($imagens_exterior){

					?>
							<li>
								<a href="#tab-exterior" title="Exterior">
								 Exterior
								</a>
							</li>
					<?php  
						}
					?>
				</ul>
			</nav>
			<!-- //Tab navigation -->

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
		</div>

		<!-- Content -->
		<div class="content">
			<!-- Tab navigation -->
			<nav class="tabs alternative six" role="navigation" id="tab-navigation">
				<ul class="wrap">
					<li><a href="#tab1" title="Description">
						<span class="icojam_info_3"></span> Descrição
					</a></li>
					<li><a href="#tab2" title="Specifications">
						<span class="icojam_document"></span> SOBRE a <?php echo $embarcacao->titulo; ?>
					</a></li>
					<li><a href="#tab3" title="Equipment">
						<span class="icojam_anchor"></span> ITENS DE SERIE
					</a></li>
				</ul>
			</nav>
			<!-- //Tab navigation -->
			
			<!-- Wrapper -->
			<div class="wrap">
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
				
				<!-- Tab Content-->
				<article class="tab-content" id="tab3">
					<div class="row">
						<!-- FullWidth -->
						<div class="one-half">
							<h3>Deck equipment</h3>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="one-half">
							<h3>Safety equipment</h3>
							<ul>
								<li>Dinghy</li>
								<li>Emergency tiller</li>
								<li>Life raft</li>
								<li>Floating Light</li>
								<li>Life jackets</li>
								<li>Spinnaker pole</li>
								<li>Torch</li>
								<li>Box of flaress</li>
								<li>Safety harnesses</li>
								<li>Winches MAIN SHEET X2</li>
								<li>Winches GENOA SHEET X2</li>
								<li>First aid kit</li>
							</ul>
						</div>
						<!-- //FullWidth -->
					</div>
				</article>
				<!-- //Tab Content-->
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
						<p>
							Please complete the information below and we will respond to your inquiry as soon as possible. Your information will not be used for any other purposes. All fields are required.
						</p>
						
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
										<label for="comments">Your message</label>
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
