<?php

/**
 * Template Name: Programs Page
 * Description: Programs page template with Three Paths and Set My Price App
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
                    <?php echo esc_html(get_field('programs_hero_badge') ?: 'Programs'); ?>
                </span>
                <h1 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                    <?php echo esc_html(get_field('programs_hero_heading') ?: 'Three Offers. One Method. Transformation at Every Level.'); ?>
                </h1>
                <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed">
                    <?php echo wp_kses_post(get_field('programs_hero_description') ?: 'Joanna offers three distinct paths into True Influence Method™️ — each designed for a different context, depth, and investment. All three are grounded in same rigorous process. All three create lasting change.'); ?>
                </div>
            </div>
        </section>

        <!-- Three Paths -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d]">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <span class="inline-flex items-center gap-2 bg-[#0f203d]/5 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        <?php echo esc_html(get_field('programs_paths_badge') ?: 'Three Paths'); ?>
                    </span>
                    <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">
                        <?php echo esc_html(get_field('programs_paths_heading') ?: 'One Method. Three Paths. You Choose Your Level of Commitment.'); ?>
                    </h2>
                    <div class="text-[#0f203d]/70 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                        <?php echo wp_kses_post(get_field('programs_paths_description') ?: 'Transformation is priceless. But your investment needs to match the demand on your attention, energy, and focus — or you won\'t show up fully. That\'s the truth of why this works.'); ?>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <?php
                    $paths = get_field('programs_paths');
                    if ($paths) :
                        foreach ($paths as $path) :
                            $is_highlighted = !empty($path['path_highlight']);
                            $cta_link = !empty($path['path_cta_link']) ? $path['path_cta_link'] : home_url('/apply/');
                            $features = $path['path_features'];
                    ?>
                            <div class="relative flex flex-col rounded-2xl overflow-hidden <?php echo $is_highlighted ? 'bg-[#0f203d] text-[#faf8f5] border-2 border-[#d4b478] shadow-xl shadow-[#d4b478]/10' : 'bg-white border border-[#0f203d]/10 shadow-md'; ?>">
                                <?php if ($is_highlighted) : ?>
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-[#d4b478]"></div>
                                <?php endif; ?>

                                <div class="p-8 flex-grow flex flex-col">
                                    <!-- Path Label Badge -->
                                    <span class="inline-block self-start text-xs font-bold tracking-[0.15em] uppercase px-3 py-1 rounded-full mb-4 <?php echo $is_highlighted ? 'bg-[#d4b478]/20 text-[#d4b478]' : 'bg-[#0f203d]/5 text-[#0f203d]/60'; ?>">
                                        <?php echo esc_html($path['path_label'] ?: 'Path'); ?>
                                    </span>

                                    <!-- Title & Subtitle -->
                                    <h3 class="font-serif text-2xl <?php echo $is_highlighted ? 'text-[#faf8f5]' : 'text-[#0f203d]'; ?> mb-1">
                                        <?php echo esc_html($path['path_title'] ?: 'Program'); ?>
                                    </h3>
                                    <p class="text-sm <?php echo $is_highlighted ? 'text-[#d4b478]' : 'text-[#d4b478]'; ?> font-medium mb-4">
                                        <?php echo esc_html($path['path_subtitle'] ?: ''); ?>
                                    </p>

                                    <!-- Who It's For -->
                                    <p class="text-sm <?php echo $is_highlighted ? 'text-[#faf8f5]/70' : 'text-[#0f203d]/60'; ?> mb-6">
                                        <?php echo esc_html($path['path_who_for'] ?: ''); ?>
                                    </p>

                                    <!-- Features List -->
                                    <?php if ($features) : ?>
                                        <ul class="space-y-3 mb-8 flex-grow">
                                            <?php foreach ($features as $feature) : ?>
                                                <li class="flex items-start">
                                                    <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                    <span class="<?php echo $is_highlighted ? 'text-[#faf8f5]/80' : 'text-[#0f203d]/80'; ?> text-sm">
                                                        <?php echo esc_html($feature['feature_text']); ?>
                                                    </span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <!-- Access -->
                                    <div class="mb-6 pt-6 border-t <?php echo $is_highlighted ? 'border-[#faf8f5]/10' : 'border-[#0f203d]/10'; ?>">
                                        <span class="text-xs font-medium <?php echo $is_highlighted ? 'text-[#faf8f5]/50' : 'text-[#0f203d]/40'; ?> uppercase tracking-wider">Access</span>
                                        <p class="text-sm font-semibold <?php echo $is_highlighted ? 'text-[#faf8f5]' : 'text-[#0f203d]'; ?>">
                                            <?php echo esc_html($path['path_access'] ?: ''); ?>
                                        </p>
                                    </div>

                                    <!-- CTA Button -->
                                    <a href="<?php echo esc_url($cta_link); ?>"
                                        class="inline-block text-center w-full px-6 py-3 rounded-lg font-semibold transition-all <?php echo $is_highlighted ? 'bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] hover:shadow-lg hover:shadow-[#d4b478]/20' : 'bg-[#0f203d] hover:bg-[#0f203d]/90 text-[#faf8f5]'; ?>">
                                        <?php echo esc_html($path['path_cta_text'] ?: 'Join Now →'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    else :
                        // Default fallback paths
                        $default_paths = [
                            [
                                'path_label' => 'Path 1',
                                'path_title' => 'Mastermind',
                                'path_subtitle' => 'Self-Study + Retreat',
                                'path_who_for' => 'Leaders who are ready to begin at their own pace',
                                'path_features' => [
                                    ['feature_text' => '90-day self-guided training'],
                                    ['feature_text' => 'Quarterly in-person retreat'],
                                    ['feature_text' => 'Expert feedback'],
                                    ['feature_text' => 'Peer network'],
                                ],
                                'path_access' => 'Retreat only',
                                'path_cta_text' => 'Join Now →',
                                'path_cta_link' => home_url('/programs/mastermind'),
                                'path_highlight' => false,
                            ],
                            [
                                'path_label' => 'Path 2',
                                'path_title' => 'Cohort',
                                'path_subtitle' => 'Group Training with Joanna',
                                'path_who_for' => '9–10/10 commitment',
                                'path_features' => [
                                    ['feature_text' => 'Everything in Mastermind'],
                                    ['feature_text' => 'Monthly live group calls'],
                                    ['feature_text' => 'Speaker eligibility'],
                                ],
                                'path_access' => 'Monthly + retreat',
                                'path_cta_text' => 'Join Now →',
                                'path_cta_link' => home_url('/programs/corporate'),
                                'path_highlight' => false,
                            ],
                            [
                                'path_label' => 'Path 3',
                                'path_title' => 'Private Client',
                                'path_subtitle' => 'Apply Only',
                                'path_who_for' => '10/10 leaders',
                                'path_features' => [
                                    ['feature_text' => 'One-on-one training'],
                                    ['feature_text' => 'Everything in Cohort'],
                                ],
                                'path_access' => 'Direct 1:1',
                                'path_cta_text' => 'Apply to Become a Private Client →',
                                'path_cta_link' => home_url('/programs/private-training'),
                                'path_highlight' => true,
                            ],
                        ];

                        foreach ($default_paths as $path) :
                            $is_highlighted = !empty($path['path_highlight']);
                        ?>
                            <div class="relative flex flex-col rounded-2xl overflow-hidden <?php echo $is_highlighted ? 'bg-[#0f203d] text-[#faf8f5] border-2 border-[#d4b478] shadow-xl shadow-[#d4b478]/10' : 'bg-white border border-[#0f203d]/10 shadow-md'; ?>">
                                <?php if ($is_highlighted) : ?>
                                    <div class="absolute top-0 left-0 right-0 h-1 bg-[#d4b478]"></div>
                                <?php endif; ?>

                                <div class="p-8 flex-grow flex flex-col">
                                    <span class="inline-block self-start text-xs font-bold tracking-[0.15em] uppercase px-3 py-1 rounded-full mb-4 <?php echo $is_highlighted ? 'bg-[#d4b478]/20 text-[#d4b478]' : 'bg-[#0f203d]/5 text-[#0f203d]/60'; ?>">
                                        <?php echo esc_html($path['path_label']); ?>
                                    </span>

                                    <h3 class="font-serif text-2xl <?php echo $is_highlighted ? 'text-[#faf8f5]' : 'text-[#0f203d]'; ?> mb-1">
                                        <?php echo esc_html($path['path_title']); ?>
                                    </h3>
                                    <p class="text-sm text-[#d4b478] font-medium mb-4">
                                        <?php echo esc_html($path['path_subtitle']); ?>
                                    </p>

                                    <p class="text-sm <?php echo $is_highlighted ? 'text-[#faf8f5]/70' : 'text-[#0f203d]/60'; ?> mb-6">
                                        <?php echo esc_html($path['path_who_for']); ?>
                                    </p>

                                    <ul class="space-y-3 mb-8 flex-grow">
                                        <?php foreach ($path['path_features'] as $feature) : ?>
                                            <li class="flex items-start">
                                                <svg class="w-5 h-5 text-[#d4b478] mr-3 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                                <span class="<?php echo $is_highlighted ? 'text-[#faf8f5]/80' : 'text-[#0f203d]/80'; ?> text-sm">
                                                    <?php echo esc_html($feature['feature_text']); ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="mb-6 pt-6 border-t <?php echo $is_highlighted ? 'border-[#faf8f5]/10' : 'border-[#0f203d]/10'; ?>">
                                        <span class="text-xs font-medium <?php echo $is_highlighted ? 'text-[#faf8f5]/50' : 'text-[#0f203d]/40'; ?> uppercase tracking-wider">Access</span>
                                        <p class="text-sm font-semibold <?php echo $is_highlighted ? 'text-[#faf8f5]' : 'text-[#0f203d]'; ?>">
                                            <?php echo esc_html($path['path_access']); ?>
                                        </p>
                                    </div>

                                    <a href="<?php echo esc_url($path['path_cta_link']); ?>"
                                        class="inline-block text-center w-full px-6 py-3 rounded-lg font-semibold transition-all <?php echo $is_highlighted ? 'bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] hover:shadow-lg hover:shadow-[#d4b478]/20' : 'bg-[#0f203d] hover:bg-[#0f203d]/90 text-[#faf8f5]'; ?>">
                                        <?php echo esc_html($path['path_cta_text']); ?>
                                    </a>
                                </div>
                            </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- Set My Price App -->
        <section class="py-24 md:py-32 bg-[#0f203d]">
            <div class="max-w-4xl mx-auto px-6 text-center">
                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8">
                    <?php echo esc_html(get_field('programs_setmyprice_heading') ?: 'Not sure which path is right for you? Let\'s find out together.'); ?>
                </h2>
                <div class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto mb-12">
                    <?php echo wp_kses_post(get_field('programs_setmyprice_description') ?: 'Joanna\'s training is worth more than $1,000,000 for clients who are 10/10 committed. But the price isn\'t the filter — your commitment is.'); ?>
                </div>
                <a href="<?php echo esc_url(get_field('programs_setmyprice_cta_link') ?: home_url('/apply/')); ?>"
                    class="inline-block px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 text-lg">
                    <?php echo esc_html(get_field('programs_setmyprice_cta_text') ?: 'Find My Program + Set My Price →'); ?>
                </a>
            </div>
        </section>
    </div>

    <?php get_footer(); ?>
</body>

</html>