<?php
/**
 * Template Name: Preguntas Frecuentes
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $header = get_field('page_header') ?: array();
    get_template_part('template-parts/page-header', null, array(
        'title' => isset($header['title']) ? $header['title'] : 'Preguntas Frecuentes',
        'subtitle' => isset($header['subtitle']) ? $header['subtitle'] : 'Encuentra respuestas a las preguntas más comunes.',
        'show_cta' => isset($header['show_cta']) ? $header['show_cta'] : false,
        'cta_text' => isset($header['cta_text']) ? $header['cta_text'] : 'Contactar soporte',
        'cta_url' => isset($header['cta_url']) ? $header['cta_url'] : '/contacto',
        'show_credit_card_text' => isset($header['show_credit_card_text']) ? $header['show_credit_card_text'] : false,
        'credit_card_text' => isset($header['credit_card_text']) ? $header['credit_card_text'] : ''
    ));
    ?>

    <style>
        .faq-content {
            display: none;
        }
        .faq-content.active {
            display: block;
        }
        .tab-panel {
            display: block;
        }
        .tab-panel.hidden {
            display: none !important;
        }
    </style>

    <section class="py-32">
            <div class="container">
                <div>
                    <?php
                    $faq_content = get_field('faq_content') ?: array();
                    $badge_text = isset($faq_content['badge_text']) ? $faq_content['badge_text'] : 'FAQ';
                    $main_title = isset($faq_content['main_title']) ? $faq_content['main_title'] : 'Preguntas y Respuestas Frecuentes';
                    $description = isset($faq_content['description']) ? $faq_content['description'] : 'Descubre toda la información esencial sobre nuestra plataforma y cómo puede satisfacer tus necesidades.';
                    ?>
                    <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80 text-xs font-medium"><?php echo esc_html($badge_text); ?></div>
                    <h1 class="mt-4 text-4xl font-semibold"><?php echo esc_html($main_title); ?></h1>
                    <p class="mt-6 font-medium text-muted-foreground"><?php echo esc_html($description); ?></p>
            
            <!-- Tabs -->
            <div class="mt-8 mb-8">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px overflow-x-auto" aria-label="Tabs">
                        <button class="tab-button text-blue-600 border-blue-600 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="digitalia">
                            Digitalia
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="academia">
                            Academia
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="enlinea">
                            En Línea
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="transmedia">
                            Total Transmedia
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="colaboratorios">
                            Colaboratorios
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="ready">
                            Ready
                        </button>
                        <button class="tab-button text-gray-500 border-transparent whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="otros">
                            Otros
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Tab Panels -->
            <div class="tab-panels">
                <div id="digitalia" class="tab-panel">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es el objetivo principal del programa Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Digital-IA busca desplegar un programa nacional de educomunicación y alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz. Su objetivo es garantizar la producción, desarrollo tecnológico y difusión nacional de contenidos digitales para la paz mediática, alineándose con el Plan Nacional de Desarrollo y los Objetivos de Desarrollo Sostenible de la ONU.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Por qué es necesario un programa de alfabetización mediática en la actualidad?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Las tecnologías emergentes de comunicación tienen un impacto significativo en la modelación de imaginarios y cotidianidades ciudadanas. Aunque se ha avanzado en reducir la brecha digital, es necesario abordar los desafíos de la comunicación digital, sus efectos en la toma de decisiones ciudadanas, y la preservación de derechos humanos, democracia y diversidad cultural.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo ha cambiado el papel del ciudadano en la comunicación actual?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                En la actualidad, cada ciudadano con dispositivos inteligentes conectados es potencialmente un medio de comunicación, un consumidor y un prosumidor informativo. Este nuevo rol implica tanto derechos como responsabilidades, incluyendo obligaciones informacionales que deben ser conocidas y comprendidas.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué desafíos presenta la cuarta y quinta revolución industrial en términos de comunicación?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Las tecnologías ya no son exclusivas del ámbito público o productivo, sino que son modeladoras sistemáticas de lo cognitivo. Esto incluye el análisis de datos masivos, la IA aplicada a tendencias de opinión, el neuromarketing y la desinformación, presentando nuevos retos civilizatorios que requieren atención.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es el enfoque de Digital-IA respecto a la democratización de los medios?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Digital-IA promueve la democratización del saber aplicado a la comunicación de base tecnológica, buscando crear un modelo singular que empodere a la ciudadanía como actor comunicacional con método propio, escuelas propias y aliados propios para fortalecer la comunicación como derecho de expresión.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo aborda Digital-IA el tema de la desinformación?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El programa provee herramientas y educación para que los ciudadanos puedan identificar y combatir la desinformación, entendiendo que la calidad de la información es crucial para la toma de decisiones. Se enfoca en desarrollar capacidades críticas y habilidades para evaluar la veracidad de la información.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué papel juega la paz en el programa Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La paz es un componente fundamental del programa, que busca elevar habilidades tecnológicas ciudadanas y capacidades comunicacionales enmarcadas en la paz. Esto incluye el fortalecimiento de la resiliencia, la protección y los usos éticos de tecnologías emergentes en el ejercicio del derecho de expresión.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo se diferencia Digital-IA de otros programas gubernamentales de comunicación?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                A diferencia de programas tradicionales que se enfocan en gremios o sectores específicos, Digital-IA coloca a las ciudadanías en el centro del escenario de aprendizaje, construyendo espacios colaborativos de transmisión de saberes y creando escuelas ciudadanas enfocadas en el derecho y deber de la comunicación en el marco de la paz.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué responsabilidades tienen los ciudadanos en el nuevo ecosistema mediático?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Los ciudadanos, como actores comunicacionales, tienen la responsabilidad de verificar la información que consumen y comparten, respetar los derechos de otros, evitar la propagación de desinformación y discursos de odio, y usar las tecnologías de manera ética y constructiva para el bien común.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué impacto busca tener Digital-IA en la sociedad colombiana?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El programa busca elevar las habilidades, competencias y capacidades comunicacionales TIC en la población colombiana, contribuyendo a una sociedad más informada, crítica y responsable en el uso de tecnologías emergentes, mientras promueve la paz mediática y el fortalecimiento democrático.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="academia" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué es AcadeMÍA Digital-IA y cuál es su propósito?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                AcadeMÍA Digital-IA es una plataforma de autoformación virtual que ofrece contenidos educativos sobre nuevos paradigmas tecnológicos con enfoque de paz mediática. Su propósito es proporcionar educación continua y accesible sobre desafíos, derechos y deberes ciudadanos en el entorno digital.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué tipo de contenidos ofrece la plataforma?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La plataforma ofrece 288 contenidos audiovisuales distribuidos en diferentes categorías temáticas, incluyendo Paz y Producción Digital, con ejes multimedia y crossmedia. Los contenidos abarcan temas como edición de video, fotografía, audio, producción de contenidos web y narrativas digitales.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es la duración de los contenidos educativos?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Cada contenido audiovisual tiene una duración máxima de 8 a 10 minutos, diseñado para ser conciso y efectivo. Esta duración está optimizada para mantener la atención del usuario y facilitar el aprendizaje por módulos.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué herramientas de producción digital se enseñan?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La plataforma enseña el uso de herramientas como DaVinci Resolve para edición de video, Gimp para edición fotográfica, Audacity para edición de audio, además de técnicas de producción de contenido web y gestión de redes sociales.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es la disponibilidad de la plataforma?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El ecosistema Digital-IA y la plataforma de autoformación están disponibles los siete días de la semana, las 24 horas del día, garantizando acceso continuo y soporte técnico para asegurar la interoperabilidad y facilidad de uso.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué aspectos de narrativa digital se cubren?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Se cubren temas como narrativas expandidas, interactividad, coherencia y continuidad del mensaje, producción narrativa y engagement. Estos aspectos son fundamentales para crear contenido digital efectivo y significativo.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo se garantiza la calidad de los contenidos?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Los contenidos son producidos por equipos profesionales especializados, incluyendo expertos en cada tema, realizadores audiovisuales y técnicos. Se siguen estrictos estándares técnicos de producción para asegurar la mejor calidad audiovisual.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué requisitos técnicos tienen los contenidos?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Los contenidos audiovisuales cumplen con altos estándares técnicos, incluyendo calidad de video HD, audio profesional y formatos optimizados para la web. Además, se asegura la accesibilidad mediante subtítulos y otros elementos inclusivos.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo se estructura el aprendizaje en la plataforma?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El aprendizaje está organizado por categorías temáticas y subcategorías, permitiendo una progresión lógica en el desarrollo de habilidades. Los contenidos están diseñados para ser autoguiados, permitiendo que cada usuario avance a su propio ritmo.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué beneficios ofrece la formación en AcadeMÍA Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La formación ofrece desarrollo de habilidades prácticas en producción digital, comprensión de narrativas modernas, capacitación en herramientas específicas y conocimiento sobre paz mediática. Todo esto contribuye a formar ciudadanos digitales más competentes y conscientes.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="enlinea" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué es "En Línea con Digital-IA"?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Es una serie web dedicada a difundir acciones ciudadanas, públicas, privadas y asociativas que promueven la paz en Colombia, mostrando iniciativas positivas y transformadoras en todo el país.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué tipo de contenido presenta la serie web?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La serie presenta historias y acciones afirmativas de paz, mostrando iniciativas ciudadanas, institucionales y comunitarias que contribuyen a la construcción de paz en diferentes regiones de Colombia.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es el objetivo principal de la serie?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El objetivo es visibilizar y difundir acciones positivas de paz, promoviendo la participación ciudadana y fortaleciendo el tejido social a través de la comunicación digital y las nuevas tecnologías.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Dónde puedo ver la serie web?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La serie está disponible en la plataforma Digital-IA y se difunde a través de diferentes canales digitales y redes sociales para garantizar un amplio alcance y accesibilidad.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo puedo participar o sugerir una historia para la serie?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Puedes contactar al equipo de Digital-IA a través de la plataforma o redes sociales para proponer historias o iniciativas que promuevan la paz y la transformación social en tu comunidad.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="transmedia" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué es la estrategia Total Transmedia?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Es una estrategia integral para expandir el mensaje de Digital-IA, generar reconocimiento internacional, nacional y regional, y crear sinergias entre la ciudadanía y el sistema Digital-IA a través de múltiples plataformas y medios.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué canales de difusión utiliza Total Transmedia?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                La estrategia utiliza múltiples canales digitales, incluyendo redes sociales, microportales informativos, plataformas web y medios tradicionales para asegurar una amplia difusión del contenido y mensajes del programa.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué tipo de contenido se produce en Total Transmedia?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Se produce contenido multiplataforma que incluye campañas digitales, material audiovisual, contenido para redes sociales y materiales educativos, todos enfocados en la promoción de la paz mediática y la alfabetización digital.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo se integra con los otros módulos de Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Total Transmedia se integra con AcadeMÍA y En Línea, amplificando su alcance y creando una experiencia educativa completa que conecta los diferentes componentes del programa a través de diversas plataformas y formatos.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es el impacto esperado de la estrategia Total Transmedia?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Se espera generar un impacto significativo en la promoción de la paz mediática, aumentar la participación ciudadana en temas digitales y crear una red activa de usuarios comprometidos con la transformación social a través de las tecnologías emergentes.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="colaboratorios" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué son los Colaboratorios de Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Los Colaboratorios son espacios de trabajo colaborativo donde ciudadanos, organizaciones y comunidades se unen para desarrollar proyectos y compartir conocimientos sobre comunicación digital y paz mediática.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué actividades se realizan en los Colaboratorios?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Se desarrollan talleres prácticos, sesiones de formación, proyectos comunitarios y actividades de producción de contenido digital, enfocados en fortalecer las capacidades comunicativas y tecnológicas de los participantes.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Quiénes pueden participar en los Colaboratorios?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Están abiertos a ciudadanos, organizaciones sociales, comunidades y cualquier persona interesada en aprender y compartir conocimientos sobre comunicación digital, paz mediática y tecnologías emergentes.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo se conectan los Colaboratorios con Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Los Colaboratorios son parte integral del ecosistema Digital-IA, funcionando como espacios prácticos donde se aplican los conocimientos adquiridos en la plataforma y se generan nuevos contenidos para la estrategia transmedia.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuál es el objetivo principal de los Colaboratorios?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                El objetivo es crear espacios de co-creación y aprendizaje colaborativo donde se desarrollen proyectos que promuevan la paz mediática y fortalezcan las capacidades comunicativas de las comunidades en el entorno digital.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ready" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué es Ready en Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Ready es el componente de preparación y alistamiento del programa Digital-IA, diseñado para asegurar que los usuarios estén equipados con las herramientas y conocimientos necesarios para participar efectivamente en el ecosistema digital.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué recursos ofrece Ready?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Proporciona guías de inicio rápido, tutoriales básicos, materiales de orientación y recursos introductorios para ayudar a los usuarios a familiarizarse con las herramientas y metodologías del programa.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo me preparo para comenzar con Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Comienza explorando los materiales introductorios de Ready, que te guiarán paso a paso en el uso de la plataforma, la participación en los módulos y el acceso a los diferentes recursos disponibles.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Qué habilidades básicas necesito?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Solo necesitas conocimientos básicos de navegación en internet y disposición para aprender. Ready está diseñado para guiarte desde un nivel básico hasta el dominio de las herramientas digitales necesarias.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo accedo al soporte técnico en Ready?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Ready cuenta con un sistema de soporte disponible 24/7 que incluye guías de solución de problemas, canales de asistencia técnica y recursos de ayuda para resolver cualquier dificultad que puedas encontrar.
                            </div>
                        </div>
                    </div>
                </div>

                <div id="otros" class="tab-panel hidden">
                    <div class="space-y-4">
                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo puedo reportar problemas técnicos?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Puedes reportar problemas técnicos a través del sistema de soporte disponible 24/7, utilizando el formulario de contacto en la plataforma o escribiendo directamente al equipo de soporte técnico.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cuáles son los requisitos técnicos mínimos?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Necesitas un dispositivo con conexión a internet, un navegador web actualizado y capacidad para reproducir contenido multimedia. La plataforma está optimizada para funcionar en computadores, tablets y teléfonos móviles.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo puedo sugerir mejoras al programa?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Valoramos tus sugerencias y comentarios. Puedes compartir tus ideas a través del formulario de retroalimentación en la plataforma o participando en las encuestas periódicas de mejora continua.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Existe algún costo por usar Digital-IA?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Digital-IA es un programa público del Ministerio de Tecnologías de Información y Comunicación de Colombia, por lo que el acceso a sus recursos y contenidos es completamente gratuito para todos los usuarios.
                            </div>
                        </div>

                        <div class="faq-item">
                            <button class="faq-button w-full flex items-center justify-between py-4 font-medium hover:text-gray-500">
                                <h3>¿Cómo puedo mantenerme actualizado sobre novedades?</h3>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200"><path d="m6 9 6 6 6-6"></path></svg>
                            </button>
                            <div class="faq-content px-4 pb-4">
                                Sigue nuestras redes sociales, suscríbete al boletín informativo y visita regularmente la plataforma para estar al tanto de nuevos contenidos, actualizaciones y eventos del programa Digital-IA.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php wp_enqueue_script('digitalia-tabs', get_template_directory_uri() . '/js/tabs.js', array(), '1.0', true); ?>

<?php get_footer(); ?>
