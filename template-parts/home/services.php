<?php
/**
 * Homepage — Services Section
 *
 * ACF options: svc_eyebrow, svc_heading, svc_sub, services (repeater)
 * Each repeater row: number, featured, icon_svg, title, body, link_text, link_url
 *
 * Heading field supports *asterisk* notation for italic accent:
 *   e.g. "The work that *moves the needle.*"
 */

$eyebrow  = dwp_opt( 'svc_eyebrow', 'What We Do' );
$heading  = dwp_opt( 'svc_heading', 'The work that *moves the needle.*' );
$sub      = dwp_opt( 'svc_sub',     'Six focused disciplines. Each one a dedicated practice — no generalists, no hand-offs, no deliverables that disappear into a drive folder.' );
$services = dwp_opt( 'services',    [] );

// Convert *italic* notation to <em> tags
$heading_html = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $heading ) );

// Default services if ACF not configured yet
if ( empty( $services ) ) {
	$services = [
		[
			'number'   => '01',
			'featured' => true,
			'title'    => "Web\nDevelopment",
			'body'     => "Purpose-built WordPress sites designed around your business goals — not off-the-shelf templates. Clean code, fast load times, conversion-focused from the first line.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/web-development',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect x="3" y="9" width="36" height="24" rx="2" stroke="rgba(255,255,255,0.5)" stroke-width="1.4"/><path d="M3 17h36" stroke="rgba(255,255,255,0.5)" stroke-width="1.4"/><circle cx="10" cy="13" r="2" fill="rgba(201,123,42,0.8)"/><circle cx="17" cy="13" r="2" fill="rgba(255,255,255,0.35)"/><rect x="9" y="23" width="9" height="5" rx="1" fill="rgba(201,123,42,0.5)"/><rect x="22" y="21" width="13" height="2.5" rx="1" fill="rgba(255,255,255,0.2)"/><rect x="22" y="26" width="9" height="2.5" rx="1" fill="rgba(255,255,255,0.1)"/></svg>',
		],
		[
			'number'   => '02',
			'featured' => false,
			'title'    => "Search Engine\nOptimization",
			'body'     => "We get you ranking for the searches your customers are already doing — and build a compounding strategy that keeps you there long after the campaign ends.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/seo',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="18" cy="18" r="11" stroke="#C97B2A" stroke-width="1.4"/><path d="M26.5 26.5l7 7" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/><path d="M13 18h10M18 13v10" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/></svg>',
		],
		[
			'number'   => '03',
			'featured' => false,
			'title'    => "Branding\n&amp; Identity",
			'body'     => "Logo, color system, typography, brand voice — built cohesively so every customer touchpoint reinforces who you are. The foundation everything else is built on.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/branding',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="21" cy="21" r="5" fill="#C97B2A" fill-opacity="0.2" stroke="#C97B2A" stroke-width="1.4"/><path d="M21 8v5M21 29v5M8 21h5M29 21h5" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/><path d="M12.5 12.5l3.5 3.5M26 26l3.5 3.5M26 12.5l-3.5 3.5M16 26l-3.5 3.5" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/></svg>',
		],
		[
			'number'   => '04',
			'featured' => false,
			'title'    => "Social Media\n&amp; Content",
			'body'     => "Consistent, on-brand content that keeps your business visible between website visits. Strategy, creation, and scheduling — handled so you can focus on running the business.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/social-media',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect x="7" y="13" width="16" height="12" rx="2" stroke="#C97B2A" stroke-width="1.4"/><rect x="19" y="19" width="16" height="12" rx="2" stroke="#C97B2A" stroke-width="1.4"/><circle cx="15" cy="19" r="2.5" fill="#C97B2A" fill-opacity="0.3" stroke="#C97B2A" stroke-width="1.2"/></svg>',
		],
		[
			'number'   => '05',
			'featured' => false,
			'title'    => "Analytics\n&amp; Reporting",
			'body'     => "Clear dashboards and plain-English reports that show what's working and what isn't. No vanity metrics — just the numbers that actually matter to your business.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/analytics',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><rect x="6" y="6" width="30" height="30" rx="2" stroke="#C97B2A" stroke-width="1.4"/><path d="M13 28l5-7 5 4 5-9" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="28" cy="16" r="2.5" fill="#C97B2A" fill-opacity="0.35"/></svg>',
		],
		[
			'number'   => '06',
			'featured' => false,
			'title'    => "Strategy\n&amp; Consultation",
			'body'     => "Not sure where to start or what to fix first? We audit your digital presence, identify the highest-leverage opportunities, and build a roadmap tailored to your goals.",
			'link_text'=> 'Learn more',
			'link_url' => '/services/consultation',
			'icon_svg' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21 8c-7.18 0-13 4.93-13 11 0 3.21 1.59 6.1 4.13 8.16L11 34l6.5-2.6A15.3 15.3 0 0021 32c7.18 0 13-4.93 13-11S28.18 8 21 8z" stroke="#C97B2A" stroke-width="1.4" stroke-linejoin="round"/><path d="M16 19h10M16 23h6" stroke="#C97B2A" stroke-width="1.4" stroke-linecap="round"/></svg>',
		],
	];
}

