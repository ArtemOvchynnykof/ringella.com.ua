<?php
/**
 * Nileforest Framework
 *
 * @package   Nileforest Framework
 * @author    Nileforest <http://nileforest.com>
 * 
 */
	//add google font family
	if ( ! function_exists( 'theme_font_family' ) ) :
		function theme_font_family(){
			//body font family
			$body_typography = theme_get_option('body_typography');
			$body_font_family = $body_typography['face'];
			$body_font_family = str_replace(' ', '+', $body_font_family);
			$body_font_size = $body_typography['size'];
			$body_font_style = $body_typography['style'];
			$body_font_color = $body_typography['color'];
			
			//body bg color
			$body_bg_color = theme_get_option('body_backgroud_color');
			
			//body backgroud
			$body_bg_img = theme_get_option('body_backgroud_image');
			$body_bg_repeat = theme_get_option('body_backgroud_repeat');
			$body_bg_position = theme_get_option('body_backgroud_position');
			
			//h1 font family
			$h1_font_family = theme_get_option('h1_font_family');
			$h1_font_family = str_replace(' ', '+', $h1_font_family);


			//h2 font family
			$h2_font_family = theme_get_option('h2_font_family');
			$h2_font_family = str_replace(' ', '+', $h2_font_family);
			
			//h3 font family
			$h3_font_family = theme_get_option('h3_font_family');
			$h3_font_family = str_replace(' ', '+', $h3_font_family);


			//h4 font family
			$h4_font_family = theme_get_option('h4_font_family');
			$h4_font_family = str_replace(' ', '+', $h4_font_family);


			//h5 font family
			$h5_font_family = theme_get_option('h5_font_family');
			$h5_font_family = str_replace(' ', '+', $h5_font_family);


			//h6 font family
			$h6_font_family = theme_get_option('h6_font_family');
			$h6_font_family = str_replace(' ', '+', $h6_font_family);


			//button font family
			$btn_font_family = theme_get_option('btn_font_family');
			$btn_font_family = str_replace(' ', '+', $btn_font_family);


			//label font family
			$lbl_font_family = theme_get_option('lbl_font_family');
			$lbl_font_family = str_replace(' ', '+', $lbl_font_family);


			//paragraph font family
			$paragraph_font_family = theme_get_option('paragraph_font_family');
			$paragraph_font_family = str_replace(' ', '+', $paragraph_font_family);


			//alt font family
			$alt_font_family = theme_get_option('alt_font_family');
			$alt_font_family = str_replace(' ', '+', $alt_font_family);

			//merge all font family
			$fonts_array = array($body_font_family,$h1_font_family,$h2_font_family,$h3_font_family,$h4_font_family,$h5_font_family,$h6_font_family,$btn_font_family,$lbl_font_family,$paragraph_font_family,$alt_font_family);
			
			//remove duplicate font family
			$fonts_array = array_unique($fonts_array);
			$google_font_addded=array("0"=>"plesae-select","1"=>"Open+Sans","2"=>"Montserrat","3"=>" ");			
			$google_font_result = array_diff($fonts_array,$google_font_addded);			
			$google_font_array = implode('|', $google_font_result);
			
			//echo $google_font_array;
			if(esc_html($google_font_array) !=""){
				$protocol = is_ssl() ? 'https' : 'http';
				wp_enqueue_style( 'theme-google-fonts', $protocol.'://fonts.googleapis.com/css?family='.esc_html($google_font_array), false );
			}
			?>
			<style type="text/css">
					<?php
					
						//body font family 
						if($body_font_family != "plesae-select" && $body_font_color !=""){?>
						
							body{							
								font-family:"<?php echo esc_html($body_typography['face']); ?>",sans-serif;
								font-size:<?php echo esc_html($body_font_size); ?>;
								font-style:<?php echo esc_html($body_font_style); ?>;
								color:<?php echo esc_html($body_font_color); ?>;
							}
						<?php }
						
						//body color
						if($body_bg_color != ""){?>
							body{	
								background-color:<?php echo esc_html($body_bg_color); ?>;
							}
						<?php }
						
						//body backgroud
						if($body_bg_img != ""){?>
							body{
								background-image:url("<?php echo esc_html($body_bg_img); ?>");
								background-repeat:<?php echo esc_html($body_bg_repeat); ?>;
								background-position:<?php echo esc_html($body_bg_position); ?>;
							}
						<?php }
						
						//h1 font family 
						if($h1_font_family != "plesae-select" && $h1_font_family != ""){?>
							h1{
								font-family:"<?php echo esc_html(theme_get_option('h1_font_family')); ?>",sans-serif;
							}
						<?php }

						//h2 font family 
						if($h2_font_family != "plesae-select" && $h2_font_family != ""){?>
							h2{
								font-family:"<?php echo esc_html(theme_get_option('h2_font_family')); ?>",sans-serif;
							}
						<?php }

						//h3 font family 
						if($h3_font_family != "plesae-select" && $h3_font_family != ""){?>
							h3{
								font-family:"<?php echo esc_html(theme_get_option('h3_font_family')); ?>",sans-serif;
							}
						<?php }
						
						//h4 font family 
						if($h4_font_family != "plesae-select" && $h4_font_family != ""){?>
							h4{
								font-family:"<?php echo esc_html(theme_get_option('h4_font_family')); ?>",sans-serif;
							}
						<?php }

						//h5 font family 
						if($h5_font_family != "plesae-select" && $h5_font_family != ""){?>
							h5{
								font-family:"<?php echo esc_html(theme_get_option('h5_font_family')); ?>",sans-serif;
							}
						<?php }

						//h6 font family 
						if($h6_font_family != "plesae-select" && $h6_font_family != ""){?>
							h6{
								font-family:"<?php echo esc_html(theme_get_option('h6_font_family')); ?>",sans-serif;
							}
						<?php }


						//button font family
						if($btn_font_family != "plesae-select" && $btn_font_family != ""){?>
							.btn, button {
								font-family:"<?php echo esc_html(theme_get_option('btn_font_family')); ?>",sans-serif;
							}
							.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
								font-family:"<?php echo esc_html(theme_get_option('btn_font_family')); ?>",sans-serif;
							}
						<?php }

						//label font family 
						if($lbl_font_family != "plesae-select" && $lbl_font_family != ""){?>
							label{
								font-family:"<?php echo esc_html(theme_get_option('lbl_font_family')); ?>",sans-serif;
							}
						<?php }

						//paragraph font family 
						if($paragraph_font_family != "plesae-select" && $paragraph_font_family != ""){?>
							p{
								font-family:"<?php echo esc_html(theme_get_option('paragraph_font_family')); ?>",sans-serif;
							}
						<?php }

						//Alt/Sub font family 
						if($alt_font_family != "plesae-select" && $alt_font_family != ""){?>
							.alt-title{
								font-family:"<?php echo esc_html(theme_get_option('alt_font_family')); ?>",sans-serif;
							}
							.blog-title{
								font-family:"<?php echo esc_html(theme_get_option('alt_font_family')); ?>",sans-serif;
							}
						<?php } ?>
				</style>
				<?php
		}		
		add_action( 'wp_head', 'theme_font_family' );
		endif;
?>