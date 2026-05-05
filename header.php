<nav id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent py-6">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="relative z-50 block w-12 opacity-90 hover:opacity-100 transition-opacity">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-transparent.png" alt="Joanna Horton McPherson" class="w-full h-auto" />
        </a>

        <!-- Desktop Nav -->
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'hidden lg:flex items-center space-x-8',
            'walker' => new \TailPress\Walkers\PrimaryNavWalker([
                'mode' => 'desktop',
                'cta_class' => 'bg-[#d4b478] text-white text-sm uppercase tracking-widest px-6 py-2.5 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300',
                'cta_item' => 'start'
            ]),
            'fallback_cb' => false
        ]);
        ?>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-toggle" class="lg:hidden text-[#faf8f5] z-50" aria-label="Toggle menu" aria-expanded="false">
            <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" x2="20" y1="12" y2="12"></line>
                <line x1="4" x2="20" y1="6" y2="6"></line>
                <line x1="4" x2="20" y1="18" y2="18"></line>
            </svg>
            <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden">
                <line x1="18" x2="6" y1="6" y2="18"></line>
                <line x1="6" x2="18" y1="6" y2="18"></line>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-0 z-40 bg-[#0f203d] flex flex-col items-center justify-center hidden">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => 'flex flex-col space-y-6 text-center items-center',
        'walker' => new \TailPress\Walkers\PrimaryNavWalker([
            'mode' => 'mobile',
            'cta_class' => 'bg-[#d4b478] text-white text-xl uppercase tracking-widest px-8 py-3 rounded-full font-medium hover:bg-[#b37a1f] transition-colors',
            'cta_item' => 'apply'
        ]),
        'fallback_cb' => false
    ]);
    ?>
</div>

<!-- Dropdown Menus -->
<div id="dropdown-menu" class="fixed top-[72px] left-0 right-0 z-40 bg-[#0f203d]/95 backdrop-blur-sm border-t border-[#faf8f5]/10 shadow-xl hidden">
    <div class="max-w-7xl mx-auto px-6 py-8 grid grid-cols-4 gap-8">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => '',
            'walker' => new \TailPress\Walkers\PrimaryNavWalker([
                'mode' => 'dropdown'
            ]),
            'fallback_cb' => false
        ]);
        ?>
        <div id="dropdown-description" class="col-span-3 pl-8 border-l border-[#faf8f5]/10 hidden">
            <p class="text-[#faf8f5]/60 text-sm leading-relaxed"></p>
        </div>
    </div>
</div>