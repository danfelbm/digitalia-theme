<?php
/**
 * Template Name: Transmedia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $course_url = get_field('course_url') ?: 'https://digitalia.gov.co/transmedia';
    get_template_part('template-parts/page-header', null, array(
        'title' => get_field('transmedia_header')['title'] ?: 'Transmedia',
        'subtitle' => get_field('transmedia_header')['subtitle'] ?: 'Revoluciona la forma de contar historias y llévalas a múltiples plataformas.',
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
                    <?php echo get_field('transmedia_hero')['title'] ?: 'Narrativas que Trascienden Plataformas'; ?>
                </h1>
                <p class="max-w-3xl text-lg">
                    <?php echo get_field('transmedia_hero')['description'] ?: 'Revoluciona la forma de contar historias y llévalas a múltiples plataformas. Cada medio imprime un mensaje hacia una audiencia que no sólo consume, sino que interactúa y es parte del relato.'; ?>
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
                $hero_image = get_field('transmedia_hero')['image'];
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>"
                         alt="<?php echo esc_attr($hero_image['alt']); ?>"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php else: ?>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg"
                         alt="Transmedia"
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php endif; ?>

                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground">
                        <?php echo get_field('transmedia_hero')['highlight_label'] ?: 'NUESTRO ENFOQUE'; ?>
                    </p>
                    <p class="text-lg font-medium">
                        <?php echo get_field('transmedia_hero')['highlight_text'] ?: 'Queremos que mejores prácticas en estrategia de medios, integres canales, optimices recursos y la experiencia de la audiencia. Crea personajes a través de los cuales se incentive la participación comunitaria a partir de la gamificación.'; ?>
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
                        <?php echo get_field('transmedia_topics')['label'] ?: 'QUÉ APRENDERÁS'; ?>
                    </p>
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl lg:text-5xl">
                        <?php echo get_field('transmedia_topics')['title'] ?: 'Contenidos del programa'; ?>
                    </h2>
                    <p class="text-muted-foreground lg:text-lg">
                        <?php echo get_field('transmedia_topics')['description'] ?: 'Evalúa y mide resultados para construir juntas y juntos nuestras propias rutas de conocimiento en narrativas transmedia.'; ?>
                    </p>
                </div>
            </div>

            <div class="transmedia-accordion" data-accordion>
                <?php
                // Get categories from ACF or use defaults
                $categories = array();
                if (have_rows('transmedia_categories')):
                    while (have_rows('transmedia_categories')): the_row();
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
                            'icon' => 'fa-sitemap',
                            'title' => 'Omnicanales',
                            'topics' => array(
                                'Introducción a los conceptos omnicanales',
                                'Mejores prácticas en estrategias omnicanales',
                                'Personalización en estrategias omnicanales',
                                'Medición del impacto de estrategias omnicanales',
                                'Sincronización de datos en estrategias omnicanales',
                                'Herramientas digitales para estrategias omnicanales',
                                'Integración de canales físicos y digitales',
                                'Optimización de la experiencia del cliente',
                                'Marketing automatizado en estrategias omnicanales',
                                'Gestión de datos en estrategias omnicanales',
                                'Optimización de recursos en estrategias omnicanales',
                                'Innovación en estrategias omnicanales'
                            )
                        ),
                        array(
                            'icon' => 'fa-book-open',
                            'title' => 'Storytelling',
                            'topics' => array(
                                'Introducción al Storytelling Transmedia',
                                'Elementos clave del Storytelling Transmedia descubriendo la esencia de tu historia',
                                'Elementos clave del Storytelling Transmedia cómo construir mundos que transcienden plataformas',
                                'Creación de personajes en el Storytelling Transmedia',
                                'Profundización de personajes y arcos narrativos',
                                'Integración de plataformas en el Storytelling Transmedia',
                                'Como describir guiones para diferentes medios',
                                'Generación de Contenido en el Storytelling Transmedia',
                                'Participación activa de la audiencia',
                                'Herramientas digitales para Storytelling Transmedia',
                                'Colaboración en Proyectos Transmedia',
                                'Planificación de una Estrategia Transmedia',
                                'Ejecución de contenido para Estrategias Transmedia',
                                'Sostenibilidad de las Narrativas Transmedia',
                                'Monitoreo y Análisis en Narrativas Transmedia',
                                'Innovación en Narrativas Transmedia',
                                'Futuro del Storytelling Transmedia'
                            )
                        ),
                        array(
                            'icon' => 'fa-bullhorn',
                            'title' => 'Marketing de Contenidos',
                            'topics' => array(
                                'Introducción al Marketing de Contenidos',
                                'Creación de una Estrategia de Marketing de Contenidos',
                                'Tipos de Contenido y Cuándo Usarlos',
                                'Creación de Contenidos Atractivos',
                                'Distribución Eficiente de Contenidos',
                                'Medición de Resultados en Marketing de Contenidos',
                                'Optimización Continua del Marketing de Contenidos'
                            )
                        ),
                        array(
                            'icon' => 'fa-gamepad',
                            'title' => 'Gamificación',
                            'topics' => array(
                                'Introducción a la Gamificación',
                                'Diseño de Mecánicas de Juego',
                                'Narrativas Gamificadas',
                                'Herramientas Digitales para la Gamificación',
                                'Gamificación para el Aprendizaje',
                                'Gamificación en estrategias de Marketing',
                                'Gamificación en la participación comunitaria',
                                'Futuro de la gamificación en el entorno Digital'
                            )
                        ),
                        array(
                            'icon' => 'fa-project-diagram',
                            'title' => 'Narrativa interactiva',
                            'topics' => array(
                                'Narrativa Interactiva',
                                'Narrativa Lineal',
                                'Diseño de decisiones y narrativas interactivas',
                                'Creación de diagramas de narrativas interactivas',
                                'Uso de tecnología en narrativas interactivas',
                                'Diseño de la experiencia de usuario',
                                'Narrativas interactivas en proyectos educativos',
                                'Narrativas interactivas y marketing digital',
                                'Narrativas interactivas y realidad virtual',
                                'Narrativas interactivas y el futuro del entretenimiento'
                            )
                        ),
                        array(
                            'icon' => 'fa-stopwatch',
                            'title' => 'Micromomentos',
                            'topics' => array(
                                'Introducción a los Micromomentos',
                                'Identificando Micromomentos en tu audiencia',
                                'Creando contenido para Micromomentos',
                                'Herramientas Digitales para Micromomentos',
                                'Estrategias para capturar Micromomentos',
                                'Personalización en los Micromomentos',
                                'Medición y Análisis de los Micromomentos',
                                'Implementación de una Estrategia de Micromomentos'
                            )
                        ),
                        array(
                            'icon' => 'fa-video',
                            'title' => 'Live streaming',
                            'topics' => array(
                                'Introducción al Live-Streaming',
                                'Plataformas de Live Streaming',
                                'Preparación técnica para el Live Streaming',
                                'Creación de contenido para Live Streaming',
                                'Interacción con la audiencia en tiempo real',
                                'Monetización a través del Live Streaming',
                                'Estrategias de promoción para Live Streaming',
                                'Análisis de resultados en Live Streaming',
                                'Innovación en contenido para Live Streaming',
                                'El futuro del Live Streaming',
                                'OBS Estudio'
                            )
                        ),
                        array(
                            'icon' => 'fa-user-edit',
                            'title' => 'User generated content',
                            'topics' => array(
                                'Introducción al User Generated Content (UGC)',
                                'Beneficios del User Generated Content',
                                'Plataformas ideales para UGC',
                                'Mejores prácticas para implementar UGC',
                                'Herramientas para gestionar UGC',
                                'Cómo Incentivar la creación de UGC',
                                'Cómo Medir el Éxito del UGC',
                                'Estrategias de moderación de UGC',
                                'UGC y construcción de Comunidades',
                                'El Futuro del User Generated Content'
                            )
                        ),
                        array(
                            'icon' => 'fa-star',
                            'title' => 'Influencer marketing',
                            'topics' => array(
                                'Introducción al Influencer Marketing',
                                'Cómo identificar a los influencers adecuados',
                                'Cómo negociar colaboraciones con influencers',
                                'Cómo negociar colaboraciones con Influencers',
                                'Cómo medir el impacto de una campaña con influencers',
                                'Ética en el Influencer Marketing',
                                'Cómo seleccionar plataformas para el Influencer Marketing',
                                'Creación de Contenido Efectivo para Influencer Marketing',
                                'Cómo incentivar la participación de Influencers',
                                'El futuro del Influencer Marketing'
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
                    <?php echo get_field('transmedia_cta')['title'] ?: '¿Listo para revolucionar tus narrativas?'; ?>
                </h2>
                <p class="text-muted-foreground lg:text-lg mb-8">
                    <?php echo get_field('transmedia_cta')['description'] ?: 'Únete a nuestro programa y aprende a crear historias que trascienden plataformas e involucran a tu audiencia.'; ?>
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
