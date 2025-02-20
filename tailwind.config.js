import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    css: {
                        maxWidth: '100%',
                        color: '#333',
                        '--tw-prose-body': '#333',
                        '--tw-prose-headings': '#111',
                        '--tw-prose-links': '#3182ce',
                        '--tw-prose-bold': '#111',
                        'dark:--tw-prose-body': '#d1d5db',
                        'dark:--tw-prose-headings': '#fff',
                        'dark:--tw-prose-links': '#60a5fa',
                        'dark:--tw-prose-bold': '#fff',
                        'dark:color': '#d1d5db',
                    },
                },
            },
            transitionProperty: {
                'colors': 'color, background-color, border-color, text-decoration-color, fill, stroke',
            },
            transitionDuration: {
                '250': '250ms',
            },
        },
    },

    plugins: [forms, typography],
};

