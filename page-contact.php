<?php
/**
 * page-contact.php — Contact Page Template
 *
 * Sections: Hero (two-col with form) → Marquee → Why Us → Info Strip
 *           → Process Steps → FAQ Accordion → CTA Band
 *
 * Template Name: Contact
 * @package dallaswebpro-2
 */

get_header();
$img = get_template_directory_uri() . '/assets/images/';
?>

<?php /* ─── HERO ──────────────────────────────────────────── */ ?>
<section class="ctc-hero" aria-label="Contact hero">
  <div class="ctc-hero-bg" id="ctcHeroBg" aria-hidden="true"></div>
  <div class="ctc-hero-overlay" aria-hidden="true"></div>
  <div class="ctc-hero-accent"   aria-hidden="true"></div>
  <div class="ctc-hero-accent-2" aria-hidden="true"></div>
  <div class="ctc-particles" id="ctcParticles" aria-hidden="true"></div>

  <div class="wrap ctc-hero-content">

    <?php /* Left: headline + trust */ ?>
    <div class="ctc-hero-left reveal">
      <div class="ctc-eyebrow">Let's Build Something</div>
      <h1 class="ctc-hero-title">
        Tell us about<br>
        your <em>business.</em>
      </h1>
      <p class="ctc-hero-sub">
        No pitch. No pressure. Just a real conversation about where your business is, where you want it to go, and whether we're the right team to get you there.
      </p>
      <div class="ctc-trust-badges">
        <div class="ctc-trust-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="2" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
          <span>Free Discovery Call</span>
        </div>
        <div class="ctc-trust-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          <span>Reply Within 24 Hours</span>
        </div>
        <div class="ctc-trust-badge">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="2" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span>No Long-Term Contracts</span>
        </div>
      </div>
    </div>

    <?php /* Right: contact form card */ ?>
    <div class="ctc-form-card reveal ctc-reveal-d2">
      <h2 class="ctc-card-title">Book a Discovery Call</h2>
      <p class="ctc-card-sub">Tell us about your project and we'll reach out within one business day.</p>





      <!--form class="ctc-form-grid" id="ctcContactForm" novalidate>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-name">Your Name</label>
          <input class="ctc-form-input" id="ctc-name" name="your-name" type="text" placeholder="John Smith" required>
        </div>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-biz">Business Name</label>
          <input class="ctc-form-input" id="ctc-biz" name="business-name" type="text" placeholder="Smith Plumbing LLC">
        </div>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-email">Email Address</label>
          <input class="ctc-form-input" id="ctc-email" name="your-email" type="email" placeholder="john@yourbusiness.com" required>
        </div>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-phone">Phone Number</label>
          <input class="ctc-form-input" id="ctc-phone" name="your-phone" type="tel" placeholder="(214) 555-0100">
        </div>
        <div class="ctc-form-field ctc-form-full">
          <label class="ctc-form-label" for="ctc-service">I'm Interested In</label>
          <select class="ctc-form-select" id="ctc-service" name="service">
            <option value="">Select a service...</option>
            <option>Custom Website Development</option>
            <option>Search Engine Optimization</option>
            <option>Branding &amp; Identity</option>
            <option>Social Media &amp; Content</option>
            <option>Analytics &amp; Reporting</option>
            <option>Strategy &amp; Consultation</option>
            <option>Full Digital Package</option>
            <option>Not sure yet — let's talk</option>
          </select>
        </div>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-day">Preferred Day</label>
          <select class="ctc-form-select" id="ctc-day" name="preferred-day">
            <option>Any day works</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
          </select>
        </div>
        <div class="ctc-form-field">
          <label class="ctc-form-label" for="ctc-time">Preferred Time</label>
          <select class="ctc-form-select" id="ctc-time" name="preferred-time">
            <option>Any time works</option>
            <option>Morning (9am – 12pm)</option>
            <option>Afternoon (12pm – 5pm)</option>
            <option>Evening (5pm – 7pm)</option>
          </select>
        </div>
        <div class="ctc-form-field ctc-form-full">
          <label class="ctc-form-label" for="ctc-msg">Tell Us About Your Project</label>
          <textarea class="ctc-form-textarea" id="ctc-msg" name="your-message" placeholder="What's your business, what's not working online, and what does success look like for you?"></textarea>
        </div>
        <button class="ctc-form-submit" type="submit" id="ctcSubmitBtn">
          Book My Discovery Call
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </button>
        <p class="ctc-form-note">No pitch. No pressure. Just a real conversation about your business.</p>
      </form-->


<div class="ctc-forminator-wrap">
  <?php echo do_shortcode('[forminator_form id="1735"]'); ?>
</div>



      <div id="ctcFormSuccess" class="ctc-success" style="display:none;" aria-live="polite">
        <div class="ctc-success-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 class="ctc-success-title">We got your message!</h3>
        <p class="ctc-success-text">We'll reach out within one business day to schedule your discovery call. Talk soon.</p>
      </div>
    </div>

  </div>
