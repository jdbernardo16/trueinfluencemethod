<?php

/**
 * TIM WordPress Theme - Menu Automation System
 * 
 * This file automatically creates WordPress navigation menus based on available pages.
 * It creates the Primary Menu and Dropdown Menu with the correct structure and hierarchy.
 * 
 * @package TIM_Theme
 * @subpackage ACF_Helpers
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if menus have already been created
 * 
 * @return bool True if menus exist, false otherwise
 */
function tim_menus_exist()
{
    $primary_menu = wp_get_nav_menu_object('Primary Menu');
    $dropdown_menu = wp_get_nav_menu_object('Dropdown Menu');

    return ($primary_menu && $dropdown_menu);
}

/**
 * Get page ID by path/slug
 * 
 * @param string $path The page path or slug
 * @return int|false Page ID or false if not found
 */
function tim_get_page_id_by_path($path)
{
    $page = get_page_by_path($path);

    if ($page) {
        return $page->ID;
    }

    // Try to find by slug directly
    $pages = get_posts(array(
        'name'        => $path,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    ));

    if (!empty($pages)) {
        return $pages[0]->ID;
    }

    return false;
}

/**
 * Add a menu item to a menu
 * 
 * @param int $menu_id The menu ID
 * @param int $page_id The page ID
 * @param int $parent_item_id The parent menu item ID (0 for top-level)
 * @param string $description Optional description for the menu item
 * @return int|WP_Error Menu item ID on success, WP_Error on failure
 */
function tim_add_menu_item($menu_id, $page_id, $parent_item_id = 0, $description = '')
{
    $menu_item_data = array(
        'menu-item-object-id' => $page_id,
        'menu-item-object'    => 'page',
        'menu-item-type'      => 'post_type',
        'menu-item-status'    => 'publish',
        'menu-item-parent-id' => $parent_item_id,
    );

    // Add description if provided (WordPress stores this in the menu item object)
    if (!empty($description)) {
        $menu_item_data['menu-item-description'] = $description;
    }

    $menu_item_id = wp_update_nav_menu_item($menu_id, 0, $menu_item_data);

    if (is_wp_error($menu_item_id)) {
        return $menu_item_id;
    }

    return $menu_item_id;
}

/**
 * Create the Primary Menu structure
 * 
 * @param int $menu_id The menu ID
 * @return array Results array with success and error messages
 */
