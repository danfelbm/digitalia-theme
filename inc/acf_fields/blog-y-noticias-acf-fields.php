<?php
/**
 * ACF Fields for Blog y Noticias Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_blog_y_noticias_acf_fields')) {
    function digitalia_register_blog_y_noticias_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_blog_y_noticias_page',
                'title' => 'Contenido de Blog y Noticias',
                'show_in_rest' => true,
                'fields' => array(
                    // Page Header Section
                    array(
                        'key' => 'field_blog_header',
                        'label' => 'Encabezado de Página',
                        'name' => 'page_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Blog y Noticias',
                            ),
                            array(
                                'key' => 'field_header_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Mantente al día con las últimas noticias y artículos del sector digital.',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/blog-y-noticias.php',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_blog_y_noticias_acf_fields');
