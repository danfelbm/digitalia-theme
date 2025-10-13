<?php
get_header();

while (have_posts()) :
    the_post();
    $location = get_field('location');
    $categories = get_the_terms(get_the_ID(), 'categoria-espacios');
    $tags = get_the_tags();
    ?>

    <article class="bg-slate-50 min-h-screen">
        <!-- Hero Section -->
        <div class="relative h-[60vh] min-h-[400px] bg-gray-900">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover opacity-80']); ?>
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8">
                <div class="max-w-7xl mx-auto">
                    <div class="max-w-3xl">
                        <?php if ($categories) : ?>
                            <div class="flex gap-2 mb-4">
                                <?php foreach ($categories as $category) : ?>
                                    <span class="bg-teal-500 text-white px-3 py-1 rounded-full text-sm"><?php echo esc_html($category->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="inline-flex items-center px-3 py-1 rounded-full bg-teal-500 bg-opacity-10 border border-teal-400 text-white text-sm font-medium mb-4 backdrop-blur-sm">
                            <span>Digitalia / Colaboratorio</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php the_title(); ?></h1>
                        <?php if ($intro_text = get_field('intro_text')) : ?>
                            <p class="text-lg text-gray-200 mb-6"><?php echo nl2br(esc_html($intro_text)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Descripción -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6">Sobre este espacio</h2>
                        <div class="prose max-w-none">
                            <?php the_field('description'); ?>
                        </div>
                    </div>

                    <!-- Características -->
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6">Características del espacio</h2>
                        <?php 
                        $characteristics = get_field('characteristics');
                        $features = $characteristics['characteristics_features'] ?? [];
                        ?>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            <?php if (!empty($characteristics['area'])) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-ruler-combined text-teal-500 text-xl"></i>
                                <span><?php echo esc_html($characteristics['area']); ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($characteristics['capacity'])) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-users text-teal-500 text-xl"></i>
                                <span><?php echo esc_html($characteristics['capacity']); ?></span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('wifi', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-wifi text-teal-500 text-xl"></i>
                                <span>WiFi de alta velocidad</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('parking', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-parking text-teal-500 text-xl"></i>
                                <span>Estacionamiento disponible</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('accessibility', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-universal-access text-teal-500 text-xl"></i>
                                <span>Accesibilidad universal</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('coffee', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-coffee text-teal-500 text-xl"></i>
                                <span>Zona de café</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('air_conditioning', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-snowflake text-teal-500 text-xl"></i>
                                <span>Aire acondicionado</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('natural_light', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-sun text-teal-500 text-xl"></i>
                                <span>Iluminación natural</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('projector', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-projector text-teal-500 text-xl"></i>
                                <span>Proyector</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('sound_system', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-volume-up text-teal-500 text-xl"></i>
                                <span>Sistema de sonido</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('kitchen', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-utensils text-teal-500 text-xl"></i>
                                <span>Cocina equipada</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('lockers', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-lock text-teal-500 text-xl"></i>
                                <span>Casilleros</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('meeting_rooms', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-door-closed text-teal-500 text-xl"></i>
                                <span>Salas de reuniones</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('outdoor_area', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-tree text-teal-500 text-xl"></i>
                                <span>Área al aire libre</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('bike_parking', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-bicycle text-teal-500 text-xl"></i>
                                <span>Estacionamiento de bicicletas</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('security', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-shield-alt text-teal-500 text-xl"></i>
                                <span>Seguridad 24/7</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('printing', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-print text-teal-500 text-xl"></i>
                                <span>Servicios de impresión</span>
                            </div>
                            <?php endif; ?>

                            <?php if ($features && in_array('phone_booths', (array)$features)) : ?>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-phone-volume text-teal-500 text-xl"></i>
                                <span>Cabinas telefónicas</span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Horarios -->
                    <?php $hours = get_field('hours'); ?>
                    <?php if (!empty($hours)) : ?>
                    <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                        <h2 class="text-2xl font-bold mb-6">Horarios de atención</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php if (!empty($hours['weekday_hours'])) : ?>
                            <div class="space-y-3">
                                <h3 class="font-semibold text-gray-900">Lunes a Viernes</h3>
                                <p class="text-gray-600"><?php echo esc_html($hours['weekday_hours']); ?></p>
                            </div>
                            <?php endif; ?>
                            
                            <?php if (!empty($hours['saturday_hours'])) : ?>
                            <div class="space-y-3">
                                <h3 class="font-semibold text-gray-900">Sábados</h3>
                                <p class="text-gray-600"><?php echo esc_html($hours['saturday_hours']); ?></p>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($hours['sunday_hours'])) : ?>
                            <div class="space-y-3">
                                <h3 class="font-semibold text-gray-900">Domingos</h3>
                                <p class="text-gray-600"><?php echo esc_html($hours['sunday_hours']); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($tags) : ?>
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Etiquetas relacionadas</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm hover:bg-gray-200 transition-colors">
                                        <?php echo esc_html($tag->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Mapa y Ubicación -->
                    <?php if ($location) : ?>
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden sticky top-8">
                            <div class="acf-map h-[300px]" data-zoom="16">
                                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <p><em><?php echo esc_html($location['address']); ?></em></p>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="font-semibold text-gray-900 mb-4">Ubicación</h3>
                                <p class="text-gray-600 mb-4"><?php echo esc_html($location['address']); ?></p>
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo esc_attr($location['lat']); ?>,<?php echo esc_attr($location['lng']); ?>" 
                                   target="_blank" 
                                   class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-teal-500 rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                    <i class="fas fa-directions mr-2"></i>
                                    Cómo llegar
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Contacto Rápido -->
                    <?php $contact = get_field('contact'); ?>
                    <?php if (!empty($contact['phone']) || !empty($contact['email']) || !empty($contact['whatsapp'])) : ?>
                    <div class="bg-white rounded-lg shadow-sm p-6 mt-8">
                        <h3 class="font-semibold text-gray-900 mb-4">Contacto rápido</h3>
                        <div class="space-y-4">
                            <?php if (!empty($contact['phone'])) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact['phone'])); ?>" class="flex items-center text-gray-600 hover:text-teal-500">
                                <i class="fas fa-phone mr-3"></i>
                                <span><?php echo esc_html($contact['phone']); ?></span>
                            </a>
                            <?php endif; ?>

                            <?php if (!empty($contact['email'])) : ?>
                            <a href="mailto:<?php echo esc_attr($contact['email']); ?>" class="flex items-center text-gray-600 hover:text-teal-500">
                                <i class="fas fa-envelope mr-3"></i>
                                <span><?php echo esc_html($contact['email']); ?></span>
                            </a>
                            <?php endif; ?>

                            <?php if (!empty($contact['whatsapp'])) : ?>
                            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $contact['whatsapp'])); ?>" target="_blank" class="flex items-center text-gray-600 hover:text-teal-500">
                                <i class="fab fa-whatsapp mr-3"></i>
                                <span>WhatsApp</span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </article>

<?php
endwhile;
get_footer();