</section>

<?php /* ─── MARQUEE ───────────────────────────────────────── */ ?>
<div class="ctc-marquee-band" aria-hidden="true">
  <div class="ctc-marquee-track">
    <?php
    $items = [ 'Free Discovery Call', 'No Long-Term Contracts', 'Custom Web Development',
               'Honest Marketing', 'Dallas, Texas', 'Results-Driven', 'Trade Specialists' ];
    // doubled for seamless loop
    for ( $i = 0; $i < 2; $i++ ) :
      foreach ( $items as $item ) :
    ?>
    <span class="ctc-marquee-item"><?php echo esc_html( $item ); ?><span class="ctc-marquee-dot" aria-hidden="true"></span></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<?php /* ─── WHY WORK WITH US ───────────────────────────────── */ ?>
<section class="ctc-why-section">
  <div class="wrap">
    <div class="reveal">
      <div class="ctc-section-eyebrow">Why Dallas Web Pro</div>
      <h2 class="ctc-why-heading">What you get when you <em>work with us.</em></h2>
      <p class="ctc-why-sub">We're not a vendor. We're a partner. Here's what that actually means for your business.</p>
    </div>
    <div class="ctc-why-grid">

      <div class="ctc-why-card reveal ctc-reveal-d1">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        </div>
        <h3 class="ctc-why-card-title">Custom-Built, Every Time</h3>
        <p class="ctc-why-card-text">No templates. No page builders. Every website we build is hand-coded from scratch — designed specifically for your business, your market, and your customers.</p>
      </div>

      <div class="ctc-why-card reveal ctc-reveal-d2">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h3 class="ctc-why-card-title">We Know Your Industry</h3>
        <p class="ctc-why-card-text">From personal injury attorneys to plumbers and HVAC companies — we've built for the markets that demand the most from their digital presence. We speak your language.</p>
      </div>

      <div class="ctc-why-card reveal ctc-reveal-d3">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3 class="ctc-why-card-title">Results Are the Only Metric</h3>
        <p class="ctc-why-card-text">We don't report on vanity metrics. We track phone calls, form fills, and revenue. If it's not making your phone ring, we're not done yet.</p>
      </div>

      <div class="ctc-why-card reveal ctc-reveal-d1">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="ctc-why-card-title">No Long-Term Lock-Ins</h3>
        <p class="ctc-why-card-text">We earn your business every month. No 12-month contracts that trap you into a relationship that isn't working. If we're not delivering, you're free to walk.</p>
      </div>

      <div class="ctc-why-card reveal ctc-reveal-d2">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3 class="ctc-why-card-title">Radical Transparency</h3>
        <p class="ctc-why-card-text">You'll always know exactly what we're doing, why we're doing it, and what it's costing you. No mystery invoices, no hidden fees, no agency smoke and mirrors.</p>
      </div>

      <div class="ctc-why-card reveal ctc-reveal-d3">
        <div class="ctc-why-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        <h3 class="ctc-why-card-title">20+ Years, Zero Shortcuts</h3>
        <p class="ctc-why-card-text">Over two decades of enterprise-level development, agency work, and real-world business ownership. We've seen every trend come and go — we only do what actually works.</p>
      </div>

    </div>
  </div>
</section>

<?php /* ─── CONTACT INFO STRIP ─────────────────────────────── */ ?>
<section class="ctc-info-strip">
  <div class="wrap">
    <div class="ctc-info-inner">

      <div class="ctc-info-img-wrap reveal">
        <img src="<?php echo esc_url( $img . 'dallas-skyline.jpg' ); ?>" alt="Dallas, Texas skyline" loading="lazy">
        <div class="ctc-info-img-overlay" aria-hidden="true"></div>
        <span class="ctc-info-img-badge">Based in Dallas, TX</span>
      </div>

      <div class="ctc-info-content reveal ctc-reveal-d2">
        <div class="ctc-section-eyebrow" style="color:var(--ctc-gold);">Get in Touch</div>
        <h2 class="ctc-info-heading">Reach us <em>directly.</em></h2>
        <p class="ctc-info-sub">Prefer to skip the form? Reach out directly. We respond to every message within one business day — usually much faster.</p>

        <div class="ctc-contact-items">
          <div class="ctc-contact-item">
            <div class="ctc-contact-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <div>
              <p class="ctc-contact-label">Email Us</p>
              <p class="ctc-contact-value"><a href="mailto:contact@dallaswebpro.com">contact@dallaswebpro.com</a></p>
              <p class="ctc-contact-note">We reply within one business day</p>
            </div>
          </div>
          <div class="ctc-contact-item">
            <div class="ctc-contact-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div>
              <p class="ctc-contact-label">Our Location</p>
              <p class="ctc-contact-value">Dallas–Fort Worth, Texas</p>
              <p class="ctc-contact-note">Serving clients nationwide &amp; worldwide</p>
            </div>
          </div>
          <div class="ctc-contact-item">
            <div class="ctc-contact-icon" aria-hidden="true">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#c8922a" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <p class="ctc-contact-label">Business Hours</p>
              <p class="ctc-contact-value">Monday – Friday, 9am – 6pm CST</p>
              <p class="ctc-contact-note">Emergency support available for active clients</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php /* ─── HOW IT WORKS ──────────────────────────────────── */ ?>
