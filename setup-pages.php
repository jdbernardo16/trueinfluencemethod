<?php
/**
 * TIM WordPress Theme - Page Setup Script
 * 
 * This script automatically creates all required WordPress pages
 * with the correct slugs and parent/child relationships.
 * 
 * ⚠️ SECURITY WARNING: Delete this script after use!
 * 
 * Usage:
 * 1. Visit: https://yoursite.com/wp-content/themes/tim-wordpress/setup-pages.php
 * 2. Or run via command line: php setup-pages.php
 * 3. Delete this file after successful page creation
 */

// Load WordPress
$load_wp = false;

// Check if we're running from WordPress context or command line
if (defined('ABSPATH')) {
    // Already in WordPress context
    $load_wp = false;
} elseif (file_exists('../../../wp-load.php')) {
    // Load WordPress from theme directory
    require_once('../../../wp-load.php');
    $load_wp = true;
} else {
    die('Error: Could not load WordPress. Make sure this file is in the theme directory.');
}

// Prevent direct access if not authorized
if (!$load_wp && !current_user_can('manage_options')) {
    wp_die('You do not have permission to access this script.');
}

/**
 * Create a page with specified parameters
 * 
 * @param string $title Page title
 * @param string $slug Page slug
 * @param string $content Page content
 * @param int $parent_id Parent page ID (0 for no parent)
 * @return int|WP_Error Page ID on success, WP_Error on failure
 */
function tim_create_page($title, $slug, $content = '', $parent_id = 0) {
    // Check if page already exists
    $existing_page = get_page_by_path($slug);
    
    if ($existing_page) {
        return new WP_Error('page_exists', "Page already exists: $title (slug: $slug)");
    }
    
    // Create page
    $page_data = array(
        'post_title'    => $title,
        'post_name'     => $slug,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'post_parent'   => $parent_id,
        'post_author'   => get_current_user_id(),
    );
    
    $page_id = wp_insert_post($page_data);
    
    if (is_wp_error($page_id)) {
        return $page_id;
    }
    
    return $page_id;
}

/**
 * Main page creation function
 */
