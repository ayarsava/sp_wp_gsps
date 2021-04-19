module.exports = {
  purge: {
    content: [
      '*.php',
      '*/*.php',
    ],
    options: {
      safelist: ['list-disc','page-numbers'],
    }
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        teal: {
          lightest: '#B3D1D9',
          light: '#66A4B2',
          DEFAULT: '#00677F',
          dark: '#003E4C',
          darkest: '#001F26',
        },
        yellow: {
          DEFAULT: '#ffbb36',
        },
        brown: {
          DEFAULT: '#696159',
        },
      },
      fontFamily: {
        'sans': ['"PT Sans"', 'sans-serif'],
        'heading': ['"PT Serif"', 'serif'],
      },
      borderColor: ['hover'],
    },
  },
  variants: {
    extend: {
      backgroundColor: ['checked'],
      borderColor: ['checked'],
      scale: ['group-hover'],
    }
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}
