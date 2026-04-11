<?php

/**
 * Template Name: Private Client Experience Page
 * Description: Private Client Experience page template with detailed inquiry sections
 *
 * @package tim-wordpress
 */

// Get ACF field values with fallbacks
$hero_badge = tim_get_field('private_training_hero_badge', 'Private Client Experience');
$hero_heading = tim_get_field('private_training_hero_heading', 'Your Transformative Partnership');
$hero_description = tim_get_field('private_training_hero_description', 'Everything in the Mastermind track, plus private advisory sessions, individualized training paths, and transformative, personalized insights. Auto-enrolled in Kajabi course portal. Phases 4 & 5 by application only. Pay phase-by-phase or in bundled packages.');
$hero_image = tim_get_image_field('private_training_hero_image', get_template_directory_uri() . '/assets/images/joanna-hero.webp', 'Joanna Horton McPherson');

$intro_badge = tim_get_field('private_training_intro_badge', 'Private Client Experience');
$intro_heading = tim_get_field('private_training_intro_heading', 'Your Transformative Partnership');
$intro_description = tim_get_field('private_training_intro_description', 'Private clients receive everything in the Mastermind track, plus private advisory sessions with Joanna, an individualized training path, and transformative, personalized insights designed to accelerate your growth.');
$intro_left_paragraph_1 = tim_get_field('private_training_intro_left_paragraph_1', 'This exclusive, high-touch experience is crafted for leaders ready to step fully into their power. Through private advisory sessions and a tailored individualized training path, Joanna delivers transformative insights that unlock your authentic voice and amplify your impact.');
$intro_left_paragraph_2 = tim_get_field('private_training_intro_left_paragraph_2', 'You\'ll gain seamless access to all resources through auto-enrollment in the Kajabi course portal. Phases 4 & 5 are available by application only for those seeking the deepest level of transformation. Choose to pay phase-by-phase or in bundled packages for maximum flexibility.');
$intro_image = tim_get_image_field('private_training_intro_image', get_template_directory_uri() . '/assets/images/carousel/img5.webp', 'Joanna coaching a private client');

$step1_badge = tim_get_field('private_training_step1_badge', 'Step 1: Identify Your Block');
$step1_heading = tim_get_field('private_training_step1_heading', 'Where Are You on Your Story Journey?');
$step1_description = tim_get_field('private_training_step1_description', 'Your Private Client Experience begins with clarity. Understanding where you are now helps Joanna design your individualized training path and deliver transformative, personalized insights.');
$step1_blocks = tim_get_repeater_field('private_training_step1_blocks', [
    ['title' => 'Fear & Anxiety', 'desc' => 'Public speaking triggers fear or anxiety, holding me back from sharing my message.', 'icon' => 'Target'],
    ['title' => 'Transition Stuck', 'desc' => 'I know my story is key to my next chapter, but I feel unable to move forward.', 'icon' => 'Users'],
    ['title' => 'Unclear Narrative', 'desc' => 'I sense a powerful story within me, but struggle to shape or structure it.', 'icon' => 'BookOpen'],
    ['title' => 'Hesitant to Share', 'desc' => 'I have a story, but don\'t feel safe or brave enough to share its truth yet.', 'icon' => 'Shield']
]);

$step2_badge = tim_get_field('private_training_step2_badge', 'Step 2: Clarify Your Vision');
$step2_heading = tim_get_field('private_training_step2_heading', 'What Transformation Are You Seeking?');
$step2_description = tim_get_field('private_training_step2_description', 'Your Private Client Experience is designed around your unique aspirations. Understanding your vision helps Joanna craft your individualized training path and deliver transformative, personalized insights.');
$step2_visions = tim_get_repeater_field('private_training_step2_visions', [
    ['vision_text' => 'Elevate my brand authority and market presence.'],
    ['vision_text' => 'Craft and publish my signature story.'],
    ['vision_text' => 'Command stages with confidence and impact.'],
    ['vision_text' => 'Build a lasting legacy through thought leadership.']
]);

$step3_badge = tim_get_field('private_training_step3_badge', 'Step 3: Define Success');
$step3_heading = tim_get_field('private_training_step3_heading', 'What Does "Success" Look Like for You?');
$step3_description = tim_get_field('private_training_step3_description', 'We translate vision into tangible outcomes. Here\'s what private clients achieve through their individualized training path.');
$step3_outcomes = tim_get_repeater_field('private_training_step3_outcomes', [
    ['outcome_title' => 'Clarity in Message', 'outcome_description' => 'Clarity in my message, and how it connects to my business'],
    ['outcome_title' => 'Polished Story', 'outcome_description' => 'Standing on a stage with a polished 7-minute story'],
    ['outcome_title' => 'Total Confidence', 'outcome_description' => 'Feeling total confidence in my body'],
    ['outcome_title' => 'Safety in Leadership', 'outcome_description' => 'Having safety around using my story to enhance my leadership']
]);

