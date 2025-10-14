<?php
/**
 * Template part for displaying subpage headers
 *
 * @package Digitalia
 */

$title = isset($args['title']) ? $args['title'] : get_the_title();
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$show_cta = isset($args['show_cta']) ? $args['show_cta'] : false;
$cta_text = isset($args['cta_text']) ? $args['cta_text'] : '';
$cta_url = isset($args['cta_url']) ? $args['cta_url'] : '#';

// Get the header color from ACF
$header_color = get_field('color_de_encabezado');

// Get color schemes and select the current one or default to neutral colors
$colors = digitalia_get_color_schemes();
$current_colors = isset($colors[$header_color]) ? $colors[$header_color] : array(
    'bg' => 'bg-gray-200',
    'text' => 'text-gray-950',
    'subtitle' => 'text-gray-800',
    'highlight' => 'bg-gray-300/30',
    'grid' => 'bg-gray-300',
    'button' => 'bg-primary hover:bg-primary/90 text-white',
);
?>

<section class="py-24 relative">
    <!-- Background color layer -->
    <div class="absolute inset-0 <?php echo esc_attr($current_colors['bg']); ?>"></div>
    
    <!-- Grid overlay with mask -->
    <div class="opacity-20 absolute inset-0 <?php echo esc_attr($current_colors['grid']); ?>/10 bg-[linear-gradient(to_right,currentColor_1px,transparent_1px),linear-gradient(to_bottom,currentColor_1px,transparent_1px)] bg-size-[64px_64px] mask-[radial-gradient(ellipse_50%_100%_at_50%_50%,#000_60%,transparent_100%)]"></div>
    
    <div class="container relative">
        <div class="relative max-w-5xl">
            <h1 class="text-3xl font-extrabold leading-tight lg:text-5xl lg:leading-snug <?php echo esc_attr($current_colors['text']); ?>">
                <span class="relative inline-block before:absolute before:-bottom-2 before:-left-4 before:-right-2 before:top-0 before:-z-10 before:rounded-lg <?php echo esc_attr($current_colors['highlight']); ?>">
                    <?php echo esc_html($title); ?>
                </span>
            </h1>
            
            <?php if ($subtitle) : ?>
                <p class="mt-7 text-lg font-light lg:text-xl <?php echo esc_attr($current_colors['subtitle']); ?>">
                    <?php echo esc_html($subtitle); ?>
                </p>
            <?php endif; ?>
            
            <?php if ($show_cta) : ?>
                <div class="mt-8">
                    <a href="<?php echo esc_url($cta_url); ?>" 
                       class="inline-flex items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors <?php echo esc_attr($current_colors['button']); ?>">
                        <?php echo esc_html($cta_text); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-4">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
