<?php

/**
 * Template Name: Community Page
 * Description: Community landing page template
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
        <!-- Hero Section -->
        <section class="relative py-20 md:py-32 flex items-center justify-center overflow-hidden">
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
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse" />
                    The Community
                </span>

                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    You Don't Do This Work Alone.
                </h1>

                <div class="max-w-3xl mx-auto">
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-6">
                        The True Influence Method™️ is not just a program. It's a growing community of leaders committed to brave, authentic communication — people who believe that their voice is their most powerful leadership tool, and are doing the work to prove it.
                    </p>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                        When you work with Joanna, you step into that community.
                    </p>
                </div>

                <!-- Navigation Cards -->
                <div class="grid md:grid-cols-2 gap-8 mt-16 max-w-4xl mx-auto">
                    <a href="<?php echo home_url('/community/vault/'); ?>"
                        class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#faf8f5]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#d4b478]/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-[#d4b478]/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#faf8f5] mb-3 group-hover:text-[#d4b478] transition-colors">
                                The Vault
                            </h3>
                            <p class="text-[#faf8f5]/60 text-sm leading-relaxed">
                                An exclusive digital library of frameworks, tools, and resources for members.
                            </p>
                        </div>
                    </a>

                    <a href="<?php echo home_url('/community/events/'); ?>"
                        class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#faf8f5]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#d4b478]/10 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-[#d4b478]/20 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#faf8f5] mb-3 group-hover:text-[#d4b478] transition-colors">
                                Events & Retreats
                            </h3>
                            <p class="text-[#faf8f5]/60 text-sm leading-relaxed">
                                Quarterly retreat experiences designed to deepen clarity and accelerate momentum.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
                <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                    Ready to Join a Community of Leaders Who Speak with Courage?
                </h2>

                <p class="text-[#0f203d]/70 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
                    Take the first step toward finding your voice and leading with authentic influence.
                </p>

                <a href="<?php echo home_url('/apply/'); ?>"
                    class="inline-flex items-center gap-3 bg-[#d4b478] text-white text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300 shadow-lg hover:shadow-xl">
                    Apply to Work With Joanna
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>