<?php
/**
 * The header for our theme
 *
 * @package Digitalia
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="font-sans">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>

	<!-- Dark Mode Initialization (Shadcnblocks compatible) -->
	<script>
		// Initialize dark mode from localStorage before page renders to prevent flash
		(function() {
			const theme = localStorage.getItem('digitalia-theme') || 'light';
			if (theme === 'dark') {
				document.documentElement.classList.add('dark');
			}
		})();
	</script>

	<!-- Add tab functionality -->
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Handle mobile accordion
		document.querySelectorAll('[data-orientation="vertical"] button').forEach(button => {
			button.addEventListener('click', function() {
				const panel = document.getElementById(this.getAttribute('aria-controls'));
				const isOpen = this.getAttribute('aria-expanded') === 'true';
				
				this.setAttribute('aria-expanded', !isOpen);
				this.setAttribute('data-state', isOpen ? 'closed' : 'open');
				panel.hidden = isOpen;
				panel.setAttribute('data-state', isOpen ? 'closed' : 'open');
			});
		});

		// Handle desktop tabs
		const tabButtons = document.querySelectorAll('[role="tab"]');
		const tabPanels = document.querySelectorAll('[role="tabpanel"]');

		tabButtons.forEach(button => {
			button.addEventListener('click', function() {
				// Deactivate all tabs
				tabButtons.forEach(btn => {
					btn.setAttribute('aria-selected', 'false');
					btn.setAttribute('data-state', 'inactive');
					btn.setAttribute('tabindex', '-1');
				});

				// Hide all panels
				tabPanels.forEach(panel => {
					panel.setAttribute('data-state', 'inactive');
					panel.hidden = true;
				});

				// Activate clicked tab
				this.setAttribute('aria-selected', 'true');
				this.setAttribute('data-state', 'active');
				this.setAttribute('tabindex', '0');

				// Show corresponding panel
				const panelId = this.getAttribute('aria-controls');
				const panel = document.getElementById(panelId);
				panel.setAttribute('data-state', 'active');
				panel.hidden = false;
			});
		});
	});
	</script>
	
	<!-- Responsive adjustments for menu -->
	<style>
		@media (max-width: 1300px) {
			.nav-top-link {
				font-size: 0.75rem !important; /* Reducir tamaño de fuente en pantallas pequeñas */
				padding-left: 0.5rem !important;
				padding-right: 0.5rem !important;
			}
			.flex.items-center {
				margin-right: 0.25rem !important;
			}
			.space-x-6 > :not([hidden]) ~ :not([hidden]) {
				--tw-space-x-reverse: 0;
				margin-right: calc(1rem * var(--tw-space-x-reverse)) !important;
				margin-left: calc(1rem * calc(1 - var(--tw-space-x-reverse))) !important;
			}
		}
		
		@media (max-width: 1100px) {
			.space-x-6 > :not([hidden]) ~ :not([hidden]) {
				--tw-space-x-reverse: 0;
				margin-right: calc(2px * var(--tw-space-x-reverse)) !important;
				margin-left: calc(2px * calc(1 - var(--tw-space-x-reverse))) !important;
			}
			.nav-top-link {
				font-size: 0.7rem !important; /* Reducir aún más el tamaño de fuente */
				padding-left: 0.25rem !important;
				padding-right: 0.25rem !important;
			}
		}
	</style>
</head>

<body <?php body_class(); ?>>

<!-- Gov.co Bar -->
<div class="w-full bg-[#3366CC] h-10 flex items-center">
    <div class="container mx-auto px-8">
        <img src="/wp-content/uploads/2024/11/header_govco.png" alt="Gov.co" class="h-6">
    </div>
