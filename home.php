<?php
/**
 * home.php — Blog index template (WordPress "Posts page")
 * Displays: hero, marquee band, featured post, post grid with category filter, newsletter CTA.
 * Relies on .blg-* CSS classes already appended to assets/css/pages.css.
 *
 * @package dallaswebpro-2
 */

get_header();

/* ── Helper: read-time estimate ───────────────────────────────────── */
function dwp_read_time( $content ) {
    $words = str_word_count( wp_strip_all_tags( $content ) );
    $mins  = max( 1, (int) round( $words / 200 ) );
    return $mins . ' min read';
}

/* ── Fetch all published posts for category filter ────────────────── */
$all_posts = get_posts( [
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
] );

/* ── Images & URIs ────────────────────────────────────────────────── */
$img_dir   = get_template_directory_uri() . '/assets/images/';
$hero_bg   = $img_dir . 'hero-bg.jpg';

/* ── Featured post = most recent ─────────────────────────────────── */
$featured_id = ! empty( $all_posts ) ? $all_posts[0]->ID : 0;
$grid_posts  = array_slice( $all_posts, 1 );   // everything after the featured post
?>

<?php /* ─── HERO ──────────────────────────────────────────────────── */ ?>
<section class="blg-hero" aria-label="<?php esc_attr_e( 'Blog hero', 'dallaswebpro' ); ?>">

  <div
    class="blg-hero-bg"
    id="blgHeroBg"
    style="background-image:url('<?php echo esc_url( $hero_bg ); ?>')"
    aria-hidden="true"
  ></div>
  <div class="blg-hero-overlay" aria-hidden="true"></div>
  <div class="blg-hero-grid"   aria-hidden="true"></div>
  <div class="blg-hero-orb"    aria-hidden="true"></div>

  <div class="wrap blg-hero-content">

    <div class="blg-hero-eyebrow">
      <?php esc_html_e( 'The Dallas Web Pro Blog', 'dallaswebpro' ); ?>
    </div>

    <h1 class="blg-hero-title">
      Insights that actually<br>
      <em>move the needle.</em>
    </h1>

    <p class="blg-hero-sub">
      No fluff, no filler. Just practical web development, SEO, and digital marketing strategies
      from a team that has been in the trenches — and knows what it takes to grow a business online.
    </p>

    <div class="blg-hero-meta">
      <div class="blg-hero-stat">
        <span class="blg-hero-stat-num">20+</span>
        <span class="blg-hero-stat-label">Years Experience</span>
      </div>
      <div class="blg-hero-divider" aria-hidden="true"></div>
      <div class="blg-hero-stat">
        <span class="blg-hero-stat-num">3</span>
        <span class="blg-hero-stat-label">Topic Categories</span>
      </div>
      <div class="blg-hero-divider" aria-hidden="true"></div>
      <div class="blg-hero-stat">
        <span class="blg-hero-stat-num">100%</span>
        <span class="blg-hero-stat-label">No-Fluff Content</span>
      </div>
    </div>

  </div><!-- /.wrap.blg-hero-content -->

</section><!-- /.blg-hero -->

<?php /* ─── MARQUEE BAND ───────────────────────────────────────────── */ ?>
<div class="blg-marquee-band" aria-hidden="true">
  <div class="blg-marquee-track">
    <?php
    $marquee_items = [
      'Web Development', 'Search Engine Optimization', 'Social Media &amp; Content',
      'Conversion Strategy', 'Local SEO', 'WordPress Development', 'Digital Marketing',
      'Web Development', 'Search Engine Optimization', 'Social Media &amp; Content',
      'Conversion Strategy', 'Local SEO', 'WordPress Development', 'Digital Marketing',
    ];
    foreach ( $marquee_items as $item ) :
    ?>
      <span class="blg-marquee-item">
        <?php echo $item; // pre-escaped above ?>
        <span class="blg-marquee-dot" aria-hidden="true"></span>
      </span>
    <?php endforeach; ?>
  </div>
</div>

