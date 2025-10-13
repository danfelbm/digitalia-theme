<?php
/**
 * The template for displaying Espacio archive pages
 *
 * @package Digitalia
 */

get_header();
?>

<style>
    .acf-map {
        height: 100% !important;
    }
    @media (max-width: 768px) {
        .acf-map {
            min-height: 60vh !important;
        }
    }
</style>

<main id="primary" class="site-main min-h-screen flex flex-col">
    <div x-data="{ sidebarOpen: false }" 
         x-init="window.addEventListener('resize', () => { if (window.innerWidth >= 768) sidebarOpen = true })" 
         class="flex flex-col md:flex-row flex-1 relative">
        <!-- Mobile Toggle Button -->
        <button @click="sidebarOpen = !sidebarOpen" 
                class="md:hidden fixed right-4 top-1/2 -translate-y-1/2 z-[9999] bg-teal-600 text-white p-3 rounded-full shadow-lg flex items-center justify-center w-12 h-12">
            <i class="fa-solid" :class="sidebarOpen ? 'fa-times' : 'fa-list'"></i>
        </button>

        <!-- Sidebar -->
        <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" 
             class="w-full md:w-96 bg-white border-r border-teal-100 flex flex-col transition-transform duration-300 fixed md:relative top-16 md:top-0 left-0 bottom-0 z-[100] md:translate-x-0 overflow-y-auto">
            <!-- Search Bar -->
            <div class="border-b border-teal-100 p-4">
                <div class="relative">
                    <input type="text" id="space-search" class="w-full rounded-lg border border-teal-200 bg-teal-50/50 py-2 pl-10 pr-4 text-sm text-teal-900 placeholder-teal-600 focus:border-teal-500 focus:outline-none focus:ring-1 focus:ring-teal-500" placeholder="¿Qué espacio buscas?">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5"></i>
                </div>
            </div>

            <!-- Spaces List -->
            <div class="flex-1 overflow-y-auto">
                <?php if (have_posts()) : ?>
                    <div class="space-y-1 p-2">
                        <?php while (have_posts()) : the_post(); 
                            $characteristics = get_field('characteristics');
                        ?>
                            <a href="<?php the_permalink(); ?>" class="block">
                                <article class="group cursor-pointer space-y-2 rounded-lg p-3 transition-colors hover:bg-teal-50" data-lat="<?php echo esc_attr(get_field('location')['lat']); ?>" data-lng="<?php echo esc_attr(get_field('location')['lng']); ?>">
                                    <h2 class="flex items-center gap-2 font-medium text-teal-900">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <?php the_title(); ?>
                                    </h2>
                                    
                                    <?php if (get_field('location')['address']) : ?>
                                        <p class="text-sm text-teal-700"><?php echo esc_html(get_field('location')['address']); ?></p>
                                    <?php endif; ?>

                                    <?php if ($characteristics) : ?>
                                        <div class="flex flex-wrap gap-2">
                                            <?php if ($characteristics['area']) : ?>
                                                <span class="inline-flex items-center gap-1 rounded-md bg-teal-100/50 px-2 py-1 text-xs font-medium text-teal-700">
                                                    <i class="fa-solid fa-ruler"></i>
                                                    <?php echo esc_html($characteristics['area']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php if ($characteristics['capacity']) : ?>
                                                <span class="inline-flex items-center gap-1 rounded-md bg-teal-100/50 px-2 py-1 text-xs font-medium text-teal-700">
                                                    <i class="fa-solid fa-users"></i>
                                                    <?php echo esc_html($characteristics['capacity']); ?>
                                                </span>
                                            <?php endif; ?>

                                            <?php 
                                            if (!empty($characteristics['characteristics_features'])) :
                                                $feature_icons = array(
                                                    'wifi' => 'fa-solid fa-wifi',
                                                    'parking' => 'fa-solid fa-square-parking',
                                                    'accessibility' => 'fa-solid fa-wheelchair',
                                                    'coffee' => 'fa-solid fa-mug-hot',
                                                    'air_conditioning' => 'fa-solid fa-snowflake',
                                                    'natural_light' => 'fa-solid fa-sun',
                                                    'projector' => 'fa-solid fa-presentation-screen',
                                                    'sound_system' => 'fa-solid fa-volume-high',
                                                    'kitchen' => 'fa-solid fa-kitchen-set',
                                                    'lockers' => 'fa-solid fa-vault',
                                                    'meeting_rooms' => 'fa-solid fa-people-group',
                                                    'outdoor_area' => 'fa-solid fa-tree',
                                                    'bike_parking' => 'fa-solid fa-bicycle',
                                                    'security' => 'fa-solid fa-shield-halved',
                                                    'printing' => 'fa-solid fa-print',
                                                    'phone_booths' => 'fa-solid fa-phone-volume',
                                                );
                                                $feature_labels = array(
                                                    'wifi' => 'WiFi de alta velocidad',
                                                    'parking' => 'Estacionamiento disponible',
                                                    'accessibility' => 'Accesibilidad universal',
                                                    'coffee' => 'Zona de café',
                                                    'air_conditioning' => 'Aire acondicionado',
                                                    'natural_light' => 'Iluminación natural',
                                                    'projector' => 'Proyector',
                                                    'sound_system' => 'Sistema de sonido',
                                                    'kitchen' => 'Cocina equipada',
                                                    'lockers' => 'Casilleros',
                                                    'meeting_rooms' => 'Salas de reuniones',
                                                    'outdoor_area' => 'Área al aire libre',
                                                    'bike_parking' => 'Estacionamiento de bicicletas',
                                                    'security' => 'Seguridad 24/7',
                                                    'printing' => 'Servicios de impresión',
                                                    'phone_booths' => 'Cabinas telefónicas',
                                                );
                                                foreach ($characteristics['characteristics_features'] as $feature) : 
                                                    if (isset($feature_icons[$feature])) :
                                                ?>
                                                    <span class="inline-flex items-center gap-1 rounded-md bg-teal-100/50 px-2 py-1 text-xs font-medium text-teal-700" title="<?php echo esc_attr($feature_labels[$feature]); ?>">
                                                        <i class="<?php echo esc_attr($feature_icons[$feature]); ?>"></i>
                                                    </span>
                                                <?php 
                                                    endif;
                                                endforeach; 
                                            endif; 
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php 
                                    $hours = get_field('hours');
                                    if ($hours) : ?>
                                        <div class="mt-2 text-sm text-teal-700">
                                            <?php if ($hours['weekday_hours']) : ?>
                                                <p class="flex items-center gap-1">
                                                    <i class="fa-regular fa-clock"></i>
                                                    L-V: <?php echo esc_html($hours['weekday_hours']); ?>
                                                </p>
                                            <?php endif; ?>
                                            <?php if ($hours['saturday_hours']) : ?>
                                                <p class="flex items-center gap-1">
                                                    <i class="fa-regular fa-clock"></i>
                                                    S: <?php echo esc_html($hours['saturday_hours']); ?>
                                                </p>
                                            <?php endif; ?>
                                            <?php if ($hours['sunday_hours']) : ?>
                                                <p class="flex items-center gap-1">
                                                    <i class="fa-regular fa-clock"></i>
                                                    D: <?php echo esc_html($hours['sunday_hours']); ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </article>
                            </a>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <div class="p-4 text-center text-teal-700">
                        <p><?php esc_html_e('No spaces found.', 'digitalia'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Convenciones -->
            <div x-data="{ open: false }" class="mt-auto border-t border-teal-100 p-4">
                <button @click="open = !open" class="flex w-full items-center justify-between text-sm font-medium text-teal-900">
                    <span>Convenciones</span>
                    <i class="fa-solid fa-chevron-down transition-transform" :class="{ 'rotate-180': open }"></i>
                </button>
                
                <div x-show="open" x-transition class="mt-4 space-y-4">
                    <!-- Características -->
                    <div>
                        <h3 class="mb-2 text-xs font-medium uppercase text-teal-900">Características</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fa-solid fa-ruler text-teal-700"></i>
                                <span class="text-xs">Área</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fa-solid fa-users text-teal-700"></i>
                                <span class="text-xs">Capacidad</span>
                            </div>
                        </div>
                    </div>

                    <!-- Servicios -->
                    <div>
                        <h3 class="mb-2 text-xs font-medium uppercase text-teal-900">Servicios</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-wifi text-teal-700"></i>
                                <span class="text-xs">WiFi</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-square-parking text-teal-700"></i>
                                <span class="text-xs">Parking</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-wheelchair text-teal-700"></i>
                                <span class="text-xs">Accesibilidad</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-mug-hot text-teal-700"></i>
                                <span class="text-xs">Café</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-snowflake text-teal-700"></i>
                                <span class="text-xs">A/C</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-sun text-teal-700"></i>
                                <span class="text-xs">Luz natural</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-presentation-screen text-teal-700"></i>
                                <span class="text-xs">Proyector</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-volume-high text-teal-700"></i>
                                <span class="text-xs">Sonido</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-kitchen-set text-teal-700"></i>
                                <span class="text-xs">Cocina</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-vault text-teal-700"></i>
                                <span class="text-xs">Casilleros</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-people-group text-teal-700"></i>
                                <span class="text-xs">Salas reunión</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-tree text-teal-700"></i>
                                <span class="text-xs">Área exterior</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-bicycle text-teal-700"></i>
                                <span class="text-xs">Bici parking</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-shield-halved text-teal-700"></i>
                                <span class="text-xs">Seguridad</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-print text-teal-700"></i>
                                <span class="text-xs">Impresión</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-phone-volume text-teal-700"></i>
                                <span class="text-xs">Cabinas tel.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Horarios -->
                    <div>
                        <h3 class="mb-2 text-xs font-medium uppercase text-teal-900">Horarios</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-clock text-teal-700"></i>
                                <span class="text-xs">Horario</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main Content - Map -->
        <div class="flex-1 md:h-auto h-[calc(100vh-64px)]">
            <div class="absolute inset-0">
                <div class="acf-map w-full h-full" data-zoom="12">
                    <?php 
                    if (have_posts()) : while (have_posts()) : the_post();
                        $location = get_field('location');
                        if ($location) :
                    ?>
                        <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="mb-2 text-lg font-bold"><?php the_title(); ?></h3>
                                <?php if (get_field('intro_text')) : ?>
                                    <p class="mb-2"><?php echo esc_html(get_field('intro_text')); ?></p>
                                <?php endif; ?>
                                <?php if ($location['address']) : ?>
                                    <p class="mb-3"><em><?php echo esc_html($location['address']); ?></em></p>
                                <?php endif; ?>
                                <?php $characteristics = get_field('characteristics'); ?>
                                <?php if ($characteristics) : ?>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <?php if ($characteristics['area']) : ?>
                                            <span class="inline-flex items-center gap-1 rounded-md bg-white/90 px-2 py-1 text-xs font-medium text-teal-700 shadow-sm">
                                                <i class="fa-solid fa-ruler"></i>
                                                <?php echo esc_html($characteristics['area']); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if ($characteristics['capacity']) : ?>
                                            <span class="inline-flex items-center gap-1 rounded-md bg-white/90 px-2 py-1 text-xs font-medium text-teal-700 shadow-sm">
                                                <i class="fa-solid fa-users"></i>
                                                <?php echo esc_html($characteristics['capacity']); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php 
                                        if (!empty($characteristics['characteristics_features'])) :
                                            $feature_icons = array(
                                                'wifi' => 'fa-solid fa-wifi',
                                                'parking' => 'fa-solid fa-square-parking',
                                                'accessibility' => 'fa-solid fa-wheelchair',
                                                'coffee' => 'fa-solid fa-mug-hot',
                                                'air_conditioning' => 'fa-solid fa-snowflake',
                                                'natural_light' => 'fa-solid fa-sun',
                                                'projector' => 'fa-solid fa-presentation-screen',
                                                'sound_system' => 'fa-solid fa-volume-high',
                                                'kitchen' => 'fa-solid fa-kitchen-set',
                                                'lockers' => 'fa-solid fa-vault',
                                                'meeting_rooms' => 'fa-solid fa-people-group',
                                                'outdoor_area' => 'fa-solid fa-tree',
                                                'bike_parking' => 'fa-solid fa-bicycle',
                                                'security' => 'fa-solid fa-shield-halved',
                                                'printing' => 'fa-solid fa-print',
                                                'phone_booths' => 'fa-solid fa-phone-volume',
                                            );
                                            $feature_labels = array(
                                                'wifi' => 'WiFi de alta velocidad',
                                                'parking' => 'Estacionamiento disponible',
                                                'accessibility' => 'Accesibilidad universal',
                                                'coffee' => 'Zona de café',
                                                'air_conditioning' => 'Aire acondicionado',
                                                'natural_light' => 'Iluminación natural',
                                                'projector' => 'Proyector',
                                                'sound_system' => 'Sistema de sonido',
                                                'kitchen' => 'Cocina equipada',
                                                'lockers' => 'Casilleros',
                                                'meeting_rooms' => 'Salas de reuniones',
                                                'outdoor_area' => 'Área al aire libre',
                                                'bike_parking' => 'Estacionamiento de bicicletas',
                                                'security' => 'Seguridad 24/7',
                                                'printing' => 'Servicios de impresión',
                                                'phone_booths' => 'Cabinas telefónicas',
                                            );
                                            foreach ($characteristics['characteristics_features'] as $feature) : 
                                                if (isset($feature_icons[$feature])) :
                                            ?>
                                                <span class="inline-flex items-center gap-1 rounded-md bg-white/90 px-2 py-1 text-xs font-medium text-teal-700 shadow-sm" title="<?php echo esc_attr($feature_labels[$feature]); ?>">
                                                    <i class="<?php echo esc_attr($feature_icons[$feature]); ?>"></i>
                                                </span>
                                            <?php 
                                                endif;
                                            endforeach; 
                                        endif; 
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <?php 
                                $hours = get_field('hours');
                                if ($hours) : ?>
                                    <div class="mt-2 text-sm text-teal-700">
                                        <?php if ($hours['weekday_hours']) : ?>
                                            <p class="flex items-center gap-1">
                                                <i class="fa-regular fa-clock"></i>
                                                L-V: <?php echo esc_html($hours['weekday_hours']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($hours['saturday_hours']) : ?>
                                            <p class="flex items-center gap-1">
                                                <i class="fa-regular fa-clock"></i>
                                                S: <?php echo esc_html($hours['saturday_hours']); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($hours['sunday_hours']) : ?>
                                            <p class="flex items-center gap-1">
                                                <i class="fa-regular fa-clock"></i>
                                                D: <?php echo esc_html($hours['sunday_hours']); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <button class="inline-flex items-center rounded-lg bg-teal-500 px-4 py-2 text-sm font-medium text-white transition-colors duration-200 hover:bg-teal-600">
                                    Ver espacio
                                    <i class="fa-solid fa-arrow-right ml-2"></i>
                                </button>
                            </a>
                        </div>
                    <?php 
                        endif;
                    endwhile; endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
