<?php
/**
 * ACF Fields for Espacios Post Type
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_espacios_acf_fields')) {
    function digitalia_register_espacios_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_espacios',
                'title' => 'Ubicación del Espacio',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_espacio_description',
                        'label' => 'Descripción del Espacio',
                        'name' => 'description',
                        'type' => 'wysiwyg',
                        'instructions' => 'Ingresa una descripción detallada del espacio',
                        'required' => 1,
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_espacio_intro',
                        'label' => 'Texto Introductorio',
                        'name' => 'intro_text',
                        'type' => 'textarea',
                        'instructions' => 'Breve descripción que aparecerá debajo del título',
                        'required' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'maxlength' => '',
                        'rows' => 2,
                        'placeholder' => '',
                        'new_lines' => 'br',
                    ),
                    array(
                        'key' => 'field_espacio_characteristics',
                        'label' => 'Características',
                        'name' => 'characteristics',
                        'type' => 'group',
                        'instructions' => 'Define las características principales del espacio',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_espacio_area',
                                'label' => 'Área',
                                'name' => 'area',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: 500 m²',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_espacio_capacity',
                                'label' => 'Capacidad',
                                'name' => 'capacity',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: 100 personas',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_espacio_features',
                                'label' => 'Características Adicionales',
                                'name' => 'characteristics_features',
                                'type' => 'checkbox',
                                'instructions' => 'Selecciona las características disponibles',
                                'choices' => array(
                                    'wifi' => 'WiFi de alta velocidad',
                                    'parking' => 'Estacionamiento disponible',
                                    'accessibility' => 'Accesibilidad universal',
                                    'coffee' => 'Zona de café',
                                    'air_conditioning' => 'Aire acondicionado',
                                    'natural_light' => 'Iluminación natural',
                                    'projector' => 'Proyector',
                                    'sound_system' => 'Sistema de sonido',
                                    'kitchen' => 'Cocina equipada',
                                    'lockers' => 'Casilleros',
                                    'meeting_rooms' => 'Salas de reuniones',
                                    'outdoor_area' => 'Área al aire libre',
                                    'bike_parking' => 'Estacionamiento de bicicletas',
                                    'security' => 'Seguridad 24/7',
                                    'printing' => 'Servicios de impresión',
                                    'phone_booths' => 'Cabinas telefónicas',
                                ),
                                'return_format' => 'value',
                                'layout' => 'vertical',
                                'default_value' => array(),
                                'allow_custom' => 0,
                                'save_custom' => 0,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_espacio_hours',
                        'label' => 'Horarios',
                        'name' => 'hours',
                        'type' => 'group',
                        'instructions' => 'Define los horarios de atención',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_espacio_weekday_hours',
                                'label' => 'Lunes a Viernes',
                                'name' => 'weekday_hours',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: 8:00 AM - 8:00 PM',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_espacio_saturday_hours',
                                'label' => 'Sábados',
                                'name' => 'saturday_hours',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: 9:00 AM - 6:00 PM',
                                'required' => 0,
                            ),
                            array(
                                'key' => 'field_espacio_sunday_hours',
                                'label' => 'Domingos',
                                'name' => 'sunday_hours',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: Cerrado',
                                'required' => 0,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_espacio_contact',
                        'label' => 'Información de Contacto',
                        'name' => 'contact',
                        'type' => 'group',
                        'instructions' => 'Define la información de contacto',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_espacio_phone',
                                'label' => 'Teléfono',
                                'name' => 'phone',
                                'type' => 'text',
                                'instructions' => 'Ejemplo: +57 300 123 4567',
                                'required' => 0,
                            ),
                            array(
                                'key' => 'field_espacio_email',
                                'label' => 'Correo Electrónico',
                                'name' => 'email',
                                'type' => 'email',
                                'instructions' => 'Ejemplo: contacto@espacio.com',
                                'required' => 0,
                            ),
                            array(
                                'key' => 'field_espacio_whatsapp',
                                'label' => 'WhatsApp',
                                'name' => 'whatsapp',
                                'type' => 'text',
                                'instructions' => 'Número de WhatsApp con código de país',
                                'required' => 0,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_espacio_location',
                        'label' => 'Ubicación',
                        'name' => 'location',
                        'type' => 'google_map',
                        'instructions' => 'Selecciona la ubicación del espacio en el mapa',
                        'required' => 1,
                        'center_lat' => '4.6097102', // Default center on Bogotá
                        'center_lng' => '-74.081749',
                        'zoom' => 5,
                        'height' => 400,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'espacio',
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

add_action('acf/init', 'digitalia_register_espacios_acf_fields');
