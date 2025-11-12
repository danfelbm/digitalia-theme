<?php
/**
 * ACF Fields for Social Media Kit Page
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_social_media_kit_acf_fields')) {
    function digitalia_register_social_media_kit_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_social_media_kit_page',
                'title' => 'Contenido de Social Media Kit',
                'show_in_rest' => true,
                'fields' => array(
                    // Page Header Section
                    array(
                        'key' => 'field_social_media_kit_header',
                        'label' => 'Encabezado de Página',
                        'name' => 'page_header',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_header_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Social Media Kit',
                            ),
                            array(
                                'key' => 'field_header_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Colección de archivos para uso en redes sociales',
                            ),
                            array(
                                'key' => 'field_header_show_cta',
                                'label' => 'Mostrar CTA',
                                'name' => 'show_cta',
                                'type' => 'true_false',
                                'default_value' => 1,
                                'ui' => 1,
                            ),
                            array(
                                'key' => 'field_header_cta_text',
                                'label' => 'Texto del CTA',
                                'name' => 'cta_text',
                                'type' => 'text',
                                'default_value' => 'Descargar',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_header_show_cta',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_header_cta_url',
                                'label' => 'URL del CTA',
                                'name' => 'cta_url',
                                'type' => 'text',
                                'default_value' => '#',
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_header_show_cta',
                                            'operator' => '==',
                                            'value' => '1',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Resources Section
                    array(
                        'key' => 'field_resources_section',
                        'label' => 'Sección de Recursos',
                        'name' => 'resources_section',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_resources_title',
                                'label' => 'Título de la Sección',
                                'name' => 'section_title',
                                'type' => 'text',
                                'default_value' => 'Kit de Herramientas para Redes Sociales',
                            ),
                            // Brand Resources Card
                            array(
                                'key' => 'field_brand_resources',
                                'label' => 'Recursos de Marca',
                                'name' => 'brand_resources',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_brand_badge',
                                        'label' => 'Badge',
                                        'name' => 'badge',
                                        'type' => 'text',
                                        'default_value' => 'MARCA DIGITALIA',
                                    ),
                                    array(
                                        'key' => 'field_brand_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Recursos de marca Digitalia',
                                    ),
                                    array(
                                        'key' => 'field_brand_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_brand_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'rows' => 4,
                                        'default_value' => 'Descarga los recursos oficiales de la marca Digitalia, incluyendo logotipos, paleta de colores y guías de estilo para mantener una identidad visual consistente en tus comunicaciones.',
                                    ),
                                    array(
                                        'key' => 'field_brand_cta',
                                        'label' => 'Botón CTA',
                                        'name' => 'cta',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_brand_cta_text',
                                                'label' => 'Texto del botón',
                                                'name' => 'text',
                                                'type' => 'text',
                                                'default_value' => 'Descargar recursos',
                                            ),
                                            array(
                                                'key' => 'field_brand_cta_url',
                                                'label' => 'URL del botón',
                                                'name' => 'url',
                                                'type' => 'url',
                                                'default_value' => '#',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            // Social Templates Card
                            array(
                                'key' => 'field_social_templates',
                                'label' => 'Plantillas Sociales',
                                'name' => 'social_templates',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_social_badge',
                                        'label' => 'Badge',
                                        'name' => 'badge',
                                        'type' => 'text',
                                        'default_value' => 'KIT DE REDES SOCIALES',
                                    ),
                                    array(
                                        'key' => 'field_social_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Plantillas para Redes Sociales',
                                    ),
                                    array(
                                        'key' => 'field_social_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                    ),
                                    array(
                                        'key' => 'field_social_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'rows' => 4,
                                        'default_value' => 'Accede a nuestro kit completo de plantillas y recursos para crear contenido atractivo en redes sociales alineado con la misión educomunicativa y de alfabetización mediática de Digitalia.',
                                    ),
                                    array(
                                        'key' => 'field_social_cta',
                                        'label' => 'Botón CTA',
                                        'name' => 'cta',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_social_cta_text',
                                                'label' => 'Texto del botón',
                                                'name' => 'text',
                                                'type' => 'text',
                                                'default_value' => 'Acceder al kit',
                                            ),
                                            array(
                                                'key' => 'field_social_cta_url',
                                                'label' => 'URL del botón',
                                                'name' => 'url',
                                                'type' => 'url',
                                                'default_value' => '#',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Social Media Links Section
                    array(
                        'key' => 'field_social_media_links',
                        'label' => 'Enlaces de Redes Sociales',
                        'name' => 'social_media_links',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_social_media_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Conéctate con Digitalia en todas las redes',
                            ),
                            array(
                                'key' => 'field_social_media_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'text',
                                'default_value' => 'Síguenos en nuestras redes sociales para mantenerte actualizado sobre educación digital y alfabetización mediática.',
                            ),
                            // Instagram
                            array(
                                'key' => 'field_instagram',
                                'label' => 'Instagram',
                                'name' => 'instagram',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_instagram_active',
                                        'label' => 'Mostrar Instagram',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_instagram_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/49vhs86'
                                    ),
                                    array(
                                        'key' => 'field_instagram_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Contenido visual e historias de Digitalia'
                                    )
                                )
                            ),
                            // Facebook
                            array(
                                'key' => 'field_facebook',
                                'label' => 'Facebook',
                                'name' => 'facebook',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_facebook_active',
                                        'label' => 'Mostrar Facebook',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_facebook_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/3BldRwD'
                                    ),
                                    array(
                                        'key' => 'field_facebook_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Noticias y actualizaciones diarias'
                                    )
                                )
                            ),
                            // X (Twitter)
                            array(
                                'key' => 'field_twitter',
                                'label' => 'X (Twitter)',
                                'name' => 'twitter',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_twitter_active',
                                        'label' => 'Mostrar X',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_twitter_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://x.com/Digitalia_Col'
                                    ),
                                    array(
                                        'key' => 'field_twitter_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Últimas noticias y tendencias'
                                    )
                                )
                            ),
                            // LinkedIn
                            array(
                                'key' => 'field_linkedin',
                                'label' => 'LinkedIn',
                                'name' => 'linkedin',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_linkedin_active',
                                        'label' => 'Mostrar LinkedIn',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_linkedin_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/3ZL9Z1u'
                                    ),
                                    array(
                                        'key' => 'field_linkedin_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Contenido profesional y networking'
                                    )
                                )
                            ),
                            // YouTube
                            array(
                                'key' => 'field_youtube',
                                'label' => 'YouTube',
                                'name' => 'youtube',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_youtube_active',
                                        'label' => 'Mostrar YouTube',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_youtube_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://shorturl.at/Q7IwB'
                                    ),
                                    array(
                                        'key' => 'field_youtube_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Videos educativos y tutoriales'
                                    )
                                )
                            ),
                            // TikTok
                            array(
                                'key' => 'field_tiktok',
                                'label' => 'TikTok',
                                'name' => 'tiktok',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_tiktok_active',
                                        'label' => 'Mostrar TikTok',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_tiktok_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/4gnZOFh'
                                    ),
                                    array(
                                        'key' => 'field_tiktok_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Contenido corto y dinámico'
                                    )
                                )
                            ),
                            // Spotify
                            array(
                                'key' => 'field_spotify',
                                'label' => 'Spotify',
                                'name' => 'spotify',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_spotify_active',
                                        'label' => 'Mostrar Spotify',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_spotify_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/4fXB1bo'
                                    ),
                                    array(
                                        'key' => 'field_spotify_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Podcasts y contenido de audio'
                                    )
                                )
                            ),
                            // Flickr
                            array(
                                'key' => 'field_flickr',
                                'label' => 'Flickr',
                                'name' => 'flickr',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_flickr_active',
                                        'label' => 'Mostrar Flickr',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_flickr_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/3D2Eebj'
                                    ),
                                    array(
                                        'key' => 'field_flickr_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Galería de imágenes y fotografías'
                                    )
                                )
                            ),
                            // Pinterest
                            array(
                                'key' => 'field_pinterest',
                                'label' => 'Pinterest',
                                'name' => 'pinterest',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_pinterest_active',
                                        'label' => 'Mostrar Pinterest',
                                        'name' => 'active',
                                        'type' => 'true_false',
                                        'default_value' => 1,
                                        'ui' => 1
                                    ),
                                    array(
                                        'key' => 'field_pinterest_url',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'type' => 'url',
                                        'default_value' => 'https://bit.ly/3ZDJKd3'
                                    ),
                                    array(
                                        'key' => 'field_pinterest_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'text',
                                        'default_value' => 'Inspiración visual y recursos gráficos'
                                    )
                                )
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'page-templates/subpage-templates/social-media-kit.php',
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
                'show_in_rest' => 0,
            ));
        }
    }
}

add_action('acf/init', 'digitalia_register_social_media_kit_acf_fields');
