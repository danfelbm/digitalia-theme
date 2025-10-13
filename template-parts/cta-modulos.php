<?php
/**
 * Template part for displaying CTA modules section
 *
 * @package Digitalia
 */

$args = wp_parse_args($args, array(
    'title' => 'Integrations',
    'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto illo praesentium nisi, accusantium quae.',
    'cta_primary_text' => 'Get Started',
    'cta_primary_url' => '#',
    'cta_secondary_text' => 'Contact Sales',
    'cta_secondary_url' => '#',
    'doc_title' => 'Documentation',
    'doc_description' => 'Lorem ipsum dolor, sit amet consectetur.',
    'doc_url' => '#',
    'guide_title' => 'Getting Started',
    'guide_description' => 'Lorem ipsum dolor, sit amet consectetur.',
    'guide_url' => '#',
    'background_class' => 'bg-slate-100'
));
?>

<section class="<?php echo esc_attr($args['background_class']); ?>">
    <div>
        <div class="grid grid-cols-1 flex-col gap-10 p-6 lg:grid-cols-2 lg:py-16 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div>
                <h4 class="mb-2 text-2xl font-bold lg:text-4xl"><?php echo esc_html($args['title']); ?></h4>
                <p class="text-muted-foreground"><?php echo esc_html($args['description']); ?></p>
                <div class="mt-8 flex flex-col items-center gap-2 sm:flex-row">
                    <a href="<?php echo esc_url($args['cta_primary_url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($args['cta_primary_text']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($args['cta_secondary_url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-slate-200 hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($args['cta_secondary_text']); ?>
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <a href="<?php echo esc_url($args['doc_url']); ?>">
                    <div class="rounded-lg border bg-card text-card-foreground flex items-center justify-between gap-2 px-6 py-4 shadow-none hover:bg-slate-200">
                        <div class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file size-4">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            </svg>
                            <div>
                                <h5 class="mb-2 font-medium leading-4"><?php echo esc_html($args['doc_title']); ?></h5>
                                <p class="text-sm text-muted-foreground"><?php echo esc_html($args['doc_description']); ?></p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right size-6">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>
                <a href="<?php echo esc_url($args['guide_url']); ?>">
                    <div class="rounded-lg border bg-card text-card-foreground flex items-center justify-between gap-2 px-6 py-4 shadow-none hover:bg-slate-200">
                        <div class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book size-4">
                                <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"></path>
                            </svg>
                            <div>
                                <h5 class="mb-2 font-medium leading-4"><?php echo esc_html($args['guide_title']); ?></h5>
                                <p class="text-sm text-muted-foreground"><?php echo esc_html($args['guide_description']); ?></p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right size-6">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
