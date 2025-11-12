<?php
/**
 * digitalia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digitalia
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '2.5.9' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function digitalia_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on digitalia, use a find and replace
		* to change 'digitalia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'digitalia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'digitalia' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'digitalia_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'digitalia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digitalia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digitalia_content_width', 640 );
}
add_action( 'after_setup_theme', 'digitalia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digitalia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'digitalia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'digitalia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'digitalia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function digitalia_scripts() {
	//wp_enqueue_style( 'digitalia-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'digitalia-style', 'rtl', 'replace' );
    wp_enqueue_style( 'digitalia-tailwind-menu', get_template_directory_uri() . '/css/tailwind-menu.css', array(), _S_VERSION );
    wp_enqueue_style( 'digitalia-tailwind', get_template_directory_uri() . '/style.css', array('digitalia-tailwind-menu'), _S_VERSION );
    
    // Add Google Fonts
    wp_enqueue_style( 'digitalia-google-fonts', 'https://fonts.googleapis.com/css2?family=Lexend:wght@700&family=Work+Sans:wght@400&family=JetBrains+Mono:wght@500&display=swap', array(), null );
    
    // Add Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), '6.7.2' );
    
    // Add Radix UI
    wp_enqueue_script( 'radix-ui-tabs', 'https://unpkg.com/@radix-ui/tabs@latest/dist/index.umd.js', array(), null, true );
    
	wp_enqueue_script( 'digitalia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-menu', get_template_directory_uri() . '/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-video-scroll', get_template_directory_uri() . '/js/video-scroll.js', array(), _S_VERSION, true );

	wp_enqueue_script('alpine-js', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', array(), null, true);
	wp_script_add_data('alpine-js', 'defer', true);

	// Enqueue carousel script
	wp_enqueue_script('digitalia-carousel', get_template_directory_uri() . '/js/carousel.js', array(), _S_VERSION, true);

	// Enqueue chat.js in the footer
	wp_enqueue_script( 'digitalia-chat', get_template_directory_uri() . '/js/chat.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digitalia_scripts' );

/**
 * Enqueue Swiper.js for modules carousel
 */
function digitalia_enqueue_swiper() {
    if (is_page_template('page-templates/modulos.php')) {
        // Enqueue Swiper CSS from CDN
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array(),
            '11.0.5'
        );

        // Enqueue Swiper JS from CDN
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            '11.0.5',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'digitalia_enqueue_swiper');

/**
 * Enqueue Three.js Globe scripts
 */
function digitalia_enqueue_globe() {
	// Only load on front page or pages with globe
	if ( is_front_page() ) {
		// Enqueue Three.js from CDN (r128 to match our code)
		wp_enqueue_script(
			'threejs',
			'https://cdn.jsdelivr.net/npm/three@0.128.0/build/three.min.js',
			array(),
			'0.128.0',
			true
		);

		// Enqueue OrbitControls
		wp_enqueue_script(
			'threejs-orbit-controls',
			'https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js',
			array( 'threejs' ),
			'0.128.0',
			true
		);

		// Enqueue three-globe
		wp_enqueue_script(
			'three-globe',
			'https://cdn.jsdelivr.net/npm/three-globe@2.18.8/dist/three-globe.min.js',
			array( 'threejs' ),
			'2.18.8',
			true
		);

		// Enqueue our globe loader
		wp_enqueue_script(
			'digitalia-globe-loader',
			get_template_directory_uri() . '/js/globe/globe-loader.js',
			array( 'threejs', 'threejs-orbit-controls', 'three-globe' ),
			_S_VERSION,
			true
		);

		// Pass theme URL to JavaScript
		wp_localize_script(
			'digitalia-globe-loader',
			'digitaliaGlobeConfig',
			array(
				'themeUrl' => get_template_directory_uri(),
			)
		);
	}
}
add_action( 'wp_enqueue_scripts', 'digitalia_enqueue_globe' );

/**
 * Helper function to recursively scan template directories
 */
function scan_template_dir($dir, $theme_dir, &$templates) {
    if (!is_dir($dir)) return;
    
    // Get all PHP files in current directory
    $files = glob($dir . '/*.php');
    foreach ($files as $file) {
        $template_data = get_file_data($file, array('Template Name' => 'Template Name'));
        if (!empty($template_data['Template Name'])) {
            $templates[str_replace($theme_dir . '/', '', $file)] = $template_data['Template Name'];
        }
    }
    
    // Scan subdirectories
    $subdirs = glob($dir . '/*', GLOB_ONLYDIR);
    foreach ($subdirs as $subdir) {
        scan_template_dir($subdir, $theme_dir, $templates);
    }
}

/**
 * Register custom page templates from subdirectories
 */
function digitalia_register_page_templates($templates) {
    $theme_dir = get_template_directory();
    
    // Regular page templates
    $regular_templates_dir = $theme_dir . '/page-templates';
    if (is_dir($regular_templates_dir)) {
        $regular_files = glob($regular_templates_dir . '/*.php');
        foreach ($regular_files as $file) {
            $template_data = get_file_data($file, array('Template Name' => 'Template Name'));
            if (!empty($template_data['Template Name'])) {
                $templates[str_replace($theme_dir . '/', '', $file)] = $template_data['Template Name'];
            }
        }
    }
    
    // Start recursive scan from subpage-templates directory
    $subpage_templates_dir = $regular_templates_dir . '/subpage-templates';
    scan_template_dir($subpage_templates_dir, $theme_dir, $templates);
    
    return $templates;
}
add_filter('theme_page_templates', 'digitalia_register_page_templates');

/**
 * Define color schemes for different modules
 *
 * @param string $type Optional. Type of color scheme to return ('full' or 'pill'). Default 'full'.
 * @return array Color schemes for different modules
 */
