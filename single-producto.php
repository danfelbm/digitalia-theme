<?php
/**
 * The template for displaying single producto posts
 *
 * @package digitalia
 */

get_header();

while (have_posts()) :
    the_post();
    
    // Get ACF fields
    $excerpt_details = get_field('excerpt_details');
    $reviewer = get_field('reviewer');
    $key_features = get_field('key_features');
    $social_media = get_field('social_media');
    $organization = get_field('organization');
?>

<main class="colaboratorios-producto">
    <section class="py-32">
        <div class="container">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo home_url(); ?>" class="inline-flex items-center text-teal-600 hover:text-teal-900">
                            <i class="fa-solid fa-house h-4 w-4"></i>
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-gray-400 mx-1"></i>
                            <a href="<?php echo get_post_type_archive_link('producto'); ?>" class="ml-1 text-sm font-medium text-teal-600 hover:text-teal-900 md:ml-2">Productos</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fa-solid fa-chevron-right w-3 h-3 text-gray-400 mx-1"></i>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?php the_title(); ?></span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h1 class="mt-7 text-3xl font-semibold text-teal-900 md:text-5xl">
                <?php the_title(); ?>
            </h1>

            <div class="relative mt-12 grid gap-16 md:grid-cols-2">
                <article class="prose order-2 mx-auto md:order-1 prose-headings:text-teal-900 prose-a:text-teal-600 prose-blockquote:text-teal-700 prose-strong:text-teal-700">
                    <div>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array(
                                'class' => 'mb-8 mt-0 aspect-video w-full rounded-lg object-cover',
                                'alt' => get_the_title()
                            )); ?>
                        <?php endif; ?>
                    </div>
                    <?php the_content(); ?>
                </article>

                <div class="order-1 h-fit md:sticky md:top-20 md:order-2">
                    <?php if ($excerpt_details) : ?>
                        <p class="mb-2 text-lg font-semibold text-teal-900">
                            Resumen del documento
                        </p>
                        <p class="text-teal-600">
                            <?php echo esc_html($excerpt_details['excerpt_text']); ?>
                        </p>
                        <?php if ($excerpt_details['download_button']['file']) : ?>
                            <a href="<?php echo esc_url($excerpt_details['download_button']['file']['url']); ?>" 
                               class="mt-6 inline-flex h-11 items-center justify-center rounded-md bg-teal-600 px-8 text-sm font-medium text-white transition-colors hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50">
                                <?php echo esc_html($excerpt_details['download_button']['text']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="my-6 h-px bg-teal-100"></div>

                    <?php if ($reviewer) : ?>
                        <div class="flex gap-3">
                            <div class="size-10 rounded-full border overflow-hidden">
                                <?php if ($reviewer['image']) : ?>
                                    <img src="<?php echo esc_url($reviewer['image']['url']); ?>" 
                                         alt="<?php echo esc_attr($reviewer['name']); ?>"
                                         class="h-full w-full object-cover" />
                                <?php endif; ?>
                            </div>
                            <div>
                                <h2 class="text-sm font-medium text-teal-900">Revisado por <?php echo esc_html($reviewer['name']); ?></h2>
                                <p class="text-sm text-teal-600">
                                    <?php echo esc_html($reviewer['role']); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="my-6 h-px bg-teal-100"></div>

                    <?php if ($key_features) : ?>
                        <p class="mb-4 text-sm font-medium text-teal-900">Características Principales</p>
                        <ul class="flex flex-col gap-2">
                            <?php foreach ($key_features as $feature) : ?>
                                <li class="flex items-center gap-2">
                                    <i class="fa-solid fa-circle-check h-4 w-4 text-teal-600"></i>
                                    <p class="text-teal-700"><?php echo esc_html($feature['feature']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ($social_media) : ?>
                        <div class="my-6 h-px bg-teal-100"></div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-teal-900">Compartir este producto</p>
                            <ul class="flex gap-2">
                                <?php if ($social_media['facebook']) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($social_media['facebook']); ?>" 
                                           class="inline-flex rounded-full border border-teal-200 p-2 text-teal-600 transition-colors hover:bg-teal-50"
                                           target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-facebook-f h-4 w-4"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($social_media['twitter']) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($social_media['twitter']); ?>" 
                                           class="inline-flex rounded-full border border-teal-200 p-2 text-teal-600 transition-colors hover:bg-teal-50"
                                           target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-x-twitter h-4 w-4"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($social_media['linkedin']) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($social_media['linkedin']); ?>" 
                                           class="inline-flex rounded-full border border-teal-200 p-2 text-teal-600 transition-colors hover:bg-teal-50"
                                           target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-linkedin-in h-4 w-4"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($social_media['instagram']) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($social_media['instagram']); ?>" 
                                           class="inline-flex rounded-full border border-teal-200 p-2 text-teal-600 transition-colors hover:bg-teal-50"
                                           target="_blank" rel="noopener noreferrer">
                                            <i class="fa-brands fa-instagram h-4 w-4"></i>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($organization) : ?>
                        <div class="my-6 h-px bg-teal-100"></div>
                        <div class="flex items-center gap-4">
                            <?php if ($organization['logo']) : ?>
                                <div class="h-12 w-12 rounded-full border overflow-hidden">
                                    <img src="<?php echo esc_url($organization['logo']['url']); ?>" 
                                         alt="<?php echo esc_attr($organization['name']); ?>"
                                         class="h-full w-full object-cover" />
                                </div>
                            <?php endif; ?>
                            <div>
                                <p class="text-sm font-medium text-teal-900">Organización</p>
                                <p class="text-sm text-teal-600"><?php echo esc_html($organization['name']); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
endwhile;
get_footer();
?>
