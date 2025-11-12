<?php
/**
 * Register ACF Fields for En Línea page template
 */

if (!function_exists('digitalia_register_enlinea_acf_fields')) {
    function digitalia_register_enlinea_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_enlinea_page',
                'title' => 'Configuración En Línea',
                'show_in_rest' => true,
                'fields' => array(
                    // Header Section
                    array(
                        'key' => 'field_enlinea_header',
                        'label' => 'Hero',
                        'name' => 'enlinea_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_enlinea_header_video_button',
                                'label' => 'Botón de Video',
                                'name' => 'video_button',
                                'type' => 'true_false',
                                'ui' => true,
                                'default_value' => true,
                                'instructions' => 'Mostrar botón de reproducción de video'
                            ),
                            array(
                                'key' => 'field_enlinea_header_video_url',
                                'label' => 'URL del Video',
                                'name' => 'video_url',
                                'type' => 'url',
                                'default_value' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                                'instructions' => 'URL del video de YouTube (formato embed)',
                            ),
                            array(
                                'key' => 'field_enlinea_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Serie En Línea',
                            ),
                            array(
                                'key' => 'field_enlinea_header_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'rows' => 3,
                                'default_value' => 'Serie web intergeneracional que amplía y fortalece nuestra perspectiva crítica ante los nuevos desafíos de las tecnologías y el consumo informativo.',
                            ),
                            array(
                                'key' => 'field_enlinea_header_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_enlinea_header_cta_text',
                                        'label' => 'Texto del botón',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Ver Episodios',
                                    ),
                                    array(
                                        'key' => 'field_enlinea_header_cta_url',
                                        'label' => 'URL del botón',
                                        'name' => 'url',
                                        'type' => 'text',
                                        'default_value' => '#ver-episodios',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_enlinea_header_support_text',
                                'label' => 'Texto de apoyo',
                                'name' => 'support_text',
                                'type' => 'text',
                                'default_value' => 'Con el apoyo de Canal 13',
                            ),
                            array(
                                'key' => 'field_enlinea_hero_image',
                                'label' => 'Hero Image',
                                'name' => 'hero_image',
                                'type' => 'image',
                                'return_format' => 'array',
                            ),
                            array(
                                'key' => 'field_enlinea_hero_video',
                                'label' => 'Hero Video',
                                'name' => 'hero_video',
                                'type' => 'file',
                                'return_format' => 'array',
                                'mime_types' => 'mp4',
                                'instructions' => 'Upload an MP4 video file for the hero section background.',
                            ),
                        ),
                    ),

                    // Floating Navigation - Simple Version
                    array(
                        'key' => 'field_enlinea_nav',
                        'label' => 'Menú de Navegación',
                        'name' => 'enlinea_nav',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_nav_item1_text',
                                'label' => 'Texto Item 1',
                                'name' => 'item1_text',
                                'type' => 'text',
                                'default_value' => 'La Historia',
                            ),
                            array(
                                'key' => 'field_nav_item2_text',
                                'label' => 'Texto Item 2',
                                'name' => 'item2_text',
                                'type' => 'text',
                                'default_value' => 'Ver Episodios',
                            ),
                            array(
                                'key' => 'field_nav_item3_text',
                                'label' => 'Texto Item 3',
                                'name' => 'item3_text',
                                'type' => 'text',
                                'default_value' => 'Personajes',
                            ),
                            array(
                                'key' => 'field_nav_item4_text',
                                'label' => 'Texto Item 4',
                                'name' => 'item4_text',
                                'type' => 'text',
                                'default_value' => 'Blog',
                            ),
                        ),
                    ),

                    // Main Content Section
                    array(
                        'key' => 'field_enlinea_main_content',
                        'label' => 'Contenido Principal',
                        'name' => 'enlinea_main_content',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_enlinea_main_title',
                                'label' => 'Título Principal',
                                'name' => 'main_title',
                                'type' => 'text',
                                'default_value' => 'Serie Web y Alfabetización Mediática',
                            ),
                            array(
                                'key' => 'field_enlinea_main_description',
                                'label' => 'Descripción',
                                'name' => 'main_description',
                                'type' => 'textarea',
                                'default_value' => 'Explorando historias de innovación y cambio social a través del Gobierno del Cambio, las tecnologías y la paz mediática en Colombia.',
                            ),
                            array(
                                'key' => 'field_enlinea_main_image',
                                'label' => 'Imagen Principal',
                                'name' => 'main_image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                            ),
                            array(
                                'key' => 'field_enlinea_cta_button',
                                'label' => 'Botón CTA',
                                'name' => 'cta_button',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Ver Episodios',
                                    'url' => '#ver-episodios',
                                ),
                            ),
                        ),
                    ),

                    // Stats Section
                    array(
                        'key' => 'field_enlinea_stats',
                        'label' => 'Estadísticas',
                        'name' => 'enlinea_stats',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_enlinea_stat_1',
                                'label' => 'Estadística 1',
                                'name' => 'stat_1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_stat_1_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '32+',
                                    ),
                                    array(
                                        'key' => 'field_stat_1_label',
                                        'label' => 'Etiqueta',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'default_value' => 'Departamentos alcanzados',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_enlinea_stat_2',
                                'label' => 'Estadística 2',
                                'name' => 'stat_2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_stat_2_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '1000+',
                                    ),
                                    array(
                                        'key' => 'field_stat_2_label',
                                        'label' => 'Etiqueta',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'default_value' => 'Historias documentadas',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_enlinea_stat_3',
                                'label' => 'Estadística 3',
                                'name' => 'stat_3',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_stat_3_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '12',
                                    ),
                                    array(
                                        'key' => 'field_stat_3_label',
                                        'label' => 'Etiqueta',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'default_value' => 'Episodios producidos',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_enlinea_stat_4',
                                'label' => 'Estadística 4',
                                'name' => 'stat_4',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_stat_4_number',
                                        'label' => 'Número',
                                        'name' => 'number',
                                        'type' => 'text',
                                        'default_value' => '>50k',
                                    ),
                                    array(
                                        'key' => 'field_stat_4_label',
                                        'label' => 'Etiqueta',
                                        'name' => 'label',
                                        'type' => 'text',
                                        'default_value' => 'Espectadores alcanzados',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // Team Members
                    array(
                        'key' => 'field_enlinea_team',
                        'label' => 'Equipo',
                        'name' => 'enlinea_team',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_team_member_1',
                                'label' => 'Miembro 1',
                                'name' => 'member_1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_member_1_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'thumbnail',
                                    ),
                                    array(
                                        'key' => 'field_member_1_name',
                                        'label' => 'Nombre',
                                        'name' => 'name',
                                        'type' => 'text',
                                        'default_value' => 'María González',
                                    ),
                                    array(
                                        'key' => 'field_member_1_position',
                                        'label' => 'Cargo',
                                        'name' => 'position',
                                        'type' => 'text',
                                        'default_value' => 'Directora de Proyecto',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_team_member_2',
                                'label' => 'Miembro 2',
                                'name' => 'member_2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_member_2_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'thumbnail',
                                    ),
                                    array(
                                        'key' => 'field_member_2_name',
                                        'label' => 'Nombre',
                                        'name' => 'name',
                                        'type' => 'text',
                                        'default_value' => 'Carlos Ramírez',
                                    ),
                                    array(
                                        'key' => 'field_member_2_position',
                                        'label' => 'Cargo',
                                        'name' => 'position',
                                        'type' => 'text',
                                        'default_value' => 'Director Creativo',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // La Historia Section
                    array(
                        'key' => 'field_enlinea_historia',
                        'label' => 'La Historia',
                        'name' => 'enlinea_historia',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_historia_background',
                                'label' => 'Imagen de Fondo',
                                'name' => 'background_image',
                                'type' => 'image',
                                'return_format' => 'array',
                                'preview_size' => 'medium',
                            ),
                            array(
                                'key' => 'field_historia_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'La Historia',
                            ),
                            array(
                                'key' => 'field_historia_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Una Serie Web que Transforma Vidas',
                            ),
                            array(
                                'key' => 'field_historia_column_1',
                                'label' => 'Columna 1',
                                'name' => 'column_1',
                                'type' => 'textarea',
                                'default_value' => '"En Línea" es una serie web de 20 episodios que sigue las vidas entrelazadas de jóvenes colombianos mientras navegan por los desafíos de la era digital. A través de historias profundamente humanas, exploramos cómo la transformación digital está cambiando la forma en que nos relacionamos, aprendemos y vivimos.\n\nLa serie recorre diversos rincones de Colombia, desde las calles de Bogotá hasta las comunidades rurales, mostrando cómo la alfabetización mediática se convierte en una herramienta de empoderamiento y cambio social.',
                            ),
                            array(
                                'key' => 'field_historia_column_2',
                                'label' => 'Columna 2',
                                'name' => 'column_2',
                                'type' => 'textarea',
                                'default_value' => 'Cada episodio de 15 minutos teje una narrativa cautivadora donde nuestros personajes enfrentan dilemas éticos, descubren el poder de la información y aprenden a navegar en un mundo cada vez más conectado, mientras forjan amistades y relaciones que trascienden las pantallas.\n\nUna historia que combina drama, educación y esperanza, mostrando cómo la alfabetización mediática puede transformar vidas y comunidades enteras en la era de la información digital.',
                            ),
                            array(
                                'key' => 'field_historia_cta_primary',
                                'label' => 'Botón Principal',
                                'name' => 'cta_primary',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Conoce Más',
                                    'url' => '#',
                                ),
                            ),
                            array(
                                'key' => 'field_historia_cta_secondary',
                                'label' => 'Botón Secundario',
                                'name' => 'cta_secondary',
                                'type' => 'link',
                                'default_value' => array(
                                    'title' => 'Contáctanos',
                                    'url' => '#',
                                ),
                            ),
                        ),
                    ),

                    // Screenshots Grid Section
                    array(
                        'key' => 'field_enlinea_screenshots',
                        'label' => 'Galería de Imágenes',
                        'name' => 'enlinea_screenshots',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_screenshots_column_1',
                                'label' => 'Columna 1',
                                'name' => 'column_1',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_screenshot_1_1',
                                        'label' => 'Imagen 1',
                                        'name' => 'image_1',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_screenshot_1_2',
                                        'label' => 'Imagen 2',
                                        'name' => 'image_2',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_screenshots_column_2',
                                'label' => 'Columna 2',
                                'name' => 'column_2',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_screenshot_2_1',
                                        'label' => 'Imagen 1',
                                        'name' => 'image_1',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_screenshot_2_2',
                                        'label' => 'Imagen 2',
                                        'name' => 'image_2',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_screenshots_column_3',
                                'label' => 'Columna 3',
                                'name' => 'column_3',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_screenshot_3_1',
                                        'label' => 'Imagen 1',
                                        'name' => 'image_1',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_screenshot_3_2',
                                        'label' => 'Imagen 2',
                                        'name' => 'image_2',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                ),
                            ),
                        ),
                    ),

                    // Episodes Section Header
                    array(
                        'key' => 'field_enlinea_episodes_header',
                        'label' => 'Encabezado de Episodios',
                        'name' => 'enlinea_episodes_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_episodes_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Episodios',
                            ),
                            array(
                                'key' => 'field_episodes_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Ya han salido dos temporadas con 20 episodios en total, que abordan la alfabetización mediática de una forma innovadora y emocionante. A través de la ficción, exploramos los desafíos del mundo real y cómo la transformación digital está cambiando la forma en que nos relacionamos, aprendemos y vivimos.',
                            ),
                        ),
                    ),

                    // Characters Section Header
                    array(
                        'key' => 'field_enlinea_characters_header',
                        'label' => 'Encabezado de Personajes',
                        'name' => 'enlinea_characters_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_characters_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Personajes',
                            ),
                            array(
                                'key' => 'field_characters_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Conoce a los personajes que dan vida a esta historia.',
                            ),
                        ),
                    ),

                    // Blog Section Header
                    array(
                        'key' => 'field_enlinea_blog_header',
                        'label' => 'Encabezado del Blog',
                        'name' => 'enlinea_blog_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_blog_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Nuestros Blogs',
                            ),
                            array(
                                'key' => 'field_blog_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Educación Digital para la Paz Mediática',
                            ),
                            array(
                                'key' => 'field_blog_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Explora nuestro blog para conocer artículos sobre alfabetización mediática, inteligencia artificial y transformación digital para la paz en Colombia.',
                            ),
                        ),
                    ),

                    // CTA Section
                    array(
                        'key' => 'field_enlinea_bottom_cta',
                        'label' => 'CTA Final',
                        'name' => 'enlinea_bottom_cta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_cta_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Únete a Academia',
                            ),
                            array(
                                'key' => 'field_cta_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Descubre una nueva forma de aprender y desarrollarte profesionalmente. Accede a todos nuestros módulos y contenido exclusivo.',
                            ),
                            array(
                                'key' => 'field_cta_primary_text',
                                'label' => 'Texto CTA Principal',
                                'name' => 'cta_primary_text',
                                'type' => 'text',
                                'default_value' => 'Comenzar ahora',
                            ),
                            array(
                                'key' => 'field_cta_primary_url',
                                'label' => 'URL CTA Principal',
                                'name' => 'cta_primary_url',
                                'type' => 'text',
                                'default_value' => '/registro',
                            ),
                            array(
                                'key' => 'field_cta_secondary_text',
                                'label' => 'Texto CTA Secundario',
                                'name' => 'cta_secondary_text',
                                'type' => 'text',
                                'default_value' => 'Contactar con ventas',
                            ),
                            array(
                                'key' => 'field_cta_secondary_url',
                                'label' => 'URL CTA Secundario',
                                'name' => 'cta_secondary_url',
                                'type' => 'text',
                                'default_value' => '/contacto',
                            ),
                            array(
                                'key' => 'field_doc_title',
                                'label' => 'Título del Documento',
                                'name' => 'doc_title',
                                'type' => 'text',
                                'default_value' => 'Planes y precios',
                            ),
                            array(
                                'key' => 'field_doc_description',
                                'label' => 'Descripción del Documento',
                                'name' => 'doc_description',
                                'type' => 'text',
                                'default_value' => 'Conoce nuestros planes y encuentra el que mejor se adapte a ti.',
                            ),
                            array(
                                'key' => 'field_doc_url',
                                'label' => 'URL del Documento',
                                'name' => 'doc_url',
                                'type' => 'text',
                                'default_value' => '/planes',
                            ),
                            array(
                                'key' => 'field_guide_title',
                                'label' => 'Título de la Guía',
                                'name' => 'guide_title',
                                'type' => 'text',
                                'default_value' => 'Primeros pasos',
                            ),
                            array(
                                'key' => 'field_guide_description',
                                'label' => 'Descripción de la Guía',
                                'name' => 'guide_description',
                                'type' => 'text',
                                'default_value' => 'Guía completa para comenzar tu viaje en Academia.',
                            ),
                            array(
                                'key' => 'field_guide_url',
                                'label' => 'URL de la Guía',
                                'name' => 'guide_url',
                                'type' => 'text',
                                'default_value' => '/guia',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/subpage-templates/en-linea.php',
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

add_action('acf/init', 'digitalia_register_enlinea_acf_fields');
