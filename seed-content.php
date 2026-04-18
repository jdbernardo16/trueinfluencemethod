<?php

/**
 * TIM WordPress Theme - Content Seeder
 * 
 * This script generates sample content for Articles, Tips, Media, and Blog post types.
 * It's idempotent - can be run multiple times without creating duplicates.
 * 
 * ⚠️ SECURITY WARNING: Delete this script after use!
 * 
 * Usage:
 * 1. Visit: https://yoursite.com/wp-content/themes/tim-wordpress/seed-content.php
 * 2. Or run via command line: php seed-content.php
 * 3. Delete this file after successful content creation
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
 * Check if a post with a given title already exists
 * 
 * @param string $title Post title
 * @param string $post_type Post type
 * @return int|false Post ID if exists, false otherwise
 */
function seed_post_exists($title, $post_type)
{
    $existing = get_page_by_title($title, OBJECT, $post_type);
    return $existing ? $existing->ID : false;
}

/**
 * Create a post with specified parameters
 * 
 * @param string $title Post title
 * @param string $content Post content
 * @param string $excerpt Post excerpt
 * @param string $post_type Post type
 * @param int|null $featured_image_id Featured image ID
 * @param array $meta_data Additional meta data
 * @return int|WP_Error Post ID on success, WP_Error on failure
 */
function seed_create_post($title, $content, $excerpt, $post_type, $featured_image_id = null, $meta_data = [])
{
    // Check if post already exists
    $existing_id = seed_post_exists($title, $post_type);
    if ($existing_id) {
        return new WP_Error('post_exists', "Post already exists: $title");
    }

    // Create post
    $post_data = array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_excerpt'  => $excerpt,
        'post_status'   => 'publish',
        'post_type'     => $post_type,
        'post_author'   => 1, // Use admin user
    );

    // Add featured image if provided
    if ($featured_image_id) {
        $post_data['meta_input'] = ['_thumbnail_id' => $featured_image_id];
    }

    // Add additional meta data
    if (!empty($meta_data)) {
        if (!isset($post_data['meta_input'])) {
            $post_data['meta_input'] = [];
        }
        $post_data['meta_input'] = array_merge($post_data['meta_input'], $meta_data);
    }

    $post_id = wp_insert_post($post_data);

    if (is_wp_error($post_id)) {
        return $post_id;
    }

    return $post_id;
}

/**
 * Get or create a default featured image
 * 
 * @return int|false Image ID on success, false otherwise
 */
function seed_get_default_image()
{
    // Try to use existing images from the theme
    $image_urls = [
        get_template_directory() . '/assets/images/carousel/img1.webp',
        get_template_directory() . '/assets/images/carousel/img2.webp',
        get_template_directory() . '/assets/images/carousel/img3.webp',
        get_template_directory() . '/assets/images/carousel/img4.webp',
        get_template_directory() . '/assets/images/carousel/img5.webp',
    ];

    // Try to find an existing image in the media library
    $existing_images = get_posts([
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'posts_per_page' => 1,
        'orderby' => 'rand',
    ]);

    if (!empty($existing_images)) {
        return $existing_images[0]->ID;
    }

    // If no images exist, return false (posts will be created without featured images)
    return false;
}

/**
 * Seed Articles content
 */
