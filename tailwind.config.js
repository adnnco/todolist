import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import colors from "tailwindcss/colors.js";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    // make sure to safelist these classes when using purge
    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg'
    ],

    // enable dark mode via class strategy
    darkMode: 'class',

    theme: {
        colors: {
            primary: colors.indigo,
            gray: colors.stone,
            blue: colors.sky,
            green: colors.green,
            yellow: colors.amber,
        },
        fontFamily: {
            sans: ['Lato', 'sans-serif'],
            serif: ['Lato', 'serif'],
        },
        extend: {
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            }
        }
    },
    variants: {
        fill: [],
        extend: {
            borderColor: ['focus-visible'],
            opacity: ['disabled'],
        }
    },
    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
