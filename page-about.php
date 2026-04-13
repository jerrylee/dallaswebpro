<?php
/**
 * Template Name: About Us Page
 *
 * @package DallasWebPro
 */

get_header();

$img = get_template_directory_uri() . '/assets/images/';
?>

<!-- ═══════════ ABOUT HERO ═══════════ -->
<section class="au-hero">
  <!-- diagonal line texture -->
  <div class="au-hero-texture" aria-hidden="true"></div>
  <!-- amber glow -->
  <div class="au-hero-glow" aria-hidden="true"></div>

  <div class="wrap au-hero-inner">

    <!-- LEFT: text -->
    <div class="au-hero-left">
      <nav class="page-breadcrumb-nav" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="page-breadcrumb-sep">/</span>
        <span>About Us</span>
      </nav>

      <h1 class="au-hero-h1">We build websites for businesses that<br><em>build the world.</em></h1>
      <p class="au-hero-sub">Dallas Web Pro is a custom web development and digital marketing agency with a unique edge — we know the home service trades because we have lived them.</p>

      <div class="au-hero-actions">
        <a href="#au-contact" class="au-btn-primary">Book a Discovery Call</a>
        <a href="<?php echo esc_url( home_url( '/work' ) ); ?>" class="au-btn-ghost">
          See our work
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
    </div>

    <!-- RIGHT: floating stat cards -->
    <div class="au-hero-right" aria-hidden="true">
      <div class="au-hero-cards">

        <div class="au-stat-card au-card-float">
          <div class="au-stat-icon">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/></svg>
          </div>
          <div>
            <div class="au-stat-num"><span id="au-stat-years">0</span><span class="au-stat-sup">+</span></div>
            <div class="au-stat-label">Years Experience</div>
          </div>
        </div>

        <div class="au-stat-card au-card-float" style="animation-delay:-2s;">
          <div class="au-stat-icon">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="15" rx="2"/><path d="M8 21h8M12 18v3"/><circle cx="7" cy="9" r="1" fill="currentColor" stroke="none"/><path d="M10 9h7M7 12h10"/></svg>
          </div>
          <div>
            <div class="au-stat-num"><span id="au-stat-sites">0</span><span class="au-stat-sup">+</span></div>
            <div class="au-stat-label">Sites Launched</div>
          </div>
        </div>

        <div class="au-stat-card au-card-float au-card-wide" style="animation-delay:-4s;">
          <div class="au-stat-icon">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor" stroke="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </div>
          <div>
            <div class="au-stat-num">5<span class="au-stat-sup">★</span></div>
            <div class="au-stat-label">Star Rated Agency</div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


<!-- ═══════════ OUR STORY ═══════════ -->
<section class="au-story">
  <div class="au-story-inner">

    <div class="au-story-img reveal-left">
      <img src="<?php echo esc_url( $img ); ?>our-story-workspace.jpg" alt="Professional web development workspace in Dallas" loading="lazy">
      <div class="au-story-img-overlay"></div>
    </div>

    <div class="au-story-copy reveal-right">
      <span class="eyebrow eyebrow-no-line">Our Story</span>
      <h2 class="au-story-heading">From the trenches<br>to the <em>web.</em></h2>

      <p class="au-story-body">Most marketing agencies do not understand the realities of running a home service business. They use buzzwords and vanity metrics that don't translate to booked jobs. We're different.</p>

      <p class="au-story-body">Founded by Jerry Schrader — a web developer with over 20 years of experience — Dallas Web Pro was built on a simple premise: businesses deserve high-end, conversion-focused digital solutions without the agency fluff. We know what it takes to make the phone ring because we have built the tools that make it happen.</p>

      <p class="au-story-body">We have served markets ranging from personal injury attorneys and national brands to home service companies, restaurants, and professional service firms. Every client gets the same thing: a real strategy, a custom build, and a partner who is invested in their growth.</p>

      <div class="au-story-stats">
        <div class="au-story-stat">
          <div class="au-story-stat-num" data-target="20">0<span>+</span></div>
          <div class="au-story-stat-label">Years Experience</div>
        </div>
        <div class="au-story-stat">
          <div class="au-story-stat-num" data-target="100">0<span>+</span></div>
          <div class="au-story-stat-label">Sites Launched</div>
        </div>
        <div class="au-story-stat">
          <div class="au-story-stat-num" data-target="100">0<span>%</span></div>
          <div class="au-story-stat-label">Custom Builds</div>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- ═══════════ THE DIFFERENCE ═══════════ -->
