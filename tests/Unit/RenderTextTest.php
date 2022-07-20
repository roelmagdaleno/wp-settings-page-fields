<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\Text;

it( 'renders text element', function () {
	$element = new Text( 'text-element', array(
		'label' => 'Custom Text Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<input type="text" id="text-element" name="testing_option_name[text-element]" value="" class="regular-text" placeholder="" />' );
} );

it( 'renders text element with spinner', function () {
	$element = new Text( 'text-element', array(
		'label'   => 'Custom Text Input',
		'spinner' => true,
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<input type="text" id="text-element" name="testing_option_name[text-element]" value="" class="regular-text" placeholder="" /><span class="spinner"></span>' );
} );

it( 'renders text element with filters', function () {
	add_filter( 'wp_text_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new Text( 'text-element', array(
		'label' => 'Custom Text Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><input type="text" id="text-element" name="testing_option_name[text-element]" value="" class="regular-text" placeholder="" />' );
} );

it( 'renders text element with specific filter', function () {
	add_filter( 'wp_text-element_text_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Text( 'text-element', array(
		'label' => 'Custom Text Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><input type="text" id="text-element" name="testing_option_name[text-element]" value="" class="regular-text" placeholder="" />' );
} );
