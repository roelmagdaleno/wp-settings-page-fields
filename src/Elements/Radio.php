<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Radio extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.1.0
	 * @since  0.1.1   Change the attribute "options" to "inputs".
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		$html = '<fieldset ' . $this->attributes() . '>';

		foreach ( $this->settings['inputs'] as $value => $input ) {
			$html .= '<p> <label>';
			$html .= '<input type="radio" id="' . esc_attr( $value ) . '" ';
			$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $value ) . '" ';
			$html .= checked( $value, $this->value(), false ) . $this->attributes( $input['attributes'] ?? array() ) . '/>';
			$html .= $input['label'] . '</p> </label>';
		}

		$html .= $this->description();
		$html .= '</fieldset>';

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_radio_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_radio_element", $html, $this->settings );
	}
}
