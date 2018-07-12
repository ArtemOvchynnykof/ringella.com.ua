<?php
/** 
 * Plugin Name:       Nileforest Shortcode
 * Plugin URI:        http://nileforest.com
 * Description:       Nileforest Custom shortcode for Wordpress themes.
 * Version:           1.0.0
 * Author:            Nileforest
 * Author URI:        http://nileforest.com
 * Text Domain:       nileforest-shortcode
 */
 /***********************************************/
 /**		      Div Shortcode   			   **/
 /***********************************************/
 if ( ! function_exists( 'shortcode_div' ) ) :
function shortcode_div($atts, $content = null ) {
       
		$id_name='';
		$class_name='';
		$output='';
	   
		extract(shortcode_atts(array( 
			'class'    					=> '',
			'id'    					=> '',			
			'background_img' 			=> isset( $atts['background_img'] ) ? $atts['background_img'] : '',
			'background_position' 		=> isset( $atts['background_position'] ) ? $atts['background_position'] : 'center center'						
        ), $atts)); 	
		 					
		
		if($class){
			$class_name = "class='$class'";			
		}
		if($id){
			$id_name = "id='$id'";			
		}
		
		if($background_img){
			$background_img= "style='background-image:url($background_img); background-position:$background_position;'";			
		}							

		$output.= '<div '.$id_name.$class_name.$background_img.'>';	
        $output.= do_shortcode($content);
        $output.= '</div>';

        return $output;  
}
endif;
add_shortcode('div', 'shortcode_div');
 
 /***********************************************/
 /**		   Section Shortcode			   **/
 /***********************************************/
 if ( ! function_exists( 'shortcode_section' ) ) :
function shortcode_section($atts, $content = null ) {
        
		$id_name='';
		$class_name='';
		$output='';
		
		extract(shortcode_atts(array( 			
			'class'    					=> '',
			'id'    					=> '',			
			'background_img' 			=> isset( $atts['background_img'] ) ? $atts['background_img'] : '',
			'background_position' 		=> isset( $atts['background_position'] ) ? $atts['background_position'] : 'center center'
        ), $atts));
		
		if($class){
			$class_name = "class='$class'";			
		}
		if($id){
			$id_name = "id='$id'";			
		}
		
		if($background_img){
			$background_img= "style='background-image:url($background_img); background-position:$background_position;'";			
		}
		
		$output.= '<section '.$id_name.$class_name.$background_img.'>';
        $output.= do_shortcode($content);
        $output.= '</section>';
        return $output;  
}
endif;
add_shortcode('section', 'shortcode_section');
/***********************************************/
 /**		   container Shortcode			   **/
 /***********************************************/
 if ( ! function_exists( 'shortcode_container' ) ) :
function shortcode_container($atts, $content = null ) {        
		
		$output='';		
		extract(shortcode_atts(array( 			
			'class'    					=> '',
			'id'    					=> ''			
        ), $atts));	
		
		$output.= '<div id="'.$id.'" class="'.$class.'">';
        $output.= do_shortcode($content);
        $output.= '</div>';
        return $output;  
}
endif;
add_shortcode('container', 'shortcode_container');
/***********************************************/
 /**		   Row Shortcode			   **/
 /***********************************************/
 if ( ! function_exists( 'shortcode_row' ) ) :
function shortcode_row($atts, $content = null ) {       
		
		$output='';		
		extract(shortcode_atts(array( 			
			'class'    					=> '',
			'id'    					=> ''
			
        ), $atts));
		
		$output.= '<div class="'.$class.'" id="'.$id.'">';
        $output.= do_shortcode($content);
        $output.= '</div>';
        return $output;  
}
endif;
add_shortcode('row', 'shortcode_row');
/***********************************************/
 /**		   Span/Label Shortcode			   **/
 /***********************************************/
 if ( ! function_exists( 'shortcode_label' ) ) :
