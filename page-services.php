<?php
/**
 * Template Name: Services Overview
 * Services landing page — shows all 6 service cards with links to detail pages.
 *
 * @package DallasWebPro
 */

get_header();
?>

<!-- ═══════════ PAGE HERO ═══════════ -->
<section class="page-hero page-hero-dark">
  <div class="wrap">
    <h1 class="page-hero-h1">
      Six disciplines.<br>
      One agency that<br>
      <em>delivers on all of them.</em>
    </h1>
    <p class="page-hero-sub">
      From the first line of code to your Google ranking to your brand identity — we handle every piece of your digital presence so you can focus on running your business.
    </p>
  </div>
</section>

<!-- ═══════════ SERVICES GRID ═══════════ -->
<section class="services-detail-section">
  <div class="wrap">

    <div class="svc-overview-grid">

      <!-- Web Development -->
      <a href="<?php echo esc_url( home_url( '/services/web-development' ) ); ?>" class="svc-overview-card reveal">
        <div class="svc-overview-icon" aria-hidden="true">
          <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
            <rect x="2" y="7" width="34" height="24" rx="2" stroke="#C97B2A" stroke-width="1.4"/>
            <path d="M2 15h34" stroke="#C97B2A" stroke-width="1.4"/>
            <circle cx="8" cy="11" r="1.8" fill="#C97B2A"/>
            <circle cx="14" cy="11" r="1.8" fill="#C97B2A" fill-opacity="0.4"/>
            <rect x="8" y="21" width="8" height="5" rx="1" fill="#C97B2A" fill-opacity="0.3"/>
            <rect x="20" y="19" width="12" height="2.5" rx="1" fill="#C97B2A" fill-opacity="0.25"/>
            <rect x="20" y="24" width="8" height="2.5" rx="1" fill="#C97B2A" fill-opacity="0.15"/>
          </svg>
        </div>

        <h2 class="svc-overview-title">Web Development</h2>
        <p class="svc-overview-body">Purpose-built WordPress sites designed around your business goals. Clean code, fast load times, conversion-focused from the first line.</p>
        <span class="svc-overview-link">
          Learn more
        </span>
      </a>

      <!-- SEO -->
      <a href="<?php echo esc_url( home_url( '/services/seo' ) ); ?>" class="svc-overview-card reveal rev-d1">
        <div class="svc-overview-icon" aria-hidden="true">
          <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
            <circle cx="16" cy="16" r="10" stroke="#C97B2A" stroke-width="1.4"/>
            <path d="M24 24l7 7" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/>
            <path d="M11 16h10M16 11v10" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
        </div>

        <h2 class="svc-overview-title">Search Engine Optimization</h2>
        <p class="svc-overview-body">Get found by customers actively searching for your services. We build rankings that compound over time — not quick fixes that fade.</p>
        <span class="svc-overview-link">
          Learn more
        </span>
      </a>

      <!-- Branding -->
      <a href="<?php echo esc_url( home_url( '/services/branding' ) ); ?>" class="svc-overview-card reveal rev-d2">
        <div class="svc-overview-icon" aria-hidden="true">
          <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
            <circle cx="19" cy="19" r="5" fill="#C97B2A" fill-opacity="0.2" stroke="#C97B2A" stroke-width="1.4"/>
            <path d="M19 6v5M19 27v5M6 19h5M27 19h5" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/>
            <path d="M10.5 10.5l3.5 3.5M24 24l3.5 3.5M24 10.5l-3.5 3.5M14 24l-3.5 3.5" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/>
          </svg>
        </div>

        <h2 class="svc-overview-title">Branding &amp; Identity</h2>
        <p class="svc-overview-body">Logo, color system, typography, brand voice — built cohesively so every customer touchpoint reinforces who you are.</p>
        <span class="svc-overview-link">
          Learn more
        </span>
      </a>

      <!-- Social Media -->
      <a href="<?php echo esc_url( home_url( '/services/social-media' ) ); ?>" class="svc-overview-card reveal">
        <div class="svc-overview-icon" aria-hidden="true">
          <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
            <rect x="5" y="11" width="15" height="11" rx="2" stroke="#C97B2A" stroke-width="1.4"/>
            <rect x="17" y="17" width="15" height="11" rx="2" stroke="#C97B2A" stroke-width="1.4"/>
            <circle cx="12.5" cy="16.5" r="2.5" fill="#C97B2A" fill-opacity="0.3" stroke="#C97B2A" stroke-width="1.2"/>
          </svg>
        </div>

        <h2 class="svc-overview-title">Social Media &amp; Content</h2>
        <p class="svc-overview-body">Strategy, creation, and scheduling handled end-to-end. Consistent content that builds your brand between customer visits.</p>
        <span class="svc-overview-link">
          Learn more
        </span>
      </a>

     <!-- Analytics -->
<div class="svc-overview-card reveal rev-d1">
  <div class="svc-overview-icon" aria-hidden="true">
    <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
      <rect x="4" y="4" width="30" height="30" rx="2" stroke="#C97B2A" stroke-width="1.4"/>
      <path d="M11 26l5-7 5 4 5-9" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
      <circle cx="26" cy="14" r="2.5" fill="#C97B2A" fill-opacity="0.35"/>
    </svg>
  </div>
  <h2 class="svc-overview-title">Analytics &amp; Reporting</h2>
  <p class="svc-overview-body">Plain-English dashboards showing what's working and what isn't. No vanity metrics — just the numbers that matter to your bottom line.</p>
</div>

<!-- Consultation -->
<div class="svc-overview-card reveal rev-d2">
  <div class="svc-overview-icon" aria-hidden="true">
    <svg width="38" height="38" viewBox="0 0 38 38" fill="none">
      <path d="M19 5c-7.18 0-13 4.93-13 11 0 3.21 1.59 6.1 4.13 8.16L9 31l6.5-2.6A15.3 15.3 0 0019 29c7.18 0 13-4.93 13-11S26.18 5 19 5z" stroke="#C97B2A" stroke-width="1.4" stroke-linejoin="round"/>
      <path d="M14 17h10M14 21h6" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/>
    </svg>
  </div>
  <h2 class="svc-overview-title">Strategy &amp; Consultation</h2>
  <p class="svc-overview-body">Not sure where to start? We audit your digital presence, find the highest-leverage opportunities, and build a roadmap for your goals and budget.</p>
</div>

    </div><!-- /.svc-overview-grid -->
  </div>
</section>

<!-- ─── UNIVERSAL CTA BAND ───────────────────────────── -->
<div class="cta-band">

  <div class="cta-watermark" aria-hidden="true">Dallas</div>

  <div class="cta-band-inner">
    <h2 class="cta-h2">
      Like what you see?
      <em>Let's build yours.</em>
    </h2>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-cta-gold">Start a Project</a>
  </div>

</div>

<?php get_footer(); ?>