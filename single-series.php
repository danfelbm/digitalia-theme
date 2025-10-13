<?php
get_header();

while (have_posts()) :
    the_post();
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    if (!$featured_img_url) {
        $featured_img_url = get_template_directory_uri() . '/assets/images/default-serie.jpg';
    }
?>

<main class="bg-white text-gray-900">
    <!-- Hero Section -->
    <div class="relative h-[85vh] md:h-[90vh]">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
        </div>

        <!-- Content Overlay -->
        <div class="relative h-full flex items-end pb-20">
            <div class="container mx-auto px-4 md:px-8">
                <div class="max-w-3xl">
                    <h1 class="text-5xl md:text-6xl font-bold mb-4 text-white"><?php the_title(); ?></h1>
                    
                    <!-- Serie Meta -->
                    <div class="flex items-center gap-4 text-sm mb-6 flex-wrap">
                        <?php if (get_field('ano_serie')): ?>
                        <span class="px-2 py-1 bg-white/20 rounded text-white"><?php echo esc_html(get_field('ano_serie')); ?></span>
                        <?php endif; ?>

                        <?php 
                        // Count temporadas
                        $temporadas_count = 0;
                        $episodes_query = new WP_Query([
                            'post_type' => 'episodio',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'ASC',
                            'meta_query' => [
                                [
                                    'key' => 'serie',
                                    'value' => get_the_ID(),
                                    'compare' => '='
                                ]
                            ]
                        ]);

                        if ($episodes_query->have_posts()) {
                            $temporadas = [];
                            while ($episodes_query->have_posts()) {
                                $episodes_query->the_post();
                                $episode_terms = get_the_terms(get_the_ID(), 'temporadas');
                                if ($episode_terms && !is_wp_error($episode_terms)) {
                                    foreach ($episode_terms as $term) {
                                        $temporadas[$term->term_id] = $term->name;
                                    }
                                }
                            }
                            $temporadas_count = count($temporadas);
                            wp_reset_postdata();
                        }
                        ?>
                        <?php if ($temporadas_count > 0): ?>
                        <span class="px-2 py-1 bg-white/20 rounded text-white"><?php echo esc_html($temporadas_count); ?> Temporada<?php echo $temporadas_count > 1 ? 's' : ''; ?></span>
                        <?php endif; ?>

                        <?php 
                        $generos = get_field('generos');
                        if ($generos && is_array($generos)):
                            foreach ($generos as $genero): ?>
                                <span class="px-2 py-1 bg-white/20 rounded text-white"><?php echo esc_html($genero); ?></span>
                            <?php endforeach;
                        endif; ?>
                        
                        <span class="px-2 py-1 bg-red-600 rounded text-white">TOP 10</span>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <?php if (get_field('reproducir')): ?>
                        <a href="<?php echo esc_url(get_field('reproducir')); ?>" class="px-8 py-3 bg-white text-black rounded hover:bg-white/90 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Reproducir
                        </a>
                        <?php endif; ?>
                        <?php if (get_field('mas_informacion')): ?>
                        <a href="<?php echo esc_url(get_field('mas_informacion')); ?>" class="px-8 py-3 bg-gray-600/70 text-white rounded hover:bg-gray-600/90 transition flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Más Información
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Synopsis Section -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 md:px-8">
            <div class="max-w-4xl">
                <h2 class="text-3xl font-bold mb-6">Sinopsis</h2>
                <div class="prose prose-lg max-w-none">
                    <?php if (get_field('sinopsis')): ?>
                    <div class="text-gray-700 leading-relaxed">
                        <?php echo wp_kses_post(get_field('sinopsis')); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Serie Details Section -->
    <div class="bg-gray-50">

        <!-- Episodes Section -->
        <section class="container mx-auto px-4 md:px-8 py-16">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Episodios</h2>
                <?php
                // Get all seasons from episodes related to this series
                $episodes_query = new WP_Query([
                    'post_type' => 'episodio',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'meta_query' => [
                        [
                            'key' => 'serie',
                            'value' => get_the_ID(),
                            'compare' => '='
                        ]
                    ]
                ]);

                if ($episodes_query->have_posts()) :
                    $seasons = [];
                    while ($episodes_query->have_posts()) : $episodes_query->the_post();
                        $episode_terms = get_the_terms(get_the_ID(), 'temporadas');
                        if ($episode_terms && !is_wp_error($episode_terms)) {
                            foreach ($episode_terms as $term) {
                                $seasons[$term->term_id] = $term->name;
                            }
                        }
                    endwhile;
                    wp_reset_postdata();

                    if (!empty($seasons)) : ?>
                        <div class="relative">
                            <select id="season-filter" class="bg-white border border-gray-300 rounded-lg px-4 py-2 appearance-none pr-8">
                                <option value="">Todas las temporadas</option>
                                <?php foreach ($seasons as $term_id => $season_name) : ?>
                                    <option value="<?php echo esc_attr($term_id); ?>"><?php echo esc_html($season_name); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                </svg>
                            </div>
                        </div>
                    <?php endif;
                endif; ?>
            </div>

            <div class="space-y-4" id="episodes-container">
                <?php
                // Query episodes
                $args = [
                    'post_type' => 'episodio',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'meta_query' => [
                        [
                            'key' => 'serie',
                            'value' => get_the_ID(),
                            'compare' => '='
                        ]
                    ]
                ];

                $episodes = new WP_Query($args);

                if ($episodes->have_posts()) :
                    while ($episodes->have_posts()) : $episodes->the_post();
                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        if (!$thumbnail) {
                            $thumbnail = 'https://via.placeholder.com/250x140';
                        }
                        $season_terms = get_the_terms(get_the_ID(), 'temporadas');
                        $season_ids = [];
                        if ($season_terms && !is_wp_error($season_terms)) {
                            foreach ($season_terms as $term) {
                                $season_ids[] = $term->term_id;
                            }
                        }
                ?>
                        <a href="<?php the_permalink(); ?>" class="block bg-white rounded-lg p-4 hover:bg-gray-50 transition shadow-sm episode-item" data-seasons='<?php echo json_encode($season_ids); ?>'>
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="relative w-full md:w-60">
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>" class="w-full md:w-60 h-[200px] md:h-[140px] object-cover rounded">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center shadow-lg group-hover:bg-white transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-xl font-medium text-gray-900"><?php the_title(); ?></h3>
                                        <span class="text-sm text-gray-600"><?php 
                                            $detalles = get_field('detalles_produccion');
                                            echo esc_html($detalles['duracion'] ? $detalles['duracion'] . ' min' : '45 min'); 
                                        ?></span>
                                    </div>
                                    <p class="mt-2 text-gray-700"><?php 
                                        echo esc_html(get_field('sinopsis_single')); 
                                    ?></p>
                                </div>
                            </div>
                        </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="text-gray-600">No hay episodios disponibles.</p>
                <?php endif; ?>
            </div>
        </section>

    </div>
