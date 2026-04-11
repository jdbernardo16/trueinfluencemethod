<?php

/**
 * Single Template for Blog Posts
 * 
 * Displays a single blog post with hero section, content, related posts, and CTA.
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
        <?php while (have_posts()) : the_post(); ?>
            <!-- Hero Section -->
            <section class="relative min-h-[50vh] flex items-center justify-center py-20 md:py-32 overflow-hidden">
                <div class="absolute inset-0">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/carousel/img2.webp"
                            alt="Blog post cover"
                            class="w-full h-full object-cover" />
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d]/95 via-[#0f203d]/90 to-[#0f203d]"></div>
                </div>

                <div class="absolute inset-0">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
                </div>

                <div class="max-w-4xl mx-auto px-6 relative z-10 text-center">
                    <div class="mb-6 flex items-center justify-center gap-4 flex-wrap">
                        <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors flex items-center gap-2 text-sm !no-underline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            Back to Blog
                        </a>
                        <span class="text-[#faf8f5]/30">|</span>
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) :
                            echo '<span class="text-[#d4b478] text-sm font-medium tracking-[0.2em] uppercase">' . esc_html($categories[0]->name) . '</span>';
                        endif;
                        ?>
                    </div>

                    <h1 class="font-serif text-3xl md:text-4xl lg:text-5xl text-[#faf8f5] mb-6 leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <div class="flex items-center justify-center gap-4 text-sm text-[#faf8f5]/60">
                        <span><?php echo get_the_date(); ?></span>
                        <span class="w-1 h-1 rounded-full bg-[#d4b478]"></span>
                        <span><?php echo get_reading_time(); ?></span>
                    </div>
                </div>
            </section>

            <!-- Blog Post Content Section -->
            <section class="py-16 md:py-24 relative">
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d] via-[#0f203d] to-[#0f203d]"></div>

                <div class="max-w-3xl mx-auto px-6 relative z-10">
                    <article>
                        <div class="article-content prose prose-lg max-w-none text-[#faf8f5]">
                            <?php the_content(); ?>
                        </div>
                    </article>
                </div>
            </section>

            <!-- Related Blog Posts Section -->
            <?php get_template_part('template-parts/related-posts'); ?>

            <!-- Newsletter CTA Section -->
            <?php get_template_part('template-parts/cta-section'); ?>
        <?php endwhile; ?>
    </div>

    <?php
    get_footer();
    ?>
</body>

</html>