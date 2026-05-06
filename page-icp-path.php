<?php

/**
 * Template Name: ICP Path Page
 * Description: ICP-specific product recommendation page. Reads ?icp= from URL
 * and displays tailored product recommendations for each ICP persona.
 *
 * @package tim-wordpress
 */

// Prevent direct access.
if (!defined('ABSPATH')) {
    exit;
}

// --- ICP Detection ---
$icp_key = isset($_GET['icp']) ? sanitize_key($_GET['icp']) : 'speaker';
if (!in_array($icp_key, ['speaker', 'authority', 'legacy'], true)) {
    $icp_key = 'speaker';
}

// --- ICP Display Data ---
$icp_display = [
    'speaker' => [
        'badge'  => 'ICP 1',
        'title'  => 'The Speaker',
        'quote'  => 'I know what defines me and why it matters.',
    ],
    'authority' => [
        'badge'  => 'ICP 2',
        'title'  => 'The Authority',
        'quote'  => 'I can clearly communicate a message that lands.',
    ],
    'legacy' => [
        'badge'  => 'ICP 3',
        'title'  => 'The Legacy',
        'quote'  => 'I am known for something specific and valuable.',
    ],
];

$current = $icp_display[$icp_key];

// --- Ladder Map ---
$ladder_map = [
    'speaker' => [
        ['label' => 'You Are Here',           'status' => 'current'],
        ['label' => 'Phase 1: My Why',        'status' => 'recommended'],
        ['label' => 'Phase 2: Talk',          'status' => 'future'],
        ['label' => 'Phase 3: Keynote',       'status' => 'future'],
        ['label' => 'Phase 4: Scale',         'status' => 'future'],
        ['label' => 'Phase 5: Legacy',        'status' => 'future'],
    ],
    'authority' => [
        ['label' => 'Phase 1: My Why',        'status' => 'completed'],
        ['label' => 'You Are Here',           'status' => 'current'],
        ['label' => 'Phase 2: Move the Room', 'status' => 'recommended'],
        ['label' => 'Phase 3: Master My Message', 'status' => 'future'],
        ['label' => 'Phase 4: Scaling Strategy',  'status' => 'future'],
        ['label' => 'Phase 5: Legacy Framework',  'status' => 'future'],
    ],
    'legacy' => [
        ['label' => 'Phase 1: My Why',        'status' => 'completed'],
        ['label' => 'Phase 2: Move the Room', 'status' => 'completed'],
        ['label' => 'Phase 3: Master My Message', 'status' => 'completed'],
        ['label' => 'You Are Here',           'status' => 'current'],
        ['label' => 'Phase 4: Scaling Strategy',  'status' => 'recommended'],
        ['label' => 'Phase 5: Legacy Framework',  'status' => 'future'],
    ],
];

$ladder = $ladder_map[$icp_key];

