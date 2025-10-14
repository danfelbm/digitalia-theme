<?php
/**
 * Template Name: Total Transmedia - Estrategia
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Digitalia
 */

get_header(); 
?> 

<main class="bg-white text-blue-900">
  <!-- Sección 1: Plan Estratégico -->
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
          <p class="text-blue-600 font-semibold">Estrategia de Comunicación</p>
          <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl">Plan Estratégico</h1>
          <p class="mb-8 max-w-xl text-blue-800 lg:text-xl">
            Desarrollo de tácticas comunicacionales que integran medios tradicionales y digitales, enfocadas en la construcción de una ciudadanía digital informada y responsable.
          </p>
          <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
            <a href="#canales" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Explorar Canales
            </a>
            <a href="#contenidos" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
              Ver Contenidos
            </a>
          </div>
        </div>
        <div class="-mb-48 flex justify-start gap-4 pt-4">
          <div class="absolute">
            <div class="flex scale-75 flex-col gap-12 pl-32 pt-8 sm:scale-100">
              <div class="flex gap-x-8 odd:pl-[calc(--spacing(32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M21 15V6"></path><path d="M18.5 18a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path><path d="M12 12H3"></path><path d="M16 6H3"></path><path d="M12 18H3"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Medios Digitales</div>
                    <div class="text-xs font-normal text-blue-700">Estrategias para redes sociales y plataformas digitales</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 20h9"></path><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Contenido Editorial</div>
                    <div class="text-xs font-normal text-blue-700">Creación de contenido educativo y formativo</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(--spacing(32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M3 7V5c0-1.1.9-2 2-2h2"></path><path d="M17 3h2c1.1 0 2 .9 2 2v2"></path><path d="M21 17v2c0 1.1-.9 2-2 2h-2"></path><path d="M7 21H5c-1.1 0-2-.9-2-2v-2"></path><rect width="7" height="5" x="7" y="7" rx="1"></rect><rect width="7" height="5" x="10" y="12" rx="1"></rect>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Transmedia</div>
                    <div class="text-xs font-normal text-blue-700">Narrativas expandidas en múltiples plataformas</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"></path><path d="M10 2c1 .5 2 2 2 5"></path>
                  </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Paz Digital</div>
                    <div class="text-xs font-normal text-blue-700">Promoción de la convivencia en entornos digitales</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(--spacing(32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Alfabetización</div>
                    <div class="text-xs font-normal text-blue-700">Desarrollo de competencias mediáticas</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M13 6h3a2 2 0 0 1 2 2v7"></path><path d="M11 18H8a2 2 0 0 1-2-2V9"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Interacción</div>
                    <div class="text-xs font-normal text-blue-700">Participación activa de la comunidad</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(--spacing(32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 1 7.92 12.446a1 1 0 0 1 -.813.493h-1.5a1 1 0 0 1 -1 -1v-4a1 1 0 0 0 -1 -1h-3a1 1 0 0 0 -1 1v4a1 1 0 0 1 -1 1h-1.5a1 1 0 0 1 -.813 -.493a7.5 7.5 0 0 1 7.92 -12.446a12.36 12.36 0 0 1 .393 0z"></path>
                      <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                      <path d="M12 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                      <path d="M12 15m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Comunidad Digital</div>
                    <div class="text-xs font-normal text-blue-700">Construcción de espacios digitales colaborativos</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Innovación Digital</div>
                    <div class="text-xs font-normal text-blue-700">Exploración de nuevas tecnologías y formatos</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="relative flex aspect-3/6 w-[240px] justify-center rounded-lg border border-border bg-background sm:w-[300px]"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Sección 2: Canales de Difusión -->
  <section class="py-32 bg-blue-100" id="canales">
    <div class="container mx-auto px-4">
      <h2 class="mb-4 text-2xl font-semibold lg:text-4xl text-blue-900">Canales de Difusión</h2>
      <p class="text-blue-900 lg:text-lg">Identificación y utilización estratégica de múltiples canales de comunicación, incluyendo redes sociales, medios tradicionales y plataformas digitales emergentes.</p>
      <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Redes Sociales" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Redes Sociales</h3>
          <p class="text-sm text-blue-900">Estrategias específicas para Facebook, Twitter, Instagram y LinkedIn, aprovechando las características únicas de cada plataforma.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Medios Tradicionales" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Medios Tradicionales</h3>
          <p class="text-sm text-blue-900">Integración con radio, televisión y prensa escrita para alcanzar audiencias diversas y mantener presencia multiplataforma.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Plataformas Digitales" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Plataformas Digitales</h3>
          <p class="text-sm text-blue-900">Utilización de sitios web, blogs y plataformas de contenido digital para distribuir información detallada y recursos.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Email Marketing" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Email Marketing</h3>
          <p class="text-sm text-blue-900">Campañas de correo electrónico segmentadas para mantener informados a diferentes grupos de interés sobre avances y actividades.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Apps Móviles" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Apps Móviles</h3>
          <p class="text-sm text-blue-900">Desarrollo de aplicaciones móviles para facilitar el acceso a información y servicios de manera inmediata y personalizada.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Eventos Virtuales" class="w-14 h-14 object-cover rounded-lg" />
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Eventos Virtuales</h3>
          <p class="text-sm text-blue-900">Organización de webinars, conferencias en línea y eventos híbridos para fomentar la participación e interacción directa.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Sección 3: Contenidos Transmedia -->
  <section class="py-32 bg-white" id="contenidos">
    <div class="container flex flex-col gap-16 lg:px-16">
      <div class="lg:max-w-sm">
        <h2 class="mb-3 text-xl font-semibold text-blue-900 md:mb-4 md:text-4xl lg:mb-6">
          Contenidos Transmedia
        </h2>
        <p class="mb-8 text-blue-900 lg:text-lg">
          Desarrollamos contenidos educomunicacionales transmedia que integran narrativas expandidas, interactividad y estrategias de engagement para fortalecer la alfabetización mediática y el uso ético de la inteligencia artificial.
        </p>
      </div>
      <div class="grid gap-6 md:grid-cols-2 lg:gap-8">
        <div class="flex flex-col overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
          <div class="md:min-h-96 lg:min-h-112 xl:min-h-128">
            <img
              src="https://placehold.co/800x600/1f3a8a/bfdbfe"
              alt="Estrategias Transmedia"
              class="aspect-video h-full w-full object-cover object-center"
            />
          </div>
          <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
            <h3 class="mb-3 text-lg font-semibold text-blue-900 md:mb-4 md:text-2xl lg:mb-6">
              Narrativas Expandidas
            </h3>
            <p class="text-blue-900 lg:text-lg">
              Creamos experiencias omnicanal que integran storytelling, gamificación y marketing de contenidos. Nuestras narrativas interactivas fomentan el user-generated content y aprovechan micromomentos para maximizar el engagement con diferentes audiencias.
            </p>
          </div>
        </div>
        <div class="flex flex-col-reverse overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
          <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
            <h3 class="mb-3 text-lg font-semibold text-blue-900 md:mb-4 md:text-2xl lg:mb-6">
              Alfabetización Digital
            </h3>
            <p class="text-blue-900 lg:text-lg">
              Desarrollamos contenidos especializados para superar discursos de odio, identificar desinformación y fortalecer el periodismo ciudadano. Integramos tecnologías de IA para la detección de fake news y la promoción de una paz mediática.
            </p>
          </div>
          <div class="md:min-h-96 lg:min-h-112 xl:min-h-128">
            <img
              src="https://placehold.co/800x600/1f3a8a/bfdbfe"
              alt="Alfabetización Digital"
              class="aspect-video h-full w-full object-cover object-center"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Additional sections will be added here -->
</main> 

<?php 
get_footer();
?>