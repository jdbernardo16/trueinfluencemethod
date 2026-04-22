<?php

if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
    require_once __DIR__ . '/vendor/autoload_packages.php';
}

// Require custom navigation walker
require_once get_template_directory() . '/src/Walkers/PrimaryNavWalker.php';

// Require ACF helper functions
require_once get_template_directory() . '/acf/helpers/acf-helpers.php';

// Yoast SEO Integration
require_once get_template_directory() . '/includes/seo.php';

// Newsletter Subscription System
require_once get_template_directory() . '/includes/newsletter.php';

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

    // Localize script for AJAX
    wp_localize_script('tim-wordpress-theme', 'timInquiry', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'newsletterNonce' => wp_create_nonce('tim_newsletter_nonce'),
        'newsletterAction' => 'tim_subscribe_newsletter',
    ]);
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

/**
 * Handle Inquiry Form Submission (AJAX)
 */
function tim_handle_inquiry_form()
{
    // Verify nonce
    if (!isset($_POST['tim_inquiry_nonce_field']) || !wp_verify_nonce($_POST['tim_inquiry_nonce_field'], 'tim_inquiry_nonce')) {
        wp_send_json_error(['message' => 'Security verification failed. Please refresh the page and try again.']);
    }

    // Sanitize and validate required fields
    $name = sanitize_text_field($_POST['inquiry_name'] ?? '');
    $email = sanitize_email($_POST['inquiry_email'] ?? '');
    $phone = sanitize_text_field($_POST['inquiry_phone'] ?? '');
    $inquiry_type = sanitize_text_field($_POST['inquiry_type'] ?? '');
    $company = sanitize_text_field($_POST['inquiry_company'] ?? '');
    $message = sanitize_textarea_field($_POST['inquiry_message'] ?? '');
    $referral = sanitize_text_field($_POST['inquiry_referral'] ?? '');

    // Validate required fields
    $errors = [];
    if (empty($name)) {
        $errors['inquiry_name'] = 'Please enter your full name.';
    }
    if (empty($email) || !is_email($email)) {
        $errors['inquiry_email'] = 'Please enter a valid email address.';
    }
    if (empty($inquiry_type)) {
        $errors['inquiry_type'] = 'Please select what you are interested in.';
    }
    if (empty($message)) {
        $errors['inquiry_message'] = 'Please tell us about yourself and what you\'re looking for.';
    }

    if (!empty($errors)) {
        wp_send_json_error(['message' => 'Please fill in all required fields.', 'errors' => $errors]);
    }

    // Get notification email from ACF or fall back to admin email
    $notification_email = function_exists('get_field') ? get_field('apply_notification_email') : '';
    if (empty($notification_email)) {
        $notification_email = get_option('admin_email');
    }

    // Prepare email content
    $subject = sprintf('New Inquiry from %s — %s', $name, $inquiry_type);
    $email_body = "New inquiry submitted through the website.\n\n";
    $email_body .= "=== CONTACT DETAILS ===\n";
    $email_body .= "Name: {$name}\n";
    $email_body .= "Email: {$email}\n";
    if (!empty($phone)) {
        $email_body .= "Phone: {$phone}\n";
    }
    if (!empty($company)) {
        $email_body .= "Company/Organization: {$company}\n";
    }
    $email_body .= "\n=== INQUIRY DETAILS ===\n";
    $email_body .= "Interest: {$inquiry_type}\n";
    if (!empty($referral)) {
        $email_body .= "Referral Source: {$referral}\n";
    }
    $email_body .= "\n=== MESSAGE ===\n";
    $email_body .= "{$message}\n";
    $email_body .= "\n---\n";
    $email_body .= "Submitted: " . current_time('F j, Y \a\t g:i a') . "\n";
    $email_body .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";

    $headers = [
        'From: True Influence Method <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>',
        'Content-Type: text/plain; charset=UTF-8',
    ];

    // Send email
    $email_sent = wp_mail($notification_email, $subject, $email_body, $headers);

    if (!$email_sent) {
        wp_send_json_error(['message' => 'Something went wrong. Please try again or email us directly.']);
    }

    wp_send_json_success(['message' => 'Your inquiry has been submitted successfully! We\'ll be in touch within 2 business days.']);
}
// Handle both logged-in and non-logged-in users
add_action('wp_ajax_tim_submit_inquiry', 'tim_handle_inquiry_form');
add_action('wp_ajax_nopriv_tim_submit_inquiry', 'tim_handle_inquiry_form');