function shortcode_label($atts, $content = null ) {       
		
		$output='';		
		extract(shortcode_atts(array( 			
			'class'    					=> '',
			'id'    					=> '',
			'label'    					=> ''
			
        ), $atts));
		
		$output.= '<'.$label.' class="'.$class.'" id="'.$id.'">';
        $output.= do_shortcode($content);
        $output.= '</'.$label.'>';
        return $output;  
}
endif;
add_shortcode('label', 'shortcode_label');
 
/***********************************************/
/**			Title Shortcode 			   **/
/***********************************************/
 
if ( ! function_exists( 'shortcode_heading' ) ) :
	function shortcode_heading($atts, $content = null ) {
			$id_name='';
			$class_name='';
			$output='';
			$title = '';
			  
			extract(shortcode_atts(array( 
				'class' 	  => '',
				'id'    	  => '',
				'heading_tag' =>isset( $atts['heading_tag'] ) ? $atts['heading_tag'] : ''
			), $atts));	
			
			if($heading_tag){
			 	$heading_tag = $heading_tag;	
			}		
			
			if($class){
				$class_name= "class='$class'";
			}
			if($id){
				$id_name = "id='$id'";			
			}
			
			$output.= '<'.$heading_tag.' '.$id_name.$class_name.'>';
			$output.=  do_shortcode($content);
			$output.= '</'.$heading_tag.'>';
	
			return $output;  
	}
endif;
add_shortcode('heading', 'shortcode_heading');
/***********************************************/
/**				 Message Box	   			 **/
/***********************************************/
 
if ( ! function_exists( 'shortcode_messagebox' ) ) :
	function shortcode_messagebox($atts, $content = null ) {
			
			$output='';		
			  
			extract(shortcode_atts(array( 
				'class' => isset( $atts['class'] ) ? $atts['class'] : '',
				'icon_class' => isset( $atts['icon_class'] ) ? $atts['icon_class'] : ''		
				
			), $atts));			
			
			
			$output.= '<div class="message-box '.$class.'" href="#">';
			$output.='<div class="message-icon"><i class="fa '.$icon_class.'" aria-hidden="true"></i></div>';
			$output.='<div class="message-content"><p>';
			$output.=  do_shortcode($content);
			$output.= '</p></div></div>';				
			return $output;  
	}
endif;
add_shortcode('message', 'shortcode_messagebox');
/***********************************************/
/**				 Button			   			 **/
/***********************************************/
 
if ( ! function_exists( 'shortcode_button' ) ) :
	function shortcode_button($atts, $content = null ) {
			
			$output='';		
			  
			extract(shortcode_atts(array( 
				'class' 	  => ''				
				
			), $atts));			
			
			
			$output.= '<a class="btn '.$class.'" href="#">';
			$output.=  do_shortcode($content);
			$output.= '</a>';	
			return $output;  
	}
endif;
add_shortcode('button', 'shortcode_button');
/***********************************************/
/**		    Toggle Shortcode 			      **/
/***********************************************/
if ( ! function_exists( 'shortcode_togglegroup' ) ) :

function shortcode_togglegroup($atts, $content = null)
{	
	$output = '';
	extract(shortcode_atts(array(
		'class' => isset( $atts['class'] ) ? $atts['class'] : '',
		'data_show' => isset( $atts['data_show'] ) ? $atts['data_show'] : '',
		'active' => isset( $atts['active'] ) ? $atts['active'] : ''		
	), $atts));
	$output .= '<div class="toggle '.$class.'" data-show="'.$data_show.'" data-active="'.$active.'">';	
	$output .= do_shortcode($content);		
	$output.=  '</div>';	
	return $output;	
}
endif;
add_shortcode('togglegroup', 'shortcode_togglegroup');

if ( ! function_exists( 'shortcode_toggle' ) ) :
function shortcode_toggle($atts, $content = null)
{
	
	extract(shortcode_atts(array(
		'title' => isset( $atts['title'] ) ? $atts['title'] : ''		
	), $atts));
	$output = '';
	$output.= '<div class="toggle-container">';		
	$output.= '<h6 class="toggle-title"><i class="toggle-closed fa fa-plus"></i><i class="toggle-open fa fa-minus"></i>'.$title.'</h6>';
    $output.= '<div class="toggle-content">'.do_shortcode($content).'</div>';
	$output.=  '</div>';	
	return $output;
}
endif;
add_shortcode('toggle', 'shortcode_toggle');

