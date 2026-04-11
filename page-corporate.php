<?php

/**
 * Template Name: Corporate Page
 * Description: True Influence Corporate page template
 *
 * @package tim-wordpress
 */

// Icon mapping to SVG
$iconMap = array(
    'Target' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
    'Award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" /></svg>',
    'Crown' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0f203d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
);

// Get problem items from ACF
$problemItems = tim_get_repeater_field('corporate_problem_items', array(
    array('problem_item_text' => "Audiences don't see their problem"),
    array('problem_item_text' => "Solutions understood but not prioritized"),
    array('problem_item_text' => "Brand differentiation lost"),
    array('problem_item_text' => "Revenue opportunities unrealized"),
));

// Get solution items from ACF
$solutionItems = tim_get_repeater_field('corporate_solution_items', array(
    array(
        'solution_item_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/img1.png'),
        'solution_item_title' => 'Audience Sees Their Problem',
    ),
    array(
        'solution_item_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/solution.jpg'),
        'solution_item_title' => 'Solution Becomes Obvious Choice',
    ),
    array(
        'solution_item_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/img_4598.webp'),
        'solution_item_title' => 'Speaker as Authentic Authority',
    ),
    array(
        'solution_item_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/revenue.jpg'),
        'solution_item_title' => 'Measurable Business Outcomes',
    ),
));

// Get services from ACF
$services = tim_get_repeater_field('corporate_services', array(
    array(
        'service_level' => 'Level 1',
        'service_name' => 'Signature Talk',
        'service_description' => 'Increase sales through message alignment',
        'service_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/IMG_4580.webp'),
        'service_icon' => 'Target',
        'service_features' => array(
            array('service_feature' => 'Target audience identification'),
            array('service_feature' => 'High-conversion narrative'),
            array('service_feature' => 'Executive delivery coaching'),
        ),
        'service_price' => '$35,000',
        'service_popular' => false,
    ),
    array(
        'service_level' => 'Level 2',
        'service_name' => 'Speaker Mastery',
        'service_description' => 'Establish recognized authority',
        'service_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/IMG_4546.webp'),
        'service_icon' => 'Award',
        'service_features' => array(
            array('service_feature' => 'Multi-audience refinement'),
            array('service_feature' => 'Authority positioning'),
            array('service_feature' => 'Advanced presence training'),
        ),
        'service_price' => '$75,000',
        'service_popular' => true,
    ),
    array(
        'service_level' => 'Level 3',
        'service_name' => 'Executive Visibility',
        'service_description' => 'Expand market visibility',
        'service_image' => array('url' => get_template_directory_uri() . '/assets/images/corporate/executive.webp'),
        'service_icon' => 'Crown',
        'service_features' => array(
            array('service_feature' => 'Private speaking event'),
            array('service_feature' => 'Professional video capture'),
            array('service_feature' => 'Strategic brand positioning'),
        ),
        'service_price' => '$250,000',
        'service_popular' => false,
    ),
));