function seed_articles_content()
{
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array()
    );

    $default_image = seed_get_default_image();

    $articles = array(
        array(
            'title' => 'The Power of Authentic Leadership',
            'content' => '<p>Authentic leadership isn\'t about being perfect. It\'s about being real. In this article, we explore how vulnerability and honesty can actually strengthen your influence as a leader.</p><p>When leaders share their true selves—including their struggles and uncertainties—they create deeper connections with their teams. This authenticity builds trust in ways that polished perfection never can.</p><p>The key is finding the balance between professional credibility and personal authenticity. It\'s not about oversharing; it\'s about being human while leading with purpose.</p>',
            'excerpt' => 'Discover how vulnerability and honesty can strengthen your influence as a leader through authentic communication.',
        ),
        array(
            'title' => 'Finding Your Voice in a Noisy World',
            'content' => '<p>In today\'s hyper-connected world, everyone has something to say. But how do you make sure your message actually lands?</p><p>The answer lies in clarity and conviction. When you truly understand what you stand for, your voice naturally cuts through the noise. This article explores practical strategies for discovering and articulating your unique perspective.</p><p>We\'ll look at how to identify your core values, craft messages that resonate, and deliver them with confidence that comes from genuine belief.</p>',
            'excerpt' => 'Learn practical strategies for discovering and articulating your unique perspective in a crowded marketplace.',
        ),
        array(
            'title' => 'The Art of Strategic Storytelling',
            'content' => '<p>Stories have been the primary way humans communicate for thousands of years. Yet many leaders underestimate their power in business contexts.</p><p>Strategic storytelling isn\'t about entertaining—it\'s about influence. When you frame your ideas within compelling narratives, they become memorable, shareable, and actionable.</p><p>This article breaks down the elements of effective business storytelling and provides frameworks you can use immediately to make your communications more impactful.</p>',
            'excerpt' => 'Master the elements of effective business storytelling to make your communications more impactful and memorable.',
        ),
        array(
            'title' => 'Leading Through Uncertainty',
            'content' => '<p>Uncertainty is the only certainty in today\'s business environment. How leaders respond to this reality determines their effectiveness and their teams\' resilience.</p><p>This article explores the mindset shifts and practical approaches that help leaders navigate ambiguity with confidence. From communication strategies to decision-making frameworks, you\'ll learn how to turn uncertainty into opportunity.</p><p>The most effective leaders don\'t pretend to have all the answers. Instead, they create environments where teams can adapt, learn, and thrive despite the unknown.</p>',
            'excerpt' => 'Learn mindset shifts and practical approaches to navigate business uncertainty with confidence and resilience.',
        ),
        array(
            'title' => 'Building Trust Through Transparent Communication',
            'content' => '<p>Trust is the foundation of all successful leadership. And transparent communication is the fastest way to build it—or destroy it.</p><p>This article examines what transparency really means in leadership contexts. It\'s not about sharing everything; it\'s about being clear about what you know, what you don\'t know, and why you\'re making the decisions you\'re making.</p><p>We\'ll explore practical communication strategies that build trust while maintaining appropriate boundaries. The result is stronger relationships and more aligned teams.</p>',
            'excerpt' => 'Discover how clear, honest communication builds trust and strengthens team relationships.',
        ),
        array(
            'title' => 'The Courage to Have Difficult Conversations',
            'content' => '<p>Every leader faces moments that require difficult conversations. Whether it\'s delivering tough feedback, addressing performance issues, or navigating conflict, these moments test your leadership.</p><p>This article provides a framework for approaching difficult conversations with both courage and compassion. You\'ll learn how to prepare, what to focus on during the conversation, and how to follow up effectively.</p><p>The goal isn\'t to avoid discomfort—it\'s to navigate it in ways that strengthen relationships and drive growth.</p>',
            'excerpt' => 'Learn a framework for approaching difficult conversations with courage and compassion.',
        ),
    );

    foreach ($articles as $article) {
        $result = seed_create_post(
            $article['title'],
            $article['content'],
            $article['excerpt'],
            'articles',
            $default_image
        );

        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'post_exists') {
                $results['skipped'][] = $article['title'];
            } else {
                $results['errors'][] = $article['title'] . ': ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = $article['title'] . ' (ID: ' . $result . ')';
        }
    }

    return $results;
}

/**
 * Seed Tips content
 */
