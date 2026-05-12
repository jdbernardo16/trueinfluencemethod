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
        /* ===================================== */
        /* KEYFRAME ANIMATIONS                   */
        /* ===================================== */
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

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        @keyframes gold-pulse {

            0%,
            100% {
                opacity: 0.6;
            }

            50% {
                opacity: 1;
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

        .animate-shimmer {
            background-size: 200% auto;
            animation: shimmer 3s linear infinite;
        }

        .animate-gold-pulse {
            animation: gold-pulse 3s ease-in-out infinite;
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

        .stagger-6 {
            animation-delay: 0.6s;
            opacity: 0;
        }

        .stagger-7 {
            animation-delay: 0.7s;
            opacity: 0;
        }

        .stagger-8 {
            animation-delay: 0.8s;
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

        /* ===================================== */
        /* NEW: SVG diamond pattern overlay      */
        /* ===================================== */
        .diamond-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        /* ===================================== */
        /* NEW: Icon glow effect                 */
        /* ===================================== */
        .icon-glow {
            position: relative;
        }

        .icon-glow::after {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(212, 180, 120, 0.25) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .icon-glow:hover::after {
            opacity: 1;
        }

        .icon-glow-static::after {
            opacity: 0.6;
        }

        /* ===================================== */
        /* NEW: Card top-left corner accent      */
        /* ===================================== */
        .corner-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 24px;
            background: #d4b478;
            border-radius: 0 0 3px 0;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .corner-accent:hover::before {
            opacity: 1;
        }

        .corner-accent-static::before {
            opacity: 0.7;
        }

        /* ===================================== */
        /* NEW: Gold border glow on hover        */
        /* ===================================== */
        .gold-border-glow {
            transition: box-shadow 0.4s ease, border-color 0.4s ease;
        }

        .gold-border-glow:hover {
            border-color: rgba(212, 180, 120, 0.5) !important;
            box-shadow: 0 0 30px rgba(212, 180, 120, 0.15), inset 0 0 30px rgba(212, 180, 120, 0.05);
        }

        /* ===================================== */
        /* NEW: Section divider decorative line  */
        /* ===================================== */
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(212, 180, 120, 0.4) 50%, transparent 100%);
        }

        /* ===================================== */
        /* NEW: Hero bottom gold line            */
        /* ===================================== */
        .hero-gold-line {
            position: absolute;
            bottom: 0;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(212, 180, 120, 0.6) 30%, rgba(212, 180, 120, 0.8) 50%, rgba(212, 180, 120, 0.6) 70%, transparent 100%);
        }

        /* ===================================== */
        /* NEW: ICP card hover background reveal */
        /* ===================================== */
        .icp-image-reveal {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.5s ease;
            overflow: hidden;
            border-radius: inherit;
        }

        .icp-image-reveal img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.15;
            transition: transform 0.7s ease;
        }

        .icp-reveal-trigger:hover .icp-image-reveal {
            opacity: 1;
        }

        .icp-reveal-trigger:hover .icp-image-reveal img {
            transform: scale(1.05);
        }

        /* ===================================== */
        /* NEW: Popular / recommended ribbon     */
        /* ===================================== */
        .ribbon-popular {
            position: absolute;
            top: 12px;
            right: -8px;
            z-index: 20;
        }

        .ribbon-popular span {
            display: inline-block;
            padding: 4px 16px;
            background: #d4b478;
            color: #0f203d;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            border-radius: 4px 0 0 4px;
            box-shadow: 0 2px 8px rgba(212, 180, 120, 0.3);
        }

        .ribbon-popular span::after {
            content: '';
            position: absolute;
            top: 100%;
            right: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 8px 6px 0;
            border-color: transparent #a8893c transparent transparent;
        }

        /* ===================================== */
        /* NEW: Blockquote gold accent bar       */
        /* ===================================== */
        .quote-gold-accent {
            border-left: 3px solid #d4b478;
            padding-left: 1rem;
            transition: box-shadow 0.3s ease;
        }

        .quote-gold-accent:hover {
            box-shadow: -8px 0 20px -10px rgba(212, 180, 120, 0.3);
        }

        /* ===================================== */
        /* NEW: Floating orb (large decorative)  */
        /* ===================================== */
        .float-orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        /* ===================================== */
        /* NEW: Gold dot pattern behind headings */
        /* ===================================== */
        .gold-dot-pattern {
            background-image: radial-gradient(circle, #d4b478 1px, transparent 1px);
            background-size: 16px 16px;
        }

        /* ===================================== */
        /* Reduced motion                       */
        /* ===================================== */
        @media (prefers-reduced-motion: reduce) {

            .animate-float,
            .animate-float-slow,
            .animate-fade-in-up,
            .animate-pulse-glow,
            .animate-shimmer,
            .animate-gold-pulse {
                animation: none !important;
                opacity: 1 !important;
                transform: none !important;
            }

            .stagger-1,
            .stagger-2,
            .stagger-3,
            .stagger-4,
            .stagger-5,
            .stagger-6,
            .stagger-7,
            .stagger-8 {
                opacity: 1 !important;
                animation: none !important;
            }
        }

        /* ===================================== */
        /* ICP CARD THEME OVERRIDES              */
        /* ===================================== */

        /* The Authority — gold-warm card body */
        .icp-card-authority {
            background-color: #faf5e8 !important;
        }

        /* The Legacy — dark navy card body */
        .icp-card-legacy {
            background-color: #0f203d !important;
        }

        /* ===================================== */
        /* ACCORDION (Experience & Revenue)      */
        /* ===================================== */

        /* Remove default <details>/<summary> marker */
        .icp-accordion details,
        .icp-accordion summary {
            list-style: none;
        }

        .icp-accordion summary::-webkit-details-marker {
            display: none;
        }

        .icp-accordion summary::marker {
            display: none;
            content: '';
        }

        /* Accordion trigger row */
        .icp-accordion-trigger {
            display: flex;
            align-items: center;
            gap: 0.375rem;
            cursor: pointer;
            padding: 0.25rem 0;
            color: #d4b478;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            user-select: none;
            transition: opacity 0.2s ease;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
        }

        .icp-accordion-trigger:hover {
            opacity: 0.8;
        }

        /* Chevron icon inside trigger */
        .icp-chevron {
            width: 12px;
            height: 12px;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        details[open] .icp-chevron {
            transform: rotate(180deg);
        }

        /* Expanded content */
        .icp-accordion-content {
            padding: 0.25rem 0 0.5rem 0;
        }

        /* ===================================== */
        /* NEW: Portal Cards (Three Doorways)    */
        /* ===================================== */
        .portal-card {
            position: relative;
            border-radius: 100px 100px 16px 16px / 40px 40px 16px 16px;
            background: rgba(250, 248, 245, 0.03);
            border: 1px solid rgba(212, 180, 120, 0.12);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .portal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(212, 180, 120, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .portal-card:hover {
            background: rgba(250, 248, 245, 0.07);
            border-color: rgba(212, 180, 120, 0.3);
            box-shadow: 0 0 40px rgba(212, 180, 120, 0.1), inset 0 0 60px rgba(212, 180, 120, 0.03);
            transform: translateY(-6px);
        }

        .portal-card:hover::before {
            opacity: 1;
        }

        .portal-icon-ring {
            position: relative;
            width: 56px;
            height: 56px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portal-icon-ring::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            border: 1px solid rgba(212, 180, 120, 0.15);
            transition: all 0.4s ease;
        }

        .portal-card:hover .portal-icon-ring::before {
            inset: -8px;
            border-color: rgba(212, 180, 120, 0.3);
            box-shadow: 0 0 20px rgba(212, 180, 120, 0.1);
        }

        .portal-path-line {
            position: absolute;
            bottom: 24px;
            left: 15%;
            right: 15%;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(212, 180, 120, 0.15) 20%, rgba(212, 180, 120, 0.2) 50%, rgba(212, 180, 120, 0.15) 80%, transparent 100%);
            pointer-events: none;
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

            <!-- SVG diamond pattern overlay (like about-joana credentials) -->
            <div class="absolute inset-0 opacity-[0.03] diamond-pattern"></div>

            <!-- Large floating orbs for ambient depth -->
            <div class="float-orb w-64 h-64 bg-[#d4b478]/5 rounded-full blur-[80px] animate-float-slow"
                style="top: 15%; right: 5%; animation-duration: 12s;"></div>
            <div class="float-orb w-48 h-48 bg-[#d4b478]/5 rounded-full blur-[60px] animate-float-slow"
                style="bottom: 10%; left: 8%; animation-duration: 15s; animation-delay: 2s;"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <!-- Decorative gold line at bottom of hero -->
            <div class="hero-gold-line"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="max-w-4xl mx-auto text-center">
                    <!-- Badge -->
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8 animate-fade-in-up">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-gold-pulse"></span>
                        The Influence Path
                    </span>

                    <!-- H1 -->
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight mb-8 animate-fade-in-up stagger-1">
                        The Key To Your Authority
                        <span class="text-[#d4b478] block mt-2">Is Your Authenticity.</span>
                    </h1>

                    <!-- Description -->
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto mb-16 animate-fade-in-up stagger-2">
                        For Speakers, Leaders and Legacy-Builders: Turn your lived experience into a message people trust and follow.
                    </p>

                    <div class="relative grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto animate-fade-in-up stagger-3">
                        <!-- Connecting path line -->
                        <div class="portal-path-line hidden md:block"></div>

                        <!-- Portal 1: The Speaker -->
                        <div class="portal-card px-6 py-8 text-center group">
                            <!-- Number watermark -->
                            <span class="absolute top-3 left-1/2 -translate-x-1/2 text-7xl md:text-8xl font-serif text-[#d4b478]/[0.06] leading-none pointer-events-none select-none">01</span>
                            
                            <!-- Floating icon -->
                            <div class="portal-icon-ring mb-5 relative z-10">
                                <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center border border-[#d4b478]/20 relative z-10">
                                    <svg class="w-5 h-5 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                                        <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                                        <line x1="12" y1="19" x2="12" y2="23"></line>
                                        <line x1="8" y1="23" x2="16" y2="23"></line>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="font-serif text-xl text-[#faf8f5] mb-2 relative z-10">The Speaker</h3>
                            <p class="text-[#faf8f5]/50 text-sm italic leading-relaxed mb-6 relative z-10">
                                "I don't know what to say."
                            </p>
                            
                            <a href="/icp-path/?icp=speaker"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all text-sm group/btn relative z-10">
                                Find My Message
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>

                        <!-- Portal 2: The Authority -->
                        <div class="portal-card px-6 py-8 text-center group relative">
                            <!-- Most Popular badge -->
                            <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20">
                                <span class="bg-[#d4b478] text-[#0f203d] text-[0.6rem] font-bold tracking-[0.15em] uppercase px-3 py-1 rounded-full shadow-lg shadow-[#d4b478]/20">
                                    Most Popular
                                </span>
                            </div>

                            <!-- Number watermark -->
                            <span class="absolute top-3 left-1/2 -translate-x-1/2 text-7xl md:text-8xl font-serif text-[#d4b478]/[0.06] leading-none pointer-events-none select-none">02</span>
                            
                            <!-- Floating icon -->
                            <div class="portal-icon-ring mb-5 relative z-10">
                                <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center border border-[#d4b478]/20 relative z-10">
                                    <svg class="w-5 h-5 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="font-serif text-xl text-[#faf8f5] mb-2 relative z-10">The Authority</h3>
                            <p class="text-[#faf8f5]/50 text-sm italic leading-relaxed mb-6 relative z-10">
                                "I need a better message."
                            </p>
                            
                            <a href="/icp-path/?icp=authority"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all text-sm group/btn relative z-10">
                                Build My Talk
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>

                        <!-- Portal 3: The Legacy -->
                        <div class="portal-card px-6 py-8 text-center group">
                            <!-- Number watermark -->
                            <span class="absolute top-3 left-1/2 -translate-x-1/2 text-7xl md:text-8xl font-serif text-[#d4b478]/[0.06] leading-none pointer-events-none select-none">03</span>
                            
                            <!-- Floating icon -->
                            <div class="portal-icon-ring mb-5 relative z-10">
                                <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center border border-[#d4b478]/20 relative z-10">
                                    <svg class="w-5 h-5 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="font-serif text-xl text-[#faf8f5] mb-2 relative z-10">The Legacy</h3>
                            <p class="text-[#faf8f5]/50 text-sm italic leading-relaxed mb-6 relative z-10">
                                "I need more confidence."
                            </p>
                            
                            <a href="/icp-path/?icp=legacy"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all text-sm group/btn relative z-10">
                                Private Training
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 3: FRAMEWORK — "What's Actually Happening"             -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <!-- Decorative blur circle behind layout -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

            <!-- Large floating orb -->
            <div class="float-orb w-56 h-56 bg-[#d4b478]/5 rounded-full blur-[70px] animate-float-slow"
                style="top: 10%; left: 5%; animation-duration: 14s; animation-delay: 1s;"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        The Framework
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">What’s The Problem?</h2>
                </div>

                <!-- 4-column grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Card 1: Disconnected -->
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift corner-accent">
                        <!-- Top-left corner accent -->
                        <div class="absolute top-3 left-3 w-1.5 h-1.5 bg-[#d4b478]/40 rounded-full"></div>
                        <!-- Icon glow -->
                        <div class="icon-glow w-14 h-14 mx-auto mb-5 flex items-center justify-center">
                            <div class="absolute inset-0 bg-[#d4b478]/5 rounded-full blur-md opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            <svg class="w-12 h-12 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                            </svg>
                        </div>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Disconnected</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You speak without connection to your lived truth.</p>
                    </div>

                    <!-- Card 2: Something Missing -->
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift corner-accent">
                        <div class="absolute top-3 left-3 w-1.5 h-1.5 bg-[#d4b478]/40 rounded-full"></div>
                        <div class="icon-glow w-14 h-14 mx-auto mb-5 flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                <line x1="11" y1="8" x2="11" y2="14"></line>
                                <line x1="8" y1="11" x2="14" y2="11"></line>
                            </svg>
                        </div>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Something Missing</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">It sounds right, but something is missing.</p>
                    </div>

                    <!-- Card 3: Leaning on Strategy -->
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift corner-accent">
                        <div class="absolute top-3 left-3 w-1.5 h-1.5 bg-[#d4b478]/40 rounded-full"></div>
                        <div class="icon-glow w-14 h-14 mx-auto mb-5 flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="9" y1="13" x2="15" y2="13"></line>
                                <line x1="9" y1="17" x2="13" y2="17"></line>
                            </svg>
                        </div>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Leaning on Strategy</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You lean on structure and performance to carry it.</p>
                    </div>

                    <!-- Card 4: Not Seen -->
                    <div class="relative bg-white rounded-2xl p-8 shadow-lg border border-[#d4b478]/10 text-center hover:shadow-xl hover:border-[#d4b478]/30 transition-all duration-300 card-lift corner-accent">
                        <div class="absolute top-3 left-3 w-1.5 h-1.5 bg-[#d4b478]/40 rounded-full"></div>
                        <div class="icon-glow w-14 h-14 mx-auto mb-5 flex items-center justify-center">
                            <svg class="w-12 h-12 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3 class="font-serif text-xl text-[#0f203d] mb-3">Not Seen</h3>
                        <p class="text-[#0f203d]/70 text-sm leading-relaxed">You show up, but you don't stand out.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section divider -->
        <div class="section-divider"></div>

        <!-- ============================================================ -->
        <!-- SECTION 4: WHY IT MATTERS — DARK NAVY BG WITH PARTICLES        -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <!-- Decorative blurs -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

            <!-- Additional decorative blur circles behind the grid -->
            <div class="absolute top-1/3 left-1/4 w-64 h-64 bg-[#d4b478]/5 rounded-full blur-[90px]"></div>
            <div class="absolute bottom-1/3 right-1/4 w-72 h-72 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

            <!-- Large floating orbs -->
            <div class="float-orb w-72 h-72 bg-[#d4b478]/5 rounded-full blur-[90px] animate-float-slow"
                style="top: 5%; left: 10%; animation-duration: 16s;"></div>
            <div class="float-orb w-52 h-52 bg-[#d4b478]/5 rounded-full blur-[70px] animate-float-slow"
                style="bottom: 5%; right: 8%; animation-duration: 13s; animation-delay: 3s;"></div>

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
                    <!-- Gold dot pattern behind section title -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-0 w-40 h-40 gold-dot-pattern opacity-[0.15] pointer-events-none"></div>
                    <div class="relative">
                        <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">Why This Matters</h2>
                        <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
                            The story behind your solution creates trust.
                        </p>
                    </div>
                </div>

                <!-- Outcome cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 max-w-6xl mx-auto">
                    <!-- Card 1: Emotional Weight -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 gold-border-glow">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4 icon-glow icon-glow-static">
                            <svg class="w-6 h-6 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Emotional Weight</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">Your message carries feeling.</p>
                    </div>

                    <!-- Card 2: Credibility -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 gold-border-glow">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4 icon-glow icon-glow-static">
                            <svg class="w-6 h-6 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Credibility</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">They believe what you say.</p>
                    </div>

                    <!-- Card 3: Authority -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 gold-border-glow">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4 icon-glow icon-glow-static">
                            <svg class="w-6 h-6 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Authority</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">You lead with confidence.</p>
                    </div>

                    <!-- Card 4: Differentiation -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 gold-border-glow">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4 icon-glow icon-glow-static">
                            <svg class="w-6 h-6 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M8 12l2 2 4-4"></path>
                            </svg>
                        </div>
                        <strong class="block text-[#d4b478] font-serif text-lg mb-2">Differentiation</strong>
                        <p class="text-[#faf8f5]/70 text-sm leading-relaxed">You stand out in your market.</p>
                    </div>

                    <!-- Card 5: Trust (full width on mobile, spans normally on desktop) -->
                    <div class="bg-[#faf8f5]/5 border border-[#d4b478]/10 rounded-xl p-6 text-center card-lift hover:bg-[#faf8f5]/10 transition-all duration-300 gold-border-glow sm:col-span-2 lg:col-span-1">
                        <div class="w-12 h-12 bg-[#d4b478]/10 rounded-full flex items-center justify-center mx-auto mb-4 icon-glow icon-glow-static">
                            <svg class="w-6 h-6 text-[#d4b478] relative z-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
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

        <!-- Section divider -->
        <div class="section-divider"></div>

        <!-- ============================================================ -->
        <!-- SECTION 5A: THE SPEAKER — "Emergence"                         -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 lg:py-40 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden"
            style="background-image: radial-gradient(circle at 10% 20%, rgba(212,180,120,0.06) 0%, transparent 50%), radial-gradient(circle at 90% 80%, rgba(212,180,120,0.04) 0%, transparent 50%);">

            <!-- Floating orb -->
            <div class="float-orb w-60 h-60 bg-[#d4b478]/5 rounded-full blur-[80px] animate-float-slow"
                style="top: 15%; right: 5%; animation-duration: 15s; animation-delay: 1s;"></div>

            <!-- Small gold particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute w-2 h-2 bg-[#d4b478]/20 rounded-full animate-float" style="left: 8%; top: 25%; animation-delay: 0s; animation-duration: 7s;"></div>
                <div class="absolute w-1.5 h-1.5 bg-[#d4b478]/30 rounded-full animate-float" style="left: 92%; top: 35%; animation-delay: 1.5s; animation-duration: 8s;"></div>
                <div class="absolute w-2 h-2 bg-[#d4b478]/25 rounded-full animate-float" style="left: 75%; top: 70%; animation-delay: 3s; animation-duration: 6s;"></div>
                <div class="absolute w-1 h-1 bg-[#d4b478]/20 rounded-full animate-float" style="left: 15%; top: 80%; animation-delay: 2s; animation-duration: 9s;"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center max-w-7xl mx-auto px-6 relative z-10">
                <!-- Left: Image -->
                <div class="relative animate-fade-in-up stagger-1">
                    <div class="rounded-2xl overflow-hidden shadow-2xl shadow-[#0f203d]/10 border border-[#d4b478]/20 aspect-[4/5] relative">
                        <!-- Decorative gold corner accent -->
                        <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-[#d4b478]/40 rounded-tl-lg z-10 pointer-events-none"></div>
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img1.webp'); ?>"
                            alt="The Speaker"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                            loading="lazy" />
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="relative animate-fade-in-up stagger-2">
                    <!-- Giant watermark -->
                    <span class="absolute -top-12 -right-8 text-[10rem] md:text-[14rem] font-serif text-[#d4b478]/[0.04] leading-none pointer-events-none select-none">01</span>

                    <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">Path 01</span>
                    <h3 class="font-serif text-4xl md:text-5xl text-[#0f203d] mt-2 mb-1">The Speaker</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4 mt-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Experience: 3–8 years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Revenue: $100K–$500K</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed quote-gold-accent">
                        "I know I have something to say, but I can't clearly say what defines me yet."
                    </blockquote>

                    <div class="space-y-3 mb-8">
                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#0f203d]/80">Clarity on what defines you and why it matters.</span>
                            </li>
                        </ul>

                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#0f203d]/80">A message you can say in one sentence.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=speaker"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn">
                        Find My Message
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- Section divider -->
        <!-- <div class="section-divider"></div> -->

        <!-- ============================================================ -->
        <!-- SECTION 5B: THE AUTHORITY — "The Golden Path"                 -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 lg:py-40 bg-[#faf5e8] text-[#0f203d] relative overflow-hidden gold-dot-pattern"
            style="background-size: 16px 16px;">
            <div class="absolute inset-0 bg-[#faf5e8]/[0.96]" style="background-size: 16px 16px;"></div>

            <!-- Floating orb -->
            <div class="float-orb w-60 h-60 bg-[#d4b478]/5 rounded-full blur-[80px] animate-float-slow"
                style="bottom: 10%; left: 5%; animation-duration: 14s; animation-delay: 2s;"></div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center max-w-7xl mx-auto px-6 relative z-10">
                <!-- Content (Left on desktop) -->
                <div class="relative animate-fade-in-up stagger-1 lg:order-first order-2">
                    <!-- Giant watermark -->
                    <span class="absolute -top-12 -left-8 text-[10rem] md:text-[14rem] font-serif text-[#d4b478]/[0.06] leading-none pointer-events-none select-none">02</span>

                    <!-- Premium "Most Popular" badge -->
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/15 border border-[#d4b478]/30 rounded-full px-4 py-1.5 mb-4">
                        <svg class="w-4 h-4 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.15em] uppercase">Most Popular</span>
                    </div>

                    <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block">Path 02</span>
                    <h3 class="font-serif text-4xl md:text-5xl text-[#0f203d] mt-2 mb-1">The Authority</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4 mt-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Experience: 10–20 years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Revenue: $500K–$5M+</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed quote-gold-accent">
                        "I know my work, but I over-explain it when it matters most."
                    </blockquote>

                    <div class="space-y-3 mb-8">
                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#0f203d]/80">A structured message that lands.</span>
                            </li>
                        </ul>

                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#0f203d]/80">A signature talk aligned to your work.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=authority"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn">
                        Build My Talk
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Image (Right on desktop) -->
                <div class="relative animate-fade-in-up stagger-2 lg:order-last order-1">
                    <div class="bg-white p-3 rounded-2xl shadow-xl shadow-[#0f203d]/10">
                        <div class="rounded-xl overflow-hidden ring-1 ring-[#d4b478]/20 aspect-[4/5]">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img2.webp'); ?>"
                                alt="The Authority"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-700"
                                loading="lazy" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section divider -->
        <div class="section-divider"></div>

        <!-- ============================================================ -->
        <!-- SECTION 5C: THE LEGACY — "The Monument"                       -->
        <!-- ============================================================ -->
        <section class="bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[80vh] items-center">
                <!-- Image (Top on mobile, Right on desktop) -->
                <div class="relative h-full min-h-[400px] lg:min-h-full lg:order-last animate-fade-in-up stagger-1">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img4.webp'); ?>"
                        alt="The Legacy"
                        class="absolute inset-0 w-full h-full object-cover"
                        loading="lazy" />
                    <!-- Gradient overlay fading into content on desktop -->
                    <div class="absolute inset-0 bg-gradient-to-r from-[#0f203d] via-[#0f203d]/80 to-transparent hidden lg:block"></div>
                    <!-- Mobile gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] via-transparent to-transparent lg:hidden"></div>
                </div>

                <!-- Content (Bottom on mobile, Left on desktop) -->
                <div class="relative px-6 lg:px-16 py-24 animate-fade-in-up stagger-2">
                    <!-- Giant watermark -->
                    <span class="absolute -top-12 -right-4 text-[10rem] md:text-[14rem] font-serif text-[#d4b478]/[0.03] leading-none pointer-events-none select-none">03</span>

                    <!-- Floating particles -->
                    <div class="absolute inset-0 overflow-hidden pointer-events-none">
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                                style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                            </div>
                        <?php endfor; ?>
                    </div>

                    <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">Path 03</span>
                    <h3 class="font-serif text-4xl md:text-5xl text-[#d4b478] mt-2 mb-1">The Legacy</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4 mt-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#faf8f5]/80">Experience: 20+ years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#faf8f5]/80">Revenue: $5M–$25M+</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed quote-gold-accent">
                        "I've built something significant, but I'm not clearly known for what I do differently."
                    </blockquote>

                    <div class="space-y-3 mb-8">
                        <p class="text-[#d4b478] text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#faf8f5]/80">A distinct, repeatable point of view.</span>
                            </li>
                        </ul>

                        <p class="text-[#d4b478] text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                <span class="text-sm text-[#faf8f5]/80">A blueprint people can build on after you.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=legacy"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn">
                        Private Training
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 6: NOT SURE CTA — FULL-WIDTH BG (like cta-section)    -->
        <!-- ============================================================ -->
        <section class="py-24 md:py-32 text-center relative overflow-hidden">
            <!-- Background image with gradient overlay (matching cta-section.php) -->
            <div class="absolute inset-0">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img4.webp'); ?>"
                    alt=""
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
            </div>

            <!-- Large decorative blur (matching cta-section.php scale) -->
            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
            </div>

            <!-- Floating orbs for ambient depth -->
            <div class="float-orb w-56 h-56 bg-[#d4b478]/5 rounded-full blur-[70px] animate-float-slow"
                style="top: 5%; left: 5%; animation-duration: 16s;"></div>
            <div class="float-orb w-40 h-40 bg-[#d4b478]/5 rounded-full blur-[50px] animate-float-slow"
                style="bottom: 10%; right: 8%; animation-duration: 12s; animation-delay: 2s;"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <!-- Decorative icon: compass (path-finding) -->
                <div class="mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]/30 mx-auto">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                    </svg>
                </div>

                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">
                    Take Our Quiz
                </h2>

                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-12 max-w-2xl mx-auto">
                    Take the 5-minute Influence Path Assessment and see exactly where your voice and leadership stopped matching.
                </p>

                <!-- Solid gold CTA button (matching cta-section.php style) -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/icp-quiz/"
                        class="group px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 relative overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            Find My Path
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </span>
                    </a>
                </div>

                <!-- Trust indicators (matching cta-section.php style) -->
                <div class="mt-16 flex items-center justify-center gap-8 flex-wrap">
                    <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        Free assessment
                    </div>
                    <div class="w-1 h-1 bg-[#faf8f5]/20 rounded-full"></div>
                    <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        5 minutes
                    </div>
                    <div class="w-1 h-1 bg-[#faf8f5]/20 rounded-full"></div>
                    <div class="flex items-center gap-2 text-[#faf8f5]/60 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        Instant results
                    </div>
                </div>
            </div>
        </section>

    </div><!-- /overflow-x-hidden -->

    <?php get_footer(); ?>
</body>

</html>