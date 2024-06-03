<?php

namespace Roel\WP\Settings\Elements;

use Roel\WP\Settings\Element;

class SelectMultiple extends Element {
	/**
	 * Render the HTML element.
	 *
	 * @since  0.1.2
	 *
	 * @return string   The HTML element.
	 */
	public function render() : string {
		if ( empty( $this->settings['options'] ) ) {
			return '';
		}

		$values = $this->value();
		$html   = '<select id="' . esc_attr( $this->id() ) . '" ';
		$html  .= 'name="' . esc_attr( $this->name() . '[]' ) . '" multiple ' . $this->attributes() . '>';

		foreach ( $this->settings['options'] as $value => $option ) {
			$is_selected = in_array( $value, $values, true ) ? 'selected' : '';

			$html .= '<option value="' . esc_attr( $value ) . '" ' . $is_selected;
			$html .= $this->attributes( $option['attributes'] ?? array() ) . '>';
			$html .= $option['label'] . '</option>';
		}

		$html .= '</select>';
		$html .= $this->description();

		/**
		 * Change the HTML output.
		 *
		 * @since 0.1.2
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		$html = apply_filters( 'wp_select_multiple_element', $html, $this->settings );

		/**
		 * Change the HTML output for a specific element.
		 *
		 * @since 0.1.2
		 *
		 * @param string   $html       The HTML output.
		 * @param array    $settings   The element settings.
		 */
		return apply_filters( "wp_{$this->id()}_select_multiple_element", $html, $this->settings );
	}
}
