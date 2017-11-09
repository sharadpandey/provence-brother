<?php 
/* Template Name: Our History 
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


<div class="section history-page">
	<div class="container">
	
		<figure class="img-left rounded-border"> '
			<?php
				/*Getting history_introduction Image */
				$history_introduction_image=get_post_meta($post->ID,"history_introduction_image",true);
				$history_introduction = wp_get_attachment_image_src($history_introduction_image, 'full');	

				if(!empty($history_introduction))
				{
				?>
					<img src="<?php echo $history_introduction[0];?>"> 
				<?php 
				}
				else
				{
				?>		
					<img src="http://placehold.it/458x296&amp;text=No image found" alt="our-team-intro"> 
				<?php	
				}
				?>	
			</figure>
            
			<?php the_field('history_introduction_description',$post->ID);?>
		
		
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="history-timeline">
					<ul>
					<?php 
						$i=1.4;
						$j=1;
						if( have_rows('history_repeater', $post->ID) ):

							while ( have_rows('history_repeater', $post->ID) ) : the_row();
							//getting all field from repeater
						  
								$history_image = get_sub_field('history_image',$post->ID);
						   
								$history_description = get_sub_field('history_description',$post->ID);
						?>
								<li class="<?php if(empty($history_description)){ echo 'no-text';}?>" >
									<?php
									if($j%2==0)
									{
								
										if(!empty($history_description))
										{
										?>
											<div class="history-text-cover wow fadeIn" data-wow-duration="<?php echo $i;?>s">
												<div>
													<?php echo $history_description;?>
												</div>
											</div>
										<?php
										}												
										if(!empty($history_image))	
										{
										?>
											<figure style="background-image:url('<?php echo $history_image;?>');" class="wow fadeIn" data-wow-duration="<?php echo $i;?>s"></figure>
										
										<?php
										}	
										
										
									}
									else
									{
								
										if(!empty($history_image))	
										{
										?>
											<figure style="background-image:url('<?php echo $history_image;?>');" class="wow fadeIn" data-wow-duration="<?php echo $i;?>s"></figure>
										
										<?php
										}	
										 
										if(!empty($history_description))
										{
										?>
											<div class="history-text-cover wow fadeIn" data-wow-duration="<?php echo $i;?>s">
												<div>
													<?php echo $history_description;?>
												</div>
											</div>
										<?php
										}	
									
									}	
									
									?>	
								</li>
								
						<?php 
							$i++;
							$j++;
							endwhile;
							wp_reset_query();
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="text-center"> <a href="<?php echo the_permalink(22);?>" pd-data class="red-btn">Contact Us</a> </div>
	</div>
</div>
<?php 
//getting the gallery from the sidebar	
get_sidebar('gallery');

get_footer();
?>