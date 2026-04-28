<footer class="bg-navy text-cream pt-10 pb-6 border-t border-[#faf8f5]/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Brand -->
            <div class="md:col-span-1">
                <?php
                $footer_logo = tim_get_image_field('footer_logo', '', 'True Influence Method', 'option');
                if (empty($footer_logo['url'])) {
                    $footer_logo['url'] = get_template_directory_uri() . '/assets/images/icononly_transparent_nobuffer.png';
                }
                $footer_name         = tim_get_field('footer_name', 'Joanna Horton McPherson', 'option');
                $footer_tagline      = tim_get_field('footer_tagline', 'Private Advisor · Master Coach', 'option');
                $footer_brand_label  = tim_get_field('footer_brand_label', 'True Influence Method™', 'option');
                ?>
                <div class="mb-4">
                    <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt'] ?: 'True Influence Method'); ?>" class="w-10 h-10 opacity-80" />
                </div>
                <h3 class="font-serif text-lg mb-1"><?php echo esc_html($footer_name); ?></h3>
                <p class="text-[#faf8f5]/60 text-xs mb-2"><?php echo esc_html($footer_tagline); ?></p>
                <p class="text-[#d4b478] text-xs font-medium"><?php echo esc_html($footer_brand_label); ?></p>

                <!-- Social Links -->
                <?php
                $footer_email     = tim_get_field('footer_email', 'joanna@trueinfluencemethod.com', 'option');
                $footer_instagram = tim_get_field('footer_instagram_url', 'https://instagram.com/joannahortonmcpherson', 'option');
                $footer_website   = tim_get_field('footer_website_url', 'https://joannahortonmcpherson.com', 'option');
                $footer_linkedin  = tim_get_field('footer_linkedin_url', '', 'option');
                $footer_youtube   = tim_get_field('footer_youtube_url', '', 'option');
                $footer_facebook  = tim_get_field('footer_facebook_url', '', 'option');
                ?>
                <div class="flex gap-4 mt-4">
                    <!-- Email -->
                    <?php if ($footer_email) : ?>
                        <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- Instagram -->
                    <?php if ($footer_instagram) : ?>
                        <a href="<?php echo esc_url($footer_instagram); ?>" target="_blank" rel="noopener noreferrer" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- Website -->
                    <?php if ($footer_website) : ?>
                        <a href="<?php echo esc_url($footer_website); ?>" target="_blank" rel="noopener noreferrer" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="Website">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" x2="22" y1="12" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- LinkedIn -->
                    <?php if ($footer_linkedin) : ?>
                        <a href="<?php echo esc_url($footer_linkedin); ?>" target="_blank" rel="noopener noreferrer" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="LinkedIn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- YouTube -->
                    <?php if ($footer_youtube) : ?>
                        <a href="<?php echo esc_url($footer_youtube); ?>" target="_blank" rel="noopener noreferrer" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="YouTube">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.1c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                            </svg>
                        </a>
                    <?php endif; ?>

                    <!-- Facebook -->
                    <?php if ($footer_facebook) : ?>
                        <a href="<?php echo esc_url($footer_facebook); ?>" target="_blank" rel="noopener noreferrer" class="text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Navigation Column (Explore) -->
            <div>
                <?php
                $explore_heading = tim_get_field('footer_explore_heading', 'Explore', 'option');
                $explore_links   = tim_get_repeater_field('footer_explore_links', [
                    ['link_label' => 'Home',           'link_url' => home_url('/')],
                    ['link_label' => 'About',          'link_url' => home_url('/about')],
                    ['link_label' => 'The Journey',    'link_url' => home_url('/journey')],
                    ['link_label' => 'Success Stories', 'link_url' => home_url('/success-stories')],
                    ['link_label' => 'Community',      'link_url' => home_url('/community')],
                    ['link_label' => 'Resources',      'link_url' => home_url('/resources')],
                    ['link_label' => 'FAQ',            'link_url' => home_url('/faq')],
                ], 'option');
                ?>
                <h4 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4"><?php echo esc_html($explore_heading); ?></h4>
                <nav class="space-y-2">
                    <?php foreach ($explore_links as $link) :
                        $label = is_array($link) ? ($link['link_label'] ?? '') : '';
                        $url   = is_array($link) ? ($link['link_url'] ?? '') : '';
                        if ($label && $url) : ?>
                            <a href="<?php echo esc_url($url); ?>" class="block text-[#faf8f5]/60 hover:text-[#d4b478] text-xs uppercase tracking-wider transition-colors"><?php echo esc_html($label); ?></a>
                    <?php endif;
                    endforeach; ?>
                </nav>
            </div>

            <!-- Programs Column -->
            <div>
                <?php
                $programs_heading = tim_get_field('footer_programs_heading', 'Programs', 'option');
                $programs_links   = tim_get_repeater_field('footer_programs_links', [
                    ['link_label' => 'Private Training',       'link_url' => home_url('/programs/private-training')],
                    ['link_label' => 'Speak & Rise',           'link_url' => home_url('/programs/speak-rise')],
                    ['link_label' => 'Corporate',              'link_url' => home_url('/programs/corporate')],
                    ['link_label' => 'True Influence License', 'link_url' => home_url('/programs/license')],
                ], 'option');
                ?>
                <h4 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4"><?php echo esc_html($programs_heading); ?></h4>
                <nav class="space-y-2">
                    <?php foreach ($programs_links as $link) :
                        $label = is_array($link) ? ($link['link_label'] ?? '') : '';
                        $url   = is_array($link) ? ($link['link_url'] ?? '') : '';
                        if ($label && $url) : ?>
                            <a href="<?php echo esc_url($url); ?>" class="block text-[#faf8f5]/60 hover:text-[#d4b478] text-xs uppercase tracking-wider transition-colors"><?php echo esc_html($label); ?></a>
                    <?php endif;
                    endforeach; ?>
                </nav>
            </div>

            <!-- Newsletter -->
            <div>
                <?php
                $newsletter_heading   = tim_get_field('footer_newsletter_heading', 'Stay Connected', 'option');
                $newsletter_desc      = tim_get_field('footer_newsletter_description', 'Weekly insights on authentic influence.', 'option');
                $newsletter_placeholder = tim_get_field('footer_newsletter_placeholder', 'your@email.com', 'option');
                $newsletter_btn_text  = tim_get_field('footer_newsletter_button_text', 'Subscribe', 'option');
                ?>
                <h4 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4"><?php echo esc_html($newsletter_heading); ?></h4>
                <p class="text-[#faf8f5]/50 text-xs mb-3"><?php echo esc_html($newsletter_desc); ?></p>
                <form id="newsletter-form" class="flex flex-col gap-2 relative">
                    <input type="email" name="email" placeholder="<?php echo esc_attr($newsletter_placeholder); ?>" required class="px-3 py-2 bg-[#faf8f5]/5 border border-[#faf8f5]/10 rounded text-[#faf8f5] placeholder-[#faf8f5]/40 text-xs focus:outline-none focus:border-[#d4b478] focus:ring-1 focus:ring-[#d4b478] transition-all" />
                    <input type="text" name="website" tabindex="-1" autocomplete="off" class="absolute opacity-0 pointer-events-none top-0 left-0 h-0 w-0" aria-hidden="true" />
                    <?php wp_nonce_field('tim_newsletter_nonce', 'tim_newsletter_nonce_field'); ?>
                    <button type="submit" class="px-4 py-2 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded text-xs uppercase tracking-wider transition-all disabled:opacity-50 disabled:cursor-not-allowed">
                        <?php echo esc_html($newsletter_btn_text); ?>
                    </button>
                    <p class="text-[#faf8f5]/30 text-[10px] leading-tight">By subscribing, you agree to receive our newsletter. Unsubscribe anytime.</p>
                </form>
            </div>
        </div>

        <!-- Quote & Legal -->
        <?php
        $footer_quote_text   = tim_get_field('footer_quote_text', '"Traveler, there is no path. The path is made by walking."', 'option');
        $footer_quote_attr   = tim_get_field('footer_quote_attribution', '— Antonio Machado', 'option');
        $footer_copyright    = tim_get_field('footer_copyright', '© [year] Joanna Horton McPherson · All rights reserved.', 'option');
        $footer_privacy_url  = tim_get_field('footer_privacy_url', home_url('/privacy'), 'option');
        $footer_terms_url    = tim_get_field('footer_terms_url', home_url('/terms'), 'option');
        $footer_privacy_label = tim_get_field('footer_privacy_label', 'Privacy', 'option');
        $footer_terms_label  = tim_get_field('footer_terms_label', 'Terms', 'option');

        // Replace [year] with current year
        $footer_copyright = str_replace('[year]', date('Y'), $footer_copyright);
        ?>
        <div class="pt-6 border-t border-[#faf8f5]/10 flex flex-col md:flex-row items-center justify-between gap-4">
            <blockquote class="font-serif italic text-sm text-[#faf8f5]/50 text-center md:text-left max-w-md">
                <?php echo wp_kses_post(nl2br(esc_html($footer_quote_text))); ?>
                <?php if ($footer_quote_attr) : ?>
                    <span class="block text-[#faf8f5]/30 text-xs not-italic mt-1"><?php echo esc_html($footer_quote_attr); ?></span>
                <?php endif; ?>
            </blockquote>
            <div class="flex flex-col items-center md:items-end gap-2">
                <p class="text-[#faf8f5]/30 text-xs uppercase tracking-widest">
                    <?php echo esc_html($footer_copyright); ?>
                </p>
                <div class="flex gap-4">
                    <?php if ($footer_privacy_url) : ?>
                        <a href="<?php echo esc_url($footer_privacy_url); ?>" class="text-[#faf8f5]/40 hover:text-[#d4b478] text-xs uppercase tracking-wider transition-colors">
                            <?php echo esc_html($footer_privacy_label); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($footer_terms_url) : ?>
                        <a href="<?php echo esc_url($footer_terms_url); ?>" class="text-[#faf8f5]/40 hover:text-[#d4b478] text-xs uppercase tracking-wider transition-colors">
                            <?php echo esc_html($footer_terms_label); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Newsletter Success Modal -->