function tim_create_all_pages() {
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array()
    );
    
    // ============================================
    // MAIN PAGES
    // ============================================
    
    // About Page
    $result = tim_create_page(
        'About Joanna',
        'about',
        '<!-- Page content can be edited in WordPress admin -->'
    );
    if (is_wp_error($result)) {
        if ($result->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'About Joanna';
        } else {
            $results['errors'][] = 'About Joanna: ' . $result->get_error_message();
        }
    } else {
        $results['success'][] = 'About Joanna (ID: ' . $result . ')';
    }
    
    // Apply Page
    $result = tim_create_page(
        'Apply',
        'apply',
        '<!-- Add Contact Form 7 shortcode here -->'
    );
    if (is_wp_error($result)) {
        if ($result->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'Apply';
        } else {
            $results['errors'][] = 'Apply: ' . $result->get_error_message();
        }
    } else {
        $results['success'][] = 'Apply (ID: ' . $result . ')';
    }
    
    // FAQ Page
    $result = tim_create_page(
        'FAQ',
        'faq',
        '<!-- FAQ items are hardcoded in page-faq.php template -->'
    );
    if (is_wp_error($result)) {
        if ($result->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'FAQ';
        } else {
            $results['errors'][] = 'FAQ: ' . $result->get_error_message();
        }
    } else {
        $results['success'][] = 'FAQ (ID: ' . $result . ')';
    }
    
    // Journey Page
    $result = tim_create_page(
        'The Journey',
        'journey',
        '<!-- Journey phases are hardcoded in page-journey.php template -->'
    );
    if (is_wp_error($result)) {
        if ($result->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'The Journey';
        } else {
            $results['errors'][] = 'The Journey: ' . $result->get_error_message();
        }
    } else {
        $results['success'][] = 'The Journey (ID: ' . $result . ')';
    }
    
    // Success Stories Page
    $result = tim_create_page(
        'Success Stories',
        'success-stories',
        '<!-- Testimonials are hardcoded in page-success-stories.php template -->'
    );
    if (is_wp_error($result)) {
        if ($result->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'Success Stories';
        } else {
            $results['errors'][] = 'Success Stories: ' . $result->get_error_message();
        }
    } else {
        $results['success'][] = 'Success Stories (ID: ' . $result . ')';
    }
    
    // ============================================
    // COMMUNITY PAGES
    // ============================================
    
    // Community Landing Page
    $community_id = tim_create_page(
        'Community',
        'community',
        '<!-- Community landing page content -->'
    );
    if (is_wp_error($community_id)) {
        if ($community_id->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'Community';
            $community_id = get_page_by_path('community')->ID;
        } else {
            $results['errors'][] = 'Community: ' . $community_id->get_error_message();
            $community_id = 0;
        }
    } else {
        $results['success'][] = 'Community (ID: ' . $community_id . ')';
    }
    
    // Events Page (Child of Community)
    if ($community_id) {
        $result = tim_create_page(
            'Events & Workshops',
            'events',
            '<!-- Events are hardcoded in page-events.php template -->',
            $community_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'Events & Workshops';
            } else {
                $results['errors'][] = 'Events & Workshops: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'Events & Workshops (ID: ' . $result . ')';
        }
    }
    
    // Vault Page (Child of Community)
    if ($community_id) {
        $result = tim_create_page(
            'The Vault',
            'vault',
            '<!-- Vault items are hardcoded in page-vault.php template -->',
            $community_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'The Vault';
            } else {
                $results['errors'][] = 'The Vault: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'The Vault (ID: ' . $result . ')';
        }
    }
    
    // ============================================
    // PROGRAMS PAGES
    // ============================================
    
    // Programs Landing Page
    $programs_id = tim_create_page(
        'Programs',
        'programs',
        '<!-- Programs are hardcoded in page-programs.php template -->'
    );
    if (is_wp_error($programs_id)) {
        if ($programs_id->get_error_code() === 'page_exists') {
            $results['skipped'][] = 'Programs';
            $programs_id = get_page_by_path('programs')->ID;
        } else {
            $results['errors'][] = 'Programs: ' . $programs_id->get_error_message();
            $programs_id = 0;
        }
    } else {
        $results['success'][] = 'Programs (ID: ' . $programs_id . ')';
    }
    
    // Private Training Page (Child of Programs)
    if ($programs_id) {
        $result = tim_create_page(
            'Private Training',
            'private-training',
            '<!-- Private Training details are hardcoded in page-programs.php template -->',
            $programs_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'Private Training';
            } else {
                $results['errors'][] = 'Private Training: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'Private Training (ID: ' . $result . ')';
        }
    }
    
    // Speak & Rise Page (Child of Programs)
    if ($programs_id) {
        $result = tim_create_page(
            'Speak & Rise',
            'speak-rise',
            '<!-- Speak & Rise details are hardcoded in page-programs.php template -->',
            $programs_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'Speak & Rise';
            } else {
                $results['errors'][] = 'Speak & Rise: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'Speak & Rise (ID: ' . $result . ')';
        }
    }
    
    // Corporate Programs Page (Child of Programs)
    if ($programs_id) {
        $result = tim_create_page(
            'Corporate Programs',
            'corporate',
            '<!-- Corporate Programs details are hardcoded in page-programs.php template -->',
            $programs_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'Corporate Programs';
            } else {
                $results['errors'][] = 'Corporate Programs: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'Corporate Programs (ID: ' . $result . ')';
        }
    }
    
    // True Influence License Page (Child of Programs)
    if ($programs_id) {
        $result = tim_create_page(
            'True Influence License',
            'license',
            '<!-- True Influence License details are hardcoded in page-programs.php template -->',
            $programs_id
        );
        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'page_exists') {
                $results['skipped'][] = 'True Influence License';
            } else {
                $results['errors'][] = 'True Influence License: ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = 'True Influence License (ID: ' . $result . ')';
        }
    }
    
    // ============================================
    // FLUSH REWRITE RULES
    // ============================================
    
    flush_rewrite_rules();
    
    return $results;
}