/***********************************************/
/**		    Accordian Shortcode 			   **/
/***********************************************/
if ( ! function_exists( 'shortcode_accordiongroup' ) ) :

function shortcode_accordiongroup($atts, $content = null)
{	
	$output = '';
	extract(shortcode_atts(array(
		'class' => isset( $atts['class'] ) ? $atts['class'] : '',
		'data_show' => isset( $atts['data_show'] ) ? $atts['data_show'] : '',
		'active' => isset( $atts['active'] ) ? $atts['active'] : ''		
	), $atts));
	$output .= '<div class="accordion '.$class.'" data-show="'.$data_show.'" data-active="'.$active.'">';	
	$output .= do_shortcode($content);		
	$output.=  '</div>';	
	return $output;	
}
endif;
add_shortcode('accordiongroup', 'shortcode_accordiongroup');

if ( ! function_exists( 'shortcode_accordion' ) ) :
function shortcode_accordion($atts, $content = null)
{	
	extract(shortcode_atts(array(
		'title' => isset( $atts['title'] ) ? $atts['title'] : ''		
	), $atts));
	$output = '';	
	$output.= '<h6 class="accordion_title"><i class="accordion-closed fa fa-plus"></i><i class="accordion-open fa fa-minus"></i>'.$title.'</h6>';
    $output.= '<div class="accordion_content clearfix">'.do_shortcode($content).'</div>';
	return $output;
}
endif;
add_shortcode('accordion', 'shortcode_accordion');
/***********************************************/
/**			  			Tab   			  		**/
/***********************************************/
if ( ! function_exists( 'shortcode_tabgroup' ) ) :
$htab_content = '';	
function shortcode_tabgroup($atts, $content = null)
{
	global $htab_content;
	$htab_content='';
	extract(shortcode_atts(array(		
		'class' => isset( $atts['class'] ) ? $atts['class'] : '',
		'id' => isset( $atts['id'] ) ? $atts['id'] : ''		
				
	), $atts));	
	
	$output = '';
	$output .= '<div class="tabs '.$class.'" id="'.$id.'"><ul class="tab-nav clearfix">';		
	$output .= do_shortcode($content).'</ul>';
	$output.= '<div class="tab-container">'.$htab_content.'</div></div>';	
	return $output;
}
endif;
add_shortcode('tabgroup', 'shortcode_tabgroup');

if ( ! function_exists( 'shortcode_tab' ) ) :

function shortcode_tab($atts, $content = null)
{
	global $htab_content;
	extract(shortcode_atts(array(
		'title' => isset( $atts['title'] ) ? $atts['title'] : '',
		'id' => isset( $atts['id'] ) ? $atts['id'] : '',
		'class' => isset( $atts['class'] ) ? $atts['class'] : ''
		
	), $atts));
	$output = '';
	
	$output.= '<li class="'.$class.'"><a href="#'.$id.'">'.$title.'</a></li>';	
    $htab_content.= '<div id="'.$id.'" class="tab-content clearfix"><p>'.do_shortcode($content).'</p></div>';
	return $output;
}
endif;
add_shortcode('tab', 'shortcode_tab');

//Vertical Tab
if ( ! function_exists( 'shortcode_vtabgroup' ) ) :
$vtab_content = '';	
function shortcode_vtabgroup($atts, $content = null)
{
	global $vtab_content;
	$vtab_content='';
	extract(shortcode_atts(array(		
		'class' => isset( $atts['class'] ) ? $atts['class'] : '',
		'id' => isset( $atts['id'] ) ? $atts['id'] : ''		
				
	), $atts));	
	
	$output = '';
	$output .= '<div class="tabs side-tabs clearfix '.$class.'" id="'.$id.'"><ul class="tab-nav clearfix">';		
	$output .= do_shortcode($content).'</ul>';
	$output.= '<div class="tab-container">'.$vtab_content.'</div></div>';	
	return $output;
	
}
endif;
add_shortcode('vtabgroup', 'shortcode_vtabgroup');

