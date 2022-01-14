WAT Theme
===
WAT Theme is a barebones [WordPress](https://www.wordpress.org) starter theme utilizing [TailwindCSS](https://www.tailwindcss.com) and [Alpine.js](https://alpinejs.dev/).

## Installation Instructions
1. Clone the repo `git clone git@github.com:mccomaschris/wat-theme.git my-plugin-name`.
2. Search and replace the entire plugins for all instances of `WAT_THEME_VERSION` with `PLUGIN_NAME_VERSION`.
3. Search and replace the entire plugins for all instances of `@package WAT Theme` with `@package Your Plugin Name`.
4. Search and replace the entire plugins for all instances of `wat_theme` with `plugin_name`.
5. Search and replace the entire plugins for all instances of `wat-theme` with `plugin-name`.
6. Open **./style.css** and update **Theme Name**, **Theme URI**, **Description**, and **Author**, **Author URI**.
7. Open **./composer.json** and update **name** and **description**.
8. Open **./package.json** and update **name**, **description**, **author**, and **homepage**, **repository**.
9. In the terminal install the composer dependencies `composer install`.
10. In the terminal install the npm dependencies `npm install`.
11. Update the `README.md` with the plugin information.

## Compiling Assets
The theme comes with [Laravel Mix](https://www.laravel-mix.com) to compile CSS and JavaScript (if used). By default the theme uses the Alpine.js CDN and the build process does not compile JavaScript.

When working locally you can run `npx mix watch` and Laravel Mix will automatically recompile any time a file is saved.

When you're ready to launch you can run `npx mix --production` and Laravel Mix will minify your CSS (and JavaScript) and remove all unused Tailwind classes.

### Compiling and Using Alpine.js from Theme
To compile Alpine.js and use from the theme instead of the CDN use these steps:
1. Edit **webpack.mix.js** and uncomment `mix.js('./source/js/app.js', 'js');`
2. Edit **header.php** and change
```html
<!-- Replace this line -->
<script defer src="https://unpkg.com/Alpine.js@3.x.x/dist/cdn.min.js"></script>

<!-- With this line -->
<script defer src="<?php get_theme_file_uri( 'js/app.css' ); ?>"></script>
````
3. Edit **source/js/app.js** as needed.
