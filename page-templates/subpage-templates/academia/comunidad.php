<?php
/**
 * Template Name: Academia - Comunidad y Colaboración
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-white">
    <section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-yellow-950 bg-yellow-50">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <?php 
                $hero_section = get_field('hero_section');
                
                $title = !empty($hero_section['hero_title']) ? $hero_section['hero_title'] : 'Ecosistema Digital Educativo';
                $description = !empty($hero_section['hero_description']) ? $hero_section['hero_description'] : 'Plataforma integral de formación que combina tecnología y educación para fortalecer las competencias digitales y promover la alfabetización mediática con enfoque de paz.';
                $cta_text = !empty($hero_section['cta_text']) ? $hero_section['cta_text'] : 'Conoce más';
                $cta_link = !empty($hero_section['cta_link']) ? $hero_section['cta_link'] : '#';
                ?>
                
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6"><?php echo esc_html($title); ?></h2>
                <p class="mb-8 lg:text-lg"><?php echo esc_html($description); ?></p>
                <a href="<?php echo esc_url($cta_link); ?>" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    <?php echo esc_html($cta_text); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Red de Aprendizaje Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <?php 
            $red_section = get_field('red_aprendizaje');
            if ($red_section): ?>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl"><?php echo esc_html($red_section['title']); ?></h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600"><?php echo esc_html($red_section['description']); ?></p>
                </div>
                <?php if (!empty($red_section['mentors'])): ?>
                    <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        <?php foreach ($red_section['mentors'] as $mentor): ?>
                            <li>
                                <?php if (!empty($mentor['image'])): ?>
                                    <img class="aspect-3/2 w-full rounded-2xl object-cover object-top" 
                                         src="<?php echo esc_url($mentor['image']['url']); ?>" 
                                         alt="<?php echo esc_attr($mentor['name']); ?>">
                                <?php endif; ?>
                                <h3 class="mt-6 text-lg font-semibold leading-8 text-slate-900">
                                    <?php echo esc_html($mentor['name']); ?>
                                </h3>
                                <p class="text-base leading-7 text-slate-600">
                                    <?php echo esc_html($mentor['role']); ?>
                                </p>
                                <ul role="list" class="mt-6 flex gap-x-6">
                                    <?php if (!empty($mentor['linkedin_url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($mentor['linkedin_url']); ?>" class="text-slate-600 hover:text-slate-800">
                                                <span class="sr-only">LinkedIn</span>
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($mentor['twitter_url'])): ?>
                                        <li>
                                            <a href="<?php echo esc_url($mentor['twitter_url']); ?>" class="text-slate-600 hover:text-slate-800">
                                                <span class="sr-only">Twitter</span>
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                </svg>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (!empty($red_section['cta_text']) && !empty($red_section['cta_url'])): ?>
                    <div class="mt-16 flex justify-center">
                        <a href="<?php echo esc_url($red_section['cta_url']); ?>" 
                           class="rounded-md bg-blue-600 px-6 py-3 text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                            <?php echo esc_html($red_section['cta_text']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Eventos y Actividades Section -->
    <section class="py-24 sm:py-32 bg-slate-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <?php 
            $eventos_section = get_field('eventos');
            if ($eventos_section): ?>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl"><?php echo esc_html($eventos_section['title']); ?></h2>
                    <p class="mt-2 text-lg leading-8 text-slate-600"><?php echo esc_html($eventos_section['description']); ?></p>
                </div>
                <?php if (!empty($eventos_section['events'])): ?>
                    <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                        <?php foreach ($eventos_section['events'] as $event): ?>
                            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-slate-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                                <?php if (!empty($event['image'])): ?>
                                    <img src="<?php echo esc_url($event['image']['url']); ?>" 
                                         alt="<?php echo esc_attr($event['title']); ?>" 
                                         class="absolute inset-0 -z-10 h-full w-full object-cover">
                                <?php endif; ?>
                                <div class="absolute inset-0 -z-10 bg-linear-to-t from-slate-900 via-slate-900/40"></div>
                                <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-slate-900/10"></div>

                                <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-slate-300">
                                    <time datetime="<?php echo esc_attr($event['date']); ?>">
                                        <?php echo date_i18n('F j, Y', strtotime($event['date'])); ?>
                                    </time>
                                    <div class="-ml-4 flex items-center gap-x-4">
                                        <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                            <circle cx="1" cy="1" r="1" />
                                        </svg>
                                        <div class="flex gap-x-2.5"><?php echo esc_html($event['type']); ?></div>
                                    </div>
                                </div>
                                <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                                    <a href="<?php echo !empty($event['url']) ? esc_url($event['url']) : '#'; ?>">
                                        <span class="absolute inset-0"></span>
                                        <?php echo esc_html($event['title']); ?>
                                    </a>
                                </h3>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Foros Section -->
    <section class="py-32">
        <div class="container px-0 md:px-8">
            <?php 
            $foros_section = get_field('foros');
            if ($foros_section): ?>
                <h1 class="mb-10 px-4 text-3xl font-semibold md:mb-14 md:text-4xl">
                    <?php echo esc_html($foros_section['title']); ?>
                </h1>
                <?php if (!empty($foros_section['items'])): ?>
                    <div class="flex flex-col">
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                        
                        <?php foreach ($foros_section['items'] as $item): ?>
                            <div class="grid items-center gap-4 px-4 py-5 md:grid-cols-4">
                                <div class="order-2 flex items-center gap-2 md:order-0">
                                    <span class="flex h-14 w-16 shrink-0 items-center justify-center rounded-md bg-muted">
                                        <i class="fa <?php echo esc_attr($item['icon']); ?> fa-lg"></i>
                                    </span>
                                    <div class="flex flex-col gap-1">
                                        <h3 class="font-semibold"><?php echo esc_html($item['category']); ?></h3>
                                        <p class="text-sm text-muted-foreground"><?php echo esc_html($item['subcategory']); ?></p>
                                    </div>
                                </div>
                                <p class="order-1 text-2xl font-semibold md:order-0 md:col-span-2">
                                    <?php echo esc_html($item['title']); ?>
                                </p>
                                <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 order-3 ml-auto w-fit gap-2 md:order-0" 
                                   href="<?php echo esc_url($item['url']); ?>">
                                    <span>Ver proyecto</span>
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
