<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 
?>
<div class="banner inner-banner" style="background-image:url('<?php echo esc_url(get_template_directory_uri());?>/assets/images/banner-img.jpg');">
	<div class="container">
		<div class="banner-text">
			<h1><?php single_cat_title(); ?></h1> 
		</div>
	</div>
</div>

<section class="section services-section">
	<div class="container">
		<div class="row">
		
		<?php  while ( have_posts() ) : the_post();?>
		
			<div class="col-md-4 col-sm-4 col-xs-12">
			<?php 
			if ( has_post_thumbnail() ) 
			{
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			?>
				<div class="service-post" style="background-image:url('<?php echo $image[0]; ?>');">
			<?php
			} 
			else 
			{ 
			?>
				<div class="service-post" style="background-image:url('http://placehold.it/360x295&amp;text=No image found'); " class="img-responsive">
		<?php 
			}
			?>
					<div class="service-heading">
						<h4><?php the_title();?></h4>
					</div>
					<a href="<?php the_permalink();?>" class="red-btn" pd-data>See More</a>
				</div>
			</div>
		<?php endwhile; wp_reset_query(); ?>	
		
		</div>
	</div>
</section>


<?php 
get_sidebar('gallery');

get_footer();
?>