<?php
/**
 * ACF Fields for Colaboratorios Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_colaboratorios_acf_fields')) {
    function digitalia_register_colaboratorios_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_colaboratorios_page',
                'title' => 'Contenido de Colaboratorios',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Hero Section
                    array(
                        'key' => 'field_colaboratorios_hero',
                        'label' => 'Hero',
                        'name' => 'hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            // Map Locations
                            array(
                                'key' => 'field_colaboratorios_locations',
                                'label' => 'Ubicaciones',
                                'name' => 'locations',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Agregar Ubicación',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_location_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_location_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'rows' => 3,
                                    ),
                                    array(
                                        'key' => 'field_location_map',
                                        'label' => 'Ubicación',
                                        'name' => 'location',
                                        'type' => 'google_map',
                                        'center_lat' => '4.6097102',  // Bogotá default center
                                        'center_lng' => '-74.081749',
                                        'zoom' => 5,
                                    ),
                                    array(
                                        'key' => 'field_location_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#',
                                    ),
                                ),
                                'default_value' => array(
                                    array(
                                        'title' => 'Bogotá',
                                        'description' => 'Ubicación en Bogotá',
                                        'location' => '4.6097102,-74.081749',
                                        'link' => '#bogota',
                                    ),
                                    array(
                                        'title' => 'Medellín',
                                        'description' => 'Ubicación en Medellín',
                                        'location' => '6.2518442,-75.5635929',
                                        'link' => '#medellin',
                                    ),
                                ),
                            ),
                            // Badge
                            array(
                                'key' => 'field_hero_badge',
                                'label' => 'Badge',
                                'name' => 'badge',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_badge_label',
                                        'label' => 'Etiqueta del Badge',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'default_value' => 'Digital-IA',
                                    ),
                                    array(
                                        'key' => 'field_hero_badge_text',
                                        'label' => 'Texto del Badge',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Descubre nuestros espacios de innovación',
                                    ),
                                    array(
                                        'key' => 'field_hero_badge_link',
                                        'label' => 'Enlace del Badge',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#acerca',
                                    ),
                                ),
                            ),
                            // Title and Description
                            array(
                                'key' => 'field_hero_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Colaboratorios: Espacios de Innovación Social y Tecnológica',
                            ),
                            array(
                                'key' => 'field_hero_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Los Colaboratorios representan una innovadora red de espacios físicos diseñados para democratizar el acceso a la tecnología y fomentar la alfabetización mediática en Colombia.',
                            ),
                            // CTA Buttons
                            array(
                                'key' => 'field_hero_cta_primary',
                                'label' => 'Botón Principal',
                                'name' => 'cta_primary',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_cta_primary_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Participar',
                                    ),
                                    array(
                                        'key' => 'field_hero_cta_primary_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#participar',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_hero_cta_secondary',
                                'label' => 'Botón Secundario',
                                'name' => 'cta_secondary',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_cta_secondary_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Ver Video',
                                    ),
                                    array(
                                        'key' => 'field_hero_cta_secondary_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#video',
                                    ),
                                ),
                            ),
                            // Additional Link
                            array(
                                'key' => 'field_hero_additional_link',
                                'label' => 'Enlace Adicional',
                                'name' => 'additional_link',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_hero_additional_link_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Agenda una visita',
                                    ),
                                    array(
                                        'key' => 'field_hero_additional_link_url',
                                        'label' => 'Enlace',
                                        'name' => 'url',
                                        'type' => 'text',
                                        'default_value' => '#contacto',
                                    ),
                                ),
                            ),
                            // Hero Image
                            array(
                                'key' => 'field_hero_image',
                                'label' => 'Imagen Hero',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 1200x430 píxeles',
                            ),
                        ),
                    ),
                    // About Section
                    array(
                        'key' => 'field_colaboratorios_about',
                        'label' => 'Sección Acerca',
                        'name' => 'about',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_about_badge',
                                'label' => 'Badge',
                                'name' => 'badge',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_about_badge_icon',
                                        'label' => 'Ícono',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'code-2',
                                        'instructions' => 'Nombre del ícono de Lucide (ej: code-2, users, shield-check)',
                                    ),
                                    array(
                                        'key' => 'field_about_badge_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Laboratorios Mediáticos',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_about_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Espacios de Innovación Digital',
                            ),
                            array(
                                'key' => 'field_about_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Los CoLaboratorios son espacios físicos de co-creación donde los ciudadanos desarrollan habilidades críticas para la alfabetización mediática y el uso ético de tecnologías emergentes.',
                            ),
                            array(
                                'key' => 'field_about_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_about_cta_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Conoce nuestros espacios',
                                    ),
                                    array(
                                        'key' => 'field_about_cta_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '/contacto',
                                    ),
                                ),
                            ),
                            // Stats
                            array(
                                'key' => 'field_about_stats',
                                'label' => 'Estadísticas',
                                'name' => 'stats',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_about_stats_departments',
                                        'label' => 'Departamentos',
                                        'name' => 'departments',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_about_stats_departments_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '32',
                                            ),
                                            array(
                                                'key' => 'field_about_stats_departments_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Departamentos',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_about_stats_spaces',
                                        'label' => 'Espacios',
                                        'name' => 'spaces',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_about_stats_spaces_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '+50',
                                            ),
                                            array(
                                                'key' => 'field_about_stats_spaces_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Espacios',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_about_stats_access',
                                        'label' => 'Acceso',
                                        'name' => 'access',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_about_stats_access_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '24/7',
                                            ),
                                            array(
                                                'key' => 'field_about_stats_access_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Acceso',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_about_stats_free',
                                        'label' => 'Gratuito',
                                        'name' => 'free',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_about_stats_free_number',
                                                'label' => 'Número',
                                                'name' => 'number',
                                                'type' => 'text',
                                                'default_value' => '100%',
                                            ),
                                            array(
                                                'key' => 'field_about_stats_free_label',
                                                'label' => 'Etiqueta',
                                                'name' => 'label',
                                                'type' => 'text',
                                                'default_value' => 'Gratuito',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_about_media',
                                'label' => 'Imagen o Video',
                                'name' => 'media',
                                'type' => 'file',
                                'return_format' => 'array',
                                'library' => 'all',
                                'mime_types' => 'jpg,jpeg,png,gif,mp4,webm',
                                'instructions' => 'Seleccione una imagen o video MP4. Para videos, se recomienda MP4.',
                            ),
                            // Features
                            array(
                                'key' => 'field_about_features',
                                'label' => 'Características',
                                'name' => 'features',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 3,
                                'max' => 3,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_about_feature_icon',
                                        'label' => 'Ícono',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'instructions' => 'Nombre del ícono de Lucide (ej: lightbulb, users, shield-check)',
                                    ),
                                    array(
                                        'key' => 'field_about_feature_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_about_feature_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Approach Section
                    array(
                        'key' => 'field_colaboratorios_approach',
                        'label' => 'Sección Enfoque',
                        'name' => 'approach',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_approach_label',
                                'label' => 'Etiqueta Superior',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'Nuestro Enfoque',
                            ),
                            array(
                                'key' => 'field_approach_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Colaboratorios: Espacios de Alfabetización Digital',
                            ),
                            array(
                                'key' => 'field_approach_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Transformamos la relación ciudadana con la tecnología a través de la educación mediática.',
                            ),
                            // CTA Buttons
                            array(
                                'key' => 'field_approach_cta_primary',
                                'label' => 'Botón Principal',
                                'name' => 'cta_primary',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_approach_cta_primary_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Únete Ahora',
                                    ),
                                    array(
                                        'key' => 'field_approach_cta_primary_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#unete',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_approach_cta_secondary',
                                'label' => 'Botón Secundario',
                                'name' => 'cta_secondary',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_approach_cta_secondary_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Conoce Más',
                                    ),
                                    array(
                                        'key' => 'field_approach_cta_secondary_link',
                                        'label' => 'Enlace',
                                        'name' => 'link',
                                        'type' => 'text',
                                        'default_value' => '#conoce',
                                    ),
                                ),
                            ),
                            // Cards
                            array(
                                'key' => 'field_approach_cards',
                                'label' => 'Tarjetas',
                                'name' => 'cards',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 5,
                                'max' => 5,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_approach_card_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                        'instructions' => 'Imagen en formato 16:9 (aspect-video)',
                                    ),
                                    array(
                                        'key' => 'field_approach_card_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_approach_card_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                    ),
                                ),
                                'default_value' => array(
                                    array(
                                        'title' => 'Alfabetización Digital',
                                        'description' => 'Desarrollamos habilidades críticas para navegar el mundo digital con responsabilidad y ética.',
                                    ),
                                    array(
                                        'title' => 'Tecnologías Emergentes',
                                        'description' => 'Exploramos el impacto de la inteligencia artificial y las tecnologías emergentes en la sociedad.',
                                    ),
                                    array(
                                        'title' => 'Espacios Colaborativos',
                                        'description' => 'Creamos ambientes de aprendizaje colaborativo para la transformación social.',
                                    ),
                                    array(
                                        'title' => 'Derechos Digitales',
                                        'description' => 'Protegemos y promovemos los derechos humanos en el espacio digital.',
                                    ),
                                    array(
                                        'title' => 'Paz Mediática',
                                        'description' => 'Fomentamos la comunicación no violenta y el diálogo constructivo en medios digitales.',
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
                            'value' => 'page-templates/subpage-templates/colaboratorios.php',
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

add_action('acf/init', 'digitalia_register_colaboratorios_acf_fields');
