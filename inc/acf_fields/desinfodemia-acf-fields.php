<?php
/**
 * ACF Fields for Desinfodemia Page Template
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_desinfodemia',
        'title' => 'Desinfodemia - Configuración',
        'show_in_rest' => true,
        'fields' => array(
            // Section 1: Smooth Scroll Intro (Parallax)
            array(
                'key' => 'field_desinfo_intro',
                'label' => 'Sección Intro (Smooth Scroll Parallax)',
                'name' => 'desinfo_intro',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_intro_bg_image',
                        'label' => 'Imagen de Fondo Central',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => 'Imagen principal que aparecerá en el centro con efecto de zoom',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_intro_parallax_images',
                        'label' => 'Imágenes Parallax (4 imágenes)',
                        'name' => 'parallax_images',
                        'type' => 'repeater',
                        'instructions' => 'Agregar exactamente 4 imágenes que aparecerán con efecto parallax',
                        'layout' => 'block',
                        'min' => 4,
                        'max' => 4,
                        'button_label' => 'Agregar Imagen',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_parallax_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // Section 2: Hero with Video Text
            array(
                'key' => 'field_desinfo_hero',
                'label' => 'Hero con Video en Texto',
                'name' => 'desinfo_hero',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_hero_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => 'Título grande que contendrá el video (ej: "Desinfodemia")',
                        'default_value' => 'Desinfodemia',
                        'maxlength' => 50,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_video',
                        'label' => 'Video MP4',
                        'name' => 'video',
                        'type' => 'file',
                        'instructions' => 'Video en formato MP4 que se reproducirá dentro del texto',
                        'return_format' => 'array',
                        'library' => 'all',
                        'mime_types' => 'mp4,mov',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_hero_bg_image',
                        'label' => 'Imagen de Fondo',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => 'Imagen de fondo para la sección hero',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
            ),

            // Section 3: About/Sinopsis
            array(
                'key' => 'field_desinfo_sinopsis',
                'label' => 'Sinopsis',
                'name' => 'desinfo_sinopsis',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_sinopsis_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => 'Título de la sección de sinopsis',
                        'default_value' => 'Sinopsis',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_sinopsis_content',
                        'label' => 'Contenido',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => 'Contenido de la sinopsis del documental',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_sinopsis_images',
                        'label' => 'Galería de Imágenes (6 imágenes)',
                        'name' => 'images',
                        'type' => 'repeater',
                        'instructions' => 'Agregar 6 imágenes para el grid visual',
                        'layout' => 'block',
                        'min' => 6,
                        'max' => 6,
                        'button_label' => 'Agregar Imagen',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_sinopsis_image',
                                'label' => 'Imagen',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'library' => 'all',
                                'required' => 1,
                            ),
                        ),
                    ),
                ),
            ),

            // Section 4: Ficha Técnica
            array(
                'key' => 'field_desinfo_ficha',
                'label' => 'Ficha Técnica',
                'name' => 'desinfo_ficha',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_ficha_titulo',
                        'label' => 'Título del Proyecto',
                        'name' => 'titulo_proyecto',
                        'type' => 'text',
                        'default_value' => 'Desinfodemia, Democracias en Riesgo',
                    ),
                    array(
                        'key' => 'field_ficha_pais',
                        'label' => 'País de Origen',
                        'name' => 'pais',
                        'type' => 'text',
                        'default_value' => 'Colombia',
                    ),
                    array(
                        'key' => 'field_ficha_duracion',
                        'label' => 'Duración',
                        'name' => 'duracion',
                        'type' => 'text',
                        'default_value' => '60 minutos',
                    ),
                    array(
                        'key' => 'field_ficha_genero',
                        'label' => 'Género',
                        'name' => 'genero',
                        'type' => 'text',
                        'default_value' => 'Documental Educativo',
                    ),
                    array(
                        'key' => 'field_ficha_idioma',
                        'label' => 'Idioma',
                        'name' => 'idioma',
                        'type' => 'text',
                        'default_value' => 'Español',
                    ),
                    array(
                        'key' => 'field_ficha_formato_grabacion',
                        'label' => 'Formato de Grabación',
                        'name' => 'formato_grabacion',
                        'type' => 'text',
                        'default_value' => '2.5 K / 4K',
                    ),
                    array(
                        'key' => 'field_ficha_formato_final',
                        'label' => 'Formato de Finalización',
                        'name' => 'formato_finalizacion',
                        'type' => 'text',
                        'default_value' => 'Full HD / 4K',
                    ),
                    array(
                        'key' => 'field_ficha_color',
                        'label' => 'Color o B/N',
                        'name' => 'color',
                        'type' => 'text',
                        'default_value' => 'Color',
                    ),
                    array(
                        'key' => 'field_ficha_subtitulos',
                        'label' => 'Idioma de Subtítulos',
                        'name' => 'subtitulos',
                        'type' => 'text',
                        'default_value' => 'Español / Inglés',
                    ),
                ),
            ),

            // Section 5: Créditos (Team)
            array(
                'key' => 'field_desinfo_creditos',
                'label' => 'Créditos del Equipo',
                'name' => 'desinfo_creditos',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_creditos_title',
                        'label' => 'Título de la Sección',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Créditos',
                    ),
                    array(
                        'key' => 'field_creditos_equipo',
                        'label' => 'Equipo',
                        'name' => 'equipo',
                        'type' => 'repeater',
                        'instructions' => 'Agregar miembros del equipo',
                        'layout' => 'table',
                        'button_label' => 'Agregar Miembro',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_miembro_nombre',
                                'label' => 'Nombre',
                                'name' => 'nombre',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_miembro_rol',
                                'label' => 'Rol / Cargo',
                                'name' => 'rol',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_miembro_foto',
                                'label' => 'Foto',
                                'name' => 'foto',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                            ),
                        ),
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

add_action('acf/init', 'digitalia_register_desinfodemia_acf_fields');

function digitalia_register_desinfodemia_acf_fields() {
    // The field group is already registered above
}
