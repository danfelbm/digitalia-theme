<?php
/**
 * Template Name: Ready - Recursos
 * 
 * @package Digitalia
 */

get_header();
?>

<section class="py-32">
  <div class="container max-w-[1200px]">
    <div class="flex gap-6">
      <div class="w-full">
        <span class="text-base text-muted-foreground"><?php echo esc_html(get_field('ready_recursos_hero')['badge']); ?></span>
        <h2 class="my-4 text-3xl font-medium"><?php echo esc_html(get_field('ready_recursos_hero')['title']); ?></h2>
        <p class="text-lg text-muted-foreground"><?php echo esc_html(get_field('ready_recursos_hero')['description']); ?></p>
      </div>
      <div class="relative hidden w-full lg:block">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-transparent to-background"></div>
        <div class="grid w-full grid-cols-8 grid-rows-4 gap-2"><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="flex w-full rounded-md bg-muted p-3"></div><div class="col-start-3 rounded-md row-start-3 bg-muted p-3"><img src="https://shadcnblocks.com/images/block/block-1.svg" alt="placeholder" class="h-full w-full object-cover"></div><div class="col-start-4 rounded-md row-start-4 bg-muted p-3"><img src="https://shadcnblocks.com/images/block/block-2.svg" alt="placeholder" class="h-full w-full object-cover"></div><div class="col-start-7 rounded-md row-start-4 bg-muted p-3"><img src="https://shadcnblocks.com/images/block/block-2.svg" alt="placeholder" class="h-full w-full object-cover"></div></div>
      </div>
    </div>
    <div class="mt-2 grid grid-cols-1 gap-6 md:grid-cols-2">
      <?php 
      if(have_rows('ready_recursos_cards')): 
        while(have_rows('ready_recursos_cards')): the_row(); 
          $icon = get_sub_field('icon');
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $url = get_sub_field('url');
          $image = get_sub_field('image');
      ?>
          <a href="<?php echo esc_url($url); ?>" class="rounded-lg border p-12 pb-0 block hover:border-accent transition-colors">
            <div class="mb-8 flex items-center justify-between">
              <div class="flex size-12 items-center justify-center rounded-lg bg-muted">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-<?php echo esc_attr($icon); ?> size-6">
                  <?php if($icon === 'book-open'): ?>
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                  <?php elseif($icon === 'library'): ?>
                    <path d="M16 6 4 14"/>
                    <path d="M12 6v14"/>
                    <path d="M8 8v12"/>
                    <path d="M4 4v16"/>
                  <?php elseif($icon === 'laptop'): ?>
                    <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/>
                  <?php elseif($icon === 'users'): ?>
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                  <?php endif; ?>
                </svg>
              </div>
              <div class="flex size-10 items-center justify-center rounded-md border border-input bg-background hover:bg-accent hover:text-accent-foreground">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right size-4">
                  <path d="m9 18 6-6-6-6"></path>
                </svg>
              </div>
            </div>
            <h4 class="mb-4 text-xl font-medium"><?php echo esc_html($title); ?></h4>
            <p class="font-base mb-8 text-muted-foreground"><?php echo esc_html($description); ?></p>
            <div class="relative m-auto mt-4 w-full overflow-hidden">
              <div class="absolute bottom-0 left-0 right-0 z-[2] h-[100px] bg-[linear-gradient(to_top,white_0%,rgba(255,255,255,0)_100%)]"></div>
              <?php if($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" 
                     alt="<?php echo esc_attr($image['alt']); ?>" 
                     class="max-h-[270px] w-full rounded-md object-cover">
              <?php endif; ?>
            </div>
          </a>
        <?php 
        endwhile;
      endif; 
      ?>
    </div>
  </div>
</section>

<?php
get_footer();
?>
