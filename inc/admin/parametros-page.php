<?php
/**
 * Register Parámetros Options Page
 *
 * @package Digitalia
 */

function digitalia_register_parametros_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Parámetros',
            'menu_title' => 'Parámetros',
            'menu_slug' => 'parametros',
            'capability' => 'edit_posts',
            'redirect' => false,
            'position' => 80,
            'icon_url' => 'dashicons-admin-generic'
        ));
    }
}
add_action('acf/init', 'digitalia_register_parametros_page');
