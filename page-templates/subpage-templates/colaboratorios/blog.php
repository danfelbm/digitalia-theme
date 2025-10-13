<?php
/**
 * Template Name: Colaboratorios - Blog
 * Description: Página de visión general de Colaboratorios
 */
get_header();
?>

<?php
$blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 2,
    'category_name' => 'colaboratorios'
);

$blog_query = new WP_Query($blog_args);

if ($blog_query->have_posts()):
    ?>
    <section id="blog" class="flex flex-col gap-16 lg:px-16 pt-16 text-teal-900 bg-teal-50">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <?php if ($blog = get_field('blog')) : ?>
                    <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6"><?php echo esc_html($blog['title']); ?></h2>
                    <p class="mb-8 lg:text-lg text-teal-700"><?php echo esc_html($blog['description']); ?></p>
                    <?php if ($cta = $blog['cta']) : ?>
                        <a href="<?php echo esc_url($cta['link']); ?>" class="group flex items-center text-xs font-medium md:text-base lg:text-lg text-teal-600 hover:text-teal-800">
                            <?php echo esc_html($cta['text']); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section id="blog-posts" class="pb-32 pt-16 bg-white text-teal-900">
        <div class="container flex flex-col items-center gap-16">
            <div class="grid gap-y-10 container sm:gap-y-12 md:gap-y-16 lg:gap-y-20">
                <?php
                while ($blog_query->have_posts()):
                    $blog_query->the_post();
                    $categories = get_the_category();
                    ?>
                <a href="<?php the_permalink(); ?>" class="group order-last grid gap-y-6 sm:order-first sm:col-span-12 sm:grid-cols-10 sm:gap-x-5 sm:gap-y-0 md:items-center md:gap-x-8 lg:col-span-10 lg:col-start-2 lg:gap-x-12 hover:bg-teal-50 rounded-lg transition-colors duration-300 p-6">
                    <div class="sm:col-span-5">
                        <div class="mb-4 md:mb-6">
                            <div class="flex gap-2 text-xs uppercase tracking-wider flex-wrap">
                                <?php foreach ($categories as $category): ?>
                                    <span class="rounded bg-teal-100 px-2.5 py-1 text-teal-700"><?php echo $category->name; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <h3 class="mb-4 text-xl font-semibold md:mb-6 md:text-2xl lg:mb-8 group-hover:text-teal-700 transition-colors duration-300"><?php the_title(); ?></h3>
                        <p class="text-sm text-teal-600 md:text-base"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </div>
                    <div class="sm:col-span-5">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="aspect-h-9 aspect-w-16 overflow-hidden rounded-lg border border-teal-100">
                                <?php the_post_thumbnail('large', array('class' => 'h-full w-full object-cover')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <a href="/blog" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-600 text-white hover:bg-teal-500 h-11 rounded-md px-8">
                Ver todos los artículos
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </section>
<?php
endif;
get_footer();
?>