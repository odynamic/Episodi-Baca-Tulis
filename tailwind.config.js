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
            colors: {
                primary: '#4A6FA5',   
                accent: '#ac5064ff',    
                beige: '#F9F7F3',     
                blueSoft: '#5E7BAA',  
            },
        },
    },
    plugins: [forms],
};
