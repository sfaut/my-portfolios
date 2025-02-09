import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import colors from "tailwindcss/colors";
// import theme from "tailwindcss/defaultTheme";

/** @type { import('tailwindcss').Config } */
const config = {

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    plugins: [
        forms,
    ],

    // /home/sfaut/projects/accounting/node_modules/tailwindcss/stubs/config.full.js
    theme: {
        // textColor: {
        //     DEFAULT: colors.blue[600],
        //     md: colors.amber[600],
        //     xl: colors.red[600],
        // },
        extend: {
            // textColor: {
            //     // DEFAULT: colors.red, // ', '#3b82f6'),
            //     ...colors.blue
            // },
            // fontSize: {
            //     sm: ['14px', '20px'],
            //     base: ['16px', '24px'],
            //     lg: ['20px', '28px'],
            //     xl: ['24px', '32px'],
            // },
            colors: {
                // https://tailwindcss.com/docs/customizing-colors
                primary: colors.indigo,
                secondary: colors.gray,
                success: colors.emerald,
                danger: colors.rose,
                warning: colors.amber,
                info: colors.teal, // cyan
            },
            fontFamily: {
                sans: [
                    "Sarabun",      // Pas mal
                    // "Noto Sans",
                    // "Archivo",      // OK
                    // "Roboto Flex",
                    // "Nunito Sans", // Pas mal mais flou
                    // "Figtree",
                    // "Jost",
                    // "Ubuntu Sans",
                    // "Anuphan",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
            scale: {
                "101": "1.01",
                "102": "1.02",
                "103": "1.03",
                "104": "1.04",
                ...defaultTheme.scale,
            },
        },
    },

    // presets: [
    //     require("./resources/js/tailwind.preset.js"),
    // ],

    // https://tailwindcss.com/docs/content-configuration#safelisting-classes
    // safelist: [
    //     {
    //         pattern: /sky|emerald|amber|rose/,
    //         variants: ["hover", "focus", "active"],
    //     },
    // ],
};

export default config;
