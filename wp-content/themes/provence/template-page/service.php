<?php 
/* Template Name: Service 
*/ 
get_header();
	
/*Getting  Service Banner Image */
$banner_image=get_post_meta($post->ID,"banner_image",true);
$banner = wp_get_attachment_image_src($banner_image, 'full');	

if(!empty($banner))
{
?>
	<div class="banner inner-banner" style="background-image:url('<?php echo $banner[0];?>');">
<?php 
}
else
{
?>		
	<div class="banner inner-banner" style="background-image:url('http://placehold.it/1170x535&amp;text=No image found');">
<?php	
}
?>
	<div class="container">
		<div class="banner-text">
			<h1><?php the_field('banner_text',$post->ID);?></h1> 
		</div>
	</div>
</div>
<section class="section services-section">
	<div class="container">
		<div class="row">
			<?php
				$i=1;
				$taxonomy_name = 'service_category';
				$termchildren = get_term_children( 14, $taxonomy_name );
				
				foreach ($termchildren as $child) 
				{
					$term = get_term_by( 'id', $child, $taxonomy_name );
				?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="service-post" style="background-image:url('<?php echo z_taxonomy_image_url($term->term_id); ?>');">
							<div class="service-heading">
								<figure>
								<?php 
									$service_icon_image=get_field('service_icon_image','service_category_'.$term->term_id);	
								?>
									<img src="<?php echo $service_icon_image;?>" alt="service icon">
									
								</figure>
								<h4><?php echo $term->name;?></h4>
							</div>
							<a href="<?php echo get_category_link( $term->term_id ); ?>" class="red-btn" pd-data>See More</a>
						</div> 
					</div>
				<?php 	
				}	
			?>

		</div>
		
	</div>
</section>
<section class="section about-intro-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php the_field('introduction_description',$post->ID);?>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="about-intro-section-sidebar">
					<div class="sidebar-contact-section">
						<h2>Contact Us</h2>
						<!--<form>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name"> </div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Phone"> </div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email"> </div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Subject"> </div>
							<div class="form-group">
								<textarea class="form-control" placeholder="Message"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="red-btn" pd-data>Submit</button>
							</div>
						</form>-->
						<?php echo do_shortcode('[contact-form-7 id="7" title="Contact form for About Us Page"]'); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
get_sidebar('gallery');

get_footer();
?>