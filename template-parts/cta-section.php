<?php

/**
 * CTA Section Template Part
 * Based on CTASection.vue
 */

$background_image = get_template_directory_uri() . '/assets/images/carousel/img4.webp';
?>

<section class="py-24 md:py-32 text-center relative overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo esc_url($background_image); ?>" alt="Background" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
    </div>

    <div class="absolute inset-0">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
    </div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">
        <div class="mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]/30 mx-auto">
                <path d="M2 20h20"></path>
                <path d="M5 20v-6l7-10 7 10v6"></path>
                <path d="M9 20v-4"></path>
                <path d="M15 20v-4"></path>
            </svg>
        </div>

        <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">
            The Path Is Made By Walking.
        </h2>

        <p class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto leading-relaxed">
            You've done the work. You've built the vision. Now it's time to speak it into the world — with the clarity, courage, and influence your leadership deserves.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo esc_url(home_url('/apply')); ?>" class="group px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 relative overflow-hidden">
                <span class="relative z-10 flex items-center gap-2">
                    Submit Your Application
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </span>
            </a>
            <a href="https://calendly.com/joanna-trueinfluencemethod/private-training" target="_blank" rel="noopener noreferrer" class="group px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all flex items-center gap-2 justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:scale-110 transition-transform">
                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                    <line x1="16" x2="16" y1="2" y2="6"></line>
                    <line x1="8" x2="8" y1="2" y2="6"></line>
                    <line x1="3" x2="21" y1="10" y2="10"></line>
                </svg>
                Book a Consultation
            </a>
        </div>

        <div class="mt-16 flex items-center justify-center gap-8 flex-wrap">
            <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
                No obligation
            </div>
            <div class="w-1 h-1 bg-[#faf8f5]/20 rounded-full"></div>
            <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                Complimentary call
            </div>
            <div class="w-1 h-1 bg-[#faf8f5]/20 rounded-full"></div>
            <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                Private & confidential
            </div>
        </div>
    </div>
</section>