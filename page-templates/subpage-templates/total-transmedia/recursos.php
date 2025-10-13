<?php
/**
 * Template Name: Total Transmedia - Recursos
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-blue-600 text-white">
  <!-- Hero Section -->
  <section class="py-16 md:py-24 bg-blue-50">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center px-4 text-center lg:items-start lg:text-left">
          <p class="text-blue-600 font-semibold mb-4"><?php echo esc_html(get_field('tt_recursos_subtitle')); ?></p>
          <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-blue-900"><?php echo esc_html(get_field('tt_recursos_title')); ?></h1>
          <p class="mb-8 max-w-xl text-blue-900 lg:text-xl">
            <?php echo esc_html(get_field('tt_recursos_description')); ?>
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <?php if ($primary_cta = get_field('tt_recursos_primary_cta')) : ?>
            <a href="<?php echo esc_url($primary_cta['url']); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
              </svg>
              <?php echo esc_html($primary_cta['text']); ?>
            </a>
            <?php endif; ?>
            <?php if ($secondary_cta = get_field('tt_recursos_secondary_cta')) : ?>
            <a href="<?php echo esc_url($secondary_cta['url']); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
              <?php echo esc_html($secondary_cta['text']); ?>
            </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="relative">
          <?php 
          $image = get_field('tt_recursos_image');
          $image_alt = get_field('tt_recursos_image_alt');
          $image_url = $image ? $image['url'] : 'https://placehold.co/800x600/1f3a8a/bfdbfe?text=Centro+de+Recursos';
          ?>
          <img src="<?php echo esc_url($image_url); ?>" 
               alt="<?php echo esc_attr($image_alt); ?>" 
               class="w-full rounded-lg shadow-xl" 
               onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Centro+de+Recursos'">
        </div>
      </div>
    </div>
  </section>

  <!-- Content sections will be added in subsequent edits -->

</main>

<?php
get_footer();
