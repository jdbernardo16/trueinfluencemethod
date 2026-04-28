<?php

/**
 * About Joanna Section Template Part
 * Front page — About Joanna section
 */

// Get ACF fields with fallbacks
$about_heading = get_field('about_joanna_heading') ?: 'Unlock Your Message';
$about_subtitle = get_field('about_joanna_subtitle') ?: 'Increase Revenue. Expand Your Influence. Deepen Your Impact.';
$about_closing_line = get_field('about_joanna_closing_line') ?: 'Clients report $1M+ increase in sales';

// Get bullet points with defaults
$about_bullet_points = get_field('about_joanna_bullet_points');
if (!$about_bullet_points) {
    $about_bullet_points = [
        ['bullet_point' => 'The defining moment that shaped your leadership — uncovered and built into your message'],
        ['bullet_point' => 'A signature talk ready for stage and social media'],
        ['bullet_point' => 'Accelerated revenue exchange, centered on your key differentiator'],
    ];
}

$about_image = get_field('about_joanna_image');
if ($about_image) {
    $about_image_url = $about_image['url'];
    $about_image_alt = $about_image['alt'] ?: 'Joanna Horton McPherson';
} else {
    $about_image_url = get_template_directory_uri() . '/assets/images/joanna2.webp';
    $about_image_alt = 'Joanna Horton McPherson';
}
?>

<section class="py-24 md:py-32 bg-[#faf8f5] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#0f203d]/5 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Image Area -->
            <div class="relative order-2 lg:order-1">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo esc_url($about_image_url); ?>" alt="<?php echo esc_attr($about_image_alt); ?>" class="w-full h-[600px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 to-transparent"></div>
                </div>

                <!-- Stat badge overlay -->
                <div class="absolute -top-6 -right-6 bg-[#d4b478] text-[#0f203d] p-4 rounded-xl shadow-2xl">
                    <p class="font-serif text-2xl font-bold">30+</p>
                    <p class="text-xs font-medium">Years of Impact</p>
                </div>
            </div>

            <!-- Text Content -->
            <div class="text-center lg:text-left order-1 lg:order-2">
                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#0f203d] mb-6 relative">
                    <span class="block"><?php echo esc_html($about_heading); ?></span>
                    <span class="absolute -bottom-4 left-1/2 lg:left-0 -translate-x-1/2 lg:translate-x-0 w-16 h-px bg-[#d4b478]/40"></span>
                </h2>

                <p class="text-lg md:text-xl text-[#d4b478] italic mb-10 max-w-xl mx-auto lg:mx-0">
                    <?php echo esc_html($about_subtitle); ?>
                </p>

                <ul class="space-y-4 text-[#0f203d]/70 text-lg md:text-xl leading-relaxed max-w-xl mx-auto lg:mx-0 mb-12 list-disc list-inside">
                    <?php foreach ($about_bullet_points as $item) : ?>
                        <li><?php echo esc_html($item['bullet_point']); ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class="relative max-w-xl mx-auto lg:mx-0">
                    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mb-8"></div>
                    <p class="font-serif text-2xl md:text-3xl text-[#0f203d] leading-snug italic">
                        <?php echo esc_html($about_closing_line); ?>
                    </p>
                    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mt-8"></div>
                </div>
            </div>
        </div>
    </div>
</section>