<?php
/**
 * ACF Fields for Biblioteca Digital Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_biblioteca_digital_acf_fields')) {
    function digitalia_register_biblioteca_digital_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_biblioteca_digital_page',
                'title' => 'Contenido de Biblioteca Digital',
                'show_in_rest' => true,
                'fields' => array(
                    // Page Header Section
                    array(
                        'key' => 'field_biblioteca_digital_header',
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
                                'default_value' => 'Biblioteca Digital',
                            ),
                            array(
                                'key' => 'field_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Explora nuestra colección de recursos digitales y documentos.',
                            ),
                            array(
                                'key' => 'field_header_show_cta',
                                'label' => 'Mostrar CTA',
                                'name' => 'show_cta',
                                'type' => 'true_false',
                                'default_value' => 0,
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_header_cta_text',
                                'label' => 'Texto del CTA',
                                'name' => 'cta_text',
                                'type' => 'text',
                                'default_value' => 'Más información',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_header_show_cta',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_header_cta_url',
                                'label' => 'URL del CTA',
                                'name' => 'cta_url',
                                'type' => 'text',
                                'default_value' => '#',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_header_show_cta',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_header_show_credit_card_text',
                                'label' => 'Mostrar texto de tarjeta de crédito',
                                'name' => 'show_credit_card_text',
                                'type' => 'true_false',
                                'default_value' => 0,
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_header_credit_card_text',
                                'label' => 'Texto de tarjeta de crédito',
                                'name' => 'credit_card_text',
                                'type' => 'text',
                                'default_value' => 'No credit card required.',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_header_show_credit_card_text',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/biblioteca-digital.php',
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
                'show_in_rest' => 0,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_biblioteca_digital_acf_fields');
