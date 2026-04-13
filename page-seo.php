<?php
/**
 * Template Name: SEO Service Page
 *
 * Dedicated template for the SEO service page.
 * Features:
 *   – Split hero with animated D3 traffic chart + keyword ranking panel
 *   – About split section with seo-analyst image
 *   – 6-card SEO services grid (dark)
 *   – Parallax process section (dark-office bg)
 *   – Gold marquee band
 *   – Results / testimonial with dallas skyline
 *   – Approach cards
 *   – Other services pills
 *   – Contact CTA (shared template part)
 *
 * ACF fields (same as service-detail):
 *   sd_tagline, sd_testimonial_quote, sd_testimonial_name,
 *   sd_testimonial_company, sd_testimonial_url
 *
 * @package DallasWebPro
 */

get_header();

$tagline       = get_field( 'sd_tagline' )              ?: 'Rank higher, get found faster, and convert more visitors into customers — with data-driven SEO built for Dallas businesses.';
$testi_quote   = get_field( 'sd_testimonial_quote' )    ?: 'Dallas Web Pro took our plumbing company from invisible online to ranking #1 for our most important keywords in under six months. The phone hasn\'t stopped ringing.';
$testi_name    = get_field( 'sd_testimonial_name' )     ?: 'Augerpros Plumbing';
$testi_company = get_field( 'sd_testimonial_company' )  ?: 'augerpros.com';
$testi_url     = get_field( 'sd_testimonial_url' )      ?: 'https://augerpros.com';

$img = get_template_directory_uri() . '/assets/images/';
?>

<!-- ═══════════ SEO HERO ═══════════ -->
<section class="seo-hero">
  <div class="seo-hero-grid-bg" aria-hidden="true"></div>
  <div class="seo-hero-glow" aria-hidden="true"></div>

  <div class="wrap seo-hero-inner">

    <!-- LEFT -->
    <div class="seo-hero-left">
      <nav class="page-breadcrumb-nav" aria-label="Breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
        <span class="page-breadcrumb-sep">/</span>
        <a href="<?php echo esc_url( home_url( '/services' ) ); ?>">Services</a>
        <span class="page-breadcrumb-sep">/</span>
        <span><?php the_title(); ?></span>
      </nav>

      <h1 class="seo-hero-h1">Search<br>Engine<br><em>Dominance.</em></h1>

      <p class="seo-hero-sub"><?php echo esc_html( $tagline ); ?></p>

      <div class="seo-hero-btns">
        <a href="#seo-contact" class="seo-btn-primary">Get a Free SEO Audit &rarr;</a>
        <a href="#seo-services" class="seo-btn-ghost">Our Services &darr;</a>
      </div>
    </div>

    <!-- RIGHT: D3 chart -->
    <div class="seo-hero-right" aria-hidden="true">
      <div class="seo-chart-label">
        <span class="seo-chart-label-dot"></span>
        <span class="seo-chart-label-name" id="seo-chart-label-name">organic_traffic.js</span>
      </div>
      <div id="seo-chart-container">
        <div class="seo-chart-phase-label" id="seo-chart-phase-label">Organic Traffic Growth</div>
      </div>
      <div id="seo-kw-panel">
        <div class="seo-kw-title">// keyword rankings</div>
        <div class="seo-kw-row">
          <span class="seo-kw-name">plumber dallas tx</span>
          <div class="seo-kw-bar-track"><div class="seo-kw-bar-fill" id="seo-kw-bar-0"></div></div>
          <span class="seo-kw-rank" id="seo-kw-rank-0">#47</span>
        </div>
        <div class="seo-kw-row">
          <span class="seo-kw-name">emergency plumber near me</span>
          <div class="seo-kw-bar-track"><div class="seo-kw-bar-fill" id="seo-kw-bar-1"></div></div>
          <span class="seo-kw-rank" id="seo-kw-rank-1">#31</span>
        </div>
        <div class="seo-kw-row">
          <span class="seo-kw-name">dallas web design agency</span>
          <div class="seo-kw-bar-track"><div class="seo-kw-bar-fill" id="seo-kw-bar-2"></div></div>
          <span class="seo-kw-rank" id="seo-kw-rank-2">#18</span>
        </div>
        <div class="seo-kw-row">
          <span class="seo-kw-name">wordpress developer dallas</span>
          <div class="seo-kw-bar-track"><div class="seo-kw-bar-fill" id="seo-kw-bar-3"></div></div>
          <span class="seo-kw-rank" id="seo-kw-rank-3">#22</span>
        </div>
        <div class="seo-kw-row">
          <span class="seo-kw-name">seo services dallas tx</span>
          <div class="seo-kw-bar-track"><div class="seo-kw-bar-fill" id="seo-kw-bar-4"></div></div>
          <span class="seo-kw-rank" id="seo-kw-rank-4">#9</span>
        </div>
      </div>
    </div><!-- /.seo-hero-right -->

  </div><!-- /.seo-hero-inner -->

