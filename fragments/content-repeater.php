<?php if( have_rows('content_repeater') ): ?>

<section id="issues-section">

	<?php while( have_rows('content_repeater') ): the_row(); 

		$image = get_sub_field('image');
		$title = get_sub_field('title');
		$position = get_sub_field('border_position');
		$color = get_sub_field('border_color');
		$content = get_sub_field('content');
		$link = get_sub_field('link');

		?>

		<div class="issue-wrap">
			<div class="block overlay" style="background-image:url(<?php echo $image['url']; ?>); background-size: cover; background-position: center center;">
				<?php if( $link ): ?>
					<a href="<?php echo $link; ?>">
				<?php endif; ?>
					
					<div class="inner wrap">
						<?php if( $title ): ?>
							<header class="block-header">
								<h2 class="title d-inline-flex border-title <?php echo $position; ?> <?php echo $color; ?>"><?php echo $title; ?></h2>
							</header>
	
						<?php endif; ?>
					</div>
				
				<?php if( $link ): ?>
					</a>
				<?php endif; ?>
			</div>
			
			<?php if( $content ): ?>
				<div class="issue-caption">
				 	<?php echo $content; ?>
				</div>
			<?php endif; ?>

		</div>

	<?php endwhile; ?>

</section>

<?php endif; ?>


<?php /*
<?php if( have_rows('issues') ): ?>
	<section id="issues-section">	

		<?php while( have_rows('issues') ): the_row(); 
				
			//$image = wp_get_attachment_image_src(get_field('issue_image'));
			
			$image = wp_get_attachment_image_src(get_field('issue_image'), 'full');
			$title = get_sub_field('issue_title');
			$style = get_sub_field('issue_title_style');
			$content = get_sub_field('issue_content');
			$link = get_sub_field('issue_link');
	
			?>
				
			<div class="issue-wrap">
				<!-- <?php if( $link ): ?> -->
				<a href="<?php echo $link; ?>">
				<!-- <?php endif; ?> -->
			
					<div class="block overlay" style="background-image:url('https://pushdigitalhosting.com/templates/challenger/wp-content/uploads/2011/01/canola2.jpg'); background-size: cover; background-position: center center; height: 400px;">
<!-- 					<div class="block overlay" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; background-position: center center; height: 400px;">				 -->
						<div class="inner wrap">
							<?php if( $title ): ?>
								<span class="border-<?php echo $style; ?>"><h2 class="title top-left mb-0"><?php echo $title; ?></h2></span>
							<?php endif; ?>
						</div>
					</div>
					
					<!-- <?php if( $link ): ?> -->
				</a>
				<!-- <?php endif; ?> -->
					
				<?php if( $content ): ?>
					<div class="issue-caption"><?php echo $content; ?></div>
				<?php endif; ?>
			</div>
		
		<?php endwhile; ?>

	
	</section>

<?php endif; ?>


*/ ?>	
	
	
	
	
				

	








<!--

<div class="issue-wrap">
	<div class="block overlay" style="background-image:url('https://pushdigitalhosting.com/templates/challenger/wp-content/uploads/2012/07/manhattansummer.jpg'); background-size: cover; background-position: center center; height: 400px;">
		<div class="inner wrap">
			<h2 class="title top-left mb-0">Issues Pillar One</h2>
		</div>
	</div>
	<div class="issue-caption">
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
	</div>
</div>	
-->