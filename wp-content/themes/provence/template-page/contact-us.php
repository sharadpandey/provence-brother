<?php 
/* Template Name: Contact Us 
*/ 
get_header();

/*Getting  Contact Us Banner Image */
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
    <div class="section contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="contact-form">
                        <h3>Contact Us</h3>
                        <!--<form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name"> </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name"> </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email"> </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" placeholder="Phone"> </div>
                            <div class="form-group full-size">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="red-btn" pd-data>Submit</button>
                            </div>
                        </form>-->
						<?php echo do_shortcode('[contact-form-7 id="167" title="Contact form for Contact Us Page"]'); ?>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-5 col-xs-12">
                    <div class="contact-sidebar">
                        <ul>
                            <li>
                                <div> <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/mobile-icon.png"> </div>
                                <div> <a href="tel:<?php $string=get_field('header_phone',"options"); echo $string = str_replace(['(', '+', ' ',')'], '', $string);?>"><?php the_field('header_phone',"options");?></a> </div>
                            </li>
                            <li>
                                <div> <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/email-icon.png"> </div>
                                <div> <a href="mailto:<?php the_field('header_email','options');?>"><?php the_field('header_email','options');?></a> </div>
                            </li>
                            <li>
                                <div> <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/location-icon.png"> </div>
                                <div> <?php the_field('address',$post->ID);?> </div>
                            </li>
                            <li>
                                <div> <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/images/social-icon.png"> </div>
                                <div> <a href="#">info@provencebrothers.com</a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-location-map">
	<?php
        $location=get_post_meta($post->ID, 'contact_us_map', TRUE);
		if( !empty($location) ):
		?>
		<div class="acf-map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
		</div>
		<?php endif; ?>
    </div>
	
   <?php 
//getting the customer review from the sidebar	
get_sidebar('customer_review');

//getting the gallery from the sidebar	
get_sidebar('gallery');
?>
	
	

<?php get_footer();?>