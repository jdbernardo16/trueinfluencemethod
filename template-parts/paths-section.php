<?php

/**
 * Paths Section Template Part
 * Replaced with ICP Selector (Speaker / Authority / Legacy)
 *
 * @package tim-wordpress
 */
?>

<section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[100px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                Choose Your Path
            </span>
            <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">Find Where You Are</h2>
            <p class="text-[#0f203d]/70 text-lg md:text-xl leading-relaxed max-w-3xl mx-auto">
                You don't need more strategy. You need to close the gap between what you know and what you can say.
            </p>
        </div>

        <!-- ICP Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">

            <!-- ICP 1: The Speaker -->
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                <div class="relative h-48 overflow-hidden">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img1.webp'); ?>"
                        alt="The Speaker"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 via-[#0f203d]/20 to-transparent"></div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-[#0f203d] mb-1">The Speaker</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Experience: 3–8 years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Revenue: $100K–$500K</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                        &ldquo;I know I have something to say, but I can't clearly say what defines me yet.&rdquo;
                    </blockquote>

                    <div class="space-y-3 mb-8 flex-1">
                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#0f203d]/80">Clarity on what defines you and why it matters.</span>
                            </li>
                        </ul>

                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#0f203d]/80">A message you can say in one sentence.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=speaker"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                        Find My Message
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- ICP 2: The Authority -->
            <div class="group bg-[#faf5e8] rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                <div class="relative h-48 overflow-hidden">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img2.webp'); ?>"
                        alt="The Authority"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 via-[#0f203d]/20 to-transparent"></div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-[#0f203d] mb-1">The Authority</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Experience: 10–20 years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#0f203d]/80">Revenue: $500K–$5M+</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                        &ldquo;I know my work, but I over-explain it when it matters most.&rdquo;
                    </blockquote>

                    <div class="space-y-3 mb-8 flex-1">
                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#0f203d]/80">A structured message that lands.</span>
                            </li>
                        </ul>

                        <p class="text-[#0f203d]/50 text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#0f203d]/80">A signature talk aligned to your work.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=authority"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                        Build My Talk
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- ICP 3: The Legacy -->
            <div class="group bg-[#0f203d] rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/20 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 flex flex-col card-lift">
                <div class="relative h-48 overflow-hidden">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/carousel/img4.webp'); ?>"
                        alt="The Legacy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        loading="lazy" />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 via-[#0f203d]/20 to-transparent"></div>
                </div>

                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-serif text-2xl text-[#d4b478] mb-1">The Legacy</h3>

                    <!-- Accordion: Experience & Revenue -->
                    <div class="icp-accordion mb-4">
                        <details>
                            <summary class="icp-accordion-trigger">
                                <svg class="icp-chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                                Experience &amp; Revenue Details
                            </summary>
                            <div class="icp-accordion-content">
                                <div class="flex items-start gap-3 mb-2">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#faf8f5]/80">Experience: 20+ years leading</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                                    </svg>
                                    <span class="text-sm text-[#faf8f5]/80">Revenue: $5M–$25M+</span>
                                </div>
                            </div>
                        </details>
                    </div>

                    <blockquote class="text-[#d4b478] italic text-sm border-l-2 border-[#d4b478]/30 pl-4 mb-6 leading-relaxed">
                        &ldquo;I've built something significant, but I'm not clearly known for what I do differently.&rdquo;
                    </blockquote>

                    <div class="space-y-3 mb-8 flex-1">
                        <p class="text-[#d4b478] text-xs font-bold tracking-[0.15em] uppercase">You need:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#faf8f5]/80">A distinct, repeatable point of view.</span>
                            </li>
                        </ul>

                        <p class="text-[#d4b478] text-xs font-bold tracking-[0.15em] uppercase mt-4">You get:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                <span class="text-sm text-[#faf8f5]/80">A blueprint people can build on after you.</span>
                            </li>
                        </ul>
                    </div>

                    <a href="/icp-path/?icp=legacy"
                        class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group/btn mt-auto">
                        Private Training
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Not Sure CTA -->
        <div class="max-w-6xl mx-auto mt-16 bg-[#0f203d] rounded-2xl p-10 text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-[#d4b478]/5 rounded-full blur-[80px]"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-[#d4b478]/5 rounded-full blur-[60px]"></div>

            <div class="relative z-10">
                <h3 class="font-serif text-2xl text-[#faf8f5] mb-3">Not Sure Where You Are?</h3>
                <p class="text-[#faf8f5]/70 text-lg leading-relaxed mb-8 max-w-lg mx-auto">
                    Take the 5-minute Influence Path Assessment and see exactly where your voice and leadership stopped matching.
                </p>
                <a href="/icp-quiz/"
                    class="inline-flex items-center gap-2 px-8 py-4 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all group">
                    Find My Path
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
