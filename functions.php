<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

add_action('template_redirect', function () {
    if (is_admin() || wp_doing_ajax() || (defined('REST_REQUEST') && REST_REQUEST)) return;
    if (is_preview()) return;
    if (is_user_logged_in()) return;

    if (is_page('welcome')) {
        $expiry = time() + YEAR_IN_SECONDS;
        setcookie('clincity_entered', '1', $expiry, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
        $_COOKIE['clincity_entered'] = '1';
        return;
    }

    if (!is_front_page()) return;
    if (!empty($_COOKIE['clincity_entered']) && $_COOKIE['clincity_entered'] === '1') return;
    if (isset($_GET['nosplash']) && $_GET['nosplash'] === '1') return;

    $expiry = time() + YEAR_IN_SECONDS;
    setcookie('clincity_entered', '1', $expiry, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
    $_COOKIE['clincity_entered'] = '1';

    wp_safe_redirect(home_url('/welcome/'), 302);
    exit;
});
