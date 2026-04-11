<?php

/**
 * Template Name: 90-Day Mastermind Page
 * Description: 90-Day Mastermind self-guided program page template
 *
 * @package tim-wordpress
 */

// Define mastermind features
$mastermindFeatures = array(
    array(
        'title' => 'Self-Guided Video Trainings',
        'description' => '4–6 expertly crafted video trainings per phase, designed for deep learning and practical application',
        'icon' => 'Play'
    ),
    array(
        'title' => 'True Influence Method Journal',
        'description' => 'Strategic prompts accompanying each training to deepen reflection and integrate learning',
        'icon' => 'BookOpen'
    ),
    array(
        'title' => 'Community Message Board',
        'description' => 'Connect with fellow students, share insights, and receive peer support throughout your journey',
        'icon' => 'Users'
    ),
    array(
        'title' => 'Quarterly Retreat Speaking Slot',
        'description' => 'Reserved opportunity to deliver your talk at our exclusive quarterly retreat events',
        'icon' => 'Mic'
    ),
    array(
        'title' => 'Rubric-Based Advancement',
        'description' => 'Clear, measurable criteria to track progress and qualify for the next phase',
        'icon' => 'TrendingUp'
    ),
    array(
        'title' => 'Flexible Upgrade Path',
        'description' => 'Students seeking deeper transformation can upgrade to Private Client at any time',
        'icon' => 'Crown'
    )
);

// Define program phases
$programPhases = array(
    array(
        'phase' => 1,
        'title' => 'Foundation Phase',
        'theme' => 'Discover Your Story',
        'duration' => '30 Days',
        'trainings' => array(
            'Naming Your Story',
            'The Truth Behind Your Work',
            'Your Defining Moment',
            'Finding Your Voice',
            'Introduction to Presence'
        ),
        'focus' => 'Uncover the authentic narrative that defines your leadership and message',
        'color' => 'from-purple-900/20 to-purple-900/5',
        'border' => 'border-purple-500/30',
        'accent' => 'text-purple-400'
    ),
    array(
        'phase' => 2,
        'title' => 'Development Phase',
        'theme' => 'Craft Your Message',
        'duration' => '30 Days',
        'trainings' => array(
            'Structuring Your Talk',
            'The Emotional Arc',
            'Opening with Impact',
            'Closing with Power',
            'Story Integration',
            'Voice and Delivery Basics'
        ),
        'focus' => 'Transform your story into a compelling, structured message that resonates',
        'color' => 'from-blue-900/20 to-blue-900/5',
        'border' => 'border-blue-500/30',
        'accent' => 'text-blue-400'
    ),
    array(
        'phase' => 3,
        'title' => 'Mastery Phase',
        'theme' => 'Own Your Stage',
        'duration' => '30 Days',
        'trainings' => array(
            'Commanding Presence',
            'Reading the Room',
            'Handling Q&A with Confidence',
            'Authentic Connection',
            'Advanced Delivery Techniques'
        ),
        'focus' => 'Master the art of delivery and connect authentically with any audience',
        'color' => 'from-green-900/20 to-green-900/5',
        'border' => 'border-green-500/30',
        'accent' => 'text-green-400'
    )
);

// Define what's included
$whatsIncluded = array(
    array(
        'title' => 'Complete Video Library',
        'description' => 'Access to all 15+ expert video trainings across three phases, available on-demand',
        'icon' => 'Play'
    ),
    array(
        'title' => 'Digital Journal System',
        'description' => 'Interactive journal with guided prompts for each training to deepen your learning',
        'icon' => 'BookOpen'
    ),
    array(
        'title' => 'Private Community',
        'description' => 'Exclusive access to our message board for peer connection and support',
        'icon' => 'Users'
    ),
    array(
        'title' => 'Retreat Speaking Opportunity',
        'description' => 'Reserved slot to present at our quarterly retreat with real-time feedback',
        'icon' => 'Mic'
    ),
    array(
        'title' => 'Progress Tracking',
        'description' => 'Clear rubrics and milestones to measure your growth and advancement',
        'icon' => 'TrendingUp'
    ),
    array(
        'title' => 'Lifetime Access',
        'description' => 'Retain access to all materials even after program completion',
        'icon' => 'CheckCircle2'
    )
);

