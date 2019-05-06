<?php if( have_rows('featured_pages') ): ?>

<section id="featured-pages" class="home-block">	
	<div class="container-fluid">
		<div class="row">

			<?php while( have_rows('featured_pages') ): the_row(); 
				
				$image = get_sub_field('featured_page_image');
				$title = get_sub_field('featured_page_title');
				$position = get_sub_field('border_position');
				$color = get_sub_field('border_color');
				$link = get_sub_field('featured_page_link');
		
				?>
				
				<div class="col-lg feature block overlay" style="background-image:url(<?php echo $image['url']; ?>); background-size: cover; background-position: center center;">
					<?php if( $link ): ?>
						<a href="<?php echo $link; ?>">
					<?php endif; ?>
					
						<?php if( $title ): ?>
							<header class="block-header">
								<h2 class="title d-inline-flex border-title <?php echo $position; ?> <?php echo $color; ?>"><?php echo $title; ?></h2>
							</header>
						<?php endif; ?>
						
						
					<?php if( $link ): ?>
						</a>
					<?php endif; ?>
					
				</div>
		
			<?php endwhile; ?>

		</div>
	</div>
</section>

<?php endif; ?>





<?php /*

<section id="featured-pages" class="home-block">
			
	<div class="container-fluid">
		<div class="row">
			<div class="col-md feature block overlay" style="background-image:url('https://pushdigitalhosting.com/templates/challenger/wp-content/uploads/2012/07/manhattansummer.jpg'); background-size: cover; background-position: center center; height: 300px;">
				<header class="section-header">
					<h2 class="title d-inline-flex mb-0 p-3 top-left white">Issues Pillar One</h2>
				</header>
			</div>
			
			<div class="col-md feature block overlay" style="background-image:url('https://pushdigitalhosting.com/templates/challenger/wp-content/uploads/2014/01/dsc20050315_145007_132.jpg'); background-size: cover; background-position: center center; height: 300px;">
				<header class="section-header">
					<h2 class="title d-inline-flex mb-0 p-3 top-right white">Issues Pillar One</h2>
				</header>
			</div>
			
			<div class="col-md feature block overlay" style="background-image:url('https://pushdigitalhosting.com/templates/challenger/wp-content/uploads/2013/09/dsc20040724_152504_532.jpg'); background-size: cover; background-position: center center; height: 300px;">
				<header class="section-header">
					<h2 class="title d-inline-flex mb-0 p-3 bot-left white">Issues Pillar One</h2>
				</header>
			</div>
			
		</div>
	</div>
</section>

*/ ?>