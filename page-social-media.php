<?php
/**
 * Template Name: Social Media Service Page
 *
 * Dedicated template for the Social Media & Content service page.
 *
 * ACF fields used:
 *   sd_tagline              — hero sub-headline
 *   sd_testimonial_quote
 *   sd_testimonial_name
 *   sd_testimonial_company
 *   sd_testimonial_url
 *
 * @package DallasWebPro
 */

get_header();

$tagline       = get_field( 'sd_tagline' )             ?: 'Strategic social media management and content creation that grows your following, drives engagement, and turns followers into paying customers.';
$testi_quote   = get_field( 'sd_testimonial_quote' )   ?: 'Before Dallas Web Pro, our social media was an afterthought. Now it\'s our top source of new leads. They took us from 400 followers to over 12,000 in eight months — and every single one of them is a real potential customer in our service area.';
$testi_name    = get_field( 'sd_testimonial_name' )    ?: 'Augerpros Plumbing and Drain';
$testi_company = get_field( 'sd_testimonial_company' ) ?: 'augerpros.com';
$testi_url     = get_field( 'sd_testimonial_url' )     ?: 'https://augerpros.com';

$img = get_template_directory_uri() . '/assets/images/';
?>

<!-- ═══════════ SOCIAL HERO ═══════════ -->
<section class="sm-hero">
  <div class="sm-hero-grid-bg" aria-hidden="true"></div>
  <div class="sm-hero-glow" aria-hidden="true"></div>

  <div class="wrap sm-hero-inner">

    <!-- LEFT -->
    <div class="sm-hero-left">
      <nav class="page-breadcrumb-nav" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="page-breadcrumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-breadcrumb-sep">/</span>
        <span><?php the_title(); ?></span>
      </nav>

      <h1 class="sm-hero-h1">Content That<br>Builds<br><em>Audiences.</em></h1>

      <p class="sm-hero-sub"><?php echo esc_html( $tagline ); ?></p>

      <div class="sm-hero-btns">
        <a href="#sm-contact" class="sm-btn-primary">Get a Free Strategy Call &rarr;</a>
        <a href="#sm-services" class="sm-btn-ghost">Our Services &darr;</a>
      </div>
    </div><!-- /.sm-hero-left -->

    <!-- RIGHT: Animated social feed -->
    <div class="sm-hero-right" aria-hidden="true">

      <div class="sm-feed-header">
        <div class="sm-feed-label">
          <span class="sm-feed-dot"></span>
          social_feed.live
        </div>
        <div class="sm-feed-live">
          <span class="sm-feed-live-dot"></span>
          Live
        </div>
      </div>

      <div class="sm-feed-stack" id="sm-feed-stack">

        <!-- Card 0: Instagram (Augerpros) -->
        <div class="sm-post-card" id="sm-card-0" style="--sm-reach-pct:87%;">
          <div class="sm-card-head">
            <div class="sm-card-avatar" style="background:linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);">IG</div>
            <div class="sm-card-meta">
              <div class="sm-card-name">Augerpros Plumbing</div>
              <div class="sm-card-handle">@augerpros</div>
            </div>
            <div class="sm-card-platform" style="background:#e1306c;">
              <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
            </div>
          </div>
          <div class="sm-card-img">
            <img class="sm-card-img-inner" src="<?php echo esc_url($img); ?>content-studio.jpg" alt="Content">
            <div class="sm-card-img-overlay"></div>
          </div>
          <div class="sm-card-caption">Just wrapped a <strong>same-day emergency call</strong> in Allen, TX. Our team was on-site in under 45 minutes. That's the Augerpros promise. 🔧</div>
          <div class="sm-card-tags">
            <span class="sm-card-tag">#PlumberDallas</span>
            <span class="sm-card-tag">#EmergencyPlumbing</span>
            <span class="sm-card-tag">#AllenTX</span>
          </div>
          <div class="sm-card-footer">
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="2847">0</div><div class="sm-card-stat-lbl">Likes</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="143">0</div><div class="sm-card-stat-lbl">Comments</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="512">0</div><div class="sm-card-stat-lbl">Shares</div></div>
          </div>
          <div class="sm-reach-bar-wrap">
            <div class="sm-reach-label"><span>Organic Reach</span><strong>24,381 accounts</strong></div>
            <div class="sm-reach-track"><div class="sm-reach-fill"></div></div>
          </div>
        </div>

        <!-- Card 1: Facebook (DWP) -->
        <div class="sm-post-card" id="sm-card-1" style="--sm-reach-pct:72%;">
          <div class="sm-card-head">
            <div class="sm-card-avatar" style="background:#1877f2;">f</div>
            <div class="sm-card-meta">
              <div class="sm-card-name">Dallas Web Pro</div>
              <div class="sm-card-handle">@dallaswebpro</div>
            </div>
            <div class="sm-card-platform" style="background:#1877f2;">
              <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
            </div>
          </div>
          <div class="sm-card-img">
            <img class="sm-card-img-inner" src="<?php echo esc_url($img); ?>social-manager.jpg" alt="Team">
            <div class="sm-card-img-overlay"></div>
          </div>
          <div class="sm-card-caption">We just launched a brand new website for a <strong>Dallas-area home services company</strong> — 3x faster, fully optimized, and already ranking on page one. 🚀</div>
          <div class="sm-card-tags">
            <span class="sm-card-tag">#DallasWebDesign</span>
            <span class="sm-card-tag">#WordPressExperts</span>
            <span class="sm-card-tag">#DFW</span>
          </div>
          <div class="sm-card-footer">
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="1204">0</div><div class="sm-card-stat-lbl">Reactions</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="87">0</div><div class="sm-card-stat-lbl">Comments</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="341">0</div><div class="sm-card-stat-lbl">Shares</div></div>
          </div>
          <div class="sm-reach-bar-wrap">
            <div class="sm-reach-label"><span>Organic Reach</span><strong>18,740 people</strong></div>
            <div class="sm-reach-track"><div class="sm-reach-fill"></div></div>
          </div>
        </div>

        <!-- Card 2: LinkedIn -->
        <div class="sm-post-card" id="sm-card-2" style="--sm-reach-pct:91%;">
          <div class="sm-card-head">
            <div class="sm-card-avatar" style="background:#0a66c2;">in</div>
            <div class="sm-card-meta">
              <div class="sm-card-name">Dallas Web Pro</div>
              <div class="sm-card-handle">Company Page</div>
            </div>
            <div class="sm-card-platform" style="background:#0a66c2;">
              <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
            </div>
          </div>
          <div class="sm-card-img">
            <img class="sm-card-img-inner" src="<?php echo esc_url($img); ?>strategy-meeting.jpg" alt="Strategy">
            <div class="sm-card-img-overlay"></div>
          </div>
          <div class="sm-card-caption">Insight: Home service businesses that post <strong>3–5x per week on LinkedIn</strong> see 4.2x more inbound leads than those posting once. Consistency is the strategy.</div>
          <div class="sm-card-tags">
            <span class="sm-card-tag">#ContentMarketing</span>
            <span class="sm-card-tag">#B2BMarketing</span>
            <span class="sm-card-tag">#DallasBusinesses</span>
          </div>
          <div class="sm-card-footer">
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="3891">0</div><div class="sm-card-stat-lbl">Impressions</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="214">0</div><div class="sm-card-stat-lbl">Reactions</div></div>
            <div class="sm-card-stat-divider"></div>
            <div class="sm-card-stat"><div class="sm-card-stat-num" data-count="67">0</div><div class="sm-card-stat-lbl">Reposts</div></div>
          </div>
          <div class="sm-reach-bar-wrap">
            <div class="sm-reach-label"><span>Organic Reach</span><strong>31,204 members</strong></div>
            <div class="sm-reach-track"><div class="sm-reach-fill"></div></div>
          </div>
        </div>

      </div><!-- /sm-feed-stack -->

      <div class="sm-feed-dots" id="sm-feed-dots">
        <div class="sm-feed-dot-item active" style="background:#e1306c;" id="sm-dot-0"></div>
        <div class="sm-feed-dot-item" style="background:#1877f2;" id="sm-dot-1"></div>
        <div class="sm-feed-dot-item" style="background:#0a66c2;" id="sm-dot-2"></div>
      </div>

    </div><!-- /.sm-hero-right -->
  </div><!-- /.sm-hero-inner -->
