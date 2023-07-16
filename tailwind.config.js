/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{html,js,php}', 
    '**/*.php',
    '*.php',
  ],
  theme: {
    fontFamily: {
      //'Sansita': ['Sansita, sans-serif'],
      'body': ['Roboto, sans-serif'],
    },
    fontSize: {
      xs: '0.5rem',
      sm: '0.8rem',
      base: '1rem',
      xl: '1.25rem',
      '2xl': '1.6rem',
      '3xl': '2rem',
      '4xl': '2.441rem',
      '5xl': '3.052rem',
      '20xl': '10rem',
    },
    fontWeight: {
      light: '300',
      bold: '700',
      black: '900',
    }, 
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1180px',
      '2xl': '1536px',
    },
    colors: {
      white: '#ffffff',
      default: '#000000',
      primary: '#334155',
      secondary: '#facc15',
      black:    '#000000',
      yellow: {
        400: '#fbbf24',
      },
      sky: {
        400: '#38bdf8',
        600: '#0284c7',
      },
      green: {
        600: '#22c55e',
      },
      gray:   {
        50: '#f9fafb',
        100: '#f3f4f6',
        200: '#e5e7eb',
        300: '#d1d5db',
        400: '#9ca3af',
        500: '#6b7280',
        600: '#4b5563',
        700: '#374151',
        800: '#1f2937',
        900: '#111827',
        950: '#030712',
      },
    },
    backgroundColor: theme => ({
      ...theme('colors'),
      'default': '#000000',
      'primary': '#334155',
      'secondary': '#22c55e',
    }),
    extend: {},
  },
  plugins: [],
}
