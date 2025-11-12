<?php
/**
 * Register ACF Fields for Crossmedia page
 */

if (!function_exists('digitalia_register_crossmedia_acf_fields')) {
    function digitalia_register_crossmedia_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_crossmedia',
                'title' => 'Crossmedia - Contenido',
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_crossmedia_header',
                        'label' => 'Encabezado',
                        'name' => 'crossmedia_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_crossmedia_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Crossmedia',
                            ),
                            array(
                                'key' => 'field_crossmedia_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Crea universos narrativos con diversos puntos de contacto.',
                            ),
                        ),
                    ),

                    // Course URL
                    array(
                        'key' => 'field_crossmedia_course_url',
                        'label' => 'URL del Curso',
                        'name' => 'course_url',
                        'type' => 'url',
                        'instructions' => 'URL del curso en la plataforma de Digitalia. Se usa en los botones "Ir al curso".',
                        'default_value' => 'https://digitalia.gov.co/crossmedia',
                        'placeholder' => 'https://digitalia.gov.co/crossmedia',
                    ),

                    // Hero Section
                    array(
                        'key' => 'field_crossmedia_hero',
                        'label' => 'Sección Principal (Hero)',
                        'name' => 'crossmedia_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_crossmedia_hero_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Universos Narrativos',
                            ),
                            array(
                                'key' => 'field_crossmedia_hero_description',
                                'label' => 'Descripción Principal',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Crea universos narrativos con diversos puntos de contacto para diferentes audiencias, a través de múltiples plataformas. Construye narrativas de crossmedia haciendo uso de la inteligencia artificial con enfoque de Alfabetización Mediática Informacional (AMI).',
                            ),
                            array(
                                'key' => 'field_crossmedia_hero_image',
                                'label' => 'Imagen Principal',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 800x600px',
                            ),
                            array(
                                'key' => 'field_crossmedia_highlight_label',
                                'label' => 'Etiqueta Destacado',
                                'name' => 'highlight_label',
                                'type' => 'text',
                                'default_value' => 'NUESTRO ENFOQUE',
                            ),
                            array(
                                'key' => 'field_crossmedia_highlight_text',
                                'label' => 'Texto Destacado',
                                'name' => 'highlight_text',
                                'type' => 'textarea',
                                'default_value' => 'Construye narrativas de crossmedia haciendo uso de la inteligencia artificial con enfoque de Alfabetización Mediática Informacional (AMI). Nuestro objetivo es prepararte para producir contenido crossmedia de alta calidad que aporte de manera decidida en tu lucha contra la desinformación.',
                            ),
                        ),
                    ),

                    // Topics Section
                    array(
                        'key' => 'field_crossmedia_topics',
                        'label' => 'Sección Temas',
                        'name' => 'crossmedia_topics',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_crossmedia_topics_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'QUÉ APRENDERÁS',
                            ),
                            array(
                                'key' => 'field_crossmedia_topics_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Contenidos del programa',
                            ),
                            array(
                                'key' => 'field_crossmedia_topics_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Nuestro objetivo es prepararte para producir contenido crossmedia de alta calidad que aporte de manera decidida en tu lucha contra la desinformación.',
                            ),
                        ),
                    ),

                    // Categories Accordion (Repeater)
                    array(
                        'key' => 'field_crossmedia_categories',
                        'label' => 'Categorías del Programa (Acordeón)',
                        'name' => 'crossmedia_categories',
                        'type' => 'repeater',
                        'instructions' => 'Agrega las categorías y sus temas. Si no agregas ninguna, se mostrarán las categorías por defecto del índice del curso.',
                        'layout' => 'block',
                        'button_label' => 'Añadir Categoría',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_crossmedia_category_icon',
                                'label' => 'Ícono (Font Awesome)',
                                'name' => 'icon',
                                'type' => 'text',
                                'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-layer-group, fa-hand-pointer, fa-check-circle)',
                                'default_value' => 'fa-book',
                            ),
                            array(
                                'key' => 'field_crossmedia_category_title',
                                'label' => 'Título de la Categoría',
                                'name' => 'category_title',
                                'type' => 'text',
                                'required' => 1,
                                'placeholder' => 'Ej: Narrativas Expandidas',
                            ),
                            array(
                                'key' => 'field_crossmedia_category_topics',
                                'label' => 'Temas de la Categoría',
                                'name' => 'category_topics',
                                'type' => 'textarea',
                                'instructions' => 'Ingrese cada tema en una línea nueva. Estos se mostrarán como una lista con checkmarks.',
                                'rows' => 8,
                                'placeholder' => 'Introducción a las Narrativas Expandidas' . "\n" . 'Creación de Personajes en Narrativas Expandidas' . "\n" . 'Uso de Plataformas en Narrativas Expandidas',
                            ),
                        ),
                    ),

                    // CTA Section
                    array(
                        'key' => 'field_crossmedia_cta',
                        'label' => 'Sección Call to Action (CTA)',
                        'name' => 'crossmedia_cta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_crossmedia_cta_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => '¿Listo para crear contenido crossmedia?',
                            ),
                            array(
                                'key' => 'field_crossmedia_cta_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Únete a nuestro programa y aprende a crear narrativas que impacten en múltiples plataformas.',
                            ),
                            array(
                                'key' => 'field_crossmedia_cta_button',
                                'label' => 'Botón',
                                'name' => 'button',
                                'type' => 'link',
                                'return_format' => 'array',
                                'instructions' => 'Configure el enlace del botón',
                            ),
                            array(
                                'key' => 'field_crossmedia_cta_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Comenzar ahora',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/crossmedia.php',
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

add_action('acf/init', 'digitalia_register_crossmedia_acf_fields');
