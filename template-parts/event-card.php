<?php

/**
 * Template part: Event Card
 * 
 * Displays a single event card for the events page.
 * 
 * @package tim-wordpress
 */

// Get event data from the loop
$event_type = get_query_var('event_type', '');
$event_title = get_query_var('event_title', '');
$event_description = get_query_var('event_description', '');
$event_icon = get_query_var('event_icon', '');
?>

<div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 border border-[#faf8f5]">
    <div class="h-48 bg-gradient-to-br from-[#0f203d] to-[#0f203d] flex items-center justify-center">
        <?php echo $event_icon; ?>
    </div>
    <div class="p-6">
        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
            <?php echo esc_html($event_type); ?>
        </span>
        <h3 class="font-serif text-xl text-[#0f203d] mt-2 mb-3">
            <?php echo esc_html($event_title); ?>
        </h3>
        <p class="text-[#0f203d]/60 text-sm leading-relaxed">
            <?php echo esc_html($event_description); ?>
        </p>
    </div>
</div>