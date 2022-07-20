<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\Checkbox;

it( 'renders checkbox element', function () {
	$element = new Checkbox( 'checkbox-element', array(
		'label' => 'Custom Checkbox Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<fieldset><label for="checkbox-element"><input type="checkbox" id="checkbox-element" name="testing_option_name[checkbox-element]" value="1"  /></label></fieldset>' );
} );

it( 'renders checkbox element with filters', function () {
	add_filter( 'wp_checkbox_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new Checkbox( 'checkbox-element', array(
		'label' => 'Custom Checkbox Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><fieldset><label for="checkbox-element"><input type="checkbox" id="checkbox-element" name="testing_option_name[checkbox-element]" value="1"  /></label></fieldset>' );
} );

it( 'renders checkbox element with specific filter', function () {
	add_filter( 'wp_checkbox-element_checkbox_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Checkbox( 'checkbox-element', array(
		'label' => 'Custom Checkbox Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><fieldset><label for="checkbox-element"><input type="checkbox" id="checkbox-element" name="testing_option_name[checkbox-element]" value="1"  /></label></fieldset>' );
} );
