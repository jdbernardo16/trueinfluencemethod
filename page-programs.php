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
                    Programs
                </span>
                <h1 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                    Three Offers. One Method. Transformation at Every Level.
                </h1>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                    Joanna offers three distinct paths into True Influence Method™️ — each designed for a different context, depth, and investment. All three are grounded in same rigorous process. All three create lasting change.
                </p>
            </div>
        </section>

        <!-- Private Training -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        Flagship Offer · Private Clients
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d]">
                        Private Training: The Deepest Work Joanna Does.
                    </h2>
                </div>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    Designed for founders, CEOs, and executives who are ready to own their message, develop their signature story, and step fully into thought leadership. This is one-on-one, high-touch, and entirely bespoke.
                </p>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    Private clients work directly with Joanna in a structured 90-day engagement — and join her exclusive quarterly Mastermind & Retreat throughout the time they work together.
                </p>

                <h3 class="font-serif text-2xl text-[#d4b478] mb-8 text-center">Three Levels of Private Training:</h3>

                <div class="grid md:grid-cols-3 gap-8 mb-12">
                    <!-- Beginning -->
                    <?php
                    set_query_var('program_level', 'Beginning');
                    set_query_var('program_title', 'Tell Your Story');
                    set_query_var('program_price', '$20,000');
                    set_query_var('program_description', 'Four private training sessions focused on bravery and clarity of your leadership message. This is where you identify the defining moment behind your work and develop a voice that represents it confidently.');
                    set_query_var('program_link', home_url('/apply/'));
                    get_template_part('template-parts/program-card');
                    ?>

                    <!-- Intermediate -->
                    <?php
                    set_query_var('program_level', 'Intermediate');
                    set_query_var('program_title', 'Move the Room');
                    set_query_var('program_price', '$35,000');
                    set_query_var('program_description', 'Everything in the Beginning level, plus 6 additional trainings focused on developing your signature talk so you can speak clearly and powerfully in rooms, at events, and in leadership settings.');
                    set_query_var('program_link', home_url('/apply/'));
                    get_template_part('template-parts/program-card');
                    ?>

                    <!-- Advanced -->
                    <?php
                    set_query_var('program_level', 'Advanced');
                    set_query_var('program_title', 'Master Your Message');
                    set_query_var('program_price', '$45,000');
                    set_query_var('program_description', 'Everything above, plus 4 delivery trainings so your message lands with emotional resonance and real influence when you speak — helping you stand out and build your brand as a thought leader.');
                    set_query_var('program_link', home_url('/apply/'));
                    get_template_part('template-parts/program-card');
                    ?>
                </div>

                <!-- All private clients receive -->
                <div class="bg-[#faf8f5]/50 p-8 rounded-lg max-w-3xl mx-auto mb-8">
                    <h4 class="font-serif text-xl text-[#0f203d] mb-4">All private clients receive:</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-[#0f203d]/80">Direct access to Joanna throughout engagement</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-[#0f203d]/80">Invitation to quarterly Mastermind & Retreat experiences</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-[#0f203d]/80">A lifetime messaging foundation they own completely</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-[#0f203d]/80">Access to The Vault — Joanna's members' resource library</span>
                        </li>
                    </ul>
                </div>

                <div class="text-center">
                    <a href="<?php echo home_url('/apply/'); ?>"
                        class="inline-block px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20">
                        Apply for Private Training →
                    </a>
                </div>
            </div>
        </section>

        <!-- Speak & Rise -->
        <section class="py-24 md:py-32 bg-[#0f203d]">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="block text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-6">
                        Group Training · Speak & Rise
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                        Speak & Rise: Find Your Voice. Tell Your Story. Lead Your Room.
                    </h2>
                </div>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    Speak & Rise is Joanna's group training experience — a powerful, community-driven program for leaders who are ready to develop their story, sharpen their message, and step into their voice alongside a group of peers doing the same brave work.
                </p>
                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    It is the most accessible entry point into True Influence Method™️ — and it is anything but ordinary.
                </p>

                <!-- What's Included -->
                <div class="grid md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-[#faf8f5]/5 p-6 rounded-lg">
                        <h4 class="font-serif text-lg text-[#d4b478] mb-2">What's Included:</h4>
                        <ul class="space-y-2 text-[#faf8f5]/80">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Live group training sessions with Joanna
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Story development and message clarity framework
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Real-time feedback and structured peer accountability
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Access to The Vault — resource library, tools & replays
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                90-Day Mastermind & Retreat option
                            </li>
                        </ul>
                    </div>
                    <div class="bg-[#d4b478]/10 p-6 rounded-lg flex flex-col justify-center items-center text-center">
                        <p class="text-[#d4b478] text-sm font-medium mb-2">Investment:</p>
                        <p class="text-[#d4b478] text-4xl font-serif mb-4">From $6,000</p>
                        <p class="text-[#faf8f5]/80 text-sm mb-6">90-Day Mastermind & Retreat</p>
                        <a href="<?php echo home_url('/apply/'); ?>"
                            class="inline-block px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all">
                            Join Speak & Rise →
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
                        Organizations & Teams
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8">
                        Corporate Programs: Bring True Influence to Your Organization.
                    </h2>
                </div>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    Joanna works with leadership teams, executive groups, and organizations who want to build a culture of courageous, clear, and authentic communication. Every corporate engagement is fully customized — designed around your team's specific context, goals, and communication challenges.
                </p>
                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    Whether you are preparing leaders for high-stakes presentations, building a stronger executive voice across your organization, or embedding a communication methodology at scale — Joanna's corporate work delivers transformation that is immediately felt and lasting in impact.
                </p>

                <!-- Corporate offerings -->
                <div class="grid md:grid-cols-2 gap-6 mb-12">
                    <div class="bg-[#0f203d] p-6 rounded-lg">
                        <h4 class="font-serif text-lg text-[#d4b478] mb-4">Corporate offerings include:</h4>
                        <ul class="space-y-2 text-[#faf8f5]/80">
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Custom leadership communication workshops and intensives
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Executive presence and message clarity training
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Team storytelling and messaging alignment sessions
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                Keynote delivery and board-level speaking preparation
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 text-[#d4b478] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                                True Influence License — for organizations who want to embed methodology in-house with their own facilitators
                            </li>
                        </ul>
                    </div>
                    <div class="bg-[#0f203d] p-6 rounded-lg flex flex-col justify-center items-center text-center">
                        <p class="text-[#faf8f5]/80 text-lg mb-6">Investment:</p>
                        <p class="text-[#d4b478] text-4xl font-serif mb-2">Custom Pricing</p>
                        <p class="text-[#faf8f5]/60 text-sm mb-6">Based on scope and team size</p>
                        <a href="<?php echo home_url('/apply/'); ?>"
                            class="inline-block px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all">
                            Inquire for Your Organization →
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>