<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
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
			<h1><?php the_title();?></h1>  
		</div>
	</div>
</div>
<div class="section service-intro-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php the_field('service_intro_description',$post->ID);?>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="about-intro-section-sidebar">
				
					<figure class="intro-section-sidebar-img" style="background-image:url('<?php the_field('five_reason_bg_image',$post->ID);?>');">
					
						<figcaption>
							<?php the_field('five_reason_description',$post->ID);?>
						</figcaption>
					</figure>
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
	<?php
	/*Getting  services_and_clients_bg_image */
	$services_and_clients_bg_image=get_post_meta($post->ID,"services_and_clients_bg_image",true);
	$services_and_clients_bg = wp_get_attachment_image_src($services_and_clients_bg_image, 'full');	

	if(!empty($services_and_clients_bg))
	{
	?>
		<div class="services-imp-points-cover" style="background-image:url('<?php echo $services_and_clients_bg[0];?>')">
	<?php 
	}
	else
	{
	?>
		<div class="services-imp-points-cover" style="background-image:url('http://placehold.it/1350x581&amp;text=No image found')">
	<?php	
	}
	?>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php the_field('services_description',$post->ID);?>
				</div>
				<div class="col-md-4">
					<div class="our-clients">
						<h3><?php the_field('what_client_say_text',$post->ID);?></h3>
						<ul class="client-logos">
						<?php
						$i=1;
						if( have_rows('client_logo_repeater', $post->ID) ):

							while ( have_rows('client_logo_repeater', $post->ID) ) : the_row();
							//getting all field from repeater

								$logo_image = get_sub_field('logo_image',$post->ID);		
								$client_website_url = get_sub_field('client_website_url',$post->ID);		
						?>
								<li>
									<a href="<?php echo $client_website_url;?>"><img src="<?php echo $logo_image;?>" alt="<?php echo 'client-'.$i;?>"></a>
								</li>
								
						<?php 
						$i++;
							endwhile;
							wp_reset_query();
						endif;
						?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section our-cabinets-cover">
		<div class="container">
		<?php 
		$terms = get_terms( 'service_category', array('parent' =>14 ,'hide_empty' => false) );
		$category = $terms[mt_rand(0, count($terms) - 1)];
		$cat_id=$category->term_id;
		$cat_name=$category->name;
		$args = array(
		'post_type' => 'service',
		'tax_query' => array(
			array(
			'taxonomy' => 'service_category',
			'field' => 'id',
			'terms' => $cat_id
			 )
		  )
		);
		$query = new WP_Query( $args );
		?>
		<h2>SOME OF THE <?php echo strtoupper($cat_name);?> CABINETS WE HAVE BUILT:</h2>
			<div class="row">
			<?php
			while ( $query->have_posts() ) :$query->the_post();?>
				<div class="col-md-3">
					<div class="cabinet-post">
					<?php 
					if ( has_post_thumbnail() ) 
					{
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					?>
						
						<figure style="background-image:url('<?php echo $image[0]; ?>');"></figure>
					<?php
					} 
					else 
					{ 
					?>
						<figure style="background-image:url('http://placehold.it/265x265&amp;text=No image found');"></figure>
					<?php 
					}
					?>
						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4> 
					</div>
				</div>
				
			<?php  
			endwhile; 
			wp_reset_query();
			?>	
			</div>
		</div>
	</div>
	<div class="section more-cabinets-cover">
		<div class="container">
			<div class="row">
			<?php
				$terms_list = get_terms( 'service_category', array('parent' =>14 ,'hide_empty' => false) );
				$rand_keys = array_rand($terms_list, 2); // 2 is the number of categories you want

				foreach ($rand_keys as $id) 
				{
					
				?>
					<div class="col-md-6">
						<div class="more-cabinets-post">
							<figure style="background-image:url('<?php echo z_taxonomy_image_url($terms_list[$id]->term_id); ?>');">
								<figcaption><a href="<?php echo get_category_link($terms_list[$id]->term_id ); ?>"><?php echo $terms_list[$id]->name;?></a></figcaption>
							</figure>
						</div>
					</div>	
				<?php
				}	
			?>
			</div>
		</div>
	</div>
</div>
<?php 
get_sidebar('gallery');

get_footer();
?>

<?php get_footer();?>