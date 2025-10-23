<?php
/**
 * The front page template file
 *
 * This is the template that displays the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digitalia
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
	// Get hero type selection (default to globe)
	$hero_type = get_field('hero_type') ?: 'globe';

	if ($hero_type === 'globe'):
		// Get Globe Hero ACF fields with fallbacks
		$globe_title = get_field('globe_hero_title') ?: 'Educomunicación<br>para la paz';
		$globe_description = get_field('globe_hero_description') ?: 'Digital-IA es un novedoso ecosistema público de Educomunicación destinado a crear y fortalecer capacidades, habilidades y competencias ciudadanas de cara a los nuevos desafíos de la desinformación.';
		$globe_primary_btn = get_field('globe_hero_primary_button');
		$globe_secondary_btn = get_field('globe_hero_secondary_button');
		$globe_features = get_field('globe_hero_features');

		// Set default values if fields are empty
		if (!$globe_primary_btn || empty($globe_primary_btn['text'])) {
			$globe_primary_btn = array('text' => 'Más información', 'url' => '#mas-digitalia');
		}
		if (!$globe_secondary_btn || empty($globe_secondary_btn['text'])) {
			$globe_secondary_btn = array('text' => 'Ir al Campus virtual', 'url' => 'https://digitalia.gov.co/campus/');
		}
		if (!$globe_features || empty($globe_features)) {
			$globe_features = array(
				array('title' => 'Aprendizaje Acelerado', 'description' => 'Aprende habilidades digitales 10x más rápido.'),
				array('title' => 'Certificación Gratuita', 'description' => 'Obtén certificados reconocidos sin costo.'),
				array('title' => '5 Módulos Especializados', 'description' => 'Academia, En Línea, Colaboratorios, Total Transmedia, READY.')
			);
		}
	?>
	<!-- Globe Hero Section -->
	<section class="relative w-full flex flex-col lg:block lg:h-screen overflow-x-hidden" style="background-color: #040d21;">

		<!-- Texto - arriba en mobile, absolute overlay en desktop -->
		<div class="container relative z-10 px-4 pt-5 pb-0 lg:absolute lg:inset-x-0 lg:top-1/2 lg:-translate-y-1/2 lg:-mt-[50px] lg:pt-0" style="pointer-events: none;">
			<div class="max-w-2xl space-y-6 text-white" style="pointer-events: auto;">
				<h1 class="text-3xl font-bold leading-tight text-white md:text-5xl lg:text-6xl">
					<?php echo $globe_title; ?>
				</h1>
				<p class="text-lg text-gray-300">
					<?php echo esc_html($globe_description); ?>
				</p>
				<div class="flex gap-3">
					<a href="<?php echo esc_url($globe_primary_btn['url']); ?>" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3 text-sm font-medium text-black transition hover:bg-gray-200">
						<?php echo esc_html($globe_primary_btn['text']); ?>
					</a>
					<a href="<?php echo esc_url($globe_secondary_btn['url']); ?>" class="inline-flex items-center justify-center gap-2 rounded-full border-2 border-white px-6 py-3 text-sm font-medium text-white transition hover:bg-white hover:text-black">
						<?php echo esc_html($globe_secondary_btn['text']); ?>
					</a>
				</div>
				<ul class="space-y-3 pt-6">
					<li class="mb-3">
						<p class="text-sm font-semibold tracking-tight text-gray-400">Cómo te ayudamos a crecer</p>
					</li>
					<?php foreach ($globe_features as $feature): ?>
					<li class="flex gap-3 items-start">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check flex-shrink-0 text-white mt-0.5"><path d="M20 6 9 17l-5-5"></path></svg>
						<p class="text-sm font-medium text-white"><?php echo esc_html($feature['title']); ?><span class="block text-gray-400"><?php echo esc_html($feature['description']); ?></span></p>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>

		<!-- Globo - abajo en mobile, absolute con offset en desktop -->
		<div class="h-[500px] lg:absolute lg:inset-0 lg:h-full w-full">
			<div class="globe-canvas-offset h-full" style="position: relative;">
				<?php get_template_part('template-parts/globe-hero'); ?>
			</div>
		</div>

	</section>

	<style>
	/* Desktop: offset canvas 440px to the right */
	@media (min-width: 1024px) {
		.globe-canvas-offset {
			left: 440px;
		}
	}
	</style>
	<?php else: ?>
	<?php get_template_part('template-parts/frontpage-hero'); ?>
	<?php endif; ?>

	<?php
	// Get courses section data
	$courses_bg_color = get_field('courses_background_color') ?: '#010819';
	$courses_header = get_field('courses_header');
	$courses_items = get_field('courses_items');

	// Set default header values if fields are empty
	if (!$courses_header || empty($courses_header['badge'])) {
		$courses_header = array(
			'badge' => 'Cursos Digitalia',
			'title' => 'Formación para la Paz',
			'description' => 'Tres rutas de aprendizaje diseñadas para enfrentar los desafíos de la desinformación y fortalecer capacidades ciudadanas.'
		);
	}

	// Set default courses if repeater is empty
	if (!$courses_items || empty($courses_items)) {
		$courses_items = array(
			array(
				'title' => 'Crossmedia + AMI + IA',
				'description' => 'Crea universos narrativos con IA y enfoque de Alfabetización Mediática Informacional para combatir la desinformación.',
				'badge' => 'Nuevo',
				'url' => 'https://digitalia.gov.co/crossmedia',
				'button_text' => 'Explorar curso',
				'color' => 'blue',
				'icon_svg' => '<rect x="16" y="16" width="6" height="6" rx="1"></rect><rect x="2" y="16" width="6" height="6" rx="1"></rect><rect x="9" y="2" width="6" height="6" rx="1"></rect><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"></path><path d="M12 12V8"></path>'
			),
			array(
				'title' => 'Multimedia + Sostenibilidad',
				'description' => 'Genera contenido de alta calidad con herramientas libres para los desafíos ciudadanos y la paz mediática.',
				'badge' => '',
				'url' => 'https://digitalia.gov.co/multimedia',
				'button_text' => 'Explorar curso',
				'color' => 'teal',
				'icon_svg' => '<path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"></path><path d="m6.2 5.3 3.1 3.9"></path><path d="m12.4 3.4 3.1 4"></path><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path>'
			),
			array(
				'title' => 'Transmedia',
				'description' => 'Revoluciona la narración llevando historias a múltiples plataformas donde la audiencia interactúa y es parte del relato.',
				'badge' => '',
				'url' => 'https://digitalia.gov.co/transmedia',
				'button_text' => 'Explorar curso',
				'color' => 'purple',
				'icon_svg' => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path><path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path>'
			)
		);
	}
	?>

	<!-- Sección de Cursos -->
	<section id="cursos" class="text-white overflow-hidden py-32" style="background-color: <?php echo esc_attr($courses_bg_color); ?>;">
		<div class="container flex w-full flex-col items-center justify-center px-4">
			<p class="bg-white/10 mb-4 rounded-full px-2 py-1 text-xs uppercase tracking-wide text-white"><?php echo esc_html($courses_header['badge']); ?></p>
			<h2 class="relative py-2 text-center font-sans text-5xl font-semibold tracking-tighter lg:text-6xl text-white"><?php echo esc_html($courses_header['title']); ?></h2>
			<p class="text-md mx-auto mt-5 max-w-xl px-5 text-center lg:text-lg text-gray-300"><?php echo esc_html($courses_header['description']); ?></p>

			<div class="mt-10 grid w-full max-w-5xl grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">

				<?php foreach ($courses_items as $course): ?>
				<!-- Curso: <?php echo esc_html($course['title']); ?> -->
				<div class="bg-gray-900/60 flex flex-col rounded-3xl p-4">
					<div class="bg-gradient-to-br from-<?php echo esc_attr($course['color']); ?>-500 to-<?php echo esc_attr($course['color']); ?>-700 p-4 max-w-md w-full rounded-xl h-48 flex items-center justify-center overflow-hidden relative">
						<?php if (!empty($course['icon_svg'])): ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="opacity-20 absolute">
							<?php echo $course['icon_svg']; ?>
						</svg>
						<?php endif; ?>
					</div>
					<div class="mt-3 flex items-center justify-start gap-3">
						<h3 class="text-2xl font-semibold tracking-tighter text-white"><?php echo esc_html($course['title']); ?></h3>
						<?php if (!empty($course['badge'])): ?>
						<span class="bg-<?php echo esc_attr($course['color']); ?>-500/20 text-<?php echo esc_attr($course['color']); ?>-300 inline-block rounded-xl px-3 text-sm"><?php echo esc_html($course['badge']); ?></span>
						<?php endif; ?>
					</div>
					<p class="text-gray-400 mt-2 text-sm"><?php echo esc_html($course['description']); ?></p>
					<div class="mt-5 flex items-center justify-between">
						<a href="<?php echo esc_url($course['url']); ?>" class="bg-white/10 hover:bg-<?php echo esc_attr($course['color']); ?>-500 hover:text-white transition-colors flex h-full items-center justify-center gap-2 rounded-full px-7 py-2 text-sm text-white">
							<?php echo esc_html($course['button_text']); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
								<path d="M5 12h14"></path>
								<path d="m12 5 7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>

	<!--style="margin-top: -8rem;" -->
	<section id="mas-digitalia" class="container py-32">
	<div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-3 md:grid-rows-3">
		<?php if (have_rows('modules')) : ?>
		<?php while (have_rows('modules')) : the_row(); ?>
			<?php
			$color = get_sub_field('color');
			$title = get_sub_field('title');
			$description = get_sub_field('description');
			$link = get_sub_field('link');
			$icon = get_sub_field('icon');
			?>
			<a href="<?php echo esc_url($link); ?>" class="flex w-full cursor-pointer flex-col rounded-lg bg-<?php echo esc_attr($color); ?>-200 p-5 lg:p-8 group">
			<h3 class="mb-2 w-fit border-b-2 border-solid border-transparent text-xl font-semibold transition text-<?php echo esc_attr($color); ?>-950 lg:text-2xl group-hover:!border-<?php echo esc_attr($color); ?>-500/90"><?php echo esc_html($title); ?></h3>
			<p class="mb-4 text-sm text-<?php echo esc_attr($color); ?>-800 lg:text-base"><?php echo esc_html($description); ?></p>
			<div class="mt-auto flex items-end justify-between">
				<div>
				<?php if ($icon) : ?>
					<img src="<?php echo esc_url($icon); ?>" alt="" class="size-8 text-<?php echo esc_attr($color); ?>-500 md:size-12" />
				<?php endif; ?>
				</div>
				<svg type="right-chevron" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-7 h-fit text-<?php echo esc_attr($color); ?>-950 transition group-hover:size-7 group-hover:translate-x-2 group-hover:transform">
				<path d="M5 12h14"></path>
				<path d="m12 5 7 7-7 7"></path>
				</svg>
			</div>
			</a>
		<?php endwhile; ?>
		<?php endif; ?>

		<?php if ($featured = get_field('featured_module')) : ?>
		<div class="flex w-full grow flex-col gap-4 rounded-lg bg-black p-5 md:col-span-2 md:col-start-2 md:row-span-2 md:row-start-2 lg:p-8">
			<div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center md:gap-2">
			<h3 class="max-w-[80%] text-2xl font-bold text-white md:max-w-[60%] lg:text-4xl"><?php echo esc_html($featured['title']); ?></h3>
			<a href="<?php echo esc_url($featured['button_link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black hover:bg-white/90 h-11 rounded-md px-8 w-full md:w-auto">
				<?php echo esc_html($featured['button_text']); ?>
			</a>
			</div>
			<?php if ($featured['media_type'] === 'video' && $featured['video']) : ?>
			<video src="<?php echo esc_url($featured['video']); ?>" controls loop playsinline class="aspect-square h-full w-full rounded-lg object-cover md:aspect-[3] js-scroll-video" data-video-autoplay="false"></video>
			<?php elseif ($featured['media_type'] === 'image' && $featured['image']) : ?>
			<img src="<?php echo esc_url($featured['image']); ?>" alt="Digital·IA" class="aspect-square h-full w-full rounded-lg object-cover md:aspect-[3]">
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>
	</section>

	<div class="max-w-(--breakpoint-xl) px-8 py-10 sm:px-6 lg:px-8 lg:py-32 mx-auto" style="margin-top: -8rem;">
	<div class="grid md:grid-cols-2 gap-12">
		<?php if ($vision = get_field('vision_section')) : 
			$vision_title = $vision['title'];
			$vision_description = $vision['description'];
			$vision_features = $vision['features'];
		?>
		<div>
			<div class="grid gap-12">
			<div>
				<h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
				<?php echo esc_html($vision_title); ?>
				</h2>
				<p class="mt-3 text-gray-600">
				<?php echo esc_html($vision_description); ?>
				</p>
			</div>

			<div class="space-y-6 lg:space-y-10">
				<?php if ($vision_features) : ?>
				<?php foreach ($vision_features as $feature) : ?>
					<div class="flex gap-x-5 sm:gap-x-8">
					<i class="fa <?php echo esc_attr($feature['icon']); ?> shrink-0 mt-2 size-6 text-gray-800"></i>
					<div class="grow">
						<h3 class="text-base sm:text-lg font-semibold text-gray-800">
						<?php echo esc_html($feature['title']); ?>
						</h3>
						<p class="mt-1 text-gray-600">
						<?php echo esc_html($feature['description']); ?>
						</p>
					</div>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($commitment = get_field('commitment_section')) : 
			$commitment_title = $commitment['title'];
			$commitment_description = $commitment['description'];
			$commitment_features = $commitment['features'];
		?>
		<div>
			<div class="grid gap-12">
			<div>
				<h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
				<?php echo esc_html($commitment_title); ?>
				</h2>
				<p class="mt-3 text-gray-600">
				<?php echo esc_html($commitment_description); ?>
				</p>
			</div>

			<div class="space-y-6 lg:space-y-10">
				<?php if ($commitment_features) : ?>
				<?php foreach ($commitment_features as $feature) : ?>
					<div class="flex gap-x-5 sm:gap-x-8">
					<i class="fa <?php echo esc_attr($feature['icon']); ?> shrink-0 mt-2 size-6 text-gray-800"></i>
					<div class="grow">
						<h3 class="text-base sm:text-lg font-semibold text-gray-800">
						<?php echo esc_html($feature['title']); ?>
						</h3>
						<p class="mt-1 text-gray-600">
						<?php echo esc_html($feature['description']); ?>
						</p>
					</div>
					</div>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
	</div>

	<?php
		$header = get_field('modules_details_header');
		$modules = get_field('modules_details_items');
	?>

	<section class="w-full bg-slate-50 py-32">
		<div class="container mx-auto px-4 md:px-6">
			<div class="grid gap-4 px-4 md:px-6 max-w-7xl mx-auto">
				<?php if ($header) : ?>
					<h2 class="mb-2 text-balance text-center text-3xl font-semibold lg:text-5xl"><?php echo esc_html($header['title']); ?></h2>
					<p class="text-center text-muted-foreground lg:text-lg"><?php echo esc_html($header['description']); ?></p>
					<?php if ($header['button']) : ?>
						<a href="<?php echo esc_url($header['button']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-6">
							<?php echo esc_html($header['button']['text']); ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-4"><path d="m9 18 6-6-6-6"></path></svg>
						</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="grid gap-8 mt-8 max-w-7xl mx-auto">
				<?php if ($modules) : ?>
					<?php foreach ($modules as $module) : ?>
						<div class="group relative rounded-lg bg-<?php echo esc_html($module['color']); ?>-100 transition-transform hover:scale-[1.02]">
							<a href="<?php echo esc_url($module['url']); ?>" class="flex flex-col lg:flex-row h-full">
								<div class="flex flex-col justify-between p-8 lg:p-12 lg:w-1/2">
									<div>
										<div class="mb-4 text-xs text-<?php echo esc_html($module['color']); ?>-600">MÓDULO <?php echo esc_html($module['module_number']); ?></div>
										<h3 class="mb-2 text-xl font-medium lg:text-2xl text-<?php echo esc_html($module['color']); ?>-700"><?php echo esc_html($module['title']); ?></h3>
										<p class="text-sm text-<?php echo esc_html($module['color']); ?>-600 lg:text-base"><?php echo esc_html($module['description']); ?></p>
									</div>
									<div class="mt-6 sm:mt-8">
										<button class="inline-flex items-center justify-center text-sm font-medium transition-colors bg-<?php echo esc_html($module['color']); ?>-500 text-white hover:bg-<?php echo esc_html($module['color']); ?>-600 h-9 rounded-md px-4"><?php echo esc_html($module['button_text']); ?><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-4"><path d="m9 18 6-6-6-6"></path></svg></button>
									</div>
								</div>
								<div class="order-first lg:w-1/2 aspect-video sm:order-last sm:aspect-auto flex items-center justify-center bg-<?php echo esc_html($module['color']); ?>-200 border-b border-<?php echo esc_html($module['color']); ?>-300 lg:border-b-0 lg:border-l lg:h-full">
									<?php if ($module['image']) : ?>
										<img src="<?php echo esc_url($module['image']); ?>" alt="<?php echo esc_attr($module['title']); ?>" class="w-24 h-24">
									<?php endif; ?>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
		
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

	</main><!-- #main -->

	<section class="py-32">
		<div class="container">
			<div class="flex items-center justify-center rounded-2xl border bg-cover bg-center px-8 py-20 text-center md:p-20" style="background-image: url('<?php echo get_field('intro_background') ?: 'https://www.shadcnblocks.com/images/block/circles.svg'; ?>">
				<div class="mx-auto max-w-(--breakpoint-md)">
					<h1 class="mb-4 text-balance text-3xl font-semibold md:text-5xl"><?php echo get_field('intro_title'); ?></h1>
					<p class="text-muted-foreground md:text-lg"><?php echo get_field('intro_description'); ?></p>
					<div class="mt-11 flex flex-col justify-center gap-2 sm:flex-row">
						<?php if ($primary_button = get_field('intro_primary_button')): ?>
						<a href="<?php echo esc_url($primary_button['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">
							<?php echo esc_html($primary_button['text']); ?>
						</a>
						<?php endif; ?>
						<?php if ($secondary_button = get_field('intro_secondary_button')): ?>
						<a href="<?php echo esc_url($secondary_button['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">
							<?php echo esc_html($secondary_button['text']); ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
