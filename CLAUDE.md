# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is "Digitalia" - a custom WordPress theme built on the Underscores (_s) starter theme. It's a complex, content-rich theme for a Colombian government digital literacy initiative (digitalia.gov.co) that manages multiple educational programs (modules) including Academia, En Línea, Colaboratorio, Total Transmedia, and READY.

## Technology Stack

- **WordPress Theme** based on Underscores (_s)
- **Styling**: **Tailwind CSS v4.1.14** + **Shadcnblocks** - **Always use Tailwind utility classes, never write custom CSS**
- **Theming System**: Shadcnblocks with dynamic theme switching (globals.css, amber-minimal.css)
- **JavaScript Libraries**: Alpine.js (v3), Vue.js (v3, used on biblioteca-digital page), Swiper.js (v11)
- **Custom Fields**: Advanced Custom Fields (ACF) Pro
- **Fonts**: Lexend (headings), Work Sans (body), JetBrains Mono (monospace)
- **PHP Version**: >=5.6

## Build Commands

### CSS Development
```bash
# Watch for changes and rebuild CSS (development)
npm run watch:css

# Build and minify CSS for production
npm run build:css
```

**IMPORTANT**: El archivo `src/input.css` es **GENERADO AUTOMÁTICAMENTE** mediante la concatenación de:
1. Theme seleccionado (`globals/*.css`) - contiene todas las importaciones de Tailwind v4 y Shadcnblocks
2. Estilos custom de Digitalia (`src/digitalia-custom.css`) - navegación, módulos, etc.

**NO modifiques `src/input.css` manualmente** - cualquier cambio será sobreescrito.

### Code Quality
```bash
# Check PHP coding standards (WPCS)
composer lint:wpcs

# Check PHP syntax errors
composer lint:php

# Generate translation .pot file
composer make-pot
```

### Theme Distribution
```bash
# Create .zip archive for theme distribution
npm run bundle
```

## Architecture Overview

### Module-Based Structure

The theme is organized around 5 main "modules" (educational programs), each with its own color scheme:

1. **Academia** - Yellow (`bg-yellow-200`, `text-yellow-950`)
2. **En Línea** - Red (`bg-red-200`, `text-red-950`)
3. **Colaboratorio** - Teal (`bg-teal-200`, `text-teal-950`)
4. **Total Transmedia** - Blue (`bg-blue-300`, `text-blue-950`)
5. **READY** - Purple (`bg-purple-200`, `text-purple-950`)