function seed_tips_content()
{
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array()
    );

    $default_image = seed_get_default_image();

    $tips = array(
        array(
            'title' => 'Start with Your Why, Not Your What',
            'content' => '<p>Before you speak, pause and ask yourself: Why does this matter? When you lead with purpose, your message becomes more compelling and memorable.</p><p>People don\'t just want to know what you\'re saying—they want to know why it matters to them. Starting with your why creates immediate relevance and engagement.</p><p>Try this: Before your next presentation or conversation, write down one sentence about why your message matters. Keep it visible as you prepare and deliver.</p>',
            'excerpt' => 'Lead with purpose by starting with why your message matters before explaining what you\'re saying.',
        ),
        array(
            'title' => 'The Power of the Pause',
            'content' => '<p>Silence feels uncomfortable, especially when you\'re speaking. But strategic pauses are one of the most powerful tools in your communication arsenal.</p><p>A well-timed pause gives your audience time to process what you\'ve said. It adds emphasis to important points. It shows confidence and thoughtfulness.</p><p>Next time you\'re about to rush through your points, try pausing for three seconds instead. Notice how it changes the dynamic.</p>',
            'excerpt' => 'Use strategic pauses to add emphasis, give processing time, and demonstrate confidence.',
        ),
        array(
            'title' => 'Listen to Understand, Not to Respond',
            'content' => '<p>Most of us listen with the intent to respond, not to understand. This habit limits our effectiveness and our relationships.</p><p>When you truly listen to understand, you discover insights you would have missed. You build trust. You create space for genuine dialogue.</p><p>Practice this: In your next conversation, commit to not thinking about your response until the other person has completely finished speaking. The difference in quality of interaction will surprise you.</p>',
            'excerpt' => 'Shift from listening to respond to listening to understand for deeper connections and insights.',
        ),
        array(
            'title' => 'Replace "But" with "And"',
            'content' => '<p>The word "but" negates everything that came before it. "You did great work, but..." The praise gets lost in the criticism that follows.</p><p>Replacing "but" with "and" changes everything. "You did great work, and here\'s how we can make it even better." Both parts get heard.</p><p>This small linguistic shift transforms how your feedback is received and how your ideas land. Try it for a week and notice the difference.</p>',
            'excerpt' => 'Transform your communication by replacing "but" with "and" to make both praise and feedback land effectively.',
        ),
        array(
            'title' => 'Own Your Expertise, Share Your Learning',
            'content' => '<p>There\'s a balance between confidence and humility that marks truly effective leaders. You need to own your expertise while remaining open to learning.</p><p>When you speak from genuine expertise, people listen. When you acknowledge what you\'re still learning, you build trust and connection.</p><p>The sweet spot: "Based on my experience..." followed by "And I\'m curious about your perspective." This combination of expertise and openness is powerful.</p>',
            'excerpt' => 'Balance confidence and humility by owning your expertise while remaining open to learning.',
        ),
        array(
            'title' => 'One Clear Message Beats Ten Good Ones',
            'content' => '<p>In our eagerness to be comprehensive, we often overwhelm our audiences with too much information. The result: nothing sticks.</p><p>Focus on one clear, compelling message. Support it with examples, stories, and data. But keep returning to that core message.</p><p>Before your next communication, identify your one main point. Everything else should serve that point. Less is more.</p>',
            'excerpt' => 'Focus on one clear message rather than overwhelming your audience with too much information.',
        ),
    );

    foreach ($tips as $tip) {
        $result = seed_create_post(
            $tip['title'],
            $tip['content'],
            $tip['excerpt'],
            'tips',
            $default_image
        );

        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'post_exists') {
                $results['skipped'][] = $tip['title'];
            } else {
                $results['errors'][] = $tip['title'] . ': ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = $tip['title'] . ' (ID: ' . $result . ')';
        }
    }

    return $results;
}

/**
 * Seed Media content
 */
