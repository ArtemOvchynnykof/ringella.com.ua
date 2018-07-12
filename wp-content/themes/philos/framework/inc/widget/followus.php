<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	
class FollowUs_Widget extends WP_Widget {		

	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Follow Us Widget');
		parent::__construct( false,$name='NF - Follow Us Widget', $widget_options );
	}	

	function widget( $args, $instance ) {
		extract( $args );			

		$link1 = empty($instance['link1']) ? '' : $instance['link1'];
		$link2 = empty($instance['link2']) ? '' : $instance['link2'];
		$link3 = empty($instance['link3']) ? '' : $instance['link3'];
		$link4 = empty($instance['link4']) ? '' : $instance['link4'];
		$link5 = empty($instance['link5']) ? '' : $instance['link5'];		

		?>
		<ul class="footer-social-icon list-none-ib">
			<?php if(!empty($link1)): ?>
            	<li><a target="_blank" href="<?php echo esc_url($link1); ?>" title="<?php echo esc_attr('Facebook', 'philos');?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($link2)) : ?>
            	<li><a target="_blank" href="<?php echo esc_url($link2); ?>" title="<?php echo esc_attr('Twitter', 'philos');?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($link3)): ?>
            	<li><a target="_blank"  href="<?php echo esc_url($link3); ?>" title="<?php echo esc_attr('Pinterest', 'philos');?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            <?php endif; ?>
            <?php if(!empty($link4)):  ?>      
            	<li><a target="_blank" href="<?php echo esc_url($link4); ?>" title="<?php echo esc_attr('Google plus', 'philos');?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            <?php endif; ?>
           	<?php if(!empty($link5)): ?>
            	<li><a target="_blank" href="<?php echo esc_url($link5); ?>" title="<?php echo esc_attr('Instagram', 'philos');?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>                       
             <?php endif; ?>
		</ul>
	<?php
	}
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML 		

		$instance['link1'] = strip_tags( $new_instance['link1'] );
		$instance['link2'] = strip_tags( $new_instance['link2'] );
		$instance['link3'] = strip_tags( $new_instance['link3'] );
		$instance['link4'] = strip_tags( $new_instance['link4'] );
		$instance['link5'] = strip_tags( $new_instance['link5'] );	

		return $instance;
	}

	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'link1' => '#','link2' => '#','link3' => '#','link4' => '#','link5' => '#');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>            

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('link1')); ?>"><?php echo esc_html__('Facebook Url:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link1')); ?>" name="<?php echo esc_attr($this->get_field_name('link1')); ?>" value="<?php echo esc_attr($instance['link1']); ?>" />
			<label>(e.g. https://www.facebook.com/...)</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('link2')); ?>"><?php echo esc_html__('Twitter Url:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link2')); ?>" name="<?php echo esc_attr($this->get_field_name('link2')); ?>" value="<?php echo esc_attr($instance['link2']); ?>" />
			<label>(e.g. https://twitter.com/...)</label>
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('link3')); ?>"><?php echo esc_html__('Pinterest Url:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link3')); ?>" name="<?php echo esc_attr($this->get_field_name('link3')); ?>" value="<?php echo esc_attr($instance['link3']); ?>" />
			<label>(e.g. https://www.pinterest.com/...)</label>
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('link4')); ?>"><?php echo esc_html__('Google Plus Url:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link4')); ?>" name="<?php echo esc_attr($this->get_field_name('link4')); ?>" value="<?php echo esc_attr($instance['link4']); ?>" />
			<label>(e.g. https://plus.google.com/...)</label>
		</p>
         <p>
			<label for="<?php echo esc_attr($this->get_field_id('link5')); ?>"><?php echo esc_html__('Instagram Url:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('link5')); ?>" name="<?php echo esc_attr($this->get_field_name('link5')); ?>" value="<?php echo esc_attr($instance['link5']); ?>" />
			<label>(e.g. https://www.instagram.com/...)</label>
		</p>
		<?php
	}
} 
add_action( 'widgets_init', function(){ register_widget( 'FollowUs_Widget' );});
//Follow Us Widgets
?>