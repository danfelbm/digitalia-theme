<?php
/**
 * Template part for displaying module posts carousel
 */

$category = get_query_var('category_name') ?: '';
$posts_per_page = 6;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'category_name' => $category,
    'orderby' => 'date',
    'order' => 'DESC'
);

$module_posts = new WP_Query($args);

if ($module_posts->have_posts()) : 
    $carousel_id = 'module-posts-carousel-' . uniqid();
    ?>
    <div class="module-posts-carousel swiper <?php echo esc_attr($carousel_id); ?>">
        <div class="swiper-wrapper mb-12">
            <?php while ($module_posts->have_posts()) : $module_posts->the_post(); ?>
                <div class="swiper-slide">
                    <article class="post-card bg-white rounded-lg shadow-md overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail aspect-video">
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        <?php
                        $post_tags = get_the_tags();
                        if ($post_tags) : ?>
                            <div class="px-4 pt-4 flex flex-wrap gap-2">
                                <?php foreach ($post_tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-black text-white hover:bg-gray-800 transition-colors">
                                        <?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2">
                                <a href="<?php the_permalink(); ?>" class="hover:text-primary">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="text-sm text-gray-600 mb-2">
                                <?php echo get_the_date(); ?>
                            </div>
                            <div class="text-sm line-clamp-2">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
        <!--<div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>-->
    </div>

    <script>
        (function() {
            function initSwiper() {
                if (typeof Swiper !== 'undefined') {
                    new Swiper('.<?php echo esc_js($carousel_id); ?>', {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 20,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: '.<?php echo esc_js($carousel_id); ?> .swiper-pagination',
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.<?php echo esc_js($carousel_id); ?> .swiper-button-next',
                            prevEl: '.<?php echo esc_js($carousel_id); ?> .swiper-button-prev',
                        },
                        breakpoints: {
                            768: {
                                slidesPerView: 3,
                                slidesPerGroup: 1
                            }
                        }
                    });
                } else {
                    setTimeout(initSwiper, 100);
                }
            }

            if (document.readyState === 'complete' || document.readyState === 'interactive') {
                initSwiper();
            } else {
                document.addEventListener('DOMContentLoaded', initSwiper);
            }
        })();
    </script>
    <?php
endif;

wp_reset_postdata();
?>
