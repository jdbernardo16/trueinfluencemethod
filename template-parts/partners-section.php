<?php

/**
 * Partners Section Template Part
 * Front page — "As Seen On" / "Featured In" logo section
 * Uses a CSS-animated infinite marquee for the logo strip.
 */

// Get ACF fields with fallbacks
$partners_badge_text = get_field('partners_badge_text') ?: 'Trusted By';
$partners_heading = get_field('partners_heading') ?: 'As Seen On';

$partners = [
    ['name' => '30 Rock', 'logo' => '30-rock.webp'],
    ['name' => '48 Hours', 'logo' => '48-hours.webp'],
    ['name' => 'ABC', 'logo' => 'abc.png'],
    ['name' => 'AOCC', 'logo' => 'aocc.png'],
    ['name' => 'AT&T', 'logo' => 'att.webp'],
    ['name' => 'BBBS', 'logo' => 'bbbs.png'],
    ['name' => 'BGCA', 'logo' => 'bgca.png'],
    ['name' => 'Bioneers', 'logo' => 'bioneers.png'],
    ['name' => 'Bloomberg', 'logo' => 'bloomberg.png'],
    ['name' => 'CNN', 'logo' => 'cnn.webp'],
    ['name' => 'Deseret News', 'logo' => 'deseret-news.webp'],
    ['name' => 'Disney', 'logo' => 'disney.webp'],
    ['name' => 'Flagler College', 'logo' => 'flagler-college.png'],
    ['name' => 'Forbes', 'logo' => 'forbes.jpeg'],
    ['name' => 'Golden Apple Awards', 'logo' => 'golden-apple.webp'],
    ['name' => 'Harvard', 'logo' => 'harvard.svg'],
    ['name' => 'iHeart Radio', 'logo' => 'iheart-radio.webp'],
    ['name' => 'MTV', 'logo' => 'mtv.png'],
    ['name' => 'NAWBO', 'logo' => 'nawbo.jpg'],
    ['name' => 'RSC', 'logo' => 'rsc.webp'],
    ['name' => 'Shambhala', 'logo' => 'shambhala.png'],
    ['name' => 'Union College', 'logo' => 'union-college.png'],
    ['name' => 'USM', 'logo' => 'usm.png'],
    ['name' => 'USA Today', 'logo' => 'usa-today.svg'],
    ['name' => 'Vassar College', 'logo' => 'vassar-college.png'],
    ['name' => 'WJCT', 'logo' => 'wjct.webp'],
    ['name' => 'Wild Global', 'logo' => 'wild-global.png'],
    ['name' => 'Yahoo News', 'logo' => 'yahoo-news.png'],
];
?>

<section class="bg-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Gold divider -->
        <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mb-12"></div>

        <!-- Heading -->
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                <?php echo esc_html($partners_badge_text); ?>
            </span>
        </div>
    </div>

    <!-- Marquee Logo Strip -->
    <div class="relative w-full partners-marquee-wrapper">
        <!-- Fade edges -->
        <div class="pointer-events-none absolute inset-y-0 left-0 w-16 md:w-32 z-10 bg-gradient-to-r from-white to-transparent"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-16 md:w-32 z-10 bg-gradient-to-l from-white to-transparent"></div>

        <div class="partners-marquee-track flex items-center" aria-label="<?php echo esc_attr($partners_heading); ?>">
            <?php for ($i = 0; $i < 2; $i++) : ?>
                <?php foreach ($partners as $partner) : ?>
                    <div class="flex-shrink-0 flex items-center justify-center px-6 md:px-10 py-4 group" aria-label="<?php echo esc_attr($partner['name']); ?>">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/partners/' . $partner['logo']); ?>"
                            alt="<?php echo esc_attr($partner['name']); ?>"
                            class="max-h-10 md:max-h-14 w-auto object-contain grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 select-none"
                            draggable="false" />
                    </div>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <!-- Gold divider -->
        <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mt-12"></div>
    </div>
</section>

<style>
    /* ── Partners Marquee ─────────────────────────────────────── */
    .partners-marquee-track {
        width: max-content;
        animation: partners-marquee-scroll 40s linear infinite;
        will-change: transform;
    }

    /* Pause on hover / focus-within for accessibility */
    .partners-marquee-wrapper:hover .partners-marquee-track,
    .partners-marquee-wrapper:focus-within .partners-marquee-track {
        animation-play-state: paused;
    }

    @keyframes partners-marquee-scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    /* Respect user motion preferences */
    @media (prefers-reduced-motion: reduce) {
        .partners-marquee-track {
            animation: none;
            flex-wrap: wrap;
            justify-content: center;
            width: auto;
        }
    }
</style>