<?php
/**
 * Utility functions for handling post types
 *
 * @package Digitalia
 */

function digitalia_get_public_post_types() {
    // Make sure post types are registered
    if (!did_action('init')) {
        error_log('Warning: Attempting to get post types before init');
        return array();
    }

    // Get all post types (both built-in and custom)
    $args = array(
        'public'   => true,
        'show_ui'  => true
    );
    
    $output = 'objects'; // We want the full post type objects
    $operator = 'and'; // Both public AND show_ui must be true
    
    $post_types = get_post_types($args, $output, $operator);

    // Debug output - only when WP_DEBUG is enabled
    if (defined('WP_DEBUG') && WP_DEBUG) {
        // temporary disable error_log('Available post types: ' . print_r(array_keys($post_types), true));
    }

    return $post_types;
}

function digitalia_get_post_type_config_key($post_type_name) {
    // Ensure consistent naming by converting hyphens to underscores
    // and adding _config suffix
    return str_replace('-', '_', sanitize_title($post_type_name)) . '_config';
}
