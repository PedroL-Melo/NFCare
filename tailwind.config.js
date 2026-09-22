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
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                nfcbg: '#F8F9FA',
                nfcred: '#E63946',
                nfctext: '#1A1A1A',
                nfcblue: '#457B9D',
                premium: {
                    bg: '#F5F5F7',
                    card: 'rgba(255, 255, 255, 0.75)',
                    border: 'rgba(0, 0, 0, 0.05)',
                }
            }
        },
    },

    plugins: [forms],
};
