<aside id="secondary" class="widget-area">
	
	
	<?php dynamic_sidebar( 'news_right_1' ); ?>
	
	<?php dynamic_sidebar( 'news_right_2' ); ?>
	
	<!-- Donation Buttons -->
	<section class="widget connect-widget">
		<header class="section-header">
			<h3 class="d-inline-flex border-title top-right">Stay Connected</h3>
		</header>
		<?php get_template_part( 'fragments/social', 'media' ); ?>
	</section>
	
	<!-- Donation Buttons -->
	<section class="widget widget-pad donate-widget gray-bg">
		<?php get_template_part( 'fragments/donate', 'buttonsnews' ); ?>
	</section>
	
	<div class="secondary-bg">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->