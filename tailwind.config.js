const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    // add the folders and files from your templates
    content: [
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
            gray: colors.gray,
            blue: colors.sky,
            red: colors.rose,
            pink: colors.fuchsia,
            indigo: colors.indigo,
        },
        fontFamily: {
            sans: ['Graphik', 'sans-serif'],
            serif: ['Merriweather', 'serif'],
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
        // include Flowbite as a plugin in your Tailwind CSS project
        require('flowbite/plugin')
    ]
}

