<?php
function zor_products_carousel()
{
	// Bail out if function doesn’t exist.
	if (!function_exists('acf_register_block')) {
		return;
	}

	// Register a new block.
	acf_register_block([
		'name'        => 'products-carousel',
		'title'        => __('Products Carousel'),
		'description'    => __('A custom block with a carousel of products.'),
		'render_callback'  => 'zor_products_carousel_render_callback',
		'category'      => 'alvorada',
		'icon'        => 'admin-comments',
		'keywords'      => array('products', 'carousel'),
	]);
}

function zor_products_carousel_render_callback($block, $content = '', $is_preview = false)
{
	$context = Timber::context();

	// Store block values.
	$context['block'] = $block;

	// Store field values.
	$context['fields'] = get_fields();

	// Store $is_preview value.
	$context['is_preview'] = $is_preview;

	// Render the block.
	Timber::render('/block/products-carousel/products-carousel.twig', $context);
}
