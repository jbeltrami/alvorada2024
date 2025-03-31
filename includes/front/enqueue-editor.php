<?php

function alvorada_enqueue_editor()
{
	$uri = get_theme_file_uri();

	//Register styles
	wp_register_style('zor_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', []);
	wp_register_style('zor_style', $uri . '/dist/styles.min.css', ['zor_bootstrap', 'wp-edit-blocks']);
	wp_register_style('lib_splide_css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', []);

	// Enqueue Styles
	wp_enqueue_style('zor_style');
	wp_enqueue_style('zor_bootstrap');
	wp_enqueue_style('lib_splide_css');


	// Register Scripts
	wp_register_script('zor_popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', [], '', true);
	wp_register_script('lib_splide_js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', [], '', true);
	wp_register_script('zor_bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['zor_popper'], '', true);
	wp_register_script('zor_functions', $uri . '/dist/index.js', ['lib_splide_js', 'zor_bootstrap_js', 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'], '', true);

	// Enqueue Scripts
	wp_enqueue_script('zor_popper');
	wp_enqueue_script('lib_splide_js');
	wp_enqueue_script('zor_bootstrap_js');
	wp_enqueue_script('wc-add-to-cart'); // Enqueue WooCommerce's AJAX add-to-cart script
	wp_enqueue_script('zor_functions');
}
