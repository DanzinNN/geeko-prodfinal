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
                slate900: '#111827',
                slate800: '#18212F',
                slate700: '#1E2836',
                loginContainer: '#1C2D45',
                pink500: '#FF23F0',
                
                primaryGradient: '#FF26C9',
                secondaryGradient: '#00C8FF',
                navDark: '#10031C',
                background3: '#1E1E1E',
                rosa: '#FF26C9',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                lakki: ['Lakki Reddy', 'cursive'], // Define a fonte 'Lakki Reddy'
                poppins: ['Poppins', 'sans-serif']
            },
        },
    },

    plugins: [forms],
};
