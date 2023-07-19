import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        fontFamily: {
          'karla': ['Karla', 'sans-serif'],
          'inter': ['Inter', 'sans-serif'],
          'sans': ['Figtree', ...defaultTheme.fontFamily.sans],
        },
        lineHeight: {
          'extra-loose': '1.4'
        },
        container: {
          center: true,
          padding: {
            DEFAULT: '16px',
            sm: '1rem',
            lg: '45px',
            xl: '5rem'
          },
        },
        extend: {
          colors: {
            'primary': '#36BDFD',
          },
          screens: {
            '2xl': '1320px',
          },
          backgroundImage: {
            'header': "url('/dist/img/bg-header.png')",
          }
        },
      },

    plugins: [forms],
};
