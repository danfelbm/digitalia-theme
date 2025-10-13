<?php
/**
 * Template for displaying single actor profiles
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100'); ?>>
    <!-- Profile Header Section -->
    <div class="relative bg-gradient-to-br from-red-500 via-red-800 to-indigo-900 text-white">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        
        <div class="relative container mx-auto px-4 sm:px-6 py-20">
            <div class="max-w-7xl mx-auto">
                <div class="md:flex items-start space-y-8 md:space-y-0 md:space-x-12">
                    <!-- Profile Image -->
                    <div class="flex-shrink-0">
                        <div class="w-48 h-48 md:w-64 md:h-64 rounded-2xl border-4 border-white/20 shadow-2xl overflow-hidden backdrop-blur-sm">
                            <?php if (get_field('avatar')): ?>
                                <img src="<?php echo esc_url(get_field('avatar')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover">
                            <?php elseif (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Profile Info -->
                    <div class="flex-1">
                        <div class="mb-8">
                            <h1 class="text-4xl md:text-6xl font-bold mb-3 text-white"><?php the_title(); ?></h1>
                            <?php if (get_field('habilidades')): ?>
                                <p class="text-xl text-gray-200 font-medium"><?php echo implode(' • ', get_field('habilidades')); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                            <?php if (get_field('fecha_de_nacimiento')): ?>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                <h3 class="text-sm font-medium text-gray-300 mb-1">Fecha de Nacimiento</h3>
                                <p class="text-lg"><?php echo date_i18n('j \d\e F, Y', strtotime(get_field('fecha_de_nacimiento'))); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if (get_field('lugar_de_nacimiento')): ?>
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                                <h3 class="text-sm font-medium text-gray-300 mb-1">Lugar de Nacimiento</h3>
                                <p class="text-lg"><?php echo get_field('lugar_de_nacimiento'); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>

                        <!-- Social Media Links -->
                        <?php if (have_rows('redes_sociales')): ?>
                        <div class="flex flex-wrap gap-4">
                            <?php while (have_rows('redes_sociales')): the_row(); 
                                $red_social = strtolower(get_sub_field('red_social'));
                                $link = get_sub_field('link');
                                $gradients = [
                                    'facebook' => 'from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900',
                                    'twitter' => 'from-blue-400 to-blue-600 hover:from-blue-500 hover:to-blue-700',
                                    'instagram' => 'from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700',
                                    'tiktok' => 'from-gray-800 to-black hover:from-gray-900 hover:to-black',
                                    'linkedin' => 'from-blue-700 to-blue-900 hover:from-blue-800 hover:to-blue-950'
                                ];
                                $icons = [
                                    'facebook' => 'fa-facebook-f',
                                    'twitter' => 'fa-twitter',
                                    'instagram' => 'fa-instagram',
                                    'tiktok' => 'fa-tiktok',
                                    'linkedin' => 'fa-linkedin-in'
                                ];
                                
                                $gradient = isset($gradients[$red_social]) ? $gradients[$red_social] : 'from-gray-600 to-gray-800 hover:from-gray-700 hover:to-gray-900';
                                $icon = isset($icons[$red_social]) ? $icons[$red_social] : 'fa-link';
                            ?>
                            <a href="<?php echo esc_url($link); ?>" class="inline-flex items-center px-6 py-3 rounded-lg bg-gradient-to-r <?php echo $gradient; ?> transition-all duration-200 shadow-lg hover:shadow-xl">
                                <i class="fab <?php echo $icon; ?> text-xl"></i>
                                <span class="ml-2 font-medium"><?php echo ucfirst($red_social); ?></span>
                            </a>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-16 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Info -->
            <div class="lg:col-span-2">
                <!-- Biography -->
                <?php if (get_field('biografia')): ?>
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-semibold mb-6">Biografía</h2>
                    <div class="prose max-w-none">
                        <?php echo get_field('biografia'); ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Episodes -->
                <?php 
                // Get all episodes
                $episodios = get_posts(array(
                    'post_type' => 'episodio',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));

                $series_mostradas = array();
                
                if ($episodios): 
                    foreach ($episodios as $episodio) {
                        // Get the serie for this episode
                        $serie = get_field('serie', $episodio->ID);
                        
                        if ($serie && !in_array($serie->ID, $series_mostradas)) {
                            // Check if current actor is in the reparto
                            $actor_found = false;
                            $personaje_name = '';
                            
                            if (have_rows('reparto', $episodio->ID)) {
                                while (have_rows('reparto', $episodio->ID)) {
                                    the_row();
                                    $actor = get_sub_field('actor');
                                    if ($actor && $actor->ID == get_the_ID()) {
                                        $actor_found = true;
                                        $personaje = get_sub_field('personaje');
                                        if ($personaje) {
                                            $personaje_name = get_the_title($personaje);
                                        }
                                        break;
                                    }
                                }
                            }
                            
                            if ($actor_found):
                                $series_mostradas[] = $serie->ID; // Add to shown series array
                ?>
                                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                                    <h2 class="text-2xl font-semibold mb-6">Series</h2>
                                    <div class="space-y-6">
                                        <div class="flex items-start space-x-4">
                                            <?php if (has_post_thumbnail($serie->ID)): ?>
                                                <?php echo get_the_post_thumbnail($serie->ID, 'medium', array('class' => 'w-24 h-36 object-cover rounded-md')); ?>
                                            <?php endif; ?>
                                            <div>
                                                <h3 class="text-lg font-medium">
                                                    <a href="<?php echo get_permalink($serie); ?>" class="hover:text-red-600 transition-colors">
                                                        <?php echo get_the_title($serie); ?>
                                                    </a>
                                                </h3>
                                                <?php if ($personaje_name && $personaje): ?>
                                                    <p class="text-gray-600 mt-2">Como 
                                                        <a href="<?php echo get_permalink($personaje); ?>" class="hover:text-red-600 transition-colors">
                                                            <?php echo $personaje_name; ?>
                                                        </a>
                                                    </p>
                                                <?php endif; ?>
                                                <p class="text-sm text-gray-500 mt-1"><?php echo get_the_date('j \d\e F, Y', $episodio->ID); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                <?php 
                            endif;
                        }
                    }
                endif; 
                ?>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Awards & Recognition -->
                <?php if (have_rows('premios_reconocimientos')): ?>
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Premios y Reconocimientos</h3>
                    <ul class="space-y-4">
                        <?php while (have_rows('premios_reconocimientos')): the_row(); ?>
                        <li class="border-b pb-4">
                            <h4 class="font-medium"><?php echo get_sub_field('titulo_premio'); ?></h4>
                            <p class="text-sm text-gray-600 mt-1"><?php echo get_sub_field('motivo'); ?></p>
                            <p class="text-sm text-gray-500 mt-1"><?php echo get_sub_field('obra'); ?></p>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <!-- Skills -->
                <?php if (get_field('habilidades')): 
                    $habilidades = get_field('habilidades');
                    $colors = array(
                        'bg-blue-100 text-blue-800',
                        'bg-green-100 text-green-800',
                        'bg-yellow-100 text-yellow-800',
                        'bg-red-100 text-red-800',
                        'bg-purple-100 text-purple-800',
                        'bg-pink-100 text-pink-800'
                    );
                ?>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Habilidades</h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach ($habilidades as $index => $habilidad): 
                            $color_index = $index % count($colors);
                        ?>
                        <span class="px-3 py-1 rounded-full text-sm font-medium <?php echo $colors[$color_index]; ?>">
                            <?php echo $habilidad; ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>
