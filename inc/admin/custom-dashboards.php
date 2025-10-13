<?php
/**
 * Custom Dashboard Pages
 */

if (!defined('ABSPATH')) {
    exit;
}

// Include dashboard pages
require_once get_template_directory() . '/inc/admin/dashboard-en-linea.php';
require_once get_template_directory() . '/inc/admin/dashboard-total-transmedia.php';
require_once get_template_directory() . '/inc/admin/dashboard-ready.php';
require_once get_template_directory() . '/inc/admin/dashboard-colaboratorio.php';

/**
 * Add Bootstrap and custom styles to admin head
 */
function digitalia_admin_styles($hook) {
    // Only add these styles on our custom dashboard pages
    $custom_dashboards = array(
        'toplevel_page_en-linea-dashboard',
        'toplevel_page_total-transmedia-dashboard',
        'toplevel_page_ready-dashboard',
        'toplevel_page_colaboratorio-dashboard'
    );
    
    if (!in_array($hook, $custom_dashboards)) {
        return;
    }

    // Enqueue Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-admin',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        array(),
        '5.3.2'
    );

    // Enqueue Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons-admin',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css',
        array(),
        '1.11.1'
    );

    // Add custom inline styles
    $custom_css = '
        .welcome-panel {
            padding: 2.5rem;
            margin: 1.5rem 0;
            background: #fff;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
            border-radius: 0.5rem;
        }
        
        .welcome-panel h2 {
            margin: 0 0 1.5rem;
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
        }
        
        .welcome-panel h3 {
            margin: 1rem 0;
            font-size: 1.4rem;
            font-weight: 600;
            color: #34495e;
        }
        
        .welcome-panel-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .welcome-panel-column {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 0.5rem;
            width: 100%;
        }
        
        .welcome-panel-column h3 {
            margin-top: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .welcome-panel-column ul {
            margin: 1rem 0 0;
            padding: 0;
            list-style: none;
        }
        
        .welcome-panel-column li {
            margin-bottom: 1rem;
            transition: transform 0.2s ease;
        }
        
        .welcome-panel-column li:hover {
            transform: translateX(5px);
        }
        
        .welcome-panel-column a {
            text-decoration: none;
            color: #3498db;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }
        
        .welcome-panel-column a:hover {
            color: #2980b9;
        }
        
        .about-description {
            font-size: 1.1rem;
            color: #7f8c8d;
            margin-bottom: 2rem;
        }
        
        /* Activity section styles */
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-item i {
            color: #95a5a6;
        }
        
        /* Custom status badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .status-badge.draft {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-badge.published {
            background: #d4edda;
            color: #155724;
        }
    ';
    
    wp_add_inline_style('bootstrap-admin', $custom_css);
}
add_action('admin_enqueue_scripts', 'digitalia_admin_styles');

// Register custom dashboard pages
function digitalia_register_custom_dashboards() {
    $user = wp_get_current_user();
    
    if (in_array('en_linea', (array) $user->roles)) {
        add_menu_page(
            'En Linea Dashboard',
            'Dashboard',
            'read',
            'en-linea-dashboard',
            'digitalia_en_linea_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        add_menu_page(
            'Total Transmedia Dashboard',
            'Dashboard',
            'read',
            'total-transmedia-dashboard',
            'digitalia_total_transmedia_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('ready', (array) $user->roles)) {
        add_menu_page(
            'Ready Dashboard',
            'Dashboard',
            'read',
            'ready-dashboard',
            'digitalia_ready_dashboard_page',
            'dashicons-admin-home',
            2
        );
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        add_menu_page(
            'Colaboratorio Dashboard',
            'Dashboard',
            'read',
            'colaboratorio-dashboard',
            'digitalia_colaboratorio_dashboard_page',
            'dashicons-admin-home',
            2
        );
    }
}
add_action('admin_menu', 'digitalia_register_custom_dashboards');

// Redirect users to their respective dashboards
function digitalia_redirect_to_custom_dashboard() {
    $user = wp_get_current_user();
    $screen = get_current_screen();
    
    // Only redirect on the default dashboard page
    if ($screen->id !== 'dashboard') {
        return;
    }
    
    if (in_array('en_linea', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=en-linea-dashboard'));
        exit;
    } elseif (in_array('total_transmedia', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=total-transmedia-dashboard'));
        exit;
    } elseif (in_array('ready', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=ready-dashboard'));
        exit;
    } elseif (in_array('colaboratorio', (array) $user->roles)) {
        wp_redirect(admin_url('admin.php?page=colaboratorio-dashboard'));
        exit;
    }
}
add_action('current_screen', 'digitalia_redirect_to_custom_dashboard');

// Login redirect
function digitalia_login_redirect($redirect_to, $request, $user) {
    if (!is_wp_error($user)) {
        if (in_array('en_linea', (array) $user->roles)) {
            return admin_url('admin.php?page=en-linea-dashboard');
        } elseif (in_array('total_transmedia', (array) $user->roles)) {
            return admin_url('admin.php?page=total-transmedia-dashboard');
        } elseif (in_array('ready', (array) $user->roles)) {
            return admin_url('admin.php?page=ready-dashboard');
        } elseif (in_array('colaboratorio', (array) $user->roles)) {
            return admin_url('admin.php?page=colaboratorio-dashboard');
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'digitalia_login_redirect', 10, 3);
