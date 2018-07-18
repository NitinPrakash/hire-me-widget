<?php class Hire_Me_Widget extends WP_Widget {

	// constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'hire_me_widget',
			'description' => 'Easily show your hire availability',
		);
		parent::__construct( 'hire_me_widget', 'Hire Me Widget', $widget_ops );
	}

	// widget form creation
	function form($instance) {	
	
            // Check values
            if( $instance) {
                 $title = esc_attr($instance['title']);
                 $team_type = esc_attr($instance['team_type']);
                 $status = esc_attr($instance['status']);
                 $freelance_site = esc_attr($instance['freelance_site']);
                 $button_url = esc_attr($instance['button_url']); // Added                                  
                 
            } else {
                 $title = '';
                 $team_type = '';
                 $status = '';
                 $freelance_site = '';
                 $button_url = ''; // Added
            }
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'hire-me-widget'); ?></label>
                <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
            </p>
            <p>    
                <label for="<?php echo $this->get_field_id('team_type'); ?>"><?php _e('Team Members', 'hire-me-widget'); ?></label>
                <select name="<?php echo $this->get_field_name('team_type'); ?>" id="<?php echo $this->get_field_id('team_type'); ?>" class="widefat">
                <?php
                    $options = array('I am a Freelancer', 'We are an Agency');
                    foreach ($options as $option) {
                        echo '<option value="' . $option . '" id="' . $option . '"', $team_type == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                ?>
                </select>
            </p>
            <p>    
                <label for="<?php echo $this->get_field_id('status'); ?>"><?php _e('Status', 'hire-me-widget'); ?></label>
                <select name="<?php echo $this->get_field_name('status'); ?>" id="<?php echo $this->get_field_id('status'); ?>" class="widefat">
                <?php
                    $options = array('Available', 'Unavailable');
                    foreach ($options as $option) {
                        echo '<option value="' . $option . '" id="' . $option . '"', $status == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                ?>
                </select>
            </p>
            <p>    
                <label for="<?php echo $this->get_field_id('freelance_site'); ?>"><?php _e('Freelance Website', 'hire-me-widget'); ?></label>
                <select name="<?php echo $this->get_field_name('freelance_site'); ?>" id="<?php echo $this->get_field_id('freelance_site'); ?>" class="widefat">
                <?php
                
                    $options = array('Direct Hire','99designs','Freelancer', 'GetACoder', 'Guru','Peopleperhour','Project4hire','SimplyHired','Remote','Toptal','Upwork');
                    
                    foreach ($options as $option) {
                        echo '<option value="' . $option . '" id="' . $option . '"', $freelance_site == $option ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                ?>
                </select>
            </p> 
            
            <p>
                <label for="<?php echo $this->get_field_id('button_url'); ?>"><?php _e('Button Url', 'hire-me-widget'); ?></label>
                <input id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo $button_url; ?>" class="widefat" />
            </p>
            
            
	<?php }

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
                // Fields
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['team_type'] = strip_tags($new_instance['team_type']);
                $instance['status'] = strip_tags($new_instance['status']);
                $instance['freelance_site'] = strip_tags($new_instance['freelance_site']);
                $instance['button_url'] = strip_tags($new_instance['button_url']);
                return $instance;
	}

	// widget display
	function widget($args, $instance) {
		
                extract( $args );                                
                
                // these are the widget options
                $title = apply_filters('widget_title', $instance['title']);
                $team_type = $instance['team_type'];
                $status = $instance['status'];
                $freelane_site = $instance['freelance_site'];
                $button_url = $instance['button_url'];
                
                echo $before_widget;
                // Display the widget
                echo '<div class="widget-text hire-me-widget_box">';

                // Check if title is set
                if ( $title ) {
                   echo $before_title . $title . $after_title;
                }

                echo '<div>';
                
                if( $team_type ) {
                   
                   $team_type = str_replace(['an Agency','a Freelancer'],'', $team_type); 
                   echo $team_type;
                   
                }
                // Check if textarea is set
                if( $status ) {
                   echo strtolower( $status )== 'unavailable' ?"<span class=\"hmw-unavailable\">$status</span>":"<span class=\"hmw-available\">$status</span>";
                }
                
                if( $button_url && $freelane_site && strtolower( $status) == 'available' ) {
                  echo '&nbsp; on <a class="hmw-btn" target="_blank" href="'.$button_url.'" >'.$freelane_site.'</a>';
                }
                
                echo '</div>';
                echo '</div>';
                
                echo $after_widget;
                
	}
        
        function run(){
            add_action('widgets_init', create_function('', 'return register_widget("Hire_Me_Widget");'));
        }
}

?>