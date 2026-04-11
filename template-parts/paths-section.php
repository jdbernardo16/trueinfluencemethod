<?php

/**
 * Paths Section Template Part
 * Based on PathsSection.vue
 */

// Get ACF fields with fallbacks
$paths_badge_text = get_field('paths_badge_text') ?: 'Ways to Work Together';
$paths_heading = get_field('paths_heading') ?: 'One Method. Three Paths.';
$paths_description = get_field('paths_description') ?: "Whether you're a CEO ready for private mastery, a rising leader joining a powerful group, or an organization building a culture of courageous communication — there is a path for you.";

// Get paths from repeater
$paths = [];
if (have_rows('paths_items')) {
    while (have_rows('paths_items')) {
        the_row();
        $path_features = [];
        if (have_rows('path_features')) {
            while (have_rows('path_features')) {
                the_row();
                $path_features[] = get_sub_field('feature_text');
            }
        }

        $cta_link = get_sub_field('path_cta_link');
        if ($cta_link && is_array($cta_link)) {
            $cta_link_url = $cta_link['url'];
        } else {
            $cta_link_url = '/apply';
        }

        $paths[] = [
            'icon' => get_sub_field('path_icon') ?: 'user',
            'title' => get_sub_field('path_title') ?: 'Private Training',
            'description' => get_sub_field('path_description') ?: 'For founders and CEOs who are ready for the deepest, most transformative work. One-on-one with Joanna.',
            'price' => get_sub_field('path_price') ?: 'From $20,000',
            'cta' => get_sub_field('path_cta_text') ?: 'Apply for Private Training',
            'cta_link' => $cta_link_url,
            'badge' => get_sub_field('path_badge') ?: 'Exclusive',
            'features' => $path_features ?: ['One-on-one sessions with Joanna', 'Customized curriculum', 'Priority support', 'Direct access to Joanna'],
        ];
    }
}

// Fallback paths if none are set
if (empty($paths)) {
    $paths = [
        [
            'icon' => 'user',
            'title' => 'Private Training',
            'description' => 'For founders and CEOs who are ready for the deepest, most transformative work. One-on-one with Joanna.',
            'price' => 'From $20,000',
            'cta' => 'Apply for Private Training',
            'cta_link' => '/apply',
            'badge' => 'Exclusive',
            'features' => ['One-on-one sessions with Joanna', 'Customized curriculum', 'Priority support', 'Direct access to Joanna']
        ],
        [
            'icon' => 'users',
            'title' => 'Speak & Rise (Group)',
            'description' => 'A group training experience for leaders who want to find their voice and develop their story alongside a community of peers.',
            'price' => 'From $6,000',
            'cta' => 'Join Speak & Rise',
            'cta_link' => '/apply',
            'badge' => 'Community',
            'features' => ['Small group cohorts', 'Peer learning', 'Practice sessions', 'Community access']
        ],
        [
            'icon' => 'building',
            'title' => 'Corporate Programs',
            'description' => 'Bring the True Influence Method™️ to your leadership team or organization.',
            'price' => 'Custom Pricing',
            'cta' => 'Inquire for Your Team',
            'cta_link' => '/contact',
            'badge' => 'Team',
            'features' => ['Team workshops', 'Leadership development', 'Custom solutions', 'Scalable programs']
        ]
    ];
}

// Icon mapping to dashicons
$icon_map = [
    'user' => 'dashicons-admin-users',
    'users' => 'dashicons-groups',
    'building' => 'dashicons-building',
];
?>

<section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 bg-[#0f203d]/5 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                <?php echo esc_html($paths_badge_text); ?>
            </span>

            <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">
                <?php echo esc_html($paths_heading); ?>
            </h2>

            <div class="text-[#0f203d]/70 text-lg max-w-3xl mx-auto leading-relaxed">
                <?php echo wp_kses_post($paths_description); ?>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($paths as $index => $path) : ?>
                <?php get_template_part('template-parts/path-card', null, $path); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>