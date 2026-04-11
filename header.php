<nav id="site-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 bg-transparent py-6">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="relative z-50 block w-12 opacity-90 hover:opacity-100 transition-opacity">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo-transparent.png" alt="Joanna Horton McPherson" class="w-full h-auto" />
        </a>

        <!-- Desktop Nav -->
        <div class="hidden lg:flex items-center space-x-8">
            <button id="dropdown-programs" class="dropdown-toggle text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium flex items-center gap-2" aria-label="Programs menu" aria-expanded="false">
                Programs
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <button id="dropdown-about" class="dropdown-toggle text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium flex items-center gap-2" aria-label="About menu" aria-expanded="false">
                About
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <a href="<?php echo esc_url(home_url('/success-stories')); ?>" class="text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium">
                Success Stories
            </a>

            <button id="dropdown-community" class="dropdown-toggle text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium flex items-center gap-2" aria-label="Community menu" aria-expanded="false">
                Community
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <button id="dropdown-resources" class="dropdown-toggle text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium flex items-center gap-2" aria-label="Resources menu" aria-expanded="false">
                Resources
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>

            <a href="<?php echo esc_url(home_url('/faq')); ?>" class="text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium">
                FAQ
            </a>

            <a href="<?php echo esc_url(home_url('/apply')); ?>" class="bg-[#d4b478] text-white text-sm uppercase tracking-widest px-6 py-2.5 rounded-full font-medium hover:bg-[#b37a1f] transition-colors duration-300">
                Apply
            </a>
        </div>

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
    <div class="flex flex-col space-y-6 text-center">
        <div class="flex flex-col space-y-3">
            <button id="mobile-dropdown-programs" class="mobile-dropdown-toggle text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors flex items-center gap-2 justify-center" aria-expanded="false">
                Programs
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="mobile-programs-links" class="flex flex-col space-y-2 pl-4 hidden">
                <a href="<?php echo esc_url(home_url('/programs/private-training')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Private Training</a>
                <a href="<?php echo esc_url(home_url('/programs/speak-rise')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Speak & Rise (Group)</a>
                <a href="<?php echo esc_url(home_url('/programs/corporate')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Corporate Programs</a>
                <a href="<?php echo esc_url(home_url('/programs/license')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">True Influence License</a>
            </div>
        </div>

        <div class="flex flex-col space-y-3">
            <button id="mobile-dropdown-about" class="mobile-dropdown-toggle text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors flex items-center gap-2 justify-center" aria-expanded="false">
                About
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="mobile-about-links" class="flex flex-col space-y-2 pl-4 hidden">
                <a href="<?php echo esc_url(home_url('/about')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">About Joanna</a>
                <a href="<?php echo esc_url(home_url('/journey')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">The Journey</a>
            </div>
        </div>

        <a href="<?php echo esc_url(home_url('/success-stories')); ?>" class="mobile-menu-link text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors">
            Success Stories
        </a>

        <div class="flex flex-col space-y-3">
            <button id="mobile-dropdown-community" class="mobile-dropdown-toggle text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors flex items-center gap-2 justify-center" aria-expanded="false">
                Community
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="mobile-community-links" class="flex flex-col space-y-2 pl-4 hidden">
                <a href="<?php echo esc_url(home_url('/community/vault')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">The Vault</a>
                <a href="<?php echo esc_url(home_url('/community/events')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Events & Workshops</a>
            </div>
        </div>

        <div class="flex flex-col space-y-3">
            <button id="mobile-dropdown-resources" class="mobile-dropdown-toggle text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors flex items-center gap-2 justify-center" aria-expanded="false">
                Resources
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>
            </button>
            <div id="mobile-resources-links" class="flex flex-col space-y-2 pl-4 hidden">
                <a href="<?php echo esc_url(home_url('/resources/articles')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Articles & Insights</a>
                <a href="<?php echo esc_url(home_url('/resources/tips')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Speaking Tips</a>
                <a href="<?php echo esc_url(home_url('/resources/media')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Media Features</a>
                <a href="<?php echo esc_url(home_url('/resources/blog')); ?>" class="mobile-menu-link text-[#faf8f5]/80 text-lg hover:text-[#d4b478] transition-colors">Blog & Podcast</a>
            </div>
        </div>

        <a href="<?php echo esc_url(home_url('/faq')); ?>" class="mobile-menu-link text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors">
            FAQ
        </a>

        <a href="<?php echo esc_url(home_url('/apply')); ?>" class="mobile-menu-link bg-[#d4b478] text-white text-xl uppercase tracking-widest px-8 py-3 rounded-full font-medium hover:bg-[#b37a1f] transition-colors">
            Apply
        </a>
    </div>
</div>

<!-- Dropdown Menus -->
<div id="dropdown-menu" class="fixed top-[72px] left-0 right-0 z-40 bg-[#0f203d]/95 backdrop-blur-sm border-t border-[#faf8f5]/10 shadow-xl hidden">
    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="grid grid-cols-4 gap-8">
            <div id="dropdown-programs-content" class="space-y-4 hidden">
                <h3 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4">Programs</h3>
                <nav class="space-y-3">
                    <a href="<?php echo esc_url(home_url('/programs/private-training')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Private Training</a>
                    <a href="<?php echo esc_url(home_url('/programs/speak-rise')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Speak & Rise (Group)</a>
                    <a href="<?php echo esc_url(home_url('/programs/corporate')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Corporate Programs</a>
                    <a href="<?php echo esc_url(home_url('/programs/license')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">True Influence License</a>
                </nav>
            </div>

            <div id="dropdown-about-content" class="space-y-4 hidden">
                <h3 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4">About</h3>
                <nav class="space-y-3">
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">About Joanna</a>
                    <a href="<?php echo esc_url(home_url('/journey')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">The Journey</a>
                </nav>
            </div>

            <div id="dropdown-community-content" class="space-y-4 hidden">
                <h3 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4">Community</h3>
                <nav class="space-y-3">
                    <a href="<?php echo esc_url(home_url('/community/vault')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">The Vault</a>
                    <a href="<?php echo esc_url(home_url('/community/events')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Events & Workshops</a>
                </nav>
            </div>

            <div id="dropdown-resources-content" class="space-y-4 hidden">
                <h3 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4">Resources</h3>
                <nav class="space-y-3">
                    <a href="<?php echo esc_url(home_url('/resources/articles')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Articles & Insights</a>
                    <a href="<?php echo esc_url(home_url('/resources/tips')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Speaking Tips</a>
                    <a href="<?php echo esc_url(home_url('/resources/media')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Media Features</a>
                    <a href="<?php echo esc_url(home_url('/resources/blog')); ?>" class="dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors">Blog & Podcast</a>
                </nav>
            </div>

            <div id="dropdown-description" class="col-span-3 pl-8 border-l border-[#faf8f5]/10 hidden">
                <p class="text-[#faf8f5]/60 text-sm leading-relaxed"></p>
            </div>
        </div>
    </div>
</div>