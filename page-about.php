<?php

/**
 * Template Name: About Page
 * Description: About Joanna page template
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
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php get_header(); ?>

    <div class="overflow-x-hidden">
        <?php get_template_part('template-parts/about-hero'); ?>
        <?php get_template_part('template-parts/about-story'); ?>
        <?php get_template_part('template-parts/about-credentials'); ?>
        <?php get_template_part('template-parts/about-philosophy'); ?>
        <?php get_template_part('template-parts/about-cta'); ?>
    </div>

    <?php get_footer(); ?>
</body>

</html>