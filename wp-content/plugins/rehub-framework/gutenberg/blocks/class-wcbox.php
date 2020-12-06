<?php

namespace Rehub\Gutenberg\Blocks;

defined( 'ABSPATH' ) OR exit;

class WCBox extends Basic {
	protected $name = 'wc-box';

	protected $attributes = array(
		'productId' => array(
			'type'    => 'string',
			'default' => '',
		),
	);

	protected function render( $settings = array(), $inner_content = '' ) {
		$id = $settings['productId'];

		if ( empty( $id ) ) {
			return;
		}

		if ( function_exists( 'wpsm_woobox_shortcode' ) ) {
			echo wpsm_woobox_shortcode( array( 'id' => $id ) );
		}
	}
}