<section class="ctc-process-section">
  <div class="wrap">
    <div class="ctc-process-head reveal">
      <div class="ctc-section-eyebrow" style="justify-content:center;">What Happens Next</div>
      <h2 class="ctc-process-heading">From first contact to <em>launch day.</em></h2>
      <p class="ctc-process-sub">Here's exactly what to expect after you reach out.</p>
    </div>
    <div class="ctc-process-steps">
      <div class="ctc-process-step reveal ctc-reveal-d1">
        <div class="ctc-step-num">01</div>
        <h3 class="ctc-step-title">Discovery Call</h3>
        <p class="ctc-step-text">We schedule a free 30-minute call to understand your business, your goals, and what's not working right now.</p>
      </div>
      <div class="ctc-process-step reveal ctc-reveal-d2">
        <div class="ctc-step-num">02</div>
        <h3 class="ctc-step-title">Custom Proposal</h3>
        <p class="ctc-step-text">We put together a tailored strategy and transparent proposal — no cookie-cutter packages, no hidden fees.</p>
      </div>
      <div class="ctc-process-step reveal ctc-reveal-d3">
        <div class="ctc-step-num">03</div>
        <h3 class="ctc-step-title">Build &amp; Review</h3>
        <p class="ctc-step-text">We design and build your project with regular check-ins. You're involved at every stage, not just the end.</p>
      </div>
      <div class="ctc-process-step reveal ctc-reveal-d4">
        <div class="ctc-step-num">04</div>
        <h3 class="ctc-step-title">Launch &amp; Grow</h3>
        <p class="ctc-step-text">We launch, monitor, and optimize. This isn't a hand-off — it's the beginning of a long-term partnership.</p>
      </div>
    </div>
  </div>
</section>

<?php /* ─── FAQ ────────────────────────────────────────────── */ ?>
<section class="ctc-faq-section">
  <div class="wrap">
    <div class="ctc-faq-inner">

      <div class="reveal">
        <div class="ctc-section-eyebrow">Common Questions</div>
        <h2 class="ctc-faq-heading">Got <em>questions?</em></h2>
        <p class="ctc-faq-sub">Here are the ones we get asked most often. If yours isn't here, just reach out — we'll give you a straight answer.</p>
        <a href="#ctcContactForm" class="ctc-faq-cta">
          Ask Us Directly
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>

      <div class="ctc-faq-list reveal ctc-reveal-d2">
        <?php
        $faqs = [
          [ 'q' => 'How much does a custom website cost?',
            'a' => 'Every project is different, which is why we don\'t publish flat-rate pricing. A simple brochure site is a very different investment from a full e-commerce platform or a multi-location service business site. We\'ll give you a transparent, itemized proposal after our discovery call — no surprises.' ],
          [ 'q' => 'How long does it take to build a website?',
            'a' => 'Most custom websites take 4–8 weeks from kickoff to launch, depending on scope and how quickly we receive content from you. We\'ll give you a realistic timeline in your proposal and stick to it.' ],
          [ 'q' => 'Do you work with businesses outside of Dallas?',
            'a' => 'Absolutely. We\'re based in Dallas–Fort Worth but work with clients across the country and internationally. Everything we do is remote-friendly — discovery calls, reviews, and approvals all happen online.' ],
          [ 'q' => 'Do you offer ongoing maintenance and SEO?',
            'a' => 'Yes — and we encourage it. A website without ongoing SEO and maintenance is like a truck without oil changes. We offer monthly retainer packages that cover everything from security updates to content and search optimization.' ],
          [ 'q' => 'What makes you different from other agencies?',
            'a' => 'Honestly? We\'ve been on your side of the table. Our founder is a former journeyman plumber who also owns a plumbing company today. We don\'t just understand digital marketing — we understand what it\'s like to run a trade business, manage crews, and need the phone to ring. That perspective changes everything.' ],
        ];
        foreach ( $faqs as $i => $faq ) :
        ?>
        <div class="ctc-faq-item" id="ctc-faq-<?php echo $i; ?>">
          <button class="ctc-faq-btn" aria-expanded="false" aria-controls="ctc-faq-answer-<?php echo $i; ?>">
            <span class="ctc-faq-question"><?php echo esc_html( $faq['q'] ); ?></span>
            <span class="ctc-faq-icon" aria-hidden="true">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            </span>
          </button>
          <div class="ctc-faq-answer" id="ctc-faq-answer-<?php echo $i; ?>">
            <p><?php echo esc_html( $faq['a'] ); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<?php /* ─── CTA BAND ────────────────────────────────────────── */ ?>