if ( ! function_exists( 'shortcode_vtab' ) ) :
function shortcode_vtab($atts, $content = null)
{
	global $vtab_content;
	extract(shortcode_atts(array(
		'title' => isset( $atts['title'] ) ? $atts['title'] : '',
		'id' => isset( $atts['id'] ) ? $atts['id'] : '',
		'class' => isset( $atts['class'] ) ? $atts['class'] : ''			
	), $atts));
	$output = '';
	
	$output.= '<li class="'.$class.'"><a href="#'.$id.'">'.$title.'</a></li>';	
    $vtab_content.= '<div id="'.$id.'" class="tab-content clearfix"><p>'.do_shortcode($content).'</p></div>';
	return $output;
}
endif;
add_shortcode('vtab', 'shortcode_vtab');
/***********************************************/
/**			  Home Product Tab   			  **/
/***********************************************/
$tabs_content = '';	
if ( ! function_exists( 'shortcode_producttabgroup' ) ) :
function shortcode_producttabgroup($atts, $content = null)
{
	global $tabs_content;
	$tabs_content ='';
	$output = '';
	$output .= '<ul class="product-filter nav" role="tablist">';		
	$output .= do_shortcode($content).'</ul>';
	$output.= '<div class="tab-content">'.$tabs_content.'</div>';	
	return $output;
}
endif;
add_shortcode('producttab', 'shortcode_producttabgroup');

if ( ! function_exists( 'shortcode_producttab' ) ) :
function shortcode_producttab($atts, $content = null)
{
	global $tabs_content;
	extract(shortcode_atts(array(
		'id' 			=> isset( $atts['id'] ) ? $atts['id'] : '',
		'tabtitle' 		=> isset( $atts['tabtitle'] ) ? $atts['tabtitle'] : '',
		'class' 		=> isset( $atts['class'] ) ? $atts['class'] : '',
		'content_class' => isset( $atts['content_class'] ) ? $atts['content_class'] : ''		
	), $atts));
	$output = '';	
	$output.= '<li class="nav-item"><a class="nav-link '.$class.'" data-toggle="tab" href="#'.$id.'" role="tab">'.$tabtitle.'</a></li>';
    $tabs_content.= '<div id="'.$id.'" role="tabpanel" class="tab-pane fade '.$content_class.'">'.do_shortcode($content).'</div>';
	return $output;
}
endif;
add_shortcode('tabhome', 'shortcode_producttab');

