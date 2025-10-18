<?php
/**
 * Template Name: Crossmedia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $course_url = get_field('course_url') ?: 'https://digitalia.gov.co/crossmedia';
    get_template_part('template-parts/page-header', null, array(
        'title' => get_field('crossmedia_header')['title'] ?: 'Crossmedia',
        'subtitle' => get_field('crossmedia_header')['subtitle'] ?: 'Crea universos narrativos con diversos puntos de contacto.',
        'show_cta' => true,
        'cta_text' => 'Ir al curso',
        'cta_url' => $course_url,
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>

    <?php get_template_part('template-parts/page-content'); ?>

    <!-- Hero Section -->
    <section class="magicpattern py-32 bg-slate-100">
        <div class="container flex flex-col gap-28">
            <div class="flex flex-col gap-7">
                <h1 class="text-4xl font-semibold lg:text-7xl">
                    <?php echo get_field('crossmedia_hero')['title'] ?: 'Universos Narrativos'; ?>
                </h1>
                <p class="max-w-3xl text-lg">
                    <?php echo get_field('crossmedia_hero')['description'] ?: 'Crea universos narrativos con diversos puntos de contacto para diferentes audiencias, a través de múltiples plataformas.'; ?>
                </p>
                <div class="mt-4">
                    <a href="<?php echo esc_url($course_url); ?>"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-8 py-6 text-base">
                        Ir al curso
                        <i class="fa fa-arrow-right ml-2 size-4"></i>
                    </a>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <?php
                $hero_image = get_field('crossmedia_hero')['image'];
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>"
                         alt="<?php echo esc_attr($hero_image['alt']); ?>"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php else: ?>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg"
                         alt="Crossmedia"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php endif; ?>

                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground">
                        <?php echo get_field('crossmedia_hero')['highlight_label'] ?: 'NUESTRO ENFOQUE'; ?>
                    </p>
                    <p class="text-lg font-medium">
                        <?php echo get_field('crossmedia_hero')['highlight_text'] ?: 'Construye narrativas de crossmedia haciendo uso de la inteligencia artificial con enfoque de Alfabetización Mediática Informacional (AMI).'; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Topics Section - Accordion -->
    <section class="py-32">
        <div class="container">
            <div class="mb-12 flex flex-col items-start justify-between gap-6">
                <div class="max-w-3xl">
                    <p class="mb-6 text-xs font-medium uppercase tracking-wider text-muted-foreground">
                        <?php echo get_field('crossmedia_topics')['label'] ?: 'QUÉ APRENDERÁS'; ?>
                    </p>
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl lg:text-5xl">
                        <?php echo get_field('crossmedia_topics')['title'] ?: 'Contenidos del programa'; ?>
                    </h2>
                    <p class="text-muted-foreground lg:text-lg">
                        <?php echo get_field('crossmedia_topics')['description'] ?: 'Nuestro objetivo es prepararte para producir contenido crossmedia de alta calidad que aporte de manera decidida en tu lucha contra la desinformación.'; ?>
                    </p>
                </div>
            </div>

            <div class="crossmedia-accordion" data-accordion>
                <?php
                // Get categories from ACF or use defaults
                $categories = array();
                if (have_rows('crossmedia_categories')):
                    while (have_rows('crossmedia_categories')): the_row();
                        $topics_text = get_sub_field('category_topics');
                        // Convert textarea lines to array
                        $topics_array = array_filter(array_map('trim', explode("\n", $topics_text)));
                        $categories[] = array(
                            'icon' => get_sub_field('icon'),
                            'title' => get_sub_field('category_title'),
                            'topics' => $topics_array
                        );
                    endwhile;
                else:
                    // Default categories and topics
                    $categories = array(
                        array(
                            'icon' => 'fa-layer-group',
                            'title' => 'Narrativas Expandidas',
                            'topics' => array(
                                'Introducción a las Narrativas Expandidas',
                                'Creación de Personajes en Narrativas Expandidas',
                                'Uso de Plataformas en Narrativas Expandidas',
                                'Integración de la Audiencia',
                                'Producción Multimedia en Narrativas Expandidas',
                                'Distribución de Narrativas Expandidas',
                                'Monetización de Narrativas Expandidas',
                                'Innovación en Narrativas Expandidas',
                                'Estrategias de Marketing para Narrativas Expandidas',
                                'Colaboraciones para Expandir Narrativas',
                                'Análisis de Resultados en Narrativas Expandidas',
                                'Sostenibilidad y Futuro de Narrativas Expandidas'
                            )
                        ),
                        array(
                            'icon' => 'fa-hand-pointer',
                            'title' => 'Interactividad',
                            'topics' => array(
                                'Introducción a la Interactividad',
                                'Principios de Diseño de Experiencias Interactivas',
                                'Herramientas Digitales para Crear Interactividad',
                                'Integración de Interactividad en Narrativas Crossmedia',
                                'Estrategias para Medir el Impacto de la Interactividad',
                                'Personalización de Experiencias Interactivas',
                                'Interactividad en la Educación Digital',
                                'Interactividad en Marketing Digital',
                                'Aplicaciones Innovadoras de la Interactividad',
                                'Herramientas Avanzadas para la Interactividad',
                                'Narrativas Interactivas Innovadoras',
                                'Implementación de Proyectos Interactivos'
                            )
                        ),
                        array(
                            'icon' => 'fa-check-circle',
                            'title' => 'Coherencia y continuidad del mensaje',
                            'topics' => array(
                                'Introducción a la Coherencia y Continuidad del Mensaje',
                                'Definir un Mensaje Central',
                                'Adaptación del Mensaje a Diferentes Plataformas',
                                'Creación de una Narrativa Consistente',
                                'Evaluación de la Consistencia en Tiempo Real',
                                'Manejo de Crisis de Comunicación',
                                'Optimización del Mensaje con Datos en Tiempo Real',
                                'Medición del Éxito de Narrativas Crossmedia',
                                'Iteración y Mejora Basada en Resultados',
                                'Implementación de Automatizaciones en Proyectos Crossmedia',
                                'Tendencias Futuras en Estrategias Crossmedia'
                            )
                        ),
                        array(
                            'icon' => 'fa-film',
                            'title' => 'Producción narrativa',
                            'topics' => array(
                                'Introducción a la Producción Narrativa',
                                'Creación de Personajes Memorables',
                                'Estructura Narrativa Efectiva',
                                'Creación de Escenarios Envolventes',
                                'Conexión Emocional con la Audiencia',
                                'Integración de Plataformas en la Narrativa',
                                'Evaluación del Impacto Narrativo',
                                'Iteración y Mejora de Narrativas',
                                'Innovación con Narrativas Interactivas',
                                'Planificación y Ejecución de Proyectos Crossmedia'
                            )
                        ),
                        array(
                            'icon' => 'fa-heart',
                            'title' => 'Engagement',
                            'topics' => array(
                                'Introducción al Engagement en Proyectos Crossmedia',
                                'Estrategia de Engagement',
                                'Medición del Engagement',
                                'Contenido interactivo',
                                'Fidelización de la audiencia',
                                'Narrativas Participativas',
                                'Storytelling Emocional',
                                'Gamificación para Engagement',
                                'Medición del Impacto del Engagement',
                                'Integración de Retroalimentación',
                                'Creación de Comunidades Digitales',
                                'Innovación con Experiencias Inmersivas'
                            )
                        ),
                        array(
                            'icon' => 'fa-shield-alt',
                            'title' => 'Superar los discursos de odio',
                            'topics' => array(
                                'Introducción a los Discursos de Odio',
                                'Causas de los Discursos de Odio',
                                'Promoviendo Discursos Positivos',
                                'El Papel de las Comunidades Online',
                                'Herramientas para Detectar Discursos de Odio',
                                'Educando para la Prevención del Odio',
                                'Medir el Impacto de las Iniciativas contra el Odio',
                                'Políticas Efectivas contra el Odio Online'
                            )
                        ),
                        array(
                            'icon' => 'fa-exclamation-triangle',
                            'title' => 'Disuadir la desinformación en la red',
                            'topics' => array(
                                'Que es la Desinformacion',
                                'Herramientas digitales para detectar desinformación',
                                'El impacto de la desinformación en las decisiones',
                                'Cómo identificar fuentes confiables',
                                'El rol de los algoritmos en la desinformación',
                                'Desinformación y noticias falsas',
                                'Desinformación y emociones',
                                'Construyendo una dieta mediática saludable'
                            )
                        ),
                        array(
                            'icon' => 'fa-pen-nib',
                            'title' => 'Autoría en redes',
                            'topics' => array(
                                'Introducción a la autoría en redes sociales',
                                'Propiedad intelectual y redes sociales',
                                'Ética en la autoría digital',
                                'Herramientas para proteger la autoría',
                                'Autoría y colaboración en redes sociales',
                                'Cómo reconocer al autor en contenido compartido',
                                'Autoría en la era de la inteligencia artificial',
                                'Construyendo una cultura de respeto hacia la autoría'
                            )
                        ),
                        array(
                            'icon' => 'fa-newspaper',
                            'title' => 'Bases de periodismo ciudadano',
                            'topics' => array(
                                'Introducción al Periodismo Ciudadano',
                                'Herramientas básicas para el Periodismo Ciudadano',
                                'Cómo verificar información antes de compartir',
                                'Principios éticos del Periodismo Ciudadano',
                                'Narrativas visuales en el Periodismo Ciudadano',
                                'Uso de redes sociales para la difusión de noticias',
                                'La importancia de la Seguridad Digital',
                                'Construyendo credibilidad como Periodista Ciudadano'
                            )
                        ),
                        array(
                            'icon' => 'fa-search',
                            'title' => 'Investigación Digital',
                            'topics' => array(
                                'Introducción a la Investigación Digital',
                                'Herramientas clave para la Investigación Digital',
                                'Cómo evaluar fuentes de Información Digital',
                                'Técnicas de verificación de datos',
                                'Uso de redes sociales en la Investigación Digital',
                                'Ética en la Investigación Digital',
                                'Presentación de resultados de Investigación Digital',
                                'Futuro de la Investigación Digital',
                                'Identificación de sesgos en la Información Digital',
                                'Gestión de información para la toma de decisiones'
                            )
                        )
                    );
                endif;

                // Render accordion items
                foreach ($categories as $index => $category):
                    $accordion_id = 'accordion-' . $index;
                ?>
                    <div class="accordion-item border-b border-border">
                        <button
                            type="button"
                            class="accordion-trigger flex w-full items-center justify-between py-6 text-left transition-all hover:no-underline"
                            data-accordion-trigger
                            aria-expanded="false"
                            aria-controls="<?php echo esc_attr($accordion_id); ?>">
                            <div class="flex flex-1 items-center gap-4">
                                <span class="flex size-10 items-center justify-center rounded-lg bg-primary">
                                    <i class="fa <?php echo esc_attr($category['icon'] ?: 'fa-book'); ?> text-primary-foreground"></i>
                                </span>
                                <h3 class="text-lg font-medium tracking-tight">
                                    <?php echo esc_html($category['title']); ?>
                                </h3>
                            </div>
                            <svg
                                class="accordion-icon size-5 shrink-0 transition-transform duration-200"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            id="<?php echo esc_attr($accordion_id); ?>"
                            class="accordion-content overflow-hidden transition-all duration-300"
                            data-accordion-content
                            style="max-height: 0;">
                            <div class="pb-6 pl-14 pr-4">
                                <ul class="space-y-3">
                                    <?php foreach ($category['topics'] as $topic): ?>
                                        <li class="flex items-start gap-2 text-muted-foreground">
                                            <i class="fa fa-check-circle mt-1 text-primary"></i>
                                            <span><?php echo esc_html($topic); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
    // Accordion functionality
    document.addEventListener('DOMContentLoaded', function() {
        const accordionTriggers = document.querySelectorAll('[data-accordion-trigger]');

        accordionTriggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('.accordion-icon');
                const isExpanded = this.getAttribute('aria-expanded') === 'true';

                // Close all other accordion items
                accordionTriggers.forEach(otherTrigger => {
                    if (otherTrigger !== trigger) {
                        const otherContent = otherTrigger.nextElementSibling;
                        const otherIcon = otherTrigger.querySelector('.accordion-icon');
                        otherTrigger.setAttribute('aria-expanded', 'false');
                        otherContent.style.maxHeight = '0';
                        otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current accordion item
                if (isExpanded) {
                    this.setAttribute('aria-expanded', 'false');
                    content.style.maxHeight = '0';
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    this.setAttribute('aria-expanded', 'true');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });
    });
    </script>

    <!-- CTA Section -->
    <section class="py-32 bg-slate-100">
        <div class="container flex flex-col items-center text-center gap-8">
            <div class="max-w-3xl">
                <h2 class="mb-6 text-3xl font-semibold md:text-4xl lg:text-5xl">
                    <?php echo get_field('crossmedia_cta')['title'] ?: '¿Listo para crear contenido crossmedia?'; ?>
                </h2>
                <p class="text-muted-foreground lg:text-lg mb-8">
                    <?php echo get_field('crossmedia_cta')['description'] ?: 'Únete a nuestro programa y aprende a crear narrativas que impacten en múltiples plataformas.'; ?>
                </p>
                <a href="<?php echo esc_url($course_url); ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-8 py-6 text-base">
                    Ir al curso
                    <i class="fa fa-arrow-right ml-2 size-4"></i>
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