/**
 * Contact Form 7 — Dynamically populate the "inquiry_type" select from ACF
 *
 * Uses the wpcf7_form_tag filter to inject options from the ACF repeater
 * field "apply_inquiry_types" on the Apply page.
 */
function tim_cf7_dynamic_inquiry_type($tag)
{
    // Only modify the field named "inquiry_type"
    if ($tag['name'] !== 'inquiry_type') {
        return $tag;
    }

    // Get the Apply page ID (looks for the page using the "Apply Page" template)
    $apply_page_id = 0;
    $pages = get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-apply.php',
        'number' => 1,
    ]);
    if (!empty($pages)) {
        $apply_page_id = $pages[0]->ID;
    }

    // Build options from ACF repeater or fallback defaults
    $options = [];
    if ($apply_page_id && function_exists('have_rows') && have_rows('apply_inquiry_types', $apply_page_id)) {
        while (have_rows('apply_inquiry_types', $apply_page_id)) {
            the_row();
            $label = get_sub_field('type_label');
            if ($label) {
                $options[] = $label;
            }
        }
    }

    // Fallback defaults if no ACF data
    if (empty($options)) {
        $options = [
            'Private Training (1-on-1 with Joanna)',
            'Speak & Rise Mastermind',
            'Corporate Programs & Workshops',
            'Retreat Experience',
            'General Inquiry',
        ];
    }

    // Rebuild the tag values
    $tag['values'] = [];
    $tag['labels'] = [];

    // Add a placeholder first option (empty value)
    $tag['values'][] = '';
    $tag['labels'][] = 'Select an option...';

    foreach ($options as $option) {
        $tag['values'][] = $option;
        $tag['labels'][] = $option;
    }

    // Mark first option as placeholder
    if (!empty($tag['labels'])) {
        $tag['options'][] = 'first_as_label';
    }

    return $tag;
}
add_filter('wpcf7_form_tag', 'tim_cf7_dynamic_inquiry_type', 10, 1);

/**
 * Contact Form 7 — Ensure the "Apply Page Inquiry Form" exists
 *
 * Programmatically creates the CF7 form on first run so the user
 * doesn't have to manually set it up in the WordPress admin.
 * Stores the form ID in the `tim_cf7_apply_form_id` option.
 *
 * @return int|null  The CF7 form post ID, or null if CF7 is not active.
 */
