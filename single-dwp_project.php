<?php
/**
 * Single — Portfolio Project (dwp_project)
 *
 * Individual case study page showing desktop + iPad + mobile screenshots,
 * services delivered, project description, and a copyright footer.
 *
 * Updated: Added iPad / tablet device mockup as the third device frame.
 */

get_header();

while ( have_posts() ) :
  the_post();

  $url_label       = get_field( 'proj_url_label' ) ?: get_the_title();
  $industry        = get_field( 'proj_industry' );
  $description     = get_field( 'proj_description' );   // legacy
  $overview        = get_field( 'proj_overview' );       // WYSIWYG
  $services_raw    = get_field( 'proj_services' );
  $services_detail = get_field( 'proj_services_detail' );
  $result          = get_field( 'proj_result' );
  $img_desktop     = get_field( 'proj_img_desktop' );
  $img_ipad        = get_field( 'proj_img_ipad' );
  $img_mobile      = get_field( 'proj_img_mobile' );
  $screenshot      = get_field( 'proj_screenshot' );   // card thumb — fallback
  $accent          = get_field( 'proj_accent_color' ) ?: '#C97B2A';
  $live_url        = get_field( 'proj_url' );
  $client_name     = get_field( 'proj_client' );

  // Services as an array
  $services = [];
  if ( $services_raw ) {
    $services = array_map( 'trim', explode( ',', $services_raw ) );
  }

  // Desktop image src (prefer full, fall back to url)
  $desk_src = $img_desktop['url'] ?? ( $screenshot['url'] ?? '' );
  $desk_alt = $img_desktop['alt'] ?? get_the_title();

  // iPad image src
  $ipad_src = $img_ipad['url'] ?? '';
  $ipad_alt = $img_ipad['alt'] ?? get_the_title();

  // Mobile image src
  $mob_src  = $img_mobile['url'] ?? '';
  $mob_alt  = $img_mobile['alt'] ?? get_the_title();

  // Count how many devices we have for layout class
  $device_count = 1; // desktop always
  if ( $ipad_src ) $device_count++;
  if ( $mob_src )  $device_count++;
?>


<!-- ─── PAGE HERO ─────────────────────────────── -->
<div class="proj-hero" style="--proj-accent: <?php echo esc_attr( $accent ); ?>;">
  <div class="wrap">

    <nav class="page-breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url( get_post_type_archive_link( 'dwp_project' ) ); ?>">All Projects</a><?php if ( $industry ) : ?><span class="breadcrumb-sep">/</span><span class="breadcrumb-industry"><?php echo esc_html( $industry ); ?></span><?php endif; ?>
    </nav>

    <h1 class="proj-hero-h1"><?php the_title(); ?></h1>

    <?php if ( $result ) : ?>
      <p class="proj-hero-result"><?php echo esc_html( $result ); ?></p>
    <?php endif; ?>



  </div>
</div>


<!-- ─── DEVICE SHOWCASE (hero visual) ───────────── -->
<div class="proj-device-section">
  <div class="wrap">
    <div class="proj-devices proj-devices--<?php echo esc_attr( $device_count ); ?>up">

      <!-- ── Desktop browser frame ── -->
      <div class="proj-desktop-wrap reveal">
        <?php if ( $desk_src && $live_url ) : ?>
        <a href="<?php echo esc_url( $live_url ); ?>" target="_blank" rel="noopener noreferrer" class="proj-desktop-live-link" aria-label="Visit live site">
        <?php endif; ?>
          <div class="proj-desktop-frame">
            <div class="proj-desktop-chrome">
              <div class="b-dots" aria-hidden="true">
                <div class="b-dot b-dot-r"></div>
                <div class="b-dot b-dot-y"></div>
                <div class="b-dot b-dot-g"></div>
              </div>
              <div class="proj-desktop-url"><?php echo esc_html( $url_label ); ?></div>
              <svg class="proj-chrome-ext" width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                <path d="M6 3H3a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-3M10 2h4m0 0v4m0-4L7 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="proj-desktop-screen">
              <?php if ( $desk_src ) : ?>
                <img src="<?php echo esc_url( $desk_src ); ?>" alt="<?php echo esc_attr( $desk_alt ); ?>" loading="eager">
              <?php else : ?>
                <div class="proj-screen-placeholder">
                  <span style="--proj-accent: <?php echo esc_attr( $accent ); ?>;">Desktop Preview</span>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php if ( $desk_src && $live_url ) : ?>
        </a>
        <?php endif; ?>
      </div>

      <!-- ── iPad / Tablet frame ── -->
      <?php if ( $ipad_src ) : ?>
      <div class="proj-ipad-wrap reveal rev-d2">
        <div class="proj-ipad-frame">
          <div class="proj-ipad-camera" aria-hidden="true"></div>
          <div class="proj-ipad-screen">
            <img src="<?php echo esc_url( $ipad_src ); ?>" alt="<?php echo esc_attr( $ipad_alt ); ?>" loading="eager">
          </div>
          <div class="proj-ipad-home" aria-hidden="true"></div>
        </div>
      </div>
      <?php endif; ?>

      <!-- ── Mobile phone frame ── -->
      <?php if ( $mob_src ) : ?>
      <div class="proj-mobile-wrap reveal rev-d3">
        <div class="proj-mobile-frame">
          <div class="proj-mobile-notch"></div>
          <div class="proj-mobile-screen">
            <img src="<?php echo esc_url( $mob_src ); ?>" alt="<?php echo esc_attr( $mob_alt ); ?>" loading="eager">
          </div>
          <div class="proj-mobile-home"></div>
        </div>
      </div>
      <?php endif; ?>

    </div><!-- /.proj-devices -->
  </div>
