<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register VS Knowledge Base block in the backend.
 *
 * @since 7.2
 */
function vskb_register_block() {
	$attributes = array(
		'listType' => array(
			'type' => 'string'
		),
		'shortcodeSettings' => array(
			'type' => 'string'
		),
		'noNewChanges' => array(
			'type' => 'boolean'
		),
		'executed' => array(
			'type' => 'boolean'
		)
	);
	register_block_type(
		'vskb/vskb-block',
		array(
			'attributes' => $attributes,
			'render_callback' => 'vskb_get_knowledge_base'
		)
	);
}
add_action( 'init', 'vskb_register_block' );

/**
 * Load VS Knowledge Base block scripts.
 *
 * @since 7.2
 */
function vskb_enqueue_block_editor_assets() {
	wp_enqueue_style(
		'vskb-style',
		plugins_url('/css/vskb-style.min.css',__FILE__ )
	);
	wp_enqueue_script(
		'vskb-block-script',
		plugins_url( '/js/vskb-block.js' , __FILE__ ),
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		false,
		true
	);
	$dataL10n = array(
		'title' => esc_html__( 'VS Knowledge Base', 'very-simple-knowledge-base' ),
		'addSettings' => esc_html__( 'Settings', 'very-simple-knowledge-base' ),
		'listTypeLabel' => esc_html__( 'Columns', 'very-simple-knowledge-base' ),
		'listTypes' => array(
			array(
				'id' => 'four',
				'label' => esc_html__( 'Four columns', 'very-simple-knowledge-base' )
			),
			array(
				'id' => 'three',
				'label' => esc_html__( 'Three columns', 'very-simple-knowledge-base' )
			),
			array(
				'id' => 'two',
				'label' => esc_html__( 'Two columns', 'very-simple-knowledge-base' )
			),
			array(
				'id' => 'one',
				'label' => esc_html__( 'One column', 'very-simple-knowledge-base' )
			),
			array(
				'id' => 'disable',
				'label' => esc_html__( 'Disable', 'very-simple-knowledge-base' )
			)
		),
		'shortcodeSettingsLabel' => esc_html__( 'Attributes', 'very-simple-knowledge-base' ),
		'example' => esc_html__( 'Example', 'very-simple-knowledge-base' ),
		'previewButton' => esc_html__( 'Apply changes', 'very-simple-knowledge-base' ),
		'linkText' => esc_html__( 'For info and available attributes', 'very-simple-knowledge-base' ),
		'linkLabel' => esc_html__( 'click here', 'very-simple-knowledge-base' )
	);
	wp_localize_script(
		'vskb-block-script',
		'vskb_block_l10n',
		$dataL10n
	);
}
add_action( 'enqueue_block_editor_assets', 'vskb_enqueue_block_editor_assets' );

/**
 * Get shortcode with attributes to display in a VS Knowledge Base block.
 *
 * @since 7.2
 */
function vskb_get_knowledge_base( $attr ) {
	$return = '';
	if ( isset( $attr['listType'] ) ) {
		if ( $attr['listType'] == 'disable' ) {
			$list_type = 'columns="0"';
		} else if ( $attr['listType'] == 'one' ) {
			$list_type = 'columns="1"';
		} else if ( $attr['listType'] == 'two' ) {
			$list_type = 'columns="2"';
		} else if ( $attr['listType'] == 'three' ) {
			$list_type = 'columns="3"';
		} else if ( $attr['listType'] == 'four' ) {
			$list_type = 'columns="4"';
		}
	} else {
		$list_type = 'columns="4"';
	}
	$shortcode_settings = isset( $attr['shortcodeSettings'] ) ? $attr['shortcodeSettings'] : '';
	$shortcode_settings = str_replace( array( '[', ']' ), '', $shortcode_settings );
	$return .= do_shortcode( '[knowledgebase ' . $shortcode_settings . ' ' . $list_type .']' );
	return $return;
}
