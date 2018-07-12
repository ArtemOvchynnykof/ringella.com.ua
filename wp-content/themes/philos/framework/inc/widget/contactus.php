<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	
class ContactUs_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Contact Us Widget');
		parent::__construct( false,$name='NF - Contact Us Widget', $widget_options );
	}	

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$address = empty($instance['address']) ? '' : $instance['address'];
		$email_address = empty($instance['email_address']) ? '' : $instance['email_address'];
		$phone_number = empty($instance['phone_number']) ? '' : $instance['phone_number'];
		$mobile_number = empty($instance['mobile_number']) ? '' : $instance['mobile_number'];

		if ($title):
			echo "<h6>".esc_attr($title)."</h6>";
		endif;
		

		?>
        <ul>
			<?php if(!empty($address)) : ?>
            	<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo esc_textarea($address); ?></li>
			<?php endif; ?>
			<?php if(!empty($email_address)) : ?>
            	<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo antispambot($email_address); ?>"><?php echo antispambot($email_address); ?></a></li>
			<?php endif; ?>
			<?php if(!empty($phone_number)) : ?>
            	<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_attr($phone_number);  ?></li>
			<?php endif; ?>
			<?php if(!empty($mobile_number)) : ?>
            	<li><i class="fa fa-fax" aria-hidden="true"></i><?php echo esc_attr($mobile_number); ?></li>
			<?php endif; ?>
        </ul>

	<?php	

	}

	//Update the widget 

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		$instance['email_address'] = strip_tags( $new_instance['email_address'] );
		$instance['phone_number'] = strip_tags( $new_instance['phone_number'] );
		$instance['mobile_number'] = strip_tags( $new_instance['mobile_number'] );	

		return $instance;
	}

	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => 'Contact','address' => '','email_address' => '','phone_number' => '','mobile_number' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>              

	     <p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php echo esc_html__('Address:', 'philos'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo esc_textarea($instance['address']); ?></textarea>          
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php echo esc_html__('Email Address:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" value="<?php echo esc_attr($instance['email_address']); ?>" />
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php echo esc_html__('Phone Number:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" value="<?php echo esc_attr($instance['phone_number']); ?>" />
		</p>
        <p>
			<label for="<?php echo esc_attr($this->get_field_id('mobile_number')); ?>"><?php echo esc_html__('Mobile Number:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('mobile_number')); ?>" name="<?php echo esc_attr($this->get_field_name('mobile_number')); ?>" value="<?php echo esc_attr($instance['mobile_number']); ?>" />
		</p>      
		<?php
	}
} 
add_action( 'widgets_init', function(){ register_widget( 'ContactUS_Widget' );});
//Contact Us Widgets
?>