<?php

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_tt_blog_section',
        'title' => 'Total Transmedia - Blog Section',
                'show_in_rest' => true,
                'show_in_rest' => true,
        'fields' => array(
            array(
                'key' => 'field_tt_blog_title',
                'label' => 'Título del Blog',
                'name' => 'tt_blog_title',
                'type' => 'text',
                'instructions' => 'Ingresa el título principal de la sección del blog',
                'required' => 1,
                'default_value' => 'Entradas del blog',
            ),
            array(
                'key' => 'field_tt_blog_description',
                'label' => 'Descripción del Blog',
                'name' => 'tt_blog_description',
                'type' => 'textarea',
                'instructions' => 'Ingresa la descripción de la sección del blog',
                'required' => 1,
                'default_value' => 'Descubre las últimas novedades y reflexiones sobre educomunicación, alfabetización mediática e inteligencia artificial en nuestro blog, con un enfoque especial en la construcción de paz.',
            ),
            array(
                'key' => 'field_tt_blog_cta_text',
                'label' => 'Texto del Botón',
                'name' => 'tt_blog_cta_text',
                'type' => 'text',
                'instructions' => 'Ingresa el texto para el botón de llamada a la acción',
                'required' => 1,
                'default_value' => 'Conoce más',
            ),
            array(
                'key' => 'field_tt_blog_cta_url',
                'label' => 'URL del Botón',
                'name' => 'tt_blog_cta_url',
                'type' => 'url',
                'instructions' => 'Ingresa la URL para el botón de llamada a la acción',
                'required' => 1,
                'default_value' => '#',
            ),
            array(
                'key' => 'field_tt_blog_all_articles_text',
                'label' => 'Texto del Botón Ver Todos los Artículos',
                'name' => 'tt_blog_all_articles_text',
                'type' => 'text',
                'instructions' => 'Ingresa el texto para el botón que lleva a todos los artículos',
                'required' => 1,
                'default_value' => 'Ver todos los artículos',
            ),
            array(
                'key' => 'field_tt_blog_all_articles_url',
                'label' => 'URL del Botón Ver Todos los Artículos',
                'name' => 'tt_blog_all_articles_url',
                'type' => 'url',
                'instructions' => 'Ingresa la URL para el botón que lleva a todos los artículos',
                'required' => 1,
                'default_value' => '/blog',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/subpage-templates/total-transmedia/blog.php',
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

endif;
