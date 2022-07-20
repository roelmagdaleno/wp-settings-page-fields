<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Hidden extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.8.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		$html  = '<input type="hidden" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= $this->attributes() . ' />';

		return $html;
	}
}
