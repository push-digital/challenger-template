<?php
/**
* Template Name: Homepage
*/

get_header(); 
?>

<!-- Hero -->
<?php get_template_part( 'fragments/hero', 'banner' ); ?>
	
<div id="primary" class="content-area">	
	<main id="main" class="site-main" role="main">
		

		<!-- Donation Section -->
		<section id="donations" class="home-block text-center">
			<div class="container">
				<?php 
					$title_donation = get_field('donation_header');
					$text_donation = get_field('donation_text');
					$border = get_field('donation_border_position');
					$color = get_field('donation_header_border_color');
				?>
				
				<?php if( $title_donation ): ?>
					<header class="section-header">
						<h2 class="d-inline-flex border-title <?php echo $border; ?> <?php echo $color; ?>"><?php echo $title_donation; ?></h2>
					</header>
				<?php endif; ?>
				
				
				<?php if( $text_donation ): ?>
					<div class="text-wrapper">
						<p><?php echo $text_donation; ?></p>
					</div>
				<?php endif; ?>
				
			
				<!-- Donation Buttons -->
				<?php get_template_part( 'fragments/donate', 'buttons' ); ?>
				
			</div>
		</section>
		
	
		<!-- Newsletter Signup -->
		<?php get_template_part( 'fragments/featured', 'pages' ); ?>
	
	
		<?php
			$news_header = get_field('latest_news_header');
			$border = get_field('news_border_position');
			$color = get_field('news_border_color');
			$card_link = get_field('latest_news_card_link');
			$num_posts = get_field('number_of_posts');
			$read_more = get_field('read_more_link');
		?>
		
		
		<!-- News Section -->
		<section id="news" class="home-block text-center">
			<div class="container">
				
				<?php if( $news_header ): ?>
					<header class="section-header">
						<h2 class="d-inline-flex border-title mb-0 <?php echo $border; ?> <?php echo $color; ?>"><?php echo $news_header; ?></h2>
					</header>
				<?php endif; ?>
				
				<?php 
					$posts = get_posts(array(
						'post_type' 		=> 'post',
						'posts_per_page' 	=> '' . $num_posts . '',
						'order' 			=> 'DESC'
					));
					
					if( $posts ): ?>
						
						<div class='row justify-content-around news-posts'>
							
							<?php foreach( $posts as $post ): 
								
								setup_postdata( $post );
								
								?>
								
								<?php get_template_part( 'template-parts/content', 'recent' ); ?>
							
								
							<?php endforeach; ?>
						
						</div>
						
						<?php wp_reset_postdata(); ?>
					
					<?php endif; ?>
			
					<?php 
					
					$link = get_field('latest_news_btn');
					$label = get_field('latest_news_btn_label');
					
					if( $link ): ?>

						<div class="row justify-content-center mt-4">
							<div class="text-center">
								<a class="btn btn-primary btn-lg" href="<?php echo $link; ?>"><?php echo $label; ?></a>
							</div>
						</div>
						
					<?php endif; ?>
					
			</div>
		</section>
		
		
		<!-- Newsletter Signup -->
		<?php get_template_part( 'fragments/newsletter', 'signup' ); ?>
		
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();