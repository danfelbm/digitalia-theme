/**
 * Digitalia Globe Loader
 * Based on: github.com/janarosmonaliev/github-globe
 * Adapted for WordPress + Digitalia theme
 */

(function() {
  'use strict';

  // ==========================================
  // GLOBE THEMES - Cambia fácilmente los colores del globo
  // ==========================================
  const GLOBE_THEMES = {
    // Tema original (azul/púrpura) - Oscuro
    original: {
      sceneBackground: 0x040d21,
      sceneFog: 0x535ef3,
      atmosphereColor: '#3a228a',
      globeColor: 0x3a228a,
      globeEmissive: 0x220038,
      globeEmissiveIntensity: 0.1,
      ambientLight: 0xbbbbbb,
      directionalLight1: 0x7982f6,
      directionalLight2: 0x8566cc,
    },
    // Tema Aceternity (verde/emerald)
    aceternity: {
      sceneBackground: 0x040d21,  // Mantener fondo oscuro
      sceneFog: 0x10b981,          // Emerald fog
      atmosphereColor: '#FFFFFF',  // Atmósfera blanca
      globeColor: 0x059669,        // Emerald-600
      globeEmissive: 0x059669,     // Emerald-600
      globeEmissiveIntensity: 0.1,
      ambientLight: 0x10b981,      // Emerald-500
      directionalLight1: 0xffffff, // Blanco
      directionalLight2: 0xffffff, // Blanco
    },
  };

  // CONFIGURACIÓN ACTIVA: Cambia entre 'original' o 'aceternity'
  const ACTIVE_THEME = 'original';
  const theme = GLOBE_THEMES[ACTIVE_THEME];

  // Check if container exists
  const container = document.getElementById('globe-canvas');
  if (!container) {
    console.warn('Globe container #globe-canvas not found');
    return;
  }

  // Global variables
  let renderer, camera, scene, controls, Globe;
  let mouseX = 0;
  let mouseY = 0;
  let windowHalfX = window.innerWidth / 2;
  let windowHalfY = window.innerHeight / 2;
  let countries, digitaliaData;

  // Load data and initialize
  async function loadDataAndInit() {
    try {
      if (typeof THREE === 'undefined' || typeof ThreeGlobe === 'undefined') {
        console.error('Three.js or ThreeGlobe not loaded');
        return;
      }

      const themeUrl = window.digitaliaGlobeConfig?.themeUrl || '';

      // Load both JSON files
      const [countriesResponse, locationsResponse] = await Promise.all([
        fetch(`${themeUrl}/js/globe/globe-data-min.json`),
        fetch(`${themeUrl}/js/globe/digitalia-locations.json`)
      ]);

      countries = await countriesResponse.json();
      digitaliaData = await locationsResponse.json();

      // Initialize globe
      init();
      initGlobe();
      onWindowResize();
      animate();

      // Store instance globally for console access
      window.digitaliaGlobeInstance = { Globe, scene, camera, controls, renderer };

      // Expose color update function for live editing from console
      window.updateGlobeColors = function(colors) {
        console.log('Updating globe colors:', colors);

        // Update scene background
        if (colors.sceneBackground !== undefined) {
          scene.background = new THREE.Color(colors.sceneBackground);
        }

        // Update atmosphere
        if (colors.atmosphereColor !== undefined) {
          Globe.atmosphereColor(colors.atmosphereColor);
        }

        // Update globe material
        const globeMaterial = Globe.globeMaterial();
        if (colors.globeColor !== undefined) {
          globeMaterial.color = new THREE.Color(colors.globeColor);
        }
        if (colors.globeEmissive !== undefined) {
          globeMaterial.emissive = new THREE.Color(colors.globeEmissive);
        }
        if (colors.globeEmissiveIntensity !== undefined) {
          globeMaterial.emissiveIntensity = colors.globeEmissiveIntensity;
        }
        if (colors.shininess !== undefined) {
          globeMaterial.shininess = colors.shininess;
        }

        // Update fog
        if (colors.sceneFog !== undefined) {
          scene.fog.color = new THREE.Color(colors.sceneFog);
        }

        console.log('Globe colors updated successfully!');
      };

      // Globe Color Editor available via window.updateGlobeColors()
      // Call window.updateGlobeColors({ sceneBackground: 0xFFFFFF, atmosphereColor: "#FF0000", ... })

    } catch (error) {
      console.error('Error loading globe data:', error);
    }
  }

  // Initialize scene, camera, renderer, controls
  function init() {
    // Initialize renderer
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(container.offsetWidth, container.offsetHeight);
    container.appendChild(renderer.domElement);

    // Initialize scene (usando tema activo)
    scene = new THREE.Scene();
    scene.add(new THREE.AmbientLight(theme.ambientLight, 0.3));
    scene.background = new THREE.Color(theme.sceneBackground);

    // Initialize camera
    camera = new THREE.PerspectiveCamera();
    camera.aspect = container.offsetWidth / container.offsetHeight;
    camera.updateProjectionMatrix();

    // Lighting (usando tema activo)
    const dLight = new THREE.DirectionalLight(0xffffff, 0.8);
    dLight.position.set(-800, 2000, 400);
    camera.add(dLight);

    const dLight1 = new THREE.DirectionalLight(theme.directionalLight1, 1);
    dLight1.position.set(-200, 500, 200);
    camera.add(dLight1);

    const dLight2 = new THREE.PointLight(theme.directionalLight2, 0.5);
    dLight2.position.set(-200, 500, 200);
    camera.add(dLight2);

    // Camera at origin (offset handled by CSS)
    // ZOOM INICIAL: Cambia este valor para acercar/alejar el globo (menor = más cerca, mayor = más lejos)
    camera.position.z = 300;  // Default zoom level
    camera.position.x = 0;
    camera.position.y = 0;

    scene.add(camera);

    // Fog (usando tema activo)
    scene.fog = new THREE.Fog(theme.sceneFog, 400, 2000);

    // Initialize controls with extended zoom range
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dynamicDampingFactor = 0.01;
    controls.enablePan = false;
    controls.minDistance = 150;
    controls.maxDistance = 800;  // Extended zoom range
    controls.rotateSpeed = 0.8;
    controls.zoomSpeed = 1;

    // AUTO-ROTACIÓN: Cambiar a false para deshabilitar
    controls.autoRotate = true;
    controls.autoRotateSpeed = 0.5;  // Velocidad de rotación (0.5 = lento, 2.0 = rápido)

    // ZOOM CON SCROLL: Deshabilitado - descomenta la siguiente línea para habilitar zoom con scroll
    controls.enableZoom = false;  // Set to true to enable scroll zoom

    controls.minPolarAngle = Math.PI / 3.5;
    controls.maxPolarAngle = Math.PI - Math.PI / 3;

    // Target at origin (offset handled by CSS)
    controls.target.set(0, 0, 0);
    controls.update();

    // Event listeners
    window.addEventListener('resize', onWindowResize, false);
    document.addEventListener('mousemove', onMouseMove);
  }

  // Initialize Globe
  function initGlobe() {
    // Initialize the Globe (usando tema activo)
    Globe = new ThreeGlobe({
      waitForGlobeReady: true,
      animateIn: true,
    })
      .hexPolygonsData(countries.features)
      .hexPolygonResolution(3)
      .hexPolygonMargin(0.7)
      .showAtmosphere(true)
      .atmosphereColor(theme.atmosphereColor)
      .atmosphereAltitude(0.25)
      .hexPolygonColor((e) => {
        // Highlight Colombia with bright white
        if (e.properties.ISO_A3 === 'COL') {
          return 'rgba(255,255,255, 1)';
        }
        return 'rgba(255,255,255, 0.7)';
      });

    // Add arcs, points, and labels after a delay (like original repo)
    setTimeout(() => {
      // Filter locations: labels only for showLabel=true, points only for showPoint=true
      const locationsWithLabels = digitaliaData.locations.filter(loc => loc.showLabel !== false);
      const locationsWithPoints = digitaliaData.locations.filter(loc => loc.showPoint !== false);

      Globe
        .arcsData(digitaliaData.connections)
        .arcColor((e) => e.color)
        .arcAltitude((e) => e.arcAlt)
        .arcStroke(0.5)
        .arcDashLength(0.9)
        .arcDashGap(4)
        .arcDashAnimateTime(1000)
        .arcsTransitionDuration(1000)
        .arcDashInitialGap((e) => e.order * 1)
        .labelsData(locationsWithLabels)
        .labelColor(() => '#ffcb21')
        .labelDotRadius(0.3)
        .labelSize((e) => e.size || 1)
        .labelText((e) => e.city)
        .labelResolution(6)
        .labelAltitude(0.01)
        .pointsData(locationsWithPoints)
        .pointColor(() => '#ffffff')
        .pointsMerge(true)
        .pointAltitude(0.07)
        .pointRadius(0.05);
    }, 1000);

    // Rotate globe to show Americas
    // ROTACIÓN INICIAL: Ajusta estos valores para cambiar qué parte del globo se muestra
    // rotateY controla longitud (positivo = oeste, negativo = este)
    // rotateZ controla inclinación
    Globe.rotateY(-Math.PI * (-70 / 180));  // -90 degrees = Americas centered
    Globe.rotateZ(-Math.PI / -1500 * 33.5);   // Earth's axial tilt

    // Globe at origin (offset handled by CSS)
    Globe.position.x = 0;

    // Globe material (usando tema activo)
    const globeMaterial = Globe.globeMaterial();
    globeMaterial.color = new THREE.Color(theme.globeColor);
    globeMaterial.emissive = new THREE.Color(theme.globeEmissive);
    globeMaterial.emissiveIntensity = theme.globeEmissiveIntensity;
    globeMaterial.shininess = 0.7;

    scene.add(Globe);
  }

  function onMouseMove(event) {
    mouseX = event.clientX - windowHalfX;
    mouseY = event.clientY - windowHalfY;
  }

  function onWindowResize() {
    camera.aspect = container.offsetWidth / container.offsetHeight;
    camera.updateProjectionMatrix();
    windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;
    renderer.setSize(container.offsetWidth, container.offsetHeight);
  }

  function animate() {
    // Camera follows mouse subtly (disabled to not interfere with OrbitControls)
    // camera.position.x += (mouseX / 10 - camera.position.x) * 0.005;
    // camera.position.y += (-mouseY / 10 - camera.position.y) * 0.005;

    controls.update();
    renderer.render(scene, camera);
    requestAnimationFrame(animate);
  }

  // No dark mode - using original repo colors always

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadDataAndInit);
  } else {
    loadDataAndInit();
  }

})();