$step4_badge = tim_get_field('private_training_step4_badge', 'Step 4: Your Professional Path');
$step4_heading = tim_get_field('private_training_step4_heading', 'Which Best Describes Your Current Professional Path?');
$step4_description = tim_get_field('private_training_step4_description', 'Private training is customized to your role, ambition, and legacy.');
$step4_paths = tim_get_repeater_field('private_training_step4_paths', [
    ['path_title' => 'Emerging Leader/Entrepreneur', 'path_description' => 'Ready to master my message.'],
    ['path_title' => 'Established Executive/Founder', 'path_description' => 'Seeking "Healed Leadership" and truth.'],
    ['path_title' => 'Global Visionary/Philanthropist', 'path_description' => 'Building a multi‑generational legacy.']
]);

$step5_badge = tim_get_field('private_training_step5_badge', 'Step 5: Investment & Alignment');
$step5_heading = tim_get_field('private_training_step5_heading', 'Choose Your Level of Transformation');
$step5_description = tim_get_field('private_training_step5_description', 'Private clients receive everything in the Mastermind track, plus private 1:1 advisory sessions with Joanna. Choose to pay phase-by-phase or in bundled packages. Phases 4 & 5 are available by application only.');
$step5_investments = tim_get_repeater_field('private_training_step5_investments', [
    ['investment_level' => 'Phase 1-3', 'investment_name' => 'Private Client Experience', 'investment_price' => '$20,000', 'investment_description' => 'Everything in the Mastermind track, plus private 1:1 advisory sessions, individualized training path, and auto-enrollment in Kajabi course portal.', 'investment_icon' => 'Target', 'investment_popular' => false],
    ['investment_level' => 'Phase 1-5', 'investment_name' => 'Private Client Experience', 'investment_price' => '$45,000', 'investment_description' => 'Everything above, plus Phases 4 & 5 (by application only) with transformative, personalized insights and advanced delivery trainings.', 'investment_icon' => 'Users', 'investment_popular' => true]
]);
$step5_footer_note = tim_get_field('private_training_step5_footer_note', 'Note: All private clients receive direct access to Joanna, invitation to quarterly Mastermind & Retreat experiences, auto-enrollment in the Kajabi course portal, a lifetime messaging foundation, and access to The Vault resource library.');

$step6_badge = tim_get_field('private_training_step6_badge', 'Step 6: The Find Your Story Call');
$step6_heading = tim_get_field('private_training_step6_heading', 'Your First Step Is a Conversation with Joanna');
$step6_description = tim_get_field('private_training_step6_description', 'If you plan to join the Private Client Experience, the first step is meeting with Joanna. This is not a sales call—it\'s the beginning of your individualized training path.');
$step6_success_box_title = tim_get_field('private_training_step6_success_box_title', 'Success Starts Now');
$step6_success_box_content = tim_get_field('private_training_step6_success_box_content', '<p>Marianne suggested that Joanna "do the first lesson" (Naming the Story) during the discovery call.</p><p>On the "Thank You" page after you submit your inquiry, we include a note:<br><em class="text-[#d4b478]">"Success starts now. In our upcoming call, we will move past the \'talk\' and immediately begin the work of Naming Your Story. Please come prepared to dive deep."</em></p>');
$step6_additional_paragraph = tim_get_field('private_training_step6_additional_paragraph', 'Bring any questions, hesitations, or excitement. This call is your opportunity to see if this is the right container for your growth—and for Joanna to assess alignment.');
$step6_image = tim_get_image_field('private_training_step6_image', get_template_directory_uri() . '/assets/images/corporate/executive.webp', 'Executive coaching session');

$cta_badge = tim_get_field('private_training_cta_badge', 'Ready to Begin?');
$cta_heading = tim_get_field('private_training_cta_heading', 'Apply for Private Client Experience');
$cta_description = tim_get_field('private_training_cta_description', 'If you\'ve read this far, you\'re likely a high‑alignment lead. The next step is to submit your essentials—name, email, phone—and schedule your Find Your Story call. Choose to pay phase-by-phase or in bundled packages.');
$cta_button_text = tim_get_field('private_training_cta_button_text', 'Apply Now');
$cta_secondary_button_text = tim_get_field('private_training_cta_secondary_button_text', 'Explore All Programs');
$cta_footer_note = tim_get_field('private_training_cta_footer_note', 'No forms on this page—just the details. When you\'re ready, the application awaits.');

