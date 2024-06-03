<?php

uses( WP_UnitTestCase::class );

use Roel\WP\Settings\Elements\SelectMultiple;

it( 'renders select element', function () {
	$element = new SelectMultiple( 'select-element', array(
		'label'   => 'Custom Select Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<select id="select-element" name="testing_option_name[select-element][]" ><option value="a" >A</option><option value="b" >B</option></select>' );
} );

it( 'renders select element with filters', function () {
	add_filter( 'wp_select_element', function ( $html ) {
		return '<p>Prefix</p>' . $html;
	} );

	$element = new SelectMultiple( 'select-element', array(
		'label'   => 'Custom Select Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Prefix</p><select id="select-element" name="testing_option_name[select-element][]" ><option value="a" >A</option><option value="b" >B</option></select>' );
} );

it( 'renders select element with specific filter', function () {
	add_filter( 'wp_select-element_select_element', function ( $html ) {
		return '<p>Specific Filter</p>' . $html;
	} );

	$element = new Select( 'select-element', array(
		'label'   => 'Custom Select Input',
		'options' => array(
			'a' => array( 'label' => 'A' ),
			'b' => array( 'label' => 'B' ),
		),
	), 'testing_option_name' );

	expect( $element->render() )->toBe( '<p>Specific Filter</p><select id="select-element" name="testing_option_name[select-element]" ><option value="a" >A</option><option value="b" >B</option></select>' );
} );
