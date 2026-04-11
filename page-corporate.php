<?php

/**
 * Template Name: Corporate Page
 * Description: True Influence Corporate page template
 *
 * @package tim-wordpress
 */

// Define problem items
$problemItems = array(
    "Audiences don't see their problem",
    "Solutions understood but not prioritized",
    "Brand differentiation lost",
    "Revenue opportunities unrealized",
);

// Define solution items
$solutionItems = array(
    array(
        'img' => 'img1.png',
        'title' => 'Audience Sees Their Problem',
    ),
    array(
        'img' => 'solution.jpg',
        'title' => 'Solution Becomes Obvious Choice',
    ),
    array(
        'img' => 'img_4598.webp',
        'title' => 'Speaker as Authentic Authority',
    ),
    array(
        'img' => 'revenue.jpg',
        'title' => 'Measurable Business Outcomes',
    ),
);

// Define services
$services = array(
    array(
        'level' => 'Level 1',
        'name' => 'Signature Talk',
        'description' => 'Increase sales through message alignment',
        'img' => 'IMG_4580.webp',
        'icon' => 'Target',
        'features' => array(
            'Target audience identification',
            'High-conversion narrative',
            'Executive delivery coaching',
        ),
        'price' => '$35,000',
    ),
    array(
        'level' => 'Level 2',
        'name' => 'Speaker Mastery',
        'description' => 'Establish recognized authority',
        'img' => 'IMG_4546.webp',
        'icon' => 'Award',
        'features' => array(
            'Multi-audience refinement',
            'Authority positioning',
            'Advanced presence training',
        ),
        'price' => '$75,000',
        'popular' => true,
    ),
    array(
        'level' => 'Level 3',
        'name' => 'Executive Visibility',
        'description' => 'Expand market visibility',
        'img' => 'executive.webp',
        'icon' => 'Crown',
        'features' => array(
            'Private speaking event',
            'Professional video capture',
            'Strategic brand positioning',
        ),
        'price' => '$250,000',
    ),
);

// Define results
$results = array(
    array(
        'value' => '40%+',
        'label' => 'Sales Activity Increase',
    ),
    array(
        'value' => 'Dozens',
        'label' => 'New Conversations',
    ),
    array(
        'value' => 'High',
        'label' => 'Audience Engagement',
    ),
    array(
        'value' => 'Strong',
        'label' => 'Brand Positioning',
    ),
);