// Execute page creation
$results = tim_create_all_pages();

// Display results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIM WordPress Theme - Page Setup Results</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #f0f0f1;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2271b1;
            margin-top: 0;
        }
        h2 {
            color: #2271b1;
            margin-top: 30px;
        }
        .success {
            background: #edfaef;
            border-left: 4px solid #00a32a;
            padding: 15px;
            margin: 10px 0;
        }
        .error {
            background: #fcf0f1;
            border-left: 4px solid #d63638;
            padding: 15px;
            margin: 10px 0;
        }
        .warning {
            background: #fff8e5;
            border-left: 4px solid #dba617;
            padding: 15px;
            margin: 10px 0;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
        li {
            margin: 5px 0;
        }
        .count {
            font-weight: bold;
        }
        .delete-warning {
            background: #fff8e5;
            border: 2px solid #dba617;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .delete-warning h3 {
            color: #dba617;
            margin-top: 0;
        }
        .next-steps {
            background: #f0f6fc;
            border-left: 4px solid #2271b1;
            padding: 20px;
            margin-top: 30px;
            border-radius: 4px;
        }
        .next-steps h3 {
            color: #2271b1;
            margin-top: 0;
        }
        .next-steps ol {
            padding-left: 20px;
        }
        .next-steps li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 TIM WordPress Theme - Page Setup Results</h1>
        
        <p><strong>Script executed successfully!</strong></p>
        
        <?php if (!empty($results['success'])): ?>
            <h2>✅ Pages Created Successfully</h2>
            <div class="success">
                <p><span class="count"><?php echo count($results['success']); ?></span> pages created:</p>
                <ul>
                    <?php foreach ($results['success'] as $page): ?>
                        <li><?php echo esc_html($page); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($results['skipped'])): ?>
            <h2>⏭️ Pages Already Exist (Skipped)</h2>
            <div class="warning">
                <p><span class="count"><?php echo count($results['skipped']); ?></span> pages already exist:</p>
                <ul>
                    <?php foreach ($results['skipped'] as $page): ?>
                        <li><?php echo esc_html($page); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($results['errors'])): ?>
            <h2>❌ Errors</h2>
            <div class="error">
                <p><span class="count"><?php echo count($results['errors']); ?></span> errors occurred:</p>
                <ul>
                    <?php foreach ($results['errors'] as $error): ?>
                        <li><?php echo esc_html($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <div class="next-steps">
            <h3>📋 Next Steps</h3>
            <ol>
                <li><strong>Verify pages:</strong> Go to <code>Pages > All Pages</code> in WordPress admin to see all created pages</li>
                <li><strong>Test navigation:</strong> Visit your homepage and click each navigation link to verify pages load correctly</li>
                <li><strong>Create navigation menu:</strong> Go to <code>Appearance > Menus</code> and create your navigation menu using these pages</li>
                <li><strong>Add content:</strong> Edit each page to add your actual content</li>
                <li><strong>Test archive pages:</strong> Create test posts in custom post types (Articles, Blog, Media, Tips) to verify archive pages work</li>
            </ol>
        </div>
        
        <div class="delete-warning">
            <h3>⚠️ IMPORTANT: Delete This File</h3>
            <p>For security reasons, <strong>you must delete this file</strong> after successful page creation:</p>
            <ul>
                <li>File location: <code>wp-content/themes/tim-wordpress/setup-pages.php</code></li>
                <li>Delete via FTP/SFTP or file manager</li>
                <li>Or run: <code>rm wp-content/themes/tim-wordpress/setup-pages.php</code></li>
            </ul>
            <p><strong>Why?</strong> Leaving this file on your server creates a security vulnerability that could be exploited.</p>
        </div>
        
        <p style="margin-top: 30px; text-align: center; color: #646970;">
            <em>For detailed setup instructions, see SETUP.md in the theme directory.</em>
        </p>
    </div>
</body>
</html>
