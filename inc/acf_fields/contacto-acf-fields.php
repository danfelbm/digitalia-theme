<?php
/**
 * ACF Fields for Contacto Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_contacto_acf_fields')) {
    function digitalia_register_contacto_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_contacto_page',
                'title' => 'Contenido de Contacto',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Page Header Section
                    array(
                        'key' => 'field_contacto_header',
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
                                'default_value' => 'Contacto',
                            ),
                            array(
                                'key' => 'field_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Estamos aquí para ayudarte. Ponte en contacto con nosotros.',
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
                                'default_value' => '',
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
                    // Info Session Section
                    array(
                        'key' => 'field_info_session',
                        'label' => 'Sección de Sesión Informativa',
                        'name' => 'info_session',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_session_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Solicita una sesión informativa',
                            ),
                            array(
                                'key' => 'field_session_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Programa nacional de educomunicación y alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz.',
                            ),
                            array(
                                'key' => 'field_session_avatars',
                                'label' => 'Avatares',
                                'name' => 'avatars',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Agregar Avatar',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_avatar_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'thumbnail',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_session_features_title',
                                'label' => 'Título de Características',
                                'name' => 'features_title',
                                'type' => 'text',
                                'default_value' => 'Lo que incluye el programa:',
                            ),
                            array(
                                'key' => 'field_session_features',
                                'label' => 'Características',
                                'name' => 'features',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Agregar Característica',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_feature_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                    ),
                                ),
                                'default_value' => array(
                                    array(
                                        'text' => 'Desarrollo de habilidades y competencias comunicacionales TIC',
                                    ),
                                    array(
                                        'text' => 'Alfabetización mediática e informacional para tecnologías emergentes',
                                    ),
                                    array(
                                        'text' => 'Contenidos digitales y alfabetizadores transmedia para la paz',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_session_logos',
                                'label' => 'Logos',
                                'name' => 'logos',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Agregar Logo',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_logo_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'thumbnail',
                                    ),
                                    array(
                                        'key' => 'field_logo_alt',
                                        'label' => 'Texto Alternativo',
                                        'name' => 'alt',
                                        'type' => 'text',
                                        'default_value' => 'placeholder',
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
                            'value' => 'page-templates/contacto.php',
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

add_action('acf/init', 'digitalia_register_contacto_acf_fields');
