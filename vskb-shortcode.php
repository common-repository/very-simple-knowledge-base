<?php
// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// create shortcode
function vskb_shortcode( $vskb_atts ) {
	// attributes
	$vskb_atts = shortcode_atts(array(
		'class' => '',
		'columns' => '4',
		'post_type' => 'post',
		'taxonomy' => 'category',
		'include' => '',
		'exclude' => '',
		'hide_empty' => 1,
		'posts_per_category' => -1,
		'order' => 'DESC',
		'orderby' => 'date',
		'category_description' => '',
		'woo_image' => '',
		'post_count' => '',
		'post_meta' => '',
		'view_all_link' => '',
		'view_all_link_label' => __('View All &raquo;', 'very-simple-knowledge-base'),
		'no_post_title_label' => __('(no title)', 'very-simple-knowledge-base'),
		'no_categories_text' => __('No categories found.', 'very-simple-knowledge-base')
	), $vskb_atts);
	// set class for ul
	if ($vskb_atts['columns'] == '0') {
		$columns = 'vskb-custom';
	} else if ($vskb_atts['columns'] == '1') {
		$columns = 'vskb-one';
	} elseif ($vskb_atts['columns'] == '2') {
		$columns = 'vskb-two';
	} elseif ($vskb_atts['columns'] == '3') {
		$columns = 'vskb-three';
	} else {
		$columns = 'vskb-four';
	}
	// initialize output
	$output = '';
	// main container
	if ( empty($vskb_atts['class']) ) {
		$custom_class = '';
	} else {
		$custom_class = ' '.sanitize_key($vskb_atts['class']);
	}
	// categories query
	$vskb_term_args = array(
		'order' => 'ASC',
		'orderby' => 'name',
		'taxonomy' => $vskb_atts['taxonomy'],
		'include' => $vskb_atts['include'],
		'exclude' => $vskb_atts['exclude'],
		'hide_empty' => $vskb_atts['hide_empty']
	);
	$vskb_terms = get_terms( $vskb_term_args );
	if ( !empty($vskb_terms) && !is_wp_error($vskb_terms) ) {	
		$output .= '<ul id="vskb" class="'.$columns.$custom_class.'">';
			foreach ($vskb_terms as $single_term) :
				// include template
				include 'vskb-template.php';
			endforeach;
		$output .= '</ul>';
	} else {
		$output .= '<p class="vskb-no-categories">';
		$output .= esc_attr($vskb_atts['no_categories_text']);
		$output .= '</p>';
	}
	// return output
	return $output;
}
add_shortcode('knowledgebase', 'vskb_shortcode');

// shortcode for one column
function vskb_one_column() {
	return '<p>'.sprintf( esc_attr__( 'This shortcode is deprecated. Use %s instead.', 'very-simple-knowledge-base' ), '<code>[knowledgebase columns="1"]</code>' ).'</p>';
}
add_shortcode('knowledgebase-one', 'vskb_one_column');

// shortcode for two columns
function vskb_two_columns() {
	return '<p>'.sprintf( esc_attr__( 'This shortcode is deprecated. Use %s instead.', 'very-simple-knowledge-base' ), '<code>[knowledgebase columns="2"]</code>' ).'</p>';
}
add_shortcode('knowledgebase-two', 'vskb_two_columns');

// shortcode for three columns
function vskb_three_columns() {
	return '<p>'.sprintf( esc_attr__( 'This shortcode is deprecated. Use %s instead.', 'very-simple-knowledge-base' ), '<code>[knowledgebase columns="3"]</code>' ).'</p>';
}
add_shortcode('knowledgebase-three', 'vskb_three_columns');
