<?php
/**
 * ACF Fields for Parameters Admin Page
 *
 * @package Digitalia
 */

if (function_exists('acf_add_local_field_group')):

    function digitalia_register_parametros_acf_fields() {
        if (!did_action('init')) {
            // Always log warnings (not wrapped in WP_DEBUG) - these indicate actual problems
            error_log('Digitalia WARNING: ACF fields registered before init');
            return;
        }

        require_once get_template_directory() . '/inc/admin/post-type-utils.php';

        $post_types = digitalia_get_public_post_types();
        if (empty($post_types)) {
            // Always log warnings (not wrapped in WP_DEBUG) - these indicate actual problems
            error_log('Digitalia WARNING: No post types found when registering ACF fields');
            return;
        }

        $post_type_fields = array();

        foreach ($post_types as $post_type) {
            $config_key = digitalia_get_post_type_config_key($post_type->name);
            
            $post_type_fields[] = array(
                'key' => 'field_' . $config_key,
                'label' => $post_type->labels->name,
                'name' => $config_key,
                'type' => 'group',
                'sub_fields' => array(
                    array(
                        'key' => 'field_enable_' . $post_type->name,
                        'label' => sprintf('Mostrar en %s', $post_type->labels->name),
                        'name' => 'enable',
                        'type' => 'true_false',
                        'ui' => 1,
                    ),
                    array(
                        'key' => 'field_' . $post_type->name . '_display_type',
                        'label' => 'Tipo de Visualización',
                        'name' => 'display_type',
                        'type' => 'radio',
                        'choices' => array(
                            'all' => sprintf('Mostrar en todos los %s', strtolower($post_type->labels->name)),
                            'specific' => sprintf('Seleccionar %s específicos', strtolower($post_type->labels->name))
                        ),
                        'default_value' => 'all',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_enable_' . $post_type->name,
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_specific_' . $post_type->name,
                        'label' => sprintf('Seleccionar %s', $post_type->labels->name),
                        'name' => 'specific_items',
                        'type' => 'relationship',
                        'post_type' => array($post_type->name),
                        'filters' => array('search'),
                        'elements' => array('featured_image'),
                        'return_format' => 'id',
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_enable_' . $post_type->name,
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                                array(
                                    'field' => 'field_' . $post_type->name . '_display_type',
                                    'operator' => '==',
                                    'value' => 'specific',
                                ),
                            ),
                        ),
                    ),
                ),
            );
        }

        acf_add_local_field_group(array(
            'key' => 'group_parametros_general',
            'title' => 'Configuración General',
                'show_in_rest' => true,
            'fields' => array(
                array(
                    'key' => 'field_front_page_select',
                    'label' => 'Página de Inicio',
                    'name' => 'front_page_select',
                    'type' => 'post_object',
                    'instructions' => 'Selecciona la página que se usará como página de inicio',
                    'required' => 1,
                    'post_type' => array('page'),
                    'return_format' => 'id',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_google_maps_api_key',
                    'label' => 'Google Maps API Key',
                    'name' => 'google_maps_api_key',
                    'type' => 'password',
                    'instructions' => 'Ingresa tu Google Maps API Key. Esta clave se almacena de forma segura en la base de datos y se usa para mostrar mapas en el sitio (especialmente en Espacios). <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Obtener API Key</a>',
                    'required' => 0,
                    'placeholder' => 'AIzaSy...',
                    'append' => '',
                    'prepend' => '',
                ),
                array(
                    'key' => 'field_ctas',
                    'label' => 'CTAs',
                    'name' => 'ctas',
                    'type' => 'flexible_content',
                    'button_label' => 'Agregar CTA',
                    'layouts' => array(
                        'layout_cta_modulos' => array(
                            'key' => 'layout_cta_modulos',
                            'name' => 'cta_modulos',
                            'label' => 'CTA Módulos',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_title_modulos',
                                    'label' => 'Título',
                                    'name' => 'title',
                                    'type' => 'text',
                                    'required' => 1,
                                ),
                                array(
                                    'key' => 'field_description_modulos',
                                    'label' => 'Descripción',
                                    'name' => 'description',
                                    'type' => 'textarea',
                                ),
                                array(
                                    'key' => 'field_cta_primary_text',
                                    'label' => 'Texto CTA Primario',
                                    'name' => 'cta_primary_text',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_cta_primary_url',
                                    'label' => 'URL CTA Primario',
                                    'name' => 'cta_primary_url',
                                    'type' => 'url',
                                ),
                                array(
                                    'key' => 'field_cta_secondary_text',
                                    'label' => 'Texto CTA Secundario',
                                    'name' => 'cta_secondary_text',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_cta_secondary_url',
                                    'label' => 'URL CTA Secundario',
                                    'name' => 'cta_secondary_url',
                                    'type' => 'url',
                                ),
                                array(
                                    'key' => 'field_doc_title',
                                    'label' => 'Título Documento',
                                    'name' => 'doc_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_doc_description',
                                    'label' => 'Descripción Documento',
                                    'name' => 'doc_description',
                                    'type' => 'textarea',
                                ),
                                array(
                                    'key' => 'field_doc_url',
                                    'label' => 'URL Documento',
                                    'name' => 'doc_url',
                                    'type' => 'url',
                                ),
                                array(
                                    'key' => 'field_guide_title',
                                    'label' => 'Título Guía',
                                    'name' => 'guide_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_guide_description',
                                    'label' => 'Descripción Guía',
                                    'name' => 'guide_description',
                                    'type' => 'textarea',
                                ),
                                array(
                                    'key' => 'field_guide_url',
                                    'label' => 'URL Guía',
                                    'name' => 'guide_url',
                                    'type' => 'url',
                                ),
                                array(
                                    'key' => 'field_background_class_modulos',
                                    'label' => 'Clase de Fondo',
                                    'name' => 'background_class',
                                    'type' => 'select',
                                    'choices' => array(
                                        'bg-white' => 'Blanco',
                                        'bg-slate-100' => 'Gris Claro',
                                        'bg-slate-200' => 'Gris Medio',
                                        'bg-slate-300' => 'Gris Oscuro'
                                    ),
                                    'default_value' => 'bg-white',
                                ),
                                array(
                                    'key' => 'field_post_types_display_modulos',
                                    'label' => 'Configuración por Tipo de Post',
                                    'name' => 'post_types_display',
                                    'type' => 'group',
                                    'sub_fields' => $post_type_fields,
                                ),
                            ),
                        ),
                        'layout_cta_formularios' => array(
                            'key' => 'layout_cta_formularios',
                            'name' => 'cta_formularios',
                            'label' => 'CTA Formularios',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_title_formularios',
                                    'label' => 'Título',
                                    'name' => 'title',
                                    'type' => 'text',
                                    'required' => 1,
                                ),
                                array(
                                    'key' => 'field_description_formularios',
                                    'label' => 'Descripción',
                                    'name' => 'description',
                                    'type' => 'textarea',
                                ),
                                array(
                                    'key' => 'field_background_class_formularios',
                                    'label' => 'Clase de Fondo',
                                    'name' => 'background_class',
                                    'type' => 'select',
                                    'choices' => array(
                                        'bg-white' => 'Blanco',
                                        'bg-slate-100' => 'Gris Claro',
                                        'bg-slate-200' => 'Gris Medio',
                                        'bg-slate-300' => 'Gris Oscuro'
                                    ),
                                    'default_value' => 'bg-white',
                                ),
                                array(
                                    'key' => 'field_post_types_display_formularios',
                                    'label' => 'Configuración por Tipo de Post',
                                    'name' => 'post_types_display',
                                    'type' => 'group',
                                    'sub_fields' => $post_type_fields,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'parametros',
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

    // Run after all post types are registered
    add_action('init', 'digitalia_register_parametros_acf_fields', 20);

endif;
