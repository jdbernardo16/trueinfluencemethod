<?php

/**
 * Intro Section Template Part
 * Based on IntroSection.vue
 */

$personal_image = get_template_directory_uri() . '/assets/images/carousel/img2.webp';
$proven_image = get_template_directory_uri() . '/assets/images/carousel/img3.webp';
$transformative_image = get_template_directory_uri() . '/assets/images/carousel/img4.webp';
$main_image = get_template_directory_uri() . '/assets/images/carousel/img5.webp';
?>

<section class="py-24 md:py-32 bg-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 left-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="text-center lg:text-left">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    The Work
                </span>

                <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-8 relative">
                    <span class="absolute -top-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                    You Don't Need a Better Script. You Need Your True Story.
                    <span class="absolute -bottom-6 left-0 w-16 h-px bg-[#d4b478]/40"></span>
                </h2>

                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-6">
                    Most leaders know what they do. Very few can say it in a way that makes people lean in, trust them, and follow. That gap — between your impact and your ability to articulate it — is exactly where Joanna works.
                </p>

                <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed mb-12">
                    The True Influence Method™️ is not speaking coaching. It's a deep, structured process that surfaces the truth behind your work, shapes it into a message that is unmistakably yours, and trains you to deliver it with the kind of authority and openness that changes rooms.
                </p>

                <div class="flex items-center gap-6 flex-wrap">
                    <div class="flex items-center gap-3">
                        <img src="<?php echo esc_url($personal_image); ?>" alt="Personal" class="w-14 h-14 rounded-full object-cover border-2 border-[#d4b478]/30" />
                        <div class="text-left">
                            <p class="text-[#d4b478] font-semibold">Personal</p>
                            <p class="text-[#faf8f5]/60 text-sm">1-on-1 Focus</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <img src="<?php echo esc_url($proven_image); ?>" alt="Proven" class="w-14 h-14 rounded-full object-cover border-2 border-[#d4b478]/30" />
                        <div class="text-left">
                            <p class="text-[#d4b478] font-semibold">Proven</p>
                            <p class="text-[#faf8f5]/60 text-sm">Tested Method</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <img src="<?php echo esc_url($transformative_image); ?>" alt="Transformative" class="w-14 h-14 rounded-full object-cover border-2 border-[#d4b478]/30" />
                        <div class="text-left">
                            <p class="text-[#d4b478] font-semibold">Transformative</p>
                            <p class="text-[#faf8f5]/60 text-sm">Lasting Impact</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo esc_url($main_image); ?>" alt="Joanna working with client" class="w-full h-[500px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/50 to-transparent"></div>
                </div>

                <div class="absolute -bottom-6 -right-6 bg-[#d4b478] text-[#0f203d] p-6 rounded-xl shadow-2xl">
                    <p class="font-serif text-3xl font-bold">100+</p>
                    <p class="text-sm font-medium">Leaders Transformed</p>
                </div>
            </div>
        </div>
    </div>
</section>