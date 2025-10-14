/** @type {import('tailwindcss').Config} */
export default {
  darkMode: ["class"],
  content: [
    "./page-templates/**/*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./js/**/*.js",
    "./*.php",
  ],
  theme: {
    extend: {
      // Mantener colores específicos de Digitalia
      colors: {
        'digitalia-yellow': '#ffda00',
        red: {
          50: '#fff0f4',
          100: '#ffe1e9',
          200: '#ffc3d4',
          300: '#ff95b3',
          400: '#ff4d7f',
          500: '#ff0044',
          600: '#e6003d',
          700: '#bf0032',
          800: '#99002a',
          900: '#800023',
          950: '#4c0014',
        },
      },
      // El resto de la configuración viene de @theme inline en CSS
      // y de las CSS variables de Shadcnblocks
    },
  },
  plugins: [], // Plugins ahora se cargan con @plugin en CSS
}