<div class="cta-band">
  <div class="cta-watermark" aria-hidden="true">Dallas</div>
  <div class="cta-band-inner">
    <h2 class="cta-h2">
      Ready to grow your business?
      <em>Let's talk.</em>
    </h2>
    <a href="#ctcContactForm" class="btn-cta-gold">Book a Discovery Call</a>
  </div>
</div>

<?php /* ─── PAGE STYLES ──────────────────────────────────────── */ ?>
<style>
:root {
  --ctc-navy:      #111820;
  --ctc-navy-mid:  #1e2c3d;
  --ctc-navy-card: #1c2a3a;
  --ctc-cream:     #f5f0e8;
  --ctc-gold:      #c8922a;
  --ctc-gold-lt:   #e0a83a;
  --ctc-border:    rgba(200,146,42,0.18);
}

/* ── Reveal animations ──────────────────────────────── */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.7s ease, transform 0.7s ease; }
.reveal.visible { opacity: 1; transform: none; }
.ctc-reveal-d2 { transition-delay: 0.15s; }
.ctc-reveal-d3 { transition-delay: 0.25s; }
.ctc-reveal-d4 { transition-delay: 0.35s; }

/* ── Hero ────────────────────────────────────────────── */
.ctc-hero {
  position: relative;
  min-height: 100vh;
  display: flex;
  align-items: center;
  overflow: hidden;
  padding-top: 80px;
}
.ctc-hero-bg {
  position: absolute; inset: 0;
  background: url('<?php echo esc_url( $img . 'hero-bg.jpg' ); ?>') center 40% / cover no-repeat;
  transform: scale(1.06);
  transition: transform 8s ease-out;
}
.ctc-hero-bg.loaded { transform: scale(1); }
.ctc-hero-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(125deg, rgba(17,24,32,0.97) 0%, rgba(17,24,32,0.88) 50%, rgba(26,35,50,0.75) 100%);
}
.ctc-hero-accent {
  position: absolute; top: 0; right: 15%; width: 1px; height: 100%;
  background: linear-gradient(to bottom, transparent, rgba(200,146,42,0.2), transparent);
  pointer-events: none;
}
.ctc-hero-accent-2 {
  position: absolute; top: 0; right: 30%; width: 1px; height: 100%;
  background: linear-gradient(to bottom, transparent, rgba(200,146,42,0.08), transparent);
  pointer-events: none;
}

/* Particles */
.ctc-particles { position: absolute; inset: 0; overflow: hidden; pointer-events: none; }
.ctc-particle {
  position: absolute; border-radius: 50%; opacity: 0;
  animation: ctcFloat var(--dur, 8s) var(--delay, 0s) ease-in-out infinite;
}
@keyframes ctcFloat {
  0%   { opacity: 0; transform: translateY(100px) scale(0); }
  20%  { opacity: 0.6; }
  80%  { opacity: 0.4; }
  100% { opacity: 0; transform: translateY(-200px) scale(1.5); }
}

.ctc-hero-content {
  position: relative; z-index: 2;
  padding: 80px 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px;
  align-items: center;
}

.ctc-eyebrow {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 0.7rem; font-weight: 700;
  letter-spacing: 0.2em; text-transform: uppercase;
  color: var(--ctc-gold); margin-bottom: 28px;
}
.ctc-eyebrow::before {
  content: ''; display: block;
  width: 32px; height: 1px; background: var(--ctc-gold);
}

.ctc-hero-title {
  font-family: 'Fraunces', serif;
  font-size: clamp(2.8rem, 5.5vw, 5.2rem);
  font-weight: 400; line-height: 1.06;
  letter-spacing: -0.02em; color: #fff;
  margin-bottom: 24px;
}
.ctc-hero-title em { font-style: italic; color: var(--ctc-gold); }

.ctc-hero-sub {
  font-size: 1rem; font-weight: 300; line-height: 1.75;
  color: rgba(255,255,255,0.75); max-width: 440px;
  margin-bottom: 44px;
}

.ctc-trust-badges { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }
.ctc-trust-badge {
  display: flex; align-items: center; gap: 10px;
  padding: 10px 18px;
  background: rgba(200,146,42,0.08);
  border: 1px solid var(--ctc-border);
  border-radius: 100px;
  font-size: 0.7rem; font-weight: 600;
  letter-spacing: 0.1em; text-transform: uppercase;
  color: #f5e6c8;
}

/* ── Form card ───────────────────────────────────────── */
.ctc-form-card {
  background: rgba(28,42,58,0.75);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border: 1px solid var(--ctc-border);
  border-radius: 20px;
  padding: 48px 44px;
  position: relative;
  overflow: hidden;
}
.ctc-form-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--ctc-gold), var(--ctc-gold-lt), var(--ctc-gold));
  background-size: 200% 100%;
  animation: ctcShimmer 3s linear infinite;
}
@keyframes ctcShimmer {
  0%   { background-position: -200% 0; }
  100% { background-position:  200% 0; }
}

