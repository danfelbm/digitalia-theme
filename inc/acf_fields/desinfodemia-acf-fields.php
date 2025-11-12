<?php
/**
 * ACF Fields for Desinfodemia Page Template
 *
 * @package Digitalia
 */

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_desinfodemia',
        'title' => 'Desinfodemia - Configuración',
        'fields' => array(
            // Hero Section
            array(
                'key' => 'field_hero_desinfodemia',
                'label' => 'Hero con Video',
                'name' => 'hero_desinfodemia',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_bg_image',
                        'label' => 'Imagen de Fondo',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => 'Imagen de fondo para el hero (también se usa como poster del video)',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_hero_video',
                        'label' => 'Archivo de Video MP4',
                        'name' => 'video_file',
                        'type' => 'file',
                        'instructions' => 'Subir archivo de video en formato MP4',
                        'return_format' => 'array',
                        'library' => 'all',
                        'mime_types' => 'mp4,mov',
                    ),
                ),
            ),

            // Gallery Section
            array(
                'key' => 'field_gallery_desinfodemia',
                'label' => 'Galería de Imágenes',
                'name' => 'gallery_desinfodemia',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_gallery_images',
                        'label' => 'Imágenes',
                        'name' => 'images',
                        'type' => 'gallery',
                        'instructions' => 'Subir hasta 5 imágenes. La primera imagen será más grande en el grid.',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min' => 1,
                        'max' => 5,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/subpage-templates/en-linea/desinfodemia.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}
