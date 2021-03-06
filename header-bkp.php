<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Challenger
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!--
	<link href="assets/plugins/mmenujs/jquery.mmenu.all.css" rel="stylesheet" />
	<script src="assets/plugins/mmenujs/jquery.mmenu.all.js"></script>
	<script src="assets/plugins/mmenujs/jquery.js"></script>
-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'challenger' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container d-flex justify-content-between align-items-center">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$challenger_description = get_bloginfo( 'description', 'display' );
				if ( $challenger_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $challenger_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<div class="nav-container">
				
				<div id="site-navigation" class="main-navigation">
					
<!-- 					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'challenger' ); ?></button> -->
					
					
					
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
				</div>
			
				<!-- Social Media Links -->
				<?php get_template_part( 'fragments/social', 'media' ); ?>
				
				<a href="#primary-menu" class="container-btn menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</a>
				
			</div><!-- #site-navigation -->
		</div>
		
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
