/**
 * Digitalia Globe Visualization
 * Adapted from: github.com/janarosmonaliev/github-globe
 * Uses Three.js + three-globe for interactive 3D globe centered on Colombia
 */

import ThreeGlobe from 'three-globe';
import { WebGLRenderer, Scene, PerspectiveCamera, AmbientLight, DirectionalLight, Color, Fog, PointLight } from 'three';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';
import { createGlowMesh } from 'three-glow-mesh';

// Check if running in dark mode
const isDarkMode = () => document.documentElement.classList.contains('dark');

// Color scheme based on Digitalia modules and dark mode
const getColors = () => {
  const dark = isDarkMode();
  return {
    background: dark ? new Color(0x0a0a0a) : new Color(0xf5f5f5),
    atmosphere: dark ? 0x14b8a6 : 0x3b82f6, // Teal for dark, Blue for light
    globeBase: dark ? 0x1a1a1a : 0xe5e7eb,
    ambient: dark ? 0x404040 : 0xbbbbbb,
    directional: dark ? 0xffffff : 0xffffff,
    directionalAccent: dark ? 0x14b8a6 : 0x3b82f6,
  };
};

class DigitaliaGlobe {
  constructor(containerId) {
    this.container = document.getElementById(containerId);
    if (!this.container) {
      console.error(`Globe container #${containerId} not found`);
      return;
    }

    this.renderer = null;
    this.camera = null;
    this.scene = null;
    this.controls = null;
    this.Globe = null;

    this.mouseX = 0;
    this.mouseY = 0;
    this.windowHalfX = window.innerWidth / 2;
    this.windowHalfY = window.innerHeight / 2;

    this.init();
    this.initGlobe();
    this.onWindowResize();
    this.animate();
  }

  init() {
    const colors = getColors();

    // Renderer setup
    this.renderer = new WebGLRenderer({ antialias: true, alpha: true });
    this.renderer.setPixelRatio(window.devicePixelRatio);
    this.renderer.setSize(this.container.offsetWidth, this.container.offsetHeight);
    this.container.appendChild(this.renderer.domElement);

    // Scene setup
    this.scene = new Scene();
    this.scene.add(new AmbientLight(colors.ambient, 0.4));
    this.scene.background = colors.background;
    this.scene.fog = new Fog(colors.background, 400, 2000);

    // Camera setup
    this.camera = new PerspectiveCamera();
    this.camera.aspect = this.container.offsetWidth / this.container.offsetHeight;
    this.camera.updateProjectionMatrix();

    // Lighting
    const dLight = new DirectionalLight(colors.directional, 0.8);
    dLight.position.set(-800, 2000, 400);
    this.camera.add(dLight);

    const dLight1 = new DirectionalLight(colors.directionalAccent, 1);
    dLight1.position.set(-200, 500, 200);
    this.camera.add(dLight1);

    const dLight2 = new PointLight(colors.directionalAccent, 0.8);
    dLight2.position.set(-200, 500, 200);
    this.camera.add(dLight2);

    this.camera.position.z = 400;
    this.camera.position.x = 0;
    this.camera.position.y = 0;

    this.scene.add(this.camera);

    // OrbitControls
    this.controls = new OrbitControls(this.camera, this.renderer.domElement);
    this.controls.enableDamping = true;
    this.controls.dynamicDampingFactor = 0.01;
    this.controls.enablePan = false;
    this.controls.minDistance = 200;
    this.controls.maxDistance = 500;
    this.controls.rotateSpeed = 0.8;
    this.controls.zoomSpeed = 1;
    this.controls.autoRotate = false;

    this.controls.minPolarAngle = Math.PI / 3.5;
    this.controls.maxPolarAngle = Math.PI - Math.PI / 3;

    // Window resize handler
    window.addEventListener('resize', () => this.onWindowResize(), false);

    // Mouse move handler for subtle camera movement
    window.addEventListener('mousemove', (e) => this.onMouseMove(e), false);
  }

