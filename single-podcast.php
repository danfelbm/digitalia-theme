<?php
/**
 * The template for displaying single podcast posts
 *
 * @package digitalia
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen">
    <?php while (have_posts()) : the_post(); 
        // Get ACF fields
        $episode_excerpt = get_field('episode_excerpt');
        $episode_duration = get_field('episode_duration');
        $episode_audio = get_field('episode_audio');
        $episode_number = get_field('episode_number');
        $episode_season = get_field('episode_season');
        $platforms = get_field('podcast_platforms');
        $transcript = get_field('episode_transcript');
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Hero Section -->
            <div class="relative">
                <!-- Featured Image Background -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="absolute inset-0 w-full h-full">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/90"></div>
                </div>
                <?php endif; ?>

                <!-- Main Content -->
                <div class="relative container mx-auto px-8 pt-12 pb-8">
                    <a href="<?php echo get_post_type_archive_link('podcast'); ?>" class="inline-flex items-center text-white/90 hover:text-white mb-6 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Volver a Podcast
                    </a>
                    <div class="flex flex-col lg:flex-row gap-8 items-start">
                        <!-- Featured Image (Small) -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-64 h-64 lg:w-[320px] lg:h-[320px] flex-shrink-0 rounded-xl overflow-hidden shadow-2xl">
                                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Episode Info -->
                        <div class="flex-1 pt-4">
                            <div class="text-sm font-medium text-white/80 mb-2">
                                <?php 
                                if ($episode_number || $episode_season) {
                                    if ($episode_season) {
                                        printf('Temporada %d', $episode_season);
                                        if ($episode_number) echo ' • ';
                                    }
                                    if ($episode_number) {
                                        printf('Episodio %d', $episode_number);
                                    }
                                } else {
                                    echo 'Episodio de Podcast';
                                }
                                ?>
                            </div>
                            <h1 class="text-5xl font-bold mb-6 text-white">
                                <?php the_title(); ?>
                            </h1>

                            <?php if ($episode_excerpt || has_excerpt()) : ?>
                            <p class="text-lg text-white/90 line-clamp-2 mb-6">
                                <?php echo $episode_excerpt ?: get_the_excerpt(); ?>
                            </p>
                            <?php endif; ?>

                            <div class="flex items-center gap-6 text-white/80 text-sm mb-8">
                                <div class="flex items-center gap-2">
                                    <img class="w-8 h-8 rounded-full" src="<?php echo get_avatar_url(get_the_author_meta('ID'), ['size' => 96]); ?>" alt="">
                                    <span><?php the_author(); ?></span>
                                </div>
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if ($episode_duration) : ?>
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo esc_html($episode_duration); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Player Controls -->
                            <?php if ($episode_audio) : ?>
                            <div class="flex items-center gap-4">
                                <button class="w-14 h-14 flex items-center justify-center bg-purple-600 hover:bg-purple-700 rounded-full text-white transition-all" 
                                        onclick="document.getElementById('podcast-audio').play()"
                                        aria-label="Reproducir audio">
                                    <i class="fa-solid fa-play text-2xl"></i>
                                </button>
                                <audio id="podcast-audio" controls class="flex-1 h-12">
                                    <source src="<?php echo esc_url($episode_audio); ?>" type="audio/mpeg">
                                    Tu navegador no soporta el elemento de audio.
                                </audio>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="container mx-auto px-8 py-12">
                <!-- Listen on Other Platforms -->
                <?php if ($platforms) : ?>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Escuchar en otras plataformas</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <?php if (!empty($platforms['spotify_url'])) : ?>
                        <a href="<?php echo esc_url($platforms['spotify_url']); ?>" target="_blank" rel="noopener noreferrer" class="group bg-white hover:bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-brands fa-spotify text-3xl text-[#1DB954]"></i>
                                <span class="font-medium text-gray-900">Spotify</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($platforms['apple_podcasts_url'])) : ?>
                        <a href="<?php echo esc_url($platforms['apple_podcasts_url']); ?>" target="_blank" rel="noopener noreferrer" class="group bg-white hover:bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-brands fa-apple text-3xl text-gray-900"></i>
                                <span class="font-medium text-gray-900">Apple</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($platforms['overcast_url'])) : ?>
                        <a href="<?php echo esc_url($platforms['overcast_url']); ?>" target="_blank" rel="noopener noreferrer" class="group bg-white hover:bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-broadcast-tower text-3xl text-[#FC7E0F]"></i>
                                <span class="font-medium text-gray-900">Overcast</span>
                            </div>
                        </a>
                        <?php endif; ?>
                        
                        <?php if (!empty($platforms['rss_url'])) : ?>
                        <a href="<?php echo esc_url($platforms['rss_url']); ?>" target="_blank" rel="noopener noreferrer" class="group bg-white hover:bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-rss text-3xl text-[#FFA500]"></i>
                                <span class="font-medium text-gray-900">RSS</span>
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Episode Description -->
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Sobre este episodio</h2>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="prose max-w-none">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <!-- Episode Transcript -->
                <?php if ($transcript) : ?>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Transcripción del episodio</h2>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="prose max-w-none">
                            <?php echo wp_kses_post($transcript); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Tags and Categories -->
                <?php if (get_the_category() || get_the_tags()) : ?>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Temas relacionados</h2>
                    <div class="flex flex-wrap gap-3">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="px-3 py-1 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-full text-sm font-medium transition-colors">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>

                        <?php
                        $tags = get_the_tags();
                        if ($tags) :
                            foreach ($tags as $tag) : ?>
                                <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium transition-colors">
                                    <?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
