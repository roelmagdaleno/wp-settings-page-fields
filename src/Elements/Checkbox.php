<?php

namespace Roel\WPFormElements\Elements;

use Roel\WPFormElements\Element;

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
		$html .= checked( '1', $this->value(), false ) . ' />';
		$html .= $this->description();
		$html .= '</label></fieldset>';

		return $html;
	}
}
