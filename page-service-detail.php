<?php
/**
 * Template Name: Service Detail
 *
 * Used by all individual service pages:
 *   Web Development, SEO, Branding, Social Media, Analytics, Consultation
 *
 * Content comes from:
 *   - WordPress page title / excerpt / content (the_content)
 *   - ACF fields on each page (registered below via acf_add_local_field_group)
 *
 * ACF fields per page:
 *   sd_tagline        — hero sub-headline (one line)
 *   sd_intro_heading  — section heading above intro body
 *   sd_intro_body     — intro body (textarea, no html needed)
 *   sd_approach_eyebrow
 *   sd_approach_heading
 *   sd_approach_sub
 *   sd_steps          — repeater: step_title, step_body (Concept / Build / Test)
 *   sd_testimonial_quote
 *   sd_testimonial_name
 *   sd_testimonial_company
 *   sd_testimonial_url
 *   sd_cta_heading    — override contact CTA heading
 *
 * @package DallasWebPro
 */

get_header();

// ── Pull ACF fields with fallbacks ─────────────────────────────
$tagline         = get_field( 'sd_tagline' )         ?: get_the_excerpt();
$intro_heading   = get_field( 'sd_intro_heading' )   ?: '';
$intro_body      = get_field( 'sd_intro_body' )      ?: '';
$appr_eyebrow    = get_field( 'sd_approach_eyebrow' ) ?: 'Our Approach';
$appr_heading    = get_field( 'sd_approach_heading' ) ?: 'Insight. Creativity. Technology.';
$appr_sub        = get_field( 'sd_approach_sub' )    ?: '';
$steps           = get_field( 'sd_steps' )           ?: [];
$testi_quote     = get_field( 'sd_testimonial_quote' ) ?: '';
$testi_name      = get_field( 'sd_testimonial_name' )  ?: '';
$testi_company   = get_field( 'sd_testimonial_company' ) ?: '';
$testi_url       = get_field( 'sd_testimonial_url' )  ?: '';

// Convert *italic* in approach heading
$appr_heading_html = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $appr_heading ) );

// Default 3-step approach if none set in ACF
if ( empty( $steps ) ) {
	$steps = [
		[ 'step_title' => 'Concept', 'step_body' => 'We start with a discovery session to understand your business objectives, target audience, and goals. Our team develops a comprehensive strategy aligned with where you want to go.' ],
		[ 'step_title' => 'Build',   'step_body' => 'Using modern tools and best practices, we execute the strategy with precision — whether that\'s writing code, crafting content, or building out campaigns.' ],
		[ 'step_title' => 'Test',    'step_body' => 'We monitor performance, track results, and continuously refine our approach so your investment keeps compounding over time.' ],
	];
}
?>

<!-- ═══════════ PAGE HERO ═══════════ -->
<section class="page-hero page-hero-dark page-hero-split">
  <div class="hero-grid-bg" aria-hidden="true"></div>
  <div class="wrap hero-split-wrap">

    <!-- LEFT: text -->
    <div class="hero-split-left">
      <nav class="page-breadcrumb-nav" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="page-breadcrumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-breadcrumb-sep">/</span>
        <span><?php the_title(); ?></span>
      </nav>
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
      <?php if ( $tagline ) : ?>
        <p class="page-hero-sub"><?php echo esc_html( $tagline ); ?></p>
      <?php endif; ?>
    </div>

    <!-- RIGHT: floating code on background -->
    <div class="hero-code-wrap" aria-hidden="true">
      <div class="hero-code-block">
        <div class="hero-code-label">
          <span class="hero-code-label-dot"></span>
          <span class="hero-code-label-name" id="code-filename">index.html</span>
        </div>
        <div class="hero-code-lines">
          <div class="line-nums" id="line-nums"></div>
          <div class="code-area">
            <pre id="code-output" style="margin:0;"></pre>
            <span class="cursor" id="cursor"></span>
          </div>
        </div>
      </div>
    </div><!-- /.hero-code-wrap -->

  </div>
</section>