</section>


<!-- ═══════════ INTRO SPLIT ═══════════ -->
<section class="sm-intro-split">
  <div class="sm-intro-img">
    <img src="<?php echo esc_url($img); ?>social-manager.jpg" alt="Social media manager at work" loading="lazy">
    <div class="sm-intro-img-overlay"></div>
  </div>
  <div class="sm-intro-content">
    <div class="section-eyebrow reveal">About This Service</div>
    <h2 class="sm-intro-h2 reveal reveal-delay-1">Content that converts, <em>not just entertains.</em></h2>
    <p class="sm-intro-p reveal reveal-delay-2">At Dallas Web Pro, we build social media strategies tied directly to your business goals — not vanity metrics. Every post, every caption, every campaign is designed to move people from scrolling to buying.</p>
    <p class="sm-intro-p reveal reveal-delay-3">We manage your entire social presence — content creation, scheduling, community management, and paid amplification — so you can focus on running your business while your audience grows on autopilot.</p>
    <div class="sm-intro-stats reveal reveal-delay-4">
      <div class="sm-stat-item">
        <div class="sm-stat-num"><span class="sm-counter" data-target="480">0</span><span>%</span></div>
        <div class="sm-stat-lbl">Avg. Reach Increase</div>
      </div>
      <div class="sm-stat-item">
        <div class="sm-stat-num"><span class="sm-counter" data-target="6">0</span><span>+</span></div>
        <div class="sm-stat-lbl">Platforms Managed</div>
      </div>
      <div class="sm-stat-item">
        <div class="sm-stat-num"><span class="sm-counter" data-target="50">0</span><span>+</span></div>
        <div class="sm-stat-lbl">Brands Grown</div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════ PLATFORM STRIP ═══════════ -->
