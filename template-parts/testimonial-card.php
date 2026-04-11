<?php

/**
 * Testimonial Card Template Part
 * Based on TestimonialCard.vue
 * 
 * @param array $args {
 *     @type string $quote   Testimonial quote
 *     @type string $author  Author name
 *     @type string $type    Author type (e.g., "Private Client")
 *     @type string $image   Author image URL
 * }
 */

$args = wp_parse_args($args, array(
    'quote' => '',
    'author' => '',
    'type' => '',
    'image' => ''
));
?>

<div class="bg-[#0f203d]/50 backdrop-blur-sm p-8 rounded-xl border border-[#faf8f5]/10 hover:border-[#d4b478]/30 transition-all duration-300 relative">
    <div class="absolute top-6 left-6 text-[#d4b478]/20">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
            <path d="M14.017 21L14.017 18C14.017 16.896 14.321 15.792 14.929 14.688L15.536 13.584C16.145 12.48 16.449 11.376 16.449 10.272V8.352C16.449 7.248 16.145 6.144 15.536 5.04L14.929 3.936C14.321 2.832 14.017 1.728 14.017 0.624V-2.136L12.801 -2.136L12.801 0.624C12.801 1.728 12.497 2.832 11.889 3.936L11.281 5.04C10.673 6.144 10.369 7.248 10.369 8.352V10.272C10.369 11.376 10.673 12.48 11.281 13.584L11.889 14.688C12.497 15.792 12.801 16.896 12.801 18L12.801 21H14.017ZM5.985 21L5.985 18C5.985 16.896 6.289 15.792 6.897 14.688L7.505 13.584C8.113 12.48 8.417 11.376 8.417 10.272V8.352C8.417 7.248 8.113 6.144 7.505 5.04L6.897 3.936C6.289 2.832 5.985 1.728 5.985 0.624V-2.136L4.769 -2.136L4.769 0.624C4.769 1.728 4.465 2.832 3.857 3.936L3.249 5.04C2.641 6.144 2.337 7.248 2.337 8.352V10.272C2.337 11.376 2.641 12.48 3.249 13.584L3.857 14.688C4.465 15.792 4.769 16.896 4.769 18L4.769 21H5.985Z" />
        </svg>
    </div>

    <div class="relative z-10">
        <p class="font-serif italic text-xl text-[#faf8f5]/90 mb-6 leading-relaxed">
            <?php echo esc_html($args['quote']); ?>
        </p>

        <div class="flex items-center gap-3">
            <img src="<?php echo esc_url($args['image']); ?>" alt="<?php echo esc_attr($args['author']); ?>" class="w-12 h-12 rounded-full object-cover border-2 border-[#d4b478]/30" />
            <div>
                <p class="text-[#d4b478] font-semibold"><?php echo esc_html($args['author']); ?></p>
                <p class="text-[#faf8f5]/60 text-sm"><?php echo esc_html($args['type']); ?></p>
            </div>
        </div>
    </div>
</div>