function tim_create_primary_menu($menu_id)
{
    $results = array(
        'success' => array(),
        'errors'  => array()
    );

    // Define menu structure
    $menu_structure = array(
        // Programs section
        'Programs' => array(
            'description' => 'Transform your speaking skills with our comprehensive programs designed for every stage of your journey.',
            'children' => array(
                'Private Training' => 'programs/private-training',
                'Speak & Rise' => 'programs/speak-rise',
                'Corporate Programs' => 'programs/corporate',
                'True Influence License' => 'programs/license',
            )
        ),
        // About section
        'About' => array(
            'description' => 'Discover the True Influence Method and learn about Joanna\'s journey from speaker to leadership coach.',
            'children' => array(
                'About Joanna' => 'about',
                'The Journey' => 'journey',
            )
        ),
        // Success Stories
        'Success Stories' => array(
            'path' => 'success-stories'
        ),
        // Community section
        'Community' => array(
            'description' => 'Join our community of speakers and leaders, access exclusive content, and attend transformational events.',
            'children' => array(
                'The Vault' => 'community/vault',
                'Events & Workshops' => 'community/events',
            )
        ),
        // Resources section
        'Resources' => array(
            'description' => 'Access articles, speaking tips, media features, and podcasts to accelerate your growth.',
            'children' => array(
                'Articles & Insights' => 'resources/articles',
                'Speaking Tips' => 'resources/tips',
                'Media Features' => 'resources/media',
                'Blog & Podcast' => 'resources/blog',
            )
        ),
        // FAQ
        'FAQ' => array(
            'path' => 'faq'
        ),
        // Apply (CTA)
        'Apply' => array(
            'path' => 'apply',
            'slug' => 'apply' // For CTA styling
        )
    );

    // Track parent menu items for hierarchy
    $parent_items = array();

    foreach ($menu_structure as $title => $data) {
        // Check if this is a parent item with children
        if (isset($data['children'])) {
            // Create parent item (first child becomes the parent)
            $first_child_title = array_key_first($data['children']);
            $first_child_path = $data['children'][$first_child_title];

            $page_id = tim_get_page_id_by_path($first_child_path);

            if ($page_id) {
                // Get description if available
                $description = isset($data['description']) ? $data['description'] : '';
                $parent_item_id = tim_add_menu_item($menu_id, $page_id, 0, $description);

                if (is_wp_error($parent_item_id)) {
                    $results['errors'][] = "$title: " . $parent_item_id->get_error_message();
                    continue;
                }

                // Update menu item title to parent title
                wp_update_post(array(
                    'ID'         => $parent_item_id,
                    'post_title' => $title
                ));

                $parent_items[$title] = $parent_item_id;
                $results['success'][] = "Created parent: $title";

                // Add children
                foreach ($data['children'] as $child_title => $child_path) {
                    if ($child_title === $first_child_title) {
                        continue; // Skip first child as it's the parent
                    }

                    $child_page_id = tim_get_page_id_by_path($child_path);

                    if ($child_page_id) {
                        $child_item_id = tim_add_menu_item($menu_id, $child_page_id, $parent_item_id);

                        if (is_wp_error($child_item_id)) {
                            $results['errors'][] = "$child_title: " . $child_item_id->get_error_message();
                        } else {
                            $results['success'][] = "Added child: $child_title";
                        }
                    } else {
                        $results['errors'][] = "Page not found: $child_path";
                    }
                }
            } else {
                $results['errors'][] = "Parent page not found: $first_child_path";
            }
        } elseif (isset($data['path'])) {
            // Single page item
            $page_id = tim_get_page_id_by_path($data['path']);

            if ($page_id) {
                $menu_item_id = tim_add_menu_item($menu_id, $page_id, 0);

                if (is_wp_error($menu_item_id)) {
                    $results['errors'][] = "$title: " . $menu_item_id->get_error_message();
                } else {
                    $results['success'][] = "Added item: $title";

                    // Set custom slug for CTA items
                    if (isset($data['slug'])) {
                        wp_update_post(array(
                            'ID'        => $menu_item_id,
                            'post_name' => $data['slug']
                        ));
                    }
                }
            } else {
                $results['errors'][] = "Page not found: {$data['path']}";
            }
        }
    }

    return $results;
}

/**
 * Create the Dropdown Menu structure
 * 
 * @param int $menu_id The menu ID
 * @return array Results array with success and error messages
 */
