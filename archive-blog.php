<?php

/**
 * Archive Template for Blog Posts
 * 
 * Displays a listing of all blog posts with hero section, grid layout, and pagination.
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
        <!-- Hero Section -->
        <section class="relative min-h-[60vh] flex items-center justify-center py-20 md:py-32 overflow-hidden">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img2.webp"
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
                        Blog & Podcast
                    </span>
                </div>

                <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-[#faf8f5] mb-8 leading-tight">
                    Stories, Strategies, and Honest Reflections.
                </h1>

                <p class="text-[#faf8f5]/80 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    Joanna's blog and podcast appearances go deep—exploring stories, strategies, and honest reflections of leaders who have found their voice.
                </p>
            </div>
        </section>

        <!-- Blog Posts Grid Section -->
        <section class="py-20 md:py-32 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d] via-[#0f203d] to-[#0f203d]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#d4b478]/5 to-transparent"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/resource-card'); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="col-span-full text-center py-20">
                            <p class="text-[#faf8f5]/60 text-lg">No blog posts found.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <?php
                the_posts_pagination([
                    'mid_size' => 2,
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg> Previous',
                    'next_text' => 'Next <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    'class' => 'pagination',
                ]);
                ?>
            </div>
        </section>

        <!-- Newsletter CTA Section -->
        <?php get_template_part('template-parts/cta-section'); ?>
    </div>

    <?php
    get_footer();
    ?>
</body>

</html>