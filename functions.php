<?php

class wp_ng_theme
{
    function enqueue_scripts()
    {
        wp_enqueue_style(
            'bootstrapCSS',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
            array(),
            '1.0',
            'all'
        );

        wp_enqueue_script(
            'bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',
        );

        wp_enqueue_script(
            'angular-core',
            'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
            array(
                'jquery'
            ),
            '1.0',
            false,
            'all'
        );

        wp_enqueue_script(
            'angular-resource',
            'https://code.angularjs.org/1.5.9/angular-resource.js',
            array(
                'angular-core'
            ),
            '1.0',
            false

        );
        wp_enqueue_script(
            'ui-route',
            'https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.min.js',
            array(
                'angular-core'
            ),
            '1.0',
            false

        );

        wp_enqueue_script(
            'angular-route',
            get_template_directory_uri() . '/assets/js/angular-route.js',
            array(
                'angular-core'
            ),
            '1.0',
            false

        );

        wp_enqueue_script(
            'ngScripts',
            get_template_directory_uri() . '/assets/js/angular-theme.js'
        );
        wp_localize_script(
            'ngScripts',
            'appInfo',
            array(
                // 'api_url'=> rest_get_url_prefix() . '/wp/v2/',
                // 'api_url'=> get_rest_url( null, 'wp/v2/' ),
                'api_url' => rest_get_url_prefix() . '/wp/v2/',
                'template_directory' => get_template_directory_uri() . '/',
                'nonce' => wp_create_nonce('wp_rest'),
                'is_admin' => current_user_can('administrator'),
            )
        );
    }
}


$ng_theme = new wp_ng_theme();
add_action(
    'wp_enqueue_scripts',
    array(
        $ng_theme,
        'enqueue_scripts'
    )
);

