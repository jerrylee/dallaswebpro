<?php
/**
 * Homepage — Contact Section
 *
 * Uses Forminator Pro if form ID is set in ACF options (contact_form_id).
 * Falls back to a native HTML form for display/development if no ID is set.
 */

$heading       = dwp_opt( 'contact_heading',       'Tell us about your *business.*' );
$sub           = dwp_opt( 'contact_sub',           "Book a free 30-minute discovery call with our team — no pitch, no pressure. We'll talk through what you need, what's not working, and whether we're the right fit for the job." );
$email         = dwp_opt( 'contact_email',         'contact@dallaswebpro.com' );
$location      = dwp_opt( 'contact_location',      'Allen, TX — Serving all of DFW' );
$response_time = dwp_opt( 'contact_response_time', 'Within one business day' );
$form_id       = (int) dwp_opt( 'contact_form_id', 0 );
$form_note     = dwp_opt( 'contact_form_note',     'No pitch. No pressure. Just a real conversation about your business.' );

// Convert *italic* to <em>
$heading_html  = preg_replace( '/\*(.+?)\*/', '<em>$1</em>', esc_html( $heading ) );
?>

<section class="contact-section" id="contact" data-wm="TALK">
  <div class="wrap">
    <div class="contact-grid">

      <!-- Left: info column -->
      <div class="contact-left reveal">

        <span class="eyebrow eyebrow-lt">Let's Talk</span>

        <h2 class="contact-heading">
          <?php
          // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
          echo wp_kses( $heading_html, [ 'em' => [] ] );
          ?>
        </h2>

        <p class="contact-sub"><?php echo esc_html( $sub ); ?></p>

        <div class="contact-details">

          <!-- Email -->
          <?php if ( $email ) : ?>
          <div class="contact-detail-item">
            <div class="contact-detail-icon" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <rect x="2" y="4" width="14" height="10" rx="1.5" stroke="rgba(255,255,255,0.45)" stroke-width="1.3"/>
                <path d="M2 6l7 5 7-5" stroke="rgba(255,255,255,0.45)" stroke-width="1.3"/>
              </svg>
            </div>
            <div class="contact-detail-text">
              <strong><?php esc_html_e( 'Email Us', 'dallaswebpro' ); ?></strong>
              <a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: inherit;">
                <?php echo esc_html( $email ); ?>
              </a>
            </div>
          </div>
          <?php endif; ?>

          <!-- Location -->
          <?php if ( $location ) : ?>
          <div class="contact-detail-item">
            <div class="contact-detail-icon" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <path d="M9 1.5C6.24 1.5 4 3.74 4 6.5c0 4.13 5 10 5 10s5-5.87 5-10c0-2.76-2.24-5-5-5z" stroke="rgba(255,255,255,0.45)" stroke-width="1.3"/>
                <circle cx="9" cy="6.5" r="1.75" stroke="rgba(255,255,255,0.45)" stroke-width="1.2"/>
              </svg>
            </div>
            <div class="contact-detail-text">
              <strong><?php esc_html_e( 'Based In', 'dallaswebpro' ); ?></strong>
              <?php echo esc_html( $location ); ?>
            </div>
          </div>
          <?php endif; ?>

          <!-- Response time -->
          <?php if ( $response_time ) : ?>
          <div class="contact-detail-item">
            <div class="contact-detail-icon" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                <circle cx="9" cy="9" r="7" stroke="rgba(255,255,255,0.45)" stroke-width="1.3"/>
                <path d="M9 5v4.5l2.5 2.5" stroke="rgba(255,255,255,0.45)" stroke-width="1.3" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="contact-detail-text">
              <strong><?php esc_html_e( 'Response Time', 'dallaswebpro' ); ?></strong>
              <?php echo esc_html( $response_time ); ?>
            </div>
          </div>
          <?php endif; ?>

        </div><!-- /.contact-details -->
      </div><!-- /.contact-left -->

      <!-- Right: form column -->
      <div class="contact-form-wrap reveal rev-d1">

        <?php if ( $form_id && function_exists( 'do_shortcode' ) ) :
          // Forminator Pro form
          echo do_shortcode( '[forminator_form id="' . $form_id . '"]' ); // phpcs:ignore

        else :
          // Native fallback — styled to match; replace with Forminator in production
        ?>
        <div class="contact-form">

          <div class="form-row">
            <div class="form-group">
              <label for="f-name"><?php esc_html_e( 'Your Name', 'dallaswebpro' ); ?></label>
              <input id="f-name" type="text" name="name" placeholder="John Smith" autocomplete="name">
            </div>
            <div class="form-group">
              <label for="f-biz"><?php esc_html_e( 'Business Name', 'dallaswebpro' ); ?></label>
              <input id="f-biz" type="text" name="business" placeholder="Smith Plumbing LLC">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="f-email"><?php esc_html_e( 'Email Address', 'dallaswebpro' ); ?></label>
              <input id="f-email" type="email" name="email" placeholder="john@yourbusiness.com" autocomplete="email">
            </div>
            <div class="form-group">
              <label for="f-phone"><?php esc_html_e( 'Phone Number', 'dallaswebpro' ); ?></label>
              <input id="f-phone" type="tel" name="phone" placeholder="(214) 555-0100" autocomplete="tel">
            </div>
          </div>

          <div class="form-group">
            <label for="f-service"><?php esc_html_e( "I'm Interested In", 'dallaswebpro' ); ?></label>
            <select id="f-service" name="service">
              <option value="" disabled selected><?php esc_html_e( 'Select a service...', 'dallaswebpro' ); ?></option>
              <option value="web"><?php esc_html_e( 'Custom Website Development', 'dallaswebpro' ); ?></option>
              <option value="seo"><?php esc_html_e( 'Search Engine Optimization', 'dallaswebpro' ); ?></option>
              <option value="branding"><?php esc_html_e( 'Branding &amp; Identity', 'dallaswebpro' ); ?></option>
              <option value="social"><?php esc_html_e( 'Social Media &amp; Content', 'dallaswebpro' ); ?></option>
              <option value="analytics"><?php esc_html_e( 'Analytics &amp; Reporting', 'dallaswebpro' ); ?></option>
              <option value="consultation"><?php esc_html_e( 'Strategy &amp; Consultation', 'dallaswebpro' ); ?></option>
              <option value="full"><?php esc_html_e( 'Full Digital Package', 'dallaswebpro' ); ?></option>
              <option value="unsure"><?php esc_html_e( "Not sure yet — let's talk", 'dallaswebpro' ); ?></option>
            </select>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label for="f-day"><?php esc_html_e( 'Preferred Meeting Day', 'dallaswebpro' ); ?></label>
              <select id="f-day" name="preferred_day">
                <option value="" disabled selected><?php esc_html_e( 'Any day works', 'dallaswebpro' ); ?></option>
                <?php
                $days = [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ];
                foreach ( $days as $day ) {
                  printf( '<option value="%s">%s</option>', esc_attr( strtolower( $day ) ), esc_html( $day ) );
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="f-time"><?php esc_html_e( 'Preferred Time', 'dallaswebpro' ); ?></label>
              <select id="f-time" name="preferred_time">
                <option value="" disabled selected><?php esc_html_e( 'Any time works', 'dallaswebpro' ); ?></option>
                <option value="morning"><?php esc_html_e( 'Morning (9am – 12pm)', 'dallaswebpro' ); ?></option>
                <option value="afternoon"><?php esc_html_e( 'Afternoon (12pm – 5pm)', 'dallaswebpro' ); ?></option>
                <option value="evening"><?php esc_html_e( 'Evening (5pm – 7pm)', 'dallaswebpro' ); ?></option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="f-msg"><?php esc_html_e( 'Tell Us About Your Project', 'dallaswebpro' ); ?></label>
            <textarea id="f-msg" name="message" placeholder="<?php esc_attr_e( "What's your business, what's not working online, and what does success look like for you?", 'dallaswebpro' ); ?>"></textarea>
          </div>

          <?php wp_nonce_field( 'dwp_contact_form', 'dwp_contact_nonce' ); ?>

          <button class="btn-submit" type="button">
            <?php esc_html_e( 'Book My Discovery Call', 'dallaswebpro' ); ?>
          </button>

          <?php if ( $form_note ) : ?>
          <p class="form-note"><?php echo esc_html( $form_note ); ?></p>
          <?php endif; ?>

        </div><!-- /.contact-form -->
        <?php endif; ?>

      </div><!-- /.contact-form-wrap -->

    </div><!-- /.contact-grid -->
  </div><!-- /.wrap -->
</section>
