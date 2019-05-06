<?php
	$header = get_field('signup_form_headline');
	$text = get_field('signup_form_subtext');
	$style = get_field('signup_form_style');
	$form = get_field('signup_form');
?>

<section class="signup-form <?php echo $style; ?> text-center">

	<?php if( $header ): ?>
		<header class="section-title text-center"><h2 class="title d-inline-flex border-title top-left"><?php echo $header; ?></h2></header>
	<?php endif; ?>
	
	<?php if( $text ): ?>
		<p><?php echo $text; ?></p>
	<?php endif; ?>
	
	<div class="form-wrapper">
		<?php 
			$form = get_field('signup_form');
			gravity_form($form, false, false, true, '', true, 86);
		?>
	</div>

</section>