function tim_create_dropdown_menu($menu_id)
{
    $results = array(
        'success' => array(),
        'errors'  => array()
    );

    // Define dropdown menu structure with descriptions and children
    $menu_structure = array(
        'Programs' => array(
            'path' => 'programs/private-training',
            'description' => 'Transform your speaking skills with our comprehensive programs designed for every stage of your journey.',
            'children' => array(
                'Private Training' => 'programs/private-training',
                'Speak & Rise' => 'programs/speak-rise',
                'Corporate Programs' => 'programs/corporate',
                'True Influence License' => 'programs/license',
            )
        ),
        'About' => array(
            'path' => 'about',
            'description' => 'Discover the True Influence Method and learn about Joanna\'s journey from speaker to leadership coach.',
            'children' => array(
                'About Joanna' => 'about',
                'The Journey' => 'journey',
            )
        ),
        'Community' => array(
            'path' => 'community/vault',
            'description' => 'Join our community of speakers and leaders, access exclusive content, and attend transformational events.',
            'children' => array(
                'The Vault' => 'community/vault',
                'Events & Workshops' => 'community/events',
            )
        ),
        'Resources' => array(
            'path' => 'resources/articles',
            'description' => 'Access articles, speaking tips, media features, and podcasts to accelerate your growth.',
            'children' => array(
                'Articles & Insights' => 'resources/articles',
                'Speaking Tips' => 'resources/tips',
                'Media Features' => 'resources/media',
                'Blog & Podcast' => 'resources/blog',
            )
        )
    );

    foreach ($menu_structure as $title => $data) {
        // Create parent item
        $page_id = tim_get_page_id_by_path($data['path']);

        if ($page_id) {
            $parent_item_id = tim_add_menu_item($menu_id, $page_id, 0, $data['description']);

            if (is_wp_error($parent_item_id)) {
                $results['errors'][] = "$title: " . $parent_item_id->get_error_message();
                continue;
            }

            // Update menu item title to parent title
            wp_update_post(array(
                'ID'         => $parent_item_id,
                'post_title' => $title
            ));

            $results['success'][] = "Created parent: $title";

            // Add children
            if (isset($data['children'])) {
                foreach ($data['children'] as $child_title => $child_path) {
                    $child_page_id = tim_get_page_id_by_path($child_path);

                    if ($child_page_id) {
                        $child_item_id = tim_add_menu_item($menu_id, $child_page_id, $parent_item_id);

                        if (is_wp_error($child_item_id)) {
                            $results['errors'][] = "$child_title: " . $child_item_id->get_error_message();
                        } else {
                            $results['success'][] = "Added child: $child_title";
                        }
                    } else {
                        $results['errors'][] = "Page not found: $child_path";
                    }
                }
            }
        } else {
            $results['errors'][] = "Page not found: {$data['path']}";
        }
    }

    return $results;
}

/**
 * Assign menus to their theme locations
 * 
 * @param int $primary_menu_id The Primary Menu ID
 * @param int $dropdown_menu_id The Dropdown Menu ID
 * @return bool True on success, false on failure
 */
function tim_assign_menus_to_locations($primary_menu_id, $dropdown_menu_id)
{
    $locations = get_theme_mod('nav_menu_locations');

    if (!is_array($locations)) {
        $locations = array();
    }

    $locations['primary'] = $primary_menu_id;
    $locations['dropdown'] = $dropdown_menu_id;

    return set_theme_mod('nav_menu_locations', $locations);
}

/**
 * Main function to automate menu creation
 * 
 * This function:
 * - Checks if menus already exist
 * - Creates Primary Menu and Dropdown Menu if they don't exist
 * - Adds pages with correct structure and hierarchy
 * - Adds descriptions to dropdown menu items
 * - Assigns menus to their locations
 * - Sets the "Apply" menu item slug to "apply" for CTA styling
 * 
 * @param bool $force Force recreation even if menus exist
 * @return array Results array with success and error messages
 */
function automate_menu_creation($force = false)
{
    $results = array(
        'success' => array(),
        'errors'  => array(),
        'skipped' => array()
    );

    // Check if menus already exist
    if (!$force && tim_menus_exist()) {
        $results['skipped'][] = 'Menus already exist. Use $force = true to recreate.';
        return $results;
    }

    // Create Primary Menu
    $primary_menu_id = wp_create_nav_menu('Primary Menu');

    if (is_wp_error($primary_menu_id)) {
        $results['errors'][] = 'Failed to create Primary Menu: ' . $primary_menu_id->get_error_message();
        return $results;
    }

    $results['success'][] = 'Created Primary Menu (ID: ' . $primary_menu_id . ')';

    // Create Dropdown Menu
    $dropdown_menu_id = wp_create_nav_menu('Dropdown Menu');

    if (is_wp_error($dropdown_menu_id)) {
        $results['errors'][] = 'Failed to create Dropdown Menu: ' . $dropdown_menu_id->get_error_message();
        return $results;
    }

    $results['success'][] = 'Created Dropdown Menu (ID: ' . $dropdown_menu_id . ')';

    // Populate Primary Menu
    $primary_results = tim_create_primary_menu($primary_menu_id);
    $results['success'] = array_merge($results['success'], $primary_results['success']);
    $results['errors'] = array_merge($results['errors'], $primary_results['errors']);

    // Populate Dropdown Menu
    $dropdown_results = tim_create_dropdown_menu($dropdown_menu_id);
    $results['success'] = array_merge($results['success'], $dropdown_results['success']);
    $results['errors'] = array_merge($results['errors'], $dropdown_results['errors']);

    // Assign menus to locations
    $assigned = tim_assign_menus_to_locations($primary_menu_id, $dropdown_menu_id);

    if ($assigned) {
        $results['success'][] = 'Assigned menus to theme locations';
    } else {
        $results['errors'][] = 'Failed to assign menus to theme locations';
    }

    // Mark menus as created
    update_option('tim_menus_created', current_time('mysql'));

    return $results;
}

