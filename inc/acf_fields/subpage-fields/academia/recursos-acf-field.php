<?php
/**
 * ACF Fields for Academia - Recursos Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_recursos_acf_fields')) {
    function digitalia_register_recursos_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_recursos_page',
                'title' => 'Contenido de Recursos',
                'show_in_rest' => true,
                'fields' => array(
                    // Hero Section Fields 
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Título del Hero',
                        'name' => 'hero_title',
                        'type' => 'text',
                        'default_value' => 'Biblioteca Digital de Conocimiento',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_description',
                        'label' => 'Descripción del Hero',
                        'name' => 'hero_description',
                        'type' => 'textarea',
                        'rows' => 3,
                        'default_value' => 'Explora nuestra colección de recursos educativos, guías prácticas y herramientas interactivas diseñadas para potenciar tu aprendizaje en alfabetización mediática.',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_cta_text',
                        'label' => 'Texto del Botón',
                        'name' => 'cta_text',
                        'type' => 'text',
                        'default_value' => 'Conoce más',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_cta_url',
                        'label' => 'Enlace del Botón',
                        'name' => 'hero_cta_url',
                        'type' => 'url',
                        'default_value' => '#recursos',
                        'required' => 1,
                    ),
                    // Centro de Apoyo Section
                    array(
                        'key' => 'field_centro_apoyo_section',
                        'label' => 'Centro de Apoyo',
                        'name' => 'centro_apoyo_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_centro_apoyo_title',
                                'label' => 'Título de la Sección',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Centro de Apoyo',
                            ),
                            array(
                                'key' => 'field_centro_apoyo_faqs',
                                'label' => 'Preguntas Frecuentes',
                                'name' => 'faqs',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'button_label' => 'Agregar Pregunta',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_faq_question',
                                        'label' => 'Pregunta',
                                        'name' => 'question',
                                        'type' => 'text',
                                        'required' => 1,
                                    ),
                                    array(
                                        'key' => 'field_faq_answer',
                                        'label' => 'Respuesta',
                                        'name' => 'answer',
                                        'type' => 'textarea',
                                        'rows' => 3,
                                        'required' => 1,
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
                            'value' => 'page-templates/subpage-templates/academia/recursos.php',
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

add_action('acf/init', 'digitalia_register_recursos_acf_fields');
