<!DOCTYPE html>
<?php
//==============
//CONFIGURATION
//==============

//IMPORTANT!!
//Put in your email address below:
$to = 'atixscripts@gmail.com';


//User info (DO NOT EDIT!)
$name = stripslashes($_POST['username']); //sender's name
$email = stripslashes($_POST['email']); //sender's email

//The subject
$subject = stripslashes($_POST['subject']); // the subject
$message = stripslashes($_POST['message']); //sender's email

//The message you will receive in your mailbox
//Each parts are commented to help you understand what it does exaclty.
//YOU DON'T NEED TO EDIT IT BELOW BUT IF YOU DO, DO IT WITH CAUTION!
$msg  = "From : $name \r\n";  //add sender's name to the message
$msg .= "e-Mail : $email \r\n";  //add sender's email to the message
$msg .= "Subject : $subject \r\n\r\n"; //add subject to the message (optional! It will be displayed in the header anyway)
$msg .= "---Message--- \r\n".stripslashes($_POST['message'])."\r\n\r\n";  //the message itself

//Extras: User info (Optional!)
//Delete this part if you don't need it
//Display user information such as Ip address and browsers information...
$msg .= "---User information--- \r\n"; //Title
$msg .= "User IP : ".$_SERVER["REMOTE_ADDR"]."\r\n"; //Sender's IP
$msg .= "Browser info : ".$_SERVER["HTTP_USER_AGENT"]."\r\n"; //User agent
$msg .= "User come from : ".$_SERVER["HTTP_REFERER"]; //Referrer
// END Extras
?>
<head>
	<meta charset="utf-8">
	<title>SmartBusiness - Responsive HTML5/CSS3 Template - Contact Us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600italic,600,400italic,300italic,300,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>	
	<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.1.min.js"><\/script>');</script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<!-- contact form -->
	<link rel="stylesheet" href="js/contact/form.css" type="text/css"/>	
	<script src="js/contact/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/contact/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#cont_form").validationEngine();
		});
	</script>	
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
<body>
	<!-- wrapper -->
	<div id="wrapper">
		<div class="w1">
			<div class="w2">
				<!-- header -->
				<header id="header">
					<!-- section -->
					<div class="section">
						<h1 class="logo"><a href="index.html">SmartBusiness</a></h1>
						<div class="contact-box">
							<strong class="phone">+123 456 78.90.000</strong>
							<!-- social -->
							<ul class="social">
								<li><a href="#" class="twitter">twitter</a></li>
								<li><a href="#" class="facebook">facebook</a></li>
								<li><a href="#" class="pinterest">pinterest</a></li>
								<li><a href="#" class="dribbble">dribbble</a></li>
								<li><a href="#" class="vimeo">vimeo</a></li>
								<li><a href="#" class="google">google</a></li>
								<li><a href="#" class="rss">rss</a></li>
							</ul>
						</div>
					</div>
					<!-- nav-box -->
					<nav class="nav-box">
						<!-- nav -->
						<ul id="nav">
							<li><a href="index.html">Home</a></li>
							<li><a href="#" class="has-drop-down-a">Layouts</a>
								<ul>
									<li><a href="index-2.html">Home Version 2</a></li>
									<li><a href="index-3.html">Home Version 3</a></li>
									<li><a href="index-4.html">Home Version 4</a></li>
									<li><a href="index-5.html">Home Version 5</a></li>
									<li><a href="index-6.html">Home Version 6</a></li>
									<li><a href="index-7.html">Home Version 7</a></li>
									<li><a href="index-8.html">Home Version 8</a></li>										
								</ul>
							</li>								
							<li><a href="#" class="has-drop-down-a">Sliders</a>
								<ul>
									<li><a href="slider-revolution.html">Revolution Slider</a></li>									
									<li><a href="slider-onebyone.html">OnebyOne Slider</a></li>
									<li><a href="slider-nivo.html">Nivo Slider</a></li>
									<li><a href="slider-flex-1.html">FlexSlider (Basic)</a></li>
									<li><a href="slider-flex-2.html">FlexSlider (Thumbnail)</a></li>
									<li><a href="slider-carousel.html">Carousel Slider</a></li>
									<li><a href="slider-accordion.html">Accordion Slider</a></li>		
									<li><a href="slider-piecemaker.html">Piecemaker 3D Slider</a></li>											
								</ul>
							</li>								
							<li class="active"><a href="#" class="has-drop-down-a">Pages</a>
								<ul>
									<li><a href="pages-about.html">About Us</a></li>
									<li><a href="pages-services.html">Services</a></li>
									<li><a href="pages-faq.html">FAQ</a></li>
									<li><a href="pages-team.html">Meet The Team</a></li>
									<li><a href="pages-testimonials.html">Testimonials</a></li>
									<li><a href="pages-site-tour.html">Site Tour</a></li>
									<li><a href="contact-1.php">Contact Layout 1</a></li>
									<li><a href="contact-2.php">Contact Layout 2</a></li>									
								</ul>
							</li>							
							<li><a href="#" class="has-drop-down-a">Shortcodes</a>
								<ul>
									<li><a href="shortcodes-typography.html">Typography</a></li>
									<li><a href="shortcodes-buttons.html">Buttons</a></li>
									<li><a href="shortcodes-pricing-tables.html">Pricing Tables</a></li>
									<li><a href="shortcodes-tabs.html">Accordions, Tabs & Toggles</a></li>
									<li><a href="shortcodes-message-boxes.html">Alert Messages & Boxes</a></li>										
									<li><a href="shortcodes-video.html">Videos</a></li>								
									<li>
										<a href="#">Third level</a>
										<ul>
											<li><a href="#">Menu item 1</a></li>
											<li><a href="#">Menu item 2</a></li>
											<li><a href="#">Menu item 3</a></li>
											<li><a href="#">Menu item 4</a></li>
											<li><a href="#">Menu item 5</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="portfolio.html" class="has-drop-down-a">Portfolio</a>
								<ul>
									<li><a href="portfolio-one-column.html">One Column Portfolio</a></li>
									<li><a href="portfolio-two-columns.html">Two Columns Portfolio</a></li>
									<li><a href="portfolio-three-columns.html">Three Columns Portfolio</a></li>
									<li><a href="portfolio-four-columns.html">Four Columns Portfolio</a></li>
									<li><a href="portfolio-sortable.html">Sortable Portfolio</a></li>
								</ul>
							</li>
							<li><a href="blog-large-image.html">Blog</a>
								<ul>
									<li><a href="blog-large-image.html">Blog Large Image</a></li>
									<li><a href="blog-medium-image.html">Blog Medium Image</a></li>
									<li><a href="blog-single-post.html">Blog Single Post</a></li>
								</ul>
							</li>	
						</ul>
						<select class="mobile-menu">
							<option value="index.html">Home</option>
							<option value="#">Layouts</option>
							<option value="index-2.html">- Home Version 2</option>
							<option value="index-3.html">- Home Version 3</option>
							<option value="index-4.html">- Home Version 4</option>
							<option value="index-5.html">- Home Version 5</option>
							<option value="index-6.html">- Home Version 6</option>
							<option value="index-7.html">- Home Version 7</option>
							<option value="index-8.html">- Home Version 8</option>							
							<option value="#">Sliders</option>
							<option value="slider-revolution.html">- Revolution Slider</option>								
							<option value="slider-onebyone.html">- OnebyOne Slider</option>
							<option value="slider-nivo.html">- Nivo Slider</option>
							<option value="slider-flex-1.html">- FlexSlider (Basic)</option>
							<option value="slider-flex-2.html">- FlexSlider (Thumbnail)</option>
							<option value="slider-carousel.html">- Carousel Slider</option>
							<option value="slider-accordion.html">- Accordion Slider</option>
							<option value="slider-piecemaker.html">- Piecemaker 3D Slider</option>							
							<option value="#">Pages</option>
							<option value="pages-about.html">- About Us</option>
							<option value="pages-services.html">- Services</option>
							<option value="pages-faq.html">- FAQ</option>
							<option value="pages-team.html">- Meet The Team</option>
							<option value="pages-testimonials.html">- Testimonials</option>
							<option value="pages-site-tour.html">- Site Tour</option>
							<option value="contact-1.php">- Contact Layout 1</option>
							<option selected="selected" value="contact-2.php">- Contact Layout 2</option>								
							<option value="#">Shortcodes</option>
							<option value="shortcodes-typography.html">- Typography</option>
							<option value="shortcodes-buttons.html">- Buttons</option>
							<option value="shortcodes-pricing-tables.html">- Pricing Tables</option>
							<option value="shortcodes-tabs.html">- Accordions, Tabs & Toggles</option>
							<option value="shortcodes-message-boxes.html">- Alert Messages & Boxes</option>
							<option value="shortcodes-video.html">- Videos</option>							
							<option value="#">Portfolio</option>
							<option value="portfolio-one-column.html">- One Column Portfolio</option>
							<option value="portfolio-two-columns.html">- Two Columns Portfolio</option>
							<option value="portfolio-three-columns.html">- Three Columns Portfolio</option>
							<option value="portfolio-four-columns.html">- Four Columns Portfolio</option>
							<option value="portfolio-sortable.html">- Sortable Portfolio</option>
							<option value="#">Blog</option>
							<option value="blog-large-image.html">- Blog Large Image</option>
							<option value="blog-medium-image.html">- Blog Medium Image</option>
							<option value="blog-single-post.html">- Blog Single Post</option>					
						</select>
					</nav>
				</header>
				<!-- main -->
				<div id="main">
					<!-- gallery -->
					<div class="gallery">
						<iframe class="contact-page-2" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=New+York,+NY,+United+States&amp;sll=37.0625,-95.677068&amp;sspn=30.323858,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=New+York&amp;t=m&amp;ll=40.715973,-74.011374&amp;spn=0.098211,0.222988&amp;z=13&amp;output=embed"></iframe>
					</div>
					<div class="container holder">
						<!-- content -->
						<div id="content">
							<div class="c1">
								<!-- post-box -->
								<article class="post-box" style="margin-top:21px;">
									<?php
										if ($_SERVER['REQUEST_METHOD'] != 'POST'){
											$self = $_SERVER['PHP_SELF'];
									?>
									<!-- comment-form -->
									<form method="post" class="comment-form" id="cont_form" action="#">
										<fieldset>
											<div class="meta">
												<h3>Contact Us</h3>
											</div>
											<div class="row">
												<label for="username">Your Name  (*)</label>
												<span class="text">
													<input type="text" id="username" name="username" value="" class="text validate[required]" >
												</span>
											</div>
											<div class="row">
												<label for="email">Your Email  (*)</label>
												<span class="text">
													<input type="text" id="email" name="email" value="" class="text validate[required,custom[email]]" >
												</span>
											</div>
											<div class="row">
												<label for="subject">Your Subject</label>
												<span class="text">
													<input type="text" id="subject" name="subject" value="" class="text" >
												</span>
											</div>
											<div class="row">
												<label for="message">Your Message  (*)</label>
												<span class="textarea">
													<textarea class="w_focus validate[required]" id="message" name="message" cols="30" rows="10"></textarea>
												</span>
											</div>
											<div class="row">
												<span class="submit">
													Send Email
													<input type="submit" value="Send Email" />
												</span>
											</div>
										</fieldset>
									</form>
									<?php
										} else {
											if  (mail($to, $subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n")) {
												//Message sent!
												//It the message that will be displayed when the user click the sumbit button
												//You can modify the text if you want
												echo '
													<!-- msg-box success -->
													<h4>Congratulations!</h4>
													<p>&nbsp;</p>
													<div class="msg-box success">
														<div class="text-box">
															<strong>Success!</strong> Thank you '.$name.', your message is sent! I will get back to you as soon as possible.
														</div>
													</div>
												';
										   } else {									
												// Display error message if the message failed to send
												echo '
													<!-- msg-box error -->
													<h4>Error!</h4>
													<p>&nbsp;</p>
													<div class="msg-box error">
														<div class="text-box">
															<strong>Error!</strong> Sorry '.$name.', your message failed to send. Try later!
														</div>
													</div>
												';												
											}
										}
									?>
								</article>
							</div>
						</div>
						<!-- sidebar -->
						<aside id="sidebar" style="margin-top:25px;">
							<!-- widget -->
							<div class="widget">
								<h3>Get in Touch</h3>
								<dl>
									<dt>Telephone:</dt>
									<dd>+1 800 603 6035</dd>
									<dt>Fax:</dt>
									<dd>+1 800 889 9898</dd>
									<dt>E-mail:</dt>
									<dd><a href="mailto:contact@sitename.com">contact@sitename.com</a></dd>
								</dl>
								<address>9870St Vincent Place, <br >Glasgow, DC 45 Fr 45.</address>
							</div>
							<!-- widget -->
							<div class="widget">
								<h3>Photostream</h3>
								<section class="photos">
									<script flickr_type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;flickr_display=random&amp;size=s&amp;layout=x&amp;source=user&amp;user=24878717@N06"></script>
								</section>
							</div>
							<!-- widget -->
							<div class="widget">
								<h3>Latest tweets</h3>
								<!-- text-list -->
								<ul class="text-list">
									<li>
										<p>How to Hire the Right Employees for Your Startup: <a href="#">http://bit.ly/Pyy3vG</a> via <a href="#">@businessonmain</a> and <a href="#">#startups</a></p>
										<em class="date">11 hours, 31 minutes ago</em>
									</li>
									<li>
										<p>What You Need to Know! Check out these tips and avoid these common mistakes to lead a successful <a href="#">#smallbiz</a> meeting: <a href="#">http://bit.ly/OWaqtc</a></p>
										<em class="date">2 days, 14 hours ago</em>
									</li>
									<li>
										<p>Small tablets are better sales tools. Just one reason why you might choose an iPad Mini over the iPhone 5: <a href="#">http://bit.ly/NqwSZb</a>  via <a href="#">#mobile</a></p>
										<em class="date">2 days, 16 hours ago</em>
									</li>
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
		<div id="footer">
			<div class="footer-holder">
				<div class="footer-frame">
					<footer>
						<div class="case">
							<!-- grid-cols -->
							<div class="grid-cols">
								<!-- col25 -->
								<div class="col25">
									<div class="col-holder">
										<!-- contact -->	
										<h4>Get in Touch</h4>
										<dl>
											<dt>Telephone:</dt>
											<dd>+1 800 603 6035</dd>
											<dt>Fax:</dt>
											<dd>+1 800 889 9898</dd>
											<dt>E-mail:</dt>
											<dd><a href="mailto:contact@sitename.com">contact@sitename.com</a></dd>
										</dl>
										<address>
											9870St Vincent Place, <br />Glasgow, DC 45 Fr 45.
										</address>
										<h4>Interesting stuff</h4>
										<ul class="social2">
											<li><a href="#" class="twitter">twitter</a></li>
											<li><a href="#" class="facebook">facebook</a></li>
											<li><a href="#" class="pinterest">pinterest</a></li>
											<li><a href="#" class="dribbble">dribbble</a></li>
											<li><a href="#" class="vimeo">vimeo</a></li>
											<li><a href="#" class="google">google</a></li>
											<li><a href="#" class="rss">rss</a></li>
										</ul>
									</div>
								</div>
								<!-- col25 -->
								<div class="col25">
									<div class="col-holder">
										<div class="blog-links">
											<h4>Recent Blog Posts</h4>
											<ul>
												<li>
													<h6><a href="blog-single-post.html">No Mobile Website? You're Probably Turning Customers Away</a></h6>
													<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper ... </p>
												</li>
												<li>
													<h6><a href="blog-single-post.html">What Entrepreneurs Need to Know About Their Brains</a></h6>
													<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ...</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- col25 -->
								<div class="col25">
									<div class="col-holder">
										<!-- useful-links -->									
										<h4>Useful Links</h4>
										<ul class="links">
											<li><a href="#">Frequently Asked Questions</a></li>
											<li><a href="#">Service Updates</a></li>
											<li><a href="#">Community Forum</a></li>
											<li><a href="#">Help Desk</a></li>
											<li><a href="#">Validate License</a></li>
											<li><a href="#">Coupons &amp; Discount!</a></li>
											<li><a href="#">Privacy Policy</a></li>
										</ul>
									</div>
								</div>
								<!-- col25 -->
								<div class="col25">
									<div class="col-holder">
										<!-- tweets -->
										<div class="tweets">
											<div class="holder">
												<h4>Latest Tweets</h4>
												<section class="latest-tweets" style="width:100%;">
													<div id="twitter_update_list" class="twitter-wrap"></div>
													<!-- twitter start script -->
													<script type="text/javascript">	
														function twitterCallback(twitters) {
														  var statusHTML = [];
														  for (var i=0; i<twitters.length; i++){
															var username = twitters[i].user.screen_name;
															var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
															  return '<a href="'+url+'">'+url+'</a>';
															}).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
															  return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
															});		
															statusHTML.push('<li><p>'+status+'</p> <em class="date">'+relative_time(twitters[i].created_at)+'</em></li>');
														  }
														  document.getElementById('twitter_update_list').innerHTML = '<ul>'+statusHTML.join('')+'</ul>';
														}
													</script>
													<script type="text/javascript" src="https://api.twitter.com/1/statuses/user_timeline/adobetutorialz.json?callback=twitterCallback&amp;count=2"></script>
												</section>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- add-block -->
						<div class="add-block">
							<div class="holder">
								<nav class="add-nav">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="#">Pages</a></li>
										<li><a href="#">Shortcodes</a></li>										
										<li><a href="#">Portfolio</a></li>
										<li><a href="#">Blog</a></li>
										<li class="active"><a href="#">Contact</a></li>
									</ul>
								</nav>
								<div class="by">
									&copy; Copyright 2012. <a href="#">SmartBusiness</a>. All right reserved.
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/dropdown-menu.js"></script>	
</body>
</html>