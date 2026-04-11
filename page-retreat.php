<?php

/**
 * Template Name: Retreat Page
 * Description: True Influence Retreat page template
 *
 * @package tim-wordpress
 */

// Get retreat features from ACF
$retreatFeatures = get_field('retreat_features') ?: [];

// Get retreat days from ACF
$retreatDays = get_field('retreat_days') ?: [];

// Get retreat highlights from ACF
$retreatHighlights = get_field('retreat_highlights') ?: [];

// Get retreat awards from ACF
$retreatAwards = get_field('retreat_awards') ?: [];

// Icon mapping to SVG (simplified versions)
$iconMap = array(
    'Target' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
    'Users' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
    'Play' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3" /></svg>',
    'BookOpen' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>',
    'Crown' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" /></svg>',
    'Mic' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" /><path d="M19 10v2a7 7 0 0 1-14 0v-2" /><line x1="12" y1="19" x2="12" y2="23" /><line x1="8" y1="23" x2="16" y2="23" /></svg>',
    'TrendingUp' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18" /><polyline points="17 6 23 6 23 12" /></svg>',
    'Award' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7" /><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88" /></svg>',
    'Home' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" /><polyline points="9 22 9 12 15 12 15 22" /></svg>',
    'Sparkles' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.937A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .962 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.582a.5.5 0 0 1 0 .962L15.5 14.063A2 2 0 0 0 14.063 15.5l-1.582 6.135a.5.5 0 0 1-.962 0L9.937 15.5z" /></svg>',
    'Calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2" /><line x1="16" y1="2" x2="16" y2="6" /><line x1="8" y1="2" x2="8" y2="6" /><line x1="3" y1="10" x2="21" y2="10" /></svg>',
    'Clock' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><polyline points="12 6 12 12 16 14" /></svg>',
    'CheckCircle2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" /><polyline points="22 4 12 14.01 9 11.01" /></svg>',
    'Trophy' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6" /><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18" /><path d="M4 22h16" /><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22" /><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22" /><path d="M18 2H6v7a6 6 0 0 0 12 0V2z" /></svg>',
    'Zap' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" /></svg>',
    'ArrowRight' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12" /><polyline points="12 5 19 12 12 19" /></svg>',
    'ChevronDown' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9" /></svg>'
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
                    <?php
                    $heroBackgroundImage = get_field('retreat_hero_background_image');
                    if ($heroBackgroundImage) : ?>
                        <img src="<?php echo esc_url($heroBackgroundImage); ?>" alt="True Influence Retreat" class="w-full h-full object-cover opacity-30" />
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/carousel/img1.webp" alt="True Influence Retreat" class="w-full h-full object-cover opacity-30" />
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/70 via-[#0f203d]/50 to-[#0f203d]" />
                </div>
                <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12 text-center">
                    <div class="mb-6">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                            <?php echo esc_html(get_field('retreat_hero_badge') ?: 'Immersive Experience'); ?>
                        </span>
                    </div>
                    <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl leading-tight text-[#faf8f5] mb-6">
                        <?php echo esc_html(get_field('retreat_hero_heading') ?: 'True Influence Retreat'); ?>
                    </h1>
                    <p class="text-lg md:text-xl text-[#faf8f5]/80 font-light leading-relaxed max-w-2xl mx-auto mb-10">
                        <?php echo esc_html(get_field('retreat_hero_description') ?: 'A transformative 3-day experience where focused work, partner feedback, and live application converge to prepare you for the stage.'); ?>
                    </p>
                </div>
                <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2">
                    <div class="animate-bounce">
                        <?php echo $iconMap['ChevronDown']; ?>
                    </div>
                </div>
            </section>

            <!-- Overview Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            <?php echo esc_html(get_field('retreat_overview_badge') ?: 'Retreat Structure'); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(get_field('retreat_overview_heading') ?: 'All Levels, One Container'); ?>
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-3xl mx-auto mb-8">
                            <?php echo esc_html(get_field('retreat_overview_description') ?: 'This is a supportive working environment, not a passive experience.'); ?>
                        </p>
                        <div class="inline-block bg-[#d4b478]/10 border border-[#d4b478]/30 rounded-full px-6 py-3">
                            <span class="text-[#d4b478] font-medium">
                                <?php echo esc_html(get_field('retreat_overview_badge_text') ?: 'Everything leads to Stage Day'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php foreach ($retreatFeatures as $index => $feature): ?>
                            <div class="group bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-6 hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <?php echo isset($iconMap[$feature['feature_icon']]) ? $iconMap[$feature['feature_icon']] : $iconMap['Target']; ?>
                                </div>
                                <h3 class="font-serif text-xl text-[#faf8f5] mb-2">
                                    <?php echo esc_html($feature['feature_title']); ?>
                                </h3>
                                <p class="text-[#faf8f5]/70 font-light text-sm leading-relaxed">
                                    <?php echo esc_html($feature['feature_description']); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Day Schedule Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            <?php echo esc_html(get_field('retreat_schedule_badge') ?: 'The Journey'); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(get_field('retreat_schedule_heading') ?: 'Three Days to Transformation'); ?>
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            <?php echo esc_html(get_field('retreat_schedule_description') ?: 'From arrival to stage day, every moment is designed for growth'); ?>
                        </p>
                    </div>

                    <div class="space-y-12">
                        <?php
                        $dayColors = [
                            ['bg' => 'from-green-900/20 to-green-900/5', 'border' => 'border-green-500/30', 'accent' => 'text-green-400'],
                            ['bg' => 'from-blue-900/20 to-blue-900/5', 'border' => 'border-blue-500/30', 'accent' => 'text-blue-400'],
                            ['bg' => 'from-yellow-900/20 to-yellow-900/5', 'border' => 'border-yellow-500/30', 'accent' => 'text-yellow-400']
                        ];
                        foreach ($retreatDays as $dayIndex => $day):
                            $colors = $dayColors[$dayIndex % count($dayColors)];
                        ?>
                            <div class="bg-gradient-to-br <?php echo $colors['bg']; ?> border <?php echo $colors['border']; ?> rounded-3xl overflow-hidden">
                                <div class="p-8 md:p-12">
                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
                                        <div class="flex items-center gap-4">
                                            <div class="w-16 h-16 bg-gradient-to-br <?php echo $colors['bg']; ?> border <?php echo $colors['border']; ?> rounded-2xl flex items-center justify-center">
                                                <span class="text-2xl font-serif font-bold text-[#faf8f5]">0<?php echo $day['day_number']; ?></span>
                                            </div>
                                            <div>
                                                <h3 class="font-serif text-2xl md:text-3xl text-[#faf8f5] mb-1">
                                                    <?php echo esc_html($day['day_title']); ?>
                                                </h3>
                                                <p class="text-sm font-medium <?php echo $colors['accent']; ?> tracking-wider uppercase">
                                                    <?php echo esc_html($day['day_theme']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <?php foreach ($day['day_sessions'] as $sessionIndex => $session): ?>
                                            <div class="space-y-4">
                                                <div class="flex items-center gap-3 mb-4">
                                                    <?php echo $iconMap['Calendar']; ?>
                                                    <h4 class="text-lg font-medium text-[#faf8f5] uppercase tracking-wider">
                                                        <?php echo esc_html($session['session_period']); ?>
                                                    </h4>
                                                    <?php if (isset($session['session_time']) && $session['session_time']): ?>
                                                        <div class="flex items-center gap-2 ml-auto">
                                                            <?php echo $iconMap['Clock']; ?>
                                                            <span class="text-sm text-[#faf8f5]/60"><?php echo esc_html($session['session_time']); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="grid grid-cols-1 gap-3">
                                                    <?php foreach ($session['session_activities'] as $activityIndex => $activity): ?>
                                                        <div class="relative p-4 rounded-xl transition-all duration-300 <?php echo isset($activity['activity_highlight']) && $activity['activity_highlight'] ? 'bg-[#d4b478]/10 border-2 border-[#d4b478]/50' : 'bg-[#faf8f5]/5 border border-[#faf8f5]/10 hover:border-[#faf8f5]/30'; ?>">
                                                            <div class="flex items-start gap-3">
                                                                <?php if (isset($activity['activity_highlight']) && $activity['activity_highlight']): ?>
                                                                    <?php echo $iconMap['Sparkles']; ?>
                                                                <?php endif; ?>
                                                                <div class="flex-1">
                                                                    <div class="flex items-center gap-2 mb-1">
                                                                        <?php if (isset($activity['activity_time']) && $activity['activity_time']): ?>
                                                                            <span class="text-xs <?php echo $colors['accent']; ?> font-medium"><?php echo esc_html($activity['activity_time']); ?></span>
                                                                        <?php endif; ?>
                                                                        <h5 class="font-medium text-[#faf8f5]"><?php echo esc_html($activity['activity_title']); ?></h5>
                                                                        <?php if (isset($activity['activity_special_note'])): ?>
                                                                            <?php echo $iconMap['Award']; ?>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    <?php if (isset($activity['activity_description']) && $activity['activity_description']): ?>
                                                                        <p class="text-[#faf8f5]/70 font-light text-sm"><?php echo esc_html($activity['activity_description']); ?></p>
                                                                    <?php endif; ?>
                                                                    <?php if (isset($activity['activity_special_note'])): ?>
                                                                        <span class="inline-block mt-2 text-xs text-[#d4b478] font-medium tracking-wider uppercase"><?php echo esc_html($activity['activity_special_note']); ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Experience Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            <?php echo esc_html(get_field('retreat_experience_badge') ?: 'The Experience'); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(get_field('retreat_experience_heading') ?: 'Not Just Training. Transformation.'); ?>
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            <?php echo esc_html(get_field('retreat_experience_description') ?: 'This is a supportive working environment where every moment leads to growth'); ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <?php foreach ($retreatHighlights as $index => $highlight): ?>
                            <div class="group bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl overflow-hidden hover:border-[#d4b478]/50 hover:bg-[#d4b478]/5 transition-all duration-300">
                                <div class="relative p-8">
                                    <div class="w-16 h-16 bg-[#d4b478]/20 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                        <?php echo isset($iconMap[$highlight['highlight_icon']]) ? $iconMap[$highlight['highlight_icon']] : $iconMap['Zap']; ?>
                                    </div>
                                    <h3 class="font-serif text-2xl text-[#faf8f5] mb-4">
                                        <?php echo esc_html($highlight['highlight_title']); ?>
                                    </h3>
                                    <p class="text-[#faf8f5]/70 font-light leading-relaxed">
                                        <?php echo esc_html($highlight['highlight_description']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-16 text-center">
                        <div class="bg-[#0f203d]/50 border border-[#d4b478]/30 rounded-2xl p-8 md:p-12">
                            <div class="flex items-center justify-center gap-4 mb-6">
                                <?php echo $iconMap['Zap']; ?>
                                <h3 class="font-serif text-2xl md:text-3xl text-[#faf8f5]">
                                    <?php echo esc_html(get_field('retreat_callout_title') ?: 'Every Activity Has Purpose'); ?>
                                </h3>
                            </div>
                            <p class="text-lg text-[#faf8f5]/80 font-light max-w-3xl mx-auto leading-relaxed">
                                <?php echo esc_html(get_field('retreat_callout_description') ?: 'From focused work sessions to partner feedback, from pod integration to stage performance - every element is designed to build your confidence and prepare you for the spotlight.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stages Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <div class="text-center mb-16">
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            <?php echo esc_html(get_field('retreat_stages_badge') ?: 'Stage Day'); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(get_field('retreat_stages_heading') ?: 'Be Seen and Celebrated'); ?>
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light max-w-2xl mx-auto">
                            <?php echo esc_html(get_field('retreat_stages_description') ?: 'The culmination of your journey - deliver your talk with real-time feedback and recognition'); ?>
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
                        <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                    <?php echo $iconMap['Mic']; ?>
                                </div>
                                <h3 class="font-serif text-2xl text-[#faf8f5]">
                                    <?php echo esc_html(get_field('retreat_stage_experience_heading') ?: 'The Stage Experience'); ?>
                                </h3>
                            </div>
                            <div class="space-y-4">
                                <?php
                                $stageExperienceItems = get_field('retreat_stage_experience_items') ?: [];
                                if (!empty($stageExperienceItems)) :
                                    foreach ($stageExperienceItems as $item) : ?>
                                        <div class="flex items-start gap-3">
                                            <?php echo $iconMap['CheckCircle2']; ?>
                                            <p class="text-[#faf8f5]/80 font-light"><?php echo esc_html($item['stage_experience_item']); ?></p>
                                        </div>
                                    <?php endforeach;
                                else : ?>
                                    <div class="flex items-start gap-3">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <p class="text-[#faf8f5]/80 font-light">Set intention & feedback framework</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <p class="text-[#faf8f5]/80 font-light">Each participant delivers their talk</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <p class="text-[#faf8f5]/80 font-light">Audience scans QR code & completes rubric in real time</p>
                                    </div>
                                    <div class="flex items-start gap-3">
                                        <?php echo $iconMap['CheckCircle2']; ?>
                                        <p class="text-[#faf8f5]/80 font-light">Scores populated instantly</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-12 h-12 bg-[#d4b478]/20 rounded-full flex items-center justify-center">
                                    <?php echo $iconMap['TrendingUp']; ?>
                                </div>
                                <h3 class="font-serif text-2xl text-[#faf8f5]">
                                    <?php echo esc_html(get_field('retreat_qualification_heading') ?: 'Qualification'); ?>
                                </h3>
                            </div>
                            <p class="text-[#faf8f5]/80 font-light leading-relaxed mb-6">
                                <?php echo esc_html(get_field('retreat_qualification_description') ?: 'Scores determine your advancement through the program, recognize top speakers, and identify promotions to the next level.'); ?>
                            </p>
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <?php
                                $qualificationItems = get_field('retreat_qualification_items') ?: [];
                                if (!empty($qualificationItems)) :
                                    foreach ($qualificationItems as $item) : ?>
                                        <div class="p-4 bg-[#d4b478]/10 rounded-xl">
                                            <?php echo isset($iconMap[$item['qualification_item_icon']]) ? $iconMap[$item['qualification_item_icon']] : $iconMap['Trophy']; ?>
                                            <p class="text-xs text-[#faf8f5]/80 font-medium mt-2"><?php echo esc_html($item['qualification_item_label']); ?></p>
                                        </div>
                                    <?php endforeach;
                                else : ?>
                                    <div class="p-4 bg-[#d4b478]/10 rounded-xl">
                                        <?php echo $iconMap['Trophy']; ?>
                                        <p class="text-xs text-[#faf8f5]/80 font-medium mt-2">Top Speakers</p>
                                    </div>
                                    <div class="p-4 bg-[#d4b478]/10 rounded-xl">
                                        <?php echo $iconMap['TrendingUp']; ?>
                                        <p class="text-xs text-[#faf8f5]/80 font-medium mt-2">Advancement</p>
                                    </div>
                                    <div class="p-4 bg-[#d4b478]/10 rounded-xl">
                                        <?php echo $iconMap['Users']; ?>
                                        <p class="text-xs text-[#faf8f5]/80 font-medium mt-2">Next Level</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="text-center mb-10">
                            <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase">
                                <?php echo esc_html(get_field('retreat_awards_badge') ?: 'Awards & Recognition'); ?>
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <?php foreach ($retreatAwards as $index => $award): ?>
                                <div class="bg-[#0f203d]/50 border border-[#faf8f5]/10 rounded-2xl p-6 text-center hover:border-[#d4b478]/50 transition-all duration-300">
                                    <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <?php echo $iconMap['Award']; ?>
                                    </div>
                                    <h4 class="font-serif text-xl text-[#faf8f5] mb-3">
                                        <?php echo esc_html($award['award_title']); ?>
                                    </h4>
                                    <p class="text-[#faf8f5]/70 font-light text-sm leading-relaxed">
                                        <?php echo esc_html($award['award_description']); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-20 md:py-28 bg-[#0f203d]">
                <div class="max-w-4xl mx-auto px-6 md:px-12 text-center">
                    <div>
                        <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mx-auto mb-8">
                            <?php echo $iconMap['Award']; ?>
                        </div>
                        <span class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase block mb-4">
                            <?php echo esc_html(get_field('retreat_cta_badge') ?: 'Your Next Step'); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                            <?php echo esc_html(get_field('retreat_cta_heading') ?: 'Ready to Transform?'); ?>
                        </h2>
                        <p class="text-lg text-[#faf8f5]/80 font-light leading-relaxed mb-10 max-w-2xl mx-auto">
                            <?php echo esc_html(get_field('retreat_cta_description') ?: 'Join the True Influence Retreat and experience three days of focused work, partner feedback, and stage performance that will elevate your leadership presence.'); ?>
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <?php
                            $ctaButtonLink = get_field('retreat_cta_button_link');
                            if ($ctaButtonLink) : ?>
                                <a href="<?php echo esc_url($ctaButtonLink); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                                    <span class="uppercase tracking-wider"><?php echo esc_html(get_field('retreat_cta_button_text') ?: 'Apply Now'); ?></span>
                                    <?php echo $iconMap['ArrowRight']; ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php echo home_url('/#contact'); ?>" class="inline-flex items-center gap-2 bg-[#d4b478] hover:bg-[#b87d1f] text-[#0f203d] px-8 py-4 rounded-full font-medium transition-all duration-300 shadow-lg hover:shadow-xl cursor-pointer">
                                    <span class="uppercase tracking-wider"><?php echo esc_html(get_field('retreat_cta_button_text') ?: 'Apply Now'); ?></span>
                                    <?php echo $iconMap['ArrowRight']; ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="mt-12 p-6 bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded-xl">
                            <p class="text-[#faf8f5]/60 font-light italic text-sm">
                                <?php echo esc_html(get_field('retreat_quote') ?: '"This retreat isn\'t just about learning to speak - it\'s about discovering the power of your voice and learning to use it with impact."'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php get_footer(); ?>
</body>

</html>