<?php

namespace Rehub\Gutenberg\Blocks;

defined( 'ABSPATH' ) OR exit;

class ColorHeading extends Basic {
	protected $name = 'color-heading';

	protected $attributes = array(
		'title'           => array(
			'type'    => 'string',
			'default' => 'Sample title',
		),
		'subtitle'        => array(
			'type'    => 'string',
			'default' => 'Sample subtitle',
		),
		'backgroundColor' => array(
			'type'    => 'string',
			'default' => '#ebf2fc',
		),
		'titleColor'      => array(
			'type'    => 'string',
			'default' => '#111'
		),
		'subtitleColor'   => array(
			'type'    => 'string',
			'default' => '#111'
		),
	);

	protected function render( $settings = array(), $inner_content = '' ) {
		$html            = '';
		$title           = $settings['title'];
		$subtitle        = $settings['subtitle'];
		$styles          = 'background-color:' . $settings['backgroundColor'] . ';';
		$title_styles    = 'color:' . $settings['titleColor'] . ';';
		$subtitle_styles = 'color:' . $settings['subtitleColor'] . ';';

		if ( empty( $title ) && empty( $subtitle ) ) {
			return;
		}

	    $anchor = rh_convert_cyr_symbols($subtitle);
	    $anchor = str_replace(array('\'', '"'), '', $anchor); 
	    $spec = preg_quote( '\'.+$*~=' );
	    $anchor = preg_replace("/[^a-zA-Z0-9_$spec\-]+/", '-', $anchor );
	    $anchor = strtolower( trim( $anchor, '-') );
	    $anchor = substr( $anchor, 0, 70 );

		$html .= '<div class="rh-color-heading alignfull pt30 pb30 blackcolor mb35" style="' . esc_attr( $styles ) . '">';
		$html .= '	<div class="rh-container">';
		$html .= '			<p id="'.$anchor.'" class="mb15 font130" style="' . esc_attr( $subtitle_styles ) . '">';
		$html .= '			' . $subtitle . '';
		$html .= '			</p>';
		$html .= '			<h2 class="mt0 mb10 font200" style="' . esc_attr( $title_styles ) . '">';
		$html .= '			' . $title . '';
		$html .= '			</h2>';
		$html .= '	</div>';
		$html .= '</div>';

		echo $html;
	}
}