<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Checkbox extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		$id = esc_attr( $this->id() );

		$html  = '<fieldset>';
		$html .= '<label for="' . $id . '">';
		$html .= '<input type="checkbox" id="' . $id . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="1" ';
		$html .= checked( '1', $this->value(), false ) . $this->attributes() . ' />';
		$html .= $this->description();
		$html .= '</label></fieldset>';

		return $html;
	}
}
