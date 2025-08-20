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
