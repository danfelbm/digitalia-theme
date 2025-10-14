<?php
/**
 * Template Name: Colaboratorios - Espacios
 * Description: Página de espacios y equipamiento de Colaboratorios
 */

get_header();
?>

<div class="absolute inset-x-0 top-0 -z-10 h-full w-full">
    <div class="absolute inset-0 bg-linear-to-b from-teal-50 to-white"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#0f766e_0.8px,transparent_0.8px)] bg-size-[16px_16px] opacity-[0.15]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#115e59_1.2px,transparent_1.2px)] bg-size-[32px_32px] opacity-[0.1]"></div>
</div>

<section class="py-32">
    <div class="container max-w-(--breakpoint-lg)">
        <div>
            <?php if ($header = get_field('header')) : ?>
                <div>
                    <div class="flex justify-center">
                        <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground" style="background-color: <?php echo esc_attr($header['badge_color']); ?>">
                            <?php echo esc_html($header['badge']); ?>
                        </div>
                    </div>
                    <style>
                        @keyframes shadowPulse {
                            0% {
                                box-shadow: 0 10px 15px -3px rgba(13, 148, 136, 0.3), 0 4px 6px -4px rgba(13, 148, 136, 0.3);
                            }
                            50% {
                                box-shadow: 0 15px 25px -5px rgba(13, 148, 136, 0.5), 0 8px 10px -6px rgba(13, 148, 136, 0.5);
                            }
                            100% {
                                box-shadow: 0 10px 15px -3px rgba(13, 148, 136, 0.3), 0 4px 6px -4px rgba(13, 148, 136, 0.3);
                            }
                        }
                        .shadow-pulse {
                            animation: shadowPulse 2s infinite;
                        }
                    </style>
                    <div class="text-center">
                        <h1 class="mt-3 text-3xl font-extrabold"><?php echo esc_html($header['title']); ?></h1>
                        <div class="my-12">
                            <a href="<?php echo esc_url(get_post_type_archive_link('espacio')); ?>" class="inline-block px-10 py-5 text-lg font-semibold text-white bg-teal-600 hover:bg-teal-700 rounded-lg transition-all duration-200 transform hover:-translate-y-0.5 shadow-pulse">Ver mapa de Colaboratorios</a>
                        </div>
                    </div>
                    <div class="mt-2 text-lg text-muted-foreground space-y-4">
                        <?php if (have_rows('header_description')) : ?>
                            <?php while (have_rows('header_description')) : the_row(); ?>
                                <p><?php echo wp_kses_post(get_sub_field('paragraph')); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <?php if ($image = $header['image']) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" 
                             alt="<?php echo esc_attr($image['alt']); ?>" 
                             class="my-8 aspect-video w-full rounded-md object-cover">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($spaces = get_field('spaces')) : ?>
                <section class="mb-8">
                    <h2 class="mb-6 text-2xl font-bold"><?php echo esc_html($spaces['title']); ?></h2>
                    <div class="grid gap-4 md:grid-cols-2">
                        <?php if (have_rows('spaces_items')) : ?>
                            <?php while (have_rows('spaces_items')) : the_row(); ?>
                                <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="flex items-center gap-3 rounded-xl border px-6 py-5 hover:border-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_sub_field('icon')); ?> h-6 w-6 shrink-0">
                                        <?php if (get_sub_field('icon') === 'video') : ?>
                                            <path d="M22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/>
                                        <?php elseif (get_sub_field('icon') === 'monitor') : ?>
                                            <rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/>
                                        <?php elseif (get_sub_field('icon') === 'users') : ?>
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                        <?php elseif (get_sub_field('icon') === 'presentation') : ?>
                                            <path d="M2 3h20"/><path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"/><path d="m7 21 5-5 5 5"/>
                                        <?php endif; ?>
                                    </svg>
                                    <div>
                                        <h2 class="font-semibold"><?php echo esc_html(get_sub_field('title')); ?></h2>
                                        <p class="text-sm text-muted-foreground"><?php echo esc_html(get_sub_field('description')); ?></p>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-32 bg-teal-50/50">
    <div class="container">
        <?php if ($equipment = get_field('equipment')) : ?>
            <h2 class="text-4xl font-semibold text-teal-900"><?php echo esc_html($equipment['title']); ?></h2>
            <p class="mt-3 text-xl font-medium text-teal-700"><?php echo esc_html($equipment['description']); ?></p>
            
            <?php if (!empty($equipment['items'])) : ?>
                <?php foreach ($equipment['items'] as $item) : ?>
                    <div class="mt-16 flex flex-col overflow-hidden rounded-2xl bg-white border-teal-200 border-2 md:flex-row">
                        <?php if (!$item['image_right']) : ?>
                            <div class="flex w-full items-center bg-teal-50 md:w-1/2">
                                <?php if ($item['image']) : ?>
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['image']['alt']); ?>" class="max-h-64 w-full object-cover">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="flex w-full flex-col justify-center gap-6 px-8 py-7 md:w-1/2 md:px-12 md:py-10">
                            <h6 class="text-lg font-semibold md:text-2xl text-teal-800"><?php echo esc_html($item['title']); ?></h6>
                            <div class="h-px w-full bg-teal-200"></div>
                            <p class="text-teal-700"><?php echo esc_html($item['description']); ?></p>
                            <?php if ($item['cta']) : ?>
                                <a href="<?php echo esc_url($item['cta']['link']); ?>" class="inline-flex items-center font-medium text-teal-600 hover:text-teal-800 hover:underline">
                                    <span><?php echo esc_html($item['cta']['text']); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right ml-2 size-4">
                                        <path d="M18 8L22 12L18 16"></path>
                                        <path d="M2 12H22"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($item['image_right']) : ?>
                            <div class="flex w-full items-center bg-teal-50 md:w-1/2">
                                <?php if ($item['image']) : ?>
                                    <img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['image']['alt']); ?>" class="max-h-64 w-full object-cover">
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<section class="py-32 bg-slate-100 text-slate-900">
    <div class="container">
        <?php if ($virtual_tour = get_field('virtual_tour')) : ?>
            <div class="space-y-10 rounded-lg border-2 border-slate-200 py-10 md:px-4 bg-slate-300">
                <div class="grid rounded-lg border-slate-100 border md:grid-cols-2">
                    <div class="flex flex-col px-6 py-8 lg:px-8 lg:py-12 xl:px-12 xl:py-20">
                        <h3 class="mb-3 text-2xl font-medium sm:mb-5 md:text-3xl lg:text-4xl"><?php echo esc_html($virtual_tour['title']); ?></h3>
                        <div class="mb-8 text-sm sm:mb-10 md:text-base">
                            <?php echo esc_html($virtual_tour['description']); ?>
                        </div>
                        <?php if (!empty($virtual_tour['features'])) : ?>
                            <ul class="mt-auto space-y-2 sm:space-y-3">
                                <?php foreach ($virtual_tour['features'] as $feature) : ?>
                                    <li class="flex gap-x-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big mt-0.5 size-4 shrink-0 sm:mt-1">
                                            <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                                            <path d="m9 11 3 3L22 4"></path>
                                        </svg>
                                        <p class="text-sm md:text-base"><?php echo esc_html($feature['text']); ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($virtual_tour['button'])) : ?>
                            <button onclick="<?php echo esc_attr($virtual_tour['button']['action']); ?>" class="mt-8 inline-flex items-center justify-center rounded-md bg-teal-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-teal-700">
                                <?php echo esc_html($virtual_tour['button']['text']); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-view ml-2 h-5 w-5">
                                    <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/>
                                    <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/>
                                    <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/>
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                    <div class="relative order-first max-h-80 md:order-last md:max-h-[500px] bg-teal-50">
                        <?php if (!empty($virtual_tour['image'])) : ?>
                            <img src="<?php echo esc_url($virtual_tour['image']['url']); ?>" 
                                 alt="<?php echo esc_attr($virtual_tour['image']['alt']); ?>" 
                                 class="h-full w-full object-cover">
                            <span class="absolute left-5 top-5 flex size-6 items-center justify-center rounded-sm bg-teal-600 font-mono text-xs text-white md:left-10 md:top-10">360°</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="m-x-auto container flex flex-col items-start gap-20 py-32 bg-linear-to-t from-teal-50/50 to-white md:flex-row md:items-center">
    <?php if ($accessibility = get_field('accessibility')) : ?>
        <div class="w-full lg:w-[40%]">
            <h2 class="mb-8 text-2xl font-extrabold text-teal-900"><?php echo esc_html($accessibility['title']); ?></h2>
            <p class="mb-10 text-xl text-teal-700"><?php echo esc_html($accessibility['description']); ?></p>
            
            <?php if (!empty($accessibility['features'])) : ?>
                <ul class="mb-14 flex flex-col gap-4 text-teal-700">
                    <?php foreach ($accessibility['features'] as $feature) : ?>
                        <li class="flex items-center gap-2 text-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-7 text-teal-600">
                                <path d="M20 6 9 17l-5-5"></path>
                            </svg>
                            <?php echo esc_html($feature['text']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <?php if (!empty($accessibility['button'])) : ?>
                <a href="<?php echo esc_url($accessibility['button']['link']); ?>" 
                   class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-teal-200 bg-white hover:bg-teal-50 text-teal-700 h-10 px-4 py-2">
                    <?php echo esc_html($accessibility['button']['text']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 h-4 w-4">
                        <path d="M9 18 6 15l-6-6"></path>
                    </svg>
                </a>
            <?php endif; ?>
        </div>

        <div class="relative flex h-[430px] w-full p-4 before:absolute before:inset-0 before:bg-teal-600/50 before:mask-[url(/wp-content/themes/digitalia/page-templates/subpage-templates/colaboratorios/cross-pattern.svg)] before:mask-repeat before:mask-size-[32px_32px]">
            <div class="z-1 absolute inset-0 bg-[radial-gradient(ellipse_at_center,var(--tw-gradient-stops))] from-transparent to-white opacity-90"></div>
            <div class="relative m-auto w-[80%]">
                <?php if (!empty($accessibility['image'])) : ?>
                    <img src="<?php echo esc_url($accessibility['image']['url']); ?>" 
                         alt="<?php echo esc_attr($accessibility['image']['alt']); ?>" 
                         class="z-50 max-h-[350px] w-full rounded-md object-cover">
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<script>
function loadTourVirtual() {
    // Here you can add the code to load your 360° tour
    console.log('Loading 360° tour...');
}
</script>

<?php
get_footer();
