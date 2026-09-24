# WordPress Plugin Template

A starter template for building WordPress plugins.

## Requirements

- PHP 8.4 or later
- Composer
- WordPress

## Getting started

1. Rename the plugin directory and `wordpress-plugin-template.php` to match your plugin.
2. Update the plugin header, Composer package name, PHP namespace, and text domain for your plugin.
3. Install the Composer dependencies from the plugin directory:

   ```sh
   composer install
   ```

4. Copy or symlink the plugin into `wp-content/plugins/` and activate it in WordPress.

The plugin entry point loads `vendor/autoload.php` and starts `WordPressPluginTemplate\\Classes\\Plugin`. Add plugin hooks and setup in the `init()` method in `includes/classes/class-plugin.php`.

## Autoloading and file names

Composer uses PSR-4 for conventionally named PHP files under `includes/` and a classmap for `includes/classes/` and `includes/traits/`. The classmap supports the WordPress-style `class-` and `trait-` filename prefixes, for example:

- `includes/classes/class-plugin.php` declares `WordPressPluginTemplate\\Classes\\Plugin`.
- `includes/traits/trait-singleton.php` declares `WordPressPluginTemplate\\Traits\\Singleton`.

After adding or renaming files in the classmapped directories, regenerate the autoloader:

```sh
composer dump-autoload
```

The generated `vendor/` directory is not committed, so it must be generated as part of local setup or your plugin release/build process.
