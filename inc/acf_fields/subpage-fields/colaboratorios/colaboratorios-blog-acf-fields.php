<?php
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_colaboratorios_blog',
        'title' => 'Colaboratorios - Blog Section',
        'fields' => array(
            array(
                'key' => 'field_colaboratorios_blog',
                'label' => 'Blog Section',
                'name' => 'blog',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_blog_title',
                        'label' => 'Título',
                        'name' => 'title',
                        'type' => 'text',
                        'default_value' => 'Entradas del blog',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_blog_description',
                        'label' => 'Descripción',
                        'name' => 'description',
                        'type' => 'textarea',
                        'default_value' => 'Descubre las últimas novedades y reflexiones sobre educomunicación, alfabetización mediática e inteligencia artificial en nuestro blog, con un enfoque especial en la construcción de paz.',
                        'rows' => 3,
                        'new_lines' => 'br',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_blog_cta',
                        'label' => 'Call to Action',
                        'name' => 'cta',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_blog_cta_text',
                                'label' => 'Texto',
                                'name' => 'text',
                                'type' => 'text',
                                'default_value' => 'Conoce más',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_blog_cta_link',
                                'label' => 'Enlace',
                                'name' => 'link',
                                'type' => 'url',
                                'default_value' => '#blog',
                                'required' => 1,
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
                    'value' => 'page-templates/subpage-templates/colaboratorios/blog.php',
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
        'show_in_rest' => false,
    ));

endif;