</div>


<!-- ─── PROJECT OVERVIEW ───────────────────────── -->
<div class="proj-overview-section">
  <div class="wrap">
    <div class="proj-overview-grid">

      <!-- Left: rich text -->
      <div class="proj-overview-body reveal">
        <p class="proj-eyebrow">Overview</p>
        <?php if ( $overview ) : ?>
          <div class="proj-overview-content"><?php echo wp_kses_post( $overview ); ?></div>
        <?php elseif ( $description ) : ?>
          <div class="proj-overview-content">
            <?php foreach ( array_filter( explode( "\n", $description ) ) as $para ) : ?>
              <p><?php echo esc_html( trim( $para ) ); ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Right: meta sidebar -->
      <aside class="proj-meta-sidebar reveal rev-d1">

        <?php if ( $client_name ) : ?>
        <div class="proj-meta-item">
          <span class="proj-meta-label">Client</span>
          <span class="proj-meta-value"><?php echo esc_html( $client_name ); ?></span>
        </div>
        <?php endif; ?>

        <?php if ( $industry ) : ?>
        <div class="proj-meta-item">
          <span class="proj-meta-label">Industry</span>
          <span class="proj-meta-value"><?php echo esc_html( $industry ); ?></span>
        </div>
        <?php endif; ?>

        <?php if ( ! empty( $services ) ) : ?>
        <div class="proj-meta-item">
          <span class="proj-meta-label">Services Delivered</span>
          <div class="proj-services-tags" style="margin-top:10px;">
            <?php foreach ( $services as $svc ) : ?>
              <?php if ( $svc ) : ?>
                <span class="proj-service-tag"><?php echo esc_html( $svc ); ?></span>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <?php if ( $live_url ) : ?>
        <div class="proj-meta-item" style="border-bottom:none; padding-bottom:0;">
          <a href="<?php echo esc_url( $live_url ); ?>" class="proj-live-btn" target="_blank" rel="noopener noreferrer">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M6 3H3a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h9a1 1 0 0 0 1-1v-3M10 2h4m0 0v4m0-4L7 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Visit Live Site
          </a>
        </div>
        <?php endif; ?>

      </aside>
    </div>
  </div>
</div>


