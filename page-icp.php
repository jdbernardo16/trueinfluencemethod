<?php

/**
 * Template Name: ICP Landing Page
 * Description: Landing/funnel entry page for the Influence Path ICP (Ideal Customer Profile) selector.
 *
 * @package tim-wordpress
 */

// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>

    <style>
        /* Keyframe animations */
        @keyframes float {
            0%,
            100% {
                transform: translateY(0px) translateX(0px);
                opacity: 0.4;
            }
            25% {
                transform: translateY(-20px) translateX(10px);
                opacity: 0.8;
            }
            50% {
                transform: translateY(-10px) translateX(-5px);
                opacity: 0.6;
            }
            75% {
                transform: translateY(-30px) translateX(15px);
                opacity: 0.9;
            }
        }

        @keyframes float-slow {
            0%,
            100% {
                transform: translateY(0px) scale(1);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-40px) scale(1.1);
                opacity: 0.7;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse-glow {
            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(212, 180, 120, 0.4);
            }
            50% {
                box-shadow: 0 0 0 12px rgba(212, 180, 120, 0);
            }
        }

        .animate-float {
            animation: float ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float-slow ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .stagger-1 {
            animation-delay: 0.1s;
            opacity: 0;
        }
        .stagger-2 {
            animation-delay: 0.2s;
            opacity: 0;
        }
        .stagger-3 {
            animation-delay: 0.3s;
            opacity: 0;
        }
        .stagger-4 {
            animation-delay: 0.4s;
            opacity: 0;
        }
        .stagger-5 {
            animation-delay: 0.5s;
            opacity: 0;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Card hover lift */
        .card-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-lift:hover {
            transform: translateY(-4px);
        }

        /* Gradient overlays for ICP card images */
        .icp-card-gradient {
            background: linear-gradient(180deg, transparent 40%, rgba(15, 32, 61, 0.85) 100%);
        }

        /* Quote bubble styling */
        .quote-bubble {
            transition: all 0.3s ease;
        }
        .quote-bubble:hover {
            transform: scale(1.03);
            border-color: rgba(212, 180, 120, 0.4);
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">

        <!-- ============================================================ -->
        <!-- SECTION 1: HERO — DARK NAVY BG                                 -->
        <!-- ============================================================ -->
        <section class="relative min-h-screen flex items-center py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] overflow-hidden">
            <!-- Decorative blurs -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#d4b478]/3 rounded-full blur-[150px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Badge -->
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8 animate-fade-in-up">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        The Influence Path
                    </span>

                    <!-- H1 -->
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight mb-8 animate-fade-in-up stagger-1">
                        You're Not Missing a Message.
                        <span class="text-[#d4b478] block mt-2">You're Missing Trust.</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto mb-16 animate-fade-in-up stagger-2">
                        Turn your lived experience into a message people trust and follow.
                    </p>

                    <!-- Quote Bubbles -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-4xl mx-auto mb-12 animate-fade-in-up stagger-3">
                        <div class="quote-bubble bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl px-5 py-4 text-center">
                            <p class="text-[#faf8f5]/60 text-sm italic leading-relaxed">
                                "I don't know what to say."
                            </p>
                        </div>
                        <div class="quote-bubble bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl px-5 py-4 text-center">
                            <p class="text-[#faf8f5]/60 text-sm italic leading-relaxed">
                                "I need a better message."
                            </p>
                        </div>
                        <div class="quote-bubble bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl px-5 py-4 text-center">
                            <p class="text-[#faf8f5]/60 text-sm italic leading-relaxed">
                                "I need more confidence."
                            </p>
                        </div>
                    </div>

                    <!-- Truth Statement -->
                    <div class="animate-fade-in-up stagger-4">
                        <p class="text-[#d4b478] text-lg md:text-xl font-semibold">
                            That feels true, but it's not the real problem.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 2: FRAMEWORK — "What's Actually Happening"             -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        The Framework
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">What's Actually Happening</h2>
                </div>

                <!-- 4-column grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1: Disconnected -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift">
                        <svg class="w-12 h-12 text-[#d4b478] mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Disconnected</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You speak without connection to your lived truth.</p>
                    </div>

                    <!-- Card 2: Something Missing -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift">
                        <svg class="w-12 h-12 text-[#d4b478] mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            <line x1="11" y1="8" x2="11" y2="14"></line>
                            <line x1="8" y1="11" x2="14" y2="11"></line>
                        </svg>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Something Missing</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">It sounds right, but something is missing.</p>
                    </div>

                    <!-- Card 3: Leaning on Strategy -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift">
                        <svg class="w-12 h-12 text-[#d4b478] mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="9" y1="13" x2="15" y2="13"></line>
                            <line x1="9" y1="17" x2="13" y2="17"></line>
                        </svg>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Leaning on Strategy</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You lean on structure and performance to carry it.</p>
                    </div>

                    <!-- Card 4: Not Seen -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift">
                        <svg class="w-12 h-12 text-[#d4b478] mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Not Seen</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You show up, but you don't stand out.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 3: WHY IT MATTERS — DARK NAVY BG WITH PARTICLES        -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <!-- Decorative blurs -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">Why This Matters</h2>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
                        The story behind your solution creates trust.
                    </p>
                </div>

                <!-- Outcome cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 max-w-6xl mx-auto">
                    <!-- Card 1: Emotional Weight -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Emotional Weight</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">Your message carries feeling.</p>
                    </div>

                    <!-- Card 2: Credibility -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Credibility</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">They believe what you say.</p>
                    </div>

                    <!-- Card 3: Authority -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Authority</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">You lead with confidence.</p>
                    </div>

                    <!-- Card 4: Differentiation -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 12l2 2 4-4"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Differentiation</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">You stand out in your market.</p>
                    </div>

                    <!-- Card 5: Trust (full width on mobile, spans normally on desktop) -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 sm:col-span-2 lg:col-span-1">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15 10"></polyline>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Trust</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">People follow leaders they can feel.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 4: ICP SELECTOR — LIGHT CREAM BG                       -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        Choose Your Path
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">Find Where You Are</h2>
                    <p class="text-[#0f203d]/70 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        You don't need more strategy. You need to close the gap between what you know and what you can say.
                    </p>
                </div>

                <!-- ICP Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

                    <!-- ============================== -->
                    <!-- ICP 1: The Speaker              -->
                    <!-- ============================== -->
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                        <!-- Image area -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img1.webp'); ?>"
                                alt="The Speaker"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                loading="lazy" />
                            <div class="absolute inset-0 icp-card-gradient"></div>

                        </div>

                        <!-- Card body -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-1">The Speaker</h3>
                            <p class="text-[#d4b478] text-xs font-bold tracking-[0.1em] uppercase mb-4">
                                3–8 years leading · $100K–$500K revenue
                            </p>

                            <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                                "I know I have something to say, but I can't clearly say what defines me yet."
                            </blockquote>

                            <div class="space-y-3 mb-8 flex-1">
                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">Clarity on what defines you and why it matters.</span>
                                    </li>
                                </ul>

                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">A message you can say in one sentence.</span>
                                    </li>
                                </ul>
                            </div>

                            <a href="/icp-path/?icp=speaker"
                                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                                Find My Message
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- ============================== -->
                    <!-- ICP 2: The Authority            -->
                    <!-- ============================== -->
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                        <!-- Image area -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img2.webp'); ?>"
                                alt="The Authority"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                loading="lazy" />
                            <div class="absolute inset-0 icp-card-gradient"></div>

                        </div>

                        <!-- Card body -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-1">The Authority</h3>
                            <p class="text-[#d4b478] text-xs font-bold tracking-[0.1em] uppercase mb-4">
                                10–20 years leading · $500K–$5M+ revenue
                            </p>

                            <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                                "I know my work, but I over-explain it when it matters most."
                            </blockquote>

                            <div class="space-y-3 mb-8 flex-1">
                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">A structured message that lands.</span>
                                    </li>
                                </ul>

                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">A signature talk aligned to your work.</span>
                                    </li>
                                </ul>
                            </div>

                            <a href="/icp-path/?icp=authority"
                                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                                Build My Talk
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- ============================== -->
                    <!-- ICP 3: The Legacy               -->
                    <!-- ============================== -->
                    <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                        <!-- Image area -->
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img3.webp'); ?>"
                                alt="The Legacy"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                loading="lazy" />
                            <div class="absolute inset-0 icp-card-gradient"></div>

                        </div>

                        <!-- Card body -->
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-1">The Legacy</h3>
                            <p class="text-[#d4b478] text-xs font-bold tracking-[0.1em] uppercase mb-4">
                                20+ years leading · $5M–$25M+ revenue
                            </p>

                            <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                                "I've built something significant, but I'm not clearly known for what I do differently."
                            </blockquote>

                            <div class="space-y-3 mb-8 flex-1">
                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">A distinct, repeatable point of view.</span>
                                    </li>
                                </ul>

                                <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="text-sm text-[#0f203d]/80">A blueprint people can build on after you.</span>
                                    </li>
                                </ul>
                            </div>

                            <a href="/icp-path/?icp=legacy"
                                class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                                Private Training
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- ============================================================ -->
                <!-- SECTION 5: NOT SURE CTA — NAVY BOX                           -->
                <!-- ============================================================ -->
                <div class="max-w-2xl mx-auto mt-16 bg-[#0f203d] rounded-2xl p-10 text-center relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-[#d4b478]/5 rounded-full blur-[80px]"></div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#d4b478]/5 rounded-full blur-[60px]"></div>

                    <div class="relative z-10">
                        <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">Not Sure Where You Are?</h3>
                        <p class="text-[#faf8f5]/70 text-lg leading-relaxed mb-8 max-w-lg mx-auto">
                            Take the 5-minute Influence Path Assessment and see exactly where your voice and leadership stopped matching.
                        </p>
                        <a href="/icp-quiz/"
                            class="inline-flex items-center gap-2 px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all group">
                            Find My Path
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /overflow-x-hidden -->

    <?php get_footer(); ?>
</body>

</html>
