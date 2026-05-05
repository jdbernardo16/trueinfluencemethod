<?php

/**
 * Template Name: ICP Quiz Page
 * Description: 5-question ICP assessment quiz to determine the user's influence path
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

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-float {
            animation: float ease-in-out infinite;
        }
        .quiz-question {
            display: none;
            opacity: 0;
            transform: translateX(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }
        .quiz-question.active {
            display: block;
            opacity: 1;
            transform: translateX(0);
        }
        .quiz-question.slide-out {
            opacity: 0;
            transform: translateX(-20px);
        }
        .quiz-option input[type="radio"]:checked + span {
            color: #0f203d;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">

        <!-- Hero -->
        <section class="relative py-20 md:py-24 bg-[#0f203d] overflow-hidden">
            <!-- Decorative glow -->
            <div class="absolute top-20 left-10 w-72 h-72 bg-[#d4b478]/10 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

            <!-- Particles -->
            <div class="absolute inset-0 overflow-hidden">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                        style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                    </div>
                <?php endfor; ?>
            </div>

            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full animate-pulse"></span>
                    Influence Path Assessment
                </span>
                <h1 class="font-serif text-4xl md:text-6xl text-[#faf8f5] mb-4">Find Your Path</h1>
                <p class="text-[#faf8f5]/70 text-lg">5 questions &middot; ~2 minutes</p>
            </div>
        </section>

        <!-- Quiz Section -->
        <section class="py-24 md:py-32 bg-[#faf8f5]" id="quizSection">
            <div class="max-w-3xl mx-auto px-6">

                <!-- Quiz Container -->
                <div id="quizContainer">

                    <!-- Progress Bar -->
                    <div class="mb-10">
                        <div class="w-full h-2 bg-[#0f203d]/10 rounded-full overflow-hidden">
                            <div id="progressFill" class="h-full bg-[#d4b478] rounded-full transition-all duration-500 ease-out" style="width: 20%"></div>
                        </div>
                        <p id="progressLabel" class="text-center text-sm text-[#0f203d]/50 mt-3">Question 1 of 5</p>
                    </div>

                    <!-- Questions -->
                    <form id="quizForm" onsubmit="return false">

                        <!-- Q1 -->
                        <div id="q1" class="quiz-question active">
                            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10">
                                <span class="block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 1 of 5</span>
                                <h2 class="font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    How many years have you been leading or building your business?
                                </h2>

                                <div class="space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q1" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">0&ndash;2 years &mdash; Still finding my footing</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q1" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">3&ndash;8 years &mdash; Building momentum</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q1" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">10&ndash;20 years &mdash; Established and scaling</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q1" value="3" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">20+ years &mdash; Industry veteran</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-end mt-8">
                                <button onclick="nextQuestion(1)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- Q2 -->
                        <div id="q2" class="quiz-question">
                            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10">
                                <span class="block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 2 of 5</span>
                                <h2 class="font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What is your approximate annual revenue or equivalent scale of impact?
                                </h2>

                                <div class="space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q2" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">Under $100K</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q2" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">$100K &ndash; $500K</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q2" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">$500K &ndash; $5M</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q2" value="3" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">$5M+</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(2)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(2)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- Q3 -->
                        <div id="q3" class="quiz-question">
                            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10">
                                <span class="block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 3 of 5</span>
                                <h2 class="font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    When someone asks what you do, which sounds most familiar?
                                </h2>

                                <div class="space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q3" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">I start explaining instead of giving a clear answer</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q3" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">I give too much context before saying anything clear</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q3" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">My message sounds similar to everyone else in my space</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(3)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(3)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- Q4 -->
                        <div id="q4" class="quiz-question">
                            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10">
                                <span class="block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 4 of 5</span>
                                <h2 class="font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What feels most true about your message right now?
                                </h2>

                                <div class="space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q4" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">I can&rsquo;t clearly define what makes me different</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q4" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">I have clarity but my message doesn&rsquo;t land the way I want</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q4" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">I am respected but not truly distinct in my market</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(4)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(4)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    Next &rarr;
                                </button>
                            </div>
                        </div>

                        <!-- Q5 -->
                        <div id="q5" class="quiz-question">
                            <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border border-[#d4b478]/10">
                                <span class="block text-[#d4b478] text-sm font-bold tracking-[0.15em] uppercase mb-2">Question 5 of 5</span>
                                <h2 class="font-serif text-2xl md:text-3xl text-[#0f203d] mb-8">
                                    What outcome matters most to you right now?
                                </h2>

                                <div class="space-y-4">
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q5" value="0" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">Find my voice &mdash; know what defines me and why it matters</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q5" value="1" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">Move the room &mdash; communicate with clarity and impact</span>
                                    </label>
                                    <label class="quiz-option flex items-center gap-4 p-5 bg-[#faf8f5] border-2 border-[#0f203d]/10 rounded-xl cursor-pointer transition-all duration-200 hover:border-[#d4b478]/50 hover:bg-[#faf8f5] has-[:checked]:border-[#d4b478] has-[:checked]:bg-[#d4b478]/5 has-[:checked]:shadow-md">
                                        <input type="radio" name="q5" value="2" class="appearance-none w-5 h-5 border-2 border-[#0f203d]/30 rounded-full checked:border-[#d4b478] checked:bg-[#d4b478] checked:ring-2 checked:ring-[#d4b478]/30 transition-all flex-shrink-0">
                                        <span class="text-[#0f203d]/80">Be known &mdash; claim my distinct contribution and legacy</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex justify-between mt-8">
                                <button onclick="prevQuestion(5)" class="px-6 py-3 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 font-semibold rounded-lg transition-all">&larr; Back</button>
                                <button onclick="nextQuestion(5)" class="next-btn px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 disabled:opacity-40 disabled:cursor-not-allowed" disabled>
                                    See My Results
                                </button>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Result Card -->
                <div id="resultCard" class="hidden bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-[#d4b478]/10 text-center">
                    <div class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-6">
                        Your Profile
                    </div>
                    <h2 id="resultTitle" class="font-serif text-4xl text-[#0f203d] mb-4"></h2>
                    <p id="resultDesc" class="text-[#0f203d]/70 text-lg mb-8 max-w-xl mx-auto"></p>

                    <!-- Your Path Box -->
                    <div id="resultOutcome" class="bg-[#d4b478]/5 border border-[#d4b478]/20 rounded-xl p-6 mb-6 text-left text-[#0f203d]/80 leading-relaxed"></div>

                    <!-- Not Ready Box -->
                    <div id="resultAnti" class="bg-red-50 border border-red-200 rounded-xl p-6 mb-8 text-left text-red-700 leading-relaxed"></div>

                    <!-- Action buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a id="resultCta" href="#" class="inline-flex items-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group">
                            Go to My Path
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                        <button onclick="resetQuiz()" class="px-8 py-4 border-2 border-[#0f203d]/20 text-[#0f203d]/60 hover:bg-[#0f203d]/5 font-semibold rounded-lg transition-all">
                            Retake Quiz
                        </button>
                    </div>
                </div>

            </div>
        </section>

    </div>

    <script>
        (function() {
            // --- State ---
            var currentQuestion = 1;
            var totalQuestions = 5;

            var results = {
                speaker: {
                    title: 'The Speaker',
                    desc: 'You are early-stage in your leadership journey. You know you have something to say, but you haven\'t yet identified the specific moment that explains your leadership.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Start with a Breakthrough Session or Phase 1 to find your defining moment and clarify your "why."',
                    anti: '<strong>Not ready for:</strong> Phase 2 or 3 &mdash; those build on foundational clarity you need to establish first.',
                    url: '/icp-path/?icp=speaker'
                },
                authority: {
                    title: 'The Authority',
                    desc: 'You have experience and some clarity, but your message hasn\'t yet broken through to create the distinction you deserve. You are ready to go deeper.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Phase 2 or a full intensive to refine your core message and give it the structure to land powerfully.',
                    anti: '<strong>Not ready for:</strong> Phase 3 delivery work &mdash; your message needs to be sharpened first before it can be amplified.',
                    url: '/icp-path/?icp=authority'
                },
                legacy: {
                    title: 'The Legacy Leader',
                    desc: 'You are established but not yet distinct. You have the track record. Now it\'s time to claim your unique contribution and build a message that cements your legacy.',
                    outcome: '<strong class="text-[#d4b478]">Your path:</strong> Phase 3 or Private Client work to craft a signature narrative and deliver it with the authority your experience demands.',
                    anti: '<strong>Not ready for:</strong> Staying where you are &mdash; your market needs you to step into your distinction now.',
                    url: '/icp-path/?icp=legacy'
                }
            };

            // --- DOM refs ---
            var progressFill = document.getElementById('progressFill');
            var progressLabel = document.getElementById('progressLabel');
            var quizContainer = document.getElementById('quizContainer');
            var resultCard = document.getElementById('resultCard');

            // --- Helpers ---
            function getSelectedValue(qNum) {
                var radios = document.getElementsByName('q' + qNum);
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        return parseInt(radios[i].value, 10);
                    }
                }
                return null;
            }

            function updateProgress(qNum) {
                var pct = (qNum / totalQuestions) * 100;
                progressFill.style.width = pct + '%';
                progressLabel.textContent = 'Question ' + qNum + ' of ' + totalQuestions;
            }

            function showQuestion(qNum) {
                // Hide all questions
                for (var i = 1; i <= totalQuestions; i++) {
                    var el = document.getElementById('q' + i);
                    if (el) {
                        el.classList.remove('active');
                        el.style.display = 'none';
                    }
                }
                // Show target
                var target = document.getElementById('q' + qNum);
                if (target) {
                    target.style.display = 'block';
                    // Force reflow then add active for transition
                    void target.offsetWidth;
                    target.classList.add('active');
                }
                updateProgress(qNum);
                currentQuestion = qNum;
            }

            function updateNextButton(qNum) {
                var q = document.getElementById('q' + qNum);
                if (!q) return;
                var btn = q.querySelector('.next-btn');
                if (!btn) return;
                var val = getSelectedValue(qNum);
                btn.disabled = val === null;
            }

            // --- Exposed globals ---
            window.nextQuestion = function(qNum) {
                var val = getSelectedValue(qNum);
                if (val === null) return;

                if (qNum === totalQuestions) {
                    // Calculate and show result
                    calculateResult();
                    return;
                }

                var nextQ = qNum + 1;
                showQuestion(nextQ);
                updateNextButton(nextQ);
            };

            window.prevQuestion = function(qNum) {
                if (qNum <= 1) return;
                var prevQ = qNum - 1;
                showQuestion(prevQ);
                updateNextButton(prevQ);
            };

            window.calculateResult = function() {
                // Gather all answers
                var scores = [];
                for (var i = 1; i <= totalQuestions; i++) {
                    var v = getSelectedValue(i);
                    if (v === null) return;
                    scores.push(v);
                }

                // Q1: 0-3, Q2: 0-3, Q3: 0-2, Q4: 0-2, Q5: 0-2
                // Average < 1.2 → speaker, < 2.2 → authority, >= 2.2 → legacy
                var sum = scores[0] + scores[1] + scores[2] + scores[3] + scores[4];
                var avg = sum / totalQuestions;

                var key;
                if (avg < 1.2) {
                    key = 'speaker';
                } else if (avg < 2.2) {
                    key = 'authority';
                } else {
                    key = 'legacy';
                }

                var r = results[key];

                // Populate result card
                document.getElementById('resultTitle').textContent = r.title;
                document.getElementById('resultDesc').textContent = r.desc;
                document.getElementById('resultOutcome').innerHTML = r.outcome;
                document.getElementById('resultAnti').innerHTML = r.anti;
                document.getElementById('resultCta').href = r.url;

                // Hide quiz, show result
                quizContainer.style.display = 'none';
                resultCard.classList.remove('hidden');
                resultCard.style.display = 'block';

                // Scroll to result
                setTimeout(function() {
                    resultCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            };

            window.resetQuiz = function() {
                // Clear all radio selections
                var radios = document.querySelectorAll('#quizForm input[type="radio"]');
                for (var i = 0; i < radios.length; i++) {
                    radios[i].checked = false;
                }

                // Show quiz, hide result
                resultCard.style.display = 'none';
                resultCard.classList.add('hidden');
                quizContainer.style.display = 'block';

                // Reset to question 1
                showQuestion(1);
                updateNextButton(1);

                // Scroll to top of quiz
                document.getElementById('quizSection').scrollIntoView({ behavior: 'smooth', block: 'start' });
            };

            // --- Radio change listeners ---
            document.addEventListener('DOMContentLoaded', function() {
                var radios = document.querySelectorAll('#quizForm input[type="radio"]');
                for (var i = 0; i < radios.length; i++) {
                    radios[i].addEventListener('change', function() {
                        var name = this.getAttribute('name');
                        var qNum = parseInt(name.substring(1), 10);
                        updateNextButton(qNum);
                    });
                }

                // Init: show Q1, update progress
                showQuestion(1);
                updateNextButton(1);
            });

        })();
    </script>

    <?php get_footer(); ?>
</body>

</html>