<section class="au-diff" data-wm="Dallas">
  <div class="au-diff-lines" aria-hidden="true"></div>
  <div class="wrap au-diff-wrap">

    <div class="au-diff-head">
      <div class="reveal">
        <span class="eyebrow eyebrow-no-line eyebrow-lt">The Dallas Web Pro Difference</span>
        <h2 class="au-diff-heading">An agency that actually <em>understands</em> your business.</h2>
      </div>
    </div>

    <div class="au-diff-grid">

      <div class="au-diff-card reveal rev-d1">
        <div class="au-diff-card-icon">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <h3>Industry Experience</h3>
        <p>We know the difference between a rough-in and a trim-out. We speak your language and understand your customers' pain points before we write a single line of code.</p>
        <div class="au-diff-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="au-diff-card reveal rev-d2">
        <div class="au-diff-card-icon">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <h3>Custom Solutions</h3>
        <p>No cookie-cutter templates. Every website is custom-designed and coded from scratch to dominate your local market and convert visitors into leads from day one.</p>
        <div class="au-diff-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="au-diff-card reveal rev-d3">
        <div class="au-diff-card-icon">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
        </div>
        <h3>Honest Partnership</h3>
        <p>We value transparency above everything. If a strategy won't drive real results for your bottom line, we'll tell you straight — before we take your money.</p>
        <div class="au-diff-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

      <div class="au-diff-card reveal rev-d4">
        <div class="au-diff-card-icon">
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/><line x1="2" y1="20" x2="22" y2="20"/></svg>
        </div>
        <h3>Results-Driven</h3>
        <p>We don't care about vanity metrics. Our only goal is to build digital assets that generate revenue, fill your pipeline, and help your business compound its growth over time.</p>
        <div class="au-diff-arrow"><svg viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" width="13" height="13"><path d="M2 6.5h9M7 2l4.5 4.5L7 11"/></svg></div>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════ MARQUEE ═══════════ -->
<div class="sd-marquee-band" aria-hidden="true">
  <div class="sd-marquee-track">
    <span class="sd-marquee-item">Real Experience<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Custom Development<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Honest Marketing<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Trade Specialists<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Results First<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">WordPress Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">20+ Years Experience<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Real Experience<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Custom Development<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Honest Marketing<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Trade Specialists<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Results First<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">WordPress Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">20+ Years Experience<span class="sd-marquee-dot"></span></span>
  </div>
</div>


<!-- ═══════════ FOUNDER ═══════════ -->
<section class="au-founder" id="founder">
  <div class="wrap au-founder-grid">

    <!-- Photo column -->
    <div class="au-founder-photo-wrap reveal-left">
      <div class="au-founder-photo">
        <?php
        // If a founder photo is available, swap the placeholder below.
        // Recommended: 800x1000px (4:5 portrait).
        ?>
        <img src="<?php echo esc_url( $img ); ?>jerry-michelle.jpg" alt="Jerry Schrader — Founder, Dallas Web Pro" loading="lazy">
      </div>
      <div class="au-founder-badge">
        <strong>20<span>+</span></strong>
        <span>Years in Business</span>
      </div>
    </div>

    <!-- Copy column -->
<div class="au-founder-copy reveal-right">
  <span class="eyebrow eyebrow-no-line">Leadership</span>
  <h2 class="au-founder-heading">Meet Jerry <em>Schrader.</em></h2>
  <p class="au-founder-body">With over 20 years of web development and digital marketing expertise, Jerry Schrader founded Dallas Web Pro on a simple belief: small and mid-sized businesses deserve the same caliber of digital work that Fortune 500 companies get.</p>
  <p class="au-founder-body">Jerry has worked across some of the most demanding environments in the industry — including enterprise-level development at AT&amp;T and specialized digital marketing for personal injury law firms, where high-stakes SEO and conversion-focused design are non-negotiable.</p>
  <p class="au-founder-body">Every project at Dallas Web Pro gets Jerry's full strategic attention — a real partner invested in your growth, not just your invoice.</p>

      <div class="au-founder-creds">
        <span class="au-cred-pill">
          <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M8 1l2 4 5 .7-3.5 3.4.8 5L8 12l-4.3 2.1.8-5L1 5.7 6 5z"/></svg>
          26+ Years Web Development
        </span>
        <span class="au-cred-pill">
          <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M14 10.5a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v5z"/><path d="M8 8.5V7M8 10h.01"/></svg>
          Enterprise Dev — AT&amp;T
        </span>
        <span class="au-cred-pill">
          <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M9.3 3.7a6 6 0 1 1-2.6 0M8 1v6"/></svg>
          Brand &amp; Marketing Strategy
        </span>
        <span class="au-cred-pill">
          <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"><path d="M8 14s-6-3.5-6-7.5a6 6 0 0 1 12 0C14 10.5 8 14 8 14z"/><circle cx="8" cy="6.5" r="1.5"/></svg>
          Dallas–Fort Worth, Texas
        </span>
      </div>

      <div class="au-founder-sig">
        <div class="au-founder-sig-name">Jerry Schrader</div>
        <div class="au-founder-sig-title">Founder &amp; Principal — Dallas Web Pro</div>
      </div>
    </div>

  </div>
