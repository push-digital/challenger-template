<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GOP
 */

?>

</div><!-- #content -->

<?php
	$paidFor = get_field('paid_for_text', 'option');
	$add_address = get_field('add_address', 'option');
	$poBox = get_field('footer_address_poBox', 'option');
	$street = get_field('footer_address_street', 'option');
	$city = get_field('footer_address_city', 'option');
	$state = get_field('footer_address_state', 'option');
	$zip = get_field('footer_address_zip', 'option');
	$disclaimeer = get_field('footer_disclaimer', 'option');
	$footerLinks = get_field('footer_links', 'option');
	$email = get_field('email_address', 'option');
	$phone = get_field('phone_number', 'option');
	$logo = wp_get_attachment_image_src(get_field('footer_logo','option'), 'medium');
	$logo_link = get_field('footer_logo_link', 'option');
	$add_contact = get_field('add_contact_info', 'option');
?>

	<footer id="colophon" class="site-footer text-center">
		<div class="site-info container">
			<?php if( $logo ): ?>
				<div class="logo-wrap">
					<?php if( $logo_link ): ?>
						<a href="<?php echo $logo_link; ?>">
					<?php endif; ?>
					
					<img class="img-fluid logo" src="<?php echo $logo[0]; ?>" alt="<?php echo get_the_title(get_field('footer_logo','options')) ?>" />
					
					<?php if( $logo_link ): ?>
					</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
			<div class="footer-links">
				<ul class="list-group list-group-horizontal-md">

					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'menu_class'        => 'list-unstyled mb-0 ml-0',
						) );
					?>
				</ul>
			</div>
			
			<?php get_template_part( 'fragments/social', 'media' ); ?>
			
			<?php if( $add_contact ): ?>
				<div class="details">
					
					<?php if( $add_address ): ?>
					
						<p class="mb-0"><?php if( $poBox ): ?>PO Box <?php echo $poBox; ?>,<?php endif; ?> <?php if( $street ): ?> <?php echo $street; ?>,<?php endif; ?> <?php if( $city ): ?><?php echo $city; ?>,<?php endif; ?> <?php if( $state ): ?><?php echo $state; ?><?php endif; ?> <?php if( $zip ): ?><?php echo $zip; ?><?php endif; ?>
					
					<?php endif; ?>
					
					<?php if($add_address == $email) { ?>
						<span class="divider">|</span>
					<?php } ?>
					
					
					<?php if(!$add_address) { ?><p class="mb-0"><?php } ?><?php if( $email ): ?><?php echo $email; ?> <?php endif; ?> <?php if( $phone ): ?> 
					
					<?php if($email || $phone) { ?><span class="divider">|</span><?php } ?> <?php echo $phone; ?>
						
					 <?php endif; ?></p>
					
				</div>
				
			<?php endif; ?>
			
			<?php if( $paidFor ): ?>
			
			<div class="paid-for">
				<p class="mb-0"><?php echo $paidFor; ?>
			</div>
			
			<?php endif; ?>
			
			<?php if( $disclaimeer ): ?>
				<div class="disclaimer">
					<p class="mb-0"><?php echo $disclaimeer; ?> &copy; <?php echo date("Y"); ?></p>				
				</div>	
			<?php endif; ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<style type="text/css">

.overlay:after {
	background-color: <?php the_field('image_overlay','option'); ?>;
}

.primary-bg {
	background-color: <?php the_field('primary_color','option'); ?>;
}

.secondary-bg {
	background-color: <?php the_field('secondary_color','option'); ?>;
}

.btn-donate {
	background-color: <?php the_field('secondary_color','option'); ?>;
}

</style>

<?php wp_footer(); ?>

</body>
</html>