<?php /* ─── FEATURED POST ──────────────────────────────────────────── */ ?>
<?php if ( $featured_id ) :
  $feat_thumb = get_the_post_thumbnail_url( $featured_id, 'large' ) ?: ( $img_dir . 'post-featured-webdev.jpg' );
  $feat_cats  = get_the_category( $featured_id );
  $feat_cat   = ! empty( $feat_cats ) ? esc_html( $feat_cats[0]->name ) : 'Web Development';
  $feat_title = get_the_title( $featured_id );
  $feat_exc   = get_the_excerpt( $featured_id );
  $feat_date  = get_the_date( 'F Y', $featured_id );
  $feat_read  = dwp_read_time( get_post_field( 'post_content', $featured_id ) );
  $feat_url   = get_permalink( $featured_id );
?>
<section class="blg-featured">
  <div class="wrap">

    <div class="blg-section-eyebrow">Featured Article</div>

    <a href="<?php echo esc_url( $feat_url ); ?>" class="blg-featured-card">

      <div class="blg-featured-img-wrap">
        <img
          src="<?php echo esc_url( $feat_thumb ); ?>"
          alt="<?php echo esc_attr( $feat_title ); ?>"
          loading="lazy"
        >
        <div class="blg-featured-img-overlay" aria-hidden="true"></div>
      </div><!-- /.blg-featured-img-wrap -->

      <div class="blg-featured-body">
        <span class="blg-post-tag"><?php echo $feat_cat; ?></span>

        <h2 class="blg-featured-title">
          <?php echo esc_html( $feat_title ); ?>
        </h2>

        <?php if ( $feat_exc ) : ?>
          <p class="blg-featured-excerpt"><?php echo esc_html( $feat_exc ); ?></p>
        <?php endif; ?>

        <div class="blg-featured-footer">
          <div class="blg-post-meta">
            <span>
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8"  y1="2" x2="8"  y2="6"/>
                <line x1="3"  y1="10" x2="21" y2="10"/>
              </svg>
              <?php echo esc_html( $feat_date ); ?>
            </span>
            <span>
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
              </svg>
              <?php echo esc_html( $feat_read ); ?>
            </span>
          </div>

          <span class="blg-btn-read">
            Read Article
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </span>
        </div><!-- /.blg-featured-footer -->
      </div><!-- /.blg-featured-body -->

    </a><!-- /.blg-featured-card -->

  </div><!-- /.wrap -->
</section><!-- /.blg-featured -->
<?php endif; ?>

