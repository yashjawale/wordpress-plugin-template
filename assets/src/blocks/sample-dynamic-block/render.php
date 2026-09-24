<?php
/**
 * Dynamic block render template.
 *
 * @package WordPressPluginTemplate
 */

defined( 'ABSPATH' ) || exit;

$content = $attributes['content'] ?? __( 'Dynamic block output', 'wordpress-plugin-template' );

// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- This helper returns escaped block wrapper attributes.
echo '<p ' . get_block_wrapper_attributes() . '>' . esc_html( $content ) . '</p>';
