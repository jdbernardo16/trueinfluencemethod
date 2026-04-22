<?php
/**
 * Newsletter Subscription System
 *
 * - Custom database table for subscribers
 * - AJAX subscription handler with honeypot + rate limiting
 * - Unsubscribe endpoint with token verification
 * - Admin page to view and export subscribers (CSV)
 * - Styled confirmation email template
 *
 * @package tim-wordpress
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ================================================================
   1. Database Table
   ================================================================ */

function tim_newsletter_table_exists()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tim_newsletter_subscribers';
    return $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") === $table_name;
}

function tim_newsletter_create_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'tim_newsletter_subscribers';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS {$table_name} (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        status varchar(20) NOT NULL DEFAULT 'subscribed',
        unsubscribe_token varchar(64) NOT NULL,
        ip_address varchar(100) DEFAULT NULL,
        source varchar(50) DEFAULT 'footer',
        subscribed_at datetime DEFAULT CURRENT_TIMESTAMP,
        unsubscribed_at datetime DEFAULT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY email (email),
        KEY status (status),
        KEY token (unsubscribe_token)
    ) {$charset_collate};";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'tim_newsletter_create_table');

function tim_newsletter_ensure_table()
{
    if (!tim_newsletter_table_exists()) {
        tim_newsletter_create_table();
    }
}

/* ================================================================
   2. AJAX Subscription Handler
   ================================================================ */

function tim_handle_newsletter_subscribe()
{
    // Verify nonce
    if (!isset($_POST['tim_newsletter_nonce_field']) || !wp_verify_nonce($_POST['tim_newsletter_nonce_field'], 'tim_newsletter_nonce')) {
        wp_send_json_error(['message' => 'Security verification failed. Please refresh the page and try again.']);
    }

    // Honeypot check
    if (!empty($_POST['website'])) {
        wp_send_json_error(['message' => 'Spam detected.']);
    }

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

    if (empty($email) || !is_email($email)) {
        wp_send_json_error(['message' => 'Please enter a valid email address.']);
    }

    // Rate limit by IP (max 5 per hour)
    $ip = sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? '');
    $rate_key = 'tim_newsletter_rate_' . md5($ip);
    $attempts = (int) get_transient($rate_key);
    if ($attempts >= 5) {
        wp_send_json_error(['message' => 'Too many subscription attempts. Please try again later.']);
    }

    global $wpdb;

    // Ensure table exists (auto-create if missing)
    tim_newsletter_ensure_table();

    $table_name = $wpdb->prefix . 'tim_newsletter_subscribers';

    $existing = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$table_name} WHERE email = %s",
        $email
    ));

    if ($wpdb->last_error) {
        wp_send_json_error(['message' => 'Database error. Please try again later.']);
    }

    if ($existing && $existing->status === 'subscribed') {
        wp_send_json_success(['message' => 'You\'re already subscribed! Thank you for being part of our community.']);
    }

    $token = wp_generate_password(32, false);
    $db_ok = false;

    if ($existing) {
        $db_ok = $wpdb->update(
            $table_name,
            [
                'status'            => 'subscribed',
                'unsubscribe_token' => $token,
                'ip_address'        => $ip,
                'subscribed_at'     => current_time('mysql'),
                'unsubscribed_at'   => null,
            ],
            ['id' => $existing->id],
            ['%s', '%s', '%s', '%s', '%s'],
            ['%d']
        );
    } else {
        $db_ok = $wpdb->insert(
            $table_name,
            [
                'email'             => $email,
                'status'            => 'subscribed',
                'unsubscribe_token' => $token,
                'ip_address'        => $ip,
                'source'            => 'footer',
                'subscribed_at'     => current_time('mysql'),
            ],
            ['%s', '%s', '%s', '%s', '%s', '%s']
        );
    }

    if (!$db_ok || $wpdb->last_error) {
        wp_send_json_error(['message' => 'Could not save your subscription. Please try again later.']);
    }

    // Increment rate limit
    set_transient($rate_key, $attempts + 1, HOUR_IN_SECONDS);

    // Send confirmation email
    tim_send_newsletter_confirmation_email($email, $token);

    wp_send_json_success(['message' => 'You\'ve been successfully subscribed! Check your inbox for a confirmation email.']);
}
add_action('wp_ajax_tim_subscribe_newsletter', 'tim_handle_newsletter_subscribe');
add_action('wp_ajax_nopriv_tim_subscribe_newsletter', 'tim_handle_newsletter_subscribe');

/* ================================================================
   3. Confirmation Email
   ================================================================ */