<?php /* ─── POST GRID + FILTER ─────────────────────────────────────── */ ?>
<section class="blg-grid-section">
  <div class="wrap">

    <?php /* Filter bar */ ?>
    <div class="blg-filter-bar" id="blgFilterBar">
      <span class="blg-filter-label">Filter by:</span>
      <button class="blg-filter-btn active" data-filter="all"          type="button">All Posts</button>
      <button class="blg-filter-btn"        data-filter="web-development" type="button">Web Development</button>
      <button class="blg-filter-btn"        data-filter="seo"          type="button">SEO</button>
      <button class="blg-filter-btn"        data-filter="social-media" type="button">Social Media</button>
    </div><!-- /.blg-filter-bar -->

    <?php /* Post cards grid */ ?>
    <div class="blg-posts-grid" id="blgPostsGrid">

    <?php if ( ! empty( $grid_posts ) ) :
      // Fallback images for cards that have no thumbnail
      $fallback_imgs = [
        'post-seo-conversions.jpg',
        'post-social-media.jpg',
        'post-performance.jpg',
        'post-local-seo.jpg',
        'post-branding.jpg',
        'post-custom-vs-template.jpg',
      ];
      $fb_i = 0;

      foreach ( $grid_posts as $card_post ) :
        $card_id    = $card_post->ID;
        $card_title = get_the_title( $card_id );
        $card_exc   = get_the_excerpt( $card_id );
        $card_url   = get_permalink( $card_id );
        $card_date  = get_the_date( 'M Y', $card_id );
        $card_read  = dwp_read_time( $card_post->post_content );
        $card_thumb = get_the_post_thumbnail_url( $card_id, 'medium_large' )
                      ?: ( $img_dir . $fallback_imgs[ $fb_i % count( $fallback_imgs ) ] );
        $fb_i++;

        // Category slug for filter + display label
        $card_cats    = get_the_category( $card_id );
        $card_cat_obj = ! empty( $card_cats ) ? $card_cats[0] : null;
        $card_cat_lbl = $card_cat_obj ? esc_html( $card_cat_obj->name ) : 'General';

        // Map WP category slug → filter data-category value
        $slug_map = [
          'web-development' => 'web-development',
          'seo'             => 'seo',
          'social-media'    => 'social-media',
        ];
        $raw_slug       = $card_cat_obj ? $card_cat_obj->slug : 'general';
        $filter_slug    = isset( $slug_map[ $raw_slug ] ) ? $slug_map[ $raw_slug ] : 'general';
    ?>

      <a href="<?php echo esc_url( $card_url ); ?>"
         class="blg-post-card"
         data-category="<?php echo esc_attr( $filter_slug ); ?>">

        <div class="blg-post-card-img">
          <img
            src="<?php echo esc_url( $card_thumb ); ?>"
            alt="<?php echo esc_attr( $card_title ); ?>"
            loading="lazy"
          >
          <div class="blg-post-card-img-overlay" aria-hidden="true"></div>
          <span class="blg-post-card-tag"><?php echo $card_cat_lbl; ?></span>
        </div><!-- /.blg-post-card-img -->

        <div class="blg-post-card-body">
          <h3 class="blg-post-card-title"><?php echo esc_html( $card_title ); ?></h3>

          <?php if ( $card_exc ) : ?>
            <p class="blg-post-card-excerpt"><?php echo esc_html( $card_exc ); ?></p>
          <?php endif; ?>

          <div class="blg-post-card-footer">
            <span class="blg-post-card-meta">
              <?php echo esc_html( $card_read ); ?>&nbsp;·&nbsp;<?php echo esc_html( $card_date ); ?>
            </span>
            <span class="blg-post-card-link">
              Read More
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </span>
          </div><!-- /.blg-post-card-footer -->
        </div><!-- /.blg-post-card-body -->

      </a><!-- /.blg-post-card -->

    <?php endforeach; ?>

    <?php else : ?>
      <p style="color:rgba(255,255,255,0.6); grid-column:1/-1; text-align:center; padding:60px 0;">
        No posts yet. Check back soon!
      </p>
    <?php endif; ?>

    </div><!-- /#blgPostsGrid -->

  </div><!-- /.wrap -->
</section><!-- /.blg-grid-section -->

<?php /* ─── NEWSLETTER CTA ──────────────────────────────────────────── */ ?>
<section class="blg-newsletter" aria-labelledby="blg-newsletter-heading">
  <div class="blg-newsletter-orb" aria-hidden="true"></div>

  <div class="wrap">
    <div class="blg-newsletter-inner">

      <div>
        <div class="blg-section-eyebrow">Stay in the Loop</div>
        <h2 class="blg-newsletter-heading" id="blg-newsletter-heading">
          Get tips that actually<br>
          <em>grow your business.</em>
        </h2>
        <p class="blg-newsletter-sub">
          No spam. No fluff. Just practical strategies delivered straight to your inbox —
          the same ones we use for our own clients. Unsubscribe any time.
        </p>
      </div>

      <div>
        <form class="blg-newsletter-form" id="blgNewsletterForm" novalidate>

          <div class="blg-newsletter-row">
            <div class="blg-newsletter-field">
              <label class="blg-newsletter-label" for="blg-nl-name">Your Name</label>
              <input
                class="blg-newsletter-input"
                id="blg-nl-name"
                name="blg_name"
                type="text"
                placeholder="Your name"
                autocomplete="name"
              >
            </div>
            <div class="blg-newsletter-field">
              <label class="blg-newsletter-label" for="blg-nl-biz">Business Name</label>
              <input
                class="blg-newsletter-input"
                id="blg-nl-biz"
                name="blg_business"
                type="text"
                placeholder="Your business"
                autocomplete="organization"
              >
            </div>
          </div><!-- /.blg-newsletter-row -->

          <div class="blg-newsletter-field">
            <label class="blg-newsletter-label" for="blg-nl-email">Email Address</label>
            <input
              class="blg-newsletter-input"
              id="blg-nl-email"
              name="blg_email"
              type="email"
              placeholder="you@yourbusiness.com"
              autocomplete="email"
              required
            >
          </div>

          <button class="blg-newsletter-btn" type="submit" id="blgNewsletterBtn">
            Subscribe — It's Free
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </button>

          <p class="blg-newsletter-note">No spam, ever. Unsubscribe with one click.</p>

        </form>
      </div>

    </div><!-- /.blg-newsletter-inner -->
  </div><!-- /.wrap -->