/**
 * Hook menu creation to theme activation
 */
add_action('after_switch_theme', 'tim_automate_menus_on_theme_activation');

function tim_automate_menus_on_theme_activation()
{
    $results = automate_menu_creation();

    // Log results for debugging
    if (!empty($results['errors'])) {
        error_log('TIM Theme Menu Automation Errors: ' . print_r($results['errors'], true));
    }
}

/**
 * Add admin trigger for manual menu regeneration
 */
add_action('admin_menu', 'tim_add_menu_automation_admin_page');

function tim_add_menu_automation_admin_page()
{
    add_submenu_page(
        'themes.php',
        'Menu Automation',
        'Menu Automation',
        'manage_options',
        'tim-menu-automation',
        'tim_menu_automation_admin_page_callback'
    );
}

/**
 * Admin page callback for menu automation
 */
function tim_menu_automation_admin_page_callback()
{
    // Check if form was submitted
    $message = '';
    $message_type = '';

    if (isset($_POST['tim_regenerate_menus']) && check_admin_referer('tim_regenerate_menus_action', 'tim_regenerate_menus_nonce')) {
        $force = isset($_POST['force_regenerate']) && $_POST['force_regenerate'] === '1';
        $results = automate_menu_creation($force);

        if (empty($results['errors'])) {
            $message = 'Menus created successfully! ' . count($results['success']) . ' items added.';
            $message_type = 'success';
        } else {
            $message = 'Menus created with some errors. ' . count($results['errors']) . ' errors occurred.';
            $message_type = 'warning';
        }
    }

    // Check if menus exist
    $menus_exist = tim_menus_exist();
    $last_created = get_option('tim_menus_created', 'Never');

?>
    <div class="wrap">
        <h1>Menu Automation</h1>

        <?php if ($message): ?>
            <div class="notice notice-<?php echo esc_attr($message_type); ?> is-dismissible">
                <p><?php echo esc_html($message); ?></p>
            </div>
        <?php endif; ?>

        <div class="card" style="max-width: 800px; margin-top: 20px;">
            <h2>Automatic Menu Creation</h2>
            <p>This system automatically creates WordPress navigation menus based on the available pages in your site.</p>

            <table class="widefat" style="margin-top: 20px;">
                <tr>
                    <td><strong>Menus Status:</strong></td>
                    <td><?php echo $menus_exist ? '<span style="color: green;">✓ Created</span>' : '<span style="color: red;">✗ Not Created</span>'; ?></td>
                </tr>
                <tr>
                    <td><strong>Last Created:</strong></td>
                    <td><?php echo esc_html($last_created); ?></td>
                </tr>
            </table>

            <h3 style="margin-top: 30px;">Menu Structure</h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 15px;">
                <div>
                    <h4>Primary Menu</h4>
                    <ul style="list-style: none; padding-left: 0;">
                        <li><strong>Programs</strong>
                            <ul style="margin-left: 20px;">
                                <li>Private Training</li>
                                <li>Speak & Rise</li>
                                <li>Corporate Programs</li>
                                <li>True Influence License</li>
                            </ul>
                        </li>
                        <li><strong>About</strong>
                            <ul style="margin-left: 20px;">
                                <li>About Joanna</li>
                                <li>The Journey</li>
                            </ul>
                        </li>
                        <li>Success Stories</li>
                        <li><strong>Community</strong>
                            <ul style="margin-left: 20px;">
                                <li>The Vault</li>
                                <li>Events & Workshops</li>
                            </ul>
                        </li>
                        <li><strong>Resources</strong>
                            <ul style="margin-left: 20px;">
                                <li>Articles & Insights</li>
                                <li>Speaking Tips</li>
                                <li>Media Features</li>
                                <li>Blog & Podcast</li>
                            </ul>
                        </li>
                        <li>FAQ</li>
                        <li>Apply <em>(CTA)</em></li>
                    </ul>
                </div>

                <div>
                    <h4>Dropdown Menu</h4>
                    <ul style="list-style: none; padding-left: 0;">
                        <li><strong>Programs</strong> <br><em>Transform your speaking skills with our comprehensive programs designed for every stage of your journey.</em></li>
                        <li><strong>About</strong> <br><em>Discover the True Influence Method and learn about Joanna's journey from speaker to leadership coach.</em></li>
                        <li><strong>Community</strong> <br><em>Join our community of speakers and leaders, access exclusive content, and attend transformational events.</em></li>
                        <li><strong>Resources</strong> <br><em>Access articles, speaking tips, media features, and podcasts to accelerate your growth.</em></li>
                    </ul>
                </div>
            </div>

            <hr style="margin: 30px 0;">

            <form method="post" action="">
                <?php wp_nonce_field('tim_regenerate_menus_action', 'tim_regenerate_menus_nonce'); ?>

                <h3>Regenerate Menus</h3>
                <p>Click the button below to regenerate the navigation menus. This will create or update the menu structure based on available pages.</p>

                <label style="display: block; margin-top: 15px;">
                    <input type="checkbox" name="force_regenerate" value="1">
                    <strong>Force regeneration</strong> - Recreate menus even if they already exist (this will remove any custom menu items)
                </label>

                <p style="margin-top: 20px;">
                    <input type="submit" name="tim_regenerate_menus" class="button button-primary" value="Regenerate Navigation Menus">
                </p>
            </form>
        </div>

        <?php if (isset($results)): ?>
            <div class="card" style="max-width: 800px; margin-top: 20px;">
                <h3>Results</h3>

                <?php if (!empty($results['success'])): ?>
                    <h4 style="color: green;">Success</h4>
                    <ul style="margin-left: 20px;">
                        <?php foreach ($results['success'] as $success): ?>
                            <li><?php echo esc_html($success); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($results['errors'])): ?>
                    <h4 style="color: red;">Errors</h4>
                    <ul style="margin-left: 20px;">
                        <?php foreach ($results['errors'] as $error): ?>
                            <li><?php echo esc_html($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($results['skipped'])): ?>
                    <h4 style="color: orange;">Skipped</h4>
                    <ul style="margin-left: 20px;">
                        <?php foreach ($results['skipped'] as $skipped): ?>
                            <li><?php echo esc_html($skipped); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php
}

/**
 * Add a quick action link in the admin bar for developers
 */
add_action('admin_bar_menu', 'tim_add_menu_automation_admin_bar_link', 999);

function tim_add_menu_automation_admin_bar_link($wp_admin_bar)
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $args = array(
        'id'    => 'tim-menu-automation',
        'title' => 'Regenerate Menus',
        'href'  => admin_url('themes.php?page=tim-menu-automation'),
        'meta'  => array(
            'title' => 'Regenerate navigation menus',
        ),
    );

    $wp_admin_bar->add_node($args);
}
