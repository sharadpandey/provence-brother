<?php
	/**
		* The template for displaying the footer
		*
		* Contains the closing of the #content div and all content after.
		*
		* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
		*
		* @package WordPress
		* @subpackage Twenty_Seventeen
		* @since 1.0
		* @version 1.2
	*/
	
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?php the_field('about_us','options');?>
				<a href="<?php the_permalink(10);?>" class="red-link">Read More....</a>
			</div>
			
			<div class="col-md-2">
				<h4>Useful Link</h4>
				<ul class="useful-links">
					<!--START CODE USE FOR GETTING FOOTER MENU-->
					<?php

						$defaults = array(
						'theme_location'  => '',
						'menu'            => 'Header_menu',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => ''
						);

						wp_nav_menu( $defaults );
					?>
					<!--END OF CODE USE FOR GETTING FOOTER MENU-->
				</ul>
			</div>
			
			<div class="col-md-4">
				<h4>Location</h4>
				<div class="map">
					<?php
					$location=get_post_meta(22, 'contact_us_map', TRUE);
					if( !empty($location) ):
					?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		
			
			<div class="col-md-3">
				<div class="footer-logo">
					<a href="<?php echo site_url()?>">
						<img src="<?php the_field('footer_logo','options');?>" alt="Logo">
					</a>
				</div>
				
				<div class="social-links">
					<h5>Follow Us</h5>
					<ul>
						<li><a href="<?php the_field('facebook','options');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="<?php the_field('instagram','options');?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="<?php the_field('linkedin','options');?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
			
			</div>
			
		</div>
        

	
	<div class="copyright-section text-center">
		<div class="container">
		<input type="hidden" id="site_url" value="<?php echo site_url();?>" name="site_url" class="cls_site_url sr-only">
			<p>&copy; Copyright <?php echo date('Y');?> Provence Brothers Cabinet Making  |  Website By <a href="http://tradesignaus.com.au/" target="_blank">Tradesign</a></p>
		</div>
        
	</div>

</footer>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC65W9P5_ffDcf0VCidQpra2GtZCBhoULk"></script>
<?php wp_footer(); ?>

</body>
</html>
