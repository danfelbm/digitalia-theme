<?php
/**
 * Template Name: Social Media Kit
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $header_fields = get_field('page_header') ?: array();
    get_template_part('template-parts/subpage-header', null, array(
        'title' => isset($header_fields['title']) ? $header_fields['title'] : 'Social Media Kit',
        'subtitle' => isset($header_fields['subtitle']) ? $header_fields['subtitle'] : 'Colección de archivos para uso en redes sociales',
        'show_cta' => isset($header_fields['show_cta']) ? $header_fields['show_cta'] : true,
        'cta_text' => isset($header_fields['cta_text']) ? $header_fields['cta_text'] : 'Descargar',
        'cta_url' => isset($header_fields['cta_url']) ? $header_fields['cta_url'] : '#'
    ));
    ?>
    
    <section class="py-32">
        <div class="container max-w-7xl">
            <?php 
            $resources = get_field('resources_section') ?: array();
            $brand = isset($resources['brand_resources']) ? $resources['brand_resources'] : array();
            $social = isset($resources['social_templates']) ? $resources['social_templates'] : array();
            ?>
            <h2 class="text-3xl font-medium lg:text-4xl"><?php echo isset($resources['section_title']) ? $resources['section_title'] : 'Kit de Herramientas para Redes Sociales'; ?></h2>
            <div class="mt-20 grid gap-9 lg:grid-cols-2">
                <div class="flex flex-col justify-between rounded-lg bg-accent">
                    <div class="flex justify-between gap-10 border-b">
                        <div class="flex flex-col justify-between gap-14 py-6 pl-4 md:py-10 md:pl-8 lg:justify-normal">
                            <p class="text-xs text-muted-foreground"><?php echo isset($brand['badge']) ? $brand['badge'] : 'MARCA DIGITALIA'; ?></p>
                            <h3 class="text-2xl md:text-4xl"><?php echo isset($brand['title']) ? $brand['title'] : 'Recursos de marca Digitalia'; ?></h3>
                        </div>
                        <div class="md:1/3 w-2/5 shrink-0 rounded-r-lg border-l">
                            <img src="<?php echo isset($brand['image']) ? $brand['image'] : 'https://shadcnblocks.com/images/block/placeholder-1.svg'; ?>" alt="recursos de marca" class="h-full w-full object-cover">
                        </div>
                    </div>
                    <div class="p-4 text-muted-foreground md:p-8">
                        <?php echo isset($brand['description']) ? $brand['description'] : 'Descarga los recursos oficiales de la marca Digitalia, incluyendo logotipos, paleta de colores y guías de estilo para mantener una identidad visual consistente en tus comunicaciones.'; ?>
                        <?php if (isset($brand['cta'])) : ?>
                            <div class="mt-6">
                                <a href="<?php echo esc_url($brand['cta']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                                    <?php echo esc_html($brand['cta']['text']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="flex flex-col justify-between rounded-lg bg-accent">
                    <div class="flex justify-between gap-10 border-b">
                        <div class="flex flex-col justify-between gap-14 py-6 pl-4 md:py-10 md:pl-8 lg:justify-normal">
                            <p class="text-xs text-muted-foreground"><?php echo isset($social['badge']) ? $social['badge'] : 'KIT DE REDES SOCIALES'; ?></p>
                            <h3 class="text-2xl md:text-4xl"><?php echo isset($social['title']) ? $social['title'] : 'Plantillas para Redes Sociales'; ?></h3>
                        </div>
                        <div class="md:1/3 w-2/5 shrink-0 rounded-r-lg border-l">
                            <img src="<?php echo isset($social['image']) ? $social['image'] : 'https://shadcnblocks.com/images/block/placeholder-4.svg'; ?>" alt="plantillas sociales" class="h-full w-full object-cover">
                        </div>
                    </div>
                    <div class="p-4 text-muted-foreground md:p-8">
                        <?php echo isset($social['description']) ? $social['description'] : 'Accede a nuestro kit completo de plantillas y recursos para crear contenido atractivo en redes sociales alineado con la misión educomunicativa y de alfabetización mediática de Digitalia.'; ?>
                        <?php if (isset($social['cta'])) : ?>
                            <div class="mt-6">
                                <a href="<?php echo esc_url($social['cta']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                                    <?php echo esc_html($social['cta']['text']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                                        <path d="M5 12h14"></path>
                                        <path d="m12 5 7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-32">
        <div class="container">
            <?php 
            $social_links = get_field('social_media_links') ?: array();
            ?>
            <div class="gap grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <div class="mx-auto flex flex-col gap-4 md:col-span-2">
                    <div class="items-center rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex w-fit gap-1 px-2.5 py-1.5 text-sm">
                        <i class="fa-solid fa-share-nodes h-auto w-4"></i>Redes Sociales
                    </div>
                    <h2 class="text-3xl font-semibold lg:text-4xl"><?php echo isset($social_links['title']) ? $social_links['title'] : 'Conéctate con Digitalia en todas las redes'; ?></h2>
                    <p class="text-muted-foreground"><?php echo isset($social_links['description']) ? $social_links['description'] : 'Síguenos en nuestras redes sociales para mantenerte actualizado sobre educación digital y alfabetización mediática.'; ?></p>
                </div>

                <?php
                // Social Media Platforms Configuration
                $platforms = array(
                    'instagram' => array(
                        'color' => '#E1306C',
                        'icon' => 'fa-instagram',
                        'label' => 'Instagram',
                        'visit_text' => 'Visitar Instagram'
                    ),
                    'facebook' => array(
                        'color' => '#1877F2',
                        'icon' => 'fa-facebook',
                        'label' => 'Facebook',
                        'visit_text' => 'Visitar Facebook'
                    ),
                    'twitter' => array(
                        'color' => '#000000',
                        'icon' => 'fa-x-twitter',
                        'label' => 'X (Twitter)',
                        'visit_text' => 'Visitar X'
                    ),
                    'linkedin' => array(
                        'color' => '#0A66C2',
                        'icon' => 'fa-linkedin',
                        'label' => 'LinkedIn',
                        'visit_text' => 'Visitar LinkedIn'
                    ),
                    'youtube' => array(
                        'color' => '#FF0000',
                        'icon' => 'fa-youtube',
                        'label' => 'YouTube',
                        'visit_text' => 'Visitar YouTube'
                    ),
                    'tiktok' => array(
                        'color' => '#000000',
                        'icon' => 'fa-tiktok',
                        'label' => 'TikTok',
                        'visit_text' => 'Visitar TikTok'
                    ),
                    'spotify' => array(
                        'color' => '#1DB954',
                        'icon' => 'fa-spotify',
                        'label' => 'Spotify',
                        'visit_text' => 'Visitar Spotify'
                    ),
                    'flickr' => array(
                        'color' => '#0063DC',
                        'icon' => 'fa-flickr',
                        'label' => 'Flickr',
                        'visit_text' => 'Visitar Flickr'
                    ),
                    'pinterest' => array(
                        'color' => '#E60023',
                        'icon' => 'fa-pinterest',
                        'label' => 'Pinterest',
                        'visit_text' => 'Visitar Pinterest'
                    )
                );

                foreach ($platforms as $platform => $config) {
                    $platform_data = isset($social_links[$platform]) ? $social_links[$platform] : array();
                    if (isset($platform_data['active']) && $platform_data['active']) :
                        $url = isset($platform_data['url']) ? $platform_data['url'] : '#';
                        $description = isset($platform_data['description']) ? $platform_data['description'] : '';
                ?>
                <a href="<?php echo esc_url($url); ?>" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[<?php echo $config['color']; ?>]/5 hover:bg-[<?php echo $config['color']; ?>]/10" style="border-color: <?php echo $config['color']; ?>;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: <?php echo $config['color']; ?>">
                            <i class="fa-brands <?php echo $config['icon']; ?> text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: <?php echo $config['color']; ?>; border-color: <?php echo $config['color']; ?>">
                            <?php echo $config['visit_text']; ?><i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: <?php echo $config['color']; ?>"><?php echo $config['label']; ?></h3>
                        <p class="text-sm text-muted-foreground md:text-base"><?php echo $description; ?></p>
                    </div>
                </a>
                <?php 
                    endif;
                }
                ?>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
