<?php
/**
 * index.php — WordPress fallback template.
 *
 * This file is required by WordPress but rarely used directly.
 * The homepage is handled by front-page.php.
 * Blog archive is handled by home.php (to be created).
 */

get_header();
?>

<div class="wrap" style="padding-block: 80px;">
  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div><?php the_excerpt(); ?></div>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <p><?php esc_html_e( 'No content found.', 'dallaswebpro' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
