<?php
function zor_ctas()
{
  // Bail out if function doesn’t exist.
  if (!function_exists('acf_register_block')) {
    return;
  }

  // Register a new block.
  acf_register_block([
    'name'        => 'ctas',
    'title'        => __('CTAs'),
    'description'    => __('Esse bloco adiciona botoes para Call to Action.'),
    'render_callback'  => 'zor_ctas_render_callback',
    'category'      => 'alvorada',
    'icon'        => 'admin-comments',
    'keywords'      => array('image', 'text'),
  ]);
}

/**
 *  This is the callback that displays the block.
 *
 * @param   array  $block      The block settings and attributes.
 * @param   string $content    The block content (emtpy string).
 * @param   bool   $is_preview True during AJAX preview.
 */
function zor_ctas_render_callback($block, $content = '', $is_preview = false)
{
  $context = Timber::context();

  // Store block values.
  $context['block'] = $block;

  // Store field values.
  $context['fields'] = get_fields();

  // Store $is_preview value.
  $context['is_preview'] = $is_preview;

  // Render the block.
  Timber::render('/block/ctas/ctas.twig', $context);
}