<div id="newsletter-success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm p-4 hidden">
    <div class="bg-[#0f203d] border border-[#d4b478]/30 rounded-2xl p-8 max-w-md w-full shadow-2xl relative">
        <button onclick="document.getElementById('newsletter-success-modal').classList.add('hidden')"
            class="absolute top-4 right-4 text-[#faf8f5]/60 hover:text-[#d4b478] transition-colors"
            aria-label="Close modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" x2="6" y1="6" y2="18"></line>
                <line x1="6" x2="18" y1="6" y2="18"></line>
            </svg>
        </button>

        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-[#d4b478]/20 rounded-full flex items-center justify-center mb-6">
                <svg class="w-8 h-8 text-[#d4b478]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>

            <h3 id="newsletter-modal-title" class="font-serif text-2xl text-[#faf8f5] mb-3">You're Subscribed!</h3>

            <p id="newsletter-modal-message" class="text-[#faf8f5]/70 mb-6">
                Thank you for joining the True Influence Method community. You'll receive weekly insights on authentic influence, leadership, and voice. Check your inbox for a confirmation email.
            </p>

            <button onclick="document.getElementById('newsletter-success-modal').classList.add('hidden')"
                class="px-8 py-3 bg-[#d4b478] hover:bg-[#e8a838] text-[#0f203d] font-semibold rounded-lg transition-all hover:shadow-lg hover:shadow-[#d4b478]/20">
                Close
            </button>
        </div>
    </div>
</div>

<?php wp_footer(); ?>