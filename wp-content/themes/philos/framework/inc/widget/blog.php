<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	

class HomeBlog_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'HomeBlog Widget');
		parent::__construct( false,$name='NF - Blog Widget', $widget_options );
	}	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$post_count = empty($instance['post_count']) ? '' : $instance['post_count'];	
		$post_count = empty($instance['show_date_option']) ? true : false;			

		?>
<div class="widget">
<?php
	if ($title):
			echo '<h6>'.esc_attr($title).'</h6>';	
	endif;
?>
<div class="widget-product">
  <ul class="widget-content">
    <?php

				$args = array( 'post_type' => 'post', 'post_status'=>'publish','posts_per_page' => esc_attr($post_count));
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post(); 
					global $product;					

					?>
    <li class="product-item">
      <?php if ( has_post_thumbnail() ) : ?>
      <a class="product-img" href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title_attribute()); ?>">
      <?php the_post_thumbnail(); ?>
      </a>
      <?php else : ?>
      <a class="product-img" href="<?php esc_url(the_permalink()); ?>" title="<?php esc_attr(the_title_attribute()); ?>"> <img src="<?php echo esc_url(get_stylesheet_directory_uri().'/framework/images/placeholder/1200x753.png'); ?>" alt="<?php esc_attr(the_title_attribute()); ?>"/> </a>
      <?php endif; ?>
      <div class="product-content"> <a class="product-link" href="<?php esc_url(the_permalink()); ?>">
        <?php the_title(); ?>
        </a>
        <?php

		if($post_count != false) :?>
        <span class="date-description"><?php echo get_the_date(); ?></span>
        <?php endif; ?>
      </div>
    </li>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <?php else : ?>
    <p  class="text-center mtb-0 font-italic">
      <?php esc_html__( 'Sorry, no posts matched your criteria.','philos' ); ?>
    </p>
    <?php endif; ?>
  </ul>
</div>
</div>
<?php	

	}

	//Update the widget 

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_count'] = strip_tags( $new_instance['post_count'] );	
		$instance['show_date_option'] = $new_instance['show_date_option'];		
		return $instance;
	}

	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => '','post_count' => '3','show_date_option' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
  <?php echo esc_html__('Title', 'philos'); ?>
  </label>
  <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
  <label for="<?php echo esc_attr($this->get_field_id('post_count')); ?>">
  <?php echo esc_html__('Number of posts to show', 'philos'); ?>
  </label>
  <input id="<?php echo esc_attr($this->get_field_id('post_count')); ?>" name="<?php echo esc_attr($this->get_field_name('post_count')); ?>" value="<?php echo esc_attr($instance['post_count']); ?>" />
</p>
<p>
  <input id="<?php echo esc_attr($this->get_field_id('show_date_option')); ?>" name="<?php echo esc_attr($this->get_field_name('show_date_option')); ?>" <?php checked( esc_attr($instance['show_date_option']), 'on' ); ?> type="checkbox"/>
  <label for="<?php echo esc_attr($this->get_field_id('show_date_option')); ?>">
  <?php echo esc_html__('Display post date?', 'philos'); ?>
  </label>
</p>
<?php

	}

} 

add_action( 'widgets_init', function(){ register_widget( 'HomeBlog_Widget' );});
//Post Widgets
?>