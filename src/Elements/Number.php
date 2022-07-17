<?php

namespace Roel\WPFormElements\Elements;

use Roel\WPFormElements\Element;

class Number extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.8.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		$html  = '<input type="number" id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" value="' . esc_attr( $this->value() ) . '" ';
		$html .= 'class="small-text" />';

		if ( isset( $this->settings['right-text'] ) ) {
			$html .= $this->settings['right-text'];
		}

		if ( isset( $this->settings['spinner'] ) ) {
			$html .= '<span class="spinner"></span>';
		}

		$html .= $this->description();

		return $html;
	}
}
