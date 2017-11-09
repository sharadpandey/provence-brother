<?php 
/* Template Name: Portfolio 
*/ 
get_header();

/*Getting  Portfolio Banner Image */
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
<div class="portfolio-page">
	<div class="portfolio-tab">
		<ul class="nav nav-tabs">
			<?php
			$i=1;
			$args = array( 'taxonomy' => 'portfolio_category','hide_empty'=> 0 , 'parent' => 0);
			$terms = get_terms('portfolio_category', $args);
			foreach ($terms as $term) 
			{
			?>
				<li class="<?php if($i==1){echo 'active';}?>" style="background-image:url('<?php echo z_taxonomy_image_url($term->term_id); ?>');">
					<a data-toggle="tab" href="#<?php echo $term->slug;?>">
						<figure>
						<?php 
							$service_icon_image=get_field('service_icon_image','portfolio_category_'.$term->term_id);	
						?>
							<img src="<?php echo $service_icon_image;?>" alt="service icon">
							
							<figcaption><?php echo $term->name;?></figcaption>
						</figure>
					</a>
				</li>
			<?php 
			$i++;
			}	
			?>
		</ul>
	</div>
	<div class="container">
		<div class="tab-content">
		<?php
		$a=1;
		$j=1;
		$k=1;
		$args = array (						
		'taxonomy' => 'portfolio_category',						
		);						
		$categories = get_terms ( $args );						
		foreach ( $categories as $category ) 
		{   							
			$args = array (							
				'post_type' => 'portfolio',							
				'posts_per_page' => -1,							
				'tax_query' => array(							
					array(							
					'taxonomy' => 'portfolio_category',							
					'field' => 'slug',							
					'order' =>  'DESC',							
					'terms' => $category->slug							
					)							
				)							
			);							
			$slug = $category->slug;							
			$cat_name = $category->name;							
			$query = new WP_Query( $args );							
			if ( $query->have_posts() ) 
			{
			?>
				<div id="<?php echo $slug;?>" class="tab-pane fade <?php if($j==1){echo 'in active';} ?>">
					<h2>Featured <?php echo $cat_name;?> Cabinets</h2>
					<div id="<?php echo $slug;?>Carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
						<?php
							$k=1;
							while($query->have_posts()) : $query->the_post();

							$selection_option=get_field('feature_or_other_selection_option',$query->ID);
							$string = $selection_option[0];
							
						     if(strtolower($selection_option[0])=='f')
						     {
								$featurethumb = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'large' );
							?>
								<div class="item <?php if($k==1){echo 'active';}?>" style="background-image:url('<?php echo $featurethumb['0'];?>');">
									<div class="portfolio-carousel-text">
										<h4><?php the_title();?></h4> <a href="<?php the_permalink();?>" class="red-btn" pd-data>View Project</a> 
									</div>
								</div>
					  <?php $k++; 
						    }
						endwhile; wp_reset_query();?>		

                        </div>
						<a class="left carousel-control" href="#<?php echo $slug;?>Carousel" data-slide="prev"> <span class="fa fa-angle-left"></span> </a>
						<a class="right carousel-control" href="#<?php echo $slug;?>Carousel" data-slide="next"> <span class="fa fa-angle-right"></span> </a>
					</div>
					
					
					<h2>Other <?php echo $cat_name;?> Cabinets</h2>
					<div class="owl-carousel owl-theme PortfolioCarousel">
					
						<?php while($query->have_posts()) : $query->the_post();
						
							  $selection_options=get_field('feature_or_other_selection_option',$query->ID);
							  if(strtolower($selection_options[0])=='o')
							  {
								$otherfeaturethumb = wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), 'large' );
						?>	
					
								<div class="item">
									<div class="other-Portfolio-post" style="background-image:url('<?php echo $otherfeaturethumb['0'];?>');">
										<div class="other-Portfolio-post-text">
											<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4> 
										</div>
									</div>
								</div>
						
						 <?php } endwhile; wp_reset_query();?>	

					</div>
					
					<div class="custom-pd-btn-group">
						<ul>
							<li><a href="#" class="red-btn" pd-data>View All Projects</a></li>
							<li><a href="#" class="red-btn blue-btn" pd-data>View Service</a></li>
						</ul>
					</div>
				</div>
			<?php	
			$j++;	
			}
			
			$a++;							
		}						
		?>    	
		</div>
	</div>
</div>
<?php 
get_sidebar('gallery');

get_footer();
?>