.ctc-card-title {
  font-family: 'Fraunces', serif;
  font-size: 1.5rem; font-weight: 400;
  color: #fff; margin-bottom: 6px;
}
.ctc-card-sub {
  font-size: 0.82rem; font-weight: 300;
  color: rgba(255,255,255,0.42); margin-bottom: 32px;
}

/* ── Form fields ─────────────────────────────────────── */
.ctc-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.ctc-form-full { grid-column: 1 / -1; }
.ctc-form-field { display: flex; flex-direction: column; gap: 7px; }
.ctc-form-label {
  font-size: 0.62rem; font-weight: 700;
  letter-spacing: 0.18em; text-transform: uppercase;
  color: rgba(255,255,255,0.42);
}
.ctc-form-input, .ctc-form-select, .ctc-form-textarea {
  padding: 13px 16px;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(200,146,42,0.2);
  border-radius: 6px;
  font-family: 'Outfit', sans-serif;
  font-size: 0.88rem; font-weight: 300;
  color: #fff; outline: none; width: 100%;
  transition: border-color 0.3s, background 0.3s, box-shadow 0.3s;
}
.ctc-form-input::placeholder, .ctc-form-textarea::placeholder { color: rgba(255,255,255,0.25); }
.ctc-form-input:focus, .ctc-form-select:focus, .ctc-form-textarea:focus {
  border-color: var(--ctc-gold);
  background: rgba(200,146,42,0.04);
  box-shadow: 0 0 0 3px rgba(200,146,42,0.1);
}
.ctc-form-select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23c8922a' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  background-color: rgba(255,255,255,0.05);
  padding-right: 36px; cursor: pointer;
}
.ctc-form-select option { background: #1c2a3a; color: #fff; }
.ctc-form-textarea { resize: vertical; min-height: 110px; line-height: 1.6; }

.ctc-form-submit {
  grid-column: 1 / -1;
  padding: 16px 32px;
  background: var(--ctc-gold);
  color: var(--ctc-navy);
  font-family: 'Outfit', sans-serif;
  font-size: 0.75rem; font-weight: 700;
  letter-spacing: 0.14em; text-transform: uppercase;
  border: none; border-radius: 4px; cursor: pointer;
  display: flex; align-items: center; justify-content: center; gap: 10px;
  transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
  position: relative; overflow: hidden;
}
.ctc-form-submit::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
  transform: translateX(-100%);
  transition: transform 0.5s ease;
}
.ctc-form-submit:hover::after { transform: translateX(100%); }
.ctc-form-submit:hover {
  background: var(--ctc-gold-lt);
  transform: translateY(-2px);
  box-shadow: 0 12px 32px rgba(200,146,42,0.35);
}
.ctc-form-submit svg { transition: transform 0.3s; }
.ctc-form-submit:hover svg { transform: translateX(4px); }

.ctc-form-note {
  grid-column: 1 / -1;
  font-size: 0.7rem; color: rgba(255,255,255,0.35);
  text-align: center; margin-top: -4px;
}
                         
/** Jerry updating for Forminator **/
.ctc-forminator-wrap .forminator-custom-form { background: none; }
.ctc-forminator-wrap .forminator-input,
.ctc-forminator-wrap .forminator-select,
.ctc-forminator-wrap textarea {
  background: rgba(255,255,255,0.05) !important;
  border: 1px solid rgba(200,146,42,0.2) !important;
  color: #fff !important;
  border-radius: 6px !important;
  font-family: 'Outfit', sans-serif !important;
}
.ctc-forminator-wrap .forminator-input:focus,
.ctc-forminator-wrap .forminator-select:focus,
.ctc-forminator-wrap textarea:focus {
  border-color: #c8922a !important;
  box-shadow: 0 0 0 3px rgba(200,146,42,0.1) !important;
}
.ctc-forminator-wrap .forminator-btn-submit {
  background: #c8922a !important;
  color: #111820 !important;
  font-weight: 700 !important;
  letter-spacing: 0.14em !important;
  border-radius: 4px !important;
  width: 100% !important;
}
.ctc-forminator-wrap .forminator-btn-submit:hover {
  background: #e0a83a !important;
}
.ctc-forminator-wrap label { color: rgba(255,255,255,0.42) !important; }
.forminator-custom-form input::placeholder,
.forminator-custom-form textarea::placeholder,
.forminator-custom-form select::placeholder {
    color: #fff!important;
    opacity: .5;
}
.forminator-ui.forminator-custom-form input::placeholder {
    color: #fff!important;
    opacity: .5;
}
.forminator-ui#forminator-module-1735.forminator-design--default .forminator-select2 + .forminator-select .selection .select2-selection--single[role="combobox"] .select2-selection__rendered {
	color: #fff!important;
    opacity: .5;
 }
