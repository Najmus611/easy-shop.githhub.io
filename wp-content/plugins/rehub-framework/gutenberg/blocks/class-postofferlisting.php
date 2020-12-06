<?php

namespace Rehub\Gutenberg\Blocks;

defined( 'ABSPATH' ) OR exit;

class PostOfferListing extends Basic {
	protected $name = 'post-offer-listing';

	protected $attributes = array(
		'selectedPosts' => array(
			'type'    => 'object',
			'default' => array(),
		),
	);

	protected function render( $settings = array(), $inner_content = '' ) {
		$selected_posts = $settings['selectedPosts'];

		if ( empty( $selected_posts ) || count( $selected_posts ) === 0 ) {
			echo '';
			return;
		}

		echo wpsm_toprating_shortcode( array( 'postid' => join( ' ,', $selected_posts ) ) );

	}
}