module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      typography: (theme) => ({
        DEFAULT: {
          css: {
            
          },
        },
      }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    // ...
  ],
}
