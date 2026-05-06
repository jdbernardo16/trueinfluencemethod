<?php

/**
 * Template Name: Events Page
 * Description: Community events and workshops page template
 *
 * @package tim-wordpress
 */

// Get events data from ACF
$events = tim_get_repeater_field('events_past_events', array(
    array(
        'event_type' => 'Speaker Training',
        'event_title' => 'Speak & Rise Speaker Training',
        'event_description' => 'An intensive workshop focused on developing authentic presence and delivering your message with impact.',
        'event_image' => get_template_directory_uri() . '/assets/images/carousel/img5.webp',
    ),
    array(
        'event_type' => 'Leadership Intensive',
        'event_title' => 'Leadership Intensives',
        'event_description' => 'Deep-dive sessions focused on authentic leadership and finding your voice as a leader.',
        'event_image' => get_template_directory_uri() . '/assets/images/carousel/img1.webp',
    ),
    array(
        'event_type' => 'Strategy Days',
        'event_title' => 'Invitation-Only Strategy Days',
        'event_description' => 'Exclusive strategy sessions with Joanna for private clients looking to accelerate their growth.',
        'event_image' => get_template_directory_uri() . '/assets/images/carousel/img4.webp',
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

    <div class="overflow-x-hidden">
        <!-- Hero Section -->
        <section class="relative py-20 md:py-32 flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img8.webp'); ?>"
                     alt=""
                     class="w-full h-full object-cover opacity-30"
                     fetchpriority="high" />
                <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d]/85 via-[#0f203d]/75 to-[#0f203d]/90"></div>
            </div>

            <!-- Decorative elements -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    <?php echo esc_html(tim_get_field('events_hero_badge', 'Quarterly Experiences')); ?>
                </span>

                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html(tim_get_field('events_hero_heading', 'Quarterly Retreats & Events')); ?>
                </h1>

                <div class="max-w-3xl mx-auto">
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-6">
                        <?php echo esc_html(tim_get_field('events_hero_description_1', 'Private clients and Mastermind members join Joanna for quarterly retreat experiences — intimate, immersive days designed to deepen clarity, accelerate momentum, and reconnect with the community of leaders doing this work.')); ?>
                    </p>
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                        <?php echo esc_html(tim_get_field('events_hero_description_2', 'These are not conferences. They are transformational rooms — places where real work happens and real connections are made.')); ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Past Events Section -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        <?php echo esc_html(tim_get_field('events_past_badge', 'Past Events')); ?>
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                        <?php echo esc_html(tim_get_field('events_past_heading', 'Transformational Experiences')); ?>
                    </h2>
                    <p class="text-[#0f203d]/70 text-lg max-w-2xl mx-auto">
                        <?php echo esc_html(tim_get_field('events_past_description', 'Discover the kinds of events our community has experienced together.')); ?>
                    </p>
                </div>

                <!-- Event Cards -->
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ($events as $event): ?>
                        <?php
                        set_query_var('event_type', $event['event_type']);
                        set_query_var('event_title', $event['event_title']);
                        set_query_var('event_description', $event['event_description']);
                        set_query_var('event_image', $event['event_image']);
                        get_template_part('template-parts/event-card');
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- What to Expect Section -->
        <section class="py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#d4b478]/10 rounded-full blur-[120px]"></div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        <?php echo esc_html(tim_get_field('events_expect_badge', 'What to Expect')); ?>
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                        <?php echo esc_html(tim_get_field('events_expect_heading', 'More Than Just Events')); ?>
                    </h2>
                    <p class="text-[#faf8f5]/70 text-lg max-w-2xl mx-auto">
                        <?php echo esc_html(tim_get_field('events_expect_description', 'Our retreats and events are carefully designed experiences that create lasting transformation.')); ?>
                    </p>
                </div>

                <!-- Visual break image -->
                <div class="relative rounded-2xl overflow-hidden h-64 md:h-80 mb-16">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img1.webp'); ?>"
                         alt=""
                         class="w-full h-full object-cover"
                         loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 via-[#0f203d]/30 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-[#d4b478]/20 text-8xl md:text-9xl font-serif italic select-none">&amp;</span>
                    </div>
                </div>

                <?php
                $features = tim_get_repeater_field('events_expect_features', array(
                    array(
                        'feature_title' => 'Deep Connection',
                        'feature_description' => 'Build meaningful relationships with other leaders committed to authentic communication.',
                    ),
                    array(
                        'feature_title' => 'Real Work',
                        'feature_description' => 'Engage in practical exercises that deepen your clarity and accelerate your progress.',
                    ),
                    array(
                        'feature_title' => 'Momentum',
                        'feature_description' => 'Leave with renewed energy and clear next steps for your leadership journey.',
                    ),
                    array(
                        'feature_title' => 'Community',
                        'feature_description' => 'Join a growing network of leaders who support each other\'s growth long after the event.',
                    ),
                ));
                ?>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ($features as $index => $feature): ?>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-[#d4b478]/20 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <?php
                                // Use different icons based on index
                                $icons = array(
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" /></svg>',
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" /><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>',
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><polygon points="10 8 16 12 10 16 10 8" /></svg>',
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#d4b478" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M23 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>',
                                );
                                echo isset($icons[$index]) ? $icons[$index] : $icons[0];
                                ?>
                            </div>
                            <h3 class="font-serif text-lg text-[#faf8f5] mb-2"><?php echo esc_html($feature['feature_title']); ?></h3>
                            <p class="text-[#faf8f5]/60 text-sm"><?php echo esc_html($feature['feature_description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 md:py-32 text-[#faf8f5] relative overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img7.webp'); ?>"
                     alt=""
                     class="w-full h-full object-cover"
                     loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
            </div>
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#d4b478]/10 rounded-full blur-[120px]"></div>

            <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
                <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                    <?php echo esc_html(tim_get_field('events_cta_heading', 'Ready to Join Our Next Retreat?')); ?>
                </h2>

                <p class="text-[#faf8f5]/70 text-lg leading-relaxed mb-10 max-w-2xl mx-auto">
                    <?php echo esc_html(tim_get_field('events_cta_description', 'Private clients and Mastermind members receive exclusive access to our quarterly retreat experiences. Apply today to begin your journey.')); ?>
                </p>

                <?php
                $primary_link = tim_get_field('events_cta_primary_link', '');
                $primary_url = $primary_link ? get_permalink($primary_link) : home_url('/apply/');
                $secondary_link = tim_get_field('events_cta_secondary_link', '');
                $secondary_url = $secondary_link ? get_permalink($secondary_link) : home_url('/programs/');
                ?>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo esc_url($primary_url); ?>"
                        class="inline-flex items-center justify-center gap-3 bg-[#d4b478] text-white text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300">
                        <?php echo esc_html(tim_get_field('events_cta_primary_text', 'Apply to Work With Joanna')); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>