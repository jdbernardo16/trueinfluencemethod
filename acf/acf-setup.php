<?php

/**
 * ACF Setup and Configuration
 *
 * This file initializes ACF and configures it for the theme.
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configure ACF settings
 */
function tim_wordpress_acf_settings()
{
    // Save ACF JSON to theme (disabled since we're using programmatic fields)
    // add_filter('acf/settings/save_json', function() {
    //     return get_template_directory() . '/acf/json';
    // });

    // Load ACF JSON from theme (disabled since we're using programmatic fields)
    // add_filter('acf/settings/load_json', function($paths) {
    //     $paths[] = get_template_directory() . '/acf/json';
    //     return $paths;
    // });

    // Hide ACF in production
    if (!defined('ACF_DEV_MODE') || !ACF_DEV_MODE) {
        add_filter('acf/settings/show_admin', '__return_false');
    }

    // Add ACF options page (optional, for global settings)
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_theme_options',
            'position' => 60,
            'icon_url' => 'dashicons-admin-generic',
            'redirect' => false,
        ]);
    }
}
add_action('acf/init', 'tim_wordpress_acf_settings');

/**
 * Register ACF field groups for front page
 */
function tim_wordpress_register_acf_field_groups()
{
    // Load all field group files
    $field_groups = [
        'hero-section',
        'intro-section',
        'paths-section',
        'social-proof-section',
        'cta-section',
    ];

    foreach ($field_groups as $field_group) {
        $file = get_template_directory() . "/acf/fields/{$field_group}.php";
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
add_action('acf/init', 'tim_wordpress_register_acf_field_groups');

/**
 * Add ACF to admin menu for easy access
 */
function tim_wordpress_acf_admin_menu()
{
    // Add a custom admin menu item for ACF fields
    add_menu_page(
        'ACF Field Groups',
        'ACF Fields',
        'manage_options',
        'edit.php?post_type=acf-field-group',
        '',
        'dashicons-admin-generic',
        60
    );
}
add_action('admin_menu', 'tim_wordpress_acf_admin_menu');

/**
 * Enqueue ACF admin styles
 */
function tim_wordpress_acf_admin_styles()
{
    if (is_admin() && function_exists('get_current_screen')) {
        $screen = get_current_screen();
        if ($screen && (strpos($screen->id, 'acf') !== false || $screen->id === 'page')) {
            $css_file = get_template_directory() . '/resources/css/admin-acf.css';

            // Only enqueue if the file exists
            if (file_exists($css_file)) {
                wp_enqueue_style(
                    'tim-wordpress-acf-admin',
                    get_template_directory_uri() . '/resources/css/admin-acf.css',
                    [],
                    filemtime($css_file)
                );
            }
        }
    }
}
add_action('admin_enqueue_scripts', 'tim_wordpress_acf_admin_styles');