</section>


<!-- ═══════════ TESTIMONIALS ═══════════ -->
<section class="au-testi-section">
  <div class="wrap">
    <div class="au-testi-head reveal">
      <span class="eyebrow" style="justify-content:center;display:flex;">What Clients Say</span>
      <h2 class="sec-heading">Real businesses. <em>Real results.</em></h2>
    </div>
    <div class="au-testi-grid">

      <div class="au-testi-card reveal rev-d1">
        <div class="au-testi-stars">
          <?php for ( $s = 0; $s < 5; $s++ ) : ?>
            <svg class="au-testi-star" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="au-testi-quote">We needed a website that could handle memberships, bookings, and showcase our stylists all in one place. Dallas Web Pro built exactly that. Clean, fast, and our clients actually use it. Membership signups went up immediately after launch.</p>
        <div class="au-testi-author">
          <div class="au-testi-avatar" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div>
            <div class="au-testi-name">Salon Membership Website Client</div>
            <div class="au-testi-co">Dallas, Texas</div>
          </div>
        </div>
      </div>

      <div class="au-testi-card reveal rev-d2">
        <div class="au-testi-stars">
          <?php for ( $s = 0; $s < 5; $s++ ) : ?>
            <svg class="au-testi-star" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="au-testi-quote">Jerry supported our internal web development needs at AT&amp;T for a number of years, and the quality of his work was consistently excellent. He understood the complexity of building tools and portals for large teams. He's the kind of developer you can hand a project to and trust it willl get done right. I would recommend him without hesitation to any organization looking for serious web development talent.</p>
        <div class="au-testi-author">
          <div class="au-testi-avatar" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div>
            <div class="au-testi-name">AT&amp;T Colleague</div>
            <div class="au-testi-co">Enterprise Web Development</div>
          </div>
        </div>
      </div>

      <div class="au-testi-card reveal rev-d3">
        <div class="au-testi-stars">
          <?php for ( $s = 0; $s < 5; $s++ ) : ?>
            <svg class="au-testi-star" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <?php endfor; ?>
        </div>
        <p class="au-testi-quote">Dallas Web Pro handles everything digital for us — our website, SEO, and marketing — and honestly, I don't have to think about it. The site looks sharp and actually brings in leads. We rank well locally and the phone keeps ringing. Jerry understands what a trade business needs: no fluff, just results. If you're a contractor looking to grow your online presence, I can't recommend him enough.</p>
        <div class="au-testi-author">
          <div class="au-testi-avatar" aria-hidden="true">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div>
            <div class="au-testi-name">Trade Business Owner</div>
            <div class="au-testi-co">Home Services, DFW</div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════ CONTACT CTA ═══════════ -->
<?php get_template_part( 'template-parts/home/contact' ); ?>


<!-- PAGE SCRIPTS -->
<script>
(function () {
  'use strict';

  /* Scroll Reveal */
  var revEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
  if ('IntersectionObserver' in window) {
    var obs = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting) { e.target.classList.add('is-visible'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.09, rootMargin: '0px 0px -40px 0px' });
    revEls.forEach(function(el) { obs.observe(el); });
  } else {
    revEls.forEach(function(el) { el.classList.add('is-visible'); });
  }

  /* Story stat counters */
  var statEls = document.querySelectorAll('.au-story-stat-num[data-target]');
  if ('IntersectionObserver' in window) {
    var statObs = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (!e.isIntersecting) return;
        var el     = e.target;
        var target = parseInt(el.dataset.target, 10);
        var suffix = el.querySelector('span') ? el.querySelector('span').textContent : '';
        var start  = null;
        var dur    = 1400;
        (function step(ts) {
          if (!start) start = ts;
          var prog  = Math.min((ts - start) / dur, 1);
          var eased = 1 - Math.pow(1 - prog, 3);
          el.innerHTML = Math.round(eased * target) + '<span>' + suffix + '</span>';
          if (prog < 1) requestAnimationFrame(step);
        })(performance.now());
        statObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    statEls.forEach(function(el) { statObs.observe(el); });
  }

  /* Hero stat counters */
  function animHero(id, target, delay) {
    setTimeout(function() {
      var el = document.getElementById(id);
      if (!el) return;
      var start = null, dur = 1600;
      (function step(ts) {
        if (!start) start = ts;
        var prog = Math.min((ts - start) / dur, 1);
        el.textContent = Math.round((1 - Math.pow(1 - prog, 3)) * target);
        if (prog < 1) requestAnimationFrame(step);
      })(performance.now());
    }, delay);
  }
  animHero('au-stat-years', 20, 400);
  animHero('au-stat-sites', 50, 600);

})();
</script>

<?php get_footer(); ?>