.forminator-select-dropdown-container--open .forminator-custom-form-1735.forminator-dropdown--default .select2-results .select2-results__options .select2-results__option.select2-results__option--selected, .forminator-select-dropdown-container--open .forminator-custom-form-1735.forminator-dropdown--default .select2-results .select2-results__options .select2-results__option.select2-results__option--selected span:not(.forminator-checkbox-box) {
    background-color: #097BAA;
    color: #FFFFFF;
}
.forminator-select2-results__option--highlighted {
    background-color: #1a2d40 !important;
    color: #fff !important;
}
                         
/** /Jerry **/

/* ── Success state ───────────────────────────────────── */
.ctc-success { text-align: center; padding: 32px 0; }
.ctc-success-icon {
  width: 64px; height: 64px;
  background: rgba(200,146,42,0.15); border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 20px;
}
.ctc-success-title {
  font-family: 'Fraunces', serif;
  font-size: 1.5rem; font-weight: 400;
  color: #fff; margin-bottom: 10px;
}
.ctc-success-text {
  font-size: 0.88rem; font-weight: 300;
  color: rgba(255,255,255,0.75); line-height: 1.7;
}

/* ── Marquee ─────────────────────────────────────────── */
.ctc-marquee-band {
  background: var(--ctc-gold);
  padding: 14px 0; overflow: hidden; white-space: nowrap;
}
.ctc-marquee-track {
  display: inline-flex;
  animation: ctcMarquee 30s linear infinite;
}
.ctc-marquee-track:hover { animation-play-state: paused; }
.ctc-marquee-item {
  display: inline-flex; align-items: center; gap: 20px; padding: 0 24px;
  font-size: 0.7rem; font-weight: 700;
  letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--ctc-navy);
}
.ctc-marquee-dot { width: 4px; height: 4px; background: var(--ctc-navy); border-radius: 50%; opacity: 0.5; }
@keyframes ctcMarquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* ── Section eyebrow ─────────────────────────────────── */
.ctc-section-eyebrow {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 0.68rem; font-weight: 700;
  letter-spacing: 0.2em; text-transform: uppercase;
  color: var(--ctc-gold); margin-bottom: 20px;
}
.ctc-section-eyebrow::before {
  content: ''; display: block;
  width: 28px; height: 1px; background: var(--ctc-gold);
}

/* ── Why section ─────────────────────────────────────── */
.ctc-why-section {
  padding: 100px 0;
  background: var(--ctc-cream);
}
.ctc-why-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 3.5vw, 3rem);
  font-weight: 400; line-height: 1.15;
  color: #1a2332; margin-bottom: 16px;
}
.ctc-why-heading em { font-style: italic; color: var(--ctc-gold); }
.ctc-why-sub {
  font-size: 0.95rem; font-weight: 300; line-height: 1.75;
  color: rgba(26,35,50,0.7); max-width: 480px;
  margin-bottom: 56px;
}
.ctc-why-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
}
.ctc-why-card {
  background: #fff;
  border-radius: 20px;
  padding: 36px 32px;
  border: 1px solid rgba(200,146,42,0.12);
  transition: transform 0.3s, box-shadow 0.3s;
  position: relative; overflow: hidden;
}
.ctc-why-card::after {
  content: '';
  position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
  background: linear-gradient(90deg, var(--ctc-gold), var(--ctc-gold-lt));
  transform: scaleX(0); transform-origin: left;
  transition: transform 0.4s;
}
.ctc-why-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(0,0,0,0.12); }
.ctc-why-card:hover::after { transform: scaleX(1); }
.ctc-why-icon {
  width: 52px; height: 52px;
  background: rgba(200,146,42,0.1); border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 20px;
}
.ctc-why-card-title {
  font-family: 'Fraunces', serif;
  font-size: 1.15rem; font-weight: 400;
  color: #1a2332; margin-bottom: 12px;
}
.ctc-why-card-text {
  font-size: 0.88rem; font-weight: 300; line-height: 1.7;
  color: rgba(26,35,50,0.65);
}

