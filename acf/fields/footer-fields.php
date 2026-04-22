<?php

/**
 * Footer ACF Field Group
 *
 * Registers ACF fields for the footer section, editable via Theme Settings → Footer.
 * Uses 'option' location to make footer content globally manageable.
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_footer_settings',
        'title' => 'Footer Settings',
        'fields' => [

            // ── Brand Section ──────────────────────────────────────
            [
                'key' => 'field_footer_brand_tab',
                'label' => 'Brand',
                'name' => '',
                'type' => 'tab',
                'placement' => 'left',
                'endpoint' => 0,
            ],
            [
                'key' => 'field_footer_logo',
                'label' => 'Footer Logo',
                'name' => 'footer_logo',
                'type' => 'image',
                'instructions' => 'Brand logo displayed in the footer. Recommended: transparent PNG, ~40×40px.',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_name',
                'label' => 'Name / Business Name',
                'name' => 'footer_name',
                'type' => 'text',
                'instructions' => 'Displayed below the logo.',
                'default_value' => 'Joanna Horton McPherson',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_tagline',
                'label' => 'Tagline',
                'name' => 'footer_tagline',
                'type' => 'text',
                'instructions' => 'Short descriptor shown under the name.',
                'default_value' => 'Private Advisor · Master Coach',
            ],
            [
                'key' => 'field_footer_brand_label',
                'label' => 'Brand Label',
                'name' => 'footer_brand_label',
                'type' => 'text',
                'instructions' => 'The trademark / method label.',
                'default_value' => 'True Influence Method™',
            ],

            // ── Social Links ───────────────────────────────────────
            [
                'key' => 'field_footer_social_tab',
                'label' => 'Social Links',
                'name' => '',
                'type' => 'tab',
                'placement' => 'left',
                'endpoint' => 0,
            ],
            [
                'key' => 'field_footer_email',
                'label' => 'Contact Email',
                'name' => 'footer_email',
                'type' => 'email',
                'instructions' => 'Used for the email social icon.',
                'default_value' => 'joanna@trueinfluencemethod.com',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_instagram',
                'label' => 'Instagram URL',
                'name' => 'footer_instagram_url',
                'type' => 'url',
                'instructions' => 'Full Instagram profile URL.',
                'default_value' => 'https://instagram.com/joannahortonmcpherson',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_website',
                'label' => 'Personal Website URL',
                'name' => 'footer_website_url',
                'type' => 'url',
                'instructions' => 'Personal / portfolio website.',
                'default_value' => 'https://joannahortonmcpherson.com',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_linkedin',
                'label' => 'LinkedIn URL',
                'name' => 'footer_linkedin_url',
                'type' => 'url',
                'instructions' => 'LinkedIn profile URL (leave blank to hide).',
                'default_value' => '',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_youtube',
                'label' => 'YouTube URL',
                'name' => 'footer_youtube_url',
                'type' => 'url',
                'instructions' => 'YouTube channel URL (leave blank to hide).',
                'default_value' => '',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_facebook',
                'label' => 'Facebook URL',
                'name' => 'footer_facebook_url',
                'type' => 'url',
                'instructions' => 'Facebook page URL (leave blank to hide).',
                'default_value' => '',
                'wrapper' => ['width' => '50'],
            ],

            // ── Navigation Columns ─────────────────────────────────
            [
                'key' => 'field_footer_nav_tab',
                'label' => 'Navigation',
                'name' => '',
                'type' => 'tab',
                'placement' => 'left',
                'endpoint' => 0,
            ],

            // Explore Column
            [
                'key' => 'field_footer_explore_heading',
                'label' => 'Explore Column Heading',
                'name' => 'footer_explore_heading',
                'type' => 'text',
                'default_value' => 'Explore',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_explore_links',
                'label' => 'Explore Links',
                'name' => 'footer_explore_links',
                'type' => 'repeater',
                'instructions' => 'Add, remove, or reorder the Explore navigation links.',
                'min' => 0,
                'max' => 20,
                'layout' => 'table',
                'button_label' => 'Add Link',
                'sub_fields' => [
                    [
                        'key' => 'field_footer_explore_link_label',
                        'label' => 'Link Label',
                        'name' => 'link_label',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => ['width' => '40'],
                    ],
                    [
                        'key' => 'field_footer_explore_link_url',
                        'label' => 'URL',
                        'name' => 'link_url',
                        'type' => 'url',
                        'required' => 1,
                        'wrapper' => ['width' => '60'],
                    ],
                ],
            ],

            // Programs Column
            [
                'key' => 'field_footer_programs_heading',
                'label' => 'Programs Column Heading',
                'name' => 'footer_programs_heading',
                'type' => 'text',
                'default_value' => 'Programs',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_programs_links',
                'label' => 'Programs Links',
                'name' => 'footer_programs_links',
                'type' => 'repeater',
                'instructions' => 'Add, remove, or reorder the Programs navigation links.',
                'min' => 0,
                'max' => 20,
                'layout' => 'table',
                'button_label' => 'Add Link',
                'sub_fields' => [
                    [
                        'key' => 'field_footer_programs_link_label',
                        'label' => 'Link Label',
                        'name' => 'link_label',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => ['width' => '40'],
                    ],
                    [
                        'key' => 'field_footer_programs_link_url',
                        'label' => 'URL',
                        'name' => 'link_url',
                        'type' => 'url',
                        'required' => 1,
                        'wrapper' => ['width' => '60'],
                    ],
                ],
            ],

            // ── Newsletter ─────────────────────────────────────────
            [
                'key' => 'field_footer_newsletter_tab',
                'label' => 'Newsletter',
                'name' => '',
                'type' => 'tab',
                'placement' => 'left',
                'endpoint' => 0,
            ],
            [
                'key' => 'field_footer_newsletter_heading',
                'label' => 'Newsletter Heading',
                'name' => 'footer_newsletter_heading',
                'type' => 'text',
                'default_value' => 'Stay Connected',
            ],
            [
                'key' => 'field_footer_newsletter_description',
                'label' => 'Newsletter Description',
                'name' => 'footer_newsletter_description',
                'type' => 'text',
                'default_value' => 'Weekly insights on authentic influence.',
            ],
            [
                'key' => 'field_footer_newsletter_placeholder',
                'label' => 'Email Placeholder Text',
                'name' => 'footer_newsletter_placeholder',
                'type' => 'text',
                'default_value' => 'your@email.com',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_newsletter_button_text',
                'label' => 'Button Text',
                'name' => 'footer_newsletter_button_text',
                'type' => 'text',
                'default_value' => 'Subscribe',
                'wrapper' => ['width' => '50'],
            ],

            // ── Bottom Bar ─────────────────────────────────────────
            [
                'key' => 'field_footer_bottom_tab',
                'label' => 'Bottom Bar',
                'name' => '',
                'type' => 'tab',
                'placement' => 'left',
                'endpoint' => 0,
            ],
            [
                'key' => 'field_footer_quote_text',
                'label' => 'Footer Quote',
                'name' => 'footer_quote_text',
                'type' => 'textarea',
                'instructions' => 'Inspirational quote displayed in the bottom bar.',
                'default_value' => '"Traveler, there is no path. The path is made by walking."',
                'rows' => 2,
                'new_lines' => 'br',
            ],
            [
                'key' => 'field_footer_quote_attribution',
                'label' => 'Quote Attribution',
                'name' => 'footer_quote_attribution',
                'type' => 'text',
                'instructions' => 'Who said the quote.',
                'default_value' => '— Antonio Machado',
            ],
            [
                'key' => 'field_footer_copyright',
                'label' => 'Copyright Text',
                'name' => 'footer_copyright',
                'type' => 'text',
                'instructions' => 'Copyright line. Use [year] for dynamic year.',
                'default_value' => '© [year] Joanna Horton McPherson · All rights reserved.',
            ],
            [
                'key' => 'field_footer_privacy_url',
                'label' => 'Privacy Policy URL',
                'name' => 'footer_privacy_url',
                'type' => 'url',
                'default_value' => '',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_terms_url',
                'label' => 'Terms URL',
                'name' => 'footer_terms_url',
                'type' => 'url',
                'default_value' => '',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_privacy_label',
                'label' => 'Privacy Link Label',
                'name' => 'footer_privacy_label',
                'type' => 'text',
                'default_value' => 'Privacy',
                'wrapper' => ['width' => '50'],
            ],
            [
                'key' => 'field_footer_terms_label',
                'label' => 'Terms Link Label',
                'name' => 'footer_terms_label',
                'type' => 'text',
                'default_value' => 'Terms',
                'wrapper' => ['width' => '50'],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-settings-footer',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ]);
}
