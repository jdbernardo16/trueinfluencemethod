# ACF CMS for tim-wordpress Theme

This directory contains the programmatic ACF (Advanced Custom Fields) implementation for the tim-wordpress WordPress theme.

## Overview

This ACF CMS allows you to manage all front page content through the WordPress admin interface while maintaining full version control through Git. All field definitions are stored in PHP files, making them trackable and deployable without database synchronization.

## Directory Structure

```
acf/
├── acf-setup.php              # ACF initialization and configuration
├── fields/
│   ├── hero-section.php         # Hero section field group
│   ├── intro-section.php        # Intro section field group
│   ├── paths-section.php        # Paths section field group
│   ├── social-proof-section.php # Social proof field group
│   └── cta-section.php          # CTA section field group
└── helpers/
    └── acf-helpers.php          # Helper functions for ACF
```

## Features

-   **Programmatic Field Registration**: All fields are registered via PHP code
-   **Version Control**: Field definitions are tracked in Git
-   **Automatic Deployment**: Fields auto-register on all environments
-   **Fallback Values**: All fields have sensible defaults
-   **Type Safety**: Helper functions for safe field retrieval

## Setup Instructions

### 1. Install ACF Pro

Ensure ACF Pro is installed and activated on your WordPress site.

### 2. Load ACF Files

The ACF files are automatically loaded by [`functions.php`](../functions.php):

```php
// Load ACF field groups
function tim_wordpress_load_acf_fields() {
    if (!class_exists('ACF')) {
        return;
    }
    require_once get_template_directory() . '/acf/acf-setup.php';
}
add_action('acf/init', 'tim_wordpress_load_acf_fields', 5);
```

### 3. Access ACF Fields

Navigate to **Pages → Front Page** in WordPress admin. You'll see the following field groups:

1. **Hero Section** - Main hero content
2. **Intro Section** - Introduction and features
3. **Paths Section** - Three path options
4. **Social Proof Section** - Testimonials and stats
5. **CTA Section** - Call-to-action content

## Field Groups

### Hero Section

| Field                     | Type     | Description               |
| ------------------------- | -------- | ------------------------- |
| `hero_video_poster`       | Image    | Video poster image        |
| `hero_video_source`       | URL      | Video file URL            |
| `hero_logo_image`         | Image    | Logo image                |
| `hero_heading`            | Text     | Main heading              |
| `hero_quote`              | Text     | Quote text                |
| `hero_description`        | Textarea | Description paragraph     |
| `hero_primary_cta_text`   | Text     | Primary CTA button text   |
| `hero_primary_cta_link`   | URL      | Primary CTA link          |
| `hero_secondary_cta_text` | Text     | Secondary CTA button text |
| `hero_secondary_cta_link` | URL      | Secondary CTA link        |

### Intro Section

| Field                 | Type     | Description                            |
| --------------------- | -------- | -------------------------------------- |
| `intro_badge_text`    | Text     | Badge text                             |
| `intro_heading`       | Text     | Section heading                        |
| `intro_description_1` | Textarea | First description                      |
| `intro_description_2` | Textarea | Second description                     |
| `intro_main_image`    | Image    | Main section image                     |
| `intro_stats_number`  | Text     | Stats card number                      |
| `intro_stats_label`   | Text     | Stats card label                       |
| `intro_features`      | Repeater | Feature items (image, title, subtitle) |

### Paths Section

| Field               | Type     | Description                     |
| ------------------- | -------- | ------------------------------- |
| `paths_badge_text`  | Text     | Badge text                      |
| `paths_heading`     | Text     | Section heading                 |
| `paths_description` | Textarea | Section description             |
| `paths_items`       | Repeater | Path items with nested features |

Each path item contains:

-   `path_icon` (Select): user, users, or building
-   `path_title` (Text): Path title
-   `path_description` (Textarea): Path description
-   `path_price` (Text): Price
-   `path_cta_text` (Text): CTA button text
-   `path_cta_link` (URL): CTA link
-   `path_badge` (Text): Badge text
-   `path_features` (Repeater): Feature list

### Social Proof Section

| Field                       | Type     | Description              |
| --------------------------- | -------- | ------------------------ |
| `social_proof_badge_text`   | Text     | Badge text               |
| `testimonials`              | Repeater | Testimonial items        |
| `stats_leaders_number`      | Text     | Leaders stat number      |
| `stats_leaders_label`       | Text     | Leaders stat label       |
| `stats_satisfaction_number` | Text     | Satisfaction stat number |
| `stats_satisfaction_label`  | Text     | Satisfaction stat label  |
| `stats_years_number`        | Text     | Years stat number        |
| `stats_years_label`         | Text     | Years stat label         |

Each testimonial contains:

-   `testimonial_quote` (Textarea): Quote text
-   `testimonial_author` (Text): Author name
-   `testimonial_type` (Text): Client type
-   `testimonial_image` (Image): Author image

### CTA Section

| Field                    | Type     | Description               |
| ------------------------ | -------- | ------------------------- |
| `cta_background_image`   | Image    | Background image          |
| `cta_heading`            | Text     | Section heading           |
| `cta_description`        | Textarea | Description paragraph     |
| `cta_primary_cta_text`   | Text     | Primary CTA button text   |
| `cta_primary_cta_link`   | URL      | Primary CTA link          |
| `cta_secondary_cta_text` | Text     | Secondary CTA button text |
| `cta_secondary_cta_link` | URL      | Secondary CTA link        |
| `trust_indicators`       | Repeater | Trust indicator text      |

