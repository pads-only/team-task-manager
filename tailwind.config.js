import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': colors.orange[500],
                'secondary': colors.gray[900],
                'background': colors.gray[100],
                'text': colors.gray[700],
                'border': colors.gray[300]
            },

            borderRadius: {
                md: '8px',
                lg: '12px',
            },

            fontFamily: {
                sans: [
                    'Inter',
                    'system-ui',
                    'Helvetica Neue',
                    'Arial',
                    'sans-serif'
                ],
                mono: [
                    'JetBrains Mono',
                    'monospace'
                ],
            },

            maxWidth: {
                'content': '1200px',
            },

            spacing: {
                'section': '80px',
            },

            letterSpacing: {
                tighter: '-0.02em',
            },
        },
    },

    plugins: [forms],
};
