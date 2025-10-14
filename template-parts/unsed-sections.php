<section>
    <div class="container">
        <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center py-32 text-center lg:mx-auto lg:items-start lg:px-0 lg:text-left">
            <p><?php echo esc_html(get_field('hero_subtitle')); ?></p>
            <h1 class="my-6 text-pretty text-4xl font-bold lg:text-6xl"><?php echo esc_html(get_field('hero_title')); ?></h1>
            <p class="mb-8 max-w-xl text-muted-foreground lg:text-xl"><?php echo esc_html(get_field('hero_description')); ?></p>
            <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
            <?php if ($primary_button = get_field('hero_primary_button')) : ?>
            <a href="<?php echo esc_url($primary_button['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right mr-2 size-4">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
                </svg>
                <?php echo esc_html($primary_button['text']); ?>
            </a>
            <?php endif; ?>
            
            <?php if ($secondary_button = get_field('hero_secondary_button')) : ?>
            <a href="<?php echo esc_url($secondary_button['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                <?php echo esc_html($secondary_button['text']); ?>
            </a>
            <?php endif; ?>
            </div>
        </div>
        <div class="relative aspect-3/4">
            <div class="absolute inset-0 flex items-center justify-center">
            <img class="size-full text-muted-foreground opacity-20" src="<?php echo esc_url(get_field('hero_background_image')); ?>" alt="" />
            </div>
            <?php if ($left_image = get_field('hero_image_left')) : ?>
            <img src="<?php echo esc_url($left_image); ?>" alt="" class="absolute left-[8%] top-[10%] flex aspect-5/6 w-[38%] justify-center rounded-lg border border-border bg-accent object-cover" />
            <?php endif; ?>
            <?php if ($right_image = get_field('hero_image_right')) : ?>
            <img src="<?php echo esc_url($right_image); ?>" alt="" class="absolute right-[12%] top-[20%] flex aspect-square w-1/5 justify-center rounded-lg border border-border bg-accent object-cover" />
            <?php endif; ?>
            <?php if ($bottom_image = get_field('hero_image_bottom')) : ?>
            <img src="<?php echo esc_url($bottom_image); ?>" alt="" class="absolute bottom-[24%] right-[24%] flex aspect-5/6 w-[38%] justify-center rounded-lg border border-border bg-accent object-cover" />
            <?php endif; ?>
        </div>
        </div>
    </div>
</section>




