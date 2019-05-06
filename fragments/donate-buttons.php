<?php
	$link = get_field('donation_link', 'option');
	$submit = get_field('submit_label');
	$buttons = get_field('donate_value_buttons');
?>

<div class="home-form donate-btn-wrap">
	<form action="<?php echo $link; ?>" method="get" target="_blank">
		<div class="d-flex donate-btn-inner">
			
				<?php
					$counter = 0;
					
					if( have_rows('donate_value_buttons') ):
	
					while( have_rows('donate_value_buttons') ): the_row();
					
					$counter++;
					
					$value = get_sub_field('button_value');
					$id = get_sub_field('button_id');		
					
						
					if( $value ): ?>
						
					<div class="donate-amount">
			            <input name="amount" type="radio" id="value<?php echo $counter; ?>" value="<?php echo $value; ?>" />
						<label for="value<?php echo $counter; ?>">[ $<?php echo $value; ?> ]</label>
				    </div>
					        
				    <?php endif; ?>			       					
	
				  <?php endwhile; ?>
				<?php endif; ?>
				
				
				<?php if( $submit ): ?>
					<div class="donate-submit">
	                	<input type="submit" value="<?php echo $submit; ?>" />
					</div>
				<?php endif; ?>
			</div>	
	
	</form>
</div>



<?php /*
	

<div class="home-form donate-btn-wrap">
    <form class="" action="https://secure.anedot.com/contribute-testa-for-senate/donate" method="get">
        <div class="row align-items-center">
            <div class="donate-amount">
                <input name="amount" type="radio" id="test1" value="25" />
                <label for="test1">[ $25 ]</label>
            </div>
            <div class="donate-amount">
                <input name="amount" type="radio" id="test2" value="50" />
                <label for="test2">[ $50 ]</label>
            </div>
            <div class="donate-amount">
                <input class="with-gap" name="amount" type="radio" id="test3" value="100"  />
                <label for="test3">[ $100 ]</label>
            </div>
            <div class="donate-submit">
                <input type="submit" value="Contribute Today!" />
            </div>
        </div>
    </form>
</div>

	

<?php
				    
    $home_contribute = get_field('home_contribute');
    
    if($home_contribute): 
        //$cb_title = $home_contribute['cb_title'];
        $cb_content = $home_contribute['cb_content'];
?>


<!-- Start Contribute -->
 <div class="home-contribute space-section title-section" id="home-contribute">
	
    <?php echo $cb_content;?>

</div>
<!-- End Contribute -->

<?php endif; ?>


*/ ?>