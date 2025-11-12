<?php
/**
 * ACF Fields for Academia - Comunidad y Colaboración Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_comunidad_acf_fields')) {
    function digitalia_register_comunidad_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_comunidad_page',
                'title' => 'Contenido de Comunidad y Colaboración',
                'show_in_rest' => true,
                'fields' => array(
                    // Hero Section
                    array(
                        'key' => 'field_comunidad_hero',
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
                                'default_value' => 'Ecosistema Digital Educativo',
                            ),
                            array(
                                'key' => 'field_hero_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Plataforma integral de formación que combina tecnología y educación para fortalecer las competencias digitales y promover la alfabetización mediática con enfoque de paz.',
                            ),
                            array(
                                'key' => 'field_hero_cta_text',
                                'label' => 'Texto del CTA',
                                'name' => 'cta_text',
                                'type' => 'text',
                                'default_value' => 'Conoce más',
                            ),
                            array(
                                'key' => 'field_hero_cta_link',
                                'label' => 'Enlace del CTA',
                                'name' => 'cta_link',
                                'type' => 'url',
                            ),
                        ),
                    ),
                    // Red de Aprendizaje Section
                    array(
                        'key' => 'field_red_aprendizaje',
                        'label' => 'Red de Aprendizaje',
                        'name' => 'red_aprendizaje',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_red_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Red de Aprendizaje',
                            ),
                            array(
                                'key' => 'field_red_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Conecta con mentores y compañeros para enriquecer tu experiencia educativa.',
                            ),
                            array(
                                'key' => 'field_mentors',
                                'label' => 'Mentores',
                                'name' => 'mentors',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 1,
                                'max' => 6,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_mentor_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_mentor_name',
                                        'label' => 'Nombre',
                                        'name' => 'name',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_mentor_role',
                                        'label' => 'Rol',
                                        'name' => 'role',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_mentor_linkedin',
                                        'label' => 'URL de LinkedIn',
                                        'name' => 'linkedin_url',
                                        'type' => 'url',
                                    ),
                                    array(
                                        'key' => 'field_mentor_twitter',
                                        'label' => 'URL de Twitter',
                                        'name' => 'twitter_url',
                                        'type' => 'url',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_red_cta_text',
                                'label' => 'Texto del botón CTA',
                                'name' => 'cta_text',
                                'type' => 'text',
                                'default_value' => 'Ir al Campus Digital',
                            ),
                            array(
                                'key' => 'field_red_cta_url',
                                'label' => 'URL del botón CTA',
                                'name' => 'cta_url',
                                'type' => 'url',
                                'default_value' => 'https://digitalia.gov.co/campus',
                            ),
                        ),
                    ),
                    // Eventos y Actividades Section
                    array(
                        'key' => 'field_eventos',
                        'label' => 'Eventos y Actividades',
                        'name' => 'eventos',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_eventos_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Eventos y Actividades',
                            ),
                            array(
                                'key' => 'field_eventos_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Participa en nuestros eventos y actividades diseñados para fortalecer el aprendizaje colaborativo.',
                            ),
                            array(
                                'key' => 'field_event_list',
                                'label' => 'Lista de Eventos',
                                'name' => 'events',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 1,
                                'max' => 6,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_event_date',
                                        'label' => 'Fecha',
                                        'name' => 'date',
                                        'type' => 'date_picker',
                                        'display_format' => 'F j, Y',
                                        'return_format' => 'Y-m-d',
                                    ),
                                    array(
                                        'key' => 'field_event_type',
                                        'label' => 'Tipo',
                                        'name' => 'type',
                                        'type' => 'select',
                                        'choices' => array(
                                            'online' => 'Online',
                                            'virtual' => 'Virtual',
                                            'presencial' => 'Presencial',
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_event_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_event_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_event_url',
                                        'label' => 'URL del Evento',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'instructions' => 'Enlace a la página del evento o formulario de registro',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Foros fields
                    array(
                        'key' => 'field_foros',
                        'label' => 'Foros',
                        'name' => 'foros',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_foros_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Foros y Reconocimientos',
                            ),
                            array(
                                'key' => 'field_foros_items',
                                'label' => 'Items',
                                'name' => 'items',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 1,
                                'button_label' => 'Agregar Item',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_foro_icon',
                                        'label' => 'Icono',
                                        'name' => 'icon',
                                        'type' => 'select',
                                        'choices' => array(
                                            'fa-trophy' => 'Trofeo',
                                            'fa-award' => 'Premio',
                                            'fa-lightbulb' => 'Innovación',
                                            'fa-handshake' => 'Colaboración',
                                            'fa-building' => 'Institución',
                                            'fa-leaf' => 'Sostenibilidad',
                                            'fa-users' => 'Comunidad',
                                            'fa-graduation-cap' => 'Educación',
                                            'fa-book' => 'Conocimiento',
                                            'fa-chart-line' => 'Crecimiento',
                                            'fa-globe' => 'Internacional',
                                            'fa-star' => 'Excelencia',
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_foro_category',
                                        'label' => 'Categoría',
                                        'name' => 'category',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_foro_subcategory',
                                        'label' => 'Subcategoría',
                                        'name' => 'subcategory',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_foro_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_foro_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
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
                            'value' => 'page-templates/subpage-templates/academia/comunidad.php',
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

add_action('acf/init', 'digitalia_register_comunidad_acf_fields');
