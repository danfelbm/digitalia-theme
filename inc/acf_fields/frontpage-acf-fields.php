<?php
/**
 * Register ACF Fields programmatically
 */

if (!function_exists('digitalia_register_acf_fields')) {
    function digitalia_register_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            // Hero Section Fields
            acf_add_local_field_group(array(
                'key' => 'group_hero_section',
                'title' => 'Sección Hero',
                'fields' => array(
                    array(
                        'key' => 'field_hero_subtitle',
                        'label' => 'Subtítulo',
                        'name' => 'hero_subtitle',
                        'type' => 'text',
                        'default_value' => 'Educomunicación Para la Paz',
                        'instructions' => 'Ingrese el subtítulo de la sección hero',
                    ),
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Título',
                        'name' => 'hero_title',
                        'type' => 'text',
                        'default_value' => 'Digital·IA',
                        'instructions' => 'Ingrese el título principal',
                    ),
                    array(
                        'key' => 'field_hero_description',
                        'label' => 'Descripción',
                        'name' => 'hero_description',
                        'type' => 'textarea',
                        'default_value' => 'Digital-IA es un programa nacional de educomunicación que fortalece las capacidades ciudadanas frente a los desafíos de las tecnologías emergentes, promoviendo la alfabetización mediática e informacional con enfoque de paz.',
                        'instructions' => 'Ingrese la descripción principal',
                    ),
                    array(
                        'key' => 'field_hero_primary_button',
                        'label' => 'Botón Principal',
                        'name' => 'hero_primary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_primary_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Primary',
                                'instructions' => 'Ingrese el texto del botón principal',
                            ),
                            array(
                                'key' => 'field_hero_primary_button_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                                'default_value' => '#',
                                'instructions' => 'Ingrese la URL del botón',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_secondary_button',
                        'label' => 'Botón Secundario',
                        'name' => 'hero_secondary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_hero_secondary_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Secondary',
                                'instructions' => 'Ingrese el texto del botón secundario',
                            ),
                            array(
                                'key' => 'field_hero_secondary_button_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                                'default_value' => '#',
                                'instructions' => 'Ingrese la URL del botón',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_background_image',
                        'label' => 'Imagen de Fondo',
                        'name' => 'hero_background_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'default_value' => '/wp-content/uploads/2024/12/svgbackdrop.svg',
                        'instructions' => 'Seleccione la imagen de fondo',
                    ),
                    array(
                        'key' => 'field_hero_image_left',
                        'label' => 'Imagen Decorativa Izquierda',
                        'name' => 'hero_image_left',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa izquierda',
                    ),
                    array(
                        'key' => 'field_hero_image_right',
                        'label' => 'Imagen Decorativa Derecha',
                        'name' => 'hero_image_right',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa derecha',
                    ),
                    array(
                        'key' => 'field_hero_image_bottom',
                        'label' => 'Imagen Decorativa Inferior',
                        'name' => 'hero_image_bottom',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa inferior',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post',
                            'operator' => '==',
                            'value' => get_field('front_page_select', 'option'),
                        ),
                    ),
                ),
                'menu_order' => 0,
            ));

            // Modules Section Fields
            acf_add_local_field_group(array(
                'key' => 'group_modules_section',
                'title' => 'Sección de Módulos',
                'fields' => array(
                    array(
                        'key' => 'field_modules',
                        'label' => 'Módulos',
                        'name' => 'modules',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_module_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_module_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_module_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                            ),
                            array(
                                'key' => 'field_module_icon',
                                'label' => 'Ícono',
                                'name' => 'icon',
                                'type' => 'image',
                                'return_format' => 'url',
                                'preview_size' => 'medium',
                            ),
                            array(
                                'key' => 'field_module_color',
                                'label' => 'Color de Fondo',
                                'name' => 'color',
                                'type' => 'select',
                                'choices' => array(
                                    'yellow' => 'Amarillo',
                                    'red' => 'Rojo',
                                    'blue' => 'Azul',
                                    'teal' => 'Verde Azulado',
                                    'purple' => 'Morado',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_featured_module',
                        'label' => 'Módulo Destacado',
                        'name' => 'featured_module',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_featured_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Más sobre Digital·IA',
                            ),
                            array(
                                'key' => 'field_featured_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Conoce más',
                            ),
                            array(
                                'key' => 'field_featured_button_link',
                                'label' => 'Enlace del Botón',
                                'name' => 'button_link',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                                'default_value' => '#',
                            ),
                            array(
                                'key' => 'field_featured_media_type',
                                'label' => 'Tipo de Medio',
                                'name' => 'media_type',
                                'type' => 'select',
                                'choices' => array(
                                    'image' => 'Imagen',
                                    'video' => 'Video MP4',
                                ),
                                'default_value' => 'image',
                            ),
                            array(
                                'key' => 'field_featured_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'url',
                                'preview_size' => 'medium',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_featured_media_type',
                                            'operator' => '==',
                                            'value' => 'image',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_featured_video',
                                'label' => 'Video MP4',
                                'name' => 'video',
                                'type' => 'file',
                                'return_format' => 'url',
                                'mime_types' => 'mp4',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_featured_media_type',
                                            'operator' => '==',
                                            'value' => 'video',
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
                            'param' => 'post',
                            'operator' => '==',
                            'value' => get_field('front_page_select', 'option'),
                        ),
                    ),
                ),
                'menu_order' => 1,
            ));

            // Vision & Commitment Section Fields
            acf_add_local_field_group(array(
                'key' => 'group_vision_commitment',
                'title' => 'Visión y Compromiso',
                'fields' => array(
                    // Vision Section
                    array(
                        'key' => 'field_vision_section',
                        'label' => 'Sección Visión',
                        'name' => 'vision_section',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_vision_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Nuestra Visión',
                            ),
                            array(
                                'key' => 'field_vision_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_vision_features',
                                'label' => 'Características',
                                'name' => 'features',
                                'type' => 'repeater',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_vision_feature_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_vision_feature_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                    ),
                                    array(
                                        'key' => 'field_vision_feature_icon',
                                        'label' => 'Ícono FontAwesome',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'instructions' => 'Ingrese el nombre del ícono de FontAwesome (ej: fa-book)',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Commitment Section
                    array(
                        'key' => 'field_commitment_section',
                        'label' => 'Sección Compromiso',
                        'name' => 'commitment_section',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_commitment_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Nuestro Compromiso',
                            ),
                            array(
                                'key' => 'field_commitment_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_commitment_features',
                                'label' => 'Características',
                                'name' => 'features',
                                'type' => 'repeater',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_commitment_feature_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_commitment_feature_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                    ),
                                    array(
                                        'key' => 'field_commitment_feature_icon',
                                        'label' => 'Ícono FontAwesome',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'instructions' => 'Ingrese el nombre del ícono de FontAwesome (ej: fa-users)',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post',
                            'operator' => '==',
                            'value' => get_field('front_page_select', 'option'),
                        ),
                    ),
                ),
                'menu_order' => 2,
            ));

            // Modules Details Section
            acf_add_local_field_group(array(
                'key' => 'group_modules_details',
                'title' => 'Módulos en Detalle',
                'fields' => array(
                    array(
                        'key' => 'field_modules_details_header',
                        'label' => 'Encabezado',
                        'name' => 'modules_details_header',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_modules_details_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Conoce nuestros módulos en detalle',
                            ),
                            array(
                                'key' => 'field_modules_details_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Digital-IA es un programa integral que combina educación mediática, tecnología y construcción de paz. Cada módulo está diseñado para fortalecer diferentes aspectos de la transformación digital en Colombia.',
                            ),
                            array(
                                'key' => 'field_modules_details_button',
                                'label' => 'Botón',
                                'name' => 'button',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_modules_details_button_text',
                                        'label' => 'Texto',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Explorar módulos',
                                    ),
                                    array(
                                        'key' => 'field_modules_details_button_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'page_link',
                                        'return_format' => 'url',
                                        'allow_null' => 1,
                                        'multiple' => 0,
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_modules_details_items',
                        'label' => 'Módulos',
                        'name' => 'modules_details_items',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_module_number',
                                'label' => 'Número de Módulo',
                                'name' => 'module_number',
                                'type' => 'text',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_module_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_module_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_module_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                            ),
                            array(
                                'key' => 'field_module_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'url',
                            ),
                            array(
                                'key' => 'field_module_color',
                                'label' => 'Color',
                                'name' => 'color',
                                'type' => 'select',
                                'choices' => array(
                                    'yellow' => 'Amarillo',
                                    'red' => 'Rojo',
                                    'blue' => 'Azul',
                                    'teal' => 'Verde Azulado',
                                    'purple' => 'Morado',
                                ),
                            ),
                            array(
                                'key' => 'field_module_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Conocer más',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post',
                            'operator' => '==',
                            'value' => get_field('front_page_select', 'option'),
                        ),
                    ),
                ),
                'menu_order' => 3,
            ));

            // Frontpage CTA
            acf_add_local_field_group(array(
                'key' => 'group_front_intro',
                'title' => 'Sección de CTA',
                'fields' => array(
                    array(
                        'key' => 'field_intro_background',
                        'label' => 'Imagen de Fondo',
                        'name' => 'intro_background',
                        'type' => 'image',
                        'return_format' => 'url',
                        'default_value' => 'https://www.shadcnblocks.com/images/block/circles.svg',
                    ),
                    array(
                        'key' => 'field_intro_title',
                        'label' => 'Título',
                        'name' => 'intro_title',
                        'type' => 'text',
                        'default_value' => 'Únete a la revolución educativa digital',
                    ),
                    array(
                        'key' => 'field_intro_description',
                        'label' => 'Descripción',
                        'name' => 'intro_description',
                        'type' => 'textarea',
                        'default_value' => 'Explora Digital-IA, un programa innovador de alfabetización mediática e informacional. Desarrolla habilidades digitales y contribuye a la construcción de paz a través de la educomunicación.',
                    ),
                    array(
                        'key' => 'field_intro_primary_button',
                        'label' => 'Botón Primario',
                        'name' => 'intro_primary_button',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_intro_primary_button_text',
                                'label' => 'Texto',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Comenzar Ahora',
                            ),
                            array(
                                'key' => 'field_intro_primary_button_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_intro_secondary_button',
                        'label' => 'Botón Secundario',
                        'name' => 'intro_secondary_button',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_intro_secondary_button_text',
                                'label' => 'Texto',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Saber Más',
                            ),
                            array(
                                'key' => 'field_intro_secondary_button_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'link',
                                'return_format' => 'url',
                                'allow_null' => 1,
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post',
                            'operator' => '==',
                            'value' => get_field('front_page_select', 'option'),
                        ),
                    ),
                ),
                'menu_order' => 4,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_acf_fields');
