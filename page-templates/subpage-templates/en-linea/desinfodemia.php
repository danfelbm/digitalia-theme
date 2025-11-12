<?php
/**
 * Template Name: Desinfodemia - En Línea
 * Template Post Type: page
 *
 * Página de episodio Desinfodemia para el módulo En Línea
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main bg-black">

  <?php
  // Hero Section con Video
  if ($hero = get_field('hero_desinfodemia')):
    $background_image = !empty($hero['background_image']) ? $hero['background_image']['url'] : '';
    $video_file = !empty($hero['video_file']) ? $hero['video_file']['url'] : '';
  ?>
    <section class="relative h-[60vh] w-full overflow-hidden bg-black">
      <!-- Video Player -->
      <?php if ($video_file): ?>
        <video
          class="absolute inset-0 w-full h-full object-contain"
          controls
          poster="<?php echo esc_url($background_image); ?>"
          preload="metadata"
        >
          <source src="<?php echo esc_url($video_file); ?>" type="video/mp4">
          Tu navegador no soporta el elemento de video.
        </video>
      <?php endif; ?>
    </section>
  <?php endif; ?>

  <?php
  // Gallery Section - Grid de 5 imágenes
  if ($gallery = get_field('gallery_desinfodemia')):
    $images = !empty($gallery['images']) ? $gallery['images'] : array();
  ?>
    <section class="py-16 md:py-24 bg-black">
      <div class="container mx-auto px-6">
        <?php if (!empty($images)): ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($images as $index => $image): ?>
              <div class="<?php echo ($index === 0) ? 'md:col-span-2 lg:col-span-2' : ''; ?> relative overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img
                  src="<?php echo esc_url($image['url']); ?>"
                  alt="<?php echo esc_attr($image['alt']); ?>"
                  class="w-full h-full object-cover <?php echo ($index === 0) ? 'h-96' : 'h-64'; ?>"
                  loading="lazy"
                >
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
  <?php endif; ?>

</main>

<?php
get_footer();
