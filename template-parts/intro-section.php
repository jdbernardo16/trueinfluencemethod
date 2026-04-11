<?php

/**
 * Intro Section Template Part
 * Based on IntroSection.vue
 */

// Get ACF fields with fallbacks
$intro_badge_text = get_field('intro_badge_text') ?: 'The Work';
$intro_heading = get_field('intro_heading') ?: "You Don't Need a Better Script. You Need Your True Story.";
$intro_description_1 = get_field('intro_description_1') ?: "Most leaders know what they do. Very few can say it in a way that makes people lean in, trust them, and follow. That gap — between your impact and your ability to articulate it — is exactly where Joanna works.";
$intro_description_2 = get_field('intro_description_2') ?: "The True Influence Method™️ is not speaking coaching. It's a deep, structured process that surfaces the truth behind your work, shapes it into a message that is unmistakably yours, and trains you to deliver it with the kind of authority and openness that changes rooms.";

$intro_main_image = get_field('intro_main_image');
if ($intro_main_image) {
    $intro_main_image_url = $intro_main_image['url'];
    $intro_main_image_alt = $intro_main_image['alt'] ?: 'Joanna working with client';
} else {
    $intro_main_image_url = get_template_directory_uri() . '/assets/images/carousel/img5.webp';
    $intro_main_image_alt = 'Joanna working with client';
}

$intro_stats_number = get_field('intro_stats_number') ?: '100+';
$intro_stats_label = get_field('intro_stats_label') ?: 'Leaders Transformed';

// Get features from repeater
$features = [];
if (have_rows('intro_features')) {
    while (have_rows('intro_features')) {
        the_row();
        $feature_image = get_sub_field('feature_image');
        $features[] = [
            'image' => $feature_image ? $feature_image['url'] : get_template_directory_uri() . '/assets/images/carousel/img2.webp',
            'title' => get_sub_field('feature_title') ?: 'Personal',
            'subtitle' => get_sub_field('feature_subtitle') ?: '1-on-1 Focus',
        ];
    }
}

// Fallback features if none are set
if (empty($features)) {
    $features = [
        [
            'image' => get_template_directory_uri() . '/assets/images/carousel/img2.webp',
            'title' => 'Personal',
            'subtitle' => '1-on-1 Focus',
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/carousel/img3.webp',
            'title' => 'Proven',
            'subtitle' => 'Tested Method',
        ],
        [
            'image' => get_template_directory_uri() . '/assets/images/carousel/img4.webp',
            'title' => 'Transformative',
            'subtitle' => 'Lasting Impact',
        ],
    ];
}
?>

<section class="py-24 md:py-32 bg-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="text-center lg:text-left">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    <?php echo esc_html($intro_badge_text); ?>
                </span>

                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8 relative">
                    <span class="absolute -top-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                    <?php echo esc_html($intro_heading); ?>
                    <span class="absolute -bottom-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                </h2>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-6">
                    <?php echo wp_kses_post($intro_description_1); ?>
                </div>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-12">
                    <?php echo wp_kses_post($intro_description_2); ?>
                </div>

                <div class="flex items-center gap-6 flex-wrap">
                    <?php foreach ($features as $index => $feature) : ?>
                        <div class="flex items-center gap-3">
                            <img src="<?php echo esc_url($feature['image']); ?>" alt="<?php echo esc_attr($feature['title']); ?>" class="w-14 h-14 rounded-full object-cover border-2 border-[#d4b478]/30" />
                            <div class="text-left">
                                <p class="text-[#d4b478] font-semibold"><?php echo esc_html($feature['title']); ?></p>
                                <p class="text-[#faf8f5]/60 text-sm"><?php echo esc_html($feature['subtitle']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo esc_url($intro_main_image_url); ?>" alt="<?php echo esc_attr($intro_main_image_alt); ?>" class="w-full h-[500px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/50 to-transparent"></div>
                </div>

                <div class="absolute -bottom-6 -right-6 bg-[#d4b478] text-[#0f203d] p-6 rounded-xl shadow-2xl">
                    <p class="font-serif text-3xl font-bold"><?php echo esc_html($intro_stats_number); ?></p>
                    <p class="text-sm font-medium"><?php echo esc_html($intro_stats_label); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>