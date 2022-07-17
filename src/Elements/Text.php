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
		$html  = '<input type="text" id="' . $this->id() . '" ';
		$html .= 'name="' . $this->name() . '" value="' . $this->value() . '" ';
		$html .= 'class="regular-text" placeholder="' . $this->placeholder() . '" />';

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
