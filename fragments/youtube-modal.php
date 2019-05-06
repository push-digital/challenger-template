<?php

$youtube_id = get_field('youtube_id', 'option'); 
$title = get_field('popup_title', 'option');
$donate = get_field('donation_link', 'option');
$show = get_field('show_popup', 'option');
?>

<?php if( $show ): ?>

<div id="formModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<?php if( $title ): ?>
					<h4 class="text-center mb-0"><?php echo $title ?></h4>
				<?php endif; ?>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>	
			<div class="modal-bodyx">
				<div class="embed-responsive embed-responsive-16by9">

					<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0" id="video"  allowscriptaccess="always">></iframe>
					
				</div>
			</div>
			
			<div class="modal-footer">
				<?php if( $donate ): ?>
		        <a class="btn btn-primary" target="_blank" href="<?php echo $donate; ?>">Donate</a>
		        <?php endif; ?>
		        
		        <a class="btn btn-second" data-dismiss="modal">Close</a>
		    </div>
			
		</div>
	</div>
</div>


<script>
	jQuery(document).ready(function () {
	    jQuery('#formModal').modal('show');
	});
</script>


<?php endif; ?>