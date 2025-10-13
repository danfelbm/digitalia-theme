<?php
/**
 * ACF Fields for Ready Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_ready_acf_fields')) {
    function digitalia_register_ready_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_ready_page',
                'title' => 'Contenido de Ready',
                'fields' => array(
                    // Hero Section
                    array(
                        'key' => 'field_ready_hero',
                        'label' => 'Hero',
                        'name' => 'hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Red Nacional de Alfabetizadores',
                            ),
                            array(
                                'key' => 'field_hero_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Formando líderes en alfabetización mediática e informacional para construir una Colombia más informada y en paz.',
                            ),
                            array(
                                'key' => 'field_hero_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_cta_text',
                                        'label' => 'Texto del botón',
                                        'name' => 'cta_text',
                                        'type' => 'text',
                                        'default_value' => 'Únete a la Red',
                                    ),
                                    array(
                                        'key' => 'field_hero_cta_url',
                                        'label' => 'URL del botón',
                                        'name' => 'cta_url',
                                        'type' => 'text',
                                        'default_value' => '#',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // About Section (ready2)
                    array(
                        'key' => 'field_ready2_about',
                        'label' => 'Sección Acerca',
                        'name' => 'ready2_about',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            // Badge
                            array(
                                'key' => 'field_ready2_badge',
                                'label' => 'Badge',
                                'name' => 'badge',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready2_badge_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Red de Aprendizaje Digital',
                                    ),
                                    array(
                                        'key' => 'field_ready2_badge_icon',
                                        'label' => 'Icono (Lucide)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'graduation-cap',
                                        'instructions' => 'Nombre del icono de Lucide (ej: graduation-cap, users, brain-circuit)',
                                    ),
                                ),
                            ),
                            // Main Content
                            array(
                                'key' => 'field_ready2_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Alfabetización Mediática para el Futuro',
                            ),
                            array(
                                'key' => 'field_ready2_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'REaDy es una red nacional de alfabetización mediática e informacional que prepara a la ciudadanía para los desafíos de las tecnologías emergentes, con énfasis en inteligencia artificial y enfoque de paz.',
                            ),
                            // CTA Button
                            array(
                                'key' => 'field_ready2_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready2_cta_text',
                                        'label' => 'Texto del botón',
                                        'name' => 'cta_text',
                                        'type' => 'text',
                                        'default_value' => 'Unirse a la red',
                                    ),
                                    array(
                                        'key' => 'field_ready2_cta_url',
                                        'label' => 'URL del botón',
                                        'name' => 'cta_url',
                                        'type' => 'text',
                                        'default_value' => '/contacto',
                                    ),
                                ),
                            ),
                            // Stats
                            array(
                                'key' => 'field_ready2_stats',
                                'label' => 'Estadísticas',
                                'name' => 'stats',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready2_stat_1',
                                        'label' => 'Estadística 1',
                                        'name' => 'stat_1',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready2_stat_1_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '+1000',
                                            ),
                                            array(
                                                'key' => 'field_ready2_stat_1_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Participantes',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_ready2_stat_2',
                                        'label' => 'Estadística 2',
                                        'name' => 'stat_2',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready2_stat_2_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '32',
                                            ),
                                            array(
                                                'key' => 'field_ready2_stat_2_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Departamentos',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_ready2_stat_3',
                                        'label' => 'Estadística 3',
                                        'name' => 'stat_3',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready2_stat_3_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '24/7',
                                            ),
                                            array(
                                                'key' => 'field_ready2_stat_3_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Acceso',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_ready2_stat_4',
                                        'label' => 'Estadística 4',
                                        'name' => 'stat_4',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready2_stat_4_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '100%',
                                            ),
                                            array(
                                                'key' => 'field_ready2_stat_4_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Gratuito',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            // Media
                            array(
                                'key' => 'field_ready2_media',
                                'label' => 'Imagen o Video',
                                'name' => 'media',
                                'type' => 'file',
                                'return_format' => 'array',
                                'library' => 'all',
                                'mime_types' => 'jpg,jpeg,png,gif,mp4,webm',
                                'instructions' => 'Seleccione una imagen o video MP4. Para videos, se recomienda MP4.',
                            ),
                            // Feature Boxes
                            array(
                                'key' => 'field_ready2_features',
                                'label' => 'Características',
                                'name' => 'features',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 3,
                                'max' => 3,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready2_feature_icon',
                                        'label' => 'Icono (Lucide)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'shield-check',
                                        'instructions' => 'Nombre del icono de Lucide (ej: shield-check, users, brain-circuit)',
                                    ),
                                    array(
                                        'key' => 'field_ready2_feature_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_ready2_feature_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
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
                            'value' => 'page-templates/subpage-templates/ready.php',
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
                'show_in_rest' => false,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_ready_acf_fields');
