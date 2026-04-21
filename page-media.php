<?php

/**
 * Template Name: Media Page
 * Description: Media Feature landing page template
 *
 * @package tim-wordpress
 */

// Get featured media (recent media appearances)
$featured_media = new WP_Query([
    'post_type' => 'media',
    'posts_per_page' => 4,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
]);

// Get all media for the grid
$media = new WP_Query([
    'post_type' => 'media',
    'posts_per_page' => 12,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => wp_list_pluck($featured_media->posts, 'ID'),
]);

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
        <section class="relative min-h-[70vh] flex items-center justify-center py-20 md:py-32 overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img3.webp"
                    alt="Background"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]/95"></div>
            </div>

            <div class="absolute inset-0">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
            </div>

            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-5xl mx-auto px-6 relative z-10 text-center">
                <div class="mb-8">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                        <?php echo esc_html(tim_get_field('media_hero_badge', 'In The Spotlight')); ?>
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html(tim_get_field('media_hero_heading', 'Media Features & Interviews')); ?>
                </h1>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10">
                    <?php echo tim_get_field('media_hero_description', 'Joanna has been featured in leading publications and podcasts, sharing her expertise on leadership communication and authentic influence with audiences worldwide.'); ?>
                </div>

                <?php
                $cta_link = tim_get_field('media_hero_cta_link', '');
                $cta_url = $cta_link ? get_permalink($cta_link) : '#media-grid';
                ?>
                <a href="<?php echo esc_url($cta_url); ?>"
                    class="inline-flex items-center justify-center gap-3 bg-[#d4b478] text-white text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300">
                    <?php echo esc_html(tim_get_field('media_hero_cta_text', 'View Features')); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>

        <!-- Featured Media Section -->
        <?php if ($featured_media->have_posts()) : ?>
            <section class="py-20 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

                <div class="max-w-7xl mx-auto px-6 relative z-10">
                    <div class="text-center mb-16">
                        <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                            <?php echo esc_html(tim_get_field('media_featured_badge', 'Recent Features')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            <?php echo esc_html(tim_get_field('media_featured_heading', 'Latest Media Appearances')); ?>
                        </h2>
                        <div class="text-[#0f203d]/70 text-lg max-w-2xl mx-auto">
                            <?php echo tim_get_field('media_featured_description', 'See where Joanna has been featured recently, sharing her insights on leadership and communication.'); ?>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <?php while ($featured_media->have_posts()) : $featured_media->the_post(); ?>
                            <?php get_template_part('template-parts/resource-card'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- All Media Grid Section -->
        <section id="media-grid" class="py-20 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#d4b478]/5 to-transparent"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        <?php echo esc_html(tim_get_field('media_grid_badge', 'All Features')); ?>
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                        <?php echo esc_html(tim_get_field('media_grid_heading', 'Full Media Archive')); ?>
                    </h2>
                    <div class="text-[#faf8f5]/70 text-lg max-w-2xl mx-auto">
                        <?php echo tim_get_field('media_grid_description', 'Browse all of Joanna\'s media features, interviews, and guest appearances.'); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if ($media->have_posts()) : ?>
                        <?php while ($media->have_posts()) : $media->the_post(); ?>
                            <?php get_template_part('template-parts/resource-card'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <div class="col-span-full text-center py-20">
                            <p class="text-[#faf8f5]/60 text-lg">No media features found.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($media->max_num_pages > 1) : ?>
                    <div class="mt-12 text-center">
                        <a href="<?php echo get_post_type_archive_link('media'); ?>"
                            class="inline-flex items-center justify-center gap-3 border-2 border-[#d4b478] text-[#d4b478] text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#d4b478]/10 transition-colors duration-300">
                            View All Features
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14" />
                                <path d="m12 5 7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- CTA Section -->
        <?php get_template_part('template-parts/cta-section'); ?>
    </div>

    <?php get_footer(); ?>
</body>

</html>