<?php

namespace Rehub\Gutenberg\Blocks;

defined( 'ABSPATH' ) OR exit;

class ReviewBox extends Basic {
	protected $name = 'reviewbox';

	protected $attributes = array(
		'title'       => array(
			'type'    => 'string',
			'default' => 'Awesome'
		),
		'description' => array(
			'type'    => 'string',
			'default' => 'Place here Description for your reviewbox',
		),
		'score'       => array(
			'type'    => 'number',
			'default' => 10,
		),
		'mainColor'   => array(
			'type'    => 'string',
			'default' => '#E43917',
		),
		'criterias'   => array(
			'type'    => 'object',
			'default' => array(),
		),
		'prosTitle'   => array(
			'type'    => 'string',
			'default' => 'Positive',
		),
		'positives'   => array(
			'type'    => 'object',
			'default' => array(),
		),
		'consTitle'   => array(
			'type'    => 'string',
			'default' => 'Negatives',
		),
		'negatives'   => array(
			'type'    => 'object',
			'default' => array(),
		),
		'uniqueClass' => array(
			'type'    => 'string',
			'default' => ''
		),
	);

	protected function inject_styles( $class_name, $color ) {
		$css = '.' . $class_name . ' .overall-score, .' . $class_name . ' .rate-bar-bar {';
		$css .= '   background:' . $color;
		$css .= '}';

		wp_register_style( 'reviewbox-inline-style', false, array( 'rhstyle' ) );
		wp_enqueue_style( 'reviewbox-inline-style' );
		wp_add_inline_style( 'reviewbox-inline-style', $css );
	}

	protected function render( $settings = array(), $inner_content = '' ) {
		$params                     = array();
		$criterias                  = '';
		$positives                  = '';
		$negatives                  = '';
		$params['score']            = $settings['score'];
		$params['title']            = $settings['title'];
		$params['description']      = $settings['description'];
		$params['prostitle']        = $settings['prosTitle'];
		$params['constitle']        = $settings['consTitle'];
		$params['additional_class'] = $settings['uniqueClass'];

		if ( ! empty( $settings['criterias'] ) ) {
			foreach ( $settings['criterias'] as $item ) {
				$criterias .= $item['title'] . ':' . (float) $item['value'] . ';';
			}

			$params['criterias'] = $criterias;
		}

		if ( ! empty( $settings['positives'] ) ) {
			foreach ( $settings['positives'] as $item ) {
				$positives .= $item['title'] . ';';
			}

			$params['pros'] = $positives;
		}

		if ( ! empty( $settings['negatives'] ) ) {
			foreach ( $settings['negatives'] as $item ) {
				$negatives .= $item['title'] . ';';
			}

			$params['cons'] = $negatives;
		}

		if ( ! is_admin() ) {
			$this->inject_styles( $settings['uniqueClass'], $settings['mainColor'] );
		}
		echo wpsm_reviewbox( $params );
	}
}