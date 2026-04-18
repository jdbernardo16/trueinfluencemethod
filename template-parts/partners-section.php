<?php

/**
 * Partners Section Template Part
 * Front page — "As Seen On" / "Featured In" logo section
 */

// Get ACF fields with fallbacks
$partners_badge_text = get_field('partners_badge_text') ?: 'Trusted By';
$partners_heading = get_field('partners_heading') ?: 'As Seen On';

$partners = [
    ['name' => 'ABC', 'logo' => 'abc.png'],
    ['name' => 'Bioneers', 'logo' => 'bioneers.png'],
    ['name' => 'Flagler', 'logo' => 'flagler.png'],
    ['name' => 'Forbes', 'logo' => 'forbes.jpeg'],
    ['name' => 'Harvard', 'logo' => 'harvard.svg'],
    ['name' => 'MTV', 'logo' => 'mtv.png'],
    ['name' => 'Shambhala', 'logo' => 'shambhala.png'],
    ['name' => 'USA Today', 'logo' => 'usa-today.svg'],
];
?>

<section class=" bg-white relative">
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

        <!-- Logo Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:flex">
            <?php foreach ($partners as $partner) : ?>
                <div class="group block w-full flex items-center justify-center p-4 transition-all duration-300" aria-label="<?php echo esc_attr($partner['name']); ?>">
                    <img
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/partners/' . $partner['logo']); ?>"
                        alt="<?php echo esc_attr($partner['name']); ?>"
                        class="max-h-16 w-auto object-contain grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300" />
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Gold divider -->
        <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mt-12"></div>
    </div>
</section>