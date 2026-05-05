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
    @keyframes float {
        0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
        25% { transform: translateY(-20px) scale(1.1); opacity: 0.6; }
        50% { transform: translateY(-10px) scale(0.9); opacity: 0.4; }
        75% { transform: translateY(-30px) scale(1.05); opacity: 0.5; }
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
</style>

<div class="overflow-x-hidden">

    <section class="relative py-32 bg-[#0f203d] min-h-screen flex items-center overflow-hidden">
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
            <!-- Success icon -->
            <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-10 h-10 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>

            <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-6">
                Thank You for <span class="text-[#d4b478]">Your Purchase!</span>
            </h1>

            <div id="thankyou-message" class="text-[#faf8f5]/80 text-lg md:text-xl mb-8 max-w-xl mx-auto leading-relaxed">
                <!-- Dynamic message injected by JavaScript -->
            </div>

            <!-- Next Steps -->
            <div class="bg-[#faf8f5]/5 border border-[#d4b478]/20 rounded-2xl p-8 mb-10 text-left">
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

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?php echo esc_url(home_url('/icp/')); ?>" class="inline-flex items-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20">
                    Back to Home
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all">
                    Book a Consultation
                </a>
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
