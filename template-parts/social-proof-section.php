<?php

/**
 * Social Proof Section Template Part
 * Based on SocialProofSection.vue
 */

$testimonials = array(
    array(
        'quote' => "Working with Joanna has been nothing short of life-changing.",
        'author' => "A. Robinson",
        'type' => "Private Client",
        'image' => get_template_directory_uri() . '/assets/images/carousel/img1.webp'
    ),
    array(
        'quote' => "A game changer in coaching. Her process is nothing short of transformative.",
        'author' => "Sarah Chen",
        'type' => "Private Client",
        'image' => get_template_directory_uri() . '/assets/images/carousel/img2.webp'
    ),
    array(
        'quote' => "We knew training would be good, but got far more than we expected.",
        'author' => "Michael Torres",
        'type' => "Corporate Client",
        'image' => get_template_directory_uri() . '/assets/images/carousel/img3.webp'
    )
);
?>

<section class="py-20 bg-[#0f203d] relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                Trusted by Leaders
            </span>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial) : ?>
                <?php get_template_part('template-parts/testimonial-card', null, $testimonial); ?>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 flex items-center justify-center gap-8 flex-wrap">
            <div class="text-center">
                <p class="text-4xl font-serif font-semibold text-[#d4b478] mb-1">100+</p>
                <p class="text-[#faf8f5]/60 text-sm uppercase tracking-wider">Leaders Transformed</p>
            </div>
            <div class="w-px h-12 bg-[#faf8f5]/10 hidden md:block"></div>
            <div class="text-center">
                <p class="text-4xl font-serif font-semibold text-[#d4b478] mb-1">98%</p>
                <p class="text-[#faf8f5]/60 text-sm uppercase tracking-wider">Client Satisfaction</p>
            </div>
            <div class="w-px h-12 bg-[#faf8f5]/10 hidden md:block"></div>
            <div class="text-center">
                <p class="text-4xl font-serif font-semibold text-[#d4b478] mb-1">5+</p>
                <p class="text-[#faf8f5]/60 text-sm uppercase tracking-wider">Years Experience</p>
            </div>
        </div>
    </div>
</section>