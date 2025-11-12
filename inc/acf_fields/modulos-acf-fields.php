<?php
/**
 * ACF Fields for Modulos
 *
 * @package Digitalia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_modulos_acf_fields')) {
    function digitalia_register_modulos_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_modulos_page',
                'title' => 'Contenido de Módulos',
                'show_in_rest' => true,
                'show_in_rest' => true,
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_modulos_header',
                        'label' => 'Encabezado',
                        'name' => 'modulos_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_modulos_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Módulos',
                            ),
                            array(
                                'key' => 'field_modulos_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Descubre los diferentes módulos y servicios que ofrecemos.',
                            ),
                        ),
                    ),
                    // Digitalia Module
                    array(
                        'key' => 'field_digitalia_module',
                        'label' => 'Módulo Digitalia',
                        'name' => 'digitalia_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_digitalia_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Digitalia',
                            ),
                            array(
                                'key' => 'field_digitalia_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Plataforma de aprendizaje digital que permite acceder a contenido educativo de alta calidad desde cualquier lugar. Experiencias de aprendizaje interactivas y flexibles.',
                            ),
                            array(
                                'key' => 'field_digitalia_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce la historia',
                                    'url' => '/modulos/digitalia',
                                ),
                            ),
                            array(
                                'key' => 'field_digitalia_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/digitalia.svg',
                            ),
                        ),
                    ),
                    // Academia Module
                    array(
                        'key' => 'field_academia_module',
                        'label' => 'Módulo Academia',
                        'name' => 'academia_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_academia_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Academia',
                            ),
                            array(
                                'key' => 'field_academia_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Plataforma de aprendizaje digital que permite acceder a contenido educativo de alta calidad desde cualquier lugar. Experiencias de aprendizaje interactivas y flexibles.',
                            ),
                            array(
                                'key' => 'field_academia_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce la historia',
                                    'url' => '/modulos/academia',
                                ),
                            ),
                            array(
                                'key' => 'field_academia_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/academia.svg',
                            ),
                        ),
                    ),
                    // En Línea Module
                    array(
                        'key' => 'field_enlinea_module',
                        'label' => 'Módulo En Línea',
                        'name' => 'enlinea_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_enlinea_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'En Línea',
                            ),
                            array(
                                'key' => 'field_enlinea_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Plataforma de aprendizaje digital que permite acceder a contenido educativo de alta calidad desde cualquier lugar. Experiencias de aprendizaje interactivas y flexibles.',
                            ),
                            array(
                                'key' => 'field_enlinea_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce la historia',
                                    'url' => '/modulos/en-linea',
                                ),
                            ),
                            array(
                                'key' => 'field_enlinea_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/en-linea.svg',
                            ),
                        ),
                    ),
                    // Total Transmedia Module
                    array(
                        'key' => 'field_transmedia_module',
                        'label' => 'Módulo Total Transmedia',
                        'name' => 'transmedia_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_transmedia_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Total Transmedia',
                            ),
                            array(
                                'key' => 'field_transmedia_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Experiencias educativas que integran múltiples plataformas y formatos. Narrativas innovadoras que transforman el aprendizaje en una experiencia inmersiva.',
                            ),
                            array(
                                'key' => 'field_transmedia_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Descubrir',
                                    'url' => '/modulos/total-transmedia',
                                ),
                            ),
                            array(
                                'key' => 'field_transmedia_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/total-transmedia.svg',
                            ),
                        ),
                    ),
                    // Colaboratorios Module
                    array(
                        'key' => 'field_colaboratorios_module',
                        'label' => 'Módulo Colaboratorios',
                        'name' => 'colaboratorios_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_colaboratorios_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Colaboratorios',
                            ),
                            array(
                                'key' => 'field_colaboratorios_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Espacios de co-creación y experimentación donde la tecnología se encuentra con la creatividad. Proyectos colaborativos que impulsan la innovación educativa.',
                            ),
                            array(
                                'key' => 'field_colaboratorios_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Participa en un Colaboratorio',
                                    'url' => '/modulos/colaboratorios',
                                ),
                            ),
                            array(
                                'key' => 'field_colaboratorios_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/colaboratorios.svg',
                            ),
                        ),
                    ),
                    // Ready Module
                    array(
                        'key' => 'field_ready_module',
                        'label' => 'Módulo Ready',
                        'name' => 'ready_module',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Ready',
                            ),
                            array(
                                'key' => 'field_ready_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Soluciones tecnológicas listas para implementar en entornos educativos. Herramientas y recursos que facilitan la transformación digital de la educación.',
                            ),
                            array(
                                'key' => 'field_ready_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce la red',
                                    'url' => '/modulos/ready',
                                ),
                            ),
                            array(
                                'key' => 'field_ready_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'default_value' => '/wp-content/uploads/2024/12/ready.svg',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/modulos.php',
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

add_action('acf/init', 'digitalia_register_modulos_acf_fields');
