<?php
/**
 * ACF Fields for Academia Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_academia_acf_fields')) {
    function digitalia_register_academia_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_academia_page',
                'title' => 'Contenido de Academia',
                'fields' => array(
                    // Navigation Menu Section
                    array(
                        'key' => 'field_academia_nav',
                        'label' => 'Menú de Navegación',
                        'name' => 'nav_menu',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_nav_item_1',
                                'label' => 'Ítem 1',
                                'name' => 'item_1',
                                'type' => 'text',
                                'default_value' => 'Qué es',
                            ),
                            array(
                                'key' => 'field_nav_item_2',
                                'label' => 'Ítem 2',
                                'name' => 'item_2',
                                'type' => 'text',
                                'default_value' => 'Registro',
                            ),
                            array(
                                'key' => 'field_nav_item_3',
                                'label' => 'Ítem 3',
                                'name' => 'item_3',
                                'type' => 'text',
                                'default_value' => 'Cursos',
                            ),
                            array(
                                'key' => 'field_nav_item_4',
                                'label' => 'Ítem 4',
                                'name' => 'item_4',
                                'type' => 'text',
                                'default_value' => 'Ventajas',
                            ),
                            array(
                                'key' => 'field_nav_item_5',
                                'label' => 'Ítem 5',
                                'name' => 'item_5',
                                'type' => 'text',
                                'default_value' => 'Comparación',
                            ),
                        ),
                    ),
                    // Header Section
                    array(
                        'key' => 'field_academia_header',
                        'label' => 'Hero',
                        'name' => 'header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_header_badge_text',
                                'label' => 'Texto del Badge',
                                'name' => 'badge_text',
                                'type' => 'text',
                                'default_value' => 'Cursos en línea',
                            ),
                            array(
                                'key' => 'field_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Plataforma Academia',
                            ),
                            array(
                                'key' => 'field_header_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Plataforma de autoformación con contenidos audiovisuales educativos disponible 24/7.',
                            ),
                            array(
                                'key' => 'field_header_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_header_cta_text',
                                        'label' => 'Texto del botón',
                                        'name' => 'cta_text',
                                        'type' => 'text',
                                        'default_value' => 'Regístrate hoy',
                                    ),
                                    array(
                                        'key' => 'field_header_cta_url',
                                        'label' => 'URL del botón',
                                        'name' => 'cta_url',
                                        'type' => 'text',
                                        'default_value' => '#',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Formación Digital Section
                    array(
                        'key' => 'field_formacion_digital',
                        'label' => 'Sección Formación Digital',
                        'name' => 'formacion_digital',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_formacion_badge',
                                'label' => 'Texto Badge',
                                'name' => 'badge_text',
                                'type' => 'text',
                                'default_value' => 'Academia Digital-IA',
                            ),
                            array(
                                'key' => 'field_formacion_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Formación para la era digital',
                            ),
                            array(
                                'key' => 'field_formacion_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Academia Digital-IA es un ecosistema de soluciones tecnológicas diseñado para ofrecer servicios educativos e informativos que te preparan para los desafíos de las tecnologías emergentes.',
                            ),
                            array(
                                'key' => 'field_formacion_cta',
                                'label' => 'Botón',
                                'name' => 'cta',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce los programas',
                                    'url' => '#cursos',
                                ),
                            ),
                            array(
                                'key' => 'field_feature_1',
                                'label' => 'Característica 1',
                                'name' => 'feature_1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_feature_1_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '24/7',
                                    ),
                                    array(
                                        'key' => 'field_feature_1_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Acceso',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_feature_2',
                                'label' => 'Característica 2',
                                'name' => 'feature_2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_feature_2_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '100%',
                                    ),
                                    array(
                                        'key' => 'field_feature_2_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Online',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_feature_3',
                                'label' => 'Característica 3',
                                'name' => 'feature_3',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_feature_3_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '+700',
                                    ),
                                    array(
                                        'key' => 'field_feature_3_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Contenidos',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_feature_4',
                                'label' => 'Característica 4',
                                'name' => 'feature_4',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_feature_4_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '100%',
                                    ),
                                    array(
                                        'key' => 'field_feature_4_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Gratuito',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_media_type',
                                'label' => 'Tipo de Media',
                                'name' => 'media_type',
                                'type' => 'select',
                                'choices' => array(
                                    'image' => 'Imagen',
                                    'video' => 'Video',
                                ),
                                'default_value' => 'image',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_formacion_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'url',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_media_type',
                                            'operator' => '==',
                                            'value' => 'image',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_formacion_video',
                                'label' => 'Video MP4',
                                'name' => 'video',
                                'type' => 'file',
                                'return_format' => 'url',
                                'mime_types' => 'mp4',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_media_type',
                                            'operator' => '==',
                                            'value' => 'video',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Registration Steps Section
                    array(
                        'key' => 'field_registration_steps',
                        'label' => 'Sección Pasos de Registro',
                        'name' => 'registration_steps',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_steps_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Regístrate en 3 Simples Pasos',
                            ),
                            array(
                                'key' => 'field_steps_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Accede a nuestra plataforma educativa de manera rápida y sencilla para comenzar tu viaje de aprendizaje en alfabetización mediática e informacional.',
                            ),
                            array(
                                'key' => 'field_step_1',
                                'label' => 'Paso 1',
                                'name' => 'step_1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_step_1_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Crea tu cuenta',
                                    ),
                                    array(
                                        'key' => 'field_step_1_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Regístrate con tu correo electrónico o cuenta de Google',
                                    ),
                                    array(
                                        'key' => 'field_step_1_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'url',
                                        'preview_size' => 'medium',
                                        'default_value' => '/wp-content/uploads/2024/12/hero-sections.webp',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_step_2',
                                'label' => 'Paso 2',
                                'name' => 'step_2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_step_2_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Completa tu perfil',
                                    ),
                                    array(
                                        'key' => 'field_step_2_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Añade información sobre tus intereses y objetivos',
                                    ),
                                    array(
                                        'key' => 'field_step_2_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'url',
                                        'preview_size' => 'medium',
                                        'default_value' => '/wp-content/uploads/2024/12/hero-sections.webp',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_step_3',
                                'label' => 'Paso 3',
                                'name' => 'step_3',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_step_3_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Comienza a aprender',
                                    ),
                                    array(
                                        'key' => 'field_step_3_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Accede a todos nuestros cursos y recursos',
                                    ),
                                    array(
                                        'key' => 'field_step_3_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'url',
                                        'preview_size' => 'medium',
                                        'default_value' => '/wp-content/uploads/2024/12/hero-sections.webp',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Courses Section
                    array(
                        'key' => 'field_courses_section',
                        'label' => 'Sección de Cursos',
                        'name' => 'courses_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_curso_external_link_toggle',
                                'label' => 'Habilitar link externo',
                                'name' => 'external_link_toggle',
                                'type' => 'true_false',
                                'ui' => 1,
                                'ui_on_text' => 'Sí',
                                'ui_off_text' => 'No',
                            ),
                            array(
                                'key' => 'field_curso_external_url',
                                'label' => 'URL Externa',
                                'name' => 'external_url',
                                'type' => 'url',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_curso_external_link_toggle',
                                            'operator' => '==',
                                            'value' => 1,
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_courses_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Cursos de Alfabetización Mediática e Informacional',
                            ),
                            array(
                                'key' => 'field_courses_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Explora nuestra colección de cursos diseñados para desarrollar tus habilidades digitales y pensamiento crítico.',
                            ),
                            array(
                                'key' => 'field_courses_cta',
                                'label' => 'Botón',
                                'name' => 'cta',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Ver todos los cursos',
                                    'url' => '/plataforma/courses',
                                ),
                            ),
                        ),
                    ),
                    // Comparison Section
                    array(
                        'key' => 'field_comparison_section',
                        'label' => 'Sección de Comparación',
                        'name' => 'comparison_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            // Traditional Courses
                            array(
                                'key' => 'field_traditional_courses',
                                'label' => 'Cursos Tradicionales',
                                'name' => 'traditional_courses',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_traditional_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Cursos Comerciales Tradicionales',
                                    ),
                                    array(
                                        'key' => 'field_traditional_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Los cursos comerciales tradicionales suelen presentar limitaciones que pueden afectar tu experiencia de aprendizaje y desarrollo profesional.',
                                    ),
                                    array(
                                        'key' => 'field_traditional_features',
                                        'label' => 'Características',
                                        'name' => 'features',
                                        'type' => 'repeater',
                                        'layout' => 'block',
                                        'button_label' => 'Añadir Característica',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_traditional_feature_icon',
                                                'label' => 'Ícono',
                                                'name' => 'icon',
                                                'type' => 'text',
                                                'instructions' => 'Introduce el nombre del ícono de Font Awesome (ej: fa-solid fa-check)',
                                            ),
                                            array(
                                                'key' => 'field_traditional_feature_text',
                                                'label' => 'Texto',
                                                'name' => 'text',
                                                'type' => 'text',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            // Digital-IA Courses
                            array(
                                'key' => 'field_digitalia_courses',
                                'label' => 'Cursos Digital-IA',
                                'name' => 'digitalia_courses',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_digitalia_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Academia Digital-IA',
                                    ),
                                    array(
                                        'key' => 'field_digitalia_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Nuestra plataforma está diseñada para ofrecer una experiencia de aprendizaje superior, adaptada a las necesidades actuales.',
                                    ),
                                    array(
                                        'key' => 'field_digitalia_features',
                                        'label' => 'Características',
                                        'name' => 'features',
                                        'type' => 'repeater',
                                        'layout' => 'block',
                                        'button_label' => 'Añadir Característica',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_digitalia_feature_icon',
                                                'label' => 'Ícono',
                                                'name' => 'icon',
                                                'type' => 'text',
                                                'instructions' => 'Introduce el nombre del ícono de Font Awesome (ej: fa-solid fa-check)',
                                            ),
                                            array(
                                                'key' => 'field_digitalia_feature_text',
                                                'label' => 'Texto',
                                                'name' => 'text',
                                                'type' => 'text',
                                            ),
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
                            'value' => 'page-templates/subpage-templates/academia.php',
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

add_action('acf/init', 'digitalia_register_academia_acf_fields');
