<?php
/**
 * The template for displaying all single posts
 *
 * @package digitalia
 */

get_header();
?>

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <?php while (have_posts()) : the_post(); ?>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                    <?php the_title(); ?>
                </h1>

                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" 
                         alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" 
                         class="mb-8 mt-0 aspect-video w-full rounded-lg object-cover">
                <?php endif; ?>

                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                        <?php
                        $author_id = get_the_author_meta('ID');
                        $author_avatar = get_avatar_url($author_id, ['size' => 64]);
                        ?>
                        <img class="mr-4 w-16 h-16 rounded-full" src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
                        <div>
                            <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" rel="author" class="text-xl font-bold text-gray-900 dark:text-white"><?php echo get_the_author(); ?></a>
                            <p class="text-base text-gray-500 dark:text-gray-400"><?php echo get_the_author_meta('description'); ?></p>
                            <p class="text-base text-gray-500 dark:text-gray-400">
                                <time datetime="<?php echo get_the_date('c'); ?>" title="<?php echo get_the_date(); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                            </p>
                        </div>
                    </div>
                </address>

                <!-- Social Share -->
                <div class="flex items-center space-x-4 mb-4">
                    <a href="https://www.instagram.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src="https://www.shadcnblocks.com/images/block/logos/instagram-icon.svg" alt="Instagram" class="size-5">
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src="https://www.shadcnblocks.com/images/block/logos/linkedin-icon.svg" alt="LinkedIn" class="size-5">
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <img src="https://www.shadcnblocks.com/images/block/logos/twitter-icon.svg" alt="Twitter" class="size-5">
                    </a>
                </div>

                <!-- Categories & Tags -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <?php
                    $taxonomies = get_object_taxonomies(get_post_type(), 'objects');
                    foreach ($taxonomies as $taxonomy) {
                        $terms = get_the_terms(get_the_ID(), $taxonomy->name);
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                ?>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>" 
                                   class="inline-flex items-center rounded-full bg-secondary px-3 py-1 text-sm font-medium text-secondary-foreground hover:bg-secondary/80">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </header>

            <div class="prose prose-sm dark:prose-invert [&>p]:mb-6 [&>p:last-child]:mb-0 [&>h2]:mt-8 [&>h3]:mt-6">
                <?php the_content(); ?>
            </div>
            <?php endwhile; ?>

            <?php if (comments_open() || get_comments_number()) : ?>
            <section class="not-format">
                <?php comments_template(); ?>
            </section>
            <?php endif; ?>
        </article>
    </div>
</main>

<?php get_footer(); ?>
