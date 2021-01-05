const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  purge: [
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    'resources/**/*.js',
  ],

  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      medium: '992px',
      lg: '1024px',
      xl: '1280px',
    },
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: '#1DA1F2',
        darkblue: '#2791D9',
        lightblue: '#EFF9FF',
        dark: '#657786',
        light: '#AAB8C2',
        lighter: '#E1E8ED',
        lightest: '#F5F8FA',
      },
    },
  },

  variants: {
    opacity: ['responsive', 'hover', 'focus', 'disabled'],
  },

  plugins: [require('@tailwindcss/ui')],
};
