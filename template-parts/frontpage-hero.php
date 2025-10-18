<?php
/**
 * Front page hero
 *
 * @package Digitalia
 */
?>

<section id="section1" class="py-16 lg:p-0 overflow-hidden">
  <!-- HIDDEN: Background effects (can be re-enabled later) -->
  <!--
  <div class="absolute inset-0 -z-10 h-full w-full overflow-hidden">
    <div class="absolute inset-0 bg-linear-to-r from-transparent via-red-300/30 to-transparent"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.3)_0%,transparent_70%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_60%_50%,rgba(45,212,191,0.3)_0%,transparent_60%)]"></div>
    <div class="absolute inset-0 bg-[conic-gradient(from_0deg_at_50%_50%,transparent_0deg,rgba(255,255,255,0.1)_90deg,transparent_180deg)] animate-[spin_8s_linear_infinite]"></div>
    <div class="absolute -top-1/2 right-0 h-[500px] w-[500px] rounded-full bg-linear-to-bl from-red-400/40 to-transparent blur-3xl"></div>
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-linear-to-t from-white to-transparent"></div>
    <div class="absolute inset-y-0 left-0 w-32 bg-linear-to-r from-white to-transparent"></div>
    <div class="absolute inset-y-0 right-0 w-32 bg-linear-to-l from-white to-transparent"></div>
  </div>
  -->
  <!--<div class="container">
    <div class="flex flex-col items-center justify-between gap-20 lg:flex-row">-->
      <!-- HIDDEN: Grid background (can be re-enabled later) -->
      <!-- <div class="absolute inset-0 -z-10 h-full w-full bg-[linear-gradient(to_right,rgba(59,130,246,0.1)_1px,transparent_1px),linear-gradient(to_bottom,rgba(45,212,191,0.1)_1px,transparent_1px)] bg-size-[64px_64px] mask-[radial-gradient(ellipse_50%_100%_at_50%_50%,#000_60%,transparent_100%)]"></div> -->
      <!--<div class="min-w-[40%] flex flex-col items-center gap-6 text-center lg:items-start lg:text-left">
        <h1 class="text-pretty text-6xl font-bold lg:max-w-md lg:text-6xl"><span id="typewriter"></span><span class="cursor">|</span></h1>
        <p class="max-w-xl text-xl font-medium lg:text-2xl">Digital-IA es un novedoso ecosistema público de Educomunicación destinado a crear y fortalecer capacidades, habilidades y competencias ciudadanas de cara a los nuevos desafíos de la desinformación.</p>
        <div class="flex w-full justify-center lg:justify-start">
          <a href="/que-es-digitalia" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8 w-full sm:w-auto">
            <i class="fa fa-arrow-right mr-2"></i>Quiero saber más </a>
        </div>
      </div>
      <img src="/wp-content/uploads/2024/12/hero-img2.png" alt="placeholder hero" class="hidden lg:block pointer-events-none aspect-video rounded-md object-cover" style="aspect-ratio: 13 / 9">
    </div>
  </div>
</section>-->

