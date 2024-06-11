<?php

namespace Roel\WP\Settings;

class MultipleFields {
	/**
	 * The ID.
	 *
	 * @since 0.1.5
	 *
	 * @var string $id The ID.
	 */
	public string $id;

	/**
	 * The label.
	 *
	 * @since 0.1.5
	 *
	 * @var string $label The label.
	 */
	public string $label;

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
	 * @since 0.1.5 New constructor attributes.
	 *
	 * @param string    $id     The ID.
	 * @param string    $label  The label.
	 * @param Element[] $fields The fields.
	 */
	public function __construct( string $id, string $label, array $fields ) {
		$this->id     = $id;
		$this->label  = $label;
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

	/**
	 * Get the input id.
	 *
	 * @since  0.1.5
	 *
	 * @return string   The input id.
	 */
	public function id(): string {
		return $this->id;
	}

	/**
	 * Get the label for current element.
	 *
	 * @since  0.1.5
	 *
	 * @return string   The label for current element.
	 */
	public function label(): string {
		return $this->label;
	}
}
