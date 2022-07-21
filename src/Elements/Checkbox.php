<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

/**
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class Checkbox extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML element.
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

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_checkbox_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$id}_checkbox_element", $html, $this->settings );
	}
}
