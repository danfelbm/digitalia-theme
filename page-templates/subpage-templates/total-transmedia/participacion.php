<?php
/**
 * Template Name: Total Transmedia - Participación
 * Description: Página de Participación Ciudadana del módulo Total Transmedia
 */

get_header();
?>

<main class="participacion-ciudadana">
  <!-- Sección 1: Espacios de Participación -->
  <section class="bg-blue-50">
    <div class="container mx-auto flex flex-col items-center">
      <div class="w-full overflow-clip rounded-lg bg-blue-50/50 2xl:w-[calc(min(100vw-2*theme(container.padding),100%+8rem))]">
        <div class="grid items-center gap-8 lg:grid-cols-2">
          <div class="container flex flex-col items-center px-[4rem] py-16 text-center lg:mx-auto lg:items-start lg:px-[4rem] lg:py-32 lg:text-left">
            <p class="text-blue-600 font-semibold">Total Transmedia</p>
            <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl">
              Espacios de Participación
            </h1>
            <p class="mb-8 max-w-xl text-blue-800 lg:text-xl">
              Creamos plataformas y espacios físicos y virtuales para impulsar la interacción ciudadana, facilitando el diálogo y la construcción colectiva de conocimiento en el entorno digital.
            </p>
            <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
              <a href="#plataformas" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="mr-2 size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 0118 0 9 9 0 0118 0z"></path>
                </svg>
                Explorar Plataformas
              </a>
              <a href="#participar" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors">
                Participar Ahora
              </a>
            </div>
          </div>
          <div class="flex flex-col items-center justify-center p-8">
            <div class="relative aspect-[7/8] h-full w-full">
              <div class="absolute right-[50%] top-[12%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="<?php echo get_theme_file_uri('assets/images/placeholder-participacion.jpg'); ?>" alt="Participación 1" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+1'">
              </div>
              <div class="absolute right-[50%] top-[36%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="<?php echo get_theme_file_uri('assets/images/placeholder-participacion.jpg'); ?>" alt="Participación 2" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+2'">
              </div>
              <div class="absolute bottom-[36%] left-[54%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="<?php echo get_theme_file_uri('assets/images/placeholder-participacion.jpg'); ?>" alt="Participación 3" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+3'">
              </div>
              <div class="absolute bottom-[12%] left-[54%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="<?php echo get_theme_file_uri('assets/images/placeholder-participacion.jpg'); ?>" alt="Participación 4" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+4'">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Sección 2: Formación Ciudadana -->
  <section class="py-32">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">
        <img
          src="<?php echo get_theme_file_uri('assets/images/formacion-ciudadana.jpg'); ?>"
          alt="Formación Ciudadana Digital"
          class="max-h-96 w-full rounded-md object-cover shadow-lg"
          onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Formación+Ciudadana'"
        />
        <div class="flex flex-col lg:text-left">
          <span class="flex size-12 items-center justify-center rounded-full bg-blue-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6H5c-1.1 0-2 .9-2 2v3.3c0 .7.3 1.3.8 1.8L8 17l.1.1c.5.4.8 1 .8 1.7V21c0 .6.4 1 1 1h4c.6 0 1-.4 1-1v-2.2c0-.7.3-1.3.8-1.7L20 13c.5-.4.8-1.1.8-1.8V8c0-1.1-.9-2-2-2zm-8 10v-3h4v3h-4z"/>
            </svg>
          </span>
          <h2 class="my-6 text-pretty text-3xl font-bold text-blue-900 lg:text-4xl">
            Formación Ciudadana Digital
          </h2>
          <p class="mb-8 max-w-xl text-blue-900 lg:max-w-none lg:text-lg">
            Desarrollamos programas de capacitación y talleres especializados para fortalecer las competencias digitales y habilidades de comunicación ética en el entorno mediático actual.
          </p>
          <ul class="ml-4 space-y-4 text-left">
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg">
                Talleres de alfabetización mediática e informacional con enfoque de paz
              </p>
            </li>
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg">
                Capacitación en uso ético y responsable de tecnologías emergentes
              </p>
            </li>
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg">
                Desarrollo de habilidades para la creación de contenido digital responsable
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
    
    <!-- Sección 5: Historias de Impacto -->
    <section class="py-32 bg-blue-50">
      <div class="container mx-auto px-4">
        <div class="flex flex-col gap-6">
          <!-- Historia Principal -->
          <div class="grid grid-cols-1 items-stretch gap-x-0 gap-y-4 lg:grid-cols-3 lg:gap-4">
            <img
              src="<?php echo get_theme_file_uri('assets/images/historia-principal.jpg'); ?>"
              alt="Historia de Impacto Principal"
              class="h-72 w-full rounded-md object-cover lg:h-auto shadow-lg"
              onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Historia+Principal'"
            />
            <div class="col-span-2 flex items-center justify-center p-8 bg-white rounded-lg shadow-lg">
              <div class="flex flex-col gap-4">
                <q class="text-xl font-medium text-blue-900 lg:text-3xl">
                  A través del programa Total Transmedia, nuestra comunidad ha desarrollado habilidades digitales que nos permiten compartir nuestras historias y construir un diálogo más constructivo en el entorno digital.
                </q>
                <div class="flex flex-col items-start">
                  <p class="text-blue-900 font-semibold">María González</p>
                  <p class="text-blue-600">Líder Comunitaria, Medellín</p>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Historias Secundarias -->
          <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <!-- Historia 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <div class="px-6 pt-6 leading-7 text-blue-900">
                <q>
                  Los talleres de alfabetización mediática me ayudaron a entender mejor cómo verificar información y crear contenido responsable para mi comunidad.
                </q>
              </div>
              <div class="px-6 pt-6">
                <div class="flex gap-4 leading-5">
                  <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                    JR
                  </div>
                  <div class="text-sm">
                    <p class="font-medium text-blue-900">Juan Ramírez</p>
                    <p class="text-blue-600">Estudiante, Bogotá</p>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Historia 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <div class="px-6 pt-6 leading-7 text-blue-900">
                <q>
                  Gracias al programa, hemos creado una red de comunicadores comunitarios que promueven la paz y el diálogo en nuestro territorio.
                </q>
              </div>
              <div class="px-6 pt-6">
                <div class="flex gap-4 leading-5">
                  <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                    CP
                  </div>
                  <div class="text-sm">
                    <p class="font-medium text-blue-900">Carolina Patiño</p>
                    <p class="text-blue-600">Comunicadora Social, Cali</p>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Historia 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
              <div class="px-6 pt-6 leading-7 text-blue-900">
                <q>
                  El impacto del programa en nuestra comunidad ha sido transformador. Ahora tenemos las herramientas para contar nuestras propias historias digitalmente.
                </q>
              </div>
              <div class="px-6 pt-6">
                <div class="flex gap-4 leading-5">
                  <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                    AL
                  </div>
                  <div class="text-sm">
                    <p class="font-medium text-blue-900">Ana López</p>
                    <p class="text-blue-600">Gestora Cultural, Barranquilla</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</main>

<?php get_footer(); ?>
