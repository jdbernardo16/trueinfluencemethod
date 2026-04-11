<?php

/**
 * Template Name: Programs Page
 * Description: Programs page template with Private Training, Speak & Rise, and Corporate Programs
 *
 * @package tim-wordpress
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

    <div class="overflow-x-hidden">
        <!-- Hero -->
        <section class="py-24 md:py-32 bg-[#0f203d]">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                    <?php echo esc_html(get_field('programs_hero_badge') ?: 'Programs'); ?>
                </span>
                <h1 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                    <?php echo esc_html(get_field('programs_hero_heading') ?: 'Three Offers. One Method. Transformation at Every Level.'); ?>
                </h1>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                    <?php echo wp_kses_post(get_field('programs_hero_description') ?: 'Joanna offers three distinct paths into True Influence Method™️ — each designed for a different context, depth, and investment. All three are grounded in same rigorous process. All three create lasting change.'); ?>
                </p>
            </div>
        </section>

        <!-- Private Training -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html(get_field('programs_private_badge') ?: 'Flagship Offer · Private Clients'); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d]">
                        <?php echo esc_html(get_field('programs_private_heading') ?: 'Private Training: The Deepest Work Joanna Does.'); ?>
                    </h2>
                </div>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_private_description_1') ?: 'Designed for founders, CEOs, and executives who are ready to own their message, develop their signature story, and step fully into thought leadership. This is one-on-one, high-touch, and entirely bespoke.'); ?>
                </p>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_private_description_2') ?: 'Private clients work directly with Joanna in a structured 90-day engagement — and join her exclusive quarterly Mastermind & Retreat throughout the time they work together.'); ?>
                </p>

                <h3 class="font-serif text-2xl text-[#d4b478] mb-8 text-center"><?php echo esc_html(get_field('programs_private_levels_heading') ?: 'Three Levels of Private Training:'); ?></h3>

                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <?php
                    $private_levels = get_field('programs_private_levels');
                    if ($private_levels) :
                        foreach ($private_levels as $level) :
                            set_query_var('program_level', $level['level_name'] ?: 'Level');
                            set_query_var('program_title', $level['level_title'] ?: 'Program Title');
                            set_query_var('program_price', $level['level_price'] ?: '$0');
                            set_query_var('program_description', $level['level_description'] ?: 'Program description goes here.');
                            set_query_var('program_link', home_url('/apply/'));
                            get_template_part('template-parts/program-card');
                        endforeach;
                    else :
                        // Default fallback if no levels are set
                        $default_levels = [
                            ['level_name' => 'Beginning', 'level_title' => 'Tell Your Story', 'level_price' => '$20,000', 'level_description' => 'Four private training sessions focused on bravery and clarity of your leadership message. This is where you identify the defining moment behind your work and develop a voice that represents it confidently.'],
                            ['level_name' => 'Intermediate', 'level_title' => 'Move the Room', 'level_price' => '$35,000', 'level_description' => 'Everything in the Beginning level, plus 6 additional trainings focused on developing your signature talk so you can speak clearly and powerfully in rooms, at events, and in leadership settings.'],
                            ['level_name' => 'Advanced', 'level_title' => 'Master Your Message', 'level_price' => '$45,000', 'level_description' => 'Everything above, plus 4 delivery trainings so your message lands with emotional resonance and real influence when you speak — helping you stand out and build your brand as a thought leader.'],
                        ];
                        foreach ($default_levels as $level) :
                            set_query_var('program_level', $level['level_name']);
                            set_query_var('program_title', $level['level_title']);
                            set_query_var('program_price', $level['level_price']);
                            set_query_var('program_description', $level['level_description']);
                            set_query_var('program_link', home_url('/apply/'));
                            get_template_part('template-parts/program-card');
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- All private clients receive -->
                <div class="bg-[#faf8f5]/50 p-8 rounded-lg max-w-3xl mx-auto mb-8">
                    <h4 class="font-serif text-xl text-[#0f203d] mb-4"><?php echo esc_html(get_field('programs_private_benefits_heading') ?: 'All private clients receive:'); ?></h4>
                    <ul class="space-y-3">
                        <?php
                        $benefits = get_field('programs_private_benefits');
                        if ($benefits) :
                            foreach ($benefits as $benefit) :
                        ?>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="text-[#0f203d]/80"><?php echo esc_html($benefit['benefit_text']); ?></span>
                                </li>
                            <?php
                            endforeach;
                        else :
                            // Default fallback
                            $default_benefits = [
                                'Direct access to Joanna throughout engagement',
                                'Invitation to quarterly Mastermind & Retreat experiences',
                                'A lifetime messaging foundation they own completely',
                                'Access to The Vault — Joanna\'s members\' resource library',
                            ];
                            foreach ($default_benefits as $benefit) :
                            ?>
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <span class="text-[#0f203d]/80"><?php echo esc_html($benefit); ?></span>
                                </li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

                <div class="text-center">
                    <a href="<?php echo home_url('/apply/'); ?>"
                        class="inline-block px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20">
                        <?php echo esc_html(get_field('programs_private_cta_text') ?: 'Apply for Private Training →'); ?>
                    </a>
                </div>
            </div>
        </section>

        <!-- Speak & Rise -->
        <section class="py-24 md:py-32 bg-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html(get_field('programs_speak_badge') ?: 'Group Training · Speak & Rise'); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                        <?php echo esc_html(get_field('programs_speak_heading') ?: 'Speak & Rise: Find Your Voice. Tell Your Story. Lead Your Room.'); ?>
                    </h2>
                </div>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_speak_description_1') ?: 'Speak & Rise is Joanna\'s group training experience — a powerful, community-driven program for leaders who are ready to develop their story, sharpen their message, and step into their voice alongside a group of peers doing the same brave work.'); ?>
                </p>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_speak_description_2') ?: 'It is the most accessible entry point into True Influence Method™️ — and it is anything but ordinary.'); ?>
                </p>

                <!-- What's Included -->
                <div class="grid md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-[#faf8f5]/5 p-6 rounded-lg">
                        <h4 class="font-serif text-lg text-[#d4b478] mb-2"><?php echo esc_html(get_field('programs_speak_included_heading') ?: 'What\'s Included:'); ?></h4>
                        <ul class="space-y-2 text-[#faf8f5]/80">
                            <?php
                            $included_items = get_field('programs_speak_included_items');
                            if ($included_items) :
                                foreach ($included_items as $item) :
                            ?>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <?php echo esc_html($item['item_text']); ?>
                                    </li>
                                <?php
                                endforeach;
                            else :
                                // Default fallback
                                $default_items = [
                                    'Live group training sessions with Joanna',
                                    'Story development and message clarity framework',
                                    'Real-time feedback and structured peer accountability',
                                    'Access to The Vault — resource library, tools & replays',
                                    '90-Day Mastermind & Retreat option',
                                ];
                                foreach ($default_items as $item) :
                                ?>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <?php echo esc_html($item); ?>
                                    </li>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="bg-[#d4b478]/10 p-6 rounded-lg flex flex-col justify-center items-center text-center">
                        <p class="text-[#d4b478] text-sm font-medium mb-2"><?php echo esc_html(get_field('programs_speak_investment_label') ?: 'Investment:'); ?></p>
                        <p class="text-[#d4b478] text-4xl font-serif mb-4"><?php echo esc_html(get_field('programs_speak_investment_price') ?: 'From $6,000'); ?></p>
                        <p class="text-[#faf8f5]/80 text-sm mb-6"><?php echo esc_html(get_field('programs_speak_investment_note') ?: '90-Day Mastermind & Retreat'); ?></p>
                        <a href="<?php echo home_url('/apply/'); ?>"
                            class="inline-block px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all">
                            <?php echo esc_html(get_field('programs_speak_cta_text') ?: 'Join Speak & Rise →'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Corporate Programs -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        <?php echo esc_html(get_field('programs_corporate_badge') ?: 'Organizations & Teams'); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        <?php echo esc_html(get_field('programs_corporate_heading') ?: 'Corporate Programs: Bring True Influence to Your Organization.'); ?>
                    </h2>
                </div>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_corporate_description_1') ?: 'Joanna works with leadership teams, executive groups, and organizations who want to build a culture of courageous, clear, and authentic communication. Every corporate engagement is fully customized — designed around your team\'s specific context, goals, and communication challenges.'); ?>
                </p>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_corporate_description_2') ?: 'Whether you are preparing leaders for high-stakes presentations, building a stronger executive voice across your organization, or embedding a communication methodology at scale — Joanna\'s corporate work delivers transformation that is immediately felt and lasting in impact.'); ?>
                </p>

                <!-- Corporate offerings -->
                <div class="grid md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-[#0f203d] p-6 rounded-lg">
                        <h4 class="font-serif text-lg text-[#d4b478] mb-4"><?php echo esc_html(get_field('programs_corporate_offerings_heading') ?: 'Corporate offerings include:'); ?></h4>
                        <ul class="space-y-2 text-[#faf8f5]/80">
                            <?php
                            $offerings = get_field('programs_corporate_offerings');
                            if ($offerings) :
                                foreach ($offerings as $offering) :
                            ?>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <?php echo esc_html($offering['offering_text']); ?>
                                    </li>
                                <?php
                                endforeach;
                            else :
                                // Default fallback
                                $default_offerings = [
                                    'Custom leadership communication workshops and intensives',
                                    'Executive presence and message clarity training',
                                    'Team storytelling and messaging alignment sessions',
                                    'Keynote delivery and board-level speaking preparation',
                                    'True Influence License — for organizations who want to embed methodology in-house with their own facilitators',
                                ];
                                foreach ($default_offerings as $offering) :
                                ?>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <?php echo esc_html($offering); ?>
                                    </li>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                    <div class="bg-[#0f203d] p-6 rounded-lg flex flex-col justify-center items-center text-center">
                        <p class="text-[#faf8f5]/80 text-lg mb-6"><?php echo esc_html(get_field('programs_corporate_investment_label') ?: 'Investment:'); ?></p>
                        <p class="text-[#d4b478] text-4xl font-serif mb-2"><?php echo esc_html(get_field('programs_corporate_investment_price') ?: 'Custom Pricing'); ?></p>
                        <p class="text-[#faf8f5]/60 text-sm mb-6"><?php echo esc_html(get_field('programs_corporate_investment_note') ?: 'Based on scope and team size'); ?></p>
                        <a href="<?php echo home_url('/apply/'); ?>"
                            class="inline-block px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all">
                            <?php echo esc_html(get_field('programs_corporate_cta_text') ?: 'Inquire for Your Organization →'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>