<?php
/**
 * Template Name: Contacto
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $header = get_field('page_header') ?: array();
    get_template_part('template-parts/page-header', null, array(
        'title' => isset($header['title']) ? $header['title'] : 'Contacto',
        'subtitle' => isset($header['subtitle']) ? $header['subtitle'] : 'Estamos aquí para ayudarte. Ponte en contacto con nosotros.',
        'show_cta' => isset($header['show_cta']) ? $header['show_cta'] : false,
        'cta_text' => isset($header['cta_text']) ? $header['cta_text'] : '',
        'cta_url' => isset($header['cta_url']) ? $header['cta_url'] : '#',
        'show_credit_card_text' => isset($header['show_credit_card_text']) ? $header['show_credit_card_text'] : false,
        'credit_card_text' => isset($header['credit_card_text']) ? $header['credit_card_text'] : ''
    ));
    ?>
    
    <section class="relative py-32">
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(ellipse_35%_15%_at_40%_55%,hsl(var(--accent))_0%,transparent_100%)] lg:bg-[radial-gradient(ellipse_12%_20%_at_60%_45%,hsl(var(--accent))_0%,transparent_100%)]"></div>
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(ellipse_35%_20%_at_70%_75%,hsl(var(--accent))_0%,transparent_80%)] lg:bg-[radial-gradient(ellipse_15%_30%_at_70%_65%,hsl(var(--accent))_0%,transparent_80%)]"></div>
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(hsl(var(--accent-foreground)/0.1)_1px,transparent_1px)] bg-size-[8px_8px] mask-[radial-gradient(ellipse_60%_60%_at_65%_50%,#000_0%,transparent_80%)]"></div>
        <div class="container grid w-full grid-cols-1 gap-x-32 overflow-hidden lg:grid-cols-2">
            <div class="w-full pb-10 md:space-y-10 md:pb-0">
                <?php $info_session = get_field('info_session') ?: array(); ?>
                <div class="space-y-4 md:max-w-160">
                    <h1 class="text-4xl font-medium lg:text-5xl"><?php echo esc_html($info_session['title'] ?? 'Solicita una sesión informativa'); ?></h1>
                    <div class="text-muted-foreground md:text-base lg:text-lg lg:leading-7"><?php echo esc_html($info_session['description'] ?? 'Programa nacional de educomunicación y alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz.'); ?></div>
                </div>
                <div class="hidden md:block">
                    <div class="space-y-16 pb-20 lg:pb-0">
                        <div class="space-y-6">
                            <?php if (!empty($info_session['avatars'])): ?>
                            <div class="mt-16 flex overflow-hidden">
                                <?php foreach ($info_session['avatars'] as $index => $avatar):
                                    $avatar_url = '';
                                    if (isset($avatar['image']) && is_array($avatar['image']) && !empty($avatar['image']['url'])) {
                                        $avatar_url = $avatar['image']['url'];
                                    }
                                    if (!empty($avatar_url)):
                                ?>
                                <span class="relative flex shrink-0 overflow-hidden rounded-full <?php echo $index > 0 ? '-ml-4' : ''; ?> size-11">
                                    <img class="aspect-square h-full w-full" src="<?php echo esc_url($avatar_url); ?>">
                                </span>
                                <?php
                                    endif;
                                endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="space-y-4">
                                <p class="text-sm font-semibold"><?php echo esc_html($info_session['features_title'] ?? 'Lo que incluye el programa:'); ?></p>
                                <?php if (!empty($info_session['features'])): 
                                    foreach ($info_session['features'] as $feature): ?>
                                <div class="flex items-center space-x-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-5 shrink-0 text-muted-foreground">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                    <p class="text-sm"><?php echo esc_html($feature['text']); ?></p>
                                </div>
                                <?php endforeach; 
                                endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($info_session['logos'])): ?>
                        <div class="flex items-center space-x-12">
                            <?php foreach ($info_session['logos'] as $logo):
                                $logo_url = '';
                                if (isset($logo['image']) && is_array($logo['image']) && !empty($logo['image']['url'])) {
                                    $logo_url = $logo['image']['url'];
                                }
                                $logo_alt = isset($logo['alt']) ? $logo['alt'] : '';
                                if (!empty($logo_url)):
                            ?>
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>" class="h-12">
                            <?php
                                endif;
                            endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-center lg:mt-2.5">
                <div class="relative flex w-full min-w-80 max-w-120 flex-col items-center overflow-visible md:min-w-96">
                    <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 3 ) ); ?>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
