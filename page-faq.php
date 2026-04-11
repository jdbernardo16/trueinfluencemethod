<?php

/**
 * Template Name: FAQ Page
 * Description: FAQ page template with accordion
 *
 * @package tim-wordpress
 */

// Get FAQ data from ACF
$faqs = get_field('faq_items');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">
        <!-- Hero -->
        <section class="relative py-20 flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d]"></div>

            <!-- Decorative elements -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    <?php echo esc_html(get_field('faq_hero_badge') ?: 'Frequently Asked Questions'); ?>
                </span>

                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html(get_field('faq_hero_heading') ?: 'Your Questions, Answered.'); ?>
                </h1>

                <div class="max-w-3xl mx-auto">
                    <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                        <?php echo wp_kses_post(get_field('faq_hero_description') ?: 'If you have a question that isn\'t answered here, Joanna\'s team is always happy to help. Reach out via contact form or submit your application and we\'ll be in touch.'); ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Questions & Answers -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <div class="space-y-6">
                    <?php if ($faqs): ?>
                        <?php foreach ($faqs as $index => $faq): ?>
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10">
                                <button
                                    class="faq-toggle w-full px-8 py-6 flex items-center justify-between text-left hover:bg-[#faf8f5]/50 transition-colors"
                                    data-faq-index="<?php echo esc_attr($index); ?>"
                                    aria-expanded="false">
                                    <span class="font-serif text-xl md:text-2xl text-[#0f203d] pr-4">
                                        <?php echo esc_html($faq['faq_item_question']); ?>
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
                                <div class="faq-content px-8 pb-6 hidden" id="faq-content-<?php echo esc_attr($index); ?>">
                                    <div class="text-[#0f203d]/70 text-lg leading-relaxed">
                                        <?php echo wp_kses_post($faq['faq_item_answer']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-[#0f203d]/70">No FAQ items found. Please add FAQ items in the page editor.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- FAQ CTA -->
        <section class="py-24 md:py-32 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d] relative overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/20 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 7 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <div class="mb-12">
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 rounded-full"></div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icononly_transparent_nobuffer.png"
                            alt="Logo"
                            class="w-32 h-32 object-contain relative z-10" />
                    </div>
                </div>

                <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-6">
                    <?php echo esc_html(get_field('faq_cta_heading') ?: 'Still Have Questions?'); ?>
                </h2>
                <div class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto">
                    <?php echo wp_kses_post(get_field('faq_cta_description') ?: 'Joanna\'s team is happy to answer anything not covered here. Reach out directly or submit your application and someone will be in touch shortly.'); ?>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(get_field('faq_cta_primary_link') ?: home_url('/apply/')); ?>"
                        class="group px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 relative overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            <?php echo esc_html(get_field('faq_cta_primary_text') ?: 'Submit Your Application'); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </a>
                    <a href="<?php echo esc_url(get_field('faq_cta_secondary_link') ?: 'https://calendly.com/joanna-trueinfluencemethod/private-training'); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="group px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <?php echo esc_html(get_field('faq_cta_secondary_text') ?: 'Book a Consultation'); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script>
        // FAQ Accordion Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');

            faqToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    const index = this.getAttribute('data-faq-index');
                    const content = document.getElementById('faq-content-' + index);
                    const icon = this.querySelector('.faq-icon');

                    // Toggle content visibility
                    content.classList.toggle('hidden');

                    // Rotate icon
                    if (content.classList.contains('hidden')) {
                        icon.style.transform = 'rotate(0deg)';
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        icon.style.transform = 'rotate(180deg)';
                        this.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        });
    </script>

    <?php get_footer(); ?>
</body>

</html>