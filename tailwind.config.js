/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: ["class"],
  content: [
    "./page-templates/**/*.php",
    "./template-parts/**/*.php",
    "./parts/**/*.php",
    "./inc/**/*.php",
    "./js/**/*.js",
    "./*.php",
    "./test.php",
    "./functions.php"  // explicitly include functions.php
  ],
  theme: {
    extend: {
      colors: {
        primary: '#4a5568',
        border: "hsl(var(--border))",
        input: "hsl(var(--input))",
        ring: "hsl(var(--ring))",
        background: "hsl(var(--background))",
        foreground: "hsl(var(--foreground))",
        primary: {
          DEFAULT: "hsl(var(--primary))",
          foreground: "hsl(var(--primary-foreground))",
        },
        secondary: {
          DEFAULT: "hsl(var(--secondary))",
          foreground: "hsl(var(--secondary-foreground))",
        },
        destructive: {
          DEFAULT: "hsl(var(--destructive))",
          foreground: "hsl(var(--destructive-foreground))",
        },
        muted: {
          DEFAULT: "hsl(var(--muted))",
          foreground: "hsl(var(--muted-foreground))",
        },
        accent: {
          DEFAULT: "hsl(var(--accent))",
          foreground: "hsl(var(--accent-foreground))",
        },
        popover: {
          DEFAULT: "hsl(var(--popover))",
          foreground: "hsl(var(--popover-foreground))",
        },
        card: {
          DEFAULT: "hsl(var(--card))",
          foreground: "hsl(var(--card-foreground))",
        },
        red: {
          50: '#fff0f4',
          100: '#ffe1e9',
          200: '#ffc3d4',
          300: '#ff95b3',
          400: '#ff4d7f',
          500: '#ff0044',  // main color
          600: '#e6003d',
          700: '#bf0032',
          800: '#99002a',
          900: '#800023',
          950: '#4c0014',
        },
        'digitalia-yellow': '#ffda00',
      },
      borderRadius: {
        lg: "var(--radius)",
        md: "calc(var(--radius) - 2px)",
        sm: "calc(var(--radius) - 4px)",
      },
      container: {
        center: true,
        padding: '1rem',
      },
      fontFamily: {
        sans: ['Work Sans', 'sans-serif'],
        heading: ['Lexend', 'sans-serif'],
        mono: ['JetBrains Mono', 'monospace'],
      },
    },
  },
  plugins: [require("tailwindcss-animate")],
}
