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

<?php /* ─── ARTICLE STYLES ─────────────────────────────────── */ ?>
<style>
body.single-post { background: #111820; }

/* ── Hero ─────────────────────────────────────────── */
.sng-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  padding-top: 80px;
  padding-bottom: 64px;
}
.sng-hero-bg {
  position: absolute; inset: 0;
  background-size: cover;
  background-position: center 30%;
  transform: scale(1.04);
  transition: transform 8s ease-out;
}
.sng-hero-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(
    180deg,
    rgba(17,24,32,0.55) 0%,
    rgba(17,24,32,0.82) 60%,
    rgba(17,24,32,0.97) 100%
  );
}
.sng-hero-grid {
  position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(200,146,42,0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(200,146,42,0.03) 1px, transparent 1px);
  background-size: 60px 60px;
}
.sng-hero-content { position: relative; z-index: 2; }

.sng-breadcrumb {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.7rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.45);
  margin-bottom: 20px;
}
.sng-breadcrumb a { color: rgba(255,255,255,0.45); transition: color 0.2s; }
.sng-breadcrumb a:hover { color: #c8922a; }
.sng-breadcrumb-cat { color: #c8922a !important; }

.sng-post-tag {
  display: inline-flex;
  align-items: center;
  padding: 5px 14px;
  border-radius: 100px;
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  border: 1px solid rgba(200,146,42,0.35);
  color: #c8922a;
  background: rgba(200,146,42,0.1);
  margin-bottom: 20px;
}

.sng-hero-title {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 4.5vw, 4rem);
  font-weight: 400;
  line-height: 1.1;
  letter-spacing: -0.02em;
  color: #fff;
  margin-bottom: 28px;
  max-width: 820px;
}

.sng-hero-meta {
  display: flex;
  align-items: center;
  gap: 16px;
  font-size: 0.72rem;
  font-weight: 500;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.5);
  flex-wrap: wrap;
}
.sng-hero-meta span { display: flex; align-items: center; gap: 6px; }
.sng-meta-divider { width: 1px; height: 14px; background: rgba(200,146,42,0.3); }

/* ── Body layout ──────────────────────────────────── */
.sng-body-wrap {
  background: #111820;
  padding: 72px 0 80px;
}
.sng-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 64px;
  align-items: start;
}

