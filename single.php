<?php
/**
 * single.php — Individual Blog Post
 * Displays: post hero, article body, author/share strip, related posts, CTA band.
 *
 * @package dallaswebpro-2
 */

get_header();

while ( have_posts() ) :
  the_post();

  // ── Meta helpers ────────────────────────────────────────────────────
  $cats      = get_the_category();
  $cat_label = ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Blog';
  $cat_slug  = ! empty( $cats ) ? esc_attr( $cats[0]->slug ) : 'blog';
  $post_date = get_the_date( 'F j, Y' );
  $words     = str_word_count( wp_strip_all_tags( get_the_content() ) );
  $read_time = max( 1, (int) round( $words / 200 ) ) . ' min read';
  $thumb     = get_the_post_thumbnail_url( get_the_ID(), 'full' );
  $img_dir   = get_template_directory_uri() . '/assets/images/';

  // Fallback hero image keyed by category
  $fallback_map = [
    'web-development' => 'post-featured-webdev.jpg',
    'seo'             => 'post-seo-conversions.jpg',
    'social-media'    => 'post-social-media.jpg',
    'digital-marketing' => 'post-branding.jpg',
  ];
  $hero_img = $thumb ?: ( $img_dir . ( $fallback_map[ $cat_slug ] ?? 'hero-bg.jpg' ) );

  // ── Related posts (same category, exclude current) ──────────────────
  $related = get_posts( [
    'numberposts'  => 3,
    'category__in' => wp_list_pluck( get_the_category(), 'term_id' ),
    'post__not_in' => [ get_the_ID() ],
    'orderby'      => 'date',
    'order'        => 'DESC',
  ] );
  // Fall back to any recent posts if same-cat has none
  if ( empty( $related ) ) {
    $related = get_posts( [
      'numberposts'  => 3,
      'post__not_in' => [ get_the_ID() ],
      'orderby'      => 'date',
      'order'        => 'DESC',
    ] );
  }

  $fallback_imgs = [
    'post-seo-conversions.jpg', 'post-social-media.jpg', 'post-performance.jpg',
    'post-local-seo.jpg', 'post-branding.jpg', 'post-custom-vs-template.jpg',
  ];
?>

<?php /* ─── ARTICLE HERO ──────────────────────────────────── */ ?>
<section class="sng-hero" aria-label="Article hero">

  <div class="sng-hero-bg" style="background-image:url('<?php echo esc_url( $hero_img ); ?>')" aria-hidden="true"></div>
  <div class="sng-hero-overlay" aria-hidden="true"></div>
  <div class="sng-hero-grid"   aria-hidden="true"></div>

  <div class="wrap sng-hero-content">

    <?php /* Breadcrumb */ ?>
    <nav class="sng-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a>
      <span aria-hidden="true">/</span>
      <a href="<?php echo esc_url( get_category_link( $cats[0]->term_id ?? 0 ) ); ?>" class="sng-breadcrumb-cat">
        <?php echo $cat_label; ?>
      </a>
    </nav>

    <div class="sng-post-tag"><?php echo $cat_label; ?></div>

    <h1 class="sng-hero-title"><?php the_title(); ?></h1>

    <div class="sng-hero-meta">
      <span>
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <rect x="3" y="4" width="18" height="18" rx="2"/>
          <line x1="16" y1="2" x2="16" y2="6"/>
          <line x1="8"  y1="2" x2="8"  y2="6"/>
          <line x1="3"  y1="10" x2="21" y2="10"/>
        </svg>
        <?php echo esc_html( $post_date ); ?>
      </span>
      <span class="sng-meta-divider" aria-hidden="true"></span>
      <span>
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
          <circle cx="12" cy="12" r="10"/>
          <polyline points="12 6 12 12 16 14"/>
        </svg>
        <?php echo esc_html( $read_time ); ?>
      </span>
      <span class="sng-meta-divider" aria-hidden="true"></span>
      <span>Dallas Web Pro</span>
    </div>

  </div><!-- /.wrap.sng-hero-content -->
</section><!-- /.sng-hero -->

