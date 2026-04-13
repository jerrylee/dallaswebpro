<?php
/**
 * Homepage — Testimonials Section (template-parts/home/testimonials.php)
 *
 * Pulls from the dwp_testimonial CPT.
 * Falls back to placeholder cards if no testimonials exist yet.
 */

$delays = [ '', 'rev-d1', 'rev-d2' ];

$testimonials = new WP_Query( [
	'post_type'      => 'dwp_testimonial',
	'posts_per_page' => 3,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
] );
?>

<section class="testimonials-section">
  <div class="wrap">

    <header class="testi-header">
      <span class="eyebrow">What Clients Say</span>
      <h2 class="sec-heading">Results speak<br><em>for themselves.</em></h2>
    </header>

    <div class="testi-grid">

      <?php if ( $testimonials->have_posts() ) :
        $i = 0;
        while ( $testimonials->have_posts() ) :
          $testimonials->the_post();
          $quote  = get_field( 'testi_quote' );
          $name   = get_field( 'testi_author_name' );
          $co     = get_field( 'testi_author_company' );
          $photo  = get_field( 'testi_author_photo' );
          $rating = (int) ( get_field( 'testi_rating' ) ?: 5 );
      ?>
      <article class="testi-card reveal <?php echo esc_attr( $delays[ $i ] ?? '' ); ?>">
        <div class="testi-stars" aria-label="<?php echo esc_attr( $rating ); ?> out of 5 stars">
          <?php dwp_stars( $rating ); ?>
        </div>
        <blockquote class="testi-quote">
          <?php echo esc_html( $quote ); ?>
        </blockquote>
        <footer class="testi-author">
          <div class="testi-avatar">
            <?php if ( ! empty( $photo['url'] ) ) : ?>
              <img src="<?php echo esc_url( $photo['url'] ); ?>" alt="<?php echo esc_attr( $name ); ?>" loading="lazy">
            <?php endif; ?>
          </div>
          <div>
            <div class="testi-name"><?php echo esc_html( $name ); ?></div>
            <div class="testi-co"><?php echo esc_html( $co ); ?></div>
          </div>
        </footer>
      </article>
      <?php
          $i++;
        endwhile;
        wp_reset_postdata();

      else :
        // Placeholder cards — replace with real CPT entries
        $placeholders = [
          [ 'quote' => 'Our new website looks incredible and actually generates leads. The investment paid for itself within the first two months.', 'name' => 'Client Name — Placeholder', 'co' => 'Business Type, Dallas TX' ],
          [ 'quote' => "I've worked with two agencies before and both times felt like a number. With Dallas Web Pro, I always knew exactly where we stood — and the results backed it up.", 'name' => 'Client Name — Placeholder', 'co' => 'Business Type, Allen TX' ],
          [ 'quote' => 'We went from page four on Google to the top three results in under three months. The phone has not stopped ringing since the site launched.', 'name' => 'Client Name — Placeholder', 'co' => 'Business Type, Frisco TX' ],
        ];
        foreach ( $placeholders as $j => $ph ) : ?>
        <div class="testi-card reveal <?php echo esc_attr( $delays[ $j ] ?? '' ); ?>">
          <div class="testi-stars" aria-label="5 out of 5 stars">
            <?php dwp_stars( 5 ); ?>
          </div>
          <blockquote class="testi-quote"><?php echo esc_html( $ph['quote'] ); ?></blockquote>
          <footer class="testi-author">
            <div class="testi-avatar"></div>
            <div>
              <div class="testi-name"><?php echo esc_html( $ph['name'] ); ?></div>
              <div class="testi-co"><?php echo esc_html( $ph['co'] ); ?></div>
            </div>
          </footer>
        </div>
        <?php endforeach;
      endif; ?>

    </div>
  </div>
</section>
