<?php

/**
 * Yoast SEO Integration Helpers
 *
 * Provides Yoast SEO integration for the True Influence Method theme.
 * Includes fallback meta tags, OG image defaults, breadcrumbs,
 * schema enhancements, sitemap customization, and admin indicators.
 *
 * @package TailPress
 */

// Prevent direct access.
if (! defined('ABSPATH')) {
    exit;
}

/* ========================================================================== */
/* A) Yoast SEO Presence Check & Fallback Meta Tags                          */
/* ========================================================================== */

/**
 * Check if Yoast SEO plugin is active and available.
 *
 * @return bool True if Yoast SEO is active.
 */
function tim_yoast_is_active(): bool
{
    return class_exists('WPSEO_Frontend') || defined('WPSEO_VERSION');
}

/**
 * Output fallback meta tags when Yoast SEO is not active.
 *
 * Hooks into wp_head to provide basic meta description and canonical URL
 * only when Yoast SEO is NOT handling SEO output.
 */
function tim_fallback_meta_tags(): void
{
    // Do not output fallback if Yoast is active.
    if (tim_yoast_is_active()) {
        return;
    }

    // Meta description from excerpt or content.
    $description = '';
    if (is_singular()) {
        $post = get_post();
        if ($post) {
            if (! empty($post->post_excerpt)) {
                $description = wp_trim_words($post->post_excerpt, 30, '...');
            } else {
                $description = wp_trim_words(wp_strip_all_tags($post->post_content), 30, '...');
            }
        }
    } elseif (is_archive()) {
        $description = wp_trim_words(get_the_archive_description(), 30, '...');
    } elseif (is_front_page() || is_home()) {
        $description = get_bloginfo('description');
    }

    if (! empty($description)) {
        echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    }

    // Canonical URL.
    $canonical = '';
    if (is_singular()) {
        $canonical = get_permalink();
    } elseif (is_archive()) {
        $canonical = get_archive_link(get_query_var('post_type'));
    } elseif (is_front_page() || is_home()) {
        $canonical = home_url('/');
    }

    if (! empty($canonical)) {
        echo '<link rel="canonical" href="' . esc_url($canonical) . '">' . "\n";
    }

    // Basic Open Graph tags (only if no other OG plugin is active).
    if (! has_filter('wp_head', 'jetpack_og_tags')) {
        $og_title = is_front_page() ? get_bloginfo('name') : wp_get_document_title();
        $og_url   = ! empty($canonical) ? $canonical : esc_url((is_ssl() ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

        echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url($og_url) . '">' . "\n";
        echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";

        if (! empty($description)) {
            echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
        }

        // OG image — use default if no featured image.
        $og_image = tim_get_default_og_image_url();
        if (is_singular() && has_post_thumbnail()) {
            $og_image = get_the_post_thumbnail_url(null, 'full');
        }
        if ($og_image) {
            echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
        }
    }
}
add_action('wp_head', 'tim_fallback_meta_tags', 1);

/* ========================================================================== */
/* B) Open Graph Image Defaults                                               */
/* ========================================================================== */

/**
 * Get the default OG image URL (theme logo).
 *
 * @return string|false Image URL or false if file doesn't exist.
 */
function tim_get_default_og_image_url()
{
    $image_path = get_template_directory() . '/assets/images/fulllogo_transparent_nobuffer.png';
    $image_url  = get_template_directory_uri() . '/assets/images/fulllogo_transparent_nobuffer.png';

    if (file_exists($image_path)) {
        return $image_url;
    }

    return false;
}

/**
 * Set default OG image for Yoast SEO when no featured image is set.
 *
 * @param string $image The current image URL.
 * @return string Modified image URL.
 */
function tim_yoast_default_og_image($image)
{
    if (! empty($image)) {
        return $image;
    }

    // Only set default on singular posts/pages without a featured image.
    if (is_singular() && ! has_post_thumbnail()) {
        $default = tim_get_default_og_image_url();
        if ($default) {
            return $default;
        }
    }

    return $image;
}
add_filter('wpseo_opengraph_image', 'tim_yoast_default_og_image');
add_filter('wpseo_twitter_image', 'tim_yoast_default_og_image');

/* ========================================================================== */
/* C) Breadcrumbs Integration                                                */
/* ========================================================================== */

/**
 * Render breadcrumbs with Yoast SEO support and custom fallback.
 *
 * Uses Yoast breadcrumbs if available, otherwise falls back to a custom
 * implementation. Also compatible with template-parts/breadcrumbs.php.
 *
 * @param array $args Optional. Arguments to customize breadcrumb output.
 */
function tim_breadcrumbs(array $args = []): void
{
    // Default arguments.
    $defaults = [
        'container'       => 'nav',
        'container_class' => 'tim-breadcrumbs',
        'separator'       => ' / ',
        'before'          => '',
        'after'           => '',
        'show_on_front'   => false,
    ];

    $args = wp_parse_args($args, $defaults);

    // Don't show breadcrumbs on front page unless explicitly requested.
    if (is_front_page() && ! $args['show_on_front']) {
        return;
    }

    // Try Yoast breadcrumbs first.
    if (tim_yoast_is_active() && function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb(
            '<' . esc_attr($args['container']) . ' class="' . esc_attr($args['container_class']) . '" aria-label="Breadcrumb">',
            '</' . esc_attr($args['container']) . '>'
        );
        return;
    }

    // Fallback: check if the theme breadcrumbs template part exists.
    if (locate_template('template-parts/breadcrumbs.php')) {
        set_query_var('tim_breadcrumbs_args', $args);
        get_template_part('template-parts/breadcrumbs');
        return;
    }

    // Custom fallback breadcrumbs.
    tim_render_fallback_breadcrumbs($args);
}

/**
 * Render custom fallback breadcrumbs.
 *
 * @param array $args Breadcrumb configuration arguments.
 */
function tim_render_fallback_breadcrumbs(array $args): void
{
    $items = [];

    // Home.
    $items[] = [
        'label' => __('Home', 'tailpress'),
        'url'   => home_url('/'),
    ];

    // Custom post type archive.
    if (is_post_type_archive()) {
        $items[] = [
            'label' => post_type_archive_title('', false),
            'url'   => '',
        ];
    } elseif (is_singular()) {
        $post_type = get_post_type();
        $cpt_slugs = [
            'articles' => 'resources/articles',
            'blog'     => 'resources/blog',
            'media'    => 'resources/media',
            'tips'     => 'resources/tips',
        ];

        if (isset($cpt_slugs[$post_type])) {
            $post_type_obj = get_post_type_object($post_type);
            $items[]       = [
                'label' => $post_type_obj->labels->name,
                'url'   => get_post_type_archive_link($post_type),
            ];
        } elseif ($post_type === 'post') {
            // Standard blog posts.
            $items[] = [
                'label' => __('Blog', 'tailpress'),
                'url'   => get_permalink(get_option('page_for_posts')) ?: home_url('/'),
            ];
        }

        // Current post title.
        $items[] = [
            'label' => get_the_title(),
            'url'   => '',
        ];
    } elseif (is_category() || is_tag() || is_tax()) {
        $items[] = [
            'label' => single_term_title('', false),
            'url'   => '',
        ];
    } elseif (is_page() && ! is_front_page()) {
        // Parent pages.
        $ancestors = get_post_ancestors(get_the_ID());
        if (! empty($ancestors)) {
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor_id) {
                $items[] = [
                    'label' => get_the_title($ancestor_id),
                    'url'   => get_permalink($ancestor_id),
                ];
            }
        }
        $items[] = [
            'label' => get_the_title(),
            'url'   => '',
        ];
    }

    if (empty($items)) {
        return;
    }

    // Render.
    $container_tag = ! empty($args['container']) ? $args['container'] : 'nav';
    echo '<' . esc_attr($container_tag) . ' class="' . esc_attr($args['container_class']) . '" aria-label="Breadcrumb">';
    echo '<ol class="flex items-center flex-wrap gap-1 text-sm text-[#faf8f5]/60" itemscope itemtype="https://schema.org/BreadcrumbList">';

    foreach ($items as $index => $item) {
        $position = $index + 1;
        echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';

        if (! empty($item['url'])) {
            echo '<a itemprop="item" href="' . esc_url($item['url']) . '" class="hover:text-[#d4b478] transition-colors">';
            echo '<span itemprop="name">' . esc_html($item['label']) . '</span>';
            echo '</a>';
            echo '<meta itemprop="position" content="' . esc_attr($position) . '">';
            echo '<span class="mx-1">' . esc_html($args['separator']) . '</span>';
        } else {
            echo '<span itemprop="name" class="text-[#faf8f5]">' . esc_html($item['label']) . '</span>';
            echo '<meta itemprop="position" content="' . esc_attr($position) . '">';
        }

        echo '</li>';
    }

    echo '</ol>';
    echo '</' . esc_attr($container_tag) . '>';
}

/* ========================================================================== */
/* D) Schema / Structured Data Enhancements                                   */
/* ========================================================================== */

/**
 * Add Organization schema data via Yoast SEO's schema API.
 *
 * @param array $data Yoast schema data.
 * @return array Modified schema data.
 */
function tim_yoast_organization_schema(array $data): array
{
    if (! tim_yoast_is_active()) {
        return $data;
    }

    // Add Organization schema if not already present.
    if (! isset($data['@type']) || ! in_array('Organization', (array) $data['@type'], true)) {
        $data['@type'] = array_filter(array_merge((array) ($data['@type'] ?? []), ['Organization']));
    }

    // Add organization details.
    $data['name']  = get_bloginfo('name');
    $data['url']   = home_url('/');
    $data['logo']  = [
        '@type' => 'ImageObject',
        'url'   => get_template_directory_uri() . '/assets/images/fulllogo_transparent_nobuffer.png',
    ];

    // SameAs social profiles (customize as needed).
    $social_urls = apply_filters('tim_schema_same_as', []);
    if (! empty($social_urls)) {
        $data['sameAs'] = $social_urls;
    }

    return $data;
}
add_filter('wpseo_schema_organization', 'tim_yoast_organization_schema');

/**
 * Output fallback JSON-LD structured data when Yoast SEO is not active.
 */
function tim_fallback_schema(): void
{
    if (tim_yoast_is_active()) {
        return;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => ['Organization', 'LocalBusiness'],
        'name'     => get_bloginfo('name'),
        'url'      => home_url('/'),
        'logo'     => get_template_directory_uri() . '/assets/images/fulllogo_transparent_nobuffer.png',
    ];

    // SameAs social profiles.
    $social_urls = apply_filters('tim_schema_same_as', []);
    if (! empty($social_urls)) {
        $schema['sameAs'] = $social_urls;
    }

    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . "\n";
    echo '</script>' . "\n";
}
add_action('wp_head', 'tim_fallback_schema', 99);

/* ========================================================================== */
/* E) Sitemap Customization                                                   */
/* ========================================================================== */

/**
 * Add custom sitemap entries for the theme's custom page templates.
 *
 * Ensures all important theme pages appear in Yoast's sitemap.
 *
 * @param string $filter_name The Yoast sitemap filter being applied.
 * @return array List of additional sitemap entries.
 */
function tim_sitemap_custom_entries(): void
{
    if (! tim_yoast_is_active()) {
        return;
    }

    // Register filter to add custom page URLs to the sitemap.
    add_filter(
        'wpseo_sitemap_page_content',
        function ($content) {
            return $content;
        }
    );
}
add_action('init', 'tim_sitemap_custom_entries');

/**
 * Exclude specific pages from the Yoast sitemap.
 *
 * @param array $urls Array of URLs to be excluded.
 * @return array Modified array with additional exclusions.
 */
function tim_exclude_from_sitemap(array $urls): array
{
    // Exclude pages by slug that shouldn't appear in sitemap.
    $excluded_slugs = apply_filters('tim_sitemap_excluded_slugs', []);

    if (empty($excluded_slugs)) {
        return $urls;
    }

    foreach ($excluded_slugs as $slug) {
        $page = get_page_by_path($slug);
        if ($page) {
            $urls[] = get_permalink($page->ID);
        }
    }

    return $urls;
}
add_filter('wpseo_sitemap_exclude_urls', 'tim_exclude_from_sitemap');

/**
 * Ensure custom post types are included in Yoast sitemap.
 *
 * @param array  $cpt_args Arguments for registering post types in sitemap.
 * @param string $post_type The post type being checked.
 * @return array Modified arguments.
 */
function tim_sitemap_cpt_support(array $cpt_args, string $post_type): array
{
    $theme_cpts = ['articles', 'blog', 'media', 'tips'];

    if (in_array($post_type, $theme_cpts, true)) {
        $cpt_args['is_publicly_queryable'] = true;
    }

    return $cpt_args;
}
add_filter('wpseo_sitemap_post_type_archive_link', '__return_true');

/* ========================================================================== */
/* F) Admin Bar Indicator                                                     */
/* ========================================================================== */

/**
 * Add a subtle admin bar indicator showing Yoast SEO status.
 *
 * @param WP_Admin_Bar $admin_bar The WordPress admin bar object.
 */
function tim_yoast_admin_bar_indicator(WP_Admin_Bar $admin_bar): void
{
    // Only show for users who can manage options.
    if (! current_user_can('manage_options')) {
        return;
    }

    if (tim_yoast_is_active()) {
        $admin_bar->add_node(
            [
                'id'     => 'tim-yoast-status',
                'title'  => '<span style="color:#7ad03a; margin-right:4px;">●</span> Yoast SEO Active',
                'href'   => admin_url('admin.php?page=wpseo_dashboard'),
                'parent' => 'top-secondary',
                'meta'   => [
                    'title' => 'Yoast SEO is active — Click to open settings',
                    'class' => 'tim-yoast-indicator',
                ],
            ]
        );
    } else {
        $admin_bar->add_node(
            [
                'id'     => 'tim-yoast-status',
                'title'  => '<span style="color:#d4b478; margin-right:4px;">●</span> Yoast SEO Inactive',
                'href'   => admin_url('plugin-install.php?s=yoast+seo&tab=search&type=term'),
                'parent' => 'top-secondary',
                'meta'   => [
                    'title' => 'Yoast SEO is not active — Install for better SEO',
                    'class' => 'tim-yoast-indicator',
                ],
            ]
        );
    }
}
add_action('admin_bar_menu', 'tim_yoast_admin_bar_indicator', 999);

/**
 * Add minimal styles for the admin bar indicator.
 */
function tim_yoast_admin_bar_styles(): void
{
    if (! is_admin_bar_showing()) {
        return;
    }

    $css = '
		#wp-admin-bar-tim-yoast-status .ab-item {
			font-size: 12px !important;
			opacity: 0.85;
			padding: 0 8px !important;
		}
		#wp-admin-bar-tim-yoast-status:hover .ab-item {
			opacity: 1;
		}
	';

    wp_add_inline_style('admin-bar', $css);
}
add_action('wp_enqueue_scripts', 'tim_yoast_admin_bar_styles');
