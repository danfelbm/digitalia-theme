<?php
/**
 * ACF Fields for Ready Formacion Section
 *
 * @package Digitalia
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('digitalia_register_ready_formacion_acf_fields')) {
    function digitalia_register_ready_formacion_acf_fields() {
        if (function_exists('acf_add_local_field_group')) {
            acf_add_local_field_group(array(
                'key' => 'group_ready_formacion',
                'title' => 'Sección de Formación',
                'show_in_rest' => true,
                'fields' => array(
                    array(
                        'key' => 'field_ready_formacion_hero',
                        'label' => 'Hero',
                        'name' => 'ready_formacion_hero',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_formacion_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Programa de Formación para Alfabetizadores',
                            ),
                            array(
                                'key' => 'field_ready_formacion_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'default_value' => 'Formamos alfabetizadores mediáticos capaces de enfrentar los desafíos de la comunicación digital en el marco de la cuarta y quinta revolución industrial, con énfasis en inteligencia artificial y un enfoque centrado en la paz.',
                            ),
                            array(
                                'key' => 'field_ready_formacion_cta',
                                'label' => 'Botón CTA',
                                'name' => 'cta',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready_formacion_cta_text',
                                        'label' => 'Texto del botón',
                                        'name' => 'text',
                                        'type' => 'text',
                                        'default_value' => 'Conoce más',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_cta_url',
                                        'label' => 'URL del botón',
                                        'name' => 'url',
                                        'type' => 'text',
                                        'default_value' => '#ruta-formacion',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Competencias Section
                    array(
                        'key' => 'field_ready_formacion_competencias',
                        'label' => 'Sección Competencias',
                        'name' => 'ready_formacion_competencias',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_formacion_competencias_badge',
                                'label' => 'Texto Badge',
                                'name' => 'badge',
                                'type' => 'text',
                                'default_value' => 'FORMACIÓN DE ALFABETIZADORES',
                            ),
                            array(
                                'key' => 'field_ready_formacion_competencias_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Competencias Clave',
                            ),
                            array(
                                'key' => 'field_ready_formacion_competencias_items',
                                'label' => 'Competencias',
                                'name' => 'items',
                                'type' => 'repeater',
                                'layout' => 'block',
                                'min' => 3,
                                'max' => 3,
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready_formacion_competencia_icon',
                                        'label' => 'Icono (Lucide)',
                                        'name' => 'icon',
                                        'type' => 'text',
                                        'default_value' => 'graduation-cap',
                                        'instructions' => 'Nombre del icono de Lucide (ej: graduation-cap, computer, share)',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_competencia_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_competencia_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                    ),
                                ),
                                'default_value' => array(
                                    array(
                                        'icon' => 'graduation-cap',
                                        'title' => 'Habilidades Pedagógicas',
                                        'description' => 'Desarrollo de capacidades para facilitar procesos de aprendizaje efectivos, con énfasis en metodologías participativas y aprendizaje experiencial para la alfabetización mediática e informacional.',
                                    ),
                                    array(
                                        'icon' => 'computer',
                                        'title' => 'Conocimiento Técnico Digital',
                                        'description' => 'Dominio de herramientas digitales y tecnologías emergentes, incluyendo IA, para identificar fake news, alteraciones multimedia y promover una cultura de paz mediática.',
                                    ),
                                    array(
                                        'icon' => 'share',
                                        'title' => 'Narrativas Transmedia',
                                        'description' => 'Capacidad para crear y facilitar experiencias de aprendizaje transmedia, incluyendo storytelling, marketing de contenidos, gamificación y narrativas interactivas para la paz.',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    // Formación Integral Section
                    array(
                        'key' => 'field_ready_formacion_integral',
                        'label' => 'Sección Formación Integral',
                        'name' => 'ready_formacion_integral',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ready_formacion_integral_title',
                                'label' => 'Título Principal',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Formación Integral',
                            ),
                            array(
                                'key' => 'field_ready_formacion_integral_subtitle',
                                'label' => 'Subtítulo',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Metodología y Evaluación',
                            ),
                            array(
                                'key' => 'field_ready_formacion_integral_metodologia',
                                'label' => 'Metodología',
                                'name' => 'metodologia',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready_formacion_integral_metodologia_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                        'instructions' => 'Tamaño recomendado: 800x400px',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_metodologia_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Metodologías de Enseñanza',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_metodologia_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Exploramos enfoques pedagógicos innovadores adaptados a diferentes contextos, promoviendo el pensamiento crítico y la construcción colectiva del conocimiento. Nuestras metodologías integran componentes teóricos y prácticos para superar desafíos como la desinformación y los discursos de odio en entornos digitales.',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_metodologia_cta',
                                        'label' => 'CTA',
                                        'name' => 'cta',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready_formacion_integral_metodologia_cta_text',
                                                'label' => 'Texto',
                                                'name' => 'text',
                                                'type' => 'text',
                                                'default_value' => 'Explorar metodologías',
                                            ),
                                            array(
                                                'key' => 'field_ready_formacion_integral_metodologia_cta_url',
                                                'label' => 'URL',
                                                'name' => 'url',
                                                'type' => 'text',
                                                'default_value' => '#metodologias',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'key' => 'field_ready_formacion_integral_evaluacion',
                                'label' => 'Evaluación',
                                'name' => 'evaluacion',
                                'type' => 'group',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_ready_formacion_integral_evaluacion_image',
                                        'label' => 'Imagen',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                        'preview_size' => 'medium',
                                        'instructions' => 'Tamaño recomendado: 800x400px',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_evaluacion_title',
                                        'label' => 'Título',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'default_value' => 'Evaluación y Certificación',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_evaluacion_description',
                                        'label' => 'Descripción',
                                        'name' => 'description',
                                        'type' => 'textarea',
                                        'default_value' => 'Sistema integral de evaluación que reconoce y certifica las competencias en alfabetización mediática e informacional. Incluye seguimiento personalizado del desempeño, evaluación de proyectos prácticos y oportunidades de especialización en áreas como IA, producción digital y narrativas transmedia para la paz.',
                                    ),
                                    array(
                                        'key' => 'field_ready_formacion_integral_evaluacion_cta',
                                        'label' => 'CTA',
                                        'name' => 'cta',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_ready_formacion_integral_evaluacion_cta_text',
                                                'label' => 'Texto',
                                                'name' => 'text',
                                                'type' => 'text',
                                                'default_value' => 'Conocer proceso',
                                            ),
                                            array(
                                                'key' => 'field_ready_formacion_integral_evaluacion_cta_url',
                                                'label' => 'URL',
                                                'name' => 'url',
                                                'type' => 'text',
                                                'default_value' => '#certificacion',
                                            ),
                                        ),
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
                            'value' => 'page-templates/subpage-templates/ready/formacion.php',
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
        }
    }
}

add_action('acf/init', 'digitalia_register_ready_formacion_acf_fields');