function tim_send_newsletter_confirmation_email($email, $token)
{
    $unsubscribe_url = add_query_arg([
        'action' => 'tim_newsletter_unsubscribe',
        'token'  => $token,
    ], home_url('/newsletter/unsubscribe'));

    $subject = 'Welcome to True Influence Method — Subscription Confirmed';

    $body = <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f5f5f5;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;">
<div style="max-width:600px;margin:20px auto;background-color:#ffffff;border-radius:8px;overflow:hidden;border:1px solid #e5e5e5;">

  <div style="background-color:#0f203d;padding:30px 40px;text-align:center;">
    <h1 style="margin:0;color:#faf8f5;font-family:Georgia,'Times New Roman',serif;font-size:24px;font-weight:400;">True Influence Method</h1>
    <div style="width:60px;height:2px;background-color:#d4b478;margin:15px auto 0;"></div>
    <p style="margin:10px 0 0;color:rgba(250,248,245,0.7);font-size:14px;letter-spacing:0.1em;text-transform:uppercase;">Subscription Confirmed</p>
  </div>

  <div style="padding:30px 40px;">
    <p style="margin:0 0 20px;color:#333;font-size:16px;line-height:1.6;">Welcome,</p>

    <p style="margin:0 0 20px;color:#333;font-size:14px;line-height:1.6;">Thank you for subscribing to <strong>True Influence Method</strong>. You'll now receive weekly insights on authentic influence, leadership, and voice.</p>

    <div style="background-color:#f9f9f5;border:1px solid #e5e5dd;border-radius:8px;padding:20px;margin-bottom:25px;">
      <h3 style="margin:0 0 12px;color:#0f203d;font-family:Georgia,'Times New Roman',serif;font-size:16px;">What to Expect</h3>
      <ul style="margin:0;padding-left:20px;color:#333;font-size:14px;line-height:1.8;">
        <li>Weekly insights delivered to your inbox</li>
        <li>Exclusive content for subscribers</li>
        <li>Early access to events and programs</li>
      </ul>
    </div>

    <p style="margin:0 0 20px;color:#333;font-size:14px;line-height:1.6;">With warmth,</p>
    <p style="margin:0;color:#0f203d;font-family:Georgia,'Times New Roman',serif;font-size:16px;"><strong>Joanna Horton McPherson</strong></p>
    <p style="margin:5px 0 0;color:#999;font-size:13px;">True Influence Method</p>
  </div>

  <div style="background-color:#f5f5f5;padding:20px 40px;border-top:1px solid #e5e5e5;text-align:center;">
    <p style="margin:0 0 10px;color:#999;font-size:12px;">
      You're receiving this because you subscribed to our newsletter.<br>
      True Influence Method — Authentic Voice. Bold Leadership.
    </p>
    <p style="margin:0;color:#999;font-size:12px;">
      <a href="{$unsubscribe_url}" style="color:#d4b478;text-decoration:underline;">Unsubscribe</a>
    </p>
  </div>

</div>
</body>
</html>
HTML;

    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: Joanna Horton McPherson <' . get_option('admin_email') . '>',
    ];

    wp_mail($email, $subject, $body, $headers);
}

/* ================================================================
   4. Unsubscribe Endpoint
   ================================================================ */

function tim_newsletter_add_unsubscribe_rule()
{
    add_rewrite_rule('^newsletter/unsubscribe/?$', 'index.php?tim_unsubscribe=1', 'top');
    add_rewrite_tag('%tim_unsubscribe%', '1');
}
add_action('init', 'tim_newsletter_add_unsubscribe_rule');

