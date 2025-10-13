<?php
get_header();

while (have_posts()) :
    the_post();
    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar_url($author_id);
    ?>
<section class="bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="relative bg-gray-900 text-white p-8 rounded-lg mb-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
                
                <!-- Author Info -->
                <div class="flex items-center space-x-4">
                    <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>" class="w-10 h-10 rounded-full">
                    <div>
                        <span class="block font-medium"><?php the_author(); ?></span>
                        <span class="text-sm text-gray-400"><?php echo get_the_date('F j, Y'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2">
                <!-- Course Description -->
                <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                    <p class="text-gray-600 leading-relaxed">
                        <?php the_content(); ?>
                    </p>
                </div>

                <!-- Navigation Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="flex space-x-8">
                        <button class="border-b-2 border-green-500 pb-4 px-1 text-green-600">Curso</button>
                    </nav>
                </div>

                <!-- Course Sections -->
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">Contenido del Curso</h2>
                        <button class="text-gray-600 hover:text-gray-900">Expandir Todo</button>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Module 1 -->
                        <div class="border rounded-lg">
                            <button class="w-full px-4 py-3 flex justify-between items-center hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="font-medium">Módulo 1: Introducción al Curso</span>
                                </div>
                                <span class="text-sm text-gray-500">3 lecciones • 45 min</span>
                            </button>
                        </div>

                        <!-- Module 2 -->
                        <div class="border rounded-lg">
                            <button class="w-full px-4 py-3 flex justify-between items-center hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="font-medium">Módulo 2: Fundamentos Básicos</span>
                                </div>
                                <span class="text-sm text-gray-500">4 lecciones • 1h 15min</span>
                            </button>
                        </div>

                        <!-- Module 3 -->
                        <div class="border rounded-lg">
                            <button class="w-full px-4 py-3 flex justify-between items-center hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="font-medium">Módulo 3: Prácticas Avanzadas</span>
                                </div>
                                <span class="text-sm text-gray-500">5 lecciones • 2h</span>
                            </button>
                        </div>

                        <!-- Module 4 -->
                        <div class="border rounded-lg">
                            <button class="w-full px-4 py-3 flex justify-between items-center hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="font-medium">Módulo 4: Proyecto Final</span>
                                </div>
                                <span class="text-sm text-gray-500">3 lecciones • 1h 30min</span>
                            </button>
                        </div>

                        <!-- Quiz Section -->
                        <div class="border rounded-lg">
                            <button class="w-full px-4 py-3 flex justify-between items-center hover:bg-gray-50">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="font-medium">Evaluación Final</span>
                                </div>
                                <span class="text-sm text-gray-500">1 cuestionario • 30min</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                    <!-- Preview Video -->
                    <div class="relative mb-4 rounded-lg overflow-hidden">
                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail('large', ['class' => 'w-full h-48 object-cover']);
                        endif;
                        ?>
                        <button class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-white rounded-full p-4 shadow-lg">
                                <svg class="w-6 h-6 text-gray-900" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4l12 6-12 6V4z"></path>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Enrolled Users -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex -space-x-2">
                            <?php
                            // Add enrolled users avatars here
                            ?>
                        </div>
                        <span class="text-sm text-gray-600">+19 inscritos</span>
                    </div>

                    <!-- Action Buttons -->
                    <button class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 mb-2">
                        Completar
                    </button>
                    <p class="text-center text-gray-600">Inscripción Abierta</p>

                    <!-- Course Includes -->
                    <div class="mt-6">
                        <h3 class="font-medium mb-4">El Curso Incluye</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                5 Lecciones
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                12 Temas
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                1 Cuestionario
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                Certificado del Curso
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Instructor -->
        <div class="mt-12 mb-12">
            <h2 class="text-xl font-bold mb-6">Sobre el Instructor</h2>
            <div class="flex items-center space-x-4">
                <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr(get_the_author()); ?>" class="w-12 h-12 rounded-full">
                <div>
                    <h3 class="font-medium"><?php the_author(); ?></h3>
                    <p class="text-sm text-gray-600">9 Cursos</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Buy Button -->
    <div class="fixed bottom-4 right-4">
        <button class="bg-white text-gray-900 px-6 py-3 rounded-full shadow-lg flex items-center space-x-2 hover:shadow-xl transition-shadow">
            <span>Comprar Ahora</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
        </button>
    </div>
</section>

<?php
endwhile;

get_footer();
?>
