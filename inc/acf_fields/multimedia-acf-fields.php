<?php
/**
 * Register ACF Fields for Multimedia page
 */

if (!function_exists('digitalia_register_multimedia_acf_fields')) {
    function digitalia_register_multimedia_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_multimedia',
                'title' => 'Multimedia - Contenido',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_multimedia_header',
                        'label' => 'Encabezado',
                        'name' => 'multimedia_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_multimedia_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Multimedia',
                            ),
                            array(
                                'key' => 'field_multimedia_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Multimedia + Sostenibilidad + Desafíos Ciudadanos.',
                            ),
                        ),
                    ),

                    // Course URL
                    array(
                        'key' => 'field_multimedia_course_url',
                        'label' => 'URL del Curso',
                        'name' => 'course_url',
                        'type' => 'url',
                        'instructions' => 'URL del curso en la plataforma de Digitalia. Se usa en los botones "Ir al curso".',
                        'default_value' => 'https://digitalia.gov.co/multimedia',
                        'placeholder' => 'https://digitalia.gov.co/multimedia',
                    ),

                    // Hero Section
                    array(
                        'key' => 'field_multimedia_hero',
                        'label' => 'Sección Principal (Hero)',
                        'name' => 'multimedia_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_multimedia_hero_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Contenido Multimedia de Alta Calidad',
                            ),
                            array(
                                'key' => 'field_multimedia_hero_description',
                                'label' => 'Descripción Principal',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Genera contenido de alta calidad haciendo uso de diferentes formatos multimedia, aprende a utilizar herramientas para la producción de contenido y a proyectar su sostenibilidad en los ecosistemas digitales.',
                            ),
                            array(
                                'key' => 'field_multimedia_hero_image',
                                'label' => 'Imagen Principal',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 800x600px',
                            ),
                            array(
                                'key' => 'field_multimedia_highlight_label',
                                'label' => 'Etiqueta Destacado',
                                'name' => 'highlight_label',
                                'type' => 'text',
                                'default_value' => 'NUESTRO ENFOQUE',
                            ),
                            array(
                                'key' => 'field_multimedia_highlight_text',
                                'label' => 'Texto Destacado',
                                'name' => 'highlight_text',
                                'type' => 'textarea',
                                'default_value' => 'Prepárate con diversas herramientas de uso libre para los desafíos ciudadanos que existen en la lucha colectiva por la paz mediática y contra la desinformación.',
                            ),
                        ),
                    ),

                    // Topics Section
                    array(
                        'key' => 'field_multimedia_topics',
                        'label' => 'Sección Temas',
                        'name' => 'multimedia_topics',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_multimedia_topics_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'QUÉ APRENDERÁS',
                            ),
                            array(
                                'key' => 'field_multimedia_topics_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Contenidos del programa',
                            ),
                            array(
                                'key' => 'field_multimedia_topics_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Aprende a crear contenido multimedia profesional usando herramientas de software libre y desarrolla estrategias sostenibles para tus proyectos digitales.',
                            ),
                        ),
                    ),

                    // Categories Accordion (Repeater)
                    array(
                        'key' => 'field_multimedia_categories',
                        'label' => 'Categorías del Programa (Acordeón)',
                        'name' => 'multimedia_categories',
                        'type' => 'repeater',
                        'instructions' => 'Agrega las categorías y sus temas. Si no agregas ninguna, se mostrarán las categorías por defecto del índice del curso.',
                        'layout' => 'block',
                        'button_label' => 'Añadir Categoría',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_multimedia_category_icon',
                                'label' => 'Ícono (Font Awesome)',
                                'name' => 'icon',
                                'type' => 'text',
                                'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-video, fa-image, fa-microphone)',
                                'default_value' => 'fa-book',
                            ),
                            array(
                                'key' => 'field_multimedia_category_title',
                                'label' => 'Título de la Categoría',
                                'name' => 'category_title',
                                'type' => 'text',
                                'required' => 1,
                                'placeholder' => 'Ej: Edición de videos en DaVinci Resolve',
                            ),
                            array(
                                'key' => 'field_multimedia_category_topics',
                                'label' => 'Temas de la Categoría',
                                'name' => 'category_topics',
                                'type' => 'textarea',
                                'instructions' => 'Ingrese cada tema en una línea nueva. Estos se mostrarán como una lista con checkmarks.',
                                'rows' => 8,
                                'placeholder' => 'Introducción a DaVinci Resolve' . "\n" . 'Importación de Material Multimedia' . "\n" . 'Edición Básica en DaVinci Resolve',
                            ),
                        ),
                    ),

                    // CTA Section
                    array(
                        'key' => 'field_multimedia_cta',
                        'label' => 'Sección Call to Action (CTA)',
                        'name' => 'multimedia_cta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_multimedia_cta_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => '¿Listo para crear contenido multimedia profesional?',
                            ),
                            array(
                                'key' => 'field_multimedia_cta_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Únete a nuestro programa y aprende a producir contenido de alta calidad con herramientas de software libre.',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/multimedia.php',
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

add_action('acf/init', 'digitalia_register_multimedia_acf_fields');
