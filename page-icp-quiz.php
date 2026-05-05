<?php

/**
 * Template Name: ICP Quiz Page
 * Description: 5-question ICP assessment quiz to determine the user's influence path
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

    <style>
        /* === ORIGINAL STYLES (preserved exactly) === */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-float {
            animation: float ease-in-out infinite;
        }
        .quiz-question {
            display: none;
            opacity: 0;
            transform: translateX(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .quiz-question.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }
        .quiz-question.slide-out {
            opacity: 0;
            transform: translateX(-20px);
        }
        .quiz-option input[type="radio"]:checked + span {
            color: #0f203d;
        }

        /* === NEW DECORATIVE ANIMATIONS === */
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            25% { transform: translateY(-12px) translateX(8px) rotate(2deg); }
            50% { transform: translateY(-20px) translateX(-4px) rotate(-1deg); }
            75% { transform: translateY(-8px) translateX(10px) rotate(1deg); }
        }
        @keyframes float-slower {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            33% { transform: translateY(-18px) translateX(12px); }
            66% { transform: translateY(-6px) translateX(-8px); }
        }
        @keyframes float-ambient {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.12; }
            50% { transform: translateY(-30px) scale(1.1); opacity: 0.18; }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(212, 180, 120, 0.5); }
            50% { box-shadow: 0 0 0 10px rgba(212, 180, 120, 0); }
        }
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes subtle-pulse {
            0%, 100% { box-shadow: 0 4px 14px 0 rgba(212, 180, 120, 0.25); }
            50% { box-shadow: 0 4px 24px 0 rgba(212, 180, 120, 0.45); }
        }
        @keyframes sparkle {
            0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
            20% { opacity: 0.8; transform: scale(1) rotate(72deg); }
            40% { opacity: 0; transform: scale(0.5) rotate(144deg); }
            60% { opacity: 0.6; transform: scale(0.8) rotate(216deg); }
            80% { opacity: 0; transform: scale(0.3) rotate(288deg); }
        }
        @keyframes sparkle-small {
            0%, 100% { opacity: 0; transform: scale(0); }
            30% { opacity: 0.6; transform: scale(1); }
            60% { opacity: 0; transform: scale(0.4); }
        }
        @keyframes drift-up {
            0% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 0.15; }
            85% { opacity: 0.12; }
            100% { transform: translateY(-120vh) translateX(30px); opacity: 0; }
        }
        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        @keyframes confetti-fall {
            0% { transform: translateY(-20px) rotate(0deg); opacity: 0; }
            10% { opacity: 0.7; }
            90% { opacity: 0.5; }
            100% { transform: translateY(120px) rotate(360deg); opacity: 0; }
        }
        @keyframes glow-pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(212, 180, 120, 0.15), 0 0 40px rgba(212, 180, 120, 0.05); }
            50% { box-shadow: 0 0 30px rgba(212, 180, 120, 0.25), 0 0 60px rgba(212, 180, 120, 0.1); }
        }

        .animate-float-slow {
            animation: float-slow ease-in-out infinite;
        }
        .animate-float-slower {
            animation: float-slower ease-in-out infinite;
        }
        .animate-float-ambient {
            animation: float-ambient ease-in-out infinite;
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.7s ease forwards;
        }
        .animate-drift-up {
            animation: drift-up linear infinite;
        }
        .animate-sparkle {
            animation: sparkle 4s ease-in-out infinite;
        }
        .animate-sparkle-small {
            animation: sparkle-small 3s ease-in-out infinite;
        }
        .animate-confetti-fall {
            animation: confetti-fall 5s ease-in-out infinite;
        }
        .animate-glow-pulse {
            animation: glow-pulse 3s ease-in-out infinite;
        }

        /* Next button pulse when enabled */
        .next-btn:not(:disabled) {
            animation: subtle-pulse 2s ease-in-out infinite;
        }
        .next-btn:disabled {
            animation: none;
        }

        /* Radio checked glow pulse via wrapper element */
        .quiz-option:has(input[type="radio"]:checked) .radio-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        /* Result card entrance */
        #resultCard:not(.hidden) {
            animation: fade-in-up 0.7s ease forwards;
        }

        /* Subtle card shimmer */
        .card-shimmer {
            background: linear-gradient(105deg,
                transparent 40%,
                rgba(212, 180, 120, 0.03) 45%,
                rgba(212, 180, 120, 0.06) 50%,
                rgba(212, 180, 120, 0.03) 55%,
                transparent 60%
            );
            background-size: 200% 100%;
            animation: shimmer 6s ease-in-out infinite;
            pointer-events: none;
        }

        /* Step dot active state */
        .step-dot.active-dot {
            border-color: #d4b478;
            background: #d4b478;
            box-shadow: 0 0 8px rgba(212, 180, 120, 0.4);
        }

        @media (prefers-reduced-motion: reduce) {
            .animate-float-slow,
            .animate-float-slower,
            .animate-float-ambient,
            .animate-drift-up,
            .animate-sparkle,
            .animate-sparkle-small,
            .animate-confetti-fall,
            .animate-glow-pulse,
            .card-shimmer,
            .next-btn:not(:disabled),
            #resultCard:not(.hidden) {
                animation: none !important;
            }
            .quiz-option:has(input[type="radio"]:checked) .radio-pulse-glow {
                animation: none !important;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">

        <!-- ========================================== -->
        <!-- HERO SECTION                                -->
        <!-- ========================================== -->
        <section class="relative py-20 md:py-24 bg-[#0f203d] overflow-hidden">
            <!-- SVG Pattern Overlay -->
            <div class="absolute inset-0 opacity-[0.04] pointer-events-none">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="quizHeroGrid" x="0" y="0" width="60" height="60" patternUnits="userSpaceOnUse">
                            <circle cx="2" cy="2" r="1" fill="#d4b478"/>
                            <path d="M 30 0 L 30 60 M 0 30 L 60 30" stroke="#d4b478" stroke-width="0.3" fill="none" opacity="0.5"/>
                        </pattern>
                    </defs>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#quizHeroGrid)"/>
                </svg>
            </div>

            <!-- Original decorative glows -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <!-- Additional larger blur circles -->
            <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-[#d4b478]/8 rounded-full blur-[150px]"></div>
            <div class="absolute bottom-1/3 left-1/5 w-[400px] h-[400px] bg-[#e8a838]/5 rounded-full blur-[130px]"></div>

            <!-- Floating-slow ambient circles (larger, 3-4) -->
            <div class="absolute top-[15%] left-[8%] w-32 h-32 border border-[#d4b478]/10 rounded-full animate-float-slow pointer-events-none"
                 style="animation-duration: 12s; animation-delay: 0s;">
            </div>
            <div class="absolute top-[60%] right-[12%] w-40 h-40 border border-[#d4b478]/8 rounded-full animate-float-slow pointer-events-none"
                 style="animation-duration: 15s; animation-delay: 1s;">
            </div>
            <div class="absolute top-[30%] right-[30%] w-24 h-24 bg-[#d4b478]/5 rounded-full blur-[30px] animate-float-slower pointer-events-none"
                 style="animation-duration: 18s; animation-delay: 2s;">
            </div>
            <div class="absolute bottom-[20%] left-[20%] w-28 h-28 border border-[#e8a838]/8 rounded-full animate-float-slow pointer-events-none"
                 style="animation-duration: 14s; animation-delay: 0.5s;">
            </div>

            <!-- Original particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <!-- Decorative gradient line at bottom -->
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#d4b478]/50 to-transparent"></div>
            <div class="absolute bottom-0 left-[20%] right-[20%] h-[2px] bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent blur-sm"></div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    Influence Path Assessment
                </span>
                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-4">Find Your Path</h1>
                <p class="text-[#faf8f5]/70 text-lg">5 questions &middot; ~2 minutes</p>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- SECTION DIVIDER                             -->
        <!-- ========================================== -->
        <div class="relative h-14 md:h-20 bg-[#faf8f5] overflow-hidden">
            <div class="absolute inset-0 bg-[#0f203d]"
                 style="clip-path: polygon(0 0, 100% 0, 100% 35%, 0 100%);">
            </div>
            <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>
        </div>

        <!-- ========================================== -->
        <!-- QUIZ SECTION                                -->
        <!-- ========================================== -->
        <section class="relative py-24 md:py-32 bg-[#faf8f5]" id="quizSection">
            <!-- Ambient particles on cream background -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <div class="absolute w-1 h-1 bg-[#d4b478]/10 rounded-full animate-drift-up"
                        style="left: <?php echo rand(2, 98); ?>%; bottom: -5px; animation-duration: <?php echo 12 + rand(0, 10); ?>s; animation-delay: <?php echo rand(0, 8); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <!-- Floating blur elements around the quiz area -->
            <div class="absolute top-20 left-0 w-64 h-64 bg-[#d4b478]/5 rounded-full blur-[80px] pointer-events-none"></div>
            <div class="absolute bottom-20 right-0 w-72 h-72 bg-[#d4b478]/5 rounded-full blur-[100px] pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/3 w-48 h-48 bg-[#e8a838]/3 rounded-full blur-[60px] pointer-events-none"></div>

            <div class="max-w-3xl mx-auto px-6 relative z-10">

                <!-- ========================================== -->
                <!-- PROGRESS BAR                               -->
                <!-- ========================================== -->
                <div class="relative mb-10">
                    <!-- Subtle glow behind progress bar -->
                    <div class="absolute inset-0 bg-[#d4b478]/8 rounded-full blur-md"></div>

                    <!-- Bar track -->
                    <div class="relative w-full h-2.5 bg-[#0f203d]/10 rounded-full overflow-hidden">
                        <!-- Fill -->
                        <div id="progressFill" class="relative h-full bg-gradient-to-r from-[#d4b478] to-[#e8a838] rounded-full transition-all duration-700 ease-out" style="width: 20%"></div>
                    </div>

                    <!-- Step number dots -->
                    <div class="absolute -top-[5px] left-0 right-0 flex z-10 pointer-events-none">
                        <div class="flex-1 flex justify-center">
                            <div class="step-dot w-4 h-4 rounded-full bg-white border-[3px] border-[#d4b478] shadow-md transition-all duration-300"></div>
                        </div>
                        <div class="flex-1 flex justify-center">
                            <div class="step-dot w-4 h-4 rounded-full bg-white border-[3px] border-[#0f203d]/20 transition-all duration-300"></div>
                        </div>
                        <div class="flex-1 flex justify-center">
                            <div class="step-dot w-4 h-4 rounded-full bg-white border-[3px] border-[#0f203d]/20 transition-all duration-300"></div>
                        </div>
                        <div class="flex-1 flex justify-center">
                            <div class="step-dot w-4 h-4 rounded-full bg-white border-[3px] border-[#0f203d]/20 transition-all duration-300"></div>
                        </div>
                        <div class="flex-1 flex justify-center">
                            <div class="step-dot w-4 h-4 rounded-full bg-white border-[3px] border-[#0f203d]/20 transition-all duration-300"></div>
                        </div>
                    </div>

                    <p id="progressLabel" class="text-center text-sm text-[#0f203d]/50 mt-6">Question 1 of 5</p>
                </div>

                <!-- ========================================== -->
                <!-- QUIZ CONTAINER                             -->
                <!-- ========================================== -->
                <div id="quizContainer">

                    <form id="quizForm" onsubmit="return false">

                        <!-- ============================== -->
                        <!-- Q1                              -->
                        <!-- ============================== -->
                        <div id="q1" class="quiz-question active">
                            <div class="relative bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10 overflow-hidden">
                                <!-- Card shimmer overlay -->
                                <div class="card-shimmer absolute inset-0"></div>
                                <!-- Corner accent -->
                                <div class="absolute -top-px -right-px w-20 h-20 overflow-hidden">
                                    <div class="absolute top-0 right-0 w-10 h-10 bg-gradient-to-bl from-[#d4b478] to-transparent rounded-bl-full opacity-30"></div>
                                </div>
                                <!-- Subtle texture overlay -->
                                <div class="absolute inset-0 opacity-[0.015] pointer-events-none"
                                     style="background-image: url('data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E');">
                                </div>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 1 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    How many years have you been leading or building your business?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q1" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">0&ndash;2 years &mdash; Still finding my footing</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q1" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">3&ndash;8 years &mdash; Building momentum</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q1" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">10&ndash;20 years &mdash; Established and scaling</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q1" value="3" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">20+ years &mdash; Industry veteran</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end mt-8">
                                <button onclick="nextQuestion(1)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q2                              -->
                        <!-- ============================== -->
                        <div id="q2" class="quiz-question">
                            <div class="relative bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10 overflow-hidden">
                                <!-- Card shimmer overlay -->
                                <div class="card-shimmer absolute inset-0"></div>
                                <!-- Corner accent -->
                                <div class="absolute -top-px -right-px w-20 h-20 overflow-hidden">
                                    <div class="absolute top-0 right-0 w-10 h-10 bg-gradient-to-bl from-[#d4b478] to-transparent rounded-bl-full opacity-30"></div>
                                </div>
                                <!-- Subtle texture overlay -->
                                <div class="absolute inset-0 opacity-[0.015] pointer-events-none"
                                     style="background-image: url('data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E');">
                                </div>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 2 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What is your approximate annual revenue or equivalent scale of impact?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q2" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">Under $100K</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q2" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">$100K &ndash; $500K</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q2" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">$500K &ndash; $5M</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q2" value="3" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">$5M+</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(2)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 hover:text-[#0f203d]/80 hover:border-[#0f203d]/30 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(2)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q3                              -->
                        <!-- ============================== -->
                        <div id="q3" class="quiz-question">
                            <div class="relative bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10 overflow-hidden">
                                <!-- Card shimmer overlay -->
                                <div class="card-shimmer absolute inset-0"></div>
                                <!-- Corner accent -->
                                <div class="absolute -top-px -right-px w-20 h-20 overflow-hidden">
                                    <div class="absolute top-0 right-0 w-10 h-10 bg-gradient-to-bl from-[#d4b478] to-transparent rounded-bl-full opacity-30"></div>
                                </div>
                                <!-- Subtle texture overlay -->
                                <div class="absolute inset-0 opacity-[0.015] pointer-events-none"
                                     style="background-image: url('data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E');">
                                </div>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 3 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    When someone asks what you do, which sounds most familiar?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q3" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">I start explaining instead of giving a clear answer</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q3" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">I give too much context before saying anything clear</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q3" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">My message sounds similar to everyone else in my space</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(3)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 hover:text-[#0f203d]/80 hover:border-[#0f203d]/30 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(3)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q4                              -->
                        <!-- ============================== -->
                        <div id="q4" class="quiz-question">
                            <div class="relative bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10 overflow-hidden">
                                <!-- Card shimmer overlay -->
                                <div class="card-shimmer absolute inset-0"></div>
                                <!-- Corner accent -->
                                <div class="absolute -top-px -right-px w-20 h-20 overflow-hidden">
                                    <div class="absolute top-0 right-0 w-10 h-10 bg-gradient-to-bl from-[#d4b478] to-transparent rounded-bl-full opacity-30"></div>
                                </div>
                                <!-- Subtle texture overlay -->
                                <div class="absolute inset-0 opacity-[0.015] pointer-events-none"
                                     style="background-image: url('data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E');">
                                </div>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 4 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What feels most true about your message right now?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q4" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">I can&rsquo;t clearly define what makes me different</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q4" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">I have clarity but my message doesn&rsquo;t land the way I want</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q4" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">I am respected but not truly distinct in my market</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(4)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 hover:text-[#0f203d]/80 hover:border-[#0f203d]/30 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(4)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q5                              -->
                        <!-- ============================== -->
                        <div id="q5" class="quiz-question">
                            <div class="relative bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10 overflow-hidden">
                                <!-- Card shimmer overlay -->
                                <div class="card-shimmer absolute inset-0"></div>
                                <!-- Corner accent -->
                                <div class="absolute -top-px -right-px w-20 h-20 overflow-hidden">
                                    <div class="absolute top-0 right-0 w-10 h-10 bg-gradient-to-bl from-[#d4b478] to-transparent rounded-bl-full opacity-30"></div>
                                </div>
                                <!-- Subtle texture overlay -->
                                <div class="absolute inset-0 opacity-[0.015] pointer-events-none"
                                     style="background-image: url('data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M20 0v40M0 20h40'/%3E%3C/g%3E%3C/svg%3E');">
                                </div>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 5 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What outcome matters most to you right now?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q5" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">Find my voice &mdash; know what defines me and why it matters</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q5" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">Move the room &mdash; communicate with clarity and impact</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <span class="relative inline-flex">
                                            <input type="radio" name="q5" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                            <span class="radio-pulse-glow absolute inset-0 rounded-full"></span>
                                        </span>
                                        <span class="text-[#0f203d]/80">Be known &mdash; claim my distinct contribution and legacy</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(5)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 hover:text-[#0f203d]/80 hover:border-[#0f203d]/30 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(5)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    See My Results
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- ========================================== -->
                <!-- RESULT CARD                                -->
                <!-- ========================================== -->
                <div id="resultCard" class="relative hidden bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-[#d4b478]/10 text-center overflow-hidden">
                    <!-- Confetti / Sparkle decorations -->
                    <div class="absolute inset-0 pointer-events-none overflow-hidden">
                        <!-- Gold dots sparkle -->
                        <div class="absolute top-6 left-[8%] w-2 h-2 bg-[#d4b478] rounded-sm animate-sparkle" style="animation-delay: 0s"></div>
                        <div class="absolute top-4 right-[12%] w-2.5 h-2.5 bg-[#e8a838] rounded-sm animate-sparkle" style="animation-delay: 0.8s"></div>
                        <div class="absolute top-12 left-[20%] w-1.5 h-1.5 bg-[#d4b478] rounded-sm animate-sparkle" style="animation-delay: 1.6s"></div>
                        <div class="absolute top-8 right-[25%] w-2 h-2 bg-[#d4b478] rotate-45 animate-sparkle" style="animation-delay: 2.4s"></div>
                        <div class="absolute top-16 left-[40%] w-1.5 h-1.5 bg-[#e8a838] rounded-sm animate-sparkle" style="animation-delay: 0.4s"></div>
                        <!-- Confetti falling pieces -->
                        <div class="absolute top-0 left-[15%] w-1.5 h-3 bg-[#d4b478]/40 rounded-sm animate-confetti-fall" style="animation-delay: 0.2s"></div>
                        <div class="absolute top-0 right-[20%] w-2 h-2 bg-[#e8a838]/30 rounded-full animate-confetti-fall" style="animation-delay: 1.2s"></div>
                        <div class="absolute top-0 left-[45%] w-1 h-2.5 bg-[#d4b478]/35 rounded-sm animate-confetti-fall" style="animation-delay: 2.0s"></div>
                    </div>

                    <!-- Brand logo icon with glow effect -->
                    <div class="relative inline-flex mb-6">
                        <div class="absolute inset-0 bg-[#d4b478]/15 rounded-full blur-xl scale-150 animate-glow-pulse"></div>
                        <div class="relative w-16 h-16 bg-gradient-to-br from-[#d4b478] to-[#e8a838] rounded-xl flex items-center justify-center shadow-lg shadow-[#d4b478]/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#0f203d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                    </div>

                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6 relative">
                        Your Profile
                    </div>
                    <h2 id="resultTitle" class="relative font-serif text-4xl text-[#0f203d] mb-4"></h2>
                    <p id="resultDesc" class="relative text-[#0f203d]/70 text-lg mb-8 max-w-xl mx-auto"></p>

                    <!-- Your Path Box -->
                    <div id="resultOutcome" class="relative bg-gradient-to-br from-[#d4b478]/10 to-[#e8a838]/5 border border-[#d4b478]/25 rounded-xl p-6 md:p-8 mb-6 text-left text-[#0f203d]/80 leading-relaxed shadow-sm">
                        <!-- Decorative top accent -->
                        <div class="absolute top-0 left-8 right-8 h-0.5 bg-gradient-to-r from-transparent via-[#d4b478] to-transparent rounded-full"></div>
                    </div>

                    <!-- Not Ready Box -->
                    <div id="resultAnti" class="relative bg-gradient-to-br from-amber-50 to-amber-50/50 border border-amber-200/60 rounded-xl p-6 md:p-8 mb-8 text-left text-amber-800 leading-relaxed shadow-sm">
                        <!-- Decorative top accent -->
                        <div class="absolute top-0 left-8 right-8 h-0.5 bg-gradient-to-r from-transparent via-amber-400 to-transparent rounded-full"></div>
                    </div>

                    <!-- Action buttons -->
                    <div class="relative flex flex-col sm:flex-row gap-4 justify-center">
                        <a id="resultCta" href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group">
                            Go to My Path
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                        <button onclick="resetQuiz()" class="px-8 py-4 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 hover:text-[#0f203d]/80 font-semibold rounded-lg transition-all">
                            Retake Quiz
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- ========================================== -->
        <!-- BOTTOM SECTION DIVIDER                      -->
        <!-- ========================================== -->
        <div class="relative h-12 md:h-16 bg-[#faf8f5] overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>
        </div>

    </div>

    <script>
        (function() {
            // --- State ---
            var currentQuestion = 1;
            var totalQuestions = 5;

            var results = {
                speaker: {
                    title: 'The Speaker',
                    desc: 'You are early-stage in your leadership journey. You know you have something to say, but you haven\'t yet identified the specific moment that explains your leadership.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Start with a Breakthrough Session or Phase 1 to find your defining moment and clarify your "why."',
                    anti: '<strong>Not ready for:</strong> Phase 2 or 3 &mdash; those build on foundational clarity you need to establish first.',
                    url: '/icp-path/?icp=speaker'
                },
                authority: {
                    title: 'The Authority',
                    desc: 'You have experience and some clarity, but your message hasn\'t yet broken through to create the distinction you deserve. You are ready to go deeper.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Phase 2 or a full intensive to refine your core message and give it the structure to land powerfully.',
                    anti: '<strong>Not ready for:</strong> Phase 3 delivery work &mdash; your message needs to be sharpened first before it can be amplified.',
                    url: '/icp-path/?icp=authority'
                },
                legacy: {
                    title: 'The Legacy Leader',
                    desc: 'You are established but not yet distinct. You have the track record. Now it\'s time to claim your unique contribution and build a message that cements your legacy.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Phase 3 or Private Client work to craft a signature narrative and deliver it with the authority your experience demands.',
                    anti: '<strong>Not ready for:</strong> Staying where you are &mdash; your market needs you to step into your distinction now.',
                    url: '/icp-path/?icp=legacy'
                }
            };

            // --- DOM refs ---
            var progressFill = document.getElementById('progressFill');
            var progressLabel = document.getElementById('progressLabel');
            var quizContainer = document.getElementById('quizContainer');
            var resultCard = document.getElementById('resultCard');

            // --- Helpers ---
            function getSelectedValue(qNum) {
                var radios = document.getElementsByName('q' + qNum);
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        return parseInt(radios[i].value, 10);
                    }
                }
                return null;
            }

            function updateProgress(qNum) {
                var pct = (qNum / totalQuestions) * 100;
                progressFill.style.width = pct + '%';
                progressLabel.textContent = 'Question ' + qNum + ' of ' + totalQuestions;
            }

            function showQuestion(qNum) {
                // Hide all questions
                for (var i = 1; i <= totalQuestions; i++) {
                    var el = document.getElementById('q' + i);
                    if (el) {
                        el.classList.remove('active');
                        el.style.display = 'none';
                    }
                }
                // Show target
                var target = document.getElementById('q' + qNum);
                if (target) {
                    target.style.display = 'block';
                    // Force reflow then add active for transition
                    void target.offsetWidth;
                    target.classList.add('active');
                }
                updateProgress(qNum);
                currentQuestion = qNum;
            }

            function updateNextButton(qNum) {
                var q = document.getElementById('q' + qNum);
                if (!q) return;
                var btn = q.querySelector('.next-btn');
                if (!btn) return;
                var val = getSelectedValue(qNum);
                btn.disabled = val === null;
            }

            // --- Exposed globals ---
            window.nextQuestion = function(qNum) {
                var val = getSelectedValue(qNum);
                if (val === null) return;

                if (qNum === totalQuestions) {
                    // Calculate and show result
                    calculateResult();
                    return;
                }

                var nextQ = qNum + 1;
                showQuestion(nextQ);
                updateNextButton(nextQ);
            };

            window.prevQuestion = function(qNum) {
                if (qNum <= 1) return;
                var prevQ = qNum - 1;
                showQuestion(prevQ);
                updateNextButton(prevQ);
            };

            window.calculateResult = function() {
                // Gather all answers
                var scores = [];
                for (var i = 1; i <= totalQuestions; i++) {
                    var v = getSelectedValue(i);
                    if (v === null) return;
                    scores.push(v);
                }

                // Q1: 0-3, Q2: 0-3, Q3: 0-2, Q4: 0-2, Q5: 0-2
                // Average < 1.2 → speaker, < 2.2 → authority, >= 2.2 → legacy
                var sum = scores[0] + scores[1] + scores[2] + scores[3] + scores[4];
                var avg = sum / totalQuestions;

                var key;
                if (avg < 1.2) {
                    key = 'speaker';
                } else if (avg < 2.2) {
                    key = 'authority';
                } else {
                    key = 'legacy';
                }

                var r = results[key];

                // Populate result card
                document.getElementById('resultTitle').textContent = r.title;
                document.getElementById('resultDesc').textContent = r.desc;
                document.getElementById('resultOutcome').innerHTML = r.outcome;
                document.getElementById('resultAnti').innerHTML = r.anti;
                document.getElementById('resultCta').href = r.url;

                // Hide quiz, show result
                quizContainer.style.display = 'none';
                resultCard.classList.remove('hidden');
                resultCard.style.display = 'block';

                // Scroll to result
                setTimeout(function() {
                    resultCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            };

            window.resetQuiz = function() {
                // Clear all radio selections
                var radios = document.querySelectorAll('#quizForm input[type="radio"]');
                for (var i = 0; i < radios.length; i++) {
                    radios[i].checked = false;
                }

                // Show quiz, hide result
                resultCard.style.display = 'none';
                resultCard.classList.add('hidden');
                quizContainer.style.display = 'block';

                // Reset to question 1
                showQuestion(1);
                updateNextButton(1);

                // Scroll to top of quiz
                document.getElementById('quizSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
            };

            // --- Radio change listeners ---
            document.addEventListener('DOMContentLoaded', function() {
                var radios = document.querySelectorAll('#quizForm input[type="radio"]');
                for (var i = 0; i < radios.length; i++) {
                    radios[i].addEventListener('change', function() {
                        var name = this.getAttribute('name');
                        var qNum = parseInt(name.substring(1), 10);
                        updateNextButton(qNum);
                    });
                }

                // Init: show Q1, update progress
                showQuestion(1);
                updateNextButton(1);
            });

        })();
    </script>

    <?php get_footer(); ?>
</body>

</html>