/* ── Info strip ──────────────────────────────────────── */
.ctc-info-strip {
  padding: 80px 0;
  background: var(--ctc-navy-mid);
  border-top: 1px solid var(--ctc-border);
  border-bottom: 1px solid var(--ctc-border);
}
.ctc-info-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 80px; align-items: center;
}
.ctc-info-img-wrap {
  position: relative;
  border-radius: 20px; overflow: hidden;
}
.ctc-info-img-wrap img {
  width: 100%; height: 380px;
  object-fit: cover;
  filter: brightness(0.85) saturate(0.9);
}
.ctc-info-img-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(17,24,32,0.6) 0%, transparent 60%);
}
.ctc-info-img-badge {
  position: absolute; bottom: 24px; left: 24px;
  background: var(--ctc-gold);
  color: var(--ctc-navy);
  padding: 10px 20px; border-radius: 4px;
  font-size: 0.72rem; font-weight: 700;
  letter-spacing: 0.12em; text-transform: uppercase;
}
.ctc-info-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(1.8rem, 3vw, 2.6rem);
  font-weight: 400; line-height: 1.2;
  color: #fff; margin-bottom: 12px;
}
.ctc-info-heading em { font-style: italic; color: var(--ctc-gold); }
.ctc-info-sub {
  font-size: 0.9rem; font-weight: 300; line-height: 1.75;
  color: rgba(255,255,255,0.75); margin-bottom: 40px;
}
.ctc-contact-items { display: flex; flex-direction: column; gap: 16px; }
.ctc-contact-item {
  display: flex; align-items: flex-start; gap: 18px;
  padding: 20px 24px;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.07);
  border-radius: 12px;
  transition: border-color 0.3s, background 0.3s;
}
.ctc-contact-item:hover {
  border-color: var(--ctc-border);
  background: rgba(200,146,42,0.05);
}
.ctc-contact-icon {
  width: 44px; height: 44px; flex-shrink: 0;
  background: rgba(200,146,42,0.12); border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
}
.ctc-contact-label {
  font-size: 0.62rem; font-weight: 700;
  letter-spacing: 0.18em; text-transform: uppercase;
  color: var(--ctc-gold); margin-bottom: 4px;
}
.ctc-contact-value {
  font-size: 0.95rem; font-weight: 400; color: #fff; line-height: 1.4;
}
.ctc-contact-value a { color: #fff; transition: color 0.2s; }
.ctc-contact-value a:hover { color: var(--ctc-gold); }
.ctc-contact-note {
  font-size: 0.75rem; font-weight: 300;
  color: rgba(255,255,255,0.42); margin-top: 2px;
}

/* ── Process ─────────────────────────────────────────── */
.ctc-process-section { padding: 100px 0; background: var(--ctc-navy); }
.ctc-process-head { text-align: center; margin-bottom: 64px; }
.ctc-process-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 3.5vw, 3rem);
  font-weight: 400; line-height: 1.15; color: #fff;
}
.ctc-process-heading em { font-style: italic; color: var(--ctc-gold); }
.ctc-process-sub {
  font-size: 0.95rem; font-weight: 300; line-height: 1.7;
  color: rgba(255,255,255,0.75); margin-top: 14px;
}
.ctc-process-steps {
  display: grid; grid-template-columns: repeat(4, 1fr);
  gap: 0; position: relative;
}
.ctc-process-steps::before {
  content: '';
  position: absolute;
  top: 36px; left: 12.5%; right: 12.5%;
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--ctc-border), var(--ctc-gold), var(--ctc-border), transparent);
}
.ctc-process-step {
  display: flex; flex-direction: column; align-items: center;
  text-align: center; padding: 0 24px;
}
.ctc-step-num {
  width: 72px; height: 72px;
  background: #1c2a3a; border: 1px solid var(--ctc-border);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-family: 'Fraunces', serif;
  font-size: 1.5rem; font-weight: 400; color: var(--ctc-gold);
  margin-bottom: 24px; position: relative; z-index: 1;
  transition: background 0.3s, border-color 0.3s, color 0.3s;
}
.ctc-process-step:hover .ctc-step-num {
  background: var(--ctc-gold); color: var(--ctc-navy); border-color: var(--ctc-gold);
}
.ctc-step-title {
  font-family: 'Fraunces', serif;
  font-size: 1.1rem; font-weight: 400; color: #fff; margin-bottom: 10px;
}
.ctc-step-text {
  font-size: 0.82rem; font-weight: 300; line-height: 1.65;
  color: rgba(255,255,255,0.42);
}

/* ── FAQ ─────────────────────────────────────────────── */
.ctc-faq-section { padding: 100px 0; background: var(--ctc-cream); }
.ctc-faq-inner {
  display: grid; grid-template-columns: 1fr 1.6fr;
  gap: 80px; align-items: start;
}
.ctc-faq-heading {
  font-family: 'Fraunces', serif;
  font-size: clamp(2rem, 3vw, 2.8rem);
  font-weight: 400; line-height: 1.15;
  color: #1a2332; margin-bottom: 16px;
}
.ctc-faq-heading em { font-style: italic; color: var(--ctc-gold); }
.ctc-faq-sub {
  font-size: 0.9rem; font-weight: 300; line-height: 1.75;
  color: rgba(26,35,50,0.65); margin-bottom: 36px;
}
.ctc-faq-cta {
  display: inline-flex; align-items: center; gap: 10px;
  padding: 14px 28px;
  background: var(--ctc-gold); color: #1a2332;
  font-size: 0.72rem; font-weight: 700;
  letter-spacing: 0.12em; text-transform: uppercase;
  border-radius: 4px;
  transition: background 0.3s, transform 0.3s;
}
.ctc-faq-cta:hover { background: var(--ctc-gold-lt); transform: translateY(-1px); }

