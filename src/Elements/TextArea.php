<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class TextArea extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		$html  = '<textarea rows="' . esc_attr( $this->settings['rows'] ?? 10 ) . '" ';
		$html .= 'cols="' . esc_attr( $this->settings['cols'] ?? 50 ) . '" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" class="large-text code" ';
		$html .= 'placeholder="' . $this->placeholder() . '" ' . $this->attributes() . '>';
		$html .= $this->value() . '</textarea>';

		$html .= $this->description();

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_textarea_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_textarea_element", $html, $this->settings );
	}

	/**
	 * Get the `<textarea />` placeholder.
	 *
	 * @since  0.1.0
	 *
	 * @return false|string   The `<textarea />` placeholder.
	 */
	public function placeholder() {
		return $this->settings['placeholder'] ?? false;
	}
}