function tim_ensure_cf7_apply_form()
{
    // Check if Contact Form 7 is active
    if (!function_exists('wpcf7') || !post_type_exists('wpcf7_contact_form')) {
        return null;
    }

    // Build the form template (use & directly, not &amp;)
    $form_template = <<<HTML
<label class="cf7-label">Full Name <span class="cf7-required">*</span>
    [text* inquiry_name placeholder "Your full name"]
</label>

<div class="cf7-row">
    <label class="cf7-label">Email Address <span class="cf7-required">*</span>
        [email* inquiry_email placeholder "you@example.com"]
    </label>

    <label class="cf7-label">Phone Number
        [tel inquiry_phone placeholder "+1 (555) 000-0000"]
    </label>
</div>

<label class="cf7-label">What are you most interested in? <span class="cf7-required">*</span>
    [select* inquiry_type first_as_label "Select an option..." "Private Training (1-on-1 with Joanna)" "Speak & Rise Mastermind" "Corporate Programs & Workshops" "Retreat Experience" "General Inquiry"]
</label>

<label class="cf7-label">Company / Organization
    [text inquiry_company placeholder "Your company or organization"]
</label>

<label class="cf7-label">Tell us about yourself & what you're looking for <span class="cf7-required">*</span>
    [textarea* inquiry_message 40x5 placeholder "Share where you are in your journey, what feels most alive in your work right now, and what you'd like to explore..."]
</label>

<label class="cf7-label">How did you hear about us?
    [select inquiry_referral first_as_label "Select an option..." "Personal Referral" "Social Media" "Google Search" "Speaking Event / Workshop" "Podcast / Media Appearance" "Other"]
</label>

<p class="cf7-privacy-note">Your information is kept strictly private and confidential. By submitting this form, you agree to be contacted by Joanna's team regarding your inquiry.</p>

[submit class:cf7-submit-btn "Submit Your Inquiry"]
HTML;

    // Build the HTML email body
    $mail_body = <<<'MAILHTML'
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e5e5;">

  <!-- Header -->
  <div style="background-color: #0f203d; padding: 30px 40px; text-align: center;">
    <h1 style="margin: 0; color: #faf8f5; font-family: Georgia, 'Times New Roman', serif; font-size: 24px; font-weight: 400;">True Influence Method</h1>
    <div style="width: 60px; height: 2px; background-color: #d4b478; margin: 15px auto 0;"></div>
    <p style="margin: 10px 0 0; color: rgba(250,248,245,0.7); font-size: 14px; letter-spacing: 0.1em; text-transform: uppercase;">New Inquiry Received</p>
  </div>

  <!-- Content -->
  <div style="padding: 30px 40px;">

    <!-- Contact Details -->
    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Contact Details</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px; width: 35%;"><strong>Name</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[inquiry_name]</td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Email</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;"><a href="mailto:[inquiry_email]" style="color: #d4b478;">[inquiry_email]</a></td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Phone</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[inquiry_phone]</td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Company</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[inquiry_company]</td>
      </tr>
    </table>

    <!-- Inquiry Details -->
    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Inquiry Details</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px; width: 35%;"><strong>Interest</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[inquiry_type]</td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Referral Source</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[inquiry_referral]</td>
      </tr>
    </table>

    <!-- Message -->
    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Message</h2>
    <div style="background-color: #f9f9f9; border-left: 4px solid #d4b478; padding: 15px 20px; margin-bottom: 25px; border-radius: 0 4px 4px 0;">
      <p style="margin: 0; color: #333; font-size: 14px; line-height: 1.6; white-space: pre-wrap;">[inquiry_message]</p>
    </div>

  </div>

  <!-- Footer -->
  <div style="background-color: #f5f5f5; padding: 20px 40px; border-top: 1px solid #e5e5e5;">
    <p style="margin: 0; color: #999; font-size: 12px; text-align: center;">
      Submitted: [_date] at [_time]<br>
      This inquiry was submitted through the True Influence Method website.
    </p>
  </div>

</div>
</body>
MAILHTML;

    // Build the mail configuration
    $mail = [
        'active'             => true,
        'subject'            => 'New Inquiry from [inquiry_name] — [inquiry_type]',
        'sender'             => 'True Influence Method <[admin_email]>',
        'recipient'          => get_option('admin_email'),
        'body'               => $mail_body,
        'additional_headers' => 'Reply-To: [inquiry_name] <[inquiry_email]>',
        'attachments'        => '',
        'use_html'           => true,
        'exclude_blank'      => false,
    ];

    $user_mail_body = <<<'USERMAIL'
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e5e5;">

  <div style="background-color: #0f203d; padding: 30px 40px; text-align: center;">
    <h1 style="margin: 0; color: #faf8f5; font-family: Georgia, 'Times New Roman', serif; font-size: 24px; font-weight: 400;">True Influence Method</h1>
    <div style="width: 60px; height: 2px; background-color: #d4b478; margin: 15px auto 0;"></div>
    <p style="margin: 10px 0 0; color: rgba(250,248,245,0.7); font-size: 14px; letter-spacing: 0.1em; text-transform: uppercase;">Your Inquiry Has Been Received</p>
  </div>

  <div style="padding: 30px 40px;">
    <p style="margin: 0 0 20px; color: #333; font-size: 16px; line-height: 1.6;">Dear [inquiry_name],</p>

    <p style="margin: 0 0 20px; color: #333; font-size: 14px; line-height: 1.6;">Thank you for reaching out. Your inquiry has been received, and we truly appreciate your interest in working with Joanna.</p>

    <div style="background-color: #f9f9f5; border: 1px solid #e5e5dd; border-radius: 8px; padding: 20px; margin-bottom: 25px;">
      <h3 style="margin: 0 0 12px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 16px;">What Happens Next?</h3>
      <ul style="margin: 0; padding-left: 20px; color: #333; font-size: 14px; line-height: 1.8;">
        <li>Joanna's team will review your submission carefully</li>
        <li>You'll hear back within <strong>2 business days</strong></li>
        <li>If it feels like a fit, we'll schedule a personal conversation</li>
      </ul>
    </div>

    <div style="background-color: #0f203d; border-radius: 8px; padding: 20px; margin-bottom: 25px; text-align: center;">
      <p style="margin: 0 0 5px; color: #d4b478; font-size: 12px; text-transform: uppercase; letter-spacing: 0.1em;">Your Submission</p>
      <p style="margin: 0; color: #faf8f5; font-size: 14px;">[inquiry_type]</p>
    </div>

    <p style="margin: 0 0 20px; color: #333; font-size: 14px; line-height: 1.6;">In the meantime, if you'd like to get a head start, feel free to <a href="https://calendly.com/joanna-trueinfluencemethod/private-training" style="color: #d4b478;">book a consultation</a> or reply directly to this email with any additional questions.</p>

    <p style="margin: 0 0 5px; color: #333; font-size: 14px; line-height: 1.6;">With warmth,</p>
    <p style="margin: 0; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 16px;"><strong>Joanna Horton McPherson</strong></p>
    <p style="margin: 5px 0 0; color: #999; font-size: 13px;">True Influence Method</p>
  </div>

  <div style="background-color: #f5f5f5; padding: 20px 40px; border-top: 1px solid #e5e5e5;">
    <p style="margin: 0; color: #999; font-size: 12px; text-align: center;">
      You're receiving this because you submitted an inquiry through the True Influence Method website.<br>
      Authentic Voice. Bold Leadership.
    </p>
  </div>

</div>
</body>
USERMAIL;

    $mail_2 = [
        'active'             => true,
        'subject'            => 'Your Inquiry Has Been Received — True Influence Method',
        'sender'             => 'Joanna Horton McPherson <[admin_email]>',
        'recipient'          => '[inquiry_email]',
        'body'               => $user_mail_body,
        'additional_headers' => 'Reply-To: True Influence Method <' . get_option('admin_email') . '>',
        'attachments'        => '',
        'use_html'           => true,
        'exclude_blank'      => false,
    ];

    // Default CF7 messages
    $messages = [
        'mail_sent_ok'     => 'Thank you for your message. It has been sent.',
        'mail_sent_ng'     => 'There was an error trying to send your message. Please try again later.',
        'validation_error' => 'One or more fields have an error. Please check and try again.',
        'spam'             => 'There was an error trying to send your message. Please try again later.',
        'mail_failed'      => 'There was an error trying to send your message. Please try again later.',
        'accept_terms'     => 'You must accept the terms and conditions before sending your message.',
        'invalid_required' => 'The field is required.',
        'invalid_too_long' => 'The field is too long.',
        'invalid_too_short' => 'The field is too short.',
    ];

    // Check if we already created the form
    $form_id = get_option('tim_cf7_apply_form_id', 0);
    $form_exists = $form_id && get_post_status($form_id) === 'publish';

    if (!$form_exists) {
        // Insert the CF7 form post
        $form_id = wp_insert_post([
            'post_title'   => 'Apply Page Inquiry Form',
            'post_status'  => 'publish',
            'post_type'    => 'wpcf7_contact_form',
            'post_content' => '',
        ]);

        if (is_wp_error($form_id)) {
            return null;
        }

        // Store the form ID so we don't recreate it
        update_option('tim_cf7_apply_form_id', $form_id);
    }

    // Always update CF7 post meta so code changes are reflected immediately
    update_post_meta($form_id, '_form', $form_template);
    update_post_meta($form_id, '_mail', $mail);
    update_post_meta($form_id, '_mail_2', $mail_2);
    update_post_meta($form_id, '_messages', $messages);
    update_post_meta($form_id, '_additional_settings', '');

    return (int) $form_id;
}
add_action('init', 'tim_ensure_cf7_apply_form', 20);

