<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Number extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.8.0
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		$html  = '<input type="number" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= 'class="small-text" ' . $this->attributes() . '/>';

		if ( isset( $this->settings['right-text'] ) ) {
			$html .= $this->settings['right-text'];
		}

		if ( isset( $this->settings['spinner'] ) ) {
			$html .= '<span class="spinner"></span>';
		}

		$html .= $this->description();

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_number_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_number_element", $html, $this->settings );
	}
}
