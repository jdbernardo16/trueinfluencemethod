<?php

/**
 * About Joanna Section ACF Field Group
 *
 * Registers ACF fields for the about Joanna section on the front page.
 *
 * @package tim-wordpress
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group([
        'key' => 'group_about_joanna_section',
        'title' => 'About Joanna Section',
        'fields' => [
            [
                'key' => 'field_about_joanna_heading',
                'label' => 'Heading',
                'name' => 'about_joanna_heading',
                'type' => 'text',
                'instructions' => 'The main headline for this section.',
                'required' => 0,
                'default_value' => 'Unlock Your Message',
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
                'key' => 'field_about_joanna_subtitle',
                'label' => 'Subtitle',
                'name' => 'about_joanna_subtitle',
                'type' => 'text',
                'instructions' => 'The subtitle displayed below the heading.',
                'required' => 0,
                'default_value' => 'Increase Revenue. Expand Your Influence. Deepen Your Impact.',
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
                'key' => 'field_about_joanna_bullet_points',
                'label' => 'Bullet Points',
                'name' => 'about_joanna_bullet_points',
                'type' => 'repeater',
                'instructions' => 'Add bullet points for the body content.',
                'required' => 0,
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add Bullet Point',
                'sub_fields' => [
                    [
                        'key' => 'field_about_joanna_bullet_point',
                        'label' => 'Bullet Point',
                        'name' => 'bullet_point',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => [
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ],
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ],
                ],
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
            ],
            [
                'key' => 'field_about_joanna_closing_line',
                'label' => 'Closing Line',
                'name' => 'about_joanna_closing_line',
                'type' => 'text',
                'instructions' => 'The closing statement at the bottom of the section.',
                'required' => 0,
                'default_value' => 'Clients report $1M+ increase in sales',
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
                'key' => 'field_about_joanna_image',
                'label' => 'Section Image',
                'name' => 'about_joanna_image',
                'type' => 'image',
                'instructions' => 'The image displayed in this section. Recommended: portrait orientation, high quality.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => [
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ],
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
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
        'menu_order' => 3,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ]);
}
