<?php

namespace Roel\WP\Settings;

/**
 * @SuppressWarnings(PHPMD.ShortMethodName)
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
abstract class Element {
	/**
	 * The element id.
	 *
	 * @since 0.1.0
	 *
	 * @var   string   $id   The element id.
	 */
	private string $id;

	/**
	 * The element option name.
	 *
	 * @since 0.1.0
	 *
	 * @var   string   $option_name   The element option name.
	 */
	public string $option_name;

	/**
	 * The element settings.
	 *
	 * @since 0.1.0
	 *
	 * @var   array   $settings   The element settings.
	 */
	public array $settings;

	/**
	 * Initialize the properties to render the element.
	 *
	 * @since 0.1.0
	 *
	 * @param string   $id            The element id.
	 * @param array    $settings      The element settings.
	 * @param string   $option_name   The element option name.
	 */
	public function __construct( string $id = '', array $settings = array(), string $option_name = '' ) {
		$this->id          = $id;
		$this->settings    = $settings;
		$this->option_name = $option_name;
	}

	/**
	 * Return the HTML element when echo the instance.
	 *
	 * @since  0.1.0
	 *
	 * @return string   Return the HTML element when echo the instance.
	 */
	public function __toString() : string {
		return $this->render();
	}

	/**
	 * Render the HTML element.
	 * This method must be declared in every class where this class is extended.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML element.
	 */
	abstract public function render() : string;

	/**
	 * Print the HTML element.
	 * Useful when you have to print the HTML element right away.
	 *
	 * @since 0.1.0
	 */
	public function print() {
		echo $this->render();
	}

	/**
	 * Render the specified attributes into the HTML element.
	 *
	 * @since  0.1.0
	 *
	 * @param  array   $attributes   The attributes to render to the current element.
	 * @return string                The element attributes.
	 */
	public function attributes( array $attributes = array() ) : string {
		$el_attributes = empty( $attributes ) ? $this->settings['attributes'] ?? array() : $attributes;

		if ( empty( $el_attributes ) ) {
			return '';
		}

		$attributes = '';

		foreach ( $el_attributes as $attribute => $value ) {
			$attributes .= ' ' . esc_attr( $attribute ) . '="' . esc_attr( $value ) . '" ';
		}

		return $attributes;
	}

	/**
	 * Get the value for the current input.
	 *
	 * @since  0.1.0
	 *
	 * @return mixed   The value for the current input.
	 */
	public function value() {
		if ( ! function_exists( 'get_option' ) ) {
			return false;
		}

		$settings = get_option( $this->option_name, array() );

		if ( empty( $settings ) ) {
			return false;
		}

		return $settings[ $this->id ] ?? $this->settings['default_value'] ?? false;
	}

	/**
	 * Get the input id.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The input id.
	 */
	public function id() : string {
		return $this->id;
	}

	/**
	 * Get the label for current element.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The label for current element.
	 */
	public function label() : string {
		return $this->settings['label'] ?? '';
	}

	/**
	 * Get the input name.
	 * The generated input name will be constructed from the option name and id.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The input name.
	 */
	public function name() : string {
		$name = $this->option_name . '[' . $this->id . ']';
		return apply_filters( "wp_{$this->id}_name_attribute", $name );
	}

	/**
	 * Get the `<input />` description.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The `<input />` description.
	 */
	public function description() : string {
		if ( ! isset( $this->settings['description'] ) ) {
			return '';
		}

		$id = str_replace( '_', '-', $this->id() ) . '-description';

		$description  = '<p class="description" id="' . esc_attr( $id ) . '">';
		$description .= $this->settings['description'];
		$description .= '</p>';

		/**
		 * Change the element description.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $description   The element description.
		 */
		$description = apply_filters( 'wp_element_description', $description );

		/**
		 * Change the specific element description.
		 *
		 * @since 0.1.0
		 *
		 * @param string   $description   The element description.
		 */
		return apply_filters( "wp_{$this->id}_description", $description );
	}
}
