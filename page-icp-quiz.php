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
        /* === ORIGINAL STYLES (preserved) === */
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

        /* ===================================== */
        /* JOURNEY THEME — QUIZ REDESIGN         */
        /* ===================================== */

        /* Hero threshold with three portal silhouettes */
        .quiz-hero {
            position: relative;
            overflow: hidden;
        }

        /* Portal silhouettes in hero */
        .portal-silhouette {
            position: absolute;
            bottom: -10px;
            width: 80px;
            height: 120px;
            border-radius: 40px 40px 0 0;
            border: 1px solid rgba(212, 180, 120, 0.08);
            background: linear-gradient(180deg, rgba(212,180,120,0.03) 0%, transparent 60%);
            pointer-events: none;
        }

        /* Question card — dark revelation chamber */
        .question-chamber {
            position: relative;
            background: #0f203d;
            border: 1px solid rgba(212, 180, 120, 0.15);
            border-radius: 24px;
            padding: 2.5rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(15, 32, 61, 0.4), 0 0 0 1px rgba(212, 180, 120, 0.05);
        }

        @media (min-width: 768px) {
            .question-chamber {
                padding: 3rem;
            }
        }

        .question-chamber::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 180, 120, 0.3), transparent);
        }

        /* Giant question watermark */
        .question-watermark {
            position: absolute;
            top: -10px;
            right: 20px;
            font-size: 8rem;
            font-family: serif;
            color: rgba(212, 180, 120, 0.04);
            line-height: 1;
            pointer-events: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .question-watermark {
                font-size: 10rem;
            }
        }

        /* Choice stones */
        .choice-stone {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem;
            background: rgba(250, 248, 245, 0.03);
            border: 1.5px solid rgba(212, 180, 120, 0.12);
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .choice-stone:hover {
            background: rgba(250, 248, 245, 0.06);
            border-color: rgba(212, 180, 120, 0.35);
            box-shadow: 0 0 25px rgba(212, 180, 120, 0.08);
            transform: translateX(4px);
        }

        .choice-stone:has(input[type="radio"]:checked) {
            background: rgba(212, 180, 120, 0.08);
            border-color: #d4b478;
            box-shadow: 0 0 30px rgba(212, 180, 120, 0.15), inset 0 0 20px rgba(212, 180, 120, 0.03);
            transform: translateX(6px);
        }

        /* Radio button inside choice stone */
        .choice-stone input[type="radio"] {
            appearance: none;
            width: 22px;
            height: 22px;
            border: 2px solid rgba(212, 180, 120, 0.3);
            border-radius: 50%;
            background: transparent;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .choice-stone input[type="radio"]:checked {
            border-color: #d4b478;
            background: #d4b478;
            box-shadow: 0 0 12px rgba(212, 180, 120, 0.5);
        }

        .choice-stone input[type="radio"]:checked::after {
            content: '';
            display: block;
            width: 8px;
            height: 8px;
            margin: 5px;
            background: #0f203d;
            border-radius: 50%;
        }

        /* Gold seal that appears on selected */
        .choice-stone .gold-seal {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%) scale(0);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            width: 28px;
            height: 28px;
            background: #d4b478;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .choice-stone:has(input[type="radio"]:checked) .gold-seal {
            transform: translateY(-50%) scale(1);
            opacity: 1;
        }

        .choice-stone .gold-seal svg {
            width: 14px;
            height: 14px;
            color: #0f203d;
        }

        /* Stepping stone progress trail */
        .stepping-trail {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 10px;
        }

        .stepping-trail::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 30px;
            right: 30px;
            height: 2px;
            background: linear-gradient(90deg, rgba(212, 180, 120, 0.2), rgba(212, 180, 120, 0.1));
            transform: translateY(-50%);
            z-index: 0;
        }

        .trail-stone {
            position: relative;
            z-index: 1;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #faf8f5;
            border: 2px solid rgba(15, 32, 61, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: #0f203d;
            transition: all 0.4s ease;
        }

        .trail-stone.completed {
            background: #d4b478;
            border-color: #d4b478;
            color: #0f203d;
            box-shadow: 0 0 15px rgba(212, 180, 120, 0.3);
        }

        .trail-stone.active {
            background: #0f203d;
            border-color: #d4b478;
            color: #d4b478;
            box-shadow: 0 0 20px rgba(212, 180, 120, 0.2);
            transform: scale(1.15);
        }

        /* Navigation buttons */
        .journey-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-size: 0.95rem;
        }

        .journey-btn-primary {
            background: #d4b478;
            color: #0f203d;
        }

        .journey-btn-primary:hover:not(:disabled) {
            background: #e8a838;
            box-shadow: 0 10px 25px rgba(212, 180, 120, 0.3);
            transform: translateY(-2px);
        }

        .journey-btn-primary:disabled {
            opacity: 0.35;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .journey-btn-secondary {
            background: transparent;
            color: rgba(250, 248, 245, 0.6);
            border: 1.5px solid rgba(250, 248, 245, 0.15);
        }

        .journey-btn-secondary:hover {
            background: rgba(250, 248, 245, 0.05);
            border-color: rgba(250, 248, 245, 0.3);
            color: rgba(250, 248, 245, 0.9);
        }

        /* Result card — dramatic reveal */
        .result-reveal {
            position: relative;
            background: #0f203d;
            border: 1px solid rgba(212, 180, 120, 0.2);
            border-radius: 24px;
            padding: 3rem 2rem;
            overflow: hidden;
            box-shadow: 0 30px 60px -15px rgba(15, 32, 61, 0.5);
        }

        @media (min-width: 768px) {
            .result-reveal {
                padding: 4rem 3rem;
            }
        }

        .result-reveal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #d4b478, transparent);
        }

        /* Path-specific result theming */
        .result-path-speaker .result-icon-bg {
            background: linear-gradient(135deg, #faf8f5 0%, #f0ece5 100%);
            box-shadow: 0 0 40px rgba(250, 248, 245, 0.15);
        }

        .result-path-authority .result-icon-bg {
            background: linear-gradient(135deg, #d4b478 0%, #e8a838 100%);
            box-shadow: 0 0 50px rgba(212, 180, 120, 0.3);
        }

        .result-path-legacy .result-icon-bg {
            background: linear-gradient(135deg, #0f203d 0%, #1a3a6b 100%);
            border: 2px solid #d4b478;
            box-shadow: 0 0 60px rgba(212, 180, 120, 0.2);
        }

        /* Result medallion seal */
        .result-medallion {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 1.5rem;
        }

        .result-medallion::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1.5px dashed rgba(212, 180, 120, 0.3);
            animation: spin 20s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Outcome box inside result */
        .outcome-box {
            position: relative;
            background: rgba(212, 180, 120, 0.06);
            border: 1px solid rgba(212, 180, 120, 0.15);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: left;
        }

        .outcome-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 20px;
            right: 20px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 180, 120, 0.3), transparent);
        }

        /* Anti-outcome box */
        .anti-box {
            position: relative;
            background: rgba(250, 248, 245, 0.03);
            border: 1px solid rgba(250, 248, 245, 0.08);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: left;
        }

        /* Animations for the new elements */
        @keyframes stone-pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(212, 180, 120, 0.2); }
            50% { box-shadow: 0 0 0 8px rgba(212, 180, 120, 0); }
        }

        @keyframes glow-breathe {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        /* Ambient orb for dark sections */
        .dark-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(60px);
        }

        /* Reduced motion */
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
            .result-medallion::before { animation: none; }
            .choice-stone { transition: none; }
            .trail-stone { transition: none; }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">

        <!-- ========================================== -->
        <!-- HERO: THE THRESHOLD                         -->
        <!-- ========================================== -->
        <section class="quiz-hero relative py-24 md:py-32 bg-[#0f203d] overflow-hidden">
            <!-- Deep ambient background -->
            <div class="absolute inset-0 opacity-[0.03]">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="thresholdGrid" x="0" y="0" width="80" height="80" patternUnits="userSpaceOnUse">
                            <circle cx="40" cy="40" r="1" fill="#d4b478"/>
                            <path d="M40 0 L40 80 M0 40 L80 40" stroke="#d4b478" stroke-width="0.2" fill="none" opacity="0.3"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#thresholdGrid)"/>
                </svg>
            </div>

            <!-- Large ambient blurs -->
            <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-[#d4b478]/6 rounded-full blur-[150px]"></div>
            <div class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-[#e8a838]/4 rounded-full blur-[120px]"></div>

            <!-- Three portal silhouettes -->
            <div class="portal-silhouette" style="left: 30%; height: 100px; opacity: 0.6;"></div>
            <div class="portal-silhouette" style="left: 50%; transform: translateX(-50%); height: 140px; opacity: 0.9; border-color: rgba(212,180,120,0.15);"></div>
            <div class="portal-silhouette" style="right: 30%; height: 100px; opacity: 0.6;"></div>

            <!-- Floating orbs -->
            <div class="dark-orb w-64 h-64 bg-[#d4b478]/5 top-[10%] right-[5%] animate-float-slow" style="animation-duration: 14s;"></div>
            <div class="dark-orb w-48 h-48 bg-[#e8a838]/5 bottom-[15%] left-[8%] animate-float-slower" style="animation-duration: 18s;"></div>

            <!-- Particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <div class="absolute w-1.5 h-1.5 bg-[#d4b478]/20 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <!-- Gold line at bottom -->
            <div class="absolute bottom-0 left-[15%] right-[15%] h-[1px] bg-gradient-to-r from-transparent via-[#d4b478]/30 to-transparent"></div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-5 py-2.5 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    Influence Path Assessment
                </span>
                <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl text-[#faf8f5] mb-6 leading-tight">
                    Find Your Path
                </h1>
                <p class="text-[#faf8f5]/60 text-lg md:text-xl max-w-xl mx-auto mb-4 leading-relaxed">
                    5 questions to reveal where you are on your influence journey.
                </p>
                <p class="text-[#d4b478]/70 text-sm">~2 minutes</p>
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
        <!-- THE JOURNEY — QUIZ SECTION                  -->
        <!-- ========================================== -->
        <section class="relative py-24 md:py-32 bg-[#faf8f5]" id="quizSection">
            <!-- Cream bg ambient orbs for contrast -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/5 rounded-full blur-[100px] pointer-events-none"></div>
            <div class="absolute bottom-20 right-10 w-80 h-80 bg-[#e8a838]/4 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="max-w-3xl mx-auto px-6 relative z-10">

                <!-- Stepping Stone Trail -->
                <div class="mb-12">
                    <div class="stepping-trail" id="steppingTrail">
                        <div class="trail-stone active" data-step="1">1</div>
                        <div class="trail-stone" data-step="2">2</div>
                        <div class="trail-stone" data-step="3">3</div>
                        <div class="trail-stone" data-step="4">4</div>
                        <div class="trail-stone" data-step="5">5</div>
                    </div>
                    <p id="progressLabel" class="text-center text-sm text-[#0f203d]/40 mt-4 font-medium">Question 1 of 5</p>
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
                            <div class="question-chamber">
                                <span class="question-watermark">01</span>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-3">Question 1 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#faf8f5] mb-8 leading-snug">
                                    How many years have you been leading or building your business?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="choice-stone">
                                        <input type="radio" name="q1" value="0">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">0&ndash;2 years &mdash; Still finding my footing</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q1" value="1">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">3&ndash;8 years &mdash; Building momentum</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q1" value="2">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">10&ndash;20 years &mdash; Established and scaling</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q1" value="3">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">20+ years &mdash; Industry veteran</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end mt-8">
                                <button onclick="nextQuestion(1)" class="journey-btn journey-btn-primary next-btn" disabled>
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q2                              -->
                        <!-- ============================== -->
                        <div id="q2" class="quiz-question">
                            <div class="question-chamber">
                                <span class="question-watermark">02</span>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-3">Question 2 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#faf8f5] mb-8 leading-snug">
                                    What is your approximate annual revenue or equivalent scale of impact?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="choice-stone">
                                        <input type="radio" name="q2" value="0">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">Under $100K</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q2" value="1">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">$100K &ndash; $500K</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q2" value="2">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">$500K &ndash; $5M</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q2" value="3">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">$5M+</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(2)" class="journey-btn journey-btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    Back
                                </button>
                                <button onclick="nextQuestion(2)" class="journey-btn journey-btn-primary next-btn" disabled>
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q3                              -->
                        <!-- ============================== -->
                        <div id="q3" class="quiz-question">
                            <div class="question-chamber">
                                <span class="question-watermark">03</span>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-3">Question 3 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#faf8f5] mb-8 leading-snug">
                                    When someone asks what you do, which sounds most familiar?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="choice-stone">
                                        <input type="radio" name="q3" value="0">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">I start explaining instead of giving a clear answer</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q3" value="1">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">I give too much context before saying anything clear</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q3" value="2">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">My message sounds similar to everyone else in my space</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(3)" class="journey-btn journey-btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    Back
                                </button>
                                <button onclick="nextQuestion(3)" class="journey-btn journey-btn-primary next-btn" disabled>
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q4                              -->
                        <!-- ============================== -->
                        <div id="q4" class="quiz-question">
                            <div class="question-chamber">
                                <span class="question-watermark">04</span>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-3">Question 4 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#faf8f5] mb-8 leading-snug">
                                    What feels most true about your message right now?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="choice-stone">
                                        <input type="radio" name="q4" value="0">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">I can&rsquo;t clearly define what makes me different</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q4" value="1">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">I have clarity but my message doesn&rsquo;t land the way I want</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q4" value="2">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">I am respected but not truly distinct in my market</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(4)" class="journey-btn journey-btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    Back
                                </button>
                                <button onclick="nextQuestion(4)" class="journey-btn journey-btn-primary next-btn" disabled>
                                    Next
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>

                        <!-- ============================== -->
                        <!-- Q5                              -->
                        <!-- ============================== -->
                        <div id="q5" class="quiz-question">
                            <div class="question-chamber">
                                <span class="question-watermark">05</span>

                                <span class="relative block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-3">Question 5 of 5</span>
                                <h2 class="relative font-serif text-2xl md:text-3xl text-[#faf8f5] mb-8 leading-snug">
                                    What outcome matters most to you right now?
                                </h2>

                                <div class="relative space-y-4">
                                    <label class="choice-stone">
                                        <input type="radio" name="q5" value="0">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">Find my voice &mdash; know what defines me and why it matters</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q5" value="1">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">Move the room &mdash; communicate with clarity and impact</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                    <label class="choice-stone">
                                        <input type="radio" name="q5" value="2">
                                        <span class="text-[#faf8f5]/85 text-sm md:text-base leading-relaxed">Be known &mdash; claim my distinct contribution and legacy</span>
                                        <span class="gold-seal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(5)" class="journey-btn journey-btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                                    Back
                                </button>
                                <button onclick="nextQuestion(5)" class="journey-btn journey-btn-primary next-btn" disabled>
                                    See My Results
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- ========================================== -->
                <!-- RESULT: THE REVELATION                      -->
                <!-- ========================================== -->
                <div id="resultCard" class="result-reveal hidden text-center">
                    <!-- Ambient glow behind result -->
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-[#d4b478]/10 rounded-full blur-[100px] pointer-events-none"></div>

                    <!-- Decorative particles -->
                    <div class="absolute inset-0 pointer-events-none overflow-hidden">
                        <div class="absolute top-8 left-[10%] w-2 h-2 bg-[#d4b478] rounded-sm animate-sparkle" style="animation-delay: 0s"></div>
                        <div class="absolute top-6 right-[15%] w-2.5 h-2.5 bg-[#e8a838] rounded-sm animate-sparkle" style="animation-delay: 0.8s"></div>
                        <div class="absolute top-14 left-[25%] w-1.5 h-1.5 bg-[#d4b478] rounded-sm animate-sparkle" style="animation-delay: 1.6s"></div>
                        <div class="absolute top-10 right-[30%] w-2 h-2 bg-[#d4b478] rotate-45 animate-sparkle" style="animation-delay: 2.4s"></div>
                    </div>

                    <!-- Profile badge -->
                    <div class="relative inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-5 py-2 rounded-full mb-8">
                        Your Profile
                    </div>

                    <!-- Medallion icon (path-specific classes applied via JS) -->
                    <div class="result-medallion mx-auto mb-6" id="resultIcon">
                        <div class="result-icon-bg w-full h-full rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" id="resultIconSvg">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                    </div>

                    <h2 id="resultTitle" class="relative font-serif text-4xl md:text-5xl text-[#faf8f5] mb-4"></h2>
                    <p id="resultDesc" class="relative text-[#faf8f5]/60 text-lg mb-10 max-w-xl mx-auto leading-relaxed"></p>

                    <!-- Your Path -->
                    <div id="resultOutcome" class="outcome-box mb-4 text-[#faf8f5]/80"></div>

                    <!-- Not Ready -->
                    <div id="resultAnti" class="anti-box mb-10 text-[#faf8f5]/50"></div>

                    <!-- Actions -->
                    <div class="relative flex flex-col sm:flex-row gap-4 justify-center">
                        <a id="resultCta" href="#" class="journey-btn journey-btn-primary group">
                            Go to My Path
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                        <button onclick="resetQuiz()" class="journey-btn journey-btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"></polyline><path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path></svg>
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
                progressLabel.textContent = 'Question ' + qNum + ' of ' + totalQuestions;
                
                // Update stepping stones
                var stones = document.querySelectorAll('.trail-stone');
                for (var i = 0; i < stones.length; i++) {
                    var step = parseInt(stones[i].getAttribute('data-step'), 10);
                    stones[i].classList.remove('completed', 'active');
                    if (step < qNum) {
                        stones[i].classList.add('completed');
                    } else if (step === qNum) {
                        stones[i].classList.add('active');
                    }
                }
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

                // Add path-specific theming class to result card
                resultCard.classList.remove('result-path-speaker', 'result-path-authority', 'result-path-legacy');
                resultCard.classList.add('result-path-' + key);

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