// Stagger delay classes
$delays = [ '', 'rev-d1', 'rev-d2', 'rev-d3', 'rev-d4', 'rev-d5' ];
?>

<section class="services-section" id="services">
  <div class="wrap">

    <header class="services-header">
      <div>
        <?php dwp_eyebrow( $eyebrow ); ?>
        <h2 class="sec-heading">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo wp_kses( $heading_html, [ 'em' => [], 'br' => [] ] );
          ?>
        </h2>
      </div>
      <p class="sec-sub" style="max-width: 340px; text-align: right;">
        <?php echo esc_html( $sub ); ?>
      </p>
    </header>

    <div class="services-grid">
      <?php foreach ( $services as $i => $svc ) :
        $is_feat    = ! empty( $svc['featured'] );
        $card_class = 'svc-card reveal ' . ( $delays[ $i % 3 ] ?? '' ) . ( $is_feat ? ' svc-card-feat' : '' );
        $title_html = nl2br( esc_html( $svc['title'] ?? '' ) );
        $link_url   = esc_url( $svc['link_url'] ?? '#' );
        $link_text  = esc_html( $svc['link_text'] ?? 'Learn more' );
      ?>
      <div class="<?php echo esc_attr( trim( $card_class ) ); ?>">
        <span class="svc-num"><?php echo esc_html( $svc['number'] ?? sprintf( '%02d', $i + 1 ) ); ?></span>

        <?php if ( ! empty( $svc['icon_svg'] ) ) : ?>
        <div class="svc-icon" aria-hidden="true">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo wp_kses( $svc['icon_svg'], dwp_svg_kses() );
          ?>
        </div>
        <?php endif; ?>

        <h3 class="svc-title">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo $title_html;
          ?>
        </h3>

        <p class="svc-body"><?php echo esc_html( $svc['body'] ?? '' ); ?></p>

        <a href="<?php echo $link_url; // phpcs:ignore ?>" class="svc-link">
          <?php echo $link_text; // phpcs:ignore ?>
          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" aria-hidden="true">
            <path d="M2 6.5h9M7 2l4.5 4.5L7 11" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php
/**
 * Returns a minimal allowed SVG tags array for wp_kses().
 * Centralised here so template parts can reference it.
 */
function dwp_svg_kses() {
	$atts = [
		'class', 'id', 'width', 'height', 'viewBox', 'fill', 'stroke',
		'stroke-width', 'stroke-linecap', 'stroke-linejoin', 'opacity',
		'd', 'cx', 'cy', 'r', 'x', 'y', 'rx', 'ry',
		'x1', 'y1', 'x2', 'y2', 'transform', 'aria-hidden',
		'fill-opacity', 'stroke-opacity', 'xmlns',
	];

	return [
		'svg'      => array_fill_keys( $atts, true ),
		'path'     => array_fill_keys( $atts, true ),
		'circle'   => array_fill_keys( $atts, true ),
		'rect'     => array_fill_keys( $atts, true ),
		'line'     => array_fill_keys( $atts, true ),
		'polyline' => array_fill_keys( $atts, true ),
		'polygon'  => array_fill_keys( $atts, true ),
		'g'        => array_fill_keys( $atts, true ),
	];
}
