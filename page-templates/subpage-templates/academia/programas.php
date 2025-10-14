<?php
/**
 * Template Name: Academia - Programas Educativos
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-slate-50">
    <section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-yellow-950 bg-yellow-50">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">
                    <?php echo get_field('hero_title') ?: 'Formación Digital Integral'; ?>
                </h2>
                <p class="mb-8 lg:text-lg">
                    <?php echo get_field('hero_section')['hero_description']; ?>
                </p>
                <a href="<?php echo get_field('hero_section')['cta_link'] ?: get_post_type_archive_link('curso'); ?>" 
                   class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    <?php echo get_field('hero_section')['cta_text'] ?: 'Conoce más'; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!-- Catálogo de Cursos Section -->
    <section class="py-32 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="mx-auto flex max-w-(--breakpoint-md) flex-col items-center gap-6 text-center">
                
                <h1 class="text-balance text-4xl font-semibold text-slate-900">
                    Catálogo de Cursos Educativos
                </h1>
                <p class="text-slate-600">
                    Explora nuestra selección de programas diseñados para desarrollar tus habilidades digitales y fortalecer tu presencia en línea.
                </p>
                <a href="<?php echo get_post_type_archive_link('curso'); ?>" class="flex items-center gap-1 text-sm font-semibold text-slate-800 hover:text-slate-900">
                    Ver todos los cursos
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </div>
            <div class="mt-20 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php
                $args = array(
                    'post_type' => 'curso',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                
                $cursos_query = new WP_Query($args);
                
                if ($cursos_query->have_posts()) :
                    while ($cursos_query->have_posts()) : $cursos_query->the_post();
                        $duracion = get_field('duracion') ? get_field('duracion') : '12 semanas';
                        $categoria = get_field('categoria') ? get_field('categoria') : 'Tecnología';
                ?>
                        <div class="flex flex-col bg-white rounded-lg transition-transform hover:-translate-y-1">
                            <div class="relative">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'aspect-video w-full rounded-t-lg object-cover')); ?>
                                <?php else : ?>
                                    <img src="https://placehold.co/800x450" alt="<?php the_title(); ?>" class="aspect-video w-full rounded-t-lg object-cover">
                                <?php endif; ?>
                                <span class="absolute right-4 top-4 rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-800 border border-slate-200">
                                    <?php echo esc_html($categoria); ?>
                                </span>
                            </div>
                            <div class="flex h-full flex-col justify-between p-6 border-2 border-t-0 border-slate-200 rounded-b-lg">
                                <h2 class="mb-5 text-xl font-semibold text-slate-900">
                                    <?php the_title(); ?>
                                </h2>
                                <div class="flex justify-between gap-6 text-sm">
                                    <span class="flex items-center gap-1 text-slate-600">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <?php echo esc_html($duracion); ?>
                                    </span>
                                    <a href="<?php the_permalink(); ?>" class="flex items-center gap-1 text-slate-800 hover:text-slate-900">
                                        Más información
                                        <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="m9 18 6-6-6-6"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- Metodología de Aprendizaje Section -->
    <section class="py-32 bg-slate-200">
        <div class="container max-w-7xl mx-auto px-4">
            <h1 class="mb-14 max-w-2xl text-4xl font-semibold text-slate-900 md:text-5xl">
                <?php echo get_field('metodologia_aprendizaje')['title'] ?: 'Metodología de Aprendizaje Digital'; ?>
            </h1>
            <div class="flex justify-between gap-20">
                <div class="flex flex-col gap-16 md:w-1/2">
                    <?php 
                    if (have_rows('metodologia_aprendizaje')): 
                        while (have_rows('metodologia_aprendizaje')): the_row();
                            if (have_rows('sections')):
                                $index = 0;
                                while (have_rows('sections')): the_row();
                                    $image = get_sub_field('image');
                                    $img_url = $image ? $image['url'] : 'https://placehold.co/600x400';
                                    $img_alt = $image ? $image['alt'] : get_sub_field('title');
                                    ?>
                                    <!-- Section <?php echo $index + 1; ?> -->
                                    <div class="flex flex-col gap-4 md:h-[50vh] section-content" data-index="<?php echo $index; ?>">
                                        <div class="block rounded-2xl border border-slate-200 bg-white p-4 md:hidden">
                                            <img src="<?php echo esc_url($img_url); ?>" 
                                                 alt="<?php echo esc_attr($img_alt); ?>" 
                                                 class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                                        </div>
                                        <p class="text-sm font-semibold text-slate-600 md:text-base"><?php echo get_sub_field('subtitle'); ?></p>
                                        <h2 class="text-2xl font-semibold text-slate-900 md:text-4xl"><?php echo get_sub_field('title'); ?></h2>
                                        <p class="text-slate-600"><?php echo get_sub_field('description'); ?></p>
                                    </div>
                                    <?php
                                    $index++;
                                endwhile;
                            endif;
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="sticky right-0 top-56 hidden h-fit w-full items-center justify-center md:flex" id="image-container">
                    <img src="https://placehold.co/600x400" alt="Placeholder" class="invisible h-full max-h-[550px] w-full max-w-full object-cover">
                    
                    <?php 
                    if (have_rows('metodologia_aprendizaje')): 
                        while (have_rows('metodologia_aprendizaje')): the_row();
                            if (have_rows('sections')):
                                $index = 0;
                                while (have_rows('sections')): the_row();
                                    $image = get_sub_field('image');
                                    $img_url = $image ? $image['url'] : 'https://placehold.co/600x400';
                                    $img_alt = $image ? $image['alt'] : get_sub_field('title');
                                    ?>
                                    <div class="absolute inset-0 flex h-full items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 transition-opacity duration-200 image-overlay<?php echo $index === 0 ? '' : ' opacity-0'; ?>" data-index="<?php echo $index; ?>">
                                        <img src="<?php echo esc_url($img_url); ?>" 
                                             alt="<?php echo esc_attr($img_alt); ?>" 
                                             class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                                    </div>
                                    <?php
                                    $index++;
                                endwhile;
                            endif;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.section-content');
        const imageOverlays = document.querySelectorAll('.image-overlay');
        let activeIndex = 0;

        function updateActiveSection() {
            const viewportHeight = window.innerHeight;
            const viewportCenter = viewportHeight / 2;
            
            let closestSection = 0;
            let closestDistance = Infinity;

            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const sectionCenter = rect.top + rect.height / 2;
                const distance = Math.abs(sectionCenter - viewportCenter);

                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestSection = index;
                }
            });

            if (activeIndex !== closestSection) {
                activeIndex = closestSection;
                updateImages();
            }
        }

        function updateImages() {
            imageOverlays.forEach((overlay, index) => {
                if (index === activeIndex) {
                    overlay.classList.remove('opacity-0');
                } else {
                    overlay.classList.add('opacity-0');
                }
            });
        }

        window.addEventListener('scroll', updateActiveSection);
        updateActiveSection();
    });
    </script>

    <!-- Testimonios Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">
                <?php echo get_field('testimonios_section')['title'] ?: 'Testimonios'; ?>
            </h2>
            <div class="grid md:grid-cols-2 gap-12">
                <?php 
                if (have_rows('testimonios_section')): 
                    while (have_rows('testimonios_section')): the_row();
                        if (have_rows('testimonios')):
                            while (have_rows('testimonios')): the_row();
                                $foto = get_sub_field('foto');
                                $img_url = $foto ? $foto['url'] : 'https://placehold.co/80x80';
                                $img_alt = $foto ? $foto['alt'] : get_sub_field('nombre');
                                ?>
                                <div class="bg-white border-2 border-gray-200 rounded-xl p-8 relative">
                                    <div class="absolute -top-6 left-8">
                                        <img class="h-20 w-20 rounded-full border-4 border-gray-100" 
                                             src="<?php echo esc_url($img_url); ?>" 
                                             alt="<?php echo esc_attr($img_alt); ?>">
                                    </div>
                                    <div class="mt-8">
                                        <svg class="h-8 w-8 text-yellow-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                        </svg>
                                        <p class="text-gray-700 mb-6"><?php echo get_sub_field('texto'); ?></p>
                                        <div class="border-t border-gray-200 pt-4">
                                            <h3 class="text-lg font-medium text-gray-900"><?php echo get_sub_field('nombre'); ?></h3>
                                            <p class="text-gray-600 text-sm"><?php echo get_sub_field('rol'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
