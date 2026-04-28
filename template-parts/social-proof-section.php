<?php

/**
 * Social Proof Section Template Part
 * Based on SocialProofSection.vue
 * Features animated ticker/counter boxes that count up on scroll.
 */

// Get ACF fields with fallbacks
$social_proof_badge_text = get_field('social_proof_badge_text') ?: 'Trusted by Leaders';

// Get testimonials from repeater
$testimonials = [];
if (have_rows('testimonials')) {
    while (have_rows('testimonials')) {
        the_row();
        $testimonial_image = get_sub_field('testimonial_image');
        $testimonials[] = [
            'quote' => get_sub_field('testimonial_quote') ?: "Working with Joanna has been nothing short of life-changing.",
            'author' => get_sub_field('testimonial_author') ?: 'A. Robinson',
            'type' => get_sub_field('testimonial_type') ?: 'Private Client',
            'image' => $testimonial_image ? $testimonial_image['url'] : get_template_directory_uri() . '/assets/images/carousel/img1.webp',
        ];
    }
}

// Fallback testimonials if none are set
if (empty($testimonials)) {
    $testimonials = [
        [
            'quote' => "Working with Joanna has been nothing short of life-changing.",
            'author' => "A. Robinson",
            'type' => "Private Client",
            'image' => get_template_directory_uri() . '/assets/images/carousel/img1.webp'
        ],
        [
            'quote' => "A game changer in coaching. Her process is nothing short of transformative.",
            'author' => "Sarah Chen",
            'type' => "Private Client",
            'image' => get_template_directory_uri() . '/assets/images/carousel/img2.webp'
        ],
        [
            'quote' => "We knew training would be good, but got far more than we expected.",
            'author' => "Michael Torres",
            'type' => "Corporate Client",
            'image' => get_template_directory_uri() . '/assets/images/carousel/img3.webp'
        ]
    ];
}

// Get stats - 4 metrics with separate number, prefix, suffix, and label
$metrics = [
    [
        'number'    => get_field('stats_years_number') ?: '30',
        'prefix'    => '',
        'suffix'    => get_field('stats_years_suffix') ?: '+',
        'label'     => get_field('stats_years_label') ?: 'Years of Impact',
    ],
    [
        'number'    => get_field('stats_leaders_number') ?: '10000',
        'prefix'    => '',
        'suffix'    => get_field('stats_leaders_suffix') ?: '+',
        'label'     => get_field('stats_leaders_label') ?: 'Leaders Transformed',
    ],
    [
        'number'    => get_field('stats_revenue_number') ?: '42',
        'prefix'    => get_field('stats_revenue_prefix') ?: '$',
        'suffix'    => get_field('stats_revenue_suffix') ?: 'M+',
        'label'     => get_field('stats_revenue_label') ?: 'Revenue Generated',
    ],
    [
        'number'    => get_field('stats_stages_number') ?: '1100',
        'prefix'    => '',
        'suffix'    => get_field('stats_stages_suffix') ?: '+',
        'label'     => get_field('stats_stages_label') ?: 'Stages Appeared On',
    ],
];
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
                <?php echo esc_html($social_proof_badge_text); ?>
            </span>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial) : ?>
                <?php get_template_part('template-parts/testimonial-card', null, $testimonial); ?>
            <?php endforeach; ?>
        </div>

        <!-- Animated Metrics / Stats Boxes -->
        <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8" id="social-proof-metrics">
            <?php foreach ($metrics as $index => $metric) :
                $raw_number = intval(preg_replace('/[^0-9]/', '', $metric['number']));
                if ($raw_number === 0) {
                    $raw_number = intval($metric['number']);
                }
            ?>
                <div class="stat-box text-center p-6 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm transition-transform duration-300 hover:scale-105">
                    <p class="text-3xl md:text-4xl font-serif font-semibold text-[#d4b478] mb-2">
                        <?php if (!empty($metric['prefix'])) : ?>
                            <span class="stat-prefix"><?php echo esc_html($metric['prefix']); ?></span>
                        <?php endif; ?>
                        <span class="stat-counter"
                            data-target="<?php echo esc_attr($raw_number); ?>"
                            data-duration="2000">0</span>
                        <?php if (!empty($metric['suffix'])) : ?>
                            <span class="stat-suffix"><?php echo esc_html($metric['suffix']); ?></span>
                        <?php endif; ?>
                    </p>
                    <p class="text-[#faf8f5]/60 text-xs md:text-sm uppercase tracking-wider"><?php echo esc_html($metric['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    (function() {
        'use strict';

        /**
         * Animated counter — numbers count up when the metrics section
         * scrolls into the viewport using IntersectionObserver.
         */
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
            var counters = document.querySelectorAll('#social-proof-metrics .stat-counter');
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
                // Fallback: just show final numbers immediately
                counters.forEach(function(counter) {
                    var target = parseInt(counter.getAttribute('data-target'), 10);
                    counter.textContent = target.toLocaleString('en-US');
                });
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initCounters);
        } else {
            initCounters();
        }
    })();
</script>