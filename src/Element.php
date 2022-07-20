<?php

namespace Roel\WP\Settings;

abstract class Element {
	/**
	 * The component id.
	 *
	 * @since 0.1.0
	 *
	 * @var   string   $id   The component id.
	 */
	private string $id;

	/**
	 * The component option name.
	 *
	 * @since 0.1.0
	 *
	 * @var   string   $option_name   The component option name.
	 */
	public string $option_name;

	/**
	 * The component settings.
	 *
	 * @since 0.1.0
	 *
	 * @var   array   $settings   The component settings.
	 */
	public array $settings;

	/**
	 * Initialize the properties to render the component.
	 *
	 * @since 0.1.0
	 *
	 * @param string   $id         The component id.
	 * @param array    $settings   The component settings.
	 */
	public function __construct(string $id = '', array $settings = array()) {
		$this->id = $id;
		$this->settings = $settings;
	}

	/**
	 * Render the HTML component.
	 * This method must be declared in every class where this class is extended.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The HTML component.
	 */
	abstract public function render() : string;

	/**
	 * Return the HTML component when echo the instance.
	 *
	 * @since  0.1.0
	 *
	 * @return string   Return the HTML component when echo the instance.
	 */
	public function __toString() : string {
		return $this->render();
	}

	/**
	 * Render the specified attributes into the HTML component.
	 *
	 * We only accept some attributes like "onclick", "onchange", etc.
	 * Check the "$valid_attrs" variable to see which attributes are valid.
	 *
	 * @since  0.1.0
	 *
	 * @return string   The component attributes.
	 */
	public function attributes() : string {
		if ( ! isset( $this->settings['attributes'] ) || empty( $this->settings['attributes'] ) ) {
			return '';
		}

		$attributes = '';

		foreach ( $this->settings['attributes'] as $attribute => $value ) {
			$attributes .= ' ' . esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}

		return $attributes;
	}

	/**
	 * Get the value for the current input.
	 *
	 * If there's an "alteration" the value will be parsed according
	 * to the current value. There's only one alteration for now: "protect_string".
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
	 *
	 * @SuppressWarnings(PHPMD.ShortMethodName)
	 */
	public function id() : string {
		return $this->id;
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
		return apply_filters( "wp_{$this->id}_element", $name );
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

		return $description;
	}
}
