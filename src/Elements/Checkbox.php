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
		$value = $this->value();

		$html  = '<label for="' . esc_attr( $this->id() ) . '">';
		$html .= '<input type="checkbox" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="1" ';
		$html .= checked( '1', $value, false ) . ' />';
		$html .= $this->settings['description'] ?? '';
		$html .= '</label>';

		return $html;
	}
}
