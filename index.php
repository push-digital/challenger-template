<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Challenger
 */

get_header();
?>

<?php if( get_field('banner_style', 'option') == 'banner-contained' ): ?>
	
	<?php get_template_part( 'fragments/news', 'banner' ); ?>
	
<?php endif; ?>
	

<?php if( get_field('banner_style', 'option') == 'banner-full' ): ?>
	
	<?php get_template_part( 'fragments/news', 'bannerfull' ); ?>
	
<?php endif; ?>	

<div class="container">
	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-lg-8">
		
			<?php
				if ( have_posts() ) :
			
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
			
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
			
						get_template_part( 'template-parts/content', 'blog' );
			
					endwhile;
					
					yourtheme_paging_nav();
// 					the_posts_navigation();
			
				else :
			
					get_template_part( 'template-parts/content', 'none' );
			
				endif;
			?>
		</main><!-- #main -->
	
		<aside class="col-lg-4">
			<?php get_sidebar('news'); ?>
		</aside>
	</div><!-- #primary -->
	
	<div class="row justify-content-center">
		<div class="col-md-8 col-sm-10">
			<hr />
		</div>
	</div>
</div>

<?php
get_footer();