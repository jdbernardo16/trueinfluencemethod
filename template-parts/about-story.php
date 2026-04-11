<?php

/**
 * About Story section component.
 *
 * @package tim-wordpress
 */
?>

<section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    Her Story
                </div>

                <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8 leading-tight">
                    It Started With a Question:
                    <span class="block text-[#d4b478] mt-2">
                        What If the Most Powerful Thing You Could Do Is Tell the Truth?
                    </span>
                </h2>

                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-6">
                    Joanna has spent a lifetime at the edges of transformation — in theatre, in classrooms, in boardrooms, in communities. As an actress, educator, entrepreneur, and investor, she learned that the leaders who create lasting impact are not the loudest or the most polished. They are the most honest.
                </p>

                <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-8">
                    She created the True Influence Method™️ to give leaders a rigorous, human-centered process for doing exactly that. Through her signature interview-based approach, Joanna surfaces the truth beneath the noise — the defining moment, the real why, the lived experience that makes a message land.
                </p>

                <blockquote class="font-serif italic text-2xl text-[#d4b478] border-l-4 border-[#d4b478] pl-6 my-8">
                    The result is a voice that doesn't just communicate. It leads.
                </blockquote>
            </div>

            <div class="relative">
                <!-- Story Image -->
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/joanna2.webp"
                        alt="Joanna in action - Photo of Joanna speaking to a room or working one-on-one with a client"
                        class="w-full h-[600px] object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 to-transparent"></div>

                    <!-- Quote overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8">
                        <div class="bg-[#faf8f5] p-6 rounded-xl backdrop-blur-sm">
                            <p class="font-serif text-[#0f203d] text-lg italic">
                                "The leaders who create lasting impact are not the loudest or the most polished. They are the most honest."
                            </p>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-6 -left-6 bg-[#d4b478] text-[#0f203d] p-4 rounded-xl shadow-2xl">
                    <p class="font-serif text-2xl font-bold">30+</p>
                    <p class="text-xs font-medium">Years of Impact</p>
                </div>
            </div>
        </div>
    </div>
</section>