/***********************************************/
/**			 Blog  				  			 **/
/***********************************************/
if ( ! function_exists( 'shortcode_homeblog' ) ) :
function shortcode_homeblog($atts, $content = null, $code ) {	
	$count='';
	$order ='';
	$column_count='';
	$main_title = '';
	$output = '';
		
	extract(shortcode_atts(array(
			'count' 		=> isset( $atts['count'] ) ? $atts['count'] : '',
			'order' 		=> isset( $atts['order'] ) ? $atts['order'] : 'rand',
			'column_count' 		=> isset( $atts['column_count'] ) ? $atts['column_count'] : '2',
			'main_title' 		=> isset( $atts['main_title'] ) ? $atts['main_title'] : ''
        ), $atts));
		
		if($count){
			$count = $count;
		}
		if($order){
			$order = $order;
		}
		if($column_count){
			$column_count = $column_count;
		}	
		if($column_count>=4){
			$column_count = "2";	
		}
		if($main_title){
			$main_title = $main_title;
		}
					

	$output.='<section class="section-padding">';
		$output.='<div class="container"><h2 class="page-title">'.esc_attr($main_title).'</h2></div>';
			$output.='<div class="container">';
				$args = array( 'post_type' => 'post', 'post_status'=>'publish', 'posts_per_page' => $count, 'orderby' => $order );
				$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :				
						$output.='<div id="blog-carousel" class="product-item'. "-".$column_count.' blog-carousel owl-carousel owl-theme nf-carousel-theme1">';		
				      
						while ( $loop->have_posts() ) : 
							$loop->the_post(); 
							global $product;
						
						$output.='<div class="product-item">';
						   $output.='<div class="blog-box">';
							$output.='<div class="blog-img-wrap">';
								if ( has_post_thumbnail() ) :
									$output.='<a href="'.esc_url(get_permalink($loop->ID)).'">';
										$output .='<img src="'.get_the_post_thumbnail_url( get_the_ID(), 'full' ).'" alt="'.get_the_title().'">';	
									$output .='</a>';
								 else :
									$output .='<a href="'.esc_url(get_permalink($loop->ID)).'">';
										$output .='<img src="'.esc_url(get_template_directory_uri().'/framework/images/placeholder/1200x740.png').'" alt="'.esc_attr(get_the_title()).'"/>';
									$output .='</a>';
								endif;	           
						   $output .='</div>';
						   $output .='<div class="blog-box-content">';
							$output .='<div class="blog-box-content-inner">';
									$output .='<h4 class="blog-title"><a href="'.esc_url(get_permalink($loop->ID)).'">'.get_the_title().'</a></h4>';
									$output .='<p class="info">';
										$output .='<span>'.esc_html__( 'By ', 'philos' );
											$output .='<span>'.get_the_author().'</span>';
									   $output .='</span>';
									   $output .='<span>'.get_the_date().'</span>';
									$output .='</p>';
								$output .='</div>';
							 $output .='</div>';
						   $output.='</div>';
						$output.='</div>';
				
					    endwhile;					
						   
					$output.='</div>';
				else :
				 	$output.='<p class="text-center mtb-0 font-italic">'.esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ).'</p>';
			    endif;			
		 $output.='</div>';	
	$output.='</section>';
	wp_reset_query();
	return $output;
}
endif;
add_shortcode('homeblog', 'shortcode_homeblog'); 
/***********************************************/
/**			 Blog  Page			  			 **/
/***********************************************/
if ( ! function_exists( 'shortcode_blog' ) ) :
function shortcode_blog($atts, $content = null, $code ) {	
	$count='';
	$order ='';	
	$output = '';
		
	extract(shortcode_atts(array(
			'count' 		=> isset( $atts['count'] ) ? $atts['count'] : '',
			'order' 		=> isset( $atts['order'] ) ? $atts['order'] : 'rand'			
			
        ), $atts));
		
		if($count){
			$count = $count;
		}
		if($order){
			$order = $order;
		}		
					

	
				$args = array( 'post_type' => 'post', 'post_status'=>'publish', 'posts_per_page' => $count, 'orderby' => $order );
				$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :				
						$output.='<div class="blog-entry style-1">';		
				      
						while ( $loop->have_posts() ) : 
							$loop->the_post(); 
							global $product;
						
						
						   $output.='<div class="blog-box">';
							$output.='<div class="blog-img-wrap">';
								if ( has_post_thumbnail() ) :
									$output.='<a href="'.esc_url(get_permalink($loop->ID)).'">';
										$output .='<img src="'.get_the_post_thumbnail_url( get_the_ID(), 'full' ).'" alt="'.get_the_title().'">';	
									$output .='</a>';
								 else :
									$output .='<a href="'.esc_url(get_permalink($loop->ID)).'">';
										$output .='<img src="'.esc_url(get_template_directory_uri().'/framework/images/placeholder/1200x740.png').'" alt="'.esc_attr(get_the_title()).'"/>';
									$output .='</a>';
								endif;	           
						   $output .='</div>';
						   $output .='<div class="blog-box-content">';
							$output .='<div class="blog-box-content-inner">';
									$output .='<h4 class="blog-title"><a href="'.esc_url(get_permalink($loop->ID)).'">'.get_the_title().'</a></h4>';
									$output .='<div class="entry-content blog-description-content">';
									$readmore = '<p class="link-more"><a href="'.esc_url(get_permalink($loop->ID)).'" class="more-link btn btn-xs btn-gray">Read More <i class="fa fa-long-arrow-right right" aria-hidden="true"></i></a></p>';									
									$output .= wp_trim_words( get_the_content(), 50, ' ...'.$readmore );	
									
									$output .='</div>';									
								$output .='</div>';
							 $output .='</div>';
						   $output.='</div>';						
				
					    endwhile;					
						   
					$output.='</div>';
				else :
				 	$output.='<p class="text-center mtb-0 font-italic">'.esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ).'</p>';
			    endif;					
	wp_reset_query();
	return $output;
}
endif;
add_shortcode('blog', 'shortcode_blog'); 
 
