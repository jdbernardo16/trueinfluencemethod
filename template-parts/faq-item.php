<?php

/**
 * Template part: FAQ Item
 * 
 * Displays a single FAQ accordion item with question and answer.
 * 
 * @package tim-wordpress
 */

// Get FAQ item data from the loop
$faq_question = get_query_var('faq_question', '');
$faq_answer = get_query_var('faq_answer', '');
$faq_index = get_query_var('faq_index', 0);
?>

<div class="faq-item bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10">
    <button
        class="faq-toggle w-full px-8 py-6 flex items-center justify-between text-left hover:bg-[#faf8f5]/50 transition-colors"
        data-faq-index="<?php echo esc_attr($faq_index); ?>"
        aria-expanded="false">
        <span class="font-serif text-xl md:text-2xl text-[#0f203d] pr-4">
            <?php echo esc_html($faq_question); ?>
        </span>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="text-[#d4b478] flex-shrink-0 transition-transform duration-300 faq-icon">
            <path d="m6 9 6 6 6-6" />
        </svg>
    </button>
    <div class="faq-content px-8 pb-6 hidden" id="faq-content-<?php echo esc_attr($faq_index); ?>">
        <p class="text-[#0f203d]/70 text-lg leading-relaxed">
            <?php echo esc_html($faq_answer); ?>
        </p>
    </div>
</div>