// --- Product Data ---
$steps_map = [
    'speaker' => [
        [
            'step_label'  => 'STEP 1',
            'name'        => 'Breakthrough Session',
            'price'       => '$2,000',
            'orig_price'  => '',
            'description' => 'One session to see clearly. Walk away with a clear, repeatable message that defines your leadership and why it matters.',
            'tags'        => ['One session', 'Clarity on your message', 'Immediate direction'],
            'cta'         => 'Book Now',
            'link'        => home_url('/icp-product/?product=breakthrough&icp=speaker'),
        ],
        [
            'step_label'  => 'STEP 2',
            'name'        => '4-Session Training Package',
            'price'       => '$8,000',
            'orig_price'  => '',
            'description' => 'Go deeper across four sessions to uncover your defining moment, craft your origin story, and build the foundation of your first leadership message.',
            'tags'        => ['4 sessions', 'Defining moment', 'First leadership message'],
            'cta'         => 'Book Now',
            'link'        => home_url('/icp-product/?product=4session&icp=speaker'),
        ],
        [
            'step_label'  => 'STEP 3',
            'name'        => 'Tell Your Story — My Why',
            'price'       => '$3,200',
            'orig_price'  => '$12,000',
            'description' => 'Join the 90-day Mastermind cohort to clarify your story, receive peer feedback, and share your message live.',
            'tags'        => ['90-day mastermind', 'Peer feedback', 'Live story share'],
            'cta'         => 'Join the Program',
            'link'        => home_url('/icp-product/?product=phase1&icp=speaker'),
        ],
    ],
    'authority' => [
        [
            'step_label'  => 'STEP 1',
            'name'        => 'Move the Room — Signature Talk',
            'price'       => '$12,000',
            'orig_price'  => '$20,000',
            'description' => 'Join the Speaker Cohort to develop a 7-minute signature talk that lands powerfully, with a retreat speaking opportunity included.',
            'tags'        => ['7-min signature talk', 'Speaker cohort', 'Retreat speaking opp'],
            'cta'         => 'Take the Stage',
            'link'        => home_url('/icp-product/?product=phase2&icp=authority'),
        ],
        [
            'step_label'  => 'STEP 2',
            'name'        => 'Master My Message — Keynote/TEDx',
            'price'       => '$25,000',
            'orig_price'  => '$40,000',
            'description' => 'Become known for a keynote-level talk that establishes your thought leader POV and creates a professional speaking reel.',
            'tags'        => ['Keynote-level talk', 'Thought leader POV', 'Speaking reel'],
            'cta'         => 'Create My Keynote',
            'link'        => home_url('/icp-product/?product=phase3&icp=authority'),
        ],
    ],
    'legacy' => [
        [
            'step_label'  => 'STEP 1',
            'name'        => 'Private Training',
            'price'       => 'Custom',
            'orig_price'  => '',
            'description' => 'Work privately with Joanna to craft your distinct narrative, build an executive-level message, and position yourself for legacy impact.',
            'tags'        => ['1:1 coaching', 'Custom curriculum', 'Executive level'],
            'cta'         => 'Apply Now',
            'link'        => home_url('/icp-product/?product=private&icp=legacy'),
        ],
        [
            'step_label'  => 'STEP 2',
            'name'        => 'Scaling Strategy',
            'price'       => 'Starts at $250,000',
            'orig_price'  => '',
            'description' => 'Your message becomes a system. Build team-based delivery, a leadership framework, and scalable influence across your organization.',
            'tags'        => ['Team systems', 'Leadership framework', 'Scalable'],
            'cta'         => 'Scale My Business',
            'link'        => home_url('/icp-product/?product=phase4&icp=legacy'),
        ],
        [
            'step_label'  => 'STEP 3',
            'name'        => 'Legacy Framework',
            'price'       => 'Starts at $1,000,000',
            'orig_price'  => '',
            'description' => 'Your work outlives you. Create a legacy blueprint, succession architecture, and generational impact that defines your contribution forever.',
            'tags'        => ['Legacy blueprint', 'Succession', 'Generational impact'],
            'cta'         => 'Craft My Legacy',
            'link'        => home_url('/icp-product/?product=phase5&icp=legacy'),
        ],
    ],
];

$steps = $steps_map[$icp_key];

// --- Also Available (authority only) ---
$also_available = [];
if ($icp_key === 'authority') {
    $also_available = [
        'name'        => 'Breakthrough Session',
        'price'       => '$2,000',
        'orig_price'  => '',
        'description' => 'One session to sharpen your message and gain immediate clarity on what makes you distinctive.',
        'tags'        => ['One session', 'Quick clarity'],
        'cta'         => 'Book',
        'link'        => home_url('/icp-product/?product=breakthrough&icp=authority'),
    ];
}

