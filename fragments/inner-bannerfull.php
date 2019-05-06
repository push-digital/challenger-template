</div> <!-- closes the .site-content.container -->

<?php 

/*
	$default = wp_get_attachment_image_src(get_field('side_banner_image','option'), 'full');
	$default_pos = get_field('default_banner_image_pos','option');
*/
	$image = wp_get_attachment_image_src(get_field('banner_image'), 'full');
	$position = get_field('banner_image_pos');
	$title = get_field('title_override');
// 	$hide = get_field('hide_default_banner');
	
	?>
								
<div class="page-banner primary-bg d-flex align-items-center overlay" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center <?php echo $position; ?>; height: 300px;">
	<div class="container">
		<div class="row">
			<div class="col-md">
				<header class="page-header">
					<?php
						if(get_field('title_override')) {
							echo '<h1 class="d-inline-flex mb-0 wrap border-title top-left text-white secondary">' . get_field('title_override') . '</h1>';
						}
						else {
							echo '<h1 class="d-inline-flex mb-0 wrap border-title top-left text-white secondary">' . get_the_title() . '</h1>';						
						}
					?>
				</header>
				
			</div>	
		</div>
	</div>
</div>