/***********************************************/
/**			 Brand Logo			  			 **/
/***********************************************/
if ( ! function_exists( 'shortcode_logo' ) ) :
function shortcode_logo($atts, $content = null, $code ) {	
	$count='';
	$column_count='';
	$output = '';
	
	extract(shortcode_atts(array(
			'count' 		=> isset( $atts['count'] ) ? $atts['count'] : '',
			'column_count' 		=> isset( $atts['column_count'] ) ? $atts['column_count'] : '7',
        ), $atts));		
		
		
		if($count){
			$count = $count;		
		}
		if($column_count){
			$column_count = $column_count;	
		}
		if($column_count>=8 || $column_count<5){
			$column_count = "7";
		}	

	$output .='<section id="brand-logo" class="section-padding brand-logo">';
		$output .='<div class="container">';
		$args = array( 'post_type' => 'brand', 'post_status'=>'publish','posts_per_page' => $count);
		$loop = new WP_Query( $args );
			if ( $loop->have_posts() ) :
			$output .='<ul class="list-none-ib brand-logo-item brand-logo-carousel'. "-".$column_count.' owl-carousel owl-theme">';
				while ( $loop->have_posts() ) : 
					$loop->the_post(); 
					global $product;					
						if ( has_post_thumbnail() ) :
							$output .='<li class="brand-item">';
								$output .='<a href="'.esc_url(get_post_meta( get_the_ID(), 'logo_url', TRUE )).'" target="_blank">';									
									$output .='<img src="'.get_the_post_thumbnail_url( get_the_ID(), 'full' ).'" alt="'.get_the_title().'">';
								$output .='</a>';
							$output .='</li>';                       
						endif;
				endwhile;							  								
		 $output .='</ul>';
		 else :
			$output .='<p class="text-center mtb-0 font-italic">'.esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ).'</p>';
		endif; 
		$output .='</div>';
		$output .='</section>';
		wp_reset_query();	
		return $output;
}
endif;
add_shortcode('brandlogo', 'shortcode_logo');

