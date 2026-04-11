<?php

/**
 * Template Name: Vault Page
 * Description: The Vault - complimentary monthly safe space for women leaders
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
        <section class="relative py-20 md:py-32 flex items-center justify-center overflow-hidden min-h-[80vh]">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img4.webp"
                    alt="Background"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d]/70 via-[#0f203d]/65 to-[#0f203d]/95"></div>
            </div>

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
                <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6 block">
                    Complimentary Experience
                </span>

                <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight text-[#faf8f5] mb-6">
                    Enter The Vault
                </h1>

                <p class="text-lg md:text-xl text-[#faf8f5]/80 font-light leading-relaxed max-w-2xl mx-auto mb-10">
                    A free monthly safe space for women leaders to tell their story, connect with peers, and unlock your authentic voice.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="<?php echo home_url('/vault-registration/'); ?>"
                        class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl">
                        <span class="uppercase tracking-wider">
                            Register Now
                        </span>
                    </a>
                    <span class="text-[#faf8f5]/60 text-sm">
                        First Fridays at 12 PM MST
                    </span>
                </div>

                <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2">
                    <div class="animate-bounce">
                        <svg class="w-6 h-6 text-[#d4b478] opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-20 md:py-28 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-6xl mx-auto px-6 md:px-12">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6 block">
                            What is The Vault?
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-8 leading-tight">
                            A Safe Space for Your Voice
                        </h2>
                        <p class="text-[#0f203d]/70 font-light leading-relaxed text-lg">
                            The Vault is Joanna's gift to women leaders seeking a supportive community to share their story, practice their message, and connect with like-minded peers. This complimentary monthly gathering provides a judgment-free environment where you can speak authentically and receive gentle guidance.
                        </p>
                    </div>
                    <div class="relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img5.webp"
                                alt="Women leaders gathering in The Vault"
                                class="w-full h-[400px] object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/50 to-transparent"></div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                    <?php
                    $features = [
                        [
                            'title' => 'Story Sharing',
                            'description' => 'Tell your story in a safe, supportive environment without judgment or pressure.',
                        ],
                        [
                            'title' => 'Peer Connection',
                            'description' => 'Connect with other women leaders facing similar challenges and triumphs.',
                        ],
                        [
                            'title' => 'Expert Guidance',
                            'description' => 'Receive gentle feedback and guidance from Joanna in an intimate setting.',
                        ],
                    ];
                    foreach ($features as $index => $feature): ?>
                        <div class="p-8 bg-white border border-[#0f203d]/10 rounded-2xl text-center shadow-sm">
                            <h3 class="font-serif text-xl text-[#0f203d] mb-4">
                                <?php echo esc_html($feature['title']); ?>
                            </h3>
                            <p class="text-[#0f203d]/70 font-light leading-relaxed">
                                <?php echo esc_html($feature['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="py-20 md:py-28 bg-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6 md:px-12">
                <div class="text-center mb-16">
                    <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6 block">
                        Why Join?
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6 leading-tight">
                        What You'll Experience
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php
                    $benefits = [
                        [
                            'icon' => 'shield',
                            'title' => 'Safe Environment',
                            'description' => 'A judgment-free space where vulnerability is celebrated and confidentiality is honored.',
                        ],
                        [
                            'icon' => 'message-circle',
                            'title' => 'Story Practice',
                            'description' => 'Practice your message and storytelling in front of a supportive audience.',
                        ],
                        [
                            'icon' => 'users',
                            'title' => 'Community Connection',
                            'description' => 'Build relationships with other women leaders who understand your journey.',
                        ],
                        [
                            'icon' => 'heart',
                            'title' => 'Authentic Expression',
                            'description' => 'Discover and express your authentic voice without fear or pretense.',
                        ],
                        [
                            'icon' => 'clock',
                            'title' => 'Monthly Gathering',
                            'description' => 'Regular opportunities to connect, practice, and grow with your community.',
                        ],
                        [
                            'icon' => 'calendar',
                            'title' => 'Flexible Commitment',
                            'description' => 'Attend as your schedule allows—no long-term commitment required.',
                        ],
                    ];
                    foreach ($benefits as $benefit): ?>
                        <div class="p-6 bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-xl hover:border-[#d4b478]/30 transition-colors duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <?php if ($benefit['icon'] === 'shield'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                    </svg>
                                <?php elseif ($benefit['icon'] === 'message-circle'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                                    </svg>
                                <?php elseif ($benefit['icon'] === 'users'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                <?php elseif ($benefit['icon'] === 'heart'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 0C1.46 6.7 1.33 10.28 4 13l8 8 8-8c2.67-2.72 2.54-6.3.42-8.42z" />
                                    </svg>
                                <?php elseif ($benefit['icon'] === 'clock'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                <?php elseif ($benefit['icon'] === 'calendar'): ?>
                                    <svg class="w-6 h-6 text-[#d4b478]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                    </svg>
                                <?php endif; ?>
                            </div>
                            <h3 class="font-serif text-xl text-[#faf8f5] mb-3">
                                <?php echo esc_html($benefit['title']); ?>
                            </h3>
                            <p class="text-[#faf8f5]/70 font-light leading-relaxed text-sm">
                                <?php echo esc_html($benefit['description']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 md:py-28 relative overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img7.webp"
                    alt="Background"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
            </div>
            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
            </div>
            <div class="max-w-4xl mx-auto px-6 md:px-12 text-center relative z-10">
                <div class="p-12 md:p-16 bg-[#0f203d]/90 backdrop-blur-sm border border-[#faf8f5]/20 rounded-3xl">
                    <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6 block">
                        Complimentary
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6 leading-tight">
                        Ready to Enter The Vault?
                    </h2>
                    <p class="text-[#faf8f5]/80 font-light leading-relaxed text-lg mb-8">
                        Join our next First Friday gathering and take the first step toward unlocking your authentic voice in a supportive community of women leaders.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="<?php echo home_url('/vault-registration/'); ?>"
                            class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl">
                            <span class="uppercase tracking-wider">
                                Register Now
                            </span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="<?php echo home_url('/'); ?>"
                            class="text-[#faf8f5]/70 hover:text-[#d4b478] transition-colors text-sm font-medium tracking-wide uppercase">
                            Explore Other Offerings
                        </a>
                    </div>
                    <p class="mt-8 text-[#faf8f5]/50 text-sm">
                        First Fridays at 12 PM MST • Free for all women leaders
                    </p>
                </div>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>