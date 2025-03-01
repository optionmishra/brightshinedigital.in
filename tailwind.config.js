/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"application/views/globals/web/header.php",
		"application/views/globals/web/footer.php",
		"application/views/web/dashboard.php",
		"application/views/web/teacher-registration.php",
		"application/views/web/student-registration.php",
		"application/views/web/index.php",
		"application/views/web/welcome.php",
		"./node_modules/flowbite/**/*.js",
		"./vite/src/**/*.jsx",
	],
	theme: {
		extend: {},
	},
	plugins: [require("flowbite/plugin")],
};