</section>


<!-- ═══════════ INTRO SPLIT ═══════════ -->
<section class="seo-intro-split">
  <div class="seo-intro-img">
    <img src="<?php echo esc_url( $img ); ?>seo-analyst.jpg" alt="SEO analyst working in Dallas" loading="lazy">
    <div class="seo-intro-img-overlay"></div>
  </div>
  <div class="seo-intro-content">
    <div class="section-eyebrow reveal">About This Service</div>
    <h2 class="seo-intro-h2 reveal reveal-delay-1">Data-driven SEO that delivers <em>real rankings.</em></h2>
    <p class="seo-intro-p reveal reveal-delay-2">At Dallas Web Pro, we don't chase vanity metrics — we build sustainable organic search strategies that put your business in front of the right people at the right moment. Every campaign starts with deep technical analysis, competitive research, and a clear roadmap tied to your revenue goals.</p>
    <p class="seo-intro-p reveal reveal-delay-3">Whether you're a local Dallas business looking to dominate the map pack, or a growing brand targeting statewide traffic, our SEO team has the expertise to move the needle.</p>
    <div class="seo-intro-stats reveal reveal-delay-4">
      <div class="seo-stat-item">
        <div class="seo-stat-num"><span class="counter" data-target="312">0</span><span>%</span></div>
        <div class="seo-stat-lbl">Avg. Traffic Increase</div>
      </div>
      <div class="seo-stat-item">
        <div class="seo-stat-num"><span class="counter" data-target="94">0</span><span>+</span></div>
        <div class="seo-stat-lbl">Keywords to Page 1</div>
      </div>
      <div class="seo-stat-item">
        <div class="seo-stat-num"><span class="counter" data-target="20">0</span><span>+</span></div>
        <div class="seo-stat-lbl">Years in Dallas</div>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════ SEO SERVICES GRID ═══════════ -->
<section class="seo-services-section" id="seo-services">
  <div class="wrap">
    <div class="seo-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">What We Do</div>
      <h2 class="seo-section-h2 reveal reveal-delay-1">Everything your rankings <em>need.</em></h2>
      <p class="seo-section-sub reveal reveal-delay-2">From technical foundations to content strategy — a complete SEO program built to compound over time.</p>
    </div>
    <div class="seo-cards-grid">

      <div class="seo-card reveal">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <h3 class="seo-card-h3">Technical SEO Audit</h3>
        <p class="seo-card-p">Deep crawl analysis covering site architecture, Core Web Vitals, indexation issues, structured data, and crawl budget — fixing the foundation before building on top of it.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="seo-card reveal reveal-delay-1">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        </div>
        <h3 class="seo-card-h3">Keyword Strategy</h3>
        <p class="seo-card-p">Intent-mapped keyword research that identifies high-value opportunities your competitors are missing — organized into a content roadmap with clear priority tiers.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="seo-card reveal reveal-delay-2">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        </div>
        <h3 class="seo-card-h3">Content Optimization</h3>
        <p class="seo-card-p">On-page optimization of existing content plus creation of new SEO-targeted pages — written for humans first, engineered for search engines second.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="seo-card reveal reveal-delay-1">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <h3 class="seo-card-h3">Local SEO &amp; Maps</h3>
        <p class="seo-card-p">Google Business Profile optimization, local citation building, and geo-targeted content strategies to dominate the Dallas map pack and local search results.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="seo-card reveal reveal-delay-2">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71"/></svg>
        </div>
        <h3 class="seo-card-h3">Link Building</h3>
        <p class="seo-card-p">White-hat authority building through digital PR, editorial outreach, and strategic partnerships — earning links that move rankings and build lasting domain authority.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

      <div class="seo-card reveal reveal-delay-3">
        <div class="seo-card-icon">
          <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
        </div>
        <h3 class="seo-card-h3">Reporting &amp; Analytics</h3>
        <p class="seo-card-p">Monthly reporting dashboards that tie SEO performance directly to business outcomes — traffic, leads, conversions, and revenue — not just rankings and impressions.</p>
        <span class="seo-card-arrow">Learn more &rarr;</span>
      </div>

    </div>
  </div>
