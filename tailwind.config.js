/** @type {import('tailwindcss').Config} */
export default {
  presets: [
    require('./vendor/tallstackui/tallstackui/tailwind.config.js')
  ],
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/tallstackui/tallstackui/src/**/*.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {},
  plugins: [
    require('@tailwindcss/forms'),
    require('flowbite/plugin')
  ]
}