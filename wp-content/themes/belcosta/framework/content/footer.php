<footer>
	<div class="footer">	
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<a href="http://localhost:8888/belcosta/wordpress/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-logo.svg" alt="BelCosta Labs"></a>
				</div>
				<div class="col-md-6" id="footer-right">
				<div class="address">
					<ul>
						<li><a target="_blank" href="https://www.google.com/maps/place/1131+E+South+St,+Long+Beach,+CA+90805/@33.8292963,-118.2617812,12z/data=!4m5!3m4!1s0x80dd333e43476793:0x8780a80a46257b78!8m2!3d33.8603773!4d-118.1783538">1131 E. South Street  Long Beach, CA 90805</a></li>
						<li><a target="_blank" href="tel:13109241986">310 924 1986</a></li>
					</ul>	
				</div>
				<ul class="social">
					<li><a target="_blank" href="https://www.facebook.com/belcosta.labs.3">Facebook</a></li>
					<li><a target="_blank" href="https://www.instagram.com/belcostalabs/">Instagram</a></li>
					<li><a target="_blank" href="mailto:info@belcostalabs.com">Email</a></li>
				</ul>
				</div>
			</div>
			<div class="seperate">
				<hr>
				<hr>
			</div>
		</div>
		<div class="container footer-nav">
			<div class="row">
			<?php

			$args = array(
				'theme_location' => 'footer-menu'
			);

			?>

			<?php wp_nav_menu(  $args ); ?>		 
			</div>
		</div>
		
	</div>
</footer>