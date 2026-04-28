<?php

/**
 * Paths Section Template Part
 * Based on PathsSection.vue
 */

// Get ACF fields with fallbacks
$paths_badge_text = get_field('paths_badge_text') ?: 'Ways to Work Together';
$paths_heading = get_field('paths_heading') ?: 'Choose Your Path to Transformation';
$paths_description = get_field('paths_description') ?: "Transformation is Priceless. Choose the experience that fits your needs.";

// Get paths from repeater
$paths = [];
if (have_rows('paths_items')) {
    while (have_rows('paths_items')) {
        the_row();

        $cta_link = get_sub_field('path_cta_link');
        if ($cta_link && is_array($cta_link)) {
            $cta_link_url = $cta_link['url'];
        } else {
            $cta_link_url = '/programs';
        }

        $paths[] = [
            'icon' => get_sub_field('path_icon') ?: 'user',
            'title' => get_sub_field('path_title') ?: 'Private Client',
            'description' => get_sub_field('path_description') ?: 'One-on-one work with Joanna.',
            'role' => get_sub_field('path_role') ?: 'Client',
            'cta' => get_sub_field('path_cta_text') ?: 'Apply →',
            'cta_link' => $cta_link_url,
        ];
    }
}

// Fallback paths if none are set
if (empty($paths)) {
    $paths = [
        [
            'icon' => 'book',
            'title' => '90-day Mastermind',
            'description' => 'Best for leaders who want to move at their own pace and prioritize access',
            'role' => 'Student',
            'cta' => 'Join Now',
            'cta_link' => '/programs/mastermind',
        ],
        [
            'icon' => 'users',
            'title' => 'Cohort',
            'description' => 'Best for leaders who want a professional network, a polished talk, and featured stage appearances',
            'role' => 'Student',
            'cta' => 'Join Now',
            'cta_link' => '/programs/corporate',
        ],
        [
            'icon' => 'user',
            'title' => 'Private Client',
            'description' => 'Best for leaders who are ready for fast results and want the highest level of access to Joanna',
            'role' => 'Client',
            'cta' => 'Apply',
            'cta_link' => '/programs/private-training',
        ],
    ];
}

// Icon mapping
$icon_map = [
    'user' => 'dashicons-admin-users',
    'users' => 'dashicons-groups',
    'building' => 'dashicons-building',
    'book' => 'dashicons-book',
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

            <div class="text-[#0f203d]/70 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
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