function tim_newsletter_handle_unsubscribe()
{
    if (get_query_var('tim_unsubscribe') != '1') {
        return;
    }

    $token = isset($_GET['token']) ? sanitize_text_field($_GET['token']) : '';

    if (empty($token)) {
        wp_die('Invalid unsubscribe link.', 'Unsubscribe', ['response' => 400]);
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'tim_newsletter_subscribers';

    $subscriber = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$table_name} WHERE unsubscribe_token = %s",
        $token
    ));

    if (!$subscriber) {
        wp_die('Invalid unsubscribe link. You may have already been unsubscribed.', 'Unsubscribe', ['response' => 404]);
    }

    if ($subscriber->status === 'unsubscribed') {
        wp_die('You have already been unsubscribed.', 'Unsubscribe', ['response' => 200]);
    }

    $wpdb->update(
        $table_name,
        [
            'status'          => 'unsubscribed',
            'unsubscribed_at' => current_time('mysql'),
        ],
        ['id' => $subscriber->id],
        ['%s', '%s'],
        ['%d']
    );

    $home_url = esc_url(home_url('/'));
    ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unsubscribed — True Influence Method</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0f203d;
            color: #faf8f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            max-width: 480px;
            text-align: center;
        }
        .icon {
            width: 64px; height: 64px;
            background: rgba(212,180,120,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }
        .icon svg { width: 32px; height: 32px; color: #d4b478; }
        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin-bottom: 12px;
        }
        p { color: rgba(250,248,245,0.7); line-height: 1.6; margin-bottom: 8px; }
        .btn {
            display: inline-block;
            margin-top: 24px;
            padding: 12px 28px;
            background: #d4b478;
            color: #0f203d;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn:hover { background: #e8a838; }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        <h1>You've Been Unsubscribed</h1>
        <p>You have been successfully removed from our newsletter list.</p>
        <p>We're sorry to see you go. If you ever want to reconnect, you're always welcome to subscribe again.</p>
        <a href="<?php echo $home_url; ?>" class="btn">Return to Homepage</a>
    </div>
</body>
</html>
    <?php
    exit;
}
add_action('template_redirect', 'tim_newsletter_handle_unsubscribe');

/* ================================================================
   5. Admin Page
   ================================================================ */

function tim_newsletter_admin_menu()
{
    add_menu_page(
        'Newsletter Subscribers',
        'Newsletter',
        'manage_options',
        'tim-newsletter',
        'tim_newsletter_admin_page',
        'dashicons-email-alt',
        30
    );
}
add_action('admin_menu', 'tim_newsletter_admin_menu');

function tim_newsletter_admin_page()
{
    global $wpdb;

    // Ensure table exists (auto-create if missing)
    tim_newsletter_ensure_table();

    $table_name = $wpdb->prefix . 'tim_newsletter_subscribers';
    $table_missing = !tim_newsletter_table_exists();

    // Handle CSV export
    if (isset($_GET['export']) && $_GET['export'] === 'csv') {
        if (!current_user_can('manage_options')) {
            wp_die('Unauthorized');
        }
        check_admin_referer('tim_newsletter_export');

        $subscribers = $wpdb->get_results(
            "SELECT email, status, ip_address, source, subscribed_at, unsubscribed_at FROM {$table_name} ORDER BY subscribed_at DESC",
            ARRAY_A
        );

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="newsletter-subscribers-' . date('Y-m-d') . '.csv"');

        $output = fopen('php://output', 'w');
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF)); // BOM for Excel
        fputcsv($output, ['Email', 'Status', 'IP Address', 'Source', 'Subscribed At', 'Unsubscribed At']);

        foreach ($subscribers as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    }

    $subscribed_count = $table_missing ? 0 : $wpdb->get_var("SELECT COUNT(*) FROM {$table_name} WHERE status = 'subscribed'");
    $total_count      = $table_missing ? 0 : $wpdb->get_var("SELECT COUNT(*) FROM {$table_name}");
    $recent           = $table_missing ? [] : $wpdb->get_results("SELECT * FROM {$table_name} ORDER BY subscribed_at DESC LIMIT 100");

    ?>
    <div class="wrap">
        <h1>Newsletter Subscribers</h1>

        <?php if ($table_missing) : ?>
            <div class="notice notice-error">
                <p><strong>Database table missing.</strong> The newsletter subscribers table could not be created automatically. Please deactivate and reactivate the theme, or check your database permissions.</p>
            </div>
        <?php endif; ?>

        <div style="background:#fff;border:1px solid #c3c4c7;padding:15px 20px;margin:15px 0;display:flex;gap:30px;align-items:center;flex-wrap:wrap;">
            <div>
                <span style="font-size:20px;font-weight:600;color:#1d2327;"><?php echo esc_html($subscribed_count); ?></span>
                <span style="color:#646970;">Active Subscribers</span>
            </div>
            <div>
                <span style="font-size:20px;font-weight:600;color:#1d2327;"><?php echo esc_html($total_count); ?></span>
                <span style="color:#646970;">Total (including unsubscribed)</span>
            </div>
            <div style="margin-left:auto;">
                <a href="<?php echo esc_url(wp_nonce_url(admin_url('admin.php?page=tim-newsletter&export=csv'), 'tim_newsletter_export')); ?>" class="button button-primary">
                    Export All to CSV
                </a>
            </div>
        </div>

        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Source</th>
                    <th>Subscribed At</th>
                    <th>Unsubscribed At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recent) : ?>
                    <?php foreach ($recent as $sub) : ?>
                        <tr>
                            <td><?php echo esc_html($sub->email); ?></td>
                            <td>
                                <span style="display:inline-block;padding:3px 10px;border-radius:12px;font-size:12px;font-weight:500;<?php echo $sub->status === 'subscribed' ? 'background:#d4edda;color:#155724;' : 'background:#f8d7da;color:#721c24;'; ?>">
                                    <?php echo esc_html(ucfirst($sub->status)); ?>
                                </span>
                            </td>
                            <td><?php echo esc_html($sub->source); ?></td>
                            <td><?php echo esc_html($sub->subscribed_at); ?></td>
                            <td><?php echo esc_html($sub->unsubscribed_at ?: '—'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr><td colspan="5">No subscribers yet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/* ================================================================
   6. Flush rewrite rules on theme activation
   ================================================================ */

function tim_newsletter_flush_rewrites()
{
    tim_newsletter_create_table();
    tim_newsletter_add_unsubscribe_rule();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'tim_newsletter_flush_rewrites');
