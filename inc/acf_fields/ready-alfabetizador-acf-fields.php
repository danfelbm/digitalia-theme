<?php
/**
 * ACF Fields for Alfabetizador Post Type
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_alfabetizador_acf_fields')) {
    function digitalia_register_alfabetizador_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_alfabetizador',
                'title' => 'Información del Alfabetizador',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_avatar',
                        'label' => 'Avatar',
                        'name' => 'avatar',
                        'type' => 'image',
                        'instructions' => 'Seleccione una imagen para el avatar del alfabetizador. Recomendado: imagen cuadrada de al menos 400x400px.',
                        'required' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => 400,
                        'min_height' => 400,
                        'mime_types' => 'jpg,jpeg,png',
                    ),
                    array(
                        'key' => 'field_cargo',
                        'label' => 'Cargo',
                        'name' => 'cargo',
                        'type' => 'text',
                        'instructions' => 'Ingrese el cargo o rol del alfabetizador',
                        'required' => 1,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                    ),
                    array(
                        'key' => 'field_etiquetas',
                        'label' => 'Etiquetas de Especialización',
                        'name' => 'etiquetas',
                        'type' => 'taxonomy',
                        'instructions' => 'Seleccione las áreas de especialización del alfabetizador',
                        'required' => 1,
                        'taxonomy' => 'alfabetizadores-tags',
                        'field_type' => 'checkbox',
                        'add_term' => 1,
                        'save_terms' => 1,
                        'load_terms' => 1,
                        'return_format' => 'object',
                        'multiple' => 1,
                    ),
                    array(
                        'key' => 'field_ubicacion',
                        'label' => 'Ubicación',
                        'name' => 'ubicacion',
                        'type' => 'taxonomy',
                        'instructions' => 'Seleccione hasta dos ubicaciones del alfabetizador',
                        'required' => 1,
                        'taxonomy' => 'ubicaciones',
                        'field_type' => 'multi_select',
                        'allow_null' => 0,
                        'add_term' => 0,
                        'save_terms' => 1,
                        'load_terms' => 1,
                        'return_format' => 'object',
                        'multiple' => 1,
                        'min' => 1,
                        'max' => 2,
                    ),
                    array(
                        'key' => 'field_especialidad',
                        'label' => 'Especialidad',
                        'name' => 'especialidad',
                        'type' => 'text',
                        'instructions' => 'Ingrese la especialidad principal del alfabetizador',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_estado',
                        'label' => 'Estado',
                        'name' => 'estado',
                        'type' => 'select',
                        'choices' => array(
                            'activo' => 'Activo',
                            'inactivo' => 'Inactivo',
                            'en_formacion' => 'En formación',
                        ),
                        'default_value' => 'activo',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_sobre_mi',
                        'label' => 'Sobre Mí',
                        'name' => 'sobre_mi',
                        'type' => 'wysiwyg',
                        'instructions' => 'Descripción detallada del alfabetizador y sus especialidades',
                        'required' => 1,
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                    ),
                    array(
                        'key' => 'field_experiencia',
                        'label' => 'Experiencia',
                        'name' => 'experiencia',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Agregar Experiencia',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_exp_cargo',
                                'label' => 'Cargo',
                                'name' => 'cargo',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_exp_periodo',
                                'label' => 'Período',
                                'name' => 'periodo',
                                'type' => 'group',
                                'layout' => 'table',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_exp_periodo_inicio',
                                        'label' => 'Año de Inicio',
                                        'name' => 'inicio',
                                        'type' => 'number',
                                        'required' => 1,
                                        'min' => 1900,
                                        'max' => date('Y'),
                                        'step' => 1,
                                    ),
                                    array(
                                        'key' => 'field_exp_periodo_fin',
                                        'label' => 'Año de Finalización',
                                        'name' => 'fin',
                                        'type' => 'number',
                                        'required' => 0,
                                        'min' => 1900,
                                        'max' => date('Y'),
                                        'step' => 1,
                                        'instructions' => 'Dejar en blanco si es el cargo actual',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_exp_descripcion',
                                'label' => 'Descripción',
                                'name' => 'descripcion',
                                'type' => 'textarea',
                                'required' => 1,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_proyectos',
                        'label' => 'Proyectos Destacados',
                        'name' => 'proyectos',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Agregar Proyecto',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_proyecto_nombre',
                                'label' => 'Nombre del Proyecto',
                                'name' => 'nombre',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_proyecto_periodo',
                                'label' => 'Período',
                                'name' => 'periodo',
                                'type' => 'group',
                                'layout' => 'table',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_proyecto_periodo_inicio',
                                        'label' => 'Año de Inicio',
                                        'name' => 'inicio',
                                        'type' => 'number',
                                        'required' => 1,
                                        'min' => 1900,
                                        'max' => date('Y'),
                                        'step' => 1,
                                    ),
                                    array(
                                        'key' => 'field_proyecto_periodo_fin',
                                        'label' => 'Año de Finalización',
                                        'name' => 'fin',
                                        'type' => 'number',
                                        'required' => 0,
                                        'min' => 1900,
                                        'max' => date('Y'),
                                        'step' => 1,
                                        'instructions' => 'Dejar en blanco si es un proyecto en curso',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_proyecto_descripcion',
                                'label' => 'Descripción',
                                'name' => 'descripcion',
                                'type' => 'textarea',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'alfabetizador',
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
                'description' => 'Campos personalizados para el perfil de alfabetizadores mediáticos',
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_alfabetizador_acf_fields');

// Add location data fields to ubicaciones taxonomy
if (!function_exists('digitalia_register_ubicaciones_acf_fields')) {
    function digitalia_register_ubicaciones_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_ubicaciones_location',
                'title' => 'Datos de Ubicación',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_location_data',
                        'label' => 'Datos de Ubicación',
                        'name' => 'location_data',
                        'type' => 'google_map',
                        'instructions' => 'Seleccione la ubicación exacta en el mapa',
                        'required' => 1,
                        'center_lat' => '4.6097100',  // Bogotá default
                        'center_lng' => '-74.0817500',
                        'zoom' => 5,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'ubicaciones',
                        ),
                    ),
                ),
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => true,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_ubicaciones_acf_fields');
