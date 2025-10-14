<?php
/**
 * The template for displaying alfabetizador profiles
 * 
 * @package digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php while (have_posts()) : the_post(); 
        $estado = get_field('estado');
        $estado_classes = array(
            'activo' => 'bg-green-100 text-green-800',
            'inactivo' => 'bg-red-100 text-red-800',
            'en_formacion' => 'bg-yellow-100 text-yellow-800'
        );
        $estado_label = array(
            'activo' => 'Activo',
            'inactivo' => 'Inactivo',
            'en_formacion' => 'En Formación'
        );
    ?>
    <!-- Hero Section with Avatar -->
    <section class="relative min-h-[500px] bg-gray-900">
        <!-- Featured Image with Overlay -->
        <div class="absolute inset-0">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('full', array('class' => 'h-full w-full object-cover')); ?>
            <?php endif; ?>
            <div class="absolute inset-0 bg-linear-to-b from-black/50 to-black/80"></div>
        </div>
        
        <div class="container relative py-24">
            <div class="mx-auto max-w-4xl text-center">
                <!-- Avatar Circle -->
                <div class="relative mx-auto mb-8 h-48 w-48 overflow-hidden rounded-full border-4 border-white shadow-xl">
                    <?php
                    $avatar = get_field('avatar');
                    if ($avatar) : ?>
                        <img src="<?php echo esc_url($avatar['sizes']['thumbnail']); ?>" 
                             alt="<?php echo esc_attr($avatar['alt'] ?: get_the_title() . ' - Avatar'); ?>" 
                             class="h-full w-full object-cover">
                    <?php elseif (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('thumbnail', array(
                            'class' => 'h-full w-full object-cover',
                            'alt' => get_the_title() . ' - Avatar'
                        )); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" 
                             alt="<?php echo esc_attr(get_the_title() . ' - Avatar'); ?>" 
                             class="h-full w-full object-cover">
                    <?php endif; ?>
                    <?php if ($estado === 'activo') : ?>
                    <div class="absolute bottom-0 right-0 rounded-full bg-green-500 p-2">
                        <div class="h-4 w-4 rounded-full bg-white"></div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Categories -->
                <div class="mb-4 flex flex-wrap justify-center gap-2">
                    <?php
                    $tags = get_the_terms(get_the_ID(), 'alfabetizadores-tags');
                    if ($tags && !is_wp_error($tags)) :
                        foreach ($tags as $tag) : ?>
                            <span class="rounded-full bg-purple-600/80 px-4 py-1 text-sm text-white backdrop-blur-sm">
                                <?php echo esc_html($tag->name); ?>
                            </span>
                        <?php endforeach;
                    endif; ?>
                </div>
                
                <!-- Name and Role -->
                <h1 class="mb-4 text-4xl font-bold text-white lg:text-5xl"><?php the_title(); ?></h1>
                <p class="text-xl text-gray-200"><?php echo esc_html(get_field('cargo')); ?></p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16">
        <div class="container">
            <div class="mx-auto max-w-4xl">
                <!-- Info Cards Grid -->
                <div class="mb-12 grid gap-6 md:grid-cols-3">
                    <!-- Location Card -->
                    <div class="rounded-xl bg-white p-6 shadow-sm">
                        <div class="mb-4 inline-block rounded-full bg-purple-100 p-3">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900">Ubicación</h3>
                        <p class="text-gray-600">
                            <?php
                            $ubicaciones = get_the_terms(get_the_ID(), 'ubicaciones');
                            if ($ubicaciones && !is_wp_error($ubicaciones)) {
                                $ubicacion_names = array();
                                foreach ($ubicaciones as $ubicacion) {
                                    $ubicacion_names[] = $ubicacion->name;
                                }
                                echo esc_html(implode(', ', $ubicacion_names));
                            }
                            ?>
                        </p>
                    </div>

                    <!-- Specialty Card -->
                    <div class="rounded-xl bg-white p-6 shadow-sm">
                        <div class="mb-4 inline-block rounded-full bg-purple-100 p-3">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900">Especialidad</h3>
                        <p class="text-gray-600"><?php echo esc_html(get_field('especialidad')); ?></p>
                    </div>

                    <!-- Status Card -->
                    <div class="rounded-xl bg-white p-6 shadow-sm">
                        <div class="mb-4 inline-block rounded-full bg-purple-100 p-3">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 font-semibold text-gray-900">Estado</h3>
                        <span class="rounded-full px-3 py-1 text-sm font-medium <?php echo esc_attr($estado_classes[$estado]); ?>">
                            <?php echo esc_html($estado_label[$estado]); ?>
                        </span>
                    </div>
                </div>

                <!-- About Section -->
                <div class="mb-12 rounded-xl bg-white p-8 shadow-sm">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Sobre Mí</h2>
                    <div class="prose max-w-none">
                        <?php echo wp_kses_post(get_field('sobre_mi')); ?>
                    </div>
                </div>

                <!-- Experience Section -->
                <?php if (have_rows('experiencia')) : ?>
                <div class="mb-12 rounded-xl bg-white p-8 shadow-sm">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Experiencia</h2>
                    <div class="space-y-8">
                        <?php while (have_rows('experiencia')) : the_row(); 
                            $periodo = get_sub_field('periodo');
                            $fin = !empty($periodo['fin']) ? $periodo['fin'] : 'Presente';
                        ?>
                        <div class="relative pl-8 before:absolute before:left-0 before:top-0 before:h-full before:w-0.5 before:bg-purple-200">
                            <div class="absolute -left-1.5 top-1.5 h-3 w-3 rounded-full bg-purple-500"></div>
                            <h3 class="mb-2 text-lg font-semibold text-gray-900"><?php echo esc_html(get_sub_field('cargo')); ?></h3>
                            <p class="mb-4 text-sm text-gray-500"><?php echo esc_html($periodo['inicio']); ?> - <?php echo esc_html($fin); ?></p>
                            <p class="text-gray-600"><?php echo esc_html(get_sub_field('descripcion')); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Projects Section -->
                <?php if (have_rows('proyectos')) : ?>
                <div class="rounded-xl bg-white p-8 shadow-sm">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900">Proyectos Destacados</h2>
                    <div class="grid gap-6 md:grid-cols-2">
                        <?php while (have_rows('proyectos')) : the_row(); 
                            $periodo = get_sub_field('periodo');
                            $fin = !empty($periodo['fin']) ? $periodo['fin'] : 'En curso';
                        ?>
                        <div class="rounded-lg border border-gray-200 p-6">
                            <h3 class="mb-2 text-lg font-semibold text-gray-900"><?php echo esc_html(get_sub_field('nombre')); ?></h3>
                            <p class="mb-4 text-sm text-gray-500"><?php echo esc_html($periodo['inicio']); ?> - <?php echo esc_html($fin); ?></p>
                            <p class="text-gray-600"><?php echo esc_html(get_sub_field('descripcion')); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
</main>

<?php
get_footer();