function seed_media_content()
{
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array()
    );

    $default_image = seed_get_default_image();

    $media_items = array(
        array(
            'title' => 'Featured on Leadership Today Podcast',
            'content' => '<p>Joanna joined the Leadership Today podcast to discuss authentic communication in the modern workplace. The conversation explored how leaders can build trust through transparency and genuine connection.</p><p>Key topics included the role of vulnerability in leadership, practical strategies for difficult conversations, and how to find your authentic voice as a leader.</p><p>Listen to the full episode for actionable insights you can apply immediately.</p>',
            'excerpt' => 'Joanna discusses authentic communication, vulnerability, and finding your voice on the Leadership Today podcast.',
        ),
        array(
            'title' => 'Interview with Forbes: The Future of Executive Communication',
            'content' => '<p>Forbes featured Joanna in their executive communication series, highlighting her work with Fortune 500 leaders on developing authentic influence.</p><p>The article explores how the landscape of leadership communication is changing, and why traditional approaches are falling short in today\'s environment.</p><p>Read the full feature for insights on what\'s working now in executive communication.</p>',
            'excerpt' => 'Forbes features Joanna\'s work with Fortune 500 leaders on developing authentic influence.',
        ),
        array(
            'title' => 'Guest Speaker at Women in Leadership Summit',
            'content' => '<p>Joanna delivered the keynote address at the annual Women in Leadership Summit, speaking to over 500 executives about finding your voice in male-dominated industries.</p><p>Her talk, "Leading Without Losing Yourself," received standing ovations and sparked conversations that continued long after the event.</p><p>The summit organizers called it "the most talked-about session of the year."</p>',
            'excerpt' => 'Joanna delivers keynote on "Leading Without Losing Yourself" at the Women in Leadership Summit.',
        ),
        array(
            'title' => 'Harvard Business Review: Authenticity in Crisis Communication',
            'content' => '<p>Harvard Business Review published Joanna\'s article on how leaders can maintain authenticity while communicating during crises.</p><p>The piece examines real-world examples of crisis communication and extracts principles for leaders facing their own challenging moments.</p><p>It\'s been widely shared in leadership circles and sparked important discussions about transparency and trust.</p>',
            'excerpt' => 'HBR publishes Joanna\'s insights on maintaining authenticity during crisis communication.',
        ),
        array(
            'title' => 'TEDx Talk: The Voice You Already Have',
            'content' => '<p>Joanna\'s TEDx talk has been viewed over 100,000 times, resonating with leaders around the world who struggle with finding their authentic voice.</p><p>In the talk, she shares personal stories and practical frameworks for discovering that your most powerful voice is the one you already have—you just need to uncover it.</p><p>The talk has been featured in TEDx playlists on leadership and communication.</p>',
            'excerpt' => 'Joanna\'s TEDx talk on finding your authentic voice has been viewed over 100,000 times.',
        ),
        array(
            'title' => 'CNBC Interview: Leadership Lessons from the Pandemic',
            'content' => '<p>CNBC interviewed Joanna about leadership lessons emerging from the pandemic and how they\'re reshaping expectations for executives.</p><p>The conversation covered remote leadership, maintaining culture in distributed teams, and why communication became the most critical leadership skill during the crisis.</p><p>The segment has been widely shared and sparked ongoing discussion about the future of work.</p>',
            'excerpt' => 'CNBC interviews Joanna about leadership lessons from the pandemic and the future of work.',
        ),
    );

    foreach ($media_items as $item) {
        $result = seed_create_post(
            $item['title'],
            $item['content'],
            $item['excerpt'],
            'media',
            $default_image
        );

        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'post_exists') {
                $results['skipped'][] = $item['title'];
            } else {
                $results['errors'][] = $item['title'] . ': ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = $item['title'] . ' (ID: ' . $result . ')';
        }
    }

    return $results;
}

/**
 * Seed Blog content
 */