/***********************************************/
/**			 Portfolio			  			 **/
/***********************************************/
if ( ! function_exists( 'shortcode_portfolio' ) ) :
function shortcode_portfolio($atts, $content = null , $code) {	
	$output = '';
		
	extract(shortcode_atts(array(			
			'columns' 		=> isset( $atts['columns'] ) ? $atts['columns'] : '4',
			'sm_columns' 		=> isset( $atts['sm_columns'] ) ? $atts['sm_columns'] : '6',
        ), $atts));
		
		
		if($columns){
			$columns = $columns;
		}
		if($sm_columns){
			$sm_columns = $sm_columns;
		}		
					

	$output .='<div class="container">';
 		$output .='<div class="row mb-40">';
			$output .='<div class="col-md-12">';					
					$taxonomy = 'categoryportifolio';
					$terms = get_terms($taxonomy);
					$portfolio_count=0;
					if ( $terms && !is_wp_error( $terms ) ) :
						$output .='<ul class="list-none-ib container-filter categories-filter">';
							foreach ( $terms as $term ) { 
								$portfolio_count++;
								if($portfolio_count==1){
									$output .='<li><a data-filter="*" class="categories active">'.esc_html__( 'All', 'philos' ).'</a></li>';
								}	
									$term_lower = strtolower($term->name);
									$term_name = preg_replace('/\s+/', '-', $term_lower);							
								$output .='<li><a data-filter="'.".".$term_name.'" class="categories">'.esc_attr($term->name).'</a></li>';
							}
						$output .='</ul>';
				   endif;
			$output .='</div>';
		$output .='</div>';
 		$output .='<div class="row container-grid">';		
    
        $args = array( 'post_type' => 'portfolio', 'post_status'=>'publish','posts_per_page' => '-1');
        $wp_query = new WP_Query( $args );
		
     	if ( $wp_query->have_posts() ) :
			while ( $wp_query->have_posts() ) :			
				$wp_query->the_post(); 			
				global $product,$post,$term_name,$trm_name; 			
				$term_name='';
				$trm_name='';			
				$terms = get_the_terms( $post->ID, "categoryportifolio");
				foreach($terms as $term){				
					if(empty($term_name)){
						$term_name = strtolower($term->name);				
						$trm_name =preg_replace('/\s+/', '-', $term_name);
					}else{
						$term_name.=",".strtolower($term->name);
						$trm_name.=" ".preg_replace('/\s+/', '-',strtolower($term->name));				
						
					}
				}
			
			$output .='<div class="col-md-'.$columns.' col-sm-'.$sm_columns.' nf-item '.esc_attr($trm_name).'">';
			   $output .='<div class="portfolio-box">';
			   		$output .='<a class="portfolio-thumb" href="'.esc_url(get_permalink($post->ID)).'">';				
						if ( has_post_thumbnail() ) : 						
							$output .='<img src="'.get_the_post_thumbnail_url( get_the_ID(), 'full' ).'" alt="'.get_the_title().'">';						
						else :						
							$output .='<img src="'.esc_url(get_template_directory_uri().'/framework/images/placeholder/1200x800.png').'" alt="'.get_the_title().'"/>';						
						endif;
					$output .='</a>';	           
					$output .='<div class="portfolio-content">';				  
					$output .='<h6><a href="'.esc_url(get_permalink($post->ID)).'">'.get_the_title().'</a></h6>';
					$output .='<p>'.esc_attr($term_name).'</p>';					
					$output .='</div>';
				$output .='</div>';
			$output .='</div>';
	
			endwhile;
			else :
				$output .='<p class="text-center mtb-0 font-italic">'.esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ).'</p>';
          endif; 
		
	$output .='</div>';
$output .='</div>';

	return $output;
}
endif;

add_shortcode('portfolio', 'shortcode_portfolio');

/***********************************************/
/**				 Google Map		   			 **/
/***********************************************/
 
if ( ! function_exists( 'shortcode_googlemap' ) ) :
	function shortcode_googlemap($atts, $content = null ) {
			
			$output='';
			extract(shortcode_atts(array( 
				'class' 	=> isset( $atts['class'] ) ? $atts['class'] : '',
				'map_id' 	=> isset( $atts['map_id'] ) ? $atts['map_id'] : 'map',
				'title' 	=> isset( $atts['title'] ) ? $atts['title'] : 'Philos',
				'lat' 	=> isset( $atts['lat'] ) ? $atts['lat'] : '',
				'long' 	=> isset( $atts['long'] ) ? $atts['long'] : '',								
				'mapapi' 	=> isset( $atts['mapapi'] ) ? $atts['mapapi'] : '',				
			), $atts));		
			
			$output.= '<div id="'.$map_id.'" class="map style1 '.$class.'"></div>
			<script src="https://maps.googleapis.com/maps/api/js?key='.$mapapi.'" type="text/javascript"></script>		
			<script>
				google.maps.event.addDomListener(window, "load", init);
				function init() {
					var mapOptions = {
					
                		zoom: 13,                
                		center: new google.maps.LatLng('.$lat.', '.$long.'),
						               
               			styles: [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }]
            };
            
            var mapElement = document.getElementById("'.$map_id.'");			          
            var map = new google.maps.Map(mapElement, mapOptions);
            
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng('.$lat.', '.$long.'),
                map: map,
                title: "'.$title.'"
            });
			}
			</script>';				
			return $output;  
	}
endif;
add_shortcode('googlemap', 'shortcode_googlemap');
/***********************************************/
/**				 Gallery 		   			 **/
/***********************************************/
//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');

//activate own function
add_shortcode('gallery', 'theme_gallery_shortcode'); 
 
