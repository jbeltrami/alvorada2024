<?php
function theme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}

// Desabilita completamente o cálculo de frete
add_filter('woocommerce_cart_needs_shipping', '__return_false');

// Remove custos de entrega do carrinho
add_filter('woocommerce_package_rates', '__return_empty_array');

// Define frete como gratuito para todos os produtos
add_filter('woocommerce_shipping_free_shipping_is_available', '__return_true');

// 2) Habilita o editor de blocos para o post type 'product'
// add_filter('use_block_editor_for_post_type', function ($can_edit, $post_type) {
// 	if ('product' === $post_type) {
// 		$can_edit = true;
// 	}
// 	return $can_edit;
// }, 10, 2);
