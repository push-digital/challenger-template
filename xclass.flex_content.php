<?php
class flex_content_builder{
	
	private $main_page_id = '';
	private $content = false;
	private $flex_content_data = false;
	private $flex_content_html = false;
	
	function __construct($id){
		if($id){
			$this->main_page_id = $id;
		} else {
			die('FATAL ERROR!');	
		}
		$this->flex_content_data = get_field('flexible_content_sections',$this->main_page_id);
		$this->build_flex_content();
	}
	
	public function get_section_content_html(){
		return $this->flex_content_html;
	}
	
	private function build_flex_content(){
		$html = '';	
		if($this->flex_content_data){
			foreach($this->flex_content_data as $section){

				$section_layout = $section['acf_fc_layout'];
				
				switch($section_layout){
					
					case 'flexible_content_section_general_content':
						$html .= $this->build_section_general_content($section);
						break;
					
					case 'flexible_content_section_form':
						$html .= $this->build_section_form($section);
						break;
					
					case 'flexible_content_section_icon_grid':
						$html .= $this->build_section_icon_grid($section);
						break;
						
					case 'flexible_content_section_card_grid':
						$html .= $this->build_section_card_grid($section);
						break;
					
					case 'flexible_content_section_cpt_feed':
						$html .= $this->build_section_cpt_feed($section);
						break;
					
					case 'flexible_content_section_testimonial_carousel':
						$html .= $this->build_section_testimonial_carousel($section);
						break;
					
					case 'flexible_content_section_cpt_feed_list':
						$html .= $this->build_section_cpt_feed_list($section);
						break;		
					
					case 'flexible_content_section_full_width_block':
						$html .= $this->build_section_full_width_card($section);
						break;	
					
					
				}
			}
			$this->flex_content_html = $html;
		}
	}
		
	//BUILD General Content////////////////////////////////////////////////////////////
	private function build_section_general_content($data){
		$html = '';
		if($data){

			$title = $data['flexible_content_section_general_content_title'];
			$style = $data['flexible_content_section_general_content_title_style'];
		
			if($title || $style) {
				$title_content = '<div class="col-md-12"><header class="section-title text-center"><h2 class="' . $style . '">' . $title . '</h2></header></div>';
			}
			
			$background_color =  $data['flexible_content_section_general_content_background_color'];
			$background_image =  $data['flexible_content_section_general_content_background_image'];
			$padding_top =  $data['flexible_content_section_general_content_padding_top'];
			$padding_bottom =  $data['flexible_content_section_general_content_padding_bottom'];
			$background_style_html = 'style="background-position: center center; background-size: cover; background-color: ' . $background_color . '; padding-top: ' . $padding_top . 'px; padding-bottom: ' . $padding_bottom . 'px"';
			
			$content = $data['flexible_content_section_general_content_content'];
			$link_type = $data['flexible_content_section_general_content_link_type'];
			$internal = $data['flexible_content_section_general_content_internal_link'];
			$external = $data['flexible_content_section_general_content_external_link'];
			$file = $data['flexible_content_section_general_content_file_link'];
			$link_text = $data['flexible_content_section_general_content_link_text'];	
			$flex_link = '';
			$target = '';
			
			if($link_type == 'internal'){
				$flex_link = $internal;
			
			} elseif($link_type == 'external'){
				$flex_link = $external;
				$target = 'target="_blank"';
			
			} elseif($link_type == 'file'){
				$flex_link = $file;
				$target = 'target="_blank"';
			}
			
			if($link_type !== 'none'){
				$link_content = '<div class="col-md-12 text-center button-wrap"><a href="' . $flex_link . '" ' . $target . ' class="btn btn-lg btn-rose">' . $link_text . '</a></div>';
			}
	
			if($content){
				$html .= '
				
				<section class="flex-section general-flex-content-wrapper" ' . $background_style_html . '>
					<div class="flex-bg-img" style="background:url(\'' . $background_image . '\'); background-size: cover; background-position: center center;"></div>
					<div class="container">
						<div class="row">'
						. $title_content . '
							<div class="col-md-12">	
								<div class="inner-content-wrapper">' . $content . '</div>
							</div>
							' . $link_content . '
						</div>
					</div>
				</section>
				';
			}				
			return $html;
		}
	}
	//END General Content//////////////////////////////
	