/**
 * Contact Form 7 — Ensure the "Vault Registration Form" exists
 *
 * Programmatically creates the CF7 form on first run.
 * Stores the form ID in the `tim_cf7_vault_form_id` option.
 * Includes both admin notification and user auto-responder emails.
 *
 * @return int|null  The CF7 form post ID, or null if CF7 is not active.
 */
function tim_ensure_cf7_vault_form()
{
    // Check if Contact Form 7 is active
    if (!function_exists('wpcf7') || !post_type_exists('wpcf7_contact_form')) {
        return null;
    }

    $form_template = <<<HTML
<div class="cf7-row">
    <label class="cf7-label">First Name <span class="cf7-required">*</span>
        [text* vault_first_name placeholder "Your first name"]
    </label>

    <label class="cf7-label">Last Name <span class="cf7-required">*</span>
        [text* vault_last_name placeholder "Your last name"]
    </label>
</div>

<div class="cf7-row">
    <label class="cf7-label">Email Address <span class="cf7-required">*</span>
        [email* vault_email placeholder "you@example.com"]
    </label>

    <label class="cf7-label">Mobile Number
        [tel vault_mobile placeholder "+1 (555) 000-0000"]
    </label>
</div>

<label class="cf7-label">What best describes you? <span class="cf7-required">*</span>
    [select* vault_role first_as_label "Select an option..." "Executive / Senior Leader" "Entrepreneur / Business Owner" "Speaker / Coach / Consultant" "Mid-Career Professional" "Nonprofit / Education Leader" "Healthcare Professional" "Attorney / Legal Professional" "Other"]
</label>

<label class="cf7-label">What is your biggest speaking challenge right now? <span class="cf7-required">*</span>
    [textarea* vault_challenge 40x4 placeholder "Share what feels most challenging about speaking, presenting, or finding your voice..."]
</label>

[acceptance vault_consent use_label_element] I agree to receive updates and leadership content from Joanna Horton McPherson.

[submit class:cf7-submit-btn "Register for The Vault"]
HTML;

    $mail_body = <<<'MAILHTML'
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e5e5;">

  <div style="background-color: #0f203d; padding: 30px 40px; text-align: center;">
    <h1 style="margin: 0; color: #faf8f5; font-family: Georgia, 'Times New Roman', serif; font-size: 24px; font-weight: 400;">True Influence Method</h1>
    <div style="width: 60px; height: 2px; background-color: #d4b478; margin: 15px auto 0;"></div>
    <p style="margin: 10px 0 0; color: rgba(250,248,245,0.7); font-size: 14px; letter-spacing: 0.1em; text-transform: uppercase;">New Vault Registration</p>
  </div>

  <div style="padding: 30px 40px;">

    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Registration Details</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px; width: 35%;"><strong>First Name</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[vault_first_name]</td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Last Name</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[vault_last_name]</td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Email</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;"><a href="mailto:[vault_email]" style="color: #d4b478;">[vault_email]</a></td>
      </tr>
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px;"><strong>Mobile</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[vault_mobile]</td>
      </tr>
    </table>

    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Speaking Profile</h2>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px; width: 35%;"><strong>Role / Description</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">[vault_role]</td>
      </tr>
    </table>

    <h2 style="margin: 0 0 15px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 18px; border-bottom: 2px solid #d4b478; padding-bottom: 8px;">Biggest Speaking Challenge</h2>
    <div style="background-color: #f9f9f9; border-left: 4px solid #d4b478; padding: 15px 20px; margin-bottom: 25px; border-radius: 0 4px 4px 0;">
      <p style="margin: 0; color: #333; font-size: 14px; line-height: 1.6; white-space: pre-wrap;">[vault_challenge]</p>
    </div>

    <table style="width: 100%; border-collapse: collapse;">
      <tr>
        <td style="padding: 8px 0; color: #666; font-size: 14px; width: 35%;"><strong>Consent</strong></td>
        <td style="padding: 8px 0; color: #333; font-size: 14px;">Accepted updates and leadership content</td>
      </tr>
    </table>

  </div>

  <div style="background-color: #f5f5f5; padding: 20px 40px; border-top: 1px solid #e5e5e5;">
    <p style="margin: 0; color: #999; font-size: 12px; text-align: center;">
      Submitted: [_date] at [_time]<br>
      This registration was submitted through The Vault page on the True Influence Method website.
    </p>
  </div>

</div>
</body>
MAILHTML;

    $mail = [
        'active'             => true,
        'subject'            => 'New Vault Registration: [vault_first_name] [vault_last_name] — [vault_role]',
        'sender'             => 'True Influence Method <[admin_email]>',
        'recipient'          => get_option('admin_email'),
        'body'               => $mail_body,
        'additional_headers' => 'Reply-To: [vault_first_name] [vault_last_name] <[vault_email]>',
        'attachments'        => '',
        'use_html'           => true,
        'exclude_blank'      => false,
    ];

    $user_mail_body = <<<'USERMAIL'
<body style="margin: 0; padding: 0; background-color: #f5f5f5; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; border: 1px solid #e5e5e5;">

  <div style="background-color: #0f203d; padding: 30px 40px; text-align: center;">
    <h1 style="margin: 0; color: #faf8f5; font-family: Georgia, 'Times New Roman', serif; font-size: 24px; font-weight: 400;">Welcome to The Vault</h1>
    <div style="width: 60px; height: 2px; background-color: #d4b478; margin: 15px auto 0;"></div>
    <p style="margin: 10px 0 0; color: rgba(250,248,245,0.7); font-size: 14px; letter-spacing: 0.1em; text-transform: uppercase;">Your Registration is Confirmed</p>
  </div>

  <div style="padding: 30px 40px;">
    <p style="margin: 0 0 20px; color: #333; font-size: 16px; line-height: 1.6;">Dear [vault_first_name],</p>

    <p style="margin: 0 0 20px; color: #333; font-size: 14px; line-height: 1.6;">Thank you for registering for <strong>The Vault</strong> — Joanna Horton McPherson's complimentary monthly safe space for women leaders.</p>

    <div style="background-color: #f9f9f5; border: 1px solid #e5e5dd; border-radius: 8px; padding: 20px; margin-bottom: 25px;">
      <h3 style="margin: 0 0 12px; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 16px;">What Happens Next?</h3>
      <ul style="margin: 0; padding-left: 20px; color: #333; font-size: 14px; line-height: 1.8;">
        <li>You'll receive details about the next Vault session (First Fridays at 12 PM MST)</li>
        <li>Joanna's team will send you a Zoom link and any preparation materials</li>
        <li>You'll be added to The Vault community for ongoing updates</li>
      </ul>
    </div>

    <div style="background-color: #0f203d; border-radius: 8px; padding: 20px; margin-bottom: 25px; text-align: center;">
      <p style="margin: 0 0 5px; color: #d4b478; font-size: 12px; text-transform: uppercase; letter-spacing: 0.1em;">Next Session</p>
      <p style="margin: 0; color: #faf8f5; font-family: Georgia, 'Times New Roman', serif; font-size: 18px;">First Friday at 12 PM MST</p>
    </div>

    <p style="margin: 0 0 20px; color: #333; font-size: 14px; line-height: 1.6;">We're so glad you're taking this step toward unlocking your authentic voice. The Vault is a judgment-free space where your story matters and your voice is celebrated.</p>

    <p style="margin: 0 0 5px; color: #333; font-size: 14px; line-height: 1.6;">With warmth,</p>
    <p style="margin: 0; color: #0f203d; font-family: Georgia, 'Times New Roman', serif; font-size: 16px;"><strong>Joanna Horton McPherson</strong></p>
    <p style="margin: 5px 0 0; color: #999; font-size: 13px;">True Influence Method</p>
  </div>

  <div style="background-color: #f5f5f5; padding: 20px 40px; border-top: 1px solid #e5e5e5;">
    <p style="margin: 0; color: #999; font-size: 12px; text-align: center;">
      You're receiving this because you registered for The Vault.<br>
      True Influence Method — Authentic Voice. Bold Leadership.
    </p>
  </div>

</div>
</body>
USERMAIL;

    $mail_2 = [
        'active'             => true,
        'subject'            => 'Welcome to The Vault — Your Registration is Confirmed!',
        'sender'             => 'Joanna Horton McPherson <[admin_email]>',
        'recipient'          => '[vault_email]',
        'body'               => $user_mail_body,
        'additional_headers' => 'Reply-To: True Influence Method <' . get_option('admin_email') . '>',
        'attachments'        => '',
        'use_html'           => true,
        'exclude_blank'      => false,
    ];

    $messages = [
        'mail_sent_ok'     => 'Thank you for registering! You\'ll receive a confirmation email shortly with details about The Vault.',
        'mail_sent_ng'     => 'There was an error submitting your registration. Please try again later.',
        'validation_error' => 'Please fill in all required fields correctly.',
        'spam'             => 'There was an error submitting your registration. Please try again later.',
        'mail_failed'      => 'There was an error submitting your registration. Please try again later.',
        'accept_terms'     => 'Please accept the consent checkbox to continue.',
        'invalid_required' => 'This field is required.',
        'invalid_too_long' => 'The field is too long.',
        'invalid_too_short' => 'The field is too short.',
    ];

    $form_id = get_option('tim_cf7_vault_form_id', 0);
    $form_exists = $form_id && get_post_status($form_id) === 'publish';

    if (!$form_exists) {
        $form_id = wp_insert_post([
            'post_title'   => 'Vault Registration Form',
            'post_status'  => 'publish',
            'post_type'    => 'wpcf7_contact_form',
            'post_content' => '',
        ]);

        if (is_wp_error($form_id)) {
            return null;
        }

        update_option('tim_cf7_vault_form_id', $form_id);
    }

    update_post_meta($form_id, '_form', $form_template);
    update_post_meta($form_id, '_mail', $mail);
    update_post_meta($form_id, '_mail_2', $mail_2);
    update_post_meta($form_id, '_messages', $messages);
    update_post_meta($form_id, '_additional_settings', '');

    return (int) $form_id;
}
add_action('init', 'tim_ensure_cf7_vault_form', 20);


