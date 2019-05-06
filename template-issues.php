<?php
/**
* Template Name: XIssues
*/
get_header(); 
?>

<?php if( get_field('banner_style', 'option') == 'banner-contained' ): ?>
	
	<?php get_template_part( 'fragments/inner', 'banner' ); ?>
	
<?php endif; ?>

<?php if( get_field('banner_style', 'option') == 'banner-full-width' ): ?>
	
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
			<?php get_template_part( 'fragments/issues', 'repeater' ); ?>
			
		</main><!-- #main -->
			
		<aside class="col-lg-4">
			<?php get_sidebar(); ?>
		</aside>
			
	</div><!-- #primary -->
	
	<hr />
	
</div>



		


<?php
get_footer();