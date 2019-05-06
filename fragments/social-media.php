<div class="social-wrapper">
	<ul class="list-inline mb-0">
		<?php if( have_rows( 'social_networks', 'option' ) ): ?>	
		  <?php while( have_rows( 'social_networks', 'option' ) ): the_row(); ?>
		    <li class="list-inline-item">
		    	<a target="_blank" href="<?php the_sub_field('social_link', 'option'); ?>" class="social-icon">
			    	<?php the_sub_field('social_icon', 'option'); ?>
			    </a>
			</li>
		  <?php endwhile; ?>
		<?php endif; ?>
	</ul>
</div>