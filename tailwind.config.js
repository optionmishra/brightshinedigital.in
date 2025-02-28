/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "application/views/web/dashboard.php",
    "application/views/web/index.php",
    "application/views/web/welcome.php",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("flowbite/plugin")],
};
