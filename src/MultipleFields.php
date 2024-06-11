<?php

namespace Roel\WP\Settings;

class MultipleFields {
	/**
	 * The fields.
	 *
	 * @since 0.1.4
	 *
	 * @var Element[] $fields The fields.
	 */
	public array $fields = array();

	/**
	 * Constructor.
	 *
	 * @since 0.1.4
	 *
	 * @param Element[] $fields The fields.
	 */
	public function __construct( array $fields ) {
		$this->fields = $fields;
	}

	/**
	 * Render multiple fields.
	 *
	 * @since  0.1.4
	 *
	 * @return string Multiple fields rendered.
	 */
	public function render(): string {
		if ( empty( $this->fields ) ) {
			return '';
		}

		$html = '<fieldset>';

		foreach ( $this->fields as $field ) {
			if ( ! is_a( $field, Element::class ) ) {
				continue;
			}

			$rendered_field = $field->render();
			$rendered_field = str_replace( array( '<fieldset>', '</fieldset>' ), '', $rendered_field );
			$html          .= '<p>' . $rendered_field . '</p>';
		}

		$html .= '</fieldset>';

		return $html;
	}

	/**
	 * Print the HTML element.
	 * Useful when you have to print the HTML element right away.
	 *
	 * @since 0.1.4
	 */
	public function print() {
		echo $this->render();
	}
}
