<?php
	$title = get_the_title(); 
	$excerpt = get_the_excerpt();
	$date = get_the_date();
	$link = get_the_permalink();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$position = get_field('circle_image_pos');
	?>
	
<article class="news blog-page block">
	<div class="row">
		<?php if( $image ): ?>
			<div class="col-md-4">
				<div class="blog-img" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center <?php echo $position; ?>;"></div>
			</div>
		<?php endif; ?>
		
		<div class="col-md">
			<div class="inner">
				<a href="<?php echo $link; ?>"><h3><?php echo $title; ?></h3></a>
				<div class="post-meta">
					<p class="date mb-0"><?php echo $date; ?></p>
					<?php get_template_part( 'fragments/share', 'buttons' ); ?>
				</div>
				<p><?php echo $excerpt; ?></p>
				<a href="<?php echo $link; ?>" class="btn btn-read"><span>[</span> Read More <span>]</span></a>
			</div>
		</div>
	</div>
</article>