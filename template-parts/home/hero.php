<?php
/**
 * Homepage — Hero Section
 *
 * ACF options fields:
 *   hero_eyebrow, hero_headline_line1/2/3,
 *   hero_sub, hero_cta_primary_text/url,
 *   hero_cta_ghost_text/url, hero_trust_pills,
 *   hero_browser_img_1/2, hero_browser_url_1/2,
 *   hero_stat_number, hero_stat_label
 */

$eyebrow   = dwp_opt( 'hero_eyebrow',          'Web Development &amp; Digital Strategy' );
$line1     = dwp_opt( 'hero_headline_line1',    'Websites that' );
$line2     = dwp_opt( 'hero_headline_line2',    'actually' );
$line3     = dwp_opt( 'hero_headline_line3',    'earn their keep.' );
$sub       = dwp_opt( 'hero_sub',               'A full-service digital agency building custom websites, brand identities, and growth strategies for small businesses that are serious about their online presence.' );
$cta1_txt  = dwp_opt( 'hero_cta_primary_text',  'Start a Project' );
$cta1_url  = dwp_opt( 'hero_cta_primary_url',   '#contact' );
$cta2_txt  = dwp_opt( 'hero_cta_ghost_text',    'See our work' );
$cta2_url  = dwp_opt( 'hero_cta_ghost_url',     '/work' );
$stat_num  = dwp_opt( 'hero_stat_number',       '50+' );
$stat_lbl  = dwp_opt( 'hero_stat_label',        'Sites Launched' );
$url1      = dwp_opt( 'hero_browser_url_1',     'clientwebsite.com' );
$url2      = dwp_opt( 'hero_browser_url_2',     'yourdomainhere.com' );
$img1      = dwp_opt( 'hero_browser_img_1',     [] );
$img2      = dwp_opt( 'hero_browser_img_2',     [] );
$pills     = dwp_opt( 'hero_trust_pills',       [] );

// Default trust pills if none set
if ( empty( $pills ) ) {
	$pills = [
		[ 'label' => 'Full-service agency' ],
		[ 'label' => '10+ years experience' ],
		[ 'label' => '50+ sites launched' ],
	];
}
?>

<section class="site-hero" id="top">

  <!-- Content -->
  <div class="hero-content">

    <span class="hero-eyebrow"><?php echo wp_kses_post( $eyebrow ); ?></span>

    <h1 class="hero-h1">
      <?php echo esc_html( $line1 ); ?><br>
      <?php echo esc_html( $line2 ); ?><br>
      <em><?php echo esc_html( $line3 ); ?></em>
    </h1>

    <p class="hero-sub"><?php echo esc_html( $sub ); ?></p>

    <div class="hero-actions">
      <a href="<?php echo esc_url( $cta1_url ); ?>" class="btn-primary">
        <?php echo esc_html( $cta1_txt ); ?>
      </a>
      <a href="<?php echo esc_url( $cta2_url ); ?>" class="btn-ghost">
        <?php echo esc_html( $cta2_txt ); ?>
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true">
          <path d="M3 8h10M8 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>

    <?php if ( ! empty( $pills ) ) : ?>
    <div class="hero-trust">
      <?php foreach ( $pills as $index => $pill ) : ?>
        <?php if ( $index > 0 ) : ?>
          <div class="hero-trust-div" aria-hidden="true"></div>
        <?php endif; ?>
        <span class="hero-trust-item"><?php echo esc_html( $pill['label'] ); ?></span>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

  </div><!-- /.hero-content -->

  <!-- Visual — Browser mockup cards -->
  <div class="hero-visual" aria-hidden="true">

    <!-- Back card -->
    <div class="browser-card browser-card-back">
      <div class="b-chrome">
        <div class="b-dots">
          <div class="b-dot b-dot-r"></div>
          <div class="b-dot b-dot-y"></div>
          <div class="b-dot b-dot-g"></div>
        </div>
        <div class="b-url"><?php echo esc_html( $url1 ); ?></div>
      </div>
      <?php if ( ! empty( $img1 ) && ! empty( $img1['url'] ) ) : ?>
        <img
          class="b-img"
          src="<?php echo esc_url( $img1['url'] ); ?>"
          alt="<?php echo esc_attr( $img1['alt'] ?? '' ); ?>"
          loading="eager"
        >
      <?php else : ?>
        <div class="b-img" style="background: linear-gradient(135deg, #2E4155, #1C2B3A);"></div>
      <?php endif; ?>
    </div>

    <!-- Front card -->
    <div class="browser-card browser-card-main">
      <div class="b-chrome">
        <div class="b-dots">
          <div class="b-dot b-dot-r"></div>
          <div class="b-dot b-dot-y"></div>
          <div class="b-dot b-dot-g"></div>
        </div>
        <div class="b-url"><?php echo esc_html( $url2 ); ?></div>
      </div>
      <?php if ( ! empty( $img2 ) && ! empty( $img2['url'] ) ) : ?>
        <img
          class="b-img"
          src="<?php echo esc_url( $img2['url'] ); ?>"
          alt="<?php echo esc_attr( $img2['alt'] ?? '' ); ?>"
          loading="eager"
        >
      <?php else : ?>
        <div class="b-img" style="background: linear-gradient(135deg, #3a5068, #2E4155);"></div>
      <?php endif; ?>
    </div>

    <!-- Floating stat badge -->
    <div class="hero-stat-badge">
      <strong><?php echo esc_html( $stat_num ); ?></strong>
      <span><?php echo esc_html( $stat_lbl ); ?></span>
    </div>

  </div><!-- /.hero-visual -->

</section><!-- /.site-hero -->
