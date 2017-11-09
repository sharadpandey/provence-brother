<?php 
	/* Template Name: process 
	*/ 
	get_header();
	
/*Getting  process Banner Image */
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

<div class="section process-page">
	<div class="container">
		<?php
		$i=1;
		if( have_rows('process_step_repeater', $post->ID) ):
		
			while ( have_rows('process_step_repeater', $post->ID) ) : the_row();
			//getting all field from repeater
		
				$step_image = get_sub_field('step_image',$post->ID);
		
				$step_text = get_sub_field('step_text',$post->ID);
		
				$step_description = get_sub_field('step_description',$post->ID);
		?>

				<article>
					<figure style="background-image:url('<?php echo $step_image;?>');" alt="<?php echo 'Step-'.$i;?>">
						<figcaption><big><?php echo $i;?></big><?php echo $step_text;?></figcaption>
					</figure>
					
					<div class="process-text">
						<?php echo $step_description;?>
					</div>
				</article>
		<?php 
			$i++;
			endwhile;
			wp_reset_query();
		endif;
		?>
	</div>
</div>



<?php 
//getting the gallery from the sidebar	
get_sidebar('gallery');

get_footer();
?>