<?php

/**
 * Intro Section Template Part
 * Based on IntroSection.vue
 */

// Get ACF fields with fallbacks
$intro_badge_text = get_field('intro_badge_text') ?: 'The Work';
$intro_heading_line_1 = get_field('intro_heading_line_1') ?: "You don't need confidence.";
$intro_heading_line_2 = get_field('intro_heading_line_2') ?: "You need clarity.";
$intro_description = get_field('intro_description') ?: "The leaders who train here already have results. What they haven't done yet is fully own the story behind their work. That gap between impact and articulation is what the True Influence Method™ solves.";

$intro_main_image = get_field('intro_main_image');
if ($intro_main_image) {
    $intro_main_image_url = $intro_main_image['url'];
    $intro_main_image_alt = $intro_main_image['alt'] ?: 'Joanna working with client';
} else {
    $intro_main_image_url = get_template_directory_uri() . '/assets/images/carousel/img5.webp';
    $intro_main_image_alt = 'Joanna working with client';
}

$intro_stats_number = get_field('intro_stats_number') ?: '10,000+';
$intro_stats_label = get_field('intro_stats_label') ?: 'Leaders Transformed';
$intro_stats_years = get_field('intro_stats_years') ?: '30+';
$intro_stats_years_label = get_field('intro_stats_years_label') ?: 'Years of Work';
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

                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#faf8f5] mb-8 relative">
                    <span class="absolute -top-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                    <span class="block text-[#faf8f5]/90"><?php echo esc_html($intro_heading_line_1); ?></span>
                    <span class="block mt-2 text-[#d4b478] italic"><?php echo esc_html($intro_heading_line_2); ?></span>
                    <span class="absolute -bottom-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                </h2>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-12 max-w-xl mx-auto lg:mx-0">
                    <?php echo wp_kses_post($intro_description); ?>
                </div>

                <div class="flex items-center gap-8 flex-wrap justify-center lg:justify-start" id="intro-stats">
                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-12 h-12 rounded-full bg-[#d4b478]/10 border border-[#d4b478]/20">
                            <svg class="w-5 h-5 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </span>
                        <div class="text-left">
                            <p class="text-[#d4b478] font-serif text-2xl font-bold">
                                <span class="stat-counter" data-target="<?php echo esc_attr(intval(preg_replace('/[^0-9]/', '', $intro_stats_number))); ?>" data-duration="2000">0</span><span class="stat-suffix">+</span>
                            </p>
                            <p class="text-[#faf8f5]/60 text-sm tracking-wide uppercase"><?php echo esc_html($intro_stats_label); ?></p>
                        </div>
                    </div>

                    <div class="w-px h-12 bg-[#d4b478]/20 hidden sm:block"></div>

                    <div class="flex items-center gap-3">
                        <span class="flex items-center justify-center w-12 h-12 rounded-full bg-[#d4b478]/10 border border-[#d4b478]/20">
                            <svg class="w-5 h-5 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </span>
                        <div class="text-left">
                            <p class="text-[#d4b478] font-serif text-2xl font-bold">
                                <span class="stat-counter" data-target="<?php echo esc_attr(intval(preg_replace('/[^0-9]/', '', $intro_stats_years))); ?>" data-duration="2000">0</span><span class="stat-suffix">+</span>
                            </p>
                            <p class="text-[#faf8f5]/60 text-sm tracking-wide uppercase"><?php echo esc_html($intro_stats_years_label); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo esc_url($intro_main_image_url); ?>" alt="<?php echo esc_attr($intro_main_image_alt); ?>" class="w-full h-[500px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/50 to-transparent"></div>
                </div>
                <!-- 
                <div class="absolute -bottom-6 -right-6 bg-[#d4b478] text-[#0f203d] p-6 rounded-xl shadow-2xl">
                    <p class="font-serif text-3xl font-bold"><?php echo esc_html($intro_stats_number); ?></p>
                    <p class="text-sm font-medium"><?php echo esc_html($intro_stats_label); ?></p>
                </div> -->
            </div>
        </div>
    </div>
</section>

<script>
    (function() {
        'use strict';

        function animateCounter(el) {
            var target = parseInt(el.getAttribute('data-target'), 10);
            var duration = parseInt(el.getAttribute('data-duration'), 10) || 2000;
            if (isNaN(target) || target === 0) {
                el.textContent = target;
                return;
            }

            var start = 0;
            var startTime = null;

            function easeOutQuart(t) {
                return 1 - Math.pow(1 - t, 4);
            }

            function formatNumber(n) {
                return n.toLocaleString('en-US');
            }

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var progress = Math.min((timestamp - startTime) / duration, 1);
                var easedProgress = easeOutQuart(progress);
                var current = Math.floor(easedProgress * target);

                el.textContent = formatNumber(current);

                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    el.textContent = formatNumber(target);
                }
            }

            window.requestAnimationFrame(step);
        }

        function initCounters() {
            var counters = document.querySelectorAll('#intro-stats .stat-counter');
            if (!counters.length) return;

            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            animateCounter(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.3
                });

                counters.forEach(function(counter) {
                    observer.observe(counter);
                });
            } else {
                counters.forEach(function(counter) {
                    var target = parseInt(counter.getAttribute('data-target'), 10);
                    counter.textContent = target.toLocaleString('en-US');
                });
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCounters);
        } else {
            initCounters();
        }
    })();
</script>