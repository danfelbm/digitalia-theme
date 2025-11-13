<?php
/**
 * ACF Fields for Preguntas Frecuentes Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_preguntas_frecuentes_acf_fields')) {
    function digitalia_register_preguntas_frecuentes_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_preguntas_frecuentes_page',
                'title' => 'Contenido de Preguntas Frecuentes',
                'show_in_rest' => true,
                'fields' => array(
                    // Page Header Section
                    array(
                        'key' => 'field_faq_header',
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
                                'default_value' => 'Preguntas Frecuentes',
                            ),
                            array(
                                'key' => 'field_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Encuentra respuestas a las preguntas más comunes.',
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
                                'default_value' => 'Contactar soporte',
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
                                'default_value' => '/contacto',
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
                                'default_value' => '',
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
                    // FAQ Content Section
                    array(
                        'key' => 'field_faq_content',
                        'label' => 'Contenido FAQ',
                        'name' => 'faq_content',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_faq_badge_text',
                                'label' => 'Texto del Badge',
                                'name' => 'badge_text',
                                'type' => 'text',
                                'default_value' => 'FAQ',
                            ),
                            array(
                                'key' => 'field_faq_main_title',
                                'label' => 'Título Principal',
                                'name' => 'main_title',
                                'type' => 'text',
                                'default_value' => 'Preguntas y Respuestas Frecuentes',
                            ),
                            array(
                                'key' => 'field_faq_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Descubre toda la información esencial sobre nuestra plataforma y cómo puede satisfacer tus necesidades.',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/preguntas-frecuentes.php',
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

add_action('acf/init', 'digitalia_register_preguntas_frecuentes_acf_fields');