</section>


<!-- ═══════════ PROCESS ═══════════ -->
<section class="seo-process-section js-parallax">
  <div class="seo-process-bg js-parallax-bg">
    <img src="<?php echo esc_url( $img ); ?>dark-office.jpg" alt="SEO strategy session" loading="lazy">
  </div>
  <div class="seo-process-overlay"></div>
  <div class="wrap seo-process-content">
    <div class="seo-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">How We Work</div>
      <h2 class="seo-section-h2 reveal reveal-delay-1">Audit. Optimize. <em>Grow.</em></h2>
      <p class="seo-section-sub reveal reveal-delay-2">A disciplined three-phase SEO process that builds compounding results month over month.</p>
    </div>
    <div class="seo-process-steps">
      <div class="seo-process-step">
        <div class="seo-step-num-circle">01</div>
        <h3 class="seo-step-h3">Audit</h3>
        <p class="seo-step-p">We start with a comprehensive technical audit — crawling your site, analyzing your backlink profile, benchmarking competitors, and identifying every opportunity and obstacle standing between you and page one.</p>
      </div>
      <div class="seo-process-step">
        <div class="seo-step-num-circle">02</div>
        <h3 class="seo-step-h3">Optimize</h3>
        <p class="seo-step-p">Armed with data, we execute: fixing technical issues, optimizing on-page content, building topical authority through strategic content creation, and earning high-quality backlinks from relevant sources.</p>
      </div>
      <div class="seo-process-step">
        <div class="seo-step-num-circle">03</div>
        <h3 class="seo-step-h3">Grow</h3>
        <p class="seo-step-p">SEO compounds. We monitor rankings, measure conversions, iterate on what's working, and continuously expand your keyword footprint — turning initial gains into a self-reinforcing growth engine.</p>
      </div>
    </div>
  </div>
</section>


<!-- ═══════════ MARQUEE ═══════════ -->
<div class="sd-marquee-band seo-marquee-band" aria-hidden="true">
  <div class="sd-marquee-track">
    <span class="sd-marquee-item">Search Engine Optimization<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Local SEO Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Page One Rankings<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Technical SEO<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Content Strategy<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Link Building<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Google Maps Pack<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Search Engine Optimization<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Dallas, Texas<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Local SEO Experts<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Page One Rankings<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Technical SEO<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Content Strategy<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Link Building<span class="sd-marquee-dot"></span></span>
    <span class="sd-marquee-item">Google Maps Pack<span class="sd-marquee-dot"></span></span>
  </div>
</div>


<!-- ═══════════ RESULTS / TESTIMONIAL ═══════════ -->
<section class="seo-results-section">
  <div class="seo-results-img">
    <img src="<?php echo esc_url( $img ); ?>dallas-night.jpg" alt="Dallas skyline at night" loading="lazy">
    <div class="seo-results-img-overlay"></div>

  </div>
  <div class="seo-results-content">
    <?php dwp_eyebrow( 'Client Results' ); ?>
    <h2 class="seo-intro-h2 reveal reveal-delay-1">Real businesses.<br><em>Real results.</em></h2>
    <div class="seo-quote-stars reveal reveal-delay-2">
      <?php for ( $s = 0; $s < 5; $s++ ) : ?>
      <div class="seo-star"></div>
      <?php endfor; ?>
    </div>
    <p class="seo-quote-text reveal reveal-delay-3"><?php echo esc_html( $testi_quote ); ?></p>
    <div class="seo-quote-attr reveal reveal-delay-4">
      <span class="seo-quote-name"><?php echo esc_html( $testi_name ); ?></span>
      <?php if ( $testi_url ) : ?>
        <a href="<?php echo esc_url( $testi_url ); ?>" class="seo-quote-link" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $testi_company ); ?> &rarr;</a>
      <?php else : ?>
        <span class="seo-quote-co"><?php echo esc_html( $testi_company ); ?></span>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ═══════════ APPROACH ═══════════ -->
