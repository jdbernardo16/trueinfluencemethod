<?php

/**
 * Template Name: ICP Product Page
 * Description: Product detail page for the Influence Path ICP system. Reads ?product= and ?icp= from URL.
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
        /* ================================================================
           BASE ANIMATIONS
           ================================================================ */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes float-slow {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.05); }
            66% { transform: translate(-20px, 20px) scale(0.95); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(212, 180, 120, 0.3); }
            50% { box-shadow: 0 0 40px rgba(212, 180, 120, 0.5); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        @keyframes breathe {
            0%, 100% { opacity: 0.03; }
            50% { opacity: 0.07; }
        }

        /* ================================================================
           FLOATING ELEMENTS
           ================================================================ */
        .animate-float {
            animation: float var(--duration, 8s) ease-in-out infinite;
        }

        .floating-slow {
            animation: float-slow 20s ease-in-out infinite;
        }

        .floating-slow-2 {
            animation: float-slow 25s ease-in-out infinite reverse;
        }

        .watermark-breathe {
            animation: breathe 6s ease-in-out infinite;
        }

        /* ================================================================
           FAQ ACCORDION
           ================================================================ */
        .faq-answer {
            display: none;
        }
        .open .faq-answer {
            display: block;
        }
        .open .faq-chevron {
            transform: rotate(180deg);
        }
        .faq-chevron {
            transition: transform 0.3s ease;
        }

        /* FAQ item left border on open state */
        #faqList > div.open {
            border-left: 3px solid #d4b478 !important;
        }

        /* FAQ answer fade-in */
        .faq-answer {
            transition: opacity 0.3s ease-in-out;
        }
        .open .faq-answer {
            animation: fadeInUp 0.3s ease-out forwards;
        }

        /* FAQ question hover */
        #faqList button:hover {
            background: rgba(212, 180, 120, 0.04);
        }

        /* ================================================================
           SMOOTH SCROLL
           ================================================================ */
        html {
            scroll-behavior: smooth;
        }

        /* ================================================================
           CARD LIFT HOVER
           ================================================================ */
        .card-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-lift:hover {
            transform: translateY(-4px);
        }

        /* ================================================================
           GOLD LEFT ACCENT BAR ON CARDS
           ================================================================ */
        .card-accent {
            position: relative;
        }
        .card-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #d4b478, #e8a838);
            border-radius: 4px 0 0 4px;
        }

        /* ================================================================
           STAGGER ANIMATIONS
           ================================================================ */
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .stagger-1 { animation-delay: 0.1s; opacity: 0; }
        .stagger-2 { animation-delay: 0.2s; opacity: 0; }
        .stagger-3 { animation-delay: 0.3s; opacity: 0; }

        /* ================================================================
           SIDEBAR STICKY OFFSET
           ================================================================ */
        .sticky-top-24 {
            position: sticky;
            top: 6rem;
        }
        @media (max-width: 1023px) {
            .sticky-top-24 {
                position: static;
            }
        }

        /* ================================================================
           CTA GLOW EFFECT
           ================================================================ */
        .cta-glow {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .cta-glow:hover {
            box-shadow: 0 0 25px rgba(212, 180, 120, 0.4), 0 0 50px rgba(212, 180, 120, 0.15);
            transform: translateY(-1px);
        }
        .cta-glow:active {
            transform: translateY(0);
        }

        /* ================================================================
           HERO GOLD GRADIENT LINE
           ================================================================ */
        .hero-gold-line {
            height: 3px;
            width: 100%;
            background: linear-gradient(to right, transparent, #d4b478, #e8a838, #d4b478, transparent);
        }

        /* ================================================================
           ICP FIT BADGE ENHANCEMENTS
           ================================================================ */
        #icpFit > span {
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }
        #icpFit > span:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* ================================================================
           LIST ITEM HOVER
           ================================================================ */
        .list-hover li {
            transition: all 0.2s ease;
            padding: 0.5rem 0.5rem;
            border-radius: 0.5rem;
            margin-left: -0.5rem;
        }
        .list-hover li:hover {
            background: rgba(212, 180, 120, 0.06);
            padding-left: 0.75rem;
        }

        /* ================================================================
           NOT-FOR WARNING ENHANCEMENTS
           ================================================================ */
        .not-for-warning {
            position: relative;
            overflow: hidden;
        }
        .not-for-warning::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, #ef4444, #dc2626);
            border-radius: 3px 0 0 3px;
        }

        /* ================================================================
           SIDEBAR GOLD TOP ACCENT
           ================================================================ */
        .sidebar-accent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            width: 80%;
            height: 3px;
            background: linear-gradient(to right, transparent, #d4b478, #e8a838, #d4b478, transparent);
            border-radius: 0 0 3px 3px;
        }

        /* ================================================================
           DECORATIVE SECTION DIVIDER
           ================================================================ */
        .section-divider {
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(212, 180, 120, 0.25), transparent);
        }

        /* ================================================================
           DECORATIVE SVG PATTERN OVERLAY
           ================================================================ */
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4b478' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            background-repeat: repeat;
        }

        /* WCAG / reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-float,
            .floating-slow,
            .floating-slow-2,
            .watermark-breathe,
            .cta-glow,
            .card-lift,
            .animate-fade-in-up,
            .faq-chevron {
                animation: none !important;
                transition: none !important;
            }
            .cta-glow:hover {
                transform: none !important;
            }
            .card-lift:hover {
                transform: none !important;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">

        <!-- ============================================================ -->
        <!-- SECTION 1: BREADCRUMB + PRODUCT HEADER (DARK NAVY BG)           -->
        <!-- ============================================================ -->
        <section class="relative py-24 md:py-32 bg-[#0f203d] overflow-hidden">
            <!-- SVG pattern overlay -->
            <div class="hero-pattern absolute inset-0 opacity-50"></div>

            <!-- Decorative blurs -->
            <div class="absolute top-20 right-10 w-96 h-96 bg-[#d4b478]/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-20 left-10 w-72 h-72 bg-[#0f203d]/50 rounded-full blur-[100px]"></div>

            <!-- Watermark logo -->
            <div class="watermark-breathe absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] opacity-[0.035] pointer-events-none select-none">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icononly_transparent_nobuffer.png"
                     alt="" aria-hidden="true"
                     class="w-full h-full object-contain">
            </div>

            <!-- Ambient slow-floating circles -->
            <div class="floating-slow absolute top-[15%] right-[20%] w-64 h-64 bg-[#d4b478]/5 rounded-full blur-[80px]"></div>
            <div class="floating-slow-2 absolute bottom-[20%] left-[15%] w-48 h-48 bg-[#e8a838]/5 rounded-full blur-[70px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <!-- Breadcrumb -->
                <div class="text-sm text-[#faf8f5]/50 mb-6">
                    <a href="/icp/" class="text-[#d4b478] hover:text-[#e8a838] transition-colors">Home</a>
                    <span class="mx-2 text-[#faf8f5]/30">/</span>
                    <a id="breadcrumbPath" href="#" class="text-[#d4b478] hover:text-[#e8a838] transition-colors">My Path</a>
                    <span class="mx-2 text-[#faf8f5]/30">/</span>
                    <span id="breadcrumbProduct" class="text-[#faf8f5]/60">Product</span>
                </div>

                <!-- Product Title & Price -->
                <h1 id="prodTitle" class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-3"></h1>
                <div id="prodPrice" class="text-[#d4b478] font-bold text-2xl mb-2"></div>
                <p id="prodSub" class="text-[#faf8f5]/60 text-lg"></p>

                <!-- ICP Fit Badges -->
                <div id="icpFit" class="flex flex-wrap gap-3 mt-6"></div>
            </div>

            <!-- Gold gradient line at bottom -->
            <div class="hero-gold-line absolute bottom-0 left-0"></div>
        </section>

        <!-- ============================================================ -->
        <!-- SECTION 2: MAIN CONTENT + SIDEBAR (CREAM BG)                   -->
        <!-- ============================================================ -->
        <section class="relative bg-[#faf8f5]">
            <!-- Blur element behind section (like philosophy section) -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#0f203d]/[0.03] rounded-full blur-[100px] pointer-events-none"></div>

            <!-- Decorative section divider (top) -->
            <div class="section-divider absolute top-0 left-1/4 w-1/2"></div>

            <div class="max-w-6xl mx-auto px-6 py-24 relative z-10">
                <div class="grid lg:grid-cols-3 gap-10">
                    <!-- Main Content (2 cols) -->
                    <div class="lg:col-span-2 space-y-10">

                        <!-- What This Is -->
                        <div class="card-accent bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift">
                            <h2 class="font-serif text-2xl text-[#0f203d] mb-4 pb-3 border-b border-[#0f203d]/10">What This Is</h2>
                            <p id="prodDescription" class="text-[#0f203d]/70 text-lg leading-relaxed"></p>
                        </div>

                        <!-- What You Build -->
                        <div class="card-accent bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift">
                            <h2 class="font-serif text-2xl text-[#0f203d] mb-4 pb-3 border-b border-[#0f203d]/10">What You Build</h2>
                            <ul id="prodBuild" class="space-y-3 list-hover"></ul>
                        </div>

                        <!-- What You Get -->
                        <div class="card-accent bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift">
                            <h2 class="font-serif text-2xl text-[#0f203d] mb-4 pb-3 border-b border-[#0f203d]/10">What You Get</h2>
                            <ul id="prodGet" class="space-y-3 list-hover"></ul>
                        </div>

                        <!-- Who This Is For -->
                        <div class="card-accent bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift">
                            <h2 class="font-serif text-2xl text-[#0f203d] mb-4 pb-3 border-b border-[#0f203d]/10">Who This Is For</h2>
                            <ul id="prodFor" class="space-y-3 list-hover"></ul>
                        </div>

                        <!-- FAQ -->
                        <div class="card-accent bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift">
                            <h2 class="font-serif text-2xl text-[#0f203d] mb-6 pb-3 border-b border-[#0f203d]/10">Frequently Asked Questions</h2>
                            <div id="faqList" class="space-y-4"></div>
                        </div>

                    </div>

                    <!-- Sidebar (1 col) -->
                    <div class="lg:col-span-1">
                        <div class="sidebar-accent sticky-top-24 bg-white rounded-2xl shadow-lg p-8 border border-[#d4b478]/10 card-lift relative">
                            <div class="text-center">
                                <div id="sidePrice" class="font-serif text-3xl text-[#0f203d] font-bold"></div>
                                <div id="sideValue" class="text-sm text-green-600 bg-green-50 inline-block px-3 py-1 rounded-full mt-2 mb-6"></div>
                                <a id="checkoutBtn" href="#" class="cta-glow block w-full px-6 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 text-center">Buy Now</a>
                                <p class="text-xs text-[#0f203d]/40 mt-3">Risk-free. Full refund within 14 days if it's not the right fit.</p>

                                <!-- Not-for warning -->
                                <div id="notForWarning" class="not-for-warning hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-xl text-left pl-6">
                                    <strong class="block text-red-700 text-sm mb-1">⛔ May not be right for you</strong>
                                    <span id="notForReason" class="text-red-600 text-sm"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Decorative section divider (bottom) -->
                <div class="section-divider mt-16"></div>
            </div>
        </section>

    </div><!-- /overflow-x-hidden -->

    <?php get_footer(); ?>

    <script>
    const productData = {
        breakthrough: {
            title: 'Breakthrough Session',
            price: '$2,000',
            sub: 'One session to see clearly.',
            description: 'You bring what you\'ve been trying to say. We find what\'s actually true underneath it. In a single focused session, you move from explaining to knowing. You leave with clear direction, a sharper articulation of what you do, and immediate clarity on your next step.',
            build: ['The shift from explaining to knowing', 'What your voice sounds like when it\'s aligned'],
            get: ['Clear direction on your message', 'A sharper articulation of what you do', 'Immediate clarity on your next step'],
            for: ['ICP1: The Speaker — perfect starting point', 'ICP2: The Authority — quick clarity before a larger program', 'ICP3: The Legacy — not recommended (needs deeper work)'],
            icpFit: { speaker: 'good', authority: 'neutral', legacy: 'bad' },
            icpGood: 'Best for: The Speaker',
            icpBad: 'Not for: The Legacy — this is too basic for your stage',
            cta: 'Book Now',
            faq: [
                { q: 'Is this a coaching call or a strategy session?', a: 'It\'s both. Joanna guides you to uncover the truth underneath what you\'ve been trying to say. It\'s part coaching, part breakthrough.' },
                { q: 'What do I need to prepare?', a: 'Just bring what you\'ve been trying to say — notes, ideas, frustrations. Joanna will guide the rest.' },
                { q: 'What if I want to continue after?', a: 'Many clients book a 4-Session Training Package or Phase 1 after their Breakthrough Session.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout---breakthrough-session-page'
        },
        '4session': {
            title: '4-Session Training Package',
            price: '$8,000',
            sub: 'For leaders ready to build this with consistency.',
            description: 'Go deeper across four sessions. We work together to uncover and structure your message from the inside out. You build your defining moment, your deeper why, your first leadership message, and your unique differentiator.',
            build: ['Your defining moment — the moment that shaped your work', 'Your deeper why — a clear, concise statement', 'Your first leadership message — 1-2 sentences', 'Your unique differentiator'],
            get: ['A message you can actually say out loud', 'Clarity on what defines you and why it matters', 'Phase 1 foundation, done privately'],
            for: ['ICP1: The Speaker — ideal for deep foundational work', 'ICP2: The Authority — good if you want private refinement', 'ICP3: The Legacy — not recommended'],
            icpFit: { speaker: 'good', authority: 'neutral', legacy: 'bad' },
            icpGood: 'Best for: The Speaker',
            icpBad: 'Not for: The Legacy — this is foundational work',
            cta: 'Book Now',
            faq: [
                { q: 'How long is each session?', a: 'Each session is 60-90 minutes, scheduled weekly or bi-weekly.' },
                { q: 'Is this done in person or virtual?', a: 'Sessions are virtual via Zoom.' },
                { q: 'What is the difference between this and Phase 1?', a: 'This is private 1:1 work. Phase 1 is a group mastermind. Both cover the same foundational material.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout-4-session-training-package-325468'
        },
        phase1: {
            title: 'Phase 1: Tell Your Story — My Why',
            price: '$3,200',
            orig: '$12,000',
            sub: 'Join the 90-day Mastermind.',
            description: 'This is where you stop guessing how to explain yourself and understand what actually shaped your leadership. Over 90 days in a small cohort, you build your defining moment, deeper why, first leadership message, and unique differentiator.',
            build: ['Your defining moment — written and spoken', 'Your deeper why', 'Your first leadership message', 'Your unique differentiator'],
            get: ['A safe space to say your story for the first time', 'Peer feedback and refinement', 'A live 3-5 minute story share', 'Clarity of identity and voice', 'A message ready for public use'],
            for: ['ICP1: The Speaker — the core program for you', 'ICP2: The Authority — only if you lack foundational clarity', 'ICP3: The Legacy — not recommended'],
            icpFit: { speaker: 'good', authority: 'neutral', legacy: 'bad' },
            icpGood: 'Best for: The Speaker',
            icpBad: 'Not for: The Legacy — this is below your experience level',
            cta: 'Join the Program',
            faq: [
                { q: 'How many people are in the mastermind?', a: 'Cohorts are capped at 12 people to ensure depth and personal attention.' },
                { q: 'When do cohorts start?', a: 'New cohorts begin quarterly. The next one starts on the 15th of next month.' },
                { q: 'Is this live or recorded?', a: 'All sessions are live. You get access to recordings for review.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout-phase-1'
        },
        phase2: {
            title: 'Phase 2: Move the Room — My Signature Talk',
            price: '$12,000',
            orig: '$20,000',
            sub: 'Join the Speaker Cohort and take the stage.',
            description: 'Your story becomes a structured talk that moves people. Build a 7-minute signature talk, develop emotional connection points, and gain confidence in high-stakes speaking environments. Includes a retreat speaking opportunity and professional video.',
            build: ['A 7-minute signature talk', 'A clear problem-to-solution message', 'Emotional connection points', 'A defined call to action'],
            get: ['Live coaching with Joanna', 'Retreat speaking opportunity', 'Real-time feedback and refinement', 'Professional video and photos', 'Content for social and brand positioning'],
            for: ['ICP1: The Speaker — not yet (complete Phase 1 first)', 'ICP2: The Authority — the ideal program for you', 'ICP3: The Legacy — not recommended (you need legacy-level work)'],
            icpFit: { speaker: 'bad', authority: 'good', legacy: 'bad' },
            icpGood: 'Best for: The Authority',
            icpBad: 'Not for: The Speaker — complete Phase 1 first',
            cta: 'Take the Stage',
            faq: [
                { q: 'Do I need speaking experience?', a: 'You need foundational clarity (Phase 1 or equivalent). No professional speaking experience required.' },
                { q: 'When and where is the retreat?', a: 'The retreat is held twice a year at a resort in California. Dates are provided upon enrollment.' },
                { q: 'What if I can\'t attend the retreat?', a: 'You can join the next cohort. All sessions are also recorded.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout-phase-2'
        },
        phase3: {
            title: 'Phase 3: Master My Message — Keynote or TEDx Talk',
            price: '$25,000',
            orig: '$40,000',
            sub: 'Become known for something specific and valuable.',
            description: 'Your message becomes repeatable, distinct, and tied to your leadership. Build your thought leader perspective, your "special sauce," and a one-liner people can repeat. Includes speaker cohort training plus private sessions.',
            build: ['A refined, repeatable signature message', 'Your thought leader perspective', 'Your "special sauce" — what you do differently', 'A one-liner people can repeat'],
            get: ['Speaker cohort training + private sessions', 'Full speaking reel + 1-minute social clip', 'Professional video and photos', 'A message that stands out in your market'],
            for: ['ICP1: The Speaker — not yet', 'ICP2: The Authority — the advanced program for you', 'ICP3: The Legacy — not recommended (you need legacy-level work)'],
            icpFit: { speaker: 'bad', authority: 'good', legacy: 'bad' },
            icpGood: 'Best for: The Authority',
            icpBad: 'Not for: The Speaker — build your foundation first with Phase 1',
            cta: 'Create My Keynote',
            faq: [
                { q: 'Do I need a TEDx talk to join?', a: 'No. This program prepares you for a TEDx or keynote-level talk. Previous clients have gone on to speak at TEDx events.' },
                { q: 'How long is the program?', a: 'The program runs for 6 months with a mix of cohort sessions and private coaching.' },
                { q: 'What is the difference from Phase 2?', a: 'Phase 2 builds a 7-minute talk. Phase 3 creates a full keynote and positions you as a thought leader.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout-phase-3'
        },
        phase4: {
            title: 'Phase 4: Build My Team — Scaling Strategy',
            price: 'Starts at $250,000',
            sub: 'Your message becomes a system.',
            description: 'Your message is no longer just yours — it becomes a framework your entire team operates from. Build your leadership framework, a team communication system, and a mentorship structure based on your message.',
            build: ['Your leadership framework', 'A team communication system', 'A mentorship structure based on your message'],
            get: ['Psychological safety and trust inside your team', 'A repeatable system others can lead through', 'A business strategy to scale', 'A healed leadership model that drives performance'],
            for: ['ICP1: The Speaker — not applicable', 'ICP2: The Authority — only with prior Phases 1-3', 'ICP3: The Legacy — the right level for you'],
            icpFit: { speaker: 'bad', authority: 'neutral', legacy: 'good' },
            icpGood: 'Best for: The Legacy',
            icpBad: 'Not for: The Speaker — this requires years of leadership experience',
            cta: 'Schedule a Consultation',
            faq: [
                { q: 'Is this for me or for my whole team?', a: 'It starts with you and extends to your leadership team. We build the framework together.' },
                { q: 'How long does Phase 4 take?', a: 'Typically 6-12 months depending on your organization\'s size and complexity.' },
                { q: 'Do I need to complete Phases 1-3 first?', a: 'Not necessarily. We assess your current message clarity and build from there.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/checkout-phase-4'
        },
        phase5: {
            title: 'Phase 5: Be Remembered — Legacy Framework',
            price: 'Starts at $1,000,000',
            sub: 'Your work outlives you.',
            description: 'This is where your life\'s work becomes a blueprint for generations. Build your legacy blueprint, impact thesis, and succession plan. Align your voice, wealth, and long-term contribution.',
            build: ['Your legacy blueprint', 'Your impact thesis', 'Your succession plan'],
            get: ['A structure that continues beyond your lifetime', 'A body of work that defines your legacy', 'A clear plan for your long-term influence'],
            for: ['ICP1: The Speaker — not applicable', 'ICP2: The Authority — not yet', 'ICP3: The Legacy — the ultimate program for you'],
            icpFit: { speaker: 'bad', authority: 'bad', legacy: 'good' },
            icpGood: 'Best for: The Legacy',
            icpBad: 'Not for: The Speaker or Authority — this requires a lifetime of leadership',
            cta: 'Schedule a Consultation',
            faq: [
                { q: 'How is this different from estate planning?', a: 'This is about your intellectual and leadership legacy — the message, framework, and impact you leave behind.' },
                { q: 'How long does this engagement last?', a: 'Typically 12-18 months with ongoing advisory.' },
                { q: 'Can I do this alongside Phase 4?', a: 'Yes. Many Legacy clients run Phase 4 and Phase 5 in parallel.' }
            ],
            checkoutLink: 'https://go.trueinfluencemethod.com/phase-5-be-remembered-legacy-framework-page'
        },
        private: {
            title: 'Private Training',
            price: 'Custom',
            sub: 'Work privately with Joanna at the executive level.',
            description: 'This is where you stop circling what you\'re trying to say and start saying what is actually true. Private, customized coaching for established leaders who need advanced message positioning, differentiation, and legacy-level clarity.',
            build: ['Custom curriculum designed for your specific needs', 'Advanced message positioning', 'Market differentiation strategy', 'Legacy-level communication framework'],
            get: ['1:1 private coaching with Joanna', 'Custom curriculum tailored to your stage', 'Executive-level strategic messaging', 'Ongoing refinement and feedback'],
            for: ['ICP1: The Speaker — not applicable', 'ICP2: The Authority — if you need private, advanced work', 'ICP3: The Legacy — the recommended starting point'],
            icpFit: { speaker: 'bad', authority: 'neutral', legacy: 'good' },
            icpGood: 'Best for: The Legacy',
            icpBad: 'Not for: The Speaker — group programs provide better value at your stage',
            cta: 'Apply Now',
            faq: [
                { q: 'How is this different from the group programs?', a: 'Private Training is fully customized to your situation. No curriculum — just what you need.' },
                { q: 'How do we structure the engagement?', a: 'We start with a discovery session, then design a plan. Most clients work with Joanna for 3-6 months.' },
                { q: 'Is this confidential?', a: 'Absolutely. Everything we discuss is strictly confidential.' }
            ],
            checkoutLink: 'https://rest.gHL.com/order/____________________'
        }
    };

    const icpLabels = { speaker: 'The Speaker', authority: 'The Authority', legacy: 'The Legacy' };
    const icpFitText = { good: '✅ Best for you', neutral: '⚠️ Consider your fit', bad: '⛔ Not recommended for you' };

    function getParam(name) {
        var url = new URL(window.location.href);
        return url.searchParams.get(name);
    }

    function render() {
        var productKey = getParam('product') || 'breakthrough';
        var icpKey = getParam('icp') || 'speaker';
        var data = productData[productKey];

        if (!data) {
            document.getElementById('prodTitle').textContent = 'Product not found';
            document.getElementById('prodSub').textContent = 'Please go back and select a valid product.';
            return;
        }

        var icpName = icpLabels[icpKey] || 'You';

        // Breadcrumb
        document.getElementById('breadcrumbPath').href = '/icp-path/?icp=' + icpKey;
        document.getElementById('breadcrumbProduct').textContent = data.title;

        // Header
        document.getElementById('prodTitle').textContent = data.title;
        document.getElementById('prodPrice').textContent = data.price + (data.orig ? ' ' : '');
        document.getElementById('prodSub').textContent = data.sub;

        // ICP Fit badges
        var fitEl = document.getElementById('icpFit');
        fitEl.innerHTML = '';
        Object.keys(data.icpFit).forEach(function(icp) {
            var fit = data.icpFit[icp];
            var badge = document.createElement('span');
            badge.className = 'inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium ' +
                (fit === 'good' ? 'bg-green-50 text-green-700 border border-green-200' :
                 fit === 'bad' ? 'bg-red-50 text-red-700 border border-red-200' :
                 'bg-[#faf8f5]/10 text-[#faf8f5]/80 border border-[#faf8f5]/20');
            badge.textContent = icpFitText[fit] + ' — ' + icpLabels[icp];
            if (icp === icpKey) {
                badge.style.cssText = 'border: 2px solid #d4b478; background: rgba(212, 180, 120, 0.08);';
                badge.style.fontWeight = '700';
            }
            fitEl.appendChild(badge);
        });

        // Description
        document.getElementById('prodDescription').textContent = data.description;

        // Build list
        var buildEl = document.getElementById('prodBuild');
        buildEl.innerHTML = '';
        data.build.forEach(function(text) {
            var li = document.createElement('li');
            li.className = 'flex items-start gap-3';
            li.innerHTML = '<svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg><span class="text-[#0f203d]/70">' + text + '</span>';
            buildEl.appendChild(li);
        });

        // Get list
        var getEl = document.getElementById('prodGet');
        getEl.innerHTML = '';
        data.get.forEach(function(text) {
            var li = document.createElement('li');
            li.className = 'flex items-start gap-3';
            li.innerHTML = '<svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg><span class="text-[#0f203d]/70">' + text + '</span>';
            getEl.appendChild(li);
        });

        // For list
        var forEl = document.getElementById('prodFor');
        forEl.innerHTML = '';
        data.for.forEach(function(text) {
            var li = document.createElement('li');
            li.className = 'flex items-start gap-3';
            li.innerHTML = '<svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg><span class="text-[#0f203d]/70">' + text + '</span>';
            forEl.appendChild(li);
        });

        // FAQ accordion
        var faqEl = document.getElementById('faqList');
        faqEl.innerHTML = '';
        data.faq.forEach(function(item) {
            var faqItem = document.createElement('div');
            faqItem.className = 'bg-[#faf8f5] rounded-xl overflow-hidden border border-[#0f203d]/10';
            faqItem.innerHTML =
                '<button onclick="this.parentElement.classList.toggle(\'open\')" class="w-full px-6 py-4 flex items-center justify-between text-left">' +
                    '<span class="font-medium text-[#0f203d]">' + item.q + '</span>' +
                    '<svg class="faq-chevron text-[#d4b478] w-5 h-5 transition-transform duration-300 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>' +
                '</button>' +
                '<div class="faq-answer px-6 pb-4 hidden text-[#0f203d]/70 text-sm">' +
                    item.a +
                '</div>';
            faqEl.appendChild(faqItem);
        });

        // Sidebar
        var sidePriceEl = document.getElementById('sidePrice');
        var priceDisplay = data.price;
        if (data.orig) {
            priceDisplay = data.price + ' <span class="text-base font-normal text-[#0f203d]/40"><s>' + data.orig + '</s></span>';
        }
        sidePriceEl.innerHTML = priceDisplay;

        // Side value note (savings)
        var sideValueEl = document.getElementById('sideValue');
        if (data.orig) {
            var origNum = parseInt(data.orig.replace(/[^0-9]/g, ''), 10);
            var priceNum = parseInt(data.price.replace(/[^0-9]/g, ''), 10);
            if (!isNaN(origNum) && !isNaN(priceNum)) {
                var savings = origNum - priceNum;
                sideValueEl.textContent = 'You save $' + savings.toLocaleString() + '!';
            } else {
                sideValueEl.textContent = 'Best value pricing';
            }
        } else if (data.price === 'Custom') {
            sideValueEl.textContent = 'Premium executive coaching';
        } else {
            sideValueEl.textContent = 'Best value pricing';
        }

        // Checkout link + button text
        document.getElementById('checkoutBtn').href = data.checkoutLink + '?ICP_Type=' + encodeURIComponent(icpKey) + '&source=wordpress';
        document.getElementById('checkoutBtn').textContent = data.cta || 'Buy Now';

        // Not-for warning
        var fit = data.icpFit[icpKey];
        var notForEl = document.getElementById('notForWarning');
        var reasonEl = document.getElementById('notForReason');
        if (fit === 'bad') {
            notForEl.classList.remove('hidden');
            reasonEl.textContent = data.icpBad;
        } else if (fit === 'neutral') {
            notForEl.classList.remove('hidden');
            reasonEl.textContent = 'This product may not be the best fit for ' + icpName + '. Review the "Who This Is For" section above.';
        } else {
            notForEl.classList.add('hidden');
        }
    }

    render();
    </script>

</body>
</html>
