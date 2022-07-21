<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Hidden extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.8.0
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		$html  = '<input type="hidden" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= $this->attributes() . '/>';

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_hidden_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_hidden_element", $html, $this->settings );
	}
}
