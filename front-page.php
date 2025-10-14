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
	<?php get_template_part('template-parts/frontpage-hero'); ?>

	<section class="container py-32" style="margin-top: -8rem;">
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
