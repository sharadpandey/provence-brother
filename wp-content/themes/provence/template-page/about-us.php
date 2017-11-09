<?php 
/* Template Name: About Us 
*/ 
get_header();

/*Getting  About Us Banner Image */
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
<section class="section about-intro-section pt70">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php the_field('about_us_description',$post->ID);?>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="about-intro-section-sidebar">
					<?php 
					/*Getting about_us_right_side_image */
					$about_us_right_side_image=get_post_meta($post->ID,"about_us_right_side_image",true);
					$about_us_right_side = wp_get_attachment_image_src($about_us_right_side_image, 'full');
					if(!empty($about_us_right_side))
					{
					?>
						<figure class="intro-section-sidebar-img" style="background-image:url('<?php echo $about_us_right_side[0]; ?>');"></figure>
					<?php
					} 
					else 
					{ 
					?>
						<figure class="intro-section-sidebar-img" style="background-image:url('http://placehold.it/360x275&amp;text=No image found');" 
						class="img-responsive"></figure>
					<?php 
					}
					?>
					
					
					<div class="sidebar-contact-section">
						<h2><?php the_field('contact_us_heading',$post->ID);?></h2>
						
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
<div class="section our-team-section">
	<div class="container">
		<div class="row">
			<?php 
			$i=0;
			if( have_rows('features_services_repeater', $post->ID) ):

				while ( have_rows('features_services_repeater', $post->ID) ) : the_row();
				//getting all field from repeater
			  
					$features_services_image = get_sub_field('features_services_image',$post->ID);
			   
					$features_services_name = get_sub_field('features_services_name',$post->ID);
					
					$features_services_description = get_sub_field('features_services_description',$post->ID);

					$page_link_on_button = get_sub_field('page_link_on_button',$post->ID);
					
					$button_text = get_sub_field('button_text',$post->ID);
					
			?>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="our-team-post">
							<figure style="background-image:url('<?php echo $features_services_image;?>');">
								<figcaption><?php echo $features_services_name;?></figcaption>
							</figure>
							<div class="our-team-post-text">
							
								<?php echo $features_services_description;?> 
								
								<a href="<?php echo $page_link_on_button;?>" class="red-btn" pd-data><?php echo $button_text;?> </a> 
							</div>
						</div>
					</div>
			<?php 
			$i++;
				endwhile;
				wp_reset_query();
			endif;
			?>

		</div>
	</div>
</div>
<?php 
//getting the customer review from the sidebar	
get_sidebar('customer_review');

//getting the gallery from the sidebar	
get_sidebar('gallery');

get_footer();
?>