<?php
// ── Icon map: keyword → inline SVG path(s) ──────────────────────────────────
function dwp_proj_service_icon( string $name ): string {
  $k = strtolower( $name );
  if ( str_contains( $k, 'brand' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="20" cy="20" r="14"/><path d="M14 20c0-3.31 2.69-6 6-6s6 2.69 6 6-2.69 6-6 6"/><circle cx="20" cy="20" r="2"/><line x1="20" y1="6" x2="20" y2="10"/><line x1="20" y1="30" x2="20" y2="34"/><line x1="6" y1="20" x2="10" y2="20"/><line x1="30" y1="20" x2="34" y2="20"/></svg>';
  } elseif ( str_contains( $k, 'graphic' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="6" width="28" height="28" rx="3"/><circle cx="14" cy="14" r="3"/><path d="M6 27l9-9 5 5 4-4 9 9"/></svg>';
  } elseif ( str_contains( $k, 'web design' ) || ( str_contains( $k, 'design' ) && ! str_contains( $k, 'graphic' ) ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="8" width="32" height="24" rx="3"/><line x1="4" y1="14" x2="36" y2="14"/><circle cx="9" cy="11" r="1.2" fill="currentColor" stroke="none"/><circle cx="13.5" cy="11" r="1.2" fill="currentColor" stroke="none"/><circle cx="18" cy="11" r="1.2" fill="currentColor" stroke="none"/><rect x="10" y="19" width="9" height="7" rx="1.5"/><line x1="22" y1="20" x2="30" y2="20"/><line x1="22" y1="23" x2="28" y2="23"/><line x1="22" y1="26" x2="26" y2="26"/></svg>';
  } elseif ( str_contains( $k, 'dev' ) || str_contains( $k, 'code' ) || str_contains( $k, 'engineer' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="14,27 6,20 14,13"/><polyline points="26,13 34,20 26,27"/><line x1="22" y1="12" x2="18" y2="28"/></svg>';
  } elseif ( str_contains( $k, 'seo' ) || str_contains( $k, 'search' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="18" r="10"/><line x1="25.5" y1="25.5" x2="34" y2="34"/><line x1="13" y1="18" x2="23" y2="18"/><line x1="18" y1="13" x2="18" y2="23"/></svg>';
  } elseif ( str_contains( $k, 'market' ) || str_contains( $k, 'ads' ) || str_contains( $k, 'ppc' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6,30 14,20 20,25 28,14 34,18"/><polyline points="28,14 34,14 34,20"/></svg>';
  } elseif ( str_contains( $k, 'copy' ) || str_contains( $k, 'writ' ) || str_contains( $k, 'content' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="8" y="6" width="24" height="28" rx="2"/><line x1="13" y1="14" x2="27" y2="14"/><line x1="13" y1="19" x2="27" y2="19"/><line x1="13" y1="24" x2="21" y2="24"/></svg>';
  } elseif ( str_contains( $k, 'photo' ) || str_contains( $k, 'video' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="10" width="32" height="22" rx="3"/><circle cx="20" cy="21" r="6"/><path d="M13 10l2-4h10l2 4"/><circle cx="31" cy="15" r="1.5" fill="currentColor" stroke="none"/></svg>';
  } elseif ( str_contains( $k, 'host' ) || str_contains( $k, 'domain' ) ) {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="8" width="32" height="10" rx="2"/><rect x="4" y="22" width="32" height="10" rx="2"/><circle cx="11" cy="13" r="2" fill="currentColor" stroke="none"/><circle cx="11" cy="27" r="2" fill="currentColor" stroke="none"/></svg>';
  } else {
    return '<svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="20" cy="20" r="14"/><polyline points="16,20 19,23 24,17"/></svg>';
  }
}
?>


<?php if ( ! empty( $services_detail ) ) : ?>
<!-- ─── WHAT WE DID ─────────────────────────────── -->
<div class="proj-what-section">
  <div class="wrap">
    <div class="proj-what-header reveal">
      <p class="proj-eyebrow">What We Did</p>
      <h2 class="proj-what-h2">Services delivered<br><em>on this project.</em></h2>
    </div>
    <div class="proj-what-grid proj-what-grid--<?php echo count( $services_detail ) <= 3 ? '3' : '4'; ?>">
      <?php foreach ( $services_detail as $i => $svc ) :
        $delay_class = $i % 4 === 1 ? ' rev-d1' : ( $i % 4 === 2 ? ' rev-d2' : ( $i % 4 === 3 ? ' rev-d3' : '' ) );
      ?>
      <div class="proj-what-card reveal<?php echo esc_attr( $delay_class ); ?>">
        <div class="proj-what-icon">
          <?php echo dwp_proj_service_icon( $svc['svc_name'] ); ?>
        </div>
        <h3 class="proj-what-name"><?php echo esc_html( $svc['svc_name'] ); ?></h3>
        <?php if ( $svc['svc_body'] ) : ?>
          <p class="proj-what-body"><?php echo esc_html( $svc['svc_body'] ); ?></p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>




<!-- ─── UNIVERSAL CTA BAND ───────────────────────────── -->
<div class="cta-band">

  <div class="cta-watermark" aria-hidden="true">
    <?php echo esc_html( get_field( 'proj_city' ) ?: 'Dallas' ); ?>
  </div>

  <div class="cta-band-inner">
    <h2 class="cta-h2">
      Like what you see?
      <em>Let's build yours.</em>
    </h2>
    <a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" class="btn-cta-gold">Start a Project</a>
  </div>

</div>





<?php endwhile; ?>

<?php get_footer(); ?>
