<?php
/**
 * Secondary Navigation Template Part
 *
 * @package Digitalia
 */

// Check if we're on any of the main sections or their child pages
$post = get_post();
$is_academia = false;
$is_transmedia = false;
$is_enlinea = false;
$is_colaboratorios = false;
$is_ready = false;
$parent_page_id = null;
$parent_slug = '';

// Function to get section color classes
function get_section_colors($section) {
    switch ($section) {
        case 'academia':
            return [
                'bg' => 'bg-yellow-100',
                'bg-dark' => 'bg-yellow-800',
                'bg-hover' => 'bg-yellow-200',
                'bg-light' => 'bg-yellow-50',
                'text' => 'text-yellow-800',
                'hover' => 'hover:bg-yellow-200 hover:text-yellow-900',
                'hover-light' => 'hover:bg-yellow-100',
                'border' => 'border-yellow-100'
            ];
        case 'total-transmedia':
            return [
                'bg' => 'bg-blue-100',
                'bg-dark' => 'bg-blue-800',
                'bg-hover' => 'bg-blue-200',
                'bg-light' => 'bg-blue-50',
                'text' => 'text-blue-800',
                'hover' => 'hover:bg-blue-200 hover:text-blue-900',
                'hover-light' => 'hover:bg-blue-100',
                'border' => 'border-blue-100'
            ];
        case 'en-linea':
            return [
                'bg' => 'bg-red-100',
                'bg-dark' => 'bg-red-800',
                'bg-hover' => 'bg-red-200',
                'bg-light' => 'bg-red-50',
                'text' => 'text-red-800',
                'hover' => 'hover:bg-red-200 hover:text-red-900',
                'hover-light' => 'hover:bg-red-100',
                'border' => 'border-red-100'
            ];
        case 'colaboratorios':
            return [
                'bg' => 'bg-teal-100',
                'bg-dark' => 'bg-teal-800',
                'bg-hover' => 'bg-teal-200',
                'bg-light' => 'bg-teal-50',
                'text' => 'text-teal-800',
                'hover' => 'hover:bg-teal-200 hover:text-teal-900',
                'hover-light' => 'hover:bg-teal-100',
                'border' => 'border-teal-100'
            ];
        case 'ready':
            return [
                'bg' => 'bg-purple-100',
                'bg-dark' => 'bg-purple-800',
                'bg-hover' => 'bg-purple-200',
                'bg-light' => 'bg-purple-50',
                'text' => 'text-purple-800',
                'hover' => 'hover:bg-purple-200 hover:text-purple-900',
                'hover-light' => 'hover:bg-purple-100',
                'border' => 'border-purple-100'
            ];
    }
}

if ($post) {
    $section_slugs = ['academia', 'total-transmedia', 'en-linea', 'colaboratorios', 'ready'];
    
    // Check if current post is one of our sections
    if (in_array($post->post_name, $section_slugs)) {
        $parent_page_id = $post->ID;
        $parent_slug = $post->post_name;
        switch ($post->post_name) {
            case 'academia': $is_academia = true; break;
            case 'total-transmedia': $is_transmedia = true; break;
            case 'en-linea': $is_enlinea = true; break;
            case 'colaboratorios': $is_colaboratorios = true; break;
            case 'ready': $is_ready = true; break;
        }
    } else {
        // Check ancestors
        $ancestors = get_post_ancestors($post->ID);
        foreach ($ancestors as $ancestor) {
            $ancestor_post = get_post($ancestor);
            if (in_array($ancestor_post->post_name, $section_slugs)) {
                $parent_page_id = $ancestor_post->ID;
                $parent_slug = $ancestor_post->post_name;
                switch ($ancestor_post->post_name) {
                    case 'academia': $is_academia = true; break;
                    case 'total-transmedia': $is_transmedia = true; break;
                    case 'en-linea': $is_enlinea = true; break;
                    case 'colaboratorios': $is_colaboratorios = true; break;
                    case 'ready': $is_ready = true; break;
                }
                break;
            }
        }
    }
}