</main>

<?php
get_template_part('template-parts/cta-modulos', null, array(
    'title' => 'Academia Digital-IA',
    'description' => 'Ecosistema de soluciones tecnológicas diseñado para ofrecer servicios educativos e informativos que te preparan para los desafíos de las tecnologías emergentes.',
    'cta_primary_text' => 'Comenzar ahora',
    'cta_primary_url' => '/plataforma/register',
    'cta_secondary_text' => 'Explorar cursos',
    'cta_secondary_url' => '/plataforma/courses',
    'doc_title' => 'Documentación',
    'doc_description' => 'Accede a guías detalladas sobre el uso de la plataforma y recursos educativos.',
    'doc_url' => '/plataforma/docs',
    'guide_title' => 'Primeros pasos',
    'guide_description' => 'Aprende a utilizar la plataforma y comienza tu formación en alfabetización mediática.',
    'guide_url' => '/plataforma/getting-started'
));
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const seasonFilter = document.getElementById('season-filter');
    const episodesContainer = document.getElementById('episodes-container');
    
    if (seasonFilter) {
        seasonFilter.addEventListener('change', function() {
            const selectedSeason = this.value;
            const episodes = document.querySelectorAll('.episode-item');
            
            episodes.forEach(episode => {
                const seasonIds = JSON.parse(episode.dataset.seasons);
                if (!selectedSeason || seasonIds.includes(parseInt(selectedSeason))) {
                    episode.style.display = 'block';
                } else {
                    episode.style.display = 'none';
                }
            });
        });
    }
});
</script>

<?php
endwhile;
get_footer();
?>
