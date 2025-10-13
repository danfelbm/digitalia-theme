<?php
/**
 * Template Name: Módulos
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $header = get_field('modulos_header');
    get_template_part('template-parts/page-header', null, array(
        'title' => $header['title'],
        'subtitle' => $header['subtitle'],
        'show_cta' => false,
        'cta_text' => '',
        'cta_url' => '',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <section class="pb-32 pt-16">
        <div class="container relative">
            <div dir="ltr" data-orientation="horizontal">
                <!-- Tablist -->
                <div role="tablist" aria-orientation="horizontal" class="items-center justify-center rounded-md p-1 text-muted-foreground mb-4 grid h-auto grid-cols-2 gap-2 sm:grid-cols-3 md:flex lg:mb-6" tabindex="0" data-orientation="horizontal">
                    <!-- Digitalia Tab -->
                    <?php $digitalia = get_field('digitalia_module'); ?>
                    <button type="button" role="tab" aria-selected="true" aria-controls="radix-:r2R0:-content-digitalia" data-state="active" id="radix-:r2R0:-trigger-digitalia" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-gray-100 hover:bg-gray-200 active:bg-gray-300" style="color: #1a1a1a;" tabindex="0">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($digitalia['icon']); ?>" alt="Digitalia icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($digitalia['title']); ?></p>
                        </div>
                    </button>
                    <!-- Academia Tab -->
                    <?php $academia = get_field('academia_module'); ?>
                    <button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2R0:-content-academia" data-state="inactive" id="radix-:r2R0:-trigger-academia" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-yellow-100 hover:bg-yellow-200 active:bg-yellow-300" style="color: #713f12;" tabindex="-1">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($academia['icon']); ?>" alt="Academia icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($academia['title']); ?></p>
                        </div>
                    </button>
                    <!-- En Línea Tab -->
                    <?php $enlinea = get_field('enlinea_module'); ?>
                    <button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2R0:-content-enlinea" data-state="inactive" id="radix-:r2R0:-trigger-enlinea" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-red-100 hover:bg-red-200 active:bg-red-300" style="color: #7f1d1d;" tabindex="-1">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($enlinea['icon']); ?>" alt="En Línea icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($enlinea['title']); ?></p>
                        </div>
                    </button>
                    <!-- Total Transmedia Tab -->
                    <?php $transmedia = get_field('transmedia_module'); ?>
                    <button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2R0:-content-transmedia" data-state="inactive" id="radix-:r2R0:-trigger-transmedia" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-blue-100 hover:bg-blue-200 active:bg-blue-300" style="color: #1e3a8a;" tabindex="-1">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($transmedia['icon']); ?>" alt="Total Transmedia icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($transmedia['title']); ?></p>
                        </div>
                    </button>
                    <!-- Colaboratorios Tab -->
                    <?php $colaboratorios = get_field('colaboratorios_module'); ?>
                    <button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2R0:-content-colaboratorios" data-state="inactive" id="radix-:r2R0:-trigger-colaboratorios" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-teal-100 hover:bg-teal-200 active:bg-teal-300" style="color: #134e4a;" tabindex="-1">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($colaboratorios['icon']); ?>" alt="Colaboratorios icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($colaboratorios['title']); ?></p>
                        </div>
                    </button>
                    <!-- Ready Tab -->
                    <?php $ready = get_field('ready_module'); ?>
                    <button type="button" role="tab" aria-selected="false" aria-controls="radix-:r2R0:-content-ready" data-state="inactive" id="radix-:r2R0:-trigger-ready" class="text-sm font-medium transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 flex size-full flex-col items-start justify-start gap-1 whitespace-normal rounded-md p-3 text-left bg-purple-100 hover:bg-purple-200 active:bg-purple-300" style="color: #581c87;" tabindex="-1">
                        <div class="flex w-full flex-col items-center gap-4">
                            <img src="<?php echo esc_url($ready['icon']); ?>" alt="Ready icon" class="w-10 h-10">
                            <p class="text-sm font-semibold lg:text-base"><?php echo esc_html($ready['title']); ?></p>
                        </div>
                    </button>
                </div>

                <!-- Tabpanels -->
                <!-- Digitalia Panel -->
                <div data-state="active" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-digitalia" id="radix-:r2R0:-content-digitalia" tabindex="0" class="mt-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-gray-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($digitalia['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($digitalia['description']); ?></p>
                            <a href="<?php echo esc_url($digitalia['link']['url']); ?>" class="inline-block px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700"><?php echo esc_html($digitalia['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-gray-200">
                            <img src="/wp-content/uploads/2024/11/digitalia-high.png" alt="Digitalia" class="max-w-96 h-auto">
                        </div>
                    </div>
                </div>

                <!-- Academia Panel -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-academia" id="radix-:r2R0:-content-academia" tabindex="0" class="mt-2 bg-yellow-200" hidden>
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-yellow-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($academia['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($academia['description']); ?></p>
                            <a href="<?php echo esc_url($academia['link']['url']); ?>" class="inline-block px-6 py-3 bg-yellow-600 text-white rounded-md hover:bg-yellow-700"><?php echo esc_html($academia['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-yellow-100">
                            <?php
                            set_query_var('category_name', 'academia');
                            get_template_part('template-parts/module-posts-carousel');
                            ?>
                        </div>
                    </div>
                </div>

                <!-- En Línea Panel -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-enlinea" id="radix-:r2R0:-content-enlinea" tabindex="0" class="mt-2 bg-red-200" hidden>
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-red-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($enlinea['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($enlinea['description']); ?></p>
                            <a href="<?php echo esc_url($enlinea['link']['url']); ?>" class="inline-block px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700"><?php echo esc_html($enlinea['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-red-100">
                            <?php
                            set_query_var('category_name', 'en-linea');
                            get_template_part('template-parts/module-posts-carousel');
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Total Transmedia Panel -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-transmedia" id="radix-:r2R0:-content-transmedia" tabindex="0" class="mt-2 bg-blue-200" hidden>
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-blue-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($transmedia['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($transmedia['description']); ?></p>
                            <a href="<?php echo esc_url($transmedia['link']['url']); ?>" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700"><?php echo esc_html($transmedia['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-blue-100">
                            <?php
                            set_query_var('category_name', 'total-transmedia');
                            get_template_part('template-parts/module-posts-carousel');
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Colaboratorios Panel -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-colaboratorios" id="radix-:r2R0:-content-colaboratorios" tabindex="0" class="mt-2 bg-teal-200" hidden>
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-teal-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($colaboratorios['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($colaboratorios['description']); ?></p>
                            <a href="<?php echo esc_url($colaboratorios['link']['url']); ?>" class="inline-block px-6 py-3 bg-teal-600 text-white rounded-md hover:bg-teal-700"><?php echo esc_html($colaboratorios['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-teal-100">
                            <?php
                            set_query_var('category_name', 'colaboratorios');
                            get_template_part('template-parts/module-posts-carousel');
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Ready Panel -->
                <div data-state="inactive" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R0:-trigger-ready" id="radix-:r2R0:-content-ready" tabindex="0" class="mt-2 bg-purple-200" hidden>
                    <div class="grid grid-cols-1 md:grid-cols-16 gap-8">
                        <div class="md:col-span-4 p-8 text-purple-950">
                            <h2 class="text-3xl font-bold mb-4"><?php echo esc_html($ready['title']); ?></h2>
                            <p class="mb-6"><?php echo esc_html($ready['description']); ?></p>
                            <a href="<?php echo esc_url($ready['link']['url']); ?>" class="inline-block px-6 py-3 bg-purple-600 text-white rounded-md hover:bg-purple-700"><?php echo esc_html($ready['link']['title']); ?></a>
                        </div>
                        <div class="md:col-span-12 flex items-center justify-center p-8 bg-purple-100">
                            <?php
                            set_query_var('category_name', 'ready');
                            get_template_part('template-parts/module-posts-carousel');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
