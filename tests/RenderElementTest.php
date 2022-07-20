<?php

use Roel\WP\Settings\Elements\Text;

it( 'renders input text element', function () {
	$text = new Text('input-text', array());
	expect($text->render())->toBe('');
} );
