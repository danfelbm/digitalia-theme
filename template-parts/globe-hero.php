<?php
/**
 * Template part for displaying the 3D Globe
 *
 * @package digitalia
 */
?>

<!-- Globe Canvas Container - SIN restricciones de tamaño -->
<div id="globe-canvas" class="digitalia-globe-canvas"></div>

<!-- Optional: Loading State - Transparent -->
<div id="globe-loading" class="absolute inset-0 z-50 flex items-center justify-center transition-opacity duration-500" style="background: transparent;">
	<div class="text-center">
		<div class="inline-block h-12 w-12 animate-spin rounded-full border-4 border-white border-t-transparent opacity-50"></div>
		<p class="text-white mt-4 text-sm opacity-50">Cargando globo...</p>
	</div>
</div>

<style>
/* Globe-specific styles - Canvas MASIVO para evitar clipping */
.digitalia-globe-canvas {
	position: relative;
	width: 100%;
	height: 100%;
	overflow: visible !important;
}

.digitalia-globe-canvas canvas {
	display: block;
	/* Canvas is positioned and sized by Three.js */
}

#globe-canvas {
	overflow: visible !important;
}

/* Hide loading state once globe is ready */
.digitalia-globe-canvas.globe-ready ~ #globe-loading {
	opacity: 0;
	pointer-events: none;
}
</style>

<script>
// Hide loading overlay once globe initializes
document.addEventListener('DOMContentLoaded', function() {
	setTimeout(function() {
		const canvas = document.querySelector('.digitalia-globe-canvas');
		if (canvas) {
			canvas.classList.add('globe-ready');
		}
	}, 2000); // Wait 2 seconds for globe to initialize
});
</script>
