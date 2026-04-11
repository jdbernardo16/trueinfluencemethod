<?php

/**
 * About CTA section component.
 *
 * @package tim-wordpress
 */
?>

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
            Ready to Find Your Voice?
        </h2>
        <p class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto">
            The first step is a conversation. Fill out Joanna's private client inquiry form and her team will be in touch to guide you toward the right path.
        </p>

        <a href="<?php echo home_url('/apply/'); ?>"
            class="inline-flex items-center gap-3 px-10 py-5 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-xl hover:shadow-[#d4b478]/20 text-lg group">
            Apply to Work With Joanna
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</section>