<?php
/**
 * Template Name: Ready - Formación
 * 
 * @package Digitalia
 */

get_header();
?>

<section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-purple-950 bg-purple-50">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6"><?php echo esc_html(get_field('ready_formacion_hero')['title']); ?></h2>
                <p class="mb-8 lg:text-lg"><?php echo esc_html(get_field('ready_formacion_hero')['description']); ?></p>
                <a href="<?php echo esc_url(get_field('ready_formacion_hero')['cta']['url']); ?>" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    <?php echo esc_html(get_field('ready_formacion_hero')['cta']['text']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <section class="py-32 bg-purple-200">
        <div class="container">
            <p class="mb-4 text-sm text-purple-600 lg:text-base"><?php echo esc_html(get_field('ready_formacion_competencias')['badge']); ?></p>
            <h2 class="text-3xl font-medium text-purple-950 lg:text-4xl"><?php echo esc_html(get_field('ready_formacion_competencias')['title']); ?></h2>
            <div class="mt-14 grid gap-6 lg:mt-20 lg:grid-cols-3">
                <?php if(have_rows('ready_formacion_competencias_items')): ?>
                    <?php while(have_rows('ready_formacion_competencias_items')): the_row(); ?>
                        <div class="rounded-lg bg-purple-100 p-5">
                            <span class="mb-8 flex size-12 items-center justify-center rounded-full bg-purple-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_sub_field('icon')); ?> size-6">
                                    <?php if (get_sub_field('icon') === 'graduation-cap'): ?>
                                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                                    <?php elseif (get_sub_field('icon') === 'computer'): ?>
                                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                                        <line x1="8" x2="16" y1="21" y2="21"/>
                                        <line x1="12" x2="12" y1="17" y2="21"/>
                                    <?php elseif (get_sub_field('icon') === 'share'): ?>
                                        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/>
                                        <polyline points="16 6 12 2 8 6"/>
                                        <line x1="12" y1="2" x2="12" y2="15"/>
                                    <?php endif; ?>
                                </svg>
                            </span>
                            <h3 class="mb-2 text-xl font-medium text-purple-950"><?php echo esc_html(get_sub_field('title')); ?></h3>
                            <p class="leading-7 text-purple-700"><?php echo esc_html(get_sub_field('description')); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="py-32">
        <div class="container">
            <h2 class="text-4xl font-semibold text-purple-950"><?php echo esc_html(get_field('ready_formacion_integral')['title']); ?></h2>
            <p class="mt-3 text-xl font-medium text-purple-600"><?php echo esc_html(get_field('ready_formacion_integral')['subtitle']); ?></p>
            
            <div class="mt-16 flex flex-col overflow-hidden rounded-2xl bg-purple-50 md:flex-row">
                <div class="flex w-full items-center bg-purple-100 md:w-1/2">
                    <?php 
                    $metodologia_image = get_field('ready_formacion_integral')['metodologia']['image'];
                    if ($metodologia_image): ?>
                        <img src="<?php echo esc_url($metodologia_image['url']); ?>" 
                             alt="<?php echo esc_attr($metodologia_image['alt']); ?>" 
                             class="max-h-64 w-full object-cover">
                    <?php endif; ?>
                </div>
                <div class="flex w-full flex-col justify-center gap-6 px-8 py-7 md:w-1/2 md:px-12 md:py-10">
                    <h6 class="text-lg font-semibold text-purple-950 md:text-2xl"><?php echo esc_html(get_field('ready_formacion_integral')['metodologia']['title']); ?></h6>
                    <div class="h-px w-full bg-purple-200"></div>
                    <p class="text-purple-700"><?php echo esc_html(get_field('ready_formacion_integral')['metodologia']['description']); ?></p>
                    <a href="<?php echo esc_url(get_field('ready_formacion_integral')['metodologia']['cta']['url']); ?>" class="inline-flex items-center font-medium text-purple-950 hover:text-purple-700 hover:underline">
                        <span><?php echo esc_html(get_field('ready_formacion_integral')['metodologia']['cta']['text']); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right ml-2 size-4">
                            <path d="M18 8L22 12L18 16"></path>
                            <path d="M2 12H22"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="mt-16 flex flex-col overflow-hidden rounded-2xl bg-purple-50 md:flex-row">
                <div class="flex w-full flex-col justify-center gap-6 px-8 py-7 md:w-1/2 md:px-12 md:py-10">
                    <h6 class="text-lg font-semibold text-purple-950 md:text-2xl"><?php echo esc_html(get_field('ready_formacion_integral')['evaluacion']['title']); ?></h6>
                    <div class="h-px w-full bg-purple-200"></div>
                    <p class="text-purple-700"><?php echo esc_html(get_field('ready_formacion_integral')['evaluacion']['description']); ?></p>
                    <a href="<?php echo esc_url(get_field('ready_formacion_integral')['evaluacion']['cta']['url']); ?>" class="inline-flex items-center font-medium text-purple-950 hover:text-purple-700 hover:underline">
                        <span><?php echo esc_html(get_field('ready_formacion_integral')['evaluacion']['cta']['text']); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right ml-2 size-4">
                            <path d="M18 8L22 12L18 16"></path>
                            <path d="M2 12H22"></path>
                        </svg>
                    </a>
                </div>
                <div class="flex w-full items-center bg-purple-100 md:w-1/2">
                    <?php 
                    $evaluacion_image = get_field('ready_formacion_integral')['evaluacion']['image'];
                    if ($evaluacion_image): ?>
                        <img src="<?php echo esc_url($evaluacion_image['url']); ?>" 
                             alt="<?php echo esc_attr($evaluacion_image['alt']); ?>" 
                             class="max-h-64 w-full object-cover">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
