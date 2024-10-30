<?php
// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Initialize Timber.
Timber\Timber::init();


function custom_block_category($categories)
{
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'alvorada',
				'title' => __('Alvorada Blocks'),
			],
		]
	);
}

// Includes
include get_theme_file_path('/includes/timber.php');
include get_theme_file_path('/includes/woocommerce.php');
include get_theme_file_path('/includes/front/enqueue.php');
