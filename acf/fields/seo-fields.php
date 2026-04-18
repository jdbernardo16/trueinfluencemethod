<?php

/**
 * SEO Fields ACF Field Group
 *
 * Consolidated SEO fields available on all pages and posts.
 * Single title, description, and image fields feed all SEO purposes
 * (browser tab, Open Graph, Twitter Card).
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_seo_fields',
        'title' => 'SEO Settings',
        'fields' => [

            // SEO Title
            [
                'key' => 'field_seo_title',
                'label' => 'SEO Title',
                'name' => 'seo_title',
                'type' => 'text',
                'instructions' => 'Used for the browser tab title, Open Graph title, and Twitter Card title. Leave empty to use the default page title.',
                'required' => 0,
                'maxlength' => 60,
                'placeholder' => '',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Meta Description
            [
                'key' => 'field_seo_description',
                'label' => 'Meta Description',
                'name' => 'seo_description',
                'type' => 'textarea',
                'instructions' => 'Used for search engine results, Open Graph description, and Twitter Card description. Recommended: 150-160 characters.',
                'required' => 0,
                'maxlength' => 160,
                'rows' => 3,
                'placeholder' => '',
                'new_lines' => '',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Social Sharing Image
            [
                'key' => 'field_seo_image',
                'label' => 'Social Sharing Image',
                'name' => 'seo_image',
                'type' => 'image',
                'instructions' => 'Used for Open Graph and Twitter Card images. Recommended size: 1200x630px. Leave empty to use the default.',
                'required' => 0,
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Canonical URL
            [
                'key' => 'field_seo_canonical_url',
                'label' => 'Canonical URL',
                'name' => 'seo_canonical_url',
                'type' => 'url',
                'instructions' => 'Override the canonical URL for this page. Leave empty to use the default URL.',
                'required' => 0,
                'placeholder' => '',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Noindex
            [
                'key' => 'field_seo_robots_noindex',
                'label' => 'Noindex',
                'name' => 'seo_robots_noindex',
                'type' => 'true_false',
                'instructions' => 'Prevent search engines from indexing this page.',
                'required' => 0,
                'default_value' => 0,
                'message' => '',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Nofollow
            [
                'key' => 'field_seo_robots_nofollow',
                'label' => 'Nofollow',
                'name' => 'seo_robots_nofollow',
                'type' => 'true_false',
                'instructions' => 'Prevent search engines from following links on this page.',
                'required' => 0,
                'default_value' => 0,
                'message' => '',
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Page Type (OG Type)
            [
                'key' => 'field_seo_og_type',
                'label' => 'Page Type',
                'name' => 'seo_og_type',
                'type' => 'select',
                'instructions' => 'The type of content for Open Graph.',
                'required' => 0,
                'choices' => [
                    'website' => 'Website',
                    'article' => 'Article',
                    'profile' => 'Profile',
                ],
                'default_value' => 'website',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'placeholder' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],

            // Twitter Card Type
            [
                'key' => 'field_seo_twitter_card_type',
                'label' => 'Twitter Card Type',
                'name' => 'seo_twitter_card_type',
                'type' => 'select',
                'instructions' => 'How this page appears when shared on Twitter.',
                'required' => 0,
                'choices' => [
                    'summary' => 'Summary',
                    'summary_large_image' => 'Summary Large Image',
                ],
                'default_value' => 'summary_large_image',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'placeholder' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'articles',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'blog',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'media',
                ],
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'tips',
                ],
            ],
        ],
        'menu_order' => 1,
        'position' => 'acf_after_title',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => [],
        'active' => true,
        'description' => 'Custom SEO settings for this page. Values here override defaults in search engine and social sharing meta tags.',
    ]);
}
