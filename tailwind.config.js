import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import prose from '@tailwindcss/typography';

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
        container: {
          center: true,
          padding: {
            DEFAULT: '1rem',
            sm: '2rem',
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
          },
          lineHeight: {
            'extra-loose': '1.4'
          },
        },
      },

    plugins: [
        forms,
        prose,
        require('tailwind-typewriter')({
            wordsets: {
                service: {
                    words: ['Marketers', 'Developers', 'Designers'],
                    delay: 2,
                    writeSpeed: 0.2,
                    caretWidth	: '2px'
                }
            }
        })
    ],
};
