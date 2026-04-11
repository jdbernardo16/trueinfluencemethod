<?php

/**
 * Template part: Phase Card
 * 
 * Displays a single phase card for the journey page.
 * 
 * @package tim-wordpress
 */

// Get phase data from the loop
$phase_number = get_query_var('phase_number', '');
$phase_title = get_query_var('phase_title', '');
$phase_subtitle = get_query_var('phase_subtitle', '');
$phase_description = get_query_var('phase_description', '');
$phase_image = get_query_var('phase_image', '');
$phase_order = get_query_var('phase_order', 'image-first'); // 'image-first' or 'text-first'
?>

<div class="grid lg:grid-cols-2 gap-16 items-center mb-24">
    <?php if ($phase_order === 'text-first'): ?>
        <div class="order-1 lg:order-2">
            <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                <?php echo esc_html($phase_number); ?>
            </div>

            <h3 class="font-serif text-3xl md:text-4xl text-[#0f203d] mb-4">
                <?php echo esc_html($phase_title); ?>
            </h3>
            <p class="text-[#d4b478] text-lg font-medium mb-6">
                <?php echo esc_html($phase_subtitle); ?>
            </p>

            <p class="text-[#0f203d]/80 text-lg leading-relaxed">
                <?php echo esc_html($phase_description); ?>
            </p>
        </div>

        <div class="relative order-2 lg:order-1">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <img
                    src="<?php echo esc_url($phase_image); ?>"
                    alt="<?php echo esc_attr($phase_title); ?>"
                    class="w-full h-[450px] object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="bg-[#d4b478] text-[#0f203d] px-6 py-3 rounded-lg inline-block">
                        <span class="font-bold text-2xl"><?php echo esc_html($phase_number); ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="relative order-2 lg:order-1">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                <img
                    src="<?php echo esc_url($phase_image); ?>"
                    alt="<?php echo esc_attr($phase_title); ?>"
                    class="w-full h-[450px] object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 to-transparent"></div>

                <div class="absolute bottom-0 left-0 right-0 p-8">
                    <div class="bg-[#d4b478] text-[#0f203d] px-6 py-3 rounded-lg inline-block">
                        <span class="font-bold text-2xl"><?php echo esc_html($phase_number); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-1 lg:order-2">
            <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                <?php echo esc_html($phase_number); ?>
            </div>

            <h3 class="font-serif text-3xl md:text-4xl text-[#0f203d] mb-4">
                <?php echo esc_html($phase_title); ?>
            </h3>
            <p class="text-[#d4b478] text-lg font-medium mb-6">
                <?php echo esc_html($phase_subtitle); ?>
            </p>

            <p class="text-[#0f203d]/80 text-lg leading-relaxed">
                <?php echo esc_html($phase_description); ?>
            </p>
        </div>
    <?php endif; ?>
</div>