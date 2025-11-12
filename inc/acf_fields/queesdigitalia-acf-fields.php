<?php
/**
 * Register ACF Fields for Que es Digitalia page
 */

if (!function_exists('digitalia_register_queesdigitalia_acf_fields')) {
    function digitalia_register_queesdigitalia_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_queesdigitalia',
                'title' => 'Qué es Digitalia - Contenido',
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_qd_header',
                        'label' => 'Encabezado',
                        'name' => 'qd_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Qué es Digitalia',
                            ),
                            array(
                                'key' => 'field_qd_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Conoce más sobre nuestra plataforma digital y su propósito.',
                            ),
                        ),
                    ),

                    // Hero Section
                    array(
                        'key' => 'field_qd_hero',
                        'label' => 'Sección Principal',
                        'name' => 'qd_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_hero_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Educomunicación para la paz',
                            ),
                            array(
                                'key' => 'field_qd_hero_description',
                                'label' => 'Descripción Principal',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Digital-IA es un programa nacional de alfabetización mediática e informacional que empodera a la ciudadanía en la era digital, promoviendo la paz y la democracia a través de la educación.',
                            ),
                            array(
                                'key' => 'field_qd_hero_image',
                                'label' => 'Imagen Principal',
                                'name' => 'image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                                'instructions' => 'Tamaño recomendado: 800x600px',
                            ),
                            array(
                                'key' => 'field_qd_mission_label',
                                'label' => 'Etiqueta Misión',
                                'name' => 'mission_label',
                                'type' => 'text',
                                'default_value' => 'NUESTRA MISIÓN',
                            ),
                            array(
                                'key' => 'field_qd_mission_text',
                                'label' => 'Texto Misión',
                                'name' => 'mission_text',
                                'type' => 'textarea',
                                'default_value' => 'Buscamos democratizar el conocimiento digital y mediático, empoderando a la ciudadanía para enfrentar los desafíos de las tecnologías emergentes, promoviendo una comunicación ética y constructiva en favor de la paz.',
                            ),
                        ),
                    ),

                    // Transformation Section
                    array(
                        'key' => 'field_qd_transformation',
                        'label' => 'Sección Transformación',
                        'name' => 'qd_transformation',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_transform_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Transformando la alfabetización digital en Colombia',
                            ),
                            array(
                                'key' => 'field_qd_transform_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'A través de tres módulos interconectados, construimos un futuro digital más inclusivo y consciente.',
                            ),
                        ),
                    ),

                    // Modules Section
                    array(
                        'key' => 'field_qd_modules',
                        'label' => 'Módulos',
                        'name' => 'qd_modules',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            // Module 1
                            array(
                                'key' => 'field_qd_module1',
                                'label' => 'Módulo 1',
                                'name' => 'module1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_qd_module1_icon',
                                        'label' => 'Ícono (Font Awesome)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'fa-graduation-cap',
                                        'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-graduation-cap)',
                                    ),
                                    array(
                                        'key' => 'field_qd_module1_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'AcadeMÍA Digital-IA',
                                    ),
                                    array(
                                        'key' => 'field_qd_module1_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Plataforma E-learning de autoformación en nuevos paradigmas tecnológicos con enfoque de paz mediática, derechos y deberes ciudadanos.',
                                    ),
                                ),
                            ),
                            // Module 2
                            array(
                                'key' => 'field_qd_module2',
                                'label' => 'Módulo 2',
                                'name' => 'module2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_qd_module2_icon',
                                        'label' => 'Ícono (Font Awesome)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'fa-video',
                                        'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-video)',
                                    ),
                                    array(
                                        'key' => 'field_qd_module2_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Serie Web "En Línea"',
                                    ),
                                    array(
                                        'key' => 'field_qd_module2_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Difusión de acciones ciudadanas, públicas, privadas y asociativas afirmativas de paz en Colombia a través de contenido audiovisual.',
                                    ),
                                ),
                            ),
                            // Module 3
                            array(
                                'key' => 'field_qd_module3',
                                'label' => 'Módulo 3',
                                'name' => 'module3',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_qd_module3_icon',
                                        'label' => 'Ícono (Font Awesome)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'fa-network-wired',
                                        'instructions' => 'Ingrese el nombre del ícono de Font Awesome (ej: fa-network-wired)',
                                    ),
                                    array(
                                        'key' => 'field_qd_module3_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Estrategia Transmedia',
                                    ),
                                    array(
                                        'key' => 'field_qd_module3_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Expansión del mensaje Digital-IA a través de múltiples plataformas, generando sinergias entre ciudadanía y el sistema Digitalia.',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // Commitment Section
                    array(
                        'key' => 'field_qd_commitment',
                        'label' => 'Sección Compromiso',
                        'name' => 'qd_commitment',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_commitment_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'NUESTRO COMPROMISO',
                            ),
                            array(
                                'key' => 'field_qd_commitment_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Construyendo una ciudadanía digital consciente',
                            ),
                            array(
                                'key' => 'field_qd_commitment_media',
                                'label' => 'Contenido Multimedia',
                                'name' => 'media',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_qd_commitment_media_type',
                                        'label' => 'Tipo de Contenido',
                                        'name' => 'type',
                                        'type' => 'select',
                                        'choices' => array(
                                            'image' => 'Imagen',
                                            'video' => 'Video',
                                        ),
                                        'default_value' => 'image',
                                        'return_format' => 'value',
                                    ),
                                    array(
                                        'key' => 'field_qd_commitment_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                        'instructions' => 'Imagen para la sección de compromiso',
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_qd_commitment_media_type',
                                                    'operator' => '==',
                                                    'value' => 'image',
                                                ),
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_qd_commitment_video',
                                        'label' => 'Video',
                                        'name' => 'video',
                                        'type' => 'file',
                                        'return_format' => 'array',
                                        'mime_types' => 'mp4,webm,ogg',
                                        'instructions' => 'Video para la sección de compromiso (formatos: mp4, webm, ogg)',
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_qd_commitment_media_type',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                ),
                                            ),
                                        ),
                                    ),
                                    array(
                                        'key' => 'field_qd_commitment_video_url',
                                        'label' => 'URL de Video (Alternativa)',
                                        'name' => 'video_url',
                                        'type' => 'url',
                                        'instructions' => 'URL de video de YouTube o Vimeo (alternativa a subir un archivo)',
                                        'conditional_logic' => array(
                                            array(
                                                array(
                                                    'field' => 'field_qd_commitment_media_type',
                                                    'operator' => '==',
                                                    'value' => 'video',
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_qd_commitment_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'En la era de la cuarta y quinta revolución industrial, cada ciudadano es un medio de comunicación. Trabajamos para empoderar a la ciudadanía con las herramientas y conocimientos necesarios para una comunicación ética y responsable.',
                            ),
                        ),
                    ),

                    // Team Section
                    array(
                        'key' => 'field_qd_team',
                        'label' => 'Sección Equipo',
                        'name' => 'qd_team',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_team_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'Nuestro equipo',
                            ),
                            array(
                                'key' => 'field_qd_team_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Conoce al equipo',
                            ),
                            array(
                                'key' => 'field_qd_team_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Somos un equipo multidisciplinario comprometido con la educomunicación y la transformación digital.',
                            ),
                        ),
                    ),

                    // Blog Section
                    array(
                        'key' => 'field_qd_blog',
                        'label' => 'Sección Blog',
                        'name' => 'qd_blog',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_qd_blog_label',
                                'label' => 'Etiqueta',
                                'name' => 'label',
                                'type' => 'text',
                                'default_value' => 'Blog y Noticias',
                            ),
                            array(
                                'key' => 'field_qd_blog_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Últimas publicaciones',
                            ),
                            array(
                                'key' => 'field_qd_blog_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Mantente al día con las últimas noticias y artículos sobre educomunicación, alfabetización mediática y transformación digital.',
                            ),
                            array(
                                'key' => 'field_qd_blog_button',
                                'label' => 'Botón',
                                'name' => 'button',
                                'type' => 'link',
                                'return_format' => 'array',
                                'instructions' => 'Configure el enlace del botón',
                            ),
                            array(
                                'key' => 'field_qd_blog_button_text',
                                'label' => 'Texto del Botón',
                                'name' => 'button_text',
                                'type' => 'text',
                                'default_value' => 'Leer más entradas del blog',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/que-es-digitalia.php',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_queesdigitalia_acf_fields');
