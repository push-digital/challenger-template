<?php
	$link = get_field('donation_link', 'option');
	$text = get_field('sidebar_widget_text', 'option');
	$submit = get_field('sidebar_submit_label', 'option');
	$buttons = get_field('sidebar_donation_buttons', 'option');
	$columns = get_field('sidebar_donation_button_columns', 'option');
	$bg_color = get_field('sidebar_donation_bg_color', 'option');
?>

<?php if( $text ): ?>
	<p><?php echo $text; ?></p>
<?php endif; ?>

<div class="donate-btn-wrap container">
	<form action="<?php echo $link; ?>" method="get" target="_blank">
		<div class="row">
			<?php
				$counter = 0;
				
				if( have_rows('sidebar_donation_buttons', 'option') ):

				while( have_rows('sidebar_donation_buttons', 'option') ): the_row();
				
				$counter++;
				
				$value = get_sub_field('sidebar_donate_values');
									
				if( $value ): ?>
				
				<div class="<?php echo $columns; ?> pl-1 pr-1">
				
					<div class="donate-amount">
			            <input name="amount" type="radio" id="value<?php echo $counter; ?>" value="<?php echo $value; ?>" />
						<label for="value<?php echo $counter; ?>">[ $<?php echo $value; ?> ]</label>
				    </div>
				    
				</div>
				        
			    <?php endif; ?>			       					

			  <?php endwhile; ?>
			<?php endif; ?>
			
			
			<?php if( $submit ): ?>
				<div class="col-sm-12 pl-1 pr-1">
					<div class="donate-submit">
						<input type="submit" value="<?php echo $submit; ?>" />
					</div>
				</div>	
			<?php endif; ?>
			
		</div>
	</form>
</div>