**Color scheme helper**: Use `digitalia_get_color_schemes()` function in [functions.php:254-307](functions.php#L254-L307) to get consistent color classes for each module.

### Custom Post Types

The theme registers 13 custom post types:

- **curso** - Courses with duration and category fields
- **episodio** - Episodes with "temporadas" (seasons) taxonomy
- **actores** - Actors/cast members
- **personajes** - Characters
- **series** - TV/video series
- **faq** - FAQ items with custom "faq-categories" taxonomy
- **descarga** - Downloadable resources
- **podcast** - Podcast episodes
- **transmision** - Live transmissions/broadcasts
- **espacio** - Physical/virtual spaces with "categoria-espacios" taxonomy
- **alfabetizador** - Digital literacy educators with "ubicaciones" and "alfabetizadores-tags" taxonomies
- **producto** - Products

All registration code is in [functions.php:312-1071](functions.php#L312-L1071).

### ACF Fields Structure

ACF fields are organized in `/inc/acf_fields/` with:
- **Main module ACF files**: `academia-acf-fields.php`, `enlinea-acf-fields.php`, `colaboratorios-acf-fields.php`, `total-transmedia-acf-fields.php`, `ready-acf-fields.php`
- **Post type ACF files**: `espacios-acf-fields.php`, `podcasts-acf-fields.php`, `transmision-acf-fields.php`, etc.
- **Page template ACF files**: `modulos-acf-fields.php`, `biblioteca-digital-acf-fields.php`, etc.
- **Subpage fields**: `/inc/acf_fields/subpage-fields/` (organized by module)

All ACF field files are automatically loaded recursively via `digitalia_include_acf_fields()` in [functions.php:1089-1107](functions.php#L1089-L1107).

### Page Templates

Page templates are in `/page-templates/` with nested subpage templates in `/page-templates/subpage-templates/` organized by module:
- `/page-templates/subpage-templates/academia/`
- `/page-templates/subpage-templates/colaboratorios/`
- `/page-templates/subpage-templates/ready/`
- `/page-templates/subpage-templates/total-transmedia/`

The theme uses a recursive template scanner to register all nested templates: [functions.php:203-246](functions.php#L203-L246).

### Template Parts

Reusable template parts are in `/template-parts/`:
- `page-header.php`, `subpage-header.php` - Page headers
- `floating-nav.php`, `secondary-nav.php`, `mobile-footer-nav.php` - Navigation components
- `frontpage-hero.php` - Homepage hero
- `blog-list.php`, `module-posts-carousel.php` - Content listing components
- `cta-modulos.php` - Call-to-action for modules
- `content.php`, `content-search.php`, `content-none.php` - Content display templates

### Custom User Roles

The theme includes custom role management in [inc/custom-roles.php](inc/custom-roles.php) with specialized capabilities for different content types.

### Admin Customization

- **Parámetros Options Page**: Global theme settings managed via ACF at [inc/admin/parametros-page.php](inc/admin/parametros-page.php)
- **Custom Dashboards**: Module-specific dashboards in `/inc/admin/` (e.g., `dashboard-ready.php`, `dashboard-en-linea.php`, `dashboard-colaboratorio.php`)
- **Post Type Utils**: Helper functions for managing post types at [inc/admin/post-type-utils.php](inc/admin/post-type-utils.php)
- **Custom Login Logo**: Digitalia branding on login page [functions.php:1309-1323](functions.php#L1309-L1323)

### JavaScript Files

Located in `/js/`:
- `menu.js` - Main navigation menu
- `navigation.js` - Mobile navigation toggle
- `carousel.js` - General carousel functionality
- `tabs.js` - Tab interface components
- `faq.js` - FAQ accordion functionality
- `smooth-scroll.js` - Smooth scrolling behavior
- `video-scroll.js` - Video scroll interactions
- `chat.js` - Chat interface (jQuery-based)
- `acf-maps.js` - Google Maps integration for ACF

### Third-Party Integrations

The theme includes:
- **Google Analytics** (G-PNW4J4SMCE) - [functions.php:1258-1271](functions.php#L1258-L1271)
- **Hotjar** (hjid:5306078) - [functions.php:1274-1288](functions.php#L1274-L1288)
- **UST Heatmap** - [functions.php:1292-1298](functions.php#L1292-L1298)
- **UserWay Accessibility Widget** - [functions.php:1301-1304](functions.php#L1301-L1304)
- **Google Maps API** with API key set via ACF - [functions.php:1209-1248](functions.php#L1209-L1248)

## Development Conventions

### Tailwind CSS Usage

**CRITICAL**: This theme uses Tailwind CSS. Always use Tailwind utility classes for styling:
- Use `bg-{color}-{shade}` for backgrounds (e.g., `bg-yellow-200`)
- Use `text-{color}-{shade}` for text colors (e.g., `text-yellow-950`)
- Use `hover:`, `focus:`, `md:`, `lg:` prefixes for states and responsive design
- The Tailwind config is in [tailwind.config.js](tailwind.config.js) with custom color schemes and font families

### File Organization

When creating new features:
1. **ACF Fields**: Add to `/inc/acf_fields/` (will be auto-loaded)
2. **Page Templates**: Add to `/page-templates/` or nested in `/page-templates/subpage-templates/{module}/`
3. **Template Parts**: Add to `/template-parts/` for reusable components
4. **Custom Post Types**: Register in [functions.php](functions.php) following existing patterns
5. **Admin Pages**: Add to `/inc/admin/` for backend customization

### WordPress Coding Standards

- Use WordPress coding standards (WPCS) - run `composer lint:wpcs` to check
- Prefix all functions with `digitalia_`
- Use `esc_html__()`, `esc_attr__()`, etc. for internationalization
- Text domain is `'digitalia'`

### Custom Blocks

The theme uses WordPress Block Editor (Gutenberg). Custom blocks are in `/blocks/`:
- Currently has a Hero block at `/blocks/hero/`
- Register blocks in functions.php following the pattern at [functions.php:1076-1084](functions.php#L1076-L1084)

### REST API Enhancements

The theme adds featured images to REST API responses:
- `featured_image_src` field added to posts - [functions.php:1148-1169](functions.php#L1148-L1169)
- `featured_image_url` field for medium-sized images - [functions.php:1193-1206](functions.php#L1193-L1206)

## Helper Functions

### Color Schemes
```php
digitalia_get_color_schemes('full') // Returns full color schemes for all modules
digitalia_get_color_schemes('pill') // Returns only highlight colors for pills/badges
```

### Reading Time
```php
get_reading_time() // Returns estimated reading time in minutes for current post
```

### Navigation
```php
// Use the Tailwind Nav Walker for menus
new Tailwind_Nav_Walker()
```

## Content Context

The `/digitalia-content-context/` directory contains markdown files with content strategy and documentation for each module. Reference these when working on module-specific features.

## Important Notes

- The theme version is defined as `_S_VERSION` constant: `'2.4.9'` - update in [functions.php:12](functions.php#L12)
- Google Maps API key is hardcoded in [functions.php:1210](functions.php#L1210) - **should be moved to environment variable**
- The theme uses both Composer (PHP) and npm (JS) dependencies
- Font files are loaded from Google Fonts CDN
- Font Awesome 6.7.2 is loaded from CDN

## Testing

When making changes:
1. Test responsive design at mobile, tablet, and desktop sizes
2. Verify Tailwind classes are properly compiled with `npm run build:css`
3. Check PHP syntax with `composer lint:php`
4. Verify WPCS compliance with `composer lint:wpcs`
5. Test with multiple modules to ensure color schemes work correctly
6. Check that ACF fields save and display properly

## ========================================
## SHADCNBLOCKS THEMING SYSTEM (v4)
## ========================================

El tema ahora usa **Tailwind CSS v4.1.14** con **Shadcnblocks** para un sistema de theming dinámico y moderno.

### Arquitectura del Sistema

**Flujo de Compilación:**
```
globals/[theme].css (Theme completo de Shadcnblocks)
   + 
src/digitalia-custom.css (Estilos de Digitalia)
   ↓
src/input.css (GENERADO por PHP)
   ↓
npx @tailwindcss/cli (Tailwind v4 compiler)
   ↓
style.css (CSS final)
```

### Estructura de Archivos

```
/globals/
  ├── globals.css          # Theme por defecto de Shadcnblocks
  ├── amber-minimal.css    # Theme Amber Minimal (tonos cálidos)
  └── [otros themes]       # Puedes agregar más themes aquí

/src/
  ├── digitalia-custom.css # ⚡ Estilos ÚNICOS de Digitalia (navegación, módulos)
  └── input.css            # ❌ NO EDITAR - generado automáticamente

/inc/
  └── theme-switcher.php   # 🎨 Sistema de cambio de themes
```

### Cómo Cambiar de Theme

**Método recomendado** (manualmente regenerar `input.css`):

```bash
# 1. Editar inc/theme-switcher.php línea ~54
# Cambiar:
#   return 'globals';
# Por:
#   return 'amber-minimal';

# 2. Regenerar input.css
php -r "
\$theme_dir = getcwd();
\$theme_file = \$theme_dir . '/globals/amber-minimal.css';  # ← CAMBIAR AQUÍ
\$custom_file = \$theme_dir . '/src/digitalia-custom.css';
\$output_file = \$theme_dir . '/src/input.css';

\$header = '/*
Theme Name: Digitalia
Theme URI: https://danielbecerra.org
Author: Daniel Becerra
Description: Tema para Digitalia con Shadcnblocks theming system - Amber Minimal
Version: 2.5.0
Requires at least: 5.0
Tested up to: 6.4
Requires PHP: 7.4
License: GNU General Public License v2 or later
Text Domain: digitalia
*/


';

\$theme_content = file_get_contents(\$theme_file);
\$custom_content = file_get_contents(\$custom_file);
\$final_content = \$header . \$theme_content . \"\\n\\n\" . \$custom_content;

file_put_contents(\$output_file, \$final_content);
echo \"✅ Theme cambiado a Amber Minimal\\n\";
"

# 3. Compilar CSS
npm run build:css
```

### Themes Disponibles

| Theme | Descripción | Archivo |
|-------|-------------|---------|
| **globals** | Theme por defecto de Shadcnblocks (neutro, versátil) | `globals/globals.css` |
| **amber-minimal** | Theme cálido con tonos amber/dorados | `globals/amber-minimal.css` |

### Agregar Nuevos Themes

1. **Descargar theme de [shadcnblocks.com](https://shadcnblocks.com/)**
2. **Copiar el CSS** a `globals/nombre-theme.css`
3. **Asegurarse que incluya**:
   ```css
   @import 'tailwindcss';
   @plugin "@tailwindcss/typography";
   @custom-variant dark (&:where(.dark, .dark *));
   :root { /* variables */ }
   .dark { /* dark mode */ }
   ```
4. **Agregar a `inc/theme-switcher.php`**:
   ```php
   function digitalia_get_available_themes() {
       return array(
           'globals' => 'Default (Shadcnblocks)',
           'amber-minimal' => 'Amber Minimal',
           'nombre-theme' => 'Nombre Del Theme',  // ← AGREGAR AQUÍ
       );
   }
   ```
5. **Cambiar theme** siguiendo las instrucciones arriba

### Dark Mode

Los themes de Shadcnblocks incluyen **dark mode automático**. Ya está implementado en [header.php:16-25](header.php#L16-L25):

```javascript
// Initialize dark mode from localStorage
const theme = localStorage.getItem('digitalia-theme') || 'light';
if (theme === 'dark') {
    document.documentElement.classList.add('dark');
}
```

Para agregar un **toggle de dark mode**, insertar en el navigation:

```html
<button 
    onclick="
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('digitalia-theme', isDark ? 'dark' : 'light');
    "
    class="theme-toggle"
>
    🌙/☀️
</button>
```

### Características de Shadcnblocks

- ✅ **Variables OKLCH** - Colores más precisos que HSL
- ✅ **@theme inline** - Configuración CSS-first de Tailwind v4
- ✅ **Animaciones custom** - accordion, fade, marquee, shimmer, orbit, etc.
- ✅ **Fuentes Google** - 20+ fuentes precargadas
- ✅ **Dark mode** - Soporte completo con .dark class
- ✅ **Componentes** - Compatibles con bloques HTML de shadcnblocks.com

### Tailwind v4 Features Usados

- `@import 'tailwindcss'` - Nueva sintaxis de importación
- `@plugin` - Carga de plugins en CSS
- `@theme inline` - Configuración de theme en CSS
- `@custom-variant dark` - Variant personalizada para dark mode
- `@utility container` - Utility class personalizada
- `@layer base/components` - Layers organizados

### Estilos Personalizados de Digitalia

Los estilos en `src/digitalia-custom.css` incluyen:

1. **Colores de módulos**:
   ```css
   @theme inline {
     --color-digitalia-yellow: #ffda00;
     --color-red-50: #fff0f4;
     /* ... resto de escala de rojos */
   }
   ```

2. **Navegación por módulo**:
   - `.page-template-academia` - Yellow
   - `.page-template-total-transmedia` - Blue
   - `.page-template-en-linea` - Red
   - `.page-template-colaboratorios` - Teal
   - `.page-template-ready` - Purple

3. **Tipografía de Digitalia**:
   - Body: Work Sans
   - Headings (h1, h2): Lexend
   - Mono (h3, h4): JetBrains Mono

**NUNCA modifiques estos estilos en `input.css`** - siempre edita `src/digitalia-custom.css` y regenera.

### Troubleshooting

**Error: "Cannot apply unknown utility class"**
- Verifica que el theme en `globals/` incluya `@import 'tailwindcss'`
- Regenera `input.css` con el comando de arriba
- Limpia node_modules: `rm -rf node_modules && npm install`

**El theme no cambia**
- Verifica que regeneraste `input.css` **ANTES** de compilar
- Verifica que ejecutaste `npm run build:css` **DESPUÉS** de regenerar
- Revisa que el archivo `globals/[theme].css` existe

**Estilos de módulos no funcionan**
- Los estilos de Digitalia están al **FINAL** de `input.css`
- Si un theme de Shadcnblocks tiene estilos conflictivos, edita `src/digitalia-custom.css` con `!important`
- Ejemplo: `@apply !bg-yellow-100;` (nota el `!` al inicio)

### Recursos

- **Shadcnblocks**: https://shadcnblocks.com/
- **Themes**: https://docs.shadcnblocks.com/blocks/theming/
- **Tailwind v4 Docs**: https://tailwindcss.com/docs/installation
- **Theme Generator**: Compatible con shadcn, tweakcn, styleglide themes