function seed_blog_content()
{
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array()
    );

    $default_image = seed_get_default_image();

    $posts = array(
        array(
            'title' => 'Episode 47: When Being Right Isn\'t Enough',
            'content' => '<p>In this episode, we explore why being right is rarely enough to influence others effectively. Joanna shares stories from her coaching practice where leaders had the facts but failed to move people.</p><p>We discuss the role of emotional intelligence, the importance of timing, and how to frame your message so it actually lands.</p><p>This conversation will change how you think about persuasion and influence.</p>',
            'excerpt' => 'Why having the facts isn\'t enough to influence others effectively.',
        ),
        array(
            'title' => 'Episode 46: The Hidden Cost of People-Pleasing',
            'content' => '<p>Many leaders struggle with people-pleasing tendencies that undermine their effectiveness. In this honest conversation, Joanna and her guest explore where this comes from and how to break free.</p><p>We discuss practical strategies for setting boundaries, making decisions that serve the greater good, and leading with both kindness and strength.</p><p>If you\'ve ever felt like you\'re trying to make everyone happy at your own expense, this episode is for you.</p>',
            'excerpt' => 'Exploring how people-pleasing undermines leadership effectiveness and how to break free.',
        ),
        array(
            'title' => 'Episode 45: Leading When You Don\'t Feel Like It',
            'content' => '<p>We all have days when we don\'t feel like leading. But the job still needs to be done. In this episode, we discuss how to show up effectively even when you\'re not at your best.</p><p>Joanna shares her personal strategies for maintaining leadership presence during difficult times, and her guest offers complementary perspectives.</p><p>This is a practical, honest conversation about the reality of leadership, not the idealized version.</p>',
            'excerpt' => 'Practical strategies for leading effectively even when you\'re not at your best.',
        ),
        array(
            'title' => 'Episode 44: The Art of Receiving Feedback',
            'content' => '<p>Most leaders focus on giving feedback well. But receiving feedback effectively is equally important—and often more challenging.</p><p>In this episode, we explore why feedback triggers our defenses and how to create a mindset that embraces it as growth fuel.</p><p>Joanna and her guest share personal stories of difficult feedback moments and what they learned from them.</p>',
            'excerpt' => 'How to receive feedback effectively without triggering defensive reactions.',
        ),
        array(
            'title' => 'Episode 43: Building Your Personal Board of Advisors',
            'content' => '<p>Every leader needs trusted advisors. But how do you build and maintain a personal board of directors that actually serves your growth?</p><p>In this episode, we discuss the composition of an effective advisory board, how to approach potential members, and how to make the relationship mutually beneficial.</p><p>Joanna shares insights from her own board and from helping clients build theirs.</p>',
            'excerpt' => 'How to build and maintain a personal board of advisors that serves your leadership growth.',
        ),
        array(
            'title' => 'Episode 42: The Leadership Identity Crisis',
            'content' => '<p>Many leaders reach a point where they\'ve succeeded by others\' definitions but feel disconnected from their own identity. This is the leadership identity crisis.</p><p>In this powerful episode, Joanna and her guest explore how to rediscover your authentic leadership identity and lead from a place of genuine alignment.</p><p>This conversation will resonate with anyone who\'s ever felt like they\'re playing a role rather than leading as themselves.</p>',
            'excerpt' => 'Exploring the leadership identity crisis and how to lead from genuine alignment.',
        ),
    );

    foreach ($posts as $post) {
        $result = seed_create_post(
            $post['title'],
            $post['content'],
            $post['excerpt'],
            'blog',
            $default_image
        );

        if (is_wp_error($result)) {
            if ($result->get_error_code() === 'post_exists') {
                $results['skipped'][] = $post['title'];
            } else {
                $results['errors'][] = $post['title'] . ': ' . $result->get_error_message();
            }
        } else {
            $results['success'][] = $post['title'] . ' (ID: ' . $result . ')';
        }
    }

    return $results;
}

/**
 * Seed Programs Page content
 *
 * Populates ACF fields for the Programs page with default Three Paths + Set My Price content.
 */
