<div class="footer-gallery">
	<div class="footer-gal-row">
		<?php 
		$i=0;
		if( have_rows('gallery_repeater', 8) ):

			while ( have_rows('gallery_repeater', 8) ) : the_row();
			//getting all field from repeater
			$gallery_image = get_sub_field('gallery_image',8);
		?>
				<div class="footer-gal-data" style="background-image:url('<?php echo $gallery_image;?>');"></div>
		<?php 
			$i++;
			endwhile;
			wp_reset_query();
		endif;
		?>
	</div>
</div>