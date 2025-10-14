<?php
/**
 * Template Name: Módulo CoLaboratorios
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="absolute inset-x-0 top-0 -z-10 h-full w-full">
        <div class="absolute inset-0 bg-linear-to-b from-teal-50 to-white"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#0f766e_0.8px,transparent_0.8px)] bg-size-[16px_16px] opacity-[0.15]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#115e59_1.2px,transparent_1.2px)] bg-size-[32px_32px] opacity-[0.1]"></div>
    </div>
    
    <section class="pt-32">
        <div class="container">
            <div class="relative pb-16">
                
                <a href="<?php echo esc_url(get_field('hero')['badge']['link']); ?>" class="mx-auto flex w-fit items-center gap-2 rounded-lg bg-teal-50 p-3 sm:rounded-full sm:py-1 sm:pl-1 sm:pr-3">
                    <div class="items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-offset-2 border-transparent bg-teal-700 text-white hover:bg-teal-600 hidden sm:block">
                        <?php echo esc_html(get_field('hero')['badge']['label']); ?>
                    </div>
                    <p class="flex items-center gap-1 text-sm text-teal-900">
                        <?php echo esc_html(get_field('hero')['badge']['text']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right mt-0.5 size-4 shrink-0">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </a>

                <?php 
                $hero_fields = get_field('hero');
                
                if ($hero_fields && is_array($hero_fields)) : ?>
                    <h1 class="mx-auto my-5 max-w-(--breakpoint-lg) text-balance text-center text-3xl md:text-5xl text-teal-900">
                        <?php echo esc_html($hero_fields['hero_title']); ?>
                    </h1>

                    <p class="mx-auto max-w-(--breakpoint-md) text-center text-sm text-teal-700 md:text-base">
                        <?php echo esc_html($hero_fields['hero_description']); ?>
                    </p>

                    <div class="mt-8 flex items-center justify-center gap-3">
                        <?php if (!empty($hero_fields['cta_primary'])) : ?>
                        <a href="<?php echo esc_url($hero_fields['cta_primary']['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-600 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-700 text-white hover:bg-teal-600 h-10 px-4 py-2">
                            <?php echo esc_html($hero_fields['cta_primary']['text']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 size-4">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($hero_fields['cta_secondary'])) : ?>
                        <a href="<?php echo esc_url($hero_fields['cta_secondary']['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-600 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-teal-200 bg-white hover:bg-teal-50 hover:text-teal-700 h-10 px-4 py-2 text-teal-900">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-play mr-2 size-4">
                                <polygon points="6 3 20 12 6 21 6 3"></polygon>
                            </svg>
                            <?php echo esc_html($hero_fields['cta_secondary']['text']); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php else: 
                    // Debug: If hero fields not found
                    echo '<!-- Hero fields not found or not an array. Post ID: ' . get_the_ID() . ' -->';
                endif; ?>
                <div class="mt-5 flex justify-center">
                    <a href="<?php echo esc_url(get_field('hero')['additional_link']['url']); ?>" class="flex items-center gap-1 border-b border-dashed text-sm hover:border-solid hover:border-teal-600 text-teal-700">
                        <?php echo esc_html(get_field('hero')['additional_link']['text']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right size-3.5">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="rounded-t-lg border-x border-t border-teal-100 px-1 pt-1">
                <?php 
                $hero_image = get_field('hero')['image'];
                $image_url = $hero_image ? $hero_image['url'] : 'https://placehold.co/1200x430/teal/white/png?text=Colaboratorios(1200x430)';
                $image_alt = $hero_image ? $hero_image['alt'] : 'Colaboratorios - Espacios de innovación';
                ?>
                <div class="map-container relative">
                    <?php if( have_rows('hero')): while( have_rows('hero') ): the_row(); 
                        if( have_rows('locations') ): ?>
                            <div class="acf-map rounded-t-lg border-x border-t border-teal-100 px-1 pt-1" data-zoom="5">
                                <?php while ( have_rows('locations') ) : the_row(); 
                                    $location = get_sub_field('location');
                                    $title = get_sub_field('title');
                                    $description = get_sub_field('description');
                                    $link = get_sub_field('link');
                                    ?>
                                    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                        <a href="<?php echo esc_url($link); ?>">
                                            <h3 class="font-bold text-lg mb-2"><?php echo esc_html($title); ?></h3>
                                            <p class="mb-2"><?php echo esc_html($description); ?></p>
                                            <p class="mb-3"><em><?php echo esc_html($location['address']); ?></em></p>
                                            <button class="inline-flex items-center px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                                Ver espacio
                                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                    endwhile; endif; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="max-h-80 w-full rounded-t-lg object-cover md:max-h-[430px] fallback-image">
                </div>
            </div>
        </div>
    </section>

    <section id="acerca" class="bg-teal-900 pb-32 pt-12">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-(--breakpoint-md) flex-col items-center justify-center gap-4 lg:items-start">
                    <div class="rounded-full border border-teal-400 text-teal-400 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_field('about')['badge']['icon']); ?> h-auto w-4">
                            <?php if (get_field('about')['badge']['icon'] === 'code-2') : ?>
                                <path d="m18 16 4-4-4-4"></path>
                                <path d="m6 8-4 4 4 4"></path>
                                <path d="m14.5 4-5 16"></path>
                            <?php endif; ?>
                        </svg>
                        <?php echo esc_html(get_field('about')['badge']['text']); ?>
                    </div>
                    <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl text-white">
                        <?php echo esc_html(get_field('about')['title']); ?>
                    </h2>
                    <p class="text-center text-teal-200 lg:text-left lg:text-lg">
                        <?php echo esc_html(get_field('about')['description']); ?>
                    </p>
                    <a href="<?php echo esc_url(get_field('about')['cta']['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-500 text-white hover:bg-teal-400 h-11 rounded-md px-8">
                        <?php echo esc_html(get_field('about')['cta']['text']); ?>
                    </a>
                    <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400"><?php echo esc_html(get_field('about')['stats']['departments']['number']); ?></p>
                                <p class="text-teal-200"><?php echo esc_html(get_field('about')['stats']['departments']['label']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-px h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400"><?php echo esc_html(get_field('about')['stats']['spaces']['number']); ?></p>
                                <p class="text-teal-200"><?php echo esc_html(get_field('about')['stats']['spaces']['label']); ?></p>
                            </div>
                        </div>
                        <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-px hidden h-auto md:block"></div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-teal-700 h-px w-full block md:hidden"></div>
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400"><?php echo esc_html(get_field('about')['stats']['access']['number']); ?></p>
                                <p class="text-teal-200"><?php echo esc_html(get_field('about')['stats']['access']['label']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-px h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400"><?php echo esc_html(get_field('about')['stats']['free']['number']); ?></p>
                                <p class="text-teal-200"><?php echo esc_html(get_field('about')['stats']['free']['label']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <?php 
                    $media = get_field('about')['media'];
                    if ($media) {
                        $mime_type = $media['mime_type'];
                        if (strpos($mime_type, 'video') !== false) {
                            echo '<video class="ml-auto max-h-[450px] w-full rounded-xl object-cover" controls loop>';
                            echo '<source src="' . esc_url($media['url']) . '" type="' . esc_attr($mime_type) . '">';
                            echo 'Your browser does not support the video tag.';
                            echo '</video>';
                        } else {
                            echo '<img src="' . esc_url($media['url']) . '" alt="' . esc_attr($media['alt'] ?? 'CoLaboratorios - Espacios de Innovación Digital') . '" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">';
                        }
                    } else {
                        echo '<img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="CoLaboratorios - Espacios de Innovación Digital" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">';
                    }
                    ?>
                </div>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <?php if (have_rows('about_features', get_the_ID())) : ?>
                    <?php while (have_rows('about_features', get_the_ID())) : the_row(); ?>
                        <div class="flex flex-col gap-4">
                            <div class="gap flex flex-col gap-3 rounded-lg border border-teal-700 bg-teal-800/50 p-6">
                                <div class="flex flex-col items-center gap-2 lg:flex-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_sub_field('icon')); ?> h-auto w-6 text-teal-400">
                                        <?php if (get_sub_field('icon') === 'lightbulb') : ?>
                                            <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"></path>
                                            <path d="M9 18h6"></path>
                                            <path d="M10 22h4"></path>
                                        <?php elseif (get_sub_field('icon') === 'users') : ?>
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <?php elseif (get_sub_field('icon') === 'shield-check') : ?>
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                            <path d="m9 12 2 2 4-4"></path>
                                        <?php endif; ?>
                                    </svg>
                                    <h3 class="text-center text-lg font-medium lg:text-left text-white"><?php echo esc_html(get_sub_field('title')); ?></h3>
                                </div>
                                <p class="text-center text-sm text-teal-200 md:text-base lg:text-left"><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-teal-50 py-32">
        <div class="container">
            <div class="relative grid gap-16 md:grid-cols-2">
                <div class="top-40 h-fit md:sticky">
                    <p class="font-medium text-teal-600"><?php echo esc_html(get_field('approach')['label']); ?></p>
                    <h2 class="mb-6 mt-4 text-4xl font-semibold md:text-5xl text-teal-950"><?php echo esc_html(get_field('approach')['title']); ?></h2>
                    <p class="font-medium md:text-xl text-teal-700"><?php echo esc_html(get_field('approach')['description']); ?></p>
                    <div class="mt-8 flex flex-col gap-4 lg:flex-row">
                        <?php if ($primary_cta = get_field('approach')['cta_primary']) : ?>
                            <a href="<?php echo esc_url($primary_cta['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-600 text-white hover:bg-teal-500 h-11 rounded-md px-8 gap-2">
                                <?php echo esc_html($primary_cta['text']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($secondary_cta = get_field('approach')['cta_secondary']) : ?>
                            <a href="<?php echo esc_url($secondary_cta['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-teal-300 bg-white text-teal-700 hover:bg-teal-50 h-11 rounded-md px-8 gap-2">
                                <?php echo esc_html($secondary_cta['text']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex flex-col gap-12 md:gap-20">
                    <?php if (have_rows('approach_cards')) : ?>
                        <?php while (have_rows('approach_cards')) : the_row(); ?>
                            <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                                <?php if ($image = get_sub_field('image')) : ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                                <?php endif; ?>
                                <div class="p-6">
                                    <h3 class="mb-1 text-2xl font-semibold text-teal-900"><?php echo esc_html(get_sub_field('title')); ?></h3>
                                    <p class="text-teal-600"><?php echo esc_html(get_sub_field('description')); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