<div class="sm-platform-strip reveal">
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#e1306c;">
      <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
    </div>
    <div class="sm-platform-name">Instagram</div>
    <div class="sm-platform-reach">2B+ users</div>
  </div>
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#1877f2;">
      <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
    </div>
    <div class="sm-platform-name">Facebook</div>
    <div class="sm-platform-reach">3B+ users</div>
  </div>
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#0a66c2;">
      <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
    </div>
    <div class="sm-platform-name">LinkedIn</div>
    <div class="sm-platform-reach">1B+ users</div>
  </div>
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#ff0000;">
      <svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
    </div>
    <div class="sm-platform-name">YouTube</div>
    <div class="sm-platform-reach">2.7B+ users</div>
  </div>
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#000;">
      <svg viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>
    </div>
    <div class="sm-platform-name">TikTok</div>
    <div class="sm-platform-reach">1.5B+ users</div>
  </div>
  <div class="sm-platform-item">
    <div class="sm-platform-icon" style="background:#34a853;">
      <svg viewBox="0 0 24 24"><path d="M21.35 11.1h-9.17v2.73h6.51c-.33 3.81-3.5 5.44-6.5 5.44C8.36 19.27 5 16.25 5 12c0-4.1 3.2-7.27 7.2-7.27 3.09 0 4.9 1.97 4.9 1.97L19 4.72S16.56 2 12.1 2C6.42 2 2.03 6.8 2.03 12c0 5.05 4.13 10 10.22 10 5.35 0 9.25-3.67 9.25-9.09 0-1.15-.15-1.81-.15-1.81z"/></svg>
    </div>
    <div class="sm-platform-name">Google Business</div>
    <div class="sm-platform-reach">8.5B searches/day</div>
  </div>
</div>


