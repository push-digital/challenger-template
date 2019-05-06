<?php
	$title = get_the_title(); 
	$excerpt = get_the_excerpt();
	$date = get_the_date();
	$link = get_the_permalink();
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	$position = get_field('circle_image_pos');
	
	if(!$image){
		$image =  wp_get_attachment_image_src(get_field('default_blog_banner','option'), 'full');
		//$image =  get_field('default_blog_banner', 'option');
	}
	?>

<div class="col-12 col-lg-5 col-md-6 col-sm-10 ">
	<article class="news block text-center">
		
		<div class="blog-img" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center <?php echo $position; ?>;">
		</div>
		
		<div class="inner">
			<h3><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
			<div class="post-meta">
				<p class="date mb-0"><?php echo $date; ?></p>
				<?php get_template_part( 'fragments/share', 'buttons' ); ?>
			</div>
			
			<p><?php echo $excerpt; ?></p>	
			<a href="<?php echo $link; ?>" class="btn btn-read"><span>[</span> Read More <span>]</span></a>
					
		</div>
	</article>
</div>