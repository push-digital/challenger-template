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

<!DOCTYPE html>

<html <?php language_attributes(); ?>>
	
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_template_part( 'fragments/youtube', 'modal' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'challenger' ); ?></a>

	<?php 
		$nav_theme = get_field('nav_theme', 'option');
	?>
	
	<header id="masthead" class="site-header <?php echo $nav_theme; ?>">
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
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>

					<div id="mySidenav" class="sidenav shadow-lg">
						
						<a href="javascript:void(0)" class="closebtn" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation" onclick="closeNav()">&times;</a>
						
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							) );
						?>
						
						<?php get_template_part( 'fragments/social', 'media' ); ?>
						
					</div> <!-- .site-navigation -->
											
				</div>
				

				<!-- Social Media Links -->
				<?php get_template_part( 'fragments/social', 'media' ); ?>
				
				<a href="#primary-menu" class="container-btn menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</a>
				<span class="hamburger" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">&#9776;</span>
				
			</div><!-- #site-navigation -->
		</div>
		
	</header><!-- #masthead -->

<script>
function openNav() {
	document.getElementById("mySidenav").style.width = "275px";
	
}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}

</script>


	<div id="content" class="site-content container">
