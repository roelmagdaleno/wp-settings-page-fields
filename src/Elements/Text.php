<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class Text extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		$html  = '<input type="text" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= 'class="regular-text" placeholder="' . esc_attr( $this->placeholder() ) . '" ';
		$html .= $this->attributes() . '/>';

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
		$html = apply_filters( 'wp_text_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_text_element", $html, $this->settings );
	}

	/**
	 * Get the `<input />` placeholder.
	 *
	 * @since  0.1.0
	 *
	 * @return false|string   The `<input />` placeholder.
	 */
	public function placeholder() {
		return $this->settings['placeholder'] ?? false;
	}
}
