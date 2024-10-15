const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

const round = num =>
  num
    .toFixed(7)
    .replace(/(\.[0-9]+?)0+$/, '$1')
    .replace(/\.0$/, '')
const rem = px => `${round(px / 16)}rem`

module.exports = {
  content: [
    './404.php',
    './footer.php',
    './header.php',
    './index.php',
    './page.php',
    './single.php',
    './lib/**/*.php',
    './components/**/*.php',
    './src/js/**/*.js',
  ],
  safelist: [],
  theme: {
    fontFamily: {
      body: ['dm-sans', ...defaultTheme.fontFamily.sans],
      heading: ['dm-sans', ...defaultTheme.fontFamily.serif],
    },
    screens: {
      xxs: "280px",
      xs: "480px",

      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
      '4k': '2560px',
    },



    extend: {
      maxWidth: {
        '8xl': '88rem',
        '9xl': '96rem',
        '10xl': '104rem',
        '11xl': '112rem',
        '12xl': '120rem',
        'contain': '1076px'
      },
      colors: {
        background: '#fcf8f6',
        wshade: {
          'off': '#F5F5F5'
        },
        shade: {
          500: '#95959D',
          400: '#4D4D4D',
          300: '#CACACE',
          900: '#262626',
          800: '#4D4D4D',
          'dark-gray': '#3F3F3F',
          banner: '#0A0A0A',
        },

        darkgrey: {
          500: '#3F3F3F',
        },
        seal: '#9CDEE3',
        teal: {
          default: '#3FC1C9',
          dark: '#2E9FA6',
          light: '#67CDD4',
        },
      },


      theme: {
        borderRadius: {
          'none': '0',
          'sm': '0.125rem',
          DEFAULT: '0.25rem',
          DEFAULT: '4px',
          'md': '0.375rem',
          'lg': '0.5rem',
          '3xl': '3rem',
          'full': '9999px',
          'large': '12px',
        }

      },
      typography: theme => ({
        white: {
          css: {
            '--tw-prose-body': colors.white,
            '--tw-prose-bold': colors.white,
            '--tw-prose-headings': colors.white,
            '--tw-prose-bullets': colors.white,
            '--tw-prose-quotes': colors.white,
            '--tw-prose-links': colors.white,
            '--tw-prose-hr': colors.white,
          },
        },
      })
    },
  },
  corePlugins: {
    container: false,
  },




  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/container-queries'),
  ],
}
