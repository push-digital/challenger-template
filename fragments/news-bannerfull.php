</div> <!-- closes the .site-content.container -->

<?php 

/*
	$default = wp_get_attachment_image_src(get_field('default_banner_image','option'), 'full');
	$position = get_field('news_banner_image_pos', 'option');
*/
	$image = wp_get_attachment_image_src(get_field('news_banner_image','option'), 'full');
	$default_pos = get_field('news_banner_image_pos','option');
	$title = get_field('news_title_override', 'option');
// 	$hide = get_field('news_hide_default_banner', 'option');
	
	?>
								
<div class="page-banner primary-bg d-flex align-items-center overlay" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center <?php echo $position; ?>; height: 300px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<header class="page-header">
					<header class="page-header">
						<h1 class="d-inline-flex mb-0 wrap border-title top-left text-white secondary"><?php single_post_title(); ?></h1>
					</header>

				</header>
				
			</div>
			
		</div>
	</div>
</div>
