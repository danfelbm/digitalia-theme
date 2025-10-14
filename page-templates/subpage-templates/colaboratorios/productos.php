<?php
/**
 * Template Name: Colaboratorios - Productos
 * Description: Plantilla para mostrar los productos realizados en talleres Co-Laboratorios
 */

get_header();
?>

<main class="colaboratorios-productos">
    <section class="relative overflow-hidden bg-teal-50/50 pb-12 pt-28 md:pb-20 md:pt-40 lg:pt-48">
        <div class="container relative z-10">
            <div class="grid grid-cols-1 gap-x-20 gap-y-10 md:grid-cols-[1fr_1fr] xl:gap-x-48">
                <div>
                    <div class="flex h-full flex-col justify-between gap-6 md:gap-24">
                        <div>
                            <h1 class="mb-4 text-5xl font-bold leading-tight text-teal-900 lg:text-[3.625rem] xl:text-6xl">
                                Productos Co-Laboratorios
                            </h1>
                            <p class="text-lg text-teal-600">
                                Descubre los productos innovadores creados por organizaciones sociales y población diferencial en nuestros talleres Co-Laboratorios. Una vitrina digital que refleja el talento y la creatividad de Colombia.
                            </p>
                        </div>
                        <div class="flex flex-wrap items-center gap-5">
                            <a href="#productos" 
                               class="group flex h-fit w-fit items-center gap-2 rounded-full px-8 py-3 bg-teal-600 hover:bg-teal-700 transition-colors">
                                <div class="font-medium text-white">
                                    Ver Productos
                                </div>
                                <div class="relative h-6 w-7 overflow-hidden">
                                    <div class="absolute left-0 top-0 flex -translate-x-1/2 items-center transition-all duration-500 group-hover:translate-x-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6! w-6! stroke-white px-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14m-7-7 7 7-7 7"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6! w-6! stroke-white px-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14m-7-7 7 7-7 7"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <p class="text-teal-600">
                                Innovación social • Transformación digital
                            </p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="h-full w-full md:max-w-150">
                        <img
                            src="https://shadcnblocks.com/images/block/placeholder-dark-1.svg"
                            alt="Productos Co-Laboratorios"
                            class="aspect-[1.026845638/1] h-full w-full rounded-xl object-cover object-center lg:aspect-[1.34529148/1]"
                        />
                    </div>
                    <div class="absolute bottom-[4%] left-[4%] w-36 lg:w-56">
                        <div class="relative overflow-hidden rounded-lg border shadow-sm" style="aspect-ratio: 1.140102041 / 1">
                            <img
                                src="https://shadcnblocks.com/images/block/placeholder-white-1.svg"
                                alt="Detalle de producto Co-Laboratorios"
                                class="h-full w-full object-cover object-center"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute -top-36 right-0 hidden w-1/2 rounded-bl-[1.875rem] md:block md:h-137.5 xl:h-166.25">
            <img
                src="https://shadcnblocks.com/images/block/placeholder-8-wide.svg"
                alt="Fondo decorativo"
                class="h-full w-full object-cover object-center"
            />
        </div>
    </section>

    <section class="py-32" id="productos">
        <div class="container">
            <div class="mb-8 md:mb-14 lg:mb-16">
                <p class="text-wider mb-4 text-sm font-medium text-teal-600">
                    Co-Laboratorios
                </p>
                <h2 class="mb-4 w-full text-4xl font-medium text-teal-900 md:mb-5 md:text-5xl lg:mb-6 lg:text-6xl">
                    Productos Destacados
                </h2>
                <p class="text-teal-600">Descubre las creaciones innovadoras de nuestras organizaciones sociales</p>
            </div>
            <div class="grid gap-x-4 gap-y-8 md:grid-cols-2 lg:gap-x-6 lg:gap-y-12 2xl:grid-cols-3">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'producto',
                    'posts_per_page' => 9,
                    'paged' => $paged
                );
                $productos_query = new WP_Query($args);

                if ($productos_query->have_posts()) :
                    while ($productos_query->have_posts()) : $productos_query->the_post();
                        $organizacion = get_field('organizacion');
                        $fecha = get_the_date('j M Y');
                ?>
                    <a href="<?php the_permalink(); ?>" class="group flex flex-col">
                        <div class="mb-4 flex overflow-clip rounded-xl md:mb-5">
                            <div class="h-full w-full transition duration-300 group-hover:scale-105">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array(
                                        'class' => 'aspect-3/2 h-full w-full object-cover object-center',
                                        'alt' => get_the_title()
                                    )); ?>
                                <?php else : ?>
                                    <img
                                        src="https://shadcnblocks.com/images/block/placeholder-dark-1.svg"
                                        alt="<?php the_title(); ?>"
                                        class="aspect-3/2 h-full w-full object-cover object-center"
                                    />
                                <?php endif; ?>
                            </div>
                        </div>

                        <div>
                            <span class="inline-flex items-center rounded-full border border-teal-200 bg-teal-50 px-2.5 py-0.5 text-xs font-semibold text-teal-900 transition-colors hover:bg-teal-100">
                                <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                            </span>
                        </div>
                        <div class="mb-2 line-clamp-3 break-words pt-4 text-lg font-medium text-teal-900 md:mb-3 md:pt-4 md:text-2xl lg:pt-4 lg:text-3xl">
                            <?php the_title(); ?>
                        </div>
                        <div class="mb-4 line-clamp-2 text-sm text-teal-600 md:mb-5 md:text-base">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="size-12 rounded-full overflow-hidden">
                                <?php 
                                $org_logo = get_field('organizacion_logo');
                                if ($org_logo) : ?>
                                    <img src="<?php echo esc_url($org_logo['url']); ?>" 
                                         alt="<?php echo esc_attr($organizacion); ?>"
                                         class="h-full w-full object-cover">
                                <?php else : ?>
                                    <div class="h-full w-full bg-teal-100 flex items-center justify-center text-teal-600">
                                        <?php echo esc_html(substr($organizacion, 0, 2)); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-col gap-px">
                                <span class="text-xs font-medium text-teal-900"><?php echo esc_html($organizacion); ?></span>
                                <span class="text-xs text-teal-600">
                                    <?php echo esc_html($fecha); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                <?php 
                    endwhile;
                endif;
                ?>
            </div>
            <?php if ($productos_query->max_num_pages > 1) : ?>
            <div class="mt-8 border-t border-teal-100 py-2 md:mt-10 lg:mt-12">
                <div class="flex items-center justify-between gap-1">
                    <div>
                        <?php 
                        $prev_link = get_previous_posts_link('← Anterior');
                        if ($prev_link) {
                            echo str_replace('<a', '<a class="flex items-center gap-2 rounded-md text-sm font-medium ring-offset-background transition-colors hover:text-teal-900"', $prev_link);
                        }
                        ?>
                    </div>
                    <div class="hidden items-center gap-1 md:flex">
                        <?php
                        for ($i = 1; $i <= $productos_query->max_num_pages; $i++) {
                            $is_current = $paged === $i;
                            $class = 'flex items-center justify-center rounded-md text-sm ring-offset-background transition-colors h-8 w-8';
                            $class .= $is_current ? ' bg-teal-100 text-teal-900' : ' text-teal-600 hover:text-teal-900';
                            echo '<a href="' . esc_url(get_pagenum_link($i)) . '" class="' . esc_attr($class) . '">' . $i . '</a>';
                        }
                        ?>
                    </div>
                    <div>
                        <?php 
                        $next_link = get_next_posts_link('Siguiente →', $productos_query->max_num_pages);
                        if ($next_link) {
                            echo str_replace('<a', '<a class="flex items-center gap-2 rounded-md text-sm font-medium ring-offset-background transition-colors hover:text-teal-900"', $next_link);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
