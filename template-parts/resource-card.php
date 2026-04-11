<?php

/**
 * Resource Card Template Part
 * 
 * Reusable card component for displaying resources (articles, blog posts, media items, tips)
 * in archive templates and related posts sections.
 * 
 * @package tim-wordpress
 */

$post_type = get_post_type();
$post_type_labels = get_post_type_object($post_type);
$post_type_singular = $post_type_labels->labels->singular_name;

// Get category
$categories = get_the_category();
$category = !empty($categories) ? $categories[0] : null;
?>

<a href="<?php the_permalink(); ?>" class="group bg-[#0f203d]/50 backdrop-blur-sm rounded-xl border border-[#faf8f5]/10 hover:border-[#d4b478]/30 transition-all duration-300 overflow-hidden !no-underline">
    <?php if (has_post_thumbnail()) : ?>
        <div class="relative aspect-[16/10] overflow-hidden">
            <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105']); ?>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 to-transparent"></div>
            <?php if ($category) : ?>
                <div class="absolute top-4 left-4">
                    <span class="inline-block px-3 py-1 bg-[#d4b478] text-[#0f203d] text-xs font-semibold rounded-full">
                        <?php echo esc_html($category->name); ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="p-6">
        <div class="flex items-center gap-3 mb-3 text-sm text-[#faf8f5]/60">
            <span><?php echo get_the_date(); ?></span>
            <span class="w-1 h-1 rounded-full bg-[#d4b478]" />
            <span><?php echo get_reading_time(); ?></span>
        </div>

        <h3 class="font-serif text-xl text-[#faf8f5] mb-3 leading-tight group-hover:text-[#d4b478] transition-colors">
            <?php the_title(); ?>
        </h3>

        <?php if (has_excerpt()) : ?>
            <p class="text-[#faf8f5]/70 text-sm leading-relaxed line-clamp-3">
                <?php echo get_the_excerpt(); ?>
            </p>
        <?php endif; ?>

        <div class="mt-4 flex items-center gap-2 text-[#d4b478] text-sm font-medium group-hover:gap-3 transition-all">
            Read More
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </div>
    </div>
</a>