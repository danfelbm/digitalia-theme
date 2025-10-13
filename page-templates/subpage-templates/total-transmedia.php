<?php

/**
 * Template Name: Módulo Total Transmedia
 *
 * @package Digitalia
 */
get_header();
?> 

<main id="primary" class="site-main">
  <section class="relative overflow-hidden py-32">
    <div class="absolute inset-0 overflow-hidden bg-blue-50">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 656" class="min-h-full min-w-full">
        <defs>
          <filter id="blur1" x="-20%" y="-20%" width="140%" height="140%">
            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
            <feGaussianBlur stdDeviation="180" result="effect1_foregroundBlur"></feGaussianBlur>
          </filter>
          <pattern id="innerGrid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5" stroke-opacity="0.6"></path>
          </pattern>
          <pattern id="grid" width="160" height="160" patternUnits="userSpaceOnUse">
            <rect width="160" height="160" fill="url(#innerGrid)"></rect>
            <path d="M 70 80 H 90 M 80 70 V 90" fill="none" stroke="white" stroke-width="1" stroke-opacity="0.3"></path>
          </pattern>
        </defs>
        <g filter="url(#blur1)">
          <rect width="1400" height="656" fill="#f8fafc"></rect>
          <rect x="0" y="0" width="1400" height="656" fill="rgb(37 99 235 / 0.1)"></rect>
          <g transform="translate(1400, 656)">
            <path d="M-623.2 0C-611 -116.2 -598.9 -232.4 -539.7 -311.6C-480.5 -390.8 -374.3 -433.1 -276.5 -478.9C-178.7 -524.7 -89.4 -573.9 0 -623.2L0 0Z" fill="white"></path>
          </g>
          <g transform="translate(0, 0)">
            <path d="M623.2 0C606.6 108.6 590.1 217.1 539.7 311.6C489.3 406.1 405.1 486.5 309.5 536.1C213.9 585.7 107 604.4 0 623.2L0 0Z" fill="white"></path>
          </g>
        </g>
        <rect width="1400" height="900" fill="url(#grid)"></rect>
      </svg>
    </div>
    <div class="container relative mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center text-center lg:items-start lg:text-left">
          <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl"><?php echo esc_html(get_field('hero')['title']); ?></h1>
          <p class="mb-8 max-w-xl text-blue-800 lg:text-xl"><?php echo esc_html(get_field('hero')['description']); ?></p>
          <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
            <a href="<?php echo esc_url(get_field('hero')['primary_cta']['url']); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              <i class="fa-solid fa-map-location-dot w-5 h-5 mr-2"></i> <?php echo esc_html(get_field('hero')['primary_cta']['text']); ?> </a>
            <a href="<?php echo esc_url(get_field('hero')['secondary_cta']['url']); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"> <?php echo esc_html(get_field('hero')['secondary_cta']['text']); ?> </a>
          </div>
        </div>
        <div class="-mb-48 flex justify-start gap-4 pt-4">
          <div class="absolute">
            <div class="flex scale-75 flex-col gap-12 pl-32 pt-8 sm:scale-100">
              <?php if (have_rows('hero')): while (have_rows('hero')): the_row();
                if (have_rows('features')): $counter = 0; ?>
                <?php while (have_rows('features')): the_row(); 
                  if ($counter % 2 == 0): ?>
                  <div class="flex gap-x-8 odd:pl-[calc(theme(spacing.32)+16px)]">
                  <?php endif; ?>
                    <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                      <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                        <i class="fa-solid fa-<?php echo esc_attr(get_sub_field('icon')); ?> text-blue-600 text-sm"></i>
                      </div>
                      <div>
                        <div class="mb-0.5 text-xs font-medium text-blue-900"><?php echo esc_html(get_sub_field('title')); ?></div>
                        <div class="text-xs font-normal text-blue-700"><?php echo esc_html(get_sub_field('description')); ?></div>
                      </div>
                    </div>
                  <?php if ($counter % 2 == 1 || $counter == count(get_field('hero')['features']) - 1): ?>
                  </div>
                  <?php endif;
                  $counter++;
                endwhile; ?>
              <?php endif;
              endwhile; endif; ?>
            </div>
          </div>
          <?php 
          $hero_image = get_field('hero')['hero_image'];
          if ($hero_image): ?>
            <img 
              src="<?php echo esc_url($hero_image['url']); ?>" 
              alt="<?php echo esc_attr($hero_image['alt']); ?>" 
              class="relative flex aspect-[3/6] w-[240px] object-contain object-top justify-center items-start rounded-lg border border-border sm:w-[300px]"
            >
          <?php else: ?>
            <div class="relative flex aspect-[3/6] w-[240px] object-contain object-top justify-center rounded-lg border border-border bg-background sm:w-[300px]"></div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section id="estrategia" class="py-32 bg-blue-200 text-blue-900" style="margin-top: -70px;">
    <div class="container">
      <div class="grid place-content-center gap-10 lg:grid-cols-2">
        <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
          <?php if ($strategy = get_field('strategy')): ?>
            <?php if ($strategy['badge']): ?>
              <div class="rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm border-blue-200 bg-blue-300">
                <i class="fa-solid fa-star h-auto w-4"></i> <?php echo esc_html($strategy['badge']); ?>
              </div>
            <?php endif; ?>

            <?php if ($strategy['title']): ?>
              <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl"><?php echo esc_html($strategy['title']); ?></h2>
            <?php endif; ?>

            <?php if ($strategy['description']): ?>
              <p class="text-center lg:text-left lg:text-lg"><?php echo esc_html($strategy['description']); ?></p>
            <?php endif; ?>

            <?php if ($strategy['cta_text'] && $strategy['cta_url']): ?>
              <a href="<?php echo esc_url($strategy['cta_url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-primary-foreground hover:bg-blue-500 h-11 rounded-md px-8">
                <?php echo esc_html($strategy['cta_text']); ?>
              </a>
            <?php endif; ?>

            <?php if ($stats = $strategy['stats']): ?>
              <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                <div class="flex justify-between gap-6">
                  <?php if ($stats['content']): ?>
                    <div class="mx-auto">
                      <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($stats['content']); ?></p>
                      <p>Contenidos</p>
                    </div>
                    <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-blue-400 w-[1px] h-auto"></div>
                  <?php endif; ?>

                  <?php if ($stats['departments']): ?>
                    <div class="mx-auto">
                      <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($stats['departments']); ?></p>
                      <p>Departamentos</p>
                    </div>
                  <?php endif; ?>
                </div>

                <?php if ($stats['platforms'] || $stats['levels']): ?>
                  <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-border bg-blue-400 w-[1px] hidden h-auto md:block"></div>
                  <div data-orientation="horizontal" role="none" class="shrink-0 bg-border bg-border bg-blue-400 h-[1px] w-full block md:hidden"></div>

                  <div class="flex justify-between gap-6">
                    <?php if ($stats['platforms']): ?>
                      <div class="mx-auto">
                        <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($stats['platforms']); ?></p>
                        <p>Plataformas</p>
                      </div>
                      <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-border bg-blue-400 w-[1px] h-auto"></div>
                    <?php endif; ?>

                    <?php if ($stats['levels']): ?>
                      <div class="mx-auto">
                        <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($stats['levels']); ?></p>
                        <p>Niveles</p>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>

        <?php if ($strategy['media']): 
          $mime_type = $strategy['media']['mime_type'];
          if (strpos($mime_type, 'video') !== false): ?>
            <video class="ml-auto max-h-[450px] w-full rounded-xl object-cover" controls muted loop>
              <source src="<?php echo esc_url($strategy['media']['url']); ?>" type="<?php echo esc_attr($mime_type); ?>">
              Your browser does not support the video tag.
            </video>
          <?php else: ?>
            <img 
              src="<?php echo esc_url($strategy['media']['url']); ?>" 
              alt="<?php echo esc_attr($strategy['media']['alt']); ?>" 
              class="ml-auto max-h-[450px] w-full rounded-xl object-cover"
            >
          <?php endif; ?>
        <?php endif; ?>
      </div>

      <?php if ($cards = $strategy['cards']): ?>
        <div class="mt-10 grid gap-6 md:grid-cols-3">
          <?php if ($cards['card1_title'] && $cards['card1_description']): ?>
            <div class="flex flex-col gap-4">
              <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
                <div class="flex flex-col items-center gap-2 lg:flex-row">
                  <i class="fa-solid fa-<?php echo esc_attr($cards['card1_icon']); ?> h-auto w-6"></i>
                  <h3 class="text-center text-lg font-medium lg:text-left"><?php echo esc_html($cards['card1_title']); ?></h3>
                </div>
                <p class="text-center text-sm md:text-base lg:text-left"><?php echo esc_html($cards['card1_description']); ?></p>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($cards['card2_title'] && $cards['card2_description']): ?>
            <div class="flex flex-col gap-4">
              <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
                <div class="flex flex-col items-center gap-2 lg:flex-row">
                  <i class="fa-solid fa-<?php echo esc_attr($cards['card2_icon']); ?> h-auto w-6"></i>
                  <h3 class="text-center text-lg font-medium lg:text-left"><?php echo esc_html($cards['card2_title']); ?></h3>
                </div>
                <p class="text-center text-sm md:text-base lg:text-left"><?php echo esc_html($cards['card2_description']); ?></p>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($cards['card3_title'] && $cards['card3_description']): ?>
            <div class="flex flex-col gap-4">
              <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
                <div class="flex flex-col items-center gap-2 lg:flex-row">
                  <i class="fa-solid fa-<?php echo esc_attr($cards['card3_icon']); ?> h-auto w-6"></i>
                  <h3 class="text-center text-lg font-medium lg:text-left"><?php echo esc_html($cards['card3_title']); ?></h3>
                </div>
                <p class="text-center text-sm md:text-base lg:text-left"><?php echo esc_html($cards['card3_description']); ?></p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <section class="py-32 bg-blue-300" id="canales">
    <?php if ($channels = get_field('channels')): ?>
      <div class="container mx-auto px-4">
        <?php if ($channels['title']): ?>
          <h2 class="mb-4 text-2xl font-semibold lg:text-4xl text-blue-900"><?php echo esc_html($channels['title']); ?></h2>
        <?php endif; ?>

        <?php if ($channels['description']): ?>
          <p class="text-blue-900 lg:text-lg"><?php echo esc_html($channels['description']); ?></p>
        <?php endif; ?>

        <?php if ($grid = $channels['grid']): ?>
          <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
            <?php
            // Define the grid items
            $grid_items = array(
              array('title' => $grid['social_title'], 'description' => $grid['social_description'], 'image' => $grid['social_image']),
              array('title' => $grid['traditional_title'], 'description' => $grid['traditional_description'], 'image' => $grid['traditional_image']),
              array('title' => $grid['digital_title'], 'description' => $grid['digital_description'], 'image' => $grid['digital_image']),
              array('title' => $grid['email_title'], 'description' => $grid['email_description'], 'image' => $grid['email_image']),
              array('title' => $grid['apps_title'], 'description' => $grid['apps_description'], 'image' => $grid['apps_image']),
              array('title' => $grid['events_title'], 'description' => $grid['events_description'], 'image' => $grid['events_image'])
            );

            // Loop through grid items
            foreach ($grid_items as $item):
              if ($item['title'] && $item['description']): ?>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                  <?php if ($item['image']): ?>
                    <img 
                      src="<?php echo esc_url($item['image']['url']); ?>" 
                      alt="<?php echo esc_attr($item['image']['alt']); ?>" 
                      class="w-14 h-14 object-cover rounded-lg"
                    >
                  <?php else: ?>
                    <img 
                      src="https://placehold.co/100x100/1f3a8a/bfdbfe" 
                      alt="<?php echo esc_attr($item['title']); ?>" 
                      class="w-14 h-14 object-cover rounded-lg"
                    >
                  <?php endif; ?>
                  <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900"><?php echo esc_html($item['title']); ?></h3>
                  <p class="text-sm text-blue-900"><?php echo esc_html($item['description']); ?></p>
                </div>
              <?php endif;
            endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </section>
  <section class="py-32 bg-blue-100" id="equipo">
    <?php if ($team_intro = get_field('team_intro')): ?>
      <div class="container flex flex-col items-center">
        <?php if ($team_intro['badge']): ?>
          <p class="semibold"><?php echo esc_html($team_intro['badge']); ?></p>
        <?php endif; ?>

        <?php if ($team_intro['title']): ?>
          <h2 class="my-6 text-pretty text-2xl font-bold lg:text-4xl"><?php echo esc_html($team_intro['title']); ?></h2>
        <?php endif; ?>

        <?php if ($team_intro['description']): ?>
          <p class="mb-8 max-w-3xl lg:text-xl"><?php echo esc_html($team_intro['description']); ?></p>
        <?php endif; ?>

        <?php if ($buttons = $team_intro['buttons']): ?>
          <div class="flex w-full flex-col justify-center gap-2 sm:flex-row">
            <?php if ($buttons['join_text'] && $buttons['join_url']): ?>
              <a 
                href="<?php echo esc_url($buttons['join_url']); ?>" 
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto"
              >
                <?php echo esc_html($buttons['join_text']); ?>
              </a>
            <?php endif; ?>

            <?php if ($buttons['contact_text'] && $buttons['contact_url']): ?>
              <a 
                href="<?php echo esc_url($buttons['contact_url']); ?>" 
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-primary-foreground hover:bg-blue-500 h-10 px-4 py-2 w-full sm:w-auto"
              >
                <?php echo esc_html($buttons['contact_text']); ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <div class="container mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> <?php
                $users = get_users();

                foreach ($users as $user) {
                  $equipo = get_field('equipo', 'user_' . $user->ID);
                  if ($equipo === 'total-transmedia') {
                    $name = $user->display_name;
                    $avatar = get_avatar_url($user->ID, array('size' => 200));
                    $frase = get_field('frase', 'user_' . $user->ID);
                    $rol = get_field('rol', 'user_' . $user->ID);
                    ?> <div class="flex flex-col items-center bg-blue-300 p-8 text-blue-900 border border-blue-600">
        <span class="relative flex shrink-0 overflow-hidden rounded-full mb-4 size-20 md:mb-5 lg:size-24">
          <img class="aspect-square h-full w-full" src="
													<?php echo esc_url($avatar); ?>" alt="
													<?php echo esc_attr($name); ?>">
        </span>
        <div class="text-center">
          <h3 class="mb-1 font-semibold">
            <a href="
															<?php echo esc_url(get_author_posts_url($user->ID)); ?>" class="hover:text-blue-600 hover:underline transition-colors"> <?php echo esc_html($name); ?> </a>
          </h3> <?php if ($rol): ?> <p class="text-sm"> <?php echo esc_html($rol); ?> </p> <?php endif; ?> <?php if ($frase): ?> <p class="mt-4 text-sm"> <?php echo esc_html($frase); ?> </p> <?php endif; ?>
        </div> <?php if (have_rows('red_social', 'user_' . $user->ID)): ?> <div class="mt-6 flex gap-4"> <?php
                            while (have_rows('red_social', 'user_' . $user->ID)):
                              the_row();
                              $social_network = get_sub_field('red_social_item');
                              $profile_url = get_sub_field('link_al_perfil');

                              if ($social_network && $profile_url):
                                $icon_class = '';
                                switch ($social_network) {
                                  case 'facebook':
                                    $icon_class = 'fa-facebook';
                                    break;
                                  case 'twitter':
                                    $icon_class = 'fa-twitter';
                                    break;
                                  case 'linkedin':
                                    $icon_class = 'fa-linkedin';
                                    break;
                                  case 'instagram':
                                    $icon_class = 'fa-instagram';
                                    break;
                                  case 'youtube':
                                    $icon_class = 'fa-youtube';
                                    break;
                                  case 'tiktok':
                                    $icon_class = 'fa-tiktok';
                                    break;
                                }
                                ?> <a href="
														<?php echo esc_url($profile_url); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600">
            <i class="fa-brands 
															<?php echo esc_attr($icon_class); ?>">
            </i>
          </a> <?php endif;
                            endwhile; ?> </div> <?php endif; ?>
      </div> <?php
                  }
                }

                if (empty($users)) {
                  echo '
											<div class="col-span-full text-center text-muted-foreground">No se encontraron miembros del equipo.</div>';
                }
                ?> </div>
  </section>
  <section class="py-32 bg-blue-200" id="contenidos">
    <?php if ($content = get_field('content')): ?>
      <div class="container flex flex-col gap-16 lg:px-16">
        <div class="lg:max-w-sm">
          <?php if ($content['title']): ?>
            <h2 class="mb-3 text-xl font-semibold text-blue-900 md:mb-4 md:text-4xl lg:mb-6">
              <?php echo esc_html($content['title']); ?>
            </h2>
          <?php endif; ?>

          <?php if ($content['description']): ?>
            <p class="mb-8 text-blue-900 lg:text-lg">
              <?php echo esc_html($content['description']); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php if ($cards = $content['cards']): ?>
          <div class="grid gap-6 md:grid-cols-2 lg:gap-8">
            <?php if ($cards['narratives_title'] && $cards['narratives_description']): ?>
              <div class="flex flex-col overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                <div class="md:min-h-[24rem] lg:min-h-[28rem] xl:min-h-[32rem]">
                  <?php if ($cards['narratives_media']): 
                    $file_type = wp_check_filetype($cards['narratives_media']['url'])['type'];
                    if (strpos($file_type, 'video') !== false): ?>
                      <video 
                        src="<?php echo esc_url($cards['narratives_media']['url']); ?>" 
                        class="aspect-[16/9] h-full w-full object-cover object-center"
                        controls
                        playsinline
                      >
                        <p>Tu navegador no soporta videos HTML5.</p>
                      </video>
                    <?php else: ?>
                      <img 
                        src="<?php echo esc_url($cards['narratives_media']['url']); ?>" 
                        alt="<?php echo esc_attr($cards['narratives_title']); ?>" 
                        class="aspect-[16/9] h-full w-full object-cover object-center"
                      >
                    <?php endif; ?>
                  <?php else: ?>
                    <img 
                      src="https://placehold.co/800x600/1f3a8a/bfdbfe" 
                      alt="<?php echo esc_attr($cards['narratives_title']); ?>" 
                      class="aspect-[16/9] h-full w-full object-cover object-center"
                    >
                  <?php endif; ?>
                </div>
                <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                  <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">
                    <?php echo esc_html($cards['narratives_title']); ?>
                  </h3>
                  <p class="text-blue-900 lg:text-lg">
                    <?php echo esc_html($cards['narratives_description']); ?>
                  </p>
                  <?php if (isset($cards['narratives_show_cta']) && $cards['narratives_show_cta'] && isset($cards['narratives_cta']) && !empty($cards['narratives_cta']['text']) && !empty($cards['narratives_cta']['url'])): ?>
                    <div class="mt-6">
                      <a target="_blank" href="<?php echo esc_url($cards['narratives_cta']['url']); ?>" class="inline-flex items-center rounded-md bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <?php echo esc_html($cards['narratives_cta']['text']); ?>
                        <svg class="ml-2 -mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>

            <?php if ($cards['literacy_title'] && $cards['literacy_description']): ?>
              <div class="flex flex-col-reverse overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                  <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">
                    <?php echo esc_html($cards['literacy_title']); ?>
                  </h3>
                  <p class="text-blue-900 lg:text-lg">
                    <?php echo esc_html($cards['literacy_description']); ?>
                  </p>
                  <?php if (isset($cards['literacy_show_cta']) && $cards['literacy_show_cta'] && isset($cards['literacy_cta']) && !empty($cards['literacy_cta']['text']) && !empty($cards['literacy_cta']['url'])): ?>
                    <div class="mt-6">
                      <a target="_blank" href="<?php echo esc_url($cards['literacy_cta']['url']); ?>" class="inline-flex items-center rounded-md bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <?php echo esc_html($cards['literacy_cta']['text']); ?>
                        <svg class="ml-2 -mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="md:min-h-[24rem] lg:min-h-[28rem] xl:min-h-[32rem]">
                  <?php if ($cards['literacy_media']): 
                    $file_type = wp_check_filetype($cards['literacy_media']['url'])['type'];
                    if (strpos($file_type, 'video') !== false): ?>
                      <video 
                        src="<?php echo esc_url($cards['literacy_media']['url']); ?>" 
                        class="aspect-[16/9] h-full w-full object-cover object-center"
                        controls
                        playsinline
                      >
                        <p>Tu navegador no soporta videos HTML5.</p>
                      </video>
                    <?php else: ?>
                      <img 
                        src="<?php echo esc_url($cards['literacy_media']['url']); ?>" 
                        alt="<?php echo esc_attr($cards['literacy_title']); ?>" 
                        class="aspect-[16/9] h-full w-full object-cover object-center"
                      >
                    <?php endif; ?>
                  <?php else: ?>
                    <img 
                      src="https://placehold.co/800x600/1f3a8a/bfdbfe" 
                      alt="<?php echo esc_attr($cards['literacy_title']); ?>" 
                      class="aspect-[16/9] h-full w-full object-cover object-center"
                    >
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </section>
  <section id="portafolio" class="flex flex-col gap-16 lg:px-16 lg:pt-32 pt-16 text-blue-950 bg-blue-300">
    <?php if ($portfolio = get_field('portfolio')): ?>
      <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
        <div class="lg:max-w-lg">
          <?php if ($portfolio['title']): ?>
            <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">
              <?php echo esc_html($portfolio['title']); ?>
            </h2>
          <?php endif; ?>

          <?php if ($portfolio['description']): ?>
            <p class="mb-8 lg:text-lg">
              <?php echo esc_html($portfolio['description']); ?>
            </p>
          <?php endif; ?>

          <?php if ($portfolio['link_text'] && $portfolio['link_url']): ?>
            <a href="<?php echo esc_url($portfolio['link_url']); ?>" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
              <?php echo esc_html($portfolio['link_text']); ?>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
              </svg>
            </a>
          <?php endif; ?>
        </div>

        <?php if ($tabs = $portfolio['tabs']): ?>
          <div class="hidden items-center justify-center space-x-4 space-y-4 text-center md:flex md:flex-wrap">
            <div role="radiogroup" dir="ltr" class="flex items-center justify-center flex-wrap gap-4">
              <?php
              $tab_items = array(
                'alfabetizacion' => 'Alfabetización Mediática',
                'tecnologias' => 'Tecnologías Emergentes',
                'paz' => 'Enfoque de Paz',
                'desarrollo' => 'Desarrollo Sostenible',
                'capacidades' => 'Capacidades TIC'
              );
              $first = true;
              foreach ($tab_items as $key => $label):
                if ($tabs[$key . '_title']):
              ?>
                <button 
                  type="button" 
                  role="radio" 
                  aria-checked="<?php echo $first ? 'true' : 'false'; ?>" 
                  data-state="<?php echo $first ? 'on' : 'off'; ?>" 
                  data-radix-collection-item 
                  class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5"
                >
                  <?php echo esc_html($label); ?>
                </button>
              <?php
                $first = false;
                endif;
              endforeach;
              ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </section>

  <section class="pb-32 pt-16 bg-blue-300">
    <?php if ($tabs = $portfolio['tabs']): ?>
      <div class="w-full">
        <div class="relative" role="region" aria-roledescription="carousel">
          <div class="overflow-x-hidden">
            <div class="flex touch-pan-x ml-[calc(theme(container.padding)-40px)] mr-[calc(theme(container.padding))] lg:ml-[calc(200px-40px)] lg:mr-[200px] 2xl:ml-[calc(50vw-700px+200px-40px)] 2xl:mr-[calc(50vw-700px+200px)]" style="transform: translate3d(0px, 0px, 0px);">
              <?php
              $tab_items = array(
                'alfabetizacion' => array('id' => 'alfabetizacion', 'alt' => 'Alfabetización Mediática'),
                'tecnologias' => array('id' => 'tecnologias', 'alt' => 'Tecnologías Emergentes'),
                'paz' => array('id' => 'paz', 'alt' => 'Enfoque de Paz'),
                'desarrollo' => array('id' => 'desarrollo', 'alt' => 'Desarrollo Sostenible'),
                'capacidades' => array('id' => 'capacidades', 'alt' => 'Capacidades TIC')
              );
              $first = true;
              foreach ($tab_items as $key => $item):
                if ($tabs[$key . '_title'] && $tabs[$key . '_description']):
              ?>
                <div 
                  role="tabpanel" 
                  class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" 
                  data-orientation="horizontal" 
                  id="<?php echo esc_attr($item['id']); ?>" 
                  tabindex="0" 
                  data-active="<?php echo $first ? 'true' : 'false'; ?>"
                >
                  <a href="#" class="group rounded-xl">
                    <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                      <div class="md:min-h-[24rem] lg:min-h-[28rem] xl:min-h-[32rem]">
                        <?php if ($tabs[$key . '_image']): ?>
                          <img 
                            src="<?php echo esc_url($tabs[$key . '_image']['url']); ?>" 
                            alt="<?php echo esc_attr($tabs[$key . '_image']['alt'] ?: $item['alt']); ?>" 
                            class="aspect-[16/9] size-full object-cover object-center"
                          >
                        <?php else: ?>
                          <img 
                            src="https://placehold.co/800x600/1f3a8a/bfdbfe" 
                            alt="<?php echo esc_attr($item['alt']); ?>" 
                            class="aspect-[16/9] size-full object-cover object-center"
                          >
                        <?php endif; ?>
                      </div>
                      <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                        <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">
                          <?php echo esc_html($tabs[$key . '_title']); ?>
                        </h3>
                        <p class="lg:text-lg">
                          <?php echo esc_html($tabs[$key . '_description']); ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
              <?php
                $first = false;
                endif;
              endforeach;
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>
  <section class="py-32 bg-blue-50">
    <div class="container mx-auto flex flex-col items-center">
      <div class="w-full overflow-clip rounded-lg bg-blue-50/50 2xl:w-[calc(min(100vw-2*theme(container.padding),100%+8rem))]">
        <div class="grid items-center gap-8 lg:grid-cols-2">
          <div class="container flex flex-col items-center px-[4rem] py-16 text-center lg:mx-auto lg:items-start lg:px-[4rem] lg:py-32 lg:text-left">
            <?php if ($participation = get_field('participation')): ?>
              <?php if (!empty($participation['badge'])): ?>
                <p class="text-blue-600 font-semibold"><?php echo esc_html($participation['badge']); ?></p>
              <?php endif; ?>
              <?php if (!empty($participation['title'])): ?>
                <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl"><?php echo esc_html($participation['title']); ?></h1>
              <?php endif; ?>
              <?php if (!empty($participation['description'])): ?>
                <p class="mb-8 max-w-xl text-blue-800 lg:text-xl"><?php echo esc_html($participation['description']); ?></p>
              <?php endif; ?>
              <?php if (!empty($participation['buttons'])): ?>
                <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
                  <?php if (!empty($participation['buttons']['explore_text']) && !empty($participation['buttons']['explore_url'])): ?>
                    <a href="<?php echo esc_url($participation['buttons']['explore_url']); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                      <svg class="mr-2 size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 0118 0 9 9 0 0118 0z"></path>
                      </svg>
                      <?php echo esc_html($participation['buttons']['explore_text']); ?>
                    </a>
                  <?php endif; ?>
                  <?php if (!empty($participation['buttons']['participate_text']) && !empty($participation['buttons']['participate_url'])): ?>
                    <a href="<?php echo esc_url($participation['buttons']['participate_url']); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                      <?php echo esc_html($participation['buttons']['participate_text']); ?>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php if (!empty($participation['gallery'])): ?>
            <div class="flex flex-col items-center justify-center p-8">
              <?php if ($participation['gallery']['display_type'] === 'video' && !empty($participation['gallery']['video'])): ?>
                <div class="relative w-full max-w-3xl aspect-video">
                  <video class="w-full h-full rounded-lg shadow-sm" controls loop>
                    <source src="<?php echo esc_url($participation['gallery']['video']['url']); ?>" type="<?php echo esc_attr($participation['gallery']['video']['mime_type']); ?>">
                    Your browser does not support the video tag.
                  </video>
                </div>
              <?php else: ?>
                <div class="relative aspect-[7/8] h-full w-full">
                  <?php if (!empty($participation['gallery']['image_1'])): ?>
                    <div class="absolute right-[50%] top-[12%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                      <img src="<?php echo esc_url($participation['gallery']['image_1']['url']); ?>" 
                           alt="<?php echo esc_attr($participation['gallery']['image_1']['alt']); ?>" 
                           class="object-cover w-full h-full"
                           onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+1'">
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($participation['gallery']['image_2'])): ?>
                    <div class="absolute right-[50%] top-[36%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                      <img src="<?php echo esc_url($participation['gallery']['image_2']['url']); ?>" 
                           alt="<?php echo esc_attr($participation['gallery']['image_2']['alt']); ?>" 
                           class="object-cover w-full h-full"
                           onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+2'">
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($participation['gallery']['image_3'])): ?>
                    <div class="absolute bottom-[36%] left-[54%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                      <img src="<?php echo esc_url($participation['gallery']['image_3']['url']); ?>" 
                           alt="<?php echo esc_attr($participation['gallery']['image_3']['alt']); ?>" 
                           class="object-cover w-full h-full"
                           onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+3'">
                    </div>
                  <?php endif; ?>
                  <?php if (!empty($participation['gallery']['image_4'])): ?>
                    <div class="absolute bottom-[12%] left-[54%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                      <img src="<?php echo esc_url($participation['gallery']['image_4']['url']); ?>" 
                           alt="<?php echo esc_attr($participation['gallery']['image_4']['alt']); ?>" 
                           class="object-cover w-full h-full"
                           onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+4'">
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <section class="py-32 bg-blue-200">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
          <?php if ($training = get_field('training')): ?>
          <?php if (!empty($training['image'])): ?>
            <img src="<?php echo esc_url($training['image']['url']); ?>" 
                 alt="<?php echo esc_attr($training['image']['alt']); ?>" 
                 class="max-h-96 w-full rounded-md object-cover shadow-lg" 
                 onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Formación+Ciudadana'">
          <?php else: ?>
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Formación+Ciudadana" 
                 alt="Formación Ciudadana Digital" 
                 class="max-h-96 w-full rounded-md object-cover shadow-lg">
          <?php endif; ?>
          <div class="flex flex-col lg:text-left">
            <?php if (!empty($training['icon'])): ?>
              <span class="flex size-12 items-center justify-center rounded-full bg-blue-600 text-white">
                <i class="<?php echo esc_attr($training['icon']); ?>"></i>
              </span>
            <?php endif; ?>
            <?php if (!empty($training['title'])): ?>
              <h2 class="my-6 text-pretty text-3xl font-bold text-blue-900 lg:text-4xl"><?php echo esc_html($training['title']); ?></h2>
            <?php endif; ?>
            <?php if (!empty($training['description'])): ?>
              <p class="mb-8 max-w-xl text-blue-900 lg:max-w-none lg:text-lg"><?php echo esc_html($training['description']); ?></p>
            <?php endif; ?>
            <?php if (!empty($training['features'])): ?>
              <ul class="ml-4 space-y-4 text-left">
                <?php foreach ($training['features'] as $feature): ?>
                  <li class="flex items-center gap-3">
                    <i class="fa-solid fa-check size-6 text-blue-600"></i>
                    <p class="text-blue-900 lg:text-lg"><?php echo esc_html($feature['text']); ?></p>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <?php if (!empty($training['show_cta']) && $training['show_cta'] && !empty($training['cta'])): ?>
              <div class="mt-8">
                <a href="<?php echo esc_url($training['cta']['url']); ?>" 
                   class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-3 text-white transition hover:bg-blue-700">
                  <?php echo esc_html($training['cta']['text']); ?>
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <section class="py-32 bg-blue-300">
    <div class="container mx-auto px-4">
      <div class="flex flex-col gap-6">
        <?php if ($testimonials = get_field('testimonials')): ?>
          <!-- Historia Principal -->
          <?php if (!empty($testimonials['main'])): ?>
            <div class="grid grid-cols-1 items-stretch gap-x-0 gap-y-4 lg:grid-cols-3 lg:gap-4">
              <?php if (!empty($testimonials['main']['image'])): ?>
                <img src="<?php echo esc_url($testimonials['main']['image']['url']); ?>" 
                     alt="<?php echo esc_attr($testimonials['main']['image']['alt']); ?>" 
                     class="h-72 w-full rounded-md object-cover lg:h-auto shadow-lg" 
                     onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Historia+Principal'">
              <?php else: ?>
                <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Historia+Principal" 
                     alt="Historia de Impacto Principal" 
                     class="h-72 w-full rounded-md object-cover lg:h-auto shadow-lg">
              <?php endif; ?>
              <div class="col-span-2 flex items-center justify-center p-8 bg-white rounded-lg shadow-lg">
                <div class="flex flex-col gap-4">
                  <?php if (!empty($testimonials['main']['quote'])): ?>
                    <q class="text-xl font-medium text-blue-900 lg:text-3xl"><?php echo esc_html($testimonials['main']['quote']); ?></q>
                  <?php endif; ?>
                  <div class="flex flex-col items-start">
                    <?php if (!empty($testimonials['main']['name'])): ?>
                      <p class="text-blue-900 font-semibold"><?php echo esc_html($testimonials['main']['name']); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($testimonials['main']['role'])): ?>
                      <p class="text-blue-600"><?php echo esc_html($testimonials['main']['role']); ?></p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <!-- Historias Secundarias -->
          <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <?php 
            $secondary_testimonials = array('testimonial_1', 'testimonial_2', 'testimonial_3');
            foreach ($secondary_testimonials as $testimonial_key):
              if (!empty($testimonials[$testimonial_key])):
                $testimonial = $testimonials[$testimonial_key];
            ?>
              <div class="bg-white p-6 rounded-lg shadow-lg">
                <?php if (!empty($testimonial['quote'])): ?>
                  <div class="px-6 pt-6 leading-7 text-blue-900">
                    <q><?php echo esc_html($testimonial['quote']); ?></q>
                  </div>
                <?php endif; ?>
                <div class="px-6 pt-6">
                  <div class="flex gap-4 leading-5">
                    <?php if (!empty($testimonial['image'])): ?>
                      <div class="size-9 rounded-full bg-blue-100 flex items-center justify-center overflow-hidden">
                        <img src="<?php echo esc_url($testimonial['image']['url']); ?>" 
                             alt="<?php echo esc_attr($testimonial['image']['alt']); ?>" 
                             class="w-full h-full object-cover"
                             onerror="this.parentElement.innerHTML='<?php echo esc_attr(substr($testimonial['name'], 0, 2)); ?>'">
                      </div>
                    <?php elseif (!empty($testimonial['name'])): ?>
                      <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                        <?php echo esc_html(substr($testimonial['name'], 0, 2)); ?>
                      </div>
                    <?php endif; ?>
                    <div class="text-sm">
                      <?php if (!empty($testimonial['name'])): ?>
                        <p class="font-medium text-blue-900"><?php echo esc_html($testimonial['name']); ?></p>
                      <?php endif; ?>
                      <?php if (!empty($testimonial['role'])): ?>
                        <p class="text-blue-600"><?php echo esc_html($testimonial['role']); ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php 
              endif;
            endforeach; 
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="py-16 md:py-24 bg-blue-50">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center px-4 text-center lg:items-start lg:text-left">
          <?php if ($regional_impact = get_field('regional_impact')): ?>
            <?php if (!empty($regional_impact['badge'])): ?>
              <p class="text-blue-600 font-semibold mb-4"><?php echo esc_html($regional_impact['badge']); ?></p>
            <?php endif; ?>
            <?php if (!empty($regional_impact['title'])): ?>
              <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-blue-900"><?php echo esc_html($regional_impact['title']); ?></h1>
            <?php endif; ?>
            <?php if (!empty($regional_impact['description'])): ?>
              <p class="mb-8 max-w-xl text-blue-900 lg:text-xl"><?php echo esc_html($regional_impact['description']); ?></p>
            <?php endif; ?>
            <?php if (!empty($regional_impact['buttons'])): ?>
              <div class="flex flex-col sm:flex-row gap-4">
                <?php if (!empty($regional_impact['buttons']['primary'])): ?>
                  <a href="<?php echo esc_url($regional_impact['buttons']['primary']['url']); ?>" 
                     class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <?php echo esc_html($regional_impact['buttons']['primary']['text']); ?>
                  </a>
                <?php endif; ?>
                <?php if (!empty($regional_impact['buttons']['secondary'])): ?>
                  <a href="<?php echo esc_url($regional_impact['buttons']['secondary']['url']); ?>" 
                     class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                    <?php echo esc_html($regional_impact['buttons']['secondary']['text']); ?>
                  </a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="relative">
          <?php if (!empty($regional_impact['image'])): ?>
            <img src="<?php echo esc_url($regional_impact['image']['url']); ?>" 
                 alt="<?php echo esc_attr($regional_impact['image']['alt']); ?>" 
                 class="w-full rounded-lg shadow-xl"
                 onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Impacto+Regional'">
          <?php else: ?>
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Impacto+Regional" 
                 alt="Mapa de Impacto Regional Total Transmedia" 
                 class="w-full rounded-lg shadow-xl">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  
  <section id="alianzas" class="py-32 bg-blue-200">
    <div class="container mx-auto px-4">
      <div class="grid overflow-hidden rounded-xl border border-blue-400 md:grid-cols-2">
        <?php if ($alianzas = get_field('alianzas')): ?>
          <div class="my-auto px-6 py-10 sm:px-10 sm:py-12 lg:p-16">
            <div class="w-full md:max-w-md">
              <?php if (!empty($alianzas['title'])): ?>
                <h2 class="mb-4 text-2xl font-semibold text-blue-900 lg:text-3xl"><?php echo esc_html($alianzas['title']); ?></h2>
              <?php endif; ?>
              <?php if (!empty($alianzas['description'])): ?>
                <p class="mb-6 text-lg text-blue-800"><?php echo esc_html($alianzas['description']); ?></p>
              <?php endif; ?>
              <?php if (!empty($alianzas['button'])): ?>
                <a href="<?php echo esc_url($alianzas['button']['url']); ?>" 
                   class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2 bg-blue-600 text-white hover:bg-blue-700 h-10 px-4 py-2 w-full md:w-fit">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 size-5">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                  </svg>
                  <?php echo esc_html($alianzas['button']['text']); ?>
                </a>
              <?php endif; ?>
            </div>
          </div>
          <?php if (!empty($alianzas['partners'])): ?>
            <div class="grid grid-cols-2 border-t border-blue-400 md:border-l md:border-t-0">
              <?php 
              $partners = array('partner1', 'partner2');
              foreach ($partners as $partner):
                if (!empty($alianzas['partners'][$partner])):
                  $current_partner = $alianzas['partners'][$partner];
              ?>
                <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
                  <?php if (!empty($current_partner['image'])): ?>
                    <img src="<?php echo esc_url($current_partner['image']['url']); ?>" 
                         alt="<?php echo esc_attr($current_partner['name']); ?>" 
                         class="size-12 object-contain object-center sm:size-16 lg:size-64"
                         onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=<?php echo esc_attr($current_partner['name']); ?>'">
                  <?php else: ?>
                    <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=<?php echo esc_attr($current_partner['name']); ?>" 
                         alt="<?php echo esc_attr($current_partner['name']); ?>" 
                         class="size-12 object-contain object-center sm:size-16 lg:size-64">
                  <?php endif; ?>
                </div>
              <?php 
                endif;
              endforeach; 
              ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  
  <section id="adaptacion" class="py-32 bg-blue-300">
    <div class="container mx-auto px-4">
    <?php if ($adaptacion = get_field('adaptacion')): ?>
      <?php if (!empty($adaptacion['title'])): ?>
        <h2 class="text-center text-4xl font-semibold text-blue-900 lg:text-6xl mb-4"><?php echo esc_html($adaptacion['title']); ?></h2>
      <?php endif; ?>
      <?php if (!empty($adaptacion['description'])): ?>
        <p class="text-center text-blue-800 text-xl mb-12 max-w-3xl mx-auto"><?php echo esc_html($adaptacion['description']); ?></p>
      <?php endif; ?>
      <?php if (!empty($adaptacion['stats'])): ?>
        <div class="grid gap-6 pt-9 text-center md:grid-cols-3 lg:pt-20">
          <?php 
          $stats = array('stat1', 'stat2', 'stat3', 'stat4', 'stat5', 'stat6');
          foreach ($stats as $stat):
            if (!empty($adaptacion['stats'][$stat])):
              $current_stat = $adaptacion['stats'][$stat];
          ?>
            <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
              <?php if (!empty($current_stat['number'])): ?>
                <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m5 12 7-7 7 7"></path>
                    <path d="M12 19V5"></path>
                  </svg>
                  <?php echo esc_html($current_stat['number']); ?>
                </p>
              <?php endif; ?>
              <?php if (!empty($current_stat['description'])): ?>
                <p class="text-blue-700"><?php echo esc_html($current_stat['description']); ?></p>
              <?php endif; ?>
            </div>
          <?php 
            endif;
          endforeach; 
          ?>
        </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>
  </section>
</main> 

<?php
get_footer();