<?php

/**
 * Template Name: Apply Page
 * Description: Application form page template
 *
 * @package tim-wordpress
 */
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
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] text-center relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-full max-w-4xl opacity-5 pointer-events-none">
                <div class="w-full h-full border border-[#d4b478] rounded-full scale-150"></div>
            </div>

            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    Apply / Work With Joanna
                </span>

                <h1 class="font-serif text-4xl md:text-6xl mb-8 text-[#faf8f5]">
                    Let's Find Out If This Is the Right Fit.
                </h1>

                <p class="text-[#faf8f5]/80 text-xl font-light mb-12 max-w-3xl mx-auto">
                    Joanna works with a limited number of private clients at any one time, and every corporate and group engagement is carefully considered. The inquiry form is the first step — not a commitment, just a conversation.
                </p>

                <p class="text-[#faf8f5]/80 text-xl font-light mb-12 max-w-3xl mx-auto">
                    Fill it out honestly. Tell us where you are, where you want to go, and what feels most alive in your work right now. Joanna's team will review your submission and be in touch within 2 business days.
                </p>

                <!-- Contact Form -->
                <?php echo do_shortcode('[contact-form-7 id="apply-form" title="Apply Form"]'); ?>

                <!-- Additional Links -->
                <div class="mt-12 flex flex-col md:flex-row items-center gap-6 justify-center">
                    <a href="mailto:joanna@trueinfluencemethod.com"
                        class="text-xl md:text-2xl font-serif italic text-[#d4b478] hover:text-[#e8a838] transition-colors border-b border-transparent hover:border-[#e8a838] pb-1">
                        joanna@trueinfluencemethod.com
                    </a>

                    <a href="https://calendly.com/joanna-trueinfluencemethod/private-training"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="px-6 py-3 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all">
                        Book a Consultation →
                    </a>
                </div>
            </div>
        </section>

        <!-- Success Modal -->
        <div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 hidden">
            <div class="bg-[#0f203d] border border-[#d4b478]/30 rounded-2xl p-8 max-w-md w-full shadow-2xl relative">
                <button onclick="document.getElementById('success-modal').classList.add('hidden')"
                    class="absolute top-4 right-4 text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors"
                    aria-label="Close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" x2="6" y1="6" y2="18"></line>
                        <line x1="6" x2="18" y1="6" y2="18"></line>
                    </svg>
                </button>

                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>

                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        Application Submitted!
                    </h3>

                    <p class="text-[#faf8f5]/70 mb-6">
                        Thank you for reaching out. Your application has been received, and we'll get back to you within 2 business days.
                    </p>

                    <button onclick="document.getElementById('success-modal').classList.add('hidden')"
                        class="px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
</body>

</html>