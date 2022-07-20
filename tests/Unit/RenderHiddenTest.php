<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\Hidden;

it( 'renders hidden element', function () {
	$element = new Hidden( 'hidden-element', array(
		'label' => 'Custom Hidden Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<input type="hidden" id="hidden-element" name="testing_option_name[hidden-element]" value="" />' );
} );

it( 'renders hidden element with filters', function () {
	add_filter( 'wp_hidden_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new Hidden( 'hidden-element', array(
		'label' => 'Custom Hidden Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><input type="hidden" id="hidden-element" name="testing_option_name[hidden-element]" value="" />' );
} );

it( 'renders hidden element with specific filter', function () {
	add_filter( 'wp_hidden-element_hidden_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Hidden( 'hidden-element', array(
		'label' => 'Custom Hidden Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><input type="hidden" id="hidden-element" name="testing_option_name[hidden-element]" value="" />' );
} );