/* ── Prose (article content) ──────────────────────── */
.sng-prose {
  color: rgba(255,255,255,0.82);
  font-size: 1.05rem;
  font-weight: 300;
  line-height: 1.85;
}
.sng-prose h2 {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  font-weight: 400;
  color: #fff;
  margin: 56px 0 20px;
  line-height: 1.2;
}
.sng-prose h3 {
  font-family: 'Fraunces', serif;
  font-size: 1.25rem;
  font-weight: 400;
  color: #fff;
  margin: 40px 0 16px;
}
.sng-prose p { margin-bottom: 28px; }
.sng-prose p:first-child { font-size: 1.15rem; font-weight: 400; color: rgba(255,255,255,0.92); }
.sng-prose a { color: #c8922a; text-decoration: underline; text-underline-offset: 3px; }
.sng-prose a:hover { color: #e0a83a; }
.sng-prose ul, .sng-prose ol {
  margin: 0 0 28px 24px;
  color: rgba(255,255,255,0.8);
}
.sng-prose li { margin-bottom: 10px; }
.sng-prose blockquote {
  border-left: 3px solid #c8922a;
  padding: 20px 28px;
  margin: 40px 0;
  background: rgba(200,146,42,0.06);
  border-radius: 0 8px 8px 0;
  font-family: 'Fraunces', serif;
  font-size: 1.2rem;
  font-style: italic;
  color: rgba(255,255,255,0.9);
  line-height: 1.6;
}
.sng-prose strong { color: #fff; font-weight: 600; }
.sng-prose img {
  width: 100%;
  border-radius: 12px;
  margin: 40px 0;
}
.sng-prose hr {
  border: none;
  border-top: 1px solid rgba(200,146,42,0.18);
  margin: 56px 0;
}

/* ── Tags & post nav ──────────────────────────────── */
.sng-tags {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
  padding-top: 40px;
  margin-top: 56px;
  border-top: 1px solid rgba(200,146,42,0.15);
}
.sng-tags-label {
  font-size: 0.68rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.4);
  margin-right: 4px;
}
.sng-tag-pill {
  padding: 5px 14px;
  border-radius: 100px;
  font-size: 0.65rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  background: rgba(200,146,42,0.08);
  border: 1px solid rgba(200,146,42,0.2);
  color: #c8922a;
  transition: background 0.2s, border-color 0.2s;
}
.sng-tag-pill:hover { background: rgba(200,146,42,0.18); border-color: rgba(200,146,42,0.45); }

.sng-post-nav {
  display: flex;
  gap: 16px;
  margin-top: 48px;
  padding-top: 40px;
  border-top: 1px solid rgba(200,146,42,0.15);
}
.sng-nav-btn {
  flex: 1;
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 20px 24px;
  background: #1c2a3a;
  border: 1px solid rgba(200,146,42,0.18);
  border-radius: 12px;
  color: rgba(255,255,255,0.75);
  font-size: 0.85rem;
  line-height: 1.4;
  transition: border-color 0.2s, background 0.2s, transform 0.2s;
}
.sng-nav-btn:hover {
  border-color: rgba(200,146,42,0.45);
  background: #1e2c3d;
  transform: translateY(-2px);
  color: #fff;
}
.sng-nav-btn em {
  display: block;
  font-style: normal;
  font-size: 0.62rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: #c8922a;
  margin-bottom: 4px;
}
.sng-nav-next { justify-content: flex-end; text-align: right; }
.sng-nav-next svg { order: 2; }
.sng-nav-next span { order: 1; }

/* ── Sidebar ──────────────────────────────────────── */
.sng-sidebar {
  position: sticky;
  top: 100px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}
.sng-widget {
  background: #1c2a3a;
  border: 1px solid rgba(200,146,42,0.18);
  border-radius: 14px;
  padding: 28px;
}
.sng-widget-title {
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: #c8922a;
  margin-bottom: 18px;
}
.sng-author-card {
  display: flex;
  gap: 16px;
  align-items: flex-start;
}
.sng-author-avatar {
  width: 48px; height: 48px;
  border-radius: 50%;
  background: linear-gradient(135deg, #c8922a, #e0a83a);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.6rem;
  font-weight: 800;
  letter-spacing: 0.05em;
  color: #111820;
  flex-shrink: 0;
}
.sng-author-name {
  font-weight: 600;
  font-size: 0.9rem;
  color: #fff;
  margin-bottom: 6px;
}
.sng-author-bio {
  font-size: 0.78rem;
  font-weight: 300;
  color: rgba(255,255,255,0.55);
  line-height: 1.6;
}

.sng-back-btn {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 14px 20px;
  background: rgba(200,146,42,0.1);
  border: 1px solid rgba(200,146,42,0.3);
  border-radius: 8px;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: #c8922a;
  transition: background 0.2s, transform 0.2s;
}
.sng-back-btn:hover { background: rgba(200,146,42,0.18); transform: translateX(-2px); }

.sng-cat-list { list-style: none; display: flex; flex-direction: column; gap: 4px; }
.sng-cat-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 9px 12px;
  border-radius: 6px;
  font-size: 0.8rem;
  font-weight: 400;
  color: rgba(255,255,255,0.65);
  transition: background 0.2s, color 0.2s;
}
.sng-cat-link:hover, .sng-cat-link.active {
  background: rgba(200,146,42,0.1);
  color: #c8922a;
}
.sng-cat-count {
  font-size: 0.65rem;
  font-weight: 600;
  padding: 2px 8px;
  border-radius: 100px;
  background: rgba(255,255,255,0.07);
  color: rgba(255,255,255,0.4);
}

/* ── Related posts strip ──────────────────────────── */
.sng-related {
  background: #1a2332;
  border-top: 1px solid rgba(200,146,42,0.15);
  padding: 80px 0 100px;
}
.sng-related-header { margin-bottom: 48px; }
.sng-related-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.8rem, 3vw, 2.5rem);
  font-weight: 400;
  color: #fff;
  margin-top: 8px;
}
.sng-related-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}

/* ── Responsive ───────────────────────────────────── */
@media (max-width: 1024px) {
  .sng-layout { grid-template-columns: 1fr; }
  .sng-sidebar { position: static; flex-direction: row; flex-wrap: wrap; }
  .sng-widget, .sng-back-btn { flex: 1 1 260px; }
  .sng-related-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
  .sng-hero { min-height: 50vh; padding-bottom: 48px; }
  .sng-hero-title { font-size: clamp(1.8rem, 6vw, 2.5rem); }
  .sng-post-nav { flex-direction: column; }
  .sng-related-grid { grid-template-columns: 1fr; }
  .sng-sidebar { flex-direction: column; }
  .sng-widget, .sng-back-btn { flex: none; }
}
</style>

<?php endwhile; ?>
<?php get_footer(); ?>