// Get results from ACF
$results = tim_get_repeater_field('corporate_results_items', array(
    array(
        'result_value' => '40%+',
        'result_label' => 'Sales Activity Increase',
    ),
    array(
        'result_value' => 'Dozens',
        'result_label' => 'New Conversations',
    ),
    array(
        'result_value' => 'High',
        'result_label' => 'Audience Engagement',
    ),
    array(
        'result_value' => 'Strong',
        'result_label' => 'Brand Positioning',
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
            <!-- Hero Section -->
            <section class="relative min-h-[80vh] flex items-center">
                <div class="absolute inset-0">
                    <?php $heroImage = tim_get_image_field('corporate_hero_image', get_template_directory_uri() . '/assets/images/corporate/banner.webp', 'Corporate leadership'); ?>
                    <img src="<?php echo esc_url($heroImage['url']); ?>" alt="<?php echo esc_attr($heroImage['alt']); ?>" class="w-full h-full object-cover opacity-30" />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/50 via-[#0f203d]/30 to-[#0f203d]"></div>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12 text-center">
                    <div class="mb-6">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                            <?php echo esc_html(tim_get_field('corporate_hero_badge', 'For Organizations')); ?>
                        </span>
                    </div>
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight text-[#faf8f5] mb-6">
                        <?php echo esc_html(tim_get_field('corporate_hero_heading', 'Transform Presentations Into Revenue')); ?>
                    </h1>
                    <p class="text-lg md:text-xl text-[#faf8f5]/80 font-light leading-relaxed max-w-2xl mx-auto mb-10">
                        <?php echo esc_html(tim_get_field('corporate_hero_description', 'The True Influence Method™ aligns leadership voice, message clarity, and audience psychology for measurable business outcomes.')); ?>
                    </p>
                    <a href="<?php echo esc_url(tim_get_field('corporate_hero_cta_link', '#services')); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider">
                            <?php echo esc_html(tim_get_field('corporate_hero_cta_text', 'Explore Services')); ?>
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
                            <?php echo esc_html(tim_get_field('corporate_problem_badge', 'The Challenge')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_problem_heading', 'Presentations That Inform But Don\'t Convert')); ?>
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                        <div class="relative overflow-hidden rounded-2xl">
                            <?php $problemImage = tim_get_image_field('corporate_problem_image', get_template_directory_uri() . '/assets/images/corporate/convert.jpg', 'Presentation challenge'); ?>
                            <img
                                src="<?php echo esc_url($problemImage['url']); ?>"
                                alt="<?php echo esc_attr($problemImage['alt']); ?>"
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
                                        <?php echo esc_html($item['problem_item_text']); ?>
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
                            <?php echo esc_html(tim_get_field('corporate_solution_badge', 'The Solution')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_solution_heading', 'True Influence Method™')); ?>
                        </h2>
                        <p class="text-lg text-[#0f203d]/80 font-light max-w-2xl mx-auto">
                            <?php echo esc_html(tim_get_field('corporate_solution_description', 'Every presentation drives measurable business outcomes')); ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach ($solutionItems as $index => $item): ?>
                            <div class="group relative overflow-hidden rounded-2xl">
                                <?php
                                $solutionImgUrl = isset($item['solution_item_image']['url']) ? $item['solution_item_image']['url'] : '';
                                $solutionTitle = isset($item['solution_item_title']) ? $item['solution_item_title'] : '';
                                ?>
                                <img
                                    src="<?php echo esc_url($solutionImgUrl); ?>"
                                    alt="<?php echo esc_attr($solutionTitle); ?>"
                                    class="w-full h-64 md:h-72 object-cover group-hover:scale-105 transition-transform duration-700" />
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] via-[#0f203d]/50 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-8 h-8 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                            <?php echo $iconMap['CheckCircle2']; ?>
                                        </div>
                                        <h3 class="font-serif text-xl text-[#faf8f5]">
                                            <?php echo esc_html($solutionTitle); ?>
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
                            <?php echo esc_html(tim_get_field('corporate_services_badge', 'Services')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_services_heading', 'Three Levels of Transformation')); ?>
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($services as $index => $service): ?>
                            <?php
                            $serviceImgUrl = isset($service['service_image']['url']) ? $service['service_image']['url'] : '';
                            $serviceName = isset($service['service_name']) ? $service['service_name'] : '';
                            $serviceLevel = isset($service['service_level']) ? $service['service_level'] : '';
                            $serviceDescription = isset($service['service_description']) ? $service['service_description'] : '';
                            $serviceIcon = isset($service['service_icon']) ? $service['service_icon'] : 'Target';
                            $serviceFeatures = isset($service['service_features']) ? $service['service_features'] : array();
                            $isPopular = isset($service['service_popular']) ? $service['service_popular'] : false;
                            ?>
                            <div class="group <?php echo $isPopular ? 'bg-[#d4b478]/5 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?> rounded-2xl overflow-hidden hover:border-[#d4b478]/50 transition-all duration-500 relative">
                                <?php if ($isPopular): ?>
                                    <div class="absolute top-4 right-4 bg-[#d4b478] text-[#0f203d] px-3 py-1 text-xs font-bold tracking-[0.2em] uppercase rounded-full z-10">
                                        Popular
                                    </div>
                                <?php endif; ?>
                                <div class="relative h-48 overflow-hidden">
                                    <img
                                        src="<?php echo esc_url($serviceImgUrl); ?>"
                                        alt="<?php echo esc_attr($serviceName); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d] to-transparent"></div>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                            <?php echo isset($iconMap[$serviceIcon]) ? $iconMap[$serviceIcon] : $iconMap['Target']; ?>
                                        </div>
                                        <div>
                                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                                                <?php echo esc_html($serviceLevel); ?>
                                            </span>
                                            <h3 class="font-serif text-xl text-[#faf8f5]">
                                                <?php echo esc_html($serviceName); ?>
                                            </h3>
                                        </div>
                                    </div>
                                    <p class="text-[#faf8f5]/70 font-light text-sm mb-4">
                                        <?php echo esc_html($serviceDescription); ?>
                                    </p>
                                    <ul class="space-y-2 text-sm text-[#faf8f5]/80">
                                        <?php foreach ($serviceFeatures as $feature): ?>
                                            <li class="flex items-start gap-2">
                                                <?php echo $iconMap['ArrowRight']; ?>
                                                <span>
                                                    <?php echo esc_html($feature['service_feature']); ?>
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
                            <?php echo esc_html(tim_get_field('corporate_results_badge', 'Results')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_results_heading', 'Tangible Outcomes')); ?>
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                        <?php foreach ($results as $index => $result): ?>
                            <div class="text-center p-8 bg-[#e7d4c5]/30 border border-[#d4b478]/30 rounded-2xl">
                                <div class="text-4xl md:text-5xl font-serif text-[#d4b478] mb-3">
                                    <?php echo esc_html($result['result_value']); ?>
                                </div>
                                <p class="text-[#0f203d]/80 font-light">
                                    <?php echo esc_html($result['result_label']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="relative rounded-2xl overflow-hidden">
                        <?php $resultsImage = tim_get_image_field('corporate_results_image', get_template_directory_uri() . '/assets/images/corporate/Nested Sequence 04.00_04_11_12.Still004.webp', 'Success story'); ?>
                        <img
                            src="<?php echo esc_url($resultsImage['url']); ?>"
                            alt="<?php echo esc_attr($resultsImage['alt']); ?>"
                            class="w-full h-64 md:h-[80vh] object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0f203d]/90 to-[#0f203d]/60 flex items-center">
                            <div class="px-6 md:px-12 max-w-2xl">
                                <p class="text-2xl md:text-3xl font-serif text-[#faf8f5] italic mb-4">
                                    "<?php echo esc_html(tim_get_field('corporate_results_quote', 'This is not presentation coaching. This is revenue-aligned communication strategy.')); ?>"
                                </p>
                                <p class="text-[#d4b478] font-medium">
                                    — <?php echo esc_html(tim_get_field('corporate_results_attribution', 'True Influence Method™')); ?>
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
                            <?php echo esc_html(tim_get_field('corporate_investment_badge', 'Investment')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(tim_get_field('corporate_investment_heading', 'Choose Your Level')); ?>
                        </h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($services as $index => $service): ?>
                            <?php
                            $serviceLevel = isset($service['service_level']) ? $service['service_level'] : '';
                            $serviceName = isset($service['service_name']) ? $service['service_name'] : '';
                            $servicePrice = isset($service['service_price']) ? $service['service_price'] : '';
                            $serviceIcon = isset($service['service_icon']) ? $service['service_icon'] : 'Target';
                            $isPopular = isset($service['service_popular']) ? $service['service_popular'] : false;
                            $investmentCtaLink = tim_get_field('corporate_investment_cta_link', home_url('/apply'));
                            ?>
                            <div class="p-8 rounded-2xl text-center <?php echo $isPopular ? 'bg-[#d4b478]/10 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10'; ?>">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-[#d4b478]/20 rounded-full mb-4">
                                    <?php echo isset($iconMap[$serviceIcon]) ? $iconMap[$serviceIcon] : $iconMap['Target']; ?>
                                </div>
                                <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-2">
                                    <?php echo esc_html($serviceLevel); ?>
                                </span>
                                <h3 class="font-serif text-xl text-[#faf8f5] mb-4">
                                    <?php echo esc_html($serviceName); ?>
                                </h3>
                                <div class="text-4xl font-serif text-[#d4b478] mb-6">
                                    <?php echo esc_html($servicePrice); ?>
                                </div>
                                <a href="<?php echo esc_url($investmentCtaLink); ?>" class="inline-block bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-6 py-3 rounded-full font-medium transition-all duration-300">
                                    <?php echo esc_html(tim_get_field('corporate_investment_cta_text', 'Get Started')); ?>
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
                        <?php echo esc_html(tim_get_field('corporate_cta_heading', 'Ready to Transform?')); ?>
                    </h2>
                    <p class="text-lg text-[#0f203d]/80 font-light leading-relaxed mb-10">
                        <?php echo esc_html(tim_get_field('corporate_cta_description', 'Let\'s discuss how the True Influence Method™ can help you achieve measurable business outcomes.')); ?>
                    </p>
                    <?php $ctaLink = tim_get_field('corporate_cta_button_link', home_url('/apply')); ?>
                    <a href="<?php echo esc_url($ctaLink); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                        <span class="uppercase tracking-wider">
                            <?php echo esc_html(tim_get_field('corporate_cta_button_text', 'Schedule a Consultation')); ?>
                        </span>
                        <?php echo $iconMap['ArrowRight']; ?>
                    </a>
                </div>
            </section>
        </main>
    </div>

    <?php get_footer(); ?>