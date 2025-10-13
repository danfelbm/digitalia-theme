<?php
/*
Template Name: Academia - Introducción
Template Post Type: page
*/

get_header();
?>

<!-- Hero Section - Based on with_app_screenshot.html -->
<div class="bg-yellow-50">
  <div class="relative isolate pt-14">
    <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-yellow-300 to-yellow-600 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="py-24 sm:py-32 lg:pb-40">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
          <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Academia Digital-IA</h1>
          <p class="mt-6 text-lg leading-8 text-gray-600">Un programa innovador de alfabetización mediática e informacional que te prepara para los desafíos de la era digital, con énfasis en inteligencia artificial y enfoque de paz.</p>
          <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="#programas" class="rounded-md bg-yellow-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-500">Explorar Programas</a>
            <a href="#plataforma" class="text-sm font-semibold leading-6 text-gray-900">Conoce la plataforma <span aria-hidden="true">→</span></a>
          </div>
        </div>
        <div class="mt-16 flow-root sm:mt-24">
          <div class="relative -m-2 rounded-xl bg-yellow-100/5 p-2 ring-1 ring-inset ring-yellow-100/10 lg:-m-4 lg:rounded-2xl lg:p-4">
            <img src="https://placehold.co/1200x800" alt="Total Transmedia" class="rounded-md shadow-2xl ring-1 ring-yellow-100/10">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Programs Section - Based on with_large_screenshot.html -->
<div class="relative bg-white" id="programas">
  <div class="mx-auto max-w-7xl lg:flex lg:justify-between lg:px-8 xl:justify-end">
    <div class="lg:flex lg:w-1/2 lg:shrink lg:grow-0 xl:absolute xl:inset-y-0 xl:right-1/2 xl:w-1/2">
      <div class="relative h-80 lg:-ml-8 lg:h-auto lg:w-full lg:grow xl:ml-0">
        <img class="absolute inset-0 h-full w-full bg-gray-50 object-cover" src="https://placehold.co/800x600" alt="Programas educativos">
      </div>
    </div>
    <div class="px-6 lg:contents">
      <div class="mx-auto max-w-2xl pb-24 pt-16 sm:pb-32 sm:pt-20 lg:ml-8 lg:mr-0 lg:w-full lg:max-w-lg lg:flex-none lg:pt-32 xl:w-1/2">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nuestros Programas</h2>
        <div class="mt-6 space-y-10 divide-y divide-gray-200 text-base leading-7 text-gray-600">
          <div class="pt-8 first:pt-0">
            <h3 class="font-semibold text-gray-900">Educomunicación para la paz</h3>
            <p class="mt-4">Desarrolla habilidades para comunicar efectivamente en el entorno digital, promoviendo la paz y el entendimiento mutuo en la sociedad.</p>
          </div>
          <div class="pt-8">
            <h3 class="font-semibold text-gray-900">Alfabetización mediática e informacional</h3>
            <p class="mt-4">Aprende a analizar, evaluar y crear contenido digital de manera crítica y responsable en la era de la información.</p>
          </div>
          <div class="pt-8">
            <h3 class="font-semibold text-gray-900">Tecnologías emergentes</h3>
            <p class="mt-4">Explora y comprende las últimas tecnologías que están transformando la comunicación digital y su impacto en la sociedad.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Platform Section - Based on with_product_screenshot_panel.html -->
