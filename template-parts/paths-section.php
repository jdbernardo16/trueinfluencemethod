<?php

/**
 * Paths Section Template Part
 * Based on PathsSection.vue
 */

$paths = array(
    array(
        'icon' => 'user',
        'title' => 'Private Training',
        'description' => 'For founders and CEOs who are ready for the deepest, most transformative work. One-on-one with Joanna.',
        'price' => 'From $20,000',
        'cta' => 'Apply for Private Training',
        'badge' => 'Exclusive',
        'features' => array(
            'One-on-one sessions with Joanna',
            'Customized curriculum',
            'Priority support',
            'Direct access to Joanna'
        )
    ),
    array(
        'icon' => 'users',
        'title' => 'Speak & Rise (Group)',
        'description' => 'A group training experience for leaders who want to find their voice and develop their story alongside a community of peers.',
        'price' => 'From $6,000',
        'cta' => 'Join Speak & Rise',
        'badge' => 'Community',
        'features' => array(
            'Small group cohorts',
            'Peer learning',
            'Practice sessions',
            'Community access'
        )
    ),
    array(
        'icon' => 'building',
        'title' => 'Corporate Programs',
        'description' => 'Bring the True Influence Method™️ to your leadership team or organization.',
        'price' => 'Custom Pricing',
        'cta' => 'Inquire for Your Team',
        'badge' => 'Team',
        'features' => array(
            'Team workshops',
            'Leadership development',
            'Custom solutions',
            'Scable programs'
        )
    )
);
?>

<section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 bg-[#0f203d]/5 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                Ways to Work Together
            </span>

            <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">
                One Method. Three Paths.
            </h2>

            <p class="text-[#0f203d]/70 text-lg max-w-3xl mx-auto leading-relaxed">
                Whether you're a CEO ready for private mastery, a rising leader joining a powerful group, or an organization building a culture of courageous communication — there is a path for you.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($paths as $index => $path) : ?>
                <?php get_template_part('template-parts/path-card', null, $path); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>