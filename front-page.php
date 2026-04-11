<?php
/**
 * Template Name: Front Page
 * Description: Homepage template for True Influence Method™
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
    <?php get_template_part('template-parts/hero-section'); ?>
    <?php get_template_part('template-parts/intro-section'); ?>
    <?php get_template_part('template-parts/paths-section'); ?>
    <?php get_template_part('template-parts/social-proof-section'); ?>
    <?php get_template_part('template-parts/cta-section'); ?>
</div>

<?php get_footer(); ?>
</body>
</html>