<div class="bg-yellow-50 py-24 sm:py-32" id="plataforma">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl sm:text-center">
      <h2 class="text-base font-semibold leading-7 text-yellow-600">Plataforma de aprendizaje</h2>
      <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Sistema de gestión de aprendizaje Moodle</p>
      <p class="mt-6 text-lg leading-8 text-gray-600">Una plataforma robusta y flexible que facilita el aprendizaje en línea con herramientas interactivas y seguimiento personalizado.</p>
    </div>
  </div>
  <div class="relative overflow-hidden pt-16">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <img src="https://placehold.co/1200x800" alt="App screenshot" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-gray-900/10">
      <div class="relative" aria-hidden="true">
        <div class="absolute -inset-x-20 bottom-0 bg-gradient-to-t from-white pt-[7%]"></div>
      </div>
    </div>
  </div>
  <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">
    <dl class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-600 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
          </svg>
          Cursos interactivos
        </dt>
        <dd class="inline">Contenido multimedia y actividades prácticas que mantienen el interés del estudiante.</dd>
      </div>
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 2a.75.75 0 01.75.75v.258a33.186 33.186 0 016.668.83.75.75 0 01-.336 1.461 31.28 31.28 0 00-1.103-.232l1.702 7.545a.75.75 0 01-.387.832A4.981 4.981 0 0115 14c-.825 0-1.606-.2-2.294-.556a.75.75 0 01-.387-.832l1.77-7.849a31.743 31.743 0 00-3.339-.254v11.505a20.01 20.01 0 013.78.501.75.75 0 11-.339 1.462A18.558 18.558 0 0010 17.5c-1.442 0-2.845.165-4.191.477a.75.75 0 01-.338-1.462 20.01 20.01 0 013.779-.501V4.509c-1.129.026-2.243.112-3.34.254l1.771 7.85a.75.75 0 01-.387.831A4.981 4.981 0 015 14a4.98 4.98 0 01-2.294-.556.75.75 0 01-.387-.832l1.702-7.545c-.37.07-.738.148-1.103.232a.75.75 0 01-.336-1.461 33.186 33.186 0 016.668-.83V2.75A.75.75 0 0110 2z" clip-rule="evenodd" />
          </svg>
          Seguimiento personalizado
        </dt>
        <dd class="inline">Monitoreo detallado del progreso y retroalimentación continua.</dd>
      </div>
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M3.196 12.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 12.87z" />
            <path d="M3.196 8.87l-.825.483a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.758 0l7.25-4.25a.75.75 0 000-1.294l-.825-.484-5.666 3.322a2.25 2.25 0 01-2.276 0L3.196 8.87z" />
            <path d="M10.38 1.103a.75.75 0 00-.76 0l-7.25 4.25a.75.75 0 000 1.294l7.25 4.25a.75.75 0 00.76 0l7.25-4.25a.75.75 0 000-1.294l-7.25-4.25z" />
          </svg>
          Recursos multimedia
        </dt>
        <dd class="inline">Variedad de formatos educativos para diferentes estilos de aprendizaje.</dd>
      </div>
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M16.403 12.652a3 3 0 000-5.304 3 3 0 00-3.75-3.751 3 3 0 00-5.305 0 3 3 0 00-3.751 3.75 3 3 0 000 5.305 3 3 0 003.75 3.751 3 3 0 005.305 0 3 3 0 003.751-3.75zm-2.546-4.46a.75.75 0 00-1.214-.883l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
          </svg>
          Evaluación continua
        </dt>
        <dd class="inline">Sistema integral de evaluación para medir el progreso del aprendizaje.</dd>
      </div>
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M2 4.25A2.25 2.25 0 014.25 2h11.5A2.25 2.25 0 0118 4.25v8.5A2.25 2.25 0 0115.75 15h-3.105a3.501 3.501 0 001.1 1.677A.75.75 0 0113.26 18H6.74a.75.75 0 01-.484-1.323A3.501 3.501 0 007.355 15H4.25A2.25 2.25 0 012 12.75v-8.5zm1.5 0a.75.75 0 01.75-.75h11.5a.75.75 0 01.75.75v7.5a.75.75 0 01-.75.75H4.25a.75.75 0 01-.75-.75v-7.5z" clip-rule="evenodd" />
          </svg>
          Acceso multiplataforma
        </dt>
        <dd class="inline">Disponible en cualquier dispositivo, en cualquier momento y lugar.</dd>
      </div>
      <div class="relative pl-9">
        <dt class="inline font-semibold text-gray-900">
          <svg class="absolute left-1 top-1 h-5 w-5 text-yellow-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 2c-2.236 0-4.43.18-6.57.524C1.993 2.755 1 4.014 1 5.426v5.148c0 1.413.993 2.67 2.43 2.902 1.168.188 2.352.327 3.55.414.28.02.521.18.642.413l1.713 3.293a.75.75 0 001.33 0l1.713-3.293a.783.783 0 01.642-.413 41.102 41.102 0 003.55-.414c1.437-.232 2.43-1.49 2.43-2.902V5.426c0-1.413-.993-2.67-2.43-2.902A41.289 41.289 0 0010 2zM6.75 6a.75.75 0 000 1.5h6.5a.75.75 0 000-1.5h-6.5zm0 2.5a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z" clip-rule="evenodd" />
          </svg>
          Soporte técnico 24/7
        </dt>
        <dd class="inline">Asistencia continua para garantizar una experiencia de aprendizaje sin interrupciones.</dd>
      </div>
    </dl>
  </div>
</div>

<?php get_footer(); ?>