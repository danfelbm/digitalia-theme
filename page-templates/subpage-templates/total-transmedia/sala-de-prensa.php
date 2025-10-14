<?php

/**
 * Template Name: Total Transmedia - Sala de Prensa
 *
 * @package Digitalia
 */
get_header();
?>

<section class="py-32">
    <div class="px-0">
        <h1 class="container text-3xl font-bold lg:text-5xl">
            <span class="text-blue-700">Sala de prensa.</span><br>Últimas noticias &amp; actualizaciones
        </h1>
        <div class="mt-8">
            <?php
            $args = array(
                'category_name' => 'sala-de-prensa',
                'post_type' => array('post'),
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $author_id = get_the_author_meta('ID');
                    $equipo = get_field('equipo', 'user_' . $author_id);
                    $author_posts_url = get_author_posts_url($author_id);
                    ?>
                    <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                    <div class="">
                        <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-4">
                            <div class="hidden items-center gap-3 self-start lg:flex">
                                <?php echo get_avatar($author_id, 44, '', '', array('class' => 'h-auto w-11')); ?>
                                <div class="flex flex-col gap-1">
                                    <a href="<?php echo esc_url($author_posts_url); ?>" class="font-semibold text-blue-900 hover:text-blue-700 transition-colors"><?php echo get_the_author(); ?></a>
                                    <span class="text-sm text-blue-700"><?php echo $equipo ? esc_html($equipo) : 'Team'; ?></span>
                                </div>
                            </div>
                            <div class="col-span-2 max-w-xl">
                                <span class="mb-2 text-sm font-medium text-blue-700">
                                    <?php echo get_the_date('d F Y'); ?>
                                    <span class="inline lg:hidden"> - <a href="<?php echo esc_url($author_posts_url); ?>" class="text-blue-900 hover:text-blue-700 transition-colors"><?php echo get_the_author(); ?></a></span>
                                </span>
                                <h3 class="text-2xl font-bold hover:text-blue-700 lg:text-3xl">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="mt-5 flex flex-wrap gap-2">
                                    <?php
                                    $post_tags = get_the_tags();
                                    if ($post_tags):
                                        foreach ($post_tags as $tag):
                                            ?>
                                        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="flex items-center gap-1.5 rounded-full bg-blue-50 border-blue-200 border px-3 py-1.5 text-sm font-medium text-blue-900 transition-colors hover:bg-blue-100">
                                            <?php echo $tag->name; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4 text-blue-700">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-blue-200 bg-white hover:bg-blue-50 text-blue-900 hover:text-blue-700 h-10 w-10 ml-auto hidden lg:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Read more</span>
                            </a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
        </div>
    </div>
</section>

<?php
get_footer();
