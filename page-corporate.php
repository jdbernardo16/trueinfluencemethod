<?php

/**
 * Template Name: Corporate Page
 * Description: True Influence Corporate page template
 *
 * @package tim-wordpress
 */

// Icon mapping to SVG (consistent with theme)
$iconMap = array(
    'Target' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
    'Award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" /></svg>',
    'Crown' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>',
    'Shield' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" /></svg>',
    'Zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" /></svg>',
    'Users' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
    'BookOpen' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>',
    'Mic' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" /><path d="M19 10v2a7 7 0 0 1-14 0v-2" /><line x1="12" y1="19" x2="12" y2="23" /><line x1="8" y1="23" x2="16" y2="23" /></svg>',
    'TrendingUp' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18" /><polyline points="17 6 23 6 23 12" /></svg>',
    'Compass' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76" /></svg>',
    'Eye' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" /><circle cx="12" cy="12" r="3" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0f203d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
    'ChevronDown' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9" /></svg>',
);

// ─── Method Outcomes ───
$methodOutcomes = tim_get_repeater_field('corporate_method_outcomes', array(
    array(
        'outcome_icon' => 'Shield',
        'outcome_title' => 'Overcome Self-Doubt',
        'outcome_description' => 'Move past doubt about executing your greater purpose and step fully into your leadership potential.',
    ),
    array(
        'outcome_icon' => 'Eye',
        'outcome_title' => 'Resolve Inner Trust',
        'outcome_description' => 'Build deep trust in your lived experience, turning personal truth into leadership strength.',
    ),
    array(
        'outcome_icon' => 'Crown',
        'outcome_title' => 'Legacy Clarity',
        'outcome_description' => 'Gain crystal clarity on how to build a succession plan and lasting legacy.',
    ),
));

// ─── Key Deliverables ───
$deliverables = tim_get_repeater_field('corporate_deliverables_items', array(
    array(
        'deliverable_icon' => 'Target',
        'deliverable_title' => 'Discover Your Unique Key Differentiator',
        'deliverable_description' => 'Uncover what shapes your authentic voice and sets you apart in your industry.',
    ),
    array(
        'deliverable_icon' => 'Mic',
        'deliverable_title' => 'Develop a Signature Message',
        'deliverable_description' => 'Craft a repeatable brand voice for TED talks, keynotes, and every stage you command.',
    ),
    array(
        'deliverable_icon' => 'Award',
        'deliverable_title' => 'Refine Your Unique Perspective',
        'deliverable_description' => 'Sharpen your key differentiator, causing distinction and resonance in every room.',
    ),
    array(
        'deliverable_icon' => 'BookOpen',
        'deliverable_title' => 'Name Vision, Story & Truth',
        'deliverable_description' => 'Find inner trust and safety by owning your complete narrative.',
    ),
    array(
        'deliverable_icon' => 'Users',
        'deliverable_title' => 'Increase Team Psychological Safety',
        'deliverable_description' => 'Empower your teams to take risks, do creative work, and think more deeply.',
    ),
    array(
        'deliverable_icon' => 'TrendingUp',
        'deliverable_title' => 'Cause Organizational Profit Growth',
        'deliverable_description' => 'Drive measurable profit increases up to 40%+ through aligned leadership.',
    ),
));

// ─── Training Formats ───
$trainingFormats = tim_get_repeater_field('corporate_formats_items', array(
    array(
        'format_icon' => 'Crown',
        'format_title' => 'Exclusive Private Client',
        'format_description' => 'A deeply personal, high-touch partnership for founders and executives ready to embody their message at the highest level.',
        'format_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/IMG_4580.webp'),
        'format_popular' => false,
    ),
    array(
        'format_icon' => 'Users',
        'format_title' => 'Corporate Team Training',
        'format_description' => 'Transform your leadership team\'s communication, building psychological safety and aligned messaging across the organization.',
        'format_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/IMG_4546.webp'),
        'format_popular' => true,
    ),
    array(
        'format_icon' => 'Award',
        'format_title' => 'Peer Mastermind & Retreat',
        'format_description' => 'Join a curated group of leaders in an immersive setting designed for breakthrough insights and lasting transformation.',
        'format_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/Nested Sequence 04.00_04_11_12.Still004.webp'),
        'format_popular' => false,
    ),
));

