<?php
/**
* Template Name: Coming Soon
*/

get_header('coming'); 
?>

	
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">	
		<?php
			$google = get_field('google_web_fonts');
			$adobe = get_field('adobe_typekit_fonts');
			$overlay = get_field('hero_overlay');			
			$title = get_field('hero_title_override');
			$form = get_field('form_id');
			$image = wp_get_attachment_image_src(get_field('hero_bg_image'), 'full');			
			$form = get_field('hero_logo');
			$text = get_field('hero_text');
			$donate_label = get_field('donate_btn_label');
			$donate_link = get_field('donate_link');
			$donate_size = get_field('donate_btn_size');
			$image_mobile = wp_get_attachment_image_src(get_field('hero_bg_image_mobile'), 'large');
			$copyright = get_field('hero_footer_copyright');
			$footer_line_2 = get_field('hero_footer_line_2');
			$footer_color = get_field('footer_color');
			$footer_pad = get_field('footer_pad');
		?>
		
		<div class="banner-wrapper overlay" style="background-image:url(<?php echo $image[0]; ?>); background-size: cover; position: relative;">
			<div class="banner-inner">
				<div class="section-wrapper top m-overlay">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-md-10">
								<div class="text-wrapper text-center">
									<?php if( $title ): ?>
										<h2 class="text-white title">
											<?php echo $title; ?>
										</h2>
									<?php endif; ?>
									
									<?php if( $text ): ?>
										<div class="general-text">
											<?php echo $text; ?>
										</div>
									<?php endif; ?>
									
									
									<?php $logo = wp_get_attachment_image_src(get_field('hero_logo'), 'full'); ?>
									<div class="section-wrapper logo p-3">
										<img class="img-fluid" src="<?php echo $logo[0]; ?>" alt="<?php echo get_the_title(get_field('hero_logo')) ?>" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="section-wrapper form">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-md-10">
								<?php 
									$form = get_field('hero_form');
									gravity_form($form, false, false, true, '', true, 1);
								?>
							</div>
						</div>
					</div>
				</div>	
				
				<div class="section-wrapper donate">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-8 col-md-10">		
								<?php if( $donate_link ): ?>
								
								<div class="btn-wrapper text-center">
									<a href="<?php echo $donate_link; ?>" target="_blank"  class="btn btn-color btn-lg"><?php echo $donate_label; ?></a>
								</div>
								
								<?php endif; ?>
					
								<?php get_template_part( 'fragments/button', 'link' ); ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="section-wrapper footer text-center text-white">
				
				<?php get_template_part( 'fragments/social', 'icons' ); ?>
			
				<?php if( $copyright ): ?>
				
				<div class="container">
					<p class="text-white copyright mb-1">Copyright &copy; <?php echo date("Y"); ?> <?php echo $copyright; ?></p>
				<?php endif; ?>
					
				<?php if( $footer_line_2 ): ?>
					<p class="text-white"><?php echo $footer_line_2; ?></p>
				<?php endif; ?>
				
				<?php if( $copyright ): ?>
				</div>
				<?php endif; ?>
				
				<?php 

					$link = get_field('footer_links');
					
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="footer-link text-white" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
				<?php endif; ?>
			
								
			</div>
		</div>
	</main>
</div>

<style type="text/css">

<?php if( $google ): ?>
	@import url(<?php echo $google; ?>);									
<?php endif; ?>

<?php if( $adobe ): ?>
	@import url(<?php echo $adobe; ?>);								
<?php endif; ?>

.btn-wrapper .btn.btn-color {
    background-color: <?php the_field('donate_btn_color'); ?>;
    border: 1px solid <?php the_field('donate_btn_color'); ?>;
}

.btn-wrapper .btn.btn-color:hover {
	color: <?php the_field('donate_btn_color'); ?>; 
	background-color: #fff;  
}

.gform_wrapper .gform_footer.top_label .gform_button.button {
	background-color: <?php the_field('donate_btn_color'); ?>;
	border: 1px solid <?php the_field('donate_btn_color'); ?>;
}

.gform_wrapper .gform_footer.top_label .gform_button.button:hover {
	color: <?php the_field('donate_btn_color'); ?> !important;
	background-color: #fff;
}

.footer {
    background-color: <?php the_field('footer_color'); ?>;
}

@media only screen and (max-width : 767px) {
	.section-wrapper.top {
		background-position: center <?php the_field('hero_bg_image_position_mobile'); ?>;
		background: url(<?php the_field('hero_bg_image_mobile'); ?>);
		background-size: cover;
		position: relative;
	}
	
	.section-wrapper.top.m-overlay:after {
	    content: '';
	    background-color: <?php the_field('hero_overlay'); ?>;
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    z-index: 0;
	}
}

.banner-wrapper {
	background-position: center <?php the_field('hero_bg_image_position'); ?>;
}

@media only screen and (max-width : 767px) {
	.banner-wrapper {
		background-position: center <?php the_field('hero_bg_image_position_mobile'); ?>;
	}
}

.overlay:after {
    content: '';
    background-color: <?php the_field('hero_overlay'); ?>;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
}

.banner-wrapper {
	position: relative;
    background-repeat: no-repeat;
} 

.banner-wrapper .section-wrapper {
	padding: 3rem 0;
	position: relative;
	z-index: 1;
}

.banner-wrapper .section-wrapper.top {
	padding: 2rem 0;
}
	
.banner-wrapper .section-wrapper.logo {
	margin-top: 2rem;
}

@media only screen and (max-width : 576px) {
	.banner-wrapper .section-wrapper.logo {
		margin-top: 1rem;
	}
}
	

.banner-wrapper .text-wrapper {
	position: relative;
	z-index: 1;
}
		

.banner-wrapper img.img-fluid {
	align-self: center;
	max-width: 300px;
}			


@media only screen and (max-width : 576px) {
	.banner-wrapper img.img-fluid {
		max-width: 210px;
		margin-top: 0;
	}
}
	
.banner-wrapper .footer {
    color: #fff;
    padding: 1.5rem 0;
    z-index:99;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
	font-size: 17px;
	font-family: @font_regular;
	position: relative;
	z-index: 9999999;
	padding: 3rem 0;
}

@media only screen and (max-width : 576px) {
	.banner-wrapper .footer {
		font-size: 1rem;
	}	
}

.page-template-template-coming-soon .content-area {
	margin: unset;
}


</style>

<?php
 get_footer('coming');