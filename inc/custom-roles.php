<?php
/**
 * Custom User Roles for Digitalia
 * 
 * This file handles the creation and management of custom user roles
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

// Register custom post types if they don't exist
function digitalia_register_required_post_types() {
    if (!post_type_exists('transmision')) {
        register_post_type('transmision', array(
            'labels' => array(
                'name' => 'Transmisiones',
                'singular_name' => 'Transmisión',
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => array('transmision', 'transmisiones'),
            'map_meta_cap' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-video-alt3',
            'has_archive' => true,
            'rewrite' => array('slug' => 'transmisiones'),
        ));
    }

    if (!post_type_exists('espacio')) {
        register_post_type('espacio', array(
            'labels' => array(
                'name' => 'Espacios',
                'singular_name' => 'Espacio',
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => array('espacio', 'espacios'),
            'map_meta_cap' => true,
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-layout',
            'has_archive' => true,
            'rewrite' => array('slug' => 'espacios'),
        ));
    }
}
add_action('init', 'digitalia_register_required_post_types', 0);

function digitalia_create_custom_roles() {
    global $wp_roles;

    if (!isset($wp_roles)) {
        $wp_roles = new WP_Roles();
    }

    // Remove roles if they already exist (to reset capabilities)
    remove_role('en_linea');
    remove_role('total_transmedia');
    remove_role('ready');
    remove_role('colaboratorio');

    // Create "En Linea" role with basic capabilities
    $en_linea = add_role(
        'en_linea',
        'En Linea',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'delete_posts' => true,
            'delete_published_posts' => true,
            'upload_files' => true,
        )
    );

    // Create "Total Transmedia" role
    $total_transmedia = add_role(
        'total_transmedia',
        'Total Transmedia',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'upload_files' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'delete_posts' => true,
            'moderate_comments' => true,
            'edit_comments' => true,
        )
    );

    // Create "Ready" role
    $ready = add_role(
        'ready',
        'Ready',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'upload_files' => true,
            'edit_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'delete_posts' => true,
            'moderate_comments' => true,
            'edit_comments' => true,
        )
    );

    // Create "Colaboratorio" role with basic capabilities
    $colaboratorio = add_role(
        'colaboratorio',
        'Colaboratorio',
        array(
            'read' => true,
            'level_0' => true,
            'level_1' => true,
            'upload_files' => true,
            'edit_files' => true,
            'manage_categories' => true,
            
            // Posts capabilities
            'edit_posts' => true,
            'edit_others_posts' => true,
            'edit_published_posts' => true,
            'publish_posts' => true,
            'read_private_posts' => true,
            'delete_posts' => true,
            'delete_published_posts' => true,
            'delete_private_posts' => true,
            'delete_others_posts' => true,
            'edit_private_posts' => true
        )
    );

    if ($en_linea instanceof WP_Role) {
        // Add specific capabilities for En Linea role
        $allowed_types = array(
            'personajes' => 'personaje',
            'actores' => 'actor',
            'episodio' => 'episodio',
            'series' => 'serie'
        );
        
        foreach ($allowed_types as $plural => $singular) {
            $caps = array(
                "edit_{$plural}",
                "edit_others_{$plural}",
                "publish_{$plural}",
                "read_private_{$plural}",
                "delete_{$plural}",
                "delete_private_{$plural}",
                "delete_published_{$plural}",
                "delete_others_{$plural}",
                "edit_private_{$plural}",
                "edit_published_{$plural}",
                "edit_{$singular}",
                "read_{$singular}",
                "delete_{$singular}",
                "edit_others_{$singular}",
                "publish_{$singular}",
                "read_private_{$singular}",
                "delete_private_{$singular}",
                "edit_private_{$singular}",
                "edit_published_{$singular}",
                "delete_published_{$singular}"
            );

            foreach ($caps as $cap) {
                $en_linea->add_cap($cap);
            }
        }

        $en_linea->add_cap('edit_others_posts');
        $en_linea->add_cap('list_users');
    }

    if ($total_transmedia instanceof WP_Role) {
        // Add specific capabilities for Total Transmedia role
        // Media capabilities
        $total_transmedia->add_cap('upload_files');
        $total_transmedia->add_cap('edit_files');
        $total_transmedia->add_cap('manage_media_library');
        
        // Comments capabilities
        $total_transmedia->add_cap('moderate_comments');
        $total_transmedia->add_cap('edit_comments');
        $total_transmedia->add_cap('manage_comments');
        
        // Posts capabilities
        $post_caps = array(
            'edit_posts',
            'edit_others_posts',
            'edit_private_posts',
            'edit_published_posts',
            'publish_posts',
            'read_private_posts',
            'delete_posts',
            'delete_private_posts',
            'delete_published_posts',
            'delete_others_posts'
        );
        
        foreach ($post_caps as $cap) {
            $total_transmedia->add_cap($cap);
        }
        
        // Descarga capabilities
        $descarga_caps = array(
            'edit_descargas',
            'edit_others_descargas',
            'edit_private_descargas',
            'edit_published_descargas',
            'publish_descargas',
            'read_private_descargas',
            'delete_descargas',
            'delete_private_descargas',
            'delete_published_descargas',
            'delete_others_descargas'
        );
        
        foreach ($descarga_caps as $cap) {
            $total_transmedia->add_cap($cap);
        }
    }

    if ($ready instanceof WP_Role) {
        // Add specific capabilities for Ready role
        // Media capabilities
        $ready->add_cap('upload_files');
        $ready->add_cap('edit_files');
        $ready->add_cap('manage_media_library');
        
        // Comments capabilities
        $ready->add_cap('moderate_comments');
        $ready->add_cap('edit_comments');
        $ready->add_cap('manage_comments');
        
        // Posts capabilities
        $post_caps = array(
            'edit_posts',
            'edit_others_posts',
            'edit_private_posts',
            'edit_published_posts',
            'publish_posts',
            'read_private_posts',
            'delete_posts',
            'delete_private_posts',
            'delete_published_posts',
            'delete_others_posts'
        );
        
        foreach ($post_caps as $cap) {
            $ready->add_cap($cap);
        }
        
        // Descarga capabilities
        $descarga_caps = array(
            'edit_descargas',
            'edit_others_descargas',
            'edit_private_descargas',
            'edit_published_descargas',
            'publish_descargas',
            'read_private_descargas',
            'delete_descargas',
            'delete_private_descargas',
            'delete_published_descargas',
            'delete_others_descargas'
        );
        
        foreach ($descarga_caps as $cap) {
            $ready->add_cap($cap);
        }
    }

    if ($colaboratorio instanceof WP_Role) {
        // Add transmision capabilities
        $transmision_caps = array(
            'edit_transmision',
            'read_transmision',
            'delete_transmision',
            'edit_transmisiones',
            'edit_others_transmisiones',
            'publish_transmisiones',
            'read_private_transmisiones',
            'delete_transmisiones',
            'delete_private_transmisiones',
            'delete_published_transmisiones',
            'delete_others_transmisiones',
            'edit_private_transmisiones',
            'edit_published_transmisiones',
            'create_transmisiones'
        );
        
        foreach ($transmision_caps as $cap) {
            $colaboratorio->add_cap($cap);
        }

        // Add espacio capabilities
        $espacio_caps = array(
            'edit_espacio',
            'read_espacio',
            'delete_espacio',
            'edit_espacios',
            'edit_others_espacios',
            'publish_espacios',
            'read_private_espacios',
            'delete_espacios',
            'delete_private_espacios',
            'delete_published_espacios',
            'delete_others_espacios',
            'edit_private_espacios',
            'edit_published_espacios',
            'create_espacios'
        );
        
        foreach ($espacio_caps as $cap) {
            $colaboratorio->add_cap($cap);
        }
    }
}

// Hook into WordPress
add_action('init', 'digitalia_create_custom_roles', 10);

// Debug function to check role capabilities
function digitalia_debug_role_caps() {
    if (current_user_can('administrator') && isset($_GET['debug_roles'])) {
        $role = get_role('colaboratorio');
        echo '<pre>';
        print_r($role->capabilities);
        echo '</pre>';
        
        $user = wp_get_current_user();
        echo '<h3>Current User Roles:</h3>';
        print_r($user->roles);
        
        echo '<h3>Registered Post Types:</h3>';
        $post_types = get_post_types(array(), 'objects');
        foreach ($post_types as $post_type) {
            echo $post_type->name . ' - ' . ($post_type->show_ui ? 'Visible' : 'Hidden') . '<br>';
        }
        
        die();
    }
}
add_action('admin_init', 'digitalia_debug_role_caps');

// Remove menu items based on role
function digitalia_remove_menu_items() {
    $user = wp_get_current_user();
    
    if (in_array('en_linea', (array) $user->roles)) {
        // Remove default menus
        remove_menu_page('index.php'); // Dashboard/Escritorio
        remove_menu_page('edit.php'); // Posts
        remove_menu_page('upload.php'); // Media
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('edit-comments.php'); // Comments
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Remove all custom post types first
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if (!in_array($post_type->name, array('personajes', 'actores', 'episodio', 'series'))) {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }

        // Remove parametros page
        remove_menu_page('parametros');
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        // Remove unnecessary menus
        remove_menu_page('index.php'); // Dashboard/Escritorio
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Remove all custom post types except descargas
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if ($post_type->name !== 'descargas') {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }

        // Remove parametros page
        remove_menu_page('parametros');
    } elseif (in_array('ready', (array) $user->roles)) {
        // Remove unnecessary menus
        remove_menu_page('index.php'); // Dashboard/Escritorio
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Remove all custom post types except descargas
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if ($post_type->name !== 'descargas') {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }

        // Remove parametros page
        remove_menu_page('parametros');
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        // Remove unnecessary menus
        remove_menu_page('index.php'); // Dashboard
        remove_menu_page('edit.php?post_type=page'); // Pages
        remove_menu_page('themes.php'); // Appearance
        remove_menu_page('plugins.php'); // Plugins
        remove_menu_page('users.php'); // Users
        remove_menu_page('tools.php'); // Tools
        remove_menu_page('options-general.php'); // Settings
        
        // Only remove post types that are not needed
        $post_types = get_post_types(array('_builtin' => false), 'objects');
        foreach ($post_types as $post_type) {
            if (!in_array($post_type->name, array('transmision', 'espacio'))) {
                remove_menu_page('edit.php?post_type=' . $post_type->name);
            }
        }
    }
}
add_action('admin_menu', 'digitalia_remove_menu_items', 999);

// Modify admin bar for specific roles
function digitalia_modify_admin_bar($wp_admin_bar) {
    if (!current_user_can('administrator')) {
        // Remove unnecessary nodes
        $wp_admin_bar->remove_node('new-content');
        $wp_admin_bar->remove_node('comments');
        $wp_admin_bar->remove_node('customize');
        $wp_admin_bar->remove_node('edit');
        $wp_admin_bar->remove_node('themes');
        $wp_admin_bar->remove_node('view-site');
        $wp_admin_bar->remove_node('users');
        
        // Get current user info
        $current_user = wp_get_current_user();
        $profile_url = get_edit_profile_url($current_user->ID);
        
        // Remove default user menu
        $wp_admin_bar->remove_node('my-account');
        
        // Add custom user menu
        $wp_admin_bar->add_node(array(
            'id' => 'my-account',
            'title' => sprintf('<span class="ab-item">%s</span>', esc_html($current_user->display_name)),
            'href' => $profile_url
        ));
        
        // Add submenu items
        $wp_admin_bar->add_node(array(
            'parent' => 'my-account',
            'id' => 'edit-profile',
            'title' => __('Edit Profile'),
            'href' => $profile_url
        ));
        
        $wp_admin_bar->add_node(array(
            'parent' => 'my-account',
            'id' => 'logout',
            'title' => __('Log Out'),
            'href' => wp_logout_url()
        ));
    }
}
add_action('admin_bar_menu', 'digitalia_modify_admin_bar', 999);

// Map meta capabilities
function digitalia_map_meta_cap($caps, $cap, $user_id, $args) {
    if (!$user_id) {
        return $caps;
    }

    $user = get_userdata($user_id);
    if (!$user || !isset($user->roles) || !is_array($user->roles)) {
        return $caps;
    }
    
    if (in_array('en_linea', (array) $user->roles)) {
        // Map capabilities for en_linea role
        $post_types = array('personajes', 'actores', 'episodio', 'series');
        foreach ($post_types as $type) {
            if (strpos($cap, $type) !== false) {
                return array('read');
            }
        }
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        // Map capabilities for total_transmedia role
        if (strpos($cap, 'post') !== false || strpos($cap, 'descarga') !== false) {
            return array('read');
        }
    } elseif (in_array('ready', (array) $user->roles)) {
        // Map capabilities for ready role
        if (strpos($cap, 'post') !== false || strpos($cap, 'descarga') !== false) {
            return array('read');
        }
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        // Allow all post capabilities
        if (strpos($cap, 'post') !== false) {
            return array('exist');
        }
        
        // Allow all transmision capabilities
        if (strpos($cap, 'transmision') !== false) {
            return array('exist');
        }
        
        // Allow all espacio capabilities
        if (strpos($cap, 'espacio') !== false) {
            return array('exist');
        }
    }
    
    return $caps;
}
add_filter('map_meta_cap', 'digitalia_map_meta_cap', 10, 4);

/**
 * Get post types that support categories
 */
