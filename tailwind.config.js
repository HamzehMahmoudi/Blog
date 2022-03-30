module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        typography:{
            DEFAULT:{
                css: {
                    p:{
                        color: '#000000'
                    },
                },
            },
        },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    // ...
  ],
}
