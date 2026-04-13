<?php
/**
 * Homepage — About Section (template-parts/home/about.php)
 */
$eyebrow     = dwp_opt( 'about_eyebrow',      'About Us' );
$heading     = dwp_opt( 'about_heading',      'A Dallas agency that actually *knows your market.*' );
$body_blocks = dwp_opt( 'about_body_blocks',  [] );
$sig_name    = dwp_opt( 'about_sig_name',     'Jerry Schrader' );
$sig_title   = dwp_opt( 'about_sig_title',    'Founder &amp; Principal — Dallas Web Pro' );
$photo       = dwp_opt( 'about_photo',        [] );
$badge_num   = dwp_opt( 'about_badge_number', '10+' );
$badge_label = dwp_opt( 'about_badge_label',  'Years in Business' );
$heading_html = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $heading ) );

if ( empty( $body_blocks ) ) {
	$body_blocks = [
		[ 'paragraph' => 'Dallas Web Pro is a web development and digital marketing agency built specifically to serve small businesses. We work with contractors, restaurants, med spas, and professional service firms who need a real digital presence, not a polished placeholder.' ],
		[ 'paragraph' => 'Founded by Jerry Schrader, the agency was built on a straightforward belief: local businesses deserve the same level of digital craft that national brands get — without the agency markup, the account manager layer, or the six-month retainer before anything ships.' ],
		[ 'paragraph' => "We keep our client roster intentionally focused so every project gets our full attention. If you're serious about growing your business online, we'll know within the first call whether we're the right team for the job." ],
	];
}
?>

<section class="about-section" id="about">
  <div class="wrap">
    <div class="about-grid">

      <!-- Photo column -->
      <div class="about-photo-wrap reveal">
        <div class="about-photo">
          <?php if ( ! empty( $photo['url'] ) ) : ?>
            <img
              src="<?php echo esc_url( $photo['sizes']['dwp-team'] ?? $photo['url'] ); ?>"
              alt="<?php echo esc_attr( $photo['alt'] ?? $sig_name ); ?>"
              loading="lazy"
            >
          <?php else : ?>
            <div class="about-photo-ph" aria-label="Photo placeholder">
              <svg width="52" height="52" viewBox="0 0 52 52" fill="none" aria-hidden="true">
                <circle cx="26" cy="20" r="10" stroke="white" stroke-width="1.4"/>
                <path d="M9 44c0-9.39 7.61-17 17-17s17 7.61 17 17" stroke="white" stroke-width="1.4" stroke-linecap="round"/>
              </svg>
              <?php esc_html_e( 'Photo Placeholder', 'dallaswebpro' ); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="about-accent-badge">
          <strong><?php echo esc_html( $badge_num ); ?></strong>
          <span><?php echo esc_html( $badge_label ); ?></span>
        </div>
      </div>

      <!-- Content column -->
      <div class="reveal rev-d1" style="padding-top: 8px;">
        <?php dwp_eyebrow( $eyebrow ); ?>

        <h2 class="about-heading">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo wp_kses( $heading_html, [ 'em' => [], 'br' => [] ] );
          ?>
        </h2>

        <?php foreach ( $body_blocks as $block ) : ?>
          <p class="about-body"><?php echo esc_html( $block['paragraph'] ); ?></p>
        <?php endforeach; ?>

        <?php if ( $sig_name ) : ?>
        <div class="about-sig">
          <div class="about-sig-name"><?php echo esc_html( $sig_name ); ?></div>
          <div class="about-sig-title"><?php echo wp_kses_post( $sig_title ); ?></div>
        </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
