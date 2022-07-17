<?php

namespace Roel\WPFormElements\Elements;

use Roel\WPFormElements\Element;

class Text extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.8.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		$html  = '<input type="text" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= 'class="regular-text" placeholder="' . esc_attr( $this->placeholder() ) . '" />';

		if ( isset( $this->settings['spinner'] ) ) {
			$html .= '<span class="spinner"></span>';
		}

		if ( isset( $this->settings['description'] ) ) {
			$html .= '<p class="description">' . $this->settings['description'] . '</p>';
		}

		return $html;
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
