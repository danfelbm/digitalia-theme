<?php
/**
 * Template part for displaying floating navigation menu
 *
 * @param array $args {
 *     Optional. Array of navigation menu parameters.
 *     @type array $nav_items Array of navigation items. Each item should have:
 *         @type string $anchor The anchor ID without #
 *         @type string $text   The link text to display
 * }
 *
 * @package Digitalia
 */

$nav_items = isset($args['nav_items']) ? $args['nav_items'] : [];
?>

<!-- Floating Navigation Menu -->
<div class="sticky top-20 z-50 flex justify-center mt-6 px-2 sm:px-4">
    <nav class="items-center justify-center bg-muted text-muted-foreground flex h-auto flex-wrap rounded-full p-1 shadow-lg">
        <?php foreach ($nav_items as $item) : ?>
            <a 
                href="#<?php echo esc_attr($item['anchor']); ?>" 
                class="inline-flex items-center justify-center whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm rounded-full border border-solid border-transparent px-2 sm:px-4 py-2 text-sm font-semibold transition"
            >
                <?php echo esc_html($item['text']); ?>
            </a>
        <?php endforeach; ?>
    </nav>
</div>
