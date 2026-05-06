<?php

/**
 * Template Name: About Joana Page
 * Description: Static About Joana page template — hardcoded content, no ACF.
 *
 * @package tim-wordpress
 */

$theme_uri = get_template_directory_uri();
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

        <!-- ========================================== -->
        <!-- HERO SECTION                               -->
        <!-- ========================================== -->
        <section class="relative min-h-screen flex items-center py-32 overflow-hidden bg-[#0f203d]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Text Content -->
                    <div class="z-10">
                        <span class="inline-block text-[#d4b478] font-semibold tracking-widest uppercase text-sm mb-4">
                            Leadership & Executive Coaching
                        </span>

                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 text-[#faf8f5]">
                            I Train Leaders to <span class="italic text-[#d4b478]">Speak</span>.<br />
                            And Speakers to <span class="italic text-[#d4b478]">Lead</span>.
                        </h1>

                        <div class="text-lg md:text-xl text-[#faf8f5]/80 mb-8 max-w-lg leading-relaxed">
                            I help leaders find their authentic voice through the True Influence Method™ — building trust, emotional clarity, and real-world impact.
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 mb-10">
                            <a href="mailto:info@mywomenofinfluence.com"
                                class="inline-flex items-center justify-center px-8 py-4 bg-[#d4b478] text-[#0f203d] font-semibold rounded-full hover:bg-[#e8a838] transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Book Me to Speak
                            </a>
                            <a href="#about"
                                class="inline-flex items-center justify-center px-8 py-4 border-2 border-[#faf8f5] text-[#faf8f5] font-semibold rounded-full hover:bg-[#faf8f5] hover:text-[#0f203d] transition-all duration-300">
                                Learn More
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Image Area -->
                    <div class="relative h-[500px] lg:h-[700px] w-full rounded-2xl overflow-hidden shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#0f203d]/30 to-[#0f203d]/30">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/joanna-hero.webp"
                                alt="Me speaking on stage"
                                class="w-full h-full object-cover"
                                loading="eager" />
                            <div class="absolute inset-0 bg-[#d4b478]/5 mix-blend-multiply"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- HER STORY                                  -->
        <!-- ========================================== -->
        <section id="about" class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                            My Story
                        </div>

                        <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8 leading-tight">
                            It Started With a Question: <span class="block text-[#d4b478] mt-2">What If the Most Powerful Thing You Could Do Is Tell the Truth?</span>
                        </h2>

                        <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-6">
                            I have spent a lifetime at the edges of transformation — in theatre, in classrooms, in boardrooms, in communities. As an actress, educator, entrepreneur, and investor, I learned that the leaders who create lasting impact are not the loudest or the most polished. They are the most honest.
                        </p>

                        <p class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-8">
                            I created the True Influence Method™ to give leaders a rigorous, human-centered process for doing exactly that. Through my signature interview-based approach, I surface the truth beneath the noise — the defining moment, the real why, the lived experience that makes a message land.
                        </p>

                        <blockquote class="font-serif italic text-2xl text-[#d4b478] border-l-4 border-[#d4b478] pl-6 my-8">
                            The result is a voice that doesn't just communicate. It leads.
                        </blockquote>
                    </div>

                    <div class="relative">
                        <!-- Story Image -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/joanna2.webp"
                                alt="Me in action - speaking to a room or working one-on-one with a client"
                                class="w-full h-[600px] object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/70 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- CREDENTIALS: A LIFETIME OF EXCELLENCE      -->
        <!-- ========================================== -->
        <section class="relative py-24 md:py-32 overflow-hidden">
            <!-- Full-bleed background image with parallax feel -->
            <div class="absolute inset-0">
                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/banner.webp"
                    alt="Me on stage"
                    class="w-full h-full object-cover"
                    style="object-position: center 30%;" />
                <div class="absolute inset-0 bg-gradient-to-r from-[#0f203d]/95 via-[#0f203d]/85 to-[#0f203d]/70"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/90 via-transparent to-[#0f203d]/60"></div>
            </div>

            <!-- Decorative texture overlay -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d4b478' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <!-- Section header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        Background
                    </div>
                    <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-6">
                        A Lifetime of Excellence
                    </h2>
                    <p class="text-[#faf8f5]/70 text-lg max-w-2xl mx-auto">
                        Three decades at the intersection of performance, education, and leadership have shaped a methodology that transforms how leaders show up in the world.
                    </p>
                </div>

                <!-- Asymmetrical photo grid + credentials -->
                <div class="grid lg:grid-cols-12 gap-8 items-start">
                    <!-- Left: Large feature image -->
                    <div class="lg:col-span-5 relative">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/IMG_4546.webp"
                                alt="Me speaking at a corporate event"
                                class="w-full h-[500px] lg:h-[640px] object-cover transition-transform duration-700 group-hover:scale-105" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/80 via-transparent to-transparent"></div>
                        </div>
                    </div>

                    <!-- Right: Credentials as visual narrative tiles -->
                    <div class="lg:col-span-7 grid sm:grid-cols-2 gap-5">
                        <!-- Credential 1: Harvard -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/carousel/img6.webp"
                                    alt="Harvard background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">Harvard Graduate</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">World-class education that shaped my intellectual foundation and global perspective.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credential 2: 6x Founder -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/brand.jpg"
                                    alt="Founder background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                            <path d="M2 17l10 5 10-5"></path>
                                            <path d="M2 12l10 5 10-5"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">6x Founder</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">Impact investor and serial entrepreneur building businesses that matter.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credential 3: TEDx -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/IMG_4580.webp"
                                    alt="TEDx stage background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path>
                                            <path d="M12 6v6l4 2"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">TEDx Speaker</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">Global stage presence sharing ideas that challenge and inspire audiences worldwide.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credential 4: 5000+ Leaders -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/oneonone.webp"
                                    alt="Coaching session background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">5,000+ Leaders</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">Trained and transformed through the True Influence Method™ across industries.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credential 5: University Lecturer -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/IMG_4598.webp"
                                    alt="Lecture background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">University Lecturer</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">Educator and mentor shaping the next generation of visionary leaders.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credential 6: Forbes Council -->
                        <div class="group relative overflow-hidden rounded-2xl bg-[#faf8f5]/5 border border-[#d4b478]/10 hover:border-[#d4b478]/30 transition-all duration-500">
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/corporate/IMG_6745.webp"
                                    alt="Forbes Council background"
                                    class="w-full h-full object-cover opacity-20" />
                            </div>
                            <div class="relative z-10 p-6">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-[#d4b478]/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                            <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                            <path d="M2 17l10 5 10-5"></path>
                                            <path d="M2 12l10 5 10-5"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-serif text-xl text-[#faf8f5] mb-1">Forbes Council</h3>
                                        <p class="text-[#faf8f5]/60 text-sm">Business Council Member contributing thought leadership to the global business community.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- PHILOSOPHY / THE METHOD                    -->
        <!-- ========================================== -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#0f203d]/10 rounded-full blur-[120px]"></div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="relative">
                        <!-- Philosophy Image -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/carousel/img5.webp"
                                alt="My Philosophy - Warm, thoughtful portrait showing depth and wisdom"
                                class="w-full h-[500px] object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#0f203d]/60 to-transparent"></div>
                        </div>
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                            Philosophy
                        </div>

                        <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-8 leading-tight">
                            Your Story Is Not Just Where You've Been. <span class="block text-[#d4b478] mt-2">It's the Reason People Choose to Follow You.</span>
                        </h2>

                        <div class="text-[#0f203d]/80 text-lg md:text-xl leading-relaxed mb-8">
                            I believe that authentic communication is not a skill to be learned — it's a truth to be uncovered. My work begins not with what you want to say, but with who you are and what you've lived. From that foundation, I help leaders build a voice that is authoritative, emotionally resonant, and entirely their own.
                        </div>

                        <blockquote class="font-serif italic text-2xl text-[#d4b478] border-l-4 border-[#d4b478] pl-6 my-8">
                            "Being a voice for your work is not just good for sales. It's good for the soul."
                        </blockquote>
                        <div class="text-[#0f203d]/60 text-sm font-medium">
                            — Me
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- SPEAKING TOPICS                            -->
        <!-- ========================================== -->
        <section class="py-24 md:py-32 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d] relative overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 15; $i++): ?>
                    <div class="absolute w-1 h-1 bg-[#d4b478]/20 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 8 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        Speaking Topics
                    </div>
                    <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-4">
                        Keynotes That Challenge, Inspire, and Transform
                    </h2>
                    <p class="text-[#faf8f5]/70 text-lg max-w-2xl mx-auto">
                        I bring decades of stage and boardroom experience to every engagement, delivering talks that move audiences from insight to action.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Topic 1 -->
                    <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path>
                                    <path d="M12 6v6l4 2"></path>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#faf8f5] mb-2">True Influence</h3>
                            <p class="text-[#d4b478] text-sm font-medium mb-4">Going Beyond Performance to Leading with Your Why</p>
                            <p class="text-[#faf8f5]/70 leading-relaxed mb-6">
                                I dismantle the myth that vulnerability is weakness, showing how emotional honesty builds unshakeable trust and loyalty in modern organizations.
                            </p>
                        </div>
                    </div>

                    <!-- Topic 2 -->
                    <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#faf8f5] mb-2">The Bravery-Safety Paradox</h3>
                            <p class="text-[#d4b478] text-sm font-medium mb-4">How Leaders Create Spaces of Belonging</p>
                            <p class="text-[#faf8f5]/70 leading-relaxed mb-6">
                                I explore how psychological safety isn't about comfort—it's about the courage to be real. Together, we learn to create environments where innovation thrives.
                            </p>
                        </div>
                    </div>

                    <!-- Topic 3 -->
                    <div class="group relative bg-[#faf8f5]/5 backdrop-blur-sm border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path>
                                    <path d="M12 16v-4"></path>
                                    <path d="M12 8h.01"></path>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#faf8f5] mb-2">Women Leading the Future</h3>
                            <p class="text-[#d4b478] text-sm font-medium mb-4">Emotional Connection as a Superpower</p>
                            <p class="text-[#faf8f5]/70 leading-relaxed mb-6">
                                A transformative talk I give for female leaders on harnessing emotional intelligence and authentic voice to lead with authority and grace.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- PARTNERS / LOGO STRIP                      -->
        <!-- ========================================== -->
        <section class="bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mb-12"></div>
                <div class="text-center mb-12">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                        Trusted By
                    </span>
                </div>
            </div>

            <!-- Marquee Logo Strip -->
            <div class="relative w-full partners-marquee-wrapper">
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 md:w-32 z-10 bg-gradient-to-r from-white to-transparent"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-16 md:w-32 z-10 bg-gradient-to-l from-white to-transparent"></div>

                <div class="partners-marquee-track flex items-center" aria-label="As Seen On">
                    <?php
                    $partners = [
                        ['name' => 'ABC', 'logo' => 'abc.png'],
                        ['name' => 'Forbes', 'logo' => 'forbes.jpeg'],
                        ['name' => 'Shambhala', 'logo' => 'shambhala.png'],
                        ['name' => 'MTV', 'logo' => 'mtv.png'],
                        ['name' => 'Harvard', 'logo' => 'harvard.svg'],
                        ['name' => 'Bioneers', 'logo' => 'bioneers.png'],
                        ['name' => 'USA Today', 'logo' => 'usa-today.svg'],
                        ['name' => 'Flagler College', 'logo' => 'flagler.png'],
                        ['name' => 'Bloomberg', 'logo' => 'bloomberg.png'],
                    ];
                    for ($i = 0; $i < 2; $i++) :
                        foreach ($partners as $partner) :
                    ?>
                        <div class="flex-shrink-0 flex items-center justify-center px-6 md:px-10 py-4 group" aria-label="<?php echo esc_attr($partner['name']); ?>">
                            <img src="<?php echo esc_url($theme_uri . '/assets/images/partners/' . $partner['logo']); ?>"
                                alt="<?php echo esc_attr($partner['name']); ?>"
                                class="max-h-10 md:max-h-14 w-auto object-contain grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-500 select-none"
                                draggable="false" />
                        </div>
                    <?php
                        endforeach;
                    endfor;
                    ?>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6">
                <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent mt-12"></div>
            </div>
        </section>

        <style>
            .partners-marquee-track {
                width: max-content;
                animation: partners-marquee-scroll 40s linear infinite;
                will-change: transform;
            }
            .partners-marquee-wrapper:hover .partners-marquee-track,
            .partners-marquee-wrapper:focus-within .partners-marquee-track {
                animation-play-state: paused;
            }
            @keyframes partners-marquee-scroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @media (prefers-reduced-motion: reduce) {
                .partners-marquee-track {
                    animation: none;
                    flex-wrap: wrap;
                    justify-content: center;
                    width: auto;
                }
            }
        </style>

        <!-- ========================================== -->
        <!-- TESTIMONIALS / SOCIAL PROOF                -->
        <!-- ========================================== -->
        <section class="py-20 bg-[#0f203d] relative overflow-hidden">
            <div class="absolute inset-0">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-[#0f203d]/50 rounded-full blur-[120px]"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-12">
                    <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        Trusted by Leaders
                    </span>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="bg-[#0f203d]/50 backdrop-blur-sm p-8 rounded-xl border border-[#faf8f5]/10 hover:border-[#d4b478]/30 transition-all duration-300 relative">
                        <div class="absolute top-6 left-6 text-[#d4b478]/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21L14.017 18C14.017 16.896 14.321 15.792 14.929 14.688L15.536 13.584C16.145 12.48 16.449 11.376 16.449 10.272V8.352C16.449 7.248 16.145 6.144 15.536 5.04L14.929 3.936C14.321 2.832 14.017 1.728 14.017 0.624V-2.136L12.801 -2.136L12.801 0.624C12.801 1.728 12.497 2.832 11.889 3.936L11.281 5.04C10.673 6.144 10.369 7.248 10.369 8.352V10.272C10.369 11.376 10.673 12.48 11.281 13.584L11.889 14.688C12.497 15.792 12.801 16.896 12.801 18L12.801 21H14.017ZM5.985 21L5.985 18C5.985 16.896 6.289 15.792 6.897 14.688L7.505 13.584C8.113 12.48 8.417 11.376 8.417 10.272V8.352C8.417 7.248 8.113 6.144 7.505 5.04L6.897 3.936C6.289 2.832 5.985 1.728 5.985 0.624V-2.136L4.769 -2.136L4.769 0.624C4.769 1.728 4.465 2.832 3.857 3.936L3.249 5.04C2.641 6.144 2.337 7.248 2.337 8.352V10.272C2.337 11.376 2.641 12.48 3.249 13.584L3.857 14.688C4.465 15.792 4.769 16.896 4.769 18L4.769 21H5.985Z" />
                            </svg>
                        </div>
                        <div class="relative z-10">
                            <p class="font-serif italic text-xl text-[#faf8f5]/90 mb-6 leading-relaxed">
                                A client once told me: "Working with you has been nothing short of life-changing. You helped me find the voice I didn't know I had."
                            </p>
                            <div class="flex items-center gap-3">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/carousel/img1.webp" alt="A. Robinson" class="w-12 h-12 rounded-full object-cover border-2 border-[#d4b478]/30" />
                                <div>
                                    <p class="text-[#d4b478] font-semibold">A. Robinson</p>
                                    <p class="text-[#faf8f5]/60 text-sm">Private Client</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="bg-[#0f203d]/50 backdrop-blur-sm p-8 rounded-xl border border-[#faf8f5]/10 hover:border-[#d4b478]/30 transition-all duration-300 relative">
                        <div class="absolute top-6 left-6 text-[#d4b478]/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21L14.017 18C14.017 16.896 14.321 15.792 14.929 14.688L15.536 13.584C16.145 12.48 16.449 11.376 16.449 10.272V8.352C16.449 7.248 16.145 6.144 15.536 5.04L14.929 3.936C14.321 2.832 14.017 1.728 14.017 0.624V-2.136L12.801 -2.136L12.801 0.624C12.801 1.728 12.497 2.832 11.889 3.936L11.281 5.04C10.673 6.144 10.369 7.248 10.369 8.352V10.272C10.369 11.376 10.673 12.48 11.281 13.584L11.889 14.688C12.497 15.792 12.801 16.896 12.801 18L12.801 21H14.017ZM5.985 21L5.985 18C5.985 16.896 6.289 15.792 6.897 14.688L7.505 13.584C8.113 12.48 8.417 11.376 8.417 10.272V8.352C8.417 7.248 8.113 6.144 7.505 5.04L6.897 3.936C6.289 2.832 5.985 1.728 5.985 0.624V-2.136L4.769 -2.136L4.769 0.624C4.769 1.728 4.465 2.832 3.857 3.936L3.249 5.04C2.641 6.144 2.337 7.248 2.337 8.352V10.272C2.337 11.376 2.641 12.48 3.249 13.584L3.857 14.688C4.465 15.792 4.769 16.896 4.769 18L4.769 21H5.985Z" />
                            </svg>
                        </div>
                        <div class="relative z-10">
                            <p class="font-serif italic text-xl text-[#faf8f5]/90 mb-6 leading-relaxed">
                                One leader shared: "A game changer in coaching. Your process is nothing short of transformative — every leader needs this."
                            </p>
                            <div class="flex items-center gap-3">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/carousel/img2.webp" alt="Sarah Chen" class="w-12 h-12 rounded-full object-cover border-2 border-[#d4b478]/30" />
                                <div>
                                    <p class="text-[#d4b478] font-semibold">Sarah Chen</p>
                                    <p class="text-[#faf8f5]/60 text-sm">Private Client</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="bg-[#0f203d]/50 backdrop-blur-sm p-8 rounded-xl border border-[#faf8f5]/10 hover:border-[#d4b478]/30 transition-all duration-300 relative">
                        <div class="absolute top-6 left-6 text-[#d4b478]/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14.017 21L14.017 18C14.017 16.896 14.321 15.792 14.929 14.688L15.536 13.584C16.145 12.48 16.449 11.376 16.449 10.272V8.352C16.449 7.248 16.145 6.144 15.536 5.04L14.929 3.936C14.321 2.832 14.017 1.728 14.017 0.624V-2.136L12.801 -2.136L12.801 0.624C12.801 1.728 12.497 2.832 11.889 3.936L11.281 5.04C10.673 6.144 10.369 7.248 10.369 8.352V10.272C10.369 11.376 10.673 12.48 11.281 13.584L11.889 14.688C12.497 15.792 12.801 16.896 12.801 18L12.801 21H14.017ZM5.985 21L5.985 18C5.985 16.896 6.289 15.792 6.897 14.688L7.505 13.584C8.113 12.48 8.417 11.376 8.417 10.272V8.352C8.417 7.248 8.113 6.144 7.505 5.04L6.897 3.936C6.289 2.832 5.985 1.728 5.985 0.624V-2.136L4.769 -2.136L4.769 0.624C4.769 1.728 4.465 2.832 3.857 3.936L3.249 5.04C2.641 6.144 2.337 7.248 2.337 8.352V10.272C2.337 11.376 2.641 12.48 3.249 13.584L3.857 14.688C4.465 15.792 4.769 16.896 4.769 18L4.769 21H5.985Z" />
                            </svg>
                        </div>
                        <div class="relative z-10">
                            <p class="font-serif italic text-xl text-[#faf8f5]/90 mb-6 leading-relaxed">
                                A corporate client said: "We knew training would be good, but got far more than we expected. You shifted our entire leadership culture."
                            </p>
                            <div class="flex items-center gap-3">
                                <img src="<?php echo esc_url($theme_uri); ?>/assets/images/carousel/img3.webp" alt="Michael Torres" class="w-12 h-12 rounded-full object-cover border-2 border-[#d4b478]/30" />
                                <div>
                                    <p class="text-[#d4b478] font-semibold">Michael Torres</p>
                                    <p class="text-[#faf8f5]/60 text-sm">Corporate Client</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Animated Metrics -->
                <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8" id="social-proof-metrics">
                    <?php
                    $metrics = [
                        ['number' => '30', 'prefix' => '', 'suffix' => '+', 'label' => 'Years of Impact'],
                        ['number' => '5000', 'prefix' => '', 'suffix' => '+', 'label' => 'Leaders Transformed'],
                        ['number' => '1000', 'prefix' => '', 'suffix' => '+', 'label' => 'Keynotes Delivered'],
                        ['number' => '6', 'prefix' => '', 'suffix' => 'x', 'label' => 'Founder & Investor'],
                    ];
                    foreach ($metrics as $metric) :
                        $raw_number = intval(preg_replace('/[^0-9]/', '', $metric['number']));
                    ?>
                        <div class="stat-box text-center p-6 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm transition-transform duration-300 hover:scale-105">
                            <p class="text-3xl md:text-4xl font-serif font-semibold text-[#d4b478] mb-2">
                                <?php if (!empty($metric['prefix'])) : ?>
                                    <span class="stat-prefix"><?php echo esc_html($metric['prefix']); ?></span>
                                <?php endif; ?>
                                <span class="stat-counter" data-target="<?php echo esc_attr($raw_number); ?>" data-duration="2000">0</span>
                                <?php if (!empty($metric['suffix'])) : ?>
                                    <span class="stat-suffix"><?php echo esc_html($metric['suffix']); ?></span>
                                <?php endif; ?>
                            </p>
                            <p class="text-[#faf8f5]/60 text-xs md:text-sm uppercase tracking-wider"><?php echo esc_html($metric['label']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <script>
            (function() {
                'use strict';
                function animateCounter(el) {
                    var target = parseInt(el.getAttribute('data-target'), 10);
                    var duration = parseInt(el.getAttribute('data-duration'), 10) || 2000;
                    if (isNaN(target) || target === 0) { el.textContent = target; return; }
                    var start = 0;
                    var startTime = null;
                    function easeOutQuart(t) { return 1 - Math.pow(1 - t, 4); }
                    function formatNumber(n) { return n.toLocaleString('en-US'); }
                    function step(timestamp) {
                        if (!startTime) startTime = timestamp;
                        var progress = Math.min((timestamp - startTime) / duration, 1);
                        var easedProgress = easeOutQuart(progress);
                        var current = Math.floor(easedProgress * target);
                        el.textContent = formatNumber(current);
                        if (progress < 1) { window.requestAnimationFrame(step); } else { el.textContent = formatNumber(target); }
                    }
                    window.requestAnimationFrame(step);
                }
                function initCounters() {
                    var counters = document.querySelectorAll('#social-proof-metrics .stat-counter');
                    if (!counters.length) return;
                    if ('IntersectionObserver' in window) {
                        var observer = new IntersectionObserver(function(entries) {
                            entries.forEach(function(entry) {
                                if (entry.isIntersecting) { animateCounter(entry.target); observer.unobserve(entry.target); }
                            });
                        }, { threshold: 0.3 });
                        counters.forEach(function(counter) { observer.observe(counter); });
                    } else {
                        counters.forEach(function(counter) {
                            var target = parseInt(counter.getAttribute('data-target'), 10);
                            counter.textContent = target.toLocaleString('en-US');
                        });
                    }
                }
                if (document.readyState === 'loading') { document.addEventListener('DOMContentLoaded', initCounters); } else { initCounters(); }
            })();
        </script>

        <!-- ========================================== -->
        <!-- HOW TO WORK WITH JOANNA                    -->
        <!-- ========================================== -->
        <section class="py-24 md:py-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
            <div class="absolute top-0 left-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <div class="max-w-6xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/30 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                        How to Work with Me
                    </div>
                    <h2 class="font-serif text-4xl md:text-6xl text-[#0f203d] mb-4">
                        Tailored Solutions for Individuals, Teams, and Organizations
                    </h2>
                    <p class="text-[#0f203d]/70 text-lg max-w-2xl mx-auto">
                        Whether you're a founder finding your voice or an organization building a culture of authentic leadership, I have a path for you.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div class="group relative bg-white border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 shadow-sm hover:shadow-xl flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-3">Private Advising</h3>
                            <p class="text-[#0f203d]/70 leading-relaxed mb-6">
                                I believe today's leaders are valued less for expertise and more on their capacity to connect and move others toward action for a greater purpose. I help you lead with your "why."
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    One-on-one executive coaching
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Personalized voice & message development
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Ongoing strategic advisory
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url(home_url('/apply/')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#d4b478] text-[#0f203d] font-semibold rounded-lg hover:bg-[#e8a838] transition-all mt-auto">
                            Apply for Coaching
                        </a>
                    </div>

                    <!-- Service 2 -->
                    <div class="group relative bg-white border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 shadow-sm hover:shadow-xl flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"></path>
                                    <path d="M12 6v6l4 2"></path>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-3">Keynote Speaking</h3>
                            <p class="text-[#0f203d]/70 leading-relaxed mb-6">
                                Bring my transformative message to your event. I am perfect for conferences, summits, and corporate gatherings seeking high-impact inspiration.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Custom keynotes & breakout sessions
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Panel moderation & fireside chats
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Virtual & in-person availability
                                </li>
                            </ul>
                        </div>
                        <a href="mailto:info@mywomenofinfluence.com" class="inline-flex items-center justify-center px-6 py-3 bg-[#d4b478] text-[#0f203d] font-semibold rounded-lg hover:bg-[#e8a838] transition-all mt-auto">
                            Book a Keynote
                        </a>
                    </div>

                    <!-- Service 3 -->
                    <div class="group relative bg-white border border-[#d4b478]/10 rounded-2xl p-8 hover:border-[#d4b478]/30 transition-all hover:-translate-y-2 shadow-sm hover:shadow-xl flex flex-col">
                        <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px]"></div>
                        <div class="relative z-10 flex-1">
                            <div class="w-14 h-14 bg-[#d4b478]/10 rounded-xl flex items-center justify-center mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#d4b478]">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                            <h3 class="font-serif text-2xl text-[#0f203d] mb-3">Leadership Training</h3>
                            <p class="text-[#0f203d]/70 leading-relaxed mb-6">
                                For growth-oriented founders & CEOs, I help you gain insight on your rare strategic advantage to shift leadership identity, build brand voice and deepen your team's sense of belonging.
                            </p>
                            <ul class="space-y-2 mb-6">
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    90-Day Mastermind
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Private Training Cohort
                                </li>
                                <li class="flex items-start gap-2 text-sm text-[#0f203d]/70">
                                    <svg class="w-4 h-4 text-[#d4b478] mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    Corporate Programs
                                </li>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url(home_url('/programs/corporate/')); ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#d4b478] text-[#0f203d] font-semibold rounded-lg hover:bg-[#e8a838] transition-all mt-auto">
                            Explore Training
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================================== -->
        <!-- CTA: READY TO FIND YOUR VOICE?             -->
        <!-- ========================================== -->
        <section class="py-24 md:py-32 bg-gradient-to-br from-[#0f203d] via-[#0f203d] to-[#0f203d] relative overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/20 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 7 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <div class="mb-12">
                    <div class="relative inline-block">
                        <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 rounded-full"></div>
                        <img src="<?php echo esc_url($theme_uri); ?>/assets/images/icononly_transparent_nobuffer.png"
                            alt="True Influence Method Logo"
                            class="w-32 h-32 object-contain relative z-10" />
                    </div>
                </div>

                <h2 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-6">
                    Ready to Find Your Voice?
                </h2>
                <div class="text-[#faf8f5]/80 text-lg md:text-xl mb-12 max-w-2xl mx-auto">
                    The first step is a conversation. Fill out my private client inquiry form and my team will be in touch to guide you toward the right path.
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-10">
                    <a href="<?php echo esc_url(home_url('/apply/')); ?>"
                        class="inline-flex items-center gap-3 px-10 py-5 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-xl hover:shadow-[#d4b478]/20 text-lg group">
                        Apply to Work With Me
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="mailto:info@mywomenofinfluence.com"
                        class="inline-flex items-center gap-3 px-10 py-5 border-2 border-[#d4b478] text-[#d4b478] hover:bg-[#d4b478]/10 font-semibold rounded-lg transition-all text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        info@mywomenofinfluence.com
                    </a>
                </div>

                <div class="text-[#faf8f5]/50 text-sm">
                    Or email directly at <a href="mailto:info@mywomenofinfluence.com" class="text-[#d4b478] hover:underline">info@mywomenofinfluence.com</a>
                </div>
            </div>
        </section>

    </div><!-- /.overflow-x-hidden -->

    <?php get_footer(); ?>
</body>

</html>
