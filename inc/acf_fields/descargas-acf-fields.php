<?php
/**
 * ACF Fields for Descargas (Downloads) post type
 */

function digitalia_register_descargas_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_descargas',
            'title' => 'Información del Archivo',
                'show_in_rest' => true,
            'fields' => array(
                array(
                    'key' => 'field_descarga_file_type',
                    'label' => 'Tipo de Archivo',
                    'name' => 'tipo_archivo',
                    'type' => 'radio',
                    'required' => 1,
                    'choices' => array(
                        'internal' => 'Archivo Interno',
                        'external' => 'URL Externa',
                    ),
                    'default_value' => 'internal',
                ),
                array(
                    'key' => 'field_descarga_file',
                    'label' => 'Archivo',
                    'name' => 'archivo',
                    'type' => 'file',
                    'required' => 1,
                    'return_format' => 'array',
                    'library' => 'all',
                    'mime_types' => 'pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'internal',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_descarga_url',
                    'label' => 'URL Externa',
                    'name' => 'url_externa',
                    'type' => 'url',
                    'required' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'external',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_descarga_formato_manual',
                    'label' => 'Formato del Archivo',
                    'name' => 'formato_archivo_manual',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'pdf' => 'PDF',
                        'doc' => 'DOC',
                        'docx' => 'DOCX',
                        'xls' => 'XLS',
                        'xlsx' => 'XLSX',
                        'ppt' => 'PPT',
                        'pptx' => 'PPTX',
                        'zip' => 'ZIP',
                        'rar' => 'RAR',
                        'otro' => 'Otro',
                    ),
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'external',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_descarga_tamano_manual',
                    'label' => 'Tamaño del Archivo (en MB)',
                    'name' => 'tamano_archivo_manual',
                    'type' => 'number',
                    'required' => 1,
                    'min' => 0.01,
                    'step' => 0.01,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'external',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_descarga_version',
                    'label' => 'Versión',
                    'name' => 'version',
                    'type' => 'text',
                    'required' => 1,
                    'default_value' => '1.0',
                ),
                array(
                    'key' => 'field_descarga_author',
                    'label' => 'Autor',
                    'name' => 'autor',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_descarga_publication_year',
                    'label' => 'Año de Publicación',
                    'name' => 'ano_publicacion',
                    'type' => 'number',
                    'required' => 1,
                    'min' => 1900,
                    'max' => date('Y'),
                    'default_value' => date('Y'),
                ),
                array(
                    'key' => 'field_descarga_language',
                    'label' => 'Idioma',
                    'name' => 'idioma',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'es' => 'Español',
                        'en' => 'Inglés',
                        'pt' => 'Portugués',
                        'fr' => 'Francés',
                    ),
                    'default_value' => 'es',
                ),
                array(
                    'key' => 'field_descarga_pages',
                    'label' => 'Número de Páginas',
                    'name' => 'numero_paginas',
                    'type' => 'number',
                    'required' => 0,
                    'min' => 1,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'internal',
                            ),
                            array(
                                'field' => 'field_descarga_file',
                                'operator' => 'MATCHES',
                                'value' => '.(pdf|doc|docx|ppt|pptx)$',
                            ),
                        ),
                        array(
                            array(
                                'field' => 'field_descarga_file_type',
                                'operator' => '==',
                                'value' => 'external',
                            ),
                            array(
                                'field' => 'field_descarga_formato_manual',
                                'operator' => 'IN',
                                'value' => array('pdf', 'doc', 'docx', 'ppt', 'pptx'),
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_descarga_license',
                    'label' => 'Licencia',
                    'name' => 'licencia',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'cc-by' => 'Creative Commons BY',
                        'cc-by-sa' => 'Creative Commons BY-SA',
                        'cc-by-nc' => 'Creative Commons BY-NC',
                        'cc-by-nc-sa' => 'Creative Commons BY-NC-SA',
                        'cc-by-nd' => 'Creative Commons BY-ND',
                        'cc-by-nc-nd' => 'Creative Commons BY-NC-ND',
                        'copyright' => 'Todos los derechos reservados',
                    ),
                    'default_value' => 'cc-by-nc-sa',
                ),
                array(
                    'key' => 'field_descarga_downloads',
                    'label' => 'Número de Descargas',
                    'name' => 'numero_descargas',
                    'type' => 'number',
                    'required' => 0,
                    'default_value' => 0,
                    'readonly' => 1,
                ),
                array(
                    'key' => 'field_descarga_last_update',
                    'label' => 'Última Actualización',
                    'name' => 'ultima_actualizacion',
                    'type' => 'date_time_picker',
                    'required' => 1,
                    'display_format' => 'd/m/Y H:i:s',
                    'return_format' => 'd/m/Y H:i:s',
                    'first_day' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'descarga',
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
            'description' => 'Campos personalizados para el tipo de contenido Descargas',
        ));
    }
}
add_action('acf/init', 'digitalia_register_descargas_acf_fields');
