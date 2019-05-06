<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Challenger
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	
	
	<section class="widget widget-pad donate-widget gray-bg">
		<?php get_template_part( 'fragments/donate', 'buttonsnews' ); ?>
	</section> <!-- donate buttons -->
	
	<div class="secondary-bg">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->


