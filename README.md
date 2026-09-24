# WordPress Plugin Template

A starter template for building WordPress plugins.

## Requirements

- PHP 8.4 or later
- Composer
- WordPress 6.8 or later

## Getting started

1. Rename the plugin directory and `wordpress-plugin-template.php` to match your plugin.
2. Update the plugin header, Composer package name, PHP namespace, and text domain for your plugin.
3. Install the Composer dependencies from the plugin directory:

   ```sh
   composer install
   ```

4. Copy or symlink the plugin into `wp-content/plugins/` and activate it in WordPress.

The plugin entry point loads `vendor/autoload.php` and starts `WordPressPluginTemplate\\Classes\\Plugin`. Add plugin hooks and setup in the `init()` method in `includes/classes/class-plugin.php`.

`uninstall.php` is guarded by `WP_UNINSTALL_PLUGIN`. It currently performs no cleanup because the template does not store persistent plugin data; add deletion logic there if you introduce stored options or tables.

## Autoloading and file names

Composer uses PSR-4 for conventionally named PHP files under `includes/` and a classmap for `includes/classes/` and `includes/traits/`. The classmap supports the WordPress-style `class-` and `trait-` filename prefixes, for example:

- `includes/classes/class-plugin.php` declares `WordPressPluginTemplate\\Classes\\Plugin`.
- `includes/traits/trait-singleton.php` declares `WordPressPluginTemplate\\Traits\\Singleton`.

After adding or renaming files in the classmapped directories, regenerate the autoloader:

```sh
composer dump-autoload
```

The generated `vendor/` directory is not committed, so it must be generated as part of local setup or your plugin release/build process.

## PHP coding standards

This template uses the official WordPress Coding Standards through PHPCS. Install the development dependencies with `composer install`, then check the PHP files with:

```sh
composer lint:php
```

To automatically fix supported formatting issues, run:

```sh
composer lint:php:fix
```

The rules are configured in `phpcs.xml.dist`. Review automatic fixes before committing them.

PHPStan runs with WordPress stubs and extension rules to statically analyze the plugin PHP code. Run it with:

```sh
composer phpstan
```

Configuration is in `phpstan.neon.dist`; generated assets and Composer dependencies are excluded.

The `php-stubs/wordpress-stubs` development dependency provides WordPress function and class declarations to PHP language servers without requiring a local WordPress core checkout. VS Code Intelephense and Zed's default Phpactor server are configured to index `vendor/php-stubs/wordpress-stubs`, with a higher file-size limit for the 5+ MB stub file. Phpactor keeps its project index in the ignored `.phpactor-cache/` folder so the stubs are indexed on first launch. In other editors, add that directory as a PHP include/stub path and ensure the editor's indexing size limit is high enough. Install Composer dependencies before opening the project so the stubs are present.

## Front-end assets

Node.js 24 is pinned in `.nvmrc`. The asset pipeline uses `@wordpress/scripts` for Webpack builds, SCSS compilation, WordPress dependency extraction, linting, and Vitest unit tests. Install the JavaScript development dependencies with:

```sh
npm install
```

Source assets live under `assets/src/`: SCSS in `css/`, TypeScript in `js/`, and Vitest tests in `js/tests/`. The `main`, `blocks`, and `editor` TypeScript entries import their matching SCSS files. Each custom block lives in its own `assets/src/blocks/<block-name>/` directory and is discovered from its `block.json`. Use these commands during development:

```sh
npm start          # Rebuild assets when source files change
npm run build      # Type-check TypeScript and create a production build
npm run test:unit       # Run Vitest once through wp-scripts
npm run test:unit:watch # Run Vitest in watch mode
npm run lint:js    # Lint TypeScript/JavaScript
npm run lint:css   # Lint styles
```

`wp-scripts` writes the production files and `.asset.php` dependency metadata to `assets/build/`, which is generated and ignored by Git. Generate it before packaging a release.

The `Assets` class (`includes/classes/class-assets.php`) enqueues the main bundle on the front end, shared block assets on `enqueue_block_assets`, and editor assets on `enqueue_block_editor_assets`. `@wordpress/scripts` discovers and builds every block with a `block.json` under `assets/src/blocks/`, then generates `assets/build/blocks-manifest.php`; the `Blocks` class registers the collection through WordPress's metadata-collection API. Each block keeps registration in `index.tsx` and editor UI in `edit.tsx`; the static example also has `save.tsx`, and both have a front-end `view.ts` entry. The dynamic example renders through `render.php`. Run `npm run build` before testing assets in WordPress.
