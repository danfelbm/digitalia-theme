<?php
/**
 * Template Name: En línea landing
 * Description: Página landing con case studies para el módulo En Línea
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Get case studies from ACF repeater
    $case_studies = get_field('case_studies');

    if ($case_studies && is_array($case_studies)) :
        $count = count($case_studies);

        // Determine grid classes based on number of cards
        $grid_class = 'md:grid-cols-2'; // Default for 2 cards
        if ($count === 3) {
            $grid_class = 'md:grid-cols-2 lg:grid-cols-3';
        } elseif ($count >= 4) {
            $grid_class = 'md:grid-cols-2 lg:grid-cols-4';
        }

        // Determine max-width class: only apply max-w for 3+ cards
        $card_max_width_class = ($count === 2) ? '' : 'md:max-w-[30rem]';
    ?>

    <style>
        #modulos-nav,
        #secondary-nav-mobile {
            display: none;
        }
    </style>

    <section class="py-32">
        <div class="container">
            <div class="grid gap-5 <?php echo esc_attr($grid_class); ?>">

                <?php foreach ($case_studies as $case_study) :
                    $is_active = isset($case_study['is_active']) ? $case_study['is_active'] : true;
                    $background_image = $case_study['background_image'];
                    $title = $case_study['title'];
                    $statistic_number = $case_study['statistic_number'];
                    $statistic_description = $case_study['statistic_description'];
                    $button_text = !empty($case_study['button_text']) ? $case_study['button_text'] : 'Read Story';
                    $button_url = $case_study['button_url'];

                    // Get image URL - fallback to placeholder if not set
                    $bg_image_url = !empty($background_image['url']) ? $background_image['url'] : 'https://placehold.co/800x1200/dc2626/ffffff?text=En+Línea';

                    // Classes condicionales para cards inactivos
                    $inactive_classes = !$is_active ? 'grayscale opacity-60 cursor-default' : '';
                    $hover_classes = $is_active ? 'hover:before:bg-black/30' : '';

                    // Elemento: <a> si está activo, <div> si está inactivo
                    $tag = $is_active ? 'a' : 'div';
                    $href_attr = $is_active ? 'href="' . esc_url($button_url) . '"' : '';
                ?>

                <<?php echo $tag; ?> <?php echo $href_attr; ?>
                   style="background-image:url(<?php echo esc_url($bg_image_url); ?>)"
                   class="min-h-auto relative w-full overflow-hidden rounded-[.5rem] bg-black/80 bg-cover bg-center bg-no-repeat p-5 transition-all duration-300 before:absolute before:left-0 before:top-0 before:z-10 before:block before:size-full before:bg-black/50 before:transition-all before:duration-300 before:content-[] <?php echo esc_attr($hover_classes . ' ' . $inactive_classes); ?> sm:aspect-square md:aspect-auto md:min-h-[30rem] <?php echo esc_attr($card_max_width_class); ?>">

                    <div class="relative z-20 flex size-full flex-col justify-between gap-20 md:gap-16">

                        <div class="text-2xl font-normal leading-[1.2] text-white md:text-3xl">
                            <?php echo esc_html($title); ?>
                        </div>

                        <div class="flex w-full flex-col gap-8">
                            <div class="flex gap-8 text-white">
                                <div class="flex flex-col gap-1">
                                    <div class="text-[1.15rem] md:text-xl">
                                        <?php echo esc_html($statistic_number); ?>
                                    </div>
                                    <div class="text-sm opacity-80">
                                        <?php echo esc_html($statistic_description); ?>
                                    </div>
                                </div>
                            </div>

                            <button data-slot="button" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 w-fit">
                                <?php echo esc_html($button_text); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-3.5" aria-hidden="true">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </button>

                        </div>
                    </div>
                </<?php echo $tag; ?>>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <?php else : ?>

    <!-- Fallback cuando no hay case studies -->
    <section class="py-32">
        <div class="container">
            <div class="mx-auto max-w-2xl text-center">
                <div class="inline-flex items-center rounded-full border border-red-300 bg-red-50 px-4 py-1.5 text-sm text-red-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info mr-2 size-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 16v-4"></path>
                        <path d="M12 8h.01"></path>
                    </svg>
                    No hay case studies configurados
                </div>
                <h1 class="text-4xl font-bold text-red-950 mb-4">
                    En Línea Landing
                </h1>
                <p class="text-red-700 mb-8">
                    Para comenzar, edita esta página y agrega case studies desde el panel de administración.
                </p>
                <a href="<?php echo esc_url(get_edit_post_link()); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    Editar Página
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <?php endif; ?>

</main>

<?php
get_footer();
