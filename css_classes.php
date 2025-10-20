<?php
/**
 * Test file for Tailwind colors
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
    <div class="p-8 space-y-8">
        <!-- Academia -->
        <div class="bg-yellow-200 p-6 rounded-lg">
            <h2 class="text-yellow-950 text-2xl font-bold">Academia</h2>
            <p class="text-yellow-800 mt-2">Subtitle text here</p>
            <div class="bg-yellow-300/30 p-4 mt-4 text-yellow-600">Highlighted content</div>
            <div class="bg-yellow-300 p-4 mt-4">Grid content</div>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- En Linea -->
        <div class="bg-red-200 p-6 rounded-lg">
            <h2 class="text-red-950 text-2xl font-bold text-red-700">En Linea</h2>
            <p class="text-red-800 mt-2">Subtitle text here</p>
            <div class="bg-red-300/30 p-4 mt-4 text-red-600">Highlighted content</div>
            <div class="bg-red-300 p-4 mt-4">Grid content</div>
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Colaboratorio -->
        <div class="bg-teal-200 p-6 rounded-lg text-teal-600 text-teal-700">
            <h2 class="text-teal-950 text-2xl font-bold">Colaboratorio</h2>
            <p class="text-teal-800 mt-2">Subtitle text here</p>
            <div class="bg-teal-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-teal-300 p-4 mt-4">Grid content</div>
            <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Total Transmedia -->
        <div class="bg-blue-300 p-6 rounded-lg">
            <h2 class="text-blue-950 text-2xl font-bold text-blue-700">Total Transmedia</h2>
            <p class="text-blue-800 mt-2">Subtitle text here</p>
            <div class="bg-blue-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-blue-300 p-4 mt-4">Grid content</div>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Ready -->
        <div class="bg-purple-200 p-6 rounded-lg text-purple-600 text-purple-700">
            <h2 class="text-purple-950 text-2xl font-bold">Ready</h2>
            <p class="text-purple-800 mt-2">Subtitle text here</p>
            <div class="bg-purple-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-purple-300 p-4 mt-4">Grid content</div>
            <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>
    </div>
</body>
</html>


<section id="cursos" class="text-white overflow-hidden py-32" style="background-color: #010819;">
		<div class="container flex w-full flex-col items-center justify-center px-4">
			<p class="bg-white/10 mb-4 rounded-full px-2 py-1 text-xs uppercase tracking-wide text-white">Cursos Digitalia</p>
			<h2 class="relative py-2 text-center font-sans text-5xl font-semibold tracking-tighter lg:text-6xl text-white">Formación para la Paz</h2>
			<p class="text-md mx-auto mt-5 max-w-xl px-5 text-center lg:text-lg text-gray-300">Tres rutas de aprendizaje diseñadas para enfrentar los desafíos de la desinformación y fortalecer capacidades ciudadanas.</p>

			<div class="mt-10 grid w-full max-w-5xl grid-cols-1 gap-3 md:grid-cols-2 lg:grid-cols-3">

								<!-- Curso: Crossmedia + AMI + IA -->
				<div class="bg-gray-900/60 flex flex-col rounded-3xl p-4">
					<div class="bg-gradient-to-br from-blue-500 to-blue-700 p-4 max-w-md w-full rounded-xl h-48 flex items-center justify-center overflow-hidden relative">
												<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="opacity-20 absolute">
							<rect x="16" y="16" width="6" height="6" rx="1"></rect><rect x="2" y="16" width="6" height="6" rx="1"></rect><rect x="9" y="2" width="6" height="6" rx="1"></rect><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"></path><path d="M12 12V8"></path>						</svg>
											</div>
					<div class="mt-3 flex items-center justify-start gap-3">
						<h3 class="text-2xl font-semibold tracking-tighter text-white">Crossmedia + AMI + IA</h3>
												<span class="bg-blue-500/20 text-blue-300 inline-block rounded-xl px-3 text-sm">Nuevo</span>
											</div>
					<p class="text-gray-400 mt-2 text-sm">Crea universos narrativos con IA y enfoque de Alfabetización Mediática Informacional para combatir la desinformación.</p>
					<div class="mt-5 flex items-center justify-between">
						<a href="https://digitalia.gov.co/crossmedia" class="bg-white/10 hover:bg-blue-500 hover:text-white transition-colors flex h-full items-center justify-center gap-2 rounded-full px-7 py-2 text-sm text-white">
							Explorar curso							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
								<path d="M5 12h14"></path>
								<path d="m12 5 7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
								<!-- Curso: Multimedia + Sostenibilidad -->
				<div class="bg-gray-900/60 flex flex-col rounded-3xl p-4">
					<div class="bg-gradient-to-br from-teal-500 to-teal-700 p-4 max-w-md w-full rounded-xl h-48 flex items-center justify-center overflow-hidden relative">
												<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="opacity-20 absolute">
							<path d="M20.2 6 3 11l-.9-2.4c-.3-1.1.3-2.2 1.3-2.5l13.5-4c1.1-.3 2.2.3 2.5 1.3Z"></path><path d="m6.2 5.3 3.1 3.9"></path><path d="m12.4 3.4 3.1 4"></path><path d="M3 11h18v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"></path>						</svg>
											</div>
					<div class="mt-3 flex items-center justify-start gap-3">
						<h3 class="text-2xl font-semibold tracking-tighter text-white">Multimedia + Sostenibilidad</h3>
											</div>
					<p class="text-gray-400 mt-2 text-sm">Genera contenido de alta calidad con herramientas libres para los desafíos ciudadanos y la paz mediática.</p>
					<div class="mt-5 flex items-center justify-between">
						<a href="https://digitalia.gov.co/multimedia" class="bg-white/10 hover:bg-teal-500 hover:text-white transition-colors flex h-full items-center justify-center gap-2 rounded-full px-7 py-2 text-sm text-white">
							Explorar curso							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
								<path d="M5 12h14"></path>
								<path d="m12 5 7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
								<!-- Curso: Transmedia -->
				<div class="bg-gray-900/60 flex flex-col rounded-3xl p-4">
					<div class="bg-gradient-to-br from-purple-500 to-purple-700 p-4 max-w-md w-full rounded-xl h-48 flex items-center justify-center overflow-hidden relative">
												<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="opacity-20 absolute">
							<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path><path d="M20 3v4"></path><path d="M22 5h-4"></path><path d="M4 17v2"></path><path d="M5 18H3"></path>						</svg>
											</div>
					<div class="mt-3 flex items-center justify-start gap-3">
						<h3 class="text-2xl font-semibold tracking-tighter text-white">Transmedia</h3>
											</div>
					<p class="text-gray-400 mt-2 text-sm">Revoluciona la narración llevando historias a múltiples plataformas donde la audiencia interactúa y es parte del relato.</p>
					<div class="mt-5 flex items-center justify-between">
						<a href="https://digitalia.gov.co/transmedia" class="bg-white/10 hover:bg-purple-500 hover:text-white transition-colors flex h-full items-center justify-center gap-2 rounded-full px-7 py-2 text-sm text-white">
							Explorar curso							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
								<path d="M5 12h14"></path>
								<path d="m12 5 7 7-7 7"></path>
							</svg>
						</a>
					</div>
				</div>
				
			</div>
		</div>
	</section>

<div class="md:grid-cols-2 lg:grid-cols-3 lg:grid-cols-4 grayscale opacity-60 cursor-default hover:before:bg-black/30">
</div>