</section><!-- /.blg-newsletter -->

<?php /* ─── INLINE STYLES: marquee + hidden card + page bg ─────────── */ ?>
<style>
/* Blog page dark background */
body.blog { background: #111820; }

/* Marquee band */
.blg-marquee-band {
  background: #c8922a;
  padding: 14px 0;
  overflow: hidden;
  white-space: nowrap;
}
.blg-marquee-track {
  display: inline-flex;
  animation: blgMarqueeScroll 28s linear infinite;
}
.blg-marquee-track:hover { animation-play-state: paused; }
.blg-marquee-item {
  display: inline-flex;
  align-items: center;
  gap: 20px;
  padding: 0 24px;
  font-family: 'Outfit', system-ui, sans-serif;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: #111820;
}
.blg-marquee-dot {
  width: 4px; height: 4px;
  background: #111820;
  border-radius: 50%;
  opacity: 0.5;
}
@keyframes blgMarqueeScroll {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* Hidden card (filter) */
.blg-post-card.blg-hidden { display: none; }

/* Hide decorative lines before eyebrow labels */
.blg-hero-eyebrow::before,
.blg-section-eyebrow::before { display: none; }

/* Scroll-reveal */
.blg-reveal {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.65s ease, transform 0.65s ease;
}
.blg-reveal.blg-visible {
  opacity: 1;
  transform: none;
}
</style>

<?php /* ─── PAGE JS ─────────────────────────────────────────────────── */ ?>
<script>
(function () {
  'use strict';

  /* Hero bg load animation */
  var heroBg = document.getElementById('blgHeroBg');
  if (heroBg) {
    setTimeout(function () {
      heroBg.classList.add('blg-hero-bg-loaded');
    }, 80);

    window.addEventListener('scroll', function () {
      heroBg.style.transform = 'scale(1) translateY(' + (window.scrollY * 0.22) + 'px)';
    }, { passive: true });
  }

  /* Scroll-reveal */
  var reveals = document.querySelectorAll('.blg-reveal');
  if ('IntersectionObserver' in window && reveals.length) {
    var ro = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('blg-visible');
          ro.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(function (el) { ro.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('blg-visible'); });
  }

  /* Category filter */
  var filterBtns = document.querySelectorAll('.blg-filter-btn');
  var postCards  = document.querySelectorAll('.blg-post-card');

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      filterBtns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');

      var filter = btn.dataset.filter;
      postCards.forEach(function (card) {
        var match = (filter === 'all') || (card.dataset.category === filter);
        card.classList.toggle('blg-hidden', !match);
      });
    });
  });

  /* Newsletter form (placeholder handler) */
  var nlForm = document.getElementById('blgNewsletterForm');
  if (nlForm) {
    nlForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn = document.getElementById('blgNewsletterBtn');
      if (btn) {
        btn.textContent = 'Thanks! You\'re on the list.';
        btn.disabled = true;
        btn.style.opacity = '0.75';
      }
    });
  }

})();
</script>

<?php get_footer(); ?>
