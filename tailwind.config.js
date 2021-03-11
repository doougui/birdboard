const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            textColor: {
                default: 'var(--text-default-color)'
            },
            colors: {
                white: 'white',
                accent: 'var(--text-accent-color)',
                'accent-light': 'var(--text-accent-light-color)',
                muted: 'var(--text-muted-color)',
                'muted-light': 'var(--text-muted-light-color)',
                error: 'var(--text-error-color)',

                page: 'var(--page-background-color)',
                card: 'var(--card-background-color)',
                button: 'var(--button-background-color)',
                header: 'var(--header-background-color)'
            },
        },
        boxShadow: {
            DEFAULT: '0 0 5px 0 rgba(0, 0, 0, 0.08)',
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
