<?php
/**
 * TIM WordPress Theme - CF7 Form Setup Script
 * 
 * This script manually creates the Contact Form 7 forms that should
 * auto-create but may not due to timing issues in UAT environments.
 * 
 * ⚠️ SECURITY WARNING: Delete this script after use!
 * 
 * Usage:
 * 1. Visit: https://yoursite.com/wp-content/themes/tim-wordpress/setup-cf7-forms.php
 * 2. Or run via command line: php setup-cf7-forms.php
 * 3. Delete this file after successful form creation
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
 * Manually trigger CF7 form creation
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
        $results['errors'][] = 'Contact Form 7 plugin is not active. Please install and activate Contact Form 7 plugin first.';
        return $results;
    }
    
    // Include the theme functions to access form creation functions
    require_once get_template_directory() . '/functions.php';
    
    // Create Apply Page Inquiry Form
    $apply_form_id = tim_ensure_cf7_apply_form();
    if ($apply_form_id) {
        $results['apply_form'] = $apply_form_id;
        $results['messages'][] = '✓ Apply Page Inquiry Form created (ID: ' . $apply_form_id . ')';
    } else {
        $results['errors'][] = 'Failed to create Apply Page Inquiry Form';
    }
    
    // Create Vault Registration Form
    $vault_form_id = tim_ensure_cf7_vault_form();
    if ($vault_form_id) {
        $results['vault_form'] = $vault_form_id;
        $results['messages'][] = '✓ Vault Registration Form created (ID: ' . $vault_form_id . ')';
    } else {
        $results['errors'][] = 'Failed to create Vault Registration Form';
    }
    
    return $results;
}

// Execute form creation
$results = tim_create_cf7_forms_manually();

// Display results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIM WordPress Theme - CF7 Form Setup Results</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            color: #1d2327;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0f203d;
            margin-top: 0;
            border-bottom: 2px solid #d4b478;
            padding-bottom: 10px;
        }
        .success {
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
            color: #0f5132;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .error {
            background-color: #f8d7da;
            border: 1px solid #f5c2c7;
            color: #842029;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffecb5;
            color: #664d03;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .next-steps {
            background-color: #e7f3ff;
            border: 1px solid #b6d4fe;
            padding: 20px;
            border-radius: 4px;
            margin-top: 30px;
        }
        .next-steps h3 {
            color: #2271b1;
            margin-top: 0;
        }
        .delete-warning {
            background-color: #f8f9fa;
            border: 2px solid #dc3545;
            padding: 20px;
            border-radius: 4px;
            margin-top: 30px;
        }
        .delete-warning h3 {
            color: #dc3545;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 TIM WordPress Theme - CF7 Form Setup Results</h1>
        
        <?php if (!empty($results['messages'])): ?>
            <div class="success">
                <h3>✅ Forms Created Successfully</h3>
                <ul>
                    <?php foreach ($results['messages'] as $message): ?>
                        <li><?php echo esc_html($message); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($results['errors'])): ?>
            <div class="error">
                <h3>❌ Errors</h3>
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
                <li><strong>Verify forms:</strong> Go to <code>Contact → Contact Forms</code> in WordPress admin to see the created forms</li>
                <li><strong>Test forms:</strong> Visit the Apply and Vault pages to test form submission</li>
                <li><strong>Check email settings:</strong> Verify email notifications are configured correctly in each form</li>
                <li><strong>Update form IDs:</strong> If using shortcodes, update them with the new form IDs:
                    <ul>
                        <li>Apply Page Inquiry Form: <code>[contact-form-7 id="<?php echo $results['apply_form']; ?>"]</code></li>
                        <li>Vault Registration Form: <code>[contact-form-7 id="<?php echo $results['vault_form']; ?>"]</code></li>
                    </ul>
                </li>
            </ol>
        </div>
        
        <div class="delete-warning">
            <h3>⚠️ IMPORTANT: Delete This File</h3>
            <p>For security reasons, <strong>you must delete this file</strong> after successful form creation:</p>
            <ul>
                <li>Path: <code>wp-content/themes/tim-wordpress/setup-cf7-forms.php</code></li>
                <li>Delete via FTP/SFTP or file manager</li>
                <li>Or run: <code>rm wp-content/themes/tim-wordpress/setup-cf7-forms.php</code></li>
            </ul>
            <p><strong>Why?</strong> Leaving this file on your server creates a security vulnerability that could be exploited.</p>
        </div>
        
        <p style="margin-top: 30px; text-align: center; color: #646970;">
            <em>Forms should now appear in the Contact Form 7 admin section.</em>
        </p>
    </div>
</body>
</html>
