<?php
/**
 * The template for displaying single transmission posts
 *
 * @package digitalia
 */

get_header();
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen">
    <?php while (have_posts()) : the_post(); 
        // Get ACF fields
        $transmision_excerpt = get_field('transmision_excerpt');
        $transmision_duration = get_field('transmision_duration');
        $transmision_video = get_field('transmision_video');
        $transmision_fecha = get_field('transmision_fecha');
        $transmision_participantes = get_field('transmision_participantes');
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Hero Section -->
            <div class="relative">
                <!-- Featured Image Background -->
                <?php if (has_post_thumbnail()) : ?>
                <div class="absolute inset-0 w-full h-full">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                    <div class="absolute inset-0 bg-linear-to-b from-black/60 to-black/90"></div>
                </div>
                <?php endif; ?>

                <!-- Main Content -->
                <div class="relative container mx-auto px-8 pt-12 pb-8">
                    <a href="<?php echo get_post_type_archive_link('transmision'); ?>" class="inline-flex items-center text-white/90 hover:text-white mb-6 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Volver a Transmisiones
                    </a>

                    <!-- Video Container -->
                    <div class="w-full max-w-3xl mx-auto mb-8">
                        <div class="relative w-full pt-[56.25%] bg-black rounded-xl overflow-hidden shadow-2xl">
                            <?php if ($transmision_video) : 
                                // Convert YouTube watch URL to embed URL
                                $video_id = '';
                                if (preg_match('/[?&]v=([^&#]+)/', $transmision_video, $match)) {
                                    $video_id = $match[1];
                                }
                                $embed_url = 'https://www.youtube.com/embed/' . $video_id;
                            ?>
                                <iframe 
                                    src="<?php echo esc_url($embed_url); ?>" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen
                                    class="absolute top-0 left-0 w-full h-full">
                                </iframe>
                            <?php else : ?>
                                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-gray-100">
                                    <p class="text-gray-500">Video no disponible</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Stream Info -->
                    <div class="max-w-4xl mx-auto">
                        <h1 class="text-4xl font-bold mb-6 text-white">
                            <?php the_title(); ?>
                        </h1>

                        <?php if ($transmision_excerpt || has_excerpt()) : ?>
                        <p class="text-lg text-white/90 mb-6">
                            <?php echo $transmision_excerpt ?: get_the_excerpt(); ?>
                        </p>
                        <?php endif; ?>

                        <div class="flex flex-wrap items-center gap-6 text-white/80 text-sm mb-8">
                            <?php if ($transmision_fecha) : ?>
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i>
                                <time datetime="<?php echo esc_attr($transmision_fecha); ?>">
                                    <?php echo esc_html($transmision_fecha); ?>
                                </time>
                            </div>
                            <?php endif; ?>
                            <?php if ($transmision_duration) : ?>
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-clock"></i>
                                <span><?php echo esc_html($transmision_duration); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="container mx-auto px-8 py-12">
                <!-- Participantes -->
                <?php if ($transmision_participantes) : ?>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Participantes</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($transmision_participantes as $participante) :
                            // Handle foto field - can be array or string
                            $foto_url = '';
                            if (!empty($participante['foto'])) {
                                $foto_url = is_array($participante['foto']) ? $participante['foto']['url'] : $participante['foto'];
                            }
                        ?>
                            <div class="bg-white rounded-xl p-6 shadow-sm">
                                <div class="flex items-start gap-4">
                                    <?php if ($foto_url) : ?>
                                        <img src="<?php echo esc_url($foto_url); ?>"
                                             alt="<?php echo esc_attr($participante['nombre']); ?>"
                                             class="w-20 h-20 rounded-full object-cover shrink-0">
                                    <?php endif; ?>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                            <?php echo esc_html($participante['nombre']); ?>
                                        </h3>
                                        <?php if (!empty($participante['rol'])) : ?>
                                            <p class="text-sm text-gray-600 mb-3">
                                                <?php echo esc_html($participante['rol']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty($participante['bio'])) : ?>
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                <?php echo nl2br(esc_html($participante['bio'])); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Descripción de la Transmisión -->
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8 text-gray-900">Sobre esta transmisión</h2>
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <div class="prose max-w-none">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();