<section class="seo-approach-section">
  <div class="wrap">
    <div class="seo-section-header">
      <div class="section-eyebrow reveal" style="justify-content:center;">Our Approach</div>
      <h2 class="seo-section-h2 seo-section-h2-dark reveal reveal-delay-1">Insight. Creativity. <em>Technology.</em></h2>
      <p class="seo-section-sub seo-section-sub-dark reveal reveal-delay-2">Strategic SEO that delivers measurable business results, not just rankings.</p>
    </div>
    <div class="seo-approach-grid">
      <div class="seo-approach-card reveal">
        <div class="seo-approach-num">01</div>
        <div class="seo-approach-divider"></div>
        <h3 class="seo-approach-h3">Insight</h3>
        <p class="seo-approach-p">We dig deep into your market, your competitors, and your customers' search behavior before writing a single meta tag. Strategy first — always.</p>
      </div>
      <div class="seo-approach-card reveal reveal-delay-1">
        <div class="seo-approach-num">02</div>
        <div class="seo-approach-divider"></div>
        <h3 class="seo-approach-h3">Creativity</h3>
        <p class="seo-approach-p">Great SEO requires great content. We create content that earns links, builds authority, and genuinely helps your audience — because that's what Google rewards.</p>
      </div>
      <div class="seo-approach-card reveal reveal-delay-2">
        <div class="seo-approach-num">03</div>
        <div class="seo-approach-divider"></div>
        <h3 class="seo-approach-h3">Technology</h3>
        <p class="seo-approach-p">Modern SEO is technical. We leverage cutting-edge tools, structured data, Core Web Vitals optimization, and AI-assisted analysis to stay ahead of every algorithm update.</p>
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
        [ 'title' => 'Web Development',            'url' => '/web-development' ],
        [ 'title' => 'Search Engine Optimization', 'url' => '/seo' ],
        [ 'title' => 'Branding &amp; Identity',    'url' => '/branding' ],
        [ 'title' => 'Social Media &amp; Content', 'url' => '/social-media' ],
        [ 'title' => 'Analytics &amp; Reporting',  'url' => '/analytics' ],
        [ 'title' => 'Strategy &amp; Consultation','url' => '/consultation' ],
      ];
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