function digitalia_get_color_schemes($type = 'full') {
    $full_schemes = array(
        'academia' => array(
            'bg' => 'bg-yellow-200',
            'text' => 'text-yellow-950',
            'subtitle' => 'text-yellow-800',
            'highlight' => 'bg-yellow-300/30',
            'grid' => 'bg-yellow-300',
            'button' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        ),
        'en-linea' => array(
            'bg' => 'bg-red-200',
            'text' => 'text-red-950',
            'subtitle' => 'text-red-800',
            'highlight' => 'bg-red-300/30',
            'grid' => 'bg-red-300',
            'button' => 'bg-red-500 hover:bg-red-600 text-white',
        ),
        'colaboratorio' => array(
            'bg' => 'bg-teal-200',
            'text' => 'text-teal-950',
            'subtitle' => 'text-teal-800',
            'highlight' => 'bg-teal-300/30',
            'grid' => 'bg-teal-300',
            'button' => 'bg-teal-500 hover:bg-teal-600 text-white',
        ),
        'total-transmedia' => array(
            'bg' => 'bg-blue-300',
            'text' => 'text-blue-950',
            'subtitle' => 'text-blue-800',
            'highlight' => 'bg-blue-300/30',
            'grid' => 'bg-blue-300',
            'button' => 'bg-blue-500 hover:bg-blue-600 text-white',
        ),
        'ready' => array(
            'bg' => 'bg-purple-200',
            'text' => 'text-purple-950',
            'subtitle' => 'text-purple-800',
            'highlight' => 'bg-purple-300/30',
            'grid' => 'bg-purple-300',
            'button' => 'bg-purple-500 hover:bg-purple-600 text-white',
        ),
    );

    if ($type === 'pill') {
        $pill_schemes = array();
        foreach ($full_schemes as $key => $scheme) {
            $pill_schemes[$key] = $scheme['highlight'];
        }
        return $pill_schemes;
    }

    return $full_schemes;
}

/**
 * Register Custom Post Type Cursos and its taxonomies
 */
function digitalia_register_cursos_post_type() {
    // Register Cursos Post Type
    $labels = array(
        'name'                  => _x( 'Cursos', 'Post type general name', 'digitalia' ),
        'singular_name'         => _x( 'Curso', 'Post type singular name', 'digitalia' ),
        'menu_name'            => _x( 'Cursos', 'Admin Menu text', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Curso', 'digitalia' ),
        'edit_item'            => __( 'Editar Curso', 'digitalia' ),
        'new_item'             => __( 'Nuevo Curso', 'digitalia' ),
        'view_item'            => __( 'Ver Curso', 'digitalia' ),
        'view_items'           => __( 'Ver Cursos', 'digitalia' ),
        'search_items'         => __( 'Buscar Cursos', 'digitalia' ),
        'not_found'            => __( 'No se encontraron cursos', 'digitalia' ),
        'not_found_in_trash'   => __( 'No se encontraron cursos en la papelera', 'digitalia' ),
        'all_items'            => __( 'Todos los Cursos', 'digitalia' ),
        'archives'             => __( 'Archivo de Cursos', 'digitalia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cursos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'taxonomies'         => array('post_tag') // Add support for post tags
    );

    register_post_type( 'curso', $args );

    // Register Categorias Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Categorías de Cursos', 'taxonomy general name', 'digitalia' ),
        'singular_name'     => _x( 'Categoría de Curso', 'taxonomy singular name', 'digitalia' ),
        'search_items'      => __( 'Buscar Categorías', 'digitalia' ),
        'all_items'         => __( 'Todas las Categorías', 'digitalia' ),
        'parent_item'       => __( 'Categoría Padre', 'digitalia' ),
        'parent_item_colon' => __( 'Categoría Padre:', 'digitalia' ),
        'edit_item'         => __( 'Editar Categoría', 'digitalia' ),
        'update_item'       => __( 'Actualizar Categoría', 'digitalia' ),
        'add_new_item'      => __( 'Añadir Nueva Categoría', 'digitalia' ),
        'new_item_name'     => __( 'Nuevo Nombre de Categoría', 'digitalia' ),
        'menu_name'         => __( 'Categorías', 'digitalia' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-curso' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'categoria-curso', array( 'curso' ), $taxonomy_args );
}
add_action( 'init', 'digitalia_register_cursos_post_type' );

// Add ACF fields for Curso post type
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_curso_details',
        'title' => 'Detalles del Curso',
        'fields' => array(
            array(
                'key' => 'field_duracion',
                'label' => 'Duración',
                'name' => 'duracion',
                'type' => 'text',
                'instructions' => 'Ingrese la duración del curso (ej: 12 semanas)',
                'required' => 1,
                'default_value' => '12 semanas',
            ),
            array(
                'key' => 'field_categoria',
                'label' => 'Categoría',
                'name' => 'categoria',
                'type' => 'text',
                'instructions' => 'Ingrese la categoría del curso (ej: Tecnología, Legal, Seguridad)',
                'required' => 1,
                'default_value' => 'Tecnología',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'curso',
                ),
            ),
        ),
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
    ));