// Icon mapping to SVG (adapted from retreat page)
$iconMap = array(
    'Target' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
    'Users' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
    'BookOpen' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>',
    'Shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" /></svg>',
    'Zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
);
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
        <!-- Hero -->
        <section class="relative py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] flex items-center justify-center overflow-hidden">
            <!-- Background image -->
            <div class="absolute inset-0">
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>" class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/50 via-[#0f203d]/30 to-[#0f203d]"></div>
            </div>
            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    <?php echo esc_html($hero_badge); ?>
                </span>
                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#faf8f5] mb-8">
                    <?php echo esc_html($hero_heading); ?>
                </h1>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                    <?php echo wp_kses_post($hero_description); ?>
                </p>
            </div>
        </section>

        <!-- Introduction -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($intro_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        <?php echo esc_html($intro_heading); ?>
                    </h2>
                    <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($intro_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-[#0f203d]/80 text-lg leading-relaxed mb-6">
                            <?php echo wp_kses_post($intro_left_paragraph_1); ?>
                        </p>
                        <p class="text-[#0f203d]/80 text-lg leading-relaxed">
                            <?php echo wp_kses_post($intro_left_paragraph_2); ?>
                        </p>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo esc_url($intro_image['url']); ?>" alt="<?php echo esc_attr($intro_image['alt']); ?>" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </section>

        <!-- Identifying Your Block -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step1_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                        <?php echo esc_html($step1_heading); ?>
                    </h2>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step1_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($step1_blocks as $block): ?>
                        <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <?php echo $iconMap[$block['icon']]; ?>
                            </div>
                            <h3 class="font-serif text-xl text-[#faf8f5] mb-2"><?php echo esc_html($block['title']); ?></h3>
                            <p class="text-[#faf8f5]/70 text-sm"><?php echo esc_html($block['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- The Vision -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step2_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        <?php echo esc_html($step2_heading); ?>
                    </h2>
                    <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step2_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($step2_visions as $vision): ?>
                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <p class="font-serif text-lg text-[#0f203d]"><?php echo esc_html($vision['vision_text']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Outcomes -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step3_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                        <?php echo esc_html($step3_heading); ?>
                    </h2>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step3_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($step3_outcomes as $outcome): ?>
                        <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#faf8f5] mb-2"><?php echo esc_html($outcome['outcome_title']); ?></h3>
                            <p class="text-[#faf8f5]/70 text-sm"><?php echo esc_html($outcome['outcome_description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Professional Path -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step4_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        <?php echo esc_html($step4_heading); ?>
                    </h2>
                    <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step4_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ($step4_paths as $path): ?>
                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 text-center hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-4"><?php echo esc_html($path['path_title']); ?></h3>
                            <p class="text-[#0f203d]/70"><?php echo esc_html($path['path_description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Investment & Alignment -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step5_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                        <?php echo esc_html($step5_heading); ?>
                    </h2>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step5_description); ?>
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <?php foreach ($step5_investments as $investment): ?>
                        <div class="p-8 rounded-2xl text-center <?php echo $investment['investment_popular'] ? 'bg-[#d4b478]/10 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?>">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-[#d4b478]/20 rounded-full mb-4">
                                <?php echo $iconMap[$investment['investment_icon']]; ?>
                            </div>
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-2">
                                <?php echo esc_html($investment['investment_level']); ?>
                            </span>
                            <h3 class="font-serif text-xl text-[#faf8f5] mb-4">
                                <?php echo esc_html($investment['investment_name']); ?>
                            </h3>
                            <div class="text-4xl font-serif text-[#d4b478] mb-6">
                                <?php echo esc_html($investment['investment_price']); ?>
                            </div>
                            <p class="text-[#faf8f5]/70 text-sm mb-6">
                                <?php echo esc_html($investment['investment_description']); ?>
                            </p>
                            <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="inline-block bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-6 py-3 rounded-full font-medium transition-all duration-300">
                                Get Started
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center mt-12">
                    <p class="text-[#faf8f5]/60 text-sm italic max-w-2xl mx-auto">
                        <?php echo esc_html($step5_footer_note); ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- The Find Your Story Call -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html($step6_badge); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        <?php echo esc_html($step6_heading); ?>
                    </h2>
                    <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                        <?php echo wp_kses_post($step6_description); ?>
                    </p>
                </div>
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 mb-6">
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-4"><?php echo esc_html($step6_success_box_title); ?></h3>
                            <div class="text-[#0f203d]/80">
                                <?php echo wp_kses_post($step6_success_box_content); ?>
                            </div>
                        </div>
                        <p class="text-[#0f203d]/80">
                            <?php echo wp_kses_post($step6_additional_paragraph); ?>
                        </p>
                    </div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="<?php echo esc_url($step6_image['url']); ?>" alt="<?php echo esc_attr($step6_image['alt']); ?>" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] text-center relative overflow-hidden">
            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-full max-w-4xl opacity-5 pointer-events-none">
                <div class="w-full h-full border border-[#d4b478] rounded-full scale-150"></div>
            </div>
            <div class="max-w-4xl mx-auto px-6 relative z-10">
                <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    <?php echo esc_html($cta_badge); ?>
                </span>
                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                    <?php echo esc_html($cta_heading); ?>
                </h2>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto mb-10">
                    <?php echo wp_kses_post($cta_description); ?>
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>"
                        class="inline-flex items-center justify-center gap-3 bg-[#d4b478] text-[#0f203d] text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#b87d1f] transition-colors duration-300">
                        <?php echo esc_html($cta_button_text); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                    <a href="<?php echo esc_url(home_url('/programs/')); ?>"
                        class="inline-flex items-center justify-center gap-3 border-2 border-[#d4b478] text-[#d4b478] text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#d4b478]/10 transition-colors duration-300">
                        <?php echo esc_html($cta_secondary_button_text); ?>
                    </a>
                </div>
                <p class="text-[#faf8f5]/40 text-sm mt-10">
                    <?php echo esc_html($cta_footer_note); ?>
                </p>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>