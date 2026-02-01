<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

/**
 * Handle custom routes.
 */
add_action('template_redirect', function () {
    $route = get_query_var('clin_route');

    if ($route === 'welcome') {
        echo \Roots\view('welcome-page')->render();
        exit;
    }

    if ($route === 'team') {
        echo \Roots\view('team-template')->render();
        exit;
    }
    if ($route === 'rooms') {
        echo \Roots\view('rooms-template')->render();
        exit;
    }
    if ($route === 'treatments') {
        echo \Roots\view('treatments-template')->render();
        exit;
    }
});
