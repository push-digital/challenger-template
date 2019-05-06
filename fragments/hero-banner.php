</div> <!-- closes the .site-content.container -->

<?php
	$hero_image = wp_get_attachment_image_src(get_field('hero_bg_image'), 'full');
	$overlay = get_field('hero_overlay');
	$position = get_field('hero_bg_image_pos');
	$image_right = wp_get_attachment_image_src(get_field('hero_image_right'), 'full');
	$image_left = wp_get_attachment_image_src(get_field('hero_image_left'), 'full');
	$left_pos = get_field('hero_image_left_pos');
	$right_pos = get_field('hero_image_right_pos');
	$hero_bg_pad = get_field('hero_bg_pad');
	$bg_color = get_field('hero_bg_color');
	$title = get_field('action_title');
	$title_style = get_field('action_title_style');
	$sub_title = get_field('action_subtitle');
	$text = get_field('action_text');
	$color = get_field('action_title_color');
?>

<section id="home-hero" class="hero-wrap flex-section" style="background-color: <?php echo $bg_color; ?>; background-image:url(<?php echo $hero_image[0]; ?>); background-position: center <?php echo $position; ?>;">
	<div class="left-half d-flex justify-content-center hero-overlay" style="background-image:url(<?php echo $image_left[0]; ?>); background-size: cover; background-position: center <?php echo $left_pos; ?>;">
		<div class="inner wrap align-self-center">
			
			<?php if( $title ): ?>
				<header class="hero-title">
					<h1 class="d-inline-flex border-title mb-0 <?php echo $title_style; ?> white <?php echo $color; ?>"><?php echo $title; ?></h1>
					<?php if( $sub_title ): ?><h2 class="mb-0 <?php echo $color; ?>"><?php echo $sub_title; ?></h2><?php endif; ?>
				</header>
			<?php endif; ?>
			
			
			
			<?php if( $text ): ?>
				<p class="<?php echo $color; ?>"><?php echo $text; ?></p>
			<?php endif; ?>
			
			<?php
				$form = get_field('hero_form');
				gravity_form($form, false, false, true, 86);
			?>
		</div>
	</div>
	
	<?php if( get_field('add_bg_image_right') ): ?>
		<div class="right-half" style="background-image:url(<?php echo $image_right[0]; ?>); background-size: cover; background-position: center <?php echo $right_pos; ?>;">
		</div>
	<?php endif; ?>
				
</section>


<style type="text/css">

.hero-overlay:after {
	background-color: <?php echo $overlay; ?>;
}

</style>