<!-- HIDDEN: GlitchEffect canvas (can be re-enabled later) -->
<!--
<script>
    class GlitchEffect {
    constructor(parentId) {
        // Configuration
        this.gridSize = 32;
        this.totalGlitches = 15; // Increased from 8 to 20 tiles
        this.colors = ["#C700e3", "#10bed2", "#3f27ff", "#FFDA00", "#FFFFFF"];
        this.tiles = [];
        this.animationSpeed = 0.0005; // Even slower animation speed
        
        // Setup canvas
        this.canvas = document.createElement('canvas');
        this.ctx = this.canvas.getContext('2d');
        
        // Style canvas
        this.canvas.style.position = 'absolute';
        this.canvas.style.top = '0';
        this.canvas.style.left = '0';
        this.canvas.style.zIndex = '-5';
        
        // Add to parent element
        const parent = document.getElementById(parentId) || document.body;
        parent.appendChild(this.canvas);
        
        // Setup resize handler
        this.resizeHandler = () => this.windowResized();
        window.addEventListener('resize', this.resizeHandler);
        
        // Initial setup
        this.windowResized();
        this.initTiles();
        this.animate();
    }

    initTiles() {
        this.tiles = [];
        const cols = Math.ceil(this.canvas.width / this.gridSize);
        const rows = Math.ceil(this.canvas.height / this.gridSize);
        
        for (let i = 0; i < this.totalGlitches; i++) {
            this.tiles.push({
                x: this.random(0, cols) * this.gridSize,
                y: this.random(0, rows) * this.gridSize,
                size: this.gridSize,
                color: this.colors[this.floor(this.random(this.colors.length))],
                opacity: this.random(0.1, 0.3),
                phase: this.random(0, Math.PI * 2),
                visible: true
            });
        }
    }

    animate() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        
        const time = Date.now() * this.animationSpeed;
        
        this.tiles.forEach((tile, index) => {
            // Update tile properties
            tile.opacity = 0.1 + Math.sin(time + tile.phase) * 0.15; // Reduced opacity variation
            
            // Randomly change visibility (much less frequently)
            if (Math.random() < 0.001) { // Reduced probability
                tile.visible = !tile.visible;
            }
            
            if (tile.visible) {
                this.ctx.save();
                this.ctx.globalAlpha = tile.opacity;
                
                // Draw tile without rotation
                this.ctx.fillStyle = tile.color;
                this.ctx.fillRect(tile.x, tile.y, tile.size, tile.size);
                
                this.ctx.restore();
            }
            
            // Occasionally move tiles to new positions (much less frequently)
            if (Math.random() < 0.0002) { // Reduced probability
                const cols = Math.ceil(this.canvas.width / this.gridSize);
                const rows = Math.ceil(this.canvas.height / this.gridSize);
                tile.x = this.random(0, cols) * this.gridSize;
                tile.y = this.random(0, rows) * this.gridSize;
            }
        });
        
        requestAnimationFrame(() => this.animate());
    }

    // Utility functions
    random(min, max) {
        if (max === undefined) {
            max = min;
            min = 0;
        }
        return Math.random() * (max - min) + min;
    }
    
    floor(n) {
        return Math.floor(n);
    }
    
    // Fisher-Yates shuffle algorithm
    shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }
    
    windowResized() {
        this.canvas.width = window.innerWidth;
        this.canvas.height = window.innerHeight;
    }
    
    // Cleanup method
    destroy() {
        window.removeEventListener('resize', this.resizeHandler);
        this.canvas.remove();
    }
}

class Typewriter {
        constructor(element, text, speed = 150) {
            this.element = element;
            this.text = text;
            this.speed = speed;
            this.currentChar = 0;
            this.cursor = document.querySelector('.cursor');
            this.isDeleting = false;
            this.type();
        }

        type() {
            const current = this.currentChar;
            const fullText = this.text;
            
            if (!this.isDeleting && current < fullText.length) {
                this.element.textContent = fullText.substring(0, current + 1);
                this.currentChar++;
            }
            
            const delta = this.speed + Math.random() * 100; // Add some randomness to typing speed
            
            if (this.currentChar < fullText.length) {
                setTimeout(() => this.type(), delta);
            }
        }
    }
    
    // Initialize typewriter when page loads
    document.addEventListener('DOMContentLoaded', function() {
        const typewriterElement = document.getElementById('typewriter');
        new Typewriter(typewriterElement, 'Digital·IA', 150); // Slower typing speed (was 150)
        
        // Add CSS for cursor animation
        const style = document.createElement('style');
        style.textContent = `
            .cursor {
                opacity: 1;
                animation: blink 1.5s infinite; // Slower cursor blink (was 1s)
                font-weight: 100;
                margin-left: 2px;
            }
            
            @keyframes blink {
                0%, 100% { opacity: 1; }
                50% { opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    });

// Usage example:
const glitchEffect = new GlitchEffect('section1');
</script>
-->