// Define advancement criteria
$advancementCriteria = array(
    array(
        'title' => 'Complete All Trainings',
        'description' => 'Watch and engage with all video trainings in your current phase'
    ),
    array(
        'title' => 'Journal Submissions',
        'description' => 'Submit thoughtful responses to journal prompts for each training'
    ),
    array(
        'title' => 'Community Engagement',
        'description' => 'Participate actively in the message board with peers'
    ),
    array(
        'title' => 'Self-Assessment',
        'description' => 'Complete the phase rubric to demonstrate understanding and application'
    )
);

// Icon mapping to SVG
$iconMap = array(
    'Play' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3" /></svg>',
    'BookOpen' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>',
    'Users' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
    'Mic' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" /><path d="M19 10v2a7 7 0 0 1-14 0v-2" /><line x1="12" y1="19" x2="12" y2="23" /><line x1="8" y1="23" x2="16" y2="23" /></svg>',
    'TrendingUp' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18" /><polyline points="17 6 23 6 23 12" /></svg>',
    'Crown' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="48" viewBox="0 0 24 24" fill="none" stroke="#0f203d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
    'ChevronDown' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9" /></svg>',
    'Zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" /></svg>',
    'Award' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" /></svg>'
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
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/carousel/img1.webp" alt="90-Day Mastermind" class="w-full h-full object-cover opacity-30" />
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/70 via-[#0f203d]/50 to-[#0f203d]"></div>
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12 text-center">
                    <div class="mb-6">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                            Self-Guided Transformation
                        </span>
                    </div>
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight text-[#faf8f5] mb-6">
                        90-Day Mastermind
                    </h1>
                    <p class="text-lg md:text-xl text-[#faf8f5]/80 font-light leading-relaxed max-w-2xl mx-auto mb-10">
                        A structured journey of self-discovery and mastery. Transform your story, craft your message, and own your stage—at your own pace.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="<?php echo home_url('/#contact'); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                            <span class="uppercase tracking-wider">Begin Your Journey</span>
                            <?php echo $iconMap['ArrowRight']; ?>
                        </a>
                    </div>
                </div>
                <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2">
                    <div class="animate-bounce">
                        <?php echo $iconMap['ChevronDown']; ?>
                    </div>
                </div>
            </section>

            <!-- Overview Section -->
            <section class="py-20 md:py-28 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div>
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                                The Program
                            </span>
                            <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                                Self-Study. Self-Advancement.
                            </h2>
                            <p class="text-lg text-[#0f203d]/80 font-light max-w-3xl mb-8">
                                The 90-Day Mastermind is designed for leaders who value autonomy and structure. Progress through three carefully crafted phases, each building on the last, as you discover, develop, and master your authentic voice.
                            </p>
                            <div class="inline-block bg-[#d4b478]/10 border border-[#d4b478]/30 rounded-full px-6 py-3">
                                <span class="text-[#d4b478] font-medium">
                                    Your Journey, Your Timeline
                                </span>
                            </div>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/carousel/img2.webp" alt="Mastermind Program" class="w-full h-auto object-cover" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($mastermindFeatures as $index => $feature): ?>
                            <div class="group bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <?php echo isset($iconMap[$feature['icon']]) ? $iconMap[$feature['icon']] : $iconMap['Zap']; ?>
                                </div>
                                <h3 class="font-serif text-xl text-[#0f203d] mb-2">
                                    <?php echo esc_html($feature['title']); ?>
                                </h3>
                                <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                    <?php echo esc_html($feature['description']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Program Phases Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            The Journey
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Three Phases to Mastery
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            Each phase builds upon the last, creating a comprehensive path to authentic leadership communication
                        </p>
                    </div>

                    <div class="space-y-8">
                        <?php foreach ($programPhases as $phaseIndex => $phase): ?>
                            <div class="bg-gradient-to-br <?php echo $phase['color']; ?> border <?php echo $phase['border']; ?> rounded-3xl overflow-hidden">
                                <div class="p-8 md:p-12">
                                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6 mb-8">
                                        <div class="flex items-start gap-4">
                                            <div class="w-16 h-16 bg-gradient-to-br <?php echo $phase['color']; ?> border <?php echo $phase['border']; ?> rounded-2xl flex items-center justify-center flex-shrink-0">
                                                <span class="text-2xl font-serif font-bold text-[#faf8f5]">0<?php echo $phase['phase']; ?></span>
                                            </div>
                                            <div>
                                                <h3 class="font-serif text-2xl md:text-3xl text-[#faf8f5] mb-1">
                                                    <?php echo esc_html($phase['title']); ?>
                                                </h3>
                                                <p class="text-sm font-medium <?php echo $phase['accent']; ?> tracking-wider uppercase mb-2">
                                                    <?php echo esc_html($phase['theme']); ?>
                                                </p>
                                                <p class="text-[#faf8f5]/60 text-sm">
                                                    <?php echo esc_html($phase['duration']); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="max-w-md">
                                            <p class="text-[#faf8f5]/80 font-light text-sm leading-relaxed">
                                                <?php echo esc_html($phase['focus']); ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="bg-[#0f203d]/30 rounded-2xl p-6">
                                        <h4 class="text-sm font-medium text-[#d4b478] uppercase tracking-wider mb-4">
                                            Video Trainings
                                        </h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                                            <?php foreach ($phase['trainings'] as $training): ?>
                                                <div class="flex items-center gap-2 text-[#faf8f5]/80 text-sm">
                                                    <div class="w-1.5 h-1.5 bg-[#d4b478] rounded-full"></div>
                                                    <?php echo esc_html($training); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- What's Included Section -->
            <section class="py-20 md:py-28 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div>
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                                What You Receive
                            </span>
                            <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                                Everything You Need to Succeed
                            </h2>
                            <p class="text-lg text-[#0f203d]/80 font-light max-w-2xl mb-8">
                                A complete toolkit designed to support your transformation from start to finish
                            </p>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/carousel/img3.webp" alt="Mastermind Resources" class="w-full h-auto object-cover" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($whatsIncluded as $index => $item): ?>
                            <div class="group bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <?php echo isset($iconMap[$item['icon']]) ? $iconMap[$item['icon']] : $iconMap['Zap']; ?>
                                </div>
                                <h3 class="font-serif text-xl text-[#0f203d] mb-2">
                                    <?php echo esc_html($item['title']); ?>
                                </h3>
                                <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                    <?php echo esc_html($item['description']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Advancement Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            How You Advance
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Earn Your Progress
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            Advancement is earned through engagement and demonstrated understanding. Each phase has clear criteria you must meet before moving forward.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                        <?php foreach ($advancementCriteria as $index => $criteria): ?>
                            <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-6 flex items-start gap-4">
                                <div class="w-10 h-10 bg-[#d4b478]/20 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-[#d4b478] font-bold"><?php echo $index + 1; ?></span>
                                </div>
                                <div>
                                    <h3 class="font-serif text-lg text-[#faf8f5] mb-2">
                                        <?php echo esc_html($criteria['title']); ?>
                                    </h3>
                                    <p class="text-[#faf8f5]/70 font-light text-sm">
                                        <?php echo esc_html($criteria['description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="bg-[#d4b478]/10 border-2 border-[#d4b478]/30 rounded-2xl p-8 md:p-12 text-center">
                        <div class="flex items-center justify-center gap-3 mb-6">
                            <?php echo $iconMap['Award']; ?>
                            <h3 class="font-serif text-2xl md:text-3xl text-[#faf8f5]">
                                The Rubric System
                            </h3>
                        </div>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-3xl mx-auto leading-relaxed mb-6">
                            Each phase concludes with a self-assessment rubric that measures your understanding and application of key concepts. This ensures you've genuinely integrated the learning before advancing—creating a foundation that builds confidence and capability.
                        </p>
                        <p class="text-[#d4b478] font-medium">
                            Pass the rubric to unlock the next phase
                        </p>
                    </div>
                </div>
            </section>

            <!-- Why This Works Section (Light) -->
            <section class="py-20 md:py-28 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                        <div>
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                                Why This Works
                            </span>
                            <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                                A Proven Path to Transformation
                            </h2>
                            <p class="text-lg text-[#0f203d]/80 font-light max-w-3xl mb-8">
                                The 90-Day Mastermind combines structure, community, and accountability to create lasting change in how you communicate and lead.
                            </p>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/carousel/img4.webp" alt="Transformation Journey" class="w-full h-auto object-cover" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Structured Progression
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Each phase builds intentionally on the last, ensuring you develop foundational skills before advancing to more complex concepts.
                            </p>
                        </div>

                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Peer Connection
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Join a community of like-minded leaders who share insights, provide feedback, and support each other's growth journey.
                            </p>
                        </div>

                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Measurable Growth
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Clear rubrics and advancement criteria ensure you're genuinely integrating learning before moving forward.
                            </p>
                        </div>

                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Reflective Practice
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Guided journal prompts help you deepen understanding and connect training content to your unique leadership context.
                            </p>
                        </div>

                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" />
                                    <path d="M19 10v2a7 7 0 0 1-14 0v-2" />
                                    <line x1="12" y1="19" x2="12" y2="23" />
                                    <line x1="8" y1="23" x2="16" y2="23" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Real Application
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Quarterly retreat speaking opportunities give you a real stage to practice and receive authentic feedback.
                            </p>
                        </div>

                        <div class="bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-2xl p-8 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="7" />
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" />
                                </svg>
                            </div>
                            <h3 class="font-serif text-xl text-[#0f203d] mb-3">
                                Flexible Pacing
                            </h3>
                            <p class="text-[#0f203d]/70 font-light text-sm leading-relaxed">
                                Self-guided format lets you progress at your own pace while maintaining structure and accountability.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Upgrade Path Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            Your Options
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            Want More?
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            The Mastermind is a powerful foundation. When you're ready for deeper transformation, you can upgrade to Private Client at any time.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                    <?php echo $iconMap['Zap']; ?>
                                </div>
                                <h3 class="font-serif text-2xl text-[#faf8f5]">
                                    90-Day Mastermind
                                </h3>
                            </div>
                            <ul class="space-y-3 mb-6">
                                <?php foreach (['Self-guided video trainings', 'Interactive journal prompts', 'Community message board access', 'Quarterly retreat speaking slot', 'Rubric-based advancement'] as $item): ?>
                                    <li class="flex items-center gap-3 text-[#faf8f5]/80 text-sm">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <?php echo esc_html($item); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-[#d4b478] font-medium">
                                Self-paced, self-directed learning
                            </p>
                        </div>

                        <div class="bg-[#d4b478]/10 border-2 border-[#d4b478]/50 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                    <?php echo $iconMap['Crown']; ?>
                                </div>
                                <h3 class="font-serif text-2xl text-[#faf8f5]">
                                    Upgrade to Private Client
                                </h3>
                            </div>
                            <ul class="space-y-3 mb-6">
                                <?php foreach (['Everything in Mastermind', 'Private 1:1 advisory sessions', 'Individualized training path', 'Personalized insights from Joanna', 'Auto-enrollment in Kajabi portal'] as $item): ?>
                                    <li class="flex items-center gap-3 text-[#faf8f5]/80 text-sm">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <?php echo esc_html($item); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="text-[#d4b478] font-medium">
                                Upgrade available at any time
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-20 md:py-28 bg-[#faf8f5] text-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="grid md:grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-8">
                                <?php echo $iconMap['Zap']; ?>
                            </div>
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                                Your Transformation Begins
                            </span>
                            <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                                Ready to Find Your Voice?
                            </h2>
                            <p class="text-lg text-[#0f203d]/80 font-light leading-relaxed mb-10 max-w-2xl">
                                The 90-Day Mastermind gives you the structure, tools, and community to transform your story into powerful leadership communication. Begin your journey today.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-10">
                                <a href="<?php echo home_url('/#contact'); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                                    <span class="uppercase tracking-wider">Start Your Journey</span>
                                    <?php echo $iconMap['ArrowRight']; ?>
                                </a>
                            </div>

                            <div class="p-6 bg-[#0f203d]/5 border border-[#0f203d]/10 rounded-xl">
                                <p class="text-[#0f203d]/60 font-light italic text-sm">
                                    "The path to authentic influence isn't found—it's forged through courage, practice, and the willingness to be seen."
                                </p>
                            </div>
                        </div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/joanna2.webp" alt="Joanna Horton McPherson" class="w-full h-auto object-cover" />
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php get_footer(); ?>
</body>

</html>