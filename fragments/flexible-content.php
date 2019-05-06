<?php
	// check if the flexible content field has rows of data
	if( have_rows('flexible_content_sections') ):
	
	    // loop through the rows of data
		while ( have_rows('flexible_content_sections') ) : the_row();
	
			if( get_row_layout() == 'general_content' ):
				
				$header = get_sub_field('general_content_header');
				$content = get_sub_field('general_content_text');
				$link = get_sub_field('general_content_button');
				
				?>
				<div class="flex-content general-content">
					
					<?php if( $header ): ?>
						<h3><?php echo $header; ?></h3>
					<?php endif; ?>
					
					<?php if( $content ): ?>
						<?php echo $content; ?>
					<?php endif; ?>
					
					<?php if( $button ): ?>
						<a href="<?php echo $button; ?>"></a>
					<?php endif; ?>
					
					<?php if( $link ): 						
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					
					<?php endif; ?>

				</div>
				
			<?php endif; ?>
			<?php endif; ?>
			
			<?php	
			if( get_row_layout() == '50_50_section' ):
				
				$header = get_sub_field('50_50_header');
				$content = get_sub_field('50_50_text');
				$image = get_sub_field('50_50_image');
				
				?>
				<div class="flex-content general-content">
					
					<?php if( $header ): ?>
						<h3><?php echo $header; ?></h3>
					<?php endif; ?>
					
					<?php if( $content ): ?>
						<?php echo $content; ?>
					<?php endif; ?>
					
					<?php if( $button ): ?>
						<a href="<?php echo $button; ?>"></a>
					<?php endif; ?>
					
					<?php if( $link ): 						
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					
					<?php endif; ?>

				</div>
			
			<?php endif; ?>
			<?php endif; ?>
			
		
			<?php
			
			elseif( get_row_layout() == 'gallery' ):

			    	if( have_rows('gallery_images') ):
		
					echo '<div class="row justify-content-center align-items-center">';
		
					// loop through the rows of data
				    while ( have_rows('gallery_images') ) : the_row();
		
						$image = get_sub_field('gallery_image');
						$columns = get_sub_field('gallery_columns');
		
						echo '<div class="col-lg-2 col-md-3 col-sm-4 col-6 text-center logo-col p-3 mb-3">';
						echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
						echo '</div>';
		
					endwhile;
		
					echo '</div>';
		
				endif;
		
				
			endif;
			
		endwhile;
			
	else :

    // no layouts found

	endif;

?>