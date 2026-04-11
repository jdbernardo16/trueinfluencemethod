<?php

namespace TailPress\Walkers;

use Walker_Nav_Menu;

/**
 * Custom navigation menu walker for the theme
 *
 * Supports three modes:
 * - desktop: Desktop navigation with hover/click dropdowns
 * - mobile: Mobile menu with collapsible dropdowns
 * - dropdown: Dropdown overlay with grid layout
 */
class PrimaryNavWalker extends Walker_Nav_Menu
{
    /**
     * Configuration options
     *
     * @var array
     */
    private $config = [];

    /**
     * Constructor
     *
     * @param array $config Configuration options
     */
    public function __construct($config = [])
    {
        $defaults = [
            'mode' => 'desktop',
            'cta_class' => '',
            'cta_item' => 'apply',
        ];

        $this->config = wp_parse_args($config, $defaults);
    }

    /**
     * Start the element output
     *
     * @param string   $output Used to append additional content (passed by reference)
     * @param WP_Post  $item   Menu item data object
     * @param int      $depth  Depth of menu item
     * @param stdClass $args   An object of wp_nav_menu() arguments
     * @param int      $id     Current item ID
     */
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $has_children = in_array('menu-item-has-children', $classes);
        $is_cta = $this->config['cta_item'] === sanitize_title($item->title);

        // In dropdown mode, skip single items (no children) at top level
        if ($this->config['mode'] === 'dropdown' && $depth === 0 && !$has_children) {
            return;
        }

        // Build li class string
        $li_classes = $classes;
        $li_class_string = join(' ', apply_filters('nav_menu_css_class', array_filter($li_classes), $item, $args, $depth));
        $li_class_string = $li_class_string ? ' class="' . esc_attr($li_class_string) . '"' : '';

        // Output li tag (except in dropdown mode for top-level items with children)
        if (!($this->config['mode'] === 'dropdown' && $depth === 0 && $has_children)) {
            $output .= '<li' . $li_class_string . '>';
        }

