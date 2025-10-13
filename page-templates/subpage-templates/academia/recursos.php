<?php
/**
 * Template Name: Academia - Recursos y Herramientas
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-white">
    <section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-yellow-950 bg-yellow-50">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">
                    <?php echo get_field('hero_title') ?: 'Biblioteca Digital de Conocimiento'; ?>
                </h2>
                <p class="mb-8 lg:text-lg">
                    <?php echo get_field('hero_description'); ?>
                </p>
                <a href="<?php echo esc_url(get_field('hero_cta_url')); ?>" 
                   class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    <?php echo esc_html(get_field('cta_text')); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!-- Biblioteca Digital Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-12 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <?php
                // Get the "academia" category
                $academia_cat = get_category_by_slug('academia');
                if ($academia_cat) {
                    // Get child categories of "academia"
                    $categories = get_categories(array(
                        'child_of' => $academia_cat->term_id,
                        'hide_empty' => false
                    ));

                    // Define icons for categories (you can move this to a function or settings)
                    $category_icons = array(
                        'materiales' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />',
                        'guias' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />',
                        'multimedia' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />',
                    );

                    foreach ($categories as $category) :
                        $icon = $category_icons[$category->slug] ?? $category_icons['materiales']; // Default to materiales icon
                        $category_link = get_category_link($category->term_id);
                        ?>
                        <article class="flex flex-col items-start">
                            <div class="rounded-lg bg-white p-6 w-full border border-slate-200">
                                <div class="flex items-center gap-x-4 mb-4">
                                    <svg class="h-6 w-6 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <?php echo $icon; ?>
                                    </svg>
                                    <h3 class="text-lg font-semibold leading-6 text-slate-900">
                                        <?php echo $category->name; ?>
                                    </h3>
                                </div>
                                <p class="mt-4 text-base leading-7 text-slate-600">
                                    <?php echo $category->description; ?>
                                </p>
                                <div class="mt-4">
                                    <a href="<?php echo esc_url($category_link); ?>" 
                                       class="text-sm font-semibold leading-6 text-slate-800 hover:text-slate-900">
                                        Ver contenido <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </div>
                        </article>
                        <?php
                    endforeach;
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Centro de Apoyo Section -->
    <section class="bg-slate-200 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
                <?php 
                $centro_apoyo = get_field('centro_apoyo_section');
                if ($centro_apoyo) : ?>
                    <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900"><?php echo esc_html($centro_apoyo['title']); ?></h2>
                    <?php if (have_rows('centro_apoyo_section')): ?>
                        <?php while (have_rows('centro_apoyo_section')): the_row(); ?>
                            <?php if (have_rows('faqs')): ?>
                                <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                                    <?php while (have_rows('faqs')): the_row(); ?>
                                        <div class="pt-6">
                                            <dt>
                                                <button type="button" class="flex w-full items-start justify-between text-left text-gray-900">
                                                    <span class="text-base font-semibold leading-7"><?php echo esc_html(get_sub_field('question')); ?></span>
                                                    <span class="ml-6 flex h-7 items-center">
                                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                        </svg>
                                                    </span>
                                                </button>
                                            </dt>
                                            <dd class="mt-2 pr-12">
                                                <p class="text-base leading-7 text-gray-600"><?php echo wp_kses_post(get_sub_field('answer')); ?></p>
                                            </dd>
                                        </div>
                                    <?php endwhile; ?>
                                </dl>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
