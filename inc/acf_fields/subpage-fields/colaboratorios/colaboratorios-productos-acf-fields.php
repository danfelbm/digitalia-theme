<?php
if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_producto_details',
        'title' => 'Detalles del Producto',
                'show_in_rest' => true,
                'show_in_rest' => true,
        'fields' => array(
            // Excerpt Section
            array(
                'key' => 'field_producto_excerpt',
                'label' => 'Resumen del Producto',
                'name' => 'excerpt_details',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_producto_excerpt_text',
                        'label' => 'Resumen Corto',
                        'name' => 'excerpt_text',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_producto_download_button',
                        'label' => 'Botón de Descarga',
                        'name' => 'download_button',
                        'type' => 'group',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_producto_download_text',
                                'label' => 'Texto del Botón',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Descargar documento',
                            ),
                            array(
                                'key' => 'field_producto_download_file',
                                'label' => 'Archivo',
                                'name' => 'file',
                                'type' => 'file',
                                'return_format' => 'array',
                                'library' => 'all',
                                'mime_types' => 'pdf,doc,docx',
                            ),
                        ),
                    ),
                ),
            ),
            // Reviewer Section
            array(
                'key' => 'field_producto_reviewer',
                'label' => 'Información del Revisor',
                'name' => 'reviewer',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_producto_reviewer_name',
                        'label' => 'Nombre del Revisor',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_producto_reviewer_role',
                        'label' => 'Cargo del Revisor',
                        'name' => 'role',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_producto_reviewer_image',
                        'label' => 'Foto del Revisor',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
            ),
            // Key Features Section
            array(
                'key' => 'field_producto_features',
                'label' => 'Características Principales',
                'name' => 'key_features',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Agregar Característica',
                'sub_fields' => array(
                    array(
                        'key' => 'field_producto_feature_text',
                        'label' => 'Característica',
                        'name' => 'feature',
                        'type' => 'text',
                        'required' => 1,
                    ),
                ),
            ),
            // Social Media Section
            array(
                'key' => 'field_producto_social',
                'label' => 'Redes Sociales',
                'name' => 'social_media',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_producto_social_facebook',
                        'label' => 'Facebook',
                        'name' => 'facebook',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_producto_social_twitter',
                        'label' => 'Twitter',
                        'name' => 'twitter',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_producto_social_linkedin',
                        'label' => 'LinkedIn',
                        'name' => 'linkedin',
                        'type' => 'url',
                    ),
                    array(
                        'key' => 'field_producto_social_instagram',
                        'label' => 'Instagram',
                        'name' => 'instagram',
                        'type' => 'url',
                    ),
                ),
            ),
            // Organization Information
            array(
                'key' => 'field_producto_organization',
                'label' => 'Información de la Organización',
                'name' => 'organization',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_producto_org_name',
                        'label' => 'Nombre de la Organización',
                        'name' => 'name',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_producto_org_logo',
                        'label' => 'Logo de la Organización',
                        'name' => 'logo',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'producto',
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
        'description' => 'Campos personalizados para los productos de Co-Laboratorios',
        'show_in_rest' => true,
    ));

endif;