function theme_gallery_shortcode($attr) {
	$post = get_post();
	static $instance = 0;
	$instance++;
	if ( ! empty( $attr['ids'] ) ) {		
		if ( empty( $attr['orderby'] ) ){
			$attr['orderby'] = 'post__in';
			}
		$attr['include'] = $attr['ids'];
	}	
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' ){
		return $output;
	}	
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] ){
			unset( $attr['orderby'] );
		}
	}
	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => 'file' // CHANGE #1
	), $attr, 'gallery'));
	$id = intval($id);
	if ( 'RAND' == $order ){
		$orderby = 'none';
	}
	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}
	if ( empty($attachments) ){
		return '';
	}
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ){
			$output .= theme_wp_get_attachment_link($att_id, $size, true) . "\n";
		}
		return $output;
	}
	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) ){
		$itemtag = 'dl';
	}
	if ( ! isset( $valid_tags[ $captiontag ] ) ){
		$captiontag = 'dd';
	}
	if ( ! isset( $valid_tags[ $icontag ] ) ){
		$icontag = 'dt';
	}
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";
	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) ){
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};				
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>";
	}
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery gallery-popup galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );		
	$i = 0;
	
	foreach ( $attachments as $id => $attachment ) {
		$image_output = theme_wp_get_attachment_link( $id, $size, true, false );
	
		$image_meta  = wp_get_attachment_metadata( $id );
		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) ){
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
		}
		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
	}
	$output .= "
		</div>\n";
	return $output;
}
function theme_wp_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = true, $icon = false, $text = false ) {
	$id = intval( $id );
	$_post = get_post( $id );
	
	if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) ){
		return __( 'Missing Attachment' );
	}
	if ( $permalink ){		
		$image_attributes = wp_get_attachment_image_src( $_post->ID, 'large' );
		$url = $image_attributes[0];
	}
	//	$url = wp_get_attachment_image( $_post->ID, 'large' );
	$post_title = esc_attr( $_post->post_title );
	if ( $text ){
		$link_text = $text;
	}
	elseif ( $size && 'none' != $size ){
		$link_text = wp_get_attachment_image( $id, $size, $icon );
	}
	else{
		$link_text = '';
	}
	if ( trim( $link_text ) == '' ){
		$link_text = $_post->post_title;
	}
	return apply_filters( 'wp_get_attachment_link', "<a href='$url' rel='gallery-nr' title='$post_title'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}
//end 

/***********************************************/
/**				 Testimonial	   			 **/
/***********************************************/
if ( ! function_exists( 'shortcode_testimonial' ) ) :
function shortcode_testimonial($atts, $content = null, $code ) {	
	$count='';	
	$title = '';
	$output = '';
		
	extract(shortcode_atts(array(
			'count' 		=> isset( $atts['count'] ) ? $atts['count'] : '10',						
			'title' 		=> isset( $atts['title'] ) ? $atts['title'] : 'Customer Say'
        ), $atts));
		
		if($count){
			$count = $count;
		}		
		if($title){
			$title = $title;
		}
					
		$output.='<div class="about-box-inner">';
			$output.='<h4 class="mb-25">'.esc_attr($title).'</h4>';
			$args = array( 'post_type' => 'testimonial', 'post_status'=>'publish', 'posts_per_page' => $count);
				$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :			
						$output.='<div class="testimonials-carousel owl-carousel owl-theme nf-carousel-theme1">';
						while ( $loop->have_posts() ) : 
							$loop->the_post(); 
							global $product;
								$output.='<div class="product-item">';
									$output.='<p class="large quotes">'.get_the_content().'</p>';
									$output.='<h6 class="quotes-people">'.esc_attr(get_the_title()).'</h6>';
								$output.='</div>';
						endwhile;															
						$output.='</div>';
					else :
				 		$output .='<p class="text-center mtb-0 font-italic">'.esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ).'</p>';
					endif;						
		$output.='</div>';
		wp_reset_query();
		return $output;
}
endif;
add_shortcode('testimonial', 'shortcode_testimonial');
?>