<section class="relative py-32"><div class="absolute inset-0 -z-10 h-full w-full overflow-hidden">
        <!-- Base gradient with center focus -->
        <div class="absolute inset-0 bg-linear-to-r from-transparent via-red-300/30 to-transparent"></div>
        
        <!-- Overlapping color rays -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_50%,rgba(45,212,191,0.3)_0%,transparent_60%)]"></div>
        
        <!-- Animated light rays effect -->
        <div class="absolute inset-0 bg-[conic-gradient(from_0deg_at_50%_50%,transparent_0deg,rgba(255,255,255,0.1)_90deg,transparent_180deg)] animate-[spin_8s_linear_infinite]"></div>
        
        <!-- Top right glow -->
        <div class="absolute -top-1/2 right-0 h-[500px] w-[500px] rounded-full bg-linear-to-bl from-red-400/40 to-transparent blur-3xl"></div>
        
        <!-- Bottom fade to white -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-linear-to-t from-white to-transparent"></div>
        
        <!-- Side fades for smooth horizontal transitions -->
        <div class="absolute inset-y-0 left-0 w-32 bg-linear-to-r from-white to-transparent"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-linear-to-l from-white to-transparent"></div>
      </div><div class="container absolute inset-x-0 top-0 hidden h-full overflow-hidden lg:block"><div class="flex flex-col items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 520" class="-mx-[theme(container.padding)] w-[calc(100%+2*theme(container.padding))]"><defs><radialGradient id="text-backgroud" cx="50%" cy="50%" r="0.6"><stop stop-color="black" offset="0.4"></stop><stop stop-color="black" offset="1" stop-opacity="0"></stop></radialGradient><linearGradient id="icon-backgroud" x1="0" y1="0" x2="1" y2="1"><stop stop-color="hsl(var(--accent))" offset="0"></stop><stop stop-color="hsl(var(--background))" offset="1"></stop></linearGradient><mask id="mask"><rect x="0" y="0" width="100%" height="100%" stroke="none" fill="black"></rect><rect x="80" y="40" width="1260" height="380" rx="140" stroke="none" filter="url(#blur)" fill="white"></rect><rect x="40" y="-120" width="1320" height="600" stroke="none" fill="url(#text-backgroud)"></rect></mask><filter id="blur" x="-50%" y="-50%" width="200%" height="200%"><feGaussianBlur in="SourceGraphic" stdDeviation="40"></feGaussianBlur></filter></defs><path stroke="hsl(var(--border))" stroke-width="1" d="M0,40H1400M0,120H1400M0,200H1400M0,280H1400M0,360H1400M0,440H1400M60,0V520M140,0V520M220,0V520M300,0V520M380,0V520M460,0V520M540,0V520M620,0V520M700,0V520M780,0V520M860,0V520M940,0V520M1020,0V520M1100,0V520M1180,0V520M1260,0V520M1340,0V520" mask="url(#mask)"></path><rect x="140" y="120" width="80" height="80" stroke="hsl(var(--border)/0.5)" fill="url(#icon-backgroud)"></rect><image href="https://shadcnblocks.com/images/block/block-1.svg" x="160" y="140" width="40" height="40"></image><rect x="60" y="280" width="80" height="80" stroke="hsl(var(--border)/0.5)" fill="url(#icon-backgroud)"></rect><image href="https://shadcnblocks.com/images/block/block-2.svg" x="80" y="300" width="40" height="40"></image><rect x="300" y="360" width="80" height="80" stroke="hsl(var(--border)/0.5)" fill="url(#icon-backgroud)"></rect><image href="https://shadcnblocks.com/images/block/block-3.svg" x="320" y="380" width="40" height="40"></image><rect x="1180" y="40" width="80" height="80" stroke="hsl(var(--border)/0.5)" fill="url(#icon-backgroud)"></rect><image href="https://shadcnblocks.com/images/block/block-4.svg" x="1200" y="60" width="40" height="40"></image><rect x="1260" y="280" width="80" height="80" stroke="hsl(var(--border)/0.5)" fill="url(#icon-backgroud)"></rect><image href="https://shadcnblocks.com/images/block/block-5.svg" x="1280" y="300" width="40" height="40"></image></svg></div></div><div class="container relative flex flex-col items-center text-center"><h1 class="my-6 text-pretty text-4xl font-bold lg:text-6xl">Educomunicación para la paz</h1><p class="mb-8 max-w-3xl lg:text-xl">Un ecosistema integral que eleva las capacidades ciudadanas para detectar, comprender y combatir la desinformación.</p><div><button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">Quiero saber más</button></div></div></section>




        <section class="py-32">
    <div class="absolute inset-0 -z-10 h-full w-full overflow-hidden">
        <!-- Base gradient with center focus -->
        <div class="absolute inset-0 bg-linear-to-r from-transparent via-red-300/30 to-transparent"></div>
        
        <!-- Overlapping color rays -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_50%,rgba(45,212,191,0.3)_0%,transparent_60%)]"></div>
        
        <!-- Animated light rays effect -->
        <div class="absolute inset-0 bg-[conic-gradient(from_0deg_at_50%_50%,transparent_0deg,rgba(255,255,255,0.1)_90deg,transparent_180deg)] animate-[spin_8s_linear_infinite]"></div>
        
        <!-- Top right glow -->
        <div class="absolute -top-1/2 right-0 h-[500px] w-[500px] rounded-full bg-linear-to-bl from-red-400/40 to-transparent blur-3xl"></div>
        
        <!-- Bottom fade to white -->
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-linear-to-t from-white to-transparent"></div>
        
        <!-- Side fades for smooth horizontal transitions -->
        <div class="absolute inset-y-0 left-0 w-32 bg-linear-to-r from-white to-transparent"></div>
        <div class="absolute inset-y-0 right-0 w-32 bg-linear-to-l from-white to-transparent"></div>
      </div>
    <div class="container">
        <div class="relative max-w-5xl">
     
        <div class="absolute inset-0 -z-10 h-full w-full bg-[linear-gradient(to_right,rgba(59,130,246,0.1)_1px,transparent_1px),linear-gradient(to_bottom,rgba(45,212,191,0.1)_1px,transparent_1px)] bg-size-[64px_64px] mask-[radial-gradient(ellipse_50%_100%_at_50%_50%,#000_60%,transparent_100%)]"></div>

        <h1 class="text-5xl font-extrabold leading-tight lg:text-8xl lg:leading-snug">
            <span class="relative inline-block before:absolute before:-bottom-2 before:-left-4 before:-right-2 before:top-0 before:-z-10 before:rounded-lg before:bg-muted-foreground/15">Digital·IA</span>
            <br />
            <span class="font-lg lg:text-5xl -mt-16">Educomunicación para la paz</span>
        </h1>
        <p class="mt-7 text-xl font-light lg:text-3xl">Un ecosistema integral que eleva las capacidades ciudadanas para detectar, comprender y combatir la desinformación.</p>
        <div class="mt-12 flex w-fit flex-col gap-2.5 text-center">
            <a href="/que-es-digitalia" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">Me gustaría saber más <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 h-auto w-4">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
            </a>
            <p class="text-sm text-muted-foreground">¡Todos los contenidos son gratuitos!</p>
        </div>
        </div>
  </div>
</section>        