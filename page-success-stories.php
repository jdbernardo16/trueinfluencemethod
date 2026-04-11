<?php

/**
 * Template Name: Success Stories Page
 * Description: Success stories and testimonials page template
 *
 * @package tim-wordpress
 */

// Get testimonials from ACF repeater field
$testimonials = get_field('success_stories_testimonials');

// Fallback to default testimonials if ACF field is empty
if (empty($testimonials)) {
    $testimonials = array(
        array(
            'quote' => 'Working with Joanna has been nothing short of life-changing. Her skill, patience, and intuition make her truly exceptional. I can\'t recommend her enough.',
            'author' => 'A. Robinson',
            'type' => 'Executive Leader',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img1.webp'
        ),
        array(
            'quote' => 'She didn\'t hand me a formula. She started with me — my experiences, my story, and what drives me. By the end, I didn\'t just have one story. I had several. And more than that, I had the confidence to deliver them in a way that captivates an audience.',
            'author' => 'Private Training Client',
            'type' => 'CEO',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img2.webp'
        ),
        array(
            'quote' => 'Joanna brought a level of safety and clarity to our team that was beyond valuable. We knew training would be good, but we got far more than we expected. I tell everyone I know to work with her.',
            'author' => 'Corporate Client',
            'type' => 'Leadership Team',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img3.webp'
        ),
        array(
            'quote' => 'This was never about performing. It was about becoming.',
            'author' => 'Speak & Rise Participant',
            'type' => 'Group Training',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img4.webp'
        ),
        array(
            'quote' => 'Joanna is a game changer in coaching. Her process is nothing short of transformative.',
            'author' => 'Private Client',
            'type' => 'Executive',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img5.webp'
        ),
        array(
            'quote' => 'When clarity meets momentum, everything changes. Joanna gave me both.',
            'author' => 'Executive Client',
            'type' => 'Leader',
            'image' => get_template_directory_uri() . '/assets/images/carousel/img6.webp'
        ),
    );
}

// Get hero section fields
$hero_badge = get_field('success_stories_hero_badge') ?: 'Client Transformations';
$hero_heading = get_field('success_stories_hero_heading') ?: 'What Happens When Leaders Own Their Story.';
$hero_description = get_field('success_stories_hero_description') ?: 'Joanna\'s clients are founders, CEOs, executives, and mission-driven leaders from around the world. What they share is this: they arrived with something real to say — and left knowing exactly how to say it.';
$hero_background_image = get_field('success_stories_hero_background_image');

// Get testimonials section fields
$testimonials_heading = get_field('success_stories_testimonials_heading') ?: 'Voices of Transformation';
$testimonials_description = get_field('success_stories_testimonials_description') ?: 'Real stories from leaders who found their voice and transformed their impact.';

// Get case studies section fields
$case_studies_badge = get_field('success_stories_case_studies_badge') ?: 'Case Studies';
$case_studies_heading = get_field('success_stories_case_studies_heading') ?: 'See Full Transformations.';
$case_studies_description = get_field('success_stories_case_studies_description') ?: 'Joanna\'s client case studies go deeper — exploring specific challenge, process, and outcomes. If you\'d like to hear more about what is possible, reach out to Joanna\'s team and we\'ll share examples relevant to your situation.';
$case_studies_cta_text = get_field('success_stories_case_studies_cta_text') ?: 'Request Client Examples';
$case_studies_cta_link = get_field('success_stories_case_studies_cta_link') ?: home_url('/apply/');
$case_studies_background_image = get_field('success_stories_case_studies_background_image');

// Helper function to get image URL from ACF image field
function get_image_url($image_field, $default_url)
{
    if ($image_field && isset($image_field['url'])) {
        return $image_field['url'];
    }
    return $default_url;
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
        <!-- Hero Section -->
        <section class="relative min-h-[60vh] flex items-center justify-center py-20 md:py-32 overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo esc_url(get_image_url($hero_background_image, get_template_directory_uri() . '/assets/images/carousel/img1.webp')); ?>"
                    alt="Background"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/90 via-[#0f203d]/85 to-[#0f203d]/95"></div>
            </div>

            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
            </div>

            <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
                <div class="mb-6">
                    <span class="text-[#d4b478] text-sm md:text-base font-medium tracking-[0.2em] uppercase">
                        <?php echo esc_html($hero_badge); ?>
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html($hero_heading); ?>
                </h1>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    <?php echo wp_kses_post($hero_description); ?>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]/30 mx-auto">
                            <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
                            <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
                        </svg>
                    </div>
                    <h2 class="font-serif text-3xl md:text-4xl text-[#0f203d] mb-4">
                        <?php echo esc_html($testimonials_heading); ?>
                    </h2>
                    <div class="text-[#0f203d]/70 max-w-2xl mx-auto">
                        <?php echo wp_kses_post($testimonials_description); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <?php
                        // Get testimonial image URL from ACF field or fallback to default
                        $testimonial_image = isset($testimonial['image']) && is_array($testimonial['image']) && isset($testimonial['image']['url'])
                            ? $testimonial['image']['url']
                            : (isset($testimonial['image']) ? $testimonial['image'] : '');

                        // Prepare testimonial data for template part
                        $testimonial_data = array(
                            'quote' => isset($testimonial['quote']) ? $testimonial['quote'] : '',
                            'author' => isset($testimonial['author']) ? $testimonial['author'] : '',
                            'type' => isset($testimonial['type']) ? $testimonial['type'] : '',
                            'image' => $testimonial_image
                        );

                        get_template_part('template-parts/testimonial-card', null, $testimonial_data);
                        ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Case Studies Callout -->
        <section class="py-20 md:py-32 relative overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo esc_url(get_image_url($case_studies_background_image, get_template_directory_uri() . '/assets/images/carousel/img7.webp')); ?>"
                    alt="Background"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
            </div>

            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
            </div>

            <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
                <div class="mb-6">
                    <span class="text-[#d4b478] text-sm md:text-base font-medium tracking-[0.2em] uppercase">
                        <?php echo esc_html($case_studies_badge); ?>
                    </span>
                </div>

                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">
                    <?php echo esc_html($case_studies_heading); ?>
                </h2>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto leading-relaxed">
                    <?php echo wp_kses_post($case_studies_description); ?>
                </div>

                <a href="<?php echo esc_url(is_array($case_studies_cta_link) ? get_permalink($case_studies_cta_link['ID']) : $case_studies_cta_link); ?>"
                    class="inline-flex group px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 relative overflow-hidden">
                    <span class="relative z-10 flex items-center gap-2">
                        <?php echo esc_html($case_studies_cta_text); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </span>
                </a>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>