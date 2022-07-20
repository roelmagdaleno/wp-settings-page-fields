<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\Number;

it( 'renders number element', function () {
	$element = new Number( 'number-element', array(
		'label' => 'Custom Number Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<input type="number" id="number-element" name="testing_option_name[number-element]" value="" class="small-text" />' );
} );

it( 'renders number element with filters', function () {
	add_filter( 'wp_number_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new Number( 'number-element', array(
		'label' => 'Custom Number Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><input type="number" id="number-element" name="testing_option_name[number-element]" value="" class="small-text" />' );
} );

it( 'renders number element with specific filter', function () {
	add_filter( 'wp_number-element_number_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Number( 'number-element', array(
		'label' => 'Custom Number Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><input type="number" id="number-element" name="testing_option_name[number-element]" value="" class="small-text" />' );
} );
