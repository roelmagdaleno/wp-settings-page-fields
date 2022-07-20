<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Radio extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		$html = '<fieldset>';

		foreach ( $this->settings['options'] as $value => $option ) {
			$html .= '<p> <label>';
			$html .= '<input type="radio" id="' . esc_attr( $value ) . '" ';
			$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $value ) . '" ';
			$html .= checked( $value, $this->value(), false ) . '/>' . $option['label'];
			$html .= '</p> </label>';
		}

		$html .= $this->description();
		$html .= '</fieldset>';

		return $html;
	}
}
