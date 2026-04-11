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
                Background
            </div>
            <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5]">
                A Lifetime of Excellence
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Credential 1 -->
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
                        Harvard Graduate
                    </h3>
                    <p class="text-[#faf8f5]/60">
                        World-class education
                    </p>
                </div>
            </div>

            <!-- Credential 2 -->
            <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                            <path d="M2 17l10 5 10-5"></path>
                            <path d="M2 12l10 5 10-5"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        6x Founder
                    </h3>
                    <p class="text-[#faf8f5]/60">Impact Investor</p>
                </div>
            </div>

            <!-- Credential 3 -->
            <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                            <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                            <line x1="12" y1="19" x2="12" y2="23"></line>
                            <line x1="8" y1="23" x2="16" y2="23"></line>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        TEDx Speaker
                    </h3>
                    <p class="text-[#faf8f5]/60">
                        Global stage presence
                    </p>
                </div>
            </div>

            <!-- Credential 4 -->
            <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        5,000+ Leaders
                    </h3>
                    <p class="text-[#faf8f5]/60">
                        Trained & Transformed
                    </p>
                </div>
            </div>

            <!-- Credential 5 -->
            <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        University Lecturer
                    </h3>
                    <p class="text-[#faf8f5]/60">Educator & Mentor</p>
                </div>
            </div>

            <!-- Credential 6 -->
            <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2">
                <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">
                        Forbes Council
                    </h3>
                    <p class="text-[#faf8f5]/60">
                        Business Council Member
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>