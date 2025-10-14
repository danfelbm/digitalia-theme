<?php
/**
 * Template Name: Colaboratorios - Impacto
 * Description: Página de impacto y resultados de Colaboratorios
 */

get_header();
?>

<section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-teal-950 bg-teal-50">
    <?php if ($hero = get_field('hero')) : ?>
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6"><?php echo esc_html($hero['title']); ?></h2>
                <p class="mb-8 lg:text-lg"><?php echo esc_html($hero['description']); ?></p>
                <?php if (!empty($hero['button'])) : ?>
                    <a href="#<?php echo esc_attr($hero['button']['target']); ?>" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                        <?php echo esc_html($hero['button']['text']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<section class="py-32">
    <?php if ($impact = get_field('impact_overview')) : ?>
        <div class="container">
            <h2 class="text-center text-4xl text-teal-950"><?php echo esc_html($impact['title']); ?></h2>
            <p class="mx-auto mt-3 max-w-3xl text-center text-2xl text-teal-600"><?php echo esc_html($impact['subtitle']); ?></p>
            
            <?php if ($metrics = $impact['metrics_card']) : ?>
                <div class="rounded-lg border bg-card text-card-foreground shadow-sm mt-20 flex flex-col gap-6 p-6 md:flex-row md:gap-8 md:p-8">
                    <div class="flex w-full flex-col justify-between">
                        <h6 class="text-xl md:text-3xl text-teal-950"><?php echo esc_html($metrics['title']); ?></h6>
                        <p class="mt-4 text-teal-700"><?php echo esc_html($metrics['description']); ?></p>
                        <a href="<?php echo esc_url($metrics['badge_link']); ?>" class="inline-flex items-center rounded-full border text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-teal-950 mt-4 w-fit bg-teal-50 hover:bg-teal-100 px-4 py-3 md:text-base">
                            <?php echo esc_html($metrics['badge']); ?>
                        </a>
                    </div>
                    <div class="w-full">
                        <?php if (!empty($metrics['image'])) : ?>
                            <img src="<?php echo esc_url($metrics['image']['url']); ?>" 
                                 alt="<?php echo esc_attr($metrics['image']['alt']); ?>" 
                                 class="max-h-80 w-full rounded-lg object-cover">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($impact['secondary_cards'])) : ?>
                <div class="mt-6 flex flex-col gap-6 md:mt-8 md:flex-row md:gap-8">
                    <?php foreach ($impact['secondary_cards'] as $card) : ?>
                        <div class="rounded-lg border bg-card text-card-foreground shadow-sm flex w-full flex-col gap-6 p-6 md:gap-8 md:p-8">
                            <div class="w-full">
                                <?php if (!empty($card['image'])) : ?>
                                    <img src="<?php echo esc_url($card['image']['url']); ?>" 
                                         alt="<?php echo esc_attr($card['image']['alt']); ?>" 
                                         class="max-h-80 w-full rounded-lg object-cover">
                                <?php endif; ?>
                            </div>
                            <div class="flex w-full flex-col justify-between">
                                <h6 class="text-xl md:text-3xl text-teal-950"><?php echo esc_html($card['title']); ?></h6>
                                <p class="mt-4 text-teal-700"><?php echo esc_html($card['description']); ?></p>
                                <a href="<?php echo esc_url($card['badge_link']); ?>" class="inline-flex items-center rounded-full border text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-teal-950 mt-10 w-fit bg-teal-50 hover:bg-teal-100 px-4 py-3 md:text-base">
                                    <?php echo esc_html($card['badge']); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

<section class="relative bg-teal-50 bg-[linear-gradient(#99f6e4_0%,#f0fdfa_100%)] py-32 sm:py-0">
    <?php 
    $impact_overview = get_field('impact_overview');
    if (!empty($impact_overview['testimonials'])) : 
        $testimonials = $impact_overview['testimonials'];
    ?>
        <div class="container sm:py-32">
            <div class="flex flex-col items-start gap-12 sm:flex-row sm:items-center sm:justify-between sm:gap-32">
                <div class="flex flex-1 flex-col items-start text-left">
                    <h2 class="my-6 text-pretty text-2xl font-bold text-teal-950 lg:text-4xl"><?php echo esc_html($testimonials['title']); ?></h2>
                    <p class="mb-8 max-w-3xl text-teal-700 lg:text-xl"><?php echo esc_html($testimonials['description']); ?></p>
                </div>
            </div>
        </div>
        <?php if (!empty($testimonials['items'])) : ?>
            <div class="container mt-16 sm:mt-0">
                <div class="w-full columns-1 gap-4 sm:columns-2 lg:columns-3 lg:gap-6">
                    <?php foreach ($testimonials['items'] as $testimonial) : ?>
                        <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                            <div class="flex flex-col">
                                <p class="mb-4 text-sm text-teal-800">"<?php echo esc_html($testimonial['quote']); ?>"</p>
                                <div class="flex items-center gap-1 md:gap-2">
                                    <?php if (!empty($testimonial['image'])) : ?>
                                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                                            <img class="aspect-square h-full w-full" 
                                                 src="<?php echo esc_url($testimonial['image']['url']); ?>" 
                                                 alt="<?php echo esc_attr($testimonial['author']); ?>">
                                        </span>
                                    <?php endif; ?>
                                    <div class="text-left">
                                        <p class="text-xs font-medium text-teal-950"><?php echo esc_html($testimonial['author']); ?></p>
                                        <p class="text-xs text-teal-600"><?php echo esc_html($testimonial['role']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="pointer-events-none absolute bottom-0 left-0 hidden w-full sm:block sm:h-67.5 sm:bg-[linear-gradient(transparent_0%,#f0fdfa_100%)] lg:h-56"></div>
    <?php endif; ?>
</section>

<?php
get_footer();
