<?php
/**
 * Theme Switcher for Shadcnblocks Integration
 *
 * Este archivo gestiona el sistema de theming que integra themes de Shadcnblocks
 * con los estilos personalizados de Digitalia mediante CONCATENACIÓN.
 *
 * ARQUITECTURA:
 * 1. Theme seleccionado (globals.css, amber-minimal.css, etc.) - COMPLETO con @import tailwind
 * 2. digitalia-custom.css - SOLO estilos de Digitalia (sin imports)
 * 3. CONCATENAR ambos → input.css
 * 4. Tailwind v4 compila input.css → style.css
 *
 * @package Digitalia
 * @since 2.5.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get available themes
 *
 * Returns an array of available theme names and their display labels
 *
 * @return array Associative array of theme slug => display name
 */
function digitalia_get_available_themes() {
    return array(
        'globals' => 'Default (Shadcnblocks)',
        // 'amber-minimal' => 'Amber Minimal',
        // Add more themes here as you download them from shadcnblocks.com
        // Example:
        // 'blue' => 'Blue Theme',
        // 'citrus' => 'Citrus Theme',
        // 'claude' => 'Claude Theme',
    );
}

/**
 * Get active theme
 *
 * Returns the currently active theme slug.
 *
 * ⚡ CAMBIAR ESTA LÍNEA PARA ALTERNAR TEMAS ⚡
 *
 * @return string Active theme slug
 */
function digitalia_get_active_theme() {
    // ⚡ CAMBIAR AQUÍ PARA ALTERNAR TEMAS ⚡
    // Valores disponibles: 'globals', 'amber-minimal'
    return 'globals';
}

/**
 * Get theme file path
 *
 * Returns the absolute path to a theme CSS file in globals/ directory
 *
 * @param string $theme_slug Theme slug
 * @return string|false Absolute path to theme file, or false if not found
 */
function digitalia_get_theme_file_path($theme_slug) {
    $theme_file = get_template_directory() . "/globals/{$theme_slug}.css";

    if (file_exists($theme_file)) {
        return $theme_file;
    }

    return false;
}

/**
 * Build input.css by concatenating theme + custom styles
 *
 * Esta función es el CORAZÓN del sistema de theming.
 * Concatena el theme seleccionado con los estilos personalizados de Digitalia.
 *
 * ORDEN DE CONCATENACIÓN:
 * 1. Theme Header (metadata de WordPress)
 * 2. Theme CSS completo (globals.css o amber-minimal.css)
 * 3. Digitalia custom CSS (navegación, módulos, etc.)
 *
 * @return bool True on success, false on failure
 */
function digitalia_build_input_css() {
    $active_theme = digitalia_get_active_theme();
    $theme_file = digitalia_get_theme_file_path($active_theme);
    $custom_file = get_template_directory() . "/src/digitalia-custom.css";
    $output_file = get_template_directory() . "/src/input.css";

    // Verificar que existen los archivos necesarios
    if (!$theme_file) {
        error_log("Digitalia Theme Switcher: Theme file not found for '{$active_theme}'");
        return false;
    }

    if (!file_exists($custom_file)) {
        error_log("Digitalia Theme Switcher: digitalia-custom.css not found");
        return false;
    }

    // Leer contenidos
    $theme_content = file_get_contents($theme_file);
    $custom_content = file_get_contents($custom_file);

    if ($theme_content === false || $custom_content === false) {
        error_log("Digitalia Theme Switcher: Failed to read theme or custom files");
        return false;
    }

    // Header de WordPress para el theme
    $header = <<<CSS
/*
Theme Name: Digitalia
Theme URI: https://danielbecerra.org
Author: Daniel Becerra
Author URI: https://danielbecerra.org
Description: Tema para Digitalia con Shadcnblocks theming system
Version: 2.5.0
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: digitalia
Tags: tailwind, shadcnblocks, custom
*/


CSS;

    // Concatenar: Header + Theme + Custom
    $final_content = $header . $theme_content . "\n\n" . $custom_content;

    // Escribir input.css
    $result = file_put_contents($output_file, $final_content);

    if ($result === false) {
        error_log("Digitalia Theme Switcher: Failed to write input.css");
        return false;
    }

    error_log("Digitalia Theme Switcher: input.css built successfully with theme '{$active_theme}'");
    return true;
}

/**
 * Initialize theme system
 *
 * Builds input.css when the theme is first activated
 */
function digitalia_init_theme_system() {
    digitalia_build_input_css();
}
add_action('after_switch_theme', 'digitalia_init_theme_system');

/**
 * Build input.css on init (development mode)
 *
 * In development, we rebuild input.css on every page load
 * to reflect changes immediately. In production, you should
 * disable this or add a check for WP_DEBUG.
 */
function digitalia_maybe_build_on_init() {
    // Only build on init if in debug mode
    if (defined('WP_DEBUG') && WP_DEBUG) {
        digitalia_build_input_css();
    }
}
add_action('init', 'digitalia_maybe_build_on_init', 1);

/**
 * Add theme info to admin bar (for logged-in admins)
 *
 * Displays the currently active theme in the admin bar
 */
function digitalia_add_theme_info_to_admin_bar($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }

    $active_theme = digitalia_get_active_theme();
    $available_themes = digitalia_get_available_themes();
    $theme_name = isset($available_themes[$active_theme]) ? $available_themes[$active_theme] : $active_theme;

    $wp_admin_bar->add_node(array(
        'id' => 'digitalia-theme-info',
        'title' => '🎨 Theme: ' . $theme_name,
        'href' => '#',
        'meta' => array(
            'title' => 'Currently active Shadcnblocks theme',
        ),
    ));
}
add_action('admin_bar_menu', 'digitalia_add_theme_info_to_admin_bar', 100);

/**
 * Force rebuild input.css (útil para debugging)
 *
 * Puedes llamar esta función manualmente para forzar la regeneración:
 * digitalia_force_rebuild_input_css();
 */
function digitalia_force_rebuild_input_css() {
    $result = digitalia_build_input_css();
    if ($result) {
        return "✅ input.css rebuilt successfully";
    } else {
        return "❌ Failed to rebuild input.css - check error logs";
    }
}
