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
                'show_in_rest' => true,
                'fields' => array(
                    // Hero Type Selector
                    array(
                        'key' => 'field_hero_type',
                        'label' => 'Tipo de Hero',
                        'name' => 'hero_type',
                        'type' => 'select',
                        'instructions' => 'Seleccione el tipo de hero a mostrar en la página principal',
                        'choices' => array(
                            'globe' => 'Globe Hero (con globo 3D - actual)',
                            'classic' => 'Classic Hero (banner con imágenes)',
                        ),
                        'default_value' => 'globe',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'return_format' => 'value',
                    ),
                    // Globe Hero Fields
                    array(
                        'key' => 'field_globe_hero_title',
                        'label' => '[Globe] Título Principal',
                        'name' => 'globe_hero_title',
                        'type' => 'text',
                        'default_value' => 'Educomunicación<br>para la paz',
                        'instructions' => 'Título principal del Globe Hero. Use &lt;br&gt; para saltos de línea.',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'globe',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_globe_hero_description',
                        'label' => '[Globe] Descripción',
                        'name' => 'globe_hero_description',
                        'type' => 'textarea',
                        'default_value' => 'Digital-IA es un novedoso ecosistema público de Educomunicación destinado a crear y fortalecer capacidades, habilidades y competencias ciudadanas de cara a los nuevos desafíos de la desinformación.',
                        'instructions' => 'Descripción principal del Globe Hero',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'globe',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_globe_hero_primary_button',
                        'label' => '[Globe] Botón Primario',
                        'name' => 'globe_hero_primary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'globe',
                                ),
                            ),
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'field_globe_primary_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Más información',
                            ),
                            array(
                                'key' => 'field_globe_primary_button_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'url',
                                'default_value' => '#mas-digitalia',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_globe_hero_secondary_button',
                        'label' => '[Globe] Botón Secundario',
                        'name' => 'globe_hero_secondary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'globe',
                                ),
                            ),
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'field_globe_secondary_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Ir al Campus virtual',
                            ),
                            array(
                                'key' => 'field_globe_secondary_button_url',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'url',
                                'default_value' => 'https://digitalia.gov.co/campus/',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_globe_hero_features',
                        'label' => '[Globe] Features (Cómo te ayudamos)',
                        'name' => 'globe_hero_features',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Añadir Feature',
                        'max' => 3,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'globe',
                                ),
                            ),
                        ),
                        'sub_fields' => array(
                            array(
                                'key' => 'field_globe_feature_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_globe_feature_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 2,
                                'default_value' => '',
                            ),
                        ),
                    ),
                    // Classic Hero Fields
                    array(
                        'key' => 'field_hero_subtitle',
                        'label' => '[Classic] Subtítulo',
                        'name' => 'hero_subtitle',
                        'type' => 'text',
                        'default_value' => 'Educomunicación Para la Paz',
                        'instructions' => 'Ingrese el subtítulo de la sección hero',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_title',
                        'label' => '[Classic] Título',
                        'name' => 'hero_title',
                        'type' => 'text',
                        'default_value' => 'Digital·IA',
                        'instructions' => 'Ingrese el título principal',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_description',
                        'label' => '[Classic] Descripción',
                        'name' => 'hero_description',
                        'type' => 'textarea',
                        'default_value' => 'Digital-IA es un programa nacional de educomunicación que fortalece las capacidades ciudadanas frente a los desafíos de las tecnologías emergentes, promoviendo la alfabetización mediática e informacional con enfoque de paz.',
                        'instructions' => 'Ingrese la descripción principal',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_primary_button',
                        'label' => '[Classic] Botón Principal',
                        'name' => 'hero_primary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
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
                        'label' => '[Classic] Botón Secundario',
                        'name' => 'hero_secondary_button',
                        'type' => 'group',
                        'layout' => 'block',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
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
                        'label' => '[Classic] Imagen de Fondo',
                        'name' => 'hero_background_image',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'default_value' => '/wp-content/uploads/2024/12/svgbackdrop.svg',
                        'instructions' => 'Seleccione la imagen de fondo',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_image_left',
                        'label' => '[Classic] Imagen Decorativa Izquierda',
                        'name' => 'hero_image_left',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa izquierda',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_image_right',
                        'label' => '[Classic] Imagen Decorativa Derecha',
                        'name' => 'hero_image_right',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa derecha',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_hero_image_bottom',
                        'label' => '[Classic] Imagen Decorativa Inferior',
                        'name' => 'hero_image_bottom',
                        'type' => 'image',
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'instructions' => 'Seleccione la imagen decorativa inferior',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_hero_type',
                                    'operator' => '==',
                                    'value' => 'classic',
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
                'menu_order' => 0,
            ));

            // Modules Section Fields
            acf_add_local_field_group(array(
                'key' => 'group_modules_section',
                'title' => 'Sección de Módulos',
                'show_in_rest' => true,
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
                'show_in_rest' => true,
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
                'show_in_rest' => true,
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
                'show_in_rest' => true,
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

            // Courses Section Fields
            acf_add_local_field_group(array(
                'key' => 'group_courses_section',
                'title' => 'Sección de Cursos',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_courses_background_color',
                        'label' => 'Color de Fondo',
                        'name' => 'courses_background_color',
                        'type' => 'text',
                        'default_value' => '#010819',
                        'instructions' => 'Color hexadecimal de fondo para la sección de cursos',
                    ),
                    array(
                        'key' => 'field_courses_header',
                        'label' => 'Encabezado de Cursos',
                        'name' => 'courses_header',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_courses_badge',
                                'label' => 'Texto de Badge',
                                'name' => 'badge',
                                'type' => 'text',
                                'default_value' => 'Cursos Digitalia',
                            ),
                            array(
                                'key' => 'field_courses_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Formación para la Paz',
                            ),
                            array(
                                'key' => 'field_courses_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Tres rutas de aprendizaje diseñadas para enfrentar los desafíos de la desinformación y fortalecer capacidades ciudadanas.',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_courses_items',
                        'label' => 'Cursos',
                        'name' => 'courses_items',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Añadir Curso',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_course_title',
                                'label' => 'Título del Curso',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_course_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_course_badge',
                                'label' => 'Badge (opcional)',
                                'name' => 'badge',
                                'type' => 'text',
                                'instructions' => 'Ej: "Nuevo", "Actualizado", etc. Dejar vacío si no se necesita.',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_course_url',
                                'label' => 'URL del Curso',
                                'name' => 'url',
                                'type' => 'url',
                                'default_value' => '',
                            ),
                            array(
                                'key' => 'field_course_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Explorar curso',
                            ),
                            array(
                                'key' => 'field_course_color',
                                'label' => 'Color del Curso',
                                'name' => 'color',
                                'type' => 'select',
                                'choices' => array(
                                    'blue' => 'Azul',
                                    'teal' => 'Verde Azulado',
                                    'purple' => 'Morado',
                                    'yellow' => 'Amarillo',
                                    'red' => 'Rojo',
                                ),
                                'default_value' => 'blue',
                                'instructions' => 'Color del gradiente y botón hover',
                            ),
                            array(
                                'key' => 'field_course_icon_svg',
                                'label' => 'Ícono SVG',
                                'name' => 'icon_svg',
                                'type' => 'textarea',
                                'instructions' => 'Pega aquí el código SVG completo del ícono (solo la parte entre <svg>...</svg>, sin incluir las etiquetas svg)',
                                'default_value' => '',
                                'rows' => 8,
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
                'menu_order' => 5,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_acf_fields');
