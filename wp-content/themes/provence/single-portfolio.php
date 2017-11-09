<?php
/**
	* The template for displaying all single posts of portfolio
	*
	* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	*
	* @package WordPress
	* @subpackage Twenty_Seventeen
	* @since 1.0
	* @version 1.0
*/
	
get_header(); 

global $post;


function get_numerics ($str)
{
	preg_match_all('/\d+/', $str, $matches);
	return $matches[0];
}
/* Start the Loop */
while ( have_posts() ) : the_post();
?>

<div class="banner inner-banner" style="background-image:url('<?php echo esc_url(get_template_directory_uri());?>/assets/images/banner-img.jpg');">
	<div class="container">
		<div class="banner-text">
			<h1><?php the_title();?></h1> 
		</div>
	</div>
</div>
<div class="section portfolio-page Portfolio-inner-page">
	<div class="container">
		<div id="BathroomCarousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<?php
				$i=1;
				$one11 = get_post_meta($post->ID,'project_gallery',true); 	
				if($one11 !='')
				{
					$arr11=get_numerics($one11); 
					
					foreach($arr11 as $val11)
					{
						$small_image_url1 = wp_get_attachment_image_src($val11, 'full');
				?>
						<div class="item <?php if($i==1){echo 'active';}?>" style="background-image:url('<?php echo $small_image_url1[0];?>');"> </div>
				<?php
					$i++;
					}//end of foreach loop.	
				}//end of if condition.
				else
				{
					echo "<strong><h2 class='no_rcrd'>No Record Available</h2></strong>";
				}
				?>
			</div>
			<a class="left carousel-control" href="#BathroomCarousel" data-slide="prev"> <span class="fa fa-angle-left"></span> </a>
			<a class="right carousel-control" href="#BathroomCarousel" data-slide="next"> <span class="fa fa-angle-right"></span> </a>
		</div>
		<div class="clearfix"></div>
		<div class="section about-intro-section">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<?php the_content();?>
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
		<div class="clearfix"></div>
		<div class="owl-carousel owl-theme PortfolioCarousel">
		<?php
			$post_id=get_the_ID();
			$terms=get_the_terms( get_the_ID(), 'portfolio_category' );
			$term_id=$terms[0]->term_id;
			$getGalleryData 	=	get_posts(array(
						'post_type' => 'portfolio',
						'posts_per_page' => 10 ,
						'post__not_in' => array (get_the_ID()),
						'tax_query' => array(
							array(
							'taxonomy' => 'portfolio_category',
							'field' => 'term_id',
							
							'terms' => $term_id),
							
						))
					);
			foreach ( $getGalleryData as $post ) :setup_postdata( $post );
			?>			
					<div class="item">
					<?php if ( has_post_thumbnail() ) 
					{
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
					?>
						<div class="other-Portfolio-post" style="background-image:url('<?php echo $image[0]; ?>');">
					<?php
					} 
					else
					{ 
					?>
						<div class="other-Portfolio-post" style="background-image:url('http://placehold.it/370x240&amp;text=No image found');">
					<?php 
					}
					?>
						
							<div class="other-Portfolio-post-text">
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4> 
							</div>
						</div>
					</div>	
						
			<?php 
			endforeach; 
			wp_reset_postdata();
			?> 
		</div>
	</div>
</div>
<?php
endwhile; // End of the loop.

get_sidebar('gallery');

get_footer();
?>