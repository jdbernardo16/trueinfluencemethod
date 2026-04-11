<?php

/**
 * Related Posts Template Part
 * 
 * Displays related posts of the same post type for single templates.
 * Excludes the current post and shows up to 3 related posts.
 * 
 * @package tim-wordpress
 */

$current_post_id = get_the_ID();
$current_post_type = get_post_type();
$post_type_labels = get_post_type_object($current_post_type);
$post_type_name = $post_type_labels->labels->name;

// Get categories of current post
$categories = get_the_category($current_post_id);
$category_ids = wp_list_pluck($categories, 'term_id');

// Query related posts
$related_args = [
    'post_type' => $current_post_type,
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in' => [$current_post_id],
    'orderby' => 'rand',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $category_ids,
        ],
    ],
];

$related_query = new WP_Query($related_args);
?>

<?php if ($related_query->have_posts()) : ?>
    <section class="py-20 md:py-32 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-[#0f203d] via-[#0f203d] to-[#0f203d]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-[#d4b478]/5 to-transparent"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl text-[#faf8f5] mb-4">
                    More <?php echo esc_html($post_type_name); ?>
                </h2>
                <p class="text-[#faf8f5]/60 max-w-2xl mx-auto">
                    Explore more perspectives on leadership, communication, and authentic influence.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                    <?php get_template_part('template-parts/resource-card'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>