  initGlobe() {
    const colors = getColors();

    // Initialize Globe
    this.Globe = new ThreeGlobe({
      waitForGlobeReady: true,
      animateIn: true,
    })
      .hexPolygonsData(countries.features)
      .hexPolygonResolution(3)
      .hexPolygonMargin(0.7)
      .showAtmosphere(true)
      .atmosphereColor(colors.atmosphere)
      .atmosphereAltitude(0.25)
      .hexPolygonColor((e) => {
        // Highlight Colombia with Academia yellow
        if (e.properties.ISO_A3 === 'COL') {
          return isDarkMode() ? 'rgba(255, 218, 0, 0.8)' : 'rgba(255, 218, 0, 0.6)';
        }
        return isDarkMode()
          ? 'rgba(255,255,255, 0.15)'
          : 'rgba(0, 0, 0, 0.1)';
      });

    // Load Digitalia locations and connections
    this.loadDigitaliaData();

    // Position globe to center on Colombia (approx lat: 4, lng: -74)
    // Rotate the globe to show Colombia at the center
    this.Globe.rotation.y = Math.PI * (74 / 180); // Longitude rotation
    this.Globe.rotation.x = Math.PI * (-4 / 180); // Latitude rotation

    // Add glow effect
    const globeMaterial = this.Globe.globeMaterial();
    globeMaterial.color = colors.globeBase;
    globeMaterial.emissive = colors.globeBase;
    globeMaterial.emissiveIntensity = 0.1;
    globeMaterial.shininess = 0.7;

    // Create glow mesh around globe
    const GLOBE_RADIUS = 100;
    const glowMesh = createGlowMesh(
      globeMaterial.clone(),
      {
        backside: true,
        color: colors.atmosphere,
        size: GLOBE_RADIUS,
        power: 3.5,
        coefficient: 0.5,
      }
    );
    this.Globe.add(glowMesh);

    this.scene.add(this.Globe);
  }

  async loadDigitaliaData() {
    try {
      // Get the theme directory URL from WordPress
      const themeUrl = window.digitaliaGlobeConfig?.themeUrl || '';

      const response = await fetch(`${themeUrl}/js/globe/digitalia-locations.json`);
      const data = await response.json();

      // Add location points
      if (data.locations) {
        this.Globe
          .pointsData(data.locations)
          .pointAltitude(0.01)
          .pointRadius('size')
          .pointColor('color')
          .pointLabel('label')
          .pointsMerge(false);
      }

      // Add connection arcs
      if (data.connections) {
        this.Globe
          .arcsData(data.connections)
          .arcColor('color')
          .arcAltitude('arcAlt')
          .arcStroke(0.5)
          .arcDashLength(0.4)
          .arcDashGap(0.2)
          .arcDashAnimateTime(4000)
          .arcDashInitialGap(() => Math.random())
          .arcsTransitionDuration(1000);
      }
    } catch (error) {
      console.error('Error loading Digitalia globe data:', error);
    }
  }

  onMouseMove(event) {
    this.mouseX = event.clientX - this.windowHalfX;
    this.mouseY = event.clientY - this.windowHalfY;
  }

  onWindowResize() {
    this.windowHalfX = window.innerWidth / 2;
    this.windowHalfY = window.innerHeight / 2;

    this.camera.aspect = this.container.offsetWidth / this.container.offsetHeight;
    this.camera.updateProjectionMatrix();

    this.renderer.setSize(this.container.offsetWidth, this.container.offsetHeight);
  }

  animate() {
    // Subtle camera movement based on mouse position
    this.camera.position.x += (this.mouseX / 5 - this.camera.position.x) * 0.01;
    this.camera.position.y += (-this.mouseY / 5 - this.camera.position.y) * 0.01;
    this.camera.lookAt(this.scene.position);

    this.controls.update();
    this.renderer.render(this.scene.scene, this.camera);

    requestAnimationFrame(() => this.animate());
  }

  // Method to update colors when theme changes
  updateTheme() {
    const colors = getColors();
    this.scene.background = colors.background;
    this.scene.fog.color = colors.background;

    if (this.Globe) {
      const globeMaterial = this.Globe.globeMaterial();
      globeMaterial.color = colors.globeBase;
      globeMaterial.emissive = colors.globeBase;
    }
  }
}

// Initialize globe when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    window.digitaliaGlobeInstance = new DigitaliaGlobe('globe-canvas');
  });
} else {
  window.digitaliaGlobeInstance = new DigitaliaGlobe('globe-canvas');
}

// Listen for theme changes (if you implement dark mode toggle)
if (window.MutationObserver) {
  const observer = new MutationObserver((mutations) => {
    mutations.forEach((mutation) => {
      if (mutation.attributeName === 'class') {
        if (window.digitaliaGlobeInstance) {
          window.digitaliaGlobeInstance.updateTheme();
        }
      }
    });
  });

  observer.observe(document.documentElement, {
    attributes: true,
    attributeFilter: ['class'],
  });
}

// Export for potential external use
export default DigitaliaGlobe;
