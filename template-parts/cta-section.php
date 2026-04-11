<?php

/**
 * CTA Section Template Part
 * Based on CTASection.vue
 */

// Get ACF fields with fallbacks
$cta_background_image = get_field('cta_background_image');
if ($cta_background_image) {
    $cta_background_image_url = $cta_background_image['url'];
} else {
    $cta_background_image_url = get_template_directory_uri() . '/assets/images/carousel/img4.webp';
}

$cta_heading = get_field('cta_heading') ?: 'The Path Is Made By Walking.';
$cta_description = get_field('cta_description') ?: "You've done the work. You've built the vision. Now it's time to speak it into the world — with the clarity, courage, and influence your leadership deserves.";

$cta_primary_cta_text = get_field('cta_primary_cta_text') ?: 'Submit Your Application';
$cta_primary_cta_link = get_field('cta_primary_cta_link');
if ($cta_primary_cta_link && is_array($cta_primary_cta_link)) {
    $cta_primary_cta_link_url = $cta_primary_cta_link['url'];
} else {
    $cta_primary_cta_link_url = '/apply';
}

$cta_secondary_cta_text = get_field('cta_secondary_cta_text') ?: 'Book a Consultation';
$cta_secondary_cta_link = get_field('cta_secondary_cta_link');
if ($cta_secondary_cta_link && is_array($cta_secondary_cta_link)) {
    $cta_secondary_cta_link_url = $cta_secondary_cta_link['url'];
} else {
    $cta_secondary_cta_link_url = 'https://calendly.com/joanna-trueinfluencemethod/private-training';
}

// Get trust indicators from repeater
$trust_indicators = [];
if (have_rows('trust_indicators')) {
    while (have_rows('trust_indicators')) {
        the_row();
        $trust_indicators[] = get_sub_field('indicator_text');
    }
}

// Fallback trust indicators if none are set
if (empty($trust_indicators)) {
    $trust_indicators = [
        'No obligation',
        'Complimentary call',
        'Private & confidential',
    ];
}
?>

<section class="py-24 md:py-32 text-center relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($cta_background_image_url); ?>" alt="Background" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
    </div>

    <div class="absolute inset-0">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]/30 mx-auto">
                <path d="M2 20h20"></path>
                <path d="M5 20v-6l7-10 7 10v6"></path>
                <path d="M9 20v-4"></path>
                <path d="M15 20v-4"></path>
            </svg>
        </div>

        <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">
            <?php echo esc_html($cta_heading); ?>
        </h2>

        <div class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto leading-relaxed">
            <?php echo wp_kses_post($cta_description); ?>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url($cta_primary_cta_link_url); ?>" class="group px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 relative overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    <?php echo esc_html($cta_primary_cta_text); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </span>
            </a>
            <a href="<?php echo esc_url($cta_secondary_cta_link_url); ?>" target="_blank" rel="noopener noreferrer" class="group px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all flex items-center gap-2 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                    <line x1="16" x2="16" y1="2" y2="6"></line>
                    <line x1="8" x2="8" y1="2" y2="6"></line>
                    <line x1="3" x2="21" y1="10" y2="10"></line>
                </svg>
                <?php echo esc_html($cta_secondary_cta_text); ?>
            </a>
        </div>

        <div class="mt-16 flex items-center justify-center gap-8 flex-wrap">
            <?php foreach ($trust_indicators as $index => $indicator) : ?>
                <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                    <?php echo esc_html($indicator); ?>
                </div>
                <?php if ($index < count($trust_indicators) - 1) : ?>
                    <div class="w-1 h-1 bg-[#faf8f5]/20 rounded-full"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>