<!-- ═══════════ SPLIT INTRO ═══════════ -->
<section class="sd-split">
  <div class="sd-split-inner">

    <!-- Image panel -->
    <div class="sd-split-img reveal-left">
      <img
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dev-intro.jpg"
        alt="Dallas Web Pro development workspace"
        loading="lazy"
      >
      <div class="sd-split-img-overlay"></div>
    </div>

    <!-- Copy panel -->
    <div class="sd-split-copy reveal-right">
      <span class="eyebrow eyebrow-no-line">About This Service</span>
      <h2 class="sd-split-heading">Modern web development solutions built for <em>success.</em></h2>

      <?php if ( $intro_body ) :
        $paragraphs = array_filter( array_map( 'trim', explode( "\n\n", $intro_body ) ) );
        foreach ( $paragraphs as $p ) : ?>
          <p class="sd-split-body"><?php echo esc_html( $p ); ?></p>
        <?php endforeach;
      else : ?>
        <p class="sd-split-body">At Dallas Web Pro, we don't just build websites — we create powerful digital tools that help your business grow. Our custom web development approach means every line of code is written with your specific goals in mind, giving you a website that's fast, secure, and built to convert visitors into customers.</p>
        <p class="sd-split-body">Whether you need a sleek business website, a robust e-commerce platform, or a custom web application, our team has the expertise to bring your vision to life.</p>
      <?php endif; ?>

      <div class="sd-split-stats">
        <div class="sd-stat-item">
          <div class="sd-stat-num" data-target="50">0<span>+</span></div>
          <div class="sd-stat-label">Sites Launched</div>
        </div>
        <div class="sd-stat-item">
          <div class="sd-stat-num" data-target="100">0<span>%</span></div>
          <div class="sd-stat-label">Client Satisfaction</div>
        </div>
        <div class="sd-stat-item">
          <div class="sd-stat-num" data-target="20">0<span>+</span></div>
          <div class="sd-stat-label">Years in Business</div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════ WHAT WE BUILD ═══════════ -->
<section class="sd-build" data-wm="Dallas">
  <div class="sd-build-lines" aria-hidden="true"></div>
  <div class="wrap sd-build-wrap">

    <div class="sd-build-head">
      <div class="reveal">
        <span class="eyebrow eyebrow-no-line">What We Build</span>
        <h2 class="sd-build-heading">Everything your business needs <em>online.</em></h2>
      </div>
    </div>

    <div class="sd-cards-grid">

      <div class="sd-card reveal rev-d1">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><rect x="2" y="3" width="20" height="15" rx="2"/><path d="M8 21h8M12 18v3"/></svg>
        </div>
        <h3>Custom Website Design</h3>
        <p>Bespoke websites crafted around your brand identity and business objectives — no templates, no shortcuts.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="sd-card reveal rev-d2">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
        </div>
        <h3>E-Commerce Development</h3>
        <p>High-converting online stores built on WooCommerce or custom platforms, optimized for sales from day one.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="sd-card reveal rev-d3">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
        </div>
        <h3>WordPress Development</h3>
        <p>Custom WordPress themes and plugins built to your exact specifications — powerful, maintainable, and fast.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="sd-card reveal rev-d1">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/></svg>
        </div>
        <h3>Responsive &amp; Mobile-First</h3>
        <p>Every site we build is engineered to perform flawlessly on every screen size — phone, tablet, and desktop.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="sd-card reveal rev-d2">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
        </div>
        <h3>Performance Optimization</h3>
        <p>Core Web Vitals tuning, image optimization, caching, and CDN configuration for lightning-fast load times.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="sd-card reveal rev-d3">
        <div class="sd-card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="22" height="22"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3>Security &amp; Maintenance</h3>
        <p>Ongoing updates, security hardening, uptime monitoring, and backups so your site stays safe and current.</p>
        <div class="sd-card-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════ MARQUEE ═══════════ -->
<div class="sd-marquee-band" aria-hidden="true">
  <div class="sd-marquee-track">
    <span class="sd-marquee-item">Custom Web Development<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">WordPress Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">E-Commerce Solutions<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Performance Optimization<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Mobile-First Design<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">SEO-Ready Builds<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Security &amp; Maintenance<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Custom Web Development<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">WordPress Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">E-Commerce Solutions<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Performance Optimization<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Mobile-First Design<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">SEO-Ready Builds<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Security &amp; Maintenance<span class="sd-marquee-dot"></span></span>
  </div>
</div>

