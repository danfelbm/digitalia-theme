<?php
/**
 * Template Name: Multimedia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $course_url = get_field('course_url') ?: 'https://digitalia.gov.co/multimedia';
    get_template_part('template-parts/page-header', null, array(
        'title' => get_field('multimedia_header')['title'] ?: 'Multimedia',
        'subtitle' => get_field('multimedia_header')['subtitle'] ?: 'Multimedia + Sostenibilidad + Desafíos Ciudadanos.',
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
                    <?php echo get_field('multimedia_hero')['title'] ?: 'Contenido Multimedia de Alta Calidad'; ?>
                </h1>
                <p class="max-w-3xl text-lg">
                    <?php echo get_field('multimedia_hero')['description'] ?: 'Genera contenido de alta calidad haciendo uso de diferentes formatos multimedia, aprende a utilizar herramientas para la producción de contenido y a proyectar su sostenibilidad en los ecosistemas digitales.'; ?>
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
                $hero_image = get_field('multimedia_hero')['image'];
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>"
                         alt="<?php echo esc_attr($hero_image['alt']); ?>"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php else: ?>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg"
                         alt="Multimedia"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php endif; ?>

                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground">
                        <?php echo get_field('multimedia_hero')['highlight_label'] ?: 'NUESTRO ENFOQUE'; ?>
                    </p>
                    <p class="text-lg font-medium">
                        <?php echo get_field('multimedia_hero')['highlight_text'] ?: 'Prepárate con diversas herramientas de uso libre para los desafíos ciudadanos que existen en la lucha colectiva por la paz mediática y contra la desinformación.'; ?>
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
                        <?php echo get_field('multimedia_topics')['label'] ?: 'QUÉ APRENDERÁS'; ?>
                    </p>
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl lg:text-5xl">
                        <?php echo get_field('multimedia_topics')['title'] ?: 'Contenidos del programa'; ?>
                    </h2>
                    <p class="text-muted-foreground lg:text-lg">
                        <?php echo get_field('multimedia_topics')['description'] ?: 'Aprende a crear contenido multimedia profesional usando herramientas de software libre y desarrolla estrategias sostenibles para tus proyectos digitales.'; ?>
                    </p>
                </div>
            </div>

            <div class="multimedia-accordion" data-accordion>
                <?php
                // Get categories from ACF or use defaults
                $categories = array();
                if (have_rows('multimedia_categories')):
                    while (have_rows('multimedia_categories')): the_row();
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
                            'icon' => 'fa-video',
                            'title' => 'Edición de videos en DaVinci Resolve',
                            'topics' => array(
                                'Introducción a DaVinci Resolve',
                                'Importación de Material Multimedia',
                                'Edición Básica en DaVinci Resolve',
                                'Herramienta de Corte Dinámico',
                                'Transiciones y Efectos',
                                'Creación y Estilización de Títulos',
                                'Corrección de Color Básica',
                                'Edición de Audio',
                                'Exportación de Proyectos',
                                'Consejos Avanzados y Optimización'
                            )
                        ),
                        array(
                            'icon' => 'fa-image',
                            'title' => 'Edición de contenidos fotográficos en Gimp',
                            'topics' => array(
                                'Introducción a Gimp',
                                'Herramientas de Selección',
                                'Uso de capas en Gimp',
                                'Ajuste de Colores',
                                'Herramientas de Retoque',
                                'Texto y Gráficos',
                                'Filtros y Efectos',
                                'Selecciones Avanzadas',
                                'Animaciones Básicas',
                                'Técnicas avanzadas de edición final'
                            )
                        ),
                        array(
                            'icon' => 'fa-microphone',
                            'title' => 'Edición de contenidos sonoros en Audacity',
                            'topics' => array(
                                'Introducción a Audacity',
                                'Grabación de Audio',
                                'Edición Básica de Audio',
                                'Aplicación de Efectos',
                                'Mezcla de Pistas',
                                'Exportación de Proyectos',
                                'Consejos Avanzados de Edición'
                            )
                        ),
                        array(
                            'icon' => 'fa-pen',
                            'title' => 'Producción de contenidos escritos para la web',
                            'topics' => array(
                                'Introducción a la Producción de Contenidos para la Web',
                                'Optimización de Textos para Motores de Búsqueda (SEO)',
                                'Medición y Mejora de Contenidos Escritos'
                            )
                        ),
                        array(
                            'icon' => 'fa-share-alt',
                            'title' => 'Social media',
                            'topics' => array(
                                'Introducción a Social Media',
                                'Planificación de Contenidos para Redes Sociales',
                                'Creación de Contenido Atractivo',
                                'Análisis del Desempeño en Redes Sociales',
                                'Mejoras y Tendencias en Social Media'
                            )
                        ),
                        array(
                            'icon' => 'fa-broadcast-tower',
                            'title' => 'Grabación de sonidos',
                            'topics' => array(
                                'Introducción al sonido directo',
                                'Funciones narrativas y emocionales del sonido',
                                'Microfonos',
                                'Dispositivos para Grabar',
                                'Grabación de voces',
                                'Grabación de ambientes y efectos',
                                'Consejos Finales'
                            )
                        ),
                        array(
                            'icon' => 'fa-chart-line',
                            'title' => 'Análisis de Audiencias',
                            'topics' => array(
                                'Introducción al análisis de audiencias',
                                'Herramientas para analizar audiencias',
                                'Análisis de datos demográficos',
                                'Intereses y comportamiento de la audiencia',
                                'Segmentación avanzada de audiencias',
                                'Uso de Analytics para medir impactos',
                                'Identificación de oportunidades de crecimiento',
                                'Personalización avanzada de contenido',
                                'Integración del análisis de audiencias en estrategias globales'
                            )
                        ),
                        array(
                            'icon' => 'fa-bullseye',
                            'title' => 'Posicionamiento y Estrategia',
                            'topics' => array(
                                'Introducción al Posicionamiento Digital',
                                'Herramientas para fortalecer el Posicionamiento Digital',
                                'Diseñando una estrategia de Posicionamiento',
                                'Creación de contenido para el Posicionamiento',
                                'SEO y su impacto en el Posicionamiento',
                                'Métricas y análisis del Posicionamiento',
                                'Branding personal como estrategia de Posicionamiento',
                                'Posicionamiento en Redes Sociales',
                                'Estrategias de colaboración para el Posicionamiento',
                                'Innovación y tendencias en Posicionamiento Digital'
                            )
                        ),
                        array(
                            'icon' => 'fa-dollar-sign',
                            'title' => 'Técnicas y Tecnologías de Monetización',
                            'topics' => array(
                                'Introducción a las técnicas y tecnologías de monetización',
                                'Herramientas clave para la monetización digital',
                                'Publicidad digital como fuente de ingresos',
                                'Monetización a través de suscripciones',
                                'Venta de contenido digital y productos',
                                'Crowdfunding y financiamiento colectivo',
                                'Monetización mediante afiliados y colaboraciones',
                                'Estrategias de diversificación de ingresos'
                            )
                        ),
                        array(
                            'icon' => 'fa-calendar-alt',
                            'title' => 'Planes social media',
                            'topics' => array(
                                'Introducción a los planes de social media',
                                'Identificación de la audiencia ideal',
                                'Diseño de estrategias para redes sociales',
                                'Creación de calendarios de contenido',
                                'Optimización del contenido en redes sociales',
                                'Gestión de interacciones con la audiencia',
                                'Creación de contenido multimedia atractivo',
                                'Evaluación y medición de resultados',
                                'Gestión de crisis en redes sociales',
                                'Innovación en estrategias de social media'
                            )
                        ),
                        array(
                            'icon' => 'fa-graduation-cap',
                            'title' => 'Educomunicación',
                            'topics' => array(
                                'Introducción a la Educomunicación',
                                'Aplicaciones prácticas de la Educomunicación',
                                'Herramientas tecnológicas para la Educomunicación',
                                'Educomunicación para el cambio social',
                                'El Futuro de la Educomunicación'
                            )
                        ),
                        array(
                            'icon' => 'fa-dove',
                            'title' => 'Paz mediática',
                            'topics' => array(
                                'Introducción a la Paz Mediática',
                                'Rol de los Medios en la Construcción de Paz',
                                'Combatiendo la desinformación para fomentar la Paz',
                                'Educar para la Paz Mediática',
                                'El Futuro de la Paz Mediática'
                            )
                        ),
                        array(
                            'icon' => 'fa-robot',
                            'title' => 'Identificación de bots y superación del troll',
                            'topics' => array(
                                'Introducción a los bots y trolls en redes sociales',
                                'Identificación de bots en redes sociales',
                                'Características y tácticas de los trolls',
                                'Cómo manejar interacciones con trolls',
                                'Construyendo una comunidad resiliente'
                            )
                        ),
                        array(
                            'icon' => 'fa-code-branch',
                            'title' => '¿Qué es la polarización algorítmica?',
                            'topics' => array(
                                'Introducción a la polarización algorítmica',
                                'Cómo funcionan los algoritmos de recomendación',
                                'Impacto de la polarización algorítmica en la sociedad',
                                'Estrategias para mitigar la polarización algorítmica',
                                'Futuro de los algoritmos y la polarización'
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
                    <?php echo get_field('multimedia_cta')['title'] ?: '¿Listo para crear contenido multimedia profesional?'; ?>
                </h2>
                <p class="text-muted-foreground lg:text-lg mb-8">
                    <?php echo get_field('multimedia_cta')['description'] ?: 'Únete a nuestro programa y aprende a producir contenido de alta calidad con herramientas de software libre.'; ?>
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
