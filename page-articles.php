<?php

/**
 * Template Name: Articles Page
 * Description: Articles & Insights landing page template
 *
 * @package tim-wordpress
 */

// Get featured articles
$featured_articles = new WP_Query([
    'post_type' => 'articles',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
]);

// Get all articles for the grid
$articles = new WP_Query([
    'post_type' => 'articles',
    'posts_per_page' => 9,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'post__not_in' => wp_list_pluck($featured_articles->posts, 'ID'),
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
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img1.webp"
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
                        <?php echo esc_html(tim_get_field('articles_hero_badge', 'Research & Insights')); ?>
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl text-[#faf8f5] mb-8 leading-tight">
                    <?php echo esc_html(tim_get_field('articles_hero_heading', 'Leadership Begins With Knowing What You Stand For')); ?>
                </h1>

                <div class="text-[#faf8f5]/80 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10">
                    <?php echo tim_get_field('articles_hero_description', 'Joanna writes about the intersection of leadership, communication, and authentic influence. Her articles explore the questions that matter most to founders, CEOs, and mission-driven leaders.'); ?>
                </div>

                <?php
                $cta_link = tim_get_field('articles_hero_cta_link', '');
                $cta_url = $cta_link ? get_permalink($cta_link) : '#articles-grid';
                ?>
                <a href="<?php echo esc_url($cta_url); ?>"
                    class="inline-flex items-center justify-center gap-3 bg-[#d4b478] text-white text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300">
                    <?php echo esc_html(tim_get_field('articles_hero_cta_text', 'Explore Articles')); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </section>

        <!-- Featured Articles Section -->
        <?php if ($featured_articles->have_posts()) : ?>
            <section class="py-20 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

                <div class="max-w-7xl mx-auto px-6 relative z-10">
                    <div class="text-center mb-16">
                        <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                            <?php echo esc_html(tim_get_field('articles_featured_badge', 'Featured')); ?>
                        </span>
                        <h2 class="font-serif text-3xl md:text-5xl text-[#0f203d] mb-6">
                            <?php echo esc_html(tim_get_field('articles_featured_heading', 'Must-Read Insights')); ?>
                        </h2>
                        <div class="text-[#0f203d]/70 text-lg max-w-2xl mx-auto">
                            <?php echo tim_get_field('articles_featured_description', 'Deep-dive articles on leadership, communication, and authentic influence.'); ?>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <?php while ($featured_articles->have_posts()) : $featured_articles->the_post(); ?>
                            <?php get_template_part('template-parts/resource-card'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- All Articles Grid Section -->
        <section id="articles-grid" class="py-20 md:py-32 bg-[#0f203d] text-[#faf8f5] relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#d4b478]/5 to-transparent"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        <?php echo esc_html(tim_get_field('articles_grid_badge', 'All Articles')); ?>
                    </span>
                    <h2 class="font-serif text-3xl md:text-5xl text-[#faf8f5] mb-6">
                        <?php echo esc_html(tim_get_field('articles_grid_heading', 'Explore All Insights')); ?>
                    </h2>
                    <div class="text-[#faf8f5]/70 text-lg max-w-2xl mx-auto">
                        <?php echo tim_get_field('articles_grid_description', 'Browse our complete collection of articles on leadership and communication.'); ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php if ($articles->have_posts()) : ?>
                        <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                            <?php get_template_part('template-parts/resource-card'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <div class="col-span-full text-center py-20">
                            <p class="text-[#faf8f5]/60 text-lg">No articles found.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($articles->max_num_pages > 1) : ?>
                    <div class="mt-12 text-center">
                        <a href="<?php echo get_post_type_archive_link('articles'); ?>"
                            class="inline-flex items-center justify-center gap-3 border-2 border-[#d4b478] text-[#d4b478] text-sm uppercase tracking-widest px-8 py-4 rounded-full font-medium hover:bg-[#d4b478]/10 transition-colors duration-300">
                            View All Articles
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