<!-- ═══════════ HOW WE WORK (Parallax) ═══════════ -->
<section class="sd-process-new js-parallax">
  <div class="sd-process-new-bg js-parallax-bg">
    <img
      src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dev-process.jpg"
      alt="Development workspace with dual monitors"
      loading="lazy"
    >
  </div>
  <div class="wrap sd-process-new-wrap">

    <div class="sd-process-new-head reveal">
      <span class="eyebrow eyebrow-no-line eyebrow-lt">How We Work</span>
      <h2 class="sd-process-new-heading">Concept. Build. Test.</h2>
      <p class="sd-process-new-sub">A disciplined three-phase process that eliminates guesswork and delivers results on time, every time.</p>
    </div>

    <div class="sd-process-new-steps">

      <div class="sd-process-new-step reveal rev-d1">
        <h3><?php echo esc_html( $steps[0]['step_title'] ?? 'Discover' ); ?></h3>
        <p><?php echo esc_html( $steps[0]['step_body'] ?? 'We start with deep discovery sessions to understand your business objectives, target audience, and technical requirements. Our team develops a comprehensive strategy aligned with your goals.' ); ?></p>
      </div>

      <div class="sd-process-new-step reveal rev-d2">
        <h3><?php echo esc_html( $steps[1]['step_title'] ?? 'Build' ); ?></h3>
        <p><?php echo esc_html( $steps[1]['step_body'] ?? 'Using modern frameworks and hand-crafted code, we build custom websites with clean architecture, optimal performance, and seamless user experiences across every device.' ); ?></p>
      </div>

      <div class="sd-process-new-step reveal rev-d3">
        <h3><?php echo esc_html( $steps[2]['step_title'] ?? 'Launch & Refine' ); ?></h3>
        <p><?php echo esc_html( $steps[2]['step_body'] ?? 'Before launch, we rigorously test across devices and browsers. After go-live, we monitor performance and keep your site running at peak condition as your business grows.' ); ?></p>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════ CLIENT RESULTS ═══════════ -->
<section class="sd-results">
  <div class="wrap">
    <div class="sd-results-grid">

      <!-- Left: Dallas skyline -->
      <div class="sd-results-img-wrap reveal-left">
        <div class="sd-results-img-main">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dallas-skyline.jpg"
            alt="Dallas Texas skyline at golden hour"
            loading="lazy"
          >
        </div>
      </div>

      <!-- Right: quote -->
      <div class="sd-results-content reveal-right">
        <?php dwp_eyebrow( 'Client Results' ); ?>
        <h2 class="sd-results-heading">Real businesses.<br><em>Real results.</em></h2>

        <div class="sd-quote-card">
          <div class="sd-quote-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1zm12 0c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"/></svg>
          </div>

          <div class="sd-quote-stars" aria-label="5 stars">
            <?php for ( $s = 0; $s < 5; $s++ ) : ?>
            <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <?php endfor; ?>
          </div>

          <blockquote class="sd-quote-text">
            <?php echo esc_html( $testi_quote ?: 'Dallas Web Pro designed and built our website from scratch, and the results have been outstanding. They understood our business, built a site that converts, and were professional throughout. I send everyone their way.' ); ?>
          </blockquote>

          <div class="sd-quote-byline">
            <div class="sd-byline-avatar" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div class="sd-byline-info">
              <strong><?php echo esc_html( $testi_name ?: 'John S.' ); ?></strong>
              <?php if ( $testi_url ) : ?>
                <a href="<?php echo esc_url( $testi_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $testi_company ?: 'Schrader Plumbing' ); ?></a>
              <?php else : ?>
                <span><?php echo esc_html( $testi_company ?: 'Schrader Plumbing' ); ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



<!-- ═══════════ OTHER SERVICES ═══════════ -->
<section class="sd-other-services">
  <div class="wrap">
    <span class="eyebrow">Also Available</span>
    <h2 class="sec-heading" style="margin-bottom: 40px;">Explore our <em>other services.</em></h2>
    <div class="sd-other-grid">
      <?php
      $all_services = [
        [ 'title' => 'Web Development',           'url' => '/services/web-development' ],
        [ 'title' => 'Search Engine Optimization','url' => '/services/seo' ],
        [ 'title' => 'Branding &amp; Identity',   'url' => '/services/branding' ],
        [ 'title' => 'Social Media &amp; Content','url' => '/services/social-media' ],
      ];

      // Remove current page from list
      $current_slug = '/' . trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
      foreach ( $all_services as $svc ) :
        if ( rtrim( $svc['url'], '/' ) === rtrim( $current_slug, '/' ) ) continue;
      ?>
      <a href="<?php echo esc_url( home_url( $svc['url'] ) ); ?>" class="sd-other-item">
        <?php echo wp_kses_post( $svc['title'] ); ?>
        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" aria-hidden="true">
          <path d="M2 6.5h9M7 2l4.5 4.5L7 11" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════ CONTACT CTA ═══════════ -->
<?php get_template_part( 'template-parts/home/contact' ); ?>

<?php get_footer(); ?>