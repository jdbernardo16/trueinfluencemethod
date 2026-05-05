<?php

/**
 * CTA Section ACF Field Group
 *
 * Registers ACF fields for the CTA section on the front page.
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_cta_section',
        'title' => 'CTA Section',
        'fields' => [
            [
                'key' => 'field_cta_background_image',
                'label' => 'Background Image',
                'name' => 'cta_background_image',
                'type' => 'image',
                'instructions' => 'The background image for the CTA section.',
                'required' => 0,
                'return_format' => 'array',
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
            [
                'key' => 'field_cta_heading',
                'label' => 'Section Heading',
                'name' => 'cta_heading',
                'type' => 'text',
                'instructions' => 'The main heading for the CTA section.',
                'required' => 0,
                'default_value' => 'The Path Is Made By Walking.',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_cta_description',
                'label' => 'Description',
                'name' => 'cta_description',
                'type' => 'textarea',
                'instructions' => 'The description text for the CTA section.',
                'required' => 0,
                'default_value' => "You've done the work. You've built the vision. Now it's time to speak it into the world — with the clarity, courage, and influence your leadership deserves.",
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => 'wpautop',
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_cta_primary_cta_text',
                'label' => 'Primary CTA Button Text',
                'name' => 'cta_primary_cta_text',
                'type' => 'text',
                'instructions' => 'The text for the primary call-to-action button.',
                'required' => 0,
                'default_value' => 'Start Your Journey',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_cta_primary_cta_link',
                'label' => 'Primary CTA Link',
                'name' => 'cta_primary_cta_link',
                'type' => 'page_link',
                'instructions' => 'Select the page for the primary call-to-action button.',
                'required' => 0,
                'post_type' => ['page'],
                'taxonomy' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_cta_secondary_cta_text',
                'label' => 'Secondary CTA Button Text',
                'name' => 'cta_secondary_cta_text',
                'type' => 'text',
                'instructions' => 'The text for the secondary call-to-action button.',
                'required' => 0,
                'default_value' => 'Book a Consultation',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_cta_secondary_cta_link',
                'label' => 'Secondary CTA Link',
                'name' => 'cta_secondary_cta_link',
                'type' => 'page_link',
                'instructions' => 'Select the page for the secondary call-to-action button (or enter an external URL).',
                'required' => 0,
                'post_type' => ['page'],
                'taxonomy' => [],
                'allow_null' => 0,
                'multiple' => 0,
                'wrapper' => [
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_trust_indicators',
                'label' => 'Trust Indicators',
                'name' => 'trust_indicators',
                'type' => 'repeater',
                'instructions' => 'Add trust indicators (No obligation, Complimentary call, Private & confidential).',
                'required' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => 'Add Trust Indicator',
                'sub_fields' => [
                    [
                        'key' => 'field_trust_indicator_text',
                        'label' => 'Indicator Text',
                        'name' => 'indicator_text',
                        'type' => 'text',
                        'instructions' => 'The text for the trust indicator.',
                        'required' => 0,
                        'default_value' => '',
                        'placeholder' => 'e.g., No obligation',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                    ],
                ],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ],
            ],
        ],
        'menu_order' => 4,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => [],
        'active' => true,
        'description' => 'Configure the CTA section content for the front page.',
    ]);
}