<?php /* ─── ARTICLE BODY ───────────────────────────────────── */ ?>
<div class="sng-body-wrap">
  <div class="wrap">
    <div class="sng-layout">

      <?php /* Article content */ ?>
      <article class="sng-article" id="sng-article">
        <div class="sng-prose">
          <?php the_content(); ?>
        </div><!-- /.sng-prose -->

        <?php /* Tag strip at bottom */ ?>
        <?php $tags = get_the_tags(); if ( $tags ) : ?>
        <div class="sng-tags">
          <span class="sng-tags-label">Tags:</span>
          <?php foreach ( $tags as $tag ) : ?>
            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="sng-tag-pill">
              <?php echo esc_html( $tag->name ); ?>
            </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php /* Post nav: prev / next */ ?>
        <nav class="sng-post-nav" aria-label="Post navigation">
          <?php
          $prev = get_previous_post();
          $next = get_next_post();
          ?>
          <?php if ( $prev ) : ?>
          <a href="<?php echo esc_url( get_permalink( $prev->ID ) ); ?>" class="sng-nav-btn sng-nav-prev">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
              <line x1="19" y1="12" x2="5" y2="12"/>
              <polyline points="12 19 5 12 12 5"/>
            </svg>
            <span>
              <em>Previous</em>
              <?php echo esc_html( get_the_title( $prev->ID ) ); ?>
            </span>
          </a>
          <?php endif; ?>
          <?php if ( $next ) : ?>
          <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>" class="sng-nav-btn sng-nav-next">
            <span>
              <em>Next</em>
              <?php echo esc_html( get_the_title( $next->ID ) ); ?>
            </span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
          <?php endif; ?>
        </nav>

      </article>

      <?php /* Sidebar */ ?>
      <aside class="sng-sidebar">

        <?php /* Author card */ ?>
        <div class="sng-widget sng-author-card">
          <div class="sng-author-avatar" aria-hidden="true">DWP</div>
          <div>
            <p class="sng-author-name">Dallas Web Pro</p>
            <p class="sng-author-bio">Web development &amp; digital marketing strategies built for businesses that want to grow.</p>
          </div>
        </div>

        <?php /* Back to blog */ ?>
        <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="sng-back-btn">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          All Articles
        </a>

        <?php /* Category filter */ ?>
        <div class="sng-widget">
          <p class="sng-widget-title">Categories</p>
          <ul class="sng-cat-list">
            <?php
            $cats_all = get_categories( [ 'exclude' => 1, 'hide_empty' => true ] );
            foreach ( $cats_all as $c ) :
            ?>
            <li>
              <a href="<?php echo esc_url( get_category_link( $c->term_id ) ); ?>"
                 class="sng-cat-link<?php echo ( $c->slug === $cat_slug ) ? ' active' : ''; ?>">
                <?php echo esc_html( $c->name ); ?>
                <span class="sng-cat-count"><?php echo (int) $c->count; ?></span>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

      </aside>

    </div><!-- /.sng-layout -->
  </div><!-- /.wrap -->
</div><!-- /.sng-body-wrap -->

<?php /* ─── RELATED POSTS ────────────────────────────────────── */ ?>
<?php if ( ! empty( $related ) ) : ?>
<section class="sng-related">
  <div class="wrap">
    <div class="sng-related-header">
      <div class="blg-section-eyebrow">Keep Reading</div>
      <h2 class="sng-related-heading">More from the blog</h2>
    </div>
    <div class="sng-related-grid">
    <?php
    $fb2 = 0;
    foreach ( $related as $rp ) :
      $r_thumb = get_the_post_thumbnail_url( $rp->ID, 'medium_large' )
                 ?: ( $img_dir . $fallback_imgs[ $fb2 % count( $fallback_imgs ) ] );
      $fb2++;
      $r_cats  = get_the_category( $rp->ID );
      $r_cat   = ! empty( $r_cats ) ? esc_html( $r_cats[0]->name ) : '';
      $r_words = str_word_count( wp_strip_all_tags( $rp->post_content ) );
      $r_read  = max( 1, (int) round( $r_words / 200 ) ) . ' min read';
    ?>
    <a href="<?php echo esc_url( get_permalink( $rp->ID ) ); ?>" class="blg-post-card">
      <div class="blg-post-card-img">
        <img src="<?php echo esc_url( $r_thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $rp->ID ) ); ?>" loading="lazy">
        <div class="blg-post-card-img-overlay" aria-hidden="true"></div>
        <?php if ( $r_cat ) : ?>
          <span class="blg-post-card-tag"><?php echo $r_cat; ?></span>
        <?php endif; ?>
      </div>
      <div class="blg-post-card-body">
        <h3 class="blg-post-card-title"><?php echo esc_html( get_the_title( $rp->ID ) ); ?></h3>
        <p class="blg-post-card-excerpt"><?php echo esc_html( get_the_excerpt( $rp->ID ) ); ?></p>
        <div class="blg-post-card-footer">
          <span class="blg-post-card-meta"><?php echo esc_html( $r_read ); ?>&nbsp;·&nbsp;<?php echo esc_html( get_the_date( 'M Y', $rp->ID ) ); ?></span>
          <span class="blg-post-card-link">
            Read More
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </span>
        </div>
      </div>
    </a>
    <?php endforeach; ?>
    </div><!-- /.sng-related-grid -->
  </div><!-- /.wrap -->
</section>
<?php endif; ?>

<?php /* ─── CTA BAND ────────────────────────────────────────── */ ?>
<div class="cta-band">
  <div class="cta-watermark" aria-hidden="true">Dallas</div>
  <div class="cta-band-inner">
    <h2 class="cta-h2">
      Ready to grow your business?
      <em>Let's talk.</em>
    </h2>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-cta-gold">Start a Project</a>
  </div>
</div>

<?php endwhile; ?>
<?php get_footer(); ?>
