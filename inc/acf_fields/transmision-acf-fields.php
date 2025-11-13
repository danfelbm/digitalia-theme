<?php
/**
 * ACF Fields for Transmision Post Type
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_transmision_acf_fields')) {
    function digitalia_register_transmision_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_transmision',
                'title' => 'Detalles de la Transmisión',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_transmision_excerpt',
                        'label' => 'Extracto de la Transmisión',
                        'name' => 'transmision_excerpt',
                        'type' => 'textarea',
                        'instructions' => 'Breve descripción de la transmisión',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'rows' => 3,
                        'placeholder' => '',
                        'new_lines' => 'br',
                    ),
                    array(
                        'key' => 'field_transmision_duration',
                        'label' => 'Duración',
                        'name' => 'transmision_duration',
                        'type' => 'text',
                        'instructions' => 'Duración de la transmisión (ej: 1h 30min)',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key' => 'field_transmision_fecha',
                        'label' => 'Fecha de Transmisión',
                        'name' => 'transmision_fecha',
                        'type' => 'date_time_picker',
                        'instructions' => 'Selecciona la fecha y hora de la transmisión',
                        'required' => 1,
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'd/m/Y g:i a',
                        'return_format' => 'd/m/Y g:i a',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_transmision_video',
                        'label' => 'URL del Video de YouTube',
                        'name' => 'transmision_video',
                        'type' => 'url',
                        'instructions' => 'URL del video de YouTube (formato: https://www.youtube.com/watch?v=XXXXX)',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key' => 'field_transmision_participantes',
                        'label' => 'Participantes',
                        'name' => 'transmision_participantes',
                        'type' => 'repeater',
                        'instructions' => 'Agrega los participantes de la transmisión',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'table',
                        'button_label' => 'Agregar Participante',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_participante_nombre',
                                'label' => 'Nombre',
                                'name' => 'nombre',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_participante_rol',
                                'label' => 'Rol',
                                'name' => 'rol',
                                'type' => 'text',
                                'required' => 0,
                            ),
                            array(
                                'key' => 'field_participante_foto',
                                'label' => 'Foto',
                                'name' => 'foto',
                                'type' => 'image',
                                'required' => 0,
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                            ),
                            array(
                                'key' => 'field_participante_bio',
                                'label' => 'Biografía',
                                'name' => 'bio',
                                'type' => 'textarea',
                                'required' => 0,
                                'instructions' => 'Breve resumen o biografía del participante',
                                'rows' => 3,
                                'new_lines' => 'br',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'transmision',
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

add_action('acf/init', 'digitalia_register_transmision_acf_fields');
