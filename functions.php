<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

// Require custom navigation walker
require_once get_template_directory() . '/src/Walkers/PrimaryNavWalker.php';

// Require ACF helper functions
require_once get_template_directory() . '/acf/helpers/acf-helpers.php';

function tailpress(): TailPress\Framework\Theme
{
    return TailPress\Framework\Theme::instance()
        ->assets(
            fn($manager) => $manager
                ->withCompiler(
                    new TailPress\Framework\Assets\ViteCompiler,
                    fn($compiler) => $compiler
                        ->registerAsset('resources/css/app.css')
                        ->registerAsset('resources/js/app.js')
                        ->editorStyleFile('resources/css/editor-style.css')
                )
                ->enqueueAssets()
        )
        ->features(fn($manager) => $manager->add(TailPress\Framework\Features\MenuOptions::class))
        ->menus(
            fn($manager) => $manager
                ->add('primary', __('Primary Menu', 'tailpress'))
                ->add('dropdown', __('Dropdown Menu', 'tailpress'))
                ->add('footer', __('Footer Menu', 'tailpress'))
        )
        ->themeSupport(fn($manager) => $manager->add([
            'title-tag',
            'custom-logo',
            'post-thumbnails',
            'align-wide',
            'wp-block-styles',
            'responsive-embeds',
            'editor-color-palette',
            'html5' => [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        ]));
}

tailpress();

/**
 * Enqueue Theme JavaScript
 */
function tim_wordpress_enqueue_scripts()
{
    wp_enqueue_script(
        'tim-wordpress-theme',
        get_template_directory_uri() . '/resources/js/theme.js',
        array(),
        filemtime(get_template_directory() . '/resources/js/theme.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'tim_wordpress_enqueue_scripts');

/**
 * Register Google Fonts
 */
function tim_wordpress_register_google_fonts()
{
    wp_enqueue_style('tim-wordpress-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'tim_wordpress_register_google_fonts');

/**
 * Add theme support for custom colors
 */
function tim_wordpress_add_custom_colors()
{
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Navy', 'tim-wordpress'),
            'slug'  => 'navy',
            'color' => '#0f203d',
        ),
        array(
            'name'  => __('Gold', 'tim-wordpress'),
            'slug'  => 'gold',
            'color' => '#d4b478',
        ),
        array(
            'name'  => __('Gold Light', 'tim-wordpress'),
            'slug'  => 'gold-light',
            'color' => '#e8a838',
        ),
        array(
            'name'  => __('Cream', 'tim-wordpress'),
            'slug'  => 'cream',
            'color' => '#faf8f5',
        ),
    ));
}
add_action('after_setup_theme', 'tim_wordpress_add_custom_colors');

/**
 * Register Custom Post Types
 */

// Articles Post Type
function register_articles_post_type()
{
    register_post_type('articles', [
        'labels' => [
            'name' => 'Articles',
            'singular_name' => 'Article',
            'menu_name' => 'Articles',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Article',
            'edit_item' => 'Edit Article',
            'new_item' => 'New Article',
            'view_item' => 'View Article',
            'search_items' => 'Search Articles',
            'not_found' => 'No articles found',
            'not_found_in_trash' => 'No articles found in Trash',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'resources/articles'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-admin-post',
        'menu_position' => 20,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_articles_post_type');

// Blog Posts Post Type
function register_blog_post_type()
{
    register_post_type('blog', [
        'labels' => [
            'name' => 'Blog Posts',
            'singular_name' => 'Blog Post',
            'menu_name' => 'Blog Posts',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Blog Post',
            'edit_item' => 'Edit Blog Post',
            'new_item' => 'New Blog Post',
            'view_item' => 'View Blog Post',
            'search_items' => 'Search Blog Posts',
            'not_found' => 'No blog posts found',
            'not_found_in_trash' => 'No blog posts found in Trash',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'resources/blog'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-edit',
        'menu_position' => 21,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_blog_post_type');

// Media Items Post Type
function register_media_post_type()
{
    register_post_type('media', [
        'labels' => [
            'name' => 'Media Items',
            'singular_name' => 'Media Item',
            'menu_name' => 'Media Items',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Media Item',
            'edit_item' => 'Edit Media Item',
            'new_item' => 'New Media Item',
            'view_item' => 'View Media Item',
            'search_items' => 'Search Media Items',
            'not_found' => 'No media items found',
            'not_found_in_trash' => 'No media items found in Trash',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'resources/media'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-video-alt',
        'menu_position' => 22,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_media_post_type');

// Tips Post Type
function register_tips_post_type()
{
    register_post_type('tips', [
        'labels' => [
            'name' => 'Tips',
            'singular_name' => 'Tip',
            'menu_name' => 'Tips',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Tip',
            'edit_item' => 'Edit Tip',
            'new_item' => 'New Tip',
            'view_item' => 'View Tip',
            'search_items' => 'Search Tips',
            'not_found' => 'No tips found',
            'not_found_in_trash' => 'No tips found in Trash',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'resources/tips'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-lightbulb',
        'menu_position' => 23,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_tips_post_type');

/**
 * Flush Rewrite Rules on Theme Activation
 */
function tim_wordpress_flush_rewrite_rules()
{
    register_articles_post_type();
    register_blog_post_type();
    register_media_post_type();
    register_tips_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'tim_wordpress_flush_rewrite_rules');

/**
 * Add Reading Time Helper Function
 */
function get_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute

    return $reading_time . ' min read';
}

/**
 * Add Categories to Custom Post Types
 */
function add_categories_to_custom_post_types()
{
    register_taxonomy_for_object_type('category', 'articles');
    register_taxonomy_for_object_type('category', 'blog');
    register_taxonomy_for_object_type('category', 'media');
    register_taxonomy_for_object_type('category', 'tips');
}
add_action('init', 'add_categories_to_custom_post_types');

/**
 * Load ACF Field Groups
 */
function tim_wordpress_load_acf_fields()
{
    // Only load if ACF is active
    if (!class_exists('ACF')) {
        return;
    }

    // Load ACF setup and field groups
    require_once get_template_directory() . '/acf/acf-setup.php';
}
add_action('acf/init', 'tim_wordpress_load_acf_fields', 5);
