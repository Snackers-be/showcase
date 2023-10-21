/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        "./assets/**/*.js",
        "./templates/**/*.html.twig",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'icon-nurse-white': "url('../icons/user-nurse-white.svg')",
                'icon-phone': "url('../icons/phone.svg')",
                'icon-envelope': "url('../icons/envelope.svg')",
                'icon-map-pin': "url('../icons/map-pin.svg')",
                'icon-check': "url('../icons/check.svg')",
                'icon-minus-small': "url('../icons/minus-small.svg')",
                'icon-bars-2': "url('../icons/bars-2.svg') fill-white",
                'splash-left': "url('../svg/splash-left.svg')"
            },
            colors: {
                // NEXABYTE
            /*    current: 'currentColor',
                white: "#F5F5F5",
                black: "rgb(0 0 0)",
                secondary: "rgb(111 0 245)",
                darkWhite: "rgb(2 6 23)",
                darkBlack: "rgb(248 250 252)",
                darkSecondary: "#219ebc",*/
                /*DEFAULT*/
                current: 'currentColor',
                white: "#F6F6F6",
                black: "#111111",
                blackAlt: "#2F2F2F",
                secondary: "#FFCB74",
                darkWhite: "#111111",
                darkBlack: "#F6F6F6",
                darkSecondary: "#FFCB74",
            },
            fontFamily: {
                h1: "NotoSans-Black",
                h2: "NotoSans-Bold",
                "poppins-regular": [ 'Poppins-regular', "sans-serif"],
                "poppins-semibold": [ 'Poppins-semibold', "sans-serif"],
                "poppins-medium": [ 'Poppins-regular', "sans-serif"],
            },
            transitionProperty: {
                'height': 'height',
                'width': 'width',
            },
            aspectRatio: {
                '74': '.74',
            },
        },
    },
    plugins: [
        function ({ addVariant }) {
            addVariant('child', '& > *');
            // addVariant('child-hover', '& > *:hover');
        }
    ],
}