<?php

namespace Roel\WPFormElements\Elements;

use Roel\WPFormElements\Element;

class Select extends Element {
	/**
	 * Render the HTML component.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML component.
	 */
	public function render() : string {
		if ( empty( $this->settings['options'] ) ) {
			return '';
		}

		$html  = '<select id="' . esc_attr( $this->id() ) . '" ';
		$html .= 'name="' . esc_attr( $this->name() ) . '" ' . $this->attributes() . '>';

		foreach ( $this->settings['options'] as $value => $label ) {
			$is_selected = selected( $this->value(), $value, false );

			$html .= '<option value="' . esc_attr( $value ) . '" ' . $is_selected . ' >';
			$html .= $label . '</option>';
		}

		$html .= '</select>';
		$html .= $this->description();

		return $html;
	}
}
