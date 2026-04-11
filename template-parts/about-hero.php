<?php

/**
 * About Hero section component.
 *
 * @package tim-wordpress
 */
?>

<section class="relative min-h-screen flex items-center py-32 overflow-hidden bg-[#0f203d]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="z-10">
                <span class="inline-block text-[#d4b478] font-semibold tracking-widest uppercase text-sm mb-4">
                    <?php tim_esc_text(tim_get_field('about_hero_badge', 'Leadership & Executive Coaching')); ?>
                </span>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 text-[#faf8f5]">
                    <?php tim_esc_text(tim_get_field('about_hero_heading', 'She Trains Leaders to <span class="italic text-[#d4b478]">Speak</span>.<br />And Speakers to <span class="italic text-[#d4b478]">Lead</span>.')); ?>
                </h1>

                <div class="text-lg md:text-xl text-[#faf8f5]/80 mb-8 max-w-lg leading-relaxed">
                    <?php tim_esc_content(tim_get_field('about_hero_description', 'Joanna Horton McPherson helps leaders find their authentic voice through the True Influence Method™ — building trust, emotional clarity, and real-world impact.')); ?>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <?php
                    $primary_cta_link = tim_get_field('about_hero_primary_cta_link');
                    $primary_cta_url = $primary_cta_link ? get_permalink($primary_cta_link) : home_url('/apply/');
                    ?>
                    <a
                        href="<?php echo esc_url($primary_cta_url); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 bg-[#d4b478] text-[#0f203d] font-semibold rounded-full hover:bg-[#e8a838] transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <?php tim_esc_text(tim_get_field('about_hero_primary_cta_text', 'Book Joanna to Speak')); ?>
                    </a>
                    <a
                        href="<?php tim_esc_url(tim_get_field('about_hero_secondary_cta_link', '#about')); ?>"
                        class="inline-flex items-center justify-center px-8 py-4 border-2 border-[#faf8f5] text-[#faf8f5] font-semibold rounded-full hover:bg-[#faf8f5] hover:text-[#0f203d] transition-all duration-300">
                        <?php tim_esc_text(tim_get_field('about_hero_secondary_cta_text', 'Learn More')); ?>
                        <!-- ArrowRight Icon -->
                        <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <div class="text-sm text-[#faf8f5]/60 font-medium">
                    <?php tim_esc_text(tim_get_field('about_hero_featured_on', 'As featured on MTV, Harvard, USA Today')); ?>
                </div>
            </div>

            <!-- Image Area -->
            <div class="relative h-[500px] lg:h-[700px] w-full rounded-2xl overflow-hidden shadow-2xl">
                <!-- Joanna's image with lighter background gradient -->
                <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d]/30 to-[#0f203d]/30">
                    <?php
                    $hero_image = tim_get_image_field(
                        'about_hero_image',
                        get_template_directory_uri() . '/assets/images/joanna-hero.webp',
                        'Joanna Horton McPherson speaking'
                    );
                    ?>
                    <img
                        src="<?php echo esc_url($hero_image['url']); ?>"
                        alt="<?php echo esc_attr($hero_image['alt']); ?>"
                        class="w-full h-full object-cover"
                        loading="eager" />

                    <div class="absolute inset-0 bg-[#d4b478]/5 mix-blend-multiply"></div>
                </div>

                <!-- Decorative elements -->
                <div class="absolute bottom-8 left-8 bg-[#faf8f5]/90 backdrop-blur-sm p-6 rounded-xl max-w-xs shadow-lg hidden md:block">
                    <div class="font-serif italic text-[#0f203d] text-lg mb-2">
                        "<?php tim_esc_text(tim_get_field('about_hero_overlay_quote', 'True Influence')); ?>"
                    </div>
                    <div class="text-xs text-[#0f203d]/70 uppercase tracking-wider font-semibold">
                        <?php tim_esc_text(tim_get_field('about_hero_overlay_label', 'Signature Method')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>