## Using ACF Fields in Templates

### Basic Field Retrieval

```php
// Get a field with fallback
$heading = get_field('hero_heading') ?: 'Default Heading';

// Output with escaping
echo esc_html($heading);
```

### Image Fields

```php
$image = get_field('hero_logo_image');
if ($image) {
    $url = $image['url'];
    $alt = $image['alt'] ?: 'Default alt text';
}
```

### Repeater Fields

```php
if (have_rows('intro_features')) {
    while (have_rows('intro_features')) {
        the_row();
        $title = get_sub_field('feature_title');
        $subtitle = get_sub_field('feature_subtitle');
        // Output content
    }
}
```

### Nested Repeaters

```php
if (have_rows('paths_items')) {
    while (have_rows('paths_items')) {
        the_row();
        // Get parent fields
        $title = get_sub_field('path_title');

        // Get nested repeater
        if (have_rows('path_features')) {
            while (have_rows('path_features')) {
                the_row();
                $feature = get_sub_field('feature_text');
                // Output feature
            }
        }
    }
}
```

## Helper Functions

The [`acf-helpers.php`](helpers/acf-helpers.php) file provides utility functions:

### `tim_get_field($field_name, $default = '')`

Get a field with a default fallback.

```php
$heading = tim_get_field('hero_heading', 'Default Heading');
```

### `tim_get_image_field($field_name, $fallback_url = '', $fallback_alt = '')`

Get an image field with fallback URL and alt text.

```php
$image = tim_get_image_field('hero_logo_image', '/default-logo.png', 'Logo');
$url = $image['url'];
$alt = $image['alt'];
```

### `tim_get_repeater_field($field_name, $fallback = [])`

Get a repeater field with fallback array.

```php
$features = tim_get_repeater_field('intro_features', [
    ['title' => 'Default 1', 'subtitle' => 'Subtitle 1'],
    ['title' => 'Default 2', 'subtitle' => 'Subtitle 2'],
]);
```

## Deployment Workflow

### Local Development

1. Edit ACF field definitions in [`fields/`](fields/) directory
2. Test fields in WordPress admin
3. Update template parts to use `get_field()`
4. Verify content displays correctly

### Git Workflow

```bash
# Add changes
git add acf/ template-parts/

# Commit changes
git commit -m "Add ACF fields for hero section"

# Push to GitHub
git push origin main
```

### Production Deployment

```bash
# SSH into Hostinger
ssh user@hostinger.com

# Navigate to theme directory
cd public_html/wp-content/themes/tim-wordpress

# Pull latest changes
git pull origin main
```

**No database sync required!** Fields automatically register when code is deployed.

## Adding New Field Groups

1. Create a new file in [`acf/fields/`](fields/) directory
2. Use the `acf_add_local_field_group()` function
3. Follow the field group structure from existing files
4. The field group will automatically load

Example:

```php
<?php
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_custom_section',
        'title' => 'Custom Section',
        'fields' => [
            // Field definitions
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
        'menu_order' => 10,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => [],
        'active' => true,
        'description' => 'Custom section fields.',
    ]);
}
```

## Best Practices

### Field Naming

-   Use lowercase with underscores: `hero_heading`
-   Group related fields with prefixes: `hero_`, `intro_`, `paths_`
-   Be descriptive but concise

### Default Values

Always provide default values in templates:

```php
$heading = get_field('hero_heading') ?: 'Default Heading';
```

### Image Handling

Use the array return type for images:

```php
$image = get_field('hero_logo_image');
if ($image) {
    $url = $image['url'];
    $alt = $image['alt'];
}
```

### Repeater Fields

Always check if repeater has rows:

```php
if (have_rows('intro_features')) {
    while (have_rows('intro_features')) {
        the_row();
        // Access subfields
    }
}
```

### Security

Always sanitize output:

```php
// Text
echo esc_html($field_value);

// URLs
echo esc_url($field_value);

// HTML content
echo wp_kses_post($field_value);

// Attributes
echo esc_attr($field_value);
```

## Troubleshooting

### Fields Not Appearing in Admin

1. Check that ACF Pro is installed and activated
2. Verify the page template is set to "Front Page"
3. Check that [`acf-setup.php`](acf-setup.php) is being loaded
4. Clear WordPress cache

### Fields Not Displaying on Frontend

1. Verify field names match between registration and template
2. Check that `get_field()` is being called correctly
3. Ensure fields have been saved in the admin
4. Check for PHP errors in debug mode

### Images Not Loading

1. Verify image field returns an array
2. Check that `$image['url']` is being used
3. Ensure images are uploaded to WordPress media library
4. Check file permissions

## Resources

-   [ACF Pro Documentation](https://www.advancedcustomfields.com/resources/)
-   [ACF Local Fields](https://www.advancedcustomfields.com/resources/register-fields-via-php/)
-   [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
-   [Theme Documentation](../README.md)

## Support

For issues or questions:

1. Check the [implementation plan](../plans/acf-cms-implementation-plan.md)
2. Review the [architecture diagram](../plans/acf-architecture-diagram.md)
3. Consult ACF Pro documentation
4. Contact development team

## License

This ACF implementation is part of the tim-wordpress theme and follows the same license.