<!-- D3 CHART SCRIPT -->
<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
(function() {
  var container = document.getElementById('seo-chart-container');
  if (!container) return;

  var trafficData = [
    {m:'Jan', v:820},  {m:'Feb', v:910},  {m:'Mar', v:880},
    {m:'Apr', v:1050}, {m:'May', v:1240}, {m:'Jun', v:1580},
    {m:'Jul', v:1920}, {m:'Aug', v:2380}, {m:'Sep', v:2850},
    {m:'Oct', v:3420}, {m:'Nov', v:4100}, {m:'Dec', v:5200}
  ];
  var kwData = [
    {id:0, start:47, end:1,  pct:98},
    {id:1, start:31, end:2,  pct:94},
    {id:2, start:18, end:1,  pct:98},
    {id:3, start:22, end:3,  pct:90},
    {id:4, start:9,  end:1,  pct:98}
  ];

  var W = container.offsetWidth || 500, H = 220;
  var margin = {top:20, right:20, bottom:36, left:48};
  var iW = W - margin.left - margin.right, iH = H - margin.top - margin.bottom;

  var svg = d3.select('#seo-chart-container').append('svg').attr('width', W).attr('height', H);
  var defs = svg.append('defs');

  var areaGrad = defs.append('linearGradient').attr('id','seoAreaGrad').attr('x1','0').attr('y1','0').attr('x2','0').attr('y2','1');
  areaGrad.append('stop').attr('offset','0%').attr('stop-color','#c9a84c').attr('stop-opacity',0.35);
  areaGrad.append('stop').attr('offset','100%').attr('stop-color','#c9a84c').attr('stop-opacity',0);

  var filter = defs.append('filter').attr('id','seoLineGlow');
  filter.append('feGaussianBlur').attr('stdDeviation','3').attr('result','blur');
  var feMerge = filter.append('feMerge');
  feMerge.append('feMergeNode').attr('in','blur');
  feMerge.append('feMergeNode').attr('in','SourceGraphic');

  var g = svg.append('g').attr('transform','translate('+margin.left+','+margin.top+')');

  var x = d3.scalePoint().domain(trafficData.map(function(d){return d.m;})).range([0, iW]);
  var y = d3.scaleLinear().domain([0, d3.max(trafficData, function(d){return d.v;}) * 1.1]).range([iH, 0]);

  g.append('g').attr('transform','translate(0,'+iH+')')
    .call(d3.axisBottom(x).tickSize(0).tickPadding(10))
    .call(function(ax){ ax.select('.domain').attr('stroke','rgba(255,255,255,0.08)'); })
    .call(function(ax){ ax.selectAll('text').attr('fill','rgba(255,255,255,0.3)').attr('font-family','JetBrains Mono, monospace').attr('font-size','9px'); });

  g.append('g')
    .call(d3.axisLeft(y).ticks(4).tickFormat(function(d){ return d >= 1000 ? (d/1000)+'k' : d; }).tickSize(-iW))
    .call(function(ax){ ax.select('.domain').remove(); })
    .call(function(ax){ ax.selectAll('.tick line').attr('stroke','rgba(255,255,255,0.05)').attr('stroke-dasharray','3,4'); })
    .call(function(ax){ ax.selectAll('text').attr('fill','rgba(255,255,255,0.25)').attr('font-family','JetBrains Mono, monospace').attr('font-size','9px').attr('dx','-4'); });

  var areaGen = d3.area().x(function(d){return x(d.m);}).y0(iH).y1(function(d){return y(d.v);}).curve(d3.curveCatmullRom.alpha(0.5));
  var areaPath = g.append('path').datum(trafficData).attr('fill','url(#seoAreaGrad)').attr('d', areaGen).attr('opacity', 0);

  var lineGen = d3.line().x(function(d){return x(d.m);}).y(function(d){return y(d.v);}).curve(d3.curveCatmullRom.alpha(0.5));
  var linePath = g.append('path').datum(trafficData).attr('fill','none').attr('stroke','#c9a84c').attr('stroke-width',2.5).attr('filter','url(#seoLineGlow)').attr('d', lineGen);

  var totalLength = linePath.node().getTotalLength();
  linePath.attr('stroke-dasharray', totalLength).attr('stroke-dashoffset', totalLength);

  var dot = g.append('circle').attr('r',5).attr('fill','#c9a84c').attr('stroke','#0b1622').attr('stroke-width',2).attr('filter','url(#seoLineGlow)').attr('opacity',0);
  var tipBg = g.append('rect').attr('rx',3).attr('ry',3).attr('fill','rgba(11,22,34,0.85)').attr('stroke','rgba(201,168,76,0.3)').attr('stroke-width',1).attr('width',72).attr('height',32).attr('opacity',0);
  var tipText = g.append('text').attr('fill','#c9a84c').attr('font-family','JetBrains Mono, monospace').attr('font-size','10px').attr('opacity',0);
  var tipSub = g.append('text').attr('fill','rgba(255,255,255,0.45)').attr('font-family','JetBrains Mono, monospace').attr('font-size','8px').attr('opacity',0);

  var ACT1 = 2800;
  linePath.transition().duration(ACT1).ease(d3.easeCubicInOut).attr('stroke-dashoffset',0).on('end', function() {
    areaPath.transition().duration(600).attr('opacity',1);
    animateDot(0);
  });

  function animateDot(i) {
    if (i >= trafficData.length) { setTimeout(startAct2, 800); return; }
    var d = trafficData[i], cx = x(d.m), cy = y(d.v);
    var tipX = cx + (cx > iW * 0.75 ? -80 : 8), tipY = cy - 36;
    dot.transition().duration(i===0?0:200).attr('cx',cx).attr('cy',cy).attr('opacity',1);
    tipBg.transition().duration(i===0?0:200).attr('x',tipX).attr('y',tipY).attr('opacity',1);
    tipText.transition().duration(i===0?0:200).attr('x',tipX+8).attr('y',tipY+13).attr('opacity',1).text(d.v.toLocaleString());
    tipSub.transition().duration(i===0?0:200).attr('x',tipX+8).attr('y',tipY+25).attr('opacity',1).text(d.m+' visits');
    setTimeout(function(){ animateDot(i+1); }, 180);
  }

  function startAct2() {
    dot.transition().duration(400).attr('opacity',0);
    tipBg.transition().duration(400).attr('opacity',0);
    tipText.transition().duration(400).attr('opacity',0);
    tipSub.transition().duration(400).attr('opacity',0);
    document.getElementById('seo-chart-label-name').textContent = 'keyword_rankings.js';
    document.getElementById('seo-chart-phase-label').textContent = 'Keyword Rankings';
    document.getElementById('seo-kw-panel').classList.add('seo-kw-visible');
    kwData.forEach(function(kw, i) {
      setTimeout(function() {
        var bar = document.getElementById('seo-kw-bar-'+kw.id);
        var rank = document.getElementById('seo-kw-rank-'+kw.id);
        bar.style.width = kw.pct + '%';
        var current = kw.start, step = Math.ceil((kw.start - kw.end) / 20);
        var interval = setInterval(function() {
          current = Math.max(kw.end, current - step);
          rank.textContent = '#' + current;
          if (current <= kw.end) { rank.textContent = '#' + kw.end; rank.classList.add('seo-kw-top'); clearInterval(interval); }
        }, 60);
      }, i * 220);
    });
    setTimeout(restartLoop, 7000);
  }

  function restartLoop() {
    var panel = document.getElementById('seo-kw-panel');
    panel.classList.remove('seo-kw-visible');
    kwData.forEach(function(kw) {
      document.getElementById('seo-kw-bar-'+kw.id).style.width = '0%';
      var rank = document.getElementById('seo-kw-rank-'+kw.id);
      rank.textContent = '#' + kw.start;
      rank.classList.remove('seo-kw-top');
    });
    document.getElementById('seo-chart-label-name').textContent = 'organic_traffic.js';
    document.getElementById('seo-chart-phase-label').textContent = 'Organic Traffic Growth';
    areaPath.attr('opacity',0);
    linePath.attr('stroke-dashoffset', totalLength).transition().delay(600).duration(ACT1).ease(d3.easeCubicInOut).attr('stroke-dashoffset',0).on('end', function() {
      areaPath.transition().duration(600).attr('opacity',1);
      animateDot(0);
    });
  }
})();
</script>

<script>
(function() {
  /* Counters */
  function animateCounter(el) {
    var target = parseInt(el.dataset.target, 10), duration = 1800, start = performance.now();
    function update(now) {
      var p = Math.min((now - start) / duration, 1), e = 1 - Math.pow(1 - p, 3);
      el.textContent = Math.round(e * target);
      if (p < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
  }
  var cObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) { e.target.querySelectorAll('.counter').forEach(animateCounter); cObs.unobserve(e.target); }
    });
  }, {threshold: 0.3});
  document.querySelectorAll('.seo-intro-stats').forEach(function(el){ cObs.observe(el); });

  /* Process step reveal */
  var pObs = new IntersectionObserver(function(entries) {
    entries.forEach(function(e) {
      if (e.isIntersecting) { document.querySelectorAll('.seo-process-step').forEach(function(s){ s.classList.add('seo-step-visible'); }); pObs.disconnect(); }
    });
  }, {threshold: 0.2});
  var ps = document.querySelector('.seo-process-steps');
  if (ps) pObs.observe(ps);
})();
</script>

<?php get_footer(); ?>