<!-- ═══════════ SERVICES GRID ═══════════ -->
<section class="sm-services-section" id="sm-services">
  <div class="wrap">
    <div class="sm-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">What We Do</div>
      <h2 class="sm-section-h2 reveal reveal-delay-1">A complete content <em>engine.</em></h2>
      <p class="sm-section-sub reveal reveal-delay-2">From strategy to execution — every piece of content crafted to grow your brand and drive real business results.</p>
    </div>
    <div class="sm-cards-grid">

      <div class="sm-svc-card reveal">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></div>
        <h3 class="sm-card-h3">Content Strategy</h3>
        <p class="sm-card-p">A data-backed content roadmap built around your audience, your competitors, and your business goals — with a clear publishing calendar and measurable KPIs from day one.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="sm-svc-card reveal reveal-delay-1">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
        <h3 class="sm-card-h3">Content Creation</h3>
        <p class="sm-card-p">Professional photography, videography, graphic design, and copywriting — all created in-house and tailored to each platform's format, algorithm, and audience expectations.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="sm-svc-card reveal reveal-delay-2">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
        <h3 class="sm-card-h3">Scheduling &amp; Publishing</h3>
        <p class="sm-card-p">Consistent, optimally-timed publishing across all your platforms — we handle the scheduling, cross-posting, and platform-specific optimization so nothing falls through the cracks.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="sm-svc-card reveal reveal-delay-1">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
        <h3 class="sm-card-h3">Community Management</h3>
        <p class="sm-card-p">Active, on-brand responses to comments, DMs, and reviews — building genuine relationships with your audience and protecting your brand reputation in real time.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="sm-svc-card reveal reveal-delay-2">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
        <h3 class="sm-card-h3">Paid Social Advertising</h3>
        <p class="sm-card-p">Targeted Facebook, Instagram, and LinkedIn ad campaigns that amplify your best organic content and drive measurable leads — with full funnel tracking from impression to conversion.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="sm-svc-card reveal reveal-delay-3">
        <div class="sm-card-icon"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
        <h3 class="sm-card-h3">Analytics &amp; Reporting</h3>
        <p class="sm-card-p">Monthly performance reports that go beyond vanity metrics — showing you exactly what content is driving website traffic, leads, and revenue so we can double down on what works.</p>
        <span class="sm-card-arrow">Learn more &rarr;</span>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════ PROCESS (Parallax) ═══════════ -->
<section class="sm-process-section js-parallax">
  <div class="sm-process-bg js-parallax-bg">
    <img src="<?php echo esc_url($img); ?>strategy-meeting.jpg" alt="Social media strategy session" loading="lazy">
  </div>
  <div class="sm-process-overlay"></div>
  <div class="wrap sm-process-content">
    <div class="sm-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">How We Work</div>
      <h2 class="sm-section-h2 reveal reveal-delay-1">Strategy. Create. Publish. <em>Grow.</em></h2>
      <p class="sm-section-sub reveal reveal-delay-2">A four-phase content process that builds momentum and compounds results month after month.</p>
    </div>
    <div class="sm-process-steps">
      <div class="sm-process-step">
        <div class="sm-step-num">01</div>
        <h3 class="sm-step-h3">Strategy</h3>
        <p class="sm-step-p">Deep-dive into your brand, audience, and competitors. We build a content strategy with clear goals, platform priorities, and a 90-day publishing roadmap.</p>
      </div>
      <div class="sm-process-step">
        <div class="sm-step-num">02</div>
        <h3 class="sm-step-h3">Create</h3>
        <p class="sm-step-p">Our creative team produces platform-native content — graphics, video, copy, and stories — all reviewed and approved by you before anything goes live.</p>
      </div>
      <div class="sm-process-step">
        <div class="sm-step-num">03</div>
        <h3 class="sm-step-h3">Publish</h3>
        <p class="sm-step-p">Consistent, optimally-timed publishing across all platforms. We manage every channel so your brand shows up every day — even when you're on a job site.</p>
      </div>
      <div class="sm-process-step">
        <div class="sm-step-num">04</div>
        <h3 class="sm-step-h3">Grow</h3>
        <p class="sm-step-p">Monthly analytics review, A/B testing, and strategy refinement. We double down on what's working and cut what isn't — your content gets smarter every month.</p>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════ MARQUEE ═══════════ -->
