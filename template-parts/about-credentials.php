<?php

/**
 * About Credentials section component.
 *
 * @package tim-wordpress
 */
?>

<section class="py-24 md:py-32 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d] relative overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <?php for ($i = 1; $i <= 20; $i++): ?>
            <div class="absolute w-1 h-1 bg-[#d4b478]/20 rounded-full animate-float"
                style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 8 + rand(0, 4); ?>s;">
            </div>
        <?php endfor; ?>
    </div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                <?php tim_esc_text(tim_get_field('about_credentials_badge', 'Background')); ?>
            </div>
            <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5]">
                <?php tim_esc_text(tim_get_field('about_credentials_heading', 'A Lifetime of Excellence')); ?>
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php
            $credentials = tim_get_repeater_field('about_credentials_items', [
                ['credential_title' => 'Harvard Graduate', 'credential_subtitle' => 'World-class education'],
                ['credential_title' => '6x Founder', 'credential_subtitle' => 'Impact Investor'],
                ['credential_title' => 'TEDx Speaker', 'credential_subtitle' => 'Global stage presence'],
                ['credential_title' => '5,000+ Leaders', 'credential_subtitle' => 'Trained & Transformed'],
                ['credential_title' => 'University Lecturer', 'credential_subtitle' => 'Educator & Mentor'],
                ['credential_title' => 'Forbes Council', 'credential_subtitle' => 'Business Council Member'],
            ]);

            foreach ($credentials as $index => $credential) :
                $credential_title = $credential['credential_title'] ?? '';
                $credential_subtitle = $credential['credential_subtitle'] ?? '';
            ?>
                <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                            </svg>
                        </div>
                        <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                            <?php tim_esc_text($credential_title); ?>
                        </h3>
                        <p class="text-[#faf8f5]/60">
                            <?php tim_esc_text($credential_subtitle); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>