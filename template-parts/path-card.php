<?php

/**
 * Path Card Template Part
 * Based on PathCard.vue
 * 
 * @param array $args {
 *     @type string $icon        Icon type: 'user', 'users', 'building', 'book'
 *     @type string $title       Card title
 *     @type string $description Card description
 *     @type string $role        Role badge text (e.g. 'Student', 'Client')
 *     @type string $cta         Call-to-action text
 *     @type string $cta_link    CTA URL
 * }
 */

$args = wp_parse_args($args, array(
    'icon' => 'user',
    'title' => '',
    'description' => '',
    'role' => '',
    'cta' => 'Join Now',
    'cta_link' => '/programs',
));

// Determine image based on icon
$image_map = array(
    'user' => get_template_directory_uri() . '/assets/images/oneonone.webp',
    'users' => get_template_directory_uri() . '/assets/images/carousel/img7.webp',
    'building' => get_template_directory_uri() . '/assets/images/carousel/img8.webp',
    'book' => get_template_directory_uri() . '/assets/images/carousel/img1.webp',
);

$image = isset($image_map[$args['icon']]) ? $image_map[$args['icon']] : get_template_directory_uri() . '/assets/images/carousel/img1.webp';

// Highlight the last card (Private Client) as the premium option
$is_premium = $args['icon'] === 'user' && strpos($args['cta'], 'Apply') !== false;
?>

<div class="group bg-white p-0 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border <?php echo $is_premium ? 'border-[#d4b478]/40 ring-1 ring-[#d4b478]/20' : 'border-[#faf8f5] hover:border-[#d4b478]/30'; ?> relative overflow-hidden flex flex-col">
    <?php if ($is_premium) : ?>
        <div class="absolute top-0 left-0 right-0 h-1 bg-[#d4b478] z-10"></div>
    <?php endif; ?>

    <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4b478]/5 rounded-full blur-2xl group-hover:bg-[#d4b478]/10 transition-all"></div>

    <div class="relative h-48 overflow-hidden">
        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($args['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
        <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 to-transparent"></div>

        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
            <!-- <span class="text-xs font-semibold tracking-wider uppercase text-[#0f203d] bg-[#d4b478] px-3 py-1 rounded-full">
                <?php echo esc_html($args['role']); ?>
            </span> -->
            <?php if ($is_premium) : ?>
                <span class="text-xs font-semibold tracking-wider uppercase text-[#d4b478] bg-[#0f203d] px-3 py-1 rounded-full">
                    Most Exclusive
                </span>
            <?php endif; ?>
        </div>
    </div>

    <div class="p-6 flex flex-col flex-1">
        <h3 class="font-serif text-2xl text-[#0f203d] mb-3 group-hover:text-[#d4b478] transition-colors">
            <?php echo esc_html($args['title']); ?>
        </h3>

        <p class="text-[#0f203d]/70 text-sm leading-relaxed mb-8 flex-1">
            <?php echo esc_html($args['description']); ?>
        </p>

        <a href="<?php echo esc_url($args['cta_link']); ?>" class="inline-flex items-center gap-2 w-full justify-center px-6 py-3 <?php echo $is_premium ? 'bg-[#d4b478] hover:bg-[#0f203d] text-[#0f203d] hover:text-[#faf8f5]' : 'bg-[#0f203d] hover:bg-[#d4b478] text-[#faf8f5]'; ?> font-semibold rounded-lg transition-all duration-300">
            <?php echo esc_html($args['cta']); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</div>