<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Challenger
 */

get_header();
?>

<?php if( get_field('banner_style', 'option') == 'banner-contained' ): ?>
	
	<?php get_template_part( 'fragments/inner', 'banner' ); ?>
	
<?php endif; ?>
	

<?php if( get_field('banner_style', 'option') == 'banner-full' ): ?>
	
	<?php get_template_part( 'fragments/inner', 'bannerfull' ); ?>
	
<?php endif; ?>	

<div class="container">
	<div id="primary" class="content-area row justify-content-between">
		
		<main id="main" class="site-main col-lg-7">
			<?php
				while ( have_posts() ) :
					the_post();
		
					get_template_part( 'template-parts/content', 'page' );
			
				endwhile; // End of the loop.
			?>
			
			<!-- Issues Repeater -->
			<?php get_template_part( 'fragments/content', 'repeater' ); ?>
			
		</main><!-- #main -->
			
		<aside class="col-lg-4">
			<?php get_sidebar(); ?>
		</aside>
			
	</div><!-- #primary -->
	
	<hr />
</div>



<?php
get_footer();