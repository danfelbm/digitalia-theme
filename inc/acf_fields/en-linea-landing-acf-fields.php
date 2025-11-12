<?php
/**
 * ACF Fields for En Línea Landing page template
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('digitalia_register_enlinea_landing_acf_fields')) {
    function digitalia_register_enlinea_landing_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_enlinea_landing_page',
                'title' => 'Contenido de En Línea Landing',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Case Studies Repeater
                    array(
                        'key' => 'field_case_studies',
                        'label' => 'Case Studies',
                        'name' => 'case_studies',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'min' => 2,
                        'max' => 0,
                        'button_label' => 'Agregar Case Study',
                        'instructions' => 'Agrega estudios de caso. El diseño se adaptará automáticamente: 2 cards = 2 columnas, 3 cards = 3 columnas, 4+ cards = 4 columnas.',
                        'default_value' => array(
                            array(
                                'title' => 'HealthPlus\'s Telemedicine Innovation',
                                'statistic_number' => '25%',
                                'statistic_description' => 'increase in patient satisfaction',
                                'button_url' => '#',
                            ),
                            array(
                                'title' => 'Ecolands\'s Sustainable Land Development',
                                'statistic_number' => '30%',
                                'statistic_description' => 'increase in land productivity',
                                'button_url' => '#',
                            ),
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'field_case_study_is_active',
                                'label' => 'Activo',
                                'name' => 'is_active',
                                'type' => 'true_false',
                                'ui' => 1,
                                'default_value' => 1,
                                'instructions' => 'Desactiva este case study para mostrarlo en escala de grises sin enlace.',
                            ),
                            array(
                                'key' => 'field_case_study_background_image',
                                'label' => 'Imagen de Fondo',
                                'name' => 'background_image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Imagen de fondo para la card. Recomendado: 800x1200px (vertical).',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_case_study_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                                'instructions' => 'Título del case study.',
                                'maxlength' => 100,
                            ),
                            array(
                                'key' => 'field_case_study_statistic_number',
                                'label' => 'Estadística (Número)',
                                'name' => 'statistic_number',
                                'type' => 'text',
                                'required' => 1,
                                'instructions' => 'Número o porcentaje (ej: "25%", "1000+", "$5M").',
                                'maxlength' => 20,
                            ),
                            array(
                                'key' => 'field_case_study_statistic_description',
                                'label' => 'Estadística (Descripción)',
                                'name' => 'statistic_description',
                                'type' => 'text',
                                'required' => 1,
                                'instructions' => 'Descripción de la estadística (ej: "increase in patient satisfaction").',
                                'maxlength' => 300,
                            ),
                            array(
                                'key' => 'field_case_study_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Read Story',
                                'instructions' => 'Texto que aparece en el botón.',
                                'maxlength' => 30,
                            ),
                            array(
                                'key' => 'field_case_study_button_url',
                                'label' => 'URL del Botón',
                                'name' => 'button_url',
                                'type' => 'url',
                                'required' => 1,
                                'instructions' => 'URL a la que redirige el botón.',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/en-linea-landing.php',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_enlinea_landing_acf_fields');
