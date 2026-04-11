<?php

/**
 * Template Name: Journey Page
 * Description: The 5-phase journey page template
 *
 * @package tim-wordpress
 */

// Get phases from ACF repeater
$phases = get_field('journey_phases');

// Fallback to default phases if ACF is not set
if (empty($phases)) {
    $phases = array(
        array(
            'number' => 'Phase One',
            'title' => 'Discover',
            'subtitle' => 'The Defining Moment',
            'description' => 'Before any message can be crafted, truth must be found. In this phase, Joanna\'s interview-based process uncovers the defining moment behind your work — the experience that shaped your leadership, your values, and your vision. Most leaders have never named it. This is where it surfaces.',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img1.webp',
            'order' => 'image-first'
        ),
        array(
            'number' => 'Phase Two',
            'title' => 'Clarify',
            'subtitle' => 'Your Core Message',
            'description' => 'From your story, we build your message. Not a tagline. Not an elevator pitch. A clear, resonant expression of who you are, what you stand for, and why it matters — articulated in language that is authentically yours and unmistakably powerful.',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img2.webp',
            'order' => 'text-first'
        ),
        array(
            'number' => 'Phase Three',
            'title' => 'Craft',
            'subtitle' => 'Your Signature Talk or Narrative',
            'description' => 'With your message clear, we build structure. Whether it\'s a keynote, a leadership narrative, or a brand story, this phase gives shape to your message — emotional arc, strategic structure, and stories that bring it to life.',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img3.webp',
            'order' => 'image-first'
        ),
        array(
            'number' => 'Phase Four',
            'title' => 'Deliver',
            'subtitle' => 'Voice, Presence & Authority',
            'description' => 'A message is only as powerful as its delivery. In this phase, we train your body, your voice, and your presence — so that when you speak, the message lands not just intellectually but emotionally. This is where authority becomes embodied.',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img5.webp',
            'order' => 'text-first'
        ),
        array(
            'number' => 'Phase Five',
            'title' => 'Lead',
            'subtitle' => 'Thought Leadership & Lasting Impact',
            'description' => 'The final phase is about integration and amplification. You step fully into your role as a thought leader — speaking in rooms, on stages, in media — with a message that is clear, consistent, and creates lasting influence.',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img6.webp',
            'order' => 'image-first'
        ),
    );
}

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
        <section class="relative py-20 flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d]"></div>

            <!-- Decorative elements -->
            <div class="absolute top-20 right-10 w-96 h-96 bg-[#d4b478]/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-20 left-10 w-72 h-72 bg-[#0f203d]/50 rounded-full blur-[100px]"></div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
                <!-- Journey Image -->
                <?php
                $hero_image = get_field('journey_hero_image');
                $hero_image_url = $hero_image ? $hero_image['url'] : get_template_directory_uri() . '/assets/images/carousel/img7.webp';
                ?>
                <div class="relative mb-12 inline-block">
                    <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 rounded-full"></div>
                    <img src="<?php echo esc_url($hero_image_url); ?>"
                        alt="Journey visualization - Path winding through mountains or a road forward"
                        class="w-64 h-40 md:w-80 md:h-48 rounded-2xl object-cover relative z-10 shadow-2xl" />
                </div>

                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <?php echo esc_html(get_field('journey_hero_badge') ?: 'The Process'); ?>
                </span>

                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html(get_field('journey_hero_heading') ?: 'A Process Rooted in Truth.'); ?>
                    <br />
                    <span class="text-[#d4b478]"><?php echo esc_html(get_field('journey_hero_heading_alt') ?: 'Built Around You.'); ?></span>
                </h1>

                <div class="max-w-3xl mx-auto">
                    <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                        <?php echo wp_kses_post(get_field('journey_hero_description') ?: 'The True Influence Method™️ is not a framework you slot yourself into. It\'s a living process — responsive, deep, and entirely grounded in who you are. It moves through five phases, each building on the last, until your message and your delivery are one.'); ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- The 5 Phases -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-20">
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        <?php echo esc_html(get_field('journey_phases_badge') ?: 'The 5-Phase Journey'); ?>
                    </div>
                    <h2 class="font-serif text-4xl md:text-6xl text-[#0f203d]">
                        <?php echo esc_html(get_field('journey_phases_heading') ?: 'From Discovering Your Story'); ?>
                        <br />
                        <span class="text-[#d4b478]"><?php echo esc_html(get_field('journey_phases_heading_alt') ?: 'to Leading With It.'); ?></span>
                    </h2>
                </div>

                <?php foreach ($phases as $index => $phase): ?>
                    <!-- Render phase card using template part -->
                    <?php
                    // Get phase image URL from ACF array or use fallback
                    $phase_image_url = isset($phase['phase_image']['url']) ? $phase['phase_image']['url'] : $phase['image'];

                    set_query_var('phase_number', $phase['phase_number'] ?: $phase['number']);
                    set_query_var('phase_title', $phase['phase_title'] ?: $phase['title']);
                    set_query_var('phase_subtitle', $phase['phase_subtitle'] ?: $phase['subtitle']);
                    set_query_var('phase_description', $phase['phase_description'] ?: $phase['description']);
                    set_query_var('phase_image', $phase_image_url);
                    set_query_var('phase_order', $phase['phase_order'] ?: $phase['order']);
                    get_template_part('template-parts/phase-card');
                    ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Process Callout -->
        <section class="py-24 md:py-32 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d] relative overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 20; $i++): ?>
                    <div class="absolute w-1 h-1 bg-[#d4b478]/20 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 8 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                            <?php echo esc_html(get_field('journey_callout_badge') ?: 'Not Coaching'); ?>
                        </div>

                        <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8 leading-tight">
                            <?php echo esc_html(get_field('journey_callout_heading') ?: 'This Is Not Coaching.'); ?>
                            <br />
                            <span class="text-[#d4b478]">
                                <?php echo esc_html(get_field('journey_callout_heading_alt') ?: 'It\'s Transformation.'); ?>
                            </span>
                        </h2>

                        <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-8">
                            <?php echo wp_kses_post(get_field('journey_callout_description') ?: 'Clients often arrive expecting a structured program with deliverables and timelines. What they find is something more powerful — a process that meets them exactly where they are, surfaces what has always been true, and gives them tools to lead from it.'); ?>
                        </p>
                    </div>

                    <div class="relative">
                        <!-- Testimonial Image -->
                        <?php
                        $callout_image = get_field('journey_callout_image');
                        $callout_image_url = $callout_image ? $callout_image['url'] : get_template_directory_uri() . '/assets/images/corporate/executive.webp';
                        ?>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url($callout_image_url); ?>"
                                alt="Client transformation - Photo showing authentic connection and breakthrough moment"
                                class="w-full h-[400px] object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 to-transparent"></div>

                            <div class="absolute bottom-0 left-0 right-0 p-8">
                                <div class="bg-[#faf8f5] p-6 rounded-xl backdrop-blur-sm">
                                    <blockquote class="font-serif text-[#0f203d] text-lg italic">
                                        "<?php echo wp_kses_post(get_field('journey_callout_testimonial_quote') ?: 'At first, I honestly wanted to quit. I was expecting a traditional approach. But Joanna focused on me — on where I come from, who I am. By the end, I didn\'t just have one story. I had several. And the confidence to deliver them in a way that captivates an audience, just like a scene in a movie.'); ?>"
                                    </blockquote>
                                    <p class="text-[#d4b478] font-medium mt-4">
                                        — <?php echo esc_html(get_field('journey_callout_testimonial_author') ?: 'Private Training Client, CEO'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Journey CTA -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#0f203d]/10 rounded-full blur-[120px]"></div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <div class="mb-12">
                    <!-- Journey Complete Image -->
                    <?php
                    $cta_image = get_field('journey_cta_image');
                    $cta_image_url = $cta_image ? $cta_image['url'] : get_template_directory_uri() . '/assets/images/carousel/img8.webp';
                    ?>
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 rounded-full"></div>
                        <img src="<?php echo esc_url($cta_image_url); ?>"
                            alt="Begin your journey - Beautiful sunrise or open path forward"
                            class="w-64 h-40 rounded-2xl object-cover relative z-10 shadow-2xl" />
                    </div>
                </div>

                <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <?php echo esc_html(get_field('journey_cta_badge') ?: 'Begin Now'); ?>
                </div>

                <h2 class="font-serif text-4xl md:text-6xl text-[#0f203d] mb-6">
                    <?php echo esc_html(get_field('journey_cta_heading') ?: 'Where Would You Like to Begin?'); ?>
                </h2>
                <p class="text-[#0f203d]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto">
                    <?php echo wp_kses_post(get_field('journey_cta_description') ?: 'Every journey through True Influence Method™️ starts with a conversation. Let us know where you are and where you want to go — and Joanna\'s team will guide you to the right path.'); ?>
                </p>

                <a href="<?php echo esc_url(get_field('journey_cta_button_link') ?: home_url('/apply/')); ?>"
                    class="inline-flex items-center gap-3 px-10 py-5 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-xl hover:shadow-[#d4b478]/20 text-lg group">
                    <?php echo esc_html(get_field('journey_cta_button_text') ?: 'Start Conversation'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>