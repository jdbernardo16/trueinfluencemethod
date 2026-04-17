<?php

/**
 * About Joanna Section Template Part
 * Front page — About Joanna section
 */

// Get ACF fields with fallbacks
$about_badge_text = get_field('about_joanna_badge_text') ?: 'About Joanna';
$about_heading_line_1 = get_field('about_joanna_heading_line_1') ?: 'She trains leaders to speak.';
$about_heading_line_2 = get_field('about_joanna_heading_line_2') ?: 'And speakers to lead.';
$about_description_1 = get_field('about_joanna_description_1') ?: 'Joanna Horton McPherson is a Harvard-educated master coach, founder, and creator of the True Influence Method™.';
$about_description_2 = get_field('about_joanna_description_2') ?: 'For 30 years she has helped CEOs, founders, and executives speak at the level they already lead.';
$about_closing_line_1 = get_field('about_joanna_closing_line_1') ?: 'The work looks like speaking training.';
$about_closing_line_2 = get_field('about_joanna_closing_line_2') ?: 'What it actually does is transform leadership.';

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

                <!-- Quote overlay on image -->
                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="bg-[#faf8f5]/90 backdrop-blur-sm p-6 rounded-xl">
                        <p class="font-serif text-[#0f203d] text-lg italic">
                            "<?php echo esc_html($about_closing_line_2); ?>"
                        </p>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="text-center lg:text-left order-1 lg:order-2">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    <?php echo esc_html($about_badge_text); ?>
                </span>

                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#0f203d] mb-10 relative">
                    <span class="absolute -top-6 left-0 w-16 h-px bg-[#d4b478]/40 hidden lg:block"></span>
                    <span class="block text-[#0f203d]/90"><?php echo esc_html($about_heading_line_1); ?></span>
                    <span class="block mt-2 text-[#d4b478] italic"><?php echo esc_html($about_heading_line_2); ?></span>
                    <span class="absolute -bottom-6 left-0 w-16 h-px bg-[#d4b478]/40 hidden lg:block"></span>
                </h2>

                <div class="space-y-6 text-[#0f203d]/70 text-lg md:text-xl leading-relaxed max-w-xl mx-auto lg:mx-0 mb-12">
                    <p><?php echo esc_html($about_description_1); ?></p>
                    <p><?php echo esc_html($about_description_2); ?></p>
                </div>

                <div class="relative max-w-xl mx-auto lg:mx-0">
                    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mb-8"></div>
                    <p class="font-serif text-2xl md:text-3xl text-[#0f203d] leading-snug">
                        <span class="block"><?php echo esc_html($about_closing_line_1); ?></span>
                        <span class="block mt-1 text-[#d4b478] italic"><?php echo esc_html($about_closing_line_2); ?></span>
                    </p>
                    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mt-8"></div>
                </div>
            </div>
        </div>
    </div>
</section>