.ctc-faq-list { display: flex; flex-direction: column; }
.ctc-faq-item { border-bottom: 1px solid rgba(200,146,42,0.15); overflow: hidden; }
.ctc-faq-item:first-child { border-top: 1px solid rgba(200,146,42,0.15); }
.ctc-faq-btn {
  width: 100%;
  display: flex; align-items: center; justify-content: space-between; gap: 16px;
  padding: 22px 0;
  background: none; border: none; cursor: pointer; text-align: left;
}
.ctc-faq-question {
  font-family: 'Fraunces', serif;
  font-size: 1.05rem; font-weight: 400; color: #1a2332;
  transition: color 0.3s;
}
.ctc-faq-btn:hover .ctc-faq-question { color: var(--ctc-gold); }
.ctc-faq-icon {
  width: 28px; height: 28px; flex-shrink: 0;
  background: rgba(200,146,42,0.1); border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  transition: background 0.3s, transform 0.3s;
}
.ctc-faq-item.open .ctc-faq-icon { background: var(--ctc-gold); transform: rotate(45deg); }
.ctc-faq-item.open .ctc-faq-icon svg { stroke: #1a2332; }
.ctc-faq-answer {
  max-height: 0; overflow: hidden;
  transition: max-height 0.4s, padding 0.4s;
}
.ctc-faq-item.open .ctc-faq-answer { max-height: 300px; padding-bottom: 20px; }
.ctc-faq-answer p {
  font-size: 0.88rem; font-weight: 300; line-height: 1.75;
  color: rgba(26,35,50,0.7);
}

/* ── Responsive ──────────────────────────────────────── */
@media (max-width: 1024px) {
  .ctc-hero-content { grid-template-columns: 1fr; gap: 48px; }
  .ctc-hero-sub { max-width: 100%; }
  .ctc-why-grid { grid-template-columns: repeat(2, 1fr); }
  .ctc-info-inner { grid-template-columns: 1fr; gap: 48px; }
  .ctc-process-steps { grid-template-columns: repeat(2, 1fr); gap: 48px; }
  .ctc-process-steps::before { display: none; }
  .ctc-faq-inner { grid-template-columns: 1fr; gap: 48px; }
}
@media (max-width: 768px) {
  .ctc-hero { min-height: auto; }
  .ctc-why-grid { grid-template-columns: 1fr; }
  .ctc-process-steps { grid-template-columns: 1fr; }
  .ctc-form-grid { grid-template-columns: 1fr; }
  .ctc-form-full { grid-column: 1; }
  .ctc-form-submit { grid-column: 1; }
  .ctc-form-note { grid-column: 1; }
  .ctc-form-card { padding: 32px 24px; }
}
</style>

<?php /* ─── PAGE JAVASCRIPT ─────────────────────────────────── */ ?>
<script>
(function() {
  // Hero bg load
  var bg = document.getElementById('ctcHeroBg');
  if (bg) setTimeout(function(){ bg.classList.add('loaded'); }, 100);

  // Parallax
  window.addEventListener('scroll', function() {
    if (bg) bg.style.transform = 'scale(1) translateY(' + (window.scrollY * 0.2) + 'px)';
  }, { passive: true });

  // Particles
  var container = document.getElementById('ctcParticles');
  if (container) {
    for (var i = 0; i < 20; i++) {
      var p = document.createElement('div');
      p.className = 'ctc-particle';
      p.style.cssText = 'left:' + (Math.random() * 100) + '%;bottom:' + (Math.random() * 30) + '%;'
        + '--dur:' + (6 + Math.random() * 8) + 's;--delay:' + (Math.random() * 8) + 's;'
        + 'width:' + (1 + Math.random() * 3) + 'px;height:' + (1 + Math.random() * 3) + 'px;'
        + 'background:#c8922a;';
      container.appendChild(p);
    }
  }

  // Scroll reveal
  var reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var obs = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    reveals.forEach(function(el) { obs.observe(el); });
  } else {
    reveals.forEach(function(el) { el.classList.add('visible'); });
  }

  // FAQ accordion
  document.querySelectorAll('.ctc-faq-btn').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var item = btn.closest('.ctc-faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.ctc-faq-item').forEach(function(i) { i.classList.remove('open'); });
      if (!isOpen) item.classList.add('open');
      btn.setAttribute('aria-expanded', !isOpen);
    });
  });

  // Form submit
  var form = document.getElementById('ctcContactForm');
  var success = document.getElementById('ctcFormSuccess');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      form.style.opacity = '0';
      form.style.transition = 'opacity 0.4s ease';
      setTimeout(function() {
        form.style.display = 'none';
        success.style.display = 'block';
        success.style.opacity = '0';
        success.style.transition = 'opacity 0.4s ease';
        setTimeout(function() { success.style.opacity = '1'; }, 50);
      }, 400);
    });
  }
})();
</script>

<?php get_footer(); ?>