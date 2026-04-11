<?php

/**
 * About Philosophy section component.
 *
 * @package tim-wordpress
 */
?>

<section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#0f203d]/10 rounded-full blur-[120px]"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <!-- Philosophy Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <?php
                    $philosophy_image = tim_get_image_field(
                        'about_philosophy_image',
                        get_template_directory_uri() . '/assets/images/carousel/img5.webp',
                        'Joanna\'s Philosophy - Warm, thoughtful portrait showing depth and wisdom'
                    );
                    ?>
                    <img src="<?php echo esc_url($philosophy_image['url']); ?>"
                        alt="<?php echo esc_attr($philosophy_image['alt']); ?>"
                        class="w-full h-[500px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/60 to-transparent"></div>

                    <div class="absolute bottom-8 left-8 right-8">
                        <div class="bg-[#faf8f5]/95 backdrop-blur-sm p-6 rounded-xl">
                            <p class="font-serif text-[#0f203d] text-lg italic">
                                "<?php tim_esc_text(tim_get_field('about_philosophy_quote_overlay', 'Your story is not just where you\'ve been. It\'s the reason people choose to follow you.')); ?>"
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <?php tim_esc_text(tim_get_field('about_philosophy_badge', 'Philosophy')); ?>
                </div>

                <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8 leading-tight">
                    <?php tim_esc_text(tim_get_field('about_philosophy_heading', 'Your Story Is Not Just Where You\'ve Been. <span class="block text-[#d4b478] mt-2">It\'s the Reason People Choose to Follow You.</span>')); ?>
                </h2>

                <div class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-8">
                    <?php tim_esc_content(tim_get_field('about_philosophy_description', 'Joanna believes that authentic communication is not a skill to be learned — it\'s a truth to be uncovered. Her work begins not with what you want to say, but with who you are and what you\'ve lived. From that foundation, she helps leaders build a voice that is authoritative, emotionally resonant, and entirely their own.')); ?>
                </div>

                <blockquote class="font-serif italic text-2xl text-[#d4b478] border-l-4 border-[#d4b478] pl-6 my-8">
                    <?php tim_esc_content(tim_get_field('about_philosophy_blockquote', '"Being a voice for your work is not just good for sales. It\'s good for the soul."')); ?>
                </blockquote>
                <div class="text-[#0f203d]/60 text-sm font-medium">
                    <?php tim_esc_text(tim_get_field('about_philosophy_author', '— Joanna Horton McPherson')); ?>
                </div>
            </div>
        </div>
    </div>
</section>