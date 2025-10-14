<?php
/**
 * Template Name: Blog y Noticias
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="bg-muted/60 py-32">
        <div class="container">
            <div class="relative mx-auto flex max-w-(--breakpoint-xl) flex-col gap-20 lg:flex-row">
                <header class="top-10 flex h-fit flex-col items-center gap-5 text-center lg:sticky lg:max-w-80 lg:items-start lg:gap-8 lg:text-left">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-full w-14">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                    <?php 
                    $header = get_field('page_header') ?: array();
                    ?>
                    <h1 class="text-4xl font-extrabold lg:text-5xl"><?php echo isset($header['title']) ? $header['title'] : 'Blog y Noticias'; ?></h1>
                    <p class="text-muted-foreground lg:text-xl"><?php echo isset($header['description']) ? $header['description'] : 'Mantente al día con las últimas noticias y artículos del sector digital.'; ?></p>
                    <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                    <nav>
                        <ul class="flex flex-wrap items-center justify-center gap-4 lg:flex-col lg:items-start lg:gap-2">
                            <li class="<?php echo !is_category() ? 'font-medium' : 'text-muted-foreground hover:text-primary'; ?>">
                                <a href="/blog-y-noticias">Todos</a>
                            </li>
                            <?php
                            $categories = get_categories(array(
                                'orderby' => 'name',
                                'order'   => 'ASC'
                            ));
                            
                            foreach($categories as $category) :
                                $is_current = is_category($category->term_id);
                            ?>
                                <li class="<?php echo $is_current ? 'font-medium' : 'text-muted-foreground hover:text-primary'; ?>">
                                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </header>

                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => $paged
                );
                $blog_query = new WP_Query($args);

                if ($blog_query->have_posts()) : ?>
                    <div class="mt-20 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                            <a class="rounded-xl border" href="<?php the_permalink(); ?>">
                                <div class="p-2">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', array(
                                            'class' => 'aspect-video w-full rounded-lg object-cover'
                                        )); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" 
                                             alt="<?php the_title(); ?>" 
                                             class="aspect-video w-full rounded-lg object-cover">
                                    <?php endif; ?>
                                </div>
                                <div class="px-3 pb-4 pt-2">
                                    <h2 class="mb-1 font-medium"><?php the_title(); ?></h2>
                                    <p class="line-clamp-2 text-sm text-muted-foreground"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full my-5"></div>
                                    <div class="flex items-center justify-between gap-4">
                                        <div class="flex items-center gap-3">
                                            <span class="relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input">
                                                <?php echo get_avatar(get_the_author_meta('ID'), 36); ?>
                                            </span>
                                            <span class="text-sm font-medium"><?php the_author(); ?></span>
                                        </div>
                                        <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 h-fit">
                                            <?php echo get_reading_time(); ?> Min Read
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    </div>
            </div>
            <?php if ($blog_query->max_num_pages > 1) : ?>
                    <div class="mt-8 border-t border-border py-2 md:mt-10 lg:mt-12">
                        <nav role="navigation" aria-label="pagination" class="mx-auto flex w-full justify-center">
                            <ul class="flex flex-row items-center gap-1 w-full justify-between">
                                <li>
                                    <?php if ($paged > 1) : ?>
                                        <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 gap-1 pl-2.5" 
                                           aria-label="Go to previous page" 
                                           href="<?php echo get_pagenum_link($paged - 1); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-4 w-4">
                                                <path d="m15 18-6-6 6-6"></path>
                                            </svg>
                                            <span>Previous</span>
                                        </a>
                                    <?php endif; ?>
                                </li>
                                <div class="hidden items-center gap-1 md:flex">
                                    <?php
                                    $total_pages = $blog_query->max_num_pages;
                                    for ($i = 1; $i <= $total_pages; $i++) :
                                        $is_current = $paged == $i;
                                    ?>
                                        <li>
                                            <a href="<?php echo get_pagenum_link($i); ?>" 
                                               class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 <?php echo $is_current ? 'bg-accent' : ''; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                </div>
                                <li>
                                    <?php if ($paged < $blog_query->max_num_pages) : ?>
                                        <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 gap-1 pr-2.5" 
                                           aria-label="Go to next page" 
                                           href="<?php echo get_pagenum_link($paged + 1); ?>">
                                            <span>Next</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <?php endif; 
                    wp_reset_postdata();
                endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