	//BUILD Form ////////////////////////////////////////////////////////////
	private function build_section_form($data){
		$html = '';
		if($data){

			$title = $data['flexible_content_section_form_title'];
			
			if($title){
				$title_content = '<div class="col-md-12"><h2 class="general-title text-center">' . $title . '</h2></div>';
			}
			
			$background_color =  $data['flexible_content_section_form_background_color'];
			$background_image =  $data['flexible_content_section_form_background_image'];
			$padding_top =  $data['flexible_content_section_general_content_padding_top'];
			$padding_bottom =  $data['flexible_content_section_general_content_padding_bottom'];	
			$background_style_html = 'style="background-image: url("' . $background_image . ' "); background-color: ' . $background_color . '; padding-top: ' . $padding_top . 'px; padding-bottom: ' . $padding_bottom . 'px"';
			$content = $data['flexible_content_section_general_content_content'];
			$form =  $data['flexible_content_section_form_select'];
			
			
			if($form){
				
				$html .= '
				
				<section class="general-flex-content-wrapper" ' . $background_style_html . '>
					<div class="container">
						<div class="row">'
						. $title_content . '
							<div class="col-md-12">	
								<div class="inner-content-wrapper">' . $content . '</div>';
								
								$form = get_field('flexible_content_section_form_select');
								gravity_form($form, false, false, true, '', true, 1);'
								
							</div>
						</div>
					</div>
				</section>
				
				';
			}				
			return $html;
		}
	}
	
	//END Form//////////////////////////////
	
	
	
	//BUILD Icon Grid ////////////////////////////////////////////
	private function build_section_icon_grid($data){
		$html = '';
		if($data){
			$background_image =  $data['flexible_content_section_icon_grid_background_image'];
			$text_color =  $data['flexible_content_section_icon_grid_text_color'];
			$background_color =  $data['flexible_content_section_icon_grid_background_color'];
			$padding_top =  $data['flexible_content_section_icon_grid_padding_top'];
			$padding_bottom =  $data['flexible_content_section_icon_grid_padding_bottom'];
			$background_style_html = 'style="background-color: ' . $background_color . '; padding-top: ' . $padding_top . 'px; padding-bottom: ' . $padding_bottom . 'px"';
			$section_title = $data['flexible_content_section_icon_grid_section_title'];
			$section_blurb = $data['flexible_content_section_icon_grid_section_blurb'];
			$image = $data['flexible_content_section_icon_grid_section_background_image'];
			$icon_type = $data['flexible_content_section_icon_type'];
			
			

			$html .= '
				<section class="flex-grid-wrapper icon-grid flex-section ' . $text_color . '" ' . $background_style_html . '>';
			
					if($background_image){
						$html .= '<div class="flex-bg-img" style="background:url(\'' . $background_image . '\'); background-size: cover; background-position: center center;"></div>';
					}
					$html .= '<div class="container">';
					
					
			
			
					if($section_title || $section_blurb) {
						
						$html .= '<header class="text-center section-title">';
					
						if($section_title){
							$html .= '<h2>' . $section_title . '</h2>';
						}
						if($section_blurb){
							$html .= '<p>' . $section_blurb . '</p>';
						}
						$html .= '</header>';
						
					}
			
					$html .= '<div class="row icon-wrap">';
					
						if($icon_type == 'relational'){
							wp_reset_query();
						}
					
						else {
						
							$freeform_icons = $data['flexible_content_section_icon_grid_repeater'];
						
							if($freeform_icons){
								
								foreach($freeform_icons as $freeform_icon){
									
									$image = $freeform_icon['flexible_content_section_icon_grid_repeater_icon_image'];
									$title = $freeform_icon['flexible_content_section_icon_grid_repeater_icon_title'];
									$excerpt = $freeform_icon['flexible_content_section_icon_grid_repeater_icon_excerpt'];
				
									$html .= '
									
									<div class="icon-box col-md">
										<img class="icon-img" src="' . $image . '" alt="' . $title . '"/>
										<div class="icon-body">
											<h3 class="icon-title">' . $title . '</h3>
										</div>
									</div>
									
									';
								}
							}	
						}		
					
					$html .= '
					</div>
				</div>
			</section>
			';
			return $html;
		}
	}

	
	//END Icon Grid////////////////////////////////