endif;
// Register Ubicaciones Taxonomy
function digitalia_register_ubicaciones_taxonomy() {
    $labels = array(
        'name'              => _x('Ubicaciones', 'taxonomy general name', 'digitalia'),
        'singular_name'     => _x('Ubicación', 'taxonomy singular name', 'digitalia'),
        'search_items'      => __('Buscar Ubicaciones', 'digitalia'),
        'all_items'         => __('Todas las Ubicaciones', 'digitalia'),
        'parent_item'       => __('Ubicación Padre', 'digitalia'),
        'parent_item_colon' => __('Ubicación Padre:', 'digitalia'),
        'edit_item'         => __('Editar Ubicación', 'digitalia'),
        'update_item'       => __('Actualizar Ubicación', 'digitalia'),
        'add_new_item'      => __('Añadir Nueva Ubicación', 'digitalia'),
        'new_item_name'     => __('Nombre de Nueva Ubicación', 'digitalia'),
        'menu_name'         => __('Ubicaciones', 'digitalia'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'           => $labels,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'ubicacion'),
    );

    register_taxonomy('ubicaciones', array('alfabetizador'), $args);
}
add_action('init', 'digitalia_register_ubicaciones_taxonomy');

/**
 * Register Custom Post Type Episodios and its taxonomies
 */
function digitalia_register_episodios_post_type() {
    // Register Episodios Post Type
    $labels = array(
        'name'                  => _x( 'Episodios', 'Post type general name', 'digitalia' ),
        'singular_name'         => _x( 'Episodio', 'Post type singular name', 'digitalia' ),
        'menu_name'            => _x( 'Episodios', 'Admin Menu text', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Episodio', 'digitalia' ),
        'edit_item'            => __( 'Editar Episodio', 'digitalia' ),
        'new_item'             => __( 'Nuevo Episodio', 'digitalia' ),
        'view_item'            => __( 'Ver Episodio', 'digitalia' ),
        'view_items'           => __( 'Ver Episodios', 'digitalia' ),
        'search_items'         => __( 'Buscar Episodios', 'digitalia' ),
        'not_found'            => __( 'No se encontraron episodios', 'digitalia' ),
        'not_found_in_trash'   => __( 'No se encontraron episodios en la papelera', 'digitalia' ),
        'all_items'            => __( 'Todos los Episodios', 'digitalia' ),
        'archives'             => __( 'Archivo de Episodios', 'digitalia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'episodios' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-video-alt3',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'taxonomies'         => array('temporadas', 'post_tag') // Add support for Temporadas taxonomy and post tags
    );

    register_post_type( 'episodio', $args );

    // Register Temporadas Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Temporadas', 'taxonomy general name', 'digitalia' ),
        'singular_name'     => _x( 'Temporada', 'taxonomy singular name', 'digitalia' ),
        'search_items'      => __( 'Buscar Temporadas', 'digitalia' ),
        'all_items'         => __( 'Todas las Temporadas', 'digitalia' ),
        'parent_item'       => __( 'Temporada Padre', 'digitalia' ),
        'parent_item_colon' => __( 'Temporada Padre:', 'digitalia' ),
        'edit_item'         => __( 'Editar Temporada', 'digitalia' ),
        'update_item'       => __( 'Actualizar Temporada', 'digitalia' ),
        'add_new_item'      => __( 'Añadir Nueva Temporada', 'digitalia' ),
        'new_item_name'     => __( 'Nuevo Nombre de Temporada', 'digitalia' ),
        'menu_name'         => __( 'Temporadas', 'digitalia' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'temporada' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'temporadas', array( 'episodio' ), $taxonomy_args );
}
add_action( 'init', 'digitalia_register_episodios_post_type' );

/**
 * Register Custom Post Type Actores
 */
function digitalia_register_actores_post_type() {
    $labels = array(
        'name'                  => _x( 'Actores', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Actor', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Actores', 'digitalia' ),
        'name_admin_bar'       => __( 'Actor', 'digitalia' ),
        'archives'             => __( 'Archivo de Actores', 'digitalia' ),
        'attributes'           => __( 'Atributos del Actor', 'digitalia' ),
        'parent_item_colon'    => __( 'Actor Padre:', 'digitalia' ),
        'all_items'            => __( 'Todos los Actores', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Actor', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'new_item'             => __( 'Nuevo Actor', 'digitalia' ),
        'edit_item'            => __( 'Editar Actor', 'digitalia' ),
        'update_item'          => __( 'Actualizar Actor', 'digitalia' ),
        'view_item'            => __( 'Ver Actor', 'digitalia' ),
        'view_items'           => __( 'Ver Actores', 'digitalia' ),
        'search_items'         => __( 'Buscar Actor', 'digitalia' ),
    );
    
    $args = array(
        'label'                 => __( 'Actor', 'digitalia' ),
        'description'           => __( 'Actores', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'actores', $args );
}
add_action( 'init', 'digitalia_register_actores_post_type' );

/**
 * Register Custom Post Type Personajes
 */
function digitalia_register_personajes_post_type() {
    $labels = array(
        'name'                  => _x( 'Personajes', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Personaje', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Personajes', 'digitalia' ),
        'name_admin_bar'       => __( 'Personaje', 'digitalia' ),
        'archives'             => __( 'Archivo de Personajes', 'digitalia' ),
        'attributes'           => __( 'Atributos del Personaje', 'digitalia' ),
        'parent_item_colon'    => __( 'Personaje Padre:', 'digitalia' ),
        'all_items'            => __( 'Todos los Personajes', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Personaje', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'new_item'             => __( 'Nuevo Personaje', 'digitalia' ),
        'edit_item'            => __( 'Editar Personaje', 'digitalia' ),
        'update_item'          => __( 'Actualizar Personaje', 'digitalia' ),
        'view_item'            => __( 'Ver Personaje', 'digitalia' ),
        'view_items'           => __( 'Ver Personajes', 'digitalia' ),
        'search_items'         => __( 'Buscar Personaje', 'digitalia' ),
    );
    
    $args = array(
        'label'                 => __( 'Personaje', 'digitalia' ),
        'description'           => __( 'Personajes', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'personajes', $args );
}
add_action( 'init', 'digitalia_register_personajes_post_type' );

/**
 * Register Custom Post Type Series
 */
function digitalia_register_series_post_type() {
    $labels = array(
        'name'                  => _x( 'Series', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Serie', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Series', 'digitalia' ),
        'name_admin_bar'       => __( 'Serie', 'digitalia' ),
        'archives'             => __( 'Serie Archives', 'digitalia' ),
        'attributes'           => __( 'Serie Attributes', 'digitalia' ),
        'parent_item_colon'    => __( 'Parent Serie:', 'digitalia' ),
        'all_items'            => __( 'All Series', 'digitalia' ),
        'add_new_item'         => __( 'Add New Serie', 'digitalia' ),
        'add_new'              => __( 'Add New', 'digitalia' ),
        'new_item'             => __( 'New Serie', 'digitalia' ),
        'edit_item'            => __( 'Edit Serie', 'digitalia' ),
        'update_item'          => __( 'Update Serie', 'digitalia' ),
        'view_item'            => __( 'View Serie', 'digitalia' ),
        'view_items'           => __( 'View Series', 'digitalia' ),
        'search_items'         => __( 'Search Serie', 'digitalia' ),
    );
    
    $args = array(
        'label'               => __( 'Serie', 'digitalia' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-video-alt',
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'can_export'         => true,
        'has_archive'        => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
        'capability_type'    => 'post',
        'show_in_rest'       => true,
    );
    
    register_post_type( 'series', $args );
}
add_action( 'init', 'digitalia_register_series_post_type' );

/**
 * Register Custom Post Type FAQ
 */
function digitalia_register_faq_post_type() {
    $labels = array(
        'name'                  => _x( 'Preguntas Frecuentes', 'Post type general name', 'digitalia' ),
        'singular_name'         => _x( 'Pregunta Frecuente', 'Post type singular name', 'digitalia' ),
        'menu_name'            => _x( 'Preguntas Frecuentes', 'Admin Menu text', 'digitalia' ),
        'name_admin_bar'       => _x( 'Pregunta Frecuente', 'Add New on Toolbar', 'digitalia' ),
        'add_new'              => __( 'Añadir Nueva', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nueva Pregunta', 'digitalia' ),
        'new_item'             => __( 'Nueva Pregunta', 'digitalia' ),
        'edit_item'            => __( 'Editar Pregunta', 'digitalia' ),
        'view_item'            => __( 'Ver Pregunta', 'digitalia' ),
        'all_items'            => __( 'Todas las Preguntas', 'digitalia' ),
        'search_items'         => __( 'Buscar Preguntas', 'digitalia' ),
        'not_found'            => __( 'No se encontraron preguntas.', 'digitalia' ),
        'not_found_in_trash'   => __( 'No se encontraron preguntas en la papelera.', 'digitalia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'preguntas-frecuentes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-format-chat',
        'show_in_rest'       => true,
    );

    register_post_type( 'faq', $args );
}
add_action( 'init', 'digitalia_register_faq_post_type' );

/**
 * Register FAQ Categories Taxonomy
 */
function digitalia_register_faq_categories_taxonomy() {
    $labels = array(
        'name'              => _x( 'Categorías FAQ', 'taxonomy general name', 'digitalia' ),
        'singular_name'     => _x( 'Categoría FAQ', 'taxonomy singular name', 'digitalia' ),
        'search_items'      => __( 'Buscar Categorías', 'digitalia' ),
        'all_items'         => __( 'Todas las Categorías', 'digitalia' ),
        'parent_item'       => __( 'Categoría Superior', 'digitalia' ),
        'parent_item_colon' => __( 'Categoría Superior:', 'digitalia' ),
        'edit_item'         => __( 'Editar Categoría', 'digitalia' ),
        'update_item'       => __( 'Actualizar Categoría', 'digitalia' ),
        'add_new_item'      => __( 'Añadir Nueva Categoría', 'digitalia' ),
        'new_item_name'     => __( 'Nuevo Nombre de Categoría', 'digitalia' ),
        'menu_name'         => __( 'Categorías', 'digitalia' ),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'           => true,
        'show_ui'          => true,
        'show_admin_column' => true,
        'show_in_menu'     => true,
        'show_in_rest'     => true,
        'query_var'        => true,
        'rewrite'          => array( 'slug' => 'faq-categories' ),
    );

    register_taxonomy( 'faq-categories', array( 'faq' ), $args );
}
add_action( 'init', 'digitalia_register_faq_categories_taxonomy' );

/**
 * Register Custom Post Type Descargas
 */
function digitalia_register_descargas_post_type() {
    $labels = array(
        'name'                  => _x( 'Descargas', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Descarga', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Descargas', 'digitalia' ),
        'name_admin_bar'       => __( 'Descarga', 'digitalia' ),
        'archives'             => __( 'Archivo de Descargas', 'digitalia' ),
        'attributes'           => __( 'Atributos de Descarga', 'digitalia' ),
        'parent_item_colon'    => __( 'Descarga Superior:', 'digitalia' ),
        'all_items'            => __( 'Todas las Descargas', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nueva Descarga', 'digitalia' ),
        'add_new'              => __( 'Añadir Nueva', 'digitalia' ),
        'new_item'             => __( 'Nueva Descarga', 'digitalia' ),
        'edit_item'            => __( 'Editar Descarga', 'digitalia' ),
        'update_item'          => __( 'Actualizar Descarga', 'digitalia' ),
        'view_item'            => __( 'Ver Descarga', 'digitalia' ),
        'view_items'           => __( 'Ver Descargas', 'digitalia' ),
        'search_items'         => __( 'Buscar Descarga', 'digitalia' ),
    );
    
    $args = array(
        'label'                 => __( 'Descarga', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ), // Using regular post categories and tags
        'hierarchical'          => false,
        'public'               => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 5,
        'menu_icon'            => 'dashicons-download',
        'show_in_admin_bar'    => true,
        'show_in_nav_menus'    => true,
        'can_export'           => true,
        'has_archive'          => true,
        'exclude_from_search'  => false,
        'publicly_queryable'   => true,
        'capability_type'      => 'post',
        'show_in_rest'         => true,
    );
    
    register_post_type( 'descarga', $args );
}
add_action( 'init', 'digitalia_register_descargas_post_type' );

// Register Custom Post Type Podcasts
function digitalia_register_podcasts_post_type() {
    $labels = array(
        'name'                  => _x( 'Podcasts', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Podcasts', 'digitalia' ),
        'name_admin_bar'       => __( 'Podcast', 'digitalia' ),
        'archives'             => __( 'Archivo de Podcasts', 'digitalia' ),
        'attributes'           => __( 'Atributos de Podcast', 'digitalia' ),
        'parent_item_colon'    => __( 'Podcast Padre:', 'digitalia' ),
        'all_items'            => __( 'Todos los Podcasts', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Podcast', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'new_item'             => __( 'Nuevo Podcast', 'digitalia' ),
        'edit_item'            => __( 'Editar Podcast', 'digitalia' ),
        'update_item'          => __( 'Actualizar Podcast', 'digitalia' ),
        'view_item'            => __( 'Ver Podcast', 'digitalia' ),
        'view_items'           => __( 'Ver Podcasts', 'digitalia' ),
        'search_items'         => __( 'Buscar Podcast', 'digitalia' ),
    );
    $args = array(
        'label'                 => __( 'Podcast', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-microphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'podcast', $args );
}
add_action( 'init', 'digitalia_register_podcasts_post_type' );

// Register Custom Post Type Transmisiones
function digitalia_register_transmisiones_post_type() {
    $labels = array(
        'name'                  => _x( 'Transmisiones', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Transmisión', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Transmisiones', 'digitalia' ),
        'name_admin_bar'       => __( 'Transmisión', 'digitalia' ),
        'archives'             => __( 'Archivo de Transmisiones', 'digitalia' ),
        'attributes'           => __( 'Atributos de Transmisión', 'digitalia' ),
        'parent_item_colon'    => __( 'Transmisión Padre:', 'digitalia' ),
        'all_items'            => __( 'Todas las Transmisiones', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nueva Transmisión', 'digitalia' ),
        'add_new'              => __( 'Añadir Nueva', 'digitalia' ),
        'new_item'             => __( 'Nueva Transmisión', 'digitalia' ),
        'edit_item'            => __( 'Editar Transmisión', 'digitalia' ),
        'update_item'          => __( 'Actualizar Transmisión', 'digitalia' ),
        'view_item'            => __( 'Ver Transmisión', 'digitalia' ),
        'view_items'           => __( 'Ver Transmisiones', 'digitalia' ),
        'search_items'         => __( 'Buscar Transmisión', 'digitalia' ),
    );
    $args = array(
        'label'                 => __( 'Transmisión', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-video-alt3',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'transmision', $args );
}
add_action( 'init', 'digitalia_register_transmisiones_post_type' );

/**
 * Register Custom Post Type Espacios and its taxonomies
 */
function digitalia_register_espacios_post_type() {
    // Register Espacios Post Type
    $labels = array(
        'name'                  => _x('Espacios', 'Post type general name', 'digitalia'),
        'singular_name'         => _x('Espacio', 'Post type singular name', 'digitalia'),
        'menu_name'            => _x('Espacios', 'Admin Menu text', 'digitalia'),
        'add_new'              => __('Añadir Nuevo', 'digitalia'),
        'add_new_item'         => __('Añadir Nuevo Espacio', 'digitalia'),
        'edit_item'            => __('Editar Espacio', 'digitalia'),
        'new_item'             => __('Nuevo Espacio', 'digitalia'),
        'view_item'            => __('Ver Espacio', 'digitalia'),
        'view_items'           => __('Ver Espacios', 'digitalia'),
        'search_items'         => __('Buscar Espacios', 'digitalia'),
        'not_found'            => __('No se encontraron espacios', 'digitalia'),
        'not_found_in_trash'   => __('No se encontraron espacios en la papelera', 'digitalia'),
        'all_items'            => __('Todos los Espacios', 'digitalia'),
        'archives'             => __('Archivo de Espacios', 'digitalia'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'espacios'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-location',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag') // Add support for both categories and tags
    );

    register_post_type('espacio', $args);

    // Register Categorias de Espacios Taxonomy
    $taxonomy_labels = array(
        'name'              => _x('Categorías de Espacios', 'taxonomy general name', 'digitalia'),
        'singular_name'     => _x('Categoría de Espacio', 'taxonomy singular name', 'digitalia'),
        'search_items'      => __('Buscar Categorías', 'digitalia'),
        'all_items'         => __('Todas las Categorías', 'digitalia'),
        'parent_item'       => __('Categoría Padre', 'digitalia'),
        'parent_item_colon' => __('Categoría Padre:', 'digitalia'),
        'edit_item'         => __('Editar Categoría', 'digitalia'),
        'update_item'       => __('Actualizar Categoría', 'digitalia'),
        'add_new_item'      => __('Añadir Nueva Categoría', 'digitalia'),
        'new_item_name'     => __('Nuevo Nombre de Categoría', 'digitalia'),
        'menu_name'         => __('Categorías', 'digitalia'),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'           => $taxonomy_labels,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'categoria-espacios'),
        'show_in_rest'     => true,
    );

    register_taxonomy('categoria-espacios', array('espacio'), $taxonomy_args);
}
add_action('init', 'digitalia_register_espacios_post_type');

/**
 * Register Custom Post Type Alfabetizadores and its taxonomies
 */
function digitalia_register_alfabetizadores_post_type() {
    // Register Custom Post Type
    $labels = array(
        'name'                  => _x('Alfabetizadores', 'Post Type General Name', 'digitalia'),
        'singular_name'         => _x('Alfabetizador', 'Post Type Singular Name', 'digitalia'),
        'menu_name'            => __('Alfabetizadores', 'digitalia'),
        'name_admin_bar'       => __('Alfabetizador', 'digitalia'),
        'archives'             => __('Archivo de Alfabetizadores', 'digitalia'),
        'attributes'           => __('Atributos de Alfabetizador', 'digitalia'),
        'parent_item_colon'    => __('Alfabetizador Superior:', 'digitalia'),
        'all_items'            => __('Todos los Alfabetizadores', 'digitalia'),
        'add_new_item'         => __('Añadir Nuevo Alfabetizador', 'digitalia'),
        'add_new'              => __('Añadir Nuevo', 'digitalia'),
        'new_item'             => __('Nuevo Alfabetizador', 'digitalia'),
        'edit_item'            => __('Editar Alfabetizador', 'digitalia'),
        'update_item'          => __('Actualizar Alfabetizador', 'digitalia'),
        'view_item'            => __('Ver Alfabetizador', 'digitalia'),
        'view_items'           => __('Ver Alfabetizadores', 'digitalia'),
        'search_items'         => __('Buscar Alfabetizador', 'digitalia'),
    );
    
    $args = array(
        'label'               => __('Alfabetizador', 'digitalia'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies'          => array('category', 'post_tag', 'alfabetizadores-tags'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
        'rest_base'           => 'alfabetizadores',
    );
    
    register_post_type('alfabetizador', $args);

    // Register Alfabetizadores Tags Taxonomy
    $alfabetizadores_tags_labels = array(
        'name'              => _x('Alfabetizadores Tags', 'taxonomy general name', 'digitalia'),
        'singular_name'     => _x('Alfabetizador Tag', 'taxonomy singular name', 'digitalia'),
        'search_items'      => __('Search Alfabetizador Tags', 'digitalia'),
        'all_items'         => __('All Alfabetizador Tags', 'digitalia'),
        'edit_item'         => __('Edit Alfabetizador Tag', 'digitalia'),
        'update_item'       => __('Update Alfabetizador Tag', 'digitalia'),
        'add_new_item'      => __('Add New Alfabetizador Tag', 'digitalia'),
        'new_item_name'     => __('New Alfabetizador Tag Name', 'digitalia'),
        'menu_name'         => __('Alfabetizador Tags', 'digitalia'),
    );

    $alfabetizadores_tags_args = array(
        'labels'            => $alfabetizadores_tags_labels,
        'hierarchical'      => false,
        'public'           => true,
        'show_ui'          => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => true,
        'has_archive'       => true,
        'rewrite'           => array('slug' => 'alfabetizadores-tags'),
        'show_in_rest'      => true,
    );

    register_taxonomy('alfabetizadores-tags', array('alfabetizador'), $alfabetizadores_tags_args);
}
add_action('init', 'digitalia_register_alfabetizadores_post_type');

/**
 * Register Custom Post Type Productos
 */
function digitalia_register_productos_post_type() {
    $labels = array(
        'name'                  => _x('Productos', 'Post type general name', 'digitalia'),
        'singular_name'         => _x('Producto', 'Post type singular name', 'digitalia'),
        'menu_name'            => _x('Productos', 'Admin Menu text', 'digitalia'),
        'name_admin_bar'       => _x('Producto', 'Add New on Toolbar', 'digitalia'),
        'add_new'              => __('Añadir Nuevo', 'digitalia'),
        'add_new_item'         => __('Añadir Nuevo Producto', 'digitalia'),
        'new_item'             => __('Nuevo Producto', 'digitalia'),
        'edit_item'            => __('Editar Producto', 'digitalia'),
        'view_item'            => __('Ver Producto', 'digitalia'),
        'all_items'            => __('Todos los Productos', 'digitalia'),
        'search_items'         => __('Buscar Productos', 'digitalia'),
        'not_found'            => __('No se encontraron productos.', 'digitalia'),
        'not_found_in_trash'   => __('No hay productos en la papelera.', 'digitalia'),
        'featured_image'       => __('Imagen del Producto', 'digitalia'),
        'set_featured_image'   => __('Establecer imagen del producto', 'digitalia'),
        'remove_featured_image'=> __('Eliminar imagen del producto', 'digitalia'),
        'use_featured_image'   => __('Usar como imagen del producto', 'digitalia'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'productos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
        'taxonomies'         => array('category', 'post_tag'), // Add support for regular WP taxonomies
    );

    register_post_type('producto', $args);
}
add_action('init', 'digitalia_register_productos_post_type');

/**
 * Register Hero Block
 */
function digitalia_register_hero_block() {
    if ( ! function_exists( 'register_block_type' ) ) {
        return;
    }

    // Register the block
    register_block_type( get_template_directory() . '/blocks/hero' );
}
add_action( 'init', 'digitalia_register_hero_block' );

/**
 * Load ACF Fields
 */
function digitalia_include_acf_fields($dir) {
    if (!is_dir($dir)) {
        return;
    }
    
    // Get all PHP files including those in subdirectories
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            require $file->getRealPath();
        }
    }
}

digitalia_include_acf_fields(get_template_directory() . '/inc/acf_fields/');

/**
 * Load Admin Pages
 */
require_once get_template_directory() . '/inc/admin/parametros-page.php';

add_action('acf/init', 'digitalia_register_acf_fields');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom Nav Walker for Tailwind CSS
 */
require get_template_directory() . '/inc/class-tailwind-nav-walker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'featured_image_src', // Name of new field (You can call this anything)
        array(
            'get_callback'    => 'get_image_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $feat_img_array = wp_get_attachment_image_src(
        $object['featured_media'], // Image attachment ID
        'full',  // Size.  Ex. "thumbnail", "large", "full", etc..
        true // Whether the image should be treated as an icon.
    );
    return $feat_img_array[0];
}

/**
 * Calculate estimated reading time for posts
 *
 * @return int Estimated reading time in minutes
 */
function get_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Assuming average reading speed of 200 words per minute
    
    return max(1, $reading_time); // Return at least 1 minute
}

// Enqueue Vue.js for biblioteca-digital template
function digitalia_enqueue_vue() {
    if (is_page_template('page-templates/biblioteca-digital.php')) {
        wp_enqueue_script('vue', 'https://unpkg.com/vue@3/dist/vue.global.js', array(), '3.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'digitalia_enqueue_vue');

// Add REST API support for featured images
add_action('rest_api_init', function () {
    register_rest_field('post', 'featured_image_url',
        array(
            'get_callback' => function($object) {
                if ($object['featured_media']) {
                    $img = wp_get_attachment_image_src($object['featured_media'], 'medium');
                    return $img[0];
                }
                return false;
            },
            'schema' => null,
        )
    );
});

/**
 * Initialize Google Maps API Key for ACF
 *
 * Retrieves the API key from the secure Parámetros options page.
 * If not configured, logs an error and does not initialize maps.
 *
 * @see /wp-admin/admin.php?page=parametros
 */
function my_acf_init() {
    // Get API key from secure options page
    $api_key = get_field('google_maps_api_key', 'option');

    // If API key is not configured, log error and exit
    if (empty($api_key)) {
        // Always log this error (not wrapped in WP_DEBUG) - critical configuration issue
        error_log('ERROR: Google Maps API key not configured. Please add it in Parámetros options page: /wp-admin/admin.php?page=parametros');

        // Show admin notice if in admin panel
        if (is_admin()) {
            add_action('admin_notices', function() {
                echo '<div class="notice notice-error"><p><strong>Digitalia:</strong> Google Maps API key no está configurada. Por favor configúrala en <a href="' . admin_url('admin.php?page=parametros') . '">Parámetros</a>.</p></div>';
            });
        }

        return; // Don't initialize Google Maps without API key
    }

    acf_update_setting('google_api_key', $api_key);
}
add_action('acf/init', 'my_acf_init');

// Enqueue Google Maps scripts and styles
function digitalia_enqueue_acf_map_scripts() {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . acf_get_setting('google_api_key') . '&libraries=marker&callback=Function.prototype', array(), null, true);
    wp_enqueue_script('acf-maps', get_template_directory_uri() . '/js/acf-maps.js', array('jquery', 'google-maps'), '1.0', true);
    
    // Add inline styles for the map
    $map_styles = "
        .map-container {
            position: relative;
        }
        .acf-map {
            width: 100%;
            height: 400px;
            margin: 0;
            display: block;
            position: relative !important;
            overflow: hidden;
            z-index: 1;
        }
        .acf-map > div {
            height: 100%;
        }
        .acf-map img {
            max-width: inherit !important;
        }
        .fallback-image {
            display: none !important;
        }
        /* Only show fallback when map is not properly loaded */
        .map-container .acf-map:empty ~ .fallback-image {
            display: block;
        }
    ";
    wp_add_inline_style('digitalia-tailwind', $map_styles);
}
add_action('wp_enqueue_scripts', 'digitalia_enqueue_acf_map_scripts', 20);

/**
 * Get random images from Total Transmedia tactics directories
 *
 * @param string $tactic_folder The folder name within tt-images (e.g., 'AMI', 'Coyuntura', 'ami-para-ti1')
 * @param int $num_images Number of random images to return
 * @return array Array of image URLs
 */
function digitalia_get_random_tt_images($tactic_folder, $num_images = 4) {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // DON'T normalize - use exact folder name to match filesystem
    // Folders are: AMI, Coyuntura, marca (case-sensitive in production)
    $folder_normalized = str_replace(' ', '-', $tactic_folder);

    // Define the directory path
    $images_dir = $theme_dir . '/assets/images/tt-images/' . $folder_normalized;

    // DEBUG: Log directory check
    error_log("TT Images - Looking for directory: $images_dir");
    error_log("TT Images - Directory exists: " . (is_dir($images_dir) ? 'YES' : 'NO'));

    // Check if directory exists
    if (!is_dir($images_dir)) {
        error_log("TT Images - Directory NOT found: $images_dir");
        return array();
    }

    // Get all image files from the directory
    $image_files = glob($images_dir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

    // DEBUG: Log found images
    error_log("TT Images - Found " . count($image_files) . " images in directory");

    if (empty($image_files)) {
        error_log("TT Images - NO images found, returning empty array");
        return array();
    }

    // Shuffle the array to randomize
    shuffle($image_files);

    // Limit to requested number of images
    $selected_files = array_slice($image_files, 0, $num_images);

    // Convert filesystem paths to URLs
    $image_urls = array();
    foreach ($selected_files as $file_path) {
        $relative_path = str_replace($theme_dir, $theme_uri, $file_path);
        $image_urls[] = $relative_path;
    }

    // DEBUG: Log final URLs
    error_log("TT Images - Returning " . count($image_urls) . " image URLs");

    return $image_urls;
}

/**
 * Get all subdirectories for a composite tactic (e.g., ami-para-ti has ami-para-ti1, ami-para-ti2, ami-para-ti3)
 *
 * @param string $tactic_base The base tactic name (e.g., 'ami-para-ti', 'magazine')
 * @param int $num_images Number of random images to return from ALL subdirectories combined
 * @return array Array of image URLs
 */
function digitalia_get_random_composite_tt_images($tactic_base, $num_images = 8) {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Normalize folder name (composite folders are already lowercase)
    $folder_normalized = strtolower(str_replace(' ', '-', $tactic_base));

    // Base directory
    $base_dir = $theme_dir . '/assets/images/tt-images/';

    // DEBUG: Log search pattern
    error_log("TT Composite - Looking for directories matching: {$base_dir}{$folder_normalized}*");

    // Find all subdirectories matching the pattern
    $all_dirs = glob($base_dir . $folder_normalized . '*', GLOB_ONLYDIR);

    // DEBUG: Log found directories
    error_log("TT Composite - Found directories: " . print_r($all_dirs, true));

    if (empty($all_dirs)) {
        error_log("TT Composite - No composite directories found, trying single directory");
        // If no composite directories, try single directory
        return digitalia_get_random_tt_images($tactic_base, $num_images);
    }

    // Collect all images from all subdirectories
    $all_images = array();
    foreach ($all_dirs as $dir) {
        $image_files = glob($dir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
        if (!empty($image_files)) {
            $all_images = array_merge($all_images, $image_files);
        }
    }

    if (empty($all_images)) {
        return array();
    }

    // Shuffle to randomize
    shuffle($all_images);

    // Limit to requested number
    $selected_files = array_slice($all_images, 0, $num_images);

    // Convert to URLs
    $image_urls = array();
    foreach ($selected_files as $file_path) {
        $relative_path = str_replace($theme_dir, $theme_uri, $file_path);
        $image_urls[] = $relative_path;
    }

    return $image_urls;
}

/**
 * Get ALL images from Total Transmedia tactics directories (for JS rotation)
 *
 * @param string $tactic_folder The folder name within tt-images (e.g., 'AMI', 'Coyuntura')
 * @return array Array of ALL image URLs
 */
function digitalia_get_all_tt_images($tactic_folder) {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Normalize folder name to lowercase for filesystem
    $folder_normalized = strtolower(str_replace(' ', '-', $tactic_folder));

    // Define the directory path
    $images_dir = $theme_dir . '/assets/images/tt-images/' . $folder_normalized;

    // Check if directory exists
    if (!is_dir($images_dir)) {
        return array();
    }

    // Get all image files from the directory
    $image_files = glob($images_dir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

    if (empty($image_files)) {
        return array();
    }

    // Convert filesystem paths to URLs (no shuffle, no limit)
    $image_urls = array();
    foreach ($image_files as $file_path) {
        $relative_path = str_replace($theme_dir, $theme_uri, $file_path);
        $image_urls[] = $relative_path;
    }

    return $image_urls;
}

/**
 * Get ALL images from composite directories (for JS rotation)
 *
 * @param string $tactic_base The base tactic name (e.g., 'ami-para-ti', 'magazine')
 * @return array Array of ALL image URLs
 */
function digitalia_get_all_composite_tt_images($tactic_base) {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Normalize folder name
    $folder_normalized = strtolower(str_replace(' ', '-', $tactic_base));

    // Base directory
    $base_dir = $theme_dir . '/assets/images/tt-images/';

    // Find all subdirectories matching the pattern
    $all_dirs = glob($base_dir . $folder_normalized . '*', GLOB_ONLYDIR);

    if (empty($all_dirs)) {
        // If no composite directories, try single directory
        return digitalia_get_all_tt_images($tactic_base);
    }

    // Collect all images from all subdirectories
    $all_images = array();
    foreach ($all_dirs as $dir) {
        $image_files = glob($dir . '/*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);
        if (!empty($image_files)) {
            $all_images = array_merge($all_images, $image_files);
        }
    }

    if (empty($all_images)) {
        return array();
    }

    // Convert to URLs (no shuffle, no limit)
    $image_urls = array();
    foreach ($all_images as $file_path) {
        $relative_path = str_replace($theme_dir, $theme_uri, $file_path);
        $image_urls[] = $relative_path;
    }

    return $image_urls;
}

/**
 * REST API endpoint for Total Transmedia image rotation
 */
add_action('rest_api_init', function() {
    register_rest_route('digitalia/v1', '/tt-images/(?P<tactic>[a-zA-Z0-9-]+)', array(
        'methods' => 'GET',
        'callback' => 'digitalia_get_random_tt_images_rest',
        'permission_callback' => '__return_true',
        'args' => array(
            'tactic' => array(
                'required' => true,
                'type' => 'string',
            ),
            'num_images' => array(
                'required' => false,
                'type' => 'integer',
                'default' => 4,
            ),
            'composite' => array(
                'required' => false,
                'type' => 'boolean',
                'default' => false,
            ),
        ),
    ));
});

/**
 * REST API callback for random TT images
 */
function digitalia_get_random_tt_images_rest($request) {
    $tactic = $request->get_param('tactic');
    $num_images = $request->get_param('num_images');
    $composite = $request->get_param('composite');

    if ($composite) {
        $images = digitalia_get_random_composite_tt_images($tactic, $num_images);
    } else {
        $images = digitalia_get_random_tt_images($tactic, $num_images);
    }

    return new WP_REST_Response(array(
        'success' => true,
        'images' => $images,
        'tactic' => $tactic,
        'count' => count($images),
    ), 200);
}

// Custom Roles
require get_template_directory() . '/inc/custom-roles.php';

// Theme Switcher (Shadcnblocks Integration)
require get_template_directory() . '/inc/theme-switcher.php';

// Include custom dashboards
require_once get_template_directory() . '/inc/admin/custom-dashboards.php';

// Adding Google Analytics snippet
function add_gtag_script() {
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PNW4J4SMCE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'G-PNW4J4SMCE');
    </script>
    <?php
}
add_action('wp_head', 'add_gtag_script');

// Adding Hotjar tracking code
function add_hotjar_script() {
    ?>
    <!-- Hotjar Tracking Code for https://www.digitalia.gov.co -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5306078,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
    <?php
}
add_action('wp_head', 'add_hotjar_script');

// Adding UST heatmap tracking code
function add_ust_heatmap_script() {
    ?>
    <script>UST_CT = [];UST = { s: Date.now(), addTag: function(tag) { UST_CT.push(tag) } };UST.addEvent = UST.addTag;</script>
    <script src="https://digitalia.gov.co/heatmap/server/ust.min.js?v=7.3.0" async></script>
    <?php
}
add_action('wp_head', 'add_ust_heatmap_script');

// Adding Sienna Accessibility widget script
function digitalia_add_sienna_accessibility() {
    echo '<script src="https://cdn.jsdelivr.net/npm/sienna-accessibility@latest/dist/sienna-accessibility.umd.js" defer></script>';
}
add_action('wp_footer', 'digitalia_add_sienna_accessibility', 999);

/**
 * Customize WordPress login logo
 */
function digitalia_custom_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('https://digitalia.gov.co/wp-content/uploads/2025/02/logo_black-horizontal_small.png');
            background-size: contain;
            background-repeat: no-repeat;
            width: 320px;
            height: 65px;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'digitalia_custom_login_logo');