<?php
/**
 * Template for displaying single character profiles
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100'); ?>>
    <!-- Character Header Section -->
    <div class="relative h-[70vh] bg-gradient-to-r from-purple-900 to-indigo-900 text-white overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
            <?php 
            if (has_post_thumbnail()) {
                the_post_thumbnail('full', ['class' => 'w-full h-full object-cover opacity-40']);
            }
            ?>
        </div>
        
        <div class="relative container mx-auto px-6 h-full flex items-end pb-20">
            <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8 max-w-3xl w-full">
                <div class="flex-shrink-0 mb-6 md:mb-0">
                    <div class="w-40 h-40 md:w-64 md:h-64 rounded-2xl border-4 border-white/20 shadow-2xl overflow-hidden backdrop-blur-sm">
                        <?php 
                        $avatar = get_field('avatar');
                        if ($avatar) {
                            echo '<img src="' . esc_url($avatar) . '" class="w-full h-full object-cover" alt="">';
                        }
                        ?>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <?php 
                    $rol = get_field('rol');
                    $frase_celebre = get_field('frase_celebre');
                    
                    // Get episodes and calculate temporada range
                    $episodios = get_field('episodios');
                    $temporada_start = $temporada_end = null;
                    
                    if ($episodios && !empty($episodios)) {
                        // Get first episode temporada
                        $first_temporadas = get_the_terms($episodios[0]->ID, 'temporadas');
                        if ($first_temporadas && !empty($first_temporadas)) {
                            $temporada_start = get_field('numero_temporada', 'temporadas_' . $first_temporadas[0]->term_id);
                        }
                        
                        // Get last episode temporada
                        $last_episode = end($episodios);
                        $last_temporadas = get_the_terms($last_episode->ID, 'temporadas');
                        if ($last_temporadas && !empty($last_temporadas)) {
                            $temporada_end = get_field('numero_temporada', 'temporadas_' . $last_temporadas[0]->term_id);
                        }
                    }
                    ?>
                    <div class="text-sm font-medium text-purple-300 mb-3">Digital·IA Serie Web</div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-4"><?php echo get_the_title(); ?></h1>
                    <div class="flex items-center space-x-4 text-lg text-gray-300 mb-6">
                        <span><?php echo esc_html($rol); ?></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                        <span>Temporada <?php 
                            if ($temporada_start !== null && $temporada_end !== null) {
                                echo $temporada_start === $temporada_end ? $temporada_start : "{$temporada_start}-{$temporada_end}";
                            }
                        ?></span>
                    </div>
                    <?php if ($frase_celebre): ?>
                    <p class="text-xl text-gray-200 max-w-2xl">
                        "<?php echo esc_html($frase_celebre); ?>"
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 -mt-12 relative z-10">
        <!-- Character Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 mb-12">
            <div class="bg-red-500 p-6 shadow-sm">
                <div class="text-sm text-white/80 mb-1">Ocupación</div>
                <div class="text-lg font-medium text-white"><?php echo esc_html(get_field('ocupacion')); ?></div>
            </div>
            <div class="bg-red-600 p-6 shadow-sm">
                <div class="text-sm text-white/80 mb-1">Primera aparición</div>
                <div class="text-lg font-medium text-white">
                    <?php 
                    $episodios = get_field('episodios');
                    if ($episodios && !empty($episodios)) {
                        $first_episode = $episodios[0];
                        if ($first_episode) {
                            // Get the temporada taxonomy term
                            $temporadas = get_the_terms($first_episode->ID, 'temporadas');
                            if ($temporadas && !empty($temporadas)) {
                                $temporada = get_field('numero_temporada', 'temporadas_' . $temporadas[0]->term_id);
                                $episodio_numero = get_field('episodio_numero', $first_episode->ID);
                                echo sprintf('T%d:E%d - %s', $temporada, $episodio_numero, get_the_title($first_episode->ID));
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="bg-red-700 p-6 shadow-sm">
                <div class="text-sm text-white/80 mb-1">Interpretado por:</div>
                <div class="text-lg font-medium text-white">
                    <?php 
                    $actor = get_field('interpretado_por');
                    if ($actor && !empty($actor)) {
                        echo '<a href="' . esc_url(get_permalink($actor[0]->ID)) . '" class="hover:text-gray-200 transition-colors">' . 
                             esc_html(get_the_title($actor[0])) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-12">
            <!-- Left Column - Main Info -->
            <div class="lg:col-span-2">
                <!-- Biography -->
                <div class="bg-white rounded-xl p-8 mb-8">
                    <h2 class="text-2xl font-semibold mb-6">Historia del Personaje</h2>
                    <div class="prose max-w-none">
                        <?php echo wp_kses_post(get_field('historia_personaje')); ?>
                    </div>
                </div>

                <!-- Series Appearances -->
                <div class="bg-white rounded-xl p-8">
                    <h2 class="text-2xl font-semibold mb-6">Apariciones</h2>
                    <div class="space-y-4">
                        <?php 
                        // Obtener las series en las que aparece el personaje
                        $series = get_field('aparece_en');
                        if ($series):
                            foreach ($series as $serie): 
                                // Obtener información de la serie
                                $permalink = get_permalink($serie->ID);
                                $titulo = get_the_title($serie->ID);
                                $sinopsis = get_field('sinopsis', $serie->ID);
                                $fecha_estreno = get_field('fecha_estreno', $serie->ID);
                                // Obtener la imagen destacada de la serie
                                $thumbnail = get_the_post_thumbnail_url($serie->ID, 'medium');
                        ?>
                        <a href="<?php echo esc_url($permalink); ?>" 
                           class="block border-b border-gray-100 pb-4 hover:bg-gray-50 transition-colors rounded-lg px-4 py-2 -mx-4 -my-2">
                            <div class="grid grid-cols-3 gap-4">
                                <?php if ($thumbnail): ?>
                                <div class="col-span-1">
                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($titulo); ?>" 
                                         class="w-full h-auto object-cover rounded">
                                </div>
                                <?php endif; ?>
                                <div class="<?php echo $thumbnail ? 'col-span-2' : 'col-span-3'; ?>">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-lg font-medium group-hover:text-blue-600 transition-colors">
                                            <?php echo esc_html($titulo); ?>
                                        </h3>
                                        <span class="text-sm text-gray-500">
                                            <?php echo $fecha_estreno ? date_i18n('d M Y', strtotime($fecha_estreno)) : ''; ?>
                                        </span>
                                    </div>
                                    <p class="text-gray-600 text-sm"><?php echo esc_html($sinopsis); ?></p>
                                </div>
                            </div>
                        </a>
                        <?php 
                            endforeach;
                        else:
                        ?>
                        <p class="text-gray-500">Este personaje no aparece en ninguna serie.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Character Traits -->
                <div class="bg-white rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-6">Rasgos del Personaje</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php 
                        $rasgos = get_field('rasgos_personaje');
                        if ($rasgos):
                            $colors = ['bg-blue-100 text-blue-800', 'bg-green-100 text-green-800', 'bg-yellow-100 text-yellow-800', 
                                     'bg-red-100 text-red-800', 'bg-purple-100 text-purple-800', 'bg-pink-100 text-pink-800'];
                            foreach ($rasgos as $rasgo):
                                $random_color = $colors[array_rand($colors)];
                        ?>
                        <span class="px-3 py-1 rounded-full text-sm font-medium <?php echo $random_color; ?>">
                            <?php echo esc_html($rasgo); ?>
                        </span>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Relationships -->
                <div class="bg-white rounded-xl p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-6">Relaciones Clave</h3>
                    <div class="space-y-6">
                        <?php
                        if (have_rows('relaciones_clave')):
                            while (have_rows('relaciones_clave')): the_row();
                                $personaje = get_sub_field('personaje');
                                $tipo_relacion = get_sub_field('tipo_relacion');
                                if ($personaje):
                                    $avatar = get_field('avatar', $personaje->ID);
                        ?>
                        <a href="<?php echo esc_url(get_permalink($personaje->ID)); ?>" class="flex items-start space-x-4 group">
                            <div class="flex-shrink-0">
                                <?php if ($avatar): ?>
                                    <img src="<?php echo esc_url($avatar); ?>" class="w-12 h-12 rounded-full object-cover" alt="">
                                <?php endif; ?>
                            </div>
                            <div>
                                <h4 class="font-medium group-hover:text-blue-600 transition-colors"><?php echo get_the_title($personaje->ID); ?></h4>
                                <p class="text-sm text-gray-500"><?php echo esc_html($tipo_relacion); ?></p>
                            </div>
                        </a>
                        <?php
                                endif;
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memorable Scenes Grid - Full Width -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-8">Momentos Memorables</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $momentos = get_field('momentos_memorables');
                if ($momentos):
                    foreach ($momentos as $momento):
                ?>
                <div class="aspect-video rounded-xl overflow-hidden">
                    <?php echo wp_get_attachment_image($momento['ID'], 'large', false, ['class' => 'w-full h-full object-cover']); ?>
                </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>
