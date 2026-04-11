<?php

/**
 * Template part: Program Card
 * 
 * Displays a single program card for the programs page.
 * 
 * @package tim-wordpress
 */

// Get program data from the loop
$program_level = get_query_var('program_level', '');
$program_title = get_query_var('program_title', '');
$program_price = get_query_var('program_price', '');
$program_description = get_query_var('program_description', '');
$program_link = get_query_var('program_link', '#');
?>

<div class="bg-[#0f203d] p-8 rounded-lg shadow-xl">
    <span class="text-[#d4b478] text-sm font-bold tracking-[0.1em] uppercase mb-4 block">
        <?php echo esc_html($program_level); ?>
    </span>
    <h4 class="font-serif text-2xl text-[#faf8f5] mb-4">
        <?php echo esc_html($program_title); ?>
    </h4>
    <p class="text-[#d4b478] text-lg font-medium mb-4">
        <?php echo esc_html($program_price); ?>
    </p>
    <p class="text-[#faf8f5]/80 mb-6">
        <?php echo esc_html($program_description); ?>
    </p>

    <?php if (!empty($program_link)): ?>
        <a href="<?php echo esc_url($program_link); ?>"
            class="inline-block px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all">
            Learn More →
        </a>
    <?php endif; ?>
</div>