</div> <!-- closes the .site-content.container -->

<?php 
	$side_image = wp_get_attachment_image_src(get_field('side_banner_image','option'), 'full');
	$side_pos = get_field('side_banner_image_pos', 'option');
	$image = wp_get_attachment_image_src(get_field('news_banner_image','option'), 'full');
	$default_pos = get_field('news_banner_image_pos','option');
	$title = get_field('news_title_override', 'option');
	$hide = get_field('news_hide_side_banner', 'option');
	
	?>
	
<div class="page-banner primary-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg d-flex align-items-center overlay" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center <?php echo $default_pos; ?>;">
				
				<header class="page-header">
					<h1 class="d-inline-flex mb-0 wrap border-title top-left text-white secondary"><?php single_post_title(); ?></h1>
				</header>
				
			</div>
			
			<div class="col-lg-4 default-banner <?php echo $hide; ?>" style="background-image: url(<?php echo $side_image[0]; ?>); background-size: cover; background-position: center <?php echo $side_pos; ?>; height: 300px;"></div>
		</div>
	</div>
</div>