// ─── Impact Stats ───
$impactStats = tim_get_repeater_field('corporate_impact_stats', array(
    array(
        'stat_icon' => 'TrendingUp',
        'stat_value' => '40%+',
        'stat_label' => 'Organizational Profit Increase',
    ),
    array(
        'stat_icon' => 'Users',
        'stat_value' => '100%',
        'stat_label' => 'Client Retention Rate',
    ),
    array(
        'stat_icon' => 'Compass',
        'stat_value' => '3',
        'stat_label' => 'Transformation Frameworks',
    ),
));

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

    <div class="bg-[#0f203d] min-h-screen w-full overflow-x-hidden">
        <main>

            <!-- ════════════════════════════════════════════
                 HERO SECTION
                 ════════════════════════════════════════════ -->
            <section class="relative min-h-[85vh] flex items-center">
                <div class="absolute inset-0">
                    <?php $heroImage = tim_get_image_field('corporate_hero_image', get_template_directory_uri() . '/assets/images/corporate/banner.webp', 'Corporate leadership'); ?>
                    <img src="<?php echo esc_url($heroImage['url']); ?>" alt="<?php echo esc_attr($heroImage['alt']); ?>" class="w-full h-full object-cover opacity-25" />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/60 via-[#0f203d]/40 to-[#0f203d]"></div>
                </div>
                <div class="relative z-10 max-w-5xl mx-auto px-6 md:px-12 text-center">
                    <div class="mb-8">
                        <span class="inline-block text-[#d4b478] text-xs font-bold tracking-[0.25em] uppercase border border-[#d4b478]/30 px-5 py-2 rounded-full">
                            <?php echo esc_html(tim_get_field('corporate_hero_badge', 'The True Influence Method™')); ?>
                        </span>
                    </div>
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-[1.1] text-[#faf8f5] mb-8">
                        <?php echo esc_html(tim_get_field('corporate_hero_heading', 'Lead From Depth, Not Performance')); ?>
                    </h1>
                    <p class="text-lg md:text-xl text-[#faf8f5]/75 font-light leading-relaxed max-w-2xl mx-auto mb-12">
                        <?php echo wp_kses_post(tim_get_field('corporate_hero_description', 'To lead effectively is a deeply personal journey. The True Influence Method™ deploys advanced frameworks to embody your message and vision so you can be an example of your greater purpose.')); ?>
                    </p>
                    <a href="<?php echo esc_url(tim_get_field('corporate_hero_cta_link', '#the-method')); ?>" class="inline-flex items-center gap-3 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider text-sm">
                            <?php echo esc_html(tim_get_field('corporate_hero_cta_text', 'Explore the Method')); ?>
                        </span>
                        <?php echo $iconMap['ArrowRight']; ?>
                    </a>
                </div>
                <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
                    <div class="animate-bounce">
                        <?php echo $iconMap['ChevronDown']; ?>
                    </div>
                </div>
            </section>

            <!-- ════════════════════════════════════════════
                 PHILOSOPHY / APPROACH SECTION
                 ════════════════════════════════════════════ -->
            <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-6xl mx-auto px-6 md:px-12">
                    <div class="grid md:grid-cols-2 gap-12 lg:gap-16 items-center">
                        <div>
                            <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                                <?php echo esc_html(tim_get_field('corporate_philosophy_badge', 'The Approach')); ?>
                            </span>
                            <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl text-[#0f203d] mb-8 leading-tight">
                                <?php echo esc_html(tim_get_field('corporate_philosophy_heading', 'Transformation Begins at the Source')); ?>
                            </h2>
                            <div class="text-lg text-[#0f203d]/75 font-light leading-relaxed mb-6">
                                <?php echo wp_kses_post(tim_get_field('corporate_philosophy_paragraph_1', 'Hi, I\'m Joanna Horton McPherson. I approach blocks to income, influence and impact at the source: in the inner realm of leadership. To lead effectively is a deeply personal journey.')); ?>
                            </div>
                            <div class="text-lg text-[#0f203d]/75 font-light leading-relaxed">
                                <?php echo wp_kses_post(tim_get_field('corporate_philosophy_paragraph_2', 'To address issues at the root, I deploy advanced frameworks to embody your message and vision so you can be an example of your greater purpose rather than a performance of it.')); ?>
                            </div>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <?php $philosophyImage = tim_get_image_field('corporate_philosophy_image', get_template_directory_uri() . '/assets/images/corporate/Joanna Horton McPherson NAWBO September 2025.00_00_53_20.Still015.webp', 'Joanna Horton McPherson'); ?>
                            <img src="<?php echo esc_url($philosophyImage['url']); ?>" alt="<?php echo esc_attr($philosophyImage['alt']); ?>" class="w-full h-auto object-cover" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- ════════════════════════════════════════════
                 THE METHOD SECTION
                 ════════════════════════════════════════════ -->
            <section id="the-method" class="py-24 md:py-32 bg-[#0f203d]">
                <div class="max-w-6xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                            <?php echo esc_html(tim_get_field('corporate_method_badge', 'The System')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_method_heading', 'The True Influence Method™')); ?>
                        </h2>
                        <div class="text-lg text-[#faf8f5]/75 font-light max-w-3xl mx-auto leading-relaxed">
                            <?php echo wp_kses_post(tim_get_field('corporate_method_description', 'An intricate system of research-backed practices that bring founders, CEOs, and executives through a journey phase by phase of gaining deeper insights, taking them from performing their worth to leading from depth.')); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        <?php foreach ($methodOutcomes as $index => $outcome): ?>
                            <div class="group bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-500 text-center">
                                <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                    <?php echo isset($iconMap[$outcome['outcome_icon']]) ? $iconMap[$outcome['outcome_icon']] : $iconMap['Shield']; ?>
                                </div>
                                <h3 class="font-serif text-xl text-[#faf8f5] mb-3">
                                    <?php echo esc_html($outcome['outcome_title']); ?>
                                </h3>
                                <p class="text-[#faf8f5]/65 font-light text-sm leading-relaxed">
                                    <?php echo esc_html($outcome['outcome_description']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Decorative divider -->
                    <div class="flex items-center justify-center mt-16 gap-4">
                        <div class="w-16 h-px bg-[#d4b478]/30"></div>
                        <div class="w-2 h-2 bg-[#d4b478]/50 rounded-full"></div>
                        <div class="w-16 h-px bg-[#d4b478]/30"></div>
                    </div>
                    <p class="text-center text-[#faf8f5]/50 font-light italic text-sm mt-4 max-w-xl mx-auto">
                        This expands outward into leadership frameworks, brand marketing and strategic relationships, enabling next-level execution for expansion, global impact and scale.
                    </p>
                </div>
            </section>

            <!-- ════════════════════════════════════════════
                 KEY DELIVERABLES SECTION
                 ════════════════════════════════════════════ -->
            <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                            <?php echo esc_html(tim_get_field('corporate_deliverables_badge', 'Key Deliverables')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_deliverables_heading', 'What You Will Achieve')); ?>
                        </h2>
                        <div class="text-lg text-[#0f203d]/75 font-light max-w-2xl mx-auto leading-relaxed">
                            <?php echo wp_kses_post(tim_get_field('corporate_deliverables_description', 'The system goes beyond traditional learning to create breakthrough insights where clients can finally address issues at the root.')); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($deliverables as $index => $item): ?>
                            <div class="group bg-[#0f203d]/[0.03] border border-[#0f203d]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/15 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <?php echo isset($iconMap[$item['deliverable_icon']]) ? $iconMap[$item['deliverable_icon']] : $iconMap['Target']; ?>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-lg text-[#0f203d] mb-2 leading-snug">
                                            <?php echo esc_html($item['deliverable_title']); ?>
                                        </h3>
                                        <p class="text-[#0f203d]/65 font-light text-sm leading-relaxed">
                                            <?php echo esc_html($item['deliverable_description']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ════════════════════════════════════════════
                 TRAINING FORMATS SECTION
                 ════════════════════════════════════════════ -->
            <section class="py-24 md:py-32 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                            <?php echo esc_html(tim_get_field('corporate_formats_badge', 'How You Train')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_formats_heading', 'Choose Your Transformation Setting')); ?>
                        </h2>
                        <div class="text-lg text-[#faf8f5]/75 font-light max-w-3xl mx-auto leading-relaxed">
                            <?php echo wp_kses_post(tim_get_field('corporate_formats_description', 'Whether training as an exclusive private client, as a corporate team, or in a peer mastermind/retreat setting, the transformation begins with clarity and insight, causing growth not by increments but through shifts in trajectory.')); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                        <?php foreach ($trainingFormats as $index => $format): ?>
                            <?php
                            $formatImgUrl = isset($format['format_image']['url']) ? $format['format_image']['url'] : '';
                            $formatTitle = isset($format['format_title']) ? $format['format_title'] : '';
                            $formatDescription = isset($format['format_description']) ? $format['format_description'] : '';
                            $formatIcon = isset($format['format_icon']) ? $format['format_icon'] : 'Crown';
                            $isFeatured = isset($format['format_popular']) ? $format['format_popular'] : false;
                            ?>
                            <div class="group <?php echo $isFeatured ? 'bg-[#d4b478]/5 border-2 border-[#d4b478]/40' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?> rounded-2xl overflow-hidden hover:border-[#d4b478]/50 transition-all duration-500 relative">
                                <?php if ($isFeatured): ?>
                                    <div class="absolute top-4 right-4 bg-[#d4b478] text-[#0f203d] px-3 py-1 text-xs font-bold tracking-[0.15em] uppercase rounded-full z-10">
                                        Featured
                                    </div>
                                <?php endif; ?>
                                <div class="relative h-52 overflow-hidden">
                                    <img
                                        src="<?php echo esc_url($formatImgUrl); ?>"
                                        alt="<?php echo esc_attr($formatTitle); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] via-[#0f203d]/40 to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                            <?php echo isset($iconMap[$formatIcon]) ? $iconMap[$formatIcon] : $iconMap['Crown']; ?>
                                        </div>
                                        <h3 class="font-serif text-xl text-[#faf8f5]">
                                            <?php echo esc_html($formatTitle); ?>
                                        </h3>
                                    </div>
                                    <p class="text-[#faf8f5]/65 font-light text-sm leading-relaxed">
                                        <?php echo esc_html($formatDescription); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- ════════════════════════════════════════════
                 IMPACT SECTION
                 ════════════════════════════════════════════ -->
            <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-[#d4b478]/3 rounded-full translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

                <div class="max-w-7xl mx-auto px-6 md:px-12 relative z-10">
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                            <?php echo esc_html(tim_get_field('corporate_impact_badge', 'The Impact')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_impact_heading', 'From Truth to Scale')); ?>
                        </h2>
                        <div class="flex items-center justify-center gap-4 mt-6">
                            <div class="w-12 h-px bg-[#d4b478]/30"></div>
                            <div class="w-2 h-2 bg-[#d4b478]/50 rounded-full"></div>
                            <div class="w-12 h-px bg-[#d4b478]/30"></div>
                        </div>
                    </div>

                    <!-- Impact Stats Grid -->
                    <?php if (!empty($impactStats)): ?>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
                            <?php foreach ($impactStats as $index => $stat): ?>
                                <div class="group relative bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-8 text-center hover:border-[#d4b478]/40 hover:bg-[#faf8f5]/[0.08] transition-all duration-500">
                                    <!-- Icon -->
                                    <div class="w-14 h-14 bg-[#d4b478]/15 rounded-full flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:bg-[#d4b478]/25 transition-all duration-300">
                                        <?php echo isset($iconMap[$stat['stat_icon']]) ? $iconMap[$stat['stat_icon']] : $iconMap['TrendingUp']; ?>
                                    </div>
                                    <!-- Stat Value -->
                                    <div class="text-4xl md:text-5xl font-serif text-[#d4b478] mb-3 leading-none">
                                        <?php echo esc_html($stat['stat_value']); ?>
                                    </div>
                                    <!-- Stat Label -->
                                    <div class="text-[#faf8f5]/60 font-light text-sm tracking-wide uppercase">
                                        <?php echo esc_html($stat['stat_label']); ?>
                                    </div>
                                    <!-- Subtle bottom accent line -->
                                    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 group-hover:w-16 h-0.5 bg-[#d4b478]/50 rounded-full transition-all duration-500"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Quote & Image Split Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 rounded-2xl overflow-hidden shadow-2xl">
                        <!-- Image Side -->
                        <div class="relative h-72 md:h-[26rem] lg:h-auto">
                            <?php $impactImage = tim_get_image_field('corporate_impact_image', get_template_directory_uri() . '/assets/images/corporate/Nested Sequence 04.00_04_11_12.Still004.webp', 'True Influence impact'); ?>
                            <img
                                src="<?php echo esc_url($impactImage['url']); ?>"
                                alt="<?php echo esc_attr($impactImage['alt']); ?>"
                                class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#0f203d]/30 lg:bg-gradient-to-l lg:from-transparent lg:to-[#0f203d]"></div>
                        </div>

                        <!-- Quote Side -->
                        <div class="bg-[#0a1a30] p-8 md:p-12 lg:p-16 flex flex-col justify-center relative">
                            <!-- Decorative large quotation mark -->
                            <div class="absolute top-6 right-8 text-[#d4b478]/10 text-[8rem] leading-none font-serif pointer-events-none select-none">"</div>

                            <div class="relative z-10">
                                <!-- Gold accent line -->
                                <div class="w-16 h-1 bg-[#d4b478] rounded-full mb-8"></div>

                                <blockquote class="text-xl md:text-2xl lg:text-3xl font-serif text-[#faf8f5] italic mb-8 leading-snug">
                                    "<?php echo wp_kses_post(tim_get_field('corporate_impact_quote', 'Leading from the stage is not about performance; it is about truth.')); ?>"
                                </blockquote>

                                <div class="w-10 h-px bg-[#d4b478]/40 mb-6"></div>

                                <div class="text-[#faf8f5]/65 font-light leading-relaxed text-sm md:text-base">
                                    <?php echo wp_kses_post(tim_get_field('corporate_impact_description', 'These perspective shifts engage your authentic voice, turning lived experience into sophisticated and unique messages that shape your industry, shift culture, and open new paths of income and impact.')); ?>
                                </div>

                                <!-- Attribution -->
                                <div class="mt-8 flex items-center gap-3">
                                    <div class="w-8 h-px bg-[#d4b478]/50"></div>
                                    <span class="text-[#d4b478]/80 text-xs font-bold tracking-[0.15em] uppercase">
                                        Joanna Horton McPherson
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Decorative transition divider -->
            <div class="bg-[#0f203d] py-8">
                <div class="flex items-center justify-center gap-4">
                    <div class="w-20 h-px bg-[#d4b478]/20"></div>
                    <div class="w-2 h-2 bg-[#d4b478]/30 rounded-full"></div>
                    <div class="w-3 h-3 bg-[#d4b478]/20 rounded-full"></div>
                    <div class="w-2 h-2 bg-[#d4b478]/30 rounded-full"></div>
                    <div class="w-20 h-px bg-[#d4b478]/20"></div>
                </div>
            </div>

            <!-- ════════════════════════════════════════════
                 CTA SECTION
                 ════════════════════════════════════════════ -->
            <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] text-center relative overflow-hidden border-t border-[#d4b478]/10">
                <!-- Decorative background -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border border-[#d4b478]/5 rounded-full pointer-events-none"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] border border-[#d4b478]/5 rounded-full pointer-events-none"></div>

                <div class="max-w-3xl mx-auto px-6 md:px-12 relative z-10">
                    <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mx-auto mb-8">
                        <?php echo $iconMap['Zap']; ?>
                    </div>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                        <?php echo esc_html(tim_get_field('corporate_cta_heading', 'Begin Your Transformation')); ?>
                    </h2>
                    <div class="text-lg text-[#faf8f5]/75 font-light leading-relaxed mb-10">
                        <?php echo wp_kses_post(tim_get_field('corporate_cta_description', 'The transformation begins with clarity and insight. Whether as a private client, corporate team, or in a retreat setting—growth comes not by increments but through shifts in trajectory.')); ?>
                    </div>
                    <?php $ctaLink = tim_get_field('corporate_cta_button_link', home_url('/apply')); ?>
                    <a href="<?php echo esc_url($ctaLink); ?>" class="inline-flex items-center gap-3 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider text-sm">
                            <?php echo esc_html(tim_get_field('corporate_cta_button_text', 'Schedule a Consultation')); ?>
                        </span>
                        <?php echo $iconMap['ArrowRight']; ?>
                    </a>
                    <p class="text-[#faf8f5]/35 text-xs mt-10 tracking-wide uppercase">
                        The True Influence Method™
                    </p>
                </div>
            </section>

        </main>
    </div>

    <?php get_footer(); ?>
</body>

</html>