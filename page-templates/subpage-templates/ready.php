<?php
/**
 * Template Name: Módulo REaDy
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">

<section class="relative py-32 bg-purple-50">
    <div class="container absolute inset-x-0 top-0 hidden h-full overflow-hidden lg:block">
        <div class="flex flex-col items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 520" class="-mx-[theme(container.padding)] w-[calc(100%+2*theme(container.padding))]">
                <defs>
                    <radialGradient id="text-backgroud" cx="50%" cy="50%" r="0.6">
                        <stop stop-color="#F3E8FF" offset="0.4"></stop>
                        <stop stop-color="#F3E8FF" offset="1" stop-opacity="0"></stop>
                    </radialGradient>
                    <linearGradient id="icon-backgroud" x1="0" y1="0" x2="1" y2="1">
                        <stop stop-color="#F3E8FF" offset="0"></stop>
                        <stop stop-color="#E9D5FF" offset="1"></stop>
                    </linearGradient>
                    <mask id="mask">
                        <rect x="0" y="0" width="100%" height="100%" stroke="none" fill="black"></rect>
                        <rect x="80" y="40" width="1260" height="380" rx="140" stroke="none" filter="url(#blur)" fill="white"></rect>
                        <rect x="40" y="-120" width="1320" height="600" stroke="none" fill="url(#text-backgroud)"></rect>
                    </mask>
                    <filter id="blur" x="-50%" y="-50%" width="200%" height="200%">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="40"></feGaussianBlur>
                    </filter>
                </defs>
                <path stroke="#E9D5FF" stroke-width="1" d="M0,40H1400M0,120H1400M0,200H1400M0,280H1400M0,360H1400M0,440H1400M60,0V520M140,0V520M220,0V520M300,0V520M380,0V520M460,0V520M540,0V520M620,0V520M700,0V520M780,0V520M860,0V520M940,0V520M1020,0V520M1100,0V520M1180,0V520M1260,0V520M1340,0V520" mask="url(#mask)"></path>
                <rect x="140" y="120" width="80" height="80" stroke="#581C87" fill="url(#icon-backgroud)"></rect>
                <image href="https://shadcnblocks.com/images/block/block-1.svg" x="160" y="140" width="40" height="40"></image>
                <rect x="60" y="280" width="80" height="80" stroke="#581C87" fill="url(#icon-backgroud)"></rect>
                <image href="https://shadcnblocks.com/images/block/block-2.svg" x="80" y="300" width="40" height="40"></image>
                <rect x="300" y="360" width="80" height="80" stroke="#581C87" fill="url(#icon-backgroud)"></rect>
                <image href="https://shadcnblocks.com/images/block/block-3.svg" x="320" y="380" width="40" height="40"></image>
                <rect x="1180" y="40" width="80" height="80" stroke="#581C87" fill="url(#icon-backgroud)"></rect>
                <image href="https://shadcnblocks.com/images/block/block-4.svg" x="1200" y="60" width="40" height="40"></image>
                <rect x="1260" y="280" width="80" height="80" stroke="#581C87" fill="url(#icon-backgroud)"></rect>
                <image href="https://shadcnblocks.com/images/block/block-5.svg" x="1280" y="300" width="40" height="40"></image>
            </svg>
        </div>
    </div>
    <div class="container relative flex flex-col items-center text-center">
        <?php 
        // Debug ACF fields
        if(function_exists('get_fields')) {
            echo '<!-- All fields: ';
            var_dump(get_fields());
            echo ' -->';
        }
        
        $hero_fields = get_field('hero');
        
        if ($hero_fields && is_array($hero_fields)) :
            $title = isset($hero_fields['hero_title']) ? $hero_fields['hero_title'] : '';
            $description = isset($hero_fields['hero_description']) ? $hero_fields['hero_description'] : '';
            $cta_text = isset($hero_fields['cta']['cta_text']) ? $hero_fields['cta']['cta_text'] : '';
            $cta_url = isset($hero_fields['cta']['cta_url']) ? $hero_fields['cta']['cta_url'] : '#';
        ?>
            <h1 class="my-6 text-pretty text-4xl font-bold lg:text-6xl"><?php echo esc_html($title); ?></h1>
            <p class="mb-8 max-w-3xl text-muted-foreground lg:text-xl"><?php echo esc_html($description); ?></p>
            <div>
                <a href="<?php echo esc_url($cta_url); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-purple-700 text-white hover:bg-purple-800 h-10 px-4 py-2"><?php echo esc_html($cta_text); ?></a>
            </div>
        <?php 
        else:
            // For debugging
            echo '<!-- ACF Hero fields not found or invalid. Post ID: ' . get_the_ID() . ' -->';
            echo '<!-- Available fields: ' . esc_html(print_r(get_fields(), true)) . ' -->'; 
        endif;
        ?>
    </div>
</section>

<!-- Alfabetizadores Table Section -->
<section class="py-16">
    <div class="container">
        <!-- Filters -->
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <div class="flex-1">
                <label for="search-alfabetizador" class="block text-sm font-medium text-gray-700 mb-1">Buscar por nombre</label>
                <input type="text" id="search-alfabetizador" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="Escriba un nombre...">
            </div>
            <div class="w-full md:w-64">
                <label for="filter-location" class="block text-sm font-medium text-gray-700 mb-1">Ubicación</label>
                <select id="filter-location" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500">
                    <option value="">Todas las ubicaciones</option>
                    <?php
                    $locations = get_terms(array(
                        'taxonomy' => 'ubicaciones',
                        'parent' => 0,
                        'hide_empty' => true
                    ));
                    
                    if (!empty($locations) && !is_wp_error($locations)) {
                        foreach ($locations as $location) {
                            echo '<option value="' . esc_attr($location->name) . '">' . esc_html($location->name) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="w-full md:w-64">
                <label for="filter-especialidades" class="block text-sm font-medium text-gray-700 mb-1">Especialidades</label>
                <select id="filter-especialidades" class="w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500" multiple>
                    <?php
                    $especialidades = get_terms(array(
                        'taxonomy' => 'alfabetizadores-tags',
                        'hide_empty' => true
                    ));
                    
                    if (!empty($especialidades) && !is_wp_error($especialidades)) {
                        foreach ($especialidades as $especialidad) {
                            echo '<option value="' . esc_attr($especialidad->slug) . '">' . esc_html($especialidad->name) . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div id="alfabetizadores-table" class="relative overflow-x-auto rounded-lg border border-gray-200 shadow">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Ubicación</th>
                        <th scope="col" class="px-6 py-3">Especialidad</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $args = array(
                        'post_type' => 'alfabetizador',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC'
                    );

                    $alfabetizadores = new WP_Query($args);

                    if ($alfabetizadores->have_posts()) :
                        while ($alfabetizadores->have_posts()) : $alfabetizadores->the_post();
                            // Get ubicaciones (location) terms
                            $ubicaciones = get_the_terms(get_the_ID(), 'ubicaciones');
                            $locations = array();
                            $parent_location = ''; // For filtering purposes
                            
                            if ($ubicaciones && !is_wp_error($ubicaciones)) {
                                foreach ($ubicaciones as $ubicacion) {
                                    $locations[] = $ubicacion->name;
                                    if ($ubicacion->parent == 0) {
                                        $parent_location = $ubicacion->name;
                                    }
                                }
                            }

                            // Get estado (status) and set appropriate classes
                            $estado = get_field('estado');
                            $estado_class = '';
                            $estado_text = '';
                            
                            switch ($estado) {
                                case 'activo':
                                    $estado_class = 'bg-green-100 text-green-800';
                                    $estado_text = 'Activo';
                                    break;
                                case 'inactivo':
                                    $estado_class = 'bg-red-100 text-red-800';
                                    $estado_text = 'Inactivo';
                                    break;
                                case 'en_formacion':
                                    $estado_class = 'bg-yellow-100 text-yellow-800';
                                    $estado_text = 'En formación';
                                    break;
                            }
                    ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <a href="<?php the_permalink(); ?>" class="text-purple-600 hover:underline"><?php the_title(); ?></a>
                                </td>
                                <td class="px-6 py-4" data-parent-location="<?php echo esc_attr($parent_location); ?>">
                                    <?php echo esc_html(implode(', ', $locations)); ?>
                                </td>
                                <td class="px-6 py-4" data-tags="<?php 
                                    $tag_slugs = array();
                                    $tags = get_the_terms(get_the_ID(), 'alfabetizadores-tags');
                                    if ($tags && !is_wp_error($tags)) {
                                        foreach ($tags as $tag) {
                                            $tag_slugs[] = $tag->slug;
                                        }
                                    }
                                    echo esc_attr(implode(',', $tag_slugs));
                                ?>">
                                    <?php 
                                    if ($tags && !is_wp_error($tags)) {
                                        $tag_names = array();
                                        foreach ($tags as $tag) {
                                            $tag_names[] = $tag->name;
                                        }
                                        echo esc_html(implode(', ', $tag_names));
                                    }
                                    ?>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="rounded-full <?php echo esc_attr($estado_class); ?> px-2.5 py-0.5 text-xs font-medium">
                                        <?php echo esc_html($estado_text); ?>
                                    </span>
                                </td>
                            </tr>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                    ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">No se encontraron alfabetizadores.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- add map here -->
    <div class="container mt-8">
        <div class="map-container relative">
            <div class="acf-map rounded-lg border border-teal-100 px-1 pt-1" data-zoom="5">
                <?php
                $args = array(
                    'post_type' => 'alfabetizador',
                    'posts_per_page' => -1,
                );
                $alfabetizadores = new WP_Query($args);
                
                if ($alfabetizadores->have_posts()) :
                    while ($alfabetizadores->have_posts()) : $alfabetizadores->the_post();
                        $ubicaciones = get_the_terms(get_the_ID(), 'ubicaciones');
                        if ($ubicaciones && !is_wp_error($ubicaciones)) {
                            foreach ($ubicaciones as $ubicacion) {
                                // Get the location data (you'll need to add ACF fields for lat/lng to the ubicaciones taxonomy)
                                $location_data = get_field('location_data', 'ubicaciones_' . $ubicacion->term_id);
                                if ($location_data) {
                                    ?>
                                    <div class="marker" data-lat="<?php echo esc_attr($location_data['lat']); ?>" data-lng="<?php echo esc_attr($location_data['lng']); ?>">
                                        <h3 class="font-bold text-lg mb-2"><?php the_title(); ?></h3>
                                        <p class="mb-2"><?php echo esc_html(get_field('cargo')); ?></p>
                                        <p class="mb-3"><em><?php echo esc_html($ubicacion->name); ?></em></p>
                                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                            Ver perfil
                                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-alfabetizador');
    const locationSelect = document.getElementById('filter-location');
    const especialidadesSelect = document.getElementById('filter-especialidades');
    const table = document.getElementById('alfabetizadores-table');
    const rows = table.getElementsByTagName('tr');

    // Function to filter table
    function filterTable() {
        const searchText = searchInput.value.toLowerCase();
        const location = locationSelect.value.toLowerCase();
        const selectedEspecialidades = Array.from(especialidadesSelect.selectedOptions).map(option => option.value);

        Array.from(rows).forEach(row => {
            if (row.parentElement.tagName === 'THEAD') return;

            const name = row.cells[0].textContent.toLowerCase();
            const locationCell = row.cells[1];
            const parentLocation = locationCell.getAttribute('data-parent-location').toLowerCase();
            const especialidadesCell = row.cells[2];
            const rowTags = especialidadesCell.getAttribute('data-tags').split(',');

            const matchesSearch = name.includes(searchText);
            const matchesLocation = !location || parentLocation.includes(location);
            const matchesEspecialidades = selectedEspecialidades.length === 0 || 
                                        selectedEspecialidades.every(tag => rowTags.includes(tag));

            row.style.display = matchesSearch && matchesLocation && matchesEspecialidades ? '' : 'none';
        });
    }

    // Event listeners
    searchInput.addEventListener('input', filterTable);
    locationSelect.addEventListener('change', filterTable);
    especialidadesSelect.addEventListener('change', filterTable);
});
</script>

    <section id="acerca" class="bg-purple-800 pb-32 pt-24">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
                    <div class="rounded-full border border-purple-300 text-purple-300 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_field('ready2_about')['badge']['icon']); ?> h-auto w-4">
                            <?php if (get_field('ready2_about')['badge']['icon'] === 'graduation-cap'): ?>
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                            <?php endif; ?>
                        </svg>
                        <?php echo esc_html(get_field('ready2_about')['badge']['text']); ?>
                    </div>
                    <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl text-purple-100"><?php echo esc_html(get_field('ready2_about')['title']); ?></h2>
                    <p class="text-center text-purple-100 lg:text-left lg:text-lg"><?php echo esc_html(get_field('ready2_about')['description']); ?></p>
                    <a href="<?php echo esc_url(get_field('ready2_about')['cta']['cta_url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-purple-500 text-white hover:bg-purple-400 h-11 rounded-md px-8"><?php echo esc_html(get_field('ready2_about')['cta']['cta_text']); ?></a>
                    <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300"><?php echo esc_html(get_field('ready2_about')['stats']['stat_1']['number']); ?></p>
                                <p class="text-purple-400"><?php echo esc_html(get_field('ready2_about')['stats']['stat_1']['label']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300"><?php echo esc_html(get_field('ready2_about')['stats']['stat_2']['number']); ?></p>
                                <p class="text-purple-400"><?php echo esc_html(get_field('ready2_about')['stats']['stat_2']['label']); ?></p>
                            </div>
                        </div>
                        <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] hidden h-auto md:block"></div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-700 h-[1px] w-full block md:hidden"></div>
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300"><?php echo esc_html(get_field('ready2_about')['stats']['stat_3']['number']); ?></p>
                                <p class="text-purple-400"><?php echo esc_html(get_field('ready2_about')['stats']['stat_3']['label']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300"><?php echo esc_html(get_field('ready2_about')['stats']['stat_4']['number']); ?></p>
                                <p class="text-purple-400"><?php echo esc_html(get_field('ready2_about')['stats']['stat_4']['label']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <?php 
                    $media = get_field('ready2_about')['media'];
                    if ($media) {
                        $mime_type = $media['mime_type'];
                        if (strpos($mime_type, 'video') !== false) {
                            echo '<video class="ml-auto max-h-[450px] w-full rounded-xl object-cover" controls loop>';
                            echo '<source src="' . esc_url($media['url']) . '" type="' . esc_attr($mime_type) . '">';
                            echo 'Your browser does not support the video tag.';
                            echo '</video>';
                        } else {
                            echo '<img src="' . esc_url($media['url']) . '" alt="REaDy - Red de Aprendizaje Digital" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <?php if(have_rows('ready2_about_features')): ?>
                    <?php while(have_rows('ready2_about_features')): the_row(); ?>
                        <div class="flex flex-col gap-4">
                            <div class="gap flex flex-col gap-3 rounded-lg border border-purple-700 bg-purple-800/50 p-6">
                                <div class="flex flex-col items-center gap-2 lg:flex-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr(get_sub_field('icon')); ?> h-auto w-6 text-purple-300">
                                        <?php if (get_sub_field('icon') === 'shield-check'): ?>
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                            <path d="m9 12 2 2 4-4"></path>
                                        <?php elseif (get_sub_field('icon') === 'users'): ?>
                                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <?php elseif (get_sub_field('icon') === 'brain-circuit'): ?>
                                            <path d="M12 4.5a2.5 2.5 0 0 0-4.96-.46 2.5 2.5 0 0 0-1.98 3 2.5 2.5 0 0 0-1.32 4.24 3 3 0 0 0 .34 5.58 2.5 2.5 0 0 0 2.96 3.08 2.5 2.5 0 0 0 4.91.05L12 20V4.5Z"></path>
                                            <path d="M16 8V5c0-1.1.9-2 2-2"></path>
                                            <path d="M12 13h4"></path>
                                            <path d="M12 18h6a2 2 0 0 1 2 2v1"></path>
                                            <path d="M20.5 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                                            <path d="M16.5 13a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                                            <path d="M20.5 21a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                                        <?php endif; ?>
                                    </svg>
                                    <h3 class="text-center text-lg font-medium lg:text-left text-white"><?php echo esc_html(get_sub_field('title')); ?></h3>
                                </div>
                                <p class="text-center text-sm text-purple-300 md:text-base lg:text-left"><?php echo esc_html(get_sub_field('description')); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="bg-purple-100 py-32">
        <div class="px-0">
            <h1 class="container text-3xl font-bold lg:text-5xl">
                <span class="text-purple-700">Blog.</span><br>
                <span class="text-purple-950">Últimas novedades y actualizaciones</span>
            </h1>
            <div class="mt-8">
                <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-200 h-[1px] w-full"></div>
                <div class="">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                        $categories = get_the_category();
                    ?>
                        <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-4">
                            <div class="hidden items-center gap-3 self-start lg:flex">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'thumbnail'); ?>" alt="<?php the_title(); ?>" class="h-auto w-11">
                                <?php endif; ?>
                                <div class="flex flex-col gap-1">
                                    <span class="font-semibold text-purple-900"><?php echo get_bloginfo('name'); ?></span>
                                    <span class="text-sm text-purple-600">Equipo</span>
                                </div>
                            </div>
                            <div class="col-span-2 max-w-xl">
                                <span class="mb-2 text-sm font-medium text-purple-600">
                                    <?php echo get_the_date('d F Y'); ?>
                                    <span class="inline lg:hidden"> - <?php echo get_bloginfo('name'); ?></span>
                                </span>
                                <h3 class="text-2xl font-bold hover:text-purple-700 lg:text-3xl">
                                    <a href="<?php the_permalink(); ?>" class="text-purple-900 hover:text-purple-700"><?php the_title(); ?></a>
                                </h3>
                                <div class="mt-5 flex flex-wrap gap-2">
                                    <?php
                                    if ($categories) :
                                        foreach ($categories as $category) :
                                    ?>
                                        <a href="<?php echo get_category_link($category->term_id); ?>" class="flex items-center gap-1.5 rounded-full border border-purple-200 px-3 py-1.5 text-sm font-medium text-purple-700 transition-colors hover:bg-purple-100">
                                            <?php echo $category->name; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4 text-purple-600">
                                                <path d="M9 18l6-6-6-6"></path>
                                            </svg>
                                        </a>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-purple-200 bg-white hover:bg-purple-50 text-purple-700 h-10 w-10 ml-auto hidden lg:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Leer más</span>
                            </a>
                        </div>
                        <?php if (!$query->is_last_post()) : ?>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-200 h-[1px] w-full"></div>
                        <?php endif; ?>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="container mt-8 flex justify-center">
                    <a href="/blog-y-noticias" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-purple-600 text-white hover:bg-purple-500 h-10 px-4 py-2">
                        Ver todas las noticias
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
