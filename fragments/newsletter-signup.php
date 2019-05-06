<?php	
	$title = get_field('sign_up_title');
	$text = get_field('sign_up_text');
	$custom_overlay = get_field('sign_up_image_overlay_picker');
	$form = get_field('sign_up_form');
	$color = get_field('sign_up_bg_color');
?>

<section id="newsletter-signup" class="home-block">
	<div class="container-fluid">
		<div class="row">
			<?php 
				$image_1 = wp_get_attachment_image_src(get_field('signup_image_1'), 'full');
				$position_1 = get_field('image_1_pos');
				$overlay_1 = get_field('overlay_1');
				$custom_overlay_1 = get_field('custom_overlay_1');
				$image_2 = wp_get_attachment_image_src(get_field('signup_image_2'), 'full');
				$position_2 = get_field('image_2_pos');
				$overlay_2 = get_field('overlay_2');
				$custom_overlay_2 = get_field('custom_overlay_2');
			?>
			
			<?php if( $image_1 ): ?>
			
				<div class="col-md signup-image <?php echo $overlay_1; ?>" style="background-image:url(<?php echo $image_1[0]; ?>); background-size: cover; background-position: center <?php echo $position_1; ?>;">
					<img class="d-none" src="<?php echo $image_1[0]; ?>" alt="<?php echo $image_1['alt'] ?>" />
				</div>
			
			<?php endif; ?>
			
			<?php if( $image_2 ): ?>
			
				<div class="col-md signup-image <?php echo $overlay_2; ?>" style="background-image:url(<?php echo $image_2[0]; ?>); background-size: cover; background-position: center <?php echo $position_2; ?>;">
					<img class="d-none" src="<?php echo $image_2[0]; ?>" alt="<?php echo $image_2['alt'] ?>" />
				</div>
			
			<?php endif; ?>
			
			
			
			<!-- /end Image Repeater -->

			<!-- Form Half -->
			<div class="col-md-6 col-sm-12 signup <?php echo $color; ?> d-flex">
				
				<div class="inner wrap align-self-center">
					
					<?php if( $title ): ?>
						<header class="section-header">
							<h2 class="d-inline-flex mb-0 border-title top-left white<?php echo $style_news; ?>">
								<?php echo $title; ?>
							</h2>
						</header>
					<?php endif; ?>
					
					
					<?php if( $text ): ?>
						<div class="text-wrapper">
							<p><?php echo $text; ?></p>
						</div>
					<?php endif; ?>	
					
					
					<?php
						$form = get_field('sign_up_form');
						gravity_form($form, false, false, true, 10);
					?>
					
					
				</div> <!-- /end .inner.wrap -->
			
			</div> <!-- /end .col-lg-6.signup -->
		</div> <!-- /end .row-->
	</div> <!-- /end .container-fluid -->
</section> <!-- /end .newsletter-signup -->

<style type="text/css">
.overlay-custom-1:after {
	background-color: <?php echo $custom_overlay_1; ?>;
}

.overlay-custom-2:after {
	background-color: <?php echo $custom_overlay_2; ?>;
}

</style>