// --- Anti-Recommendations ---
$anti_map = [
    'speaker' => [
        [
            'name'   => 'Move the Room',
            'reason' => 'Builds on Phase 1 — complete that first',
            'price'  => '$12,000',
        ],
        [
            'name'   => 'Master My Message',
            'reason' => 'Requires a structured signature talk first',
            'price'  => '$25,000',
        ],
    ],
    'authority' => [
        [
            'name'   => 'Tell Your Story — My Why',
            'reason' => 'You already have a foundation — you need structure, not discovery',
            'price'  => '$3,200',
        ],
    ],
    'legacy' => [
        [
            'name'   => 'Tell Your Story — My Why',
            'reason' => 'Designed for early-stage — beneath your level',
            'price'  => '$3,200',
        ],
        [
            'name'   => 'Move the Room — Signature Talk',
            'reason' => 'You need legacy positioning, not talk structure',
            'price'  => '$12,000',
        ],
        [
            'name'   => 'Phase 3: Master My Message — Keynote/TEDx',
            'reason' => 'You likely already have this capability',
            'price'  => '$25,000',
        ],
    ],
];

$anti_items = isset($anti_map[$icp_key]) ? $anti_map[$icp_key] : [];

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
            0%, 100% { transform: translateY(0px) translateX(0px); opacity: 0.4; }
            25%      { transform: translateY(-20px) translateX(10px); opacity: 0.8; }
            50%      { transform: translateY(-10px) translateX(-5px); opacity: 0.6; }
            75%      { transform: translateY(-30px) translateX(15px); opacity: 0.9; }
        }

        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); opacity: 0.3; }
            50%      { transform: translateY(-40px) scale(1.1); opacity: 0.7; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50%      { opacity: 0.6; transform: scale(1.05); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .animate-float {
            animation: float ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float-slow ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        .animate-shimmer {
            background-size: 200% auto;
            animation: shimmer 3s linear infinite;
        }

        .stagger-1 { animation-delay: 0.1s; opacity: 0; }
        .stagger-2 { animation-delay: 0.2s; opacity: 0; }
        .stagger-3 { animation-delay: 0.3s; opacity: 0; }
        .stagger-4 { animation-delay: 0.4s; opacity: 0; }
        .stagger-5 { animation-delay: 0.5s; opacity: 0; }

        html { scroll-behavior: smooth; }

        .card-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-lift:hover {
            transform: translateY(-4px);
        }

        /* Card hover image reveal */
        .card-bg-reveal {
            transition: opacity 0.5s ease;
        }
        .group:hover .card-bg-reveal {
            opacity: 1;
        }

        /* Ladder horizontal scroll container */
        .ladder-scroll {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .ladder-scroll::-webkit-scrollbar {
            display: none;
        }

        /* Ladder connecting line */
        .ladder-connector {
            width: 40px;
            height: 2px;
            flex-shrink: 0;
        }

        /* Current ladder step glow */
        .ladder-step-current {
            box-shadow: 0 0 25px rgba(212, 180, 120, 0.35), 0 0 60px rgba(212, 180, 120, 0.12);
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_header(); ?>

<div class="overflow-x-hidden">

    <!-- ============================================================ -->
    <!-- SECTION 1: ICP BANNER HERO (dark navy with particles)          -->
    <!-- ============================================================ -->
    <section class="relative min-h-[70vh] flex items-center py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] overflow-hidden">
        <!-- Decorative SVG pattern overlay -->
        <div class="absolute inset-0 opacity-[0.04] pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23d4b478%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <!-- Decorative blurs -->
        <div class="absolute top-0 right-0 w-[32rem] h-[32rem] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-0 left-0 w-[28rem] h-[28rem] bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#d4b478]/3 rounded-full blur-[150px]"></div>

        <!-- Floating-slow ambient orbs -->
        <div class="absolute top-20 left-[10%] w-24 h-24 bg-[#d4b478]/10 rounded-full blur-[40px] animate-float-slow pointer-events-none" style="animation-duration: 8s;"></div>
        <div class="absolute bottom-20 right-[15%] w-32 h-32 bg-[#d4b478]/8 rounded-full blur-[50px] animate-float-slow pointer-events-none" style="animation-duration: 11s; animation-delay: 2s;"></div>

        <!-- Floating particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <?php for ($i = 1; $i <= 15; $i++): ?>
                <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                    style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                </div>
            <?php endfor; ?>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
            <div class="max-w-4xl mx-auto text-center">

                <!-- H1 -->
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl leading-tight mb-6 animate-fade-in-up stagger-1 text-[#faf8f5]">
                    <?php echo esc_html($current['title']); ?>
                </h1>

                <!-- Quote -->
                <p class="text-[#d4b478] text-xl md:text-2xl italic font-light leading-relaxed max-w-2xl mx-auto animate-fade-in-up stagger-2">
                    &ldquo;<?php echo esc_html($current['quote']); ?>&rdquo;
                </p>
            </div>

            <!-- Back link -->
            <div class="text-center mt-12 animate-fade-in-up stagger-3">
                <a href="<?php echo esc_url(home_url('/icp-quiz')); ?>"
                   class="inline-flex items-center gap-2 text-[#faf8f5]/50 hover:text-[#d4b478] text-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"></line>
                        <polyline points="12 19 5 12 12 5"></polyline>
                    </svg>
                    Not you? Go back and choose again.
                </a>
            </div>
        </div>

        <!-- Decorative gradient line at bottom of hero -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#d4b478]/40 to-transparent"></div>
    </section>

    <!-- ============================================================ -->
    <!-- DECORATIVE SECTION DIVIDER (between hero + ladder)             -->
    <!-- ============================================================ -->
    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/30 to-transparent"></div>

    <!-- ============================================================ -->
    <!-- SECTION 2: PHASE PROGRESS LADDER (light cream bg)              -->
    <!-- ============================================================ -->
    <section class="relative py-10 md:py-14 bg-[#faf8f5] text-[#0f203d] overflow-hidden">
        <!-- Decorative blurs -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-[#d4b478]/5 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[120px] pointer-events-none"></div>

        <!-- Floating-slow ambient decor -->
        <div class="absolute top-4 right-[20%] w-16 h-16 bg-[#d4b478]/8 rounded-full blur-[30px] animate-float-slow pointer-events-none" style="animation-duration: 10s; animation-delay: 1s;"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="ladder-scroll pb-2">
                <div class="flex items-center min-w-max mx-auto px-4" style="justify-content: center;">
                    <?php foreach ($ladder as $index => $step): ?>
                        <?php
                        $status_class = '';
                        $dot_class = 'bg-[#0f203d]/20';
                        $line_class = 'bg-[#0f203d]/10';
                        $wrapper_class = '';
                        $current_glow = '';
                        if ($step['status'] === 'current') {
                            $status_class = 'bg-gradient-to-br from-[#d4b478] to-[#e8a838] text-white ladder-step-current';
                            $dot_class = 'bg-[#d4b478] ring-4 ring-[#d4b478]/20';
                            $line_class = 'bg-gradient-to-r from-[#d4b478]/50 to-[#d4b478]/20';
                            $wrapper_class = 'scale-105';
                        } elseif ($step['status'] === 'recommended') {
                            $status_class = 'bg-gradient-to-br from-[#d4b478] to-[#e8a838]/80 text-white shadow-md';
                            $dot_class = 'bg-[#d4b478] ring-2 ring-[#d4b478]/15';
                            $line_class = 'bg-gradient-to-r from-[#d4b478]/30 to-[#d4b478]/10';
                        } elseif ($step['status'] === 'completed') {
                            $status_class = 'bg-gradient-to-br from-green-50 to-green-100 text-green-700 border border-green-200';
                            $dot_class = 'bg-green-500 ring-2 ring-green-200';
                            $line_class = 'bg-green-200';
                        } else {
                            $status_class = 'bg-[#0f203d]/5 text-[#0f203d]/50 border border-[#0f203d]/5';
                            $dot_class = 'bg-[#0f203d]/15';
                            $line_class = 'bg-[#0f203d]/8';
                        }
                        ?>
                        <div class="flex items-center">
                            <div class="flex flex-col items-center gap-2 <?php echo $wrapper_class; ?> transition-all duration-300">
                               
                                <!-- Step label -->
                                <span class="whitespace-nowrap text-xs font-bold tracking-[0.1em] uppercase px-5 py-2.5 rounded-full transition-all duration-300 <?php echo $status_class; ?>">
                                    <?php echo esc_html($step['label']); ?>
                                </span>
                            </div>
                            <?php if ($index < count($ladder) - 1): ?>
                                <!-- Connecting line instead of arrow -->
                                <div class="ladder-connector mx-3 rounded-full transition-all duration-300 <?php echo $line_class; ?>"></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SECTION 3: RECOMMENDED PATH CARDS (light cream bg)             -->
    <!-- ============================================================ -->
    <section class="pb-24 md:pb-32 bg-[#faf8f5] text-[#0f203d] relative overflow-hidden">
        <!-- Decorative blurs -->
        <div class="absolute top-0 left-0 w-80 h-80 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-[#d4b478]/5 rounded-full blur-[120px]"></div>

        <!-- Floating-slow ambient orbs -->
        <div class="absolute top-32 left-[15%] w-20 h-20 bg-[#d4b478]/8 rounded-full blur-[40px] animate-float-slow pointer-events-none" style="animation-duration: 9s;"></div>
        <div class="absolute bottom-40 right-[10%] w-28 h-28 bg-[#d4b478]/5 rounded-full blur-[50px] animate-float-slow pointer-events-none" style="animation-duration: 12s; animation-delay: 3s;"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 bg-[#d4b478]/10 border border-[#d4b478]/20 text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase px-4 py-2 rounded-full mb-8">
                    <span class="w-2 h-2 bg-[#d4b478] rounded-full"></span>
                    Your Path
                </span>
                <h2 class="font-serif text-4xl md:text-5xl text-[#0f203d] mb-6">Your Recommended Path</h2>
                <p class="text-[#0f203d]/70 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto">
                    Start here. Each step builds on the last.
                </p>
            </div>

            <!-- Product Cards -->
            <div class="space-y-8 max-w-6xl mx-auto">
                <?php $card_idx = 0; ?>
                <?php foreach ($steps as $product): ?>
                    <?php $card_idx++; ?>
                    <div class="group relative bg-white rounded-2xl shadow-lg overflow-hidden border border-[#d4b478]/10 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 card-lift flex flex-col animate-fade-in-up stagger-<?php echo min($card_idx, 5); ?>">
                        <!-- Decorative gold accent bar on left -->
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-[#d4b478]/60 via-[#d4b478]/30 to-transparent"></div>

                        <!-- Gold dot pattern on left side -->
                        <div class="absolute left-4 top-8 flex flex-col gap-2 opacity-30 pointer-events-none">
                            <span class="block w-1.5 h-1.5 rounded-full bg-[#d4b478]"></span>
                            <span class="block w-1.5 h-1.5 rounded-full bg-[#d4b478]/60"></span>
                            <span class="block w-1.5 h-1.5 rounded-full bg-[#d4b478]/30"></span>
                        </div>

                        <!-- Hover background reveal (gold gradient overlay) -->
                        <div class="absolute inset-0 opacity-0 card-bg-reveal pointer-events-none">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#d4b478]/3 via-transparent to-[#d4b478]/5"></div>
                            <div class="absolute -top-20 -right-20 w-40 h-40 bg-[#d4b478]/8 rounded-full blur-[60px]"></div>
                        </div>

                        <div class="p-8 flex flex-col flex-1 relative z-10">
                            <span class="text-xs text-[#d4b478] font-bold tracking-[0.15em] uppercase"><?php echo esc_html($product['step_label']); ?></span>

                            <div class="flex justify-between items-baseline mt-2 mb-4">
                                <h3 class="font-serif text-2xl text-[#0f203d]"><?php echo esc_html($product['name']); ?></h3>
                                <span class="font-bold text-xl whitespace-nowrap ml-4">
                                    <!-- Price with gold background accent -->
                                    <span class="inline-block bg-[#d4b478]/10 text-[#d4b478] px-3 py-1 rounded-lg">
                                        <?php echo esc_html($product['price']); ?>
                                    </span>
                                    <?php if (!empty($product['orig_price'])): ?>
                                        <span class="line-through text-sm text-[#0f203d]/40 ml-2"><?php echo esc_html($product['orig_price']); ?></span>
                                    <?php endif; ?>
                                </span>
                            </div>

                            <p class="text-[#0f203d]/70 mb-4 flex-1"><?php echo esc_html($product['description']); ?></p>

                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php foreach ($product['tags'] as $tag): ?>
                                    <span class="text-xs bg-[#d4b478]/10 text-[#d4b478] px-3 py-1 rounded-full font-medium"><?php echo esc_html($tag); ?></span>
                                <?php endforeach; ?>
                            </div>

                            <a href="<?php echo esc_url($product['link']); ?>"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 self-start group/btn">
                                <?php echo esc_html($product['cta']); ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Also Available (authority only) -->
            <?php if (!empty($also_available)): ?>
                <div class="max-w-6xl mx-auto mt-16">
                    <!-- Decorative divider before Also Available -->
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>
                        <span class="text-xs text-[#d4b478]/50 font-bold tracking-[0.2em] uppercase flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="inline-block mr-2 -mt-0.5 text-[#d4b478]/40">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M12 16v-4"></path>
                                <path d="M12 8h.01"></path>
                            </svg>
                            Also Available
                        </span>
                        <div class="h-px flex-1 bg-gradient-to-r from-transparent via-[#d4b478]/20 to-transparent"></div>
                    </div>

                    <div class="max-w-7xl mx-auto">
                        <div class="group relative bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden border border-dashed border-[#d4b478]/20 hover:border-[#d4b478]/30 hover:shadow-xl transition-all duration-300 card-lift">
                            <!-- Subtle left accent -->
                            <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-[#d4b478]/30 via-[#d4b478]/15 to-transparent"></div>

                            <div class="p-8 relative z-10">
                                <span class="text-xs text-[#d4b478]/60 font-bold tracking-[0.15em] uppercase">ALSO AVAILABLE</span>
                                <div class="flex justify-between items-baseline mt-2 mb-4">
                                    <h4 class="font-serif text-xl text-[#0f203d]/80"><?php echo esc_html($also_available['name']); ?></h4>
                                    <span class="font-bold text-lg whitespace-nowrap ml-4">
                                        <span class="inline-block bg-[#d4b478]/8 text-[#d4b478] px-3 py-1 rounded-lg">
                                            <?php echo esc_html($also_available['price']); ?>
                                        </span>
                                        <?php if (!empty($also_available['orig_price'])): ?>
                                            <span class="line-through text-sm text-[#0f203d]/40 ml-2"><?php echo esc_html($also_available['orig_price']); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <p class="text-[#0f203d]/60 mb-4"><?php echo esc_html($also_available['description']); ?></p>
                                <div class="flex flex-wrap gap-2 mb-6">
                                    <?php foreach ($also_available['tags'] as $tag): ?>
                                        <span class="text-xs bg-[#d4b478]/8 text-[#d4b478]/70 px-3 py-1 rounded-full font-medium"><?php echo esc_html($tag); ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <a href="<?php echo esc_url($also_available['link']); ?>"
                                   class="inline-flex items-center gap-2 px-6 py-3 bg-[#d4b478]/80 hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 self-start group/btn">
                                    <?php echo esc_html($also_available['cta']); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover/btn:translate-x-1 transition-transform">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- ======================================================== -->
            <!-- SECTION 4: ANTI-RECOMMENDATIONS (if any)                  -->
            <!-- ======================================================== -->
            <?php if (!empty($anti_items)): ?>
                <div class="max-w-6xl mx-auto">
                    <div class="bg-[#d4b478]/5 border border-[#d4b478]/20 rounded-2xl p-8 mt-12 relative overflow-hidden">
                        <!-- Subtle decorative overlay -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-[#d4b478]/5 rounded-full blur-[60px] pointer-events-none"></div>

                        <div class="relative z-10">
                            <h3 class="font-semibold text-[#d4b478] text-lg mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                Not Ready for These Yet
                            </h3>
                            <div class="space-y-4">
                                <?php foreach ($anti_items as $anti): ?>
                                    <div class="flex justify-between items-center pb-4 border-b border-[#d4b478]/10 last:border-b-0 last:pb-0">
                                        <div>
                                            <p class="font-medium text-[#0f203d]/80"><?php echo esc_html($anti['name']); ?></p>
                                            <p class="text-sm text-[#d4b478]/70"><?php echo esc_html($anti['reason']); ?></p>
                                        </div>
                                        <span class="text-[#d4b478]/60 font-semibold whitespace-nowrap ml-4"><?php echo esc_html($anti['price']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <p class="text-sm text-[#d4b478]/60 mt-4">
                                These require the foundation you build in your recommended path above.
                            </p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- DECORATIVE SECTION DIVIDER (between products + CTA)            -->
    <!-- ============================================================ -->
    <div class="h-px w-full bg-gradient-to-r from-transparent via-[#d4b478]/30 to-transparent"></div>

    <!-- ============================================================ -->
    <!-- SECTION 5: HELP CTA (dark navy with particles)                 -->
    <!-- ============================================================ -->
    <section class="relative py-24 md:py-32 bg-[#0f203d] text-[#faf8f5] overflow-hidden">
        <!-- Decorative SVG pattern overlay -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23d4b478%22 fill-opacity=%221%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <!-- Larger decorative blurs for ambient depth -->
        <div class="absolute top-0 right-0 w-[32rem] h-[32rem] bg-[#d4b478]/5 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-0 left-0 w-[28rem] h-[28rem] bg-[#d4b478]/5 rounded-full blur-[120px]"></div>
        <div class="absolute top-1/3 left-1/3 w-80 h-80 bg-[#d4b478]/3 rounded-full blur-[100px]"></div>

        <!-- Floating-slow ambient orbs -->
        <div class="absolute top-16 left-[12%] w-20 h-20 bg-[#d4b478]/10 rounded-full blur-[40px] animate-float-slow pointer-events-none" style="animation-duration: 7s;"></div>
        <div class="absolute bottom-24 right-[18%] w-28 h-28 bg-[#d4b478]/8 rounded-full blur-[50px] animate-float-slow pointer-events-none" style="animation-duration: 10s; animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-[60%] w-16 h-16 bg-[#d4b478]/6 rounded-full blur-[35px] animate-float-slow pointer-events-none" style="animation-duration: 12s; animation-delay: 4s;"></div>

        <!-- Floating particles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <div class="absolute w-2 h-2 bg-[#d4b478]/30 rounded-full animate-float"
                    style="left: <?php echo rand(0, 100); ?>%; top: <?php echo rand(0, 100); ?>%; animation-delay: <?php echo rand(0, 5); ?>s; animation-duration: <?php echo 6 + rand(0, 4); ?>s;">
                </div>
            <?php endfor; ?>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <h2 class="font-serif text-4xl md:text-5xl text-[#faf8f5] mb-6">Need help deciding?</h2>
            <p class="text-[#faf8f5]/80 text-lg md:text-xl leading-relaxed max-w-xl mx-auto mb-10">
                Book a free 15-minute call and we'll help you find the right fit.
            </p>

            <!-- Gold glow effect behind the "Book a Call" button -->
            <div class="relative inline-block">
                <div class="absolute inset-0 bg-[#d4b478] blur-[60px] opacity-20 animate-pulse-glow rounded-full"></div>
                <a href="/inquiry"
                   rel="noopener noreferrer"
                   class="relative inline-flex items-center gap-2 px-8 py-4 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20 group z-10">
                    Inquire Now
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:translate-x-1 transition-transform">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Decorative gradient line at bottom -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#d4b478]/30 to-transparent"></div>
    </section>

</div><!-- /overflow-x-hidden -->

<?php get_footer(); ?>
</body>
</html>
