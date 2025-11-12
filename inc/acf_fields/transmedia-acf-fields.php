<?php
/**
 * Register ACF Fields for Transmedia page
 */

if (!function_exists('digitalia_register_transmedia_acf_fields')) {
    function digitalia_register_transmedia_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_transmedia',
                'title' => 'Transmedia - Contenido',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_transmedia_header',
                        'label' => 'Encabezado',
                        'name' => 'transmedia_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Transmedia',
                            ),
                            array(
                                'key' => 'field_transmedia_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Revoluciona la forma de contar historias y llévalas a múltiples plataformas.',
                            ),
                        ),
                    ),

                    // Course URL
                    array(
                        'key' => 'field_transmedia_course_url',
                        'label' => 'URL del Curso',
                        'name' => 'course_url',
                        'type' => 'url',
                        'instructions' => 'URL del curso en la plataforma de Digitalia. Se usa en los botones "Ir al curso".',
                        'default_value' => 'https://digitalia.gov.co/transmedia',
                        'placeholder' => 'https://digitalia.gov.co/transmedia',
                    ),

                    // Hero Section
                    array(
                        'key' => 'field_transmedia_hero',
                        'label' => 'Sección Principal (Hero)',
                        'name' => 'transmedia_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_hero_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Narrativas que Trascienden Plataformas',
                            ),
                            array(
                                'key' => 'field_transmedia_hero_description',
                                'label' => 'Descripción Principal',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Revoluciona la forma de contar historias y llévalas a múltiples plataformas. Cada medio imprime un mensaje hacia una audiencia que no sólo consume, sino que interactúa y es parte del relato.',
                            ),
                            array(
                                'key' => 'field_transmedia_hero_image',
                                'label' => 'Imagen Principal',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 800x600px',
                            ),
                            array(
                                'key' => 'field_transmedia_highlight_label',
                                'label' => 'Etiqueta Destacado',
                                'name' => 'highlight_label',
                                'type' => 'text',
                                'default_value' => 'NUESTRO ENFOQUE',
                            ),
                            array(
                                'key' => 'field_transmedia_highlight_text',
                                'label' => 'Texto Destacado',
                                'name' => 'highlight_text',
                                'type' => 'textarea',
                                'default_value' => 'Queremos que mejores prácticas en estrategia de medios, integres canales, optimices recursos y la experiencia de la audiencia. Crea personajes a través de los cuales se incentive la participación comunitaria a partir de la gamificación.',
                            ),
                        ),
                    ),

                    // Topics Section
                    array(
                        'key' => 'field_transmedia_topics',
                        'label' => 'Sección Temas',
                        'name' => 'transmedia_topics',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_topics_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'QUÉ APRENDERÁS',
                            ),
                            array(
                                'key' => 'field_transmedia_topics_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Contenidos del programa',
                            ),
                            array(
                                'key' => 'field_transmedia_topics_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Evalúa y mide resultados para construir juntas y juntos nuestras propias rutas de conocimiento en narrativas transmedia.',
                            ),
                        ),
                    ),

                    // Categories Accordion (Repeater)
                    array(
                        'key' => 'field_transmedia_categories',
                        'label' => 'Categorías del Programa (Acordeón)',
                        'name' => 'transmedia_categories',
                        'type' => 'repeater',
                        'instructions' => 'Agrega las categorías y sus temas. Si no agregas ninguna, se mostrarán las categorías por defecto del índice del curso.',
                        'layout' => 'block',
                        'button_label' => 'Añadir Categoría',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_category_icon',
                                'label' => 'Ícono (Font Awesome)',
                                'name' => 'icon',
                                'type' => 'text',
                                'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-sitemap, fa-book-open, fa-gamepad)',
                                'default_value' => 'fa-book',
                            ),
                            array(
                                'key' => 'field_transmedia_category_title',
                                'label' => 'Título de la Categoría',
                                'name' => 'category_title',
                                'type' => 'text',
                                'required' => 1,
                                'placeholder' => 'Ej: Storytelling',
                            ),
                            array(
                                'key' => 'field_transmedia_category_topics',
                                'label' => 'Temas de la Categoría',
                                'name' => 'category_topics',
                                'type' => 'textarea',
                                'instructions' => 'Ingrese cada tema en una línea nueva. Estos se mostrarán como una lista con checkmarks.',
                                'rows' => 8,
                                'placeholder' => 'Introducción al Storytelling Transmedia' . "\n" . 'Elementos clave del Storytelling Transmedia' . "\n" . 'Creación de personajes en el Storytelling Transmedia',
                            ),
                        ),
                    ),

                    // CTA Section
                    array(
                        'key' => 'field_transmedia_cta',
                        'label' => 'Sección Call to Action (CTA)',
                        'name' => 'transmedia_cta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_cta_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => '¿Listo para revolucionar tus narrativas?',
                            ),
                            array(
                                'key' => 'field_transmedia_cta_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Únete a nuestro programa y aprende a crear historias que trascienden plataformas e involucran a tu audiencia.',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/transmedia.php',
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

add_action('acf/init', 'digitalia_register_transmedia_acf_fields');
