<?php 
/* Template Name: Home 
*/ 
get_header();

/*Getting  Home Banner Image */
$banner_image=get_post_meta($post->ID,"banner_image",true);
$banner = wp_get_attachment_image_src($banner_image, 'full');	

if(!empty($banner))
{
?>
	<div class="banner" style="background-image:url('<?php echo $banner[0];?>');">
<?php 
}
else
{
?>		
	<div class="banner" style="background-image:url('http://placehold.it/1170x535&amp;text=No image found');">
<?php	
}
?>
	
	<div class="container">
		<div class="banner-text">
			<h1><?php the_field('banner_text',$post->ID);?></h1> 
		<a href="<?php the_permalink(22);?>" class="red-btn" pd-data>Contact Us</a> </div>
	</div>
</div>

<section class="section intro-section text-center">
	<div class="container">
		<?php the_field('introduction_description',$post->ID);?>
	</div>
</section>

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

<?php 
//getting the customer review from the sidebar	
get_sidebar('customer_review');
?>

<div class="section top-services-section">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="top-service-post">
					<?php
					/*Getting  first_service_image */
					$first_service_image=get_post_meta($post->ID,"first_service_image",true);
					$first_service = wp_get_attachment_image_src($first_service_image, 'full');	

					if(!empty($first_service))
					{
					?>
						<figure style="background-image:url('<?php echo $first_service[0];?>');">
					<?php 
					}
					else
					{
					?>		
						<figure style="background-image:url('http://placehold.it/539x300&amp;text=No image found');">
					<?php	
					}
					?>
					
						<figcaption><?php the_field('first_service_name',$post->ID);?></figcaption>
					</figure>
					
					<div class="top-service-post-text">
					
						<?php the_field('first_service_description',$post->ID);?>
						
						<a href="<?php the_permalink(22);?>" class="red-btn" pd-data>Contact Us</a>
					</div>
					
					
				</div>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="top-service-post">
					<?php
					/*Getting  second_service_image */
					$second_service_image=get_post_meta($post->ID,"second_service_image",true);
					$second_service = wp_get_attachment_image_src($second_service_image, 'full');	

					if(!empty($second_service))
					{
					?>
						<figure style="background-image:url('<?php echo $second_service[0];?>');">
					<?php 
					}
					else
					{
					?>		
						<figure style="background-image:url('http://placehold.it/539x300&amp;text=No image found');">
					<?php	
					}
					?>
					
						<figcaption><?php the_field('second_service_name',$post->ID);?></figcaption>
					</figure>
					
					<div class="top-service-post-text">
					
						<?php the_field('second_service_description',$post->ID);?>
						
						<a href="<?php the_permalink(22);?>" class="red-btn" pd-data>Contact Us</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php 
get_sidebar('gallery');

get_footer();
?>