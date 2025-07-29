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
include get_theme_file_path('/includes/front/enqueue-editor.php');
include get_theme_file_path('/includes/front/allowed-blocks.php');
include get_theme_file_path('/includes/front/block-comments.php');


// Include Blocks
include get_theme_file_path('/includes/blocks/text-image.php');
include get_theme_file_path('/includes/blocks/ctas.php');
include get_theme_file_path('/includes/blocks/infos.php');
include get_theme_file_path('/includes/blocks/richtext.php');
include get_theme_file_path('/includes/blocks/posts-relacionados.php');
include get_theme_file_path('/includes/blocks/products-carousel.php');

// Hooks
add_action('wp_enqueue_scripts', 'zor_enqueue');
add_action('after_setup_theme', 'theme_add_woocommerce_support');
add_filter('allowed_block_types_all', 'alvorada_allowed_blocks');
add_action('enqueue_block_editor_assets', 'alvorada_enqueue_editor');

// Block hooks
add_action('acf/init', 'zor_text_image');
add_action('acf/init', 'zor_ctas');
add_action('acf/init', 'zor_infos');
add_action('acf/init', 'zor_richtext');
add_action('acf/init', 'zor_posts_relacionados');
add_action('acf/init', 'zor_products_carousel');


// Disable wpautop globally for content
remove_filter('the_content', 'wpautop');

// Disable wpautop globally for excerpts
remove_filter('the_excerpt', 'wpautop');
