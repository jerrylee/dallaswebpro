<?php
/**
 * Template Name: Homepage
 * The front page template.
 *
 * @package DallasWebPro
 */

get_header();
?>

<?php get_template_part( 'template-parts/home/hero' ); ?>
<?php get_template_part( 'template-parts/home/trust-bar' ); ?>
<?php get_template_part( 'template-parts/home/services' ); ?>
<?php get_template_part( 'template-parts/home/portfolio' ); ?>
<?php get_template_part( 'template-parts/home/about' ); ?>
<?php get_template_part( 'template-parts/home/process' ); ?>
<?php get_template_part( 'template-parts/home/testimonials' ); ?>
<?php get_template_part( 'template-parts/home/contact' ); ?>

<?php get_footer(); ?>