// Only show if we're in one of our sections
if (!($is_academia || $is_transmedia || $is_enlinea || $is_colaboratorios || $is_ready)) {
    return;
}

// Get current URL path for active state
$current_url = $_SERVER['REQUEST_URI'];
$current_url = rtrim($current_url, '/');

// Helper function to check if a link is active
function is_link_active($link_url, $current_url) {
    return rtrim($link_url, '/') === $current_url;
}

// Get child pages
$child_pages = get_pages(array(
    'child_of' => $parent_page_id,
    'sort_column' => 'menu_order,post_title',
    'post_type' => 'page',
    'post_status' => 'publish'
));

// Get color classes for current section
$colors = get_section_colors($parent_slug);
?>

<!-- Desktop Secondary Navigation -->
<nav id="modulos-nav" class="hidden md:block sticky top-16 z-50 <?php echo $colors['bg']; ?> shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-center space-x-8 py-3">
            <!-- Parent page link -->
            <a href="<?php echo "/modulos/{$parent_slug}"; ?>" 
               class="<?php echo $colors['text']; ?> 
                      <?php echo is_link_active("/modulos/{$parent_slug}", $current_url) 
                                ? $colors['bg-hover'] . ' font-bold' 
                                : $colors['hover']; ?> 
               rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                <?php echo get_the_title($parent_page_id); ?>
            </a>

            <?php foreach ($child_pages as $child) : 
                $child_url = get_permalink($child->ID);
                $relative_url = parse_url($child_url, PHP_URL_PATH);
            ?>
                <a href="<?php echo esc_url($relative_url); ?>" 
                   class="<?php echo $colors['text']; ?> 
                          <?php echo is_link_active($relative_url, $current_url) 
                                    ? $colors['bg-hover'] . ' font-bold' 
                                    : $colors['hover']; ?> 
                   rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    <?php echo esc_html($child->post_title); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</nav>

<!-- Mobile Secondary Navigation Button -->
<div id="secondary-nav-mobile" x-data="{ subMenuOpen: false }" class="md:hidden fixed bottom-16 left-0 right-0 z-44">
    <button @click="subMenuOpen = !subMenuOpen" 
            class="w-full <?php echo $colors['bg-dark']; ?> text-white h-12 flex items-center justify-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span class="text-sm font-medium">Secciones <?php echo get_the_title($parent_page_id); ?></span>
    </button>

    <!-- Mobile Secondary Navigation Menu -->
    <div x-show="subMenuOpen" 
         class="fixed bottom-28 left-0 right-0 <?php echo $colors['bg-light']; ?> shadow-lg z-44">
        <div class="py-2">
            <!-- Parent page link -->
            <a href="<?php echo "/modulos/{$parent_slug}"; ?>" 
               class="block px-4 py-3 <?php echo $colors['text']; ?> 
                      <?php echo is_link_active("/modulos/{$parent_slug}", $current_url) 
                                ? $colors['bg-hover'] . ' font-bold' 
                                : $colors['hover-light']; ?> 
               border-b <?php echo $colors['border']; ?>">
                <?php echo get_the_title($parent_page_id); ?>
            </a>

            <?php 
            $last_index = count($child_pages) - 1;
            foreach ($child_pages as $index => $child) : 
                $child_url = get_permalink($child->ID);
                $relative_url = parse_url($child_url, PHP_URL_PATH);
                $is_last = $index === $last_index;
            ?>
                <a href="<?php echo esc_url($relative_url); ?>" 
                   class="block px-4 py-3 <?php echo $colors['text']; ?> 
                          <?php echo is_link_active($relative_url, $current_url) 
                                    ? $colors['bg-hover'] . ' font-bold' 
                                    : $colors['hover-light']; ?> 
                          <?php echo !$is_last ? 'border-b ' . $colors['border'] : ''; ?>">
                    <?php echo esc_html($child->post_title); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
