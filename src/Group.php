<?php

namespace Roel\WP\Settings;

class Group {
	/**
	 * The elements inside the group.
	 *
	 * @since 0.1.0
	 *
	 * @var   array   $elements   The elements inside the group.
	 */
	public array $elements;

	/**
	 * Initialize the option name for each element.
	 *
	 * @since 0.1.0
	 *
	 * @param Element[]   $elements      The elements to group.
	 * @param string      $option_name   The option name for each element.
	 */
	public function __construct( array $elements, string $option_name ) {
		if ( empty( $elements ) ) {
			return;
		}

		foreach ( $elements as $element ) {
			$element->option_name = $option_name;
		}

		$this->elements = $elements;
	}

	/**
	 * Get the elements inside the group.
	 *
	 * @since  0.1.0
	 *
	 * @return array   The elements inside the group.
	 */
	public function elements() : array {
		return $this->elements;
	}
}
