<?php
$post_id=8;
/*Getting  review_section_bg_image */
$review_section_bg_image=get_post_meta($post_id,"review_section_bg_image",true);
$review_section_bg = wp_get_attachment_image_src($review_section_bg_image, 'full');	

if(!empty($review_section_bg))
{
?>
	<div class="section info-section" style="background-image:url('<?php echo $review_section_bg[0];?>');">
<?php 
}
else
{
?>		
	<div class="section info-section" style="background-image:url('http://placehold.it/1349x484&amp;text=No image found');">
<?php	
}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<figure>
					<?php
					/*Getting  customer_review_image */
					$customer_review_image=get_post_meta($post_id,"customer_review_image",true);
					$customer_review = wp_get_attachment_image_src($customer_review_image, 'full');	

					if(!empty($customer_review))
					{
					?>
						<img src="<?php echo $customer_review[0];?>" alt="Info">
					<?php 
					}
					else
					{
					?>		
						<img src="http://placehold.it/360x260&amp;text=No image found" alt="Info">
					<?php	
					}
					?>
				</figure>
			</div>
			
			<div class="col-md-8">
				<?php the_field('customer_review_description',$post_id);?>
			</div>
		</div>
	</div>
</div>