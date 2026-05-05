<?php
/**
 * Template Name: ICP Thank You Page
 *
 * Post-purchase confirmation page. Reads ?product= from URL
 * and displays a personalized thank-you message.
 *
 * @package TIM
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

<style>
    /* --- Existing --- */
    @keyframes float {
        0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
        25% { transform: translateY(-20px) scale(1.1); opacity: 0.6; }
        50% { transform: translateY(-10px) scale(0.9); opacity: 0.4; }
        75% { transform: translateY(-30px) scale(1.05); opacity: 0.5; }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    /* --- New decorative animations --- */
    @keyframes float-slow {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        33% { transform: translateY(-15px) rotate(1deg); }
        66% { transform: translateY(-8px) rotate(-1deg); }
    }
    .animate-float-slow {
        animation: float-slow 12s ease-in-out infinite;
    }
    .animate-float-slow-delayed {
        animation: float-slow 14s ease-in-out 3s infinite;
    }
    .animate-float-slower {
        animation: float-slow 18s ease-in-out 6s infinite;
    }

    @keyframes pulse-glow {
        0%, 100% { transform: scale(1); opacity: 0.2; }
        50% { transform: scale(1.15); opacity: 0.35; }
    }
    .animate-pulse-glow {
        animation: pulse-glow 4s ease-in-out infinite;
    }

    @keyframes shine {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }
    .animate-shine {
        background: linear-gradient(
            120deg,
            rgba(250,248,245,1) 0%,
            rgba(250,248,245,1) 30%,
            rgba(212,180,120,0.9) 50%,
            rgba(250,248,245,1) 70%,
            rgba(250,248,245,1) 100%
        );
        background-size: 200% auto;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 6s ease-in-out infinite;
    }
    .animate-shine .text-\[#d4b478\] {
        -webkit-text-fill-color: #d4b478;
        background: none;
    }

    @keyframes check-ring-pulse {
        0%, 100% { transform: scale(1); opacity: 0.25; }
        50% { transform: scale(1.2); opacity: 0.5; }
    }
    .animate-check-ring {
        animation: check-ring-pulse 3s ease-in-out infinite;
    }

    @keyframes sparkle-float {
        0%, 100% { opacity: 0; transform: translateY(0) scale(0.5); }
        20% { opacity: 0.8; transform: translateY(-10px) scale(1); }
        80% { opacity: 0.6; transform: translateY(-20px) scale(0.8); }
    }
    .sparkle-dot {
        position: absolute;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #d4b478;
        animation: sparkle-float 4s ease-in-out infinite;
    }

    @keyframes featured-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .featured-track {
        width: max-content;
        animation: featured-scroll 30s linear infinite;
        will-change: transform;
    }
    .featured-wrapper:hover .featured-track,
    .featured-wrapper:focus-within .featured-track {
        animation-play-state: paused;
    }
    @media (prefers-reduced-motion: reduce) {
        .featured-track { animation: none; flex-wrap: wrap; justify-content: center; width: auto; }
        .animate-float { animation: none; }
        .animate-float-slow { animation: none; }
        .animate-pulse-glow { animation: none; }
        .animate-shine { animation: none; }
        .animate-check-ring { animation: none; }
        .sparkle-dot { animation: none; display: none; }
    }
</style>

<div class="overflow-x-hidden">

    <section class="relative py-32 bg-[#0f203d] min-h-screen flex items-center overflow-hidden">

        <!-- Decorative SVG pattern overlay (subtle dot grid) -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <!-- Floating-slow ambient circles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-20 -left-20 w-80 h-80 border border-[#d4b478]/10 rounded-full animate-float-slow"></div>
            <div class="absolute top-1/3 -right-32 w-96 h-96 border border-[#d4b478]/5 rounded-full animate-float-slow-delayed"></div>
            <div class="absolute -bottom-40 left-1/4 w-[500px] h-[500px] border border-[#d4b478]/8 rounded-full animate-float-slower"></div>
        </div>

        <!-- Decorative blurs -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>

        <!-- Particles -->
        <div class="absolute inset-0 overflow-hidden">
            <?php for ($i = 1; $i <= 15; $i++): ?>
                <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                    style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s;">
                </div>
            <?php endfor; ?>
        </div>

        <div class="max-w-3xl mx-auto px-6 text-center relative z-10">

            <!-- Brand logo with glow -->
            <div class="mb-8">
                <div class="relative inline-block">
                    <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 rounded-full animate-pulse-glow"></div>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/icononly_transparent_nobuffer.png"
                        alt="True Influence Method Logo"
                        class="w-20 h-20 object-contain relative z-10 mx-auto" />
                </div>
            </div>

            <!-- Success icon with celebratory gold glow ring -->
            <div class="relative inline-flex items-center justify-center mb-8">
                <div class="absolute inset-0 w-28 h-28 bg-[#d4b478]/15 rounded-full blur-[30px] animate-check-ring"></div>
                <div class="absolute inset-0 w-28 h-28 border border-[#d4b478]/30 rounded-full"></div>
                <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto relative z-10">
                    <svg class="w-10 h-10 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <!-- Sparkle dots around check -->
                <div class="sparkle-dot" style="top: -8px; right: -4px; animation-delay: 0.5s;"></div>
                <div class="sparkle-dot" style="bottom: 4px; left: -10px; animation-delay: 1.8s;"></div>
                <div class="sparkle-dot" style="top: 2px; right: -14px; animation-delay: 3s;"></div>
            </div>

            <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-6 animate-shine">
                Thank You for <span class="text-[#d4b478]">Your Purchase!</span>
            </h1>

            <div id="thankyou-message" class="text-[#faf8f5]/80 text-lg md:text-xl mb-8 max-w-xl mx-auto leading-relaxed">
                <!-- Dynamic message injected by JavaScript -->
            </div>

            <!-- Next Steps card with decorative blur backdrop -->
            <div class="relative mb-10">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-72 h-72 bg-[#d4b478]/8 rounded-full blur-[100px]"></div>
                <div class="absolute -bottom-8 right-0 w-48 h-48 bg-[#d4b478]/5 rounded-full blur-[80px]"></div>

                <div class="relative z-10 bg-gradient-to-br from-[#faf8f5]/10 via-[#faf8f5]/5 to-[#faf8f5]/5 border border-[#d4b478]/30 rounded-2xl p-8 text-left shadow-lg shadow-black/10">
                    <!-- Gold accent top border line -->
                    <div class="absolute top-0 left-8 right-8 h-px bg-gradient-to-r from-[#d4b478]/0 via-[#d4b478]/60 to-[#d4b478]/0"></div>
                    <h2 class="font-serif text-xl text-[#d4b478] mb-4">What Happens Next</h2>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span class="text-[#faf8f5]/70 text-sm">Check your email for a confirmation and next steps</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span class="text-[#faf8f5]/70 text-sm">Joanna&rsquo;s team will reach out within 24 hours to schedule</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <span class="text-[#faf8f5]/70 text-sm">Have questions? Reply to your confirmation email</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Gold gradient divider -->
            <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mb-10"></div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(home_url('/icp/')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-xl hover:shadow-[#d4b478]/30 shadow-lg shadow-[#d4b478]/10">
                    Back to Home
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="inline-flex items-center gap-2 px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all hover:shadow-xl hover:shadow-[#d4b478]/20 shadow-lg shadow-[#d4b478]/5">
                    Book a Consultation
                </a>
            </div>

            <!-- As Seen On — micro trust strip -->
            <div class="mt-16 pt-8 border-t border-[#d4b478]/10">
                <span class="text-[#d4b478]/40 text-xs font-bold tracking-[0.2em] uppercase">As Featured On</span>
                <div class="featured-wrapper relative w-full mt-4 overflow-hidden">
                    <div class="pointer-events-none absolute inset-y-0 left-0 w-12 z-10 bg-gradient-to-r from-[#0f203d] to-transparent"></div>
                    <div class="pointer-events-none absolute inset-y-0 right-0 w-12 z-10 bg-gradient-to-l from-[#0f203d] to-transparent"></div>
                    <div class="featured-track flex items-center gap-x-8 gap-y-2">
                        <!-- Two sets for seamless scroll -->
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">ABC</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Forbes</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">MTV</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Harvard</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">USA Today</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Bloomberg</span>
                        <!-- Duplicate for seamless loop -->
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">ABC</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Forbes</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">MTV</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Harvard</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">USA Today</span>
                        <span class="text-[#faf8f5]/30 text-sm font-medium whitespace-nowrap">Bloomberg</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>

<script>
(function() {
    var params = new URLSearchParams(window.location.search);
    var product = params.get('product') || '';

    var messages = {
        breakthrough: 'Your <strong>Breakthrough Session</strong> is confirmed. Check your email for scheduling details and preparation materials from Joanna\'s team.',
        '4session': 'Your <strong>4-Session Training Package</strong> is confirmed. We will reach out within 24 hours to schedule your sessions.',
        phase1: 'Welcome to <strong>Phase 1: My Why</strong>! Your 90-day Mastermind starts soon. All details have been sent to your email.',
        phase2: 'Welcome to <strong>Phase 2: My Signature Talk</strong>! Your Speaker Cohort details have been emailed to you with everything you need to prepare.',
        phase3: 'Welcome to <strong>Phase 3: Keynote/TEDx</strong>! Your journey to becoming a recognized thought leader begins now.',
        phase4: 'Thank you for your interest in <strong>Phase 4: Scaling Strategy</strong>. Our team will contact you within 48 hours to discuss next steps.',
        phase5: 'Thank you for your interest in <strong>Phase 5: Legacy Framework</strong>. Our team will reach out to schedule an introductory conversation.',
        private: 'Thank you for your interest in <strong>Private Training</strong>. Joanna\'s team will reach out within 24 hours.',
    };

    var msgEl = document.getElementById('thankyou-message');
    if (msgEl) {
        msgEl.innerHTML = messages[product] || 'Your purchase is confirmed. Check your email for details and next steps from Joanna\'s team.';
    }
})();
</script>

<?php get_footer(); ?>

</body>
</html>
