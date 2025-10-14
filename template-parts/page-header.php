<?php
/**
 * Template part for displaying page headers
 *
 * @package Digitalia
 */

// Default values
$title = get_the_title();
$subtitle = '';
$show_cta = false;
$cta_text = '';
$cta_url = '';
$show_credit_card_text = false;
$credit_card_text = 'No credit card required.';

// Override with passed args if they exist
if (isset($args)) {
    $title = $args['title'] ?? $title;
    $subtitle = $args['subtitle'] ?? $subtitle;
    $show_cta = $args['show_cta'] ?? $show_cta;
    $cta_text = $args['cta_text'] ?? $cta_text;
    $cta_url = $args['cta_url'] ?? $cta_url;
    $show_credit_card_text = $args['show_credit_card_text'] ?? $show_credit_card_text;
    $credit_card_text = $args['credit_card_text'] ?? $credit_card_text;
}

// Process title to highlight last word
$title_words = explode(' ', $title);
$last_word = array_pop($title_words);
$title_start = !empty($title_words) ? implode(' ', $title_words) . ' ' : '';
?>

<section class="py-32 relative">
    <!-- Background color layer -->
    <div class="absolute inset-0 bg-gray-200"></div>
    <!-- Grid overlay with mask -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,hsl(var(--muted))_1px,transparent_1px),linear-gradient(to_bottom,hsl(var(--muted))_1px,transparent_1px)] bg-size-[64px_64px] mask-[radial-gradient(ellipse_50%_100%_at_50%_50%,#000_60%,transparent_100%)]"></div>
    
    <div class="container relative">
        <div class="relative max-w-5xl">
            <h1 class="text-4xl font-extrabold leading-tight lg:text-6xl lg:leading-snug">
                <?php echo esc_html($title_start); ?>
                <span class="relative inline-block before:absolute before:-bottom-2 before:-left-4 before:-right-2 before:top-0 before:-z-10 before:rounded-lg before:bg-muted-foreground/15">
                    <?php echo esc_html($last_word); ?>
                </span>
            </h1>

            <?php if ($subtitle) : ?>
            <p class="mt-7 text-xl font-light lg:text-2xl">
                <?php echo esc_html($subtitle); ?>
            </p>
            <?php endif; ?>

            <?php if ($show_cta) : ?>
            <div class="mt-12 flex w-fit flex-col gap-2.5 text-center">
                <a href="<?php echo esc_url($cta_url); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">
                    <?php echo esc_html($cta_text); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 h-auto w-4">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
                <?php if ($show_credit_card_text) : ?>
                <p class="text-sm text-muted-foreground"><?php echo esc_html($credit_card_text); ?></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