	//BUILD Card Grid////////////////////////////////////////////
	private function build_section_card_grid($data){
		$html = '';
		if($data){
			$background_image =  $data['flexible_content_section_card_grid_section_background_image'];
			$background_color =  $data['flexible_content_section_card_grid_background_color'];
			$padding_top =  $data['flexible_content_section_card_grid_padding_top'];
			$padding_bottom =  $data['flexible_content_section_card_grid_padding_bottom'];
			$background_style_html = 'style="background-color: ' . $background_color . '; padding-top: ' . $padding_top . 'px; padding-bottom: ' . $padding_bottom . 'px"';
			$section_title = $data['flexible_content_section_card_grid_section_title'];
			$section_blurb = $data['flexible_content_section_card_grid_section_blurb'];
			$columns = $data['flexible_content_section_card_grid_columns'];
			$grid_type = $data['flexible_content_section_card_grid_type'];
			$card_type = $data['flexible_content_section_card_type'];
			
			$html .= '
			<section class="card-grid-wrapper flex-section" ' . $background_style_html . '>
			  <div class="container">
				<div class="row">
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12"><header class="text-center section-title">';
				
				if($section_title){
					$html .= '<h2>' . $section_title . '</h2>';
				}
				
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</header></div></div>';
			}
			$html .= '<div class="row">';
			// 		$html .= '<div class="card-' . $card_type . '">';
			
			if($grid_type == 'relational'){
				$relational_cards = $data['flexible_content_section_card_grid_relational'];
				
				foreach($relational_cards as $relational_card){
					setup_postdata($relational_card);
					
					$image = get_the_post_thumbnail_url($relational_card);
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					$title = get_the_title($relational_card);
					$excerpt = excerpt_custom(20, $relational_card);
					$link = get_the_permalink($relational_card);
					$category = get_the_category();
					
					
					$html .= '
					<div class="' . $columns . '">
						<div class="card match-height">
							<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover; height: 250px;">
								<img class="card-img-top hidden-xs hidden-sm hidden-md hidden-lg" src="' . $image . '" alt="' . $title . '"/>
							</div>
							
							<div class="card-body">	
								<h3 class="card-title">' . $title . '</h3>
								<p class="card-text">' . $excerpt . '</p>
								<a class="btn btn-rose" href="' . $link . '">Read More</a>
								
							</div>
						</div>
					</div>
					';
				}
				
				$html .= '</div></div>';
				
				wp_reset_query();
			}
			
			else {	
				$freeform_cards = $data['flexible_content_section_card_grid_freeform'];
				
				foreach($freeform_cards as $freeform_card){
					
					$image = $freeform_card['flexible_content_section_card_grid_freeform_card_image'];
					$title = $freeform_card['flexible_content_section_card_grid_freeform_card_title'];
					$excerpt = $freeform_card['flexible_content_section_card_grid_freeform_card_excerpt'];
					$link_type = $freeform_card['flexible_content_section_card_grid_freeform_card_link_type'];
					$internal = $freeform_card['flexible_content_section_card_grid_freeform_card_internal_link'];
					$external = $freeform_card['flexible_content_section_card_grid_freeform_card_external_link'];
					$file = $freeform_card['flexible_content_section_card_grid_freeform_card_file_link'];
					$link_text = $freeform_card['flexible_content_section_card_grid_freeform_card_link_text'];
					
					$flex_link = '';
					$target = '';
					
					if($link_type == 'internal'){
						$flex_link = $internal;
					
					} elseif($link_type == 'external'){
						$flex_link = $external;
						$target = 'target="_blank"';
					
					} elseif($link_type == 'file'){
						$flex_link = $file;
						$target = 'target="_blank"';
					}
					
					if($link_type !== 'none'){
						$link_content = '<a href="' . $flex_link . '" ' . $target . ' class="btn btn-rose">' . $link_text . '</a>';
					}else{
						$link_content = '';
					}
					
					if($image){
						$image_content = '
						<div class="background-image" style="background: url(\'' . $image . '\'); background-position: center center; background-size: cover; height: 250px;">
							<img class="card-img-top hidden-xs hidden-sm hidden-md hidden-lg" src="' . $image . '" alt="' . $title . '"/>
						</div>';
						
					}
					
					
					$html .= '
					<div class="' . $columns . '">
						<div class="card match-height">
							' . $image_content . '
							<div class="card-body">
								<h3 class="card-title">' . $title . '</h3>
								<p class="card-text">' . $excerpt . '</p>
								' . $link_content . '
							</div>
						</div>
					</div>
					';	
				}	
			}		
			
			$html .= '
				</div>
			  </div>
			</section>
			';
			return $html;
		}
	}
	
	//END Card Grid////////////////////////////////

	//BUILD CPT Feed Carousel//////////////////////
	private function build_section_cpt_feed($data){
		$html = '';
		if($data){
			
			$slide_columns = $data['flexible_content_section_cpt_feed_items_per_slide'];
			$background_color = $data['flexible_content_section_cpt_feed_background_color'];
			$color = 'style="background-color: ' . $background_color . '"';
			$section_title = $data['flexible_content_section_cpt_feed_feed_title'];
			$section_blurb = $data['flexible_content_section_cpt_feed_feed_content'];
			$posttype_slug = $data['flexible_content_section_cpt_feed_cpt_selection'];
			$post_count = $data['flexible_content_section_cpt_feed_show_amount'];
			$view_all = $data['flexible_content_section_cpt_feed_view_all_link'];
			$internal = $data['flexible_content_section_cpt_feed_internal_link'];
			$link_text = $data['flexible_content_section_cpt_feed_link_text'];
			
			$link_html = '';
			
			if($view_all){
				$link_html = '<div class="col-md-12 text-center button-wrap"><a href="' . $internal . '" class="btn btn-rose btn-lg">' . $link_text . '</a></div>';
			} 
						
			$html .= '
			<section class="flex-section cpt-feed-carousel-wrapper" ' . $color . '>
			  <div class="container">
				<div class="row">
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12 text-center"><header class="section-title">';
			
				if($section_title){
					$html .= '<h2 class="script">' . $section_title . '</h2>';
				}
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</div></header>
				</div>
					<div class="row">
				';
			}
			
			$args = array(
			    'post_type' => $posttype_slug,

			    'posts_per_page' => $post_count
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				$html .= '
				<div class="col-md-12">
				  <div class="owl-carousel owl-carousel-' . $slide_columns . ' owl-theme card-deck">
				';
				
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					$image = get_the_post_thumbnail_url();
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					$title = get_the_title();
					$excerpt = excerpt(20);
					$link = get_the_permalink();
					$html .= '
					<article class="card item">
						<div class="background-image" style="background-image: url(\'' . $image . '\'); background-position: center center; background-size: cover; height: 220px;">
							<img src="' . $image . '" class="hidden-xs hidden-sm hidden-md hidden-lg" alt="' . $title . '"/>
						</div>
						<div class="card-body match-height">		
							<h3>' . $title . '</h3>
							<p>' . $excerpt . '</p>
							<a class="card-link" href="' . $link . '">View More</a>		
						
						</div>
					</article>
					';
				}

				/* Restore original Post Data */
				wp_reset_postdata();
				
			$html .= '</div></div>'; //ends owl-carousel	
				
			} else {
				// no posts found
			}

			$html .= $link_html . '
			
			</div>
			</div>
			</div>
			';
			
			return $html;
		}
	}
	
	//END CPT Feed Carousel////////////////////////////////////////
	
	//BUILD Testimonials Carousel//////////////////////
	private function build_section_testimonial_carousel($data){
		$html = '';
		if($data){
			
			$slide_columns = $data['flexible_content_section_testimonial_carousel_items_per_slide'];
			$background_color = $data['flexible_content_section_testimonial_carousel_background_color'];
			$color = 'style="background-color: ' . $background_color . '"';
			$section_title = $data['flexible_content_section_testimonial_carousel_title'];
			$section_blurb = $data['flexible_content_section_testimonial_carousel_content'];
			$name = $data['flexible_content_section_testimonial_carousel_name'];
			$additional_info = $data['flexible_content_section_testimonial_carousel_additional_info'];
			$posttype_slug = $data['flexible_content_testimonial_carousel_cpt_selection'];
			$post_count = $data['flexible_content_section_testimonial_carousel_show_amount'];
			
			$link_html = '';
			
			
						
			$html .= '
			<section class="flex-section cpt-feed-carousel-wrapper" ' . $color . '>
			  <div class="container">
				<div class="row">
			';
			
			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12 text-center"><header class="section-title">';
			
				if($section_title){
					$html .= '<h2 class="script">' . $section_title . '</h2>';
				}
				
				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				$html .= '</div></header>
				</div>
					<div class="row">
				';
			}
			
			$args = array(
			    'post_type' => $posttype_slug,

			    'posts_per_page' => $post_count
			);
			
			// The Query
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				$html .= '
				<div class="col-md-12">
				  <div class="owl-carousel owl-carousel-' . $slide_columns . ' owl-theme card-deck">
				';
				
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					$image = get_the_post_thumbnail_url();
					
					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}
					
					$title = get_the_title();
					$content = get_the_content();
					$excerpt = excerpt(20);
					$link = get_the_permalink();
					
					$html .= '
					<article class="card card-dark item">
						<div class="card-body match-height">		
							<h3>' . $title . '</h3>
							<p>' . $content . ' </p>
							<p>' . $excerpt . '</p>
							
							<p>' . $additional_info . ' </p>
						</div>
					</article>
					';
				}

				/* Restore original Post Data */
				wp_reset_postdata();
				
			$html .= '</div></div>'; //ends owl-carousel	
				
			} else {
				// no posts found
			}

			$html .= $link_html . '
			
			</div>
			</div>
			</div>
			';
			
			return $html;
		}
	}
	
	//END CPT Feed Carousel////////////////////////////////////////
	
	//BUILD CPT Feed //////////////////////////////////////////////
	private function build_section_cpt_feed_list($data){
		$html = '';
		if($data){

			$layout = $data['flexible_content_section_cpt_feed_list_feed_layout'];
			$columns = $data['flexible_content_section_cpt_feed_list_feed_grid_columns'];
			$card_type = $data['flexible_content_section_cpt_feed_list_feed_cards'];
			$background_color = $data['flexible_content_section_cpt_feed_list_background_color'];
			$color = 'style="background-color: ' . $background_color . '"';
			$section_title = $data['flexible_content_section_cpt_feed_list_feed_title'];
			$section_blurb = $data['flexible_content_section_cpt_feed_list_feed_content'];
			$posttype_slug = $data['flexible_content_section_cpt_feed_list_cpt_selection'];
			$post_count = $data['flexible_content_section_cpt_feed_list_show_amount'];
			$link_type = $data['flexible_content_section_cpt_feed_list_view_all_link'];
			$internal = $data['flexible_content_section_cpt_feed_list_internal_link'];
			$link_text = $data['flexible_content_section_cpt_feed_list_link_text'];
			$post_link_text = $data['flexible_content_section_cpt_feed_list_post_link_text'];
			

			$link_html = '';
			
			if($link_type){
				$link_html = '<div class="col-md-12 text-center button-wrap"><a href="' . $internal . '" class="btn btn-lg btn-rose">' . $link_text . '</a></div>';
			}
			
			

			$html .= '

			<div class="cpt-feed-list-wrapper flex-section" ' . $color . '>
				<div class="container">
					<div class="row justify-content-center">
			';

			if($section_title || $section_blurb) {
				$html .= '<div class="col-md-12"><header class="section-header text-center">';

				if($section_title){
					$html .= '<h2 class="script">' . $section_title . '</h2>';
				}

				if($section_blurb){
					$html .= '<p>' . $section_blurb . '</p>';
				}
				
				$html .= '</header></div>
				';
			}

			$args = array(
			    'post_type' => $posttype_slug,
			    'posts_per_page' => $post_count
			);

			// The Query
			$the_query = new WP_Query( $args );

			// The Loop
			if ( $the_query->have_posts() ) {

				if($layout == 'cards'){

					$html .= '
					</div>
					<div class="card-' . $card_type . '">
					
					';
				}

				while ( $the_query->have_posts() ) {
					$the_query->the_post();

					$image = get_the_post_thumbnail_url();

					if(!$image){
						$image = get_stylesheet_directory_uri() . '/assets/media/default.png';
					}

					$title = get_the_title();
					$category = get_the_category();
					$date = get_the_date();
					$excerpt = excerpt(20);
					$link = get_the_permalink();
					
					if($post_link_text){
						$post_link_html = '<a class="btn btn-rose" href="' . $link . '">' . $post_link_text . '</a>';
					}
					
					if($layout == 'grid'){
						
						$html .= '
							
							<div class="' . $columns . '">';

							$match_height = 'match-height';

					}

					$html .= '
					<article class="card">
						
						<img src="' . $image . '" class="card-img-top" alt="' . $title . '"/>
					
						<div class="card-body">
							<div class="content ' . $match_height . '">
								<h3><a href="' . $link . '">' . $title . '</a></h3>
								<p class="date">' . $date . '</p>
								<p class="excerpt">' . $excerpt . '</p>
								' . $post_link_html . '
								
							</div>
						</div>
					</article>
					';

					if($layout == 'grid'){
						$html .= '</div>';
					}
				}

				/* Restore original Post Data */
				wp_reset_postdata();
				
				if($layout == 'cards'){
					$html .= '
						</div>
						
					';
				}
			} else {
				// no posts found
			}

			$html .= $link_html . '
			
			</div>
			</div>
			';
			return $html;
		}
	}

	//END CPT Feed List////////////////////////////////////
	
	

	//BUILD Full Width Card///////////////////////////////////
	private function build_section_full_width_card($data){
		$html = '';
		if($data){
			
			$layout = $data['flexible_content_section_full_width_block_layout'];
			$container = $data['flexible_content_section_full_width_block_container'];
			$theme = $data['flexible_content_section_full_width_block_theme'];
			$image = $data['flexible_content_section_full_width_block_image'];
			$image_url = $image['url'];
			$position = $data['flexible_content_section_full_width_block_image_position'];
			$image_margin = $data['flexible_content_section_full_width_block_image_margin'];
			$title = $data['flexible_content_section_full_width_block_title'];
			$subtitle = $data['flexible_content_section_full_width_block_sub_title'];
			if($subtitle){
				$subtitle_content = '<h3>' . $subtitle . '</h3>';
			}else{
				$subtitle_content = '';
			}
			$content = $data['flexible_content_section_full_width_block_content'];
			
			$link_type = $data['flexible_content_section_full_width_block_link_type'];
			$internal = $data['flexible_content_section_full_width_block_internal_link'];
			$external = $data['flexible_content_section_full_width_block_external_link'];
			$file = $data['flexible_content_section_full_width_block_file_link'];
			$link_text = $data['flexible_content_section_full_width_block_link_text'];	
			$flex_link = '';
			$target = '';
			
			if($link_type == 'internal'){
				$flex_link = $internal;
			
			} elseif($link_type == 'external'){
				$flex_link = $external;
				$target = 'target="_blank"';
			
			} elseif($link_type == 'file'){
				$flex_link = $file;
				$target = 'target="_blank"';
			}
			
			if($link_type !== 'none'){
				$link_content = '<a href="' . $flex_link . '" ' . $target . ' class="btn btn-rose">' . $link_text . '</a>';
			}
			
			
			
			$interests = $data['flexible_content_section_full_width_block_interests'];
									
			if($interests){
				$html ='';
				$html .='<div class="d-flex flex-sm-row align-items-center superlitives">';
				
				foreach($interests as $interest){
					$icon  = $interest['interest_icon'];
					$interest_text = $interest['interest_text'];
					
					$interest_content .= '
						<div class="superlitive-wrap d-flex align-items-center">
							
							<div class="icon-wrap"><img class="img-icon" src="' . $icon . '" alt="' . $interest_text . '"/></div>
						
							<div class="interest-text align-self-center">
								<p class="m-0">' . $interest_text .'</p>
							</div>
							
						</div>
					';
				}
				$html ='</div>';
			}
	
			
			
			$media_html .= '
				<div class="item block-image" style="background-image: url(\''.$image_url . '\'); background-position: center ' . $position . '; background-size: cover; border: ' . $image_margin . 'px solid #e6e6e6;">
					<img src="' . $image_url . '" alt="' . $title . '" class="img-responsive hidden-md hidden-lg">
				</div>
			';
			
			$html .= '
			<div class="' . $container_fluid . '">
				<div class="full-width-flex-block-wrapper ' . $theme . '">
					<div class="flex-wrapper mb-0 card ' . $layout . '">
					' . $media_html . '
					<div class="item block-content">
						<div class="text-wrap">
							<h2>' . $title . '</h2>
							' . $subtitle_content . '
							<p>' . $content . '</p>
							
							' . $interest_content . '
							
							' . $link_content . '
							</div>
						</div> 
					</div>
				</div>
			</div>
			';
											
			return $html;
		}
	}
	
	//END Full Width Block////////////////////////////////////

}

?>