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
                    <a href="#content-video">Video</a>   
                    <a href="#content-galeria">Galeria de fotos</a>    
                    <a href="#content-especificacoes">Especificações</a>
                    <a href="#content-vista">Vista Superior</a>
                    <a href="mensagem">mensagem</a>
                </nav>
				<?php echo $embarcacao->resumo; ?>
				<?php  
					if(!is_null($embarcacao->link) && $embarcacao->link != ''){
				?>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $embarcacao->link; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
				<?php  
					}
				?>
			</div>
		</header>

		<!-- Gallery -->

		<!-- Content -->
		<div class="content">
			<!-- Tab navigation -->
			<nav class="tabs alternative tabs__no-margin-bottom six" role="navigation" id="tab-navigation-2">
				<ul class="wrap">
					<?php  
						if($imagens_interior){
					?>
							<li>
								<a href="#tab-interior" title="Description">
									Interior
								</a>
							</li>
					<?php  
						}
						if($imagens_exterior){

					?>
							<li>
								<a href="#tab-exterior" title="Specifications">
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
					?><!-- 
					Item
					<figure class="one-fourth" data-src="http://www.placehold.it/800x600">
						<img src="http://www.placehold.it/600x400" alt="" />
						<figcaption>
							<span class="icojam_zoom_in"></span>
							<div>
								<h5>DECK</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
							</div>
						</figcaption>	
					</figure>
					//Item
					Item
					<figure class="one-fourth" data-src="http://www.placehold.it/800x600">
						<img src="http://www.placehold.it/600x400" alt="" />
						<figcaption>
							<span class="icojam_zoom_in"></span>
							<div>
								<h5>DECK</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
							</div>
						</figcaption>	
					</figure>
					//Item -->
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
					?><!-- 
					Item
					<figure class="one-fourth" data-src="http://www.placehold.it/800x600">
						<img src="http://www.placehold.it/600x400" alt="" />
						<figcaption>
							<span class="icojam_zoom_in"></span>
							<div>
								<h5>DECK Exteior</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
							</div>
						</figcaption>	
					</figure>
					//Item
					Item
					<figure class="one-fourth" data-src="http://www.placehold.it/800x600">
						<img src="http://www.placehold.it/600x400" alt="" />
						<figcaption>
							<span class="icojam_zoom_in"></span>
							<div>
								<h5>DECK Exteior</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
							</div>
						</figcaption>	
					</figure>
					//Item
					Item
					<figure class="one-fourth" data-src="http://www.placehold.it/800x600">
						<img src="http://www.placehold.it/600x400" alt="" />
						<figcaption>
							<span class="icojam_zoom_in"></span>
							<div>
								<h5>DECK Exteior</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
							</div>
						</figcaption>	
					</figure>
					//Item -->
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
						<span class="icojam_document"></span> SOBRE A 780
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
							<h2>About Elan 1923 Impression</h2>
							<p><strong>Mega Yacht OceanPrincess is one of the most luxurious and exclusive super yachts available for charter in Greece, Mediterranean, Red Sea…. Despite she is called A Yacht, she is a classed as per Lloyds 100 A1 Passenger Ship LMC, fully MCA compliant.</strong></p>
							<p>OceanPrincess is built in Finland by Rauma Yard and delivered in 1990 as boutique cruise liner. The new owners converted her into mega yacht in 2004 in Greek shipyard Elefsis. The final result of the conversion is large private yacht, made only for Private cruises or corporate charters.</p>
							<p>Powered by two Wärtsilä -8R32D with 8154 BHP Engines she reaches top speed of 17.0 Knots, while she cruise at 14.0 Knots in maximum comfort.</p>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> 
							<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
							<p>She is manned by a professional Maritime Crew.</p>
						</div>
						<!-- //OneHalf -->
						
						<!-- OneHalf -->
						<div class="one-half">
							<img src="assets/images/uploads/content1.png" alt="Elan 1923 Impression" />
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
							<table>
								<tr>
									<th colspan="2">Especificações Técnicas</th>
								</tr>
								<tr>
                                </tr>
                                    <td>Altura Total:</td>
									<td>5,20 m</td>
								</tr>
								<tr>
									<td>Pé direito Cabine:</td>
									<td>3,10 m</td>
								</tr>
								<tr>
									<td>Pé direito Toalete:</td>
									<td>2,20 m</td>
								</tr>
								<tr>
									<td>Comprimento Total:</td>
									<td>23,6 m</td>
								</tr>
								<tr>
									<td>Boca Máxima:</td>
									<td>4,95 m</td>
								</tr>
								<tr>
									<td>Pontal:</td>
									<td>1,55 m</td>
								</tr>
								<tr>
									<td>Calado Máximo:</td>
									<td>1,05</td>
								</tr>
								<tr>
									<td>Peso Leve:</td>
									<td>42 t</td>
								</tr>
								<tr>
									<td>Tanque de combustível:</td>
									<td>3000L</td>
								</tr>
								<tr>
									<td>Tanque de Água:</td>
									<td>1000L</td>
								</tr>
								<tr>
									<td>Motorização:</td>
									<td>IPS 1800</td>
								</tr>
								<tr>
									<td>Passageiros:</td>
									<td>20+2 </td>
								</tr>
							</table>
							
                            <table>
                                <tr>
                                    <th colspan="2">Motores</th>
                                </tr>
                                <tr>
									<td>PARELHA VOLVO</td>
                                    <td>IPS 1200-D13 - 900HP (DIESEL)</td>
                                </tr>
                                <tr>
									<td>PARELHA</td>
                                    <td>VOLVO D4- EVC DPH-225HP ( Diesel)</td>
                                </tr>
                            </table>
							
							
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
		
        <!-- Photo -->
        <section class="photo" style="background-image: url('assets/images/ship.jpg'); height: 415px;">
        </section>
        <!-- //Photo -->

		<div class="wrap">
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
