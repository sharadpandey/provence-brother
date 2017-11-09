<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri());?>/assets/images/favicon.png">
</head>

<body <?php body_class(); ?>>
<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="logo">
				<a href="<?php echo site_url()?>"><img src="<?php the_field('header_logo','options');?>" alt="Provence Brothers"></a>
			</div>
			<div class="header-tagline">
				<p><?php the_field('header_text','options');?></p>
			</div>
			<div class="header-right">
				<ul>
					<li><a href="tel:<?php $string=get_field('header_phone',"options"); echo $string = str_replace(['(', '+', ' ',')'], '', $string);?>">
						<?php the_field('header_phone',"options");?></a></li>
					<li><a href="mailto:<?php the_field('header_email','options');?>"><?php the_field('header_email','options');?></a></li>
				</ul>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<!--START CODE USE FOR GETTING FOOTER MENU-->
					<?php

						$defaults = array(
						'theme_location'  => '',
						'menu'            => 'Header_menu',
						'container'       => '',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => ''
						);

						wp_nav_menu( $defaults );
					?>
					<!--END OF CODE USE FOR GETTING FOOTER MENU-->
				</ul>
			</div>
		</div>
	</nav>
</header>