        // Build attributes
        $attributes = [];
        $attributes['title'] = !empty($item->attr_title) ? $item->attr_title : $item->title;
        $attributes['target'] = !empty($item->target) ? $item->target : '';
        $attributes['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $attributes['href'] = !empty($item->url) ? $item->url : '#';

        // Get description for dropdown mode
        $description = !empty($item->description) ? $item->description : '';

        // Build class string based on mode
        $class_string = '';

        if ($this->config['mode'] === 'desktop') {
            $class_string = 'text-[#faf8f5] hover:text-[#d4b478] text-sm uppercase tracking-widest transition-colors duration-300 font-medium';

            if ($is_cta && !empty($this->config['cta_class'])) {
                $class_string = $this->config['cta_class'];
            }

            if ($has_children) {
                $class_string .= ' dropdown-toggle flex items-center gap-2';
            }
        } elseif ($this->config['mode'] === 'mobile') {
            $class_string = 'text-[#faf8f5] text-xl font-serif hover:text-[#d4b478] transition-colors';

            if ($is_cta && !empty($this->config['cta_class'])) {
                $class_string = $this->config['cta_class'];
            }

            if ($has_children) {
                $class_string .= ' mobile-dropdown-toggle flex items-center gap-2 justify-center mx-auto';
            }
        } elseif ($this->config['mode'] === 'dropdown') {
            if ($depth === 0 && $has_children) {
                // Top-level items with children in dropdown mode
                $class_string = 'space-y-4 hidden';
            } else {
                // Sub-items in dropdown mode
                $class_string = 'dropdown-link block text-[#faf8f5] hover:text-[#d4b478] transition-colors';
            }
        }

        $attributes['class'] = $class_string;

        // Add data attributes for dropdown toggles
        if ($has_children && ($this->config['mode'] === 'desktop' || $this->config['mode'] === 'mobile')) {
            $slug = sanitize_title($item->title);
            $attributes['data-dropdown'] = $slug;
            $attributes['aria-label'] = $item->title . ' menu';
            $attributes['aria-expanded'] = 'false';
        }

        // Add data attributes for dropdown mode
        if ($this->config['mode'] === 'dropdown' && $depth === 0 && $has_children) {
            $slug = sanitize_title($item->title);
            $attributes['data-dropdown'] = $slug;
            $attributes['data-description'] = $description;
        }

        // Build attribute string
        $atts = '';
        foreach ($attributes as $attr => $value) {
            if (!empty($value)) {
                $atts .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        // Build SVG chevron icon
        $chevron = '';
        if ($has_children && $this->config['mode'] !== 'dropdown') {
            $icon_size = $this->config['mode'] === 'mobile' ? '16' : '14';
            $chevron = sprintf(
                '<svg xmlns="http://www.w3.org/2000/svg" width="%s" height="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 9 6 6 6-6" />
                </svg>',
                $icon_size,
                $icon_size
            );
        }

        // Build output
        $item_output = '';

        if ($this->config['mode'] === 'dropdown' && $depth === 0 && $has_children) {
            // Top-level items with children in dropdown mode
            // Output a div wrapper for each dropdown section
            $slug = sanitize_title($item->title);
            $item_output = sprintf(
                '<div class="%s" data-dropdown="%s" data-description="%s">
                    <h3 class="text-[#d4b478] text-xs font-bold tracking-[0.2em] uppercase mb-4">%s</h3>
                    <nav class="space-y-3">',
                esc_attr($class_string),
                esc_attr($slug),
                esc_attr($description),
                esc_html($item->title)
            );
        } elseif ($has_children && ($this->config['mode'] === 'desktop' || $this->config['mode'] === 'mobile')) {
            // Use button for dropdown toggles
            $item_output = sprintf(
                '<button%s>%s%s</button>',
                $atts,
                esc_html($item->title),
                $chevron
            );
        } else {
            // Use anchor for regular links
            $item_output = sprintf(
                '<a%s>%s%s</a>',
                $atts,
                esc_html($item->title),
                $chevron
            );
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End the element output
     *
     * @param string   $output Used to append additional content (passed by reference)
     * @param WP_Post  $item   Menu item data object
     * @param int      $depth  Depth of menu item
     * @param stdClass $args   An object of wp_nav_menu() arguments
     */
    public function end_el(&$output, $item, $depth = 0, $args = [])
    {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        // In dropdown mode, skip single items (no children) at top level
        if ($this->config['mode'] === 'dropdown' && $depth === 0 && !$has_children) {
            return;
        }

        if ($this->config['mode'] === 'dropdown' && $depth === 0 && $has_children) {
            // Close the dropdown section div and nav
            $output .= '</nav></div>';
        } else {
            $output .= '</li>';
        }
    }

    /**
     * Start the level output
     *
     * @param string   $output Used to append additional content (passed by reference)
     * @param int      $depth  Depth of menu item
     * @param stdClass $args   An object of wp_nav_menu() arguments
     */
    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $indent = str_repeat("\t", $depth);
        $classes = ['sub-menu'];

        if ($this->config['mode'] === 'desktop') {
            $classes[] = 'absolute top-full left-0 min-w-[200px] bg-[#0f203d]/95 backdrop-blur-sm border border-[#faf8f5]/10 shadow-xl rounded-lg py-2 hidden';
        } elseif ($this->config['mode'] === 'mobile') {
            $classes[] = 'flex flex-col space-y-2 mt-2 hidden';
        } elseif ($this->config['mode'] === 'dropdown') {
            // Don't output ul in dropdown mode, we're using nav instead
            return;
        }

        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= "{$indent}<ul$class_names>";
    }

    /**
     * End the level output
     *
     * @param string   $output Used to append additional content (passed by reference)
     * @param int      $depth  Depth of menu item
     * @param stdClass $args   An object of wp_nav_menu() arguments
     */
    public function end_lvl(&$output, $depth = 0, $args = [])
    {
        if ($this->config['mode'] === 'dropdown') {
            // Don't output closing ul in dropdown mode
            return;
        }

        $indent = str_repeat("\t", $depth);
        $output .= "{$indent}</ul>";
    }
}