/**
 * Manual trigger for CF7 form creation (for debugging/UAT)
 * 
 * Usage: Call this function manually if forms don't auto-create.
 * Can be called via WP-CLI, custom admin page, or temporary code.
 * 
 * @return array Results of form creation attempts
 */
function tim_create_cf7_forms_manually() {
    $results = array(
        'apply_form' => null,
        'vault_form' => null,
        'errors' => array(),
        'messages' => array()
    );
    
    // Check if CF7 is active
    if (!function_exists('wpcf7') || !post_type_exists('wpcf7_contact_form')) {
        $results['errors'][] = 'Contact Form 7 plugin is not active.';
        return $results;
    }
    
    // Create Apply Page Inquiry Form
    $apply_form_id = tim_ensure_cf7_apply_form();
    if ($apply_form_id) {
        $results['apply_form'] = $apply_form_id;
        $results['messages'][] = 'Apply Page Inquiry Form created (ID: ' . $apply_form_id . ')';
    } else {
        $results['errors'][] = 'Failed to create Apply Page Inquiry Form';
    }
    
    // Create Vault Registration Form
    $vault_form_id = tim_ensure_cf7_vault_form();
    if ($vault_form_id) {
        $results['vault_form'] = $vault_form_id;
        $results['messages'][] = 'Vault Registration Form created (ID: ' . $vault_form_id . ')';
    } else {
        $results['errors'][] = 'Failed to create Vault Registration Form';
    }
    
    return $results;
}

// Optional: Add admin notice if forms don't exist
function tim_check_cf7_forms_admin_notice() {
    // Only show to admins
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Check if CF7 is active
    if (!function_exists('wpcf7') || !post_type_exists('wpcf7_contact_form')) {
        return;
    }
    
    // Check if forms exist
    $apply_form_id = get_option('tim_cf7_apply_form_id', 0);
    $vault_form_id = get_option('tim_cf7_vault_form_id', 0);
    
    $apply_exists = $apply_form_id && get_post_status($apply_form_id) === 'publish';
    $vault_exists = $vault_form_id && get_post_status($vault_form_id) === 'publish';
    
    if (!$apply_exists || !$vault_exists) {
        echo '<div class="notice notice-warning">';
        echo '<p><strong>TIM Theme:</strong> Contact Form 7 forms are missing. ';
        echo 'Please ensure Contact Form 7 plugin is active and visit any page to auto-create forms, ';
        echo 'or re-activate the theme.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'tim_check_cf7_forms_admin_notice');
