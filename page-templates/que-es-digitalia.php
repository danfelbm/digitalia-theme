<?php
/**
 * Template Name: Qué es Digitalia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => get_field('qd_header')['title'] ?: 'Qué es Digitalia',
        'subtitle' => get_field('qd_header')['subtitle'] ?: 'Conoce más sobre nuestra plataforma digital y su propósito.',
        'show_cta' => false,
        'cta_text' => 'Más información',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <?php get_template_part('template-parts/page-content'); ?>

    <section class="magicpattern py-32 bg-slate-100">
        <div class="container flex flex-col gap-28">
            <div class="flex flex-col gap-7">
                <h1 class="text-4xl font-semibold lg:text-7xl"><?php echo get_field('qd_hero')['title'] ?: 'Educomunicación para la'; ?> <span class="bg-slate-400/30">paz</span></h1>
                <p class="max-w-xl text-lg"><?php echo get_field('qd_hero')['description']; ?></p>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <?php 
                $hero_image = get_field('qd_hero')['image'];
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" 
                         alt="<?php echo esc_attr($hero_image['alt']); ?>" 
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php else: ?>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" 
                         alt="Educomunicación Digital" 
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php endif; ?>
                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground"><?php echo get_field('qd_hero')['mission_label']; ?></p>
                    <p class="text-lg font-medium"><?php echo get_field('qd_hero')['mission_text']; ?></p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div class="max-w-xl">
                    <h2 class="mb-2.5 text-3xl font-semibold md:text-5xl"><?php echo get_field('qd_transformation')['title']; ?></h2>
                    <p class="text-muted-foreground"><?php echo get_field('qd_transformation')['subtitle']; ?></p>
                </div>
                <div class="w-full">
                    <div style="padding:56.25% 0 0 0;position:relative;">
                        <iframe src="https://player.vimeo.com/video/1058629239?title=0&amp;byline=0&amp;portrait=0&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" 
                            frameborder="0" 
                            allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media" 
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" 
                            title="Especiales Canal 13 — Digitalia Primera Parte">
                        </iframe>
                    </div>
                    <script src="https://player.vimeo.com/api/player.js"></script>
                </div>
            </div>
            <div class="grid gap-10 md:grid-cols-3">
                <?php 
                $modules = array(
                    'module1' => get_field('qd_modules')['module1'],
                    'module2' => get_field('qd_modules')['module2'],
                    'module3' => get_field('qd_modules')['module3']
                );
                
                foreach ($modules as $module): ?>
                    <div class="flex flex-col">
                        <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-accent">
                            <i class="fa <?php echo esc_attr($module['icon']); ?>"></i>
                        </div>
                        <h3 class="mb-3 mt-2 text-lg font-semibold"><?php echo $module['title']; ?></h3>
                        <p class="text-muted-foreground"><?php echo $module['description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="grid gap-10 md:grid-cols-2">
                <div>
                    <p class="mb-10 text-sm font-medium text-muted-foreground"><?php echo get_field('qd_commitment')['label']; ?></p>
                    <h2 class="mb-4 text-3xl font-semibold md:text-5xl"><?php echo get_field('qd_commitment')['title']; ?></h2>
                    <p class="text-muted-foreground"><?php echo get_field('qd_commitment')['description']; ?></p>
                </div>
                <div>
                    <?php 
                    $commitment_media = get_field('qd_commitment')['media'];
                    $media_type = isset($commitment_media['type']) ? $commitment_media['type'] : 'image';
                    
                    if ($media_type === 'image' && !empty($commitment_media['image'])): ?>
                        <img src="<?php echo esc_url($commitment_media['image']['url']); ?>" 
                             alt="<?php echo esc_attr($commitment_media['image']['alt']); ?>" 
                             class="mb-6 w-full rounded-xl object-cover">
                    <?php elseif ($media_type === 'video'): ?>
                        <?php if (!empty($commitment_media['video'])): ?>
                            <video 
                                src="<?php echo esc_url($commitment_media['video']['url']); ?>" 
                                controls
                                class="mb-6 w-full rounded-xl object-cover" 
                                style="max-height: 350px;">
                            </video>
                        <?php elseif (!empty($commitment_media['video_url'])): 
                            // Extraer ID de video de YouTube o Vimeo
                            $video_url = $commitment_media['video_url'];
                            $youtube_id = '';
                            $vimeo_id = '';
                            
                            // Detectar YouTube
                            if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $video_url, $matches) || 
                                preg_match('/youtu\.be\/([^&]+)/', $video_url, $matches)) {
                                $youtube_id = $matches[1];
                            }
                            // Detectar Vimeo
                            elseif (preg_match('/vimeo\.com\/([0-9]+)/', $video_url, $matches)) {
                                $vimeo_id = $matches[1];
                            }
                            
                            if ($youtube_id): ?>
                                <div class="mb-6 w-full rounded-xl overflow-hidden">
                                    <iframe 
                                        width="100%" 
                                        height="350" 
                                        src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            <?php elseif ($vimeo_id): ?>
                                <div class="mb-6 w-full rounded-xl overflow-hidden">
                                    <iframe 
                                        src="https://player.vimeo.com/video/<?php echo esc_attr($vimeo_id); ?>" 
                                        width="100%" 
                                        height="350" 
                                        frameborder="0" 
                                        allow="autoplay; fullscreen; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            <?php else: ?>
                                <div class="mb-6 w-full rounded-xl overflow-hidden">
                                    <a href="<?php echo esc_url($video_url); ?>" target="_blank" class="block p-4 bg-gray-100 text-center">
                                        Ver video externo
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <img src="https://www.shadcnblocks.com/images/block/placeholder-2.svg" 
                                 alt="Ciudadanía Digital" 
                                 class="mb-6 w-full rounded-xl object-cover">
                        <?php endif; ?>
                    <?php else: ?>
                        <img src="https://www.shadcnblocks.com/images/block/placeholder-2.svg" 
                             alt="Ciudadanía Digital" 
                             class="mb-6 w-full rounded-xl object-cover">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    // Function to get team color classes
    function get_team_color_classes($team) {
        $team = strtolower(trim($team));
        $colors = [
            'direccion transversal' => 'bg-slate-500 text-white',
            'total transmedia' => 'bg-blue-500 text-white',
            'en linea' => 'bg-red-500 text-white',
            'academia' => 'bg-amber-500 text-white',
            'ready' => 'bg-purple-500 text-white',
            'colaboratorio' => 'bg-teal-500 text-white',
            'sin equipo' => 'bg-gray-500 text-white'
        ];
        
        return isset($colors[$team]) ? $colors[$team] : 'bg-gray-500 text-white';
    }

    // Function to parse personas directory and create JSON data
    function get_personas_data() {
        $personas_dir = get_template_directory() . '/assets/personas';
        $personas = [];
        
        if ($handle = opendir($personas_dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && !pathinfo($entry, PATHINFO_EXTENSION)) {
                    // Try first with _-_ separator
                    $parts = explode('_-_', $entry);
                    
                    // If we don't get 3 parts, try with just - separator
                    if (count($parts) !== 3) {
                        $parts = explode('-', $entry);
                    }
                    
                    // Clean up parts by removing extra underscores and trimming
                    if (count($parts) >= 2) { 
                        $name_part = array_shift($parts); // Get the first part (name)
                        
                        // Handle cases with and without team
                        if (count($parts) >= 2) {
                            $team_part = array_shift($parts); // Get the second part (team)
                            $role_part = implode('-', $parts); // Join the rest for role
                        } else {
                            $team_part = "Sin Equipo"; // Default team
                            $role_part = implode('-', $parts); // The remaining part is the role
                        }
                        
                        $name = str_replace('_', ' ', $name_part);
                        $team = str_replace('_', ' ', $team_part);
                        $role = str_replace('_', ' ', pathinfo($role_part, PATHINFO_FILENAME));
                        
                        // Get first image from person's directory
                        $person_dir = $personas_dir . '/' . $entry;
                        $image = '';
                        if ($img_handle = opendir($person_dir)) {
                            while (false !== ($img = readdir($img_handle))) {
                                if (in_array(strtolower(pathinfo($img, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
                                    $image = 'assets/personas/' . $entry . '/' . $img;
                                    break;
                                }
                            }
                            closedir($img_handle);
                        }
                        
                        // Debug information
                        error_log("Processing persona: " . $name);
                        error_log("Team: " . $team);
                        error_log("Role: " . $role);
                        error_log("Image: " . $image);
                        error_log("Original entry: " . $entry);
                        error_log("Parts count: " . count($parts));
                        
                        $personas[] = [
                            'name' => ucwords($name),
                            'team' => ucwords(trim($team)),
                            'role' => ucwords($role),
                            'image' => $image,
                            'priority' => (stripos($name, 'Lucy') !== false || stripos($name, 'Farith') !== false) ? 1 : 2
                        ];
                    }
                }
            }
            closedir($handle);
        }
        
        // Sort the array by priority first, then by team, then by name
        usort($personas, function($a, $b) {
            // First compare priority
            if ($a['priority'] !== $b['priority']) {
                return $a['priority'] - $b['priority'];
            }
            
            // Custom team order: Direccion Transversal, Academia, En Linea, Total Transmedia
            $team_order = [
                'Direccion Transversal' => 1,
                'Academia' => 2,
                'En Linea' => 3,
                'Total Transmedia' => 4,
                'Ready' => 5,
                'Colaboratorio' => 6,
                'Sin Equipo' => 7
            ];
            
            // Get the order value for each team (default to 999 if not in the list)
            $a_order = isset($team_order[$a['team']]) ? $team_order[$a['team']] : 999;
            $b_order = isset($team_order[$b['team']]) ? $team_order[$b['team']] : 999;
            
            // Compare team order
            if ($a_order !== $b_order) {
                return $a_order - $b_order;
            }
            
            // Finally compare name
            return strcmp($a['name'], $b['name']);
        });
        
        return $personas;
    }
    ?>

    <section class="py-32">
        <div class="container flex flex-col items-start text-left">
            <p class="semibold"><?php echo get_field('qd_team')['label']; ?></p>
            <h2 class="my-6 text-pretty text-2xl font-bold lg:text-4xl"><?php echo get_field('qd_team')['title']; ?></h2>
            <p class="mb-8 text-muted-foreground md:text-base lg:max-w-3xl lg:text-lg"><?php echo get_field('qd_team')['description']; ?></p>
        </div>
        <div class="container mt-16 grid gap-x-12 gap-y-8 lg:grid-cols-2">
            <?php
            // Toggle between WordPress users and JSON data
            $use_wp_users = false; // Set to true to use WordPress users, false to use JSON data

            if ($use_wp_users) {
                // Original WordPress users code
                $users = get_users();
                foreach ($users as $user) :
                    $equipo = get_field('equipo', 'user_' . $user->ID);
                    if ($equipo) :
                        $pill_color = get_team_color_classes($equipo);
                        ?>
                        <div class="flex flex-col sm:flex-row">
                            <div class="mb-4 aspect-square w-full shrink-0 text-clip bg-accent sm:mb-0 sm:mr-5 sm:size-48">
                                <?php echo get_avatar($user->ID, 192); ?>
                            </div>
                            <div class="flex flex-1 flex-col items-start">
                                <p class="w-full text-left font-medium">
                                    <a href="<?php echo esc_url(get_author_posts_url($user->ID)); ?>" class="hover:text-accent-foreground transition-colors">
                                        <?php echo esc_html($user->display_name); ?>
                                    </a>
                                </p>
                                <p class="w-full text-left">
                                    <span class="inline-flex items-center rounded-full px-2 py-1 text-xs <?php echo $pill_color; ?>">
                                        <?php echo esc_html($equipo); ?>
                                    </span>
                                </p>
                                <p class="w-full py-2 text-sm text-muted-foreground"><?php echo esc_html($user->description); ?></p>
                                
                                <?php if (have_rows('red_social', 'user_' . $user->ID)) : ?>
                                    <div class="my-2 flex items-start gap-4">
                                        <?php while (have_rows('red_social', 'user_' . $user->ID)) : the_row(); 
                                            $social_type = get_sub_field('red_social_item');
                                            $profile_link = get_sub_field('link_al_perfil');
                                            if ($profile_link) :
                                                switch ($social_type) {
                                                    case 'facebook': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-facebook size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                    case 'twitter': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-twitter size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                    case 'instagram': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-instagram size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                    case 'tiktok': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-tiktok size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                    case 'linkedin': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-linkedin size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                    case 'youtube': ?>
                                                        <a href="<?php echo esc_url($profile_link); ?>">
                                                            <i class="fa-brands fa-youtube size-4 text-muted-foreground"></i>
                                                        </a>
                                                    <?php break;
                                                }
                                            endif;
                                        endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php 
                    endif;
                endforeach;
            } else {
                // Get and display personas data
                $personas = get_personas_data();
                $displayed_teams = []; // Track which teams have already been displayed
                
                foreach ($personas as $persona) :
                    // Add team header if this team hasn't been displayed yet
                    if (!in_array($persona['team'], $displayed_teams)) :
                        $displayed_teams[] = $persona['team']; // Mark this team as displayed
                        ?>
                        <div class="col-span-2 mt-8 first:mt-0">
                            <h3 class="text-xl font-semibold"><?php echo esc_html($persona['team']); ?></h3>
                        </div>
                    <?php endif;
                    
                    $pill_color = get_team_color_classes($persona['team']);
                    ?>
                    <div class="flex flex-col sm:flex-row">
                        <div class="mb-4 aspect-square w-full shrink-0 text-clip bg-accent sm:mb-0 sm:mr-5 sm:size-48 overflow-hidden">
                            <?php if ($persona['image']) : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/' . $persona['image']); ?>" 
                                     alt="<?php echo esc_attr($persona['name']); ?>" 
                                     class="size-full object-cover object-top">
                            <?php endif; ?>
                        </div>
                        <div class="flex flex-1 flex-col items-start">
                            <p class="w-full text-left font-medium">
                                <span class="hover:text-accent-foreground transition-colors">
                                    <?php 
                                    if (strtolower($persona['name']) === 'botiliti0') {
                                        echo 'BotLiti0 (Botilito)';
                                    } else {
                                        echo esc_html($persona['name']); 
                                    }
                                    ?>
                                </span>
                            </p>
                            <p class="w-full text-left">
                                <span class="inline-flex items-center rounded-full px-2 py-1 text-xs <?php echo $pill_color; ?>">
                                    <?php echo esc_html($persona['team']); ?>
                                </span>
                            </p>
                            <p class="w-full py-2 text-sm text-muted-foreground"><?php echo esc_html($persona['role']); ?></p>
                            <?php if (strtolower($persona['name']) === 'botiliti0') : ?>
                                <button onclick="document.querySelector('.chat-toggle').click()" class="px-4 py-2 text-sm bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">
                                    Chatear conmigo
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php 
                endforeach;
            }
            ?>
        </div>
    </section>

    <section class="py-32">
        <div class="container flex flex-col items-start gap-16 lg:px-9">
            <div class="text-left">
                <p class="mb-6 text-xs font-medium uppercase tracking-wider text-muted-foreground"><?php echo get_field('qd_blog')['label']; ?></p>
                <h2 class="mb-3 text-pretty text-3xl font-semibold md:mb-4 md:text-4xl lg:mb-6 lg:max-w-3xl lg:text-5xl"><?php echo get_field('qd_blog')['title']; ?></h2>
                <p class="mb-8 text-muted-foreground md:text-base lg:max-w-2xl lg:text-lg"><?php echo get_field('qd_blog')['description']; ?></p>
                <?php 
                $blog_button = get_field('qd_blog')['button'];
                $button_text = get_field('qd_blog')['button_text'];
                if ($blog_button): ?>
                    <a href="<?php echo esc_url($blog_button['url']); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($button_text); ?>
                        <i class="fa fa-arrow-right ml-2 size-4"></i>
                    </a>
                <?php else: ?>
                    <a href="/blog-y-noticias" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($button_text ?: 'Leer más entradas del blog'); ?>
                        <i class="fa fa-arrow-right ml-2 size-4"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $latest_posts = new WP_Query($args);

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>" class="flex flex-col text-clip rounded-xl border border-border">
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'aspect-video size-full object-cover object-center')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title(); ?>" class="aspect-video size-full object-cover object-center">
                            <?php endif; ?>
                        </div>
                        <div class="px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                            <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-xl lg:mb-6"><?php the_title(); ?></h3>
                            <p class="mb-3 text-muted-foreground md:mb-4 lg:mb-6"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <p class="flex items-center hover:underline">
                                Leer más
                                <i class="fa fa-arrow-right ml-2 size-4"></i>
                            </p>
                        </div>
                    </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