<div class="sd-marquee-band sm-marquee-gold" aria-hidden="true">
  <div class="sd-marquee-track">
    <span class="sd-marquee-item">Social Media Management<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Content Creation<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Instagram &amp; Facebook<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Video Production<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Paid Social Ads<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Community Management<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Brand Storytelling<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Social Media Management<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Content Creation<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Instagram &amp; Facebook<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Video Production<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Paid Social Ads<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Community Management<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Brand Storytelling<span class="sd-marquee-dot"></span></span>
  </div>
</div>


<!-- ═══════════ RESULTS / TESTIMONIAL ═══════════ -->
<section class="sm-results-section">
  <div class="sm-results-img">
    <img src="<?php echo esc_url($img); ?>dallas-golden.jpg" alt="Dallas at golden hour" loading="lazy">
    <div class="sm-results-img-overlay"></div>
  </div>
  <div class="sm-results-content">
    <?php dwp_eyebrow( 'Client Results' ); ?>
    <h2 class="sm-intro-h2 reveal reveal-delay-1">Real brands.<br><em>Real growth.</em></h2>
    <div class="sm-quote-stars reveal reveal-delay-2">
      <?php for ( $s = 0; $s < 5; $s++ ) : ?><div class="sm-star"></div><?php endfor; ?>
    </div>
    <p class="sm-quote-text reveal reveal-delay-3"><?php echo esc_html( $testi_quote ); ?></p>
    <div class="sm-quote-attr reveal reveal-delay-4">
      <span class="sm-quote-name"><?php echo esc_html( $testi_name ); ?></span>
      <?php if ( $testi_url ) : ?>
        <a href="<?php echo esc_url( $testi_url ); ?>" class="sm-quote-link" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $testi_company ); ?> &rarr;</a>
      <?php else : ?>
        <span class="sm-quote-co"><?php echo esc_html( $testi_company ); ?></span>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ═══════════ APPROACH ═══════════ -->
<section class="sm-approach-section">
  <div class="wrap">
    <div class="sm-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">Our Approach</div>
      <h2 class="sm-section-h2 sm-section-h2-dark reveal reveal-delay-1">Insight. Creativity. <em>Technology.</em></h2>
      <p class="sm-section-sub sm-section-sub-dark reveal reveal-delay-2">Content built on strategy, brought to life with creativity, and optimized with data.</p>
    </div>
    <div class="sm-approach-grid">
      <div class="sm-approach-card reveal">
        <div class="sm-approach-num">01</div>
        <div class="sm-approach-divider"></div>
        <h3 class="sm-approach-h3">Insight</h3>
        <p class="sm-approach-p">We study your audience's behavior, your competitors' content, and the platform algorithms before creating a single post. Every decision is data-backed.</p>
      </div>
      <div class="sm-approach-card reveal reveal-delay-1">
        <div class="sm-approach-num">02</div>
        <div class="sm-approach-divider"></div>
        <h3 class="sm-approach-h3">Creativity</h3>
        <p class="sm-approach-p">Great content stops the scroll. Our creative team produces visuals and copy that feel native to each platform — not recycled, not generic, not templated.</p>
      </div>
      <div class="sm-approach-card reveal reveal-delay-2">
        <div class="sm-approach-num">03</div>
        <div class="sm-approach-divider"></div>
        <h3 class="sm-approach-h3">Technology</h3>
        <p class="sm-approach-p">We use AI-assisted scheduling, advanced analytics platforms, and A/B testing frameworks to continuously optimize your content performance and maximize ROI.</p>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════ OTHER SERVICES ═══════════ -->
