<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\TextArea;

it( 'renders textarea element', function () {
	$element = new TextArea( 'textarea-element', array(
		'label' => 'Custom TextArea Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<textarea rows="10" cols="50" id="textarea-element" name="testing_option_name[textarea-element]" class="large-text code" placeholder="" ></textarea>' );
} );

it( 'renders textarea element with filters', function () {
	add_filter( 'wp_textarea_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new TextArea( 'textarea-element', array(
		'label' => 'Custom TextArea Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><textarea rows="10" cols="50" id="textarea-element" name="testing_option_name[textarea-element]" class="large-text code" placeholder="" ></textarea>' );
} );

it( 'renders textarea element with specific filter', function () {
	add_filter( 'wp_textarea-element_textarea_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new TextArea( 'textarea-element', array(
		'label' => 'Custom TextArea Input',
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><textarea rows="10" cols="50" id="textarea-element" name="testing_option_name[textarea-element]" class="large-text code" placeholder="" ></textarea>' );
} );