</div>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'digitalia'); ?></a>

	<nav x-data="{ open: false }" class="sticky top-0 z-60 bg-black font-mono" id="main-navigation">
		<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
			<div class="relative flex h-16 items-center justify-between">
				<div class="flex flex-1 items-center z-50">
					<div class="flex shrink-0 items-center" id="site-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img class="h-8 w-auto nav-logo" src="/wp-content/uploads/2024/11/logo3-white.png" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
				</div>
				<div class="grow flex items-center justify-center sm:items-stretch sm:justify-end z-40">
					<div class="hidden sm:ml-6 sm:block w-full">
						<div class="flex space-x-4 justify-end" id="desktop-menu">
							<ul class="flex space-x-6">
								<li class="flex items-center">
									<a href="/que-es-digitalia/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Qué es Digitalia
									</a>
								</li>
								<li class="relative group">
									<div class="flex flex-col">
										<div class="flex items-center">
											<a href="#" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
												Módulos
											</a>
											<button type="button" class="ml-1 text-gray-300 nav-chevron">
												<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</button>
										</div>
										<div class="hidden group-hover:block absolute top-full pt-2 left-0 nav-submenu">
											<div class="w-96 bg-white rounded-md shadow-lg z-50">
												<div class="p-4 grid grid-cols-1 gap-4">
													<a href="/modulos/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-26-at-12.25.25%E2%80%AFPM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Módulos Digitalia</div>
															<div class="text-xs text-gray-500 nav-menu-description">El proyecto Digitalia se desarrolla en cinco módulos.</div>
														</div>
													</a>
													<a href="/modulos/academia/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-12.27.21 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Academia</div>
															<div class="text-xs text-gray-500 nav-menu-description">Plataforma de autoformación en paradigmas tecnológicos y paz mediática.</div>
														</div>
													</a>
													<a href="/modulos/en-linea/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.48 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">En Línea</div>
															<div class="text-xs text-gray-500 nav-menu-description">Serie web sobre acciones ciudadanas y públicas por la paz.</div>
														</div>
													</a>
													<a href="/modulos/total-transmedia/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.05 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Total Transmedia</div>
															<div class="text-xs text-gray-500 nav-menu-description">Estrategia de expansión Digital-IA y sinergias ciudadanas.</div>
														</div>
													</a>
													<a href="/modulos/colaboratorios/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.22.28 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">CoLaboratorios</div>
															<div class="text-xs text-gray-500 nav-menu-description">Espacios de aprendizaje y construcción de paz mediática.</div>
														</div>
													</a>
													<a href="/modulos/ready/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.23.02 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">REaDy</div>
															<div class="text-xs text-gray-500 nav-menu-description">Red de alfabetizadores en paz mediática y tecnologías.</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="relative group">
									<div class="flex flex-col">
										<div class="flex items-center">
											<a href="#" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
												Biblioteca Digital
											</a>
											<button type="button" class="ml-1 text-gray-300 nav-chevron">
												<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</button>
										</div>
										<div class="hidden group-hover:block absolute top-full pt-2 left-0 nav-submenu">
											<div class="w-48 bg-white rounded-md shadow-lg z-50">
												<div class="py-1">
													<a href="/biblioteca-digital/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Biblioteca Digitalia</a>
													<a href="/kit-social-media/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kit abc AMI</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="flex items-center">
									<a href="/blog-y-noticias/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Blog
									</a>
								</li>
								<li class="flex items-center">
									<a href="/preguntas-frecuentes/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Preguntas Frecuentes
									</a>
								</li>
								<li class="flex items-center">
									<a href="/contacto/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Contacto
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
					<ul class="flex items-center space-x-4 nav-social-icons">
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://www.instagram.com/digitalia_col/" target="_blank"><i class="fa-brands fa-instagram size-5"></i></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://www.facebook.com/digitaliacol/" target="_blank"><i class="fa-brands fa-facebook size-5"></i></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://x.com/Digitalia_Col" target="_blank"><i class="fa-brands fa-x-twitter size-5"></i></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://www.linkedin.com/company/digital-ia-educomunicaci%c3%b3n-para-la-paz/about" target="_blank"><i class="fa-brands fa-linkedin size-5"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Mobile menu -->
		<div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden fixed bottom-16 left-0 right-0 bg-black z-50" id="mobile-menu" x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-y-0" x-transition:leave-end="transform translate-y-full">
			<div class="space-y-1 px-2 pb-3 pt-2 max-h-[80vh] overflow-y-auto">
				<a href="/que-es-digitalia/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Qué es Digitalia
				</a>
				
				<!-- Módulos Dropdown -->
				<div x-data="{ modulesOpen: false }" class="relative">
					<button @click="modulesOpen = !modulesOpen" class="w-full text-left flex items-center justify-between text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-base font-medium uppercase">
						<span>Módulos</span>
						<svg class="w-4 h-4" :class="{ 'transform rotate-180': modulesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</button>
					<div x-show="modulesOpen" class="px-4 py-2 space-y-2 bg-white">
						<a href="/modulos/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-26-at-12.25.25%E2%80%AFPM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Módulos Digitalia</div>
								<div class="text-xs text-gray-500 nav-menu-description">El proyecto Digitalia se desarrolla en cinco módulos.</div>
							</div>
						</a>
						<a href="/modulos/academia/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-12.27.21 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Academia</div>
								<div class="text-xs text-gray-500 nav-menu-description">Plataforma de autoformación en paradigmas tecnológicos y paz mediática.</div>
							</div>
						</a>
						<a href="/modulos/en-linea/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.48 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">En Línea</div>
								<div class="text-xs text-gray-500 nav-menu-description">Serie web sobre acciones ciudadanas y públicas por la paz.</div>
							</div>
						</a>
						<a href="/modulos/total-transmedia/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.05 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Total Transmedia</div>
								<div class="text-xs text-gray-500 nav-menu-description">Estrategia de expansión Digital-IA y sinergias ciudadanas.</div>
							</div>
						</a>
						<a href="/modulos/colaboratorios/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.22.28 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">CoLaboratorios</div>
								<div class="text-xs text-gray-500 nav-menu-description">Espacios de aprendizaje y construcción de paz mediática.</div>
							</div>
						</a>
						<a href="/modulos/ready/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.23.02 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">REaDy</div>
								<div class="text-xs text-gray-500 nav-menu-description">Red de alfabetizadores en paz mediática y tecnologías.</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Biblioteca Digital Dropdown -->
				<div x-data="{ bibliotecaOpen: false }" class="relative">
					<button @click="bibliotecaOpen = !bibliotecaOpen" class="w-full text-left flex items-center justify-between text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-base font-medium uppercase">
						<span>Biblioteca Digital</span>
						<svg class="w-4 h-4" :class="{ 'transform rotate-180': bibliotecaOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</button>
					<div x-show="bibliotecaOpen" class="px-4 py-2 space-y-1">
						<a href="/biblioteca-digital/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Biblioteca Digitalia</a>
						<a href="/video/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Kit Social Media</a
						<a href="/redes-sociales/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Redes sociales</a>
					</div>
				</div>

				<a href="/preguntas-frecuentes/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Preguntas Frecuentes
				</a>

				<a href="/blog-y-noticias/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Blog
				</a>

				<a href="/contacto/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Contacto
				</a>
			</div>
		</div>
	</nav>

	<?php get_template_part('template-parts/secondary-nav'); ?>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			$digitalia_description = get_bloginfo( 'description', 'display' );
			if ( $digitalia_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $digitalia_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->