// Icon mapping to SVG
$iconMap = array(
    'Target' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
    'Award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" /></svg>',
    'Crown' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0f203d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
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

    <div class="bg-[#0f203d] min-h-screen w-full overflow-x-hidden">
        <main>
            <!-- Hero Section -->
            <section class="relative min-h-[80vh] flex items-center">
                <div class="absolute inset-0">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/corporate/banner.webp" alt="Corporate leadership" class="w-full h-full object-cover opacity-30" />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/50 via-[#0f203d]/30 to-[#0f203d]"></div>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12 text-center">
                    <div class="mb-6">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                            For Organizations
                        </span>
                    </div>
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight text-[#faf8f5] mb-6">
                        Transform Presentations
                        <br />
                        Into Revenue
                    </h1>
                    <p class="text-lg md:text-xl text-[#faf8f5]/80 font-light leading-relaxed max-w-2xl mx-auto mb-10">
                        The True Influence Method™ aligns leadership voice,
                        message clarity, and audience psychology for measurable
                        business outcomes.
                    </p>
                    <a href="#services" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider">
                            Explore Services
                        </span>
                        <?php echo $iconMap['ArrowRight']; ?>
                    </a>
                </div>
            </section>

            <!-- Problem Section - Visual -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-12">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            The Challenge
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Presentations That Inform But Don't Convert
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/corporate/convert.jpg"
                                alt="Presentation challenge"
                                class="w-full h-64 md:h-80 object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] to-transparent"></div>
                        </div>
                        <div class="flex flex-col justify-center space-y-6">
                            <?php foreach ($problemItems as $index => $item): ?>
                                <div class="flex items-center gap-4 p-4 bg-[#faf8f5]/5 rounded-xl hover:bg-[#faf8f5]/10 transition-colors">
                                    <div class="w-10 h-10 bg-[#d4b478]/20 rounded-full flex items-center justify-center flex-shrink-0">
                                        <?php echo $iconMap['Target']; ?>
                                    </div>
                                    <p class="text-[#faf8f5]/90 font-light">
                                        <?php echo esc_html($item); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Solution Section - Visual -->
            <section class="py-20 md:py-28 bg-[#f8f4ec]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            The Solution
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            True Influence Method™
                        </h2>
                        <p class="text-lg text-[#0f203d]/80 font-light max-w-2xl mx-auto">
                            Every presentation drives measurable business
                            outcomes
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($solutionItems as $index => $item): ?>
                            <div class="group relative overflow-hidden rounded-2xl">
                                <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/corporate/<?php echo esc_attr($item['img']); ?>"
                                    alt="<?php echo esc_attr($item['title']); ?>"
                                    class="w-full h-64 md:h-72 object-cover group-hover:scale-105 transition-transform duration-700" />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] via-[#0f203d]/50 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                            <?php echo $iconMap['CheckCircle2']; ?>
                                        </div>
                                        <h3 class="font-serif text-xl text-[#faf8f5]">
                                            <?php echo esc_html($item['title']); ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Services Section - Visual Cards -->
            <section id="services" class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            Services
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Three Levels of Transformation
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($services as $index => $service): ?>
                            <div class="group <?php echo isset($service['popular']) && $service['popular'] ? 'bg-[#d4b478]/5 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?> rounded-2xl overflow-hidden hover:border-[#d4b478]/50 transition-all duration-500 relative">
                                <?php if (isset($service['popular']) && $service['popular']): ?>
                                    <div class="absolute top-4 right-4 bg-[#d4b478] text-[#0f203d] px-3 py-1 text-xs font-bold tracking-[0.2em] uppercase rounded-full z-10">
                                        Popular
                                    </div>
                                <?php endif; ?>
                                <div class="relative h-48 overflow-hidden">
                                    <img
                                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/corporate/<?php echo esc_attr($service['img']); ?>"
                                        alt="<?php echo esc_attr($service['name']); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                            <?php echo isset($iconMap[$service['icon']]) ? $iconMap[$service['icon']] : $iconMap['Target']; ?>
                                        </div>
                                        <div>
                                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                                                <?php echo esc_html($service['level']); ?>
                                            </span>
                                            <h3 class="font-serif text-xl text-[#faf8f5]">
                                                <?php echo esc_html($service['name']); ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <p class="text-[#faf8f5]/70 font-light text-sm mb-4">
                                        <?php echo esc_html($service['description']); ?>
                                    </p>
                                    <ul class="space-y-2 text-sm text-[#faf8f5]/80">
                                        <?php foreach ($service['features'] as $feature): ?>
                                            <li class="flex items-start gap-2">
                                                <?php echo $iconMap['ArrowRight']; ?>
                                                <span>
                                                    <?php echo esc_html($feature); ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Results Section - Visual -->
            <section class="py-20 md:py-28 bg-[#f8f4ec]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            Results
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            Tangible Outcomes
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                        <?php foreach ($results as $index => $result): ?>
                            <div class="text-center p-8 bg-[#e7d4c5]/30 border border-[#d4b478]/30 rounded-2xl">
                                <div class="text-4xl md:text-5xl font-serif text-[#d4b478] mb-3">
                                    <?php echo esc_html($result['value']); ?>
                                </div>
                                <p class="text-[#0f203d]/80 font-light">
                                    <?php echo esc_html($result['label']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="relative rounded-2xl overflow-hidden">
                        <img
                            src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/corporate/Nested Sequence 04.00_04_11_12.Still004.webp"
                            alt="Success story"
                            class="w-full h-64 md:h-[80vh] object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0f203d]/90 to-[#0f203d]/60 flex items-center">
                            <div class="px-6 md:px-12 max-w-2xl">
                                <p class="text-2xl md:text-3xl font-serif text-[#faf8f5] italic mb-4">
                                    "This is not presentation coaching. This is
                                    revenue-aligned communication strategy."
                                </p>
                                <p class="text-[#d4b478] font-medium">
                                    — True Influence Method™
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Investment Section - Clean Pricing -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            Investment
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Choose Your Level
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($services as $index => $service): ?>
                            <div class="p-8 rounded-2xl text-center <?php echo isset($service['popular']) && $service['popular'] ? 'bg-[#d4b478]/10 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?>">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#d4b478]/20 rounded-full mb-4">
                                    <?php echo isset($iconMap[$service['icon']]) ? $iconMap[$service['icon']] : $iconMap['Target']; ?>
                                </div>
                                <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-2">
                                    <?php echo esc_html($service['level']); ?>
                                </span>
                                <h3 class="font-serif text-xl text-[#faf8f5] mb-4">
                                    <?php echo esc_html($service['name']); ?>
                                </h3>
                                <div class="text-4xl font-serif text-[#d4b478] mb-6">
                                    <?php echo esc_html($service['price']); ?>
                                </div>
                                <a href="<?php echo esc_url(home_url('/apply')); ?>" class="inline-block bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-6 py-3 rounded-full font-medium transition-all duration-300">
                                    Get Started
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-20 md:py-28 bg-[#f8f4ec]">
                <div class="max-w-4xl mx-auto px-6 md:px-12 text-center">
                    <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                        Ready to Transform?
                    </h2>
                    <p class="text-lg text-[#0f203d]/80 font-light leading-relaxed mb-10">
                        Let's discuss how the True Influence Method™ can
                        help you achieve measurable business outcomes.
                    </p>
                    <a href="<?php echo esc_url(home_url('/apply')); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider">
                            Schedule a Consultation
                        </span>
                        <?php echo $iconMap['ArrowRight']; ?>
                    </a>
                </div>
            </section>
        </main>
    </div>

    <?php get_footer(); ?>