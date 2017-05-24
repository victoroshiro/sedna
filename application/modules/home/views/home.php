<!-- Main -->
	<main class="main" role="main">

		<?php if (!empty($banners)): ?>
			<div id="lightSliderMainBanner" class="hero">
				<?php foreach ($banners as $key => $item): ?>
					<article>
						<!-- <img src="<?php // echo site_url('userfiles/banners/'.$item->imagem); ?>" alt=""> -->
						<!-- <img src="http://www.placehold.it/1500x700" class="main-content"> -->
						<div class="video-wrapper">
							<iframe
								autoplay="true"
								class=""
								
								src="https://www.youtube.com/embed/8zHdLF3-coA?ecver=1&autoplay=1&showinfo=0&controls=0"
								frameborder="0"
								allowfullscreen>
							</iframe>
						</div>
						<div class="text-wrapper">
							<h1 class="wow fadeInDown"><?php echo $item->titulo; ?></h1>
							<a class="anchor button white medium wow fadeInUp" href="<?php echo (strstr($item->link,'http')) ? $item->link : site_url($item->link); ?>" <?php echo 'target="'.$item->target_blank.'"'; ?>>
								<?php echo $item->resumo; ?>
							</a>
						</div>
					</article>
				<?php endforeach ?>	
			</div>
		<?php endif ?>
		
		<!-- Tab navigation -->
			<nav class="tabs four" role="navigation">
				<ul class="wrap">
					<li><a href="contact.html" title="Tell us what you need. We will do the rest.">
						<img src="assets/images/ico1.png" alt="" /> Tell us what you need. <br />We will do the rest.
					</a></li>
					<li><a href="charters.html" title="Check our Early Season Mediterranean Deals.">
						<img src="assets/images/ico2.png" alt="" /> Check our Early Season Mediterranean Deals.
					</a></li>
					<li><a href="services.html" title="New to Sailing? We‘ve got you covered.">
						<img src="assets/images/ico3.png" alt="" /> New to Sailing?<br />We‘ve got you covered.
					</a></li>
					<li><a href="#lightSliderPosts" class="anchor" title="Win a Sailing Holiday in Mediterranean!">
						<img src="assets/images/ico4.png" alt="" /> Win a Sailing Holiday in Mediterranean!
					</a></li>
				</ul>
			</nav>
			<!-- //Tab navigation -->
		
		<!-- Call to action -->
		<section class="cta gold">
			<div class="wrap center">
				<h2>Already convinced?</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorperut commodo consequat. </p>
				<a href="http://themeforest.net/user/themeenergy/portfolio" title="Buy this now" class="button white medium">Buy this now</a>
			</div>
		</section>
		<!-- //Call to action -->
		
		<!-- Deals -->
		<section class="content boxed grid2 noarrow">
			<ul id="lightSliderDeals">
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="yacht-single.html"><img src="assets/uploads/img.jpg" alt="deal" /></a></figure>
						<div class="one-half heightfix">
							<header>Our Exclusive Deals</header>
							<div class="text">
								<h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper.</p>
								
								<div class="details">
									<div>
										<span class="icojam_location_1"></span>
										<p>Base: Marina Kaštela</p>
									</div>
									<div>
										<span class="icojam_friends"></span>
										<p>Berths: 10 (8+2)</p>
									</div>
									<div class="price">$ 5300,00</div>
									<div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
								</div>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="yacht-single.html"><img src="assets/uploads/img.jpg" alt="deal" /></a></figure>
						<div class="one-half heightfix">
							<header>Our Exclusive Deals</header>
							<div class="text">
								<h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper.</p>
								
								<div class="details">
									<div>
										<span class="icojam_location_1"></span>
										<p>Base: Marina Kaštela</p>
									</div>
									<div>
										<span class="icojam_friends"></span>
										<p>Berths: 10 (8+2)</p>
									</div>
									<div class="price">$ 5300,00</div>
									<div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
								</div>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="yacht-single.html"><img src="assets/uploads/img.jpg" alt="deal" /></a></figure>
						<div class="one-half heightfix">
							<header>Our Exclusive Deals</header>
							<div class="text">
								<h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper.</p>
								
								<div class="details">
									<div>
										<span class="icojam_location_1"></span>
										<p>Base: Marina Kaštela</p>
									</div>
									<div>
										<span class="icojam_friends"></span>
										<p>Berths: 10 (8+2)</p>
									</div>
									<div class="price">$ 5300,00</div>
									<div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
								</div>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
			</ul>
		</section>
		<!-- //Deals -->
		
		<!-- Testimonials -->
		<section class="testimonials">
			<div class="wrap center">
				<h6>WOW – This is the Best Theme I have ever seen.</h6>
				<p>“Excellent - you found the right boat in the right place at the right time,<br /> and managed to change the dates for our convenience - brilliant!” </p>
				<p>- Johnatan Davidson</p>
			</div>
		</section>
		<!-- //Testimonials -->
		
		<!-- App -->
		<section class="white app">
			<div class="wrap center">
				<h2>Download our mobile booking app</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorperut commodo consequat. </p>
				<ol class="custom triplets">
					<li class="wow fadeIn"><strong>Find a yacht</strong><br />Lorem ipsum dolor sit consectetuer adipiscing elit, sed diam nonummy nibh amet .</li>
					<li class="wow fadeIn" data-wow-delay=".2s"><strong>Make a booking</strong><br />Lorem ipsum dolor sit consectetuer adipiscing elit, sed diam nonummy nibh amet .</li>
					<li class="wow fadeIn" data-wow-delay=".4s"><strong>Brag to your friends</strong><br />Lorem ipsum dolor sit consectetuer adipiscing elit, sed diam nonummy nibh amet .</li>
				</ol>
			</div>
		</section>
		<!-- //App -->
		
		<!-- Photo -->
		<section class="photo">
			<div class="wrap center">
				<h2>Find out more about our sailing destinations, marinas and suggested itineraries</h2>
				<p>Wild, exotic and remote; cosmopolitan and cutting-edge; untouched and tranquil, <br />discover our incredible sailing destinations. <br />See the world. Differently.</p>
				<a href="destinations.html" title="Find out more" class="button white medium">Find out more</a>
			</div>
		</section>
		<!-- //Photo -->
		
		<!-- Services -->
		<section class="white icons">
			<div class="wrap">
				<div class="row">
					<!-- Item -->
					<div class="one-fourth wow fadeIn">
						<a href="#" class="circle large border">
							<span class="icojam_compas_2"></span>
						</a>
						<h4><a href="#">Our sailing destinations</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".2s">
						<a href="#" class="circle large border">
							<span class="icojam_map_3"></span>
						</a>
						<h4><a href="#">Where to sail guide</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".4s">
						<a href="#" class="circle large border">
							<span class="icojam_tags_1"></span>
						</a>
						<h4><a href="#">Our yachts and pricing</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".6s">
						<a href="#" class="circle large border">
							<span class="icojam_pupil_boy"></span>
						</a>
						<h4><a href="#">New to sailing?</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn">
						<a href="#" class="circle large border">
							<span class="icojam_anchor"></span>
						</a>
						<h4><a href="#">Sail with a skipper</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".2s">
						<a href="#" class="circle large border">
							<span class="icojam_certificate"></span>
						</a>
						<h4><a href="#">Skipper training</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".4s">
						<a href="#" class="circle large border">
							<span class="icojam_holliday"></span>
						</a>
						<h4><a href="#">Beach club</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
					
					<!-- Item -->
					<div class="one-fourth wow fadeIn" data-wow-delay=".6s">
						<a href="#" class="circle large border">
							<span class="icojam_airdrop"></span>
						</a>
						<h4><a href="#">Flotilla sailing</a></h4>
						<p>Lorem ipsum dolor sit amet, sectetuer adipiscing elit, sed diam nonumy nib.</p>
					</div>
					<!-- //Item -->
				</div>
			</div>
		</section>
		<!-- //Services -->
		
		
		<!-- Call to action -->
		<section class="cta grey">
			<div class="wrap">
				<a href="http://themeforest.net/user/themeenergy/portfolio" title="I am convinced" class="button white medium right">I am convinced</a>
				<h3>Another call to action section, just in case you have something to add.</h3>
			</div>
		</section>
		<!-- //Call to action -->
		
		<!-- Blog posts -->
		<section class="content boxed grid2">
			<ul id="lightSliderPosts">
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="blog-single.html"><img src="assets/uploads/img.jpg" alt="post" /></a></figure>
						<div class="one-half heightfix">
							<div class="text">
								<h3><a href="blog-single.html">Win an All Inclusive Sailing Holiday in Mediterranean!</a></h3>
								<div class="meta">
									<span>By <a href="#">admin</a></span>  
									<span>May 23rd, 2016</span>   
									<span><a href="blog-single.html#comments">2 Comments</a></span>  
								</div>
								<p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors.</p>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
								<a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="blog-single.html"><img src="assets/uploads/img.jpg" alt="post" /></a></figure>
						<div class="one-half heightfix">
							<div class="text">
								<h3><a href="blog-single.html">Luxury Heart of Gold joins<br />our charter fleet</a></h3>
								<div class="meta">
									<span>By <a href="#">admin</a></span>  
									<span>May 23rd, 2016</span>   
									<span><a href="blog-single.html#comments">2 Comments</a></span>  
								</div>
								<p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors.</p>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
								<a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
				
				<li>
					<!-- Item -->
					<article class="full-width hentry">
						<figure class="one-half heightfix"><a href="blog-single.html"><img src="assets/uploads/img.jpg" alt="post" /></a></figure>
						<div class="one-half heightfix">
							<div class="text">
								<h3><a href="blog-single.html">Awarded Outstanding Sailing School and Outstanding Instructor Award</a></h3>
								<div class="meta">
									<span>By <a href="#">admin</a></span>  
									<span>May 23rd, 2016</span>   
									<span><a href="blog-single.html#comments">2 Comments</a></span>  
								</div>
								<p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors.</p>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
								<a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
							</div>
						</div>
					</article>
					<!-- //Item -->
				</li>
			</ul>
		</section>
		<!-- //Blog posts -->
		
		<!-- Call to action -->
		<section class="cta gold">
			<div class="wrap center">
				<h2>I am sold. This is outstanding.</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorperut commodo consequat. </p>
				<a href="http://themeforest.net/user/themeenergy/portfolio" title="Buy this now" class="button white medium">Buy this now</a>
			</div>
		</section>
		<!-- //Call to action -->
		
		<!-- Yachts -->
		<div class="results">
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
			
			<!-- Item -->
			<figure class="one-fourth item">
				<img src="assets/uploads/img.jpg" alt="" />
				<figcaption>
					<dl>
						<dt>Elan 1923 Impression</dt>
						<dd><span class="icojam_doublebed"></span> 10 berths</dd>
						<dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
					</dl>
					<div class="price">Price from  <strong>50.000$</strong></div>
					<a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
				</figcaption>
			</figure>
			<!-- //Item -->
		</div>
		<!-- //Yachts -->
	</main>
	<!-- //Main -->