function seed_programs_page_content()
{
    $results = array(
        'success' => array(),
        'errors' => array(),
        'skipped' => array(),
    );

    // Find the Programs page (uses page-programs.php template)
    $programs_page = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-programs.php',
        'number' => 1,
    ));

    if (empty($programs_page)) {
        // Try by title
        $programs_page = get_page_by_title('Programs');
    }

    if (empty($programs_page)) {
        $results['errors'][] = 'Programs page not found. Create a page with the Programs Page template first.';
        return $results;
    }

    $page_id = $programs_page[0]->ID ?? $programs_page->ID;

    // Check if already seeded
    $already_seeded = get_field('programs_paths_badge', $page_id);
    if ($already_seeded) {
        $results['skipped'][] = 'Programs page already has Three Paths content.';
        return $results;
    }

    // Hero fields
    update_field('programs_hero_badge', 'Programs', $page_id);
    update_field('programs_hero_heading', 'Three Offers. One Method. Transformation at Every Level.', $page_id);
    update_field('programs_hero_description', 'Joanna offers three distinct paths into True Influence Method™️ — each designed for a different context, depth, and investment. All three are grounded in same rigorous process. All three create lasting change.', $page_id);

    // Three Paths section fields
    update_field('programs_paths_badge', 'Three Paths', $page_id);
    update_field('programs_paths_heading', 'One Method. Three Paths. You Choose Your Level of Commitment.', $page_id);
    update_field('programs_paths_description', 'Transformation is priceless. But your investment needs to match the demand on your attention, energy, and focus — or you won\'t show up fully. That\'s the truth of why this works.', $page_id);

    // Three Paths repeater data
    $paths_data = array(
        array(
            'path_label'   => 'Path 1',
            'path_title'   => 'Mastermind',
            'path_subtitle' => 'Self-Study + Retreat',
            'path_who_for' => 'Leaders who are ready to begin at their own pace',
            'path_features' => array(
                array('feature_text' => '90-day self-guided training'),
                array('feature_text' => 'Quarterly in-person retreat'),
                array('feature_text' => 'Expert feedback'),
                array('feature_text' => 'Peer network'),
            ),
            'path_access'  => 'Retreat only',
            'path_role'    => 'Student',
            'path_cta_text' => 'Find My Program →',
            'path_cta_link' => home_url('/apply/'),
            'path_highlight' => false,
        ),
        array(
            'path_label'   => 'Path 2',
            'path_title'   => 'Cohort',
            'path_subtitle' => 'Group Training with Joanna',
            'path_who_for' => '9–10/10 commitment',
            'path_features' => array(
                array('feature_text' => 'Everything in Mastermind'),
                array('feature_text' => 'Monthly live group calls'),
                array('feature_text' => 'Speaker eligibility'),
            ),
            'path_access'  => 'Monthly + retreat',
            'path_role'    => 'Student',
            'path_cta_text' => 'Find My Program →',
            'path_cta_link' => home_url('/apply/'),
            'path_highlight' => false,
        ),
        array(
            'path_label'   => 'Path 3',
            'path_title'   => 'Private Client',
            'path_subtitle' => 'Apply Only',
            'path_who_for' => '10/10 leaders',
            'path_features' => array(
                array('feature_text' => 'One-on-one training'),
                array('feature_text' => 'Everything in Cohort'),
            ),
            'path_access'  => 'Direct 1:1',
            'path_role'    => 'Private Client',
            'path_cta_text' => 'Apply to Become a Private Client →',
            'path_cta_link' => home_url('/apply/'),
            'path_highlight' => true,
        ),
    );
    update_field('programs_paths', $paths_data, $page_id);

    // Set My Price section fields
    update_field('programs_setmyprice_heading', 'Not sure which path is right for you? Let\'s find out together.', $page_id);
    update_field('programs_setmyprice_description', 'Joanna\'s training is worth more than $1,000,000 for clients who are 10/10 committed. But the price isn\'t the filter — your commitment is.', $page_id);
    update_field('programs_setmyprice_cta_text', 'Find My Program + Set My Price →', $page_id);
    update_field('programs_setmyprice_cta_link', home_url('/apply/'), $page_id);

    $results['success'][] = 'Programs page (ID: ' . $page_id . ') seeded with Three Paths + Set My Price content.';

    return $results;
}

/**
 * Main seeder function - call this to seed all content
 * 
 * Usage: seed_landing_page_content();
 * 
 * @return array Results summary
 */
function seed_landing_page_content()
{
    $results = array(
        'articles' => seed_articles_content(),
        'tips' => seed_tips_content(),
        'media' => seed_media_content(),
        'blog' => seed_blog_content(),
        'programs_page' => seed_programs_page_content(),
    );

    return $results;
}

// Run the seeder if this file is accessed directly
if ($load_wp) {
    echo '<!DOCTYPE html><html><head><title>Content Seeder</title>';
    echo '<style>body{font-family:Arial,sans-serif;max-width:800px;margin:50px auto;padding:20px;}';
    echo '.success{color:green}.error{color:red}.skipped{color:orange}';
    echo 'h2{border-bottom:2px solid #ddd;padding-bottom:10px;}</style></head><body>';

    echo '<h1>Content Seeder Results</h1>';

    $results = seed_landing_page_content();

    foreach ($results as $post_type => $type_results) {
        echo '<h2>' . ucfirst($post_type) . '</h2>';

        if (!empty($type_results['success'])) {
            echo '<h3>Created:</h3><ul class="success">';
            foreach ($type_results['success'] as $item) {
                echo '<li>' . esc_html($item) . '</li>';
            }
            echo '</ul>';
        }

        if (!empty($type_results['skipped'])) {
            echo '<h3>Skipped (already exists):</h3><ul class="skipped">';
            foreach ($type_results['skipped'] as $item) {
                echo '<li>' . esc_html($item) . '</li>';
            }
            echo '</ul>';
        }

        if (!empty($type_results['errors'])) {
            echo '<h3>Errors:</h3><ul class="error">';
            foreach ($type_results['errors'] as $item) {
                echo '<li>' . esc_html($item) . '</li>';
            }
            echo '</ul>';
        }
    }

    echo '<p><strong>Remember to delete this file after use!</strong></p>';
    echo '</body></html>';
}