<section class="sd-other-services">
  <div class="wrap">
    <span class="eyebrow">Also Available</span>
    <h2 class="sec-heading" style="margin-bottom:40px;">Explore our <em>other services.</em></h2>
    <div class="sd-other-grid">
      <?php
      $all_services = [
        [ 'title' => 'Web Development',            'url' => '/web-development' ],
        [ 'title' => 'Search Engine Optimization', 'url' => '/seo' ],
        [ 'title' => 'Social Media &amp; Content', 'url' => '/social-media' ],
        [ 'title' => 'Branding &amp; Identity',    'url' => '/branding' ],
        [ 'title' => 'Analytics &amp; Reporting',  'url' => '/analytics' ],
        [ 'title' => 'Strategy &amp; Consultation','url' => '/consultation' ],
      ];
      $current_slug = '/' . trim( parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );
      foreach ( $all_services as $svc ) :
        if ( rtrim( $svc['url'], '/' ) === rtrim( $current_slug, '/' ) ) continue;
      ?>
      <a href="<?php echo esc_url( home_url( $svc['url'] ) ); ?>" class="sd-other-item">
        <?php echo wp_kses_post( $svc['title'] ); ?>
        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" aria-hidden="true"><path d="M2 6.5h9M7 2l4.5 4.5L7 11" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ═══════════ CONTACT CTA ═══════════ -->
<?php get_template_part( 'template-parts/home/contact' ); ?>


<!-- SOCIAL FEED + SCROLL REVEAL SCRIPTS -->
<script>
(function() {
  var cards = [
    document.getElementById('sm-card-0'),
    document.getElementById('sm-card-1'),
    document.getElementById('sm-card-2')
  ];
  var dots = [
    document.getElementById('sm-dot-0'),
    document.getElementById('sm-dot-1'),
    document.getElementById('sm-dot-2')
  ];
  var current = 0, prev = -1, prev2 = -1;

  function showCard(idx) {
    cards.forEach(function(c) { c.classList.remove('sm-card-active','sm-card-prev','sm-card-prev2'); });
    dots.forEach(function(d) { d.classList.remove('active'); });
    if (prev2 >= 0) cards[prev2].classList.add('sm-card-prev2');
    if (prev  >= 0) cards[prev].classList.add('sm-card-prev');
    cards[idx].classList.add('sm-card-active');
    dots[idx].classList.add('active');

    var statNums = cards[idx].querySelectorAll('.sm-card-stat-num');
    statNums.forEach(function(el) {
      var target = parseInt(el.dataset.count, 10);
      var t0 = performance.now();
      (function tick(now) {
        var p = Math.min((now - t0) / 1200, 1);
        var e = 1 - Math.pow(1 - p, 3);
        el.textContent = Math.round(e * target).toLocaleString();
        if (p < 1) requestAnimationFrame(tick);
      })(performance.now());
    });
  }

  showCard(0);
  setInterval(function() {
    prev2 = prev; prev = current;
    current = (current + 1) % cards.length;
    showCard(current);
  }, 4000);
})();

(function() {
  // Counter animation
  function animateCounter(el) {
    var target = parseInt(el.dataset.target, 10), t0 = performance.now();
    (function tick(now) {
      var p = Math.min((now - t0) / 1800, 1), e = 1 - Math.pow(1-p,3);
      el.textContent = Math.round(e * target);
      if (p < 1) requestAnimationFrame(tick);
    })(performance.now());
  }
  var cObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(en) {
      if (en.isIntersecting) { en.target.querySelectorAll('.sm-counter').forEach(animateCounter); cObs.unobserve(en.target); }
    });
  }, { threshold: 0.3 });
  document.querySelectorAll('.sm-intro-stats').forEach(function(el) { cObs.observe(el); });

  // Process steps
  var pObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(en) {
      if (en.isIntersecting) { document.querySelectorAll('.sm-process-step').forEach(function(s){s.classList.add('sm-step-visible');}); pObs.disconnect(); }
    });
  }, { threshold: 0.2 });
  var ps = document.querySelector('.sm-process-steps');
  if (ps) pObs.observe(ps);
})();
</script>

<?php get_footer(); ?>
