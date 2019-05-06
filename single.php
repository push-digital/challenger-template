<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Challenger
 */

get_header();
?>

<div id="primary" class="content-area row">
	
	<main id="main" class="site-main col-lg-8">

		<?php
			while ( have_posts() ) :
				the_post();
	
				get_template_part( 'template-parts/content', get_post_type() );
	
				the_post_navigation();
	
			endwhile; // End of the loop.
		?>		

		
		<!-- Sign Up Form -->
		<?php if( get_field('add_signup_form') ): ?>
	
			<?php get_template_part( 'fragments/signup', 'form' ); ?>
	
		<?php endif; ?>
		
			
	</main><!-- #main -->
	
	<aside class="col-lg-4">
		<?php get_sidebar(); ?>
	</aside>
	
	
		
</div><!-- #primary -->

<div class="row justify-content-center">
	<div class="col-md-8 col-sm-10">
		<hr />
	</div>
</div>

<?php
get_footer();
