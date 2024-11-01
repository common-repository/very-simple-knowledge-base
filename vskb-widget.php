<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class vskb_widget extends WP_Widget {
	// constructor 
	public function __construct() {
		$widget_ops = array( 'classname' => 'vskb-widget', 'description' => __('Display your categories and posts in a widget.', 'very-simple-knowledge-base') );
		parent::__construct( 'vskb_widget', __('VS Knowledge Base', 'very-simple-knowledge-base'), $widget_ops );
	}

	// set widget in dashboard
	function form( $instance ) {
		$instance = wp_parse_args( $instance, array(
			'vskb_title' => '',
			'vskb_text' => '',
			'vskb_columns' => '',
			'vskb_attributes' => ''
		));
		$vskb_title = !empty( $instance['vskb_title'] ) ? $instance['vskb_title'] : __('VS Knowledge Base', 'very-simple-knowledge-base');
		$vskb_text = $instance['vskb_text'];
		$vskb_columns = $instance['vskb_columns'];
		$vskb_attributes = $instance['vskb_attributes'];
		// widget input fields
		?>
		<p><label for="<?php echo $this->get_field_id( 'vskb_title' ); ?>"><?php esc_attr_e('Title', 'very-simple-knowledge-base'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vskb_title' ); ?>" name="<?php echo $this->get_field_name( 'vskb_title' ); ?>" type="text" value="<?php echo esc_attr( $vskb_title ); ?>"></p>
		<p><label for="<?php echo $this->get_field_id('vskb_text'); ?>"><?php esc_attr_e('Text above knowledge base', 'very-simple-knowledge-base'); ?>:</label>
		<textarea class="widefat monospace" rows="6" cols="20" id="<?php echo $this->get_field_id('vskb_text'); ?>" name="<?php echo $this->get_field_name('vskb_text'); ?>"><?php echo wp_kses_post( $vskb_text ); ?></textarea></p>
		<p><label for="<?php echo $this->get_field_id( 'vskb_columns' ); ?>"><?php esc_attr_e( 'Columns', 'very-simple-knowledge-base' ); ?>:</label>
		<select class="widefat" id="<?php echo $this->get_field_id( 'vskb_columns' ); ?>" name="<?php echo $this->get_field_name( 'vskb_columns' ); ?>">
			<option value='one'<?php echo (esc_attr($vskb_columns) == 'one')?' selected':''; ?>><?php esc_attr_e( 'One column', 'very-simple-knowledge-base' ); ?></option>
			<option value='two'<?php echo (esc_attr($vskb_columns) == 'two')?' selected':''; ?>><?php esc_attr_e( 'Two columns', 'very-simple-knowledge-base' ); ?></option>
			<option value='three'<?php echo (esc_attr($vskb_columns) == 'three')?' selected':''; ?>><?php esc_attr_e( 'Three columns', 'very-simple-knowledge-base' ); ?></option>
			<option value='four'<?php echo (esc_attr($vskb_columns) == 'four')?' selected':''; ?>><?php esc_attr_e( 'Four columns', 'very-simple-knowledge-base' ); ?></option>
			<option value='disable'<?php echo (esc_attr($vskb_columns) == 'disable')?' selected':''; ?>><?php esc_attr_e( 'Disable', 'very-simple-knowledge-base' ); ?></option>
		</select></p>
		<p><?php printf( esc_attr__( 'You can disable the columns with option %s.', 'very-simple-knowledge-base' ), esc_attr__( 'Disable', 'very-simple-knowledge-base' ) ); ?><br>
		<?php echo __( 'This can be handy if you only want to use your own styling.', 'very-simple-knowledge-base' ); ?></p>
		<p><label for="<?php echo $this->get_field_id( 'vskb_attributes' ); ?>"><?php esc_attr_e('Attributes', 'very-simple-knowledge-base'); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'vskb_attributes' ); ?>" name="<?php echo $this->get_field_name( 'vskb_attributes' ); ?>" type="text" placeholder="<?php esc_attr_e( 'Example', 'very-simple-knowledge-base' ); ?>: posts_per_category=&quot;2&quot;" value="<?php echo esc_attr( $vskb_attributes ); ?>"></p>
		<p><?php esc_attr_e( 'For info and available attributes', 'very-simple-knowledge-base' ); ?> <?php echo '<a href="https://wordpress.org/plugins/very-simple-knowledge-base" rel="noopener noreferrer" target="_blank">'.esc_attr__( 'click here', 'very-simple-knowledge-base' ).'</a>'; ?>.</p>
		<?php
	}

	// update widget
	function update( $new_instance, $old_instance ) {
		$instance = array();
		// sanitize input
		$instance['vskb_title'] = sanitize_text_field( $new_instance['vskb_title'] );
		$instance['vskb_text'] = wp_kses_post( $new_instance['vskb_text'] );
		$instance['vskb_columns'] = sanitize_text_field( $new_instance['vskb_columns'] );
		$instance['vskb_attributes'] = sanitize_text_field( $new_instance['vskb_attributes'] );
		return $instance;
	}

	// display widget with knowledge base in frontend
	function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( !empty( $instance['vskb_title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', esc_attr($instance['vskb_title']) ). $args['after_title'];
		}
		if ( !empty( $instance['vskb_text'] ) ) {
			echo '<div class="vskb-widget-text">'.wpautop( wp_kses_post($instance['vskb_text']).'</div>');
		}
		if ( !empty( $instance['vskb_columns'] ) ) {
			if ( $instance['vskb_columns'] == 'disable' ) {
				$widget_columns = 'columns="0"';
			} else if ( $instance['vskb_columns'] == 'one' ) {
				$widget_columns = 'columns="1"';
			} else if ( $instance['vskb_columns'] == 'two' ) {
				$widget_columns = 'columns="2"';
			} else if ( $instance['vskb_columns'] == 'three' ) {
				$widget_columns = 'columns="3"';
			} else if ( $instance['vskb_columns'] == 'four' ) {
				$widget_columns = 'columns="4"';
			}
		} else {
			$widget_columns = '';
		}
		$content = '[knowledgebase';
		if ( !empty( $instance['vskb_attributes'] ) ) {
			$content .= ' '.wp_strip_all_tags($instance['vskb_attributes']);
		}
		$content .= ' '.$widget_columns.']';
		echo do_shortcode( $content );
		echo $args['after_widget'];
	}
}
