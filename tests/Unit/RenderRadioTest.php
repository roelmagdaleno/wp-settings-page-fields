<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\Radio;

it( 'renders radio element', function () {
	$element = new Radio( 'radio-element', array(
		'label'   => 'Custom Radio Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<fieldset ><p> <label><input type="radio" id="a" name="testing_option_name[radio-element]" value="a" />A</p> </label><p> <label><input type="radio" id="b" name="testing_option_name[radio-element]" value="b" />B</p> </label></fieldset>' );
} );

it( 'renders radio element with filters', function () {
	add_filter( 'wp_radio_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new Radio( 'radio-element', array(
		'label'   => 'Custom Radio Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><fieldset ><p> <label><input type="radio" id="a" name="testing_option_name[radio-element]" value="a" />A</p> </label><p> <label><input type="radio" id="b" name="testing_option_name[radio-element]" value="b" />B</p> </label></fieldset>' );
} );

it( 'renders radio element with specific filter', function () {
	add_filter( 'wp_radio-element_radio_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Radio( 'radio-element', array(
		'label'   => 'Custom Radio Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><fieldset ><p> <label><input type="radio" id="a" name="testing_option_name[radio-element]" value="a" />A</p> </label><p> <label><input type="radio" id="b" name="testing_option_name[radio-element]" value="b" />B</p> </label></fieldset>' );
} );
