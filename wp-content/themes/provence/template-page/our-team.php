<?php 
/* Template Name: Our Team 
*/ 
get_header();

/*Getting  Our Team Banner Image */
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
    <div class="section our-team-page">
        <div class="container">
		
            <figure class="img-left rounded-border"> '
			<?php
				/*Getting intero_image Image */
				$intero_image=get_post_meta($post->ID,"intero_image",true);
				$intero_img = wp_get_attachment_image_src($intero_image, 'full');	

				if(!empty($intero_img))
				{
				?>
					<img src="<?php echo $intero_img[0];?>"> 
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
            
			<?php the_field('intero_description',$post->ID);?>
			
        </div>
        <div class="our-team-view">
            <div class="container">
                <div class="row">
				<?php
				$i=0;
				if( have_rows('our_team_repeater', $post->ID) ):

					while ( have_rows('our_team_repeater', $post->ID) ) : the_row();
					//getting all field from repeater
				  
						$member_image = get_sub_field('member_image',$post->ID);
				   
						$member_name = get_sub_field('member_name',$post->ID);

						$member_desgination = get_sub_field('member_desgination',$post->ID);
				?>
							
							
							<div class="col-md-4">
								<div class="our-team-post">
									<figure style="background-image:url('<?php echo $member_image;?>');"></figure>
									<div class="our-team-info">
										<h4><?php echo $member_name;?></h4>
										<p><?php echo $member_desgination;?></p> 
										<a href="<?php the_permalink(22);?>" class="red-btn" pd-data>Contact Us</a> </div>
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
    </div>
<?php 
//getting the customer review from the sidebar	
get_sidebar('customer_review');

//getting the gallery from the sidebar	
get_sidebar('gallery');

get_footer();
?>