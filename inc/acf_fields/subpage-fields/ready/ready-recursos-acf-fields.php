<?php
/**
 * ACF Fields for Ready Recursos Section
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_ready_recursos_acf_fields')) {
    function digitalia_register_ready_recursos_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_ready_recursos',
                'title' => 'Sección de Recursos',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_ready_recursos_hero',
                        'label' => 'Hero',
                        'name' => 'ready_recursos_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_recursos_badge',
                                'label' => 'Badge',
                                'name' => 'badge',
                                'type' => 'text',
                                'default_value' => 'Recursos y Herramientas',
                                'instructions' => 'Texto que aparece encima del título principal',
                            ),
                            array(
                                'key' => 'field_ready_recursos_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Kit del Alfabetizador',
                            ),
                            array(
                                'key' => 'field_ready_recursos_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Conjunto completo de recursos pedagógicos, guías metodológicas y herramientas digitales diseñadas específicamente para apoyar la labor de los alfabetizadores en campo.',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_ready_recursos_cards',
                        'label' => 'Tarjetas de Recursos',
                        'name' => 'ready_recursos_cards',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'min' => 4,
                        'max' => 4,
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_recursos_card_icon',
                                'label' => 'Icono (Lucide)',
                                'name' => 'icon',
                                'type' => 'text',
                                'instructions' => 'Nombre del icono de Lucide (ej: book-open, library, laptop, users)',
                            ),
                            array(
                                'key' => 'field_ready_recursos_card_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_ready_recursos_card_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_ready_recursos_card_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 800x600px',
                            ),
                            array(
                                'key' => 'field_ready_recursos_card_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'text',
                                'default_value' => '#',
                            ),
                        ),
                        'default_value' => array(
                            array(
                                'icon' => 'book-open',
                                'title' => 'Kit del Alfabetizador',
                                'description' => 'Conjunto completo de recursos pedagógicos y guías metodológicas para apoyar la labor de alfabetización.',
                                'url' => '#',
                            ),
                            array(
                                'icon' => 'library',
                                'title' => 'Biblioteca Digital',
                                'description' => 'Repositorio curado de recursos educativos, estudios de caso y materiales de referencia actualizados constantemente.',
                                'url' => '#',
                            ),
                            array(
                                'icon' => 'laptop',
                                'title' => 'Herramientas Tecnológicas',
                                'description' => 'Acceso a plataformas, aplicaciones y recursos digitales que facilitan la labor de alfabetización.',
                                'url' => '#',
                            ),
                            array(
                                'icon' => 'users',
                                'title' => 'Comunidad de Práctica',
                                'description' => 'Espacio virtual para el intercambio de experiencias y conocimientos entre alfabetizadores.',
                                'url' => '#',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/subpage-templates/ready/recursos.php',
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

add_action('acf/init', 'digitalia_register_ready_recursos_acf_fields');
