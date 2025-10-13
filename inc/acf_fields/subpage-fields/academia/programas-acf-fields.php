<?php
/**
 * ACF Fields for Academia - Programas Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_programas_acf_fields')) {
    function digitalia_register_programas_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_programas_page',
                'title' => 'Contenido de Programas',
                'fields' => array(
                    // Hero Section
                    array(
                        'key' => 'field_hero_section',
                        'label' => 'Sección Hero',
                        'name' => 'hero_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Formación Digital Integral',
                            ),
                            array(
                                'key' => 'field_hero_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 3,
                                'default_value' => 'Descubre nuestro catálogo de cursos especializados en alfabetización mediática, tecnologías emergentes y comunicación digital para la paz.',
                            ),
                            array(
                                'key' => 'field_hero_cta_text',
                                'label' => 'Texto del Botón',
                                'name' => 'cta_text',
                                'type' => 'text',
                                'default_value' => 'Conoce más',
                            ),
                            array(
                                'key' => 'field_hero_cta_link',
                                'label' => 'Enlace del Botón',
                                'name' => 'cta_link',
                                'type' => 'text',
                                'post_type' => array('page', 'curso'),
                                'allow_archives' => true,
                                'instructions' => 'Seleccione una página o el archivo de cursos',
                            ),
                        ),
                    ),
                    // Metodología de Aprendizaje Section
                    array(
                        'key' => 'field_metodologia_aprendizaje',
                        'label' => 'Metodología de Aprendizaje',
                        'name' => 'metodologia_aprendizaje',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_metodologia_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Metodología de Aprendizaje Digital',
                            ),
                            array(
                                'key' => 'field_metodologia_sections',
                                'label' => 'Secciones de Metodología',
                                'name' => 'sections',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 3,
                                'max' => 3,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_section_subtitle',
                                        'label' => 'Subtítulo',
                                        'name' => 'subtitle',
                                        'type' => 'text',
                                        'instructions' => 'Ej: Aprendizaje Flexible',
                                    ),
                                    array(
                                        'key' => 'field_section_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'instructions' => 'Ej: Aprendizaje Autodirigido',
                                    ),
                                    array(
                                        'key' => 'field_section_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                    ),
                                    array(
                                        'key' => 'field_section_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                        'instructions' => 'Imagen para la sección (recomendado: 600x400px)',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Testimonios Section
                    array(
                        'key' => 'field_testimonios_section',
                        'label' => 'Sección de Testimonios',
                        'name' => 'testimonios_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_testimonios_title',
                                'label' => 'Título de la Sección',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Testimonios',
                            ),
                            array(
                                'key' => 'field_testimonios',
                                'label' => 'Testimonios',
                                'name' => 'testimonios',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 2,
                                'max' => 2,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_testimonio_foto',
                                        'label' => 'Foto del Estudiante',
                                        'name' => 'foto',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'thumbnail',
                                        'instructions' => 'Foto del estudiante (recomendado: 80x80px)',
                                    ),
                                    array(
                                        'key' => 'field_testimonio_texto',
                                        'label' => 'Testimonio',
                                        'name' => 'texto',
                                        'type' => 'textarea',
                                        'rows' => 4,
                                    ),
                                    array(
                                        'key' => 'field_testimonio_nombre',
                                        'label' => 'Nombre',
                                        'name' => 'nombre',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_testimonio_rol',
                                        'label' => 'Rol o Programa',
                                        'name' => 'rol',
                                        'type' => 'text',
                                        'instructions' => 'Ej: Estudiante de Seguridad Informática',
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
                            'value' => 'page-templates/subpage-templates/academia/programas.php',
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

add_action('acf/init', 'digitalia_register_programas_acf_fields');
