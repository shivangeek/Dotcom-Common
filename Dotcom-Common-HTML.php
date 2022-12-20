<!DOCTYPE html>
<html>
<head>
	<title>Common HTML</title>

	<link rel="prefetch" href="<?php echo home_url();?>/wp-content/themes/elite-stone/assets/fonts/OpenSans-Bold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="prefetch" href="<?php echo home_url();?>/wp-content/themes/elite-stone/assets/fonts/OpenSans-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="prefetch" href="<?php echo home_url();?>/wp-content/themes/elite-stone/assets/fonts/OpenSans-Regular.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="prefetch" href="<?php echo home_url();?>/wp-content/themes/elite-stone/assets/fonts/OpenSans-Light.woff2" as="font" type="font/woff2" crossorigin>

</head>
<body>

	<!-- Header Start -->
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="site-branding">
						<?php the_custom_logo(); ?>
					</div>
				</div>
				<div class="col-lg-9">					
					<div class="header-menu">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<div class="header-mobile-menu">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->

	<!-- Footer Start -->
	<div class="footer-bottom-box">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12">
					<div class="footer-bottom-text">
						<div class="copy-right">
							<p>© <?php echo date('Y');?> Elite Stone Fabrication</p>
						</div>
						<div class="footer-bottom-link">
							<ul>
								<li><a href="<?php echo home_url();?>/privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
								<li><a href="<?php echo home_url();?>/terms-of-use" title="Terms of Service">Terms of Service</a></li>
								<li><a href="<?php echo home_url();?>/cookie-policy" title="Cookies Policy">Cookies Policy</a></li>
							</ul>
						</div>
						<div class="footer-other-link">
							<p>Web Design &amp; Digital Marketing with <span><i class="fa fa-heart" aria-hidden="true"></i></span> by <a href="https://www.dotcomdesign.com" target="_blank" title="Dotcom Design" class="dotcom-link">Dotcom Design</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer End -->

	<!-- Scroll To Top Start -->
	<a href="javascript:void(0);" id="scrollToTop" class="scrolltop" title="Back To Top"><i class="fas fa-angle-double-up"></i></a>
	<!-- Scroll To Top End -->

	<!-- CTA  Button Start -->
    <div class="cta-btn">
        <a href="#" class="sec-btn" data-bs-toggle="modal" data-bs-target="#schedule_an_estimate_Modal" title="Schedule an Estimate"><span>Schedule an Estimate</span></a>
    </div>
    <!-- CTA  Button Start -->

	<!-- Modal Start -->
	<div class="modal common-popup" id="schedule_an_estimate_Modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="popup-title">
					<h2 class="h2-title">Schedule an <span>Estimate</span></h2>
					<button type="button" class="close close-popup" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
				</div>
				<div class="common-popup-overflow">
					<div class="common-popup-text" data-simplebar>
						<div class="contact-form">
							<?php echo do_shortcode('[contact-form-7 id="117" title="Schedule an Estimate"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal End -->
	
</body>
</html>