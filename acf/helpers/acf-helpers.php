<?php

/**
 * ACF Helper Functions
 *
 * Utility functions for working with ACF fields in the theme.
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get ACF field with default fallback
 *
 * @param string $field_name The ACF field name
 * @param mixed $default The default value if field is empty
 * @param mixed $post_id The post ID or 'option' for options pages
 * @return mixed The field value or default
 */
function tim_get_field($field_name, $default = '', $post_id = false)
{
    $value = get_field($field_name, $post_id);
    return ($value !== null && $value !== '' && $value !== false) ? $value : $default;
}

/**
 * Get ACF image URL with fallback
 *
 * @param string $field_name The ACF field name
 * @param string $fallback_url The fallback URL if field is empty
 * @param string $fallback_alt The fallback alt text
 * @param mixed $post_id The post ID or 'option' for options pages
 * @return array Array with 'url' and 'alt' keys
 */
function tim_get_image_field($field_name, $fallback_url = '', $fallback_alt = '', $post_id = false)
{
    $image = get_field($field_name, $post_id);

    if ($image && is_array($image)) {
        return [
            'url' => $image['url'],
            'alt' => $image['alt'] ?: $fallback_alt,
        ];
    }

    return [
        'url' => $fallback_url,
        'alt' => $fallback_alt,
    ];
}

/**
 * Get ACF repeater with fallback
 *
 * @param string $field_name The ACF field name
 * @param array $fallback The fallback array if field is empty
 * @param mixed $post_id The post ID or 'option' for options pages
 * @return array The repeater data or fallback
 */
function tim_get_repeater_field($field_name, $fallback = [], $post_id = false)
{
    $items = get_field($field_name, $post_id);
    return !empty($items) && is_array($items) ? $items : $fallback;
}

/**
 * Get ACF subfield with default fallback
 *
 * @param string $subfield_name The ACF subfield name
 * @param mixed $default The default value if subfield is empty
 * @return mixed The subfield value or default
 */
function tim_get_sub_field($subfield_name, $default = '')
{
    $value = get_sub_field($subfield_name);
    return $value !== null && $value !== '' ? $value : $default;
}

/**
 * Safe output for text fields
 *
 * @param string $text The text to output
 * @return void
 */
function tim_esc_text($text)
{
    echo esc_html($text);
}

/**
 * Safe output for URL fields
 *
 * @param string $url The URL to output
 * @return void
 */
function tim_esc_url($url)
{
    echo esc_url($url);
}

/**
 * Safe output for rich text fields
 *
 * @param string $content The content to output
 * @return void
 */
function tim_esc_content($content)
{
    echo wp_kses_post($content);
}

/**
 * Check if ACF is active
 *
 * @return bool True if ACF is active
 */
function tim_is_acf_active()
{
    return class_exists('ACF');
}

/**
 * Get front page ID
 *
 * @return int The front page ID
 */
function tim_get_front_page_id()
{
    return get_option('page_on_front');
}

/**
 * Check if current page is front page
 *
 * @return bool True if current page is front page
 */
function tim_is_front_page()
{
    return is_front_page();
}