function digitalia_get_category_supported_post_types() {
    $post_types = get_post_types(['public' => true], 'objects');
    $supported_types = [];

    foreach ($post_types as $post_type) {
        if (is_object_in_taxonomy($post_type->name, 'category')) {
            $supported_types[] = $post_type->name;
        }
    }

    return $supported_types;
}

// Restrict post categories based on user role
function digitalia_restrict_post_categories($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    $supported_types = digitalia_get_category_supported_post_types();
    if (!in_array($query->get('post_type'), $supported_types)) {
        return;
    }

    $current_user = wp_get_current_user();
    $role_category_map = array(
        'ready' => 'ready',
        'total_transmedia' => 'total-transmedia',
        'colaboratorio' => 'colaboratorios',
        'en_linea' => 'en-linea'
    );

    foreach ($role_category_map as $role => $category_slug) {
        if (in_array($role, (array) $current_user->roles)) {
            $category = get_category_by_slug($category_slug);
            if ($category) {
                $query->set('cat', $category->term_id);
            }
            break;
        }
    }
}
add_action('pre_get_posts', 'digitalia_restrict_post_categories');

// Restrict category selection in post editor
function digitalia_restrict_category_selection() {
    global $post_type;
    
    // Check if current post type supports categories
    if (!is_object_in_taxonomy($post_type, 'category')) {
        return;
    }

    $current_user = wp_get_current_user();
    $role_category_map = array(
        'ready' => 'ready',
        'total_transmedia' => 'total-transmedia',
        'colaboratorio' => 'colaboratorios',
        'en_linea' => 'en-linea'
    );

    foreach ($role_category_map as $role => $category_slug) {
        if (in_array($role, (array) $current_user->roles)) {
            $category = get_category_by_slug($category_slug);
            if ($category) {
                ?>
                <script type="text/javascript">
                jQuery(document).ready(function($) {
                    // Hide the category checklist
                    $('#categorychecklist').find('input[type=checkbox]').each(function() {
                        if ($(this).val() != <?php echo $category->term_id; ?>) {
                            $(this).prop('disabled', true);
                            $(this).prop('checked', false);
                            $(this).parent().hide();
                        } else {
                            $(this).prop('checked', true);
                            $(this).prop('disabled', true);
                        }
                    });
                    
                    // Hide the category tabs and add new category form
                    $('#category-all, #category-pop, #category-tabs, #category-adder').hide();
                });
                </script>
                <?php
            }
            break;
        }
    }
}
add_action('admin_footer-post.php', 'digitalia_restrict_category_selection');
add_action('admin_footer-post-new.php', 'digitalia_restrict_category_selection');

// Ensure posts are saved with correct category
function digitalia_force_post_category($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $post_type = get_post_type($post_id);
    
    // Check if this post type supports categories
    if (!is_object_in_taxonomy($post_type, 'category')) {
        return;
    }

    $current_user = wp_get_current_user();
    $role_category_map = array(
        'ready' => 'ready',
        'total_transmedia' => 'total-transmedia',
        'colaboratorio' => 'colaboratorios',
        'en_linea' => 'en-linea'
    );

    foreach ($role_category_map as $role => $category_slug) {
        if (in_array($role, (array) $current_user->roles)) {
            $category = get_category_by_slug($category_slug);
            if ($category) {
                wp_set_post_categories($post_id, array($category->term_id));
            }
            break;
        }
    }
}
add_action('save_post', 'digitalia_force_post_category');
